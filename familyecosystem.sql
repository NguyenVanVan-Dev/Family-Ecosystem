-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 12, 2021 lúc 10:58 AM
-- Phiên bản máy phục vụ: 10.4.16-MariaDB
-- Phiên bản PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `familyecosystem`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(10) UNSIGNED NOT NULL,
  `admin_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_decentralization` int(255) NOT NULL,
  `admin_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_email`, `admin_password`, `admin_name`, `admin_phone`, `admin_decentralization`, `admin_image`, `created_at`, `updated_at`) VALUES
(3, 'vancute@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Nguyễn Văn Vấn', '0366361624', 0, 'avatar.jpg', '2020-12-21 13:08:02', '2020-12-21 13:08:02'),
(5, 'haibadong@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Hải Ba Đông', '0366221521', 1, 'haibadong.jpg', NULL, NULL),
(8, 'mylinhxinh@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Trịnh Mỹ Linh', '0339328324', 1, 'linh dep gai65.jpg', NULL, NULL),
(9, 'nguyenvien@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Nguyễn Văn Viên', '0987058641', 0, 'yone-ta-anh-song-kiem34.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danh_muc_table`
--

CREATE TABLE `danh_muc_table` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `category_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_parent` int(255) NOT NULL DEFAULT 0,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `danh_muc_table`
--

INSERT INTO `danh_muc_table` (`category_id`, `category_key`, `category_parent`, `category_name`, `category_slug`, `category_desc`, `category_status`, `created_at`, `updated_at`) VALUES
(23, '<p>C&acirc;y Phong L&aacute; Đỏ</p>', 0, 'Cây Phong Lá Đỏ', '1', '<p>T&ecirc;n c&acirc;y: Phong L&aacute; Đỏ, Maple Tree</p>\r\n\r\n<p>T&ecirc;n khoa học:<em>&nbsp;Acer rubrum</em></p>\r\n\r\n<p>Phong L&aacute; Đỏ (Acer rubrum) c&oacute; nguồn gốc từ Trung Quốc (China) v&agrave; Nhật Bản (Japan). C&acirc;y với sắc cam, đỏ rực rỡ của l&aacute; trước m&ugrave;a rụng l&aacute; sẽ mang đến cho kh&ocirc;ng gian nơi ở, nơi l&agrave;m việc của bạn một ch&uacute;t ấm &aacute;p v&agrave; một n&eacute;t dịu d&agrave;ng của m&ugrave;a thu. C&acirc;y rất th&iacute;ch hợp để trang tr&iacute; tr&ecirc;n b&agrave;n l&agrave;m việc, tr&ecirc;n kệ tủ. M&agrave;u cam, đỏ tượng trưng cho sự may mắn, t&agrave;i lộc n&ecirc;n ch&uacute;ng rất được ưa chuộng.</p>\r\n\r\n<p>C&acirc;y Phong L&aacute; Đỏ (Acer rubrum) sinh trưởng mạnh mẽ trong điều kiện đất tho&aacute;t nước tốt, nếu sử dụng l&agrave;m Bonsai th&igrave; phải tưới nước hằng ng&agrave;y v&agrave; để c&acirc;y dưới b&oacute;ng r&acirc;m, đ&oacute;n &aacute;nh nắng gi&aacute;n tiếp, kh&ocirc;ng n&ecirc;n để dưới &aacute;nh nắng trực tiếp thời gian l&acirc;u v&igrave; c&oacute; thể sẽ l&agrave;m ch&aacute;y l&aacute;, hư l&aacute;.</p>', 1, '2021-01-10 06:05:44', '2021-01-10 06:05:44'),
(24, '<p>C&acirc;y Xanh</p>', 0, 'Cây Xanh', '2', '<p>T&ecirc;n: C&acirc;y Sanh, C&acirc;y Xanh, C&acirc;y G&ugrave;a, Weeping Fig, Benjamin Fig, Ficus Tree</p>\r\n\r\n<p>T&ecirc;n khoa học:&nbsp;<em>Ficus benjamina</em></p>\r\n\r\n<p>Ch&uacute;ng ta đ&atilde; thấy rất nhiều c&acirc;y sanh c&oacute; k&iacute;ch thước to, thậm ch&iacute; l&agrave; những c&acirc;y sanh cổ thụ với nhiều ch&ugrave;m rễ kh&iacute; to rủ xuống từ những c&agrave;nh, t&aacute;n c&acirc;y ph&iacute;a tr&ecirc;n. Ngo&agrave;i việc tạo b&oacute;ng m&aacute;t m&aacute;t, c&aacute;c c&acirc;y Sanh Mini c&ograve;n được c&aacute;c nghệ nh&acirc;n, người chơi Bonsai chăm s&oacute;c, tạo d&aacute;ng, uốn tạo ch&uacute;ng th&agrave;nh c&aacute;c t&aacute;c phẩm c&acirc;y kiểng, Bonsai c&oacute; gi&aacute; trị rất cao.</p>', 1, '2021-01-10 06:14:46', '2021-01-10 06:14:46'),
(25, '<p>Hoa c&aacute;c loại</p>', 0, 'Hoa Các Loại', '3', '<p>Đ&agrave;o tết l&agrave; hoa tết truyền thống của người Việt mang đậm n&eacute;t văn h&oacute;a cổ truyền. Năm trong bộ tứ qu&yacute; &rdquo; T&ugrave;ng, C&uacute;c, Tr&uacute;c, Mai&rdquo; lu&ocirc;n được người d&acirc;n Việt Nam ưa chuộng l&agrave;m hoa ng&agrave;y tết.</p>', 1, '2021-01-10 06:35:21', '2021-01-10 06:35:21'),
(26, '<p>C&acirc;y Tiểu Cảnh</p>', 0, 'Cây Tiểu Cảnh', '8', '<p><em>Chậu tiểu cảnh</em>&nbsp;đẹp mini sẽ l&agrave; giải ph&aacute;p rất tốt để ch&uacute;ng ta c&oacute; thể tận hưởng được sức sống của&nbsp;<em>hoa</em>&nbsp;cỏ. ...&nbsp;<em>tiểu cảnh</em>&nbsp;đẹp mini để tặng &ldquo;gấu&rdquo;. Với những&nbsp;<em>chậu</em>&nbsp;c&acirc;y trong nh&agrave; ch&uacute;ng ta thường chọn những loại c&acirc;y ưa b&oacute;ng m&aacute;t&nbsp;...</p>', 1, '2021-01-10 06:44:47', '2021-01-10 06:44:47'),
(27, '<p><strong>C&acirc;y sen đ&aacute;</strong>&nbsp;</p>', 0, 'Sen Đá', '4', '<p><strong>C&acirc;y sen đ&aacute;</strong>&nbsp;hay c&ograve;n gọi l&agrave;&nbsp;<strong>Li&ecirc;n đ&agrave;i</strong>,<strong>&nbsp;hoa đ&aacute;&nbsp;</strong>(T&ecirc;n tiếng Anh l&agrave;<strong>&nbsp;Succulent</strong>)&nbsp;l&agrave; lo&agrave;i rất dễ sống, ph&aacute;t triển chậm v&agrave; sống l&acirc;u, kh&ocirc;ng đ&ograve;i hỏi được chăm s&oacute;c thường xuy&ecirc;n.&nbsp;Sen đ&aacute; l&agrave; giống c&acirc;y&nbsp;nhỏ, gần như kh&ocirc;ng c&oacute; th&acirc;n m&agrave; chỉ thấy l&aacute;, l&agrave; giống c&acirc;y mọng nước v&agrave; đặc biệt l&aacute; thường xếp th&agrave;nh h&igrave;nh như những b&ocirc;ng hoa, nhất l&agrave; hoa sen. Lo&agrave;i c&acirc;y n&agrave;y ưa&nbsp;mọc tr&ecirc;n đ&aacute;, sỏi, nhưng nơi kh&ocirc; cằn n&ecirc;n mới được gọi l&agrave;&nbsp;<strong>hoa sen đ&aacute;</strong>.&nbsp; B&ecirc;n cạnh đ&oacute;, hoa sen đ&aacute; rất dễ trồng, n&oacute; c&oacute; thể th&iacute;ch nghi với mọi loại kh&iacute; hậu, mọi địa h&igrave;nh v&agrave; sống quanh năm, khi l&aacute; rụng c&oacute; thể nảy chồi từ đ&oacute; v&agrave; mọc l&ecirc;n c&acirc;y mới. Ch&iacute;nh v&igrave; thế&nbsp;<strong>c&acirc;y sen đ&aacute;</strong>&nbsp;mang &yacute; nghĩa về một&nbsp;<strong>t&igrave;nh y&ecirc;u bền chặt</strong>, trọn đời, vĩnh cửu kh&ocirc;ng thay đổi...&nbsp;</p>', 1, '2021-01-10 06:52:14', '2021-01-10 06:52:14'),
(28, '<p>Sen Đ&aacute; Dạ Quang</p>', 27, 'Sen Đá Dạ Quang', 'Sen Đá Dạ Quang', '<p><strong>C&acirc;y sen đ&aacute;</strong>&nbsp;l&agrave; d&ograve;ng thực vật mọng nước (<strong>Succulent plant</strong>) thuộc chi&nbsp;<strong>Echeveria</strong>&nbsp;họ thuốc bỏng (Crassulaceae). Ước t&iacute;nh c&oacute; khoảng 60 họ sen đ&aacute; kh&aacute;c nhau với&nbsp;gần 400&nbsp;lo&agrave;i, trong đ&oacute; hơn 90% ph&acirc;n bố chủ yếu ở v&ugrave;ng n&oacute;ng gần x&iacute;ch đạo&nbsp;<strong>Mexico</strong>,&nbsp;<strong>Nam&nbsp;Mỹ</strong>,&nbsp;<strong>ch&acirc;u &Uacute;c</strong>&nbsp;v&agrave;&nbsp;<strong>ch&acirc;u Phi</strong>.</p>', 1, '2021-01-10 06:55:48', '2021-01-10 06:55:48'),
(29, '<p>Sen Đ&aacute; Dạ Quang</p>', 27, 'Sen Đá  Kim Cương', 'Sen Đá Kim Cương', '<p>Sen Đ&aacute; Dạ Quang</p>', 1, '2021-01-10 06:56:07', '2021-01-10 06:56:07');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
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
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_12_21_121135_create_admin_table', 1),
(5, '2020_12_21_142353_create__danh__muc', 2),
(6, '2020_12_24_085844_create_tbl_sanpham', 3),
(7, '2020_12_27_133332_create_tbl_khachhang', 4),
(8, '2020_12_28_132028_create_tbl_goihangn', 5),
(9, '2020_12_30_112821_create_tbl_thanhtoan', 6),
(10, '2020_12_30_113034_create_tbl_donhang', 7),
(11, '2020_12_30_113328_create_tbl_chitiet_donhang', 8);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_chitiet_donhang`
--

CREATE TABLE `tbl_chitiet_donhang` (
  `order_details_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` double(8,2) NOT NULL,
  `product_sales_quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_chitiet_donhang`
--

INSERT INTO `tbl_chitiet_donhang` (`order_details_id`, `order_id`, `product_id`, `product_name`, `product_price`, `product_sales_quantity`, `created_at`, `updated_at`) VALUES
(62, 54, 24, 'Cây Xanh Tiểu Cảnh', 824000.00, 1, NULL, NULL),
(63, 57, 33, 'Chậu Hoa Hồng', 73000.00, 1, NULL, NULL),
(64, 58, 33, 'Chậu Hoa Hồng', 73000.00, 1, NULL, NULL),
(65, 58, 24, 'Cây Xanh Tiểu Cảnh', 824000.00, 1, NULL, NULL),
(66, 59, 24, 'Cây Xanh Tiểu Cảnh', 824000.00, 1, NULL, NULL),
(67, 59, 26, 'Cây si Xanh 2', 60000.00, 1, NULL, NULL),
(68, 60, 24, 'Cây Xanh Tiểu Cảnh', 824000.00, 4, NULL, NULL),
(69, 62, 25, 'Cây si Xanh', 60000.00, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_donhang`
--

CREATE TABLE `tbl_donhang` (
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `shipping_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `order_total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_donhang`
--

INSERT INTO `tbl_donhang` (`order_id`, `customer_id`, `shipping_id`, `payment_id`, `order_total`, `order_status`, `created_at`, `updated_at`) VALUES
(54, 15, 79, 65, '997,040.00', 2, NULL, NULL),
(57, 15, 81, 68, '88,330.00', 0, NULL, NULL),
(58, 15, 82, 69, '1,085,370.00', 3, NULL, NULL),
(59, 15, 83, 70, '1,069,640.00', 0, NULL, NULL),
(60, 15, 84, 71, '3,988,160.00', 2, NULL, NULL),
(61, 15, 85, 72, '19,360,000.00', 1, NULL, NULL),
(62, 15, 86, 73, '72,600.00', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_goihang`
--

CREATE TABLE `tbl_goihang` (
  `shipping_id` int(10) UNSIGNED NOT NULL,
  `shipping_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_method` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_goihang`
--

INSERT INTO `tbl_goihang` (`shipping_id`, `shipping_name`, `shipping_address`, `shipping_phone`, `shipping_method`, `created_at`, `updated_at`) VALUES
(79, 'Phong Thần', 'Khoa CNTT Và Truyền Thông', '0366361624', 1, NULL, NULL),
(81, 'Nguyễn Văn Vấn', 'Khoa CNTT Và Truyền Thông', '0366361624', 1, NULL, NULL),
(82, 'Phong Thần', 'Khoa CNTT Và Truyền Thông', '0123456789', 0, NULL, NULL),
(83, 'Phong Thần', 'Khoa CNTT Và Truyền Thông', '0366361624', 2, NULL, NULL),
(84, 'Phong Thần', 'Khoa CNTT Và Truyền Thông', '0366361624', 1, NULL, NULL),
(85, 'Vấn Nguyễn', 'Khoa CNTT Và Truyền Thông', '0366361624', 0, NULL, NULL),
(86, 'Vấn Nguyễn', 'Khoa CNTT Và Truyền Thông', '0366361624', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_khachhang`
--

CREATE TABLE `tbl_khachhang` (
  `customer_id` int(10) UNSIGNED NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_khachhang`
--

INSERT INTO `tbl_khachhang` (`customer_id`, `customer_name`, `customer_email`, `customer_password`, `created_at`, `updated_at`) VALUES
(9, 'Linh Cute', 'haibadong1@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', NULL, NULL),
(10, 'Linh Cute', 'nguyenvan4@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', NULL, NULL),
(11, 'vấn huyền thoại', 'kaka@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', NULL, NULL),
(12, 'Tiêu Viêm', 'tieuviem@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', NULL, NULL),
(13, 'Nguyễn văn Vấn', 'nvvan.19it4@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', NULL, NULL),
(15, 'Vấn Nguyễn', 'nvvan.19it4@vku.udn.vn', '827ccb0eea8a706c4c34a16891f84e7b', NULL, NULL),
(16, 'Cún Xinh', 'cunxinh@gamil.com', '827ccb0eea8a706c4c34a16891f84e7b', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_sanpham`
--

CREATE TABLE `tbl_sanpham` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_num` int(11) NOT NULL,
  `product_display` int(11) NOT NULL,
  `product_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` int(255) NOT NULL,
  `product_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_sanpham`
--

INSERT INTO `tbl_sanpham` (`product_id`, `product_name`, `product_slug`, `category_id`, `product_num`, `product_display`, `product_content`, `product_price`, `product_image`, `product_status`, `created_at`, `updated_at`) VALUES
(18, 'Phong Lá Đỏ Loại 1', '1', 23, 50, 0, '<p>Phong L&aacute; Đỏ (Acer rubrum) c&oacute; nguồn gốc từ Trung Quốc (China) v&agrave; Nhật Bản (Japan). C&acirc;y với sắc cam, đỏ rực rỡ của l&aacute; trước m&ugrave;a rụng l&aacute; sẽ mang đến cho kh&ocirc;ng gian nơi ở, nơi l&agrave;m việc của bạn một ch&uacute;t ấm &aacute;p v&agrave; một n&eacute;t dịu d&agrave;ng của m&ugrave;a thu. C&acirc;y rất th&iacute;ch hợp để trang tr&iacute; tr&ecirc;n b&agrave;n l&agrave;m việc, tr&ecirc;n kệ tủ. M&agrave;u cam, đỏ tượng trưng cho sự may mắn, t&agrave;i lộc n&ecirc;n ch&uacute;ng rất được ưa chuộng.</p>\r\n\r\n<p>C&acirc;y Phong L&aacute; Đỏ (Acer rubrum) sinh trưởng mạnh mẽ trong điều kiện đất tho&aacute;t nước tốt, nếu sử dụng l&agrave;m Bonsai th&igrave; phải tưới nước hằng ng&agrave;y v&agrave; để c&acirc;y dưới b&oacute;ng r&acirc;m, đ&oacute;n &aacute;nh nắng gi&aacute;n tiếp, kh&ocirc;ng n&ecirc;n để dưới &aacute;nh nắng trực tiếp thời gian l&acirc;u v&igrave; c&oacute; thể sẽ l&agrave;m ch&aacute;y l&aacute;, hư l&aacute;.</p>', 600000, 'phong-la-do83.jpg', 1, NULL, NULL),
(19, 'Phong Lá Đỏ Loại 2', '1', 23, 50, 0, '<p>Phong L&aacute; Đỏ (Acer rubrum) c&oacute; nguồn gốc từ Trung Quốc (China) v&agrave; Nhật Bản (Japan). C&acirc;y với sắc cam, đỏ rực rỡ của l&aacute; trước m&ugrave;a rụng l&aacute; sẽ mang đến cho kh&ocirc;ng gian nơi ở, nơi l&agrave;m việc của bạn một ch&uacute;t ấm &aacute;p v&agrave; một n&eacute;t dịu d&agrave;ng của m&ugrave;a thu. C&acirc;y rất th&iacute;ch hợp để trang tr&iacute; tr&ecirc;n b&agrave;n l&agrave;m việc, tr&ecirc;n kệ tủ. M&agrave;u cam, đỏ tượng trưng cho sự may mắn, t&agrave;i lộc n&ecirc;n ch&uacute;ng rất được ưa chuộng.</p>', 850000, 'phong-la-do174.jpg', 1, NULL, NULL),
(20, 'Phong Lá Đỏ Loại 3', '1', 23, 50, 0, '<p>Phong L&aacute; Đỏ (Acer rubrum) c&oacute; nguồn gốc từ Trung Quốc (China) v&agrave; Nhật Bản (Japan). C&acirc;y với sắc cam, đỏ rực rỡ của l&aacute; trước m&ugrave;a rụng l&aacute; sẽ mang đến cho kh&ocirc;ng gian nơi ở, nơi l&agrave;m việc của bạn một ch&uacute;t ấm &aacute;p v&agrave; một n&eacute;t dịu d&agrave;ng của m&ugrave;a thu. C&acirc;y rất th&iacute;ch hợp để trang tr&iacute; tr&ecirc;n b&agrave;n l&agrave;m việc, tr&ecirc;n kệ tủ. M&agrave;u cam, đỏ tượng trưng cho sự may mắn, t&agrave;i lộc n&ecirc;n ch&uacute;ng rất được ưa chuộng.</p>', 500000, 'phong-la-do383.jpg', 1, NULL, NULL),
(21, 'Phong Lá Đỏ Loại 1', '1', 23, 50, 0, '<p>Phong L&aacute; Đỏ (Acer rubrum) c&oacute; nguồn gốc từ Trung Quốc (China) v&agrave; Nhật Bản (Japan). C&acirc;y với sắc cam, đỏ rực rỡ của l&aacute; trước m&ugrave;a rụng l&aacute; sẽ mang đến cho kh&ocirc;ng gian nơi ở, nơi l&agrave;m việc của bạn một ch&uacute;t ấm &aacute;p v&agrave; một n&eacute;t dịu d&agrave;ng của m&ugrave;a thu. C&acirc;y rất th&iacute;ch hợp để trang tr&iacute; tr&ecirc;n b&agrave;n l&agrave;m việc, tr&ecirc;n kệ tủ. M&agrave;u cam, đỏ tượng trưng cho sự may mắn, t&agrave;i lộc n&ecirc;n ch&uacute;ng rất được ưa chuộng.</p>', 600000, 'phong-la-xanh89.jpg', 1, NULL, NULL),
(22, 'Phong Lá Đỏ Loại 2', '1', 23, 50, 0, '<p>Phong L&aacute; Đỏ (Acer rubrum) c&oacute; nguồn gốc từ Trung Quốc (China) v&agrave; Nhật Bản (Japan). C&acirc;y với sắc cam, đỏ rực rỡ của l&aacute; trước m&ugrave;a rụng l&aacute; sẽ mang đến cho kh&ocirc;ng gian nơi ở, nơi l&agrave;m việc của bạn một ch&uacute;t ấm &aacute;p v&agrave; một n&eacute;t dịu d&agrave;ng của m&ugrave;a thu. C&acirc;y rất th&iacute;ch hợp để trang tr&iacute; tr&ecirc;n b&agrave;n l&agrave;m việc, tr&ecirc;n kệ tủ. M&agrave;u cam, đỏ tượng trưng cho sự may mắn, t&agrave;i lộc n&ecirc;n ch&uacute;ng rất được ưa chuộng.</p>', 8000000, 'phong-la-do410.jpg', 1, NULL, NULL),
(23, 'Phong Lá Đỏ Loại 3', '1', 23, 50, 0, '<p>Phong L&aacute; Đỏ (Acer rubrum) c&oacute; nguồn gốc từ Trung Quốc (China) v&agrave; Nhật Bản (Japan). C&acirc;y với sắc cam, đỏ rực rỡ của l&aacute; trước m&ugrave;a rụng l&aacute; sẽ mang đến cho kh&ocirc;ng gian nơi ở, nơi l&agrave;m việc của bạn một ch&uacute;t ấm &aacute;p v&agrave; một n&eacute;t dịu d&agrave;ng của m&ugrave;a thu. C&acirc;y rất th&iacute;ch hợp để trang tr&iacute; tr&ecirc;n b&agrave;n l&agrave;m việc, tr&ecirc;n kệ tủ. M&agrave;u cam, đỏ tượng trưng cho sự may mắn, t&agrave;i lộc n&ecirc;n ch&uacute;ng rất được ưa chuộng.</p>', 500000, 'phong-la-do532.jpg', 1, NULL, NULL),
(24, 'Cây Xanh Tiểu Cảnh', '2', 24, 43, 1, '<p>C&acirc;y Sanh kh&ocirc;ng k&eacute;n đất, rất th&iacute;ch hợp trồng ở những nơi c&oacute; kh&iacute; hậu nhiệt đới n&oacute;ng ẩm, mưa nhiều, c&acirc;y cần một lượng nước lớn để sinh trưởng, cũng như ph&aacute;t triển. Khi thiếu nước c&acirc;y c&acirc;y Sanh (<em>Ficus benjamina)&nbsp;</em>sẽ ph&aacute;t triển chậm, tr&ecirc;n th&acirc;n xuất thường sẽ hiện c&aacute;c điểm lồi trắng.</p>', 824000, 'cay-xanh-bonsai74.jpg', 1, NULL, NULL),
(25, 'Cây si Xanh', '2', 24, 49, 1, '<p><strong>C&acirc;y Si</strong>&nbsp;l&agrave; một trong bốn lo&agrave;i c&acirc;y trong&nbsp;<a href=\"https://caydothi.com.vn/san-pham/cay-sop/\">bộ c&acirc;y tứ trụ</a>&nbsp;c&oacute; tuổi thọ cao nhất v&agrave; được trồng nhiều ở nước ta. Kh&ocirc;ng những l&agrave; c&acirc;y xanh c&oacute; b&oacute;ng m&aacute;t tuyệt vời thu h&uacute;t người chi&ecirc;m ngưỡng bởi d&aacute;ng c&acirc;y đẹp, t&aacute;n x&ograve;e rộng, nhiều rễ phụ mọc từ c&agrave;nh nh&aacute;nh nhỏ bu&ocirc;ng rủ xuống đung đưa trong gi&oacute; tạo n&eacute;t đẹp nhẹ nh&agrave;ng, b&igrave;nh dị m&agrave; c&acirc;y Si rất gần gũi v&agrave; ưa chuộng trồng phổ biến l&agrave;m c&acirc;y xanh đ&ocirc; thị, tiểu cảnh s&acirc;n vườn, c&acirc;y cảnh bonsai ở nước ta.</p>', 60000, 'cay-xanh114.jpg', 1, NULL, NULL),
(26, 'Cây si Xanh 2', '2', 24, 49, 1, '<p><strong>C&acirc;y Si</strong>&nbsp;l&agrave; một trong bốn lo&agrave;i c&acirc;y trong&nbsp;<a href=\"https://caydothi.com.vn/san-pham/cay-sop/\">bộ c&acirc;y tứ trụ</a>&nbsp;c&oacute; tuổi thọ cao nhất v&agrave; được trồng nhiều ở nước ta. Kh&ocirc;ng những l&agrave; c&acirc;y xanh c&oacute; b&oacute;ng m&aacute;t tuyệt vời thu h&uacute;t người chi&ecirc;m ngưỡng bởi d&aacute;ng c&acirc;y đẹp, t&aacute;n x&ograve;e rộng, nhiều rễ phụ mọc từ c&agrave;nh nh&aacute;nh nhỏ bu&ocirc;ng rủ xuống đung đưa trong gi&oacute; tạo n&eacute;t đẹp nhẹ nh&agrave;ng, b&igrave;nh dị m&agrave; c&acirc;y Si rất gần gũi v&agrave; ưa chuộng trồng phổ biến l&agrave;m c&acirc;y xanh đ&ocirc; thị, tiểu cảnh s&acirc;n vườn, c&acirc;y cảnh bonsai ở nước ta.</p>', 60000, 'cay-xanh56.jfif', 1, NULL, NULL),
(27, 'Cây Đa (Ficus bengalensis)', '3', 24, 50, 5, '<h3>C&acirc;y Đa đ&atilde; trở n&ecirc;n qu&aacute; phổ biến bởi sự gắn b&oacute; với l&agrave;ng qu&ecirc; Việt Nam, gắn liền với c&aacute;c h&igrave;nh ảnh qu&ecirc; hương: Bến nước, con đ&ograve;; xuất hiện trong c&aacute;c c&acirc;u thơ, ca dao, tục ngữ, tranh ảnh&hellip; Trong phong thủy, c&acirc;y Đa (<em>Ficus bengalensis)</em>&nbsp;mang &yacute; nghĩa trường thọ, sức sống dẻo dai, c&aacute;c hộ gia đ&igrave;nh ở qu&ecirc; c&oacute; vườn c&acirc;y thường kh&ocirc;ng thể thiếu đi c&acirc;y đa Bonsai trong bộ sưu tập c&aacute; nh&acirc;n.</h3>', 508000, 'cay-xanh312.jpg', 1, NULL, NULL),
(28, 'Phong Lá Xanh', '1', 23, 20, 2, '<p>T&ecirc;n c&acirc;y: C&acirc;y Phong L&aacute; Đỏ</p>\r\n\r\n<p>T&ecirc;n gọi kh&aacute;c: c&acirc;y phong đỏ tươi, đầm lầy phong, phong mềm, Carolina phong đỏ, Drummond phong m&agrave;u đỏ, v&agrave; phong nước</p>\r\n\r\n<p>T&ecirc;n khoa học: Acer rubrum</p>\r\n\r\n<p>Họ thực vật: Họ Th&ocirc;ng</p>\r\n\r\n<p>C&acirc;y Phong l&aacute; đỏ c&oacute; xuất xứ từ c&aacute;c nước ch&acirc;u &acirc;u, Nhật Bản v&agrave; mới được trồng ở Việt Nam nước ta</p>', 786000, 'phong-la-xanh51.jpg', 1, NULL, NULL),
(29, 'Phong Võ Xoắn', '1', 23, 20, 2, '<p>T&ecirc;n c&acirc;y: C&acirc;y Phong L&aacute; Đỏ</p>\r\n\r\n<p>T&ecirc;n gọi kh&aacute;c: c&acirc;y phong đỏ tươi, đầm lầy phong, phong mềm, Carolina phong đỏ, Drummond phong m&agrave;u đỏ, v&agrave; phong nước</p>\r\n\r\n<p>T&ecirc;n khoa học: Acer rubrum</p>\r\n\r\n<p>Họ thực vật: Họ Th&ocirc;ng</p>\r\n\r\n<p>C&acirc;y Phong l&aacute; đỏ c&oacute; xuất xứ từ c&aacute;c nước ch&acirc;u &acirc;u, Nhật Bản v&agrave; mới được trồng ở Việt Nam nước ta</p>', 988000, 'phong-vo-san51.jpg', 1, NULL, NULL),
(30, 'Hoa Giấy', '4', 25, 20, 5, '<p>C&acirc;y hoa giấy l&agrave; một loại thực vật c&oacute; hoa với t&ecirc;n khoa học l&agrave; Bougainvillea. Một số địa phương gọi l&agrave; c&acirc;y b&ocirc;ng giấy hay c&acirc;y m&oacute;c diều. Xuất xứ từ c&aacute;c v&ugrave;ng miền trung nam Mỹ, c&acirc;y được mang trồng tại nhiều nơi tr&ecirc;n thế giới. Thuộc giống d&acirc;y leo c&oacute; gai, c&acirc;y c&oacute; thể mọc cao l&ecirc;n tới 12m.&nbsp;L&aacute; c&acirc;y hoa giấy c&oacute; dạng đơn, mọc c&aacute;ch v&agrave; c&oacute; m&agrave;u xanh. H&igrave;nh dạng của l&aacute; l&agrave; h&igrave;nh tr&aacute;i xoan, thu&ocirc;n d&agrave;i ở đỉnh v&agrave; tr&ograve;n ở gốc.</p>', 35000, 'hoa-giay62.jpg', 1, NULL, NULL),
(31, 'Chậu Mai Cảnh', '5', 25, 20, 1, '<p><strong>Mai v&agrave;ng</strong>,&nbsp;<strong>ho&agrave;ng mai</strong>,&nbsp;<strong>huỳnh mai</strong>&nbsp;hay&nbsp;<strong>l&atilde;o mai</strong>&nbsp;(<a href=\"https://vi.wikipedia.org/wiki/Danh_ph%C3%A1p_hai_ph%E1%BA%A7n\" title=\"Danh pháp hai phần\">danh ph&aacute;p hai phần</a>:&nbsp;<em><strong>Ochna integerrima</strong></em>) l&agrave; t&ecirc;n gọi của một lo&agrave;i&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Th%E1%BB%B1c_v%E1%BA%ADt_c%C3%B3_hoa\" title=\"Thực vật có hoa\">thực vật c&oacute; hoa</a>&nbsp;thuộc&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Chi_Mai\" title=\"Chi Mai\">chi Mai</a>&nbsp;(<em>Ochna</em>),&nbsp;<a href=\"https://vi.wikipedia.org/wiki/H%E1%BB%8D_Mai_v%C3%A0ng\" title=\"Họ Mai vàng\">họ Mai</a>&nbsp;(Ochnaceae). Lo&agrave;i hoa n&agrave;y được trưng b&agrave;y phổ biến ở&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Mi%E1%BB%81n_Nam_(Vi%E1%BB%87t_Nam)\" title=\"Miền Nam (Việt Nam)\">miền Nam Việt Nam</a>&nbsp;v&agrave;o dịp&nbsp;<a href=\"https://vi.wikipedia.org/wiki/T%E1%BA%BFt_Nguy%C3%AAn_%C4%90%C3%A1n\" title=\"Tết Nguyên Đán\">Tết Nguy&ecirc;n Đ&aacute;n</a>.<sup><a href=\"https://vi.wikipedia.org/wiki/Mai_v%C3%A0ng#cite_note-1\">[1]</a></sup></p>', 3000000, 'hoa-mai18.jpg', 1, NULL, NULL),
(32, 'Chậu Hoa Đào Giả', '6', 25, 20, 1, '<p><strong>Đ&agrave;o</strong>&nbsp;(danh ph&aacute;p khoa học:&nbsp;<em><strong>Prunus persica</strong></em>) l&agrave; một lo&agrave;i c&acirc;y được trồng để lấy quả hay hoa. N&oacute; l&agrave; một lo&agrave;i&nbsp;<a href=\"https://vi.wikipedia.org/w/index.php?title=C%C3%A2y_s%E1%BB%9Bm_r%E1%BB%A5ng_l%C3%A1&amp;action=edit&amp;redlink=1\" title=\"Cây sớm rụng lá (trang chưa được viết)\">c&acirc;y sớm rụng l&aacute;</a>, th&acirc;n gỗ nhỏ, c&oacute; thể cao tới 5&ndash;10 m. L&aacute; của n&oacute; c&oacute; h&igrave;nh mũi m&aacute;c, d&agrave;i 7&ndash;15&nbsp;cm v&agrave; rộng 2&ndash;3&nbsp;cm. Hoa nở v&agrave;o đầu m&ugrave;a xu&acirc;n, trước khi ra l&aacute;; hoa đơn hay c&oacute; đ&ocirc;i, đường k&iacute;nh 2,5&ndash;3&nbsp;cm, m&agrave;u hồng với 5 c&aacute;nh hoa. Quả đ&agrave;o c&ugrave;ng với quả của&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Anh_%C4%91%C3%A0o\" title=\"Anh đào\">anh đ&agrave;o</a>,&nbsp;<a href=\"https://vi.wikipedia.org/wiki/M%E1%BA%ADn\" title=\"Mận\">mận</a>,&nbsp;<a href=\"https://vi.wikipedia.org/wiki/M%C6%A1\" title=\"Mơ\">mơ</a>&nbsp;l&agrave; c&aacute;c loại quả hạch.Quả của n&oacute; c&oacute; một&nbsp;<a href=\"https://vi.wikipedia.org/wiki/H%E1%BA%A1t_gi%E1%BB%91ng\" title=\"Hạt giống\">hạt giống</a>&nbsp;to được bao bọc trong một lớp vỏ gỗ cứng (gọi l&agrave; &quot;hột&quot;), c&ugrave;i thịt m&agrave;u v&agrave;ng hay &aacute;nh trắng, c&oacute; m&ugrave;i vị thơm ngon v&agrave; lớp vỏ c&oacute; l&ocirc;ng tơ mềm như nhung.</p>', 3500000, 'hoa-dao-gia59.jpg', 1, NULL, NULL),
(33, 'Chậu Hoa Hồng', '7', 25, 18, 1, '<p><strong>Hồng</strong>&nbsp;hay&nbsp;<strong>hường</strong>&nbsp;l&agrave; t&ecirc;n gọi chung cho c&aacute;c lo&agrave;i thực vật c&oacute; hoa dạng&nbsp;<a href=\"https://vi.wikipedia.org/wiki/C%C3%A2y_b%E1%BB%A5i\" title=\"Cây bụi\">c&acirc;y bụi</a>&nbsp;hoặc&nbsp;<a href=\"https://vi.wikipedia.org/w/index.php?title=C%C3%A2y_leo&amp;action=edit&amp;redlink=1\" title=\"Cây leo (trang chưa được viết)\">c&acirc;y leo</a>&nbsp;<a href=\"https://vi.wikipedia.org/wiki/C%C3%A2y_l%C3%A2u_n%C4%83m\" title=\"Cây lâu năm\">l&acirc;u năm</a>&nbsp;thuộc chi&nbsp;<em><strong>Rosa</strong></em>, họ&nbsp;<em><a href=\"https://vi.wikipedia.org/wiki/H%E1%BB%8D_Hoa_h%E1%BB%93ng\" title=\"Họ Hoa hồng\">Rosaceae</a></em>, với hơn 100 lo&agrave;i với m&agrave;u hoa đa dạng, ph&acirc;n bố từ miền&nbsp;<a href=\"https://vi.wikipedia.org/wiki/%C3%94n_%C4%91%E1%BB%9Bi\" title=\"Ôn đới\">&ocirc;n đới</a>&nbsp;đến&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Nhi%E1%BB%87t_%C4%91%E1%BB%9Bi\" title=\"Nhiệt đới\">nhiệt đới</a>. C&aacute;c lo&agrave;i n&agrave;y nổi tiếng v&igrave; hoa đẹp n&ecirc;n thường gọi l&agrave;&nbsp;<strong>hoa hồng</strong>. Phần lớn c&oacute; nguồn gốc bản địa ch&acirc;u &Aacute;, số &iacute;t c&ograve;n lại c&oacute; nguồn gốc bản địa ch&acirc;u &Acirc;u, Bắc Mỹ, v&agrave; T&acirc;y Bắc Phi. C&aacute;c lo&agrave;i bản địa,&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Gi%E1%BB%91ng_c%C3%A2y_tr%E1%BB%93ng\" title=\"Giống cây trồng\">giống c&acirc;y trồng</a>&nbsp;v&agrave;&nbsp;<a href=\"https://vi.wikipedia.org/w/index.php?title=C%C3%A2y_lai_gh%C3%A9p&amp;action=edit&amp;redlink=1\" title=\"Cây lai ghép (trang chưa được viết)\">c&acirc;y lai gh&eacute;p</a>&nbsp;đều được trồng l&agrave;m cảnh v&agrave; lấy hương thơm.<sup><a href=\"https://vi.wikipedia.org/wiki/Hoa_h%E1%BB%93ng#cite_note-1\">[1]</a></sup>&nbsp;Đ&ocirc;i khi c&aacute;c lo&agrave;i n&agrave;y được gọi l&agrave;&nbsp;<strong><a href=\"https://vi.wikipedia.org/wiki/T%C6%B0%E1%BB%9Dng_vi\" title=\"Tường vi\">tường vi</a></strong>.</p>', 73000, 'hoa-hong23.jfif', 1, NULL, NULL),
(34, 'Tiêu Cảnh Sen Đá', '8', 24, 20, 4, '<p>Tiểu cảnh mini hay bất cứ chậu cảnh trong nh&agrave; n&agrave;o th&igrave; cũng phải t&iacute;nh đến khả năng chịu tối của n&oacute;.</p>\r\n\r\n<p>Khi l&agrave;m chậu tiểu cảnh, bạn c&oacute; &yacute; tưởng để trong nh&agrave; th&igrave; trước hết bạn cần phải lựa chọn những loại c&acirc;y ưa b&oacute;ng m&aacute;t, cần &iacute;t &aacute;nh s&aacute;ng, bởi nếu kh&ocirc;ng th&igrave; với m&ocirc;i trường thiếu s&aacute;ng chậu tiểu cảnh sẽ thiếu sức sống v&agrave; kh&ocirc;ng c&oacute; hồn.</p>', 28000, 'tieu-canh118.jpg', 1, NULL, NULL),
(35, 'Tiểu Cảnh Xương Rồng', '9', 26, 20, 4, '<p><em>Chậu tiểu cảnh</em>&nbsp;đẹp mini sẽ l&agrave; giải ph&aacute;p rất tốt để ch&uacute;ng ta c&oacute; thể tận hưởng được sức sống của&nbsp;<em>hoa</em>&nbsp;cỏ. ...&nbsp;<em>tiểu cảnh</em>&nbsp;đẹp mini để tặng &ldquo;gấu&rdquo;. Với những&nbsp;<em>chậu</em>&nbsp;c&acirc;y trong nh&agrave; ch&uacute;ng ta thường chọn những loại c&acirc;y ưa b&oacute;ng m&aacute;t&nbsp;...</p>', 9, 'tieu-canh251.jpg', 1, NULL, NULL),
(36, 'Tiểu Cảnh Sen Đá 2', '10', 26, 20, 4, '<p><em>Chậu tiểu cảnh</em>&nbsp;đẹp mini sẽ l&agrave; giải ph&aacute;p rất tốt để ch&uacute;ng ta c&oacute; thể tận hưởng được sức sống của&nbsp;<em>hoa</em>&nbsp;cỏ. ...&nbsp;<em>tiểu cảnh</em>&nbsp;đẹp mini để tặng &ldquo;gấu&rdquo;. Với những&nbsp;<em>chậu</em>&nbsp;c&acirc;y trong nh&agrave; ch&uacute;ng ta thường chọn những loại c&acirc;y ưa b&oacute;ng m&aacute;t&nbsp;...</p>', 60000, 'tieu-canh448.jpg', 1, NULL, NULL),
(37, 'Mai Chiếu Thủy', '11', 24, 20, 2, '<p><strong>C&acirc;y mai chiếu thủy</strong>&nbsp;l&agrave; c&acirc;y cảnh phong thủy đại diện cho sự bền vững v&agrave; ổn định gia t&agrave;i của gia chủ. v&agrave; thường được trồng trong chậu hoặc trang tr&iacute; s&acirc;n vườn, đặt ở sảnh, b&agrave;n tr&agrave;, b&agrave;n l&agrave;m việc hay ban c&ocirc;ng v&agrave; s&acirc;n thượng. C&acirc;y mai chiếu thủy được nhiều lựa chọn l&agrave;m qu&agrave; biếu v&agrave;o c&aacute;c ng&agrave;y lễ tết, c&aacute;c dịp khai trương cửa h&agrave;ng v&igrave; những &yacute; nghĩa của n&oacute;. Mai chiếu thuỷ hay c&ograve;n gọi l&agrave; mai chấn thủy l&agrave; loại c&acirc;y cảnh c&oacute; hoa đẹp ra quanh năm, dễ trồng v&agrave; dễ chăm s&oacute;c, th&iacute;ch hợp l&agrave;m c&acirc;y ngoại thất, c&acirc;y s&acirc;n vườn</p>', 113000, 'mai-chieu-thuy-bonsai60.jpg', 1, NULL, NULL),
(38, 'Tiểu Cảnh Vụn Vở', '11', 26, 20, 2, '<p><em>Chậu tiểu cảnh</em>&nbsp;đẹp mini sẽ l&agrave; giải ph&aacute;p rất tốt để ch&uacute;ng ta c&oacute; thể tận hưởng được sức sống của&nbsp;<em>hoa</em>&nbsp;cỏ. ...&nbsp;<em>tiểu cảnh</em>&nbsp;đẹp mini để tặng &ldquo;gấu&rdquo;. Với những&nbsp;<em>chậu</em>&nbsp;c&acirc;y trong nh&agrave; ch&uacute;ng ta thường chọn những loại c&acirc;y ưa b&oacute;ng m&aacute;t&nbsp;...</p>', 145000, 'tieu-canh454.jpg', 1, NULL, NULL),
(39, 'Sen Đá Loại 1', '44', 27, 50, 2, '<p><strong>C&acirc;y sen đ&aacute;</strong>&nbsp;l&agrave; d&ograve;ng thực vật mọng nước (<strong>Succulent plant</strong>) thuộc chi&nbsp;<strong>Echeveria</strong>&nbsp;họ thuốc bỏng (Crassulaceae). Ước t&iacute;nh c&oacute; khoảng 60 họ sen đ&aacute; kh&aacute;c nhau với&nbsp;gần 400&nbsp;lo&agrave;i, trong đ&oacute; hơn 90% ph&acirc;n bố chủ yếu ở v&ugrave;ng n&oacute;ng gần x&iacute;ch đạo&nbsp;<strong>Mexico</strong>,&nbsp;<strong>Nam&nbsp;Mỹ</strong>,&nbsp;<strong>ch&acirc;u &Uacute;c</strong>&nbsp;v&agrave;&nbsp;<strong>ch&acirc;u Phi</strong>.</p>', 32000, 'senda132.jpg', 1, NULL, NULL),
(40, 'Sen Đá Kim Cương', '55', 27, 20, 2, '<p><strong>C&acirc;y sen đ&aacute;</strong>&nbsp;l&agrave; d&ograve;ng thực vật mọng nước (<strong>Succulent plant</strong>) thuộc chi&nbsp;<strong>Echeveria</strong>&nbsp;họ thuốc bỏng (Crassulaceae). Ước t&iacute;nh c&oacute; khoảng 60 họ sen đ&aacute; kh&aacute;c nhau với&nbsp;gần 400&nbsp;lo&agrave;i, trong đ&oacute; hơn 90% ph&acirc;n bố chủ yếu ở v&ugrave;ng n&oacute;ng gần x&iacute;ch đạo&nbsp;<strong>Mexico</strong>,&nbsp;<strong>Nam&nbsp;Mỹ</strong>,&nbsp;<strong>ch&acirc;u &Uacute;c</strong>&nbsp;v&agrave;&nbsp;<strong>ch&acirc;u Phi</strong>.</p>', 75000, 'senda1269.jfif', 1, NULL, NULL),
(41, 'Sen Đá Dạ Quang', '5', 28, 20, 5, '<p>Sen Đ&aacute; Dạ Quang</p>', 63000, 'senda1277.jpg', 1, NULL, NULL),
(42, 'Sen Đá Kim Cương 125', '26', 29, 50, 5, '<p>Sen Đ&aacute; Kim Cương&nbsp;</p>', 51000, 'daquang393.jpg', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_thanhtoan`
--

CREATE TABLE `tbl_thanhtoan` (
  `payment_id` bigint(20) UNSIGNED NOT NULL,
  `payment_method` int(11) NOT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_thanhtoan`
--

INSERT INTO `tbl_thanhtoan` (`payment_id`, `payment_method`, `payment_status`, `created_at`, `updated_at`) VALUES
(26, 2, '1', NULL, NULL),
(27, 2, '1', NULL, NULL),
(28, 2, '1', NULL, NULL),
(29, 2, '1', NULL, NULL),
(30, 1, '1', NULL, NULL),
(31, 1, '1', NULL, NULL),
(32, 1, '1', NULL, NULL),
(33, 1, '1', NULL, NULL),
(34, 2, '1', NULL, NULL),
(35, 1, '1', NULL, NULL),
(36, 2, '1', NULL, NULL),
(37, 1, '1', NULL, NULL),
(38, 1, '1', NULL, NULL),
(39, 1, '1', NULL, NULL),
(40, 1, '1', NULL, NULL),
(41, 1, '1', NULL, NULL),
(42, 1, '1', NULL, NULL),
(43, 1, '1', NULL, NULL),
(44, 1, '1', NULL, NULL),
(45, 1, '1', NULL, NULL),
(46, 1, '1', NULL, NULL),
(47, 1, '1', NULL, NULL),
(48, 1, '1', NULL, NULL),
(49, 1, '1', NULL, NULL),
(50, 1, '1', NULL, NULL),
(51, 2, '1', NULL, NULL),
(52, 1, '1', NULL, NULL),
(53, 1, '1', NULL, NULL),
(54, 1, '1', NULL, NULL),
(55, 1, '1', NULL, NULL),
(56, 1, '1', NULL, NULL),
(57, 1, '1', NULL, NULL),
(58, 1, '1', NULL, NULL),
(59, 1, '1', NULL, NULL),
(60, 1, '1', NULL, NULL),
(61, 1, '1', NULL, NULL),
(62, 1, '1', NULL, NULL),
(63, 1, '1', NULL, NULL),
(64, 1, '1', NULL, NULL),
(65, 1, '1', NULL, NULL),
(66, 1, '1', NULL, NULL),
(67, 1, '1', NULL, NULL),
(68, 1, '1', NULL, NULL),
(69, 1, '1', NULL, NULL),
(70, 1, '1', NULL, NULL),
(71, 1, '1', NULL, NULL),
(72, 1, '1', NULL, NULL),
(73, 1, '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Chỉ mục cho bảng `danh_muc_table`
--
ALTER TABLE `danh_muc_table`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_chitiet_donhang`
--
ALTER TABLE `tbl_chitiet_donhang`
  ADD PRIMARY KEY (`order_details_id`);

--
-- Chỉ mục cho bảng `tbl_donhang`
--
ALTER TABLE `tbl_donhang`
  ADD PRIMARY KEY (`order_id`);

--
-- Chỉ mục cho bảng `tbl_goihang`
--
ALTER TABLE `tbl_goihang`
  ADD PRIMARY KEY (`shipping_id`);

--
-- Chỉ mục cho bảng `tbl_khachhang`
--
ALTER TABLE `tbl_khachhang`
  ADD PRIMARY KEY (`customer_id`);

--
-- Chỉ mục cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  ADD PRIMARY KEY (`product_id`);

--
-- Chỉ mục cho bảng `tbl_thanhtoan`
--
ALTER TABLE `tbl_thanhtoan`
  ADD PRIMARY KEY (`payment_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `danh_muc_table`
--
ALTER TABLE `danh_muc_table`
  MODIFY `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `tbl_chitiet_donhang`
--
ALTER TABLE `tbl_chitiet_donhang`
  MODIFY `order_details_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT cho bảng `tbl_donhang`
--
ALTER TABLE `tbl_donhang`
  MODIFY `order_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT cho bảng `tbl_goihang`
--
ALTER TABLE `tbl_goihang`
  MODIFY `shipping_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT cho bảng `tbl_khachhang`
--
ALTER TABLE `tbl_khachhang`
  MODIFY `customer_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT cho bảng `tbl_thanhtoan`
--
ALTER TABLE `tbl_thanhtoan`
  MODIFY `payment_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
