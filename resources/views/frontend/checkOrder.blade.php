@extends('layouts.fontend-new')

@section('content')
    <div class="material-datatables">
        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0"  style="font-size: 14px">
            <thead>
            <tr>
                <th hidden>ลำดับ</th>
                <th>เลที่ ออเดอร์</th>
                <th>วันที่</th>
                <th>สถานะ</th>
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
                    <td>{{ number_format($orders->orderTotal,2) }}</td>
                    <td class="text-center">
                        @if($orders->orderStatus == 10)
                            <a href="JavaScript:Void(0);" class="btn btn-success btn-sm" disabled="true"><i class="material-icons">credit_card</i> แจ้งการชำระเงิน</a>
                            <a href="JavaScript:Void(0);" class="btn btn-info btn-sm" disabled="true"><i class="material-icons">visibility</i> ดูรายละเอียด</a>
                            <a style="color: white" href="{{ url('/order/'.$orders->id.'/pdf') }}" class="btn btn-warning btn-round"><i class="material-icons">print</i> ปริ้น</a>
                            <a href="JavaScript:Void(0);" class="btn btn-sm btn-danger" disabled="true"><i class="material-icons">close</i> ยกเลิกออเดอร์</a>
                        @elseif($orders->orderStatus == 3)
                            <a href="JavaScript:Void(0);" class="btn btn-success btn-sm" disabled="true"><i class="material-icons">credit_card</i> แจ้งการชำระเงิน</a>
                            <a href="JavaScript:Void(0);" class="btn btn-info btn-sm edit"><i class="material-icons">visibility</i> ดูรายละเอียด</a>
                            <a style="color: white" href="{{ url('/order/'.$orders->id.'/pdf') }}" class="btn btn-warning btn-round"><i class="material-icons">print</i> ปริ้น</a>
                            <a href="JavaScript:Void(0);" class="btn btn-sm btn-danger remove"><i class="material-icons">close</i> ยกเลิกออเดอร์</a>
                        @elseif($orders->orderStatus == 1)
                            <a href="JavaScript:Void(0);" class="btn btn-success btn-sm " disabled><i class="material-icons">credit_card</i> แจ้งการชำระเงิน</a>
                            <a href="JavaScript:Void(0);" class="btn btn-info btn-sm edit"><i class="material-icons">visibility</i> ดูรายละเอียด</a>
                            <a style="color: white" href="{{ url('/order/'.$orders->id.'/pdf') }}" class="btn btn-warning btn-round"><i class="material-icons">print</i> ปริ้น</a>
                            <a href="JavaScript:Void(0);" class="btn btn-sm btn-danger " disabled><i class="material-icons">close</i> ยกเลิกออเดอร์</a>
                        @else
                            <a href="JavaScript:Void(0);" class="btn btn-sm btn-success  payment"><i class="material-icons">credit_card</i> แจ้งการชำระเงิน</a>
                            <a href="JavaScript:Void(0);" class="btn btn-sm  btn-info  edit"><i class="material-icons">visibility</i> ดูรายละเอียด</a>
                            <a style="color: white" href="{{ url('/order/'.$orders->id.'/pdf') }}" class="btn btn-warning btn-round"><i class="material-icons">print</i> ปริ้น</a>
                            <a href="JavaScript:Void(0);" class="btn btn-sm  btn-danger remove"><i class="material-icons">close</i> ยกเลิกออเดอร์</a>
                            @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="modal fade" id="removeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-small ">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
                </div>
                <div class="modal-body text-center">
                    <h4>ต้องการยกเลิกออเดอร์ <small id="orderData"></small>  </h4>
                </div>
                {!! Form::open(array('url' => 'order/delete','method'=> 'post')) !!}
                <div class="modal-footer text-center">
                    {{ Form::hidden('orderId',0,['id'=> 'getIdOrder'])  }}
                    <button type="button" class="btn btn-simple" data-dismiss="modal"><b>ไม่</b></button>
                    <button type="submit" class="btn btn-success btn-simple"><b>ตกลง</b></button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="paymentLabel" aria-hidden="true">
        <div class="modal-dialog modal-notice">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
                    <h5 class="modal-title text-center text-warning" id="paymentLabel">แจ้งการชำระเงิน ออเดอร์ <small id="paymentData"></small></h5>
                </div>
                <div class="modal-body">
                    <div class="instruction">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-content">

                                    <center>
                                        <p> ธนาคาร: <span class="text-primary">{{ Auth::user()->paymentBank }}</span></p>
                                        <p> เลขบัญชี: <span class="text-primary">{{ Auth::user()->paymentCodeBank }}</span></p>
                                        <br>

                                            {!! Form::open(['url' => '/order/payment','files' => true]) !!}
                                            {{ csrf_field() }}
                                            <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail img-raised">
                                                </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail img-raised"></div>
                                                <div>
									<span class="btn btn-raised btn-round btn-default btn-file">
										<span class="fileinput-new">เลือกรูปภาพ</span>
										<input type="file" name="payImage" />
									</span>
                                                </div>
                                            </div>

                                    </center>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                {{ Form::hidden('orderIdPayment',0,['id'=> 'getIdPayment'])  }}
                <div class="modal-footer text-center">
                    <button type="submit" class="btn btn-primary btn-round">ยืนยันการชำระเงิน</button>
                </div>
                {!! Form::close() !!}
                <br>
            </div>
        </div>
    </div>
    <div style="height: 30vh"></div>
@endsection


@section('script')
    <!--  DataTables.net Plugin    -->
    <script src="{{ asset('js/jquery.datatables.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#datatables').DataTable({
                "pagingType": "full_numbers",
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                order: [[ 0, 'desc' ]],
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
                    searchPlaceholder: "ค้นหา..."

                }
            });
            var table = $('#datatables').DataTable();
            // Edit record
            table.on('click', '.edit', function() {
                $tr = $(this).closest('tr');
                var data = table.row($tr).data();
                window.location = "{{ url('/order/orderDetail') }}/"+data[0];
            });
            // Delete a record
            table.on('click', '.remove', function(e) {
                $tr = $(this).closest('tr');
                var data = table.row($tr).data();
                $(document).ready(function() {
                    document.getElementById("getIdOrder").value = data[0];
                    document.getElementById("orderData").innerText = data[1];
                });
                $("#removeModal").modal();


                e.preventDefault();
            });

            table.on('click', '.payment', function() {
                $tr = $(this).closest('tr');
                var data = table.row($tr).data();
                $(document).ready(function() {
                    document.getElementById("getIdPayment").value = data[0];
                });
                $("#paymentModal").modal();
            });
            $('.card .material-datatables label').addClass('form-group');
        });

    </script>
@endsection
