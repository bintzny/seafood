
<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link type="text/css" media="all"  href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" >


    <style>
        @font-face {
            font-family: 'THSarabunNew';
            font-style: normal;
            font-weight: normal;
            src: url("file://{{ public_path('fonts/THSarabunNew.ttf') }}") format('truetype');

        }
        @font-face {
            font-family: 'THSarabunNew';
            font-style: normal;
            font-weight: bold;
            src: url("file://{{ public_path('fonts/THSarabunNew Bold.ttf') }}") format('truetype');
        }
        @font-face {
            font-family: 'THSarabunNew';
            font-style: italic;
            font-weight: normal;
            src: url("file://{{ public_path('fonts/THSarabunNew Italic.ttf') }}") format('truetype');
        }
        @font-face {
            font-family: 'THSarabunNew';
            font-style: italic;
            font-weight: bold;
            src: url("file://{{ public_path('fonts/THSarabunNew BoldItalic.ttf') }}") format('truetype');
        }

        body {
            font-family: "THSarabunNew";
        }
    </style>

    <title>profilesOrder</title>

</head>
<body>


    <div class="container">
               <center> <b style="font-size: 20px"> รายงานใบสั่งซื้อ</b></center>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table table-bordered">
                            <thead>
                            <tr>
                                <th >สินค้า</th>
                                <th class="text-right">ราคา</th>
                                <th class="text-right">จำนวน</th>
                                <th class="text-right">ราคารวมสินค้า</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orderDetail as $orderDetails)
                                <tr>
                                    <td>
                                        {{ $orderDetails->products->productName }}
                                    </td>
                                    <td>
                                            <small>฿</small>{{ number_format($orderDetails->products->productPrice,2) }}
                                    </td>
                                    <td class="td-number">
                                        {{ $orderDetails->detailQuantity }}
                                    </td>
                                    <td >
                                            <small>฿</small>{{ number_format($orderDetails->detailTotal) }}
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
<div class="row">


                        {{--<div class="col-md-12">--}}
                            {{--<div class="panel panel-default">--}}
                                {{--<div class="panel-heading">--}}
                                    {{--<b class="panel-title"><center>ประเภทการส่ง   -    เรตการส่ง </center></b>--}}
                                {{--</div>--}}
                                {{--<div class="panel-body">--}}
                                    {{--<div class="pull-left">--}}
                                        {{--<b>{{  $order->transport->transportCategoryName }}</b>--}}
                                        {{--<b>{{ number_format($order->transport->transportCategoryPrice,2) }} บาท</b>--}}
                                            {{--<b>เวลาจัดส่ง</b> {{ $order->transport->transportCategoryDuration }} วัน--}}
                                    {{--</div>--}}

                                    {{--<div class="pull-right">--}}
                                        {{--<b>{{  $rate->transportRateName }} กิโลกรัม </b>--}}
                                        {{--<b>{{ number_format($rate->transportRatePrice,2) }} บาท</b>--}}
                                    {{--</div>--}}

                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
</div>
                    <div class="row">
                        <div class="col-md-12">

                                <div class="row">
                                    <div class="pull-left">

                                                <b >ที่อยู่การจัดส่ง</b>
                                                <ul class="list-unstyled">
                                                    <li><b>เลขที่ :</b> &nbsp;{{ $order->user->address }} &nbsp;</li>
                                                </ul>
                                            </div>
                                    <div class="pull-right">

                                                <b>บัญชีการชำระเงิน</b>
                                                <ul class="list-unstyled">
                                                    <li><b>เลขที่บัญชี :</b> {{ $order->user->paymentCodeBank  }}</li>
                                                    <li><b>ธนาคาร :</b> {{ $order->user->paymentBank  }}</li>
                                                </ul>
                                            </div>

                                </div>




                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-shopping">
                            <thead>
                            </thead>
                            <tbody>
                            <tr>
                                <td  colspan="" > </td>
                                <td class="td-total">
                                   <b> ราคารวมทั้งหมด</b>
                                </td>
                                <td>
                                    <b><small>฿</small>{{ number_format($order->orderTotal,2) }}</b>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>



</body>
</html>




