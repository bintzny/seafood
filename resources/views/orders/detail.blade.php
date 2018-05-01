@extends('layouts.app')
@section('title', 'SETTING')
@section('acsetting', 'active')
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header">
                    <a href="" type="button" class="btn btn-info">รายออร์ดอร์</a>
                </div>
                <div class="card-body no-padding">

                    <div class="table-responsive">
                        <table class="table table-shopping">
                            <thead>
                            <tr>
                                <th class="text-center"></th>
                                <th >สินค้า</th>
                                <th class="text-right">ราคา</th>
                                <th class="text-right">จำนวน</th>
                                <th class="text-right">ราคารวมสินค้า</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orderDetail as $orderDetails)
                                <tr class="text-right">
                                    <td>
                                        <div class="img-container">
                                            <img class="img-responsive img-rounded" style="height: 200px" src="{{ asset('productImage_resize/'.$orderDetails->products->productImage) }}" >
                                        </div>
                                    </td>
                                    <td class="td-name">
                                        <a href="">{{ $orderDetails->products->productName }}</a>
                                        <br /><small>{{ $orderDetails->products->productCategory }} </small>
                                    </td>
                                    <td class="td-number">
                                        <small>฿</small>{{ number_format($orderDetails->products->productPrice,2) }}
                                    </td>
                                    <td class="td-number">
                                        {{ $orderDetails->detailQuantity }}
                                    </td>
                                    <td class="td-number">
                                        <small>฿</small>{{ number_format($orderDetails->detailTotal,2) }}
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="4"> ราคารวมทั้งหมด :</td>
                                <td colspan="1" class="text-right">
                                    <b>    <span class="text-danger">{{ number_format($order->orderTotal,2) }} </span> บาท</b>
                                </td>
                            </tr>

                            </tbody>
                        </table>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-shopping">
                            <thead>
                            </thead>
                            <tbody>
                            <tr>
                                <td  colspan="1" ></td>
                                <td colspan="1" class="text-center">
                                    @if($order->orderStatus == 0)
                                        <span class="label label-danger">ยังไม่ได้ชำระเงิน</span>
                                    @elseif($order->orderStatus == 1)
                                        <span class="label label-success">ชำระเงินเรียบร้อย</span>
                                    @else
                                        <span class="label label-warning">รอการดำเนินการ</span>
                                    @endif
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
        @if($order->orderPaymentImage != null)
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="card card-product">
                    <div class="card-image" >
                        <a href="#pablo">
                            <center>
                            <img class="img img-responsive"  src="{{ asset('paymentsImg/'.$order->orderPaymentImage) }}">
                            </center>
                        </a>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title">
                            <center>
                            <b class="text-success">หลักฐานการชำระเงิน</b>
                            </center>
                        </h4>
                        <div class="card-description">
                            <center>
                            <b>ของผู้ใช้ : </b>  {{ $order->user->name }}
                            </center>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-4"></div>
        @else

            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="card card-product">
                    <div class="card-content">
                        <h4 class="card-title text-danger">
                            <center>
                            <b> ยังไม่มีหลักฐานการชำระเงิน</b>
                            </center>
                        </h4>
                    </div>

                </div>
            </div>
            <div class="col-md-4"></div>

        @endif

    </div>
@endsection
@section('script')

@endsection
