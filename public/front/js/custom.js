$(document).ready(function() {
    // $("#sort").on('change', function() {
    //     this.form.submit();
    // });

    // Lấy giá sản phẩm dựa trên kích thước
    $(".getPrice").change(function() {
        var size = $(this).val();
        var product_id = $(this).attr("product-id");
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/get-attribute-price',
            data: {size: size, product_id: product_id},
            type: 'post',
            // success: function(resp) {
            //     // alert(resp);
            //     if (resp['discount'] > 0) {
            //         $(".getAttributePrice").html("<span class='pd-detail__price'>₫"+resp['final_price']+"</span><span class='pd-detail__discount'>("+resp['discount']+"% OFF)</span><del class='pd-detail__del'>₫"+resp['product_price']+"</del>");
            //     } else {
            //         $(".getAttributePrice").html("<span class='pd-detail__price'>₫"+resp['final_price']+"</span>");
            //     }
            // },
            success: function(resp) {
                function formatCurrency(number) {
                    return "₫" + number.toLocaleString('vi-VN');
                }

                if (resp['discount'] > 0) {
                    $(".getAttributePrice").html("<span class='pd-detail__price'>"+formatCurrency(resp['final_price']) +"</span><span class='pd-detail__discount'>("+resp['discount_percent']+"% OFF)</span><del class='pd-detail__del'>" + formatCurrency(resp['product_price']) + "</del>");
                } else {
                    $(".getAttributePrice").html("<span class='pd-detail__price'>" + formatCurrency(resp['final_price']) + "</span>");
                }
            },
            error: function() {
                alert("Error");
            }
        });
    });

    // Add to Cart
    $("#addToCart").submit(function (event){
        event.preventDefault();  // Ngăn chặn hành vi mặc định của form
        var formData = $(this).serialize();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/add-to-cart',
            type: 'post',
            data: formData,
            success:function (resp) {
                $(".totalCartItems").html(resp['totalCartItems']);
                $("#appendCartItems").html(resp.view);
                $("#appendMiniCartItems").html(resp.minicartview);
                // alert(resp);
                if (resp['status'] === true) {
                    $('.print-success-msg').show();
                    $('.print-success-msg').delay(3000).fadeOut('slow');
                    $('.print-success-msg').html("<div class='success'><span class='closebtn' onclick='this.parentElement.style.display=\"none\";'>&times;</span>" + resp['message'] + "</div>");
                } else {
                    // alert(resp['message']);
                    $('.print-error-msg').show();
                    $('.print-error-msg').delay(3000).fadeOut('slow');
                    $('.print-error-msg').html("<div class='alert'><span class='closebtn' onclick='this.parentElement.style.display=\"none\";'>&times;</span>" + resp['message'] + "</div>");
                }
            },error:function (){
                alert("Error");
            }
        });
    });

    // Update Cart Items Quantity
    $(document).on('click','.updateCartItems',function (){
       if($(this).hasClass('fa-plus')) {
          // Get Qty
          var quantity = $(this).data('qty');
          // Increase the Qty by 1
           new_qty = parseInt(quantity)+1;
       }
        if($(this).hasClass('fa-minus')) {
            // Get Qty
            var quantity = $(this).data('qty');
            // Check Qty atleast 1
            if (quantity<=1) {
                alert("Item Quantity must be 1 or greater!");
                return false;
            }
            // Increase the Qty by 1
            new_qty = parseInt(quantity)-1;
        }
        var cartid = $(this).data('cartid');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
           data:{cartid:cartid,qty:new_qty},
           url:'/update-cart-item-qty',
           type:'post',
           success: function (resp){
                $(".totalCartItems").html(resp.totalCartItems);
               // alert(resp);
               if (resp.status === false) {
                   alert(resp.message);
               }
               $("#appendCartItems").html(resp.view);
               $("#appendMiniCartItems").html(resp.minicartview);
           } , error:function () {
               alert("Error");
            }
        });
    });

    // Delete Cart Item
    $(document).on('click','.deleteCartItem',function (){
        var cartid = $(this).data('cartid');
        var page = $(this).data('page');
        var result = confirm("Are you sure you want to delete this Cart Item?");
        if (result) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {cartid:cartid},
                url:'delete-cart-item',
                type:'post',
                success:function (resp) {
                    $(".totalCartItems").html(resp.totalCartItems);
                    $("#appendCartItems").html(resp.view);
                    $("#appendMiniCartItems").html(resp.minicartview);
                    if (page=="Checkout"){
                        window.location.href="/checkout";
                    }
                },
                error: function () {
                    alert("Error");
                }
            });
        }
    })

    // Empty Cart
    $(document).on('click','.emptyCart',function (){
        var result = confirm("Are you sure you want to empty your Cart?");
        if (result) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url:'/empty-cart',
                type:'post',
                success:function (resp) {
                    $(".totalCartItems").html(resp.totalCartItems);
                    $("#appendCartItems").html(resp.view);
                    $("#appendMiniCartItems").html(resp.minicartview);
                },
                error: function () {
                    alert("Error");
                }
            });
        }
    })

    // Register Form Validation
    $("#registerForm").submit(function (){
        $(".loader").show();
        var formData = $("#registerForm").serialize();
        // alert(formData);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url:'/user/register',
            type:'post',
            data:formData,
            success:function (data) {
               // alert(resp.redirectUrl);
                if (data.type==="validation") {
                    $(".loader").hide();
                    $.each(data.errors, function (i,error){
                        $('#register-'+i).attr('style','color:red');
                        $('#register-'+i).html(error);
                        setTimeout(function (){
                            $('#register-'+i).css({
                                'display':'none'
                            })
                        }, 4000);
                    })
                } else if (data.type==="success") {
                    $(".loader").hide();
                    // window.location.href = data.redirectUrl;
                    $("#register-success").attr('style','color:green');
                    $("#register-success").html(data.message);
                }
            },error:function () {
                $(".loader").hide();
               alert("Error");
            }
        });
    });

    // Login form validation
    $("#loginForm").submit(function () {
       var formData = $(this).serialize();
       $.ajax({
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           },
           url:'/user/login',
           type:'post',
           data:formData,
           success:function (resp) {
              // alert(resp)
               if (resp.type==="error") {
                   $.each(resp.errors, function (i,error){
                       $('.login-'+i).attr('style','color:red');
                       $('.login-'+i).html(error);
                       setTimeout(function (){
                           $('.login-'+i).css({
                               'display':'none'
                           })
                       }, 4000);
                   })
               } else if (resp.type==="inactive") {
                   $("#login-error").attr('style','color:red');
                   $("#login-error").html(resp.message);
               } else if (resp.type==="success") {
                   window.location.href = resp.redirectUrl;
               } else if (resp.type==="incorrect") {
                   $("#login-error").attr('style','color:red');
                   $("#login-error").html(resp.message);
               }
           },error:function () {
               alert("Error");
           }
       });
    });

    // Forgot form validation
    $("#forgotForm").submit(function () {
        $(".loader").show();
        var formData = $(this).serialize();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url:'/user/forgot-password',
            type:'post',
            data:formData,
            success:function (resp) {
                $(".loader").hide();
                // alert(resp)
                if (resp.type==="error") {
                    $(".loader").hide();
                    $.each(resp.errors, function (i,error){
                        $('.forgot-'+i).attr('style','color:red');
                        $('.forgot-'+i).html(error);
                        setTimeout(function (){
                            $('.forgot-'+i).css({
                                'display':'none'
                            })
                        }, 4000);
                    })
                }  else if (resp.type==="success") {
                    $(".loader").hide();
                    $("#forgot-success").attr('style','color:green');
                    $("#forgot-success").html(resp.message);
                }
            },error:function () {
                alert("Error");
            }
        });
    });

    // Reset Password form validation
    $("#resetPwdForm").submit(function () {
        $(".loader").show();
        var formData = $(this).serialize();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url:'/user/reset-password',
            type:'post',
            data:formData,
            success:function (resp) {
                $(".loader").hide();
                // alert(resp)
                if (resp.type==="error") {
                    $(".loader").hide();
                    $.each(resp.errors, function (i,error){
                        $('.reset-'+i).attr('style','color:red');
                        $('.reset-'+i).html(error);
                        setTimeout(function (){
                            $('.reset-'+i).css({
                                'display':'none'
                            })
                        }, 4000);
                    })
                }  else if (resp.type==="success") {
                    $(".loader").hide();
                    $("#reset-success").attr('style','color:green');
                    $("#reset-success").html(resp.message);
                }
            },error:function () {
                alert("Error");
            }
        });
    });

    // Account Form Validation
    $("#accountForm").submit(function (){
        $(".loader").show();
        var formData = $(this).serialize();
        // alert(formData);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url:'/user/account',
            type:'post',
            data:formData,
            success:function (data) {
                $(".loader").hide();
                // alert(resp.redirectUrl);
                if (data.type==="validation") {
                    $(".loader").hide();
                    $.each(data.errors, function (i,error){
                        $('#account-'+i).attr('style','color:red');
                        $('#account-'+i).html(error);
                        setTimeout(function (){
                            $('#account-'+i).css({
                                'display':'none'
                            })
                        }, 4000);
                    })
                } else if (data.type==="success") {
                    $(".loader").hide();
                    // window.location.href = data.redirectUrl;
                    $("#account-success").attr('style','color:green');
                    $("#account-success").html(data.message);
                    setTimeout(function (){
                        $('#account-success').css({
                            'display':'none'
                        })
                    }, 4000);
                }
            },error:function () {
                $(".loader").hide();
                alert("Error");
            }
        });
    });

    $("#provinces").change(function () {
        var province_code = $(this).val();
        $.ajax({
            url: '/get-districts',
            type: 'get',
            data: {province_code: province_code},
            dataType: 'json',
            success: function (response) {
                $("#district").find("option").not(":first").remove();
                $.each(response.districts, function (key, item) {
                    $("#district").append(`<option value="${item.code}">${item.name}</option>`);
                });
                $("#ward").find("option").not(":first").remove(); // Xóa các option của xã khi thay đổi tỉnh
            },
            error: function () {
                console.log("Something Went Wrong");
            }
        });
    });

    $("#district").change(function () {
        var district_code = $(this).val();
        $.ajax({
            url: '/get-wards',
            type: 'get',
            data: {district_code: district_code},
            dataType: 'json',
            success: function (response) {
                $("#ward").find("option").not(":first").remove(); // Xóa các option của xã trước khi thêm mới
                $.each(response.wards, function (key, item) {
                    $("#ward").append(`<option value="${item.code}">${item.name}</option>`);
                });
            },
            error: function () {
                console.log("Something Went Wrong");
            }
        });
    });

    // Password Form Validation
    $("#passwordForm").submit(function (){
        $(".loader").show();
        var formData = $(this).serialize();
        // alert(formData);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url:'/user/update-password',
            type:'post',
            data:formData,
            success:function (data) {
                $(".loader").hide();
                // alert(resp.redirectUrl);
                if (data.type==="validation") {
                    $(".loader").hide();
                    $.each(data.errors, function (i,error){
                        $('#password-'+i).attr('style','color:red');
                        $('#password-'+i).html(error);
                        setTimeout(function (){
                            $('#password-'+i).css({
                                'display':'none'
                            })
                        }, 4000);
                    })
                } else if (data.type==="success") {
                    $(".loader").hide();
                    // window.location.href = data.redirectUrl;
                    $("#password-success").attr('style','color:green');
                    $("#password-success").html(data.message);
                    setTimeout(function (){
                        $('#password-success').css({
                            'display':'none'
                        })
                    }, 4000);
                }   else if (data.type==="incorrect") {
                    $(".loader").hide();
                    $("#password-success").hide();
                    // window.location.href = data.redirectUrl;
                    $("#password-error").attr('style','color:red');
                    $("#password-error").html(data.message);
                    setTimeout(function (){
                        $('#password-error').css({
                            'display':'none'
                        })
                    }, 4000);
                }
            },error:function () {
                $(".loader").hide();
                alert("Error");
            }
        });
    });

    // Apply Coupon
    $(document).on('click','#applyCoupon',function (){
       var user = $(this).attr("user");
       if (user == 1) {
           // do nothing
       } else{
           alert("Please login to apply Coupon!");
           return false;
       }
       var code = $("#code").val();
       $.ajax({
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           },
           url:'/apply-coupon',
           type:'post',
           data: {code:code},
           success:function (resp) {
                if (resp.status == false) {
                    // alert(resp.message);
                    $('.print-error-msg').show();
                    $('.print-error-msg').delay(3000).fadeOut('slow');
                    $('.print-error-msg').html("<div class='alert'>" + resp['message'] + "</div>");
                } else if (resp.status == true) {
                    if (resp.couponAmount > 0) {
                        $(".couponAmount").text("₫"+resp.couponAmount);
                    } else {
                        $(".couponAmount").text("₫0");
                    }
                    if (resp.grandTotal >0) {
                        $(".grandTotal").text("₫"+resp.grandTotal)
                    }
                    $('.print-success-msg').show();
                    $('.print-success-msg').delay(3000).fadeOut('slow');
                    $('.print-success-msg').html("<div class='success'>" + resp['message'] + "</div>");

                    $(".totalCartItems").html(resp.totalCartItems);
                    $("#appendCartItems").html(resp.view);
                    $("#appendMiniCartItems").html(resp.minicartview);
                }
           },error:function (){
               alert("Error");
           }
       });
    });

    // Save Delivery Address
    $(document).on('click','#deliveryForm',function (){
        $(".loader").show();
        var formData = $("#deliveryAddressForm").serialize();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url:'/save-delivery-address',
            type:'post',
            data:formData,
            success:function (resp) {
                $(".loader").hide();
                if (resp.type=="error") {
                    $(".loader").hide();
                    $.each(resp.errors,function (i, error){
                       $('#delivery-'+i).attr('style','color:red');
                       $('#delivery-'+i).html(error);
                       setTimeout(function (){
                          $('#delivery-'+i).css({
                              'display':'none'
                          })
                       },3000);
                    });
                } else {
                    $(".loader").hide();
                    $("#deliveryAddressForm").trigger('reset');
                    $("#deliveryAddresses").html(resp.view);
                }
            }, error:function (){
                $(".loader").hide();
                alert("Error");
            }
        });
    });

    // Edit Delivery Address
    // $(document).on('click','.editAddress',function (){
    //    var addressid = $(this).data('addressid');
    //     $.ajax({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         },
    //         url:'/get-delivery-address',
    //         type:'post',
    //         data:{addressid:addressid},
    //         success:function (resp) {
    //             $('[name=delivery_id]').val(resp.address['id']);
    //             $('[name=delivery_name]').val(resp.address['name']);
    //             $('[name=delivery_address]').val(resp.address['address']);
    //             $('[name=provinces]').val(resp.address['provinces']);
    //             $('[name=districts]').val(resp.address['districts']);
    //             $('[name=wards]').val(resp.address['wards']);
    //             $('[name=delivery_mobile]').val(resp.address['mobile']);
    //         },error:function () {
    //             alert("Error");
    //         }
    //     });
    // });
    $(document).on('click', '.editAddress', function () {
        var addressid = $(this).data('addressid');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/get-delivery-address',
            type: 'post',
            data: { addressid: addressid },
            success: function (resp) {
                    // Điền thông tin cơ bản
                    $(".deliveryText").text("SỬA ĐỊA CHỈ GIAO HÀNG");
                    $('[name=delivery_id]').val(resp.address['id']);
                    $('[name=delivery_name]').val(resp.address['name']);
                    $('[name=delivery_address]').val(resp.address['address']);
                    $('[name=delivery_mobile]').val(resp.address['mobile']);
                    // Điền thông tin Tỉnh/Thành phố
                    $('[name=provinces]').val(resp.address['provinces']);
                    // Tải và điền thông tin Quận/Huyện dựa trên Tỉnh/Thành phố
                    getDistricts(resp.address['provinces'], resp.address['districts'], function() {
                        // Tải và điền thông tin Xã/Phường dựa trên Quận/Huyện
                        getWards(resp.address['districts'], resp.address['wards']);
                    });
            },
            error: function () {
                alert("Error retrieving address data");
            }
        });
    });

    // Hàm để tải và điền thông tin Quận/Huyện
    function getDistricts(provinceCode, selectedDistrict, callback) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/get-districts',  // Endpoint để lấy danh sách Quận/Huyện
            type: 'get',
            data: { province_code: provinceCode },
            success: function (response) {
                var districtSelect = $('[name=districts]');
                districtSelect.empty();
                districtSelect.append('<option selected value="">Chọn Quận/Huyện</option>');
                $.each(response.districts, function (index, district) {
                    districtSelect.append('<option value="' + district.code + '">' + district.name + '</option>');
                });
                districtSelect.val(selectedDistrict);

                if (callback) callback();
            }
        });
    }

    // Hàm để tải và điền thông tin Xã/Phường
    function getWards(districtCode, selectedWard) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/get-wards',  // Endpoint để lấy danh sách Xã/Phường
            type: 'get',
            data: { district_code: districtCode },
            success: function (response) {
                var wardSelect = $('[name=wards]');
                wardSelect.empty();
                wardSelect.append('<option selected value="">Chọn Xã/Phường</option>');
                $.each(response.wards, function (index, ward) {
                    wardSelect.append('<option value="' + ward.code + '">' + ward.name + '</option>');
                });
                wardSelect.val(selectedWard);
            }
        });
    }

    // Delete Delivery Address
    $(document).on('click','.deleteAddress',function (){
        if (confirm("Are you sure to remove this Address?")){
            var addressid = $(this).data('addressid');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {addressid:addressid},
                url:'remove-delivery-address',
                type:'post',
                success:function (resp){
                    $("#deliveryAddresses").html(resp.view);
                },error:function (){
                    alert("Error");
                }
            });
        }
    });

    // Set Default Delivery Address
    $(document).on('click','.setDefaultAddress',function (){
        var addressid = $(this).data('addressid');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {addressid:addressid},
            url:'/set-default-delivery-address',
            type:'post',
            success:function (resp){
                $("#deliveryAddresses").html(resp.view);
            },error:function (){
                alert("Error");
            }
        });
    });
});
