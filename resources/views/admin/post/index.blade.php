@extends('store.template.layout')
@section('content')
<style>
  .img{
    width: 150px;
    height: 150px;
  }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Bài viết</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
              <li class="breadcrumb-item active">Bài viết</li>
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
                  <h3 class="card-title">Danh sách Bài viết</h3>
                </div>
                <div class="card-header">
                    <a href="{{ route('post.create') }}" class="btn btn-primary"><i class="fas fa-plus mr-1"></i> Thêm mới</a>
                </div>
                @include('store.template.alert')
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="brand" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>Hình ảnh</th>
                      <th>Bài viết</th>
                      <th>Ngày tạo</th>
                      <th>Tác giả</th>
                      <th>Trạng thái</th>
                      <th>Thao tác</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                          <td><img src="{{asset($item->bv_hinhanh)}}" alt="" class="img"></td>
                            <td>{{ $item->bv_tieude }}</td>
                            <td>{{ $item->bv_ngaytao }}</td>
                            <td>{{ $item->quantrivien->qt_hoten }}</td>
                            <td>
                            @if ($item->bv_trangthai==1)
                              <span class="badge badge-warning">Ẩn</span>
                              @elseif($item->bv_trangthai==0)
                              <span class="badge badge-success">Hiện</span>
                            @endif
                            </td>
                            <td>
                              <form action="{{route('post.delete',$item)}}" method="post">
                              @csrf
                              <a href="{{ route('post.edit', $item) }}" class="btn btn-warning"><i class="fas fa-pencil-alt"></i> Chỉnh sửa</a>
                              <button class="btn btn-danger xoa" type="submit"><i class="far fa-trash-alt"></i> Xoá</button>
                            </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
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
    <script>
    $('.xoa').on('click',function()
    {
      if(confirm('Bạn Cóa Muốn Xóa !!'))
      {
        return true;
      }
      else
      {
        return false;
      }
    });
    </script>
@endpush
@endsection
