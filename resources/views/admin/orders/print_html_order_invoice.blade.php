<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>HOÁ ĐƠN ĐẶT HÀNG</title>

    <!-- Start Common CSS -->
    <style type="text/css">
        #outlook a {padding:0;}
        body{width:100% !important; -webkit-text-size-adjust:100%; -ms-text-size-adjust:100%; margin:0; padding:0; font-family: Helvetica, arial, sans-serif;}
        .ExternalClass {width:100%;}
        .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {line-height: 100%;}
        .backgroundTable {margin:0; padding:0; width:100% !important; line-height: 100% !important;}
        .main-temp table { border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt; font-family: Helvetica, arial, sans-serif;}
        .main-temp table td {border-collapse: collapse;}
    </style>
    <!-- End Common CSS -->
</head>
<body>
<table width="100%" cellpadding="0" cellspacing="0" border="0" class="backgroundTable main-temp" style="background-color: #d5d5d5;">
    <tbody>
    <tr>
        <td>
            <table width="600" align="center" cellpadding="15" cellspacing="0" border="0" class="devicewidth" style="background-color: #ffffff;">
                <tbody>
                <!-- Start header Section -->
                <tr>
                    <td style="padding-top: 30px;">
                        <table width="560" align="center" cellpadding="0" cellspacing="0" border="0" class="devicewidthinner" style="border-bottom: 1px solid #eeeeee; text-align: center;">
                            <tbody>
                            <tr>
                                <td style="font-size: 18px; line-height: 18px; color: #666666;">
                                    <h3>HOÁ ĐƠN ĐẶT HÀNG</h3>
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 14px; line-height: 18px; color: #666666;">
                                    DTSneaker.in
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 14px; line-height: 18px; color: #666666;">
                                    Phone: 111-222-3333 | Email: info@dtsneaker.com
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 14px; line-height: 18px; color: #666666; padding-bottom: 25px;">
                                    <strong>Order Number:</strong> {{ $orderDetails['id'] }} | <strong>Order Date:</strong> {{ date("F j,Y, g:i a", strtotime($orderDetails['created_at'])) }}
                                </td>
                            </tr>
                            <tr>
                                <td align="center" style="font-size: 14px; line-height: 18px; color: #666666; padding-bottom: 25px;">
                                    <?php echo DNS1D::getBarcodeHTML($orderDetails['id'], 'C39'); ?>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <!-- End header Section -->

                <!-- Start address Section -->
                <tr>
                    <td style="padding-top: 0;">
                        <table width="560" align="center" cellpadding="0" cellspacing="0" border="0" class="devicewidthinner" style="border-bottom: 1px solid #bbbbbb;">
                            <tbody>
                            <tr>
                                <td style="width: 55%; font-size: 16px; font-weight: bold; color: #666666; padding-bottom: 5px;">
                                    Delivery Adderss
                                </td>
{{--                                <td style="width: 45%; font-size: 16px; font-weight: bold; color: #666666; padding-bottom: 5px;">--}}
{{--                                    Billing Address--}}
{{--                                </td>--}}
                            </tr>
                            <tr>
                                <td style="width: 55%; font-size: 14px; line-height: 18px; color: #666666;">
                                    {{ $orderDetails['name'] }}
                                </td>
{{--                                <td style="width: 45%; font-size: 14px; line-height: 18px; color: #666666;">--}}
{{--                                    {{ $orderDetails['user']['name'] }}--}}
{{--                                </td>--}}
                            </tr>
                            <tr>
                                <td style="width: 55%; font-size: 14px; line-height: 18px; color: #666666;">
                                    {{ $orderDetails['address'] }}
                                </td>
{{--                                <td style="width: 45%; font-size: 14px; line-height: 18px; color: #666666;">--}}
{{--                                    {{ $orderDetails['user']['address'] }}--}}
{{--                                </td>--}}
                            </tr>
                            <tr>
                                <td style="width: 55%; font-size: 14px; line-height: 18px; color: #666666; padding-bottom: 10px;">
                                    {{ $orderDetails['ward']['full_name'] }}, {{ $orderDetails['district']['full_name'] }}, {{ $orderDetails['province']['full_name'] }}
                                </td>
{{--                                <td style="width: 45%; font-size: 14px; line-height: 18px; color: #666666; padding-bottom: 10px;">--}}
{{--                                    {{ $orderDetails['user']['ward']['full_name'] }}, {{ $orderDetails['user']['district']['full_name'] }}, {{ $orderDetails['user']['province']['full_name'] }}--}}
{{--                                </td>--}}
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <!-- End address Section -->

                <!-- Start product Section -->
                @php $total_price = 0; @endphp
                @foreach($orderDetails['orders_products'] as $order)
                    @php $total_price = $total_price + ($order['product_price'] * $order['product_qty']) @endphp
                    <tr>
                        <td style="padding-top: 0;">
                            <table width="560" align="center" cellpadding="0" cellspacing="0" border="0" class="devicewidthinner" style="border-bottom: 1px solid #eeeeee;">
                                <tbody>
                                <tr>
                                    <td rowspan="4" style="padding-right: 10px; padding-bottom: 10px;">
                                        @php $getProductImage = \App\Models\Product::getProductImage($order['product_id']) @endphp
                                        @if($getProductImage!="")
                                            <a target="_blank" href="{{ url('product/'.$order['product_id']) }}"><img style="height: 80px;" src="{{ asset('front/images/products/small/'.$getProductImage) }}" alt=""></a>
                                        @else
                                            <a target="_blank" href="{{ url('product/'.$order['product_id']) }}"><img style="height: 80px;" src="{{ asset('front/images/products/small/no-img.png') }}" alt=""></a>
                                        @endif
                                    </td>
                                    <td colspan="2" style="font-size: 14px; font-weight: bold; color: #666666; padding-bottom: 5px;">
                                        {{ $order['product_name'] }}
                                        ({{ $order['product_code'] }})
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-size: 14px; line-height: 18px; color: #757575; width: 440px;">
                                        Số lượng: {{ $order['product_qty'] }}
                                    </td>
                                    <td style="width: 130px;"></td>
                                </tr>
                                <tr>
                                    <td style="font-size: 14px; line-height: 18px; color: #757575;">
                                        Màu sắc:  {{ $order['product_color'] }}
                                    </td>
                                    <td style="font-size: 14px; line-height: 18px; color: #757575; text-align: right;">

                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-size: 14px; line-height: 18px; color: #757575; padding-bottom: 10px;">
                                        Kích cỡ: {{ $order['product_size'] }}
                                    </td>
                                    <td style="font-size: 14px; line-height: 18px; color: #757575; text-align: right; padding-bottom: 10px;">
                                        <b style="color: #666666;">
                                            ₫{{number_format($order['product_price'] * $order['product_qty'], 0, ',', '.')}}</b>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                @endforeach
                <!-- End product Section -->

                <!-- Start calculation Section -->
                <tr>
                    <td style="padding-top: 0;">
                        <table width="560" align="center" cellpadding="0" cellspacing="0" border="0" class="devicewidthinner" style="border-bottom: 1px solid #bbbbbb; margin-top: -5px;">
                            <tbody>
                            <tr>
                                <td rowspan="5" style="width: 55%;"></td>
                                <td style="font-size: 14px; line-height: 18px; color: #666666;">
                                    Tổng phụ:
                                </td>
                                <td style="font-size: 14px; line-height: 18px; color: #666666; width: 130px; text-align: right;">
                                    ₫{{number_format($total_price, 0, ',', '.')}}
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 14px; line-height: 18px; color: #666666; padding-bottom: 10px; border-bottom: 1px solid #eeeeee;">
                                    Phí vận chuyển:
                                </td>
                                <td style="font-size: 14px; line-height: 18px; color: #666666; padding-bottom: 10px; border-bottom: 1px solid #eeeeee; text-align: right;">
                                    ₫{{number_format($orderDetails['shipping_charges'], 0, ',', '.')}}
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 14px; font-weight: bold; line-height: 18px; color: #666666; padding-top: 10px;">
                                    Giảm giá
                                </td>
                                <td style="font-size: 14px; font-weight: bold; line-height: 18px; color: #666666; padding-top: 10px; text-align: right;">
                                    @if($orderDetails['coupon_amount']>0)
                                        ₫{{number_format($orderDetails['coupon_amount'], 0, ',', '.')}}
                                    @else
                                        ₫0
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 14px; font-weight: bold; line-height: 18px; color: #666666; padding-top: 10px;">
                                    Tổng tiền
                                </td>
                                <td style="font-size: 14px; font-weight: bold; line-height: 18px; color: #666666; padding-top: 10px; text-align: right;">
                                    ₫{{number_format($orderDetails['grand_total'], 0, ',', '.')}}
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                @if(!empty($orderDetails['order_notes']))
                    <tr>
                        <td style="padding: 0 10px;">
                            <table width="560" align="center" cellpadding="0" cellspacing="0" border="0" class="devicewidthinner">
                                <tbody>

                                <tr>
                                    <td colspan="2" style="width: 100%; text-align: center; font-style: italic; font-size: 13px; font-weight: 600; color: #666666; padding: 15px 0; border-top: 1px solid #eeeeee;">
                                        <b style="font-size: 14px;">Ghi chú:</b> {{ $orderDetails['order_notes'] }}
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                @endif
                <!-- End calculation Section -->

                <!-- Start payment method Section -->
                <!-- End payment method Section -->
                </tbody>
            </table>
        </td>
    </tr>
    </tbody>
</table>
</body>
</html>
