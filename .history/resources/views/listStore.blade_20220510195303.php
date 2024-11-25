@extends('store.template.layout')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Danh sách cửa hàng</h1>
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
                  <h3 class="card-title">Danh sách Cửa hàng</h3>
                </div>
                @include('store.template.alert')
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="brand" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>Cửa hàng</th>
                      <th>Trạng thái</th>
                      <th>Thao tác</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{ $item->ch_ten}}</td>
                            <td>
                              @if ($item->ch_trangthai==0)
                              <span class="badge badge-warning">Đang chờ duyệt</span>
                              @elseif($item->ch_trangthai==1)
                              <span class="badge badge-success">Đã duyệt</span>
                              @elseif($item->ch_trangthai==2)
                              <span class="badge badge-danger">Tạm khoá</span>
                              @endif</td>
                            <td>
                              <button class="btn btn-warning" data-toggle="modal"
                              data-target="#exampleModalCenter{{$item->ch_id}}"><i class="fas fa-edit"></i> Chỉnh sửa</button>
                              <a href="{{ route('admin.detailStore', $item) }}" class="btn btn-info">Chi tiết</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
                  @foreach ($data as $item)
                  <div class="modal fade" id="exampleModalCenter{{$item->ch_id}}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Trạng thái</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('admin.updateStore', $item) }}" method="post">
                                @csrf
                                <div class="modal-body">
                                    <select name="ch_trangthai" id="" class="form-control">
                                      @if ($item->ch_trangthai==0)
                                      <option value="2">Khoá shop</option>
                                        <option value="1">Duyệt</option>
                                      @elseif($item->ch_trangthai==1)
                                      <option value="2">Khoá shop</option>
                                      @elseif($item->ch_trangthai==2)
                                        <option value="1">Mở khoá</option>
                                      @endif
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
