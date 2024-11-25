@extends('store.template.layout')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Sản phẩm</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                            <li class="breadcrumb-item"><a href="#">Sản phẩm</a></li>
                            <li class="breadcrumb-item active">Thêm sản phẩm</li>
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
                                <h3 class="card-title">Thêm sản phẩm</h3>
                            </div>
                            <div class="card-header">
                                <a href="{{ route('product.index') }}" class="btn btn-primary">Quay lại</a>
                            </div>
                            @include('store.template.alert')
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row">
                                        <div class="col-md-6"><label for="sp_ten">Tên sản phẩm</label>
                                            <input id="sp_ten" class="form-control" type="text" name="sp_ten" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="lsp_id">Loại sản phẩm</label>
                                            <select id="lsp_id" class="form-control" name="lsp_id" required>
                                                <option value="">- Chọn loại sản phẩm -</option>
                                                @foreach ($type as $item)
                                                    <option value="{{ $item->lsp_id }}">{{ $item->lsp_ten }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="th_id">Thương hiệu</label>
                                            <select id="th_id" class="form-control" name="th_id" required>
                                                <option value="">- Chọn thương hiệu -</option>
                                                @foreach ($brand as $item)
                                                    <option value="{{ $item->th_id }}">{{ $item->th_ten }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="dm_id">Danh mục</label>
                                            <select id="dm_id" class="form-control" name="dm_id" required>
                                                <option value="">- Chọn danh mục -</option>
                                                @foreach ($cat as $item)
                                                    <option value="{{ $item->dm_id }}">{{ $item->dm_ten }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="sp_gia">Giá nhập</label>
                                            <input id="sp_gia" class="form-control" type="number" name="sp_gia"
                                                required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="sp_soluong">Số lượng</label>
                                            <input id="sp_soluong" class="form-control" type="number" name="sp_soluong"
                                                required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="lsp_id">Hình ảnh sản phẩm</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input"
                                            id="file-input" multiple name="sp_hinhanh[]">
                                            <label class="custom-file-label" for="customFile">Hình ảnh</label>
                                        </div>
                                    </div>
                                    <div class="form-group" id="preview">
                                        {{-- image review in here --}}
                                        {{-- <img id="output" src="#" alt="your image" /> --}}
                                    </div>
                                    <div class="form-group">
                                        <label for="sp_mota">Mô tả</label>
                                        <textarea name="sp_mota" class="form-control textarea" required></textarea>
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
    @push('img-review')
        <script>
            function previewImages() {

                var $preview = $('#preview').empty();
                if (this.files) $.each(this.files, readAndPreview);

                function readAndPreview(i, file) {

                    if (!/\.(jpe?g|png|gif)$/i.test(file.name)) {
                        return alert(file.name + " is not an image");
                    } // else...

                    var reader = new FileReader();

                    $(reader).on("load", function() {
                        $preview.append($("<img/>", {
                            src: this.result,
                            height: 100
                        }));
                    });

                    reader.readAsDataURL(file);
                }

            }

            $('#file-input').on("change", previewImages);
        </script>
    @endpush
@endsection
