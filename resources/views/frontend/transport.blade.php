@extends('layouts.fontend-new')

@section('content')

    <table class="datatable table table-striped primary">
        <h2 class="text-center">รายการสั่งซื้อสินค้า</h2><br><br>
        <thead>
        <tr>
            <th>รูปภาพสินค้า</th>
            <th>รหัสสินค้า</th>
            <th>ชื่อสินค้า</th>
            <th>จำนวนสินค้า</th>
            <th>ราคาสินค้า</th>
            <th></th>
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
                    <td>{{ $product['qty'] }}</td>
                    <td>{{ $product['item']['productPrice']  }}</td>
                    <td></td>
                </tr>
            @endforeach
            <tr>
                <td colspan="5">

                </td>
                <td>
                    <h4><small>ราคารวม฿</small></h4>{{ number_format($totalPrice,2) }}
                </td>
            </tr>
        @endif
        </tbody>
    </table>

    <div style="height: 30vh"></div>
@endsection


@section('content2')





  <div class="col-lg-9">

    <center>
        {!! Form::open(['url' => '/transport']) !!}
        {{ csrf_field() }}
        <div class="form-group label-floating {{ $errors->has('address') ? 'has-error' : '' }}">
            <label class="control-label">
                ที่อยู่การส่ง
                <small>*</small>
            </label>
            {{ Form::textarea('address',Auth::user()->address,['class'=>'form-control','required'=> '']) }}
            @if ($errors->has('address'))
                <span class="help-block text">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
            @endif
        </div>
        <h3>การชำระเงิน</h3>

        <div class="col-md-6">

            <div class="form-group label-floating {{ $errors->has('paymentCodeBank') ? 'has-error' : '' }}">
                <label class="control-label">
                    เลขบัญชี
                    <small>*</small>
                </label>
                {{ Form::text('paymentCodeBank',Auth::user()->paymentCodeBank,['class'=>'form-control','maxlength' => '10' ,'pattern'=> "([0-9]{10})",'required'=> '']) }}
                @if ($errors->has('paymentCodeBank'))
                    <span class="help-block text">
                                        <strong>{{ $errors->first('paymentCodeBank') }}</strong>
                                    </span>
                @endif
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group label-floating {{ $errors->has('paymentBank') ? 'has-error' : '' }}">
                <select class="form-control" name="paymentBank" >
                    <option selected="selected">{{Auth::user()->paymentBank}}</option>
                    <option>ธนาคารกสิกรไทย</option>
                    <option>ธนาคารไทยพาณิชย์</option>
                    <option>ธนาคารกรุงไทย</option>
                    <option>ธนาคารกรุงศรีอยุธยา</option>
                    <option>ธนาคารกรุงเทพ</option>
                    <option>ธนาคารทหารไทย</option>
                    <option>ธนาคารยูโอบี</option>
                    <option>ธนาคารออมสิน</option>
                    <option>ธนาคารธนชาติ</option>
                    <option>ธนาคารเกียรตินาคิน</option>
                    <option>ธนาคารสแตนดาร์ดชาร์เตอร์ด (ไทย)</option>
                    <option>ธนาคารซีไอเอ็มบีไทย</option>
                    <option>ธนาคารทิสโก้</option>
                    <option>ธนาคารไทยเครดิตเพื่อรายย่อย</option>
                    <option>ธนาคารแลนด์ แอนด์ เฮาส์</option>
                    <option>ธนาคารอาคารสงเคราะห์</option>
                    <option>ธนาคารอิสลามแห่งประเทศไทย</option>
                    <option>ธนาคารเพื่อการส่งออกและนำเข้าแห่งประเทศไทย</option>
                    <option>ธนาคารเพื่อการเกษตรและสหกรณ์การเกษตร</option>
                    <option>ธนาคารพัฒนาวิสาหกิจขนาดกลางและขนาดย่อมแห่งประเทศไทย</option>
                    <option>	ธนาคารแลนด์ แอนด์ เฮาส์</option>
                </select>
            </div>

        </div>




        <div class="modal-footer text-center">
            <button type="submit" class="btn btn-primary btn-round">ยืนยัน</button>
        </div>
        {!! Form::close() !!}
    </center>

  </div>


@endsection