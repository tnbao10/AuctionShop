<!-- Start Header Style -->
<style>
img, .img {
    max-width: 100%;
    transition: all 0.3s ease-out 0s;
}
</style>

<header id="htc__header" class="htc__header__area header--one">
    <!-- Start Mainmenu Area -->
    <div id="sticky-header-with-topbar" class="mainmenu__wrap sticky__header">
        <div class="container">
            <div class="row">
                <div class="menumenu__container clearfix">
                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                        <div class="logo">
                            <a href="{{route("client.index")}}"><img class="logo-auction" src={{asset("client/images/logo/logo-auction.png")}} alt="logo images"></a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-7 col-sm-4 col-xs-2">
                        <nav class="main__menu__nav hidden-xs hidden-sm">
                            <ul class="main__menu clearfix">
                                <li class="drop"><a href="{{route("client.index")}}">Trang chủ</a></li>
                                <li class="drop">
                                    <a href="{{route('client.search')}}">Cuộc đấu giá</a>
                                    <ul>
                                        <li>
                                            <a href="#">Thời trang ></a>
                                            <ul>
                                                <li><a href="#">Thời trang nam</a></li>
                                                <li><a href="#">Thời trang nữ</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#">Nghệ thuật ></a>
                                            <ul>
                                                <li><a href="#">Đồ Gốm</a></li>
                                                <li><a href="#">Tranh</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Nội thất</a></li>
                                    </ul>
                                    
                                </li>
                                <li class="drop">
                                    <a href="{{route("post.list")}}">Tin tức</a>
                                    <ul>
                                        <li>
                                            <a href="#">Thông báo chung</a>
                                        </li>
                                        <li><a href="#">Thông báo đấu giá</a></li>
                                        <li><a href="#">Tin khác</a></li>
                                    </ul>
                                </li>
                                <li class="drop"><a href="">Giới thiệu</a></li>
                                <li class="drop"><a href="{{URL::to('/about')}}">Liên hệ & Góp ý</a></li>
                            </ul>
                        </nav>
                        <div class="codepro-time oclock  ">
                            <span id="codepro-hour"></span>
                            <span id="codepro-date"></span>
                        </div>
                        <div class="mobile-menu clearfix visible-xs visible-sm">
                            <nav id="mobile_dropdown">
                                <ul>
                                    <li><a href="{{route("client.index")}}">Trang chủ</a></li>
                                    <li><a href="">Giới thiệu</a></li>
                                    <li><a href="{{route('client.search')}}">Cuộc đấu giá</a>
                                        <ul>
                                            <li><a href="">Thời trang</a></li>
                                            <li><a href="">Nghệ thuật</a></li>
                                            <li><a href="">Nội thất</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="{{URL::to('/about')}}">Liên hệ & Góp ý</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-3 col-sm-5 col-xs-5">
                        <div class="header__right">
                            <div class="header__search search search__open">
                                <a href="#"><i class="icon-magnifier icons"></i></a>
                            </div>
                            @if (Auth::guard('nguoidung')->check())
                            <div class="header__account">
                                <a href="{{ route('user.info') }}">{{ Auth::guard('nguoidung')->user()->nd_hoten }}</a>
                            </div>
                            @else
                            <div class="header__account">
                                @if (Auth::guard('nguoidung')->check())
                                <a href="{{ route('user.info') }}">{{ Auth::guard('nguoidung')->user()->nd_hoten }}</a>
                                @else
                                <a href="{{ route('login.view') }}"><i class="icon-user icons"></i></a>
                                @endif
                            </div>
                            @endif
                            @if (Auth::guard('nguoidung')->check())
                            <div class="htc__shopping__cart">
                                <a href="{{ route('logout') }}">Đăng xuất</a>
                            </div>
                            @else
                                <a href="{{ route('login.view') }}">Đăng nhập</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="mobile-menu-area"></div>
        </div>
    </div>
    <!-- End Mainmenu Area -->
</header>
<script type="text/javascript">
    var myVar = setInterval(function() {
        myTimer()
    }, 1000);
    function myTimer() {
        var d = new Date();
        var t = d.toLocaleTimeString();
        document.getElementById("codepro-hour").innerHTML = t;
    }
    n = new Date();
    if (n.getTimezoneOffset() == 0) t = n.getTime() + (7 * 60 * 60 * 1000);
    else t = n.getTime();
    n.setTime(t);
    var dn = new Array("Chủ nhật", "Thứ 2", "Thứ 3", "Thứ 4", "Thứ 5", "Thứ 6", "Thứ 7");
    d = n.getDay();
    m = n.getMonth() + 1;
    y = n.getFullYear()
    var date = dn[d] + ", " + (n.getDate() < 10 ? "0" : "") + n.getDate() + "/" + (m < 10 ? "0" : "") + m + "/" + y;
      document.getElementById("codepro-date").innerHTML = date;
</script>
<!-- End Header Area -->
