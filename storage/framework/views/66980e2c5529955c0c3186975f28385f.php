<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Email Template for Order Confirmation Email</title>

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
                                <td style="padding-bottom: 10px;">
                                    <a href="https://htmlcodex.com"><img src="<?php echo e(asset('front/images/logo/logo_dt.png')); ?>" /></a>
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 14px; line-height: 18px; color: #666666;">
                                    DTSneaker.in
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 14px; line-height: 18px; color: #666666;">
                                    Da Nang, Viet Nam
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 14px; line-height: 18px; color: #666666;">
                                    Phone: 111-222-3333 | Email: info@dtsneaker.com
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 14px; line-height: 18px; color: #666666; padding-bottom: 25px;">
                                    <strong>Order Number:</strong> <?php echo e($order_id); ?> | <strong>Order Date:</strong> <?php echo e(date("F j,Y, g:i a", strtotime($orderDetails['created_at']))); ?>

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



                            </tr>
                            <tr>
                                <td style="width: 55%; font-size: 14px; line-height: 18px; color: #666666;">
                                    <?php echo e($orderDetails['name']); ?>

                                </td>



                            </tr>
                            <tr>
                                <td style="width: 55%; font-size: 14px; line-height: 18px; color: #666666;">
                                    <?php echo e($orderDetails['address']); ?>

                                </td>



                            </tr>
                            <tr>
                                <td style="width: 55%; font-size: 14px; line-height: 18px; color: #666666; padding-bottom: 10px;">
                                    <?php echo e($orderDetails['ward']['full_name']); ?>, <?php echo e($orderDetails['district']['full_name']); ?>, <?php echo e($orderDetails['province']['full_name']); ?>

                                </td>



                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <!-- End address Section -->

                <!-- Start product Section -->
                <?php $total_price = 0; ?>
                <?php $__currentLoopData = $orderDetails['orders_products']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $total_price = $total_price + ($order['product_price'] * $order['product_qty']) ?>
                    <tr>
                        <td style="padding-top: 0;">
                            <table width="560" align="center" cellpadding="0" cellspacing="0" border="0" class="devicewidthinner" style="border-bottom: 1px solid #eeeeee;">
                                <tbody>
                                <tr>
                                    <td rowspan="4" style="padding-right: 10px; padding-bottom: 10px;">
                                        <?php $getProductImage = \App\Models\Product::getProductImage($order['product_id']) ?>
                                        <?php if($getProductImage!=""): ?>
                                            <a target="_blank" href="<?php echo e(url('product/'.$order['product_id'])); ?>"><img style="height: 80px;" src="<?php echo e(asset('front/images/products/small/'.$getProductImage)); ?>" alt=""></a>
                                        <?php else: ?>
                                            <a target="_blank" href="<?php echo e(url('product/'.$order['product_id'])); ?>"><img style="height: 80px;" src="<?php echo e(asset('front/images/products/small/no-img.png')); ?>" alt=""></a>
                                        <?php endif; ?>
                                    </td>
                                    <td colspan="2" style="font-size: 14px; font-weight: bold; color: #666666; padding-bottom: 5px;">
                                        <?php echo e($order['product_name']); ?>

                                        (<?php echo e($order['product_code']); ?>)
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-size: 14px; line-height: 18px; color: #757575; width: 440px;">
                                        Quantity: <?php echo e($order['product_qty']); ?>

                                    </td>
                                    <td style="width: 130px;"></td>
                                </tr>
                                <tr>
                                    <td style="font-size: 14px; line-height: 18px; color: #757575;">
                                        Color:  <?php echo e($order['product_color']); ?>

                                    </td>
                                    <td style="font-size: 14px; line-height: 18px; color: #757575; text-align: right;">

                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-size: 14px; line-height: 18px; color: #757575; padding-bottom: 10px;">
                                        Size: <?php echo e($order['product_size']); ?>

                                    </td>
                                    <td style="font-size: 14px; line-height: 18px; color: #757575; text-align: right; padding-bottom: 10px;">
                                        <b style="color: #666666;">
                                            ₫<?php echo e(number_format($order['product_price'] * $order['product_qty'], 0, ',', '.')); ?></b> Total
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <!-- End product Section -->

                <!-- Start calculation Section -->
                <tr>
                    <td style="padding-top: 0;">
                        <table width="560" align="center" cellpadding="0" cellspacing="0" border="0" class="devicewidthinner" style="border-bottom: 1px solid #bbbbbb; margin-top: -5px;">
                            <tbody>
                            <tr>
                                <td rowspan="5" style="width: 55%;"></td>
                                <td style="font-size: 14px; line-height: 18px; color: #666666;">
                                    Sub-Total:
                                </td>
                                <td style="font-size: 14px; line-height: 18px; color: #666666; width: 130px; text-align: right;">
                                    ₫<?php echo e(number_format($total_price, 0, ',', '.')); ?>

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 14px; line-height: 18px; color: #666666; padding-bottom: 10px; border-bottom: 1px solid #eeeeee;">
                                    Shipping Fee:
                                </td>
                                <td style="font-size: 14px; line-height: 18px; color: #666666; padding-bottom: 10px; border-bottom: 1px solid #eeeeee; text-align: right;">
                                    ₫<?php echo e(number_format($orderDetails['shipping_charges'], 0, ',', '.')); ?>

                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 14px; font-weight: bold; line-height: 18px; color: #666666; padding-top: 10px;">
                                    Coupon Discount
                                </td>
                                <td style="font-size: 14px; font-weight: bold; line-height: 18px; color: #666666; padding-top: 10px; text-align: right;">
                                    <?php if($orderDetails['coupon_amount']>0): ?>
                                        ₫<?php echo e(number_format($orderDetails['coupon_amount'], 0, ',', '.')); ?>

                                    <?php else: ?>
                                        ₫0
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 14px; font-weight: bold; line-height: 18px; color: #666666; padding-top: 10px;">
                                    Order Total
                                </td>
                                <td style="font-size: 14px; font-weight: bold; line-height: 18px; color: #666666; padding-top: 10px; text-align: right;">
                                    ₫<?php echo e(number_format($orderDetails['grand_total'], 0, ',', '.')); ?>

                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <?php if(!empty($orderDetails['order_notes'])): ?>
                <tr>
                    <td style="padding: 0 10px;">
                        <table width="560" align="center" cellpadding="0" cellspacing="0" border="0" class="devicewidthinner">
                            <tbody>

                            <tr>
                                <td colspan="2" style="width: 100%; text-align: center; font-style: italic; font-size: 13px; font-weight: 600; color: #666666; padding: 15px 0; border-top: 1px solid #eeeeee;">
                                    <b style="font-size: 14px;">Note:</b> <?php echo e($orderDetails['order_notes']); ?>

                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <?php endif; ?>
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
<?php /**PATH D:\xampp\htdocs\dt_shop-v2\resources\views/emails/order.blade.php ENDPATH**/ ?>