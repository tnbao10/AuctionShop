@extends('client.template.layout')
@section('content')
<style>
    .blog{
        width: 50%!important;
    }
</style>
<!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0)  url({{ asset('client/images/banner/big-img/banner-blog.png') }}) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner">
                                <h2 class="h1custom">BÀI VIẾT</h2>
                                <nav class="bradcaump-inner">
                                    <a class="breadcrumb-item" href=""><i class="fa fa-home"></i> TRANG CHỦ</a>
                                    <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                    <span class="breadcrumb-item active">BÀI VIẾT</span>
                                    <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                    <span class="breadcrumb-item active">{{$baiviet->bv_tieude}}</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
<!-- Start Blog Details Area -->
<section class="htc__blog__details bg__white ptb--100">
    <div class="container">
        <div class="row">
            <div class="col-xs-3"></div>
                <div class="col-xs-12 col-lg-12">
                <div class="htc__blog__details__wrap">
                    <div class="ht__bl__thumb">
                        <img src="{{asset($baiviet->bv_hinhanh)}}" alt="blog images">
                    </div>
                    <h1>{{$baiviet->bv_tieude}}</h1>
                    <p>Ngày tạo: {{$baiviet->bv_ngaytao}}</p>
                    <div class="bl__dtl">
                        <p>{!!$baiviet->bv_noidung!!}</p>
                    </div>
                    <div class="ht__comment__form">
                        <h4 class="title__line--5">Leave a Comment</h4>
                        <div class="ht__comment__form__inner">
                            <div class="comment__form">
                                <input type="text" placeholder="Name *">
                                <input type="email" placeholder="Email *">
                                <input type="text" placeholder="Website">
                            </div>
                            <div class="comment__form message">
                                <textarea name="message"  placeholder="Your Comment"></textarea>
                            </div>
                        </div>
                        <div class="ht__comment__btn--2 mt--30">
                            <a class="fr__btn" href="#">Send</a>
                        </div>
                    </div>
                    <!-- End comment Form -->
                </div>
            </div>
            <div class="col-xs-3"></div>

        </div>
    </div>
    
</section>
<!-- End Blog Details Area -->
@endsection
