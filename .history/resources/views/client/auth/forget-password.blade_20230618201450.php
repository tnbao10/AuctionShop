@extends('client.template.layout')
@section('content')

<div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url({{ asset('client/images/banner/big-img/banner-forgetpassword.png') }}) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner">
                                <nav class="bradcaump-inner">
                                <h2 class="h1custom">QUÊN MẬT KHẨU</h2>
                                <a class="breadcrumb-item" href="">Trang chủ</a>
                                <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                <span class="breadcrumb-item active">Quên mật khẩu</span>
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
                    {{-- <h2 class="title__line">Quên mật khẩu</h2> --}}
                </div>
            </div>
        </div>
        <div class="htc__product__container">
            <div class="row bilinfo">
                <div class="row">
                    <form action="{{ route('handle.forget.password') }}" method="POST">
                        @csrf
                        <p>Vui lòng nhập email đã đăng ký tài khoản</p>
                        <div class="col-md-12">
                            <div class="single-input">
                                <label for="">Email</label>
                                <input type="email" name="nd_email" required>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="col-md-12">
                                <div class="single-input text-center">
                                    <button type="submit" class="fv-btn">Xác thực</button>
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
