@extends('layouts.app')
@section('title', 'SETTING')
@section('acsetting', 'active')
@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="card">
                <br>
                <div class="card-header">
                    <h4>เพิ่มข้อมูลลูกค้า</h4>
                </div>
                {!! Form::open(['url' => 'admin/orders']) !!}
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::label('orderCode', 'รหัสสินค้า') }}
                                {{ Form::text('orderCode',null,['class' => 'form-control',]) }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::label('orderDate', 'วันที่') }}
                                {{ Form::text('orderDate',null,['class' => 'form-control',]) }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::label('orderTotal', 'ราคา') }}
                                {{ Form::text('orderTotal',null,['class' => 'form-control',]) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('orderStatus', 'สถานะ') }}
                                {{ Form::text('orderStatus',null,['class' => 'form-control',]) }}
                            </div>
                        </div>
                    </div>
                    <a href="{{url('orders')}}" type="submit" class="btn btn-info ">ย้อนกลับ</a>
                    {{ Form::submit('บันทึกข้อมูล',['class' => 'btn btn-info btn-fill pull-right']) }}
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
@endsection
