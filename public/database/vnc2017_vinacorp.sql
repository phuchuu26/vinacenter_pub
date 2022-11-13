-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2017 at 06:44 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vnc2017_vinacorp`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `is_active` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `parent_id`, `name`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 0, 'Điện Thoại', 1, '2017-05-04 21:44:41', '2017-05-05 02:26:43'),
(2, 0, 'Laptop', 1, '2017-05-04 21:45:31', '2017-05-04 21:45:31'),
(3, 0, 'Tivi', 1, '2017-05-04 23:39:40', '2017-05-04 23:39:40'),
(12, 1, 'APPLE', 1, '2017-05-05 18:18:42', '2017-05-05 18:19:02'),
(13, 1, 'Nokia', 1, '2017-05-06 07:24:25', '2017-05-06 07:24:39'),
(14, 2, 'DELL', 1, '2017-05-07 01:04:32', '2017-05-07 01:04:32'),
(15, 1, 'Samsung', 1, '2017-05-13 22:14:45', '2017-05-13 22:14:45');

-- --------------------------------------------------------

--
-- Table structure for table `collections`
--

CREATE TABLE `collections` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `collections`
--

INSERT INTO `collections` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Điện thoại', 'dien-thoai', NULL, NULL),
(2, 'Laptop', 'laptop', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
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
-- Table structure for table `news`
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
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `alias`, `description`, `created_at`, `image`, `is_active`, `updated_at`, `user_id`) VALUES
(10, 'Ông Đinh La Thăng làm Phó ban Kinh tế Trung ương', 'ong-dinh-la-thang-lam-pho-ban-kinh-te-trung-uong', '<p>S&aacute;ng 10/5, c&aacute;c quyết định về c&ocirc;ng t&aacute;c c&aacute;n bộ đ&atilde; được c&ocirc;ng bố tại TP.HCM. Theo đ&oacute;, &ocirc;ng Đinh La Thăng th&ocirc;i giữ chức B&iacute; thư Th&agrave;nh ủy TP.HCM. &Ocirc;ng được điều động giữ chức Ph&oacute; ban Kinh tế Trung ương.</p>\r\n\r\n<p>Ban Kinh tế Trung ương&nbsp;l&agrave; cơ quan tham mưu của Ban Chấp h&agrave;nh Trung ương,&nbsp;m&agrave; trực tiếp v&agrave; thường xuy&ecirc;n l&agrave; Bộ Ch&iacute;nh trị&nbsp;v&agrave; Ban B&iacute; thư. Hiện, Trưởng ban l&agrave; &ocirc;ng Nguyễn Văn B&igrave;nh, Ủy vi&ecirc;n Bộ Ch&iacute;nh trị, &ocirc;ng Cao Đức Ph&aacute;t l&agrave; Ph&oacute; ban thường trực.</p>\r\n\r\n<table align=\"center\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"Ong Dinh La Thang lam Pho ban Kinh te Trung uong hinh anh 1\" src=\"http://znews-photo-td.zadn.vn/w660/Uploaded/aohunax/2017_05_10/ong_Thang_1.jpg\" style=\"height:336px; width:480px\" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td>&Ocirc;ng Đinh La Thăng giữ chức Ph&oacute; ban Kinh tế Trung ương. Ảnh:&nbsp;<em>Tiến Tuấn.</em></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Với những sai phạm nghi&ecirc;m trọng trong thời gian l&agrave;m Chủ tịch PVN, ng&agrave;y 7/5, Ban Chấp h&agrave;nh Trung ương Đảng đ&atilde; quyết định thi h&agrave;nh kỷ luật &ocirc;ng Đinh La Thăng bằng h&igrave;nh thức cảnh c&aacute;o v&agrave; cho th&ocirc;i giữ chức Ủy vi&ecirc;n Bộ Ch&iacute;nh trị kho&aacute; XII với tỷ lệ phiếu biểu quyết rất cao (tr&ecirc;n 90%).</p>', '2017-05-09 18:51:52', '1494381112.iphone6-32g (1).jpg', 1, '2017-05-09 18:51:52', 'admin'),
(11, 'Monaco bị loại, Mbappe vẫn phá nốt kỷ lục Champions League', 'monaco-bi-loai-mbappe-van-pha-not-ky-luc-champions-league', '<p>Ng&ocirc;i sao trẻ tuổi Kylian Mbappe tiếp tục ghi t&ecirc;n v&agrave;o lịch sử Champions League khi trở th&agrave;nh cầu thủ trẻ nhất khi b&agrave;n ở v&ograve;ng b&aacute;n kết giải đấu n&agrave;y.</p>\r\n\r\n<table align=\"center\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"Monaco bi loai, Mbappe van pha not ky luc Champions League hinh anh 1\" src=\"http://znews-photo-td.zadn.vn/w1024/Uploaded/mdf_Nexqxk/2017_05_10/C_ad1skWsAAlQe4.jpg\" style=\"height:1080px; width:1080px\" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Bằng b&agrave;n thắng r&uacute;t ngắn tỷ số xuống 1-2 trong trận thua Juventus, Kylian Mbappe đi v&agrave;o lịch sử Champions League với tư c&aacute;ch cầu thủ trẻ nhất ghi b&agrave;n ở v&ograve;ng b&aacute;n kết. Anh lập kỷ lục ở mốc 18 tuổi 140 ng&agrave;y.</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<table align=\"center\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"Monaco bi loai, Mbappe van pha not ky luc Champions League hinh anh 2\" src=\"http://znews-photo-td.zadn.vn/w1024/Uploaded/mdf_Nexqxk/2017_05_10/C_ac5VyXsAAbY3y.jpg\" style=\"height:681px; width:1024px\" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Mbappe đ&atilde; ghi 6 b&agrave;n ở v&ograve;ng knock-out m&ugrave;a n&agrave;y, chỉ Ronaldo (8) xếp tr&ecirc;n.</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<table align=\"center\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"Monaco bi loai, Mbappe van pha not ky luc Champions League hinh anh 3\" src=\"http://znews-photo-td.zadn.vn/w1024/Uploaded/mdf_Nexqxk/2017_05_10/C_ag5HmWAAEDii.jpg\" style=\"height:800px; width:1200px\" title=\"Monaco bị loại, Mbappe vẫn phá nốt kỷ lục Champions League hình ảnh 3\" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Mbappe trở th&agrave;nh cầu thủ đầu ti&ecirc;n ghi b&agrave;n v&agrave;o lưới Juventus ở v&ograve;ng knock-out 2016/17, chấm dứt chuỗi 520 ph&uacute;t trắng lưới của B&agrave; đầm gi&agrave;.</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<table align=\"center\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"Monaco bi loai, Mbappe van pha not ky luc Champions League hinh anh 4\" src=\"http://znews-photo-td.zadn.vn/w1024/Uploaded/mdf_Nexqxk/2017_05_10/C_aVusCXgAEDGRo.jpg\" style=\"height:960px; width:960px\" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Kylian Mbappe sinh sau Gianlugi Buffon 7.621 ng&agrave;y, khoảng c&aacute;ch lớn nhất giữa thủ m&ocirc;n v&agrave; tiền đạo trong một trận cầu v&ograve;ng knock-out Champions League.</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<table align=\"center\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"Monaco bi loai, Mbappe van pha not ky luc Champions League hinh anh 5\" src=\"http://znews-photo-td.zadn.vn/w1024/Uploaded/mdf_Nexqxk/2017_05_10/C_abxqiWsAUoAz.jpg\" style=\"height:396px; width:594px\" title=\"Monaco bị loại, Mbappe vẫn phá nốt kỷ lục Champions League hình ảnh 5\" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Kh&ocirc;ng đội n&agrave;o v&agrave;o chung kết Champions League nhiều hơn Juventus (6 lần, ngang AC Milan). Nếu Real Madrid bảo to&agrave;n chiếc v&eacute; chung kết trong trận đấu rạng s&aacute;ng mai, họ sẽ san bằng th&agrave;nh t&iacute;ch của Juve v&agrave; AC Milan.</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<table align=\"center\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"Monaco bi loai, Mbappe van pha not ky luc Champions League hinh anh 6\" src=\"http://znews-photo-td.zadn.vn/w1024/Uploaded/mdf_Nexqxk/2017_05_10/C_agAv9XUAAFUzd.jpg\" style=\"height:800px; width:1200px\" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Đ&acirc;y l&agrave; lần thứ ch&iacute;n Juventus v&agrave;o chung kết c&uacute;p C1/Champions League. Chỉ c&oacute; 3 đội b&oacute;ng vĩ đại xếp tr&ecirc;n về số lần dự trận đấu cuối c&ugrave;ng: Real Madrid (14), AC Milan (11) v&agrave; Bayern Munich (10). Nhưng Juventus đ&atilde; thua đến 6 trong 8 trận trước đ&oacute;.</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<table align=\"center\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"Monaco bi loai, Mbappe van pha not ky luc Champions League hinh anh 7\" src=\"http://znews-photo-td.zadn.vn/w1024/Uploaded/mdf_Nexqxk/2017_05_10/C_akK8EXsAEMKl1.jpg\" style=\"height:612px; width:1024px\" title=\"Monaco bị loại, Mbappe vẫn phá nốt kỷ lục Champions League hình ảnh 7\" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td>B&agrave; đầm gi&agrave; đang trải qua 12 trận bất bại ở đấu trường ch&acirc;u &Acirc;u, th&agrave;nh t&iacute;ch tốt nhất lịch sử đội b&oacute;ng.</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<table align=\"center\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"Monaco bi loai, Mbappe van pha not ky luc Champions League hinh anh 8\" src=\"http://znews-photo-td.zadn.vn/w1024/Uploaded/mdf_Nexqxk/2017_05_10/C_aX2bCXsAAzEfD.jpg\" style=\"height:1080px; width:1080px\" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Juve bất bại 51 trận s&acirc;n nh&agrave; tr&ecirc;n mọi đấu trường. Thất bại gần nhất đến v&agrave;o th&aacute;ng 8 năm 2015. Th&agrave;nh t&iacute;ch cụ thể: 44 thắng, 7 h&ograve;a, ghi 120 b&agrave;n, thủng 31 quả, giữ sạch lưới 32 trận.</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<table align=\"center\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"Monaco bi loai, Mbappe van pha not ky luc Champions League hinh anh 9\" src=\"http://znews-photo-td.zadn.vn/w1024/Uploaded/mdf_Nexqxk/2017_05_10/C_aVBKDXgAIZrbX_1.jpg\" style=\"height:743px; width:1200px\" title=\"Monaco bị loại, Mbappe vẫn phá nốt kỷ lục Champions League hình ảnh 9\" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Monaco l&agrave; đội b&oacute;ng duy nhất ở m&ugrave;a Champions League 2016/17 (t&iacute;nh đến l&uacute;c n&agrave;y) ghi b&agrave;n v&agrave;o lưới Juventus từ t&igrave;nh huống kh&ocirc;ng phải b&oacute;ng chết.</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<table align=\"center\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"Monaco bi loai, Mbappe van pha not ky luc Champions League hinh anh 10\" src=\"http://znews-photo-td.zadn.vn/w1024/Uploaded/mdf_Nexqxk/2017_05_10/C_amjwW0AAUmRv.jpg\" style=\"height:1080px; width:1080px\" title=\"Monaco bị loại, Mbappe vẫn phá nốt kỷ lục Champions League hình ảnh 10\" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Khoảng c&aacute;ch giữa hai b&agrave;n thua gần nhất của Juve ở Champions League l&agrave; 690 ph&uacute;t.</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<table align=\"center\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"Monaco bi loai, Mbappe van pha not ky luc Champions League hinh anh 11\" src=\"http://znews-photo-td.zadn.vn/w1024/Uploaded/mdf_Nexqxk/2017_05_10/C_acp2LWAAAB3ky.jpg\" style=\"height:1080px; width:1080px\" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Dani Alves thi đấu trận chung kết c&uacute;p ch&acirc;u &Acirc;u thứ 14 t&iacute;nh từ năm 2006, nhiều hơn bất kỳ đội b&oacute;ng n&agrave;o ở ch&acirc;u &Acirc;u hiện nay (Barca 12 trận).</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<table align=\"center\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"Monaco bi loai, Mbappe van pha not ky luc Champions League hinh anh 12\" src=\"http://znews-photo-td.zadn.vn/w1024/Uploaded/mdf_Nexqxk/2017_05_10/C_an9X4XYAAE7L.jpg\" style=\"height:1080px; width:1080px\" title=\"Monaco bị loại, Mbappe vẫn phá nốt kỷ lục Champions League hình ảnh 12\" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Thống k&ecirc; trận đấu của Dani Alves: 90% đường chuyền th&agrave;nh c&ocirc;ng, 5 pha tạt b&oacute;ng, 5 lần bị phạm lỗi, tạo 3 cơ hội ngon ăn cho đồng đội, tắc b&oacute;ng th&agrave;nh c&ocirc;ng 2 lần v&agrave; ghi 1 b&agrave;n.</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<table align=\"center\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"Monaco bi loai, Mbappe van pha not ky luc Champions League hinh anh 13\" src=\"http://znews-photo-td.zadn.vn/w1024/Uploaded/mdf_Nexqxk/2017_05_10/C_aIRCEXgAA6hhW.jpg\" style=\"height:683px; width:1024px\" title=\"Monaco bị loại, Mbappe vẫn phá nốt kỷ lục Champions League hình ảnh 13\" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Mario Mandzukic chấm dứt chuỗi 6 trận kh&ocirc;ng ghi b&agrave;n ở Champions League, d&agrave;i nhất sự nghiệp của anh. Tiền đạo người Croatia đ&atilde; c&oacute; 15 b&agrave;n sau 45 trận ra s&acirc;n tại đấu trường n&agrave;y.</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<table align=\"center\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"Monaco bi loai, Mbappe van pha not ky luc Champions League hinh anh 14\" src=\"http://znews-photo-td.zadn.vn/w1024/Uploaded/mdf_Nexqxk/2017_05_10/C_agXKnXcAAPuIn.jpg\" style=\"height:800px; width:1200px\" title=\"Monaco bị loại, Mbappe vẫn phá nốt kỷ lục Champions League hình ảnh 14\" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Mandzukic thắng kh&ocirc;ng chiến 10 lần ở trận đấu với Monaco.</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<table align=\"center\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"Monaco bi loai, Mbappe van pha not ky luc Champions League hinh anh 15\" src=\"http://znews-photo-td.zadn.vn/w1024/Uploaded/mdf_Nexqxk/2017_05_10/C_ab4pxXoAEBmme.jpg\" style=\"height:800px; width:1200px\" title=\"Monaco bị loại, Mbappe vẫn phá nốt kỷ lục Champions League hình ảnh 15\" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Thống k&ecirc; của Barzagli &ndash; Bonucci &ndash; Chiellini trận n&agrave;y: 100% kh&ocirc;ng chiến th&agrave;nh c&ocirc;ng, 20 lần ph&aacute; b&oacute;ng, chỉ 2 pha phạm lỗi.</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<table align=\"center\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"Monaco bi loai, Mbappe van pha not ky luc Champions League hinh anh 16\" src=\"http://znews-photo-td.zadn.vn/w1024/Uploaded/mdf_Nexqxk/2017_05_10/C_ag3saXgAEHLqh.jpg\" style=\"height:800px; width:1200px\" title=\"Monaco bị loại, Mbappe vẫn phá nốt kỷ lục Champions League hình ảnh 16\" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Max Allegri c&ugrave;ng đội b&oacute;ng v&agrave;o chung kết ở 5/6 m&ugrave;a giải c&uacute;p từ khi &ocirc;ng bắt đầu cầm qu&acirc;n Juventus: 3/3 c&uacute;p Italy, 2/3 Champions League.&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', '2017-05-09 18:54:08', '1494381248.ps-now.jpg', 1, '2017-05-09 18:54:08', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `price` varchar(250) NOT NULL,
  `created_date` datetime NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `price` double NOT NULL,
  `created_date` datetime NOT NULL,
  `address` varchar(250) NOT NULL,
  `payment` varchar(250) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

CREATE TABLE `product_image` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `path` varchar(250) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_image`
--

INSERT INTO `product_image` (`id`, `product_id`, `path`, `created_at`, `updated_at`) VALUES
(18, 24, '1494169889.636153414957582419_dell-vostrol-v5468-1o.jpg', '2017-05-07 08:11:29', '2017-05-07 08:11:29'),
(19, 24, '1494169890.xdell-E7450_y6n0-m2.png.pagespeed.ic.VoILRSCcL5.png', '2017-05-07 08:11:30', '2017-05-07 08:11:30'),
(26, 25, '1494236141.to1.jpg', '2017-05-08 02:35:41', '2017-05-08 02:35:41'),
(27, 25, '1494236141.to2.jpg', '2017-05-08 02:35:41', '2017-05-08 02:35:41'),
(29, 23, '1494295880.ga16.jpg', '2017-05-08 19:11:20', '2017-05-08 19:11:20'),
(31, 21, '1495027888.MN022_AV1_SILVER.jpg', '2017-05-17 06:31:28', '2017-05-17 06:31:28'),
(32, 23, '1495028204.samsung-galaxy-s8-plus.png', '2017-05-17 06:36:44', '2017-05-17 06:36:44'),
(33, 23, '1495028490.ga8.png', '2017-05-17 06:41:30', '2017-05-17 06:41:30'),
(34, 25, '1495028752.toshiba.png', '2017-05-17 06:45:52', '2017-05-17 06:45:52'),
(35, 21, '1495033713.iphone7_matt_red_skin.jpg', '2017-05-17 08:08:33', '2017-05-17 08:08:33'),
(36, 21, '1495033713.iPhone-rouge-apple.jpeg', '2017-05-17 08:08:33', '2017-05-17 08:08:33'),
(37, 24, '1495034375.dellhomnay.jpg', '2017-05-17 08:19:35', '2017-05-17 08:19:35');

-- --------------------------------------------------------

--
-- Table structure for table `product_option`
--

CREATE TABLE `product_option` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `sumary` text NOT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `value` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `collection_at` int(11) DEFAULT NULL,
  `salestop_salesoff` varchar(255) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_option`
--

INSERT INTO `product_option` (`id`, `product_id`, `name`, `sumary`, `alias`, `image`, `value`, `user_id`, `created_at`, `updated_at`, `collection_at`, `salestop_salesoff`) VALUES
(7, 24, 'Dell 2017-03', 'Bảo hành: 01 năm, (lỗi kỷ thuật, đổi mới trong 07 ngày đầu)\r\nBộ vi xử lý (CPU): Core i7 6700HQ 2.6GHz\r\nỒ Cứng (HDD): 1TB Hybrid SSHD\r\nBộ nhớ (Ram): 8GB DDR3L\r\nCard Màn Hình (VGA): 4GB Geforce GTX960M\r\nMàn Hình (Display): 15.6inch 4K Touch\r\nHệ điều hành: Windows 10\r\nmàu xám đen (Grey), Brandnew 100% Box.\r\nBảo hành 01 năm.', 'dell-2017-03', '1494169889.636153414957582419_dell-vostrol-v5468-1o.jpg', 19000000, 'admin', '2017-05-08 02:28:36', '2017-05-14 02:07:29', 2, '2'),
(8, 24, 'Dell 2017-02', 'Bảo hành: 01 năm, (lỗi kỷ thuật, đổi mới trong 07 ngày đầu)\r\nBộ vi xử lý (CPU): Core i7 6700HQ 2.6GHz\r\nỒ Cứng (HDD): 1TB Hybrid SSHD\r\nBộ nhớ (Ram): 8GB DDR3L\r\nCard Màn Hình (VGA): 4GB Geforce GTX960M\r\nMàn Hình (Display): 15.6inch 4K Touch\r\nHệ điều hành: Windows 10\r\nmàu xám đen (Grey), Brandnew 100% Box.\r\nBảo hành 01 năm.', 'dell-2017-02', '1494169889.636153414957582419_dell-vostrol-v5468-1o.jpg', 20000000, 'admin', '2017-05-08 02:30:00', '2017-05-14 02:07:22', 2, '2'),
(9, 24, 'Dell 2017-01', 'Bảo hành: 01 năm, (lỗi kỷ thuật, đổi mới trong 07 ngày đầu)\r\nBộ vi xử lý (CPU): Core i7 6700HQ 2.6GHz\r\nỒ Cứng (HDD): 1TB Hybrid SSHD\r\nBộ nhớ (Ram): 8GB DDR3L\r\nCard Màn Hình (VGA): 4GB Geforce GTX960M\r\nMàn Hình (Display): 15.6inch 4K Touch\r\nHệ điều hành: Windows 10\r\nmàu xám đen (Grey), Brandnew 100% Box.\r\nBảo hành 01 năm.', 'dell-2017-01', '1494169889.636153414957582419_dell-vostrol-v5468-1o.jpg', 15000000, 'admin', '2017-05-08 02:32:15', '2017-05-14 02:07:13', 2, '2'),
(13, 23, 'galaxy s8 16GB', '<p>Galaxy S8 được dự đo&aacute;n l&agrave; một si&ecirc;u phẩm m&agrave; Samsung sẽ giới thiệu đến người d&ugrave;ng trong thời gian gần nhất. Theo như h&igrave;nh ảnh của sản phẩm mới được h&eacute; lộ, Samsung S8 sẽ sở hữu một thiết kế ấn tượng, hiệu năng cực kỳ mạnh mẽ v&agrave; tiết kiệm năng lượng, camera sắc n&eacute;t c&ugrave;ng m&agrave;n h&igrave;nh Infinity Display, hứa hẹn sẽ trở th&agrave;nh một đối thủ đ&aacute;ng gờm tr&ecirc;n thị trường smartphone năm 2017.</p>', 'galaxy-s8-16gb.html', '1495028490.ga8.png', 20000000, 'admin', '2017-05-08 19:12:00', '2017-05-17 06:41:41', 1, '1'),
(15, 25, 'Toshiba 32inch', '<p>Thiết kế kim loại chắc chắn, đẹp mắt. T&aacute;i hiện h&igrave;nh ảnh Full HD sắc n&eacute;t, ch&acirc;n thực với CEVO Engine. C&ocirc;ng nghệ Dolby Digital Plus cho &acirc;m thanh v&ograve;m mạnh mẽ, b&ugrave;ng nổ. Giao diện Opera TV đẹp, dễ sử dụng, nhiều t&iacute;nh năng giải tr&iacute;.</p>', 'toshiba-32inch.html', '1495028752.toshiba.png', 7000000, 'admin', '2017-05-08 19:13:14', '2017-05-17 06:46:14', 2, '1'),
(16, 25, 'Toshiba 46inch', '<p>Miễn ph&iacute; c&ocirc;ng lắp đặt. Chỉ t&iacute;nh ph&iacute; vật tư ph&aacute;t sinh (chưa bao gồm trong gi&aacute; b&aacute;n). Xem ph&iacute; vật tư dự kiến. Th&ugrave;ng tivi c&oacute;: S&aacute;ch hướng dẫn, Remote, Ch&acirc;n đế Đổi sản phẩm lỗi miễn ph&iacute; trong 1 th&aacute;ng. Bảo h&agrave;nh ch&iacute;nh h&atilde;ng tivi 2 năm - Xem điểm bảo h&agrave;nh Nếu d&ugrave;ng cho hoạt động kinh doanh (nh&agrave; m&aacute;y, kh&aacute;ch sạn, giặt ủi) th&igrave; kh&ocirc;ng được bảo h&agrave;nh.</p>', 'toshiba-42inch.html', '1495028752.toshiba.png', 10000000, 'admin', '2017-05-08 19:14:16', '2017-05-17 06:46:05', 1, '1'),
(17, 21, 'Iphone 7 Plus Red', '<p>iPhone 7 đỏ 128 GB (iPhone 7 red) ra mắt một c&aacute;ch &acirc;m thầm đầy bất ngờ đ&atilde; khiến người h&acirc;m mộ sửng sốt. Một iPhone 7 mới kh&ocirc;ng n&acirc;ng cấp về cấu h&igrave;nh nhưng mang bộ &aacute;o đỏ rực rỡ v&agrave; đẹp một c&aacute;ch tinh tế khiến bất kỳ ai cũng mơ ước muốn được sở hữu.</p>', 'iphone-7-plus-red.html', '1495027888.MN022_AV1_SILVER.jpg', 20000000, 'admin', '2017-05-09 20:06:02', '2017-05-17 06:48:33', 1, '2');

-- --------------------------------------------------------

--
-- Table structure for table `product_type`
--

CREATE TABLE `product_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_type`
--

INSERT INTO `product_type` (`id`, `name`) VALUES
(1, 'Sản phẩm nổi bật'),
(2, 'Sản phẩm khuyến mãi');

-- --------------------------------------------------------

--
-- Table structure for table `statics`
--

CREATE TABLE `statics` (
  `id` int(11) NOT NULL,
  `code` varchar(250) NOT NULL,
  `value` text NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `statics`
--

INSERT INTO `statics` (`id`, `code`, `value`, `updated_at`) VALUES
(1, 'Giới thiệu', '<p><strong>I. &nbsp;GIỚI THIỆU CHUNG</strong></p>\r\n\r\n<p>- &nbsp;T&ecirc;n c&ocirc;ng ty: C&Ocirc;NG TY TNHH T&Iacute;CH HỢP HỆ THỐNG VINA</p>\r\n\r\n<p>- &nbsp;T&ecirc;n tiếng anh: VINA INTEGRATED SYSTEM</p>\r\n\r\n<p>- &nbsp;T&ecirc;n viết tắt: VNIS</p>\r\n\r\n<p>- &nbsp;Trụ sở ch&iacute;nh: 1041/62/186 Trần Xu&acirc;n Soạn, P.T&acirc;n Hưng, Quận 7, TP.HCM</p>\r\n\r\n<p>- &nbsp;Điện thoại: (84-8) 62987871 | Fax: (84-8) 62987860</p>\r\n\r\n<p>- &nbsp;Chi nh&aacute;nh: 179 Ho&agrave;ng Diệu 2, P.Linh Trung, Quận Thủ Đức, TP.HCM</p>\r\n\r\n<p>- &nbsp;Điện thoại: (84-8) 62987871 | Fax: (84-8) 62987860</p>\r\n\r\n<p>- &nbsp;Email:&nbsp;<a href=\"mailto:info@vnis.vn\">info@vnis.vn</a></p>\r\n\r\n<p>- &nbsp;Website:&nbsp;<a href=\"http://www.vnis.vn/\">www.vnis.vn</a></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>1. &nbsp;Th&ocirc;ng điệp Gi&aacute;m Đốc</strong></p>\r\n\r\n<p>- &nbsp;Bắt đầu năm 2009 C&ocirc;ng Ty VNIS đ&atilde; đặt những vi&ecirc;n gạch nền m&oacute;ng đầu ti&ecirc;n trong lĩnh vực kinh doanh t&iacute;ch hợp hệ thống. Với mục ti&ecirc;u trở th&agrave;nh đơn vị t&iacute;ch hợp chuy&ecirc;n nghiệp.Tr&ecirc;n cơ sở định hướng chiến lược d&agrave;i hạn về c&ocirc;ng nghệ , sản phẫm, dịch vụ v&agrave; nh&acirc;n lực VNIS đ&atilde; nhanh ch&oacute;ng trở th&agrave;nh Nh&agrave; cung cấp giải ph&aacute;p v&agrave; T&iacute;ch hợp h&agrave;ng đầu tại Việt Nam.</p>\r\n\r\n<p>- &nbsp;Tuy mới th&agrave;nh lập nhưng với đội ngũ nh&acirc;n vi&ecirc;n l&agrave; c&aacute;c kỹ sư gi&agrave;u kinh nghiệm, năng động s&aacute;ng tạo v&agrave; chuy&ecirc;n nghiệp, VNIS đ&atilde; cung cấp một tập hợp c&aacute;c sản phẩm v&agrave; dịch vụ phong ph&uacute; , đa dạng từ cung cấp c&aacute;c thiết bị CNTT, tư vấn x&acirc;y dựng giải ph&aacute;p, đến triển khai giải ph&aacute;p tổng thể cho c&aacute;c hệ thống th&ocirc;ng tin điện tử, dịch vụ đ&agrave;o tạo v&agrave; chuyển giao c&ocirc;ng nghệ ti&ecirc;n tiến.</p>\r\n\r\n<p>- &nbsp;Với phương ch&acirc;m &ldquo; Giải ph&aacute;p tin cậy, Dịch vụ ho&agrave;n hảo, C&ocirc;ng nghệ ti&ecirc;n tiến&rdquo;, VNIS cam kết giữ vững l&agrave; nh&agrave; t&iacute;ch hợp hệ thống h&agrave;ng đầu tự tin vươn xa .Niềm tin v&agrave; sự ghi nhận của mỗi đơn vị v&agrave; của cộng đồng l&agrave; động lực to lớn gi&uacute;p ch&uacute;ng t&ocirc;i tiếp tục đ&oacute;ng g&oacute;p những lợi &iacute;ch trực tiếp v&agrave; gi&aacute;n tiếp cho việc ph&aacute;t triển đất nước Việt Nam của ch&uacute;ng ta ng&agrave;y c&agrave;ng thịnh vượng.</p>\r\n\r\n<p><strong>2. &nbsp;Gi&aacute; trị cốt l&otilde;i &ndash; Thế mạnh &amp; Lợi thế cạnh tranh &ndash; Chiến lược ph&aacute;t triển 2009 &ndash; 2015.</strong></p>\r\n\r\n<p>- &nbsp;Gi&aacute; trị cốt l&otilde;i : Điều l&agrave;m n&ecirc;n sự kh&aacute;c biệt v&agrave; l&agrave; gi&aacute; trị cốt l&otilde;i của VNIS l&agrave; C&ocirc;ng Nghệ, trong suốt những năm qua, VNIS đ&atilde; đầu tư rất nhiều cho nghi&ecirc;n cứu v&agrave; ph&aacute;t triển, đến nay c&oacute; rất nhiều những sản phẩm v&agrave; dịch vụ của VNIS c&oacute; gi&aacute; trị.</p>\r\n\r\n<p>- &nbsp;Thế mạnh v&agrave; lợi thế cạnh tranh :Với đội ngũ c&aacute;n bộ c&oacute; năng lực v&agrave; kinh nghiệm đ&atilde; l&agrave;m cho VNIS lu&ocirc;n lu&ocirc;n ti&ecirc;n phong v&agrave; chiếm ưu thuế trong c&aacute;c giải ph&aacute;p CNTT cho c&aacute;c cơ quan.</p>\r\n\r\n<p>- &nbsp;C&oacute; nhiều kinh nghiệm trong triển khai v&agrave; cung cấp c&aacute;c giải ph&aacute;p, dịch vụ CNTT.</p>\r\n\r\n<p>- &nbsp;Thường xuy&ecirc;n nhi&ecirc;n cứu s&acirc;u về nhu cầu nghiệp vụ của kh&aacute;ch h&agrave;ng , &aacute;p dụng hiểu biết của c&aacute;c chuy&ecirc;n gia ng&agrave;nh h&agrave;ng đầu, ứng dụng c&ocirc;ng nghệ hiện đại để x&acirc;y dựng c&aacute;c giải ph&aacute;p thiết thực, b&aacute;m s&aacute;t nhu cầu thực tế.</p>\r\n\r\n<p>- &nbsp;C&oacute; h&agrave;ng trăm chuy&ecirc;n vi&ecirc;n được đ&agrave;o tạo b&agrave;i bản chuy&ecirc;n m&ocirc;n cũng như quản l&yacute;. Được cấp c&aacute;c bằng cấp cao nhất của c&aacute;c đối t&aacute;c c&ocirc;ng nghệ h&agrave;ng đầu thế giới như : Micorosoft, cisco. IBM, &hellip;</p>\r\n\r\n<p>- &nbsp;C&oacute; hệ thống ph&oacute;ng th&iacute; nghiệm c&ocirc;ng nghệ cao về hạ tầng mạng, trung t&acirc;m dữ liệu, hệ thống bảo mật.</p>\r\n\r\n<p>- &nbsp;Nhận được sự hỗ trợ mạnh từ c&aacute;c đối t&aacute;c h&agrave;ng đầu tr&ecirc;n thế giới trong lĩnh vực t&iacute;ch hợp hệ thống , VNIS hiện nay l&agrave; đối t&aacute;c của Micorosoft&hellip;.</p>\r\n\r\n<p>Với thế mạnh tr&ecirc;n c&ugrave;ng với việc lu&ocirc;n ch&uacute; trọng n&acirc;ng cao tỷ trọng cung cấp giải ph&aacute;p v&agrave; dịch vụ c&oacute; h&agrave;m lượng c&ocirc;ng nghệ cao , trong những năm qua VNIS lu&ocirc;n chiếm lĩnh thị trường trọng điểm c&oacute; mức đầu tư v&agrave; ứng dụng CNTT lớn.</p>\r\n\r\n<p>- &nbsp;Chiến lược ph&aacute;t triển : Ph&aacute;t huy thế mạnh m&agrave; một trong những c&ocirc;ng ty cung cấp giải ph&aacute;p v&agrave; dịch vụ t&iacute;ch hợp h&agrave;ng đầu Việt Nam, VNIS đang ph&aacute;t&nbsp; theo hai hướng :</p>\r\n\r\n<p>+ Một l&agrave; : Đầu tư mạnh mẽ v&agrave;o c&aacute;c thị trường c&oacute; nhu cầu lớn, chuy&ecirc;n nghiệp v&agrave; phức tạp về CNTT như : T&agrave;i Ch&iacute;nh, Ng&acirc;n H&agrave;ng, Bảo Hiểm &hellip;.</p>\r\n\r\n<p>+ Hai l&agrave; : Triển khai c&aacute;c dịch vụ hạ tầng v&agrave; giải ph&aacute;p chuy&ecirc;n nghiệp phục vụ theo chiều ngang tới cả những kh&aacute;ch h&agrave;ng như c&aacute;c doanh nghiệp lớn, khối ch&iacute;nh phủ, dịch vụ c&ocirc;ng, Gi&aacute;o dục v&agrave; Đ&agrave;o tạo.</p>\r\n\r\n<p>- &nbsp;VNIS với tư c&aacute;ch l&agrave; đơn vị t&iacute;ch hợp hệ thống , sẽ l&agrave; đầu mối của cả tập đo&agrave;n c&ocirc;ng nghệ th&ocirc;ng tin để cung cấp những giải ph&aacute;p tổng thể v&agrave; trọn g&oacute;i cho kh&aacute;ch h&agrave;ng.</p>\r\n\r\n<p>- &nbsp;X&acirc;y dựng v&agrave; ph&aacute;t triển t&iacute;nh chuy&ecirc;n nghiệp của lực lượng nh&acirc;n sự tr&ecirc;n nền năng lực của c&aacute;c nh&acirc;n vi&ecirc;n c&oacute; tr&igrave;nh độ cao, được huấn luyện v&agrave; đ&agrave;o tạo b&agrave;i bản trong nội b&ocirc; của c&aacute;c đối t&aacute;c.</p>\r\n\r\n<p>- &nbsp;&Aacute;p dụng những kinh nghiệm đ&atilde; t&iacute;ch lũy trong nhiều năm triển khai nhiều dự &aacute;n th&agrave;nh c&ocirc;ng, VNIS sẽ lu&ocirc;n đem lại cho kh&aacute;ch h&agrave;ng sự cập nhật mới nhất , hợp l&yacute; nhất về c&ocirc;ng nghệ v&agrave; giải ph&aacute;p.</p>', '2017-05-16 23:22:38'),
(2, 'Địa chỉ liên hệ', '<p>C&Ocirc;NG TY TNHH T&Iacute;CH HỢP HỆ THỐNG VINA</p>\r\n\r\n<p>Văn Ph&ograve;ng: 3/25/5A1, Đường 182, P.Tăng Nhơn Ph&uacute; A, Q9, TP.HCM</p>\r\n\r\n<p>Chi Nh&aacute;nh: 179 Ho&agrave;ng Diệu 2, P.Linh Trung, Q.Thủ Đức, TP.HCM</p>\r\n\r\n<p>Điện Thoại: 08-62987871 Fax: 08-62987860</p>\r\n\r\n<p>Email: info@vinacorp.net</p>\r\n\r\n<p>Hoặc gởi Email về cho C&ocirc;ng ty theo biểu mẫu như tr&ecirc;n.</p>', '2017-05-17 06:15:08'),
(3, 'Hướng dẫn mua hàng', '<p>Lưu &yacute;: &nbsp;Với c&aacute;c sản phẩm Giờ v&agrave;ng, Gi&aacute; sốc d&agrave;nh ri&ecirc;ng cho Online, để đơn h&agrave;ng được hợp lệ, Qu&yacute; kh&aacute;ch vui l&ograve;ng đặt h&agrave;ng trực tuyến tr&ecirc;n website mediamart.vn theo hướng dẫn n&agrave;y. Nh&acirc;n vi&ecirc;n b&aacute;n h&agrave;ng Online sẽ kiểm tra v&agrave; x&aacute;c nhận th&ocirc;ng tin đơn h&agrave;ng với Qu&yacute; kh&aacute;ch.</p>\r\n\r\n<p>Ch&uacute;c Qu&yacute; kh&aacute;ch h&agrave;i l&ograve;ng với c&aacute;c sản phẩm v&agrave; dịch vụ của Vinacorp !</p>', '2017-05-16 23:53:44'),
(4, 'Hướng dẫn thanh toán', '<p>Phương thức Giao h&agrave;ng - Trả tiền mặt chỉ &aacute;p dụng đối với những khu vực ch&uacute;ng t&ocirc;i hỗ trợ giao nhận miễn ph&iacute; (tham khảo th&ecirc;m ch&iacute;nh s&aacute;ch giao nhận) hoặc trả tiền mua h&agrave;ng trực tiếp tại Vinacorp</p>', '2017-05-16 23:54:47');

-- --------------------------------------------------------

--
-- Table structure for table `supports`
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
-- Dumping data for table `supports`
--

INSERT INTO `supports` (`id`, `name`, `value`, `type`, `type_name`, `updated_at`) VALUES
(1, 'Email liên hệ', 'support@vinacorp.net', 0, 'Cố định', '2017-05-17 05:46:49'),
(2, 'Địa chỉ trụ sở chính', '3/25/5A1, Đường 182, P.Tăng Nhơn Phú A, Q9, TP.HCM', 0, 'Cố định', '2017-05-17 06:02:25'),
(3, 'Điện thoại liên hệ', '090 974 72 35', 0, 'Cố định', '2017-05-17 05:47:09'),
(4, 'Mr Tieng', '090 974 72 35', 1, 'Kinh doanh', '2017-05-17 12:59:49'),
(5, 'Mr Loc', '0122 45 67 89', 1, 'Kinh doanh', '2017-05-17 06:01:25');

-- --------------------------------------------------------

--
-- Table structure for table `vnc_product`
--

CREATE TABLE `vnc_product` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `is_hot` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT '1',
  `user_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `vnc_product`
--

INSERT INTO `vnc_product` (`id`, `title`, `alias`, `description`, `category_id`, `created_at`, `is_hot`, `updated_at`, `is_active`, `user_id`) VALUES
(21, 'IPhone7', 'iphone7', '<p>Model n&agrave;y nằm trong nh&oacute;m sản phẩm Product Red mang thương hiệu Apple, mặc d&ugrave; đ&acirc;y mới l&agrave; lần đầu ti&ecirc;n n&oacute; được đưa l&ecirc;n iPhone. Phi&ecirc;n bản iPhone mới c&oacute; m&agrave;u đỏ nhưng kh&ocirc;ng qu&aacute; ch&oacute;i như một số model từng c&oacute; mặt tr&ecirc;n thị trường, chẳng hạn Lumia của Nokia.</p>\r\n\r\n<p><img alt=\"Apple chinh thuc gioi thieu iPhone 7 ban mau do hinh anh 1\" src=\"http://znews-photo-td.zadn.vn/w660/Uploaded/Aohuouk/2017_03_21/a5_1.jpg\" style=\"height:1300px; width:1142px\" />Viền trước của m&aacute;y vẫn giữ m&agrave;u trắng giống bản m&agrave;u v&agrave;ng v&agrave; v&agrave;ng hồng.</p>\r\n\r\n<p>Về kiểu d&aacute;ng, iPhone mới m&agrave;u đỏ kh&ocirc;ng kh&aacute;c biệt so với c&aacute;c m&agrave;u sắc c&ograve;n lại.</p>\r\n\r\n<p>Phi&ecirc;n bản iPhone 7 m&agrave;u đỏ m&aacute;u c&oacute; gi&aacute; b&aacute;n 749 USD v&agrave; 849 USD cho c&aacute;c bản 128 v&agrave; 256 GB trong khi model m&agrave;n h&igrave;nh lớn c&oacute; gi&aacute; 869 v&agrave; 969 USD cho c&aacute;c bản dung lượng tương tự.</p>\r\n\r\n<p>Apple ch&iacute;nh thức cho đặt h&agrave;ng sản phẩm từ ng&agrave;y 24/3.</p>\r\n\r\n<p>Như vậy, iPhone 7, 7 Plus sẽ c&oacute; tất cả 6 m&agrave;u gồm đen nh&aacute;m, đen b&oacute;ng, v&agrave;ng, v&agrave;ng hồng, trắng v&agrave; m&agrave;u đỏ. Trong đ&oacute;, m&agrave;u đen b&oacute;ng v&agrave; đỏ chỉ c&oacute; c&aacute;c bản 128 v&agrave; 256 GB.</p>\r\n\r\n<p>B&ecirc;n cạnh đ&oacute;, T&aacute;o khuyết cũng n&acirc;ng cấp gấp đ&ocirc;i dung lượng lưu trữ cho chiếc iPhone SE, b&aacute;n ra với gi&aacute; kh&ocirc;ng đổi. iPhone SE giờ đ&acirc;y c&oacute; c&aacute;c bản 32 v&agrave; 128 GB, gi&aacute; từ 399 USD.</p>\r\n\r\n<p>Mặc d&ugrave; đ&oacute;n th&ecirc;m th&agrave;nh vi&ecirc;n mới nhưng đ&acirc;y chỉ l&agrave; một thay đổi nhỏ của Apple tăng sức h&uacute;t của sản phẩm. Nếu muốn một thứ g&igrave; đ&oacute; mới mẻ, người d&ugrave;ng c&oacute; thể phải đợi th&aacute;ng 9 &ndash; khi h&atilde;ng tr&igrave;nh l&agrave;ng iPhone 8.</p>\r\n\r\n<p>Thiết bị n&agrave;y được cho sở hữu m&agrave;n h&igrave;nh OLED, thiết kế tr&agrave;n viền với t&iacute;nh năng sạc kh&ocirc;ng d&acirc;y c&ugrave;ng nhiều n&acirc;ng cấp kh&aacute;c.</p>\r\n\r\n<p><img alt=\"Apple chinh thuc gioi thieu iPhone 7 ban mau do hinh anh 2\" src=\"http://znews-photo-td.zadn.vn/w660/Uploaded/Aohuouk/2017_03_21/a1_1.jpg\" style=\"height:643px; width:1068px\" />M&aacute;y chỉ c&oacute; c&aacute;c phi&ecirc;n bản 128 v&agrave; 256 GB.<img alt=\"Apple chinh thuc gioi thieu iPhone 7 ban mau do hinh anh 3\" src=\"http://znews-photo-td.zadn.vn/w660/Uploaded/Aohuouk/2017_03_21/a2_1.jpg\" style=\"height:643px; width:1068px\" title=\"Apple chính thức giới thiệu iPhone 7 bản màu đỏ hình ảnh 3\" />Bộ đ&ocirc;i iPhone mới cho đặt trước từ ng&agrave;y 24/3, chưa r&otilde; ng&agrave;y l&ecirc;n kệ.<img alt=\"Apple chinh thuc gioi thieu iPhone 7 ban mau do hinh anh 4\" src=\"http://znews-photo-td.zadn.vn/w660/Uploaded/Aohuouk/2017_03_21/a3_1.jpg\" style=\"height:711px; width:1142px\" title=\"Apple chính thức giới thiệu iPhone 7 bản màu đỏ hình ảnh 4\" />Theo th&ocirc;ng lệ, m&agrave;u mới của iPhone lu&ocirc;n c&oacute; sức h&uacute;t đặc biệt với người d&ugrave;ng.</p>', 12, '2017-05-07 05:31:31', 1, '2017-05-17 08:08:32', 1, 'admin'),
(23, 'Samsung Galaxy S8 Plus', 'samsung-galaxy-s8-plus', '<h3>Th&ocirc;ng số kỹ thuật</h3>\r\n\r\n<ul>\r\n	<li>Th&ocirc;ng số cơ bản</li>\r\n	<li>M&agrave;n h&igrave;nh :5.8 inch Super AMOLED (2560 x 1440 pixel)</li>\r\n	<li>Camera :Ch&iacute;nh: 12.0 MP, Phụ: 8.0 MP</li>\r\n	<li>RAM :4 GB</li>\r\n	<li>Bộ nhớ trong :64 GB</li>\r\n	<li>Hệ điều h&agrave;nh :Android 7.0 (Nougat)</li>\r\n	<li>Chipset :Exynos 8895</li>\r\n	<li>CPU :L&otilde;i T&aacute;m (l&otilde;i Tứ 2.3GHz + l&otilde;i Tứ 1.7GHz), 64 bit, vi xử l&yacute; 10nm</li>\r\n	<li>K&iacute;ch thước :148.9 x 68.1 x 8.0mm</li>\r\n	<li>GPU :Mali&trade; G71</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3>H&igrave;nh ảnh thực tế</h3>\r\n\r\n<p><img alt=\"\" src=\"data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7\" title=\"\" /></p>\r\n\r\n<p><img alt=\"\" src=\"https://cdn.fptshop.com.vn/Uploads/Originals/2017/5/13/636302672769210253_SAMSUNG-GALAXY-S8%20(10).JPG\" title=\"\" /></p>\r\n\r\n<p><img alt=\"\" src=\"data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7\" title=\"\" /></p>\r\n\r\n<p><img alt=\"\" src=\"data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7\" title=\"\" /></p>\r\n\r\n<p><img alt=\"\" src=\"data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7\" title=\"\" /></p>\r\n\r\n<p><img alt=\"\" src=\"data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7\" title=\"\" /></p>\r\n\r\n<p><img alt=\"\" src=\"data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7\" title=\"\" /></p>\r\n\r\n<p><img alt=\"\" src=\"data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7\" title=\"\" /></p>\r\n\r\n<p><img alt=\"\" src=\"data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7\" title=\"\" /></p>\r\n\r\n<p><img alt=\"\" src=\"data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7\" title=\"\" /></p>\r\n\r\n<p><img alt=\"\" src=\"data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7\" title=\"\" /></p>\r\n\r\n<p><img alt=\"\" src=\"data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7\" title=\"\" /></p>\r\n\r\n<p><img alt=\"\" src=\"data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7\" title=\"\" /></p>\r\n\r\n<p><img alt=\"\" src=\"data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7\" title=\"\" /></p>\r\n\r\n<p><img alt=\"636302672769210253_SAMSUNG-GALAXY-S8 (10).JPG\" src=\"https://cdn.fptshop.com.vn/Uploads/Thumbs/2017/5/13/636302672769210253_SAMSUNG-GALAXY-S8%20(10).JPG\" title=\"636302672769210253_SAMSUNG-GALAXY-S8 (10).JPG\" /><img alt=\"636302672769366254_SAMSUNG-GALAXY-S8 (11).JPG\" src=\"https://cdn.fptshop.com.vn/Uploads/Thumbs/2017/5/13/636302672769366254_SAMSUNG-GALAXY-S8%20(11).JPG\" title=\"636302672769366254_SAMSUNG-GALAXY-S8 (11).JPG\" /><img alt=\"636302672769990258_SAMSUNG-GALAXY-S8 (12).JPG\" src=\"https://cdn.fptshop.com.vn/Uploads/Thumbs/2017/5/13/636302672769990258_SAMSUNG-GALAXY-S8%20(12).JPG\" title=\"636302672769990258_SAMSUNG-GALAXY-S8 (12).JPG\" /><img alt=\"636302672768430248_SAMSUNG-GALAXY-S8 (9).JPG\" src=\"https://cdn.fptshop.com.vn/Uploads/Thumbs/2017/5/13/636302672768430248_SAMSUNG-GALAXY-S8%20(9).JPG\" title=\"636302672768430248_SAMSUNG-GALAXY-S8 (9).JPG\" /><img alt=\"636302672767650243_SAMSUNG-GALAXY-S8 (7).JPG\" src=\"https://cdn.fptshop.com.vn/Uploads/Thumbs/2017/5/13/636302672767650243_SAMSUNG-GALAXY-S8%20(7).JPG\" title=\"636302672767650243_SAMSUNG-GALAXY-S8 (7).JPG\" /><img alt=\"636302672767338241_SAMSUNG-GALAXY-S8 (8).JPG\" src=\"https://cdn.fptshop.com.vn/Uploads/Thumbs/2017/5/13/636302672767338241_SAMSUNG-GALAXY-S8%20(8).JPG\" title=\"636302672767338241_SAMSUNG-GALAXY-S8 (8).JPG\" /><img alt=\"636302672762814212_SAMSUNG-GALAXY-S8 (2).JPG\" src=\"https://cdn.fptshop.com.vn/Uploads/Thumbs/2017/5/13/636302672762814212_SAMSUNG-GALAXY-S8%20(2).JPG\" title=\"636302672762814212_SAMSUNG-GALAXY-S8 (2).JPG\" /><img alt=\"636302672762814212_SAMSUNG-GALAXY-S8 (6).JPG\" src=\"https://cdn.fptshop.com.vn/Uploads/Thumbs/2017/5/13/636302672762814212_SAMSUNG-GALAXY-S8%20(6).JPG\" title=\"636302672762814212_SAMSUNG-GALAXY-S8 (6).JPG\" /><img alt=\"636302672762658211_SAMSUNG-GALAXY-S8 (5).JPG\" src=\"https://cdn.fptshop.com.vn/Uploads/Thumbs/2017/5/13/636302672762658211_SAMSUNG-GALAXY-S8%20(5).JPG\" title=\"636302672762658211_SAMSUNG-GALAXY-S8 (5).JPG\" /><img alt=\"636302672762658211_SAMSUNG-GALAXY-S8 (4).JPG\" src=\"https://cdn.fptshop.com.vn/Uploads/Thumbs/2017/5/13/636302672762658211_SAMSUNG-GALAXY-S8%20(4).JPG\" title=\"636302672762658211_SAMSUNG-GALAXY-S8 (4).JPG\" /><img alt=\"636302672762034207_SAMSUNG-GALAXY-S8 (3).JPG\" src=\"https://cdn.fptshop.com.vn/Uploads/Thumbs/2017/5/13/636302672762034207_SAMSUNG-GALAXY-S8%20(3).JPG\" title=\"636302672762034207_SAMSUNG-GALAXY-S8 (3).JPG\" /><img alt=\"636302672761722205_SAMSUNG-GALAXY-S8 (1).JPG\" src=\"https://cdn.fptshop.com.vn/Uploads/Thumbs/2017/5/13/636302672761722205_SAMSUNG-GALAXY-S8%20(1).JPG\" title=\"636302672761722205_SAMSUNG-GALAXY-S8 (1).JPG\" /></p>\r\n\r\n<h3><a href=\"https://fptshop.com.vn/phu-kien/dien-thoai/samsung-galaxy-s8\">Xem phụ kiện tương th&iacute;ch</a></h3>\r\n\r\n<ul>\r\n	<li><a href=\"https://fptshop.com.vn/phu-kien/bo-phat-wifi-di-dong-4g-m7300\"><img alt=\"\" src=\"https://cdn.fptshop.com.vn/Uploads/Thumbs/2017/3/1/636239584512998318_HAPK-BO-PHAT-WIFI-DI-DONG-4G-M7300-00328362.png\" title=\"\" /></a>\r\n\r\n	<h3><a href=\"https://fptshop.com.vn/phu-kien/bo-phat-wifi-di-dong-4g-m7300\">Bộ ph&aacute;t wifi di động 4G M7300</a></h3>\r\n	<strong>1.850.000đ</strong></li>\r\n	<li><a href=\"https://fptshop.com.vn/phu-kien/loa-remax-bluetooth-cao-cap-rb-m8\"><img alt=\"\" src=\"https://cdn.fptshop.com.vn/Uploads/Thumbs/2017/3/1/636239583572528579_HAPK-LOA-REMAX-BLUETOOTH-CAO-CAP-RB-M8-00328361.png\" title=\"\" /></a>\r\n	<h3><a href=\"https://fptshop.com.vn/phu-kien/loa-remax-bluetooth-cao-cap-rb-m8\">Loa Remax Bluetooth cao cấp RB-M8</a></h3>\r\n	<strong>1.599.000đ</strong></li>\r\n	<li><a href=\"https://fptshop.com.vn/phu-kien/bo-phat-wifi-di-dong-3g-m5350\"><img alt=\"\" src=\"https://cdn.fptshop.com.vn/Uploads/Thumbs/2016/11/30/636161169010256166_HAPK-BO-PHAT-WIFI-DI-DONG-3G-M5350-00292209.png\" title=\"\" /></a>\r\n	<h3><a href=\"https://fptshop.com.vn/phu-kien/bo-phat-wifi-di-dong-3g-m5350\">Bộ ph&aacute;t wifi di động 3G M5350</a></h3>\r\n	<strong>1.499.000đ</strong></li>\r\n	<li><a href=\"https://fptshop.com.vn/phu-kien/sac-dung-khong-day-samsung\"><img alt=\"\" src=\"https://cdn.fptshop.com.vn/Uploads/Thumbs/2016/9/14/636094447296570634_HMPK-SAC-DUNG-KHONG-DAY-SAMSUNG-00255486.png\" title=\"\" /></a>\r\n	<h3><a href=\"https://fptshop.com.vn/phu-kien/sac-dung-khong-day-samsung\">Sạc đứng kh&ocirc;ng d&acirc;y Samsung</a></h3>\r\n	<strong>1.449.000đ</strong></li>\r\n</ul>\r\n\r\n<h3>Đ&aacute;nh gi&aacute; chi tiết</h3>\r\n\r\n<p><img src=\"https://cdn.fptshop.com.vn/Uploads/Originals/2017/4/17/636280340250578000_1o-Recovered.jpg\" /></p>\r\n\r\n<p>Galaxy S8 được dự đo&aacute;n l&agrave; một si&ecirc;u phẩm m&agrave; Samsung sẽ giới thiệu đến người d&ugrave;ng trong thời gian gần nhất. Theo như h&igrave;nh ảnh của sản phẩm mới được h&eacute; lộ, Samsung S8 sẽ sở hữu một thiết kế ấn tượng, hiệu năng cực kỳ mạnh mẽ v&agrave; tiết kiệm năng lượng, camera sắc n&eacute;t c&ugrave;ng m&agrave;n h&igrave;nh Infinity Display, hứa hẹn sẽ trở th&agrave;nh một đối thủ đ&aacute;ng gờm tr&ecirc;n thị trường smartphone năm 2017.</p>', 15, '2017-05-07 05:52:37', 1, '2017-05-17 06:41:29', 1, 'admin'),
(24, 'Dell 2017', 'dell-2017', '<p>Nếu bạn đang t&igrave;m kiếm một chiếc&nbsp;<a href=\"http://vitinhhoangkhang.net/laptop-2-1-125304.html\">laptop&nbsp;</a>c&oacute; cấu h&igrave;nh &ldquo;khủng&rdquo; với mục đ&iacute;ch phục vụ nhu cầu l&agrave;m việc v&agrave; giải tr&iacute; hạng nặng th&igrave; d&ograve;ng laptop x&aacute;ch tay&nbsp;<strong>Dell Inspiron 5559 i7</strong>&nbsp;ho&agrave;n to&agrave;n ph&ugrave; hợp với nhu cầu của bạn. Sau khi xem x&eacute;t v&agrave; kiểm tra chắc chắn cấu h&igrave;nh của m&aacute;y, ch&uacute;ng t&ocirc;i khẳng định Dell N5559 l&agrave; một&nbsp; &ldquo; qu&aacute;i th&uacute;&rdquo; thực sự bởi laptop x&aacute;ch tay được trang bị chip Intel Core i7 thế hệ 6500U k&egrave;m dung lương RAM hổ trơ l&ecirc;n đến 8GB mang đến cho bạn mọi t&aacute;c vụ phức tạp trở n&ecirc;n dễ d&agrave;ng v&agrave; mượt m&agrave;. H&atilde;y c&ugrave;ng Ho&agrave;ng Khang kh&aacute;m ngay chiếc laptop x&aacute;ch tay m&agrave;n h&igrave;nh 15.6 inchs cấu h&igrave;nh &ldquo;Khủng&rdquo; n&agrave;y nh&eacute; c&aacute;c bạn.<br />\r\n<br />\r\n<strong>Thiết kế phong c&aacute;ch.</strong></p>\r\n\r\n<p><img alt=\"Dell Inspiron 15 N5559D\" src=\"https://cdn-img-v2.webbnc.net/uploadv2/web/29/2995/product/2016/09/30/06/30/1475217309_dell-inspiron-15-n5559d.jpg\" title=\"Dell Inspiron 15 N5559D\" /></p>\r\n\r\n<p>M&aacute;y t&iacute;nh laptop&nbsp;<a href=\"http://vitinhhoangkhang.net/dell-inspiron-15-n5559di76500u-8g-1tb-vga-r5-m335-2gb-dvdrw-156-1-1-446376.html\">Dell Inspiron 5559D</a>&nbsp;sỡ hữu thiết kế mỏng, nhỏ gọn những vẫn c&oacute; vẻ đẹp mạnh mẽ, chắc chắn. Đồng thời, c&aacute;c g&oacute;c cạnh được bo tr&ograve;n mềm mại mang đến một thiết kế tinh tế thẩm mĩ cao. Hơn nữa, m&aacute;y chỉ nặng 2.3 kg trọng lượng cho ph&eacute;p bạn di chuyển dễ d&agrave;ng m&agrave; kh&ocirc;ng gặp ch&uacute;t trở ngại n&agrave;o.<br />\r\n<br />\r\n<strong>Bộ xử l&yacute; hiệu năng.</strong></p>\r\n\r\n<p><img alt=\"Dell Inspiron 15 N5559D-2\" src=\"https://cdn-img-v2.webbnc.net/uploadv2/web/29/2995/product/2016/09/30/06/30/1475217315_dell-inspiron-15-n5559d-2.jpg\" title=\"Dell Inspiron 15 N5559D-2\" /></p>\r\n\r\n<p>Mang trong m&igrave;nh biệt danh &ldquo;Qu&aacute;i th&uacute;&rdquo; , laptop x&aacute;ch tay Dell N5559 i7 được trang bị cấu h&igrave;nh mạnh mẽ với chip intel core i7 được t&iacute;ch hợp tr&ecirc;n m&aacute;y với tốc xung nhịp l&ecirc;n đến 3.1GHz&nbsp;vượt trội m&agrave; kh&ocirc;ng đối thủ n&agrave;o s&aacute;nh bằng ở ph&acirc;n kh&uacute;c laptop phổ th&ocirc;ng. Đồng thời,&nbsp;<strong>Dell Inspiron 5559 i7&nbsp;</strong>hổ trợ dung lượng RAM 8GB cho m&aacute;y xử l&yacute; những t&aacute;c vụ đa nhiệm mượt m&agrave;. Card đồ họa rời AMD R5 M335 2GB sẽ gi&uacute;p cho những người chơi game h&agrave;i l&ograve;ng khi n&oacute; chạy tốt những game 3D nặng như PES 2014, Need for Speed, &hellip;<br />\r\n<br />\r\n<strong>M&agrave;n h&igrave;nh rộng 15.6 inchs.</strong></p>\r\n\r\n<p><img alt=\"Dell Inspiron 15 N5559D-1\" src=\"https://cdn-img-v2.webbnc.net/uploadv2/web/29/2995/product/2016/09/30/06/30/1475217312_dell-inspiron-15-n5559d-1.jpg\" title=\"Dell Inspiron 15 N5559D-1\" /></p>\r\n\r\n<p>M&aacute;y t&iacute;nh&nbsp;<a href=\"http://vitinhhoangkhang.net/dell-2-1-125313.html\">Laptop Dell</a>&nbsp;5559 sở hữu m&agrave;n h&igrave;nh k&iacute;ch thước 15,6 inch độ ph&acirc;n giải 1366 x 768 pixel, mang đến h&igrave;nh ảnh sắc n&eacute;t, sống động nhất, phục vụ tốt nhất cho c&ocirc;ng việc cũng như những ph&uacute;t gi&acirc;y giải tr&iacute; th&uacute; vị. Hơn nữa, c&ocirc;ng nghệ m&agrave;n h&igrave;nh Truelife LED-Backlit Display cho chất lượng h&igrave;nh ảnh chi tiết đến từng điểm ảnh nhỏ v&igrave; vậy bạn c&oacute; thể l&agrave;m việc trong thời gian d&agrave;i với m&agrave;n h&igrave;nh khả năng ch&oacute;ng l&oacute;a hiệu quả.<br />\r\n<br />\r\n<strong>B&agrave;n ph&iacute;m hiện đại.</strong><br />\r\nB&agrave;n ph&iacute;m tr&ecirc;n m&aacute;y t&iacute;nh x&aacute;ch tay&nbsp;<strong>Dell Inspiron 5559 i7&nbsp;</strong>được thiết kế theo kiểu chiclet hiện đại, c&aacute;c ph&iacute;m c&oacute; khoảng c&aacute;ch hợp l&yacute;, độ nảy tốt gi&uacute;p bạn thao t&aacute;c c&ocirc;ng việc văn ph&ograve;ng th&ecirc;m nhanh ch&oacute;ng v&agrave; ch&iacute;nh x&aacute;c. B&ecirc;n cạnh đ&oacute;, TouchPad được thiết kế rộng v&agrave; nhạy, hỗ trợ nhiều thao t&aacute;c kh&aacute;c nhau để bạn thoải m&aacute;i nhất khi l&agrave;m việc hay lướt web.<br />\r\nNgo&agrave;i ra,&nbsp;<a href=\"http://vitinhhoangkhang.net/\">m&aacute;y t&iacute;nh x&aacute;ch tay</a>&nbsp;Dell Inspiron N5559D sử dụng c&ocirc;ng nghệ &acirc;m thanh Waves MaxxAudio 2.0 gi&uacute;p cải thiện tốt hơn &acirc;m thanh loa ngo&agrave;i đồng thời gi&uacute;p &acirc;m lượng to hơn nhưng vẫn kh&ocirc;ng thay đổi về chất lượng. Nhờ đ&oacute;, bạn sẽ c&oacute; những ph&uacute;t gi&acirc;y thật tuyệt vời c&ugrave;ng những giai điệu &acirc;m nhạc hay những bộ phim &ldquo;đỉnh&rdquo; nhất hiện nay.<br />\r\n<br />\r\n<strong>Kết luận:</strong><br />\r\nỞ tr&ecirc;n l&agrave; một số th&ocirc;ng tin của con &ldquo;Qu&aacute;i th&uacute;&rdquo;&nbsp;&nbsp;<strong>Dell Inspiron 5559 i7&nbsp;</strong>. Với một mức gi&aacute; tưng xứng hợp l&yacute; tr&ecirc;n 17 triệu đồng chắn chắn rằng bạn sẽ h&agrave;i l&ograve;ng với những g&igrave; m&agrave; laptop x&aacute;ch tay mang lại. Để biết th&ocirc;ng tin chi tiết của m&aacute;y t&iacute;nh laptop Dell Inspiron N5559D bạn c&oacute; thể tham khảo th&ecirc;m dell.com, h&atilde;y nhanh tay đặt h&agrave;ng!</p>', 14, '2017-05-07 08:11:29', 1, '2017-05-17 08:19:35', 1, 'admin'),
(25, 'Toshiba', 'toshiba', '<h2>SMART TIVI TOSHIBA 49 INCH 49U9650VN - ĐỈNH CAO H&Igrave;NH ẢNH HIỂN THỊ SẮC N&Eacute;T</h2>\r\n\r\n<p>Một kh&ocirc;ng kh&iacute; ấm c&uacute;ng đo&agrave;n vi&ecirc;n khi cả gia đ&igrave;nh ngồi quay quần b&ecirc;n nhau trước chiếc ti vi m&agrave;n h&igrave;nh rộng để xem c&aacute;c chương tr&igrave;nh ca nhạc, h&agrave;i, hay c&aacute;c bộ phim kinh điển, c&aacute;c chương tr&igrave;nh giải tr&iacute;... v&agrave;o dịp cuối tuần. H&atilde;y nhanh tay sở hữu ngay chiếc Tivi LED Toshiba 49U9650VN UHD m&agrave;n h&igrave;nh cực lớn 49 inch với khả năng hiển thị h&igrave;nh ảnh đẹp ấn tượng sắc n&eacute;t ch&acirc;n thật từng chi tiết. Giao diện tivi đơn giản th&acirc;n thiện với người d&ugrave;ng, kết nối wifi, intertet dễ d&agrave;ng. Đặc biệt, chiếc Tivi LED Toshiba 49U9650VN UHD sẽ đem đến cho bạn trải nghiệm mới với với t&iacute;nh năng chiếu m&agrave;n h&igrave;nh điện thoại l&ecirc;n tivi để chia sẽ h&igrave;nh ảnh m&agrave; kh&ocirc;ng cần d&acirc;y c&aacute;p.&nbsp;</p>\r\n\r\n<h3>ĐẶC ĐIỂM NỔI BẬT</h3>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Thiết kế si&ecirc;u mỏng, m&agrave;n h&igrave;nh 49 inch độ ph&acirc;n giải full HD r&otilde; r&agrave;ng, sắc n&eacute;t</p>\r\n	</li>\r\n	<li>\r\n	<p>Hỗ trợ c&aacute;c kết nối USB , kết nối HDMI, t&iacute;ch hợp bộ thu DVB-T2</p>\r\n	</li>\r\n	<li>\r\n	<p>Ultra HD 4K Panel v&agrave; bộ vi xử l&yacute; CEVO 4K Engine cho chất lượng h&igrave;nh ảnh vượt trội</p>\r\n	</li>\r\n	<li>\r\n	<p>C&ocirc;ng nghệ Dolby Digital Plus cho &acirc;m thanh v&ograve;m sống động</p>\r\n	</li>\r\n	<li>Tivi th&ocirc;ng minh với kho ứng dụng Opera TV đặc sắc</li>\r\n</ul>\r\n\r\n<p><img alt=\"Tivi LED Toshiba 49U9650VN UHD màn hình 49 inch giá tốt tại nguyenkim.com\" src=\"http://static.nguyenkimmall.com/images/companies/_1/Content/dien-tu/Tivi/toshiba/smart-tivi-toshiba-49-inch-49u9650vn-1_1.jpg\" /></p>\r\n\r\n<h2>CHI TIẾT T&Iacute;NH NĂNG</h2>\r\n\r\n<h3>Chất lượng hiển thị h&igrave;nh ảnh ấn tượng, sắc n&eacute;t</h3>\r\n\r\n<p>Tivi LED Toshiba 49U9650VN UHD sở hữu m&agrave;n h&igrave;nh rộng&nbsp;49 inch&nbsp;c&ugrave;ng độ ph&acirc;n giải n&acirc;ng l&ecirc;n&nbsp;Ultra HD 4K, mang đến chất lượng hiển thị sống động, sắc n&eacute;t. B&ecirc;n cạnh đ&oacute;, để tăng cường chất lượng h&igrave;nh ảnh, m&agrave;u sắc, tivi Toshiba đ&atilde; t&iacute;ch hợp c&ocirc;ng nghệ CEVO Engine Premium cho khả năng xử l&yacute; t&iacute;n hiệu gi&uacute;p chất lượng h&igrave;nh ảnh lu&ocirc;n được t&aacute;i tạo một c&aacute;ch ch&acirc;n thực v&agrave; sống động, m&agrave;u da của con người cũng được thể hiện ch&iacute;nh x&aacute;c.</p>\r\n\r\n<p><img alt=\"Tivi LED Toshiba 49U9650VN UHD hình ảnh hiển thị sắc nét, độ phân giải full HD\" src=\"http://static.nguyenkimmall.com/images/companies/_1/Content/dien-tu/Tivi/toshiba/smart-tivi-toshiba-49-inch-49u9650vn-4.jpg\" /></p>\r\n\r\n<p>Tivi LED Toshiba 49U9650VN UHD h&igrave;nh ảnh hiển thị sắc n&eacute;t, độ ph&acirc;n giải full HD</p>\r\n\r\n<h3>&Acirc;m thanh mạnh mẽ, cuốn h&uacute;t</h3>\r\n\r\n<p><a href=\"https://www.nguyenkim.com/tivi-man-hinh-lcd/\">Tivi</a>&nbsp;sở hữu 2 loa với tổng c&ocirc;ng suất l&ecirc;n tới 16W t&aacute;i tạo &acirc;m thanh đầu ra mượt m&agrave;, cho &acirc;m thanh sống động, vang dội.. Ngo&agrave;i ra, Toshiba c&ograve;n t&iacute;ch hợp th&ecirc;m c&ocirc;ng nghệ&nbsp;Dolby Digital Plus&nbsp;cho ph&eacute;p tivi giả lập &acirc;m thanh v&ograve;m với c&aacute;c hiệu ứng sinh động, bạn như được cuốn h&uacute;t, nhập vai v&agrave;o nh&acirc;n vật trong phim, mang đến trải nghiệm th&uacute; vị hơn.</p>\r\n\r\n<p><img alt=\"Tivi LED Toshiba 49U9650VN UHD âm thanh sống động mạnh mẽ\" src=\"http://static.nguyenkimmall.com/images/companies/_1/Content/dien-tu/Tivi/toshiba/smart-tivi-toshiba-49-inch-49u9650vn-8.jpg\" /></p>\r\n\r\n<p>Tivi LED Toshiba 49U9650VN UHD &acirc;m thanh sống động mạnh mẽ</p>\r\n\r\n<h3>Chiếu m&agrave;n h&igrave;nh điện thoại l&ecirc;n tivi</h3>\r\n\r\n<p>Giờ đ&acirc;y, bạn đ&atilde; c&oacute; thể chia sẻ truyền tải thoải m&aacute;i tất cả nội dung h&igrave;nh ảnh, video từ thiết bị di động tr&ecirc;n m&agrave;n h&igrave;nh điện thoại di động l&ecirc;n tivi&nbsp;một c&aacute;ch nhanh ch&oacute;ng th&ocirc;ng qua t&iacute;nh năng&nbsp;Screen Mirroring m&agrave; kh&ocirc;ng cần d&acirc;y c&aacute;p rườm r&agrave;.</p>\r\n\r\n<p><img alt=\"Tivi LED Toshiba 49U9650VN UHD chiếu hình ảnh lên màn hình tivi thật đơn giản\" src=\"http://static.nguyenkimmall.com/images/companies/_1/Content/dien-tu/Tivi/toshiba/smart-tivi-toshiba-49-inch-49u9650vn-0.jpg\" /></p>\r\n\r\n<p>Tivi LED Toshiba 49U9650VN UHD chiếu h&igrave;nh ảnh l&ecirc;n m&agrave;n h&igrave;nh tivi thật đơn giản</p>\r\n\r\n<h3>Chia sẻ dữ liệu dễ d&agrave;ng, nhanh ch&oacute;ng</h3>\r\n\r\n<p>Với chiếc tivi LED Toshiba 49U9650VN UHD, bạn dễ d&agrave;ng chi sẽ kế nối với nhiều thiết bị kh&aacute;c, phục vụ nhu cầu giải tr&iacute; cho gia đ&igrave;nh bạn. Tr&ecirc;n tivi c&oacute; c&aacute;c cổng kết nối phổ biến: Cổng HDMI: Kết nối h&igrave;nh ảnh, &acirc;m thanh giữa tivi laptop, đầu đĩa&hellip; một c&aacute;ch nhanh ch&oacute;ng. Cổng Optical:&nbsp;Gi&uacute;p truyền tải &acirc;m thanh với chất lượng cao từ tivi sang c&aacute;c loa thanh, d&agrave;n m&aacute;y,&hellip; chỉ với một d&acirc;y Optical. Cổng USB: Gi&uacute;p tivi c&oacute; thể tr&igrave;nh chiếu h&igrave;nh ảnh, video từ bộ nhớ lưu trữ b&ecirc;n ngo&agrave;i l&ecirc;n tivi th&ocirc;ng qua cổng kết nối USB tr&ecirc;n m&aacute;y.</p>\r\n\r\n<p><img alt=\"Tivi LED Toshiba 49U9650VN UHD kết nối và chia sẽ dễ dàng\" src=\"http://static.nguyenkimmall.com/images/companies/_1/Content/dien-tu/Tivi/toshiba/smart-tivi-toshiba-49-inch-49u9650vn-7.jpg\" /></p>\r\n\r\n<p>Tivi LED Toshiba 49U9650VN UHD kết nối v&agrave; chia sẽ dễ d&agrave;ng</p>\r\n\r\n<h3>Thưởng thức truyền h&igrave;nh kỹ thuật số miễn ph&iacute;</h3>\r\n\r\n<p>Tivi LED Toshiba 49U9650VN UHD trang bị đầu thu DVB-T2, gi&uacute;p người d&ugrave;ng c&oacute; thể thu c&aacute;c k&ecirc;nh truyền h&igrave;nh kỹ thuật số kh&aacute;c nhau với chất lượng cao ho&agrave;n to&agrave;n miễn ph&iacute;. Nhờ đ&oacute; n&acirc;ng cao khả năng giải tr&iacute; của người d&ugrave;ng tuyệt vời hơn. Tuy nhi&ecirc;n bạn cũng đặc biệt lưu &yacute;: (Số k&ecirc;nh thu được sẽ phụ thuộc v&agrave;o vị tr&iacute; địa l&yacute; v&agrave; chất lượng ăng-ten nh&agrave; bạn).</p>\r\n\r\n<p><img alt=\"Tivi LED Toshiba 49U9650VN UHD thưởng thức truyền hình kỹ thuật số miễn phí\" src=\"http://static.nguyenkimmall.com/images/companies/_1/Content/dien-tu/Tivi/toshiba/smart-tivi-toshiba-49-inch-49u9650vn-6.jpg\" /></p>\r\n\r\n<p>Tivi LED Toshiba 49U9650VN UHD thưởng thức truyền h&igrave;nh kỹ thuật số miễn ph&iacute;</p>\r\n\r\n<h3>Hệ điều h&agrave;nh đơn giản, ph&ugrave; hợp với mọi người</h3>\r\n\r\n<p><a href=\"https://www.nguyenkim.com/tivi-lcd-toshiba/\">Tivi Toshiba</a>&nbsp;sử dụng hệ điều h&agrave;nh với giao diện th&acirc;n thiện, ph&ugrave; hợp cho mọi lứa tuổi, gi&uacute;p c&aacute;c th&agrave;nh vi&ecirc;n trong gia đ&igrave;nh bạn ho&agrave;n to&agrave;n c&oacute; thể dễ d&agrave;ng tương t&aacute;c với tivi. Tivi LED Toshiba 49U9650VN UHD Sử dụng kho ứng dụng Opera TV, với c&aacute;c ứng dụng phổ biến như: tr&igrave;nh duyệt web, YouTube, Zing TV, Zing MP3, Nhạc của tui... để bạn c&oacute; thể thoải m&aacute;i đọc b&aacute;o, nghe nhạc, xem phim, chơi game ngay tại nh&agrave;.</p>\r\n\r\n<p><img alt=\"Tivi LED Toshiba 49U9650VN UHD giao diện thân thiện với người dùng\" src=\"http://static.nguyenkimmall.com/images/companies/_1/Content/dien-tu/Tivi/toshiba/smart-tivi-toshiba-49-inch-49u9650vn-7_1.jpg\" /></p>\r\n\r\n<p>Tivi LED Toshiba 49U9650VN UHD giao diện th&acirc;n thiện với người d&ugrave;ng</p>\r\n\r\n<h3>L&yacute; do mua h&agrave;ng</h3>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Tivi LED Toshiba 49U9650VN UHD thiết kế si&ecirc;u mỏng tinh tế, m&agrave;n h&igrave;nh độ ph&acirc;n giải cao 49 inch</p>\r\n	</li>\r\n	<li>\r\n	<p>Trải nghiệm h&igrave;nh ảnh, &acirc;m thanh sống động ch&acirc;n thật tự nhi&ecirc;n</p>\r\n	</li>\r\n	<li>\r\n	<p>H&igrave;nh ảnh full HD sắc n&eacute;t trong từng chi tiết, giảm nhiễu, độ tương phản &aacute;nh s&aacute;ng, m&agrave;u sắc tốt</p>\r\n	</li>\r\n	<li>\r\n	<p>Kết nối đa dạng với USB, m&aacute;y t&iacute;nh, hay đầu DVD, phục vụ giải tr&iacute; đa dạng</p>\r\n	</li>\r\n</ul>\r\n\r\n<h3>Ưu đ&atilde;i mua h&agrave;ng</h3>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Dịch vụ giao-nhận h&agrave;ng nhanh ch&oacute;ng, tiện lợi v&agrave; chu đ&aacute;o</p>\r\n	</li>\r\n	<li>\r\n	<p>Mua h&agrave;ng dễ d&agrave;ng tr&ecirc;n website nguyenkim.com hoặc c&oacute; thể gọi 19001267 bấm ph&iacute;m số 1 để được tư vấn</p>\r\n	</li>\r\n	<li>\r\n	<p>C&oacute; nhiều chương tr&igrave;nh khuyến m&atilde;i, ch&iacute;nh s&aacute;ch hậu m&atilde;i</p>\r\n	</li>\r\n	<li>\r\n	<p>Qu&yacute; kh&aacute;ch c&oacute; thể y&ecirc;u cầu gọi lại để kh&ocirc;ng tốn ph&iacute; điện thoại</p>\r\n	</li>\r\n</ul>', 3, '2017-05-08 02:35:41', 1, '2017-05-17 06:45:52', 1, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `vnc_users`
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
-- Dumping data for table `vnc_users`
--

INSERT INTO `vnc_users` (`id`, `username`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$iwSuBUkmx2FE7ucMEO.9U.OmwC/kr9ArxeMQsj7WgB586YHutZhAq', 'GHfg7RJfmUVVA9b4eTqZdRDH9fL6I8mpj796s8DuG7EXTutdTG7R0i3BZQ1X', '2017-05-05 21:31:14', '2017-05-05 22:50:21'),
(19, 'admin1', '$2y$10$AxU91N9t9KCJE2DU4N8JkeQrdwIO52SwjI9DahmwEn6oud92OStKi', 'u2tAflQFFk0cFZwaQjJ2zp2ojn0gmw3DW5FYWEnYAtT311eQHcja9wzZ1j1J', '2017-05-05 21:55:23', '2017-05-05 22:49:35'),
(20, 'admin2', '$2y$10$ehrZ/BmfQv64heiKVofluuJI5qjPK.Gudwg6t.ISVySIn7G1Yv08W', NULL, '2017-05-05 22:38:19', '2017-05-05 22:38:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `collections`
--
ALTER TABLE `collections`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `qt64_category_name_unique` (`name`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_option`
--
ALTER TABLE `product_option`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statics`
--
ALTER TABLE `statics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supports`
--
ALTER TABLE `supports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vnc_product`
--
ALTER TABLE `vnc_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vnc_users`
--
ALTER TABLE `vnc_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `qt64_users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `collections`
--
ALTER TABLE `collections`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product_image`
--
ALTER TABLE `product_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `product_option`
--
ALTER TABLE `product_option`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `product_type`
--
ALTER TABLE `product_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `statics`
--
ALTER TABLE `statics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `supports`
--
ALTER TABLE `supports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `vnc_product`
--
ALTER TABLE `vnc_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `vnc_users`
--
ALTER TABLE `vnc_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
