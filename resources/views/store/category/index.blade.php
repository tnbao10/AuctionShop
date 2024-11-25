@extends('store.template.layout')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Danh mục sản phẩm</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
              <li class="breadcrumb-item active">Danh mục sản phẩm</li>
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
                  <h3 class="card-title">Danh sách danh mục sản phẩm</h3>
                </div>
                <div class="card-header">
                    <a href="{{ route('category.add') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm mới</a>
                </div>
                @include('store.template.alert')
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="category" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>Tên danh mục</th>
                      <th>Mô tả</th>
                      <th>Thao tác</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{ $item->dm_ten }}</td>
                            <td>{{ $item->dm_mota }}</td>
                            <td>
                                <a href="{{ route('category.edit', ['id'=>$item->dm_id]) }}" class="btn btn-warning"><i class="fas fa-edit"></i> Chỉnh sửa</a>
                                <a href="{{ route('category.delete', ['id'=>$item->dm_id]) }}" class="btn btn-danger"><i class="far fa-trash-alt xoa"></i> Xoá</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Tên danh mục</th>
                        <th>Mô tả</th>
                        <th>Thao tác</th>
                    </tr>
                    </tfoot>
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
            $('#category').DataTable({
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
