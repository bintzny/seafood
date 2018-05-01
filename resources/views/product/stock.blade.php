@extends('layouts.app')
@section('title', 'SETTING')
@section('acsetting', 'active')
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header">
                    <a href="" type="button" class="btn btn-info">คลังสินค้า</a>
                </div>
                <div class="card-body no-padding">

                    <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                        <tr>
                            <th hidden>ลำดับ</th>
                            <th>รหัส</th>
                            <th>ชื่อ</th>
                            <th>ราคา</th>
                            <th>จำนวนสินค้าที่เหลือ</th>
                            <th>จำนวนสินค้าที่ขายแล้ว</th>
                            <th class="disabled-sorting text-right">เครื่องมือ</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($product as $products)
                            <tr>
                                <td hidden>{{ $products->id }}</td>
                                <td>{{ $products->productCode }}</td>
                                <td>{{ $products->productName }}</td>
                                <td>{{ number_format($products->productPrice,2) }}</td>
                                <td class="text-center text-warning" style="font-weight: bold;">{{ $products->productItemTotal }}</td>
                                <td class="text-center text-success" style="font-weight: bold;">{{ $products->productItemSold }}</td>
                                <td class="text-right">
                                    <a href="JavaScript:Void(0);" class="btn btn-round btn-facebook updateItem"><i class="material-icons">add_circle</i> เพิ่มจำนวนสินค้า</a>
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
            $('#datatables').DataTable({
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
            var table = $('#datatables').DataTable();
            // Delete a record


            table.on('click', '.updateItem', function() {
                $tr = $(this).closest('tr');
                var data = table.row($tr).data();

                swal({
                    title: 'แก้ไขจำนวนสินค้า',
                    html: '<div class="form-group">' +
                    '<input id="input-field" type="text" class="form-control" value="" />' +
                    '</div>',
                    showCancelButton: true,
                    confirmButtonClass: 'btn btn-success',
                    cancelButtonClass: 'btn btn-danger',
                    confirmButtonText: 'ยืนยัน',
                    cancelButtonText: "ไม่ยืนยัน",
                    buttonsStyling: false
                }).then(function() {
                    $.ajax({
                        url: 'stock',
                        data: { "_token": "{{ csrf_token() }}","productId": ""+data[0],"itemData": $('#input-field').val() },
                        type: 'POST',
                        success: function() {
                            window.location = "{{ url('admin/stock') }}";
                        }
                    });
                });
                /* $('#input-field').val(data[5]);*/
            });
            $('.card .material-datatables label').addClass('form-group');
        });

    </script>
@endsection
