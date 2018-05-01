@extends('layouts.fontend-new')

@section('content')


    <div class="table-responsive">
        <table class="table table-shopping">
            <thead>
            <tr>
                <th class="text-right"></th>
                <th></th>
                <th></th>
                <th >สินค้า</th>
                <th class="text-right">ราคา</th>
                <th class="text-right">จำนวน</th>
                <th class="text-right">ราคารวมสินค้า</th>
              
            </tr>
            </thead>
            <tbody>
            @foreach($orderDetail as $orderDetails)
                <tr  class="text-right">
                    <td>
                        <div class="img-container">
                            <img class="img-responsive img-rounded" style="height: 140px" src="{{ asset('productImage_resize/'.$orderDetails->products->productImage) }}" >
                        </div>
                    </td>
                    <td></td>
                    <td></td>
                    <td class="td-name">
                        <b>{{ $orderDetails->products->productName }}</b>
                    </td>
                    <td class="td-number">
                            <small>฿</small>{{ number_format($orderDetails->products->productPrice,2) }}
                    </td>
                    <td class="td-number">
                        {{ $orderDetails->detailQuantity }}
                    </td>
                    <td class="td-number">

                            <small>฿</small>{{ number_format($orderDetails->detailTotal) }}
                    </td>
                </tr>
            @endforeach
            <tr>
                <td colspan="5">
                    @if($order->orderStatus == 0)
                        <span class="label label-danger">ยังไม่ได้ชำระเงิน</span>
                    @elseif($order->orderStatus == 1)
                        <span class="label label-success">ชำระเงินเรียบร้อย</span>
                    @else
                        <span class="label label-warning">รอการดำเนินการ</span>
                    @endif
                </td>
                <td colspan="10">
                    <b>  ราคารวม :  <span class="text-danger">{{ number_format($order->orderTotal,2) }} </span> บาท</b>
                </td>
            </tr>

            </tbody>
        </table>
    </div>

    <div style="height: 30vh"></div>
@endsection


