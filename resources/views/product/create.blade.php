@extends('layouts.app')
@section('title', 'SETTING')
@section('acsetting', 'active')
@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="card">
                <div class="card-header">
                    เพิ่มสินค้า
                </div>
                {!! Form::open(['url' => 'admin/product','files'=> true]) !!}
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            {{ Form::label('productImages', 'ภาพสินค้า') }}
                            {{ Form::file('productImages',null) }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::label('productGroupId', 'ประเภทสินค้า') }}
                                {{Form::select('productGroupId',App\ProductGroup::pluck('productGroupName','id'), null, ['class' => 'select2','placeholder'=>'เลือกประเภท...','required'=> 'true' ])}}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::label('productCode', 'รหัสสินค้า') }}
                                {{ Form::text('productCode',null,['class' => 'form-control',]) }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::label('productName', 'ชื่อสินค้า') }}
                                {{ Form::text('productName',null,['class' => 'form-control',]) }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::label('productNumber', 'จำนวนสินค้า') }}
                                {{ Form::text('productNumber',null,['class' => 'form-control',]) }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            {{ Form::label('productPrice', 'ราคาสินค้ากิโลละ') }}
                            {{ Form::text('productPrice',null,['class' => 'form-control','rows' => '5']) }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            {{ Form::label('productDescription', 'รายละเอียดสินค้า') }}
                            {{ Form::textarea('productDescription',null,['class' => 'form-control','rows' => '5']) }}
                        </div>
                    </div>
                </div>
                <a href="{{url('product')}}" class="btn btn-primary">ย้อนกลับ</a>
                {{ Form::submit('บันทึก',['class' => 'btn btn-danger pull-right']) }}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    </div>
@endsection
