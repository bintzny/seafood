@extends('layouts.app')
@section('title', 'SETTING')
@section('acsetting', 'active')
@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="card">
                <br>
                <div class="col-md-12"><a href="{{url('#')}}" class="btn btn-danger">เพิ่ม</a></div>
                <div class="card-header">
                    เพิ่มข้อมูลลูกค้า
                </div>
                {!! Form::model($data, ['route' => ['customer.update', $data->id],'method' => 'put']) !!}
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::label('name', 'ผู้ใช้') }}
                                {{ Form::text('name',null,['class' => 'form-control',]) }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::label('email', 'email') }}
                                {{ Form::text('email',null,['class' => 'form-control',]) }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::label('password', 'password') }}
                                {{ Form::password('password',['class' => 'form-control',]) }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::label('firstname', 'ชื่อ') }}
                                {{ Form::text('firstname',null,['class' => 'form-control',]) }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::label('Lastname', 'นามสกุล') }}
                                {{ Form::text('Lastname',null,['class' => 'form-control',]) }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::label('gender', 'เพศ') }}
                                {{ Form::select('gender',['ชาย' => 'ชาย','หญิง' => 'หญิง'],['class' => 'form-control',]) }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::label('address', 'ที่อยู่') }}
                                {{ Form::text('address',null,['class' => 'form-control',]) }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::label('address2', 'ที่อยู่2') }}
                                {{ Form::text('address2',null,['class' => 'form-control',]) }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::label('phone', 'เบอร์โทรศัพท์') }}
                                {{ Form::text('phone',null,['class' => 'form-control',]) }}
                            </div>
                        </div>
                    </div>
                    <a href="{{url('customer')}}" type="submit" class="btn btn-info ">ย้อนกลับ</a>
                    {{ Form::submit('บันทึกข้อมูล',['class' => 'btn btn-info btn-fill pull-right']) }}
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
@endsection
