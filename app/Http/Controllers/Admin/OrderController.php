<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrdersLog;
use App\Models\OrderStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Dompdf\Dompdf;
use Dompdf\Options;


class OrderController extends Controller
{
    public function orders() {
        Session::put('page','orders');
        $orders = Order::with('orders_products','user')->orderBy('id','Desc')->get()->toArray();
//        dd($orders);
        return view('admin.orders.orders')->with(compact('orders'));
    }

    public function orderDetails($id) {
        $orderDetails = Order::with('orders_products','user.ward','user.district','user.province','ward','district','province','log')->where('id',$id)->first()->toArray();
//        dd($orderDetails);
        $orderStatuses = OrderStatus::where('status',1)->get()->toArray();
//        dd($orderStatuses);
        return view('admin.orders.order_detail')->with(compact('orderDetails','orderStatuses'));
    }

    public function updateOrderStatus(Request $request) {
        if ($request->isMethod('post')){
            $data = $request->all();
//            echo "<pre>"; print_r($data); die;

            // Update Order Status
            Order::where('id',$data['order_id'])->update(['order_status'=>$data['order_status']]);

            // Update Courier Name & Tracking Number
            if (!empty($data['courier_name']&&!empty($data['tracking_number']))){
                Order::where('id',$data['order_id'])->update(['courier_name'=>$data['courier_name'],'tracking_number'=>$data['tracking_number']]);

                // Send Order Shipped Email to Customer with Tracking Details
                $orderDetails = Order::with('orders_products','user.ward','user.district','user.province','ward','district','province')->where('id',$data['order_id'])->first()->toArray();

                // Send Order Shipped Email
                $email = $orderDetails['user']['email'];
                $messageData = [
                    'email' => $email,
                    'name' => $orderDetails['user']['email'],
                    'order_id' => $data['order_id'],
                    'order_status' => $data['order_status'],
                    'courier_name' => $data['courier_name'],
                    'tracking_number' => $data['tracking_number'],
                    'orderDetails' => $orderDetails
                ];
                Mail::send('emails.shipped_order',$messageData,function ($message) use($email){
                    $message->to($email)->subject('Order Shipped (Tracking Details) - DTSneaker');
                });
            }

            // Insert Order Status in Order Logs
            $log = new OrdersLog();
            $log->order_id = $data['order_id'];
            $log->order_status = $data['order_status'];
            $log->save();

            $message = "Order Stauts has been updated successfully!";
            return redirect()->back()->with('success_message',$message);
        }
    }

    public function printHTMLOrderInvoice($order_id){
        $orderDetails = Order::with('orders_products','user.ward','user.district','user.province','ward','district','province')->where('id',$order_id)->first()->toArray();
        return view('admin.orders.print_html_order_invoice')->with(compact('orderDetails'));
    }
//    public function printPDFOrderInvoice($order_id){
//        $orderDetails = Order::with('orders_products','user.ward','user.district','user.province','ward','district','province')->where('id',$order_id)->first()->toArray();
//
//        $output = '<!DOCTYPE html>
//                    <html lang="en">
//                      <head>
//                        <meta charset="utf-8">
//                        <title>Order Invoice</title>
//                        <style>
//                                body {
//                                    font-family: Arial, sans-serif;
//                                  }
//                               .clearfix:after {
//                                  content: "";
//                                  display: table;
//                                  clear: both;
//                                }
//
//                                a {
//                                  color: #5D6975;
//                                  text-decoration: underline;
//                                }
//
//                                body {
//                                  position: relative;
//                                  width: 21cm;
//                                  height: 29.7cm;
//                                  margin: 0 auto;
//                                  color: #001028;
//                                  background: #FFFFFF;
//                                  font-family: Arial, sans-serif;
//                                  font-size: 12px;
////                                  font-family: Arial;
//                                }
//
//                                header {
//                                  padding: 10px 0;
//                                  margin-bottom: 30px;
//                                }
//
//                                #logo {
//                                  text-align: center;
//                                  margin-bottom: 10px;
//                                }
//
//                                #logo img {
//                                  width: 90px;
//                                }
//
//                                h1 {
//                                  border-top: 1px solid  #5D6975;
//                                  border-bottom: 1px solid  #5D6975;
//                                  color: #5D6975;
//                                  font-size: 2.4em;
//                                  line-height: 1.4em;
//                                  font-weight: normal;
//                                  text-align: center;
//                                  margin: 0 0 20px 0;
//                                  background: url(dimension.png);
//                                }
//
//                                #project {
//                                  float: left;
//                                }
//
//                                #project span {
//                                  color: #5D6975;
//                                  text-align: right;
//                                  width: 52px;
//                                  margin-right: 10px;
//                                  display: inline-block;
//                                  font-size: 0.8em;
//                                }
//
//                                #company {
//                                  float: right;
//                                  text-align: right;
//                                }
//
//                                #project div,
//                                #company div {
//                                  white-space: nowrap;
//                                }
//
//                                table {
//                                  width: 100%;
//                                  border-collapse: collapse;
//                                  border-spacing: 0;
//                                  margin-bottom: 20px;
//                                }
//
//                                table tr:nth-child(2n-1) td {
//                                  background: #F5F5F5;
//                                }
//
//                                table th,
//                                table td {
//                                  text-align: center;
//                                }
//
//                                table th {
//                                  padding: 5px 20px;
//                                  color: #5D6975;
//                                  border-bottom: 1px solid #C1CED9;
//                                  white-space: nowrap;
//                                  font-weight: normal;
//                                }
//
//                                table .service,
//                                table .desc {
//                                  text-align: left;
//                                }
//
//                                table td {
//                                  padding: 20px;
//                                  text-align: right;
//                                }
//
//                                table td.service,
//                                table td.desc {
//                                  vertical-align: top;
//                                }
//
//                                table td.unit,
//                                table td.qty,
//                                table td.total {
//                                  font-size: 1.2em;
//                                }
//
//                                table td.grand {
//                                  border-top: 1px solid #5D6975;;
//                                }
//
//                                #notices .notice {
//                                  color: #5D6975;
//                                  font-size: 1.2em;
//                                }
//
//                                footer {
//                                  color: #5D6975;
//                                  width: 100%;
//                                  height: 30px;
//                                  position: absolute;
//                                  bottom: 0;
//                                  border-top: 1px solid #C1CED9;
//                                  padding: 8px 0;
//                                  text-align: center;
//                                }
//                        </style>
//                      </head>
//                      <body>
//                        <header class="clearfix">
//                          <h1>ORDER INVOICE</h1>
//                          <div id="company" class="clearfix">
//                            <div>DTSneaker.in</div>
//                            <div>111-222-3333</div>
//                            <div><a href="mailto:info@dtsneaker.com">info@dtsneaker.com</a></div>
//                          </div>
//                          <div id="project">
//                            <div><span>Order Number</span> '.$orderDetails['id'].'</div>
//                            <div><span>DATE</span> '.$orderDetails['created_at'].'</div>
//                            <div><span>Delivery Address</span> '.$orderDetails['name'].', '.$orderDetails['address'].', '.$orderDetails['ward']['full_name'].', '.$orderDetails['district']['full_name'].', '.$orderDetails['province']['full_name'].'</div>
//                          </div>
//                        </header>
//                        <main>
//                          <table>
//                            <thead>
//                              <tr>
//                                <th class="service">Product</th>
//                                <th class="desc">Size</th>
//                                <th>Color</th>
//                                <th>Quantity</th>
//                                <th>Unit Price</th>
//                                <th>Total</th>
//                              </tr>
//                            </thead>';
//                                $total_price = 0;
//                                foreach($orderDetails['orders_products'] as $order) {
//                                    $total_price = $total_price + ($order['product_price'] * $order['product_qty']);
//                                $output .= '<tbody>
//                                  <tr>
//                                    <td class="desc">' . $order['product_name'] . ' (' . $order['product_code'] . ')</td>
//                                    <td class="desc">' . $order['product_size'] . '</td>
//                                    <td class="desc">' . $order['product_color'] . '</td>
//                                    <td align="center" class="desc">' . $order['product_qty'] . '</td>
//                                    <td class="desc">₫' . number_format($order['product_price'], 0, ',', '.') . '</td>
//                                    <td class="desc">₫' . number_format($order['product_price'] * $order['product_qty'], 0, ',', '.') . '</td>
//                                  </tr>';
//                                }
//                            $discount = $orderDetails['coupon_amount'] ?? 0;
//                            $grand_total = $total_price - $discount;
//
//                            $output .= '<tr>
//                                      <td colspan="4">SUBTOTAL</td>
//                                      <td class="total">₫' . number_format($total_price, 0, ',', '.') . '</td>
//                                    </tr>
//                                    <tr>
//                                      <td colspan="4">SHIPPING CHARGES</td>
//                                      <td class="total">0</td>
//                                    </tr>
//                                    <tr>
//                                      <td colspan="4">DISCOUNT</td>
//                                      <td class="total">' . number_format($discount, 0, ',', '.') . '</td>
//                                    </tr>
//                                    <tr>
//                                      <td colspan="4" class="grand total">GRAND TOTAL</td>
//                                      <td class="grand total">₫' . number_format($grand_total, 0, ',', '.') . '</td>
//                                    </tr>
//                                  </tbody>
//                                </table>
//                                <div id="notices">
//                                  <div>NOTICE:</div>
//                                  <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
//                                </div>
//                              </main>
//                              <footer>
//                                Invoice was created on a computer and is valid without the signature and seal.
//                              </footer>
//                            </body>
//                          </html>';
//
//        // instantiate and use the dompdf class
//        $dompdf = new Dompdf();
//        $dompdf->loadHtml($output);
//
//        // (Optional) Setup the paper size and orientation
//        $dompdf->setPaper('A4', 'landscape');
//
//        // Render the HTML as PDF
//        $dompdf->render();
//
//        // Output the generated PDF to Browser
//        $dompdf->stream();
//    }


    public function printPDFOrderInvoice($order_id){
        $orderDetails = Order::with('orders_products', 'user.ward', 'user.district', 'user.province', 'ward', 'district', 'province')
            ->where('id', $order_id)
            ->first()
            ->toArray();

        // Cấu hình Dompdf để sử dụng phông chữ hỗ trợ Unicode
        $options = new Options();
        $options->set('defaultFont', 'DejaVu Sans');
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);
        $dompdf = new Dompdf($options);

        // Đảm bảo rằng đầu ra HTML sử dụng mã hóa UTF-8
        $output = '<!DOCTYPE html>
                <html lang="en">
                  <head>
                    <meta charset="utf-8">
                    <title>Order Invoice</title>
                    <style>
                      body {
                        font-family: "DejaVu Sans", sans-serif;
                      }
                      .clearfix:after {
                        content: "";
                        display: table;
                        clear: both;
                      }

                      a {
                        color: #5D6975;
                        text-decoration: underline;
                      }

                      body {
                        position: relative;
                        width: 21cm;
                        height: 29.7cm;
                        margin: 0 auto;
                        color: #001028;
                        background: #FFFFFF;
                        font-size: 12px;
                      }

                      header {
                        padding: 10px 0;
                        margin-bottom: 30px;
                      }

                      #logo {
                        text-align: center;
                        margin-bottom: 10px;
                      }

                      #logo img {
                        width: 90px;
                      }

                      h1 {
                        border-top: 1px solid  #5D6975;
                        border-bottom: 1px solid  #5D6975;
                        color: #5D6975;
                        font-size: 2.4em;
                        line-height: 1.4em;
                        font-weight: normal;
                        text-align: center;
                        margin: 0 0 20px 0;
                        background: url(dimension.png);
                      }

                      #project {
                        float: left;
                      }

                      #project span {
                        color: #5D6975;
                        text-align: right;
                        width: 52px;
                        margin-right: 10px;
                        display: inline-block;
                        font-size: 0.8em;
                      }

                      #company {
                        float: right;
                        text-align: right;
                      }

                      #project div,
                      #company div {
                        white-space: nowrap;
                      }

                      table {
                        width: 100%;
                        border-collapse: collapse;
                        border-spacing: 0;
                        margin-bottom: 20px;
                      }

                      table tr:nth-child(2n-1) td {
                        background: #F5F5F5;
                      }

                      table th,
                      table td {
                        text-align: center;
                      }

                      table th {
                        padding: 5px 20px;
                        color: #5D6975;
                        border-bottom: 1px solid #C1CED9;
                        white-space: nowrap;
                        font-weight: normal;
                      }

                      table .service,
                      table .desc {
                        text-align: left;
                      }

                      table td {
                        padding: 20px;
                        text-align: right;
                      }

                      table td.service,
                      table td.desc {
                        vertical-align: top;
                      }

                      table td.unit,
                      table td.qty,
                      table td.total {
                        font-size: 1.2em;
                      }

                      table td.grand {
                        border-top: 1px solid #5D6975;;
                      }

                      #notices .notice {
                        color: #5D6975;
                        font-size: 1.2em;
                      }

                      footer {
                        color: #5D6975;
                        width: 100%;
                        height: 30px;
                        position: absolute;
                        bottom: 0;
                        border-top: 1px solid #C1CED9;
                        padding: 8px 0;
                        text-align: center;
                      }
                    </style>
                  </head>
                  <body>
                    <header class="clearfix">
                      <h1>ORDER INVOICE</h1>
                      <div id="company" class="clearfix">
                        <div>DTSneaker.in</div>
                        <div>111-222-3333</div>
                        <div><a href="mailto:info@dtsneaker.com">info@dtsneaker.com</a></div>
                      </div>
                      <div id="project">
                        <div><span>Order Number</span> ' . htmlspecialchars($orderDetails['id'], ENT_QUOTES, 'UTF-8') . '</div>
                        <div><span>DATE</span> ' . date("F j,Y, g:i a", strtotime($orderDetails['created_at'])) . '</div>
                        <div><span>Delivery Address</span> ' . htmlspecialchars($orderDetails['name'], ENT_QUOTES, 'UTF-8') . ', ' . htmlspecialchars($orderDetails['address'], ENT_QUOTES, 'UTF-8') . ', ' . htmlspecialchars($orderDetails['ward']['full_name'], ENT_QUOTES, 'UTF-8') . ', ' . htmlspecialchars($orderDetails['district']['full_name'], ENT_QUOTES, 'UTF-8') . ', ' . htmlspecialchars($orderDetails['province']['full_name'], ENT_QUOTES, 'UTF-8') . '</div>
                      </div>
                    </header>
                    <main>
                      <table>
                        <thead>
                          <tr>
                            <th class="service">Product</th>
                            <th class="desc">Size</th>
                            <th>Color</th>
                            <th>Quantity</th>
                            <th>Unit Price</th>
                            <th>Total</th>
                          </tr>
                        </thead>
                        <tbody>';

        $total_price = 0;
        foreach($orderDetails['orders_products'] as $order) {
            $product_total = $order['product_price'] * $order['product_qty'];
            $total_price += $product_total;
            $output .= '<tr>
                      <td class="desc">' . htmlspecialchars($order['product_name'], ENT_QUOTES, 'UTF-8') . ' (' . htmlspecialchars($order['product_code'], ENT_QUOTES, 'UTF-8') . ')</td>
                      <td class="desc">' . htmlspecialchars($order['product_size'], ENT_QUOTES, 'UTF-8') . '</td>
                      <td class="desc">' . htmlspecialchars($order['product_color'], ENT_QUOTES, 'UTF-8') . '</td>
                      <td class="desc">' . htmlspecialchars($order['product_qty'], ENT_QUOTES, 'UTF-8') . '</td>
                      <td class="desc">₫' . number_format($order['product_price'], 0, ',', '.') . '</td>
                      <td class="desc">₫' . number_format($product_total, 0, ',', '.') . '</td>
                    </tr>';
        }

        $discount = $orderDetails['coupon_amount'] ?? 0;
        $grand_total = $total_price - $discount;

        $output .= '<tr>
                  <td colspan="5">SUBTOTAL</td>
                  <td class="total">₫' . number_format($total_price, 0, ',', '.') . '</td>
                </tr>
                <tr>
                  <td colspan="5">SHIPPING CHARGES</td>
                  <td class="total">₫0</td>
                </tr>
                <tr>
                  <td colspan="5">DISCOUNT</td>
                  <td class="total">₫' . number_format($discount, 0, ',', '.') . '</td>
                </tr>
                <tr>
                  <td colspan="5" class="grand total">GRAND TOTAL</td>
                  <td class="grand total">₫' . number_format($grand_total, 0, ',', '.') . '</td>
                </tr>
              </tbody>
            </table>
            <div id="notices">
              <div>NOTICE:</div>
              <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
            </div>
          </main>
          <footer>
            Invoice was created on a computer and is valid without the signature and seal.
          </footer>
        </body>
      </html>';

        // Sử dụng dompdf để tạo PDF
        $dompdf->loadHtml($output);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream();
    }


}
