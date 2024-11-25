@extends('store.template.layout')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Đơn hàng</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Đơn hàng</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Danh sách đơn hàng</h3>
                        </div>
                        @include('store.template.alert')
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="brand" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Địa chỉ</th>
                                        <th>SDT</th>
                                        <th>Tổng tiền</th>
                                        <th>Ngày tạo</th>
                                        <th>Trạng thái</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $item->dh_diachi }}</td>
                                        <td>{{ $item->dh_sdt }}</td>
                                        <td>{{ $item->dh_tongtien }}</td>
                                        <td>{{ $item->dh_ngaytao }}</td>
                                        <td>
                                            @if ($item->dh_trangthai==0)
                                            Đang xử lý
                                            @elseif($item->dh_trangthai==1)
                                            Đã xác nhận
                                            @elseif($item->dh_trangthai==2)
                                            Đang giao hàng
                                            @elseif($item->dh_trangthai==3)
                                            Hoàn thành
                                            @elseif($item->dh_trangthai==-1)
                                            Huỷ
                                            @endif
                                        </td>
                                        <td>
                                            @if ($item->dh_trangthai>-1 && $item->dh_trangthai<3 )
                                            <button href="{{ route('order.update', $item->dh_id) }}"
                                                class="btn btn-warning" data-toggle="modal"
                                                data-target="#exampleModalCenter{{$item->dh_id}}">Chỉnh sửa</button>
                                                @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @foreach ($data as $item)
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalCenter{{$item->dh_id}}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Trạng thái</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('order.update', $item->dh_id) }}" method="post">
                                            @csrf
                                            <div class="modal-body">
                                                <select name="dh_trangthai" id="" class="form-control">
                                                    @switch($item->dh_trangthai)
                                                        @case(2)
                                                        <option value="3">Hoàn thành</option>
                                                        @break
                                                        @case(1)
                                                        <option value="2">Giao hàng</option>
                                                        @break
                                                        @case(0)
                                                        <option value="1">Xác nhận</option>
                                                        @break
                                                            
                                                    @endswitch
                                                    <option value="-1">Huỷ</option>
                                                </select>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Thoát</button>
                                                <button type="submit" class="btn btn-primary">Cập nhật</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

@push('datatable')
<script>
    $(function () {
        $('#brand').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });

</script>
@endpush
@endsection
