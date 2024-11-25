-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 03, 2023 lúc 01:04 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `daugia`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `baiviet`
--

CREATE TABLE `baiviet` (
  `bv_id` bigint(20) UNSIGNED NOT NULL,
  `bv_tieude` varchar(255) NOT NULL,
  `bv_hinhanh` varchar(255) NOT NULL,
  `bv_noidung` text NOT NULL,
  `bv_trangthai` int(11) NOT NULL DEFAULT 0,
  `bv_ngaytao` date NOT NULL DEFAULT '2022-05-10',
  `qt_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `baiviet`
--

INSERT INTO `baiviet` (`bv_id`, `bv_tieude`, `bv_hinhanh`, `bv_noidung`, `bv_trangthai`, `bv_ngaytao`, `qt_id`, `created_at`, `updated_at`) VALUES
(1, 'Các Bước Tham Gia Đấu Giá Trực Tuyến', 'upload/images/post/banner4.jpg', '<p style=\"text-align: center; \"><u>Để tiến hành phiên đấu giá điện tử, phải thực hiện các giai đoạn sau:</u>\r\n</p><ol><li style=\"text-align: left;\">&nbsp;Giai đoạn 1: Đăng ký\r\nKhi người mua và người bán muốn tham gia đấu giá, họ phải đăng ký với hệ \r\nthống tùy theo mục đích của từng người. Người mua muốn đăng ký tham gia vào phiên \r\nđấu giá và mua được món hàng ưng ý với giá rẻ nhất, người bán đăng ký sản phẩm của \r\nmình, để có thể bán được hàng với số lượng lớn, đồng thời đảm bảo lợi nhuận cao.\r\nĐối với giai đoạn<font color=\"#ff0000\"> <b>đăng ký</b></font>: cần xác thực những thông tin của hai bên tham gia.\r\nĐối với người mua, hệ thống phải xác thực những thông tin như: họ tên, ngày \r\ntháng năm sinh, số CMT, email …đặc biệt là phải xác thực về tài khoản của người mua, \r\nxem tài khoản đó có thực hay không? Nếu có thì tài khoản đó có đủ để tham gia vào \r\nphiên đấu giá đó không?\r\nĐối với ngƣời bán, hệ thống tập trung xác thực vào các sản phẩm người chủ\r\nhàng cần đấu giá. Khi người bán đăng ký sản phẩm, sẽ có bộ phận xác định xem sản \r\nphẩm đó có hay không, là hàng thật hay hàng giả, giá trị thực tế là bao nhiêu.\r\nThông tin của người đấu giá sau khi đăng ký hoàn toàn được giữ kín cho đến \r\nkhi kết thúc phiên đấu giá. Nếu anh ta là người thắng cuộc thì danh tính của anh ta mới \r\nđược tiết lộ để mọi người có thể kiểm tra. Nếu không phải là người thắng cuộc thì danh \r\ntính của anh ta sẽ khôgn bị lộ diện. Như vậy, phiên đấu giá đảm bảo được tính ẩn danh \r\nngười đấu giá. </li><li>Giai đoạn 2: Giới thiệu sản phẩm và thiết lập phiên đấu giá.\r\nỞ giai đoạn này, hệ thống và người bán một lần nữa thẩm định lại giá trị của sản \r\nphẩm. Sau đó mô tả sản phẩm đấu giá một cách chi tiết nhất để làm nổi bật giá trị của \r\nsản phẩm, nhằm thu hút những khách hàng tiềm năng. Đồng thời đưa ra các quy tắc \r\nđấu giá đối với người tham gia như là giải thích các quy luật đấu giá được sử dụng (đấugiá mở, đấu giá kín, đấu giá kiểu Hà Lan, đấu giá kiểu Anh…), những con số được đưa \r\nra đàm phán (giá khởi điểm, ngày giao hàng, cách thanh toán…), thời gian bắt đầu \r\ncuộc đấu giá, điều kiện để cuộc đấu giá kết thúc. Dựa vào quảng cáo và các quy tắc của \r\ncuộc đấu giá, người mua có thể tìm kiếm để lựa chọn sản phẩm đấu giá và các kiểu đấu \r\ngiá phù hợp.</li><li>Giai đoạn 3: Đấu giá.\r\nỞ giai đoạn này cuộc đấu giá mới thực sự bắt đầu. Đầu tiên người tham gia tìm \r\nkiếm sản phẩm đấu giá, khi chọn được sản phẩm ưng ý thì họ đăng nhập những thông \r\ntin cần thiết. Hệ thống phải xác thực thông tin đó, dựa trên việc xác thực khi người mua \r\nđăng ký. Xác thực thành công, thì giá của người mua đối với sản phẩm mới có hiệu \r\nlực.\r\nTrong giai đoạn trả giá, hệ thống phải làm hai nhiệm vụ chính: thứ nhất là làm \r\nthế nào để biết giá đó là của người nào, thứ hai là làm thế nào để những thông tin về \r\ngiá cả được đảm bảo an toàn và bí mật trong suốt quá trình đấu giá (không biết chính \r\nxác giá là bao nhiêu).\r\nCũng trong giai đoạn này, hệ thống phải phát hiện được những người đấu giá \r\nnhiều lần.\r\n Giai đoạn 4: Kết thúc cuộc đấu giá và công bố ngƣời thắng cuộc\r\nCó một khoảng thời gian nhất định đối với mỗi vòng đấu giá. Khi thời gian của \r\nmỗi vòng đã hết, thì hệ thống chỉ công bố giá cao nhất cho những người tham gia đấu \r\ngiá. Hệ thống kiểm tra tất cả các giá cao nhất tại vòng cuối cùng, giá nào cao nhất sẽ là \r\ngiá bán sản phẩm. Trường hợp hai hay nhiều đơn đấu giá có cùng mức giá, thì đơn nào \r\nmua với số lượng lớn hơn, sẽ là đơn chiến thắng. Nếu các đơn cùng đặt mức giá và số\r\nlượng lớn như nhau, thì đơn nào đặt sớm hơn sẽ là đơn chiến thắng</li></ol>', 0, '2023-07-02', 1, '2022-05-10 14:57:54', '2022-05-10 14:57:54'),
(2, 'Chính sách', 'upload/images/post/Banner1.jpg', '<p><span style=\"color: rgb(17, 24, 32); font-family: &quot;Market Sans&quot;, Arial, sans-serif; font-size: 20px; font-weight: 700;\">Tôi có thể bán hàng tại địa phương trên Auction không?</span></p><p><span style=\"color: rgb(112, 112, 112); font-family: &quot;Market Sans&quot;, Arial, sans-serif; font-size: 14px;\">Khi tạo danh sách của bạn, bạn có thể cung cấp nhận hàng địa phương bằng cách chọn nó trong chi tiết vận chuyển. Khi người mua thanh toán bạn xác nhận đơn hàng.</span></p><p><span style=\"color: rgb(17, 24, 32); font-family: &quot;Market Sans&quot;, Arial, sans-serif; font-size: 20px; font-weight: 700;\">Tôi có thể nhận hàng vận chuyển ở đâu?</span></p><p><span style=\"color: rgb(112, 112, 112); font-family: &quot;Market Sans&quot;, Arial, sans-serif; font-size: 14px;\">Bạn có thể sử dụng bất kỳ vật tư đóng gói nào bạn có thể đã có ở nhà hoặc nhận hộp miễn phí từ các hãng vận chuyển. Để có thêm một liên lạc, nguồn cung cấp thương hiệu Auction có sẵn để mua.</span></p><p><span style=\"color: rgb(17, 24, 32); font-family: &quot;Market Sans&quot;, Arial, sans-serif; font-size: 20px; font-weight: 700; background-color: rgb(247, 247, 247);\">Tôi nên chọn giá niêm yết như thế nào?</span></p><p><span style=\"color: rgb(112, 112, 112); font-family: &quot;Market Sans&quot;, Arial, sans-serif; font-size: 14px;\">Đối với hầu hết các mặt hàng, chúng tôi có thể cung cấp đề xuất giá cho bạn dựa trên các mặt hàng tương tự được bán gần đây. Cách bạn định giá mặt hàng của mình có thể phụ thuộc vào cách bạn thích bán nó — Đấu giá hoặc Mua nó ngay bây giờ. Chọn giá khởi điểm thấp hơn cho các cuộc đấu giá để tạo thêm sự quan tâm.</span><span style=\"color: rgb(17, 24, 32); font-family: &quot;Market Sans&quot;, Arial, sans-serif; font-size: 20px; font-weight: 700; background-color: rgb(247, 247, 247);\"><br></span><span style=\"color: rgb(17, 24, 32); font-family: &quot;Market Sans&quot;, Arial, sans-serif; font-size: 20px; font-weight: 700;\">Bảo vệ người bán như thế nào?</span></p><p><span style=\"color: rgb(112, 112, 112); font-family: &quot;Market Sans&quot;, Arial, sans-serif; font-size: 14px;\">Chúng tôi hiểu rằng mọi thứ có thể xảy ra ngoài tầm kiểm soát của bạn với tư cách là người bán. Khi họ làm, chúng tôi có lưng của bạn</span></p><h3 _msthash=\"1930994\" _msttexthash=\"34364863\" style=\"margin: 32px 0px 12px; padding: 0px; border: 0px; font-size: 18px; vertical-align: baseline; font-weight: bold; line-height: 1.56; color: rgb(0, 0, 0); font-family: &quot;Market Sans&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, Roboto, sans-serif;\">Làm thế nào để tôi được bảo vệ khỏi những người mua lạm dụng?</h3><p _msthash=\"1870076\" _msttexthash=\"292006143\" style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-family: &quot;Helvetica neue&quot;, Helvetica, Arial, sans-serif; line-height: 1.63; color: rgb(0, 0, 0);\">Nếu eBay thấy hành vi của người mua là lạm dụng, chúng tôi sẽ có hành động đối với người mua và loại bỏ các phản hồi và khiếm khuyết tiêu cực và trung lập, bao gồm các trường hợp được mở trong số liệu dịch vụ.</p><h3 _msthash=\"1931254\" _msttexthash=\"30115020\" style=\"margin: 32px 0px 12px; padding: 0px; border: 0px; font-size: 18px; vertical-align: baseline; font-weight: bold; line-height: 1.56; color: rgb(0, 0, 0); font-family: &quot;Market Sans&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, Roboto, sans-serif;\">Điều gì sẽ xảy ra nếu có điều gì đó xảy ra ngoài tầm kiểm soát của tôi?</h3><p _msthash=\"1870310\" _msttexthash=\"480536966\" style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-family: &quot;Helvetica neue&quot;, Helvetica, Arial, sans-serif; line-height: 1.63; color: rgb(0, 0, 0);\">Chúng tôi sẽ bảo vệ bạn bằng cách loại bỏ các phản hồi và khiếm khuyết tiêu cực và trung lập khi mọi thứ xảy ra ngoài tầm kiểm soát của bạn, chẳng hạn như thời tiết hoặc sự chậm trễ của tàu sân bay hoặc khi mặt hàng đến muộn nhưng theo dõi cho thấy bạn được vận chuyển đúng giờ.</p><summary class=\"details__summary\" style=\"font-size: medium; align-items: center; color: rgb(17, 24, 32); display: inline-block; list-style-position: inside; list-style-type: none; padding: 12px 8px; width: 1199.33px; outline: none;\"><span class=\"details__label\" _msthash=\"1400932\" _msttexthash=\"9609145\" style=\"display: inline-block; width: 1065px; font-size: 1.25rem; font-weight: 700; line-height: 28px;\">Khi nào tôi sẽ được trả tiền?</span><span class=\"details__icon\" hidden=\"\" style=\"margin-left: 8px; float: right; transition: transform 0.25s linear 0s; display: inline-block; transform: rotate(180deg);\"><svg aria-hidden=\"true\" class=\"icon icon--dropdown\" focusable=\"false\"><use xlink:href=\"#icon-dropdown\"></use></svg></span></summary><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgb(112, 112, 112); font-size: 0.875rem; line-height: 20px; padding: 24px;\"><font _mstmutation=\"1\" _msthash=\"736203\" _msttexthash=\"600395354\">Sau khi bạn xác nhận khoản thanh toán của người mua đã được nhận, tùy vào cách thứ hai bên giao kèo với nhau. Khi khoản thanh toán được bắt đầu, trong vòng 1-3 ngày làm việc tùy thuộc vào thời gian xử lý.<b> Nhận hàng - nhận tiền</b></font></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgb(112, 112, 112); font-size: 0.875rem; line-height: 20px; padding: 24px;\"><font _mstmutation=\"1\" _msthash=\"736203\" _msttexthash=\"600395354\"><b><br></b></font></p><p><slot id=\"details-content\" style=\"color: rgb(17, 24, 32); font-family: &quot;Market Sans&quot;, Arial, sans-serif; font-size: 14px;\"></slot><span style=\"color: rgb(112, 112, 112); font-family: &quot;Market Sans&quot;, Arial, sans-serif; font-size: 14px;\"><br></span><span style=\"color: rgb(17, 24, 32); font-family: &quot;Market Sans&quot;, Arial, sans-serif; font-size: 20px; font-weight: 700;\"><br></span><span style=\"color: rgb(112, 112, 112); font-family: &quot;Market Sans&quot;, Arial, sans-serif; font-size: 14px;\"><br></span><span style=\"color: rgb(17, 24, 32); font-family: &quot;Market Sans&quot;, Arial, sans-serif; font-size: 20px; font-weight: 700;\"><br></span></p>', 0, '2023-07-02', 1, '2022-05-11 10:48:14', '2022-05-11 10:48:14');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `baocao`
--

CREATE TABLE `baocao` (
  `bc_id` bigint(20) UNSIGNED NOT NULL,
  `bc_noidung` varchar(255) NOT NULL,
  `ch_id` bigint(20) UNSIGNED NOT NULL,
  `nd_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `bl_id` bigint(20) UNSIGNED NOT NULL,
  `bl_noidung` varchar(255) NOT NULL,
  `bl_ngaytao` date NOT NULL DEFAULT '2022-05-10',
  `nd_id` bigint(20) UNSIGNED NOT NULL,
  `sp_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdaugia`
--

CREATE TABLE `chitietdaugia` (
  `ctdg_id` bigint(20) UNSIGNED NOT NULL,
  `ctdg_thoigian` datetime NOT NULL DEFAULT '2022-05-10 21:17:38',
  `ctdg_giatien` int(11) NOT NULL,
  `dg_id` bigint(20) UNSIGNED NOT NULL,
  `nd_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietdaugia`
--

INSERT INTO `chitietdaugia` (`ctdg_id`, `ctdg_thoigian`, `ctdg_giatien`, `dg_id`, `nd_id`, `created_at`, `updated_at`) VALUES
(21, '2023-06-29 21:07:29', 530000, 34, 9, '2023-06-29 14:07:29', NULL),
(23, '2023-06-30 17:15:15', 400000, 35, 9, '2023-06-30 10:15:15', NULL),
(24, '2023-06-30 17:15:30', 450000, 35, 9, '2023-06-30 10:15:30', NULL),
(25, '2023-06-30 19:25:30', 900000, 44, 9, '2023-06-30 12:25:30', NULL),
(26, '2023-06-30 19:25:56', 1050000, 44, 9, '2023-06-30 12:25:56', NULL),
(27, '2023-06-30 19:27:03', 3000000, 44, 9, '2023-06-30 12:27:03', NULL),
(28, '2023-06-30 19:27:42', 3100000, 44, 9, '2023-06-30 12:27:42', NULL),
(29, '2023-07-03 15:47:34', 100000, 45, 9, '2023-07-03 08:47:34', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `ctdh_id` bigint(20) UNSIGNED NOT NULL,
  `ctdh_dongia` int(11) NOT NULL,
  `sp_id` bigint(20) UNSIGNED NOT NULL,
  `dh_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`ctdh_id`, `ctdh_dongia`, `sp_id`, `dh_id`, `created_at`, `updated_at`) VALUES
(5, 530000, 34, 5, NULL, NULL),
(7, 3100000, 45, 7, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cuahang`
--

CREATE TABLE `cuahang` (
  `ch_id` bigint(20) UNSIGNED NOT NULL,
  `ch_ten` varchar(255) NOT NULL,
  `ch_diachi` varchar(255) NOT NULL,
  `ch_thongtin` varchar(255) NOT NULL,
  `ch_banner` varchar(255) DEFAULT NULL,
  `ch_anhdaidien` varchar(255) DEFAULT NULL,
  `ch_trangthai` int(11) NOT NULL DEFAULT 0,
  `nd_id` bigint(20) UNSIGNED NOT NULL,
  `ch_ngaytao` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cuahang`
--

INSERT INTO `cuahang` (`ch_id`, `ch_ten`, `ch_diachi`, `ch_thongtin`, `ch_banner`, `ch_anhdaidien`, `ch_trangthai`, `nd_id`, `ch_ngaytao`) VALUES
(1, 'DauGiaDuongNek', 'ap 3, xa Tru Van Tho, huyen Bau Bang, tinh Binh Duong', 'DauGiaDuongNek là một san đấu giá. \r\nDem lai cho ban nhung san pham tot nhat\r\nChuyen cung cap các sản phẩm về giày dép chính hảng', '1/artwork-nature-landscape-fantasy-art-wallpaper-preview.jpg', '1/Frame 4 (2).png', 1, 1, '2022-05-10 14:23:47'),
(2, 'Sàn Đấu Giá Đến Từ PHUCDU', 'Lai Uyen, Bau Bang, Binh Duong', 'Uy tín luôn dẫn đầu\r\n----------------------------\r\nĐấu giá các sản phẩm của các Localbrand nổi tiếng của Việt Nam', '2/TRUCKER-2_1100x.jpg', '2/lovely-teenage-girl-with-curly-hair-posing-yellow-tshirt-min 1.png', 1, 6, '2022-05-10 14:51:17'),
(3, 'Ebay', 'Bau Bang, Binh Duong', 'Đấu giá nhiều loại sản phẩm', NULL, NULL, 0, 3, '2022-05-11 09:33:17'),
(4, 'bao', 'D5 Aptech', '123', '4/Đồng hồ 4.jpg', '4/Áo nam 8.jpg', 1, 9, '2023-06-24 03:57:52'),
(6, 'D5 shop', 'D5 aptech', 'Sàn đấu giá', '6/Đồng hồ 4.jpg', '6/Áo nam 8.jpg', 1, 19, '2023-06-30 12:17:42');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `dm_id` bigint(20) UNSIGNED NOT NULL,
  `dm_ten` varchar(255) NOT NULL,
  `dm_mota` text NOT NULL,
  `dm_trangthai` int(11) NOT NULL DEFAULT 1,
  `ch_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`dm_id`, `dm_ten`, `dm_mota`, `dm_trangthai`, `ch_id`, `created_at`, `updated_at`) VALUES
(11, 'Thời trang nam', 'Đẹp, chính hãng, an toàn', 1, 4, NULL, NULL),
(12, 'Thời trang nữ', 'Đẹp, chính hãng, an toàn', 1, 4, NULL, NULL),
(13, 'Nội thất', 'Đồ dùng trang trí trong nhà, nhiều loại', 1, 4, NULL, NULL),
(14, 'Tranh', 'Tác phẩm nghệ thuật từ nhiều họa sĩ nổi tiếng', 1, 4, NULL, NULL),
(15, 'Đồ gốm', 'Đồ gốm chính hãng, được tạo tác từ nhiều nghệ nhân tay nghề', 1, 4, NULL, NULL),
(16, 'Đồng hồ', 'Đồng hồ chính hãng', 1, 4, NULL, NULL),
(17, 'Giày', 'Giày chính hãng, hợp thời trang', 1, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc_sanpham`
--

CREATE TABLE `danhmuc_sanpham` (
  `dmsp_id` bigint(20) UNSIGNED NOT NULL,
  `dm_id` bigint(20) UNSIGNED NOT NULL,
  `sp_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc_sanpham`
--

INSERT INTO `danhmuc_sanpham` (`dmsp_id`, `dm_id`, `sp_id`, `created_at`, `updated_at`) VALUES
(33, 15, 32, NULL, NULL),
(35, 11, 34, NULL, NULL),
(37, 11, 36, NULL, NULL),
(38, 14, 37, NULL, NULL),
(39, 14, 38, NULL, NULL),
(41, 14, 40, NULL, NULL),
(42, 16, 41, NULL, NULL),
(43, 13, 42, NULL, NULL),
(44, 13, 43, NULL, NULL),
(46, 16, 45, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `daugia`
--

CREATE TABLE `daugia` (
  `dg_id` bigint(20) UNSIGNED NOT NULL,
  `dg_thoigianbatdau` datetime NOT NULL,
  `dg_thoigianketthuc` datetime NOT NULL,
  `dg_giakhoidiem` int(11) NOT NULL,
  `dg_buocnhay` int(11) NOT NULL,
  `dg_giamax` int(11) NOT NULL,
  `dg_trangthai` int(11) NOT NULL,
  `sp_id` bigint(20) UNSIGNED NOT NULL,
  `ch_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `daugia`
--

INSERT INTO `daugia` (`dg_id`, `dg_thoigianbatdau`, `dg_thoigianketthuc`, `dg_giakhoidiem`, `dg_buocnhay`, `dg_giamax`, `dg_trangthai`, `sp_id`, `ch_id`, `created_at`, `updated_at`) VALUES
(32, '2023-06-29 20:35:00', '2023-06-30 07:00:00', 5000000, 100000, 6000000, 1, 32, 4, NULL, NULL),
(34, '2023-06-29 20:39:00', '2023-06-30 07:00:00', 500000, 50000, 1000000, 3, 34, 4, NULL, NULL),
(35, '2023-06-29 20:42:00', '2023-07-02 20:42:00', 300000, 50000, 1000000, 3, 36, 4, NULL, NULL),
(36, '2023-06-29 20:45:00', '2023-07-02 20:45:00', 1000000, 100000, 2000000, 1, 37, 4, NULL, NULL),
(37, '2023-06-29 20:47:00', '2023-07-02 20:47:00', 5000000, 100000, 6000000, 1, 38, 4, NULL, NULL),
(39, '2023-06-29 20:51:00', '2023-07-02 20:50:00', 2000000, 100000, 3000000, 1, 40, 4, NULL, NULL),
(40, '2023-06-29 20:54:00', '2023-07-02 20:54:00', 1000000, 200000, 5000000, 1, 41, 4, NULL, NULL),
(41, '2023-06-29 21:01:00', '2023-07-02 09:05:00', 600000, 100000, 2000000, 1, 42, 4, NULL, NULL),
(42, '2023-06-29 21:02:00', '2023-07-02 08:50:00', 20000000, 1000000, 50000000, 1, 43, 4, NULL, NULL),
(44, '2023-06-30 19:24:00', '2023-06-30 19:28:00', 1000000, 100000, 10000000, 3, 45, 4, NULL, NULL),
(45, '2023-07-03 15:46:00', '2023-07-27 20:35:00', 1000000, 100000, 10000000, 1, 40, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `dh_id` bigint(20) UNSIGNED NOT NULL,
  `dh_tongtien` int(11) NOT NULL,
  `dh_ngaytao` date NOT NULL DEFAULT '2022-05-10',
  `dh_diachi` varchar(255) NOT NULL,
  `dh_sdt` varchar(255) NOT NULL,
  `dh_trangthai` int(11) NOT NULL DEFAULT 0 COMMENT '0:dang xu ly; 1: xac nhan; 2:giao hang; 3:hoan thanh;-1:huy',
  `nd_id` bigint(20) UNSIGNED NOT NULL,
  `ch_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`dh_id`, `dh_tongtien`, `dh_ngaytao`, `dh_diachi`, `dh_sdt`, `dh_trangthai`, `nd_id`, `ch_id`, `created_at`, `updated_at`) VALUES
(1, 600000, '2022-05-10', 'Bau Bang, Binh Duong', '0898181818', 3, 3, 1, NULL, '2022-05-10 14:59:43'),
(2, 1000000, '2022-05-10', 'Lai Uyen, Bau Bang, Binh Duong', '0212312313', 1, 6, 1, NULL, '2022-05-11 02:49:19'),
(3, 515000, '2022-05-11', 'Bac Tan Uyen la O Dau Khong Biet', '0337118181', 0, 5, 1, NULL, NULL),
(4, 20000, '2022-05-11', 'Bau Bang, Binh Duong', '0898181818', 0, 3, 1, NULL, NULL),
(5, 530000, '2023-06-30', 'rqwer', '0314134314', 0, 9, 4, NULL, NULL),
(7, 3100000, '2023-06-30', '123', '0314134314', 0, 9, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE `giohang` (
  `gh_id` bigint(20) UNSIGNED NOT NULL,
  `gh_soluong` varchar(255) NOT NULL,
  `gh_dongia` varchar(255) NOT NULL,
  `gh_ngaythem` datetime NOT NULL,
  `sp_id` bigint(20) UNSIGNED NOT NULL,
  `nd_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `giohang`
--

INSERT INTO `giohang` (`gh_id`, `gh_soluong`, `gh_dongia`, `gh_ngaythem`, `sp_id`, `nd_id`, `created_at`, `updated_at`) VALUES
(11, '1', '450000', '2023-07-03 15:44:24', 36, 9, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hinhanhsanpham`
--

CREATE TABLE `hinhanhsanpham` (
  `hasp_id` bigint(20) UNSIGNED NOT NULL,
  `hasp_duongdan` varchar(255) NOT NULL,
  `hasp_anhdaidien` int(11) NOT NULL,
  `hasp_trangthai` int(11) NOT NULL DEFAULT 1,
  `sp_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hinhanhsanpham`
--

INSERT INTO `hinhanhsanpham` (`hasp_id`, `hasp_duongdan`, `hasp_anhdaidien`, `hasp_trangthai`, `sp_id`, `created_at`, `updated_at`) VALUES
(60, 'upload/images/product/Bình sứ 4.jpg', 1, 1, 32, NULL, NULL),
(62, 'upload/images/product/Áo nam 8.jpg', 1, 1, 34, NULL, NULL),
(64, 'upload/images/product/ÁO nam 9.jpg', 1, 1, 36, NULL, NULL),
(65, 'upload/images/product/tranh 4.jpg', 1, 1, 37, NULL, NULL),
(66, 'upload/images/product/Tranh 6.jpg', 1, 1, 38, NULL, NULL),
(68, 'upload/images/product/Tranh 5.jpg', 1, 1, 40, NULL, NULL),
(69, 'upload/images/product/đồng hồ 7.jpg', 1, 1, 41, NULL, NULL),
(70, 'upload/images/product/ghế 2.jpg', 1, 1, 42, NULL, NULL),
(71, 'upload/images/product/Tủ lạnh 5.jpeg', 1, 1, 43, NULL, NULL),
(73, 'upload/images/product/Đồng hồ 4.jpg', 1, 1, 45, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaisanpham`
--

CREATE TABLE `loaisanpham` (
  `lsp_id` bigint(20) UNSIGNED NOT NULL,
  `lsp_ten` varchar(255) NOT NULL,
  `lsp_trangthai` int(11) NOT NULL DEFAULT 1,
  `ch_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loaisanpham`
--

INSERT INTO `loaisanpham` (`lsp_id`, `lsp_ten`, `lsp_trangthai`, `ch_id`, `created_at`, `updated_at`) VALUES
(10, 'Nội thất', 1, 4, NULL, NULL),
(11, 'Thời trang', 1, 4, NULL, NULL),
(12, 'Nghệ thuật', 1, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_01_15_073455_create_quantrivien_table', 1),
(6, '2022_01_15_073506_create_nguoidung_table', 1),
(7, '2022_01_15_073519_create_cuahang_table', 1),
(8, '2022_01_15_073550_create_donhang_table', 1),
(9, '2022_01_15_073615_create_thuonghieu_table', 1),
(10, '2022_01_15_073626_create_loaisanpham_table', 1),
(11, '2022_01_15_073636_create_danhmuc_table', 1),
(12, '2022_01_15_073701_create_sanpham_table', 1),
(13, '2022_01_15_073702_create_giohang_table', 1),
(14, '2022_01_15_073710_create_hinhanhsanpham_table', 1),
(15, '2022_01_15_073720_create_daugia_table', 1),
(16, '2022_01_15_073729_create_baocao_table', 1),
(17, '2022_01_15_073750_create_danhmuc_sanpham_table', 1),
(18, '2022_01_15_074541_create_binhluan_table', 1),
(19, '2022_01_15_074558_create_chitietdonhang_table', 1),
(20, '2022_01_15_080206_create_chitietdaugia_table', 1),
(21, '2022_04_11_142852_create_baiviet_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoidung`
--

CREATE TABLE `nguoidung` (
  `nd_id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nd_hoten` varchar(255) NOT NULL,
  `nd_email` varchar(255) NOT NULL,
  `nd_sdt` varchar(255) NOT NULL,
  `nd_namsinh` varchar(255) NOT NULL,
  `nd_diachi` varchar(255) NOT NULL,
  `nd_trangthai` int(11) NOT NULL DEFAULT 0,
  `nd_ngaytao` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nguoidung`
--

INSERT INTO `nguoidung` (`nd_id`, `username`, `password`, `nd_hoten`, `nd_email`, `nd_sdt`, `nd_namsinh`, `nd_diachi`, `nd_trangthai`, `nd_ngaytao`) VALUES
(1, 'duongg', '$2y$10$bL/FvEUL.hM.83Cop5b6QushiET4iOZNgizjzIAEqU6eFfldRoe/6', 'DUONG', 'tranvanduong10a22016bb@gmail.com', '0396752611', '1999-07-11', 'ap 3, xa Tru Van Tho, huyen Bau Bang, tinh Binh Duong', 1, '2022-01-10 14:20:24'),
(2, 'dunn', '$2y$10$IOGjWFWz2iRe5SPYj3/n9uqCQj2zkMYTBu7zanXS9IH6WibR3/9p.', 'DUNN', 'dungttt.12c8.bc.1718@gmail.com', '0328818203', '2000-07-23', 'Long Tan, Dau Tieng, Binh Duong', 1, '2022-02-01 14:33:32'),
(3, 'hiepnguyen', '$2y$10$IFtZWv7ND.Qxj10FEvHZbenOTHT79So93Rt2qY2CMCVPXqyFqoFIa', 'HIEP', 'hiepnt.12c8.bc.1718@gmail.com', '0898181818', '2022-05-26', 'Bau Bang, Binh Duong', 1, '2022-05-01 14:35:28'),
(4, 'nhutnguyen', '$2y$10$G2imi0bDEwNHqCnBzmrZf.DWwQiFnuB2wQrJdHzUxkP1qSFKo5GAi', 'NHUT', 'nhutttt.212.12bc@gmail.com', '0938381818', '2300-12-31', 'Thi xa Ben Cat, huyen Bau Bang, tinh Binh Duong', 1, '2022-02-02 14:44:37'),
(5, 'tunguyen', '$2y$10$9/sd9THuPA88xtCpdzs9eujEVuIvABIAMf/bfQ5mfzNv88BG0x/L.', 'TU', 'tunguyen@gmail.com', '0337118181', '2000-12-31', 'Bac Tan Uyen la O Dau Khong Biet', 1, '2022-03-03 14:45:40'),
(6, 'phucdu', '$2y$10$dDZt0RysVBDgYfcKwJPGlOQi0j55e.u5fMlV8dX3UnZ7gpNtZ7/xe', 'PHUC Dus', 'phucdu@gmail.com', '0212312313', '2000-12-12', 'Lai Uyen, Bau Bsdsdang, Binh Duong', 1, '2022-05-10 14:46:28'),
(7, 'quocdam', '$2y$10$19x3JtyTpFQMlw/46IfFt.R397awwU9XHtu91f7H8xL057de3lOy.', 'QUOCdam', 'quocdam@gmail.com', '0232132312', '2000-12-31', 'Tru Van Tho, Bau Bang, Binh Duong', 0, '2022-05-10 14:47:13'),
(8, 'thongtrinh', '$2y$10$vNBkoaThu4GZxpG.xjAlA.IXtkD5ZfYU18Ar9Fup9RtxFzjAqZe8G', 'THONG', 'thongtrinh@gmail.com', '0396752121', '2000-12-12', 'Dau Tiếng, Bình Dương', 1, '2022-05-11 04:24:19'),
(9, '123', '$2y$10$1IHxO1GXYz27UjVXNUe9heHTJD1MMAMUqXAEVXJ8U5IuTmiGyq5u6', 'bao', 'truongbao102003@gmail.com', '0314134314', '2003-09-10', 'rqwer', 1, '2023-06-24 03:57:20'),
(19, 'aptech123', '$2y$10$hCeG1mQ8Twi9b5toiscliO9pQl.OdRdqPO28DozpBIOuckfnJ5kKC', 'Minh', 'tnbao1009@gmail.com', '0924142141', '1999-09-10', 'D5 aptech', 1, '2023-06-30 12:14:58');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quantrivien`
--

CREATE TABLE `quantrivien` (
  `qt_id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `qt_hoten` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `quantrivien`
--

INSERT INTO `quantrivien` (`qt_id`, `username`, `password`, `qt_hoten`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$bL/FvEUL.hM.83Cop5b6QushiET4iOZNgizjzIAEqU6eFfldRoe/6', 'Admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `sp_id` bigint(20) UNSIGNED NOT NULL,
  `sp_ten` varchar(255) NOT NULL,
  `sp_soluong` int(11) NOT NULL,
  `sp_mota` text NOT NULL,
  `sp_gia` int(11) NOT NULL,
  `sp_trangthai` int(11) NOT NULL DEFAULT 1,
  `ch_id` bigint(20) UNSIGNED NOT NULL,
  `lsp_id` bigint(20) UNSIGNED NOT NULL,
  `th_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`sp_id`, `sp_ten`, `sp_soluong`, `sp_mota`, `sp_gia`, `sp_trangthai`, `ch_id`, `lsp_id`, `th_id`, `created_at`, `updated_at`) VALUES
(32, 'Bình sứ', 1, '<p>Bình sứ chính hãng</p>', 500000, 1, 4, 12, 16, NULL, NULL),
(34, 'Áo nam', 1, '<p>Áo nam chính hãng</p>', 200000, 1, 4, 11, 11, NULL, NULL),
(36, 'Áo nam 1', 1, '<p>Áo nam đẹp, hợp thời trang</p>', 1000000, 1, 4, 11, 11, NULL, NULL),
(37, 'Tranh', 1, '<p>Tranh cú mèo đẹp</p>', 200000, 1, 4, 12, 14, NULL, NULL),
(38, 'Tranh chim mào gà', 1, '<p>Tranh chim mào gà phác họa con gà</p>', 100000, 1, 4, 12, 15, NULL, NULL),
(40, 'Tranh chim hoàng yến', 1, '<p>Tranh chim hoàng yến tác giả Vincent van gogh</p>', 500000, 1, 4, 12, 15, NULL, NULL),
(41, 'Đồng hồ Cartier chính hãng', 1, '<p>Đồng hồ cartier</p>', 1000000, 1, 4, 11, 13, NULL, NULL),
(42, 'Ghế đẹp', 1, '<p>Ghê gaming</p>', 100000, 1, 4, 10, 17, NULL, NULL),
(43, 'Tủ lạnh LG', 1, '<p>Tủ lạnh LG</p>', 500000, 1, 4, 10, 9, NULL, NULL),
(45, 'đồng hồ rolexs', 1, '<p>test</p>', 1000000, 1, 4, 11, 20, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thuonghieu`
--

CREATE TABLE `thuonghieu` (
  `th_id` bigint(20) UNSIGNED NOT NULL,
  `th_ten` varchar(255) NOT NULL,
  `th_trangthai` int(11) NOT NULL DEFAULT 1,
  `ch_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thuonghieu`
--

INSERT INTO `thuonghieu` (`th_id`, `th_ten`, `th_trangthai`, `ch_id`, `created_at`, `updated_at`) VALUES
(9, 'LG inverter', 1, 4, NULL, NULL),
(10, 'Levents', 1, 4, NULL, NULL),
(11, 'Tsun', 1, 4, NULL, NULL),
(12, 'Rolex', 0, 4, NULL, '2023-06-30 09:40:05'),
(13, 'Cartier', 1, 4, NULL, NULL),
(14, 'Leonardo da Vinci', 1, 4, NULL, NULL),
(15, 'Vincent van Gogh', 1, 4, NULL, NULL),
(16, 'Ashley', 1, 4, NULL, NULL),
(17, 'Steelcase', 1, 4, NULL, NULL),
(18, 'Nike', 1, 4, NULL, NULL),
(20, 'rolexs', 1, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `baiviet`
--
ALTER TABLE `baiviet`
  ADD PRIMARY KEY (`bv_id`),
  ADD KEY `baiviet_qt_id_foreign` (`qt_id`);

--
-- Chỉ mục cho bảng `baocao`
--
ALTER TABLE `baocao`
  ADD PRIMARY KEY (`bc_id`),
  ADD KEY `baocao_ch_id_foreign` (`ch_id`),
  ADD KEY `baocao_nd_id_foreign` (`nd_id`);

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`bl_id`),
  ADD KEY `binhluan_nd_id_foreign` (`nd_id`),
  ADD KEY `binhluan_sp_id_foreign` (`sp_id`);

--
-- Chỉ mục cho bảng `chitietdaugia`
--
ALTER TABLE `chitietdaugia`
  ADD PRIMARY KEY (`ctdg_id`),
  ADD KEY `chitietdaugia_dg_id_foreign` (`dg_id`),
  ADD KEY `chitietdaugia_nd_id_foreign` (`nd_id`);

--
-- Chỉ mục cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`ctdh_id`),
  ADD KEY `chitietdonhang_sp_id_foreign` (`sp_id`);

--
-- Chỉ mục cho bảng `cuahang`
--
ALTER TABLE `cuahang`
  ADD PRIMARY KEY (`ch_id`),
  ADD KEY `cuahang_nd_id_foreign` (`nd_id`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`dm_id`),
  ADD KEY `danhmuc_ch_id_foreign` (`ch_id`);

--
-- Chỉ mục cho bảng `danhmuc_sanpham`
--
ALTER TABLE `danhmuc_sanpham`
  ADD PRIMARY KEY (`dmsp_id`),
  ADD KEY `danhmuc_sanpham_dm_id_foreign` (`dm_id`),
  ADD KEY `danhmuc_sanpham_sp_id_foreign` (`sp_id`);

--
-- Chỉ mục cho bảng `daugia`
--
ALTER TABLE `daugia`
  ADD PRIMARY KEY (`dg_id`),
  ADD KEY `daugia_sp_id_foreign` (`sp_id`),
  ADD KEY `daugia_ch_id_foreign` (`ch_id`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`dh_id`),
  ADD KEY `donhang_nd_id_foreign` (`nd_id`),
  ADD KEY `donhang_ch_id_foreign` (`ch_id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`gh_id`),
  ADD KEY `giohang_sp_id_foreign` (`sp_id`),
  ADD KEY `giohang_nd_id_foreign` (`nd_id`);

--
-- Chỉ mục cho bảng `hinhanhsanpham`
--
ALTER TABLE `hinhanhsanpham`
  ADD PRIMARY KEY (`hasp_id`),
  ADD KEY `hinhanhsanpham_sp_id_foreign` (`sp_id`);

--
-- Chỉ mục cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  ADD PRIMARY KEY (`lsp_id`),
  ADD KEY `loaisanpham_ch_id_foreign` (`ch_id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`nd_id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `quantrivien`
--
ALTER TABLE `quantrivien`
  ADD PRIMARY KEY (`qt_id`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`sp_id`),
  ADD KEY `sanpham_ch_id_foreign` (`ch_id`),
  ADD KEY `sanpham_lsp_id_foreign` (`lsp_id`),
  ADD KEY `sanpham_th_id_foreign` (`th_id`);

--
-- Chỉ mục cho bảng `thuonghieu`
--
ALTER TABLE `thuonghieu`
  ADD PRIMARY KEY (`th_id`),
  ADD KEY `thuonghieu_ch_id_foreign` (`ch_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `baiviet`
--
ALTER TABLE `baiviet`
  MODIFY `bv_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `baocao`
--
ALTER TABLE `baocao`
  MODIFY `bc_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `bl_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `chitietdaugia`
--
ALTER TABLE `chitietdaugia`
  MODIFY `ctdg_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  MODIFY `ctdh_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `cuahang`
--
ALTER TABLE `cuahang`
  MODIFY `ch_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `dm_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `danhmuc_sanpham`
--
ALTER TABLE `danhmuc_sanpham`
  MODIFY `dmsp_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT cho bảng `daugia`
--
ALTER TABLE `daugia`
  MODIFY `dg_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `dh_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `giohang`
--
ALTER TABLE `giohang`
  MODIFY `gh_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `hinhanhsanpham`
--
ALTER TABLE `hinhanhsanpham`
  MODIFY `hasp_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  MODIFY `lsp_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  MODIFY `nd_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `quantrivien`
--
ALTER TABLE `quantrivien`
  MODIFY `qt_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `sp_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT cho bảng `thuonghieu`
--
ALTER TABLE `thuonghieu`
  MODIFY `th_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `baiviet`
--
ALTER TABLE `baiviet`
  ADD CONSTRAINT `baiviet_qt_id_foreign` FOREIGN KEY (`qt_id`) REFERENCES `quantrivien` (`qt_id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `baocao`
--
ALTER TABLE `baocao`
  ADD CONSTRAINT `baocao_ch_id_foreign` FOREIGN KEY (`ch_id`) REFERENCES `cuahang` (`ch_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `baocao_nd_id_foreign` FOREIGN KEY (`nd_id`) REFERENCES `nguoidung` (`nd_id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `binhluan_nd_id_foreign` FOREIGN KEY (`nd_id`) REFERENCES `nguoidung` (`nd_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `binhluan_sp_id_foreign` FOREIGN KEY (`sp_id`) REFERENCES `sanpham` (`sp_id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `chitietdaugia`
--
ALTER TABLE `chitietdaugia`
  ADD CONSTRAINT `chitietdaugia_dg_id_foreign` FOREIGN KEY (`dg_id`) REFERENCES `daugia` (`dg_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `chitietdaugia_nd_id_foreign` FOREIGN KEY (`nd_id`) REFERENCES `nguoidung` (`nd_id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `chitietdonhang_sp_id_foreign` FOREIGN KEY (`sp_id`) REFERENCES `sanpham` (`sp_id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `cuahang`
--
ALTER TABLE `cuahang`
  ADD CONSTRAINT `cuahang_nd_id_foreign` FOREIGN KEY (`nd_id`) REFERENCES `nguoidung` (`nd_id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD CONSTRAINT `danhmuc_ch_id_foreign` FOREIGN KEY (`ch_id`) REFERENCES `cuahang` (`ch_id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `danhmuc_sanpham`
--
ALTER TABLE `danhmuc_sanpham`
  ADD CONSTRAINT `danhmuc_sanpham_dm_id_foreign` FOREIGN KEY (`dm_id`) REFERENCES `danhmuc` (`dm_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `danhmuc_sanpham_sp_id_foreign` FOREIGN KEY (`sp_id`) REFERENCES `sanpham` (`sp_id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `daugia`
--
ALTER TABLE `daugia`
  ADD CONSTRAINT `daugia_ch_id_foreign` FOREIGN KEY (`ch_id`) REFERENCES `cuahang` (`ch_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `daugia_sp_id_foreign` FOREIGN KEY (`sp_id`) REFERENCES `sanpham` (`sp_id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_ch_id_foreign` FOREIGN KEY (`ch_id`) REFERENCES `cuahang` (`ch_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `donhang_nd_id_foreign` FOREIGN KEY (`nd_id`) REFERENCES `nguoidung` (`nd_id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `giohang_nd_id_foreign` FOREIGN KEY (`nd_id`) REFERENCES `nguoidung` (`nd_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `giohang_sp_id_foreign` FOREIGN KEY (`sp_id`) REFERENCES `sanpham` (`sp_id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `hinhanhsanpham`
--
ALTER TABLE `hinhanhsanpham`
  ADD CONSTRAINT `hinhanhsanpham_sp_id_foreign` FOREIGN KEY (`sp_id`) REFERENCES `sanpham` (`sp_id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  ADD CONSTRAINT `loaisanpham_ch_id_foreign` FOREIGN KEY (`ch_id`) REFERENCES `cuahang` (`ch_id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ch_id_foreign` FOREIGN KEY (`ch_id`) REFERENCES `cuahang` (`ch_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sanpham_lsp_id_foreign` FOREIGN KEY (`lsp_id`) REFERENCES `loaisanpham` (`lsp_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sanpham_th_id_foreign` FOREIGN KEY (`th_id`) REFERENCES `thuonghieu` (`th_id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `thuonghieu`
--
ALTER TABLE `thuonghieu`
  ADD CONSTRAINT `thuonghieu_ch_id_foreign` FOREIGN KEY (`ch_id`) REFERENCES `cuahang` (`ch_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
