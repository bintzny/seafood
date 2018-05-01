@extends('layouts.app')
@section('title', 'SETTING')
@section('acsetting', 'active')
@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="card">
                <div class="card-header">
                    เพิ่มข้อมูลลูกค้า
                </div>
                {!! Form::open(['url' => 'faculty']) !!}
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::label('name', 'คำนำหน้าชื่อ') }}
                                {{ Form::text('name',null,['class' => 'form-control','placeholder' => 'ยังไม่ระบุ','required' => 'true']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('name', 'ชื่อ') }}
                                {{ Form::text('name',null,['class' => 'form-control','placeholder' => 'ยังไม่ระบุ','required' => 'true']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('name', 'นามสกุล') }}
                                {{ Form::text('name',null,['class' => 'form-control','placeholder' => 'ยังไม่ระบุ','required' => 'true']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('name', 'ชื่อ-นามสกุล') }}
                                {{ Form::text('name',null,['class' => 'form-control','placeholder' => 'ยังไม่ระบุ','required' => 'true']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('name', 'เพศ') }}
                                {{ Form::text('name',null,['class' => 'form-control','placeholder' => 'ยังไม่ระบุ','required' => 'true']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('name', 'ที่อยู่') }}
                                {{ Form::textarea('name',null,['class' => 'form-control','placeholder' => 'ยังไม่ระบุ','required' => 'true']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('name', 'เบอร์โทรศัพท์') }}
                                {{ Form::text('name',null,['class' => 'form-control','placeholder' => 'ยังไม่ระบุ','required' => 'true']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('name', 'Email') }}
                                {{ Form::text('name',null,['class' => 'form-control','placeholder' => 'ยังไม่ระบุ','required' => 'true']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('name', 'Username') }}
                                {{ Form::text('name',null,['class' => 'form-control','placeholder' => 'ยังไม่ระบุ','required' => 'true']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('name', 'Password') }}
                                {{ Form::text('name',null,['class' => 'form-control','placeholder' => 'ยังไม่ระบุ','required' => 'true']) }}
                            </div>
                        </div>
                    </div>
                    <a href="{{url('faculty')}}" type="submit" class="btn btn-info ">ย้อนกลับ</a>
                    {{ Form::submit('บันทึกข้อมูล',['class' => 'btn btn-info btn-fill pull-right']) }}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
