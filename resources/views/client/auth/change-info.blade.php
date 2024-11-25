@extends('client.template.layout')
@section('content')

<div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url({{ asset('client/images/banner/big-img/banner-forgetpassword.png') }}) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner">
                                <nav class="bradcaump-inner">
                                <h2 class="h1custom"></h2>
                                <a class="breadcrumb-item" href="">Trang chủ</a>
                                <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                <span class="breadcrumb-item active">Chỉnh sửa thông tin cá nhân</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!-- Start Slider Area -->
<!-- Start Category Area -->
<section class="htc__category__area ptb--100">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="section__title--2 text-center">
                    <h2 class="title__line">Chỉnh sửa thông tin cá nhân</h2>
                </div>
            </div>
        </div>
        <div class="htc__product__container">
            <div class="row bilinfo">
                <div class="row">
                    <form action="{{ route('handle.change.info') }}" method="POST">
                        @csrf
                        <div class="col-md-6">
                            <div class="col-md-12">
                                <div class="single-input">
                                    <label for="">Họ và tên</label>
                                    <input type="text" name="nd_hoten" value="{{ Auth::guard('nguoidung')->user()->nd_hoten }}" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="single-input">
                                    <label for="">Email</label>
                                    <input type="email" name="nd_email" value="{{ Auth::guard('nguoidung')->user()->nd_email }}" required readonly>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="single-input">
                                    <label for="">Số điện thoại</label>
                                    <input type="text" name="nd_sdt" required value="{{ Auth::guard('nguoidung')->user()->nd_sdt }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="single-input">
                                    <label for="">Ngày sinh</label>
                                    <br>
                                    <input type="date" class="col-md-12" name="nd_namsinh" required value="{{ Carbon\Carbon::parse(Auth::guard('nguoidung')->user()->nd_namsinh)->format('Y-m-d') }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="single-input">
                                    <label for="">Địa chỉ</label>
                                    <input type="text" name="nd_diachi" required value="{{ Auth::guard('nguoidung')->user()->nd_diachi }}">
                                </div>
                            </div>

                        </div>
                        <br>

                        <div class="col-md-12">
                            <div class="col-md-12">
                                <div class="single-input text-center">
                                    <button type="submit" class="fv-btn">Đổi thông tin</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Category Area -->
@endsection
