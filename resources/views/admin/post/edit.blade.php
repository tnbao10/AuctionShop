@extends('store.template.layout')
@section('content')
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
                        <li class="breadcrumb-item active">Sửa bài viết</li>
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
                        @include('store.template.alert')
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form method="POST" action="{{ route('post.update',$baiviet) }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="bv_hinhanh">Hình ảnh</label>
                                    <input id="bv_hinhanh" class="form-control" type="file" name="bv_hinhanh" value="{{asset($baiviet->bv_hinhanh)}}">
                                </div>
                                <div class="form-group">
                                    <label for="bv_tieude">Tên bài viết</label>
                                    <input id="bv_tieude" class="form-control" type="text" name="bv_tieude" value="{{$baiviet->bv_tieude}}">
                                </div>
                                <div class="form-group">
                                    <label for="bv_noidung">Nội dung</label>
                                    {{-- <input id="bv_noidung" class="form-control" type="text" name="bv_noidung" value="{{$baiviet->bv_noidung}}"> --}}
                                    <textarea id="bv_noidung" name="bv_noidung">
                                        {!!$baiviet->bv_noidung!!}
                                    </textarea>
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
