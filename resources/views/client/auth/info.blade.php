@extends('client.template.layout')
@section('content')

<link rel="stylesheet" href="{{asset("client/css/shortcode/slider.css")}}">
<div class="body__overlay"></div>
        <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url({{ asset('client/images/banner/big-img/info.png') }}) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner">
                                <nav class="bradcaump-inner">
                                <a class="breadcrumb-item" href="">Trang chủ</a>
                                <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                <span class="breadcrumb-item active">Thông tin cá nhân</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- cart-main-area start -->
        <div class="checkout-wrap ptb--100">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="checkout__inner">
                            <div class="accordion-list">
                                <div class="accordion">
                                    <div class="accordion__title">
                                        Thông tin cá nhân
                                    </div>
                                    <div class="accordion__body">
                                        <div class="shipinfo">
                                            <p><b>Họ tên:</b> {{ Auth::guard('nguoidung')->user()->nd_hoten }}</p>
                                            <hr/>
                                            <p><b>Năm sinh:</b> {{ Auth::guard('nguoidung')->user()->nd_namsinh }}</p>
                                            <hr/>
                                            <p><b>Số điện thoại:</b> {{ Auth::guard('nguoidung')->user()->nd_sdt }}</p>
                                            <hr/>
                                            <p><b>Email:</b> {{ Auth::guard('nguoidung')->user()->nd_email }}</p>
                                            <hr/>
                                            <p><b>Địa chỉ:</b> {{ Auth::guard('nguoidung')->user()->nd_diachi }}</p>
                                            <hr/>
                                            <p><a href="{{ route('view.change.info') }}" class="fv-btn" style="padding: 17px 30px;">Đổi thông tin cá nhân</a></p>
                                            <hr/>
                                            @if ($storeInfo != null)
                                                @if ($storeInfo->ch_trangthai == 0)
                                                    <p class="hetthoigian" style="color: white; text-align: center;"><i class="fa fa-window-close-o icons" aria-hidden="true" style="font-size:20px"></i> Sàn đấu giá chưa được xác thực <i class="fa fa-window-close-o icons" aria-hidden="true" style="font-size:20px"></i></p> 
                                                @else
                                                    <a href="{{ route('store.detail') }}" style="font-size: 24px"><i class="zmdi zmdi-long-arrow-right" ></i>Xem sàn đấu giá  <i class="fa fa-address-card-o"></i></a>
                                                @endif
                                            @else
                                            <a href="#" class="ship-to-another-trigger"><i class="zmdi zmdi-long-arrow-right "></i>Đăng ký sàn đấu giá</a>
                                            @endif

                                            <div class="ship-to-another-content">
                                                <form action="{{ route('store.register') }}" method="POST">
                                                    @csrf
                                                    <input hidden type="text" name="nd_id" value="{{ Auth::guard('nguoidung')->user()->nd_id }}">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="single-input">
                                                                <input type="text" name="ch_ten" placeholder="Tên cửa hàng">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="single-input">
                                                                <input type="text" name="ch_diachi" placeholder="Địa chỉ">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="single-input">
                                                                <textarea name="ch_thongtin" id="" cols="30" rows="10" style="background: unset; border-color: #888"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="single-input dark-btn">
                                                                <button type="submit" class="fv-btn">Tạo cửa hàng</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion__title">
                                        Thông tin đơn hàng mua
                                    </div>
                                    <div class="accordion__body">
                                        @foreach ($bill as $item)
                                        <div class="shp__single__product">
                                            <div class="shp__pro__thumb">
                                                <a href="#">
                                                    <?php $imageProductCart = DB::table('hinhanhsanpham')->where('sp_id', $item->sp_id)->where('hasp_anhdaidien', 1)->first(); ?>
                                                            <img src="{{ asset($imageProductCart->hasp_duongdan) }}" alt="product images">
                                                </a>
                                            </div>
                                            <div class="shp__pro__details">
                                                <h1><a href="">{{ $item->sp_ten }}</a></h1>
                                                <br>
                                                <h2>{{ number_format($item->ctdh_dongia) }} VNĐ </h2>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="accordion__title">
                                        Giỏ hàng &nbsp;<i class="icon-handbag icons"></i>
                                    </div>
                                    
                                    <div class="accordion__body">
                                        <div>
                                            <div class="shp__cart__wrap">
                                                @foreach ($cart as $item)
                                                <div class="shp__single__product">
                                                    <div class="shp__pro__thumb">
                                                        <a href="#">
                                                            <?php $imageProductCart = DB::table('hinhanhsanpham')->where('sp_id', $item->sp_id)->where('hasp_anhdaidien', 1)->first(); ?>
                                                            <img src="{{ asset($imageProductCart->hasp_duongdan) }}" alt="product images">
                                                        </a>
                                                    </div>
                                                    <div class="shp__pro__details">
                                                        <h1><a href="">{{ $item->sp_ten }}</a></h1>
                                                        <h2>{{ number_format($item->gh_dongia) }} VNĐ </h2>
                                                        <br>
                                                        <a href="{{ route('payment.index', ['idCart'=>$item->gh_id]) }}" title="Thanh toán" class="fv-btn" style="padding: 17px 30px;">Thanh toán</a>
                                                    </div>
                                                </div>
                                                @endforeach
                                                <p style="color: orange;">Sản phẩm sẽ tự xóa khỏi giỏ hàng sau 3 ngày, vui lòng ấn thanh toán</p>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="accordion__title">
                                        Sản phẩm đã đấu giá
                                    </div>
                                    <div class="accordion__body">
                                        <div class="paymentinfo">
                                            <div class="single-method">
                                                <a href="#"><i class="zmdi zmdi-long-arrow-right"></i>Check/ Money Order</a>
                                            </div>
                                            <div class="single-method">
                                                <a href="#" class="paymentinfo-credit-trigger"><i class="zmdi zmdi-long-arrow-right"></i>Credit Card</a>
                                            </div>
                                            <div class="paymentinfo-credit-content">
                                                <form action="#">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="single-input mt-0">
                                                                <input type="text" placeholder="Name on card">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="single-input">
                                                                <select name="bil-country" id="payment-info-type">
                                                                    <option value="select">Card type</option>
                                                                    <option value="card-1">Card type 1</option>
                                                                    <option value="card-2">Card type 2</option>
                                                                    <option value="card-3">Card type 3</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="single-input">
                                                                <input type="text" placeholder="Credit Card Number*">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="single-input">
                                                                <select>
                                                                    <option>Select Month</option>
                                                                    <option>Jan</option>
                                                                    <option>Feb</option>
                                                                    <option>Mar</option>
                                                                    <option>Apr</option>
                                                                    <option>May</option>
                                                                    <option>Jun</option>
                                                                    <option>Jul</option>
                                                                    <option>Aug</option>
                                                                    <option>Sep</option>
                                                                    <option>Oct</option>
                                                                    <option>Nov</option>
                                                                    <option>Dec</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="single-input">
                                                                <select>
                                                                    <option>Select Year</option>
                                                                    <option>2015</option>
                                                                    <option>2016</option>
                                                                    <option>2017</option>
                                                                    <option>2018</option>
                                                                    <option>2019</option>
                                                                    <option>2020</option>
                                                                    <option>2021</option>
                                                                    <option>2022</option>
                                                                    <option>2023</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="single-input">
                                                                <input type="text" placeholder="Card verification number*">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="delivery-details">
                        <ul class="delivery-list">
                            <li class="delivery-list-item">
                                <span class="location_cart" style=" background-image: url(https://www.chilindo.com/assets/svgIcon/location_cart.svg);"></span>
                                <h3> Khi nào tôi nhận được hàng? </h3>
                                <p>Trong vòng 1-3 ngày làm việc</p>
                            </li>
                            <li class="delivery-list-item">
                                <span class="location_cart" style="background-image: url(https://www.chilindo.com/assets/svgIcon/return_cart.svg)"></span>
                                <h3>Điều khoản hoàn trả của sàn Auction là gì?</h3>
                                <p>Bạn có thể hoàn lại trong vòng 30 ngày</p>
                            </li>
                            <li class="delivery-list-item">
                                <span class="location_cart" style="background-image: url(https://www.chilindo.com/assets/svgIcon/done_cart.svg)"></span>
                                <h3> Bạn cần hổ trợ?</h3>
                                <p>Liên hệ: auction@gmail.com</p>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
        <!-- cart-main-area end -->
        
        <!-- End Brand Area -->
@endsection
