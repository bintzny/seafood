@extends('layouts.fontend-new')

@section('content')
    <table class="datatable table table-striped primary">
        <h2 class="text-center">รายการสั่งซื้อสินค้าและที่อยู่</h2><br><br>
        <thead>
        <tr>
            <th>รูปภาพสินค้า</th>
            <th>รหัสสินค้า</th>
            <th>ชื่อสินค้า</th>
            <th>จำนวนสินค้า</th>
            <th>ราคาสินค้า</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @if(Session::has('cart'))
            @foreach($products as $product)
                <tr>
                    <td><img src="{{ asset('productImage_resize/'.$product['item']['productImage'] ) }}"
                             class="img-responsive img-circle" style="height: 150px"  alt=""></td>
                    <td>{{ $product['item']['productCode']  }}</td>
                    <td>{{ $product['item']['productName']  }}</td>
                    <td>{{ $product['qty']  }}
                        <div class="btn-group">
                            <a href="{{ route('product.cartRemoveItem', ['id'=> $product['item']['id']]) }}" class="btn btn-round btn-info btn-xs"> <i class="material-icons">remove</i> </a>
                            <a href="{{ route('product.cartAddItem', ['id'=> $product['item']['id']]) }}" class="btn btn-round btn-info btn-xs"> <i class="material-icons">add</i> </a>
                        </div>
                    </td>
                    <td>{{ $product['item']['productPrice']  }}</td>
                    <td>  <a href="{{ route('product.cartDeleteItem', ['id'=> $product['item']['id']]) }}"
                             rel="tooltip" data-placement="left" title="Remove item" class="btn btn-danger">
                            <i class="material-icons">delete_forever</i>
                        </a></td>
                    <td></td>
                </tr>
            @endforeach
            <tr>
                <td colspan="5">
                    <p> ที่อยู่: <span class="text-primary">{{ Auth::user()->address }}</span></p>
                    <p> ธนาคาร: <span class="text-primary">{{ Auth::user()->paymentBank }}</span></p>
                    <p> เลขบัญชี: <span class="text-primary">{{ Auth::user()->paymentCodeBank }}</span></p>
                </td>
                <td>
                    <h4><small>ราคารวม฿</small></h4><span style="color: red">{{ number_format($totalPrice,2) }}</span>
                </td>
            </tr>
        @endif
        </tbody>
    </table>
    <div style="height: 30vh"></div>
@endsection

@section('content2')




<center>
    <div class="col-md-4"></div>
    <div class="col-md-4">
        {!! Form::open(['url' => '/order']) !!}
        {{ csrf_field() }}
        {{ Form::hidden('totalAll',$totalPrice) }}
        <div class="modal-footer text-center">
            <button type="submit" class="btn bnt-lg btn-block btn-danger btn-round">ยืนยันการสั่งซื้อ</button>
        </div>
        {!! Form::close() !!}
    </div>

    <div class="col-md-4"></div>
</center>


    @endsection