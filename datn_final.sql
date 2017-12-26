-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2017 at 12:51 AM
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
-- Database: `datn_final`
--

-- --------------------------------------------------------

--
-- Table structure for table `access`
--

CREATE TABLE `access` (
  `id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  `view_act` int(11) NOT NULL,
  `delete_act` int(11) NOT NULL,
  `add_act` int(11) NOT NULL,
  `edit_act` int(11) NOT NULL,
  `is_show` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `access`
--

INSERT INTO `access` (`id`, `account_id`, `module_id`, `view_act`, `delete_act`, `add_act`, `edit_act`, `is_show`) VALUES
(235, 1, 1, 1, 1, 1, 1, 1),
(236, 1, 2, 1, 1, 1, 1, 1),
(237, 1, 3, 1, 1, 1, 1, 1),
(238, 1, 4, 1, 1, 1, 1, 1),
(239, 1, 5, 1, 1, 1, 1, 1),
(240, 1, 6, 1, 1, 1, 1, 1),
(241, 1, 7, 1, 1, 1, 1, 1),
(242, 1, 8, 1, 1, 1, 1, 1),
(254, 1, 20, 1, 1, 1, 1, 1),
(255, 1, 21, 1, 1, 1, 1, 1),
(341, 2, 1, 1, 1, 1, 1, 1),
(342, 2, 2, 1, 1, 1, 1, 1),
(343, 2, 3, 1, 1, 1, 1, 1),
(344, 2, 4, 1, 1, 1, 1, 1),
(345, 2, 5, 1, 1, 1, 1, 1),
(346, 2, 6, 1, 1, 1, 1, 1),
(347, 2, 7, 1, 1, 1, 1, 1),
(348, 2, 8, 1, 1, 1, 1, 1),
(349, 2, 20, 1, 1, 1, 1, 1),
(350, 2, 21, 1, 1, 1, 1, 1),
(361, 2, 22, 1, 1, 1, 1, 1),
(362, 1, 22, 1, 1, 1, 1, 1),
(374, 2, 23, 1, 1, 1, 1, 1),
(375, 1, 23, 1, 1, 1, 1, 1),
(376, 2, 24, 1, 1, 1, 1, 1),
(377, 1, 24, 1, 1, 1, 1, 1),
(378, 2, 25, 1, 1, 1, 1, 1),
(379, 1, 25, 1, 1, 1, 1, 1),
(380, 2, 26, 1, 1, 1, 1, 1),
(381, 1, 26, 1, 1, 1, 1, 1),
(382, 2, 27, 1, 1, 1, 1, 1),
(383, 1, 27, 1, 1, 1, 1, 1),
(384, 2, 28, 1, 1, 1, 1, 1),
(385, 1, 28, 1, 1, 1, 1, 1);

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
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `created` int(11) NOT NULL,
  `group_account_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `is_show` int(11) NOT NULL,
  `md5` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `username`, `password`, `name`, `name_vi`, `email`, `phone`, `address`, `created`, `group_account_id`, `status`, `is_show`, `md5`) VALUES
(0, 'check_order', '', 'Check Order', '', '', '', '', 0, 0, 0, 0, 'cfcd208495d565ef66e7dff9f98764da'),
(1, 'administrator', '', 'Quản trị viên', 'Quan tri vien', '', '', '', 0, 0, 0, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(2, 'admin', 'admin', 'Quản trị viên', 'Quan tri vien', 'quantri@gmail.com', '19001000', '', 0, 1, 1, 1, 'c81e728d9d4c2f636f067f89cc14862c'),
(6, 'member', '', 'Khách hàng', 'Khach hang', '', '', '', 0, 0, 0, 1, '1679091c5a880faf6fb5e6087eb1b2dc');

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `id` int(11) NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `total` decimal(15,0) NOT NULL,
  `created` int(11) NOT NULL,
  `type` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `account_id` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `is_show` int(11) NOT NULL,
  `md5` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` int(11) NOT NULL,
  `is_show` int(11) NOT NULL,
  `md5` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `code`, `name`, `logo`, `created`, `is_show`, `md5`) VALUES
(1, 'nyd', 'NYD', 'nyd.jpg', 1513335235, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(2, 'ilip', 'ILIP', 'ilip.png', 1513335604, 1, 'c81e728d9d4c2f636f067f89cc14862c'),
(3, 'helle', 'helle', 'helle.png', 1513335660, 1, 'eccbc87e4b5ce2fe28308fd9f2a7baf3'),
(4, 'lipsley', 'lipsley', 'lipsley.jpg', 1513335719, 1, 'a87ff679a2f3e71d9181a67b7542122c');

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `id` int(11) NOT NULL,
  `code` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name_vi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` int(11) NOT NULL,
  `is_show` int(11) NOT NULL,
  `md5` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`id`, `code`, `name`, `name_vi`, `created`, `is_show`, `md5`) VALUES
(1, '8B4513', 'SaddleBrown', 'SaddleBrown', 1513332514, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(2, 'A0522D', 'Sienna', 'Sienna', 1513331960, 1, 'c81e728d9d4c2f636f067f89cc14862c'),
(3, 'CD853F', 'Peru', 'Peru', 1513331982, 1, 'eccbc87e4b5ce2fe28308fd9f2a7baf3'),
(4, 'CD5C5C', 'IndianRed', 'IndianRed', 1513332002, 1, 'a87ff679a2f3e71d9181a67b7542122c'),
(5, 'D2B48C', 'Tan', 'Tan', 1513696398, 1, 'e4da3b7fbbce2345d7772b0674a318d5'),
(6, 'D2691E', 'Chocolate', 'Chocolate', 1513332027, 1, '1679091c5a880faf6fb5e6087eb1b2dc'),
(7, 'FFA500', 'Orange', 'Orange', 1513332047, 1, '8f14e45fceea167a5a36dedd4bea2543'),
(8, 'DDC488', 'AntiqueGold', 'AntiqueGold', 1513332072, 1, 'c9f0f895fb98ab9159f51fd0297e236d'),
(9, 'ECAB53', 'AgedPaper', 'AgedPaper', 1513332082, 1, '45c48cce2e2d7fbdea1afc51c7c6ad26');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `cus_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cus_phone` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `cus_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_show` int(11) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  `cus_phone` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `cus_address` text COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `cus_note` text COLLATE utf8_unicode_ci NOT NULL,
  `cus_name_vi` text COLLATE utf8_unicode_ci NOT NULL,
  `time` int(11) NOT NULL,
  `check_new` int(11) NOT NULL,
  `md5` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `detail_order`
--

CREATE TABLE `detail_order` (
  `id` int(11) NOT NULL,
  `product_color_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(15,0) NOT NULL,
  `is_show` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `discount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `is_show` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `type` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `parent_messenger` int(11) NOT NULL,
  `name_vi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `is_show` int(11) NOT NULL,
  `created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id`, `user`, `type`, `content`, `is_show`, `created`) VALUES
(1, 'Quản trị viên', 'CHANGE', 'Thay đổi quyền thao tác<br>Tài khoản bị thay đổi: admin', 1, 0),
(2, 'admin', 'ADD', 'Thêm nhóm tài khoản<br>Nhóm khoản thêm: Nhân viên bán hàng', 1, 1513329246),
(3, 'admin', 'ADD', 'Thêm tài khoản<br>Tài khoản thêm: ken95', 1, 1513329361),
(4, 'admin', 'CHANGE', 'Sửa nhóm tài khoản<br>Nhóm tài khoản sửa: Quản trị viên', 1, 1513329518),
(5, 'admin', 'CHANGE', 'Sửa tài khoản<br>Tài khoản sửa: admin', 1, 1513330567),
(6, 'admin', 'CHANGE', 'Thay đổi quyền thao tác<br>Tài khoản bị thay đổi: admin', 1, 1513330699),
(7, 'admin', 'CHANGE', 'Sửa tài khoản<br>Tài khoản sửa: ken95', 1, 1513330858),
(8, 'admin', 'CHANGE', 'Thay đổi quyền thao tác<br>Tài khoản bị thay đổi: ken95', 1, 1513330893),
(9, 'admin', 'CHANGE', 'Sửa tài khoản<br>Tài khoản sửa: ken95', 1, 1513330911),
(10, 'admin', 'DELETE', 'Xóa tài khoản<br>Tài khoản bị xóa: ken95', 1, 1513330965),
(11, 'admin', 'ADD', 'Thêm tài khoản<br>Tài khoản thêm: ken95nuce', 1, 1513331096),
(12, 'admin', 'ADD', 'Thêm module<br>Module thêm mới: Log thao tác', 1, 1513331440),
(13, 'admin', 'ADD', 'Thêm màu son<br>Màu son thêm: SaddleBrown', 1, 1513331868),
(14, 'admin', 'ADD', 'Thêm màu son<br>Màu son thêm: Sienna', 1, 1513331960),
(15, 'admin', 'ADD', 'Thêm màu son<br>Màu son thêm: Peru', 1, 1513331982),
(16, 'admin', 'ADD', 'Thêm màu son<br>Màu son thêm: IndianRed', 1, 1513332002),
(17, 'admin', 'ADD', 'Thêm màu son<br>Màu son thêm: Tan', 1, 1513332018),
(18, 'admin', 'ADD', 'Thêm màu son<br>Màu son thêm: Chocolate', 1, 1513332027),
(19, 'admin', 'ADD', 'Thêm màu son<br>Màu son thêm: Orange', 1, 1513332047),
(20, 'admin', 'ADD', 'Thêm màu son<br>Màu son thêm: AntiqueGold', 1, 1513332072),
(21, 'admin', 'ADD', 'Thêm màu son<br>Màu son thêm: AgedPaper', 1, 1513332082),
(22, 'admin', 'CHANGE', 'Sửa màu son<br>Màu son sửa: SaddleBrown1', 1, 1513332477),
(23, 'admin', 'CHANGE', 'Sửa màu son<br>Màu son sửa: SaddleBrown', 1, 1513332514),
(24, 'admin', 'DELETE', 'Xóa màu son<br>Màu son bị xóa: ', 1, 1513332538),
(25, 'admin', 'DELETE', 'Xóa màu son<br>Màu son bị xóa: Sienna', 1, 1513332560),
(26, 'admin', 'ADD', 'Thêm loại sản phẩm<br>Loại sản phẩm thêm: Son kem', 1, 1513333530),
(27, 'admin', 'ADD', 'Thêm loại sản phẩm<br>Loại sản phẩm thêm: Son lì', 1, 1513333637),
(28, 'admin', 'ADD', 'Thêm loại sản phẩm<br>Loại sản phẩm thêm: Son bóng', 1, 1513333668),
(29, 'admin', 'ADD', 'Thêm thương hiệu<br>Thương hiệu thêm: NYD', 1, 1513335235),
(30, 'admin', 'ADD', 'Thêm thương hiệu<br>Thương hiệu thêm: ILIP', 1, 1513335604),
(31, 'admin', 'ADD', 'Thêm thương hiệu<br>Thương hiệu thêm: helle', 1, 1513335660),
(32, 'admin', 'ADD', 'Thêm thương hiệu<br>Thương hiệu thêm: lipsley', 1, 1513335719),
(33, 'admin', 'ADD', 'Thêm sản phẩm<br>Sản phẩm thêm: Sản phẩm 1', 1, 1513337529),
(34, 'admin', 'ADD', 'Thêm sản phẩm<br>Sản phẩm thêm: Sản phẩm 2', 1, 1513338012),
(35, 'admin', 'ADD', 'Thêm sản phẩm<br>Sản phẩm thêm: Sản phẩm 3', 1, 1513338283),
(36, 'admin', 'ADD', 'Thêm sản phẩm<br>Sản phẩm thêm: Sản phẩm 4', 1, 1513362372),
(37, 'admin', 'ADD', 'Thêm màu son cho sản phẩm<br>Màu son thêm: Chocolate<br>Sản phẩm thêm: Sản phẩm 2', 1, 1513367563),
(38, 'admin', 'ADD', 'Thêm màu son cho sản phẩm<br>Màu son thêm: Peru<br>Sản phẩm thêm: Sản phẩm 2', 1, 1513367563),
(39, 'admin', 'ADD', 'Thêm màu son cho sản phẩm<br>Màu son thêm: Orange<br>Sản phẩm thêm: Sản phẩm 3', 1, 1513367574),
(40, 'admin', 'ADD', 'Thêm màu son cho sản phẩm<br>Màu son thêm: AntiqueGold<br>Sản phẩm thêm: Sản phẩm 3', 1, 1513367575),
(41, 'admin', 'ADD', 'Thêm màu son cho sản phẩm<br>Màu son thêm: Sienna<br>Sản phẩm thêm: Sản phẩm 3', 1, 1513367575),
(42, 'admin', 'ADD', 'Thêm màu son cho sản phẩm<br>Màu son thêm: IndianRed<br>Sản phẩm thêm: Sản phẩm 4', 1, 1513367585),
(43, 'admin', 'ADD', 'Thêm màu son cho sản phẩm<br>Màu son thêm: Tan<br>Sản phẩm thêm: Sản phẩm 4', 1, 1513367585),
(44, 'admin', 'ADD', 'Thêm màu son cho sản phẩm<br>Màu son thêm: AgedPaper<br>Sản phẩm thêm: Sản phẩm 4', 1, 1513367585),
(45, 'admin', 'ADD', 'Thêm hóa đơn nhập<br>Mã hóa đơn nhập: PN-1', 1, 1513369060),
(46, 'admin', 'ADD', 'Thêm hóa đơn nhập<br>Mã hóa đơn nhập: PN-2', 1, 1513369207),
(47, 'admin', 'ADD', 'Thêm hóa đơn nhập<br>Mã hóa đơn nhập: PN-3', 1, 1513369234),
(48, 'admin', 'ADD', 'Thêm hóa đơn nhập<br>Mã hóa đơn nhập: PN-4', 1, 1513371629),
(49, 'admin', 'CHANGE', 'Thay đổi quyền thao tác<br>Tài khoản bị thay đổi: ken95nuce', 1, 1513467763),
(50, 'admin', 'ADD', 'Thêm module<br>Module thêm mới: Báo cáo hàng ngày', 1, 1513471384),
(51, 'admin', 'ADD', 'Thêm hóa đơn nhập<br>Mã hóa đơn nhập: PN-5', 1, 1513486767),
(52, 'admin', 'ADD', 'Thêm hóa đơn xuất<br>Mã hóa đơn xuất: PX-2', 1, 1513486779),
(53, 'admin', 'ADD', 'Thêm module<br>Module thêm mới: Báo cáo định kỳ', 1, 1513563917),
(54, 'admin', 'ADD', 'Thêm hóa đơn nhập<br>Mã hóa đơn nhập: PN-6', 1, 1513565317),
(55, 'admin', 'ADD', 'Thêm hóa đơn nhập<br>Mã hóa đơn nhập: PN-7', 1, 1513565348),
(56, 'admin', 'ADD', 'Thêm hóa đơn nhập<br>Mã hóa đơn nhập: PN-8', 1, 1513565401),
(57, 'admin', 'ADD', 'Thêm hóa đơn xuất<br>Mã hóa đơn xuất: PX-3', 1, 1513565969),
(58, 'admin', 'ADD', 'Thêm hóa đơn nhập<br>Mã hóa đơn nhập: PN-1', 1, 1513621766),
(59, 'admin', 'ADD', 'Thêm hóa đơn xuất<br>Mã hóa đơn xuất: PX-1', 1, 1513621779),
(60, 'admin', 'ADD', 'Thêm hóa đơn nhập<br>Mã hóa đơn nhập: PN-2', 1, 1513621805),
(61, 'admin', 'CHANGE', 'Sửa nhóm tài khoản<br>Nhóm tài khoản sửa: Quản trị viên', 1, 1513675865),
(62, 'admin', 'ADD', 'Thêm module<br>Module thêm mới: Thương hiệu', 1, 1513687813),
(63, 'admin', 'CHANGE', 'Sửa thương hiệu<br>Thương hiệu mới: NYD', 1, 1513689708),
(64, 'admin', 'CHANGE', 'Sửa thương hiệu<br>Thương hiệu mới: NYD', 1, 1513689781),
(65, 'admin', 'CHANGE', '\n<h4>Sửa thương hiệu</h4>\n<table>\n<thead>\n<tr><th>Thương hiệu cũ</th><th>Thương hiệu mới</th></tr>\n</thead>\n<tbody>\n<tr><td>NYD</td><td>NYD</td></tr>\n</tbody>\n</table>', 1, 1513691056),
(66, 'admin', 'CHANGE', '\n<h4>Sửa thương hiệu</h4>\n<table>\n<thead>\n<tr><th>Thương hiệu cũ</th><th>Thương hiệu mới</th></tr>\n</thead>\n<tbody>\n<tr><td>NYD</td><td>NYD1</td></tr>\n</tbody>\n</table>', 1, 1513691061),
(67, 'admin', 'CHANGE', '\n<h4>Sửa thương hiệu</h4>\n<table>\n<thead>\n<tr><th>Thương hiệu cũ</th><th>Thương hiệu mới</th></tr>\n</thead>\n<tbody>\n<tr><td>NYD1</td><td>NYD</td></tr>\n</tbody>\n</table>', 1, 1513691067),
(68, 'admin', 'DELETE', 'Xóa thương hiệu<br>Thương hiệu mới: ', 1, 1513691077),
(69, 'admin', 'DELETE', 'Xóa thương hiệu<br>Thương hiệu mới: ', 1, 1513691149),
(70, 'admin', 'DELETE', '\n<h4>Xóa thương hiệu</h4>\n<table>\n<thead>\n<tr><th>Thông tin thương hiệu</th></tr>\n</thead>\n<tbody>\n<tr><td></td></tr>\n</tbody>\n</table>', 1, 1513691150),
(71, 'admin', 'DELETE', '\n<h4>Xóa thương hiệu</h4>\n<table>\n<thead>\n<tr><th>Thông tin thương hiệu</th></tr>\n</thead>\n<tbody>\n<tr><td></td></tr>\n</tbody>\n</table>', 1, 1513691209),
(72, 'admin', 'DELETE', '\n<h4>Xóa thương hiệu</h4>\n<table>\n<thead>\n<tr><th>Thông tin thương hiệu</th></tr>\n</thead>\n<tbody>\n<tr><td></td></tr>\n</tbody>\n</table>', 1, 1513691210),
(73, 'admin', 'CHANGE', '\n<h4>Sửa thương hiệu</h4>\n<table>\n<thead>\n<tr><th>Thương hiệu cũ</th><th>Thương hiệu mới</th></tr>\n</thead>\n<tbody>\n<tr><td>lipsley</td><td>lipsley</td></tr>\n</tbody>\n</table>', 1, 1513692104),
(74, 'admin', 'DELETE', '\n<h4>Xóa thương hiệu</h4>\n<table>\n<thead>\n<tr><th>Thông tin thương hiệu</th></tr>\n</thead>\n<tbody>\n<tr><td>lipsley</td></tr>\n</tbody>\n</table>', 1, 1513692136),
(75, 'admin', 'ADD', '\n<h4>Thêm thương hiệu</h4>\n<table>\n<thead>\n<tr><th>Thông tin thương hiệu</th></tr>\n</thead>\n<tbody>\n<tr><td>test</td></tr>\n<tr><td>test</td></tr>\n<tr><td>test-test-brand1.png</td></tr>\n</tbody>\n</table>', 1, 1513695065),
(76, 'admin', 'CHANGE', '\n<h4>Sửa thương hiệu</h4>\n<table>\n<thead>\n<tr><th>Thương hiệu cũ</th><th>Thương hiệu mới</th></tr>\n</thead>\n<tbody>\n<tr><td>test</td><td>test brand</td></tr>\n</tbody>\n</table>', 1, 1513695076),
(77, 'admin', 'DELETE', '\n<h4>Xóa thương hiệu</h4>\n<table>\n<thead>\n<tr><th>Thông tin thương hiệu</th></tr>\n</thead>\n<tbody>\n<tr><td>test brand</td></tr>\n</tbody>\n</table>', 1, 1513695080),
(78, 'admin', 'CHANGE', '\n<h4>Sửa màu son</h4>\n<table>\n<thead>\n<tr><th>Màu son cũ</th><th>Màu son mới</th></tr>\n</thead>\n<tbody>\n<tr><td>D2B48C</td><td>D2B48C</td></tr>\n<tr><td>Tan</td><td>Tan</td></tr>\n</tbody>\n</table>', 1, 1513696398),
(79, 'admin', 'DELETE', '\n<h4>Xóa màu son</h4>\n<table>\n<thead>\n<tr><th>Thông tin màu son</th></tr>\n</thead>\n<tbody>\n<tr><td>A0522D</td></tr>\n<tr><td>Sienna</td></tr>\n<tr><td></td></tr>\n</tbody>\n</table>', 1, 1513696932),
(80, 'admin', 'DELETE', '\n<h4>Xóa màu son</h4>\n<table>\n<thead>\n<tr><th>Thông tin màu son</th></tr>\n</thead>\n<tbody>\n<tr><td>8B4513</td></tr>\n<tr><td>SaddleBrown</td></tr>\n<tr><td></td></tr>\n</tbody>\n</table>', 1, 1513697002),
(81, 'admin', 'CHANGE', '\n<h4>Sửa thương hiệu</h4>\n<table>\n<thead>\n<tr><th>Thương hiệu cũ</th><th>Thương hiệu mới</th></tr>\n</thead>\n<tbody>\n<tr><td>NYD</td><td>NYD</td></tr>\n</tbody>\n</table>', 1, 1513697909),
(82, 'admin', 'CHANGE', '\n<h4>Sửa thương hiệu</h4>\n<table>\n<thead>\n<tr><th>Thương hiệu cũ</th><th>Thương hiệu mới</th></tr>\n</thead>\n<tbody>\n<tr><td>NYD</td><td>NYD1</td></tr>\n</tbody>\n</table>', 1, 1513698013),
(83, 'admin', 'CHANGE', '\n<h4>Sửa thương hiệu</h4>\n<table>\n<thead>\n<tr><th>Thương hiệu cũ</th><th>Thương hiệu mới</th></tr>\n</thead>\n<tbody>\n<tr><td>NYD1</td><td>NYD</td></tr>\n</tbody>\n</table>', 1, 1513698019),
(84, 'admin', 'DELETE', '\n<h4>Xóa thương hiệu</h4>\n<table>\n<thead>\n<tr><th>Thông tin thương hiệu</th></tr>\n</thead>\n<tbody>\n<tr><td>test brand</td></tr>\n</tbody>\n</table>', 1, 1513698132),
(85, 'admin', 'ADD', '\n<h4>Thêm sản phẩm</h4>\n<table>\n<thead>\n<tr><th>Thông tin sản phẩm</th></tr>\n</thead>\n<tbody>\n<tr><td>test</td></tr>\n<tr><td>test</td></tr>\n<tr><td>100000</td></tr>\n<tr><td>14</td></tr>\n<tr><td>1</td></tr>\n<tr><td>1</td></tr>\n<tr><td>test-test-cover.png</td></tr>\n<tr><td>test-test-img-0.png/test-test-img-1.png/test-test-img-2.png</td></tr>\n<tr><td>đây là sản phẩm test</td></tr>\n</tbody>\n</table>', 1, 1513698968),
(86, 'admin', 'CHANGE', '\n<h4>Sửa sản phẩm</h4>\n<table>\n<thead>\n<tr><th>Sản phẩm cũ</th><th>Sản phẩm mới</th></tr>\n</thead>\n<tbody>\n<tr><td>test1</td><td>test1</td></tr>\n<tr><td>Sản phẩm 1</td><td>Sản phẩm 1</td></tr>\n<tr><td></td><td>2</td></tr>\n<tr><td></td><td>2</td></tr>\n<tr><td></td><td>test1-San-pham-1-cover.jpg</td></tr>\n<tr><td></td><td>test1-San-pham-1-img-0.jpg/test1-San-pham-1-img-1.jpg/test1-San-pham-1-img-2.jpg/test1-San-pham-1-img-3.jpg/test1-San-pham-1-img-4.jpg</td></tr>\n<tr><td>đây là sản phẩm test 1</td><td>đây là sản phẩm test 1</td></tr>\n</tbody>\n</table>', 1, 1513699649),
(87, 'admin', 'CHANGE', '\n<h4>Sửa sản phẩm</h4>\n<table>\n<thead>\n<tr><th>Sản phẩm cũ</th><th>Sản phẩm mới</th></tr>\n</thead>\n<tbody>\n<tr><td>test</td><td>test</td></tr>\n<tr><td>test</td><td>tes</td></tr>\n<tr><td></td><td>1</td></tr>\n<tr><td></td><td>1</td></tr>\n<tr><td></td><td>test-test-cover.png</td></tr>\n<tr><td></td><td>test-test-img-0.png/test-test-img-1.png/test-test-img-2.png</td></tr>\n<tr><td>đây là sản phẩm test</td><td>đây là sản phẩm test</td></tr>\n</tbody>\n</table>', 1, 1513699656),
(88, 'admin', 'CHANGE', '\n<h4>Sửa sản phẩm</h4>\n<table>\n<thead>\n<tr><th>Sản phẩm cũ</th><th>Sản phẩm mới</th></tr>\n</thead>\n<tbody>\n<tr><td>test</td><td>test</td></tr>\n<tr><td>tes</td><td>test</td></tr>\n<tr><td></td><td>1</td></tr>\n<tr><td></td><td>1</td></tr>\n<tr><td></td><td>test-test-cover.png</td></tr>\n<tr><td></td><td>test-test-img-0.png/test-test-img-1.png/test-test-img-2.png</td></tr>\n<tr><td>đây là sản phẩm test</td><td>đây là sản phẩm test</td></tr>\n</tbody>\n</table>', 1, 1513699666),
(89, 'admin', 'CHANGE', '\n<h4>Sửa sản phẩm</h4>\n<table>\n<thead>\n<tr><th>Sản phẩm cũ</th><th>Sản phẩm mới</th></tr>\n</thead>\n<tbody>\n<tr><td>test</td><td>test</td></tr>\n<tr><td>test</td><td>test</td></tr>\n<tr><td></td><td>1</td></tr>\n<tr><td></td><td>1</td></tr>\n<tr><td></td><td>test-test-cover.png</td></tr>\n<tr><td></td><td>test-test-img-0.png/test-test-img-1.png/test-test-img-2.png</td></tr>\n<tr><td>đây là sản phẩm test</td><td>đây là sản phẩm </td></tr>\n</tbody>\n</table>', 1, 1513699877),
(90, 'admin', 'DELETE', '\n<h4>Xóa sản phẩm</h4>\n<table>\n<thead>\n<tr><th>Thông tin sản phẩm</th></tr>\n</thead>\n<tbody>\n<tr><td>test</td></tr>\n<tr><td>test</td></tr>\n<tr><td>test-test-cover.png</td></tr>\n<tr><td>test-test-img-0.png/test-test-img-1.png/test-test-img-2.png</td></tr>\n<tr><td>đây là sản phẩm </td></tr>\n<tr><td>100000</td></tr>\n<tr><td>14</td></tr>\n<tr><td>1</td></tr>\n<tr><td>1</td></tr>\n</tbody>\n</table>', 1, 1513700615),
(91, 'admin', 'ADD', '\n<h4>Thêm loại son</h4>\n<table>\n<thead>\n<tr><th>Thông tin loại son</th></tr>\n</thead>\n<tbody>\n<tr><td>test</td></tr>\n<tr><td>test</td></tr>\n<tr><td>đây là test</td></tr>\n</tbody>\n</table>', 1, 1513701098),
(92, 'admin', 'ADD', '\n<h4>Thêm màu sản phẩm</h4>\n<table>\n<thead>\n<tr><th>Thông tin màu sản phẩm</th></tr>\n</thead>\n<tbody>\n<tr><td>1</td></tr>\n<tr><td>1</td></tr>\n</tbody>\n</table>', 1, 1513713494),
(93, 'admin', 'DELETE', '\n<h4>Xóa màu son</h4>\n<table>\n<thead>\n<tr><th>Thông màu son</th></tr>\n</thead>\n<tbody>\n<tr><td>1</td></tr>\n<tr><td>1</td></tr>\n</tbody>\n</table>', 1, 1513714808),
(94, 'admin', 'DELETE', '\n<h4>Xóa màu son</h4>\n<table>\n<thead>\n<tr><th>Thông màu son</th></tr>\n</thead>\n<tbody>\n<tr><td>1</td></tr>\n<tr><td>4</td></tr>\n</tbody>\n</table>', 1, 1513714812),
(95, 'admin', 'DELETE', '\n<h4>Xóa màu son</h4>\n<table>\n<thead>\n<tr><th>Thông màu son</th></tr>\n</thead>\n<tbody>\n<tr><td>1</td></tr>\n<tr><td>4</td></tr>\n</tbody>\n</table>', 1, 1513714839),
(96, 'admin', 'DELETE', '\n<h4>Xóa màu son</h4>\n<table>\n<thead>\n<tr><th>Thông màu son</th></tr>\n</thead>\n<tbody>\n<tr><td>1</td></tr>\n<tr><td>2</td></tr>\n</tbody>\n</table>', 1, 1513714881),
(97, 'admin', 'DELETE', '\n<h4>Xóa màu son</h4>\n<table>\n<thead>\n<tr><th>Thông màu son</th></tr>\n</thead>\n<tbody>\n<tr><td>2</td></tr>\n<tr><td>6</td></tr>\n</tbody>\n</table>', 1, 1513714884),
(98, 'admin', 'DELETE', '\n<h4>Xóa màu son</h4>\n<table>\n<thead>\n<tr><th>Thông màu son</th></tr>\n</thead>\n<tbody>\n<tr><td>4</td></tr>\n<tr><td>4</td></tr>\n</tbody>\n</table>', 1, 1513714887),
(99, 'admin', 'ADD', '\n<h4>Thêm màu sản phẩm</h4>\n<table>\n<thead>\n<tr><th>Thông tin màu sản phẩm</th></tr>\n</thead>\n<tbody>\n<tr><td>2</td></tr>\n<tr><td>1</td></tr>\n</tbody>\n</table>', 1, 1513715015),
(100, 'admin', 'DELETE', '\n<h4>Xóa màu son</h4>\n<table>\n<thead>\n<tr><th>Thông màu son</th></tr>\n</thead>\n<tbody>\n<tr><td>2</td></tr>\n<tr><td>3</td></tr>\n</tbody>\n</table>', 1, 1513715018),
(101, 'admin', 'DELETE', '\n<h4>Xóa màu son</h4>\n<table>\n<thead>\n<tr><th>Thông màu son</th></tr>\n</thead>\n<tbody>\n<tr><td>1</td></tr>\n<tr><td>3</td></tr>\n</tbody>\n</table>', 1, 1513715840),
(102, 'admin', 'ADD', '\n<h4>Thêm màu sản phẩm</h4>\n<table>\n<thead>\n<tr><th>Thông tin màu sản phẩm</th></tr>\n</thead>\n<tbody>\n<tr><td>1</td></tr>\n<tr><td>1</td></tr>\n</tbody>\n</table>', 1, 1513715850),
(103, 'admin', 'ADD', 'Thêm hóa đơn nhập<br>Mã hóa đơn nhập: PN-1', 1, 1513737278),
(104, 'admin', 'ADD', '\n<h4>Thêm hóa đơn</h4>\n<table>\n<thead>\n<tr><th>Thông tin hóa đơn</th></tr>\n</thead>\n<tbody>\n<tr><td>PN-2</td></tr>\n<tr><td>Quản trị viên</td></tr>\n</tbody>\n</table>', 1, 1513737782),
(105, 'admin', 'ADD', '\n<h4>Thêm hóa đơn</h4>\n<table>\n<thead>\n<tr><th>Thông tin hóa đơn</th></tr>\n</thead>\n<tbody>\n<tr><td>PN-2</td></tr>\n<tr><td>Quản trị viên</td></tr>\n</tbody>\n</table>', 1, 1513737801),
(106, 'admin', 'ADD', '\n<h4>Thêm hóa đơn</h4>\n<table>\n<thead>\n<tr><th>Thông tin hóa đơn</th></tr>\n</thead>\n<tbody>\n<tr><td>PN-2</td></tr>\n<tr><td>Quản trị viên</td></tr>\n</tbody>\n</table>', 1, 1513737911),
(107, 'admin', 'ADD', '\n<h4>Thêm hóa đơn</h4>\n<table>\n<thead>\n<tr><th>Thông tin hóa đơn</th></tr>\n</thead>\n<tbody>\n<tr><td>PN-2</td></tr>\n<tr><td>Quản trị viên</td></tr>\n</tbody>\n</table>', 1, 1513739486),
(108, 'admin', 'CHANGE', '\n<h4>Sửa hóa đơn</h4>\n<table>\n<thead>\n<tr><th>Hóa đơn cũ</th><th>Hóa đơn mới</th></tr>\n</thead>\n<tbody>\n<tr><td>1513737911</td><td>1513743158</td></tr>\n<tr><td>2</td><td>2</td></tr>\n</tbody>\n</table>', 1, 1513743158),
(109, 'admin', 'CHANGE', '\n<h4>Sửa hóa đơn</h4>\n<table>\n<thead>\n<tr><th>Hóa đơn cũ</th><th>Hóa đơn mới</th></tr>\n</thead>\n<tbody>\n<tr><td>1513743158</td><td>1513743318</td></tr>\n<tr><td>2</td><td>2</td></tr>\n</tbody>\n</table>', 1, 1513743318),
(110, 'admin', 'CHANGE', '\n<h4>Sửa hóa đơn</h4>\n<table>\n<thead>\n<tr><th>Hóa đơn cũ</th><th>Hóa đơn mới</th></tr>\n</thead>\n<tbody>\n<tr><td>1513743318</td><td>1513743319</td></tr>\n<tr><td>2</td><td>2</td></tr>\n</tbody>\n</table>', 1, 1513743319),
(111, 'admin', 'CHANGE', '\n<h4>Sửa hóa đơn</h4>\n<table>\n<thead>\n<tr><th>Hóa đơn cũ</th><th>Hóa đơn mới</th></tr>\n</thead>\n<tbody>\n<tr><td>1513743319</td><td>1513743396</td></tr>\n<tr><td>2</td><td>2</td></tr>\n</tbody>\n</table>', 1, 1513743396),
(112, 'admin', 'CHANGE', '\n<h4>Sửa hóa đơn</h4>\n<table>\n<thead>\n<tr><th>Hóa đơn cũ</th><th>Hóa đơn mới</th></tr>\n</thead>\n<tbody>\n<tr><td>1513743396</td><td>1513743397</td></tr>\n<tr><td>2</td><td>2</td></tr>\n</tbody>\n</table>', 1, 1513743397),
(113, 'admin', 'CHANGE', '\n<h4>Sửa hóa đơn</h4>\n<table>\n<thead>\n<tr><th>Hóa đơn cũ</th><th>Hóa đơn mới</th></tr>\n</thead>\n<tbody>\n<tr><td>1513743397</td><td>1513743398</td></tr>\n<tr><td>2</td><td>2</td></tr>\n</tbody>\n</table>', 1, 1513743398),
(114, 'admin', 'CHANGE', '\n<h4>Sửa hóa đơn</h4>\n<table>\n<thead>\n<tr><th>Hóa đơn cũ</th><th>Hóa đơn mới</th></tr>\n</thead>\n<tbody>\n<tr><td>1513743398</td><td>1513743399</td></tr>\n<tr><td>2</td><td>2</td></tr>\n</tbody>\n</table>', 1, 1513743399),
(115, 'admin', 'ADD', '\n<h4>Thêm màu sản phẩm</h4>\n<table>\n<thead>\n<tr><th>Thông tin màu sản phẩm</th></tr>\n</thead>\n<tbody>\n<tr><td>1</td></tr>\n<tr><td>1</td></tr>\n</tbody>\n</table>', 1, 1513743894),
(116, 'admin', 'ADD', '\n<h4>Thêm màu sản phẩm</h4>\n<table>\n<thead>\n<tr><th>Thông tin màu sản phẩm</th></tr>\n</thead>\n<tbody>\n<tr><td>2</td></tr>\n<tr><td>1</td></tr>\n</tbody>\n</table>', 1, 1513743909),
(117, 'admin', 'ADD', '\n<h4>Thêm hóa đơn</h4>\n<table>\n<thead>\n<tr><th>Thông tin hóa đơn</th></tr>\n</thead>\n<tbody>\n<tr><td>PN-1</td></tr>\n<tr><td>Quản trị viên</td></tr>\n</tbody>\n</table>', 1, 1513743935),
(118, 'admin', 'ADD', '\n<h4>Thêm hóa đơn</h4>\n<table>\n<thead>\n<tr><th>Thông tin hóa đơn</th></tr>\n</thead>\n<tbody>\n<tr><td>PN-2</td></tr>\n<tr><td>Quản trị viên</td></tr>\n</tbody>\n</table>', 1, 1513743950),
(119, 'admin', 'CHANGE', '\n<h4>Sửa hóa đơn</h4>\n<table>\n<thead>\n<tr><th>Hóa đơn cũ</th><th>Hóa đơn mới</th></tr>\n</thead>\n<tbody>\n<tr><td>1513743935</td><td>1513744043</td></tr>\n<tr><td>2</td><td>2</td></tr>\n</tbody>\n</table>', 1, 1513744043),
(120, 'admin', 'CHANGE', '\n<h4>Sửa hóa đơn</h4>\n<table>\n<thead>\n<tr><th>Hóa đơn cũ</th><th>Hóa đơn mới</th></tr>\n</thead>\n<tbody>\n<tr><td>1513744043</td><td>1513744142</td></tr>\n<tr><td>2</td><td>2</td></tr>\n</tbody>\n</table>', 1, 1513744142),
(121, 'admin', 'CHANGE', '\n<h4>Sửa hóa đơn</h4>\n<table>\n<thead>\n<tr><th>Hóa đơn cũ</th><th>Hóa đơn mới</th></tr>\n</thead>\n<tbody>\n<tr><td>1513744142</td><td>1513744224</td></tr>\n<tr><td>2</td><td>2</td></tr>\n</tbody>\n</table>', 1, 1513744224),
(122, 'admin', 'CHANGE', '\n<h4>Sửa hóa đơn</h4>\n<table>\n<thead>\n<tr><th>Hóa đơn cũ</th><th>Hóa đơn mới</th></tr>\n</thead>\n<tbody>\n<tr><td>1513744224</td><td>1513744316</td></tr>\n<tr><td>2</td><td>2</td></tr>\n</tbody>\n</table>', 1, 1513744316),
(123, 'admin', 'CHANGE', '\n<h4>Sửa hóa đơn</h4>\n<table>\n<thead>\n<tr><th>Hóa đơn cũ</th><th>Hóa đơn mới</th></tr>\n</thead>\n<tbody>\n<tr><td>1513744316</td><td>1513744362</td></tr>\n<tr><td>2</td><td>2</td></tr>\n</tbody>\n</table>', 1, 1513744362),
(124, 'admin', 'CHANGE', '\n<h4>Sửa hóa đơn</h4>\n<table>\n<thead>\n<tr><th>Hóa đơn cũ</th><th>Hóa đơn mới</th></tr>\n</thead>\n<tbody>\n<tr><td>1513744362</td><td>1513744464</td></tr>\n<tr><td>2</td><td>2</td></tr>\n</tbody>\n</table>', 1, 1513744464),
(125, 'admin', 'CHANGE', '\n<h4>Sửa hóa đơn</h4>\n<table>\n<thead>\n<tr><th>Hóa đơn cũ</th><th>Hóa đơn mới</th></tr>\n</thead>\n<tbody>\n<tr><td>1513744464</td><td>1513744498</td></tr>\n<tr><td>2</td><td>2</td></tr>\n</tbody>\n</table>', 1, 1513744498),
(126, 'admin', 'CHANGE', '\n<h4>Sửa hóa đơn</h4>\n<table>\n<thead>\n<tr><th>Hóa đơn cũ</th><th>Hóa đơn mới</th></tr>\n</thead>\n<tbody>\n<tr><td>1513744498</td><td>1513744510</td></tr>\n<tr><td>2</td><td>2</td></tr>\n</tbody>\n</table>', 1, 1513744510),
(127, 'admin', 'CHANGE', '\n<h4>Sửa hóa đơn</h4>\n<table>\n<thead>\n<tr><th>Hóa đơn cũ</th><th>Hóa đơn mới</th></tr>\n</thead>\n<tbody>\n<tr><td>1513744510</td><td>1513744598</td></tr>\n<tr><td>2</td><td>2</td></tr>\n</tbody>\n</table>', 1, 1513744598),
(128, 'admin', 'CHANGE', '\n<h4>Sửa hóa đơn</h4>\n<table>\n<thead>\n<tr><th>Hóa đơn cũ</th><th>Hóa đơn mới</th></tr>\n</thead>\n<tbody>\n<tr><td>1513744598</td><td>1513744651</td></tr>\n<tr><td>2</td><td>2</td></tr>\n</tbody>\n</table>', 1, 1513744651),
(129, 'admin', 'CHANGE', '\n<h4>Sửa hóa đơn</h4>\n<table>\n<thead>\n<tr><th>Hóa đơn cũ</th><th>Hóa đơn mới</th></tr>\n</thead>\n<tbody>\n<tr><td>1513744651</td><td>1513744749</td></tr>\n<tr><td>2</td><td>2</td></tr>\n</tbody>\n</table>', 1, 1513744749),
(130, 'admin', 'CHANGE', '\n<h4>Sửa hóa đơn</h4>\n<table>\n<thead>\n<tr><th>Hóa đơn cũ</th><th>Hóa đơn mới</th></tr>\n</thead>\n<tbody>\n<tr><td>1513744749</td><td>1513744750</td></tr>\n<tr><td>2</td><td>2</td></tr>\n</tbody>\n</table>', 1, 1513744750),
(131, 'admin', 'CHANGE', '\n<h4>Sửa hóa đơn</h4>\n<table>\n<thead>\n<tr><th>Hóa đơn cũ</th><th>Hóa đơn mới</th></tr>\n</thead>\n<tbody>\n<tr><td>1513744750</td><td>1513744845</td></tr>\n<tr><td>2</td><td>2</td></tr>\n</tbody>\n</table>', 1, 1513744845),
(132, 'admin', 'CHANGE', '\n<h4>Sửa hóa đơn</h4>\n<table>\n<thead>\n<tr><th>Hóa đơn cũ</th><th>Hóa đơn mới</th></tr>\n</thead>\n<tbody>\n<tr><td>1513744845</td><td>1513744855</td></tr>\n<tr><td>2</td><td>2</td></tr>\n</tbody>\n</table>', 1, 1513744855),
(133, 'admin', 'ADD', '\n<h4>Thêm màu sản phẩm</h4>\n<table>\n<thead>\n<tr><th>Thông tin màu sản phẩm</th></tr>\n</thead>\n<tbody>\n<tr><td>1</td></tr>\n<tr><td>1</td></tr>\n</tbody>\n</table>', 1, 1513744973),
(134, 'admin', 'ADD', '\n<h4>Thêm màu sản phẩm</h4>\n<table>\n<thead>\n<tr><th>Thông tin màu sản phẩm</th></tr>\n</thead>\n<tbody>\n<tr><td>2</td></tr>\n<tr><td>1</td></tr>\n</tbody>\n</table>', 1, 1513744986),
(135, 'admin', 'ADD', '\n<h4>Thêm hóa đơn</h4>\n<table>\n<thead>\n<tr><th>Thông tin hóa đơn</th></tr>\n</thead>\n<tbody>\n<tr><td>PN-1</td></tr>\n<tr><td>Quản trị viên</td></tr>\n</tbody>\n</table>', 1, 1513745023),
(136, 'admin', 'ADD', '\n<h4>Thêm hóa đơn</h4>\n<table>\n<thead>\n<tr><th>Thông tin hóa đơn</th></tr>\n</thead>\n<tbody>\n<tr><td>PN-2</td></tr>\n<tr><td>Quản trị viên</td></tr>\n</tbody>\n</table>', 1, 1513745054),
(137, 'admin', 'CHANGE', '\n<h4>Sửa hóa đơn</h4>\n<table>\n<thead>\n<tr><th>Hóa đơn cũ</th><th>Hóa đơn mới</th></tr>\n</thead>\n<tbody>\n<tr><td>1513745023</td><td>1513745076</td></tr>\n<tr><td>2</td><td>2</td></tr>\n</tbody>\n</table>', 1, 1513745076),
(138, 'admin', 'CHANGE', '\n<h4>Sửa hóa đơn</h4>\n<table>\n<thead>\n<tr><th>Hóa đơn cũ</th><th>Hóa đơn mới</th></tr>\n</thead>\n<tbody>\n<tr><td>1513745076</td><td>1513745150</td></tr>\n<tr><td>2</td><td>2</td></tr>\n</tbody>\n</table>', 1, 1513745150),
(139, 'admin', 'CHANGE', '\n<h4>Sửa hóa đơn</h4>\n<table>\n<thead>\n<tr><th>Hóa đơn cũ</th><th>Hóa đơn mới</th></tr>\n</thead>\n<tbody>\n<tr><td>1513745054</td><td>1513745247</td></tr>\n<tr><td>2</td><td>2</td></tr>\n</tbody>\n</table>', 1, 1513745247),
(140, 'admin', 'CHANGE', '\n<h4>Sửa hóa đơn</h4>\n<table>\n<thead>\n<tr><th>Hóa đơn cũ</th><th>Hóa đơn mới</th></tr>\n</thead>\n<tbody>\n<tr><td>1513745247</td><td>1513745316</td></tr>\n<tr><td>2</td><td>2</td></tr>\n</tbody>\n</table>', 1, 1513745316),
(141, 'admin', 'CHANGE', '\n<h4>Sửa hóa đơn</h4>\n<table>\n<thead>\n<tr><th>Hóa đơn cũ</th><th>Hóa đơn mới</th></tr>\n</thead>\n<tbody>\n<tr><td>1513745316</td><td>1513745533</td></tr>\n<tr><td>2</td><td>2</td></tr>\n</tbody>\n</table>', 1, 1513745533),
(142, 'admin', 'CHANGE', '\n<h4>Sửa hóa đơn</h4>\n<table>\n<thead>\n<tr><th>Hóa đơn cũ</th><th>Hóa đơn mới</th></tr>\n</thead>\n<tbody>\n<tr><td>1513745533</td><td>1513745650</td></tr>\n<tr><td>2</td><td>2</td></tr>\n</tbody>\n</table>', 1, 1513745650),
(143, 'admin', 'CHANGE', '\n<h4>Sửa hóa đơn</h4>\n<table>\n<thead>\n<tr><th>Hóa đơn cũ</th><th>Hóa đơn mới</th></tr>\n</thead>\n<tbody>\n<tr><td>1513745650</td><td>1513746087</td></tr>\n<tr><td>2</td><td>2</td></tr>\n</tbody>\n</table>', 1, 1513746087),
(144, 'admin', 'CHANGE', '\n<h4>Sửa hóa đơn</h4>\n<table>\n<thead>\n<tr><th>Hóa đơn cũ</th><th>Hóa đơn mới</th></tr>\n</thead>\n<tbody>\n<tr><td>1513746087</td><td>1513746335</td></tr>\n<tr><td>2</td><td>2</td></tr>\n</tbody>\n</table>', 1, 1513746335),
(145, 'admin', 'CHANGE', '\n<h4>Sửa hóa đơn</h4>\n<table>\n<thead>\n<tr><th>Hóa đơn cũ</th><th>Hóa đơn mới</th></tr>\n</thead>\n<tbody>\n<tr><td>1513746335</td><td>1513746356</td></tr>\n<tr><td>2</td><td>2</td></tr>\n</tbody>\n</table>', 1, 1513746356),
(146, 'admin', 'ADD', '\n<h4>Thêm màu sản phẩm</h4>\n<table>\n<thead>\n<tr><th>Thông tin màu sản phẩm</th></tr>\n</thead>\n<tbody>\n<tr><td>1</td></tr>\n<tr><td>1</td></tr>\n</tbody>\n</table>', 1, 1513746479),
(147, 'admin', 'ADD', '\n<h4>Thêm màu sản phẩm</h4>\n<table>\n<thead>\n<tr><th>Thông tin màu sản phẩm</th></tr>\n</thead>\n<tbody>\n<tr><td>2</td></tr>\n<tr><td>1</td></tr>\n</tbody>\n</table>', 1, 1513746492),
(148, 'admin', 'ADD', '\n<h4>Thêm hóa đơn</h4>\n<table>\n<thead>\n<tr><th>Thông tin hóa đơn</th></tr>\n</thead>\n<tbody>\n<tr><td>PN-1</td></tr>\n<tr><td>Quản trị viên</td></tr>\n</tbody>\n</table>', 1, 1513746519),
(149, 'admin', 'ADD', '\n<h4>Thêm hóa đơn</h4>\n<table>\n<thead>\n<tr><th>Thông tin hóa đơn</th></tr>\n</thead>\n<tbody>\n<tr><td>PN-2</td></tr>\n<tr><td>Quản trị viên</td></tr>\n</tbody>\n</table>', 1, 1513746541),
(150, 'admin', 'CHANGE', '\n<h4>Sửa hóa đơn</h4>\n<table>\n<thead>\n<tr><th>Hóa đơn cũ</th><th>Hóa đơn mới</th></tr>\n</thead>\n<tbody>\n<tr><td>1513746541</td><td>1513746574</td></tr>\n<tr><td>2</td><td>2</td></tr>\n</tbody>\n</table>', 1, 1513746574),
(151, 'admin', 'CHANGE', '\n<h4>Sửa hóa đơn</h4>\n<table>\n<thead>\n<tr><th>Hóa đơn cũ</th><th>Hóa đơn mới</th></tr>\n</thead>\n<tbody>\n<tr><td>1513746574</td><td>1513746650</td></tr>\n<tr><td>2</td><td>2</td></tr>\n</tbody>\n</table>', 1, 1513746651),
(152, 'admin', 'CHANGE', '\n<h4>Sửa hóa đơn</h4>\n<table>\n<thead>\n<tr><th>Hóa đơn cũ</th><th>Hóa đơn mới</th></tr>\n</thead>\n<tbody>\n<tr><td>1513746519</td><td>1513746695</td></tr>\n<tr><td>2</td><td>2</td></tr>\n</tbody>\n</table>', 1, 1513746695),
(153, 'admin', 'CHANGE', '\n<h4>Sửa hóa đơn</h4>\n<table>\n<thead>\n<tr><th>Hóa đơn cũ</th><th>Hóa đơn mới</th></tr>\n</thead>\n<tbody>\n<tr><td>1513746695</td><td>1513747347</td></tr>\n<tr><td>2</td><td>2</td></tr>\n</tbody>\n</table>', 1, 1513747347),
(154, 'admin', 'CHANGE', '\n<h4>Sửa hóa đơn</h4>\n<table>\n<thead>\n<tr><th>Hóa đơn cũ</th><th>Hóa đơn mới</th></tr>\n</thead>\n<tbody>\n<tr><td>1513747347</td><td>1513747412</td></tr>\n<tr><td>2</td><td>2</td></tr>\n</tbody>\n</table>', 1, 1513747412),
(155, 'admin', 'CHANGE', '\n<h4>Sửa hóa đơn</h4>\n<table>\n<thead>\n<tr><th>Hóa đơn cũ</th><th>Hóa đơn mới</th></tr>\n</thead>\n<tbody>\n<tr><td>1513747412</td><td>1513747520</td></tr>\n<tr><td>2</td><td>2</td></tr>\n</tbody>\n</table>', 1, 1513747521),
(156, 'admin', 'CHANGE', '\n<h4>Sửa hóa đơn</h4>\n<table>\n<thead>\n<tr><th>Hóa đơn cũ</th><th>Hóa đơn mới</th></tr>\n</thead>\n<tbody>\n<tr><td>1513747520</td><td>1513747587</td></tr>\n<tr><td>2</td><td>2</td></tr>\n</tbody>\n</table>', 1, 1513747587),
(157, 'admin', 'CHANGE', '\n<h4>Sửa hóa đơn</h4>\n<table>\n<thead>\n<tr><th>Hóa đơn cũ</th><th>Hóa đơn mới</th></tr>\n</thead>\n<tbody>\n<tr><td>1513747587</td><td>1513747587</td></tr>\n<tr><td>2</td><td>2</td></tr>\n</tbody>\n</table>', 1, 1513747587),
(158, 'admin', 'CHANGE', '\n<h4>Sửa hóa đơn</h4>\n<table>\n<thead>\n<tr><th>Hóa đơn cũ</th><th>Hóa đơn mới</th></tr>\n</thead>\n<tbody>\n<tr><td>1513747587</td><td>1513747601</td></tr>\n<tr><td>2</td><td>2</td></tr>\n</tbody>\n</table>', 1, 1513747601),
(159, 'admin', 'CHANGE', '\n<h4>Sửa hóa đơn</h4>\n<table>\n<thead>\n<tr><th>Hóa đơn cũ</th><th>Hóa đơn mới</th></tr>\n</thead>\n<tbody>\n<tr><td>1513747601</td><td>1513747605</td></tr>\n<tr><td>2</td><td>2</td></tr>\n</tbody>\n</table>', 1, 1513747605),
(160, 'admin', 'CHANGE', '\n<h4>Sửa hóa đơn</h4>\n<table>\n<thead>\n<tr><th>Hóa đơn cũ</th><th>Hóa đơn mới</th></tr>\n</thead>\n<tbody>\n<tr><td>1513747605</td><td>1513747609</td></tr>\n<tr><td>2</td><td>2</td></tr>\n</tbody>\n</table>', 1, 1513747609),
(161, 'admin', 'ADD', '\n<h4>Thêm màu sản phẩm</h4>\n<table>\n<thead>\n<tr><th>Thông tin màu sản phẩm</th></tr>\n</thead>\n<tbody>\n<tr><td>1</td></tr>\n<tr><td>1</td></tr>\n</tbody>\n</table>', 1, 1513747733),
(162, 'admin', 'ADD', '\n<h4>Thêm màu sản phẩm</h4>\n<table>\n<thead>\n<tr><th>Thông tin màu sản phẩm</th></tr>\n</thead>\n<tbody>\n<tr><td>2</td></tr>\n<tr><td>1</td></tr>\n</tbody>\n</table>', 1, 1513747744),
(163, 'admin', 'ADD', '\n<h4>Thêm hóa đơn</h4>\n<table>\n<thead>\n<tr><th>Thông tin hóa đơn</th></tr>\n</thead>\n<tbody>\n<tr><td>PN-1</td></tr>\n<tr><td>Quản trị viên</td></tr>\n</tbody>\n</table>', 1, 1513747800),
(164, 'admin', 'ADD', '\n<h4>Thêm hóa đơn</h4>\n<table>\n<thead>\n<tr><th>Thông tin hóa đơn</th></tr>\n</thead>\n<tbody>\n<tr><td>PN-2</td></tr>\n<tr><td>Quản trị viên</td></tr>\n</tbody>\n</table>', 1, 1513747819),
(165, 'admin', 'CHANGE', '\n<h4>Sửa hóa đơn</h4>\n<table>\n<thead>\n<tr><th>Hóa đơn cũ</th><th>Hóa đơn mới</th></tr>\n</thead>\n<tbody>\n<tr><td>1513747800</td><td>1513747829</td></tr>\n<tr><td>2</td><td>2</td></tr>\n</tbody>\n</table>', 1, 1513747829),
(166, 'admin', 'ADD', '\n<h4>Thêm màu sản phẩm</h4>\n<table>\n<thead>\n<tr><th>Thông tin màu sản phẩm</th></tr>\n</thead>\n<tbody>\n<tr><td>1</td></tr>\n<tr><td>1</td></tr>\n</tbody>\n</table>', 1, 1513748039),
(167, 'admin', 'ADD', '\n<h4>Thêm hóa đơn</h4>\n<table>\n<thead>\n<tr><th>Thông tin hóa đơn</th></tr>\n</thead>\n<tbody>\n<tr><td>PN-1</td></tr>\n<tr><td>Quản trị viên</td></tr>\n</tbody>\n</table>', 1, 1513748060),
(168, 'admin', 'ADD', '\n<h4>Thêm hóa đơn</h4>\n<table>\n<thead>\n<tr><th>Thông tin hóa đơn</th></tr>\n</thead>\n<tbody>\n<tr><td>PN-2</td></tr>\n<tr><td>Quản trị viên</td></tr>\n</tbody>\n</table>', 1, 1513748075),
(169, 'admin', 'CHANGE', '\n<h4>Sửa hóa đơn</h4>\n<table>\n<thead>\n<tr><th>Hóa đơn cũ</th><th>Hóa đơn mới</th></tr>\n</thead>\n<tbody>\n<tr><td>1513748060</td><td>1513748144</td></tr>\n<tr><td>2</td><td>2</td></tr>\n</tbody>\n</table>', 1, 1513748144),
(170, 'admin', 'DELETE', '\n<h4>Xóa hóa đơn</h4>\n<table>\n<thead>\n<tr><th>Thông tin hóa đơn</th></tr>\n</thead>\n<tbody>\n<tr><td>PN-1</td></tr>\n<tr><td>1200000</td></tr>\n<tr><td>IMPORT</td></tr>\n</tbody>\n</table>', 1, 1513749341),
(171, 'admin', 'ADD', 'Thêm hóa đơn xuất<br>Mã hóa đơn xuất: PX-1', 1, 1513765185),
(172, 'admin', 'DELETE', '\n<h4>Xóa hóa đơn xuất</h4>\n<table>\n<tr><th>Thông tin hóa đơn xuất</th></tr>\n</thead>\n<tbody>\n<tr><td>PX-1</td></tr>\n<tr><td>EXPORT</td></tr>\n<tr><td>270000</td></tr>\n</tbody>\n</table>', 1, 1513766422),
(173, 'admin', 'ADD', '\n<h4>Thêm sản phẩm</h4>\n<table>\n<thead>\n<tr><th>Thông tin sản phẩm</th></tr>\n</thead>\n<tbody>\n<tr><td>test</td></tr>\n<tr><td>sản phẩm 1</td></tr>\n<tr><td>100000</td></tr>\n<tr><td>10</td></tr>\n<tr><td>1</td></tr>\n<tr><td>1</td></tr>\n<tr><td>test-san-pham-1-cover.jpg</td></tr>\n<tr><td>test-san-pham-1-img-0.jpg</td></tr>\n<tr><td>đây là sản phẩm test</td></tr>\n</tbody>\n</table>', 1, 1513943922),
(174, 'admin', 'ADD', '\n<h4>Thêm màu sản phẩm</h4>\n<table>\n<thead>\n<tr><th>Thông tin màu sản phẩm</th></tr>\n</thead>\n<tbody>\n<tr><td>6</td></tr>\n<tr><td>1</td></tr>\n</tbody>\n</table>', 1, 1513943937),
(175, 'admin', 'ADD', '\n<h4>Thêm màu sản phẩm</h4>\n<table>\n<thead>\n<tr><th>Thông tin màu sản phẩm</th></tr>\n</thead>\n<tbody>\n<tr><td>6</td></tr>\n<tr><td>1</td></tr>\n</tbody>\n</table>', 1, 1513956796),
(176, 'admin', 'ADD', '\n<h4>Thêm hóa đơn</h4>\n<table>\n<thead>\n<tr><th>Thông tin hóa đơn</th></tr>\n</thead>\n<tbody>\n<tr><td>PN-1</td></tr>\n<tr><td>Quản trị viên</td></tr>\n</tbody>\n</table>', 1, 1514004310),
(177, 'admin', 'CHANGE', '\n<h4>Sửa hóa đơn</h4>\n<table>\n<thead>\n<tr><th>Hóa đơn cũ</th><th>Hóa đơn mới</th></tr>\n</thead>\n<tbody>\n<tr><td>1514004310</td><td>1514004656</td></tr>\n<tr><td>2</td><td>2</td></tr>\n</tbody>\n</table>', 1, 1514004656),
(178, 'admin', 'CHANGE', '\n<h4>Sửa hóa đơn</h4>\n<table>\n<thead>\n<tr><th>Hóa đơn cũ</th><th>Hóa đơn mới</th></tr>\n</thead>\n<tbody>\n<tr><td>1514004656</td><td>1514004671</td></tr>\n<tr><td>2</td><td>2</td></tr>\n</tbody>\n</table>', 1, 1514004671),
(179, 'admin', 'ADD', 'Thêm module<br>Module thêm mới: Báo cáo nhập kho', 1, 1514093768),
(180, 'admin', 'ADD', 'Thêm module<br>Module thêm mới: Báo cáo sản phẩm bán chạy', 1, 1514144138),
(181, 'admin', 'ADD', '\n<h4>Thêm sản phẩm</h4>\n<table>\n<thead>\n<tr><th>Thông tin sản phẩm</th></tr>\n</thead>\n<tbody>\n<tr><td>test2</td></tr>\n<tr><td>Sản phẩm 2</td></tr>\n<tr><td>150000</td></tr>\n<tr><td>15</td></tr>\n<tr><td>1</td></tr>\n<tr><td>1</td></tr>\n<tr><td>test2-San-pham-2-cover.jpg</td></tr>\n<tr><td>test2-San-pham-2-img-0.jpg</td></tr>\n<tr><td>aaaa</td></tr>\n</tbody>\n</table>', 1, 1514144636),
(182, 'admin', 'ADD', '\n<h4>Thêm màu sản phẩm</h4>\n<table>\n<thead>\n<tr><th>Thông tin màu sản phẩm</th></tr>\n</thead>\n<tbody>\n<tr><td>7</td></tr>\n<tr><td>1</td></tr>\n</tbody>\n</table>', 1, 1514144652),
(183, 'admin', 'ADD', 'Thêm module<br>Module thêm mới: Doanh thu sản phẩm', 1, 1514148615),
(184, 'admin', 'ADD', '\n<h4>Thêm hóa đơn xuất</h4>\n<table>\n<thead>\n<tr><th>Thông tin hóa đơn xuất</th></tr>\n</thead>\n<tbody>\n<tr><td>PX-1</td></tr>\n<tr><td>2</td></tr>\n</tbody>\n</table>', 1, 1514149115),
(185, 'admin', 'ADD', '\n<h4>Thêm hóa đơn</h4>\n<table>\n<thead>\n<tr><th>Thông tin hóa đơn</th></tr>\n</thead>\n<tbody>\n<tr><td>PN-2</td></tr>\n<tr><td>Quản trị viên</td></tr>\n</tbody>\n</table>', 1, 1514151784),
(186, 'admin', 'ADD', '\n<h4>Thêm hóa đơn</h4>\n<table>\n<thead>\n<tr><th>Thông tin hóa đơn</th></tr>\n</thead>\n<tbody>\n<tr><td>PN-3</td></tr>\n<tr><td>Quản trị viên</td></tr>\n</tbody>\n</table>', 1, 1514152675),
(187, 'admin', 'ADD', '\n<h4>Thêm hóa đơn</h4>\n<table>\n<thead>\n<tr><th>Thông tin hóa đơn</th></tr>\n</thead>\n<tbody>\n<tr><td>PN-4</td></tr>\n<tr><td>Quản trị viên</td></tr>\n</tbody>\n</table>', 1, 1514152725),
(188, 'admin', 'ADD', '\n<h4>Thêm hóa đơn</h4>\n<table>\n<thead>\n<tr><th>Thông tin hóa đơn</th></tr>\n</thead>\n<tbody>\n<tr><td>PN-5</td></tr>\n<tr><td>Quản trị viên</td></tr>\n</tbody>\n</table>', 1, 1514152816),
(189, 'admin', 'ADD', '\n<h4>Thêm hóa đơn</h4>\n<table>\n<thead>\n<tr><th>Thông tin hóa đơn</th></tr>\n</thead>\n<tbody>\n<tr><td>PN-6</td></tr>\n<tr><td>Quản trị viên</td></tr>\n</tbody>\n</table>', 1, 1514153090),
(190, 'admin', 'ADD', '\n<h4>Thêm hóa đơn</h4>\n<table>\n<thead>\n<tr><th>Thông tin hóa đơn</th></tr>\n</thead>\n<tbody>\n<tr><td>PN-7</td></tr>\n<tr><td>Quản trị viên</td></tr>\n</tbody>\n</table>', 1, 1514153186),
(191, 'admin', 'ADD', '\n<h4>Thêm hóa đơn</h4>\n<table>\n<thead>\n<tr><th>Thông tin hóa đơn</th></tr>\n</thead>\n<tbody>\n<tr><td>PN-8</td></tr>\n<tr><td>Quản trị viên</td></tr>\n</tbody>\n</table>', 1, 1514153204),
(192, 'admin', 'ADD', '\n<h4>Thêm hóa đơn xuất</h4>\n<table>\n<thead>\n<tr><th>Thông tin hóa đơn xuất</th></tr>\n</thead>\n<tbody>\n<tr><td>PX-2</td></tr>\n<tr><td>2</td></tr>\n</tbody>\n</table>', 1, 1514153243),
(193, 'admin', 'ADD', '\n<h4>Thêm hóa đơn xuất</h4>\n<table>\n<thead>\n<tr><th>Thông tin hóa đơn xuất</th></tr>\n</thead>\n<tbody>\n<tr><td>PX-3</td></tr>\n<tr><td>2</td></tr>\n</tbody>\n</table>', 1, 1514153558),
(194, 'admin', 'ADD', '\n<h4>Thêm hóa đơn xuất</h4>\n<table>\n<thead>\n<tr><th>Thông tin hóa đơn xuất</th></tr>\n</thead>\n<tbody>\n<tr><td>PX-4</td></tr>\n<tr><td>2</td></tr>\n</tbody>\n</table>', 1, 1514155284);

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE `module` (
  `id` int(11) NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name_vi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `location` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `is_show` int(11) NOT NULL,
  `created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`id`, `code`, `name`, `name_vi`, `location`, `is_show`, `created`) VALUES
(1, 'homepage', 'Trang chủ', 'Trang chu', 'backend', 1, 0),
(2, 'module', 'Module', 'Module', 'backend', 1, 0),
(3, 'account', 'Tài khoản', 'Tai khoan', 'backend', 1, 0),
(4, 'access', 'Quyền truy cập', 'Quyen truy cap', 'backend', 1, 0),
(5, 'product', 'Sản phẩm', 'San pham', 'backend', 1, 0),
(6, 'type_product', 'Loại sản phẩm', 'Loai san pham', 'backend', 1, 0),
(7, 'color', 'Màu son', 'Mau son', 'backend', 1, 0),
(8, 'importwh', 'Nhập kho', 'Nhap kho', 'backend', 1, 0),
(9, 'homepage', 'Trang chủ', 'Trang chu', 'frontend', 1, 0),
(10, 'intro', 'Giới thiệu', 'Gioi thieu', 'frontend', 1, 0),
(11, 'news', 'Tin tức', 'Tin tuc', 'frontend', 1, 0),
(12, 'category', 'Danh mục sản phẩm', 'Danh muc san pham', 'frontend', 1, 0),
(13, 'library', 'Thư viện', 'Thu vien', 'frontend', 1, 0),
(14, 'contact', 'Liên hệ', 'Lien he', 'frontend', 1, 0),
(15, 'product_detail', 'Chi tiết sản phẩm', 'Tin tuc', 'frontend', 1, 0),
(16, 'cart', 'Giỏ hàng', 'Gio hang', 'frontend', 1, 0),
(17, 'register', 'Đăng ký', 'Dang ky', 'frontend', 1, 0),
(18, 'login', 'Đăng nhập', 'Dang nhap', 'frontend', 1, 0),
(19, 'search', 'Tìm kiếm', 'Tim kiem', 'frontend', 1, 0),
(20, 'order', 'Đơn hàng', 'Don hang', 'backend', 1, 0),
(21, 'exportwh', 'Xuất kho', 'Xuat kho', 'backend', 1, 0),
(22, 'log', 'Log thao tác', 'Log thao tac', 'backend', 1, 1513331440),
(23, 'daily_report', 'Báo cáo hàng ngày', 'Bao cao hang ngay', 'backend', 1, 1513471384),
(24, 'month_report', 'Báo cáo định kỳ', 'Bao cao dinh ky', 'backend', 1, 1513563917),
(25, 'brand', 'Thương hiệu', 'Thuong hieu', 'backend', 1, 1513687813),
(26, 'import_report', 'Báo cáo tồn kho', 'Bao cao nhap kho', 'backend', 1, 1514093768),
(27, 'product_best', 'Báo cáo sản phẩm bán chạy', 'Bao cao san pham ban chay', 'backend', 1, 1514144138),
(28, 'product_sale', 'Doanh thu sản phẩm', 'Doanh thu san pham', 'backend', 1, 1514148615);

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

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_type_id` int(11) NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name_vi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `img_cover` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `img_list` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `is_show` int(11) NOT NULL,
  `created` int(11) NOT NULL,
  `product_like` int(11) NOT NULL,
  `product_view` int(11) NOT NULL,
  `product_buy` int(11) NOT NULL,
  `product_cmt` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `price` decimal(15,0) NOT NULL,
  `hide` int(11) NOT NULL,
  `md5` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `brand_id`, `product_type_id`, `code`, `name`, `name_vi`, `img_cover`, `img_list`, `description`, `is_show`, `created`, `product_like`, `product_view`, `product_buy`, `product_cmt`, `discount`, `price`, `hide`, `md5`) VALUES
(6, 1, 1, 'test', 'sản phẩm 1', 'san pham 1', 'test-san-pham-1-cover.jpg', 'test-san-pham-1-img-0.jpg', 'đây là sản phẩm test', 1, 1513943922, 0, 0, 0, 0, 10, '100000', 1, '1679091c5a880faf6fb5e6087eb1b2dc'),
(7, 1, 1, 'test2', 'Sản phẩm 2', 'San pham 2', 'test2-San-pham-2-cover.jpg', 'test2-San-pham-2-img-0.jpg', 'aaaa', 1, 1514144635, 0, 0, 0, 0, 15, '150000', 1, '8f14e45fceea167a5a36dedd4bea2543');

-- --------------------------------------------------------

--
-- Table structure for table `product_color`
--

CREATE TABLE `product_color` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `price_avg` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `is_show` int(11) NOT NULL,
  `created` int(11) NOT NULL,
  `md5` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  `created` int(11) NOT NULL,
  `md5` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_type`
--

INSERT INTO `product_type` (`id`, `code`, `name`, `name_vi`, `is_show`, `description`, `created`, `md5`) VALUES
(1, 'son_kem', 'Son kem', 'Son kem', 1, 'Trong loại son này có chứa dầu dưỡng ẩm vì vậy nó giúp môi bạn trở nên nhẹ và mềm hơn, khi son se khô thì mịn như lụa, tự nhiên như màu môi thật. Tuy nhiên chất sáp có trong son đôi khi có thể khiến bạn cảm thấy môi bị đóng 1 lớp hơi khô.', 1513333530, 'c4ca4238a0b923820dcc509a6f75849b'),
(2, 'son_li', 'Son lì', 'Son li', 1, 'Son lì hay còn được gọi là son mờ là loại son khi thoa lên môi sẽ cho ra màu sắc đậm và giống gần như hoàn toàn màu son chúng ta nhìn thấy mà không bị phụ thuộc nhiều vào màu môi. Lí do chính là vì trong son lì có chứa cao lanh, khi thoa lên môi sẽ không tạo hiệu ứng bóng hay lấp lánh. Loại son này không chứa dưỡng ẩm nên tuyệt đối không thoa son lì mà không có lớp son dưỡng lót dưới. Đây là loại son đặc biệt thích hợp cho ban ngày, nó tạo cho bạn vẻ tươi trẻ và quyến rũ.', 1513333637, 'c81e728d9d4c2f636f067f89cc14862c'),
(3, 'son_bong', 'Son bóng', 'Son bong', 1, 'Son bóng thường ở dạng gel, có loại được thiết kế kèm theo cọ tô, có loại thì dạng tuýp, rất tiện mang theo bên mình. Son bóng thường lên màu khá kém và nhanh trôi, khi tô thường để lại cảm giác dính nhớp, nếu không quen sẽ thấy rất khó chịu. Mặc dù vậy, son bóng lại được coi là món đồ trang điểm cần thiết để hoàn thiện vẻ đẹp cho đôi môi. Khi tô son bóng, bạn chỉ nên dùng một chút ở chính giữa môi rồi tán đều bằng cọ, không bặm môi vì sẽ giảm độ bóng mượt. Một lưu ý nữa khi sử dụng loại son này là nên cột tóc cho gọn gàng, tránh tình trạng tóc dính vào son. Son bóng có thể có nhũ hoặc không có nhũ.', 1513333668, 'eccbc87e4b5ce2fe28308fd9f2a7baf3'),
(4, 'test', 'test', 'test', 1, 'đây là test', 1513701098, 'a87ff679a2f3e71d9181a67b7542122c');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access`
--
ALTER TABLE `access`
  ADD PRIMARY KEY (`id`),
  ADD KEY `account_id` (`account_id`),
  ADD KEY `module_id` (`module_id`);

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `account_id` (`account_id`);

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
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_order`
--
ALTER TABLE `customer_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `account_id` (`account_id`);

--
-- Indexes for table `detail_bill`
--
ALTER TABLE `detail_bill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_color_id` (`product_color_id`),
  ADD KEY `bill_id` (`bill_id`);

--
-- Indexes for table `detail_order`
--
ALTER TABLE `detail_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_color_id` (`product_color_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
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
  ADD PRIMARY KEY (`id`),
  ADD KEY `account_id` (`account_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_type_id` (`product_type_id`),
  ADD KEY `brand_id` (`brand_id`);

--
-- Indexes for table `product_color`
--
ALTER TABLE `product_color`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `color_id` (`color_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=386;
--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `customer_order`
--
ALTER TABLE `customer_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `detail_bill`
--
ALTER TABLE `detail_bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;
--
-- AUTO_INCREMENT for table `detail_order`
--
ALTER TABLE `detail_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195;
--
-- AUTO_INCREMENT for table `module`
--
ALTER TABLE `module`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `product_color`
--
ALTER TABLE `product_color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `product_type`
--
ALTER TABLE `product_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `access`
--
ALTER TABLE `access`
  ADD CONSTRAINT `access_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `account` (`id`),
  ADD CONSTRAINT `access_ibfk_2` FOREIGN KEY (`module_id`) REFERENCES `module` (`id`);

--
-- Constraints for table `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `bill_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `account` (`id`);

--
-- Constraints for table `customer_order`
--
ALTER TABLE `customer_order`
  ADD CONSTRAINT `customer_order_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `account` (`id`);

--
-- Constraints for table `detail_bill`
--
ALTER TABLE `detail_bill`
  ADD CONSTRAINT `detail_bill_ibfk_1` FOREIGN KEY (`product_color_id`) REFERENCES `product_color` (`id`),
  ADD CONSTRAINT `detail_bill_ibfk_2` FOREIGN KEY (`bill_id`) REFERENCES `bill` (`id`);

--
-- Constraints for table `detail_order`
--
ALTER TABLE `detail_order`
  ADD CONSTRAINT `detail_order_ibfk_1` FOREIGN KEY (`product_color_id`) REFERENCES `product_color` (`id`),
  ADD CONSTRAINT `detail_order_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `customer_order` (`id`);

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `account` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`product_type_id`) REFERENCES `product_type` (`id`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`id`);

--
-- Constraints for table `product_color`
--
ALTER TABLE `product_color`
  ADD CONSTRAINT `product_color_ibfk_1` FOREIGN KEY (`color_id`) REFERENCES `color` (`id`),
  ADD CONSTRAINT `product_color_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `product_color_ibfk_3` FOREIGN KEY (`color_id`) REFERENCES `color` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
