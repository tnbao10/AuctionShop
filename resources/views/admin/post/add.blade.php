@extends('store.template.layout')
@section('content')
<!-- summernote -->
<link rel="stylesheet" href="../../plugins/summernote/summernote-bs4.min.css">

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
                        <li class="breadcrumb-item active">Thêm bài viết</li>
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
                            <h3 class="card-title">Thêm bài viết</h3>
                        </div>
                        @include('store.template.alert')
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form method="POST" action="{{ route('post.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="bv_hinhanh">Hình ảnh</label>
                                    <input id="bv_hinhanh" class="form-control" type="file" name="bv_hinhanh">
                                </div>
                                <div class="form-group">
                                    <label for="bv_tieude">Tên bài viết</label>
                                    <input id="bv_tieude" class="form-control" type="text" name="bv_tieude">
                                </div>
                                <div class="form-group">
                                    <label for="bv_noidung">Nội dung</label>
                                    <textarea id="bv_noidung" name="bv_noidung">
                                        Place <em>some</em> <u>text</u> <strong>here</strong>
                                    </textarea>
                                    {{-- <input id="bv_noidung" class="form-control" type="text" name="bv_noidung"> --}}
                                </div>
                                
                                <div class="form-group">
                                    <button class="btn btn-success" type="submit"><i class="fas fa-plus mr-1"></i> Thêm</button>
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
