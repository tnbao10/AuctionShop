@extends('client.template.layout')
@section('content')

<div class="body__overlay"></div>
<!-- Start Slider Area -->
<!-- Start Category Area -->
<section class="htc__category__area ptb--100" style="background-image:url({{asset('client/images/banner/big-img/background-register.png')}}); background-size: cover;">
    <div class="container" >
{{-- https://res.cloudinary.com/loly-cup-tea/image/upload/v1652069252/Thi%E1%BA%BFt_k%E1%BA%BF_ch%C6%B0a_c%C3%B3_t%C3%AAn_3_eylkrr.png--}}
        <div class="row">
            <div class="col-xs-12">
                <div class="section__title--2 text-center">
                    <h2 class="title__line">Đăng ký</h2>
                </div>
            </div>
        </div>
        <div class="htc__product__container" >
            <div class="row bilinfo">
                <div class="row">
                    <form action="{{ route('register.handle') }}" method="POST">
                        @csrf
                        <div class="col-md-6">
                            <div class="col-md-12">
                                <div class="single-input">
                                    <label for="">Họ và tên</label>
                                    <input type="text" name="nd_hoten" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="single-input">
                                    <label for="">Email</label>
                                    <input type="email" name="nd_email" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="single-input">
                                    <label for="">Số điện thoại</label>
                                    <input type="text" name="nd_sdt" minlength="9" maxlength="10" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="single-input">
                                    <label for="">Ngày sinh</label>
                                    <br>
                                    <input type="date" class="col-md-12" name="nd_namsinh" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="single-input">
                                    <label for="">Địa chỉ</label>
                                    <input type="text" name="nd_diachi" required>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="col-md-12">
                                <div class="single-input">
                                    <label for="">Tên đăng nhập</label>
                                    <input type="text" name="username" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="single-input">
                                    <label for="">Mật khẩu</label>
                                    <input type="password" name="password" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="single-input">
                                    <label for="">Nhập lại mật khẩu</label>
                                    <input type="password" name="re_password" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="col-md-12">
                                <div class="single-input text-center">
                                    <button type="submit" class="fv-btn">Đăng ký</button>
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
