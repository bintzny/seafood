@extends('layouts.app')
@section('title', 'SETTING')
@section('acsetting', 'active')
@section('content')
 <div class="row">
     <div class="col-xs-12">
         <div class="card">
             <div class="card-header">
                 <a href="" type="button" class="btn btn-info">รายออร์ดอร์</a>
             </div>
             <div class="card-body no-padding">

                 <table id="datatables_order" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                     <thead>
                     <tr>
                         <th hidden>ลำดับ</th>
                         <th>เลที่ ออเดอร์</th>
                         <th>วันที่</th>
                         <th>สถานะ</th>
                         <th>จำนวนรายการสินค้า</th>
                         <th>ราคา</th>
                         <th class="disabled-sorting text-right">เครื่องมือ</th>
                     </tr>
                     </thead>
                     <tbody>
                     @foreach($order as $orders)
                         <tr>
                             <td  hidden>{{ $orders->id }}</td>
                             <td>{{ $orders->orderCode }}</td>
                             <td>{{ $orders->orderDate }}</td>
                             <td>@if($orders->orderStatus == 0)
                                     <span class="label label-danger">ยังไม่ได้ชำระเงิน</span>
                                 @elseif($orders->orderStatus == 1)
                                     <span class="label label-success">ชำระเงินเรียบร้อย</span>
                                 @elseif($orders->orderStatus == 10)
                                     <span class="label label-default">ยกเลิกการสั่งซื้อแล้ว</span>
                                 @else
                                     <span class="label label-warning">รอการดำเนินการ</span>
                                 @endif
                             </td>
                             <td class="text-center">{{ count(\App\OrderDetail::where('detailOrderId',$orders->id)->get()) }}</td>
                             <td>{{ number_format($orders->orderTotal,2) }}</td>
                             <td class="text-right">
                                 <a href="JavaScript:Void(0);" class="btn btn-github btn-round status"><i class="material-icons">check_circle</i> สถานะออเดอร์</a>
                                 <a href="JavaScript:Void(0);" class="btn btn-info btn-round edit"><i class="material-icons">visibility</i> ดูรายละเอียด</a>
                                 <a style="color: white" href="{{ url('admin/order/'.$orders->id.'/pdf') }}" class="btn btn-warning btn-round"><i class="material-icons">print</i> ปริ้น</a>
                                 <a href="JavaScript:Void(0);" class="btn btn-round btn-danger remove"><i class="material-icons">delete</i> ลบออเดอร์</a>
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

    <script type="text/javascript">
        $(document).ready(function() {
            $('#datatables_order').DataTable({
                "pagingType": "full_numbers",
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                responsive: true,
                language: {
                    lengthMenu:     "แสดง _MENU_ รายการ",
                    info:           "แสดง _START_ ถึง _END_ จาก _TOTAL_ รายการ",
                    infoEmpty:      "แสดง 0 ถึง 0 จาก 0 รายการ",
                    paginate: {
                        first:      "หน้าแรก",
                        last:       "หน้าสุดท้าย",
                        next:       "ถัดไป",
                        previous:   "ถอยหลัง"
                    },
                    search: "_INPUT_",
                    searchPlaceholder: "ค้นหา...",

                }
            });
            var table = $('#datatables_order').DataTable();
            // Edit record
            table.on('click', '.edit', function() {
                $tr = $(this).closest('tr');
                var data = table.row($tr).data();
                window.location = "{{ url('admin/orders/') }}/"+data[0];
            });
            // Delete a record
            table.on('click', '.remove', function(e) {
                $tr = $(this).closest('tr');
                var data = table.row($tr).data();
                swal({
                    title: 'ยืนยันการลบ',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonClass: 'btn btn-success',
                    cancelButtonClass: 'btn btn-danger',
                    confirmButtonText: 'ยอมรับ',
                    cancelButtonText: "ไม่ยอมรับ",
                    closeOnConfirm: false,
                    closeOnCancel: true,
                    buttonsStyling: false
                }).then(function() {
                    table.row($tr).remove().draw();
                    $.ajax({
                        url: 'orders/' + data[0],
                        data: { "_token": "{{ csrf_token() }}" },
                        type: 'DELETE',
                        success: function() {
                            window.location = "{{ url('admin/orders') }}";
                        }
                    });
                });
                e.preventDefault();
            });


            table.on('click', '.status', function() {
                $tr = $(this).closest('tr');
                var data = table.row($tr).data();
                swal({
                    title: 'เลือกสถานะ',
                    html: '<div class="form-group">' +
                    '<select  id="input-status"  class="form-control" required>' +
                    '<option selected>กรุณาเลือกสถานะ</option>'+
                    '<option value="0">ยังไม่ได้ชำระเงิน</option>'+
                    '<option value="1">ชำระเงินเรียบร้อย</option>'+
                    '<option value="4">รอการดำเนินการ</option>'+
                    '<option value="10">ยกเลิกการจัดส่ง</option>'+
                    '</select>'+
                    '</div>',
                    showCancelButton: true,
                    confirmButtonClass: 'btn btn-success',
                    cancelButtonClass: 'btn btn-danger',
                    confirmButtonText: 'ยอมรับ',
                    cancelButtonText: "ไม่ยอมรับ",
                    buttonsStyling: false
                }).then(function() {
                    $.ajax({
                        url: 'orders',
                        data: { "_token": "{{ csrf_token() }}","statusOrder": ""+data[0],"statusData": $('#input-status').find(":selected").val() },
                        type: 'POST',
                        success: function() {
                            window.location = "{{ url('admin/orders') }}";
                        }
                    });
                });
            });

            $('.card .material-datatables label').addClass('form-group');
        });
    </script>
@endsection
