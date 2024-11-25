@extends('store.template.layout')
@section('content')
<style>
  .img{
    width: 150px;
    height: 150px;
  }
  .profile-date{
    border-radius: 5px;
    background-color: #fff;
    display: inline-block;
    font-weight: 600;
    padding: 5px;
    padding-top:5px;
  }
  .profile-status{
    display: inline-block;
    padding: .25em .4em;
    font-size: 75%;
    font-weight: 700;
    line-height: 1;
    text-align: center;
    white-space: nowrap;
    vertical-align: baseline;
    border-radius: .25rem;
    transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
  }
</style>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Thông Tin Sàn Đấu Giá</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Trang</a></li>
              <li class="breadcrumb-item active">Thông Tin Sàn Đấu Giá</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
  @include('store.template.alert')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                      src="{{ asset($store->ch_anhdaidien) }}"
                      alt="User profile picture">
                </div>
                <h3 class="profile-username text-center">{{ $store->ch_ten}}</h3>
                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b></b> <a class="float-right"></a>
                  </li>
                </ul>
                <a href="{{ route('order.update', $store->ch_id) }}"
                                          class="btn btn-warning" data-toggle="modal"
                                          data-target="#exampleModalCenter{{$store->ch_id}}" class="btn btn-primary btn-block"><b>Chỉnh sửa</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">About</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-map-marker-alt mr-1"></i> Địa Chỉ</strong>
                <p class="text-muted">{{ $store->ch_diachi }}</p>
                <hr>
                <strong><i class="fas fa-book mr-1"></i> Trạng Thái</strong>
                <p class="project-state">
                  @if (1==$store->ch_trangthai)
                      <span class="badge badge-success h2">Hoạt Động</span>
                  @else
                      <span class="badge badge-danger h2">Đóng cửa</span>
                  @endif
                </p>
                <hr>
                <strong><i class="fas fa-pencil-alt mr-1"></i>Ngày Tạo</strong>
                <div class="time-label">
                        <span class="bg-danger profile-date">
                          {{date('d/m/Y', strtotime($store->ch_ngaytao))}}
                        </span>
                      </div>
                </div>

              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-6">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab"><i class="fas fa-camera"></i> Banner</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab"><i class="far fa-file-alt mr-1"></i> Thông Tin Mô Tả</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    <div class="post">
                      <div class="user-block">
                        
                      </div>
                      <!-- /.user-block -->
                      <div class="row mb-3">
                        <div class="col-sm-6">
                          <img class="img-fluid" src="{{ asset($store->ch_banner) }}" alt="Banner">
                        </div>
                      </div>
                      <p>
                        <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
                        <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                        <span class="float-right">
                          <a href="#" class="link-black text-sm">
                            <i class="far fa-comments mr-1"></i> Comments
                          </a>
                        </span>
                      </p>
                    </div>
                    <!-- /.post -->
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline">
                    <!-- The timeline -->
                    <div class="timeline timeline-inverse">
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-comments bg-warning"></i>
                        <div class="timeline-item">
                          <div class="timeline-body">
                            {{ $store->ch_thongtin }}
                          </div>
                          <div class="timeline-footer">
                            <a href="#" class="btn btn-warning btn-flat btn-sm">View</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="settings">
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    {{-- <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Thông tin cửa hàng</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-store"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-store active">Thông tin cửa hàng</li>
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
                            <h3 class="card-title">Thông tin cửa hàng</h3>
                        </div>
                        @include('store.template.alert')
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="brand" class="table table-bordered table-hover">
                                <tbody>
                                  <tr>
                                    <td style="width:20%">Ảnh đại diện</td><td>
                                      <img src="{{ asset($store->ch_anhdaidien) }}" alt="" class="img"></td>
                                  </tr><tr>
                                    <td>Banner</td>
                                    <td><img src="{{ asset($store->ch_banner) }}" alt="" class="img"></td>
                                  </tr><tr>
                                    <td>Tên cửa hàng</td>
                                    <td>{{ $store->ch_ten}}</td>
                                  </tr><tr>
                                    <td>Địa chỉ</td>
                                    <td>{{ $store->ch_diachi }}</td>
                                  </tr><tr>
                                    <td>Trạng thái</td>
                                    <td>
                                    @if (1==$store->ch_trangthai)
                                      <span class="badge badge-success">Hoạt Động</span>
                                    @else
                                        Đóng cửa
                                    @endif</td>
                                  </tr><tr>
                                    <td>Thông tin</td>
                                    <td>{{ $store->ch_thongtin }}</td>
                                  </tr><tr>
                                    <td>Ngày tạo</td>
                                    <td>{{date('d/m/Y', strtotime($store->ch_ngaytao))}}</td>
                                  </tr><tr>
                                    <td>Thao tác</td>
                                    <td>
                                      <button href="{{ route('order.update', $store->ch_id) }}"
                                          class="btn btn-warning" data-toggle="modal"
                                          data-target="#exampleModalCenter{{$store->ch_id}}">Chỉnh sửa</button>
                                          </td>
                                  </tr>
                                </tbody>
                            </table> --}}
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalCenter{{$store->ch_id}}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Trạng thái</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('store.update', $store->ch_id) }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-body">
                                              <div class="form-group">
                                                <label for="my-input">Tên cửa hàng</label>
                                                <div class="input-group mb-3">
                                                  <div class="input-group-prepend">
                                                    <span class="input-group-text">@</span>
                                                  </div>
                                                  <input id="my-input" name="ch_ten" type="text" class="form-control" value="{{$store->ch_ten}}">
                                                </div>
                                              </div>

                                              <div class="form-group">
                                                <label for="my-input">Địa chỉ</label>
                                                {{-- <input id="my-input" class="form-control" type="text" name="ch_diachi" value="{{$store->ch_diachi}}"> --}}
                                                <div class="input-group mb-3">
                                                  <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-map-marker-alt mr-1"></i></span>
                                                  </div>
                                                  <input id="my-input" name="ch_diachi" type="text" class="form-control" value="{{$store->ch_diachi}}">
                                                </div>
                                              </div>
                                              <div class="form-group">
                                                <label for="my-input">Thông tin</label><br>
                                                <textarea name="ch_thongtin" id="" cols="30" rows="10" class="form-control">{{$store->ch_thongtin}}</textarea>
                                              </div>
                                              <div class="form-group">
                                                <label for="my-input">Ảnh đại diện</label>
                                                {{-- <img src="{{ asset($store->ch_anhdaidien) }}" alt="" class="img"> --}}
                                                <img src="{{ asset($store->ch_anhdaidien) }}" alt="" class="img" id="output-avatar">
                                                <input id="my-input" class="form-control" type="file" accept="image/*" name="ch_anhdaidien" id="ch_anhdaidien" onchange="document.getElementById('output-avatar').src = window.URL.createObjectURL(this.files[0])">
                                              </div>
                                              <div class="form-group">
                                                <label for="my-input">Banner</label>
                                                {{-- <img src="{{ asset($store->ch_banner) }}" alt="" class="img"> --}}
                                                <img src="{{ asset($store->ch_banner) }}" alt="" class="img" id="output-banner">
                                                <input id="my-input" class="form-control" type="file" accept="image/*" name="ch_banner" id="ch_banner"  onchange="document.getElementById('output-banner').src = window.URL.createObjectURL(this.files[0])">
                                              </div>
                                              <div class="form-group">
                                                <label for="my-input">Trạng thái</label>
                                                <select name="ch_trangthai" id="" class="form-control">
                                                  <option value="0" @if ($store->ch_trangthai == 0)
                                                      selected
                                                  @endif>Đóng shop</option>
                                                  <option value="1" @if ($store->ch_trangthai == 1)
                                                    selected
                                                @endif>Hoạt động</option>
                                                </select>
                                              </div>
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

@endpush
@endsection
