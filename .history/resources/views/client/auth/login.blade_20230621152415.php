@extends('client.template.layout')
@section('content')

<div class="body__overlay"></div>

<link rel="stylesheet" href={{asset("deskapp/vendors/styles/core.css")}}> 
<link rel="stylesheet" href={{asset("deskapp/vendors/styles/icon-font.min.css")}}>
<link rel="stylesheet" href={{asset("deskapp/vendors/styles/style.css")}}>

<!-- Start Category Area -->
<section class="htc__category__area ptb--100">
<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
<div class="container">
			<div class="row align-items-center">
				<div class="col-md-6 col-lg-7">
					<img src="{{asset('/deskapp/vendors/images/login-page-img-auction.png')}}" alt="">
				</div>
				<div class="col-md-6 col-lg-5">
					<div class="login-box bg-white box-shadow border-radius-10">
						<div class="login-title">
							<h2 class="text-center text-primary title__line">Đăng nhập</h2>
						</div>
						<form action="{{ route('login.handle') }}">
                        @csrf
							<div class="select-role">
								<div class="btn-group btn-group-toggle" data-toggle="buttons">
									<label class="btn active">
										<input type="radio" name="options" id="admin">
										<div class="icon"><img src="{{asset('/deskapp/vendors/images/briefcase.svg')}}" class="svg" alt=""></div>
										<span>Tôi là</span>
										Khách Hàng
									</label>
									<label class="btn">
										<input type="radio" name="options" id="user">
										<div class="icon"><img src="{{asset('/deskapp/vendors/images/person.svg')}}" class="svg" alt=""></div>
										<span>Tôi là</span>
										Nhà Thầu
									</label>
								</div>
							</div>
							<div class="input-group custom">
								<input type="text" class="form-control form-control-lg" placeholder="Username" name="username">
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
								</div>
							</div>
                            <div class="input-group custom">
								<input type="password" name="password" class="form-control form-control-lg" placeholder="**********">
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="dw dw-padlock1"></i></span>
								</div>
							</div>
							
                            <div class="row pb-30">
								{{-- <div class="col-6">
									<div class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input" id="customCheck1">
										<label class="custom-control-label" for="customCheck1">Remember</label>
									</div>
								</div> --}}
								<div class="col-6">
									<div class="forgot-password"><a href="{{route('forget.pass')}}">Quên mật khẩu</a></div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="input-group mb-0">

										{{-- <a class="btn btn-primary btn-lg btn-block" href="index.html">Sign In</a> --}}
                                        <button type="submit" class="btn btn-primary btn-lg btn-block">Đăng nhập</button>
									</div>
									<div class="font-16 weight-600 pt-10 pb-10 text-center" data-color="#707373">Hoặc</div>
									<div class="input-group mb-0">
										{{-- <a class="btn btn-outline-primary btn-lg btn-block" href="register.html">Register To Create Account</a> --}}
                                        <a href="{{ route('register.view') }}" class="btn btn-outline-primary btn-lg btn-block">Đăng ký</a>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
    {{-- <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="section__title--2 text-center">
                    <h2 class="title__line">Đăng nhập</h2>
                </div>
            </div>
        </div>
        <div class="htc__product__container">
            <div class="row bilinfo">
                <div class="row">
                    <div class="col-md-3"></div>
                    <form action="{{ route('login.handle') }}">
                        @csrf
                        <div class="col-md-6">
                            <div class="col-md-12">
                                <div class="single-input">
                                    <input type="text" name="username" placeholder="Tên đăng nhập">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="single-input">
                                    <input type="password" name="password" placeholder="Mật khẩu">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="single-input dark-btn">
                                    <button type="submit" class="fv-btn">Đăng nhập</button>
                                    <a href="{{ route('register.view') }}" class="fv-btn">Đăng ký</a>
                                </div>
                                <a href="{{ route('forget.pass') }}">Quên mật khẩu</a>
                            </div>
                        </div>
                    </form>
                    <div class="col-md-3"></div>
                </div>
            </div>
        </div>
    </div> --}}
    </div>
</section>
<!-- End Category Area -->
@endsection
