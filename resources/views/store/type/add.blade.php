@extends('store.template.layout')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Loại sản phẩm sản phẩm</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
              <li class="breadcrumb-item"><a href="#">Loại sản phẩm sản phẩm</a></li>
              <li class="breadcrumb-item active">Thêm Loại sản phẩm</li>
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
                  <h3 class="card-title">Thêm loại sản phẩm</h3>
                </div>
                <div class="card-header">
                    <a href="{{ route('type.index') }}" class="btn btn-primary">Quay lại</a>
                </div>
                @include('store.template.alert')
                <!-- /.card-header -->
                <div class="card-body">
                  <form method="POST" action="{{ route('type.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="lsp_ten">Tên loại sản phẩm</label>
                        <input id="lsp_ten" class="form-control" type="text" name="lsp_ten">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success" type="submit">Thêm</button>
                    </div>
                  </form>
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
@endsection
