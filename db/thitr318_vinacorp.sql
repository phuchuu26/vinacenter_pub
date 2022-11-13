-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th12 29, 2017 lúc 06:43 PM
-- Phiên bản máy phục vụ: 5.6.38
-- Phiên bản PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `thitr318_vinacorp`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `is_active` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `parent_id`, `name`, `alias`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 0, 'MOBILE', 'mobile', 1, '2017-05-04 21:44:41', '2017-07-27 02:48:12'),
(2, 0, 'LAPTOP', 'laptop', 1, '2017-05-04 21:45:31', '2017-07-27 02:48:39'),
(12, 1, 'APPLE', 'apple', 1, '2017-05-05 18:18:42', '2017-07-27 02:48:15'),
(13, 1, 'NOKIA', 'nokia', 1, '2017-05-06 07:24:25', '2017-07-27 04:10:32'),
(14, 2, 'DELL', 'dell', 1, '2017-05-07 01:04:32', '2017-07-27 02:48:42'),
(15, 1, 'SAMSUNG MOBILE', 'samsung-mobile', 1, '2017-05-13 22:14:45', '2017-07-28 07:22:20'),
(16, 2, 'SONY VAIO', 'sony-vaio', 1, '2017-05-20 02:39:31', '2017-07-27 02:48:47'),
(17, 2, 'ASUS', 'asus', 1, '2017-05-20 02:40:01', '2017-07-27 02:48:52'),
(19, 2, 'LENOVO', 'lenovo', 1, '2017-05-20 02:40:51', '2017-07-27 02:48:58'),
(20, 2, 'HP', 'hp', 1, '2017-05-20 02:41:43', '2017-07-27 02:49:02'),
(21, 0, 'MACBOOK', 'macbook', 1, '2017-05-20 02:44:51', '2017-07-27 02:49:11'),
(22, 0, 'CAMERA', 'camera', 1, '2017-05-20 02:47:35', '2017-07-27 02:49:14'),
(23, 1, 'PHỤ KIỆN', 'phu-kien', 1, '2017-07-20 11:42:15', '2017-07-27 02:48:27'),
(24, 2, 'LINH KIỆN', 'linh-kien', 1, '2017-07-20 11:42:48', '2017-07-27 02:49:07'),
(25, 0, 'DESKTOP', 'desktop', 1, '2017-07-27 13:36:43', '2017-07-27 13:36:43'),
(26, 22, 'NICHIETSU', 'nichietsu', 1, '2017-07-27 13:39:47', '2017-07-27 13:39:47'),
(27, 25, 'MÁY BỘ DELL', 'may-bo-dell', 1, '2017-07-27 13:51:25', '2017-07-27 13:51:25'),
(28, 25, 'MÁY BỘ HP', 'may-bo-hp', 1, '2017-07-27 13:52:20', '2017-07-27 13:52:20'),
(31, 21, 'MACBOOK PRO', 'macbook-pro', 1, '2017-07-27 13:57:09', '2017-07-27 13:57:09'),
(32, 21, 'MACBOOK AIR', 'macbook-air', 1, '2017-07-27 13:57:29', '2017-07-27 13:57:29'),
(33, 2, 'SAMSUNG', 'samsung', 1, '2017-07-28 07:22:42', '2017-07-28 07:22:42'),
(34, 0, 'PHẦN MỀM BẢN QUYỀN', 'phan-mem-ban-quyen', 1, '2017-08-10 03:22:11', '2017-08-10 03:22:11'),
(35, 34, 'PHẦN MỀM DIỆT VIRUS', 'phan-mem-diet-virus', 1, '2017-08-10 03:23:20', '2017-08-10 03:23:20'),
(36, 34, 'MICROSOFT WINDOWS', 'microsoft-windows', 1, '2017-08-10 03:25:20', '2017-08-10 03:27:15'),
(37, 34, 'MICROSOFT OFFICE', 'microsoft-office', 1, '2017-08-10 03:25:55', '2017-08-10 03:27:29'),
(38, 2, 'ACER', 'acer', 1, '2017-11-08 06:05:30', '2017-11-08 06:05:30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `collections`
--

CREATE TABLE `collections` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Đang đổ dữ liệu cho bảng `collections`
--

INSERT INTO `collections` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Điện thoại', 'dien-thoai', NULL, NULL),
(2, 'Laptop', 'laptop', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `content`, `status`, `created_at`, `updated_at`) VALUES
(2, 'quang uy', 'uy@ghdghs.com', 'ghdsgdhjsgdjhsdgshj', 1, '2017-07-28 06:25:32', '2017-10-19 02:56:41'),
(3, 'JimmiNi', 'jimosa4ccf2@hotmail.com', 'TWq7R2 http://www.FyLitCl7Pf7ojQdDUOLQOuaxTXbj5iNG.com', 0, '2017-10-21 09:50:41', '2017-10-21 09:50:41');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `fullname` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(32) NOT NULL,
  `phone` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `size` varchar(255) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `images`
--

INSERT INTO `images` (`id`, `name`, `path`, `size`, `type`, `updated_at`) VALUES
(1, 'DELL', '1501177004.Dell.jpg', 'Kích thước (130 x 50)', 2, '2017-07-27 17:36:44'),
(2, 'ASUS', '1501177019.asus.jpg', 'Kích thước (130 x 50)', 2, '2017-07-27 17:36:59'),
(3, 'LOGITECH', '1501177044.brand-logitech.jpg', 'Kích thước (130 x 50)', 2, '2017-07-27 17:37:24'),
(4, 'WD', '1501177073.brand-wd.png', 'Kích thước (130 x 50)', 2, '2017-07-27 17:37:53'),
(5, 'KINGMAX', '1501177093.brand-kingmax.jpg', 'Kích thước (130 x 50)', 2, '2017-07-27 17:38:13'),
(6, 'SANDISK', '1501177130.brand-sandisk.png', 'Kích thước (130 x 50)', 2, '2017-07-27 17:38:50'),
(7, 'Slider 1', '1510149377.Slider-4.png', 'Kích thước (762 x 460)', 1, '2017-11-08 13:56:17'),
(8, 'Slider 2', '1502385134.Slider-2.png', 'Kích thước (762 x 460)', 1, '2017-08-10 17:12:14'),
(9, 'Slider 3', '1501177829.Slide-1.jpg', 'Kích thước (762 x 460)', 1, '2017-07-27 17:50:29'),
(10, 'right index 1', '1510723579.MacBook_Air.png', 'Kích thước (360 x 222)', 3, '2017-11-15 05:26:19'),
(11, 'right index 2', '1510726722.Banner_2.png', 'Kích thước (360 x 222)', 3, '2017-11-15 06:18:42'),
(12, 'Banner big', '1510729642.Banner big.png', 'Kích thước (1140 x 159)', 4, '2017-11-15 07:07:22'),
(13, 'Banner trang sản phẩm', '1514030631.merry christmas.png', 'Kích thước (275 x 301)', NULL, '2017-12-23 12:03:51'),
(14, 'Banner chi tiết sản phẩm 1', '1501174825.Small-Qled-TV.jpg', 'Kích thước (200 x 156)', 5, '2017-07-27 17:00:25'),
(15, 'Banner chi tiết sản phẩm 2', '1510976073.Banner chi tiet sp 2.png', 'Kích thước (263 x 423)', 5, '2017-11-18 03:34:33'),
(16, 'Banner trang tin tức', '1510976776.Banner tin tuc.png', 'Kích thước (233 x 264)', NULL, '2017-11-18 03:46:16'),
(17, 'Logo chính', '1498830180.logo.png', 'Kích thước (120 x 65)', NULL, '2017-06-30 13:43:00'),
(18, 'Logo page roll', '1498830195.logo_roll.png', 'Kích thước (120 x 40)', NULL, '2017-06-30 13:43:15');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `image` varchar(250) NOT NULL,
  `is_active` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id`, `title`, `alias`, `description`, `created_at`, `image`, `is_active`, `updated_at`, `user_id`) VALUES
(13, 'Vertu vỡ nợ, điện thoại siêu sang thanh lý giá bằng 1/10', 'vertu-vo-no-dien-thoai-sieu-sang-thanh-ly-gia-bang-110', '<p>Những chiếc điện thọai Vertu trước đ&acirc;y c&oacute; gi&aacute; gần 20.000 USD hiện được b&aacute;n đấu gi&aacute; với gi&aacute; khoảng 1.500 USD.</p>\r\n\r\n<p>C&aacute;ch đ&acirc;y &iacute;t th&aacute;ng, h&atilde;ng sản xuất điện thoại si&ecirc;u sang mang t&iacute;nh biểu tượng của nước Anh l&agrave; Vertu c&ocirc;ng bố sẽ sớm thanh l&yacute; t&agrave;i sản sau những kh&oacute; khăn về t&agrave;i ch&iacute;nh. Giờ đ&acirc;y, họ đang mạnh tay b&aacute;n đấu gi&aacute; khối t&agrave;i sản b&ecirc;n trong nh&agrave; m&aacute;y.</p>\r\n\r\n<p>Hầu hết người d&ugrave;ng thế giới đều nghe về c&aacute;i t&ecirc;n Vertu nhưng kh&ocirc;ng c&oacute; cơ hội sở hữu ch&uacute;ng. Những chiếc di động rẻ nhất của Vertu thường c&oacute; gi&aacute; cả ngh&igrave;n USD. Một chiếc Vertu Signiature Touch, chẳng hạn, c&oacute; gi&aacute; khoảng 10.000 USD.</p>\r\n\r\n<p><img alt=\"\" src=\"http://vinacorp.net/public/uploads/images/Tintuc/082017/AlligatorLeather-1.jpg\" style=\"height:203px; width:660px\" /></p>\r\n\r\n<p>Năm 2016, Vertu bất ngờ rẻ h&oacute;a sản phẩm của m&igrave;nh nhưng chiếc di động gi&aacute; thấp kỷ lục của họ l&agrave; Vertu Aster cũng c&oacute; gi&aacute; khoảng 6.000 USD. Với mức gi&aacute; n&agrave;y, người d&ugrave;ng c&oacute; thể mua được cả chục chiếc smartphone cao cấp tr&ecirc;n thị trường.</p>\r\n\r\n<p>Tuy nhi&ecirc;n, khi c&ocirc;ng ty n&agrave;y thanh l&yacute; h&agrave;ng loạt t&agrave;i sản, người d&ugrave;ng c&oacute; cơ hội mua những chiếc Vertu với gi&aacute; thực sự hời. Chẳng hạn, một chiếc Vertu Signature S mạ v&agrave;ng 18K với mặt lưng bằng da c&aacute; sấu vốn c&oacute; gi&aacute; 19.000 USD hiện được đấu gi&aacute; mức 1.500 USD.</p>\r\n\r\n<p>Người ta thậm ch&iacute; c&ograve;n đem đấu gi&aacute; bộ sự tập điện thoại trong viện bảo t&agrave;ng của Vertu. Bộ sưu tập n&agrave;y gồm 105 chiếc điện thoại ra đời trong suốt chiều d&agrave;i lịch sử của Vertu. Kh&aacute; nhiều trong số đ&oacute; l&agrave; những bản concept trong khi một số kh&aacute;c c&oacute; thể hoạt động ho&agrave;n hảo. Mức gi&aacute; khởi điểm cho bộ sưu tập n&agrave;y l&agrave; 26.000 USD.</p>\r\n\r\n<p>Ngo&agrave;i ra, những người tham gia đấu gi&aacute; cũng t&igrave;m thấy nhiều t&agrave;i sản kh&aacute;c của Vertu bị đem b&aacute;n đấu gi&aacute;, từ bức tượng bằng đồng b&ecirc;n trong trụ sở c&ocirc;ng ty cho đến c&aacute;c loại b&agrave;n l&agrave;m việc v&agrave; hệ thống lập tr&igrave;nh.</p>\r\n\r\n<p><img alt=\"\" src=\"http://vinacorp.net/public/uploads/images/Tintuc/082017/VertuComputers-2.jpg\" style=\"height:374px; width:660px\" /></p>\r\n\r\n<p>H&ocirc;m 13/7, Vertu tuy&ecirc;n bố vỡ nợ, đ&oacute;ng cửa nh&agrave; m&aacute;y, dừng sản xuất v&igrave; kh&ocirc;ng thể trả khoản nợ 128 triệu bảng.</p>\r\n\r\n<p>&Ocirc;ng chủ của Vertu, Murat Hakan Uzan, mua lại c&ocirc;ng ty từ Godin Holdings của Trung Quốc, khi doanh nghiệp n&agrave;y đang đối mặt với nguy cơ ph&aacute; sản hồi th&aacute;ng 3.</p>\r\n\r\n<p>&Ocirc;ng Uzan được cho sẽ giữ lại thương hiệu Vertu, c&ocirc;ng nghệ v&agrave; giấy ph&eacute;p thiết kế để hồi sinh thương hiệu nổi tiếng n&agrave;y trong tương lai.</p>\r\n\r\n<p style=\"text-align: right;\"><em>Theo Zing.vn</em></p>', '2017-08-11 05:06:53', '1502428013.Vertu_Signature_S_Yellow_Gold_Full_Pave_Diamond_Bezel_6.JPG', 1, '2017-08-11 05:06:53', 'admin'),
(14, 'Facebook Watch: Ra đời để lật đổ YouTube', 'facebook-watch-ra-doi-de-lat-do-youtube', '<p>H&ocirc;m 9/8, Facebook tiết lộ sẽ cung cấp một nền tảng video mới c&oacute; t&ecirc;n l&agrave; Watch. N&oacute; xuất hiện dưới dạng ứng dụng độc lập tương tự Messenger.</p>\r\n\r\n<p>Tr&ecirc;n trang blog của c&ocirc;ng ty, &ocirc;ng Daniel Danker, Gi&aacute;m đốc Sản phẩm Facebook chia sẻ: &quot;Video tr&ecirc;n Facebook c&oacute; sức mạnh đ&aacute;ng kinh ngạc. N&oacute; gi&uacute;p kết nối mọi người, g&acirc;y tranh luận v&agrave; sự cảm th&ocirc;ng. Tuy vậy n&oacute; chỉ được kh&aacute;m ph&aacute;, chia sẻ qua bạn b&egrave; v&agrave; trong cộng đồng với nhau&quot;.</p>\r\n\r\n<p>Ng&agrave;y c&agrave;ng c&oacute; nhiều người y&ecirc;u th&iacute;ch h&igrave;nh thức trải nghiệm n&agrave;y. V&igrave; vậy News feed đ&atilde; kh&ocirc;ng thể đ&aacute;p ứng được nhu cầu đ&oacute;. &quot;Đ&oacute; l&agrave; l&yacute; do tại sao năm ngo&aacute;i ch&uacute;ng t&ocirc;i đ&atilde; ph&aacute;t h&agrave;nh tab Video ở Mỹ. N&oacute; cung cấp dự đo&aacute;n để t&igrave;m video tr&ecirc;n Facebook. B&acirc;y giờ ch&uacute;ng t&ocirc;i muốn người d&ugrave;ng c&oacute; thể dễ d&agrave;ng hơn nữa trong việc t&igrave;m kiếm v&agrave; xem những đoạn video&quot;, vị gi&aacute;m đốc n&agrave;y chia sẻ th&ecirc;m.</p>\r\n\r\n<p>Thời gian gần đ&acirc;y, tin đồn về việc Facebook sẽ cạnh tranh với YouTube ở mảng video đ&atilde; rộ l&ecirc;n. Tuy vậy đ&acirc;y l&agrave; lần đầu ti&ecirc;n Facebook cung cấp th&ocirc;ng tin về nền tảng mới của m&igrave;nh.&nbsp;</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" src=\"http://vinacorp.net/public/uploads/images/Tintuc/082017/01_Discover.jpg\" style=\"height:290px; width:660px\" /></p>\r\n\r\n<p style=\"text-align:center\"><span style=\"font-size:12px\">Những c&aacute;i nh&igrave;n đầu ti&ecirc;n về Watch do Facebook cung cấp.</span></p>\r\n\r\n<p>Ngo&agrave;i ra, Watch c&oacute; điểm tương đồng với YouTube l&agrave; người d&ugrave;ng c&oacute; thể theo d&otilde;i những k&ecirc;nh y&ecirc;u th&iacute;ch. Tuy vậy, ứng dụng mới n&agrave;y lợi dụng thế mạnh về c&aacute;c tương t&aacute;c cảm x&uacute;c của Facebook để c&aacute; nh&acirc;n h&oacute;a trải nghiệm video cho từng người.</p>\r\n\r\n<p>&quot;Ch&uacute;ng t&ocirc;i đ&atilde; học được từ Facebook Live rằng những nhận x&eacute;t v&agrave; phản ứng của mọi người đối với video thường l&agrave; một phần của trải nghiệm như ch&iacute;nh bản th&acirc;n nội dung video&quot;,&nbsp;Daniel Danker n&oacute;i.</p>\r\n\r\n<p>Cụ thể l&agrave; người d&ugrave;ng c&oacute; thể xem top &quot;những video h&agrave;i hước nhất&quot; theo số lượng người d&ugrave;ng tương t&aacute;c bằng n&uacute;t &quot;Haha&quot;. Khi xem chương tr&igrave;nh, người d&ugrave;ng c&oacute; thể xem nhận x&eacute;t v&agrave; kết nối với bạn b&egrave; v&agrave; người xem kh&aacute;c trong khi theo d&otilde;i, hoặc tham gia v&agrave;o nh&oacute;m Facebook d&agrave;nh ri&ecirc;ng cho chương tr&igrave;nh.&nbsp;</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" src=\"http://vinacorp.net/public/uploads/images/Tintuc/082017/07_WWW_Watchlist.jpg\" style=\"height:389px; width:660px\" /></p>\r\n\r\n<p style=\"text-align:center\"><span style=\"font-size:12px\">Watch sẽ xuất hiện tr&ecirc;n cả hai nền tảng l&agrave; điện thoại v&agrave; m&aacute;y t&iacute;nh. Ảnh:&nbsp;<em>Facebook.</em></span></p>\r\n\r\n<p>Nền tảng chương tr&igrave;nh video sẽ trải rộng từ h&agrave;i kịch cho đến c&aacute;c chương tr&igrave;nh thể thao trực tuyến. Ph&iacute;a Facebook sẽ trả tiền cho những nh&agrave; s&aacute;ng tạo để duy tr&igrave; việc sản xuất của m&igrave;nh.&nbsp;</p>\r\n\r\n<p>Tuy vậy, mạng x&atilde; hội n&agrave;y kh&ocirc;ng c&ocirc;ng bố ch&iacute;nh x&aacute;c thời điểm Facebook Watch xuất hiện. Họ chỉ n&oacute;i sẽ thử nghiệm đầu ti&ecirc;n ở Mỹ với một nh&oacute;m người d&ugrave;ng giới hạn v&agrave; sớm cung cấp cho tất cả người d&ugrave;ng c&ograve;n lại.&nbsp;</p>\r\n\r\n<p>Cũng tương tự như vậy, chỉ một nh&oacute;m nh&agrave; s&aacute;ng tạo chất lượng được d&ugrave;ng thử nền tảng n&agrave;y trước khi n&oacute; ch&iacute;nh thức được ra mắt. Tại Việt Nam, ng&agrave;y 24/7 vừa qua, Facebook đ&atilde; tổ chức một chương tr&igrave;nh đ&agrave;o tạo kỹ năng sản xuất video cơ bản cho một nh&oacute;m người d&ugrave;ng. V&igrave; ở những bước đầu ti&ecirc;n, Watch cần c&oacute; một kho nội dung hấp dẫn nhất định mới c&oacute; thể l&ocirc;i k&eacute;o được người d&ugrave;ng vốn đ&atilde; qu&aacute; quen thuộc với YouTube.</p>\r\n\r\n<p>&nbsp;</p>', '2017-08-11 05:15:56', '1502428556.Screenshot_24.jpg', 1, '2017-08-11 05:18:43', 'admin'),
(15, 'Cái giá không tưởng của iPhone X và canh bạc của Apple', 'cai-gia-khong-tuong-cua-iphone-x-va-canh-bac-cua-apple', '<p>Ng&agrave;y nay c&aacute;c smartphone thường lạc hậu sau 2 năm, v&igrave; vậy người d&ugrave;ng cần phải đặt ra b&agrave;i to&aacute;n kinh tế khi chi ph&iacute; c&aacute;c thiết bị n&agrave;y ng&agrave;y một tăng cao.</p>\r\n\r\n<p>Tuần n&agrave;y Apple đưa ra b&agrave;i kiểm tra l&ograve;ng trung th&agrave;nh của người d&ugrave;ng khi giới thiệu chiếc iPhone X với mức gi&aacute; hơn 1.000 USD. Sự kiện được tổ chức tại Nh&agrave; h&aacute;t Steve Jobs, trong khu&ocirc;n vi&ecirc;n trụ sở mới của Apple. Với nhiều thay đổi về m&agrave;n h&igrave;nh, camera v&agrave; thiết kế tổng thể, iPhone X nhận được nhiều phản hồi t&iacute;ch cực từ người d&ugrave;ng.</p>\r\n\r\n<p>Apple đ&atilde; mang nhiều thiết kế mới v&agrave;o thiết bị như m&agrave;n h&igrave;nh OLED full-screen, camera thụ cảm s&acirc;u hỗ trợ trải nghiệm c&ocirc;ng nghệ thực tế ảo tăng cường AR, cho ph&eacute;p người d&ugrave;ng mở kho&aacute; thiết bị bằng nhận diện khu&ocirc;n mặt thay cho v&acirc;n tay.</p>\r\n\r\n<p>Ngo&agrave;i ra, iPhone mới c&ograve;n được trang bị khả năng cảm nhận chiều s&acirc;u v&agrave; theo d&otilde;i khu&ocirc;n mặt, biểu cảm cho camera. Một loạt c&aacute;c emoji mới bao gồm khỉ, robot d&agrave;nh cho người d&ugrave;ng iPhone th&iacute;ch &quot;tự sướng&quot;, nhằm gi&agrave;nh sự ch&uacute; &yacute; của họ trong cuộc chiến với c&aacute;c t&ecirc;n tuổi kh&aacute;c như Facebook hay Snapchat.</p>\r\n\r\n<p>C&aacute;c nh&agrave; ph&acirc;n t&iacute;ch tin rằng m&agrave;n ra mắt iPhone mới sẽ gi&uacute;p Apple vượt qua được c&aacute;c vấn đề về tăng trưởng trong 2 năm qua. Tại thị trường Mỹ v&agrave; ch&acirc;u &Acirc;u, việc sử dụng smartphone đ&atilde; trở n&ecirc;n b&atilde;o ho&agrave; v&agrave; nhiều người d&ugrave;ng quyết định tiếp tục sử dụng c&aacute;c thiết bị cũ thay v&igrave; n&acirc;ng cấp sản phẩm mới. Do đ&oacute;, c&aacute;ch tốt nhất để ph&aacute;t triển doanh thu ch&iacute;nh l&agrave; tăng gi&aacute; tr&ecirc;n mỗi sản phẩm, chứ kh&ocirc;ng chỉ đơn thuần dựa tr&ecirc;n sự tăng trưởng thiết bị b&aacute;n ra.</p>\r\n\r\n<p><img alt=\"\" src=\"http://vinacorp.net/public/uploads/images/Tintuc/iphonex.jpg\" style=\"height:429px; width:660px\" /></p>\r\n\r\n<p>Tuy nhi&ecirc;n, nhiều linh kiện iPhone mới hiện vẫn chưa đủ cung ứng, do đ&oacute; c&oacute; thể dẫn đến t&igrave;nh trạng nhiều kh&aacute;ch h&agrave;ng phải chờ đợi mới c&oacute; thể sở hữu sản phẩm. Đ&acirc;y ch&iacute;nh l&agrave; cơ hội cho Samsung với chiếc Note 8 hoặc Essential, thương hiệu do nh&agrave; đồng s&aacute;ng lập Android Andy Rubin sở hữu, nhắm v&agrave;o nh&oacute;m người d&ugrave;ng cao cấp như Apple nhưng chỉ với mức gi&aacute; 699 USD. B&ecirc;n cạnh đ&oacute; c&ograve;n c&oacute; Google cũng đang chuẩn bị cho m&agrave;n ra mắt chiếc Pixel thế hệ mới.</p>\r\n\r\n<p>Với sự cạnh tranh gay gắt ở ph&acirc;n kh&uacute;c cao cấp, Apple buộc l&ograve;ng phải dựa v&agrave;o l&ograve;ng trung th&agrave;nh của c&aacute;c iFan v&agrave; hệ sinh th&aacute;i kh&eacute;p k&iacute;n của h&atilde;ng để tr&oacute;i buộc người d&ugrave;ng. C&aacute;c nh&agrave; ph&acirc;n t&iacute;ch nhận định, iPhone X với mức gi&aacute; cho phi&ecirc;n bản thấp nhất 1.000 USD sẽ giữ được đẳng cấp cho Apple c&ugrave;ng nguồn lợi nhuận ổn định, bất chấp lượng thiết bị b&aacute;n ra sụt giảm.</p>\r\n\r\n<p>Nh&agrave; ph&acirc;n t&iacute;ch Ben Bajarin từ <em>Creative Strategies</em> chia sẻ: &quot;Ch&uacute;ng ta chưa từng chứng kiến chiếc smartphone n&agrave;o đắt đỏ như vậy. C&oacute; lẽ Apple tin chắc rằng người d&ugrave;ng sẽ kh&ocirc;ng rời bỏ họ, c&ocirc;ng ty chỉ đơn thuần cho kh&aacute;ch h&agrave;ng c&oacute; th&ecirc;m sự lựa chọn.</p>\r\n\r\n<p><img alt=\"\" src=\"http://vinacorp.net/public/uploads/images/Tintuc/15092017/iphonex1.jpg\" style=\"height:372px; width:660px\" /></p>\r\n\r\n<p style=\"text-align:center\">iPhone 8 được cho rằng chỉ l&agrave; đ&ograve;n bẩy để Apple b&aacute;n iPhone X. Ảnh: <em>Engadget.</em></p>\r\n\r\n<p>Một cuộc khảo s&aacute;t do <em>Creative Strategies</em> v&agrave; <em>Survey Monkey </em>thực hiện cho thấy 21% số người được hỏi khẳng định sẽ mua iPhone mới bất chấp gi&aacute; cả, v&agrave; 33% cho biết sẽ kh&ocirc;ng n&acirc;ng cấp iPhone mới nếu qu&aacute; đắt.</p>\r\n\r\n<p>Mặc d&ugrave; một số người c&oacute; thể bị sốc với mức gi&aacute; m&agrave; Apple vừa đưa ra, song việc ph&acirc;n đoạn thị trường như vậy l&agrave; rất phổ biến đối với những thị trường như TV hay &ocirc;t&ocirc;, cũng như c&aacute;c d&ograve;ng sản phẩm hiện tại của Apple.</p>\r\n\r\n<p>D&ograve;ng iMac của T&aacute;o khuyết cũng c&oacute; khung gi&aacute; rộng, dao động từ 500 USD với m&aacute;y Mac mini đến 4.000 USD cho một chiếc Mac Pro. Apple Watch khi mới ra mắt cũng c&oacute; một phi&ecirc;n bản v&agrave;ng nguy&ecirc;n khối c&oacute; gi&aacute; l&ecirc;n đến 10.000 USD. Ngay cả iPhone cũng c&oacute; phi&ecirc;n bản iPhone 5C vỏ nhựa gi&aacute; chỉ 100 USD.</p>\r\n\r\n<p>Chuy&ecirc;n gia ph&acirc;n t&iacute;ch Geoff Blaber từ <em>CCS Insight</em> cho hay: &quot;Apple l&agrave; bậc thầy về khoảng ph&acirc;n chia danh mục đầu tư th&agrave;nh c&aacute;c mức gi&aacute; ri&ecirc;ng biệt. Ch&uacute;ng ta thường c&oacute; xu hướng nh&igrave;n v&agrave;o con số 1.000 USD v&agrave; nghĩ rằng đ&acirc;y l&agrave; khu vực gi&aacute; của Apple, nhưng c&ocirc;ng ty c&oacute; danh mục sản phẩm rộng hơn nhiều so với nhiều người nghĩ&quot;.</p>\r\n\r\n<p>Mặc kh&aacute;c,&nbsp;điều n&agrave;y c&oacute; thể g&acirc;y ra rắc rối cho Apple. Một số cho rằng h&atilde;ng đang &quot;h&uacute;t m&aacute;u&quot; c&aacute;c kh&aacute;ch h&agrave;ng gi&agrave;u c&oacute; v&agrave; trung th&agrave;nh của m&igrave;nh. &Ocirc;ng Blaber n&oacute;i: &quot;Cũng nhiều người nghĩ Apple đang t&igrave;m c&aacute;ch &quot;khai th&aacute;c&quot; c&aacute;c kh&aacute;ch h&agrave;ng của họ c&agrave;ng nhiều c&agrave;ng tốt&quot;.</p>\r\n\r\n<p>C&aacute;c nh&agrave; ph&acirc;n t&iacute;ch tại <em>Citi Research</em> dự đo&aacute;n &quot;h&oacute;a đơn nguy&ecirc;n vật liệu&quot; v&agrave; c&aacute;c chi ph&iacute; lắp r&aacute;p cho iPhone X sẽ cao hơn 100 USD so với iPhone 7 (c&oacute; mức gi&aacute; khoảng 387 USD). Trong đ&oacute;, chiếm một nửa của chi ph&iacute; cộng th&ecirc;m l&agrave; m&agrave;n h&igrave;nh OLED, do số lượng hạn chế đến từ nh&agrave; cung cấp Samsung Electronics so với m&agrave;n h&igrave;nh LCD ở c&aacute;c iPhone đời trước.<br />\r\n<br />\r\n<img alt=\"\" src=\"http://vinacorp.net/public/uploads/images/Tintuc/15092017/iphonex2.jpg\" style=\"height:371px; width:660px\" /></p>\r\n\r\n<p style=\"text-align:center\">Gi&aacute; thiết bị ng&agrave;y c&agrave;ng tăng cao buộc người d&ugrave;ng phải đối mặt với b&agrave;i to&aacute;n chi ph&iacute;. Ảnh:<em> Ft.</em></p>\r\n\r\n<p>Wayne Lam từ nh&oacute;m nghi&ecirc;n cứu IHS nhận định việc iPhone X c&oacute; gi&aacute; hơn 1.000 USD c&ograve;n nhằm duy tr&igrave; tỷ suất lợi nhuận khoảng 46%. &Ocirc;ng n&oacute;i: &quot;Kh&ocirc;ng c&oacute; g&igrave; b&iacute; mật khi Apple c&oacute; lợi nhuận cao nhất từ trước đến nay. Sản phẩm năm nay sẽ l&agrave; b&agrave;i kiểm tra đối với người d&ugrave;ng&#39;&#39;.</p>\r\n\r\n<p>Nhiều kh&aacute;ch h&agrave;ng sẵn s&agrave;ng trả th&ecirc;m tiền cho chiếc smartphone của m&igrave;nh v&igrave; thiết bị n&agrave;y đ&atilde; trở n&ecirc;n kh&ocirc;ng thể thiếu trong cuộc sống ng&agrave;y nay. C&aacute;c h&atilde;ng sản xuất kh&aacute;c cũng lợị dụng điều n&agrave;y, c&oacute; thể kể đến Samsung với chiếc Note 8 lần đầu ti&ecirc;n c&oacute; gi&aacute; l&ecirc;n đến 960 USD.&nbsp;</p>\r\n\r\n<p>Mua trả g&oacute;p, th&ocirc;ng qua c&aacute;c hợp đồng với nh&agrave; mạng hoặc mua k&egrave;m c&aacute;c ưu đ&atilde;i kh&aacute;c c&oacute; thể khiến nhiều người d&ugrave;ng chấp nhận mức gi&aacute; n&agrave;y. Tuy nhi&ecirc;n, con số 1.000 USD thực sự qu&aacute; lớn so ngay cả khi so s&aacute;nh với một chiếc m&aacute;y t&iacute;nh c&aacute; nh&acirc;n. &Ocirc;ng Lam n&oacute;i: &quot;Ng&agrave;y nay c&aacute;c smartphone thường lạc hậu sau 2 năm, v&igrave; vậy m&agrave; đ&acirc;y l&agrave; khoản đầu tư kh&ocirc;ng nhỏ. Người d&ugrave;ng cần phải đặt ra b&agrave;i to&aacute;n kinh tế khi chi ph&iacute; c&aacute;c thiết bị n&agrave;y ng&agrave;y một tăng cao&quot;.</p>', '2017-09-15 11:40:26', '1505475626.iphonex.jpg', 1, '2017-09-15 11:42:01', 'toannv'),
(16, 'Nhờ giảm giá, thị trường ô tô Việt Nam tháng 8/2017 phục hồi', 'nho-giam-gia-thi-truong-o-to-viet-nam-thang-82017-phuc-hoi', '<p>Mức tăng trưởng doanh số 7% so với th&aacute;ng 7 được xem l&agrave; t&iacute;n hiệu đ&aacute;ng mừng, trong bối cảnh to&agrave;n thị trường vẫn tương đối ảm đạm.<br />\r\n<br />\r\n<img alt=\"\" src=\"http://vinacorp.net/public/uploads/images/Tintuc/15092017/oto.jpg\" style=\"height:480px; width:640px\" /></p>\r\n\r\n<p>Thống k&ecirc; của Hiệp hội c&aacute;c nh&agrave; sản xuất &ocirc; t&ocirc; Việt Nam (VAMA) cho biết, to&agrave;n thị trường &ocirc; t&ocirc; Việt Nam đạt doanh số b&aacute;n h&agrave;ng 22.099 xe trong th&aacute;ng 8/2017 vừa qua, tăng 7% so với th&aacute;ng 7 v&agrave; giảm 6% so với c&ugrave;ng kỳ năm trước. Trong đ&oacute;, xe du lịch đạt 12.568 chiếc, xe thương mại 8.687 chiếc v&agrave; xe chuy&ecirc;n dụng 844 chiếc.</p>\r\n\r\n<p>Thống k&ecirc; của VAMA c&ograve;n cho thấy, doanh số xe du lịch trong th&aacute;ng 8/2017 tăng 12%, xe thương mại tăng 2% c&ograve;n xe chuy&ecirc;n dụng giảm 14% so với th&aacute;ng trước đ&oacute;.</p>\r\n\r\n<p>Cũng theo b&aacute;o c&aacute;o, doanh số xe lắp r&aacute;p trong nước th&aacute;ng 8/2017 đạt 15.494 xe (tăng 5% so với th&aacute;ng trước), c&ograve;n xe nhập khẩu nguy&ecirc;n chiếc l&agrave; 6.605 xe (tăng 12%). Tuy nhi&ecirc;n, t&iacute;nh từ đầu năm đến hết th&aacute;ng 8/2017, doanh số b&aacute;n h&agrave;ng của xe lắp r&aacute;p trong nước vẫn giảm 11%, trong khi xe nhập khẩu tăng 10% so với c&ugrave;ng kỳ năm ngo&aacute;i.</p>\r\n\r\n<p>Kết quả b&aacute;n h&agrave;ng trong th&aacute;ng 8 vừa qua được xem l&agrave; hợp l&yacute;, khi hầu hết c&aacute;c h&atilde;ng xe vẫn ki&ecirc;n tr&igrave; đưa ra nhiều chương tr&igrave;nh ưu đ&atilde;i, khuyến m&atilde;i, k&iacute;ch cầu ti&ecirc;u d&ugrave;ng. D&ugrave; vậy, mức doanh số hiện nay vẫn chưa được như những g&igrave; m&agrave; c&aacute;c doanh nghiệp thuộc VAMA kỳ vọng từ đầu năm. Phần lớn người ti&ecirc;u d&ugrave;ng vẫn c&oacute; t&acirc;m l&yacute; chờ đợi gi&aacute; xe rẻ v&agrave;o năm 2018, dẫn đến ngại chi ti&ecirc;u mua xe ngay l&uacute;c n&agrave;y.</p>', '2017-09-15 11:48:44', '1505476124.oto.jpg', 1, '2017-09-15 11:48:44', 'toannv'),
(19, 'Top 3 laptop Dell khuấy động thị trường đầu năm 2017', 'top-3-laptop-dell-khuay-dong-thi-truong-dau-nam-2017', '<p>Kh&aacute;i niệm &quot;laptop 2 trong 1&quot; hay c&ograve;n gọi l&agrave; d&ograve;ng laptop lai đ&atilde; kh&ocirc;ng c&ograve;n xa lạ với mọi người. Những sản phẩm n&agrave;y mang lại cho người d&ugrave;ng những trải nghiệm kh&aacute; th&uacute; vị vừa như một chiếc m&aacute;y t&iacute;nh bảng vừa c&oacute; hiệu năng như một chiếc laptop truyền thống. Vina sẽ giới thiệu cho bạn Top 3 laptop Dell nổ ph&aacute;t ph&aacute;o đầu ti&ecirc;n khai trương cho năm 2017 đầy ấn tượng.</p>\r\n\r\n<p><strong>&nbsp;&nbsp;&nbsp;&nbsp; Dell XPS 13 phi&ecirc;n bản 2-in- 1</strong><br />\r\n<br />\r\nĐầu th&aacute;ng 1, tại CES 2017 Las Vegas, Dell đ&atilde; ra mắt sản phẩm laptop XPS 13 với phi&ecirc;n bản 2 trong 1, c&oacute; viền cạnh si&ecirc;u mỏng chỉ 5,2 mm, vỏ nh&ocirc;m nguy&ecirc;n khối sang trọng, được h&atilde;ng tự h&agrave;o nhận x&eacute;t rằng đ&acirc;y l&agrave; laptop lai 13 inches nhỏ nhất thể giới khi k&iacute;ch thước chỉ bằng một chiếc laptop 11 inch. Thiết kế nổi bật ở sản phẩm đ&oacute; l&agrave; việc m&agrave;n h&igrave;nh c&oacute; thể lật được 360 độ v&agrave; c&oacute; thể biến đổi như một chiếc tablet.</p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"\" src=\"http://vinacorp.net/public/uploads/images/Tintuc/15092017/DellXPS13voi4chedodung.jpg\" style=\"height:500px; width:800px\" /></p>\r\n\r\n<p style=\"text-align:center\"><em>Laptop Dell XPS 13 với 4 chế độ sử dụng</em></p>\r\n\r\n<p>Với cấu h&igrave;nh th&igrave; Dell XPS 13 được trang bị chip Intel Kaby Lake mới nhất với 2 phi&ecirc;n bản l&agrave; core i5 v&agrave; core i7, dung lượng RAM t&ugrave;y chọn 4/8/16GB. Để ph&ugrave; hợp với thiết kế nhỏ gọn n&ecirc;n sản phẩm n&agrave;y kh&ocirc;ng c&oacute; đế tản nhiệt, kh&ocirc;ng c&oacute; khe cắm SD nhưng vẫn c&oacute; hỗ trợ thẻ micro SD. Cổng kết nối cũng c&oacute; sự kh&aacute;c biệt khi thay đổi từ cổng USB type A sang cổng USB type C, nhưng người sử dụng kh&ocirc;ng cần lo lắng bởi h&atilde;ng đ&atilde; tặng k&egrave;m cổng chuyển đổi khi mua.</p>\r\n\r\n<p><img alt=\"\" src=\"http://vinacorp.net/public/uploads/images/Tintuc/15092017/DellXPS13.jpg\" style=\"height:500px; width:800px\" /></p>\r\n\r\n<p style=\"text-align:center\"><em>Thiết kế nhỏ nhắn với cấu h&igrave;nh ổn định</em></p>\r\n\r\n<p>Đối với nhiều người dung lượng pin rất quan trọng bởi kh&ocirc;ng phải ai cũng c&oacute; thể sạc pin bất cứ l&uacute;c n&agrave;o, Dell XPS 13 2-in-1 đ&aacute;p ứng được sự mong đợi đ&oacute; khi bạn c&oacute; thể sử dụng trong 15 giờ với chế độ m&agrave;n h&igrave;nh độ ph&acirc;n giải Full HD, c&ograve;n đối với chế độ Quad HD th&igrave; c&oacute; sự giảm xuống đ&aacute;ng kể nhưng vẫn được 8 giờ sử dụng.</p>\r\n\r\n<p><img alt=\"\" src=\"http://vinacorp.net/public/uploads/images/Tintuc/15092017/DellXPS13thietkedepmat.jpg\" style=\"height:500px; width:800px\" /></p>\r\n\r\n<p style=\"text-align:center\"><em>Dung lượng pin của Laptop Dell đảm bảo cho người d&ugrave;ng</em></p>\r\n\r\n<p>Bạn c&oacute; thể tham khảo một phi&ecirc;n bản kh&aacute;c của DELL XPS 13 đang b&aacute;n tại Vina.</p>\r\n\r\n<p style=\"text-align:justify\"><strong>&nbsp;&nbsp;&nbsp; Dell Latitude 5285</strong><br />\r\n<br />\r\nRa mắt v&agrave;o đầu năm 2017, v&agrave; được hứa hẹn sẽ b&aacute;n ra thị trường v&agrave;o cuối th&aacute;ng 2 n&agrave;y, Dell Latitude 5285 mang lại sự mong chờ cho những ai c&oacute; hứng th&uacute; với loại laptop lai khi n&oacute; được v&iacute; như một đối thủ đ&aacute;ng gờm của Surface Pro 4 của Microsoft. Sản phẩm n&agrave;y được Dell thiết kế với phong c&aacute;ch thanh tho&aacute;t thể hiện sự hiện đại, mặt lưng kim loại phay xước, m&agrave;n h&igrave;nh th&aacute;o rời khỏi b&agrave;n ph&iacute;m, mang lại ấn tượng mạnh.</p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"\" src=\"http://vinacorp.net/public/uploads/images/Tintuc/15092017/laptoplatitude5285thietkehiendai.jpg\" style=\"height:500px; width:800px\" /></p>\r\n\r\n<p style=\"text-align:center\"><em>Laptop Dell Latitude 5285 c&oacute; thiết kế hiện đại</em></p>\r\n\r\n<p>Chưa dừng lại với vẻ h&agrave;o hoa b&ecirc;n ngo&agrave;i, chiếc laptop Dell n&agrave;y c&ograve;n mang cho bạn mong muốn sở hữu mạnh mẽ hơn với trang bị những t&ugrave;y chọn bảo mật phong ph&uacute;. Đ&oacute; l&agrave; camera hồng ngoại cho t&iacute;nh năng Windows Hello nhận diện khu&ocirc;n mặt, một m&aacute;y qu&eacute;t v&acirc;n tay ở mặt lưng, cuối c&ugrave;ng l&agrave; đầu đọc thẻ th&ocirc;ng minh đảm bảo an to&agrave;n dữ liệu cho chủ nh&acirc;n m&aacute;y t&iacute;nh.</p>\r\n\r\n<p><img alt=\"\" src=\"http://vinacorp.net/public/uploads/images/Tintuc/15092017/delllatitude52852in1cambienvantay.jpg\" style=\"height:500px; width:800px\" /></p>\r\n\r\n<p style=\"text-align:center\"><em>N&uacute;t qu&eacute;t v&acirc;n tay nằm ở mặt lưng chiếc Laptop</em></p>\r\n\r\n<p>M&agrave;n h&igrave;nh cảm ứng 12.3 inch th&aacute;o rời, m&aacute;y c&oacute; thể nhanh ch&oacute;ng biến th&agrave;nh một c&aacute;i tablet hỗ trợ bạn tối ưu trong c&ocirc;ng việc. Cộng với cấu h&igrave;nh của Latitude 5285 cũng kh&aacute; ổn định khi c&oacute; bộ vi xử l&yacute; Intel Core i Kaby Lake, v&agrave; RAM 4 GB/8 GB/16 GB cho bạn lựa chọn phong ph&uacute;. Th&ecirc;m v&agrave;o đ&oacute;, laptop c&ograve;n c&oacute; hỗ trợ 2 cổng USB type C, một cổng USB 3.0, c&oacute; khe cắm sim v&agrave; đầu đọc thẻ microSD cho bạn những kết nối đa dạng.</p>\r\n\r\n<p><img alt=\"\" src=\"http://vinacorp.net/public/uploads/images/Tintuc/15092017/15092017-1/DellLatitude52852in1ImageLarge.jpg\" style=\"height:500px; width:800px\" /></p>\r\n\r\n<p style=\"text-align:center\"><em>M&aacute;y t&iacute;nh x&aacute;ch tay Dell hỗ trợ nhiều cổng kết nối</em></p>\r\n\r\n<p><strong>&nbsp;&nbsp;&nbsp; Dell Latitude 7285</strong><br />\r\n<br />\r\nCũng được ra mắt tại CES 2017, chiếc laptop Dell đ&atilde; l&agrave;m cho moi người kh&ocirc;ng thể tr&aacute;nh khỏi bất ngờ v&agrave; th&iacute;ch th&uacute; với sự kh&aacute;c lạ của m&igrave;nh. Vẫn thuộc d&ograve;ng Latitude cao cấp, nhưng laptop lai n&agrave;y lại l&agrave; một sản phẩm độc lạ khi lần đ&acirc;u ti&ecirc;n một chiếc m&aacute;y t&iacute;nh x&aacute;ch tay lại được t&iacute;ch hợp sạc kh&ocirc;ng d&acirc;y với c&ocirc;ng nghệ của WiTricity. V&agrave; một lưu &yacute; nhỏ l&agrave; phần t&iacute;ch hợp n&agrave;y được đặt ở b&agrave;n ph&iacute;m, do đ&oacute; nếu muốn sử dụng c&ocirc;ng nghệ n&agrave;y khi m&agrave;n h&igrave;nh được gắn liền với b&agrave;n ph&iacute;m nh&eacute;!</p>\r\n\r\n<p style=\"text-align:justify\"><img alt=\"\" src=\"http://vinacorp.net/public/uploads/images/Tintuc/15092017/15092017-1/delllatitude72852in1thietkeroi.jpg\" style=\"height:500px; width:800px\" /></p>\r\n\r\n<p style=\"text-align:center\"><em>Dell Latitude 7285 l&agrave; laptop đầu ti&ecirc;n sạc kh&ocirc;ng d&acirc;y</em></p>\r\n\r\n<p>Dell Latitude 7285 l&agrave; laptop 2 trong 1 nhưng do thuộc d&ograve;ng m&aacute;y d&agrave;nh cho doanh nh&acirc;n n&ecirc;n n&oacute; mang vẻ ngo&agrave;i cứng c&aacute;p, hơi d&agrave;y, vỏ được l&agrave;m bằng hợp kim. V&agrave; sản phẩm được thiết kế c&oacute; thể th&aacute;o rời b&agrave;n ph&iacute;m v&agrave; m&agrave;n h&igrave;nh để sử dụng như một chiếc tablet ri&ecirc;ng biệt. Đặc biệt m&agrave;n h&igrave;nh cảm ứng IZGO 12-inch mang cho bạn những vuốt chạm mượt m&agrave; khi sử dụng, nhất l&agrave; khi đang ở chế độ như một chiếc m&aacute;y t&iacute;nh bảng.</p>\r\n\r\n<p><img alt=\"\" src=\"http://vinacorp.net/public/uploads/images/Tintuc/15092017/15092017-1/delllatitude72852in1.jpg\" style=\"height:500px; width:800px\" /></p>\r\n\r\n<p style=\"text-align:center\"><em>M&agrave;n h&igrave;nh th&aacute;o rời n&ecirc;n bạn c&oacute; thể sử dụng như một chiếc tablet</em></p>\r\n\r\n<p>Sản phẩm n&agrave;y sở hữu vi xử l&yacute; Intel Kaby Lake mới nhất tối ưu hiệu năng khi xem những video 4K, c&ugrave;ng với RAM 8GB/ 16GB cho bạn ho&agrave;n to&agrave;n y&ecirc;n t&acirc;m c&agrave;i đặt chương tr&igrave;nh khi sử dụng. M&aacute;y c&ograve;n được t&iacute;ch hợp nhiều c&ocirc;ng nghệ cao cấp như Windows Hello dựa tr&ecirc;n camera IR mang lại nhận diện h&igrave;nh ảnh tốt hơn khi thực hiện c&aacute;c cuộc gọi video chat. Đối với thời lượng pin, ở chế độ laptop th&igrave; bạn c&oacute; thể d&ugrave;ng trong 9 giờ, chế độ m&aacute;y t&iacute;nh bảng th&igrave; tầm khoảng 6 giờ.</p>\r\n\r\n<p><img alt=\"\" src=\"http://vinacorp.net/public/uploads/images/Tintuc/15092017/15092017-1/delllatitude2852in1chedodung.jpg\" style=\"height:500px; width:800px\" /></p>\r\n\r\n<p style=\"text-align:center\"><em>Với chế độ laptop th&igrave; bạn c&oacute; thể sử dụng trong 9 giờ</em></p>\r\n\r\n<p>Như vậy sau khi ra mắt ho&agrave;nh tr&aacute;ng, c&oacute; phần kh&ocirc;ng thể tin được với nhiều người th&igrave; chiếc laptop Dell XPS 13 2-in-1 đ&atilde; được b&aacute;n tr&ecirc;n thị trường. C&ograve;n b&acirc;y giờ ch&uacute;ng ta sẽ c&ugrave;ng chờ đợi hai si&ecirc;u phẩm c&ograve;n lại của Dell sẽ được b&aacute;n trong thời gian sắp tới. C&ograve;n nếu bạn c&oacute; nhu cầu mua laptop lai m&aacute;y t&iacute;nh bảng th&igrave; vẫn c&oacute; thể tham khảo những sản phẩm đang b&aacute;n tại Vina&nbsp; nh&eacute;!</p>\r\n\r\n<p><a href=\"http://www.vinacorp.net\">VINA CUNG CẤP LAPTOP CH&Iacute;NH H&Atilde;NG.</a><br />\r\n<a href=\"http://www.vinacorp.net\">WWW.VINACORP.NET</a></p>\r\n\r\n<p style=\"text-align:right\"><em>Theo Kim Chi</em></p>', '2017-09-15 12:32:30', '1505478750.DellXPS13.jpg', 1, '2017-09-16 16:25:31', 'admin'),
(29, 'Bí thư Nguyễn Thanh Nghị: Lên phương án nhân sự đặc khu Phú Quốc', 'bi-thu-nguyen-thanh-nghi-len-phuong-an-nhan-su-dac-khu-phu-quoc', '<p>B&iacute; thư Tỉnh uỷ Ki&ecirc;n Giang Nguyễn Thanh Nghị cho biết, để chuẩn bị cho đặc khu Ph&uacute; Quốc đi v&agrave;o hoạt động sau khi QH th&ocirc;ng qua luật Đơn vị h&agrave;nh ch&iacute;nh kinh tế đặc biệt, tỉnh đang chỉ đạo x&acirc;y dựng phương &aacute;n nh&acirc;n sự cho đặc khu ngay trong th&aacute;ng 12 tới.</p>\r\n\r\n<p><img alt=\"\" src=\"http://vinacorp.net/public/uploads/images/13112017/Bi-thu-nguyen-thanh-nghi-len-phuong-an-nhan-su-dac-khu-phu-quoc.jpg\" style=\"height:521px; width:800px\" /></p>\r\n\r\n<p style=\"text-align: center;\">B&iacute; thư Tỉnh uỷ Ki&ecirc;n Giang Nguyễn Thanh Nghị. Ảnh: Phạm Hải</p>\r\n\r\n<p>Giao việc phải k&egrave;m giao quyền</p>\r\n\r\n<p>Theo đ&oacute;, tỉnh đề xuất phương &aacute;n m&ocirc; h&igrave;nh tổ chức bộ m&aacute;y h&agrave;nh ch&iacute;nh của đặc khu<a href=\"http://vietnamnet.vn/dac-khu-tag163447.html\"> </a>theo hướng thiết chế Trưởng đặc khu c&ugrave;ng c&aacute;c cơ quan chuy&ecirc;n m&ocirc;n trực thuộc v&agrave; trưởng Khu h&agrave;nh ch&iacute;nh, kh&ocirc;ng phải l&agrave; một cấp ch&iacute;nh quyền địa phương.</p>\r\n\r\n<p>M&ocirc; h&igrave;nh n&agrave;y kh&ocirc;ng tổ chức HĐND v&agrave; UBND. Đặc khu được chia th&agrave;nh c&aacute;c khu h&agrave;nh ch&iacute;nh (chuyển từ 9 x&atilde;, thị trấn sang th&agrave;nh 9 khu h&agrave;nh ch&iacute;nh).</p>\r\n\r\n<p>C&ugrave;ng với đ&oacute;, thực hiện nhất thể h&oacute;a chức danh B&iacute; thư cấp ủy, đồng thời l&agrave; Trưởng đặc khu. B&iacute; thư cấp ủy cơ sở, đồng thời l&agrave; trưởng khu h&agrave;nh ch&iacute;nh.</p>\r\n\r\n<p>Hợp nhất c&aacute;c cơ quan thuộc huyện ủy, cơ quan chuy&ecirc;n m&ocirc;n thuộc UBND huyện Ph&uacute; Quốc, c&aacute;c ph&ograve;ng, ban chuy&ecirc;n m&ocirc;n thuộc Ban quản l&yacute; Khu kinh tế Ph&uacute; Quốc th&agrave;nh 8 ban chuy&ecirc;n m&ocirc;n trực thuộc Trưởng đặc khu.</p>\r\n\r\n<p>Hợp nhất MTTQ Việt Nam huyện v&agrave; c&aacute;c tổ chức ch&iacute;nh trị - x&atilde; hội th&agrave;nh cơ quan c&oacute; t&ecirc;n gọi l&agrave; MTTQ v&agrave; c&aacute;c đo&agrave;n thể. C&aacute;c đơn vị sự nghiệp c&oacute; Trung t&acirc;m dịch vụ h&agrave;nh ch&iacute;nh c&ocirc;ng v&agrave; Trung t&acirc;m x&uacute;c tiến đầu tư, thương mại, du lịch.</p>\r\n\r\n<p><em>V&igrave; sao tỉnh chọn m&ocirc; h&igrave;nh nhất thể h&oacute;a &aacute;p dụng cho đặc khu Ph&uacute; Quốc, thưa &ocirc;ng?</em></p>\r\n\r\n<p>Về nguy&ecirc;n tắc, th&agrave;nh lập đặc khu Ph&uacute; Quốc phải đặt dưới sự l&atilde;nh đạo, định hướng chiến lược của Đảng, đảm bảo thực hiện c&aacute;c chủ trương, đường lối của Đảng, ph&ugrave; hợp Hiến ph&aacute;p; đảm bảo t&iacute;nh thống nhất của hệ thống ch&iacute;nh trị hiện nay; đồng thời c&oacute; t&iacute;nh đến yếu tố đặc th&ugrave; của đặc khu Ph&uacute; Quốc.</p>\r\n\r\n<p>V&igrave; vậy, trong đề &aacute;n của tỉnh đề xuất nhất thể h&oacute;a một số chức danh; nhất thể h&oacute;a, thu gọn đầu mối bằng c&aacute;ch hợp nhất&nbsp; một số cơ quan Đảng, ch&iacute;nh quyền, MTTQ v&agrave; c&aacute;c tổ chức ch&iacute;nh trị - x&atilde; hội... c&oacute; chức năng, nhiệm vụ, quyền hạn tương đồng để đảm bảo mục ti&ecirc;u x&acirc;y dựng bộ m&aacute;y tinh gọn, hiệu quả.</p>\r\n\r\n<p>C&aacute;c đề xuất n&agrave;y ph&ugrave; hợp với chủ trương tinh gọn, n&acirc;ng cao hiệu lực, hiệu quả hoạt động của bộ m&aacute;y, đ&aacute;p ứng y&ecirc;u cầu l&atilde;nh đạo, chỉ đạo theo m&ocirc; h&igrave;nh đặc khu Ph&uacute; Quốc; ph&ugrave; hợp với chủ trương của Đảng về tinh gọn bộ m&aacute;y như Nghị quyết TƯ 6 kh&oacute;a 12 vừa ban h&agrave;nh.</p>\r\n\r\n<p>Để đảm bảo sự l&atilde;nh đạo của Đảng v&agrave; đ&aacute;p ứng kịp thời c&aacute;c y&ecirc;u cầu xử l&yacute; nhanh c&ocirc;ng việc, nhất thiết bộ m&aacute;y phải tinh gọn, hiệu quả, giảm tối thiểu tầng nấc trung gian.</p>\r\n\r\n<p>Đặc biệt l&agrave; người đứng đầu đặc khu, nếu b&iacute; thư đồng thời l&agrave; Trưởng đặc khu sẽ tập trung đầu mối chỉ đạo, điều h&agrave;nh một c&aacute;ch to&agrave;n diện, trực tiếp; c&oacute; đủ thẩm quyền giải quyết kịp thời, nhanh ch&oacute;ng c&ocirc;ng việc của đặc khu theo nguy&ecirc;n tắc giao việc phải k&egrave;m theo giao quyền.&nbsp;</p>\r\n\r\n<p>Mặt kh&aacute;c, từ năm 2009, khi c&oacute; chủ trương điểm B&iacute; thư cấp ủy đồng thời l&agrave; Chủ tịch UBND cấp huyện, tỉnh Ki&ecirc;n Giang đ&atilde; th&iacute; điểm 4/15 đơn vị, trong đ&oacute; c&oacute; huyện Ph&uacute; Quốc. Qua tổng kết r&uacute;t kinh nghiệm,&nbsp;việc&nbsp;n&agrave;y đ&atilde; đạt được hiệu quả t&iacute;ch cực.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Đi k&egrave;m cơ chế miễn nhiệm, c&aacute;ch chức Trưởng đặc khu</p>\r\n\r\n<p><em>Tuy nhi&ecirc;n, c&oacute; nhiều &yacute; kiến lo ngại, nếu tổ chức theo m&ocirc; h&igrave;nh n&agrave;y, mọi quyền lực tập trung v&agrave;o 1 người dễ dẫn đến t&igrave;nh trạng lạm dụng quyền lực. Vậy l&agrave;m sao, cơ chế n&agrave;o để kiểm so&aacute;t quyền lực khi trao nhiều đặc quyền cho Trưởng đặc khu như vậy?</em></p>\r\n\r\n<p>Để tr&aacute;nh lạm quyền của B&iacute; thư ki&ecirc;m Trưởng đặc khu Ph&uacute; Quốc, cơ chế kiểm so&aacute;t, gi&aacute;m s&aacute;t được x&aacute;c định trong dự thảo luật Đơn vị H&agrave;nh ch&iacute;nh kinh tế đặc biệt cũng như trong đề &aacute;n c&oacute; đề cập.</p>\r\n\r\n<p>Đ&oacute; l&agrave; tăng cường c&ocirc;ng t&aacute;c kiểm tra, gi&aacute;m s&aacute;t v&agrave; c&aacute;c cơ chế kiểm so&aacute;t quyền lực theo quy định của Đảng của cấp ủy đảng cấp tr&ecirc;n đối với cấp ủy đặc khu Ph&uacute; Quốc v&agrave; B&iacute; thư ki&ecirc;m Trưởng đặc khu Ph&uacute; Quốc.</p>\r\n\r\n<p>Đo&agrave;n ĐBQH tỉnh, HĐND tỉnh thực hiện hoạt động gi&aacute;m s&aacute;t, chất vấn theo quy định của ph&aacute;p luật. Theo đ&oacute;, HĐND tỉnh c&oacute; quyền y&ecirc;u cầu Chủ tịch UBND tỉnh b&aacute;o c&aacute;o Thủ tướng miễn nhiệm, c&aacute;ch chức Trưởng đặc khu v&agrave; y&ecirc;u cầu Chủ tịch UBND tỉnh đ&igrave;nh chỉ việc thi h&agrave;nh hoặc b&atilde;i bỏ một phần hoặc to&agrave;n bộ văn bản tr&aacute;i ph&aacute;p luật của Trưởng đặc khu.</p>\r\n\r\n<p>Trưởng đặc khu Ph&uacute; Quốc v&agrave; trưởng khu h&agrave;nh ch&iacute;nh c&ograve;n chịu sự gi&aacute;m s&aacute;t trực tiếp của nh&acirc;n d&acirc;n, MTTQ Việt Nam v&agrave; c&aacute;c tổ chức ch&iacute;nh trị-x&atilde; hội ở đặc khu.</p>\r\n\r\n<p style=\"text-align:center\"><a href=\"http://vinacorp.net/tin-tuc/29/bi-thu-nguyen-thanh-nghi-len-phuong-an-nhan-su-dac-khu-phu-quoc.html\" target=\"_blank\"><img alt=\"\" src=\"http://vinacorp.net/public/uploads/images/13112017/Bi-thu-nguyen-thanh-nghi-len-phuong-an-nhan-su-dac-khu-phu-quoc_2.jpg\" style=\"height:600px; width:957px\" /></a><br />\r\nS&acirc;n bay Ph&uacute; Quốc đ&atilde; được đầu tư trước khi trở th&agrave;nh đặc khu</p>\r\n\r\n<p>Ngo&agrave;i c&aacute;c cơ chế n&ecirc;u tr&ecirc;n, Trưởng đặc khu c&ograve;n chịu sự chỉ đạo, kiểm tra của UBND v&agrave; Chủ tịch UBND tỉnh đối với c&aacute;c lĩnh vực quản l&yacute; của tỉnh kh&ocirc;ng ph&acirc;n quyền, ph&acirc;n cấp hoặc ủy quyền cho Trưởng đặc khu.</p>\r\n\r\n<p>Trưởng đặc khu Ph&uacute; Quốc c&oacute; tr&aacute;ch nhiệm b&aacute;o c&aacute;o với Thủ tướng, c&aacute;c bộ, ng&agrave;nh về việc thực hiện nhiệm vụ, quyền hạn được Thủ tướng v&agrave; c&aacute;c bộ, ng&agrave;nh giao v&agrave; về to&agrave;n bộ hoạt động của đặc khu.</p>\r\n\r\n<p>Với cơ chế kiểm tra, gi&aacute;m s&aacute;t như tr&ecirc;n, cơ bản đảm bảo để B&iacute; thư ki&ecirc;m Trưởng đặc khu Ph&uacute; Quốc thực hiện nhiệm vụ đ&uacute;ng với quy định của Đảng v&agrave; ph&aacute;p luật.</p>\r\n\r\n<p><em>M&ocirc; h&igrave;nh trưởng đặc khu sẽ gi&uacute;p bộ m&aacute;y gọn nhẹ, linh hoạt. Điều n&agrave;y cũng c&oacute; nghĩa bộ m&aacute;y hiện nay sẽ được sắp xếp lại, cắt giảm. Vậy tỉnh đ&atilde; l&ecirc;n phương &aacute;n sắp xếp bộ m&aacute;y v&agrave; nh&acirc;n sự như thế n&agrave;o khi thực hiện đề &aacute;nc?</em></p>\r\n\r\n<p>Đ&acirc;y l&agrave; vấn đề lớn, quan trọng, c&oacute; t&aacute;c động đến tư tưởng, đời sống, việc l&agrave;m đối với c&aacute;n bộ, c&ocirc;ng chức, vi&ecirc;n chức bị ảnh hưởng khi sắp xếp lại. Đề &aacute;n của Ki&ecirc;n Giang đ&atilde; c&oacute; đ&aacute;nh gi&aacute; t&aacute;c động về việc n&agrave;y.</p>\r\n\r\n<p>Tỉnh đ&atilde; chỉ đạo x&acirc;y dựng đề &aacute;n ri&ecirc;ng v&agrave; th&agrave;nh lập ban chỉ đạo để đ&aacute;nh gi&aacute; lại to&agrave;n bộ đội ngũ c&aacute;n bộ, c&ocirc;ng chức, vi&ecirc;n chức của huyện Ph&uacute; Quốc, dựa tr&ecirc;n tr&igrave;nh độ năng lực v&agrave; vị tr&iacute; việc l&agrave;m khi th&agrave;nh lập đặc khu để bố tr&iacute; v&agrave;o từng vị tr&iacute; cho ph&ugrave; hợp.</p>\r\n\r\n<p>Đồng thời c&oacute; kế hoạch đ&agrave;o tạo chuẩn h&oacute;a đ&aacute;p ứng y&ecirc;u cầu c&ocirc;ng việc; chuẩn bị đội ngũ c&aacute;n bộ tăng cường cho đặc khu Ph&uacute; Quốc. Đối với những người kh&ocirc;ng thể đ&aacute;p ứng vị tr&iacute; việc l&agrave;m v&agrave; kh&ocirc;ng thể chuẩn h&oacute;a được th&igrave; thực hiện ch&iacute;nh s&aacute;ch tinh giản theo cơ chế ph&ugrave; hợp, đảm bảo tốt nhất quyền lợi của c&aacute;n bộ, c&ocirc;ng chức, vi&ecirc;n chức.</p>\r\n\r\n<p>Hiện nay, Tỉnh ủy, UBND tỉnh đang chỉ đạo Ban Tổ chức Tỉnh ủy v&agrave; Sở Nội vụ x&acirc;y dựng phương &aacute;n nh&acirc;n sự cho đặc khu Ph&uacute; Quốc. Đ&acirc;y l&agrave; nhiệm vụ quan trọng, phức tạp, kh&oacute; khăn. Dự kiến trong th&aacute;ng 12 n&agrave;y, Tỉnh ủy sẽ xem x&eacute;t v&agrave; cho &yacute; kiến chỉ đạo cụ thể về việc n&agrave;y.</p>\r\n\r\n<p style=\"text-align:right\">Theo Vietnamnet.vn</p>', '2017-11-13 05:44:44', '1510552093.Bi-thu-nguyen-thanh-nghi-len-phuong-an-nhan-su-dac-khu-phu-quoc.jpg', 1, '2017-11-13 08:49:06', 'admin'),
(38, '15 tuổi bỏ học vì quá chán, 3 năm sau chàng trai này thành triệu phú nhờ 403 Bitcoin mua từ tiền bà ngoại cho và quyết bán hết để startup về giáo dục', '15-tuoi-bo-hoc-vi-qua-chan-3-nam-sau-chang-trai-nay-thanh-trieu-phu-nho-403-bitcoin-mua-tu-tien-ba-ngoai-cho-va-quyet-ban-het-de-startup-ve-giao-duc', '<p><img alt=\"\" src=\"http://vinacorp.net/public/uploads/images/erikfinmancolor.png\" style=\"height:471px; width:900px\" /></p>\r\n\r\n<p>Ch&aacute;n gh&eacute;t m&ocirc;i trường gi&aacute;o dục m&ocirc; phạm, Erik đ&aacute;nh cược với cha mẹ rằng m&igrave;nh sẽ l&agrave; triệu ph&uacute; năm 18 tuổi để kh&ocirc;ng phải học Đại học. Bitcoin đ&atilde; gi&uacute;p cậu l&agrave;m điều đ&oacute;. Giờ cậu quyết định b&aacute;n Bitcoin để c&oacute; tiền thực hiện giấc mơ startup. Cậu chuyện của Erik đang nhận được rất nhiều lời t&aacute;n dương tại Mỹ.<br />\r\n<br />\r\n<strong>&nbsp; &nbsp; &nbsp;Cuộc đời đ&oacute;ng sập lại ở tuổi 15 với cậu thiếu ni&ecirc;n ở miền qu&ecirc; bang Idaho</strong><br />\r\n<br />\r\nNăm 2014, tức l&agrave; ở thời điểm 3 năm trước, Erik Finman sống tại tiểu bang Idaho, Mỹ đ&atilde; quyết định bỏ học ở trường trung học v&igrave; cậu thấy rằng việc n&agrave;y thật l&atilde;ng ph&iacute; thời gian v&agrave; chẳng gi&uacute;p mang lại cho cậu ch&uacute;t tự tin n&agrave;o.<br />\r\n<br />\r\nGiống như Thomas Edison, cậu đ&atilde; chọn cho m&igrave;nh h&igrave;nh thức tự gi&aacute;o dục tại nh&agrave;. Nhớ lại, Erik đ&atilde; kể về khoảng thời gian c&oacute; lẽ phải được gọi với từ &#39;kinh khủng&#39; với bất cứ một người học sinh n&agrave;o.<br />\r\nAnh n&oacute;i với b&aacute;o ch&iacute;: &quot;Cuộc sống của t&ocirc;i kh&aacute; l&agrave; &lsquo;trung b&igrave;nh&rsquo; so với c&aacute;c bạn b&egrave; c&ugrave;ng lứa ở v&agrave;o thời điểm đ&oacute;. Cho d&ugrave; t&ocirc;i đ&atilde; cố gắng thế n&agrave;o đi chăng nữa th&igrave; việc học ở trường vẫn mang lại kết quả v&ocirc; &iacute;ch. Điểm của t&ocirc;i vẫn to&agrave;n C v&agrave; t&ocirc;i vẫn sợ n&oacute;i chuyện với c&aacute;c thầy c&ocirc; gi&aacute;o của m&igrave;nh - những người rất hay &lsquo;n&oacute;i ra n&oacute;i v&agrave;o&rsquo; v&agrave; khiến t&ocirc;i nghĩ rằng những điều k&eacute;m cỏi của m&igrave;nh l&agrave; thứ g&igrave; đ&oacute; rất xấu&rdquo;.<br />\r\n<br />\r\n<img alt=\"\" src=\"http://vinacorp.net/public/uploads/images/Tintuc/15092017/15092017-1/1511937706178.jpg\" style=\"height:599px; width:900px\" /><br />\r\n<br />\r\nCậu học sinh Erik Finman - người bị nền gi&aacute;o dục ch&iacute;nh thống &#39;chối bỏ&#39; l&uacute;c 15 tuổi.</p>\r\n\r\n<p>Cậu học sinh tại Idaho thậm ch&iacute; c&ograve;n n&oacute;i rằng một trong những gi&aacute;o vi&ecirc;n c&ograve;n từng ch&ecirc; Erik Finman rằng gi&aacute; trị của cậu sẽ chẳng bao giờ xứng đ&aacute;ng bất cứ điều g&igrave;, v&igrave; thế gi&aacute;o vi&ecirc;n đ&oacute; khuy&ecirc;n cậu nghỉ học v&agrave; n&ecirc;n v&agrave;o l&agrave;m việc ch&acirc;n tay tại McDonald&#39;s.<br />\r\n&quot;L&uacute;c đ&oacute;, t&ocirc;i chỉ biết v&ugrave;i m&igrave;nh v&agrave;o những tr&ograve; chơi Call of Duty hay Grand Theft Auto một c&aacute;ch l&eacute;n l&uacute;t để bố mẹ kh&ocirc;ng ph&aacute;t hiện ra&rdquo; - Erik n&oacute;i. C&oacute; lẽ ch&iacute;nh v&igrave; ngạc nhi&ecirc;n rằng những người thầy, c&ocirc; gi&aacute;o m&agrave; lại n&oacute;i như vậy, cha mẹ Erik đ&atilde; lắng nghe những lời ph&agrave;n n&agrave;n của con m&igrave;nh v&agrave; r&uacute;t Erik ra khỏi trường, cho cậu được tự gi&aacute;o dục tại gia ở miền qu&ecirc; bang Idaho.<br />\r\nBitcoin bỗng chốc biến cậu học sinh bỏ học Erik th&agrave;nh &#39;ng&agrave;i triệu ph&uacute; Finman&#39;<br />\r\nNhững năm học sinh kh&oacute; khăn phải nghỉ học để ở nh&agrave; chẳng kh&aacute;c n&agrave;o Thomas Edison c&oacute; thể đưa Erik Finman tới một cuộc đời kh&ocirc;ng c&oacute; &aacute;nh s&aacute;ng của tri thức v&agrave; đầy vất vả. Thế nhưng, ch&iacute;nh đồng tiền điện tử Bitcoin đ&atilde; biến cậu thiếu ni&ecirc;n 15 tuổi trở th&agrave;nh một triệu ph&uacute; USD ở thời điểm thậm ch&iacute; c&ograve;n sớm hơn cả Edison.<br />\r\nỞ thời điểm nghỉ học, Erik đ&atilde; c&oacute; một m&agrave;n c&aacute; cược nhỏ với bố mẹ m&igrave;nh: Nếu cậu trở th&agrave;nh một triệu ph&uacute; v&agrave;o thời điểm tr&ograve;n 18 tuổi, bố mẹ cậu sẽ kh&ocirc;ng buộc cậu phải đi học Đại học nữa. Với nhiều người, v&agrave;o được Đại học l&agrave; một ước mơ nhưng với một người vốn đ&atilde; ch&aacute;n gh&eacute;t những m&ocirc;i trường gi&aacute;o dục m&ocirc; phạm như Erik, m&agrave;n c&aacute; cược n&agrave;y l&agrave; ho&agrave;n to&agrave;n hợp l&yacute;.<br />\r\nCũng ch&iacute;nh m&agrave;n c&aacute; cược n&agrave;y đ&atilde; gợi cho Erik nhớ lại một m&oacute;n tiền m&agrave; m&igrave;nh đ&atilde; đầu tư &#39;chơi&#39; hồi nhỏ. Số l&agrave; v&agrave;o năm 2011, khi Erik mới 12 tuổi, cậu được b&agrave; ngoại cho một số tiền l&agrave; 1000 USD. Khi đang loay hoay với c&aacute;ch sử dụng m&oacute;n tiền n&agrave;y th&igrave; anh trai Scott c&oacute; khuy&ecirc;n Erik h&atilde;y đầu tư v&agrave;o Bitcoin l&uacute;c đ&oacute; chỉ c&oacute; gi&aacute; 30USD với mỗi 1 đồng.<br />\r\nĐể n&oacute;i th&ecirc;m th&igrave; quả thực, c&aacute;c anh em nh&agrave; Finman đều l&agrave; những đam m&ecirc; c&ocirc;ng nghệ đến hết m&igrave;nh. Erik c&oacute; lần m&ocirc; tả gia đ&igrave;nh m&igrave;nh l&agrave; &#39;phi&ecirc;n bản Elon Musk của nh&agrave; Kardashian (một gia đ&igrave;nh m&agrave; c&aacute;c th&agrave;nh vi&ecirc;n thi nhau để trở n&ecirc;n nổi tiếng trong showbiz Mỹ, tuy nhi&ecirc;n nổi tiếng đều nhờ v&agrave;o scandal). Hồi vụ c&aacute; cược diễn ra, cả 2 anh trai của Erik đều đang l&agrave;m việc trong lĩnh vực c&ocirc;ng nghệ v&agrave; kỹ thuật.</p>', '2017-11-30 00:45:50', '1512002750.1511937706178.jpg', 1, '2017-11-30 10:04:05', 'admin'),
(39, 'Siêu chip Snapdragon 845 phơi bày mọi thông số kỹ thuật \"khủng\"', 'sieu-chip-snapdragon-845-phoi-bay-moi-thong-so-ky-thuat-khung', '<p>Qualcomm sẽ ch&iacute;nh thức tr&igrave;nh l&agrave;ng con chip Snapdragon 845 v&agrave;o cuối năm nay, v&agrave; b&acirc;y giờ h&agrave;ng loạt những th&ocirc;ng số chi tiết đ&atilde; lộ diện.<br />\r\n<br />\r\n<img alt=\"\" src=\"http://vinacorp.net/public/uploads/images/11207/image-techz-1512054706.jpg\" style=\"height:676px; width:900px\" /></p>\r\n\r\n<p>Theo đ&oacute;, vi xử l&yacute; Snapdragon 845 sẽ được chế tạo tr&ecirc;n c&ocirc;ng nghệ 10nm Low Power Early từ TSMC chứ kh&ocirc;ng phải Samsung.<br />\r\nChip mới sẽ sử dụng l&otilde;i Kryo thế hệ thứ 3, với 4 l&otilde;i dựa tr&ecirc;n nền tảng Cortex-A75, c&ugrave;ng 4 l&otilde;i Cortex-A53. Đồ họa cũng được n&acirc;ng cấp l&ecirc;n Adreno 630, gi&uacute;p tối ưu h&oacute;a cho AR v&agrave; VR.<br />\r\n<br />\r\n<img alt=\"\" src=\"http://vinacorp.net/public/uploads/images/11207/image-1512054712-gsmarena_002%20(1).jpg\" style=\"height:399px; width:900px\" /></p>\r\n\r\n<p>Snapdragon 845 c&ograve;n được tin l&agrave; hỗ trợ camera k&eacute;p l&ecirc;n đến 25 MP ở cả mặt trước v&agrave; sau thiết bị. B&ecirc;n cạnh đ&oacute; l&agrave; modem X20 cho tốc độ tải về đến 1.2 Gbps, nhanh hơn con số 1 Gbps tr&ecirc;n Snapdragon 835.<br />\r\nĐược biết, cả LG G7, Samsung Galaxy S9, Galaxy S9+ v&agrave; Xiaomi Mi 7 đều sẽ sử dụng chip Snapdragon 845 mới v&agrave; mạnh mẽ nhất từ Qualcomm.</p>', '2017-12-01 08:06:50', '1512115610.image-techz-1512054706.jpg', 1, '2017-12-01 08:07:29', 'vtquoc');
INSERT INTO `news` (`id`, `title`, `alias`, `description`, `created_at`, `image`, `is_active`, `updated_at`, `user_id`) VALUES
(42, 'Chúng ta cần điện thoại có màn hình tốt theo đúng nghĩa, chứ không phải độ phân giải 4K hay DPI cao ngất ngưởng', 'chung-ta-can-dien-thoai-co-man-hinh-tot-theo-dung-nghia-chu-khong-phai-do-phan-giai-4k-hay-dpi-cao-ngat-nguong', '<p>Cho d&ugrave; c&oacute; những mặt kh&aacute;c biệt về c&ocirc;ng nghệ tr&ecirc;n c&aacute;c tấm nền m&agrave;n h&igrave;nh v&agrave; khả năng nh&igrave;n được c&aacute;c điểm ảnh từ mỗi người d&ugrave;ng th&igrave; những nh&agrave; sản xuất điện thoại vẫn đang thi nhau trong việc tạo ra cho m&igrave;nh chiếc điện thoại c&oacute; độ ph&acirc;n giải cao nhất.<br />\r\n<br />\r\n<img alt=\"\" src=\"http://vinacorp.net/public/uploads/images/11207/1738014.jpg\" style=\"height:669px; width:900px\" /></p>\r\n\r\n<p>Với tấm nền 4K, m&agrave;n h&igrave;nh 5,5 inch của chiếc Sony Xperia XZ Premium c&oacute; mật độ điểm ảnh l&ecirc;n tới 807 PPI, hay một v&iacute; dụ gần đ&acirc;y l&agrave; m&agrave;n h&igrave;nh của chiếc iPhone X cũng c&oacute; mật độ điểm ảnh kh&aacute; cao: 458 PPI. Con số n&agrave;y thực sự g&acirc;y ra nhiều ho&agrave;i nghi.<br />\r\nMật độ điểm ảnh cao kh&ocirc;ng phải l&uacute;c n&agrave;o cũng l&agrave; một lợi thế. Thứ nhất, bạn c&agrave;ng nhồi nh&eacute;t nhiều điểm ảnh v&agrave;o điện thoại, m&agrave;n h&igrave;nh c&agrave;ng sử dụng nhiều năng lượng. Chẳng c&ograve;n c&aacute;ch n&agrave;o kh&aacute;c - c&agrave;ng nhiều điểm ảnh đồng nghĩa với ti&ecirc;u thụ c&agrave;ng nhiều điện năng. Thứ hai, khi vượt qua một mức nhất định, mắt người sẽ kh&ocirc;ng thể nhận thấy được độ chi tiết cao hơn. Tất nhi&ecirc;n nếu bạn c&oacute; tầm nh&igrave;n&nbsp; 20/10, bạn vẫn sẽ nh&igrave;n thấy c&aacute;i điểm ảnh tr&ecirc;n m&agrave;n h&igrave;nh m&agrave; người c&oacute; tầm nh&igrave;n 20/20 kh&ocirc;ng nh&igrave;n thấy được ở khoảng c&aacute;ch nhất định, nhưng vẫn c&oacute; một giới hạn vật l&yacute; về khả năng nh&igrave;n của con người. Kể cả khi bạn c&oacute; đ&ocirc;i mắt ho&agrave;n hảo, th&igrave; tầm nh&igrave;n của ch&uacute;ng ta vẫn bị giới hạn bởi sự nhiễu xạ của con ngươi. 20/8 l&agrave; độ sắc n&eacute;t tối đa, thậm ch&iacute; với những con mắt ho&agrave;n hảo tr&ecirc;n l&yacute; thuyết. Với điều n&agrave;y, sẽ c&oacute; một điểm giới hạn m&agrave; khi nhồi nh&eacute;t th&ecirc;m nhiều điểm ảnh l&ecirc;n m&agrave;n h&igrave;nh hiển thị nữa cũng chẳng c&oacute; nghĩa l&yacute; g&igrave;.</p>\r\n\r\n<p>Thứ ba, c&agrave;ng nhiều điểm ảnh được dồn v&agrave;o một v&ugrave;ng nhất định, th&igrave; c&agrave;ng c&oacute; &iacute;t khoảng trống để đ&egrave;n nền xuy&ecirc;n qua v&agrave; chiếu s&aacute;ng m&agrave;n h&igrave;nh. V&agrave; tất nhi&ecirc;n để giải quyết điều n&agrave;y, ch&uacute;ng ta chỉ c&oacute; 2 giải ph&aacute;p: giảm độ s&aacute;ng hiển thị của m&agrave;n h&igrave;nh, hoặc khiến cho đ&egrave;n nền s&aacute;ng hơn đồng nghĩa với việc đốt th&ecirc;m nhiều điện năng nữa.<br />\r\nMột b&agrave;i viết gần đ&acirc;y tại&nbsp;<em>Android Central&nbsp;</em>của Bob Myers, một kỹ sư v&agrave; nh&agrave; thiết kế m&agrave;n h&igrave;nh hiển thị, đ&atilde; l&agrave;m r&otilde; quan điểm n&agrave;y. &Ocirc;ng lập luận rằng điều ch&uacute;ng ta cần kh&ocirc;ng phải l&agrave; mật độ điểm ảnh d&agrave;y hơn, m&agrave; về cơ bản l&agrave; một m&agrave;n h&igrave;nh hiển thị tốt hơn. C&oacute; nhiều c&aacute;ch để cải tiến m&agrave;n h&igrave;nh LCD hoặc OLED m&agrave; kh&ocirc;ng li&ecirc;n quan g&igrave; tới việc gia tăng PPI. N&oacute; bao gồm tăng độ ch&iacute;nh x&aacute;c của hiển thị m&agrave;u (kh&ocirc;ng phải l&agrave; mở rộng phổ m&agrave;u, điều n&agrave;y khiến cho hiển thị m&agrave;u thiếu ch&iacute;nh x&aacute;c hơn), tăng tỷ lệ tương phản khiến cho m&agrave;n h&igrave;nh dễ nh&igrave;n hơn dưới &aacute;nh s&aacute;ng mặt trời, v&agrave; m&agrave;n h&igrave;nh hiển thị hiệu quả hơn, tương tự như m&agrave;n h&igrave;nh IGZO của Sharp để giảm lượng điện năng ti&ecirc;u thụ ở c&ugrave;ng độ s&aacute;ng.<br />\r\nC&aacute;c nh&agrave; sản xuất v&agrave; người ti&ecirc;u d&ugrave;ng đ&atilde; bấu v&iacute;u v&agrave;o DPI như l&agrave; một c&aacute;ch để n&oacute;i l&ecirc;n &quot;sự mới mẻ&quot; của sản phẩm, nhưng đ&acirc;y n&agrave;y kh&ocirc;ng phải l&agrave; lần đầu ti&ecirc;n sản phẩm ti&ecirc;u d&ugrave;ng thay đổi c&aacute;ch tiếp thị của ch&iacute;nh n&oacute;. Đ&atilde; từng c&oacute; thời gian m&agrave; c&aacute;c m&aacute;y t&iacute;nh được tiếp thị dựa tr&ecirc;n tốc độ xung nhịp. Một v&agrave;i ứng dụng thậm ch&iacute; c&ograve;n tận dụng đến từng thread. Ng&agrave;y nay, người ta tin rằng nhiều l&otilde;i cũng c&oacute; lợi. Đ&atilde; từng c&oacute; l&uacute;c, ch&uacute;ng ta tiếp thị bộ nhớ dựa v&agrave;o d&ugrave;ng lượng chứ kh&ocirc;ng phải tốc độ. Ng&agrave;y nay, dễ nhận thấy c&aacute;c laptop thường nhấn mạnh c&aacute;c th&ocirc;ng số như PCIe SSD 128-512GB so với c&aacute;c HDD c&oacute; dung lượng 4TB hoặc hơn.<br />\r\nCh&uacute;ng ta kh&ocirc;ng cần phải quay về th&aacute;ng ng&agrave;y của những tấm nền 3 inch-320x240. Nhưng đ&atilde; đến l&uacute;c từ bỏ chỉ số DPI cao v&agrave; hướng đến điều g&igrave; đ&oacute; tốt hơn.</p>\r\n\r\n<p>&nbsp;</p>', '2017-12-01 08:27:42', '1512116862.1738015.jpg', 1, '2017-12-01 08:36:27', 'vtquoc'),
(43, 'Bản vá lỗi \"root\" trên macOS của Apple lại gây ra một lỗi mới', 'ban-va-loi-root-tren-macos-cua-apple-lai-gay-ra-mot-loi-moi', '<p>Hồi đầu tuần n&agrave;y, Apple đ&atilde; l&agrave;m người d&ugrave;ng Mac đứng ngồi kh&ocirc;ng y&ecirc;n khi hệ điều h&agrave;nh macOS, vốn được quảng c&aacute;o l&agrave; cực kỳ bảo mật, lại cho ph&eacute;p bất kỳ ai cũng c&oacute; thể đăng nhập hệ thống chỉ bằng c&aacute;ch nhập t&agrave;i khoản &quot;Root&quot; m&agrave; kh&ocirc;ng cần mật m&atilde;.<img alt=\"\" src=\"http://vinacorp.net/public/uploads/images/11207/17384592.jpg\" style=\"height:450px; width:900px\" />​​​​​​</p>\r\n\r\n<p>Theo&nbsp;<em>TheNextWeb</em>, d&ugrave; đ&atilde; nhanh ch&oacute;ng tung ra bản v&aacute; khắc phục lỗ hổng tr&ecirc;n nhưng kh&ocirc;ng may cho T&aacute;o khuyết l&agrave; bản v&aacute; n&agrave;y mới đ&acirc;y lại bị ph&aacute;t hiện đ&atilde; g&acirc;y ra một lỗi mới. Cụ thể, b&aacute;n v&aacute; đ&atilde; khiến cho t&iacute;nh năng chia sẻ tập tin giữa c&aacute;c m&aacute;y t&iacute;nh trong c&ugrave;ng một mạng bị lỗi.<br />\r\nLỗi n&agrave;y đ&atilde; ngăn kh&ocirc;ng cho người d&ugrave;ng x&aacute;c nhận danh t&iacute;nh hoặc kh&ocirc;ng cho kết nối tới dịch vụ chia sẻ tập tin tr&ecirc;n cả mạng c&ocirc;ng ty v&agrave; gia đ&igrave;nh. D&ugrave; đ&acirc;y kh&ocirc;ng phải l&agrave; một lỗi bảo mật nghi&ecirc;m trọng như lỗi &quot;root&quot; vừa qua, nhưng n&oacute; vẫn g&acirc;y bức x&uacute;c đối với những người thường xuy&ecirc;n chia sẻ c&ocirc;ng việc với đồng nghiệp tại nơi l&agrave;m việc, hoặc những người thường xuy&ecirc;n &quot;bắn&quot; tập tin qua lại giữa c&aacute;c m&aacute;y t&iacute;nh kh&aacute;c nhau trong gia đ&igrave;nh.<br />\r\nĐể giải quyết lỗi n&agrave;y, bạn sẽ cần sử dụng chương tr&igrave;nh Terminal:<br />\r\nĐầu ti&ecirc;n bạn mở Terminal l&ecirc;n. Chương tr&igrave;nh n&agrave;y nằm trong thư mục Applications &gt; Utilities, hoặc bạn c&oacute; thể nhấn Cmd+Space v&agrave; g&otilde; Terminal để mở n&oacute; l&ecirc;n<br />\r\nG&otilde; ch&iacute;nh x&aacute;c d&ograve;ng sau:&nbsp;sudo /usr/libexec/configuraLocalKDC&nbsp;v&agrave; nhấn Enter (Return).<br />\r\nNhập mật m&atilde; admin v&agrave; nhấn Enter (Return).<br />\r\nTho&aacute;t chương tr&igrave;nh Terminal.<br />\r\nĐiều n&agrave;y đ&atilde; &iacute;t nhiều ảnh hưởng tới danh tiếng của Apple, h&atilde;ng c&ocirc;ng nghệ vốn được biết tới ở việc chăm ch&uacute;t rất kỹ cho từng sản phẩm của m&igrave;nh, đặc biệt l&agrave; tr&ecirc;n macOS. Gần đ&acirc;y, họ cũng bị người d&ugrave;ng ph&agrave;n n&agrave;n v&igrave; nhiều lỗi thiết kế tr&ecirc;n iOS 11, hay nhiều lỗi kh&aacute;c tr&ecirc;n macOS High Sierra mới ra mắt, trong số đ&oacute; c&oacute; lỗi bộ g&otilde; tiếng Việt khiến nhiều người d&ugrave;ng Việt Nam tỏ ra kh&oacute; chịu.</p>', '2017-12-01 08:44:54', '1512117894.1738459.jpg', 1, '2017-12-01 08:45:34', 'vtquoc'),
(44, 'Google bị kiện bồi thường 3,6 tỷ USD vì bán dữ liệu người dùng iPhone', 'google-bi-kien-boi-thuong-36-ty-usd-vi-ban-du-lieu-nguoi-dung-iphone', '<p>Trong suốt giai đoạn 2011-2012, Google được cho đ&atilde; b&aacute;n dữ liệu của&nbsp;h&agrave;ng triệu&nbsp;người d&ugrave;ng iPhone tr&aacute;i ph&eacute;p. Số tiền bồi thường cho vụ kiện tập thể n&agrave;y c&oacute; thể l&ecirc;n tới 3,6 tỷ USD.</p>\r\n\r\n<p><img alt=\"\" src=\"http://vinacorp.net/public/uploads/images/11207/1738089.jpg\" style=\"height:600px; width:900px\" /></p>\r\n\r\n<p>Theo&nbsp;<em>IBTimes</em>, Google nhiều khả năng sẽ phải đối mặt với khoản tiền bồi thường l&ecirc;n tới 3,6 tỷ USD v&igrave; c&aacute;o buộc b&aacute;n dữ liệu của 5,4 triệu người d&ugrave;ng iPhone tr&aacute;i ph&eacute;p. Ước t&iacute;nh mỗi người d&ugrave;ng bị b&aacute;n dữ liệu sẽ nhận được khoản bồi thường 269 USD, nếu vụ kiện th&agrave;nh c&ocirc;ng.</p>\r\n\r\n<p>Một chiến dịch c&oacute; t&ecirc;n Google You Owe Us vừa được khởi động, quy tụ 5,4 triệu người d&ugrave;ng iPhone mong muốn kiện g&atilde; khổng lồ t&igrave;m kiếm Google v&igrave; l&yacute; do b&iacute; mật thu thập lịch sử duyệt web của người d&ugrave;ng. Theo đ&oacute;, Google đ&atilde; d&ugrave;ng thuật to&aacute;n để &quot;vượt mặt&quot; hệ thống bảo mật tr&ecirc;n iPhone, sau đ&oacute; thu thập tr&aacute;i ph&eacute;p dữ liệu duyệt web tr&ecirc;n Safari.</p>\r\n\r\n<p>Theo điều tra, Google đ&atilde; thu thập dữ liệu từ th&aacute;ng 6/2011 tới th&aacute;ng 2/2012. H&atilde;ng c&ocirc;ng nghệ Mỹ đ&atilde; vi phạm nghi&ecirc;m trọng 4 điều trong luật Bảo vệ dữ liệu của Nghị viện Anh. Nh&oacute;m nguy&ecirc;n đơn khẳng định sẽ đưa vụ việc ra x&eacute;t xử tại T&ograve;a &aacute;n Tối cao v&agrave;o năm 2018.</p>\r\n\r\n<p>Richard Lloyd, một trong những người dẫn đầu chiến dịch khẳng định, đ&acirc;y l&agrave; một h&agrave;nh vi nguy hiểm, t&aacute;c động lớn tới người d&ugrave;ng iPhone v&agrave; một h&agrave;nh động ph&aacute;p &yacute; l&agrave; điều cần thiết ngay l&uacute;c n&agrave;y.</p>\r\n\r\n<p><img alt=\"\" src=\"http://vinacorp.net/public/uploads/images/11207/1738092.jpg\" style=\"height:510px; width:900px\" /></p>\r\n\r\n<p>Lloyd n&oacute;i:&nbsp;<em>&quot;Ch&uacute;ng t&ocirc;i sẽ gửi đi một th&ocirc;ng điệp mạnh mẽ tới Google v&agrave; c&aacute;c c&ocirc;ng ty c&ocirc;ng nghệ kh&aacute;c trong thung lũng Silicon rằng, ch&uacute;ng t&ocirc;i kh&ocirc;ng sợ phải chống lại họ nếu quyền ri&ecirc;ng tư bị x&acirc;m phạm&quot;.</em></p>\r\n\r\n<p>Phản ứng trước chiến dịch tr&ecirc;n, đại diện Google chia sẻ với k&ecirc;nh BBC:&nbsp;<em>&quot;Đ&acirc;y kh&ocirc;ng phải l&agrave; điều lạ, ch&uacute;ng t&ocirc;i từng phải phản biện trong nhiều vụ việc tương tự trước đ&acirc;y. Ch&uacute;ng t&ocirc;i kh&ocirc;ng thấy điều g&igrave; l&agrave; sự thật ở đ&acirc;y v&agrave; sẽ kh&aacute;ng c&aacute;o tới c&ugrave;ng&quot;.</em></p>\r\n\r\n<p>Cũng trong một vụ kiện tương tự v&agrave;o năm 2012, Google từng phải trả khoản bồi thường 22,5 triệu USD cho Ủy ban Thương mại Li&ecirc;n bang Mỹ (FTC).</p>', '2017-12-01 08:51:18', '1512118278.1738086.jpg', 1, '2017-12-01 08:51:18', 'vtquoc'),
(45, 'Xem video “bẻ cong” không gian và thời gian quay từ Sony a7R II', 'xem-video-be-cong-khong-gian-va-thoi-gian-quay-tu-sony-a7r-ii', '<p>Khi xem video n&agrave;y, bạn c&oacute; thể bị cho&aacute;ng ngợp với sự thay đổi li&ecirc;n tục bởi hiện tượng bẻ cong kh&ocirc;ng gian v&agrave; thời gian.</p>\r\n\r\n<p><img alt=\"\" src=\"http://vinacorp.net/public/uploads/images/11207/1738108.jpg\" style=\"width:900px\" /></p>\r\n\r\n<p>Nh&agrave; l&agrave;m phim Kevin McGloughlin v&agrave; nhạc sĩ Max Cooper vừa cho ra mắt một video đặc biệt c&oacute; t&ecirc;n Resynthesis. Video đem tới một &yacute; tưởng thể hiện v&ocirc; c&ugrave;ng đặc biệt khi biến h&oacute;a v&agrave; h&ograve;a trộn t&agrave;i t&igrave;nh giữa kh&ocirc;ng gian v&agrave; thời gian.</p>\r\n\r\n<p>McGloughlin đ&atilde; kh&aacute;m ph&aacute; những &yacute; tưởng độc đ&aacute;o về kh&ocirc;ng gian v&agrave; thời gian bằng c&aacute;ch sử dụng ảnh tĩnh v&agrave; cảnh quay thời gian thực từ chiếc mirroless Sony a7R II.</p>\r\n\r\n<p><img alt=\"\" src=\"http://vinacorp.net/public/uploads/images/11207/11021701/1738102.jpg\" style=\"height:506px; width:900px\" /></p>\r\n\r\n<p><img alt=\"\" src=\"http://vinacorp.net/public/uploads/images/11207/11021701/1738105.jpg\" style=\"height:506px; width:900px\" /></p>\r\n\r\n<p>McGloughlin chia sẻ:&nbsp;<em>&quot;T&ocirc;i hy vọng t&aacute;c phẩm n&agrave;y sẽ tạo ra một chuyến du h&agrave;nh cho người xem, đưa họ băng qua kh&ocirc;ng gian v&agrave; thời gian với cấu tr&uacute;c đa chiều&hellip;&quot;</em></p>\r\n\r\n<p>Theo&nbsp;<em>Petapixel</em>, McGloughlin đ&atilde; chụp h&igrave;nh ảnh v&agrave; quay video tại nhiều địa điểm ở Dublin, Ireland. Trong đ&oacute;, phần lớn hiệu ứng h&igrave;nh ảnh được tạo ra từ những kỹ thuật dựng phim v&agrave; hậu kỳ phức tạp như k&eacute;o d&atilde;n hay ngưng đọng thời gian.</p>', '2017-12-01 09:01:35', '1512118895.1738099.jpg', 1, '2017-12-01 09:01:35', 'vtquoc'),
(46, 'Năm 2023: 75% dữ liệu di động sẽ được sử dụng chỉ để xem... video', 'nam-2023-75-du-lieu-di-dong-se-duoc-su-dung-chi-de-xem-video', '<p><img alt=\"\" src=\"http://vinacorp.net/public/uploads/images/11207/11021701/40117/12_800x450.png\" style=\"height:506px; width:900px\" /><img alt=\"\" src=\"http://vinacorp.net/public/uploads/images/40117/12_800x450.png\" style=\"height:506px; width:900px\" /></p>\r\n\r\n<p><a href=\"https://www.recode.net/2017/12/2/16727468/mobile-video-traffic-broadband-ericsson-video\" rel=\"nofollow\" title=\"link nguồn \" type=\"https://www.recode.net/2017/12/2/16727468/mobile-video-traffic-broadband-ericsson-video\"><span style=\"color:#000000\">Recode</span></a><span style=\"color:#000000\">&nbsp;</span>cho biết: Sẽ c&oacute; đến ba phần tư dữ liệu di động được sử dụng với mục đ&iacute;ch xem video v&agrave;o năm 2023, đ&oacute; l&agrave; b&aacute;o c&aacute;o mới nhất từ c&ocirc;ng ty thiết bị viễn th&ocirc;ng&nbsp;<a href=\"https://www.ericsson.com/en/mobility-report\" rel=\"nofollow\" title=\"hướng dẫn \" type=\"https://www.ericsson.com/en/mobility-report\"><span style=\"color:#000000\">Ericsson</span></a>. Con số n&agrave;y đ&atilde; tăng hơn một nửa so với tổng dung lượng truy cập v&agrave;o video hiện nay.</p>\r\n\r\n<p>N&oacute;i chung, khi c&oacute; nhiều người xem video tr&ecirc;n điện thoại đ&ograve;i hỏi dữ liệu ti&ecirc;u tốn sẽ ng&agrave;y c&agrave;ng nhiều. V&igrave; thế, theo Ericsson v&agrave;o năm 2023 lưu lượng truy cập dữ liệu di động tr&ecirc;n to&agrave;n thế giới sẽ tăng l&ecirc;n 110 ExaBytes trong mỗi th&aacute;ng, tương đương với hơn 118 tỉ Gigabytes.</p>\r\n\r\n<p>Với dung lượng lớn vậy, ch&uacute;ng ta sẽ d&agrave;nh ra tổng thời gian tương ứng với 5.5 triệu năm trong 1 th&aacute;ng để xem video độ ph&acirc;n giải HD. Hơn nữa, con số n&agrave;y c&ograve;n cao gấp 8 lần so với 14 ExaBytes mỗi th&aacute;ng ch&uacute;ng ta sử dụng trong năm 2017.<img alt=\"\" src=\"http://vinacorp.net/public/uploads/images/11207/11021701/40117/10_800x450.png\" style=\"height:506px; width:900px\" /></p>\r\n\r\n<p>Như vậy, với tất cả những dữ liệu ở tr&ecirc;n cho ch&uacute;ng ta &yacute; nghĩa g&igrave;? Điều n&agrave;y tiết lộ rằng trong tương lai v&agrave; ch&iacute;nh x&aacute;c l&agrave; 5 năm nữa, ch&uacute;ng ta sẽ cần đến những g&oacute;i cước dữ liệu lớn hơn rất nhiều.</p>\r\n\r\n<p>Hiện nay, chủ sở hữu điện thoại th&ocirc;ng minh tr&ecirc;n to&agrave;n cầu trung b&igrave;nh c&oacute; nhu cầu sử dụng một lượng dữ liệu Internet khoảng 2.9 GB mỗi th&aacute;ng, từ đ&oacute; g&oacute;i dữ liệu di động sử dụng h&agrave;ng th&aacute;ng sẽ phổ biến từ 2 đến 5 GB.</p>\r\n\r\n<p><img alt=\"\" src=\"http://vinacorp.net/public/uploads/images/11207/11021701/40117/11_800x449.png\" style=\"height:505px; width:900px\" /><img alt=\"\" src=\"http://vinacorp.net/public/uploads/images/40117/10_800x450.png\" style=\"height:506px; width:900px\" /></p>\r\n\r\n<p>Nhưng khi mức sử dụng trung b&igrave;nh tăng l&ecirc;n 17 GB h&agrave;ng th&aacute;ng v&agrave;o năm 2023, sẽ cần c&oacute; một g&oacute;i dữ liệu cao hơn rất nhiều so với những g&oacute;i đang được c&aacute;c nh&agrave; mạng cung cấp trong năm 2017 n&agrave;y.</p>\r\n\r\n<p>C&ugrave;ng với đ&oacute;, khi dung lượng d&ugrave;ng để xem video tr&ecirc;n smartphone nhiều hơn sẽ đồng nghĩa với việc xuất hiện nhiều quảng c&aacute;o hơn tr&ecirc;n thiết bị di động.</p>\r\n\r\n<p><img alt=\"\" src=\"http://vinacorp.net/public/uploads/images/40117/11_800x449.png\" style=\"height:505px; width:900px\" /></p>\r\n\r\n<p>Ngo&agrave;i ra, nhu cầu sử dụng dung lượng cho mạng x&atilde; hội như Facebook cũng đang tăng, nhưng kh&ocirc;ng tăng nhanh như video. Do đ&oacute;, phương tiện truyền th&ocirc;ng x&atilde; hội sẽ chiếm tỷ trọng nhỏ hơn trong việc ti&ecirc;u tốn dữ liệu di động, ứng với khoảng 8% trong năm 2023, trong khi năm 2017 n&agrave;y l&agrave; 12%.</p>', '2017-12-04 08:38:25', '1512376705.12_800x450-300x2001.png', 1, '2017-12-04 08:55:23', 'vtquoc'),
(47, 'Samsung sớm tung điện thoại uốn dẻo Galaxy X nhằm \"phủ đầu\" Apple', 'samsung-som-tung-dien-thoai-uon-deo-galaxy-x-nham-phu-dau-apple', '<p>Một trong những lý do Samsung muốn giới thiệu Galaxy X v&agrave;o năm 2018 l&agrave; &ldquo;ngăn chặn&rdquo; LG sẽ trợ giúp Apple ph&aacute;t h&agrave;nh điện thoại th&ocirc;ng minh c&oacute; thể gập lại đầu ti&ecirc;n tr&ecirc;n thế giới.</p>\r\n\r\n<p>Samsung Galaxy X chắc chắn sẽ là thiết bị thực sự, chúng ta chỉ còn chút nghi ngờ v&ecirc;̀ vi&ecirc;̣c thời gian ch&iacute;nh x&aacute;c &ldquo;người khổng lồ c&ocirc;ng ngh&ecirc;̣ H&agrave;n Quốc&rdquo; sẽ ra mắt điện thoại th&ocirc;ng minh gập lại đầu ti&ecirc;n của m&igrave;nh tr&ecirc;n thị trường. Samsung l&agrave; một trong những c&ocirc;ng ty đầu ti&ecirc;n ra mắt điện thoại th&ocirc;ng minh c&oacute; m&agrave;n h&igrave;nh cong, nhưng Galaxy Round chỉ được bán ở ở một số quốc gia.</p>\r\n\r\n<p><img alt=\"\" src=\"http://vinacorp.net/public/uploads/images/11207/11021701/40117/1512371953-835-1-1512370251-width500height302.jpg\" style=\"height:302px; width:500px\" /><img alt=\"\" src=\"http://vinacorp.net/public/uploads/images/40117/1512371953-835-1-1512370251-width500height302.jpg\" style=\"height:544px; width:900px\" /></p>\r\n\r\n<p>Samsung kh&ocirc;ng phải l&agrave; c&ocirc;ng ty duy nhất tung ra một chiếc điện thoại c&oacute; thể gập lại được, v&igrave; nhiều thương hiệu kh&aacute;c cũng đang l&agrave;m việc tr&ecirc;n c&aacute;c thiết bị tương tự, trong đó có th&ecirc;̉ k&ecirc;̉ đ&ecirc;́n như Apple v&agrave; LG. Tuy nhi&ecirc;n, đ&ocirc;́i với các fan mộ Samsung, đ&acirc;y c&oacute; lẽ sẽ là đầu ti&ecirc;n đặt bàn tay l&ecirc;n tr&ecirc;n một điện thoại th&ocirc;ng minh c&oacute; thể gập lại được.</p>\r\n\r\n<p>Chủ tịch Samsung Ko Dong Jin từng ti&ecirc;́t l&ocirc;̣ trong tháng Ch&iacute;n vừa qua rằng, Samsung c&oacute; kế hoạch tung ra một điện thoại th&ocirc;ng minh c&oacute; thể gập lại v&agrave;o năm 2018. Nguồn tin trong ng&agrave;nh c&ocirc;ng nghiệp m&agrave;n h&igrave;nh hiển thị ti&ecirc;́t l&ocirc;̣ rằng, Samsung Display đ&atilde; ph&aacute;t triển một bảng màn hình c&oacute; thể gập lại với độ cong 1.0R, c&oacute; nghĩa l&agrave; n&oacute; c&oacute; thể được ho&agrave;n to&agrave;n gấp lại b&ecirc;n trong như một tờ giấy.</p>\r\n\r\n<p><img alt=\"\" src=\"http://vinacorp.net/public/uploads/images/40117/1512371953-401-2-1512370251-width500height280.jpg\" style=\"height:504px; width:900px\" /></p>\r\n\r\n<p>Cho đến nay, th&ocirc;ng tin v&ecirc;̀ vi&ecirc;̣c li&ecirc;̣u Samsung sẽ sử dụng vật liệu nhựa để sản xuất m&agrave;n h&igrave;nh c&oacute; thể gập lại được hay kh&ocirc;ng v&acirc;̃n chưa được xác nh&acirc;̣n. Mặc d&ugrave; nh&agrave; sản xuất thiết bị cầm tay H&agrave;n Quốc đ&atilde; &aacute;p dụng cho một số bằng s&aacute;ng chế về c&ocirc;ng nghệ li&ecirc;n quan đến điện thoại th&ocirc;ng minh c&oacute; thể gập lại.</p>\r\n\r\n<p>Một l&yacute; do kh&aacute;c m&agrave; Samsung muốn giới thiệu Galaxy X v&agrave;o năm tới l&agrave; &ldquo;ngăn chặn&rdquo; LG sẽ trợ giúp Apple ph&aacute;t h&agrave;nh điện thoại th&ocirc;ng minh c&oacute; thể gập lại đầu ti&ecirc;n tr&ecirc;n thế giới. Apple gần đ&acirc;y đ&atilde; n&ocirc;̣p bằng s&aacute;ng chế cho iPhone c&oacute; thể gập lại được tại Mỹ, v&agrave; LG Display sẽ l&agrave; c&ocirc;ng ty cung cấp c&aacute;c bảng điều khiển c&oacute; thể gập lại cho thiết bị n&agrave;y.</p>\r\n\r\n<p>Hiện tại, LG Display dự kiến sẽ c&oacute; bảng điều khiển c&oacute; thể gập đầu ti&ecirc;n với độ cong 2.5R v&agrave;o năm 2018, trong khi bảng điều khiển c&oacute; thể gập được với độ cong 1.0R dự kiến sẽ được ho&agrave;n th&agrave;nh v&agrave;o năm 2019. Chúng ta có th&ecirc;̉ kỳ vọng ng&agrave;nh c&ocirc;ng nghiệp màn h&igrave;nh c&oacute; thể gập lại được tr&ecirc;n&nbsp;<a href=\"http://www.24h.com.vn/smartphone-c407e4053.html\" title=\"smartphone\">smartphone</a>&nbsp;sẽ được thương mại h&oacute;a trong v&agrave;i năm tới.</p>', '2017-12-04 08:50:11', '1512377411.1512371953-835-1-1512370251-width500height302.jpg', 1, '2017-12-04 08:51:24', 'vtquoc');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `price` varchar(250) NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `product_id` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `order_detail`
--

INSERT INTO `order_detail` (`id`, `order_id`, `product_name`, `price`, `qty`, `created_at`, `product_id`, `updated_at`) VALUES
(26, 15, 'Bluetooth-LC-980', '200000', 1, '2017-07-31 11:17:30', 58, '2017-07-31 04:17:30'),
(27, 16, 'ASUS A46CA', '7500000', 1, '2017-07-31 22:06:28', 43, '2017-07-31 15:06:28'),
(28, 17, 'SAMSUNG NC108', '2700000', 1, '2017-08-22 15:16:23', 54, '2017-08-22 08:16:23'),
(29, 17, 'DELL INS N5010', '5000000', 3, '2017-08-22 15:16:23', 53, '2017-08-22 08:16:23'),
(30, 17, 'HP ELITEBOOK 8440P', '5200000', 1, '2017-08-22 15:16:24', 45, '2017-08-22 08:16:24'),
(31, 17, 'Dell Latitude E5430', '5200000', 1, '2017-08-22 15:16:24', 49, '2017-08-22 08:16:24'),
(32, 18, 'SAMSUNG NC108', '0', 1, '2017-09-01 22:48:14', 54, '2017-09-01 15:48:14'),
(33, 19, 'SAMSUNG NC108', '0', 1, '2017-09-16 22:21:20', 54, '2017-09-16 15:21:20'),
(34, 20, 'HP PROBOOK 4440S', '4300000', 1, '2017-09-17 17:09:32', 56, '2017-09-17 10:09:32'),
(35, 21, 'Dell INS 3521', '4500000', 1, '2017-11-24 10:19:36', 79, '2017-11-24 03:19:36');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_product`
--

CREATE TABLE `order_product` (
  `id` int(11) NOT NULL,
  `customer` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `address` varchar(250) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `note` text,
  `sendby` varchar(255) NOT NULL,
  `payment` varchar(250) NOT NULL,
  `status` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `order_product`
--

INSERT INTO `order_product` (`id`, `customer`, `price`, `created_at`, `address`, `phone`, `email`, `note`, `sendby`, `payment`, `status`, `updated_at`) VALUES
(15, 'NGUYEN VAN A', '200,000.00', '2017-07-31 11:17:30', '179 HOANG DIEU 2', '0937777638', 'info@vinacorp.net', NULL, 'Gửi hàng theo địa chỉ liên lạc', 'Chuyển khoản', 1, '2017-07-31 04:17:30'),
(16, 'tan', '7,500,000.00', '2017-07-31 22:06:28', 'q4', '123123123', 'tab@ssdff.com', 'mua', 'Gửi hàng theo địa chỉ liên lạc', 'Trả tiền mặt khi nhận hàng', 1, '2017-07-31 15:06:28'),
(17, 'VI', '28,100,000.00', '2017-08-22 15:16:23', 'NA', '999999999', 'VINAMILK@GMAIL.COM', NULL, 'Gửi hàng theo địa chỉ liên lạc', 'Trả tiền mặt khi nhận hàng', 1, '2017-08-22 08:16:23'),
(18, 'Trần Nhật Minh', '0.00', '2017-09-01 22:48:14', 'Thành Phố Hồ Chí Mịn', '0123849585', 'Transky6@gmail.com', NULL, 'Gửi hàng theo địa chỉ liên lạc', 'Trả tiền mặt khi nhận hàng', 1, '2017-09-01 15:48:14'),
(19, 'quanguy', '0.00', '2017-09-16 22:21:20', '3/25/5a1', '0903747235', 'UY@GMALI.COM', NULL, 'Gửi hàng theo địa chỉ liên lạc', 'Trả tiền mặt khi nhận hàng', 1, '2017-09-16 15:21:20'),
(20, 'asjfh', '4,300,000.00', '2017-09-17 17:09:32', 'afhfahjgh', '0915231126', 'asdhsa@gmail.com', 'hsdaf', 'Gửi hàng theo địa chỉ liên lạc', 'Chuyển khoản', 1, '2017-09-17 10:09:32'),
(21, 'tài', '4,500,000.00', '2017-11-24 10:19:36', 'q9', '123456', 'ttfgg@yggggg.com', 'ggfggg', 'Gửi hàng theo địa chỉ liên lạc', 'Trả tiền mặt khi nhận hàng', 1, '2017-11-24 03:19:36');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_image`
--

CREATE TABLE `product_image` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `path` varchar(250) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `product_image`
--

INSERT INTO `product_image` (`id`, `product_id`, `path`, `created_at`, `updated_at`) VALUES
(112, 53, '1501225420.ASUS-K43E-1.jpg', '2017-07-28 07:03:40', '2017-07-28 07:03:40'),
(113, 53, '1501225420.ASUS-K43E-2.jpg', '2017-07-28 07:03:40', '2017-07-28 07:03:40'),
(114, 53, '1501225420.ASUS-K43E-3.jpg', '2017-07-28 07:03:40', '2017-07-28 07:03:40'),
(115, 54, '1501225789.HP-8440P-1.jpg', '2017-07-28 07:09:49', '2017-07-28 07:09:49'),
(116, 54, '1501225789.HP-8440P-2.jpg', '2017-07-28 07:09:49', '2017-07-28 07:09:49'),
(117, 54, '1501225789.HP-8440P-3.jpg', '2017-07-28 07:09:49', '2017-07-28 07:09:49'),
(124, 57, '1501226844.Dell-Latitude-E6430-1.jpg', '2017-07-28 07:27:24', '2017-07-28 07:27:24'),
(125, 57, '1501226844.Dell-Latitude-E6430-2.jpg', '2017-07-28 07:27:24', '2017-07-28 07:27:24'),
(126, 57, '1501226844.Dell-Latitude-E6430-3.jpg', '2017-07-28 07:27:24', '2017-07-28 07:27:24'),
(127, 57, '1501226844.Dell-Latitude-E6430-4.jpg', '2017-07-28 07:27:24', '2017-07-28 07:27:24'),
(128, 58, '1501227157.Dell Latitude E5430-1.jpg', '2017-07-28 07:32:37', '2017-07-28 07:32:37'),
(129, 58, '1501227157.Dell Latitude E5430-2.jpg', '2017-07-28 07:32:37', '2017-07-28 07:32:37'),
(130, 58, '1501227157.Dell Latitude E5430-3.jpg', '2017-07-28 07:32:37', '2017-07-28 07:32:37'),
(138, 61, '1501227980.Lenovo G50 - 80-1.jpg', '2017-07-28 07:46:20', '2017-07-28 07:46:20'),
(139, 61, '1501227980.Lenovo G50 - 80-2.jpeg', '2017-07-28 07:46:20', '2017-07-28 07:46:20'),
(140, 61, '1501227981.Lenovo G50 - 80-4.jpeg', '2017-07-28 07:46:21', '2017-07-28 07:46:21'),
(141, 61, '1501227981.Lenovo-G50-80-3.jpg', '2017-07-28 07:46:21', '2017-07-28 07:46:21'),
(142, 62, '1501229096.DELL INS N5010-1.jpg', '2017-07-28 08:04:56', '2017-07-28 08:04:56'),
(143, 62, '1501229096.DELL INS N5010-2.jpg', '2017-07-28 08:04:56', '2017-07-28 08:04:56'),
(144, 62, '1501229096.DELL INS N5010-3.jpg', '2017-07-28 08:04:56', '2017-07-28 08:04:56'),
(170, 70, '1508311234.473_3146569_04d101d7f8d440ffa7f681a08e933d03.JPG', '2017-10-18 07:20:34', '2017-10-18 07:20:34'),
(171, 70, '1508311234.473_3146574_857d057934c456056c4787fd65dfd347.JPG', '2017-10-18 07:20:34', '2017-10-18 07:20:34'),
(172, 70, '1508311234.473_3146611_73483031382486458efca4e296e51733.JPG', '2017-10-18 07:20:34', '2017-10-18 07:20:34'),
(173, 71, '1508311830.2302_1385432864sony_vpcel25eg_1.jpg', '2017-10-18 07:30:30', '2017-10-18 07:30:30'),
(174, 71, '1508311830.2302_1385432864sony_vpcel25eg_2.jpg', '2017-10-18 07:30:30', '2017-10-18 07:30:30'),
(175, 71, '1508311830.2302_1385432864sony_vpcel25eg_3.jpg', '2017-10-18 07:30:30', '2017-10-18 07:30:30'),
(176, 71, '1508311830.2302_1385432864sony_vpcel25eg_4.jpg', '2017-10-18 07:30:30', '2017-10-18 07:30:30'),
(181, 73, '1508313103.dell_vostro_2421_1.JPG', '2017-10-18 07:51:43', '2017-10-18 07:51:43'),
(182, 73, '1508313103.dell_vostro_2421_2.jpg', '2017-10-18 07:51:43', '2017-10-18 07:51:43'),
(183, 73, '1508313103.dell_vostro_2421_3.jpg', '2017-10-18 07:51:43', '2017-10-18 07:51:43'),
(184, 73, '1508313103.dell_vostro_2421_4.jpg', '2017-10-18 07:51:43', '2017-10-18 07:51:43'),
(185, 74, '1508313606.2-475.jpg', '2017-10-18 08:00:06', '2017-10-18 08:00:06'),
(186, 74, '1508313606.2420.jpg', '2017-10-18 08:00:06', '2017-10-18 08:00:06'),
(187, 74, '1508313606.dell-vostro-2420-925666802s.jpg', '2017-10-18 08:00:06', '2017-10-18 08:00:06'),
(188, 75, '1508314008.201409051906562637_1-asus.jpg', '2017-10-18 08:06:48', '2017-10-18 08:06:48'),
(189, 75, '1508314008.201409051906565601_3-asus.jpg', '2017-10-18 08:06:48', '2017-10-18 08:06:48'),
(190, 75, '1508314008.201409051906567161_4-asus.jpg', '2017-10-18 08:06:48', '2017-10-18 08:06:48'),
(199, 78, '1510121287.4752_1.jpg', '2017-11-08 06:08:07', '2017-11-08 06:08:07'),
(200, 78, '1510121288.4752_2.jpg', '2017-11-08 06:08:08', '2017-11-08 06:08:08'),
(201, 78, '1510121288.4752_3.jpg', '2017-11-08 06:08:08', '2017-11-08 06:08:08'),
(202, 79, '1510121615.N5050_1.jpg', '2017-11-08 06:13:35', '2017-11-08 06:13:35'),
(203, 79, '1510121615.N5050_2.jpg', '2017-11-08 06:13:35', '2017-11-08 06:13:35'),
(204, 79, '1510121615.N5050_3.jpg', '2017-11-08 06:13:35', '2017-11-08 06:13:35'),
(205, 80, '1510144797.N4030_1.jpg', '2017-11-08 12:39:57', '2017-11-08 12:39:57'),
(206, 80, '1510144797.N4030_2.jpg', '2017-11-08 12:39:57', '2017-11-08 12:39:57'),
(207, 80, '1510144797.N4030_3.jpg', '2017-11-08 12:39:57', '2017-11-08 12:39:57'),
(211, 82, '1510146072.Dell Vostro 3559_1.jpg', '2017-11-08 13:01:12', '2017-11-08 13:01:12'),
(212, 82, '1510146072.Dell Vostro 3559_2.jpg', '2017-11-08 13:01:12', '2017-11-08 13:01:12'),
(213, 82, '1510146072.Dell Vostro 3559_3.jpg', '2017-11-08 13:01:12', '2017-11-08 13:01:12'),
(214, 83, '1510146313.Dell Vostro 3559_1.jpg', '2017-11-08 13:05:13', '2017-11-08 13:05:13'),
(215, 83, '1510146313.Dell Vostro 3559_2.jpg', '2017-11-08 13:05:13', '2017-11-08 13:05:13'),
(216, 83, '1510146314.Dell Vostro 3559_3.jpg', '2017-11-08 13:05:14', '2017-11-08 13:05:14'),
(217, 84, '1510146579.Dell INS 1464_1.jpg', '2017-11-08 13:09:39', '2017-11-08 13:09:39'),
(218, 84, '1510146579.Dell INS 1464_2.JPG', '2017-11-08 13:09:39', '2017-11-08 13:09:39'),
(219, 84, '1510146579.Dell INS 1464_3.jpg', '2017-11-08 13:09:39', '2017-11-08 13:09:39'),
(220, 85, '1510146828.Acer Aspire E15_1.jpg', '2017-11-08 13:13:48', '2017-11-08 13:13:48'),
(221, 85, '1510146828.Acer Aspire E15_2.jpg', '2017-11-08 13:13:48', '2017-11-08 13:13:48'),
(222, 85, '1510146828.Acer Aspire E15_3.jpg', '2017-11-08 13:13:48', '2017-11-08 13:13:48'),
(223, 86, '1510147408.Dell INS 3420_1.jpg', '2017-11-08 13:23:28', '2017-11-08 13:23:28'),
(224, 86, '1510147408.Dell INS 3420_2.png', '2017-11-08 13:23:28', '2017-11-08 13:23:28'),
(225, 86, '1510147408.Dell INS 3420_3.jpg', '2017-11-08 13:23:28', '2017-11-08 13:23:28'),
(226, 87, '1510148111.HP 8440W_1.jpg', '2017-11-08 13:35:11', '2017-11-08 13:35:11'),
(227, 87, '1510148111.HP 8440W_2.jpg', '2017-11-08 13:35:11', '2017-11-08 13:35:11'),
(228, 87, '1510148111.HP 8440W_3.jpg', '2017-11-08 13:35:11', '2017-11-08 13:35:11'),
(229, 88, '1510148380.Dell INS 3521_1.jpg', '2017-11-08 13:39:40', '2017-11-08 13:39:40'),
(230, 88, '1510148380.Dell INS 3521_2.jpg', '2017-11-08 13:39:40', '2017-11-08 13:39:40'),
(231, 88, '1510148380.Dell INS 3521_3.jpg', '2017-11-08 13:39:40', '2017-11-08 13:39:40'),
(232, 89, '1510148937.ACER V3 - 571G_1.jpg', '2017-11-08 13:48:57', '2017-11-08 13:48:57'),
(233, 89, '1510148937.ACER V3 - 571G_2.jpg', '2017-11-08 13:48:57', '2017-11-08 13:48:57'),
(234, 89, '1510148937.ACER V3 - 571G_3.jpg', '2017-11-08 13:48:57', '2017-11-08 13:48:57'),
(235, 90, '1510816030.iphone-6-gold.jpg', '2017-11-16 07:07:10', '2017-11-16 07:07:10'),
(236, 90, '1510816030.iphone-6s-plus-rose.jpg', '2017-11-16 07:07:10', '2017-11-16 07:07:10'),
(237, 91, '1510816884.ip7color.PNG', '2017-11-16 07:21:24', '2017-11-16 07:21:24'),
(238, 91, '1510816884.ip7gold_2.jpg', '2017-11-16 07:21:24', '2017-11-16 07:21:24'),
(239, 91, '1510816884.iphone7rosegold.JPG', '2017-11-16 07:21:24', '2017-11-16 07:21:24'),
(240, 92, '1510817552.iPhone 6 64GB.png', '2017-11-16 07:32:32', '2017-11-16 07:32:32'),
(241, 92, '1510817552.iPhone 6-Blac.jpg', '2017-11-16 07:32:32', '2017-11-16 07:32:32'),
(242, 91, '1510818089.ip7black.jpg', '2017-11-16 07:41:29', '2017-11-16 07:41:29'),
(243, 81, '1512134394.Dell_INS_5420_1.jpg', '2017-12-01 13:19:54', '2017-12-01 13:19:54'),
(244, 81, '1512134521.Dell_INS_5420_2.jpg', '2017-12-01 13:22:01', '2017-12-01 13:22:01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_option`
--

CREATE TABLE `product_option` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `sumary` text NOT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `category_alias` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `value` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `collection_at` int(11) DEFAULT NULL,
  `salestop_salesoff` varchar(255) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `product_option`
--

INSERT INTO `product_option` (`id`, `product_id`, `name`, `sumary`, `alias`, `category_alias`, `image`, `value`, `user_id`, `created_at`, `updated_at`, `collection_at`, `salestop_salesoff`) VALUES
(44, 53, 'ASUS K43E', '<p>- Intel Core i3 2310M 2.1GHZ<br />\r\n- Ram: 4GB DDR3 1600MHz<br />\r\n- HDD: 500GB SATA<br />\r\n- NVIDIA Geforce GT520M<br />\r\n- LCD: 14 inch HD LED<br />\r\n- DVD: RW<br />\r\n- Webcam: 1.3 Megapixels<br />\r\n- HDMI, E-SATA, VGA, USB 2.0 v&agrave; 3.0, Ethernet (LAN), Card-Reader<br />\r\n- Pin: 6 cells.</p>', 'asus-k43e.html', 'asus', '1501225420.ASUS-K43E-2.jpg', 3500000, 'admin', '2017-07-28 07:04:08', '2017-11-08 06:29:58', 2, '2'),
(45, 54, 'HP ELITEBOOK 8440P', '<p>- Core i5 M520 2.4GHz<br />\r\n&nbsp;- Ram 4G/1333<br />\r\n&nbsp;- HDD WD 500G 7200<br />\r\n&nbsp;- Card m&agrave;n h&igrave;nh Nvidia NVS 3100M<br />\r\n&nbsp;- DVD DW, Vga out, Display port . esata, WIFI chuan N<br />\r\n&nbsp;- M&agrave;n h&igrave;nh 14 inch HD LED chống ch&oacute;i.<br />\r\n&nbsp;- Pin 6 Cell</p>', 'hp-elitebook-8440p.html', 'hp', '1501225789.HP-8440P-3.jpg', 4100000, 'admin', '2017-07-28 07:10:14', '2017-11-08 13:24:47', 2, '2'),
(48, 57, 'Dell Latitude E6430', '<p>&#39;- Core i5 - 3320M - 2.6GHZ<br />\r\n- RAM 4 GB/1600 MHz<br />\r\n- HDD : 500 GB<br />\r\n- LCD : 14inch<br />\r\n- Intel HD Graphics 4000<br />\r\n- DVD: RW (đọc, ghi dữ liệu)<br />\r\n- Webcam HD webcam<br />\r\n- Pin Li-Ion 6 cell<br />\r\n- Trọng lượng 2.25</p>', 'dell-latitude-e6430.html', 'dell', '1501226844.Dell-Latitude-E6430-1.jpg', 5500000, 'admin', '2017-07-28 07:27:50', '2017-07-28 07:27:50', 2, '1'),
(49, 58, 'Dell Latitude E5430', '<p>- Core i5 - 3320M - 2.6GHZ<br />\r\n- RAM 4 GB/1600 MHz<br />\r\n- HDD : 500 GB<br />\r\n- LCD : 14inch<br />\r\n- Intel HD Graphics 4000<br />\r\n- DVD: RW (đọc, ghi dữ liệu)<br />\r\n- Webcam HD webcam<br />\r\n- Pin Li-Ion 6 cell<br />\r\n- Trọng lượng 2.25</p>', 'dell-latitude-e5430.html', 'dell', '1501227157.Dell Latitude E5430-1.jpg', 5200000, 'admin', '2017-07-28 07:33:06', '2017-07-28 07:33:06', 2, '1'),
(52, 61, 'LENOVO G50-80', '<p>- Core i5 - 5200U (2.2 Ghz - 2.7 GHZ)<br />\r\n- RAM: 4GB-DDR3<br />\r\n- Dung lượng RAM : 4 GB/1600 Mhz<br />\r\n- HDD: 500 GB<br />\r\n- Intel HD Graphics 5500<br />\r\n- Card đồ họa AMD Radeon R5 M330<br />\r\n-&nbsp; LCD: 15.6 inch (Độ ph&acirc;n giải: 1366 x 768 pixels, HD LED<br />\r\n- DVD +/- RW<br />\r\n- Cổng giao tiếp: 2xUSB3.0,1xUSB2.0,LAN,HDMI,VGA,Headphone,Microphone<br />\r\n- LAN 10/100/1000Mbps<br />\r\n- Chuẩn Wi-Fi 802.11 b/g/n, Bluetooth v4.0<br />\r\n- PIN Li-ion 6 cell<br />\r\n- Trọng lượng 1.8 Kg</p>', 'lenovo-g50-80.html', 'lenovo', '1501227980.Lenovo G50 - 80-1.jpg', 7000000, 'admin', '2017-07-28 07:46:52', '2017-12-06 23:47:27', 2, '2'),
(53, 62, 'DELL INS N5010', '<p>- Core i5 - M480 - 2.67Ghz<br />\r\n- RAM: 4GB - DDR3 - 1600Mhz<br />\r\n- HDD: 500GB<br />\r\n- M&agrave;n h&igrave;nh: 14inch<br />\r\n- Đồ họa:Intel HD Graphics<br />\r\n- Khe đọc thẻ nhớ SD, SDXC, SDHC<br />\r\n- DVD +/- RW<br />\r\n- Webcam HD webcam<br />\r\n- Pin Li-Ion 6 cell<br />\r\n- Trọng lượng 2.25<br />\r\n- V&otilde; nh&ocirc;m cao cấp v&agrave; sang trọng.</p>', 'dell-ins-n5010.html', 'dell', '1501229096.DELL INS N5010-2.jpg', 4500000, 'admin', '2017-07-28 08:05:30', '2017-08-28 09:43:28', 2, '2'),
(61, 70, 'Lenovo  Thinkpad T430s', '<p>Lenovo T430s</p>\r\n\r\n<p>- CPU: Intel Core i5 - 3320M -2.6GHZ<br />\r\n- Ram: 4GB<br />\r\n- HDD: 500GB<br />\r\n- Intel HD Graphics 4000<br />\r\n- LCD:&nbsp;14 inch<br />\r\n- Thời lượng pin: &ge; 2 giờ<br />\r\n- Trọng lượng: &le; 1.8kg<br />\r\n- D&ograve;ng m&aacute;y: Ultrabook</p>', 'lenovo-thinkpad-t430s.html', 'lenovo', '1508311234.473_3146569_04d101d7f8d440ffa7f681a08e933d03.JPG', 5900000, 'anhthy', '2017-10-18 07:23:42', '2017-10-18 07:24:52', 2, '2'),
(62, 71, 'Sony Vaio VPCEL', '<p>Sony Vaio VPCEL</p>\r\n\r\n<p>- CPU: AMD - E450 (1.60GHZ)</p>\r\n\r\n<p>- VGA: Intel HD Graphic</p>\r\n\r\n<p>- RAM: 4GB</p>\r\n\r\n<p>- HDD: 1TB</p>\r\n\r\n<p>- DVD: DVD RW</p>\r\n\r\n<p>- LCD: 15.6 Inch</p>', 'sony-vaio-vpcel.html', 'sony-vaio', '1508311830.2302_1385432864sony_vpcel25eg_1.jpg', 4000000, 'anhthy', '2017-10-18 07:30:47', '2017-11-08 13:19:31', 2, '2'),
(64, 73, 'Dell Vostro 2421', '<p>Dell Vostro 2421</p>\r\n\r\n<p>- CPU: i3 - 3217U - 1.8GHZ</p>\r\n\r\n<p>- VGA: Intel HD Graphic 4000</p>\r\n\r\n<p>- RAM: 4GB</p>\r\n\r\n<p>- HDD: 500GB</p>\r\n\r\n<p>- DVD: DVD RW</p>\r\n\r\n<p>- LCD: 14 Inch</p>', 'dell-vostro-2421.html', 'dell', '1508313103.dell_vostro_2421_3.jpg', 4500000, 'anhthy', '2017-10-18 07:52:11', '2017-11-08 12:47:04', 2, '2'),
(65, 74, 'Dell Vostro 2420', '<p>- CPU: i5 - 3230M - 2.6GHZ</p>\r\n\r\n<p>- VGA: Intel HD Graphic 4000 +&nbsp;INVIDIA GEFORCE GT 620M</p>\r\n\r\n<p>- RAM: 4GB</p>\r\n\r\n<p>- HDD: 500GB</p>\r\n\r\n<p>- DVD: DVD RW</p>\r\n\r\n<p>- LCD: 14 inch</p>', 'dell-vostro-2420.html', 'dell', '1508313606.2-475.jpg', 6000000, 'anhthy', '2017-10-18 08:00:51', '2017-11-18 03:20:46', 2, '2'),
(66, 75, 'Asus TP550L', '<p>Asus TP550L</p>\r\n\r\n<p>- CPU: i3 - 4030U</p>\r\n\r\n<p>- VGA: Intel HD Graphic FAMILY</p>\r\n\r\n<p>- RAM: 4GB</p>\r\n\r\n<p>- HDD: 1TB</p>\r\n\r\n<p>- DVD: DVD RW</p>\r\n\r\n<p>- LCD: 15.6 Inch</p>', 'asus-tp550l.html', 'asus', '1508314008.201409051906565601_3-asus.jpg', 6000000, 'anhthy', '2017-10-18 08:07:22', '2017-10-18 08:12:10', 2, '2'),
(69, 78, 'Acer Aspire 4752', '<p>- CPU: Intel Core i3-2350 (2.3Ghz)</p>\r\n\r\n<p>- VGA: Intel HD Graphic 3000</p>\r\n\r\n<p>- RAM: 4GB</p>\r\n\r\n<p>- HDD: 500G</p>\r\n\r\n<p>- DVD: DVD RW</p>\r\n\r\n<p>- LCD: 14.0 Inch</p>', 'acer-aspire-4752.html', 'acer', '1510121287.4752_1.jpg', 3700000, 'admin', '2017-11-08 06:09:01', '2017-12-29 08:03:43', 2, '2'),
(70, 79, 'Dell INS N5050', '<p>CPU: Intel Core i3-2430 (2.4Ghz)</p>\r\n\r\n<p>- VGA: Intel HD Graphic 3000</p>\r\n\r\n<p>- RAM: 4GB</p>\r\n\r\n<p>- HDD: 500G</p>\r\n\r\n<p>- DVD: DVD RW</p>\r\n\r\n<p>- LCD: 15.6 Inch</p>', 'dell-ins-n5050.html', 'dell', '1510121615.N5050_1.jpg', 5000000, 'admin', '2017-11-08 06:14:43', '2017-11-08 06:14:43', 2, '1'),
(71, 80, 'Dell INS N4030', '<p>- CPU: Intel Core i3-M370 (2.4 Ghz)<br />\r\n-&nbsp; RAM: 2G/1333<br />\r\n- HDD 250G/5400rpm<br />\r\n- Intel HD Graphics<br />\r\n- M&agrave;n h&igrave;nh: 14.0 inch HD LED<br />\r\n- DVD RW<br />\r\n- Pin 6 Cell.</p>', 'dell-ins-n4030.html', 'dell', '1510144797.N4030_1.jpg', 3200000, 'admin', '2017-11-08 12:42:26', '2017-11-08 12:42:26', 2, '1'),
(72, 81, 'Dell INS 5420', '<p>- CPU: Intel Core i7-3632QM (2.2Ghz)/<br />\r\n- RAM: 8GB/1600<br />\r\n- HDD 1TB/5400 rpm<br />\r\n- Intel HD Graphics 4000 +&nbsp;NVIDIA GeForce GT 630M (2G)<br />\r\n- M&agrave;n h&igrave;nh: 14.0 inch 1366 x 768 pixels<br />\r\n- DVD-RW<br />\r\n- Pin 6 Cell.</p>', 'dell-ins-5420.html', 'dell', '1512134394.Dell_INS_5420_1.jpg', 7200000, 'admin', '2017-11-08 12:56:09', '2017-12-29 08:07:37', 2, '2'),
(73, 82, 'Dell Vostro 3559/AMD Radeon R5 M315', '<p>- CPU: Intel Core i5-6200U (2.30Ghz)<br />\r\n- RAM: 4G/PC3L-1600<br />\r\n- HDD 500G/5400 rpm<br />\r\n- Intel HD Graphics 520 + AMD Radeon R5 M315<br />\r\n- M&agrave;n h&igrave;nh: 15.6 inch HD LED<br />\r\n- DVD-RW<br />\r\n- Pin 6 Cell.</p>', 'dell-vostro-3559amd-radeon-r5-m315.html', 'dell', '1510146072.Dell Vostro 3559_1.jpg', 10500000, 'admin', '2017-11-08 13:02:23', '2017-11-08 13:03:32', 2, '2'),
(74, 83, 'Dell Vostro 3559', '<p>- CPU: Intel Core i5-6200U (2.30Ghz)<br />\r\n- RAM: 8G/1600-PC3L<br />\r\n- HDD 1TB/5400 rpm<br />\r\n- Intel HD Graphics 520<br />\r\n- M&agrave;n h&igrave;nh: 15.6 inch HD LED<br />\r\n- DVD-RW<br />\r\n- Pin 6 Cell.</p>', 'dell-vostro-3559.html', 'dell', '1510146313.Dell Vostro 3559_1.jpg', 10000000, 'admin', '2017-11-08 13:06:01', '2017-11-23 10:03:08', 2, '2'),
(75, 84, 'Dell INS 1464', '<p>- CPU:&nbsp; Intel Core i3-M330 (2.13Ghz)<br />\r\n- RAM: 2G/1333<br />\r\n- HDD 250G/5400 rpm<br />\r\n- Intel HD Graphics 14.0 inch HD LED<br />\r\n- DVD-RW<br />\r\n- Pin 6 Cell.</p>', 'dell-ins-1464.html', 'dell', '1510146579.Dell INS 1464_1.jpg', 3500000, 'admin', '2017-11-08 13:10:07', '2017-11-08 13:10:07', 2, '1'),
(76, 85, 'Acer Aspire E15 E5 - 573 - 35YX', '<p>- CPU: Intel Core i3-4005U (1.7Ghz)<br />\r\n- RAM: 4G/1600<br />\r\n- HDD 500G/5400rpm<br />\r\n- Intel HD Graphics 4400<br />\r\n- M&agrave;n h&igrave;nh: 14.0 inch HD LED<br />\r\n- DVD-RW<br />\r\n- Pin 6 Cell.</p>', 'acer-aspire-e15-e5-573-35yx.html', 'acer', '1510146828.Acer Aspire E15_1.jpg', 5000000, 'admin', '2017-11-08 13:14:15', '2017-11-08 13:14:15', 2, '1'),
(77, 86, 'Dell INS 3420', '<p>- CPU: Intel i5-3230 (2.60Ghz)<br />\r\n- RAM: 4G/1600<br />\r\n- HDD 500G/5400rpm<br />\r\n- Intel HD Graphics 4000<br />\r\n- M&agrave;n h&igrave;nh: 14.0 inch HD LED<br />\r\n- DVD-RW<br />\r\n- Pin 6 Cell.</p>', 'dell-ins-3420.html', 'dell', '1510147408.Dell INS 3420_1.jpg', 6000000, 'admin', '2017-11-08 13:23:59', '2017-11-08 13:23:59', 2, '1'),
(78, 87, 'HP 8440W/i7-4G-500G', '<p>- CP: Intel i7-M640 (2.80Ghz)<br />\r\n- RAM: 4G/1333<br />\r\n- HDD 500G/5400 rpm<br />\r\n- Nvidia GeForce GTX 860M<br />\r\n- M&agrave;n h&igrave;nh: 14.0 inch HD LED<br />\r\n- DVD-RW<br />\r\n-&nbsp; Pin 6 Cell.</p>', 'hp-8440wi7-4g-500g.html', 'hp', '1510148111.HP 8440W_1.jpg', 5800000, 'admin', '2017-11-08 13:36:22', '2017-11-08 13:36:22', 0, '0'),
(79, 88, 'Dell INS 3521', '<p>- CPU: Intel i3-3217U (1.80Ghz)<br />\r\n- RAM: 4G/1600<br />\r\n- HDD 500G/5400 rpm<br />\r\n- Intel HD Graphics 4000<br />\r\n- M&agrave;n h&igrave;nh: 15.6 inch HD LED<br />\r\n- DVD-RW<br />\r\n- Pin 6 Cell.</p>', 'dell-ins-3521.html', 'dell', '1510148380.Dell INS 3521_1.jpg', 4500000, 'admin', '2017-11-08 13:40:10', '2017-11-13 14:05:24', 2, '2'),
(80, 89, 'ACER V3 - 571G', '<p>- CPU: Intel i5-3230M (2.60Ghz)<br />\r\n- RAM: 4G/1333<br />\r\n- HDD 500G/5400 rpm<br />\r\n- Intel HD Graphics 4000 + NVIDIA Geforce 710M (2G)<br />\r\n- M&agrave;n h&igrave;nh: 15.6 inch HD LED<br />\r\n- DVD-RW<br />\r\n- Pin 6 Cell.</p>', 'acer-v3-571g.html', 'acer', '1510148937.ACER V3 - 571G_1.jpg', 5200000, 'admin', '2017-11-08 13:49:28', '2017-11-08 13:49:28', 2, '1'),
(81, 90, 'Iphone 6S Plus 16GB Gold/Rose', '<p>H&agrave;ng chưa Active Mới 100%<br />\r\nM&agrave;n h&igrave;nh:5.5&rdquo; Retina HD, 1.080 x 1.920 pixel<br />\r\nCPU: A9, kiến tr&uacute;c 64-bit, cảm biến chuyển động M9<br />\r\nRAM: 2GB<br />\r\nHệ điều h&agrave;nh: iOS 9.0<br />\r\nCamera ch&iacute;nh: 12.0 MP, Quay phim 4k<br />\r\nCamera phụ: 5.0 MP<br />\r\nBộ nhớ trong: 16GB<br />\r\nThẻ nhớ ngo&agrave;i: Kh&ocirc;ng<br />\r\nDung lượng pin:&nbsp; Li-Po 2750 mAh<br />\r\nBảo h&agrave;nh:&nbsp; 01 năm/ H&agrave;ng NK/ 1 đổi 1 trong v&ograve;ng 3 ng&agrave;y do lỗi sản xuất<br />\r\nGiao h&agrave;ng: Miễn ph&iacute; phạm vi TPHCM</p>', 'iphone-6s-plus-16gb-goldrose.html', 'apple', '1510816030.iphone-6-gold.jpg', 14790000, 'admin', '2017-11-16 07:08:19', '2017-11-16 07:08:52', 1, '1'),
(82, 91, 'Iphone 7 Plus 256GB Bản Quốc tế (Gold/Rose Gold/Black/Silver)', '<p>- Model: Iphone 7 Plus 256GB<br />\r\n- Color: Black/Rose Gold/Gold/Silver<br />\r\n- M&agrave;n h&igrave;nh: 5.5 inch IPS LCD<br />\r\n- Độ ph&acirc;n giải: Full-HD (1080 x 1920 pixel)<br />\r\n- Chipset: Apple A10 Fusion, CPU 64-bit<br />\r\n- RAM: 2GB<br />\r\n- Hệ điều h&agrave;nh: iOS 10<br />\r\n- Camera ch&iacute;nh: 12MP, Khẩu f/1.8, zoom số 5X, chống rung quang, 4 đ&egrave;n LED flash, thấu k&iacute;nh 6 l&aacute;, lấy n&eacute;t pha, ảnh panorama tới 63MP<br />\r\n- Camera phụ: 7MP, khẩu f/2.2, chống rung số tự động<br />\r\n- Quay phim: 4K 30 fps, Full-HD 30 v&agrave; 60 fps, chụp ảnh 8MP trong khi quay 4K, slowmotion Full-HD 120 fps v&agrave; HD với 240 fps.<br />\r\n- Bộ nhớ trong: 256GB<br />\r\n- Dung lượng pin: 14 giờ tr&ecirc;n mạng 3G, thời gian chờ 10 ng&agrave;y<br />\r\n- Kết nối: LTE 4G, Wi-Fi 802.11 a/b/g/n/ac, dải tần k&eacute;p, Bluetooth 4.2, USB Cổng Lightning<br />\r\n- K&iacute;ch thước: 138,3 x 67,1 x 7,1 mm<br />\r\n- Trọng lượng: 138g<br />\r\n- Phụ kiện: Tai nghe EarPods, c&aacute;p chuyển đổi 3.5mm sang Lightning<br />\r\n- Bảo h&agrave;nh: Ch&iacute;nh h&atilde;ng Apple<br />\r\n- Giao h&agrave;ng: Miễn ph&iacute; phạm vi TPHCM</p>', 'iphone-7-plus-256gb-ban-quoc-te-goldrose-goldblacksilver.html', 'apple', '1510816884.ip7color.PNG', 24790000, 'admin', '2017-11-16 07:22:36', '2017-11-16 07:36:41', 1, '1'),
(83, 92, 'iPhone 6 16GB Black/White (CPO)', '<p>- H&agrave;ng CPO<br />\r\n- M&agrave;n h&igrave;nh: Retina HD, 4.7&quot;, 1334 x 750<br />\r\n- CPU: Apple A8, 2 nh&acirc;n, 1.4 GHz&nbsp; &nbsp;&nbsp;<br />\r\n- RAM: 1 GB&nbsp; &nbsp;&nbsp;<br />\r\n- Hệ điều h&agrave;nh: iOS 8.0&nbsp;&nbsp;<br />\r\n- Camera ch&iacute;nh: 8.0 MP, Quay phim FullHD 1080p@60fps&nbsp;<br />\r\n- Camera phụ: 1.2 MP<br />\r\n- Bộ nhớ trong: 16GB<br />\r\n- Thẻ nhớ ngo&agrave;i: Kh&ocirc;ng<br />\r\n- Dung lượng pin: 1810 mAh<br />\r\n- Bảo h&agrave;nh: 01 năm/ H&agrave;ng NK/ 1 đổi 1 trong v&ograve;ng 3 ng&agrave;y do lỗi sản xuất<br />\r\n- Giao h&agrave;ng: Miễn ph&iacute; phạm vi TPHCM</p>', 'iphone-6-16gb-blackwhite-cpo.html', 'apple', '1510817552.iPhone 6 64GB.png', 9650000, 'admin', '2017-11-16 07:33:23', '2017-11-16 07:34:46', 1, '1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_type`
--

CREATE TABLE `product_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `product_type`
--

INSERT INTO `product_type` (`id`, `name`) VALUES
(1, 'Sản phẩm nổi bật'),
(2, 'Sản phẩm khuyến mãi');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `statics`
--

CREATE TABLE `statics` (
  `id` int(11) NOT NULL,
  `code` varchar(250) NOT NULL,
  `value` text NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `statics`
--

INSERT INTO `statics` (`id`, `code`, `value`, `updated_at`) VALUES
(1, 'Giới thiệu', '<p>----------------------------------------------------------------------------------------------------------------------------<br />\r\n<strong>I. &nbsp;GIỚI THIỆU CHUNG</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>- &nbsp;T&ecirc;n c&ocirc;ng ty: C&Ocirc;NG TY TNHH T&Iacute;CH HỢP HỆ THỐNG VINA</p>\r\n\r\n<p>- &nbsp;T&ecirc;n tiếng anh: VINA INTEGRATED SYSTEM</p>\r\n\r\n<p>- &nbsp;T&ecirc;n viết tắt: VNIS</p>\r\n\r\n<p>- &nbsp;Trụ sở ch&iacute;nh: 3/25/5A1, Đường 182, P.Tăng Nhơn Ph&uacute; A, Q9, TP.HCM</p>\r\n\r\n<p>- &nbsp;Điện thoại: (84-8) 62987871 | Fax: (84-8) 62987860</p>\r\n\r\n<p>- &nbsp;Chi nh&aacute;nh: 179 Ho&agrave;ng Diệu 2, P.Linh Trung, Quận Thủ Đức, TP.HCM</p>\r\n\r\n<p>- &nbsp;Điện thoại: (84-8) 62987871 | Fax: (84-8) 62987860</p>\r\n\r\n<p>- &nbsp;Email:&nbsp; info@vinacorp.net</p>\r\n\r\n<p>- &nbsp;Website: www.vinacorp.net</p>\r\n\r\n<p><strong>1. &nbsp;TH&Ocirc;NG ĐIỆP GI&Aacute;M ĐỐC</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>- &nbsp;Bắt đầu năm 2009 C&ocirc;ng Ty VINA đ&atilde; đặt những vi&ecirc;n gạch nền m&oacute;ng đầu ti&ecirc;n trong lĩnh vực kinh doanh t&iacute;ch hợp hệ thống. Với mục ti&ecirc;u trở th&agrave;nh đơn vị t&iacute;ch hợp chuy&ecirc;n nghiệp.Tr&ecirc;n cơ sở định hướng chiến lược d&agrave;i hạn về c&ocirc;ng nghệ , sản phẩm, dịch vụ v&agrave; nh&acirc;n lực VINA đ&atilde; nhanh ch&oacute;ng trở th&agrave;nh Nh&agrave; cung cấp giải ph&aacute;p v&agrave; T&iacute;ch hợp h&agrave;ng đầu tại Việt Nam.</p>\r\n\r\n<p>- &nbsp;Tuy mới th&agrave;nh lập nhưng với đội ngũ nh&acirc;n vi&ecirc;n l&agrave; c&aacute;c kỹ sư gi&agrave;u kinh nghiệm, năng động s&aacute;ng tạo v&agrave; chuy&ecirc;n nghiệp, VINA đ&atilde; cung cấp một tập hợp c&aacute;c sản phẩm v&agrave; dịch vụ phong ph&uacute; , đa dạng từ cung cấp c&aacute;c thiết bị CNTT, tư vấn x&acirc;y dựng giải ph&aacute;p, đến triển khai giải ph&aacute;p tổng thể cho c&aacute;c hệ thống th&ocirc;ng tin điện tử, dịch vụ đ&agrave;o tạo v&agrave; chuyển giao c&ocirc;ng nghệ ti&ecirc;n tiến.</p>\r\n\r\n<p>- &nbsp;Với phương ch&acirc;m &ldquo; Giải ph&aacute;p tin cậy, Dịch vụ ho&agrave;n hảo, C&ocirc;ng nghệ ti&ecirc;n tiến&rdquo;, VINA cam kết giữ vững l&agrave; nh&agrave; t&iacute;ch hợp hệ thống h&agrave;ng đầu tự tin vươn xa .Niềm tin v&agrave; sự ghi nhận của mỗi đơn vị v&agrave; của cộng đồng l&agrave; động lực to lớn gi&uacute;p ch&uacute;ng t&ocirc;i tiếp tục đ&oacute;ng g&oacute;p những lợi &iacute;ch trực tiếp v&agrave; gi&aacute;n tiếp cho việc ph&aacute;t triển đất nước Việt Nam của ch&uacute;ng ta ng&agrave;y c&agrave;ng thịnh vượng.</p>\r\n\r\n<p><strong>2.&nbsp; GI&Aacute; TRỊ CỐT L&Otilde;I &ndash; THẾ MẠNH &amp; LỢI THẾ CẠNH TRANH &ndash; CHIẾN LƯỢC PH&Aacute;T TRIỂN TỪ 2010 - 2020.</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>- &nbsp;Gi&aacute; trị cốt l&otilde;i : Điều l&agrave;m n&ecirc;n sự kh&aacute;c biệt v&agrave; l&agrave; gi&aacute; trị cốt l&otilde;i của VINA l&agrave; C&ocirc;ng Nghệ, trong suốt những năm qua, VINA đ&atilde; đầu tư rất nhiều cho nghi&ecirc;n cứu v&agrave; ph&aacute;t triển, đến nay c&oacute; rất nhiều những sản phẩm v&agrave; dịch vụ của VINA c&oacute; gi&aacute; trị.</p>\r\n\r\n<p>- &nbsp;Thế mạnh v&agrave; lợi thế cạnh tranh :Với đội ngũ c&aacute;n bộ c&oacute; năng lực v&agrave; kinh nghiệm đ&atilde; l&agrave;m cho VINA lu&ocirc;n lu&ocirc;n ti&ecirc;n phong v&agrave; chiếm ưu thuế trong c&aacute;c giải ph&aacute;p CNTT cho c&aacute;c cơ quan.</p>\r\n\r\n<p>- &nbsp;C&oacute; nhiều kinh nghiệm trong triển khai v&agrave; cung cấp c&aacute;c giải ph&aacute;p, dịch vụ CNTT.</p>\r\n\r\n<p>- &nbsp;Thường xuy&ecirc;n nhi&ecirc;n cứu s&acirc;u về nhu cầu nghiệp vụ của kh&aacute;ch h&agrave;ng , &aacute;p dụng hiểu biết của c&aacute;c chuy&ecirc;n gia ng&agrave;nh h&agrave;ng đầu, ứng dụng c&ocirc;ng nghệ hiện đại để x&acirc;y dựng c&aacute;c giải ph&aacute;p thiết thực, b&aacute;m s&aacute;t nhu cầu thực tế.</p>\r\n\r\n<p>- &nbsp;C&oacute; h&agrave;ng trăm chuy&ecirc;n vi&ecirc;n được đ&agrave;o tạo b&agrave;i bản chuy&ecirc;n m&ocirc;n cũng như quản l&yacute;. Được cấp c&aacute;c bằng cấp cao nhất của c&aacute;c đối t&aacute;c c&ocirc;ng nghệ h&agrave;ng đầu thế giới như : Micorosoft, cisco. IBM, &hellip;</p>\r\n\r\n<p>- &nbsp;C&oacute; hệ thống ph&oacute;ng th&iacute; nghiệm c&ocirc;ng nghệ cao về hạ tầng mạng, trung t&acirc;m dữ liệu, hệ thống bảo mật.</p>\r\n\r\n<p>- &nbsp;Nhận được sự hỗ trợ mạnh từ c&aacute;c đối t&aacute;c h&agrave;ng đầu tr&ecirc;n thế giới trong lĩnh vực t&iacute;ch hợp hệ thống , VINA hiện nay l&agrave; đối t&aacute;c của Micorosoft&hellip;.</p>\r\n\r\n<p>Với thế mạnh tr&ecirc;n c&ugrave;ng với việc lu&ocirc;n ch&uacute; trọng n&acirc;ng cao tỷ trọng cung cấp giải ph&aacute;p v&agrave; dịch vụ c&oacute; h&agrave;m lượng c&ocirc;ng nghệ cao , trong những năm qua VINA lu&ocirc;n chiếm lĩnh thị trường trọng điểm c&oacute; mức đầu tư v&agrave; ứng dụng CNTT lớn.</p>\r\n\r\n<p>- &nbsp;Chiến lược ph&aacute;t triển : Ph&aacute;t huy thế mạnh m&agrave; một trong những c&ocirc;ng ty cung cấp giải ph&aacute;p v&agrave; dịch vụ t&iacute;ch hợp h&agrave;ng đầu Việt Nam, VINA đang ph&aacute;t&nbsp; theo hai hướng :</p>\r\n\r\n<p>+ Một l&agrave; : Đầu tư mạnh mẽ v&agrave;o c&aacute;c thị trường c&oacute; nhu cầu lớn, chuy&ecirc;n nghiệp v&agrave; phức tạp về CNTT như : T&agrave;i Ch&iacute;nh, Ng&acirc;n H&agrave;ng, Bảo Hiểm &hellip;.</p>\r\n\r\n<p>+ Hai l&agrave; : Triển khai c&aacute;c dịch vụ hạ tầng v&agrave; giải ph&aacute;p chuy&ecirc;n nghiệp phục vụ theo chiều ngang tới cả những kh&aacute;ch h&agrave;ng như c&aacute;c doanh nghiệp lớn, khối ch&iacute;nh phủ, dịch vụ c&ocirc;ng, Gi&aacute;o dục v&agrave; Đ&agrave;o tạo.</p>\r\n\r\n<p>- &nbsp;VINA với tư c&aacute;ch l&agrave; đơn vị t&iacute;ch hợp hệ thống , sẽ l&agrave; đầu mối của cả tập đo&agrave;n c&ocirc;ng nghệ th&ocirc;ng tin để cung cấp những giải ph&aacute;p tổng thể v&agrave; trọn g&oacute;i cho kh&aacute;ch h&agrave;ng.</p>\r\n\r\n<p>- &nbsp;X&acirc;y dựng v&agrave; ph&aacute;t triển t&iacute;nh chuy&ecirc;n nghiệp của lực lượng nh&acirc;n sự tr&ecirc;n nền năng lực của c&aacute;c nh&acirc;n vi&ecirc;n c&oacute; tr&igrave;nh độ cao, được huấn luyện v&agrave; đ&agrave;o tạo b&agrave;i bản trong nội b&ocirc; của c&aacute;c đối t&aacute;c.</p>\r\n\r\n<p>- &nbsp;&Aacute;p dụng những kinh nghiệm đ&atilde; t&iacute;ch lũy trong nhiều năm triển khai nhiều dự &aacute;n th&agrave;nh c&ocirc;ng, VINA sẽ lu&ocirc;n đem lại cho kh&aacute;ch h&agrave;ng sự cập nhật mới nhất , hợp l&yacute; nhất về c&ocirc;ng nghệ v&agrave; giải ph&aacute;p.</p>', '2017-07-19 03:01:48'),
(2, 'Địa chỉ liên hệ', '<p>C&Ocirc;NG TY TNHH T&Iacute;CH HỢP HỆ THỐNG VINA</p>\r\n\r\n<p>Văn Ph&ograve;ng: 3/25/5A1, Đường 182, P.Tăng Nhơn Ph&uacute; A, Q9, TP.HCM</p>\r\n\r\n<p>Chi Nh&aacute;nh 1: 179 Ho&agrave;ng Diệu 2, P.Linh Trung, Q.Thủ Đức, TP.HCM</p>\r\n\r\n<p>Chi Nh&aacute;nh 2: 38C Đường 61, P.Phước Long B, Q.9, TP.HCM</p>\r\n\r\n<p>Điện Thoại: 08-62987871 Fax: 08-62987860</p>\r\n\r\n<p>Email: info@vinacorp.net</p>\r\n\r\n<p>Hoặc gởi Email về cho C&ocirc;ng ty theo biểu mẫu như tr&ecirc;n.</p>', '2017-11-08 05:51:47'),
(3, 'Hướng dẫn mua hàng', '<p>Lưu &yacute;: &nbsp;Với c&aacute;c sản phẩm Giờ v&agrave;ng, Gi&aacute; sốc d&agrave;nh ri&ecirc;ng cho Online, để đơn h&agrave;ng được hợp lệ, Qu&yacute; kh&aacute;ch vui l&ograve;ng đặt h&agrave;ng trực tuyến tr&ecirc;n website vinacorp.net theo hướng dẫn n&agrave;y. Nh&acirc;n vi&ecirc;n b&aacute;n h&agrave;ng Online sẽ kiểm tra v&agrave; x&aacute;c nhận th&ocirc;ng tin đơn h&agrave;ng với Qu&yacute; kh&aacute;ch.</p>\r\n\r\n<p>Ch&uacute;c Qu&yacute; kh&aacute;ch h&agrave;i l&ograve;ng với c&aacute;c sản phẩm v&agrave; dịch vụ của Vinacorp !</p>', '2017-05-20 01:59:32'),
(4, 'Hướng dẫn thanh toán', '<p><span style=\"font-size:small\"><strong>1. Thanh to&aacute;n trực tiếp:</strong>&nbsp;<br />\r\n- Qu&yacute; kh&aacute;ch c&oacute; thể thanh to&aacute;n tiền mặt khi nh&acirc;n vi&ecirc;n đến giao h&agrave;ng tận nơi; hoặc tại Vinacorp thanh to&aacute;n tiền trước khi nhận h&agrave;ng (vui l&ograve;ng giữ lại c&aacute;c chứng từ để đối chiếu khi cần thiết).</span><br />\r\n<br />\r\n<span style=\"font-size:small\"><strong>2. Thanh to&aacute;n qua thẻ ATM. </strong><br />\r\n- Qu&yacute; kh&aacute;ch thanh to&aacute;n bằng thẻ ATM Internet Banking qua c&aacute;c t&agrave;i khoản sau:</span><br />\r\n<br />\r\nNg&acirc;n h&agrave;ng Vietcombank:<br />\r\nChủ t&agrave;i khoản: NGUYEN NGOC TIENG<br />\r\nSTK: 0181 0007 63081&nbsp; -&nbsp; Vietcombank Chi Nh&aacute;nh Thủ Đức, TP.HCM<br />\r\n--------------------------------------------------------------------------------------------------------------<br />\r\nNg&acirc;n h&agrave;ng &Aacute; Ch&acirc;u:<br />\r\nChủ t&agrave;i khoản: NGUYEN NGOC TIENG<br />\r\nSTK: 206842769&nbsp; -&nbsp; ACB Chi Nh&aacute;nh Thủ Đức, TP.HCM<br />\r\n---------------------------------------------------------------------------------------------------------------<br />\r\nNg&acirc;n h&agrave;ng Agribank:<br />\r\nChủ t&agrave;i khoản: NGUYEN NGOC TIENG<br />\r\nSTK: 1601 2050 82518&nbsp; -&nbsp; Ng&acirc;n H&agrave;ng NN &amp; PT N&ocirc;ng Th&ocirc;n Chi Nh&aacute;nh Q1, TP.HCM<br />\r\n----------------------------------------------------------------------------------------------------------------<br />\r\nNg&acirc;n h&agrave;ng Đ&ocirc;ng &Aacute;:<br />\r\nChủ t&agrave;i khoản: NGUYEN NGOC TIENG<br />\r\nSTK: 0110170253&nbsp; -&nbsp; DongAbank Chi Nh&aacute;nh Thủ Đức, TP.HCM<br />\r\n<br />\r\n<span style=\"font-size:small\"><strong>3. Thanh to&aacute;n qua t&agrave;i khoản C&ocirc;ng ty</strong>.<br />\r\n<em>(&Aacute;p dụng cho đơn h&agrave;ng v&agrave; c&aacute;c hợp đồng tr&ecirc;n 20 triệu đồng)</em></span></p>\r\n\r\n<p><span style=\"font-size:small\">T&ecirc;n C&ocirc;ng Ty: C&Ocirc;NG TY TNHH T&Iacute;CH HỢP HỆ THỐNG VINA<br />\r\nSố t&agrave;i khoản: 006002580001<br />\r\nMở tại: Ng&acirc;n h&agrave;ng Đ&ocirc;ng &Aacute;, Chi nh&aacute;nh Quận 4, TP.HCM<br />\r\nNội dung: (vd: Thanh to&aacute;n HD038, Hopdong so: 008)</span></p>\r\n\r\n<p><span style=\"font-size:small\"><em><strong>Ghi ch&uacute;</strong>&nbsp;:&nbsp;</em></span></p>\r\n\r\n<p><em>sau khi chuy</em><em>ể</em><em>n kho</em><em>ả</em><em>n, qu&yacute; kh&aacute;ch vui l&ograve;ng th&ocirc;ng b&aacute;o cho ch&uacute;ng t&ocirc;i vi</em><em>ệ</em><em>c chuy</em><em>ể</em><em>n ti</em><em>ề</em><em>n v&agrave; s</em><em>ố</em><em> t&agrave;i kho</em><em>ả</em><em>n c</em><em>ủ</em><em>a qu&yacute; kh&aacute;ch (b</em><em>ằ</em><em>ng đi</em><em>ệ</em><em>n tho</em><em>ạ</em><em>i, tin nh</em><em>ắ</em><em>n, email) đ</em><em>ể</em><em> thu</em><em>ậ</em><em>n ti</em><em>ệ</em><em>n trong vi</em><em>ệ</em><em>c ki</em><em>ể</em><em>m tra.</em></p>', '2017-07-13 06:51:13');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `supports`
--

CREATE TABLE `supports` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `type` int(11) NOT NULL DEFAULT '1',
  `type_name` varchar(255) NOT NULL DEFAULT 'Cố định',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `supports`
--

INSERT INTO `supports` (`id`, `name`, `value`, `type`, `type_name`, `updated_at`) VALUES
(1, 'Email liên hệ', 'info@vinacorp.net', 0, 'Cố định', '2017-11-16 17:30:45'),
(2, 'Chi nhánh:', '38C Đường 61, P.Phước Long B, Q.9, TP.HCM', 0, 'Cố định', '2017-11-16 17:31:55'),
(3, 'Điện thoại liên hệ', '093 7777 638', 0, 'Cố định', '2017-07-29 07:01:31'),
(4, 'Mr Tiếng', '0909 747 235', 1, 'Kinh doanh', '2017-07-08 04:12:09'),
(5, 'Góp ý', '0977 06 07 09', 1, 'Kinh doanh', '2017-12-23 12:11:28');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vnc_product`
--

CREATE TABLE `vnc_product` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `category_alias` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `is_hot` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT '1',
  `user_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Đang đổ dữ liệu cho bảng `vnc_product`
--

INSERT INTO `vnc_product` (`id`, `title`, `alias`, `description`, `category_id`, `category_alias`, `created_at`, `is_hot`, `updated_at`, `is_active`, `user_id`) VALUES
(53, 'ASUS K43E', 'asus-k43e', '<p>- Intel Core i3 23100M 2.1GHZ<br />\r\n- Ram: 4GB DDR3 1600MHz<br />\r\n- HDD: 500GB SATA<br />\r\n- NVIDIA Geforce GT520M<br />\r\n- LCD: 14 inch HD LED<br />\r\n- DVD: RW<br />\r\n- Webcam: 1.3 Megapixels<br />\r\n- HDMI, E-SATA, VGA, USB 2.0 v&agrave; 3.0, Ethernet (LAN), Card-Reader<br />\r\n- Pin: 6 cells.</p>', 17, 'asus', '2017-07-28 07:03:40', 1, '2017-11-08 06:30:22', 1, 'admin'),
(54, 'HP ELITEBOOK 8440P', 'hp-elitebook-8440p', '<p>- Core i5 M520 2.4GHz<br />\r\n&nbsp;- Ram 4G/1333<br />\r\n&nbsp;- HDD WD 500G 7200<br />\r\n&nbsp;- Card m&agrave;n h&igrave;nh Nvidia NVS 3100M<br />\r\n&nbsp;- DVD DW, Vga out, Display port . esata, WIFI chuan N<br />\r\n&nbsp;- M&agrave;n h&igrave;nh 14 inch HD LED chống ch&oacute;i.<br />\r\n&nbsp;- Pin 6 Cell</p>', 20, 'hp', '2017-07-28 07:09:49', 1, '2017-07-28 07:09:49', 1, 'admin'),
(57, 'Dell Latitude E6430', 'dell-latitude-e6430', '<p>- Core i5 - 3320M - 2.6GHZ<br />\r\n- RAM 4 GB/1600 MHz<br />\r\n- HDD : 500 GB<br />\r\n- LCD : 14inch<br />\r\n- Intel HD Graphics 4000<br />\r\n- DVD: RW (đọc, ghi dữ liệu)<br />\r\n- Webcam HD webcam<br />\r\n- Pin Li-Ion 6 cell<br />\r\n- Trọng lượng 2.25</p>', 14, 'dell', '2017-07-28 07:27:24', 1, '2017-07-28 07:27:24', 1, 'admin'),
(58, 'Dell Latitude E5430', 'dell-latitude-e5430', '<p>- Core i5 - 3320M - 2.6GHZ<br />\r\n- RAM 4 GB/1600 MHz<br />\r\n- HDD : 500 GB<br />\r\n- LCD : 14inch<br />\r\n- Intel HD Graphics 4000<br />\r\n- DVD: RW (đọc, ghi dữ liệu)<br />\r\n- Webcam HD webcam<br />\r\n- Pin Li-Ion 6 cell<br />\r\n- Trọng lượng 2.25</p>', 14, 'dell', '2017-07-28 07:32:37', 1, '2017-07-28 07:32:37', 1, 'admin'),
(61, 'LENOVO G50-80', 'lenovo-g50-80', '<p>- Core i5 - 5200U (2.2 Ghz - 2.7 GHZ<br />\r\n- RAM: 4GB-DDR3<br />\r\n- Dung lượng RAM : 4 GB/1600 Mhz<br />\r\n- HDD: 500 GB<br />\r\n- Intel HD Graphics 5500<br />\r\n- Card đồ họa AMD Radeon R5 M330<br />\r\n-&nbsp; LCD: 15.6 inch (Độ ph&acirc;n giải: 1366 x 768 pixels, HD LED<br />\r\n- DVD +/- RW<br />\r\n- Cổng giao tiếp: 2xUSB3.0,1xUSB2.0,LAN,HDMI,VGA,Headphone,Microphone<br />\r\n- LAN 10/100/1000Mbps<br />\r\n- Chuẩn Wi-Fi 802.11 b/g/n, Bluetooth v4.0<br />\r\n- PIN Li-ion 6 cell<br />\r\n- Trọng lượng 1.8 Kg</p>', 19, 'lenovo', '2017-07-28 07:46:20', 1, '2017-11-10 05:53:43', 1, 'admin'),
(62, 'DELL INS N5010', 'dell-ins-n5010', '<p>- Core i5 - M480 - 2.67Ghz<br />\r\n- RAM: 4GB - DDR3 - 1600Mhz<br />\r\n- HDD: 500GB<br />\r\n- M&agrave;n h&igrave;nh: 14inch<br />\r\n- Đồ họa:Intel HD Graphics<br />\r\n- Khe đọc thẻ nhớ SD, SDXC, SDHC<br />\r\n- DVD +/- RW<br />\r\n- Webcam HD webcam<br />\r\n- Pin Li-Ion 6 cell<br />\r\n- Trọng lượng 2.25<br />\r\n- V&otilde; nh&ocirc;m cao cấp v&agrave; sang trọng.</p>', 14, 'dell', '2017-07-28 08:04:56', 1, '2017-07-28 08:04:56', 1, 'admin'),
(70, 'Lenovo  Thinkpad T430s', 'lenovo-thinkpad-t430s', '<p>Lenovo T430s</p>\r\n\r\n<p>- CPU: Intel Core i5 Ivy Bridge<br />\r\n- Ram: 4GB<br />\r\n- HDD: 320GB<br />\r\n- Intel HD Graphics 4000<br />\r\n- LCD: &ge; 14 inch<br />\r\n- Thời lượng pin: &ge; 2 giờ<br />\r\n- Trọng lượng: &le; 1.8kg<br />\r\n- D&ograve;ng m&aacute;y: Ultrabook</p>', 19, 'lenovo', '2017-10-18 07:20:34', 1, '2017-10-18 07:23:32', 1, 'anhthy'),
(71, 'Sony Vaio VPCEL', 'sony-vaio-vpcel', '<p>Sony Vaio VPCEL</p>\r\n\r\n<p>- CPU: AMD - E450 (1.60GHZ)</p>\r\n\r\n<p>- VGA: Intel HD Graphic</p>\r\n\r\n<p>- RAM: 4GB</p>\r\n\r\n<p>- HDD: 1TB</p>\r\n\r\n<p>- DVD: DVD RW</p>\r\n\r\n<p>- LCD: 15.6 Inch</p>', 16, 'sony-vaio', '2017-10-18 07:30:30', 1, '2017-10-18 07:30:30', 1, 'anhthy'),
(73, 'Dell Vostro 2421', 'dell-vostro-2421', '<p>Dell Vostro 2421</p>\r\n\r\n<p>- CPU: i3 - 3217U - 1.8GHZ</p>\r\n\r\n<p>- VGA: Intel HD Graphic 4000</p>\r\n\r\n<p>- RAM: 4GB</p>\r\n\r\n<p>- HDD: 500GB</p>\r\n\r\n<p>- DVD: DVD RW</p>\r\n\r\n<p>- LCD: 14 Inch</p>', 14, 'dell', '2017-10-18 07:51:43', 1, '2017-10-18 07:54:12', 1, 'anhthy'),
(74, 'Dell Vostro 2420', 'dell-vostro-2420', '<p>- CPU: i5 - 3230M - 2.6GHZ</p>\r\n\r\n<p>- VGA: Intel HD Graphic 4000 +&nbsp;INVIDIA GEFORCE GT 620M</p>\r\n\r\n<p>- RAM: 4GB</p>\r\n\r\n<p>- HDD: 500GB</p>\r\n\r\n<p>- DVD: DVD RW</p>\r\n\r\n<p>- LCD: 14 inch</p>', 14, 'dell', '2017-10-18 08:00:06', 1, '2017-11-18 03:21:21', 1, 'admin'),
(75, 'Asus TP550L', 'asus-tp550l', '<p>Asus TP550L</p>\r\n\r\n<p>- CPU: i3 - 4030U</p>\r\n\r\n<p>- VGA: Intel HD Graphic FAMILY</p>\r\n\r\n<p>- RAM: 4GB</p>\r\n\r\n<p>- HDD: 1TB</p>\r\n\r\n<p>- DVD: DVD RW</p>\r\n\r\n<p>- LCD: 15.6 Inch</p>', 17, 'asus', '2017-10-18 08:06:48', 1, '2017-10-18 08:06:48', 1, 'anhthy'),
(78, 'Acer Aspire 4752', 'acer-aspire-4752', '<p>- CPU: Intel Core i3-2350 (2.3Ghz)</p>\r\n\r\n<p>- VGA: Intel HD Graphic 3000</p>\r\n\r\n<p>- RAM: 4GB</p>\r\n\r\n<p>- HDD: 500G</p>\r\n\r\n<p>- DVD: DVD RW</p>\r\n\r\n<p>- LCD: 14.0 Inch</p>', 38, 'acer', '2017-11-08 06:08:07', 1, '2017-11-08 06:08:07', 1, 'admin'),
(79, 'Dell INS N5050', 'dell-ins-n5050', '<p>CPU: Intel Core i3-2430 (2.4Ghz)</p>\r\n\r\n<p>- VGA: Intel HD Graphic 3000</p>\r\n\r\n<p>- RAM: 4GB</p>\r\n\r\n<p>- HDD: 500G</p>\r\n\r\n<p>- DVD: DVD RW</p>\r\n\r\n<p>- LCD: 15.6 Inch</p>', 14, 'dell', '2017-11-08 06:13:35', 1, '2017-11-08 06:13:35', 1, 'admin'),
(80, 'Dell INS N4030', 'dell-ins-n4030', '<p>- CPU: Intel Core i3-M370 (2.4 Ghz)</p>\r\n\r\n<p>- VGA: Intel HD Graphic</p>\r\n\r\n<p>- RAM: 2GB</p>\r\n\r\n<p>- HDD: 250G</p>\r\n\r\n<p>- DVD: DVD RW</p>\r\n\r\n<p>- LCD: 14.0 inch<br />\r\n- DVD RW<br />\r\n- Pin 6 Cell</p>', 14, 'dell', '2017-11-08 12:39:57', 1, '2017-11-08 12:39:57', 1, 'admin'),
(81, 'Dell INS 5420', 'dell-ins-5420', '<p>- CPU: Intel Core i7-3632QM (2.2Ghz)/<br />\r\n- RAM: 8GB/1600<br />\r\n- HDD 1TB/5400 rpm<br />\r\n- Intel HD Graphics 4000<br />\r\n- M&agrave;n h&igrave;nh: 14.0 inch 1366 x 768 pixels<br />\r\n- DVD-RW<br />\r\n- Pin 6 Cell.</p>', 14, 'dell', '2017-11-08 12:55:29', 1, '2017-12-01 13:22:01', 1, 'admin'),
(82, 'Dell Vostro 3559/AMD Radeon R5 M315', 'dell-vostro-3559amd-radeon-r5-m315', '<p>- CPU: Intel Core i5-6200U (2.30Ghz)<br />\r\n- RAM: 4G/PC3L-1600<br />\r\n- HDD 500G/5400 rpm<br />\r\n- Intel HD Graphics 520 + AMD Radeon R5 M315<br />\r\n- M&agrave;n h&igrave;nh: 15.6 inch HD LED<br />\r\n- DVD-RW<br />\r\n- Pin 6 Cell.</p>', 14, 'dell', '2017-11-08 13:01:12', 1, '2017-11-08 13:03:46', 1, 'admin'),
(83, 'Dell Vostro 3559', 'dell-vostro-3559', '<p><img alt=\"\" src=\"http://vinacorp.net/public/uploads/files/San_Pham/laptop_dell_vostro_v3559.jpg\" style=\"height:186px; width:284px\" /></p>\r\n\r\n<p><strong>- Thiết kế mạnh mẽ<br />\r\n<a href=\"http://vinacorp.net/san-pham/dell-vostro-3559.html\">Laptop Dell Vostro V3559 </a>sở hữu thiết vẻ ngo&agrave;i bắt mắt với &nbsp;bộ khung chắc chắn,</strong>vỏ m&agrave;u đen cứng c&aacute;p, mạnh mẽ, &iacute;t b&aacute;m bụi, chống v&acirc;n tay, chống xước. C&aacute;c g&oacute;c viền được bo tr&ograve;n tinh tế, đ&ograve;ng thời tạo cảm gi&aacute;c chắc tay khi cầm nắm.</p>\r\n\r\n<p><img alt=\"\" src=\"http://vinacorp.net/public/uploads/files/San_Pham/intel_core%20i5.jpg\" style=\"height:285px; width:284px\" /><br />\r\n- <strong>Cấu h&igrave;nh mạnh mẽ<br />\r\nM&aacute;y được trang bị bộ vi xử l&yacute; Core i5 Skylake 6200U tốc độ xử l&yacute; 2.3Ghz up to 3.1Ghz,</strong> Ram 8Gb DDR3L gi&uacute;p chạy mượt m&agrave; đa t&aacute;c vụ. Chip đồ họa&nbsp;t&iacute;ch hợp Intel HD Graphic 5200, xem phim v&agrave; chơi game thỏa th&iacute;ch. Ổ cứng 1TB&nbsp;thoải m&aacute;i lưu trữ dữ liệu.<br />\r\n<img alt=\"\" src=\"http://vinacorp.net/public/uploads/files/San_Pham/Audio_laptop-dell-vostro-v3559.jpg\" style=\"height:186px; width:284px\" /></p>\r\n\r\n<p><strong>&Acirc;m thanh chất lượng</strong></p>\r\n\r\n<p><strong><a href=\"http://vinacorp.net/san-pham/dell-vostro-3559.html\">Laptop Dell Vostro V3559</a> -</strong> T&iacute;ch hợp&nbsp;<strong>c&ocirc;ng nghệ &acirc;m thanh Wave MaxxAudio</strong> gi&uacute;p cải thiện tốt hơn &acirc;m thanh loa ngo&agrave;i đồng thời gi&uacute;p &acirc;m lượng to hơn nhưng vẫn kh&ocirc;ng thay đổi về chất lượng. Nhờ đ&oacute;, bạn sẽ c&oacute; những ph&uacute;t gi&acirc;y thật tuyệt vời c&ugrave;ng những giai điệu &acirc;m nhạc hay những bộ phim &ldquo;đỉnh&rdquo; nhất hiện nay.<br />\r\n<img alt=\"\" src=\"http://vinacorp.net/public/uploads/files/San_Pham/pin-dell_vostro_3559.jpg\" style=\"height:186px; width:284px\" /></p>\r\n\r\n<p><strong>Pin chất lượng</strong></p>\r\n\r\n<p><a href=\"http://vinacorp.net/san-pham/dell-vostro-3559.html\"><strong>Laptop Dell Vostro 3559 sử dụng pin 3&nbsp;cell</strong></a> cho thời gian sử dụng tương đối. C&ugrave;ng với c&ocirc;ng nghệ tiết kiệm pin ULV (Ultra Low Voltage) tr&ecirc;n chip xử l&yacute; thế hệ mới nhất, m&aacute;y c&oacute; thể hoạt động m&aacute;t, &ecirc;m &aacute;i v&agrave; tiết kiệm điện năng n&ecirc;n c&oacute; thể đ&aacute;p ứng tốt nhu cầu sử dụng b&igrave;nh thường của bạn.<br />\r\n<img alt=\"\" src=\"http://vinacorp.net/public/uploads/files/San_Pham/lcd_dell_vostro_v3559.jpg\" style=\"height:186px; width:284px\" /></p>\r\n\r\n<p><strong>M&agrave;n h&igrave;nh 15.6&nbsp;inch sắc n&eacute;t</strong></p>\r\n\r\n<p><strong>M&aacute;y c&oacute; m&agrave;n h&igrave;nh k&iacute;ch thước 15.6&nbsp;inch với độ ph&acirc;n giải 1366x768 pixels</strong> c&ugrave;ng c&ocirc;ng nghệ HD LED v&agrave; chống l&oacute;a đem tới những h&igrave;nh ảnh sống động chi tiết, đ&aacute;p ứng tốt nhu cầu l&agrave;m việc giải tr&iacute; của bạn.<br />\r\n<img alt=\"\" src=\"http://vinacorp.net/public/uploads/files/San_Pham/Keyboard_dell_vostro_v3559.jpg\" style=\"height:186px; width:284px\" /></p>\r\n\r\n<p><strong>B&agrave;n ph&iacute;m th&ocirc;ng minh</strong></p>\r\n\r\n<p><strong>B&agrave;n ph&iacute;m mang đến khả năng soạn thảo văn bản một c&aacute;ch trơn tru</strong> v&agrave; nhanh gọn với c&aacute;c ph&iacute;m c&oacute; độ rộng vừa phải, độ nảy &ecirc;m. Touchpad c&oacute; bề mặt tho&aacute;ng, bắt chuẩn x&aacute;c theo thao t&aacute;c di chuyển của đầu ng&oacute;n tay.<br />\r\n<img alt=\"\" src=\"http://vinacorp.net/public/uploads/files/San_Pham/Conec_dell_vostro_v3559.jpg\" style=\"height:186px; width:284px\" /></p>\r\n\r\n<p><strong>Hỗ trợ kết nối</strong></p>\r\n\r\n<p>Dell Vostro V3559 - GJJNK3<strong> hỗ trợ đa dạng kết nối với c&aacute;c cổng USB 3.0</strong>, <strong>LAN, HDMI out, VGA out</strong>&nbsp;gi&uacute;p bạn dễ d&agrave;ng kết nối với c&aacute;c thiết bị kh&aacute;c. Ổ&nbsp;đĩa quang tiện lợi cho việc đọc, sao ch&eacute;p, c&agrave;i đặt dữ liệu từ đĩa cứng v&agrave;o m&aacute;y.</p>\r\n\r\n<p>&nbsp;</p>', 14, 'dell', '2017-11-08 13:05:13', 1, '2017-11-23 10:29:05', 1, 'admin'),
(84, 'Dell INS 1464', 'dell-ins-1464', '<p>- CPU:&nbsp; Intel Core i3-M330 (2.13Ghz)<br />\r\n- RAM: 2G/1333<br />\r\n- HDD 250G/5400 rpm<br />\r\n- Intel HD Graphics 14.0 inch HD LED<br />\r\n- DVD-RW<br />\r\n- Pin 6 Cell.</p>', 14, 'dell', '2017-11-08 13:09:38', 1, '2017-11-08 13:09:38', 1, 'admin'),
(85, 'Acer Aspire E15 E5 - 573 - 35YX', 'acer-aspire-e15-e5-573-35yx', '<p>- CPU: Intel Core i3-4005U (1.7Ghz)<br />\r\n- RAM: 4G/1600<br />\r\n- HDD 500G/5400rpm<br />\r\n- Intel HD Graphics 4400<br />\r\n- M&agrave;n h&igrave;nh: 14.0 inch HD LED<br />\r\n- DVD-RW<br />\r\n- Pin 6 Cell.</p>', 38, 'acer', '2017-11-08 13:13:48', 1, '2017-11-08 13:13:48', 1, 'admin'),
(86, 'Dell INS 3420', 'dell-ins-3420', '<p>- CPU: Intel i5-3230 (2.60Ghz)<br />\r\n- RAM: 4G/1600<br />\r\n- HDD 500G/5400rpm<br />\r\n- Intel HD Graphics 4000<br />\r\n- M&agrave;n h&igrave;nh: 14.0 inch HD LED<br />\r\n- DVD-RW<br />\r\n- Pin 6 Cell.</p>', 14, 'dell', '2017-11-08 13:23:27', 1, '2017-11-08 13:23:27', 1, 'admin'),
(87, 'HP 8440W/i7-4G-500G', 'hp-8440wi7-4g-500g', '<p>- CP: Intel i7-M640 (2.80Ghz)<br />\r\n- RAM: 4G/1333<br />\r\n- HDD 500G/5400 rpm<br />\r\n- Nvidia GeForce GTX 860M<br />\r\n- M&agrave;n h&igrave;nh: 14.0 inch HD LED<br />\r\n- DVD-RW<br />\r\n-&nbsp; Pin 6 Cell.</p>', 20, 'hp', '2017-11-08 13:35:11', 1, '2017-11-08 13:36:45', 1, 'admin'),
(88, 'Dell INS 3521', 'dell-ins-3521', '<p>- CPU: Intel i3-3217U (1.80Ghz)<br />\r\n- RAM: 4G/1600<br />\r\n- HDD 500G/5400 rpm<br />\r\n- Intel HD Graphics 4000<br />\r\n- M&agrave;n h&igrave;nh: 15.6 inch HD LED<br />\r\n- DVD-RW<br />\r\n- Pin 6 Cell.</p>', 14, 'dell', '2017-11-08 13:39:40', 1, '2017-11-08 13:39:40', 1, 'admin'),
(89, 'ACER V3 - 571G', 'acer-v3-571g', '<p>- CPU: Intel i5-3230M (2.60Ghz)<br />\r\n- RAM: 4G/1333<br />\r\n- HDD 500G/5400 rpm<br />\r\n- Intel HD Graphics 4000 + NVIDIA Geforce 710M (2G)<br />\r\n- M&agrave;n h&igrave;nh: 15.6 inch HD LED<br />\r\n- DVD-RW<br />\r\n- Pin 6 Cell.</p>', 38, 'acer', '2017-11-08 13:48:57', 1, '2017-11-08 13:48:57', 1, 'admin'),
(90, 'Iphone 6S Plus 16GB Gold/Rose', 'iphone-6s-plus-16gb-goldrose', '<p>H&agrave;ng chưa Active Mới 100%<br />\r\nM&agrave;n h&igrave;nh:5.5&rdquo; Retina HD, 1.080 x 1.920 pixel<br />\r\nCPU: A9, kiến tr&uacute;c 64-bit, cảm biến chuyển động M9<br />\r\nRAM: 2GB<br />\r\nHệ điều h&agrave;nh: iOS 9.0<br />\r\nCamera ch&iacute;nh: 12.0 MP, Quay phim 4k<br />\r\nCamera phụ: 5.0 MP<br />\r\nBộ nhớ trong: 16GB<br />\r\nThẻ nhớ ngo&agrave;i: Kh&ocirc;ng<br />\r\nDung lượng pin:&nbsp; Li-Po 2750 mAh<br />\r\nBảo h&agrave;nh:&nbsp; 01 năm/ H&agrave;ng NK/ 1 đổi 1 trong v&ograve;ng 3 ng&agrave;y do lỗi sản xuất<br />\r\nGiao h&agrave;ng: Miễn ph&iacute; phạm vi TPHCM</p>', 12, 'apple', '2017-11-16 07:07:10', 1, '2017-11-16 07:07:10', 1, 'admin'),
(91, 'Iphone 7 Plus 256GB Bản Quốc tế (Gold/Rose Gold/Black/Silver)', 'iphone-7-plus-256gb-ban-quoc-te-goldrose-goldblacksilver', '<p>- Model: Iphone 7 Plus 256GB<br />\r\n- Color: Black/Rose Gold/Gold/Silver<br />\r\n-&nbsp;M&agrave;n h&igrave;nh: 5.5 inch IPS LCD<br />\r\n-&nbsp;Độ ph&acirc;n giải: Full-HD (1080 x 1920 pixel)<br />\r\n-&nbsp;Chipset: Apple A10 Fusion, CPU 64-bit, l&otilde;i tứ chưa r&otilde; tốc độ xung nhịp + vi xử l&yacute; chuyển động M10<br />\r\n- RAM: 2GB<br />\r\n- Hệ điều h&agrave;nh: iOS 10<br />\r\n- Camera ch&iacute;nh: 12MP, Khẩu f/1.8, zoom số 5X, chống rung quang, 4 đ&egrave;n LED flash, thấu k&iacute;nh 6 l&aacute;, lấy n&eacute;t pha, ảnh panorama tới 63MP<br />\r\n-&nbsp;Camera phụ: 7MP, khẩu f/2.2, chống rung số tự động<br />\r\n&nbsp;- Quay phim: 4K 30 fps, Full-HD 30 v&agrave; 60 fps, chụp ảnh 8MP trong khi quay 4K, slowmotion Full-HD 120 fps v&agrave; HD với 240 fps.<br />\r\n-&nbsp;Bộ nhớ trong: 256GB<br />\r\n- Dung lượng pin: 14 giờ tr&ecirc;n mạng 3G, thời gian chờ 10 ng&agrave;y<br />\r\n- Kết nối: LTE 4G, Wi-Fi 802.11 a/b/g/n/ac, dải tần k&eacute;p, Bluetooth 4.2, USB Cổng Lightning<br />\r\n-&nbsp;K&iacute;ch thước: 138,3 x 67,1 x 7,1 mm<br />\r\n-&nbsp;Trọng lượng: 138g<br />\r\n- Phụ kiện: Tai nghe EarPods, c&aacute;p chuyển đổi 3.5mm sang Lightning<br />\r\n- Bảo h&agrave;nh: Ch&iacute;nh h&atilde;ng Apple<br />\r\n- Giao h&agrave;ng: Miễn ph&iacute; phạm vi TPHCM</p>', 12, 'apple', '2017-11-16 07:21:24', 1, '2017-11-16 07:41:29', 1, 'admin'),
(92, 'iPhone 6 16GB Black', 'iphone-6-16gb-black', '<p>- H&agrave;ng CPO<br />\r\n- M&agrave;n h&igrave;nh: Retina HD, 4.7&quot;, 1334 x 750<br />\r\n- CPU: Apple A8, 2 nh&acirc;n, 1.4 GHz&nbsp; &nbsp;&nbsp;<br />\r\n- RAM: 1 GB&nbsp; &nbsp;&nbsp;<br />\r\n- Hệ điều h&agrave;nh: iOS 8.0&nbsp;&nbsp;<br />\r\n- Camera ch&iacute;nh: 8.0 MP, Quay phim FullHD 1080p@60fps&nbsp;<br />\r\n- Camera phụ: 1.2 MP<br />\r\n- Bộ nhớ trong: 16GB<br />\r\n- Thẻ nhớ ngo&agrave;i: Kh&ocirc;ng<br />\r\n- Dung lượng pin: 1810 mAh<br />\r\n- Bảo h&agrave;nh: 01 năm/ H&agrave;ng NK/ 1 đổi 1 trong v&ograve;ng 3 ng&agrave;y do lỗi sản xuất<br />\r\n- Giao h&agrave;ng: Miễn ph&iacute; phạm vi TPHCM</p>', 12, 'apple', '2017-11-16 07:32:32', 1, '2017-11-16 07:35:24', 1, 'admin');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vnc_users`
--

CREATE TABLE `vnc_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Đang đổ dữ liệu cho bảng `vnc_users`
--

INSERT INTO `vnc_users` (`id`, `username`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$1gIwUgWyWXSOf1hrDDpVCu.LqQcNkpMgFarScY/.wIID0qxSXpQ46', 'cr5ceikMcJLESCILBU5S5S1mMWMrMDCGkoTbSC6h8fwLuBEtwweioD8zckRi', '2017-05-05 21:31:14', '2017-07-28 09:57:57');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `collections`
--
ALTER TABLE `collections`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `qt64_category_name_unique` (`name`);

--
-- Chỉ mục cho bảng `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_option`
--
ALTER TABLE `product_option`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `statics`
--
ALTER TABLE `statics`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `supports`
--
ALTER TABLE `supports`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `vnc_product`
--
ALTER TABLE `vnc_product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `vnc_users`
--
ALTER TABLE `vnc_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `qt64_users_username_unique` (`username`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT cho bảng `collections`
--
ALTER TABLE `collections`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT cho bảng `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT cho bảng `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT cho bảng `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT cho bảng `product_image`
--
ALTER TABLE `product_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=245;
--
-- AUTO_INCREMENT cho bảng `product_option`
--
ALTER TABLE `product_option`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;
--
-- AUTO_INCREMENT cho bảng `product_type`
--
ALTER TABLE `product_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT cho bảng `statics`
--
ALTER TABLE `statics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT cho bảng `supports`
--
ALTER TABLE `supports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT cho bảng `vnc_product`
--
ALTER TABLE `vnc_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;
--
-- AUTO_INCREMENT cho bảng `vnc_users`
--
ALTER TABLE `vnc_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
