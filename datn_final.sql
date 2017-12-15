-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2017 at 10:17 PM
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
(362, 1, 22, 1, 1, 1, 1, 1);

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
  `is_show` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `username`, `password`, `name`, `name_vi`, `email`, `phone`, `address`, `created`, `group_account_id`, `status`, `is_show`) VALUES
(0, 'check_order', '', 'Check Order', '', '', '', '', 0, 0, 0, 0),
(1, 'administrator', '', 'Quản trị viên', 'Quan tri vien', '', '', '', 1513329518, 0, 0, 1),
(2, 'admin', 'admin', 'Quản trị viên', 'Quan tri vien', 'quantri@gmail.com', '19001000', '', 1513330567, 1, 1, 1),
(3, 'sales', '', 'Nhân viên bán hàng', 'Nhan vien ban hang', '', '', '', 1513329385, 0, 0, 1),
(4, 'ken95', '123', 'Ngọc', 'Ngoc', 'ngocken95@gmail.com', '01678986627', '', 1513330965, 3, 0, 0),
(5, 'ken95nuce', '123', 'Ngọc Phạm', 'Ngoc Pham', 'ngocken95@gmail.com', '01678986627', '', 1513331096, 3, 0, 1),
(6, 'member', '', 'Khách hàng', 'Khach hang', '', '', '', 0, 0, 0, 1),
(7, 'ken', '123', 'ngoc', 'ngoc', 'ngock@gmail.com', '01662492228', 'Hà Nội', 1513370516, 6, 0, 1);

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
  `is_show` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`id`, `code`, `total`, `created`, `type`, `account_id`, `discount`, `is_show`) VALUES
(1, 'PN-1', '2375000', 1513369060, 'IMPORT', 2, 0, 1),
(2, 'PN-2', '2550000', 1513369207, 'IMPORT', 2, 0, 1),
(3, 'PN-3', '675000', 1513369234, 'IMPORT', 2, 0, 1),
(4, 'PN-4', '1500000', 1513371629, 'IMPORT', 2, 0, 1),
(5, 'PX-1', '610000', 1513372046, 'EXPORT', 2, 0, 1);

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
  `is_show` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `code`, `name`, `logo`, `created`, `is_show`) VALUES
(1, 'nyd', 'NYD', 'nyd.jpg', 1513335235, 1),
(2, 'ilip', 'ILIP', 'ilip.png', 1513335604, 1),
(3, 'helle', 'helle', 'images_(1).png', 1513335660, 1),
(4, 'lipsley', 'lipsley', 'lipsley.jpg', 1513335719, 1);

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
  `is_show` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`id`, `code`, `name`, `name_vi`, `created`, `is_show`) VALUES
(1, '8B4513', 'SaddleBrown', 'SaddleBrown', 1513332514, 1),
(2, 'A0522D', 'Sienna', 'Sienna', 1513331960, 1),
(3, 'CD853F', 'Peru', 'Peru', 1513331982, 1),
(4, 'CD5C5C', 'IndianRed', 'IndianRed', 1513332002, 1),
(5, 'D2B48C', 'Tan', 'Tan', 1513332018, 1),
(6, 'D2691E', 'Chocolate', 'Chocolate', 1513332027, 1),
(7, 'FFA500', 'Orange', 'Orange', 1513332047, 1),
(8, 'DDC488', 'AntiqueGold', 'AntiqueGold', 1513332072, 1),
(9, 'ECAB53', 'AgedPaper', 'AgedPaper', 1513332082, 1);

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
  `cus_name_vi` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customer_order`
--

INSERT INTO `customer_order` (`id`, `code`, `total`, `created`, `is_show`, `account_id`, `cus_name`, `cus_email`, `cus_phone`, `cus_address`, `status`, `cus_note`, `cus_name_vi`) VALUES
(3, 'DH-1', '610000', 1513370885, 1, 2, 'ngoc', 'ngock@gmail.com', '1662492228', 'Hà Nội', 'DONE', 'giao hàng nhanh', 'ngoc');

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
(1, 1, 1, 10, '50000', 1, '500000', 0),
(2, 1, 3, 5, '75000', 1, '375000', 0),
(3, 1, 5, 15, '100000', 1, '1500000', 0),
(4, 2, 5, 15, '150000', 1, '2250000', 0),
(5, 2, 3, 3, '100000', 1, '300000', 0),
(6, 3, 2, 3, '100000', 1, '300000', 0),
(7, 3, 3, 3, '125000', 1, '375000', 0),
(8, 4, 6, 10, '150000', 1, '1500000', 0),
(9, 5, 1, 3, '90000', 1, '270000', 0),
(10, 5, 6, 2, '170000', 1, '340000', 0);

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

--
-- Dumping data for table `detail_order`
--

INSERT INTO `detail_order` (`id`, `product_color_id`, `quantity`, `price`, `is_show`, `order_id`, `discount`) VALUES
(1, 1, 3, '90000', 1, 3, 0),
(2, 6, 2, '170000', 1, 3, 0);

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
(48, 'admin', 'ADD', 'Thêm hóa đơn nhập<br>Mã hóa đơn nhập: PN-4', 1, 1513371629);

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
(22, 'log', 'Log thao tác', 'Log thao tac', 'backend', 1, 1513331440);

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
  `hide` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `brand_id`, `product_type_id`, `code`, `name`, `name_vi`, `img_cover`, `img_list`, `description`, `is_show`, `created`, `product_like`, `product_view`, `product_buy`, `product_cmt`, `discount`, `price`, `hide`) VALUES
(1, 2, 2, 'test1', 'Sản phẩm 1', 'San pham 1', 'test1-San-pham-1-cover.jpg', 'test1-San-pham-1-img-0.jpg/test1-San-pham-1-img-1.jpg/test1-San-pham-1-img-2.jpg/test1-San-pham-1-img-3.jpg/test1-San-pham-1-img-4.jpg', 'đây là sản phẩm test 1', 1, 1513365212, 1, 1, 3, 0, 10, '100000', 1),
(2, 2, 2, 'test2', 'Sản phẩm 2', 'San pham 2', 'test2-San-pham-2-cover.jpg', 'test2-San-pham-2-img-0.jpg/test2-San-pham-2-img-1.jpg/test2-San-pham-2-img-2.jpg/test2-San-pham-2-img-3.jpg/test2-San-pham-2-img-4.jpg/test2-San-pham-2-img-5.jpg/test2-San-pham-2-img-6.jpg', 'sản phẩm test 2', 1, 1513365269, 1, 1, 0, 0, 5, '150000', 1),
(3, 3, 3, 'test3', 'Sản phẩm 3', 'San pham 3', 'test3-San-pham-3-cover.jpg', 'test3-San-pham-3-img-0.jpg', 'sản phẩm test 3', 1, 1513365323, 1, 1, 2, 0, 15, '200000', 1),
(4, 1, 1, 'test4', 'Sản phẩm 4', 'San pham 4', 'test4-San-pham-4-cover.jpg', 'test4-San-pham-4-img-0.jpg', 'sản phẩm 4', 1, 1513365348, 1, 1, 0, 0, 70, '200000', 1);

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
  `created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_color`
--

INSERT INTO `product_color` (`id`, `product_id`, `color_id`, `price_avg`, `quantity`, `is_show`, `created`) VALUES
(1, 1, 1, 50000, 7, 1, 1513366159),
(2, 1, 2, 100000, 3, 1, 1513366159),
(3, 1, 3, 95455, 11, 1, 1513366159),
(4, 2, 6, 0, 0, 1, 1513367563),
(5, 2, 3, 125000, 30, 1, 1513367563),
(6, 3, 7, 150000, 8, 1, 1513367574),
(7, 3, 8, 0, 0, 1, 1513367574),
(8, 3, 2, 0, 0, 1, 1513367574),
(9, 4, 4, 0, 0, 1, 1513367585),
(10, 4, 5, 0, 0, 1, 1513367585),
(11, 4, 9, 0, 0, 1, 1513367585);

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
(1, 'son_kem', 'Son kem', 'Son kem', 1, 'Trong loại son này có chứa dầu dưỡng ẩm vì vậy nó giúp môi bạn trở nên nhẹ và mềm hơn, khi son se khô thì mịn như lụa, tự nhiên như màu môi thật. Tuy nhiên chất sáp có trong son đôi khi có thể khiến bạn cảm thấy môi bị đóng 1 lớp hơi khô.', 1513333530),
(2, 'son_li', 'Son lì', 'Son li', 1, 'Son lì hay còn được gọi là son mờ là loại son khi thoa lên môi sẽ cho ra màu sắc đậm và giống gần như hoàn toàn màu son chúng ta nhìn thấy mà không bị phụ thuộc nhiều vào màu môi. Lí do chính là vì trong son lì có chứa cao lanh, khi thoa lên môi sẽ không tạo hiệu ứng bóng hay lấp lánh. Loại son này không chứa dưỡng ẩm nên tuyệt đối không thoa son lì mà không có lớp son dưỡng lót dưới. Đây là loại son đặc biệt thích hợp cho ban ngày, nó tạo cho bạn vẻ tươi trẻ và quyến rũ.', 1513333637),
(3, 'son_bong', 'Son bóng', 'Son bong', 1, 'Son bóng thường ở dạng gel, có loại được thiết kế kèm theo cọ tô, có loại thì dạng tuýp, rất tiện mang theo bên mình. Son bóng thường lên màu khá kém và nhanh trôi, khi tô thường để lại cảm giác dính nhớp, nếu không quen sẽ thấy rất khó chịu. Mặc dù vậy, son bóng lại được coi là món đồ trang điểm cần thiết để hoàn thiện vẻ đẹp cho đôi môi. Khi tô son bóng, bạn chỉ nên dùng một chút ở chính giữa môi rồi tán đều bằng cọ, không bặm môi vì sẽ giảm độ bóng mượt. Một lưu ý nữa khi sử dụng loại son này là nên cột tóc cho gọn gàng, tránh tình trạng tóc dính vào son. Son bóng có thể có nhũ hoặc không có nhũ.', 1513333668);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=363;
--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `detail_bill`
--
ALTER TABLE `detail_bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `detail_order`
--
ALTER TABLE `detail_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `module`
--
ALTER TABLE `module`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `product_color`
--
ALTER TABLE `product_color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `product_type`
--
ALTER TABLE `product_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
