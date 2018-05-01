@extends('layouts.app')
@section('title', 'SETTING')
@section('acsetting', 'active')
@section('content')
 <div class="row">
     <div class="col-xs-12">
         <div class="card">
             <div class="card-header">
                 <a href="{{url('admin/customer/create')}}" type="button" class="btn btn-info">เพิ่มข้อมูลลูกค้า</a>
             </div>
             <div class="card-body no-padding">

                 <table class="datatable table table-striped primary" cellspacing="0" width="100%">
                     <thead>
                     <tr>
                         <th hidden>id</th>
                         <th>ผู้ใช้</th>
                         <th>ชื่อ</th>
                         <th>เพศ</th>
                         <th>ที่อยู่</th>
                         <th>Phone</th>
                         <th >Action</th>
                     </tr>
                     </thead>
                     <tbody>
                     @foreach($data as $list)
                     <tr>
                         <td hidden>{{ $list->id }}</td>
                         <td>{{ $list->email }}</td>
                         <td>{{ $list->firstname }} {{ $list->lastname }}</td>
                         <td>{{ $list->gender }}</td>
                         <td>{{ $list->address }}</td>
                         <td>{{ $list->phone }}</td>
                         <td class="pull-right">
                             <a class="btn btn-warning" href="{{url('admin/customer/'.$list->id.'/edit')}}"><i class="fa fa-pencil"></i></a>
                             <button class="btn btn-danger" data-toggle="modal" data-target="#myModalDelete{{ $list->id }}"><i class="fa fa-trash"></i></button>

                             <div class="modal fade" id="myModalDelete{{ $list->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                 <div class="modal-dialog">
                                     <div class="modal-content">
                                         <div class="modal-header">
                                             <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                             <h4 class="modal-title">ยืนยันการลบ {{$list->customer}}</h4>
                                         </div>
                                         <div class="modal-body">
                                             <p class="control-label-help"> ยืนยันการลบ {{$list->customer}} กรุณากดตกลง</p>
                                         </div>
                                         <div class="modal-footer">
                                             <div class="col-sm-10"><button type="submit" class="btn btn-sm btn-default" data-dismiss="modal">ยกเลิก</button></div>
                                             <div class="col-sm-2"> {{ Form::open(['method' => 'DELETE', 'route' => ['customer.destroy', $list->id]]) }}
                                                 <button type="submit" class="btn btn-sm btn-danger">ตกลง</button>
                                                 {{ Form::close() }}</div>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </td>
                     </tr>
                     @endforeach
                     </tbody>
                 </table>

             </div>
         </div>
     </div>
 </div>
@endsection
@section('script')
@endsection
