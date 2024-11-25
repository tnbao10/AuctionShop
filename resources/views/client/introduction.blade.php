@extends('client.template.layout')
@section('content')
<style>
    .lgt{
        text-align:center;
        font-family: Arial, Helvetica, sans-serif;
        
    }

    .ct{
        font-size:25px;
        margin:30px;
        line-height: 1.5;
        text-indent: 30px;
        font-weight: bold;
    }
</style>
    
    <!-- Start Bradcaump area -->
    <div class="ht__bradcaump__area"
        style="background: rgba(0, 0, 0, 0) url({{ asset('client/images/banner/big-img/banner-procut.png') }}) no-repeat scroll center center / cover ;">
        <div class="ht__bradcaump__wrap">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="bradcaump__inner">
                            <nav class="bradcaump-inner">
                                <a class="breadcrumb-item" href="index.html">Trang chủ</a>
                                <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                <span class="breadcrumb-item active">Giới Thiệu</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div style="margin: 350px;" >
        <h1  class="lgt">Lời giới thiệu</h1>
        <p class="ct">Công ty Đấu giá chúng tôi xin được gửi lời chào trân trọng nhất tới Quý Khách hàng. Trong xu thế phát triển tất yếu của nghề “Bán đấu giá”, Công ty Đấu giá chúng tôi đã được hình thành. Với một Hội đồng cố vấn gồm các chuyên viên đấu giá, luật sư nhiều năm kinh nghiệm và được điều hành bởi các đấu giá viên chuyên nghiệp của Bộ Tư pháp, chúng tôi là một trong 18 đơn 
        vị bán đấu giá chuyên nghiệp trên địa bàn thành phố Hà Nội được Sở Tư pháp Thành phố Hà Nội tổng hợp trong báo cáo số 35/BC-STP, ngày 15 tháng 8 năm 2011. Là đơn vị đấu giá duy nhất được Chủ tịch Ủy ban nhân dân Thành phố Hà Nội tặng bằng khen vì “đã có thành tích trong hoạt động bổ trợ Tư pháp năm 2014” ngày 19/03/2015. Công ty chúng tôi hiện có Chi nhánh tại các thành phố lớn trên 
        toàn quốc như: Thành phố Hồ Chí Minh, Thành phố Đà Nẵng, cũng như các Văn phòng đại diện trên toàn địa bàn thành phố Hà Nội.</p>
        <p class="ct">Công ty Đấu giá của chúng tôi là một thành viên với hệ thống Văn phòng Công chứng và Công ty Luật có chuyên môn nghiệp vụ cao, đây là sự hỗ trợ đắc lực cho hoạt động bán đấu giá tài sản của Công ty chúng tôi. Do đó, Công ty Đấu giá của chúng tôi luôn tin tưởng và đảm bảo sẽ đem đến cho Quý Khách hàng chất lượng dịch vụ tốt nhất và hiệu quả nhất.
        Chúng tôi được biết Quý Khách hàng đang có nhu cầu về tư vấn và tổ chức bán đấu giá tài sản, vì vậy Công ty chúng tôi xin gửi Hồ sơ đề xuất giới thiệu về năng lực của Công ty với mong muốn được chọn là tổ chức bán đấu giá tài sản cho Quý Khách hàng.
        Với phương châm hoạt động: “Đem lại hiệu quả kinh tế vượt trội”, chúng tôi hy vọng sẽ làm hài lòng Quý Khách và mong muốn được đồng hành cùng Quý Khách hàng trong suốt quá trình hoạt động và phát triển.</p>
    </div>
    <!-- End Bradcaump area -->
        <!-- End Bradcaump area -->
@endsection
