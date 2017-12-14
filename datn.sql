-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2017 at 04:38 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `datn`
--

-- --------------------------------------------------------

--
-- Table structure for table `access`
--

CREATE TABLE `access` (
  `id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  `view_act` int(1) NOT NULL,
  `delete_act` int(1) NOT NULL,
  `add_act` int(1) NOT NULL,
  `edit_act` int(1) NOT NULL,
  `is_show` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `access`
--

INSERT INTO `access` (`id`, `account_id`, `module_id`, `view_act`, `delete_act`, `add_act`, `edit_act`, `is_show`) VALUES
(248, 12, 1, 1, 1, 1, 1, 1),
(249, 12, 2, 0, 0, 0, 0, 1),
(250, 12, 3, 0, 0, 0, 0, 1),
(251, 12, 22, 0, 0, 0, 0, 1),
(252, 12, 23, 1, 1, 1, 1, 1),
(253, 12, 24, 0, 0, 0, 0, 1),
(254, 12, 31, 0, 0, 0, 0, 1),
(255, 12, 32, 0, 0, 0, 0, 1),
(256, 14, 1, 1, 1, 1, 1, 1),
(257, 14, 2, 0, 0, 0, 0, 1),
(258, 14, 3, 0, 0, 0, 0, 1),
(259, 14, 22, 0, 0, 0, 0, 1),
(260, 14, 23, 1, 1, 1, 1, 1),
(261, 14, 24, 1, 1, 1, 1, 1),
(262, 14, 31, 0, 0, 0, 0, 1),
(263, 14, 32, 0, 0, 0, 0, 1),
(336, 3, 1, 1, 1, 1, 1, 1),
(337, 3, 2, 1, 1, 1, 1, 1),
(338, 3, 3, 1, 1, 1, 1, 1),
(339, 3, 22, 1, 1, 1, 1, 1),
(340, 3, 23, 1, 1, 1, 1, 1),
(341, 3, 24, 1, 1, 1, 1, 1),
(342, 3, 31, 1, 1, 1, 1, 1),
(343, 3, 32, 1, 1, 1, 1, 1),
(344, 1, 1, 1, 1, 1, 1, 1),
(345, 1, 2, 1, 1, 1, 1, 1),
(346, 1, 3, 1, 1, 1, 1, 1),
(347, 1, 22, 1, 1, 1, 1, 1),
(348, 1, 23, 1, 1, 1, 1, 1),
(349, 1, 24, 1, 1, 1, 1, 1),
(350, 1, 31, 1, 1, 1, 1, 1),
(351, 1, 32, 1, 1, 1, 1, 1),
(352, 1, 33, 1, 1, 1, 1, 1),
(353, 3, 33, 1, 1, 1, 1, 1),
(354, 15, 1, 1, 1, 1, 1, 1),
(355, 15, 2, 1, 1, 1, 1, 1),
(356, 15, 3, 1, 1, 1, 1, 1),
(357, 15, 22, 1, 1, 1, 1, 1),
(358, 15, 23, 1, 1, 1, 1, 1),
(359, 15, 24, 1, 1, 1, 1, 1),
(360, 15, 31, 1, 1, 1, 1, 1),
(361, 15, 32, 1, 1, 1, 1, 1),
(362, 1, 45, 1, 1, 1, 1, 1),
(363, 3, 45, 1, 1, 1, 1, 1),
(364, 1, 46, 1, 1, 1, 1, 1),
(365, 3, 46, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name_vi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_show` int(1) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` int(15) NOT NULL,
  `group_account_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `username`, `password`, `name`, `name_vi`, `is_show`, `email`, `phone`, `address`, `created`, `group_account_id`, `status`) VALUES
(1, 'admin', 'admin', 'Quản trị viên', 'Quan tri vien', 1, 'quantri@gmail.com', '1900', '', 1511885959, 3, 1),
(3, 'administrator', '', 'Quản Trị Viên', 'Quan Tri Vien', 1, '', '', '', 1512575099, 0, 0),
(12, 'sale', '', 'Nhân viên bán hàng', 'Nhan vien ban hang', 1, '', '', '', 1512700699, 0, 0),
(14, 'ngocken', 'anhngoc', 'Phạm Xuân Ngọc', 'Pham Xuan Ngoc', 1, 'ngocken95@gmail.com', '01678986627', '', 1512701173, 12, 0),
(15, 'ken', '123', 'Ken', 'Ken', 1, 'ken@gmail.com', '19001995', '', 1512735791, 3, 0),
(16, 'member', '', 'Khách hàng', 'Khach hang', 1, '', '', '', 1513183125, 0, 0),
(17, 'ngoc', '123', 'Ngoc', 'Ngoc', 1, 'ngoc@gmail.com', '0167887', 'Hà Nội', 1513183332, 16, 0),
(18, 'ngoc', '123', 'Ngoc', 'Ngoc', 0, 'ngoc@gmail.com', '0167887', 'Hà Nội', 1513183374, 16, 0),
(19, 'ngoc', '123', 'Ngoc', 'Ngoc', 0, 'ngoc@gmail.com', '0167887', 'Hà Nội', 1513183377, 16, 0),
(20, 'test123', '123', 'kentest', 'kentest', 1, 'test@gmail.com', '15454', 'HNN', 1513183570, 16, 0),
(21, 'test2', '123', 'kentest2', 'kentest2', 1, 'test2@gmail.com', '4343', 'HN', 1513183757, 16, 0),
(22, 'test21', 'a', 'test2', 'test2', 1, 'test2@gmail.com', '3434', 'HN', 1513183878, 16, 0);

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `id` int(11) NOT NULL,
  `code` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `total` decimal(15,0) NOT NULL,
  `created` int(11) NOT NULL,
  `is_show` int(11) NOT NULL,
  `type` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `account_id` int(11) NOT NULL,
  `discount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`id`, `code`, `total`, `created`, `is_show`, `type`, `account_id`, `discount`) VALUES
(4, 'PN-1', '4250000', 1512899431, 1, 'IMPORT', 1, 0),
(5, 'PN-2', '1800000', 1512899431, 1, 'IMPORT', 1, 0),
(6, 'PN-3', '1200000', 1512899431, 1, 'IMPORT', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_show` int(1) NOT NULL,
  `created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `code`, `name`, `logo`, `is_show`, `created`) VALUES
(6, 'ilip', 'ILIP', 'ILIP.png', 1, 1506757680),
(7, 'nyd', 'NYD', 'NYD.jpg', 1, 1506748176),
(8, 'mac', 'MAC', 'MAC.jpg', 1, 1506749086),
(9, 'sakura', 'SAKURA', 'SAKURA.png', 1, 1506749120),
(10, 'missha', 'MISSHA', 'MISSHA.jpg', 1, 1506749134),
(11, 'toplist', 'TOPLIST', 'TOPLIST.png', 1, 1506749149),
(12, 'test', 'test', 'hayday_full.jpg', 1, 1512479442);

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `id` int(11) NOT NULL,
  `code` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `name_vi` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `is_show` int(1) NOT NULL,
  `created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`id`, `code`, `name`, `name_vi`, `is_show`, `created`) VALUES
(1, 'EEE8AA', 'PaleGoldenrod', 'PaleGoldenrod', 0, 1512711462),
(2, '8B4513', 'SaddleBrown', 'SaddleBrown', 1, 1512612980),
(3, 'FFE4E1', 'MistyRose', 'MistyRose', 0, 1512612999),
(4, 'D2691E', 'Chocolate', 'Chocolate', 1, 1512613014),
(5, 'B22222', 'Firebrick', 'Firebrick', 1, 1512613023),
(6, 'FF6347', 'Tomato', 'Tomato', 1, 1512613036),
(7, 'FF69B4', 'HotPink', 'HotPink', 1, 1512613049);

-- --------------------------------------------------------

--
-- Table structure for table `customer_order`
--

CREATE TABLE `customer_order` (
  `id` int(11) NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `total` decimal(15,0) NOT NULL,
  `created` int(11) NOT NULL,
  `is_show` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `cus_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cus_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cus_phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cus_address` text COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cus_note` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customer_order`
--

INSERT INTO `customer_order` (`id`, `code`, `total`, `created`, `is_show`, `account_id`, `cus_name`, `cus_email`, `cus_phone`, `cus_address`, `status`, `cus_note`) VALUES
(1, 'DH-1', '200000000', 1513211620, 1, 1, 'test', 'test2@gmail.com', '4343', 'HBT - Hà Nội', 'WH', 'giao hàng nhanh'),
(2, 'DH-2', '300000000', 1513212028, 0, 0, 'test', 'test2@gmail.com', '4343', 'Đống Đa Hà Nội', 'ORDER', 'trong đêm nay'),
(3, 'DH-3', '400000000', 1513212156, 1, 1, 'test', 'ngoc@gmail.com', '0167887', 'Hoàn Kiếm', 'WH', 'aaa'),
(4, 'DH-4', '400000000', 1513212191, 1, 1, 'test', 'ngoc@gmail.com', '0167887', 'Hoàn Kiếm', 'WH', 'aaa'),
(5, 'DH-5', '100000000', 1513212434, 1, 0, 'test', 'ngoc@gmail.com', '0167887', 'aaa', 'ORDER', 'bbb'),
(6, 'DH-6', '300000000', 1513216416, 0, 0, 'test', 'quantri@gmail.com', '1900', 'aasss', 'ORDER', 'asss'),
(7, 'DH-6', '500000000', 1513255440, 1, 1, 'kentest2', 'test2@gmail.com', '4343', 'HCM', 'WH', 'đây là order2');

-- --------------------------------------------------------

--
-- Table structure for table `detail_bill`
--

CREATE TABLE `detail_bill` (
  `id` int(11) NOT NULL,
  `bill_id` int(11) NOT NULL,
  `product_color_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(15,0) NOT NULL,
  `is_show` int(11) NOT NULL,
  `total` decimal(15,0) NOT NULL,
  `discount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `detail_bill`
--

INSERT INTO `detail_bill` (`id`, `bill_id`, `product_color_id`, `quantity`, `price`, `is_show`, `total`, `discount`) VALUES
(3, 4, 6, 10, '100000', 1, '1000000', 0),
(4, 4, 7, 15, '150000', 1, '2250000', 0),
(5, 4, 5, 5, '200000', 1, '1000000', 0),
(6, 5, 7, 3, '100000', 1, '300000', 0),
(7, 5, 6, 10, '150000', 1, '1500000', 0),
(8, 6, 6, 4, '150000', 1, '600000', 0),
(9, 6, 5, 3, '200000', 1, '600000', 0);

-- --------------------------------------------------------

--
-- Table structure for table `detail_order`
--

CREATE TABLE `detail_order` (
  `id` int(11) NOT NULL,
  `product_color_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `is_show` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `discount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `detail_order`
--

INSERT INTO `detail_order` (`id`, `product_color_id`, `quantity`, `price`, `is_show`, `order_id`, `discount`) VALUES
(1, 5, 2, 100000000, 1, 1, 0),
(2, 5, 3, 100000000, 1, 2, 0),
(3, 5, 4, 100000000, 1, 4, 0),
(4, 5, 1, 100000000, 1, 5, 0),
(5, 5, 3, 100000000, 1, 6, 0),
(6, 8, 4, 50000000, 1, 7, 0),
(7, 7, 3, 100000000, 1, 7, 0);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `is_show` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent_messenger` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `phone`, `email`, `address`, `content`, `is_show`, `status`, `type`, `parent_messenger`) VALUES
(1, 'Phạm Xuân Ngọc', 1678986627, 'ngocken95@gmail.com', 'Hà Nội', 'website đẹp', 1, 0, 'INBOX', 0);

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE `module` (
  `id` int(11) NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name_vi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_show` int(1) NOT NULL,
  `created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`id`, `code`, `name`, `name_vi`, `location`, `is_show`, `created`) VALUES
(1, 'homepage', 'Trang chủ', 'trang chu', 'backend', 1, 0),
(2, 'module', 'Module', 'module', 'backend', 1, 0),
(3, 'account', 'Tài khoản', 'tai khoan', 'backend', 1, 0),
(22, 'access', 'Quyền truy cập', 'Quyen truy cap', 'backend', 1, 1511931808),
(23, 'product', 'Sản phẩm', 'San pham', 'backend', 1, 1512012995),
(24, 'type_product', 'Loại sản phẩm', 'Loai san pham', 'backend', 1, 1512013433),
(31, 'color', 'Màu son', 'Mau son', 'backend', 1, 1512610419),
(32, 'importwh', 'Nhập kho', 'Nhap kho', 'backend', 1, 1512613444),
(34, 'homepage', 'Trang chủ', 'Trang chu', 'frontend', 1, 1512735870),
(35, 'intro', 'Giới thiệu', 'Gioi thieu', 'frontend', 1, 1512740060),
(36, 'news', 'Tin tức', 'Tin tuc', 'frontend', 1, 1512740121),
(37, 'category', 'Danh mục sản phẩm', 'Danh muc san pham', 'frontend', 1, 1512906563),
(38, 'library', 'Thư viện', 'Thu vien', 'frontend', 1, 1512909439),
(39, 'contact', 'Liên hệ', 'Lien he', 'frontend', 1, 1512910265),
(40, 'product_detail', 'Chi tiết sản phẩm', 'Chi tiet san pham', 'frontend', 1, 1512919803),
(41, 'cart', 'Giỏ hàng', 'Gio hang', 'frontend', 1, 1513045677),
(42, 'register', 'Đăng ký', 'Dang ky', 'frontend', 1, 1513178791),
(43, 'login', 'Đăng nhập', 'Dang nhap', 'frontend', 1, 1513184122),
(44, 'search', 'Tìm kiếm', 'Tim kiem', 'frontend', 1, 1513215264),
(45, 'order', 'Đơn hàng', 'Don hang', 'backend', 1, 1513215413),
(46, 'exportwh', 'Xuất kho', 'Xuat kho', 'backend', 1, 1513222231);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `account_id` int(11) NOT NULL,
  `created` int(11) NOT NULL,
  `is_show` int(11) NOT NULL,
  `news_view` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `img`, `content`, `account_id`, `created`, `is_show`, `news_view`) VALUES
(1, 'test', '1.png', 'đây là test', 1, 1512870495, 1, 0),
(2, '2', '1.png', 'bài test thứ 2', 1, 1512870495, 1, 0),
(3, 'bài test thứ 3', '1.png', 'bài test thứ 3', 1, 1512870495, 1, 0),
(4, 'bài test thứ 4', '1.png', 'bài test thứ 4', 1, 1512870495, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_type_id` int(11) NOT NULL,
  `code` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name_vi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `img_cover` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `img_list` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_show` int(1) NOT NULL,
  `created` int(11) NOT NULL,
  `product_like` int(11) NOT NULL DEFAULT '0',
  `product_view` int(11) NOT NULL DEFAULT '0',
  `product_buy` int(11) NOT NULL DEFAULT '0',
  `product_cmt` int(11) NOT NULL DEFAULT '0',
  `discount` int(11) NOT NULL,
  `price` decimal(15,0) NOT NULL,
  `hide` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `brand_id`, `product_type_id`, `code`, `name`, `name_vi`, `img_cover`, `img_list`, `description`, `is_show`, `created`, `product_like`, `product_view`, `product_buy`, `product_cmt`, `discount`, `price`, `hide`) VALUES
(4, 8, 2, 'test', 'Sản phẩm 1', 'San pham 1', '8-2-test-San-pham-1-cover.jpg', '358df37ed4c81e38a57bf6ec92143b10_tn.jpg/ef3e74c4d3bd4d47c5ee6b4770c4441d_tn.jpg/', 'đây là sản phẩm test', 1, 1512715066, 2, 3, 7, 0, 0, '1000000', 1),
(5, 7, 1, 'test2', 'Sản phẩm 2', 'San pham 2', '7-1-test2-San-pham-2-cover.png', '23376574_1479040692176034_3405443347651009209_n5.jpg/', 'test', 1, 1513255269, 1, 1, 4, 0, 0, '500000', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_color`
--

CREATE TABLE `product_color` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `price_avg` decimal(15,0) NOT NULL,
  `quantity` int(11) NOT NULL,
  `is_show` int(11) NOT NULL,
  `created` int(11) NOT NULL,
  `discount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_color`
--

INSERT INTO `product_color` (`id`, `product_id`, `color_id`, `price_avg`, `quantity`, `is_show`, `created`, `discount`) VALUES
(4, 4, 3, '0', 0, 0, 1512715087, 0),
(5, 4, 4, '200000', 8, 1, 1512715087, 0),
(6, 4, 5, '129167', 24, 1, 1512715087, 0),
(7, 4, 2, '141667', 18, 1, 1512715087, 0),
(8, 5, 4, '0', 0, 1, 1513255376, 0),
(9, 5, 6, '0', 0, 1, 1513255376, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_type`
--

CREATE TABLE `product_type` (
  `id` int(11) NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name_vi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_show` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_type`
--

INSERT INTO `product_type` (`id`, `code`, `name`, `name_vi`, `is_show`, `description`, `created`) VALUES
(1, 'son_duong', 'Son dưỡng', 'son duong', 1, 'Son dưỡng chính là dòng son cung cấp dưỡng chất cần thiết cho bờ môi. Hầu hết, các thoi son dưỡng đều chứa các thành phần như vitamin E, glyceri, lô hội, bơ hay dầu dừa...là những dưỡng chất giúp đôi môi căng mọng và mềm mại hơn.', 1506714254),
(2, 'son_li', 'son lì', 'son li', 1, 'Son lì hay còn được gọi là son mờ là loại son khi thoa lên môi sẽ cho ra màu sắc đậm và giống gần như hoàn toàn màu son chúng ta nhìn thấy mà không bị phụ thuộc nhiều vào màu môi. Lí do chính là vì trong son lì có chứa cao lanh, khi thoa lên môi sẽ không tạo hiệu ứng bóng hay lấp lánh. Loại son này không chứa dưỡng ẩm nên tuyệt đối không thoa son lì mà không có lớp son dưỡng lót dưới. Đây là loại son đặc biệt thích hợp cho ban ngày, nó tạo cho bạn vẻ tươi trẻ và quyến rũ.', 1512447231),
(3, 'son_kem', 'son kem', 'son kem', 1, 'Trong loại son này có chứa dầu dưỡng ẩm vì vậy nó giúp môi bạn trở nên nhẹ và mềm hơn, khi son se khô thì mịn như lụa, tự nhiên như màu môi thật. Tuy nhiên chất sáp có trong son đôi khi có thể khiến bạn cảm thấy môi bị đóng 1 lớp hơi khô.', 1512447268),
(4, 'son_nhu', 'son nhũ', 'son nhu', 1, 'Là loại son trong thành phần có chứa các tinh thế mica hay silica tạo nên hiệu ứng lấp lánh trên môi. Loại son này đặc biệt thích hợp cho những dịp đặc biệt như tiệc tùng, lễ hội vào ban đêm vì lớp son sẽ phản chiếu ánh sáng khiến cho làn môi bạn long lanh rạng rỡ. Tuy nhiên, bạn cũng cần một lớp dưỡng môi trước để tránh tình trạng khô nẻ sau khi sử dụng loại son này.', 1512447289);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access`
--
ALTER TABLE `access`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_order`
--
ALTER TABLE `customer_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_bill`
--
ALTER TABLE `detail_bill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_order`
--
ALTER TABLE `detail_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_color`
--
ALTER TABLE `product_color`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access`
--
ALTER TABLE `access`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=366;
--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `customer_order`
--
ALTER TABLE `customer_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `detail_bill`
--
ALTER TABLE `detail_bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `detail_order`
--
ALTER TABLE `detail_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `module`
--
ALTER TABLE `module`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `product_color`
--
ALTER TABLE `product_color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `product_type`
--
ALTER TABLE `product_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
