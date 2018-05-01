@extends('layouts.app')
@section('title', 'SETTING')
@section('acsetting', 'active')
@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="card">
                <div class="card-header">
                    แก้ไขข้อมูลคณะ
                </div>
                {!! Form::model($data, ['route' => ['faculty.update', $data->id],'method' => 'put','files' => true]) !!}
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {{ Form::label('name', 'ชื่อคณะ') }}
                                {{ Form::text('name',null,['class' => 'form-control','placeholder' => 'ยังไม่ระบุ','required' => 'true']) }}
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                @endif
                            </div>
                            <div class="form-group">
                                {{ Form::label('detail', 'รายละเอียดเพิ่มเติม') }}<p class="control-label-help">( ไม่บังคับ )</p>
                                {{ Form::textarea('detail',null,['class' => 'form-control','placeholder' => 'ยังไม่ระบุ','rows' => '3']) }}
                                @if ($errors->has('detail'))
                                    <span class="help-block">
                                                <strong>{{ $errors->first('detail') }}</strong>
                                            </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    {{ Form::submit('บันทึกข้อมูล',['class' => 'btn btn-warning btn-fill pull-right']) }}
                    <a href="{{url('faculty')}}" type="submit" class="btn btn-info ">ย้อนกลับ</a>
                </div>
            </div>
        </div>
    </div>
@endsection
