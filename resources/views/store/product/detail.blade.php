@extends('store.template.layout')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Chi tiết sản phẩm</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                            <li class="breadcrumb-item"><a href="#">Sản phẩm</a></li>
                            <li class="breadcrumb-item active">Chi tiết sản phẩm</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card card-solid">
          <div class="card-body">
            <div class="row">
              <div class="col-12 col-sm-6">
                <h3 class="d-inline-block d-sm-none">{{ $detail->sp_ten }}</h3>
                @if ($image != null)
                    {{-- {{ dd() }} --}}
                    <div class="col-12">
                        @foreach ($image as $key => $value)
                            @if ($value->hasp_anhdaidien == 1)
                                <img src="{{ asset($value->hasp_duongdan) }}" class="product-image" alt="Product Image">
                            @endif
                        @endforeach

                    </div>
                    <div class="col-12 product-image-thumbs">
                        @foreach ($image as $key => $value)
                        <div class="product-image-thumb
                            @if ($value->hasp_anhdaidien == 1)
                            active
                            @endif
                        "><img src="{{ asset($value->hasp_duongdan) }}" alt="Product Image"></div>
                        @endforeach
                    </div>
                @endif
              </div>
              <div class="col-12 col-sm-6">
                <h3 class="my-3">{{ $detail->sp_ten }}</h3>
                <hr>
                <h4>Trạng thái sản phẩm</h4>
                <div class="btn-group btn-group-toggle" data-toggle="buttons">

                    @if ($auditCurrent > 0)
                    <label class="btn btn-default text-center active">
                        <input type="radio" name="color_option" id="color_option1" autocomplete="off" checked="">
                        Đang đấu giá
                        <br>
                        <i class="fas fa-circle fa-2x text-green"></i>
                      </label>
                    @else
                    <label class="btn btn-default text-center">
                        <input type="radio" name="color_option" id="color_option4" autocomplete="off">
                        Không đấu giá
                        <br>
                        <i class="fas fa-circle fa-2x text-red"></i>
                      </label>
                    @endif
                </div>

                <h4 class="mt-3"><small>Loại sản phẩm</small></h4>
                <p>{{ $detail->loaisanpham->lsp_ten }}</p>

                <h4 class="mt-3"><small>Thương hiệu</small></h4>
                <p>{{ $detail->thuonghieu->th_ten }}</p>

                <h4 class="mt-3"><small>Danh mục</small></h4>
                <p>
                    @foreach ($detail->danhmucs as $item)
                        {{ $item->dm_ten, }}
                    @endforeach
                </p>

                <div class="bg-gray py-2 px-3 mt-4">
                  <h2 class="mb-0">
                    Giá tiền
                  </h2>
                  <h4 class="mt-0">
                    {{-- <small>{{ number_format($detail->sp_gia) }} VND</small> --}}
                  </h4>
                </div>
                <div class="mt-4">
                    <button class="btn btn-primary btn-lg btn-flat" @if ($auditCurrent > 0) disabled @endif type="button" data-toggle="modal" data-target="#setup-audit">Thiết lập đấu giá</button>
                    <a class="btn btn-default btn-lg btn-flat" href="{{ route('product.edit', ['id'=>$detail->sp_id]) }}">Chỉnh sửa</a>
                </div>
              </div>
            </div>
            <div class="row mt-4">
              <nav class="w-100">
                <div class="nav nav-tabs" id="product-tab" role="tablist">
                  <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Mô tả</a>
                  <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Trạng thái đấu giá</a>
                  <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab" href="#product-rating" role="tab" aria-controls="product-rating" aria-selected="false">Lịch sử đấu giá</a>
                </div>
              </nav>
              <div class="tab-content p-3" id="nav-tabContent">
                <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">{!! $detail->sp_mota !!}</div>
                <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab">
                    <p>Thời gian bắt đầu: </p>
                    <p>Thời gian kết thúc</p>
                    <table class="table table-light">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>Khách hàng</th>
                                <th>Thời gian</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $stt = 1; ?>
                            @foreach ($auditInfo as $item)
                                <tr>
                                    <td>{{ $stt++ }}</td>
                                    <td>{{ $item->nd_hoten }}</td>
                                    <td>{{ $item->ctdg_thoigian }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="product-rating" role="tabpanel" aria-labelledby="product-rating-tab">
                    <table class="table table-light">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>Khách hàng</th>
                                <th>Thời gian</th>
                                <th>Giá đấu thành công</th>
                                <th>Trạng thái</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $stt = 1; ?>
                            @foreach ($auditHistory as $item)
                                <?php $detailAudit = DB::table('chitietdaugia')->where('dg_id', $item->dg_id)
                                ->join('nguoidung','nguoidung.nd_id','chitietdaugia.nd_id')->orderBy('ctdg_id','desc')->first();
                                ?>
                                @if ($detailAudit != null)
                                    <tr>
                                    <td>{{ $stt++ }}</td>
                                    <td>{{ $detailAudit->nd_hoten }}</td>
                                    <td>{{ $detailAudit->ctdg_thoigian }}</td>
                                    <td>{{ number_format($detailAudit->ctdg_giatien)  }}VNĐ</td>
                                    <td>
                                        @if ($item->dg_trangthai == 1)
                                            Đang diễn ra
                                        @else
                                            Đã kết thúc
                                        @endif
                                    </td>
                                </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                    {{-- @foreach ($auditHistory as $item)
                        <p>{{ $item->dg_thoigianbatdau }}</p>
                    @endforeach --}}
                </div>
              </div>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </section>
      <!-- /.content -->
    </div>


    {{-- modal setup audit --}}
    <div id="setup-audit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="my-modal-title">Thiết lập đấu giá</h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('product.setup.audit', ['id'=>$detail->sp_id]) }}">
                        @csrf
                        <div class="form-group">
                            <label for="dg_thoigianbatdau">Thời gian bắt đầu</label>
                            <input id="dg_thoigianbatdau" class="form-control" type="datetime-local" name="dg_thoigianbatdau">
                        </div>
                        <div class="form-group">
                            <label for="dg_thoigianketthuc">Thời gian kết thúc</label>
                            <input id="dg_thoigianketthuc" class="form-control" type="datetime-local" name="dg_thoigianketthuc">
                        </div>
                        <div class="form-group">
                            <label for="dg_giakhoidiem">Giá khởi điểm</label>
                            <input id="dg_giakhoidiem" class="form-control" type="int" name="dg_giakhoidiem">
                        </div>
                        <div class="form-group">
                            <label for="dg_buocnhay">Giá tiền tăng tối thiểu</label>
                            <input id="dg_buocnhay" class="form-control" type="int" name="dg_buocnhay">
                        </div>
                        <div class="form-group">
                            <label for="dg_giamax">Giá tối đa</label>
                            <input id="dg_giamax" class="form-control" type="int" name="dg_giamax">
                        </div>
                        <button class="btn btn-primary" type="submit">Xác nhận</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-default close" data-dismiss="modal" aria-label="Close">Đóng</button>
                </div>
            </div>
        </div>
    </div>
@endsection
