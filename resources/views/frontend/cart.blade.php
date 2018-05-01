@extends('layouts.fontend-new')

@section('content')
    <table class="datatable table table-striped primary">
        <h2 class="text-center">รายการสั่งซื้อสินค้า</h2><br><br>
        <thead>
        <tr style="font-size: 13px">
            <th>รูปภาพสินค้า</th>
            <th>รหัสสินค้า</th>
            <th>ชื่อสินค้า</th>
            <th>จำนวนสินค้า</th>
            <th></th>
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
                    </td>
                    <td>

                        <div class="btn-group">
                            <a href="{{ route('product.cartRemoveItem', ['id'=> $product['item']['id']]) }}" class="btn btn-round btn-info btn-xs"> <i class="material-icons">remove</i> </a>
                            <a href="{{ route('product.cartAddItem', ['id'=> $product['item']['id']]) }}" class="btn btn-round btn-info btn-xs"> <i class="material-icons">add</i> </a>
                        </div>
                    </td>
                    <td>{{ $product['item']['productPrice']  }}</td>
                  <td>  <a style="color: #fff;" href="{{ route('product.cartDeleteItem', ['id'=> $product['item']['id']]) }}"
                           rel="tooltip" data-placement="left" title="Remove item" class="btn btn-warning">
                          <i class="material-icons">delete_forever</i>
                      </a></td>
                </tr>
            @endforeach
            <tr>
                <td colspan="5">

                </td>
                <td>
                    <h4><small>ราคารวม฿</small></h4><span style="color: red;">{{ number_format($totalPrice,2) }}</span>
                </td>
                <td colspan="2" class="text-right"> <a href="{{ url('transport') }}" class="btn btn-success btn-round">การจัดส่ง <i class="material-icons">keyboard_arrow_right</i></a></td>
            </tr>
        @endif
        </tbody>
    </table>
    <div style="height: 30vh"></div>
@endsection