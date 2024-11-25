@extends('client.template.layout')
@section('content')

<!-- Start Slider Area -->
<div class="slider__container slider--one bg__cat--3">
    <div class="slide__container slider__activation__wrap owl-carousel">
        <!-- Start Single Slide -->
        @foreach ($post as $item)
        <div class="single__slide animation__style01 slider__fixed--height">
            <div class="container">
                <div class="row align-items__center">
                    <div class="col-md-7 col-sm-7 col-xs-12 col-lg-6">
                        <div class="slide">
                            <div class="slider__inner">
                                <h2>{{$item->bv_ngaytao}}</h2>
                                <h1>{{substr($item->bv_tieude,0,13)}}</h1>
                                <div class="cr__btn">
                                    <a href="{{route("post.list")}}">Xem Ngay →</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-5 col-xs-12 col-md-5">
                        <div class="slide__thumb">
                            <img src="{{asset("client/images/banner/big-img/Banner2.png")}}" alt="slider images">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <!-- End Single Slide -->
        <!-- Start Single Slide -->
        <div class="single__slide animation__style01 slider__fixed--height">
            <div class="container">
                <div class="row align-items__center">
                    <div class="col-md-7 col-sm-7 col-xs-12 col-lg-6">
                        <div class="slide">
                            <div class="slider__inner">
                                <h2>collection 2022</h2>
                                <h1>NICE HIỆU</h1>
                                <div class="cr__btn">
                                    <a href="cart.html">AUCTION Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-5 col-xs-12 col-md-5">
                        <div class="slide__thumb">
                            <img src="{{asset("client/images/banner/big-img/Banner1.jpg")}}" alt="slider images">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Single Slide -->
    </div>
</div>
<!-- Start Slider Area -->
<!-- Start Category Area -->
<section class="htc__category__area ptb--100">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="section__title--2 text-center">
                    <h2 class="title__line">SẢN PHẨM ĐANG ĐẤU GIÁ</h2>
                    <img class="item-center" src={{asset("client/images/icons/section-border.png")}}>
                </div>
            </div>
        </div>
        <div class="htc__product__container">
            <div class="row">
                <div class="product__list clearfix mt--30">
                    @foreach ($product as $item)
                    <!-- Start Single Category -->
                    <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                        <div class="category">
                            <div class="ht__cat__thumb">
                                <a href="{{ route('client.product.detail', ['id'=>$item->dg_id]) }}">
                                    <img src="{{asset($item->hasp_duongdan)}}" width="290" height="385" alt="product images">
                                </a>
                            </div>
                            <div class="fr__hover__info">
                                <ul class="product__action">
                                    <li><a href="{{route('client.product.detail', ['id'=>$item->dg_id]) }}" data-tooltip="Bid Now"><i class="icon-heart icons"></i></a></li>

                                    <li><a href="{{route('client.product.detail', ['id'=>$item->dg_id]) }}"><i class="fa fa-gavel"></i></a></li>

                                    <li><a href="{{route('client.product.detail', ['id'=>$item->dg_id]) }}"><i class="fa fa-search"></i></a></li>
                                </ul></div>
                            <div class="fr__product__inner">
                                <h4><a href="{{ route('client.product.detail', ['id'=>$item->dg_id]) }}">{{ $item->sp_ten }}</a></h4>
                                @if($item->isAuction)
                                <ul class="fr__pro__prize">
                                    <li data-countdown="{{ $item->dg_thoigianketthuc}}"></li>
                                </ul>
                                @else
                                <p>Chưa đến thời gian đấu giá</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- End Single Category -->
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Category Area -->
<!-- Start Blog Area -->
<section class="htc__blog__area bg__white ptb--100">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="section__title--2 text-center">
                    <h2 class="title__line">BÀI VIẾT</h2>
                    <p>Cập nhật kịp thời các thông tin nổi bật của sàn</p>
                    <img class="item-center" src={{asset("client/images/icons/section-border.png")}}>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="ht__blog__wrap clearfix">
                @foreach ($post as $item)
                <!-- Start Single Blog -->
                <div class="col-md-6 col-lg-4 col-sm-6 col-xs-12">
                    <div class="blog">
                        <div class="blog__thumb">
                            <a href="{{route("post.list")}}">
                                <img src={{asset($item->bv_hinhanh)}} alt="blog images">
                            </a>
                        </div>
                        <div class="blog__details">
                            <div class="bl__date">
                                <span>{{ $item->bv_ngaytao }}</span>
                            </div>
                            <h2><a href="{{route("post.list")}}">{{ $item->bv_tieude }}</a></h2>
                            <p>{!!
                                    substr($item->bv_noidung,0,300)
                                !!}</p>
                            <div class="blog__btn">
                                <a href={{route("post.list")}} style="color:black">Xem thêm →</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Blog -->
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- End Blog Area -->
<!-- End Banner Area -->
<section class="company">
    <div class="row">
        <div class="col-xs-12">
            <div class="section__title--2 text-center">
                <h2 class="title__line">THƯƠNG HIỆU</h2>
                
                <img class="item-center" src={{asset("client/images/icons/section-border.png")}}>
                {{-- <img class="item-center" style="width:20px;height:20px" src={{asset("client/images/icons/caybua.svg")}}> --}}
                <p class="company-heading">Trusted by 5,000+ Companies Worldwide</p>
            </div>
        </div>
    </div>
    
    <div class="htc__brand__area bg__cat--4">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="ht__brand__inner">
                            <ul class="brand__list owl-carousel clearfix">
                                <li  class="company-logo"><a href="#"><img src="{{asset("client/images/logo/icon-adidas-logo.svg")}}" alt="brand images"></a></li>
                                <li class="company-logo"><a href="#"><img src="{{asset("client/images/logo/drewvector-seeklogo.com.svg")}}" alt="brand images"></a></li>
                                <li class="company-logo"><a href="#"><img src="{{asset("client/images/logo/jordan.svg")}}" alt="brand images"></a></li>
                                <li class="company-logo"><a href="#"><img src="{{asset("client/images/logo/logo.svg")}}" alt="brand images"></a></li>
                                <li class="company-logo"><a href="#"><img src="{{asset("client/images/logo/nike_PNG5.png")}}" alt="brand images"></a></li>
                                <li class="company-logo"><a href="#"><img src="{{asset("client/images/logo/converse.png")}}" alt="brand images"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>

<div class="about">
        <div class="about_image">
            <img src="{{asset("client/images/banner/big-img/banner3.jpg")}}">
        </div>
        <div class="about-wrapper">
            <div class="about-item">
                <div class="about_icon">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                </div>
                <div class="about_content">
                    <span class="about_count">123</span>
                    <p class="about_title">AUCTIONS</p>
                </div>
            </div>

            <div class="about-item">
                <div class="about_icon">
                    
                    <i class="fa fa-users" aria-hidden="true"></i>
                </div>
                <div class="about_content">
                    <span class="about_count">123</span>
                    <p class="about_title">KHÁCH HÀNG</p>
                </div>
            </div>

            <div class="about-item">
                <div class="about_icon">
                    <i class="fa fa-gavel"></i>
                </div>
                <div class="about_content">
                    <span class="about_count">123</span>
                    <p class="about_title">SÀN ĐẤU GIÁ</p>
                </div>
            </div>

            <div class="about-item">
                <div class="about_icon">
                    <i class="fa fa-handshake-o"></i>
                </div>
                <div class="about_content">
                    <span class="about_count">123</span>
                    <p class="about_title">THƯƠNG HIỆU</p>
                </div>
            </div>

            <div class="about-item">
                <div class="about_icon">
                    <i class="fa fa-tags" aria-hidden="true"></i>
                </div>
                <div class="about_content">
                    <span class="about_count">123</span>
                    <p class="about_title">SẢN PHẨM</p>
                </div>
            </div>

            <div class="about-item">
                <div class="about_icon">
                    <i class="fa fa-newspaper-o" aria-hidden="true"></i>
                </div>
                <div class="about_content">
                    <span class="about_count">123</span>
                    <p class="about_title">BÀI VIẾT</p>
                </div>
            </div>

        </div>
    </div>

    {{-- <div class="canhgiua">
        <div class="introduce-icon1 text-center">
            <i class="fa fa-gavel"></i>
        </div>
    </div> --}}
    
@endsection
