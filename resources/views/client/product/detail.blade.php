@extends('client.template.layout')
@section('content')

<div class="body__overlay"></div>
<!-- Start Product Details Area -->
<section class="htc__product__details bg__white ptb--100">
    <!-- Start Product Details Top -->
    <div class="htc__product__details__top">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">
                    <div class="htc__product__details__tab__content">
                        <!-- Start Product Big Images -->
                        <div class="product__big__images">
                            <div class="portfolio-full-image tab-content">
                                @foreach ($imageProduct as $item)
                                    <div role="tabpanel" class="tab-pane fade in {{ $item->hasp_anhdaidien == 1 ? 'active' : '' }}" id="img-tab-{{ $item->hasp_id }}">
                                        <img src="{{ asset($item->hasp_duongdan) }}" alt="full-image">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- End Product Big Images -->
                        <!-- Start Small images -->
                       
                        <!-- End Small images -->
                    </div>
                </div>
                <div class="col-md-7 col-lg-7 col-sm-12 col-xs-12 smt-40 xmt-40">
                    <div class="ht__product__dtl">
                        <h2>{{ $detail->sp_ten }}</h2>
                        <hr/>
                        <ul  class="pro__prize">
                            <li class="old__prize">THUỘC SÀN ĐẤU GIÁ: </li>
                            <li><a href="{{ route('client.product.by.store', ['id'=>$detail->ch_id]) }}" title="Xem sàn đấu giá" ><h2 style="color:#c43b68 ">{{ $detail->ch_ten}} </h2></a></li>
                        </ul>
                        <hr/>
                        @php
                            property_exists($detail,'dg_thoigianketthuc');
                        @endphp
                            @if (property_exists($detail,'dg_thoigianketthuc') == true)
                                <ul  class="pro__prize">
                                    <li class="old__prize">Thời gian còn lại</li>
                                </ul>
                                <br>
                                <ul data-countdown="{{ $detail->dg_thoigianketthuc}}" style="color: red" class="count btncustom"></ul>
                                <br>
                                <ul  class="pro__prize">
                                    <li class="old__prize">Giá khởi điểm: </li>
                                    <li>{{ number_format($detail->dg_giakhoidiem) }} VNĐ</li>
                                </ul>
                                <br>
                                <ul  class="pro__prize">
                                    <li class="old__prize">Giá tăng tối thiểu: </li>
                                    <li>{{ number_format($detail->dg_buocnhay) }} VNĐ</li>
                                </ul>
                                <br>
                                <ul  class="pro__prize">
                                    <li class="old__prize">Giá cao nhất hiện tại</li>
                                </ul>
                                <br>
                                <ul class="h1custom btncustom" id="maxPrice">{{ $maxPrice != null ? number_format($maxPrice->ctdg_giatien) : 0 }} VNĐ</ul>
                                <br>
                                <ul  class="pro__prize">
                                    <li class="old__prize">Nhập giá đấu</li>
                                </ul>
                                <div class="ht__pro__desc">
                                <div class="sin__desc align--left">
                                @if ($detail->dg_thoigianketthuc > Carbon\Carbon::now())
                                        <form action="{{ route('client.product.audit') }}" method="GET">
                                            <div class="single-input">
                                                <input type="number" name="auditPrice" style=" padding-left: 1rem!important;
                                                    padding-right: 1rem!important;
                                                    padding-bottom: 0.5rem!important;
                                                    padding-top: 0.5rem!important;">
                                                <button class="fv-btn">Đấu giá</button>
                                            </div>
                                            <input type="text" name="auditId" value="{{ $detail->dg_id }}" hidden>
                                            <input type="text" name="userId" value="{{ Auth::guard('nguoidung')->id() }}" hidden>
                                        </form>
                                    </div>
                                @else
                                    <div class="sin__desc hetthoigian">
                                        <p class="hetthoigian" style="color:#fff;">Hết thời gian đấu giá</p>
                                    </div>
                                @endif
                        </div>
                        @else
                        <p style="color: red;">Sản phẩm chưa đăng ký đấu giá</p>
                        <ul  class="pro__prize">
                            <li class="old__prize">Thời gian còn lại: </li>
                            <li>00:00:00</li>
                        </ul>
                        <ul  class="pro__prize">
                            <li class="old__prize">Giá khởi điểm: </li>
                            <li>0</li>
                        </ul>
                        <ul  class="pro__prize">
                            <li class="old__prize">Bước nhảy: </li>
                            <li>0</li>
                        </ul>
                        <ul  class="pro__prize">
                            <li class="old__prize">Giá cao nhất: </li>
                            <li>0</li>
                        </ul>

                        <div class="ht__pro__desc">

                            @if ( Auth::guard('nguoidung')->check())
                                <div class="sin__desc align--left">
                                    <form action="{{ route('client.product.audit') }}" method="GET">
                                        <div class="single-input">
                                            <input type="number" name="auditPrice">
                                            <button class="shopping__btn">Đấu giá</button>
                                        </div>
                                        <input type="text" name="auditId" value="{{ $detail->dg_id }}" hidden>
                                        <input type="text" name="userId" value="{{ Auth::guard('nguoidung')->id() }}" hidden>
                                    </form>
                                </div>
                            @else
                            <div class="sin__desc">
                                <p style=" padding-left: 1rem!important;
                                                    padding-right: 1rem!important;
                                                    padding-bottom: 0.5rem!important;
                                                    padding-top: 0.5rem!important;">Vui lòng đăng nhập để tham gia đấu giá. <a href="{{ route('login.view') }}">Tại đây</a></p>
                            </div>
                            @endif
                        </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Product Details Top -->
</section>
<!-- End Product Details Area -->
<!-- Start Product Description -->
<section class="htc__produc__decription bg__white">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <!-- Start List And Grid View -->
                <ul class="pro__details__tab" role="tablist">
                    <li role="presentation" class="description active"><a href="#description" role="tab" data-toggle="tab">Thông tin đấu giá</a></li>
                    <li role="presentation" class="review"><a href="#review" role="tab" data-toggle="tab">Thông tin sản phẩm</a></li>
                    {{-- <li role="presentation" class="shipping"><a href="#shipping" role="tab" data-toggle="tab">shipping</a></li> --}}
                </ul>
                <!-- End List And Grid View -->
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="ht__pro__details__content">
                    <!-- Start Single Content -->
                    <div role="tabpanel" id="description" class="pro__single__content tab-pane fade in active">
                        <div class="pro__tab__content__inner">
                            <table class="table table-light"  id="auditDetail">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Thời gian</th>
                                        <th>Giá</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($audit as $item)
                                    <tr class="item-audit">
                                        <td>{{ $item->ctdg_thoigian }}</td>
                                        <td>{{ number_format($item->ctdg_giatien) }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- End Single Content -->
                    <!-- Start Single Content -->
                    <div role="tabpanel" id="review" class="pro__single__content tab-pane fade">
                        <div class="pro__tab__content__inner">
                            <p>{!! $detail->sp_mota !!}</p>
                        </div>
                    </div>
                    <!-- End Single Content -->
                </div>
            </div>
        </div>
    </div>
</section>
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
<!-- End Product Description -->
<!-- End Blog Area -->
<!-- End Banner Area -->
@push('audit-pusher')
{{-- <script src="https://js.pusher.com/3.1/pusher.min.js"></script> --}}
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script>
    var mainTable = $('#auditDetail');
    var detailTable = mainTable.find('tbody');
    var maxPrice = $('#maxPrice');
    //Thay giá trị PUSHER_APP_KEY vào chỗ xxx này nhé
    var pusher = new Pusher('93855d1d3bab4b932281', {
        encrypted: true,
        cluster: "ap1"
    });
    // Subscribe to the channel we specified in our Laravel Event
    var channel = pusher.subscribe('audit');
    console.log(channel);
        // Bind a function to a Event (the full Laravel class)
    // var channel = window.Echo.channel('my-channel');
    channel.bind('audit-action', function(data) {
        console.log(data);
        var newRecord = `
            <tr class="item-audit">
                <td>`+ data.auditTime +`</td>
                <td>`+ data.auditPrice +`</td>
            </tr>
        `;
        detailTable.prepend(newRecord);
        maxPrice.html(data.maxPrice);
    });
</script>
@endpush
@endsection
