@extends('store.template.layout')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Thương hiệu sản phẩm</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
              <li class="breadcrumb-item"><a href="#">Thương hiệu sản phẩm</a></li>
              <li class="breadcrumb-item active">Thêm thương hiệu</li>
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
                  <h3 class="card-title">Thêm thương hiệu</h3>
                </div>
                @include('store.template.alert')
                <div class="card-header">
                    <a href="{{ route('brand.index') }}" class="btn btn-primary">Quay lại</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <form method="POST" action="{{ route('brand.update', ['id'=>$data->th_id]) }}">
                    @csrf
                    <div class="form-group">
                        <label for="th_ten">Tên thương hiệu</label>
                        <input id="th_ten" class="form-control" type="text" name="th_ten" value="{{ $data->th_ten }}">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success" type="submit">Sửa</button>
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
