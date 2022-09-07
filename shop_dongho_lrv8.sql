-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2022 at 11:12 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop_dongho_lrv8`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(10) UNSIGNED NOT NULL,
  `admin_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_email`, `admin_password`, `admin_name`, `admin_phone`, `created_at`, `updated_at`) VALUES
(1, 'qui@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Hữu Quí', '0987654321', NULL, NULL),
(4, 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Admin', '0123456789', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_danhmucsanpham`
--

CREATE TABLE `tbl_danhmucsanpham` (
  `danhmuc_id` int(10) UNSIGNED NOT NULL,
  `danhmuc_ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `danhmuc_trangthai` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_danhmucsanpham`
--

INSERT INTO `tbl_danhmucsanpham` (`danhmuc_id`, `danhmuc_ten`, `danhmuc_trangthai`, `created_at`, `updated_at`) VALUES
(27, 'Đồng hồ thời trang', 1, NULL, NULL),
(28, 'Đồng hồ thể thao', 1, NULL, NULL),
(29, 'Đồng hồ trẻ em', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sanpham`
--

CREATE TABLE `tbl_sanpham` (
  `sanpham_id` int(11) NOT NULL,
  `sanpham_ten` varchar(255) NOT NULL,
  `sanpham_gia` int(11) NOT NULL,
  `sanpham_hinhanh` varchar(255) NOT NULL,
  `sanpham_soluong` int(11) NOT NULL,
  `sanpham_mota` text NOT NULL,
  `sanpham_noidung` text NOT NULL,
  `sanpham_sku` varchar(255) NOT NULL,
  `danhmuc_id` int(11) NOT NULL,
  `thuonghieu_id` int(11) NOT NULL,
  `sanpham_trangthai` int(11) NOT NULL,
  `man_hinh` varchar(255) DEFAULT NULL,
  `thoi_luong_pin` varchar(255) DEFAULT NULL,
  `ket_noi` varchar(255) DEFAULT NULL,
  `mat` varchar(255) DEFAULT NULL,
  `tinh_nang_suc_khoe` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_sanpham`
--

INSERT INTO `tbl_sanpham` (`sanpham_id`, `sanpham_ten`, `sanpham_gia`, `sanpham_hinhanh`, `sanpham_soluong`, `sanpham_mota`, `sanpham_noidung`, `sanpham_sku`, `danhmuc_id`, `thuonghieu_id`, `sanpham_trangthai`, `man_hinh`, `thoi_luong_pin`, `ket_noi`, `mat`, `tinh_nang_suc_khoe`) VALUES
(19, 'Apple Watch SE 40mm viền nhôm dây silicone', 7390000, 'uploads/bf5YxqDA7OhrioO02FOVzCbSFrcKd9WPEMIbNtCt.jpg', 10, '<h3>Thiết kế sang trọng, hiện đại, mang n&eacute;t đặc trưng của Apple</h3>\r\n\r\n<p><a href=\"https://www.thegioididong.com/dong-ho-thong-minh/se-40mm-vien-nhom-day-cao-su-hong\" target=\"_blank\" title=\"Apple Watch SE 40mm viền nhôm dây cao su hồng chính hãng, giá rẻ, bán tại Thế Giới Di Động\">Apple Watch SE 40mm viền nh&ocirc;m d&acirc;y cao su hồng</a>&nbsp;c&oacute;&nbsp;khung viền chắc chắn, thiết kế bo tr&ograve;n 4 g&oacute;c gi&uacute;p thao t&aacute;c vuốt chạm thoải m&aacute;i hơn. Mặt k&iacute;nh cường lực Ion-X strengthened glass&nbsp;với k&iacute;ch thước 1.57 inch, hiển thị r&otilde; r&agrave;ng. Khung viền nh&ocirc;m chắc chắn c&ugrave;ng&nbsp;<a href=\"https://www.thegioididong.com/day-dong-ho\" target=\"_blank\" title=\"Xem thêm mẫu dây đeo\">d&acirc;y đeo</a>&nbsp;cao su c&oacute; độ đ&agrave;n hồi cao, &ecirc;m &aacute;i, tạo cảm gi&aacute;c thoải m&aacute;i khi đeo.</p>', '<h3>Thiết kế sang trọng, hiện đại, mang n&eacute;t đặc trưng của Apple</h3>\r\n\r\n<p><a href=\"https://www.thegioididong.com/dong-ho-thong-minh/se-40mm-vien-nhom-day-cao-su-hong\" target=\"_blank\" title=\"Apple Watch SE 40mm viền nhôm dây cao su hồng chính hãng, giá rẻ, bán tại Thế Giới Di Động\">Apple Watch SE 40mm viền nh&ocirc;m d&acirc;y cao su hồng</a>&nbsp;c&oacute;&nbsp;khung viền chắc chắn, thiết kế bo tr&ograve;n 4 g&oacute;c gi&uacute;p thao t&aacute;c vuốt chạm thoải m&aacute;i hơn. Mặt k&iacute;nh cường lực Ion-X strengthened glass&nbsp;với k&iacute;ch thước 1.57 inch, hiển thị r&otilde; r&agrave;ng. Khung viền nh&ocirc;m chắc chắn c&ugrave;ng&nbsp;<a href=\"https://www.thegioididong.com/day-dong-ho\" target=\"_blank\" title=\"Xem thêm mẫu dây đeo\">d&acirc;y đeo</a>&nbsp;cao su c&oacute; độ đ&agrave;n hồi cao, &ecirc;m &aacute;i, tạo cảm gi&aacute;c thoải m&aacute;i khi đeo.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/7077/234918/apple-watch-se-40mm-vien-nhom-day-cao-su1.jpg\" onclick=\"return false;\"><img alt=\"Apple Watch SE 40mm viền nhôm dây cao su hồng - thiết kế\" src=\"https://cdn.tgdd.vn/Products/Images/7077/234918/apple-watch-se-40mm-vien-nhom-day-cao-su1.jpg\" title=\"Apple Watch SE 40mm viền nhôm dây cao su hồng - thiết kế\" /></a></p>\r\n\r\n<h3>Chip xử l&yacute; S5 gi&uacute;p cải thiện hiệu năng sản phẩm</h3>\r\n\r\n<p><a href=\"https://www.thegioididong.com/dong-ho-thong-minh-apple-watch-se\" title=\"Xem thêm một số sản phẩm Apple Watch SE đang kinh doanh tại Thế Giới Di Động\" type=\"apple watch s6, apple watch seri 6, apple watch series 6, apple watch 6, apple watch 2020, đồng hồ apple 6, đồng hồ apple s6, đồng hồ thông minh apple 6, đồng hồ thông minh apple s6 đồng hồ s6, s6 apple watch, watch s6, apple watch s6, apple watch seri 6, apple watch series 6, apple watch 6, apple watch 2020, apple watch se, đồng hồ apple se đồng hồ thông minh apple se\">Apple Watch SE</a>&nbsp;được trang bị chip S5 cho tốc độ xử l&yacute; nhanh gấp 2 lần so với phi&ecirc;n bản&nbsp;<a href=\"https://www.thegioididong.com/dong-ho-thong-minh-apple-watch-s3\" target=\"_blank\" title=\"Xem thêm mẫu đồng hồ Apple Watch S3\">Apple Watch S3</a>, gi&uacute;p đồng hồ hoạt động mượt m&agrave;, ổn định, đem lại những trải nghiệm th&uacute; vị.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/7077/234918/apple-watch-se-40mm-vien-nhom-day-cao-su11.jpg\" onclick=\"return false;\"><img alt=\"Apple Watch SE 40mm viền nhôm dây cao su hồng - chip S5\" src=\"https://cdn.tgdd.vn/Products/Images/7077/234918/apple-watch-se-40mm-vien-nhom-day-cao-su11.jpg\" title=\"Apple Watch SE 40mm viền nhôm dây cao su hồng - chip S5\" /></a></p>\r\n\r\n<h3>Hệ điều h&agrave;nh watchOS 7.0 với nhiều t&iacute;nh năng tiện lợi</h3>\r\n\r\n<p>Ở phi&ecirc;n bản n&agrave;y, hệ điều h&agrave;nh WatchOS 7.0 sẽ bổ sung v&agrave; n&acirc;ng cấp hơn 40 t&iacute;nh năng mới như: Ph&aacute;t hiện rửa tay, Siri dịch nhanh, th&ecirc;m nhiều giao diện mới, chia sẻ mặt đồng hồ,<a href=\"https://www.thegioididong.com/dong-ho-thong-minh-theo-doi-giac-ngu\" target=\"_blank\" title=\"Xem thêm mẫu đồng hồ có tính năng theo dõi giấc ngủ\">&nbsp;theo d&otilde;i giấc ngủ</a>&nbsp;được chi tiết hơn, luyện tập thể thao n&acirc;ng cao, cải tiến Siri, n&acirc;ng cao bảo mật,...</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/7077/234918/apple-watch-se-40mm-vien-nhom-day-cao-su12.jpg\" onclick=\"return false;\"><img alt=\"Apple Watch SE 40mm viền nhôm dây cao su hồng - hệ điều hành watchOS 7\" src=\"https://cdn.tgdd.vn/Products/Images/7077/234918/apple-watch-se-40mm-vien-nhom-day-cao-su12.jpg\" title=\"Apple Watch SE 40mm viền nhôm dây cao su hồng - hệ điều hành watchOS 7\" /></a></p>\r\n\r\n<h3>M&agrave;n h&igrave;nh OLED với c&ocirc;ng nghệ Retina hiện đại</h3>\r\n\r\n<p>M&agrave;n h&igrave;nh của đồng hồ&nbsp;sử dụng tấm nền&nbsp;<a href=\"https://www.thegioididong.com/tin-tuc/loai-man-hinh-tft-lcd-amoled-la-gi--592346#oled\" target=\"_blank\" title=\"Xem thêm bài viết về màn hình OLED\">OLED</a>&nbsp;với độ ph&acirc;n giải&nbsp;324 x 394 pixels,&nbsp;mang đến độ sắc n&eacute;t ch&acirc;n thực, m&agrave;u sắc r&otilde; r&agrave;ng v&agrave; đẹp mắt. B&ecirc;n cạnh đ&oacute;, mặt k&iacute;nh cường lực&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/kinh-cuong-luc-ion-x-la-gi-973542\" target=\"_blank\" title=\"Xem thêm bài viết về mặt kính Ion-X\">Ion-X strengthened glass</a>&nbsp;chịu lực tốt, gi&uacute;p bảo vệ&nbsp;đồng hồ an to&agrave;n trước c&aacute;c va chạm thường ng&agrave;y.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/7077/234918/se-40mm-vien-nhom-day-cao-su-hong-hbv-fix.jpg\" onclick=\"return false;\"><img alt=\"Apple Watch SE 40mm viền nhôm dây cao su hồng có màn hình OLED\" src=\"https://cdn.tgdd.vn/Products/Images/7077/234918/se-40mm-vien-nhom-day-cao-su-hong-hbv-fix.jpg\" title=\"Apple Watch SE 40mm viền nhôm dây cao su hồng có màn hình OLED\" /></a></p>\r\n\r\n<h3>Nghe gọi tr&ecirc;n đồng hồ th&ocirc;ng qua Bluetooth</h3>\r\n\r\n<p>Chiếc Apple Watch được trang bị t&iacute;nh năng nghe, gọi tr&ecirc;n đồng hồ, hỗ trợ người d&ugrave;ng nhận th&ocirc;ng b&aacute;o, tin nhắn tr&ecirc;n c&aacute;c nền tảng ứng dụng x&atilde; hội như (Facebook, Zalo, Viber,...) th&ocirc;ng qua kết nối Bluetooth, gi&uacute;p bạn tiện lợi hơn trong những l&uacute;c kh&ocirc;ng thể cầm điện thoại l&ecirc;n để nghe m&aacute;y.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/7077/234918/apple-watch-se-40mm-vien-nhom-day-cao-su2.jpg\" onclick=\"return false;\"><img alt=\"Apple Watch SE 40mm viền nhôm dây cao su hồng - nhận thông báo tin nhắn\" src=\"https://cdn.tgdd.vn/Products/Images/7077/234918/apple-watch-se-40mm-vien-nhom-day-cao-su2.jpg\" title=\"Apple Watch SE 40mm viền nhôm dây cao su hồng - nhận thông báo tin nhắn\" /></a></p>\r\n\r\n<h3>Bộ sưu tập giao hiện với phong c&aacute;ch mới mẻ, đa dạng</h3>\r\n\r\n<p>Thoải m&aacute;i lựa chọn giao diện ph&ugrave; hợp với phong c&aacute;ch ri&ecirc;ng của bản th&acirc;n với bộ sưu tập giao diện đa dạng, hoặc bạn cũng c&oacute; thể t&igrave;m kiếm c&aacute;c giao diện y&ecirc;u th&iacute;ch tr&ecirc;n App Store.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/7077/234918/apple-watch-se-40mm-vien-nhom-day-cao-su4.jpg\" onclick=\"return false;\"><img alt=\"Apple Watch SE 40mm viền nhôm dây cao su hồng - bộ sưu tập mặt đồng hồ\" src=\"https://cdn.tgdd.vn/Products/Images/7077/234918/apple-watch-se-40mm-vien-nhom-day-cao-su4.jpg\" title=\"Apple Watch SE 40mm viền nhôm dây cao su hồng - bộ sưu tập mặt đồng hồ\" /></a></p>\r\n\r\n<h3>Pin sử dụng trong 1.5 ng&agrave;y&nbsp;</h3>\r\n\r\n<p>Apple Watch SE trang bị vi&ecirc;n&nbsp;pin&nbsp;cho ph&eacute;p d&ugrave;ng được tối đa khoảng 1.5 ng&agrave;y v&agrave; chỉ mất khoảng 2 giờ để sạc đầy, gi&uacute;p bạn c&oacute; những trải nghiệm trọn vẹn trong ng&agrave;y m&agrave; kh&ocirc;ng lo gi&aacute;n đoạn giữa chừng.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/7077/234918/apple-watch-se-40mm-vien-nhom-day-cao-su5.jpg\" onclick=\"return false;\"><img alt=\"Apple Watch SE 40mm viền nhôm dây cao su hồng - pin 1.5 ngày\" src=\"https://cdn.tgdd.vn/Products/Images/7077/234918/apple-watch-se-40mm-vien-nhom-day-cao-su5.jpg\" title=\"Apple Watch SE 40mm viền nhôm dây cao su hồng - pin 1.5 ngày\" /></a></p>\r\n\r\n<h3>T&iacute;nh năng theo d&otilde;i sức khỏe 24/24</h3>\r\n\r\n<p>- Đồng hồ được t&iacute;ch hợp t&iacute;nh năng&nbsp;<a href=\"https://www.thegioididong.com/dong-ho-thong-minh-do-nhip-tim\" target=\"_blank\" title=\"Xem thêm mẫu đồng hồ có tính năng theo dõi nhịp tim\">theo d&otilde;i nhịp tim</a>&nbsp;tiện lợi. Kết quả được hiển thị dưới dạng th&ocirc;ng số cho bạn dễ d&agrave;ng theo d&otilde;i v&agrave; c&oacute; những biện ph&aacute;p chăm s&oacute;c sức khỏe hợp l&yacute;.</p>\r\n\r\n<p>- T&iacute;nh năng theo d&otilde;i giấc ngủ cung cấp cho bạn những th&ocirc;ng tin như chất lượng giấc ngủ, khoảng thời gian người d&ugrave;ng thức hoặc thời gian ngủ trung b&igrave;nh, gi&uacute;p bạn đ&aacute;nh gi&aacute; được t&igrave;nh trạng của m&igrave;nh v&agrave; thay đổi để x&acirc;y dựng th&oacute;i quen đi ngủ đều đặn, tốt cho sức khỏe. Ngo&agrave;i ra, t&iacute;nh năng n&agrave;y c&ograve;n đưa ra một số lời khuy&ecirc;n để bạn cải thiện giấc ngủ của m&igrave;nh được tốt hơn. Tuy nhi&ecirc;n, người d&ugrave;ng cần phải đeo đồng hồ trong l&uacute;c ngủ th&igrave; mới c&oacute; thể thực hiện t&iacute;nh năng n&agrave;y.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/7077/234918/apple-watch-se-40mm-vien-nhom-day-cao-su6.jpg\" onclick=\"return false;\"><img alt=\"Apple Watch SE 40mm viền nhôm dây cao su hồng - theo dõi sức khỏe\" src=\"https://cdn.tgdd.vn/Products/Images/7077/234918/apple-watch-se-40mm-vien-nhom-day-cao-su6.jpg\" title=\"Apple Watch SE 40mm viền nhôm dây cao su hồng - theo dõi sức khỏe\" /></a></p>\r\n\r\n<h3>Bảo vệ sức khỏe của bản th&acirc;n với t&iacute;nh năng ph&aacute;t hiện t&eacute; ng&atilde;</h3>\r\n\r\n<p>Khi ph&aacute;t hiện người d&ugrave;ng gặp sự cố t&eacute; ng&atilde;,&nbsp;<a href=\"https://www.thegioididong.com/dong-ho-thong-minh-apple\" target=\"_blank\" title=\"Xem thêm mẫu đồng hồ dòng Apple Watch\">Apple Watch</a>&nbsp;sẽ gửi cảnh b&aacute;o SOS, nếu người d&ugrave;ng nằm bất động hay kh&ocirc;ng tắt cảnh b&aacute;o n&agrave;y trong khoảng 15 gi&acirc;y th&igrave;&nbsp;sẽ tự động gọi đến c&aacute;c dịch vụ khẩn cấp hoặc c&aacute;c số li&ecirc;n lạc đ&atilde; lưu trước đ&oacute;, gi&uacute;p bạn tr&aacute;nh được những rủi ro hoặc tai nạn bất ngờ.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/7077/234918/apple-watch-se-40mm-vien-nhom-day-cao-su7.jpg\" onclick=\"return false;\"><img alt=\"Apple Watch SE 40mm viền nhôm dây cao su hồng - phát hiện té ngã\" src=\"https://cdn.tgdd.vn/Products/Images/7077/234918/apple-watch-se-40mm-vien-nhom-day-cao-su7.jpg\" title=\"Apple Watch SE 40mm viền nhôm dây cao su hồng - phát hiện té ngã\" /></a></p>\r\n\r\n<h3>Nhiều chế độ tập luyện kh&aacute;c nhau được t&iacute;ch hợp tr&ecirc;n đồng hồ</h3>\r\n\r\n<p>Nhiều b&agrave;i tập&nbsp;theo c&aacute;c bộ m&ocirc;n thể thao như: leo n&uacute;i, chạy bộ, đạp xe, bơi lội, yoga,... với nhiều mức độ từ cơ bản đến n&acirc;ng cao cho bạn một chế độ tập luyện b&agrave;i bản, khoa học hơn. C&ugrave;ng với khả năng&nbsp;<a href=\"https://www.thegioididong.com/dong-ho-thong-minh?g=dinh-vi\" target=\"_blank\" title=\"Xem thêm mẫu đồng hồ có tính năng định vị\">định vị GPS</a>&nbsp;ch&iacute;nh x&aacute;c, gi&uacute;p n&acirc;ng cao hiệu quả luyện tập thể thao v&agrave; cải thiện sức khỏe mỗi ng&agrave;y.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/7077/234918/apple-watch-se-40mm-vien-nhom-day-cao-su8.jpg\" onclick=\"return false;\"><img alt=\"Apple Watch SE 40mm viền nhôm dây cao su hồng - nhiều chế độ luyện tập\" src=\"https://cdn.tgdd.vn/Products/Images/7077/234918/apple-watch-se-40mm-vien-nhom-day-cao-su8.jpg\" title=\"Apple Watch SE 40mm viền nhôm dây cao su hồng - nhiều chế độ luyện tập\" /></a></p>\r\n\r\n<h3>Trợ l&yacute; ảo Siri - Hỗ trợ người d&ugrave;ng giải quyết nhiều vấn đề</h3>\r\n\r\n<p>Siri c&oacute; thể dịch nhanh 10 ng&ocirc;n ngữ tr&ecirc;n thế giới (chưa c&oacute; tiếng Việt), nhận diện giọng n&oacute;i dễ d&agrave;ng. Với chức năng n&agrave;y, Siri sẽ gi&uacute;p bạn thực hiện nhanh ch&oacute;ng một v&agrave;i t&aacute;c vụ đơn giản hoặc đưa ra hướng dẫn hỗ trợ bạn thực hiện.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/7077/234918/apple-watch-se-40mm-vien-nhom-day-cao-su13.jpg\" onclick=\"return false;\"><img alt=\"Apple Watch SE 40mm viền nhôm dây cao su hồng - trợ lý Siri\" src=\"https://cdn.tgdd.vn/Products/Images/7077/234918/apple-watch-se-40mm-vien-nhom-day-cao-su13.jpg\" title=\"Apple Watch SE 40mm viền nhôm dây cao su hồng - trợ lý Siri\" /></a></p>\r\n\r\n<h3>Dễ d&agrave;ng quản l&yacute; th&agrave;nh vi&ecirc;n trong gia đ&igrave;nh với t&iacute;nh&nbsp;năng Family Setup</h3>\r\n\r\n<p>T&iacute;nh năng Family Setup cho ph&eacute;p 1 t&agrave;i khoản iCloud c&oacute; thể quản l&yacute; nhiều chiếc đồng hồ th&ocirc;ng minh Apple kh&aacute;c nhau, thuận tiện trong việc chăm s&oacute;c trẻ em v&agrave; người gi&agrave; th&ocirc;ng qua c&aacute;c t&iacute;nh năng: theo d&otilde;i sức khỏe, định vị trẻ em, ph&aacute;t hiện t&eacute; ng&atilde;,...</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/7077/234918/apple-watch-se-40mm-vien-nhom-day-cao-su9.jpg\" onclick=\"return false;\"><img alt=\"Apple Watch SE 40mm viền nhôm dây cao su hồng - Family Setup\" src=\"https://cdn.tgdd.vn/Products/Images/7077/234918/apple-watch-se-40mm-vien-nhom-day-cao-su9.jpg\" title=\"Apple Watch SE 40mm viền nhôm dây cao su hồng - Family Setup\" /></a></p>\r\n\r\n<p>Lưu &yacute;: T&iacute;nh năng n&agrave;y hiện kh&ocirc;ng khả dụng tại Việt Nam.</p>\r\n\r\n<h3>Tắm, bơi ở v&ugrave;ng nước n&ocirc;ng với chỉ số&nbsp;<a href=\"https://www.thegioididong.com/dong-ho-thong-minh-chong-nuoc-5-atm\" target=\"_blank\" title=\"Xem thêm 1 số mẫu đồng hồ có hệ số chống nước 5 ATM\">chống nước 5 ATM</a></h3>\r\n\r\n<p>Đồng hồ c&oacute; hệ số chống nước 5 ATM -&nbsp;ISO 22810:2010 (Tắm, Bơi v&ugrave;ng nước n&ocirc;ng) n&ecirc;n c&oacute; thể được sử dụng trong c&aacute;c hoạt động dưới mặt nước n&ocirc;ng như bơi trong bể hoặc ở biển. Kh&ocirc;ng n&ecirc;n sử dụng khi lặn với b&igrave;nh kh&iacute;, lướt v&aacute;n nước hoặc c&aacute;c hoạt động kh&aacute;c li&ecirc;n quan đến nước c&oacute; tốc độ cao hoặc nhấn ch&igrave;m dưới mực nước n&ocirc;ng.&nbsp;Bật t&iacute;nh năng kh&oacute;a chống nước trước khi mang sản phẩm đi bơi, đi mưa, kh&ocirc;ng ấn c&aacute;c n&uacute;t điều chỉnh, kh&ocirc;ng d&ugrave;ng trong ph&ograve;ng tắm hơi, tắm nước n&oacute;ng.</p>\r\n\r\n<p>Apple Việt Nam&nbsp;<strong>kh&ocirc;ng bảo h&agrave;nh</strong>, đổi trả trong trường hợp sản phẩm bị v&agrave;o nước.</p>\r\n\r\n<p>Xem th&ecirc;m hướng dẫn sử dụng v&agrave; c&aacute;ch xử l&yacute; sản phẩm khi v&agrave;o nước&nbsp;<a href=\"https://support.apple.com/vi-vn/guide/watch/apd707b42a5e/watchos\" target=\"_blank\" title=\"Hướng dẫn sử dụng và cách xử lý khi vào nước\">tại đ&acirc;y.</a></p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/7077/233260/se-44mm-vien-nhom-day-cao-su-hongcn.jpg\" onclick=\"return false;\"><img alt=\"Apple Watch SE 40mm viền nhôm dây cao su hồng có hệ số chống nước 5 ATM\" src=\"https://cdn.tgdd.vn/Products/Images/7077/233260/se-44mm-vien-nhom-day-cao-su-hongcn.jpg\" title=\"Apple Watch SE 40mm viền nhôm dây cao su hồng có hệ số chống nước 5 ATM\" /></a></p>\r\n\r\n<h3>Th&ecirc;m nhiều t&iacute;nh năng kh&aacute;c, tiện lợi hơn</h3>\r\n\r\n<p>Apple Watch SE sở hữu nhiều tiện &iacute;ch kh&aacute;c như: Dự b&aacute;o thời tiết, la b&agrave;n, đồng hồ bấm giờ, điều khiển chơi nhạc, b&aacute;o thức, t&igrave;m&nbsp;<a href=\"https://www.thegioididong.com/dtdd\" target=\"_blank\" title=\"Xem thêm mẫu điện thoại\">điện thoại</a>,&nbsp;<a href=\"https://www.thegioididong.com/dong-ho-thong-minh?g=dem-so-buoc-chan\" target=\"_blank\" title=\"Xem thêm mẫu đồng hồ có tính năng đếm bước chân\">đếm bước ch&acirc;n</a>, t&iacute;nh lượng calories ti&ecirc;u thụ, đếm qu&atilde;ng đường đi được,...</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/7077/234918/apple-watch-se-40mm-vien-nhom-day-cao-su19.jpg\" onclick=\"return false;\"><img alt=\"Apple Watch SE 40mm viền nhôm dây cao su hồng - tiện ích khác\" src=\"https://cdn.tgdd.vn/Products/Images/7077/234918/apple-watch-se-40mm-vien-nhom-day-cao-su19.jpg\" title=\"Apple Watch SE 40mm viền nhôm dây cao su hồng - tiện ích khác\" /></a></p>\r\n\r\n<p>Đ&aacute;nh gi&aacute; chung,&nbsp;<a href=\"https://www.thegioididong.com/dong-ho-thong-minh\" target=\"_blank\" title=\"Xem thêm mẫu đồng hồ thông minh\">đồng hồ th&ocirc;ng minh</a>&nbsp;n&agrave;y sở hữu&nbsp;thiết kế hiện đại, sang trọng, m&agrave;n h&igrave;nh to r&otilde;, cho h&igrave;nh ảnh sắc n&eacute;t, đầy sống động,&nbsp;<a href=\"https://www.thegioididong.com/dong-ho-thong-minh?g=silicon\" target=\"_blank\" title=\"Xem thêm mẫu đồng hồ có dây silicon\">d&acirc;y đeo cao su</a>. B&ecirc;n cạnh đ&oacute;, c&aacute;c t&iacute;nh năng như đo nhịp tim, theo d&otilde;i giấc ngủ, ph&aacute;t hiện sự cố, r&egrave;n luyện thể thao n&acirc;ng cao, kết nối gia đ&igrave;nh (Family setup), Apple Watch SE sẽ mang đến những trải nghiệm th&uacute; vị trong cuộc sống hiện đại ng&agrave;y nay.</p>', 'A01', 27, 14, 1, 'OLED1.57 inch', 'Khoảng 1.5 ngày', 'iOS 14 trở lên', 'Ion-X strengthened glass40 mm', 'Chế độ luyện tậpTheo dõi giấc ngủTính lượng calories tiêu thụTính quãng đường chạyĐo nhịp timĐếm số bước chân');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_thuoctinh`
--

CREATE TABLE `tbl_thuoctinh` (
  `thuoctinh_id` int(11) NOT NULL,
  `sanpham_id` int(11) NOT NULL,
  `sku` varchar(255) NOT NULL,
  `gia` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_thuonghieu`
--

CREATE TABLE `tbl_thuonghieu` (
  `thuonghieu_id` int(10) UNSIGNED NOT NULL,
  `thuonghieu_ten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thuonghieu_trangthai` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_thuonghieu`
--

INSERT INTO `tbl_thuonghieu` (`thuonghieu_id`, `thuonghieu_ten`, `thuonghieu_trangthai`, `created_at`, `updated_at`) VALUES
(14, 'Apple', 1, NULL, NULL),
(15, 'Samsung', 1, NULL, NULL),
(16, 'Garmin', 1, NULL, NULL),
(17, 'Xiaomi', 1, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_danhmucsanpham`
--
ALTER TABLE `tbl_danhmucsanpham`
  ADD PRIMARY KEY (`danhmuc_id`);

--
-- Indexes for table `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  ADD PRIMARY KEY (`sanpham_id`);

--
-- Indexes for table `tbl_thuoctinh`
--
ALTER TABLE `tbl_thuoctinh`
  ADD PRIMARY KEY (`thuoctinh_id`);

--
-- Indexes for table `tbl_thuonghieu`
--
ALTER TABLE `tbl_thuonghieu`
  ADD PRIMARY KEY (`thuonghieu_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_danhmucsanpham`
--
ALTER TABLE `tbl_danhmucsanpham`
  MODIFY `danhmuc_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  MODIFY `sanpham_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_thuoctinh`
--
ALTER TABLE `tbl_thuoctinh`
  MODIFY `thuoctinh_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_thuonghieu`
--
ALTER TABLE `tbl_thuonghieu`
  MODIFY `thuonghieu_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
