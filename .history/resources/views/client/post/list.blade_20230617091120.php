@extends('client.template.layout')
@section('content')
<style>
.block-ellipsis {
  display: block;
  display: -webkit-box;
  max-width: 100%;
  height: 43px;
  margin: 0 auto;
  font-size: 14px;
  line-height: 1;
  -webkit-line-clamp: 3;
  -webkit-box-orient: vertical;
  overflow: hidden;
  text-overflow: ellipsis;
}
</style>
<!-- End Bradcaump area -->
        <!-- Start Blog Area -->
        <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url({{ asset('client/images/banner/big-img/banner-blog.png') }}) no-repeat scroll center center / cover ;">
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
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="htc__blog__area bg__white ptb--100">
            <div class="container">
                <div class="row">
                    <div class="ht__blog__wrap blog--page clearfix">
                        @if ($data->count() == 0)
                            <p>Chưa có bài viết</p>
                        @else
                        @foreach ($data as $item)
                        <div class="col-md-6 col-lg-4 col-sm-12 col-xs-12">
                            <div class="blog">
                                <div class="blog__thumb">
                                    <a href="{{route("post.detail",$item->bv_id)}}">
                                        <img src="{{asset($item->bv_hinhanh)}}" alt="blog images">
                                    </a>
                                </div>
                                <div class="blog__details">
                                    <div class="bl__date">
                                        <span>{{$item->bv_ngaytao}}</span>
                                    </div>
                                    <h2><a href="{{route("post.detail",$item->bv_id)}}">{{$item->bv_tieude}}</a></h2>
                                <p class="block-ellipsis">{!!
                                    substr($item->bv_noidung,0,300)
                                !!}</p>
                                    <div class="blog__btn">
                                        <a href="{{route("post.detail",$item->bv_id)}}" style="color:black">Xem thêm →</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif


                    </div>
                </div>
                <!-- Start PAgenation -->
                <div class="row">
                    <div class="col-xs-12">
                        <ul class="htc__pagenation">
                            {{$data->links()}}
                        </ul>
                    </div>
                </div>
                <!-- End PAgenation -->
            </div>
        </section>
        <!-- End Blog Area -->

@endsection
