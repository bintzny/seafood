@extends('layouts.app')
@section('title', 'SETTING')
@section('acsetting', 'active')
@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="card">
                <div class="card-header">
                    แก้ไขประเภท
                </div>
                {!! Form::model($data, ['route' => ['productgroup.update', $data->id],'method' => 'put']) !!}
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {{ Form::label('productGroupName', 'ชื่อประเภท') }}
                                {{ Form::text('productGroupName',null,['class' => 'form-control','placeholder' => 'ยังไม่ระบุ','required' => 'true']) }}
                            </div>
                        </div>
                    </div>
                    {{ Form::submit('บันทึกข้อมูล',['class' => 'btn btn-info btn-fill pull-right']) }}
                    <a href="{{url('productgroup')}}" type="submit" class="btn btn-info ">ย้อนกลับ</a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
