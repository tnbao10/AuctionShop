@extends('client.template.layout')
@section('content')
<!-- Start Bradcaump area -->
<div class="ht__bradcaump__area">
    <div class="ht__bradcaump__wrap">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="bradcaump__inner">
                        <nav class="bradcaump-inner">
                          <a class="breadcrumb-item" href="index.html">Trang chủ</a>
                          <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                          <span class="breadcrumb-item active">Thanh toán</span>
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
            <form action="{{ route('payment.handle', ['idCart'=>$product->gh_id]) }}" method="POST">
                @csrf
                <div class="col-md-8">
                    <div class="checkout__inner">
                        <div class="accordion-list">
                            <div class="accordion">
                                <div class="accordion__title">
                                    Thông tin đơn hàng
                                </div>
                                <div class="accordion__body">
                                    <div class="bilinfo">
                                        <div class="row">
                                            <?php $user = Auth::guard('nguoidung')->user(); ?>
                                            <div class="col-md-6">
                                                <div class="single-input">
                                                    <input type="text" value="{{ $user->nd_hoten }}" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-input">
                                                    <input type="text" value="{{ $user->nd_sdt }}"  name="dh_sdt" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="single-input">
                                                    <input type="text" value="{{ $user->nd_diachi }}" name="dh_diachi">
                                                    <input type="text" value="{{ $user->nd_id }}" name="nd_id" hidden>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion__title">
                                    Phương thức thanh toán
                                </div>
                                <div class="accordion__body">
                                    <div class="shipmethod">
                                        <div class="single-input">
                                            <p>
                                                <input type="radio" name="ship-method" id="ship-fast">
                                                <label for="ship-fast">Shipcod</label>
                                            </p>
                                            <p>Cho phép nhận hàng trước khi thanh toán. <br> Phí ship mặc định 30.000 VNĐ</p>
                                        </div>
                                        <div class="single-input">
                                            <p>
                                                <input type="radio" name="ship-method" id="ship-normal">
                                                <label for="ship-normal">VN Pay</label>
                                            </p>
                                            <p>Chúng tôi hỗ trợ thanh toán qua ví VN Pay</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="order-details">
                        <h5 class="order-details__title">Thông tin sản phẩm</h5>
                        <div class="order-details__item">
                            <div class="single-item">
                                <div class="single-item__content">
                                    <a href="#">{{ $product->sp_ten }}</a>
                                    <span class="price">{{ number_format($product->gh_dongia) }} VNĐ</span>
                                </div>
                                {{-- <div class="single-item__remove">
                                    <a href="#"><i class="zmdi zmdi-delete"></i></a>
                                </div> --}}
                            </div>
                        </div>
                        <div class="ordre-details__total">
                            <h5>Tổng tiền</h5>
                            <span class="price">{{ number_format($product->gh_dongia) }} VNĐ</span>
                        </div>
                    </div>

                    <div class="contact-btn">
                        <button type="submit" class="fv-btn">Xác nhận</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- cart-main-area end -->
@endsection
