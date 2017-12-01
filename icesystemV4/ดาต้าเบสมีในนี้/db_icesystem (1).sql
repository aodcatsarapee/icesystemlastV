-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2017 at 02:56 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_icesystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `absence`
--

CREATE TABLE `absence` (
  `absence_id` int(10) UNSIGNED ZEROFILL NOT NULL,
  `employee_id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `absence`
--

INSERT INTO `absence` (`absence_id`, `employee_id`, `date`) VALUES
(0000000004, 00001, '2017-11-25 00:00:00'),
(0000000005, 00001, '2017-11-27 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `account_id` int(10) UNSIGNED ZEROFILL NOT NULL,
  `sell_id` int(11) UNSIGNED ZEROFILL DEFAULT NULL,
  `salaly_id` int(10) UNSIGNED ZEROFILL DEFAULT NULL,
  `debtor_id` int(10) UNSIGNED ZEROFILL DEFAULT NULL,
  `account_detail` text NOT NULL,
  `account_income` decimal(8,2) NOT NULL,
  `account_expenses` decimal(8,2) NOT NULL,
  `account_type` varchar(100) NOT NULL,
  `account_datasave` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`account_id`, `sell_id`, `salaly_id`, `debtor_id`, `account_detail`, `account_income`, `account_expenses`, `account_type`, `account_datasave`) VALUES
(0000000031, NULL, NULL, NULL, 'จ่ายเงินเดือนให้พนักงานชื่อ 123456 123456', '0.00', '600.00', 'จ่ายเงินเดือนให้พนักงาน', '2017-11-26 15:44:46'),
(0000000032, NULL, NULL, NULL, 'ค่าน้ำ', '0.00', '1000.00', 'รายจ่าย', '2017-11-26 15:45:22'),
(0000000033, 00000000047, NULL, NULL, 'ขายสินค้าเป็นเงินสด', '163.00', '0.00', 'รายรับจากการขายสินค้า', '2017-11-26 15:45:45'),
(0000000034, 00000000046, NULL, NULL, 'ได้รับการชำระเงินจากลูกหนี้ ชื่อ สรศักดิ์ tonken', '1060.00', '0.00', 'รายรับจากการชำระหนี้', '2016-11-25 00:00:00'),
(0000000035, NULL, NULL, NULL, 'ลูกหนี้ค้างชำระ', '3500.00', '0.00', 'รายรับ', '2017-11-27 08:28:45'),
(0000000036, NULL, NULL, NULL, 'จ่ายเงินเดือนให้พนักงานชื่อ ศณนุวัฒน์ ศรีราชตีกู ศรีราชตีกูล', '0.00', '0.00', 'จ่ายเงินเดือนให้พนักงาน', '2017-11-27 09:38:11'),
(0000000037, 00000000048, NULL, NULL, 'ขายสินค้าเป็นเงินสด', '2895.00', '0.00', 'รายรับจากการขายสินค้า', '2017-11-27 10:32:38'),
(0000000038, 00000000049, NULL, NULL, 'ได้รับการชำระเงินจากลูกหนี้ ชื่อ สรศักดิ์ ต้นเกณฑ์', '1500.00', '0.00', 'รายรับจากการชำระหนี้', '2017-11-27 10:37:56'),
(0000000039, NULL, NULL, NULL, 'จ่ายเงินเดือนให้พนักงานชื่อ ศณนุวัฒน์ ศรีราชตีกู ศรีราชตีกูล', '0.00', '1500.00', 'จ่ายเงินเดือนให้พนักงาน', '2017-11-27 10:47:48'),
(0000000040, 00000000050, NULL, NULL, 'ได้รับการชำระเงินจากลูกหนี้ ชื่อ aodcaty tonken', '270.00', '0.00', 'รายรับจากการชำระหนี้', '2017-11-27 11:57:48'),
(0000000041, 00000000052, NULL, NULL, 'ขายสินค้าจากการสั้งซื้อ', '3020.00', '0.00', 'รายรับจากการขายสินค้าจากการสั้งซื้อ', '2017-11-29 11:46:27'),
(0000000042, 00000000053, NULL, NULL, 'ขายสินค้าจากการสั้งซื้อ', '630.00', '0.00', 'รายรับจากการขายสินค้าจากการสั้งซื้อ', '2017-11-29 14:37:04'),
(0000000043, 00000000054, NULL, NULL, 'ขายสินค้าจากการสั้งซื้อ', '20.00', '0.00', 'รายรับจากการขายสินค้าจากการสั้งซื้อ', '2017-11-30 09:50:53'),
(0000000044, 00000000055, NULL, NULL, 'ขายสินค้าจากการสั้งซื้อ', '205.00', '0.00', 'รายรับจากการขายสินค้าจากการสั้งซื้อ', '2017-11-30 09:51:48');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) UNSIGNED ZEROFILL NOT NULL,
  `customer_fname` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `customer_lname` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `customer_sex` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `customer_phone` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `customer_email` varchar(80) COLLATE latin1_general_ci NOT NULL,
  `customer_image` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `customer_datasave` date NOT NULL,
  `customer_birthday` date NOT NULL,
  `customer_address` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci DEFAULT NULL,
  `customer_sub_area` varchar(120) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `customer_area` varchar(120) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `customer_province` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `customer_postal_code` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `customer_country` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `customer_IDcard` varchar(13) CHARACTER SET utf32 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_fname`, `customer_lname`, `customer_sex`, `customer_phone`, `customer_email`, `customer_image`, `customer_datasave`, `customer_birthday`, `customer_address`, `customer_sub_area`, `customer_area`, `customer_province`, `customer_postal_code`, `customer_country`, `customer_IDcard`) VALUES
(00000000005, 'aodcaty', 'tonken', 'male', '0866544837', 'aodcat19@gmail.com', '36f447199bf9b80b8e57fc68c3d347b0.png', '2017-11-27', '1321-03-12', '?', '123456', '123456', 'เชียงใหม่', '50140', 'ไทย', '1509901599028'),
(00000000010, 'สรศักดิ์', 'ต้นเกณฑ์', 'fmale', '0866544837', 'admin@admin.com', 'd91483296f3ff70f0d827d2e9b7e5830.png', '2017-11-29', '2017-05-10', '?????', '123', '123456', 'เชียงใหม่', '50140', 'ไทย', '1234567897989'),
(00000000011, 'Nathan', 'Drake', 'male', '0156222222', 'GFFF@gmail.com', 'a1e8b5b1cab76a4cfd115f664688ed5d.jpg', '2017-11-27', '1996-11-12', '295/111 รัญวาคันด้า', 'อาดินาโบลิส', 'รัฐตะวันตก', 'ครอสเบล', '1563', 'อาหรับ', '1500000000001');

-- --------------------------------------------------------

--
-- Table structure for table `debtor`
--

CREATE TABLE `debtor` (
  `debtor_id` int(10) UNSIGNED ZEROFILL NOT NULL,
  `sell_id` int(11) UNSIGNED ZEROFILL NOT NULL,
  `customer_id` int(11) UNSIGNED ZEROFILL NOT NULL,
  `price_total` decimal(8,2) NOT NULL,
  `debtor_status` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `debtor_datasave` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `debtor`
--

INSERT INTO `debtor` (`debtor_id`, `sell_id`, `customer_id`, `price_total`, `debtor_status`, `debtor_datasave`) VALUES
(0000000011, 00000000043, 00000000001, '10765.00', 'ชำระเงินเเล้ว', '2017-11-26 13:40:45'),
(0000000012, 00000000044, 00000000001, '2120.00', 'ชำระเงินเเล้ว', '2017-11-26 13:46:12'),
(0000000013, 00000000045, 00000000001, '163.00', 'ชำระเงินเเล้ว', '2016-10-25 13:47:44'),
(0000000014, 00000000046, 00000000001, '1060.00', 'ชำระเงินเเล้ว', '2017-11-26 15:46:14'),
(0000000015, 00000000049, 00000000010, '1500.00', 'ชำระเงินเเล้ว', '2017-11-27 10:37:56'),
(0000000016, 00000000050, 00000000005, '270.00', 'ชำระเงินเเล้ว', '2017-11-27 11:57:47'),
(0000000017, 00000000051, 00000000011, '230.00', 'ยังไม่ได้ชำระเงิน', '2017-11-27 12:00:27');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_id` int(3) UNSIGNED ZEROFILL NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_datasave` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `name`, `department_datasave`) VALUES
(001, 'คลังสินค้า', '0000-00-00'),
(002, 'บัญชี', '0000-00-00'),
(003, 'ผลิตสินค้า', '0000-00-00'),
(004, 'ขายสินค้า', '0000-00-00'),
(005, 'ผู้จัดการ', '0000-00-00'),
(008, 'ROV players', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `employee_fname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `employee_lname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `employee_birthday` date NOT NULL,
  `employee_sex` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `employee_phone` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `employee_email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `employee_starting_date` date NOT NULL,
  `department` int(3) UNSIGNED ZEROFILL NOT NULL,
  `employee_image` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `employee_datasave` date NOT NULL,
  `employee_sub_area` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `employee_area` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `employee_province` varchar(100) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `employee_postal_code` varchar(100) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `employee_country` varchar(100) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `employee_IDcard` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `employee_home_type` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `employee_date_county` date NOT NULL,
  `employee_pastpost` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `employee_truecoun` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `employee_address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `employee_status` varchar(5) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `employee_fname`, `employee_lname`, `employee_birthday`, `employee_sex`, `employee_phone`, `employee_email`, `employee_starting_date`, `department`, `employee_image`, `employee_datasave`, `employee_sub_area`, `employee_area`, `employee_province`, `employee_postal_code`, `employee_country`, `employee_IDcard`, `employee_home_type`, `employee_date_county`, `employee_pastpost`, `employee_truecoun`, `employee_address`, `employee_status`) VALUES
(00001, 'ศณนุวัฒน์ ', 'ศรีราชตีกูล', '2017-11-28', 'male', '0918515633', 'amuvat313@gmail.com', '0000-00-00', 001, '6158e5f30ee3d8d47da1e8ed727e4317.jpg', '2017-11-27', 'วัด', 'ddd', 'ร้อยเอ็ด', '45220', 'sss', '1111111111111', 'home', '2017-06-05', '1333333333333', 'เมียนม่า', '295/1 444', 'sing'),
(00002, 'anuwat ', 'manoros', '2017-11-22', 'fmale', '9185156331', '', '0000-00-00', 002, 'e8f346c6bb73be00f848e97d662927f6.jpg', '2017-11-27', 'วัด', 'เมือง', 'Chiang Mai', '50000', 'ไทย', '4654549549849', 'home', '0000-00-00', '', '', '295/1 444', 'sing');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(10) UNSIGNED ZEROFILL NOT NULL,
  `customer_id` int(11) UNSIGNED ZEROFILL NOT NULL,
  `product_id` int(4) UNSIGNED ZEROFILL NOT NULL,
  `order_detail_id` int(11) UNSIGNED ZEROFILL NOT NULL,
  `order_product_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `order_product_price` decimal(8,2) DEFAULT NULL,
  `order_product_quantity` int(5) DEFAULT NULL,
  `order_product_total_price` decimal(8,2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `customer_id`, `product_id`, `order_detail_id`, `order_product_name`, `order_product_price`, `order_product_quantity`, `order_product_total_price`) VALUES
(0000000021, 00000000001, 0011, 00000000011, '987', '897.00', 2, '1794.00'),
(0000000022, 00000000001, 0010, 00000000011, '65465', '65.00', 2, '130.00'),
(0000000023, 00000000001, 0009, 00000000011, '6498674', '98.00', 2, '196.00'),
(0000000024, 00000000001, 0010, 00000000012, '65465', '65.00', 5, '325.00'),
(0000000025, 00000000001, 0011, 00000000012, '987', '897.00', 10, '8970.00'),
(0000000026, 00000000001, 0009, 00000000012, '6498674', '98.00', 15, '1470.00'),
(0000000032, 00000000010, 0012, 00000000014, 'น้ำแข็งซอง', '70.00', 18, '1260.00'),
(0000000031, 00000000010, 0011, 00000000014, 'น้ำแข็งก้อน', '20.00', 10, '200.00'),
(0000000033, 00000000010, 0010, 00000000014, 'น้ำแข็งหลอดเล็ก', '65.00', 19, '1235.00'),
(0000000034, 00000000010, 0009, 00000000014, 'น้ำแข็งเกล็ด', '25.00', 13, '325.00'),
(0000000035, 00000000010, 0011, 00000000015, 'น้ำแข็งก้อน', '20.00', 1, '20.00'),
(0000000036, 00000000010, 0010, 00000000015, 'น้ำแข็งหลอดเล็ก', '65.00', 1, '65.00'),
(0000000037, 00000000010, 0012, 00000000015, 'น้ำแข็งซอง', '70.00', 1, '70.00'),
(0000000038, 00000000010, 0009, 00000000015, 'น้ำแข็งเกล็ด', '25.00', 19, '475.00'),
(0000000039, 00000000010, 0011, 00000000016, 'น้ำแข็งก้อน', '20.00', 7, '140.00'),
(0000000040, 00000000010, 0010, 00000000016, 'น้ำแข็งหลอดเล็ก', '65.00', 1, '65.00'),
(0000000041, 00000000010, 0011, 00000000017, 'น้ำแข็งก้อน', '20.00', 1, '20.00');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `order_detail_id` int(11) UNSIGNED ZEROFILL NOT NULL,
  `order_detail_status` varchar(100) DEFAULT NULL,
  `order_out_date` varchar(255) DEFAULT NULL,
  `order_out_customer_date` varchar(255) DEFAULT NULL,
  `order_detail_total` decimal(8,2) DEFAULT NULL,
  `order_detail_date` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`order_detail_id`, `order_detail_status`, `order_out_date`, `order_out_customer_date`, `order_detail_total`, `order_detail_date`) VALUES
(00000000011, 'ดำเนินเรียบเรียบเเล้ว', '555', '55', '2120.00', '2017-11-26 13:14:31'),
(00000000012, 'ดำเนินเรียบเรียบเเล้ว', '798789', '798789', '10765.00', '2017-11-26 13:27:21'),
(00000000014, 'ดำเนินเรียบเรียบเเล้ว', 'ชาติหน้า', '2222', '3020.00', '2017-11-29 11:46:27'),
(00000000015, 'ดำเนินเรียบเรียบเเล้ว', '5555', '55', '630.00', '2017-11-28 14:37:04'),
(00000000016, 'ดำเนินเรียบเรียบเเล้ว', '10', '2', '205.00', '2017-11-30 09:51:48'),
(00000000017, 'ดำเนินเรียบเรียบเเล้ว', '10', 's', '20.00', '2016-11-30 09:50:53');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(4) UNSIGNED ZEROFILL NOT NULL,
  `product_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_detail` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_price` decimal(10,0) DEFAULT NULL,
  `product_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_amount` int(3) NOT NULL,
  `product_amount_order` int(3) NOT NULL,
  `product_alert` int(3) NOT NULL,
  `product_img` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='ตารางเก็บข้อมูลสินค้า';

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_detail`, `product_price`, `product_type`, `product_amount`, `product_amount_order`, `product_alert`, `product_img`, `date`) VALUES
(0010, 'น้ำแข็งหลอดเล็ก', 'ลักษณะเป็นลูกสี่เหลี่ยมเหมือนกล่องขนาดเล็ก', '65', 'กระสอบ', 396, 0, 100, 'b91e0e93fcba33c89a5c328920757c6b.jpg', '2017-11-30 09:51:40'),
(0009, 'น้ำแข็งเกล็ด', 'มีลักษณะเป็นเกล็ด โดยผลิตจากการนำน้ำแข็งก้อนหรือซองเข้าเคลื่องบด', '25', 'กระสอบ', 282, 0, 100, '5502c591a00e1984ca09178ca0c9fd38.jpg', '2017-11-29 14:36:55'),
(0011, 'น้ำแข็งก้อน', 'เป็นรูปแบบย่อยของน้ำแข็งซองแต่จะถูกหั่นแยกออกมาเป็นส่วนๆ', '20', 'ก้อน', 496, 0, 100, '510c2dae232fb11ae38fb0f22598e5d7.jpg', '2017-11-30 09:51:40'),
(0012, 'น้ำแข็งซอง', 'มีลักษณะเป็นแท่งตรงยาวขนาด 90*190 ซม.', '70', 'ก้อน', 28, 0, 5, 'f578d395dd1e78759d620cdb2c78b0f9.jpg', '2017-11-29 14:36:55');

-- --------------------------------------------------------

--
-- Table structure for table `rest_work`
--

CREATE TABLE `rest_work` (
  `rest_id` int(10) UNSIGNED ZEROFILL NOT NULL,
  `employee_id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `rest_before` date NOT NULL,
  `rest_after` date NOT NULL,
  `date_add` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rest_work`
--

INSERT INTO `rest_work` (`rest_id`, `employee_id`, `rest_before`, `rest_after`, `date_add`) VALUES
(0000000014, 00001, '2017-11-01', '2017-11-23', '2017-11-26'),
(0000000015, 00002, '2017-11-27', '2017-12-02', '2017-11-27');

-- --------------------------------------------------------

--
-- Table structure for table `salary_month`
--

CREATE TABLE `salary_month` (
  `salaly_id` int(10) UNSIGNED ZEROFILL NOT NULL,
  `salaly_month` int(10) NOT NULL,
  `employee_id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `absence` int(2) DEFAULT NULL,
  `rest_work` int(2) DEFAULT NULL,
  `worktime` int(2) DEFAULT NULL,
  `date_add` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `salary_month`
--

INSERT INTO `salary_month` (`salaly_id`, `salaly_month`, `employee_id`, `absence`, `rest_work`, `worktime`, `date_add`) VALUES
(0000000015, 1500, 00001, 2, 22, 5, '2017-11-27');

-- --------------------------------------------------------

--
-- Table structure for table `sell`
--

CREATE TABLE `sell` (
  `sell_id` int(11) UNSIGNED ZEROFILL NOT NULL,
  `product_id` int(4) UNSIGNED ZEROFILL NOT NULL,
  `sell_detail_id` int(11) UNSIGNED ZEROFILL NOT NULL,
  `order_id` int(10) UNSIGNED ZEROFILL DEFAULT NULL,
  `customer_id` int(11) UNSIGNED ZEROFILL DEFAULT NULL,
  `sell_product_quantity` varchar(45) COLLATE latin1_general_ci DEFAULT NULL,
  `sell_product_price` decimal(8,2) DEFAULT NULL,
  `sell_product_total_price` decimal(8,2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `sell`
--

INSERT INTO `sell` (`sell_id`, `product_id`, `sell_detail_id`, `order_id`, `customer_id`, `sell_product_quantity`, `sell_product_price`, `sell_product_total_price`) VALUES
(00000000039, 0011, 00000000041, 0000000011, 00000000001, '2', '897.00', '1794.00'),
(00000000040, 0010, 00000000041, 0000000011, 00000000001, '2', '65.00', '130.00'),
(00000000041, 0009, 00000000041, 0000000011, 00000000001, '2', '98.00', '196.00'),
(00000000042, 0011, 00000000042, NULL, NULL, '1', '897.00', NULL),
(00000000043, 0010, 00000000042, NULL, NULL, '1', '65.00', NULL),
(00000000044, 0009, 00000000042, NULL, NULL, '1', '98.00', NULL),
(00000000045, 0011, 00000000043, 0000000012, 00000000001, '10', '897.00', '8970.00'),
(00000000046, 0010, 00000000043, 0000000012, 00000000001, '5', '65.00', '325.00'),
(00000000047, 0009, 00000000043, 0000000012, 00000000001, '15', '98.00', '1470.00'),
(00000000048, 0011, 00000000044, NULL, 00000000001, '2', '897.00', NULL),
(00000000049, 0010, 00000000044, NULL, 00000000001, '2', '65.00', NULL),
(00000000050, 0009, 00000000044, NULL, 00000000001, '2', '98.00', NULL),
(00000000051, 0010, 00000000045, NULL, 00000000001, '1', '65.00', NULL),
(00000000052, 0009, 00000000045, NULL, 00000000001, '1', '98.00', NULL),
(00000000053, 0011, 00000000046, NULL, 00000000001, '1', '897.00', NULL),
(00000000054, 0010, 00000000046, NULL, 00000000001, '1', '65.00', NULL),
(00000000055, 0009, 00000000046, NULL, 00000000001, '1', '98.00', NULL),
(00000000056, 0010, 00000000047, NULL, NULL, '1', '65.00', NULL),
(00000000057, 0009, 00000000047, NULL, NULL, '1', '98.00', NULL),
(00000000058, 0012, 00000000048, NULL, NULL, '34', '70.00', NULL),
(00000000059, 0011, 00000000048, NULL, NULL, '2', '20.00', NULL),
(00000000060, 0009, 00000000048, NULL, NULL, '19', '25.00', NULL),
(00000000061, 0012, 00000000049, NULL, 00000000010, '9', '70.00', NULL),
(00000000062, 0011, 00000000049, NULL, 00000000010, '10', '20.00', NULL),
(00000000063, 0010, 00000000049, NULL, 00000000010, '8', '65.00', NULL),
(00000000064, 0009, 00000000049, NULL, 00000000010, '6', '25.00', NULL),
(00000000065, 0010, 00000000050, NULL, 00000000005, '3', '65.00', NULL),
(00000000066, 0009, 00000000050, NULL, 00000000005, '3', '25.00', NULL),
(00000000067, 0010, 00000000051, NULL, 00000000011, '2', '65.00', NULL),
(00000000068, 0009, 00000000051, NULL, 00000000011, '4', '25.00', NULL),
(00000000069, 0012, 00000000052, 0000000014, 00000000010, '18', '70.00', '1260.00'),
(00000000070, 0011, 00000000052, 0000000014, 00000000010, '10', '20.00', '200.00'),
(00000000071, 0010, 00000000052, 0000000014, 00000000010, '19', '65.00', '1235.00'),
(00000000072, 0009, 00000000052, 0000000014, 00000000010, '13', '25.00', '325.00'),
(00000000073, 0012, 00000000053, 0000000015, 00000000010, '1', '70.00', '70.00'),
(00000000074, 0011, 00000000053, 0000000015, 00000000010, '1', '20.00', '20.00'),
(00000000075, 0010, 00000000053, 0000000015, 00000000010, '1', '65.00', '65.00'),
(00000000076, 0009, 00000000053, 0000000015, 00000000010, '19', '25.00', '475.00'),
(00000000077, 0011, 00000000054, 0000000017, 00000000010, '1', '20.00', '20.00'),
(00000000078, 0011, 00000000055, 0000000016, 00000000010, '7', '20.00', '140.00'),
(00000000079, 0010, 00000000055, 0000000016, 00000000010, '1', '65.00', '65.00');

-- --------------------------------------------------------

--
-- Table structure for table `sell_detail`
--

CREATE TABLE `sell_detail` (
  `sell_detail_id` int(11) UNSIGNED ZEROFILL NOT NULL,
  `sell_detail_received` decimal(8,2) DEFAULT NULL,
  `sell_detail_change_sell` decimal(8,2) DEFAULT NULL,
  `sell_detail_total` decimal(8,2) DEFAULT NULL,
  `sell_detail_status` varchar(100) DEFAULT NULL,
  `sell_detail_pay_status` varchar(100) DEFAULT NULL,
  `sell_detail_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sell_detail`
--

INSERT INTO `sell_detail` (`sell_detail_id`, `sell_detail_received`, `sell_detail_change_sell`, `sell_detail_total`, `sell_detail_status`, `sell_detail_pay_status`, `sell_detail_date`) VALUES
(00000000041, NULL, NULL, '2120.00', 'ขายสินค้าเป็นเงินสดจากการสั้งซื้อ', 'ชำระเงินเเล้ว', '2017-11-26 13:14:31'),
(00000000042, '1200.00', '140.00', '1060.00', 'ขายสินค้าเป็นเงินสด', 'ชำระเงินเเล้ว', '2017-11-26 13:19:31'),
(00000000043, NULL, NULL, '10765.00', 'ขายสินค้าเป็นเงินเชื่อจากการสั้งซื้อ', 'ชำระเงินเเล้ว', '2017-11-26 13:40:45'),
(00000000044, NULL, NULL, '2120.00', 'ขายสินค้าเป็นเงินเชื่อ', 'ชำระเงินเเล้ว', '2017-11-26 13:46:12'),
(00000000045, NULL, NULL, '163.00', 'ขายสินค้าเป็นเงินเชื่อ', 'ชำระเงินเเล้ว', '2017-11-26 13:47:44'),
(00000000046, NULL, NULL, '1060.00', 'ขายสินค้าเป็นเงินเชื่อ', 'ชำระเงินเเล้ว', '2017-11-26 15:46:14'),
(00000000047, '200.00', '37.00', '163.00', 'ขายสินค้าเป็นเงินสด', 'ชำระเงินเเล้ว', '2017-11-26 15:45:45'),
(00000000048, '30000.00', '27105.00', '2895.00', 'ขายสินค้าเป็นเงินสด', 'ชำระเงินเเล้ว', '2017-11-27 10:32:38'),
(00000000049, NULL, NULL, '1500.00', 'ขายสินค้าเป็นเงินเชื่อ', 'ชำระเงินเเล้ว', '2017-11-27 10:37:56'),
(00000000050, NULL, NULL, '270.00', 'ขายสินค้าเป็นเงินเชื่อ', 'ชำระเงินเเล้ว', '2017-11-27 11:57:48'),
(00000000051, NULL, NULL, '230.00', 'ขายสินค้าเป็นเงินเชื่อ', 'ยังไม่ได้ชำระเงิน', '2017-11-27 12:00:27'),
(00000000052, NULL, NULL, '3020.00', 'ขายสินค้าเป็นเงินสดจากการสั้งซื้อ', 'ชำระเงินเเล้ว', '2017-11-29 11:46:27'),
(00000000053, NULL, NULL, '630.00', 'ขายสินค้าเป็นเงินสดจากการสั้งซื้อ', 'ชำระเงินเเล้ว', '2017-11-29 14:37:04'),
(00000000054, NULL, NULL, '20.00', 'ขายสินค้าเป็นเงินสดจากการสั้งซื้อ', 'ชำระเงินเเล้ว', '2017-11-30 09:50:52'),
(00000000055, NULL, NULL, '205.00', 'ขายสินค้าเป็นเงินสดจากการสั้งซื้อ', 'ชำระเงินเเล้ว', '2017-11-30 09:51:48');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `stock_id` int(11) UNSIGNED ZEROFILL NOT NULL,
  `product_id` int(4) UNSIGNED ZEROFILL NOT NULL,
  `employee_id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `stock_detail_id` int(10) UNSIGNED ZEROFILL NOT NULL,
  `order_id` int(10) UNSIGNED ZEROFILL DEFAULT NULL,
  `stock_product_name` varchar(45) DEFAULT NULL,
  `stock_amount` varchar(45) DEFAULT NULL,
  `stock_product_type` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`stock_id`, `product_id`, `employee_id`, `stock_detail_id`, `order_id`, `stock_product_name`, `stock_amount`, `stock_product_type`) VALUES
(00000000064, 0011, 00000, 0000000026, 0000000011, '987', '2', ''),
(00000000065, 0010, 00000, 0000000026, 0000000011, '65465', '2', ''),
(00000000066, 0009, 00000, 0000000026, 0000000011, '6498674', '2', ''),
(00000000067, 0011, 00001, 0000000027, NULL, '987', '500', '897'),
(00000000068, 0010, 00001, 0000000027, NULL, '65465', '400', '65'),
(00000000069, 0009, 00001, 0000000027, NULL, '6498674', '300', '18'),
(00000000070, 0010, 00000, 0000000028, 0000000012, '65465', '5', ''),
(00000000071, 0011, 00000, 0000000028, 0000000012, '987', '10', ''),
(00000000072, 0009, 00000, 0000000028, 0000000012, '6498674', '15', ''),
(00000000077, 0012, 00001, 0000000030, NULL, 'น้ำแข็งซอง', '56', 'ก้อน'),
(00000000078, 0011, 00001, 0000000030, NULL, 'น้ำแข็งก้อน', '0', 'ก้อน'),
(00000000079, 0010, 00001, 0000000030, NULL, 'น้ำแข็งหลอดเล็ก', '0', 'กระสอบ'),
(00000000080, 0009, 00001, 0000000030, NULL, 'น้ำแข็งเกล็ด', '0', 'กระสอบ'),
(00000000081, 0012, 00001, 0000000031, NULL, 'น้ำแข็งซอง', '15', 'ก้อน'),
(00000000082, 0011, 00001, 0000000031, NULL, 'น้ำแข็งก้อน', '12', 'ก้อน'),
(00000000083, 0010, 00001, 0000000031, NULL, 'น้ำแข็งหลอดเล็ก', '15', 'กระสอบ'),
(00000000084, 0009, 00001, 0000000031, NULL, 'น้ำแข็งเกล็ด', '20', 'กระสอบ'),
(00000000085, 0012, 00000, 0000000032, 0000000014, 'น้ำแข็งซอง', '18', ''),
(00000000086, 0011, 00000, 0000000032, 0000000014, 'น้ำแข็งก้อน', '10', ''),
(00000000087, 0010, 00000, 0000000032, 0000000014, 'น้ำแข็งหลอดเล็ก', '19', ''),
(00000000088, 0009, 00000, 0000000032, 0000000014, 'น้ำแข็งเกล็ด', '13', ''),
(00000000089, 0011, 00000, 0000000033, 0000000015, 'น้ำแข็งก้อน', '1', ''),
(00000000090, 0010, 00000, 0000000033, 0000000015, 'น้ำแข็งหลอดเล็ก', '1', ''),
(00000000091, 0012, 00000, 0000000033, 0000000015, 'น้ำแข็งซอง', '1', ''),
(00000000092, 0009, 00000, 0000000033, 0000000015, 'น้ำแข็งเกล็ด', '19', ''),
(00000000093, 0011, 00000, 0000000034, 0000000017, 'น้ำแข็งก้อน', '1', ''),
(00000000094, 0011, 00000, 0000000035, 0000000016, 'น้ำแข็งก้อน', '7', ''),
(00000000095, 0010, 00000, 0000000035, 0000000016, 'น้ำแข็งหลอดเล็ก', '1', '');

-- --------------------------------------------------------

--
-- Table structure for table `stock_detail`
--

CREATE TABLE `stock_detail` (
  `stock_detail_id` int(10) UNSIGNED ZEROFILL NOT NULL,
  `stock_detail_status` varchar(45) DEFAULT NULL,
  `stock_detail_date` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stock_detail`
--

INSERT INTO `stock_detail` (`stock_detail_id`, `stock_detail_status`, `stock_detail_date`) VALUES
(0000000026, 'รับสินค้าเข้าคลังเเล้ว', '2017-11-26 13:14:08'),
(0000000027, 'รับสินค้าเข้าคลังเเล้ว', '2017-11-26 13:19:10'),
(0000000028, 'รับสินค้าเข้าคลังเเล้ว', '2017-11-26 13:26:28'),
(0000000030, 'รับสินค้าเข้าคลังเเล้ว', '2017-11-27 10:30:12'),
(0000000031, 'รับสินค้าเข้าคลังเเล้ว', '2017-11-29 14:36:55'),
(0000000032, 'รับสินค้าเข้าคลังเเล้ว', '2017-11-29 11:46:04'),
(0000000033, 'รับสินค้าเข้าคลังเเล้ว', '2017-11-29 14:36:54'),
(0000000034, 'รับสินค้าเข้าคลังเเล้ว', '2017-11-30 09:50:42'),
(0000000035, 'รับสินค้าเข้าคลังเเล้ว', '2017-11-30 09:51:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `employee_id` int(5) UNSIGNED ZEROFILL DEFAULT NULL,
  `customer_id` int(11) UNSIGNED ZEROFILL DEFAULT NULL,
  `password` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `user_type` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `user_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `employee_id`, `customer_id`, `password`, `user_type`, `user_date`) VALUES
(00001, 'admin', 00001, NULL, 'admin', 'admin', '0000-00-00 00:00:00'),
(00004, '1509901599028', NULL, 00000000005, '123456', 'customers', '2017-11-26 16:06:42'),
(00009, 'tzippy02', NULL, 00000000010, '123456', 'customers', '2017-11-27 10:23:54'),
(00010, 'emp_sale', 00000, NULL, '123456', 'admin', '2017-11-27 09:14:23'),
(00011, '1500000000001', NULL, 00000000011, '123456', 'customers', '2017-11-27 11:01:37');

-- --------------------------------------------------------

--
-- Table structure for table `worktime`
--

CREATE TABLE `worktime` (
  `Worktime_id` int(10) UNSIGNED ZEROFILL NOT NULL,
  `employee_id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `Worktime_time_in` time DEFAULT NULL,
  `Worktime_time_out` time DEFAULT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `worktime`
--

INSERT INTO `worktime` (`Worktime_id`, `employee_id`, `Worktime_time_in`, `Worktime_time_out`, `date`) VALUES
(0000000014, 00001, '15:32:04', '10:46:36', '2017-11-14'),
(0000000015, 00001, '15:34:09', '10:46:36', '2017-11-06'),
(0000000017, 00001, '10:43:24', '10:46:36', '2017-11-13'),
(0000000018, 00001, '10:46:06', '10:46:36', '2017-11-23'),
(0000000019, 00001, '10:46:33', '10:46:36', '2017-11-24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absence`
--
ALTER TABLE `absence`
  ADD PRIMARY KEY (`absence_id`),
  ADD KEY `fk_absence_employee1_idx` (`employee_id`);

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`account_id`),
  ADD KEY `fk_account_salary_month1_idx` (`salaly_id`),
  ADD KEY `fk_account_debtor1_idx` (`debtor_id`),
  ADD KEY `fk_account_sell1_idx` (`sell_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `debtor`
--
ALTER TABLE `debtor`
  ADD PRIMARY KEY (`debtor_id`),
  ADD KEY `fk_debtor_customers1_idx` (`customer_id`),
  ADD KEY `fk_debtor_sell1_idx` (`sell_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`),
  ADD KEY `fk_employee_department_idx` (`department`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `fk_customers_has_product_product2_idx` (`product_id`),
  ADD KEY `fk_customers_has_product_customers2_idx` (`customer_id`),
  ADD KEY `fk_order_order_detail1_idx` (`order_detail_id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`order_detail_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `rest_work`
--
ALTER TABLE `rest_work`
  ADD PRIMARY KEY (`rest_id`),
  ADD KEY `fk_rest_work_employee1_idx` (`employee_id`);

--
-- Indexes for table `salary_month`
--
ALTER TABLE `salary_month`
  ADD PRIMARY KEY (`salaly_id`),
  ADD KEY `fk_salary_month_employee1_idx` (`employee_id`);

--
-- Indexes for table `sell`
--
ALTER TABLE `sell`
  ADD PRIMARY KEY (`sell_id`),
  ADD KEY `fk_customers_has_product_product1_idx` (`product_id`),
  ADD KEY `fk_customers_has_product_customers1_idx` (`customer_id`),
  ADD KEY `fk_sell_order1_idx` (`order_id`),
  ADD KEY `fk_sell_sell_detail1_idx` (`sell_detail_id`);

--
-- Indexes for table `sell_detail`
--
ALTER TABLE `sell_detail`
  ADD PRIMARY KEY (`sell_detail_id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`stock_id`),
  ADD KEY `fk_stock_product1_idx` (`product_id`),
  ADD KEY `fk_stock_employee1_idx` (`employee_id`),
  ADD KEY `fk_stock_order1_idx` (`order_id`),
  ADD KEY `fk_stock_stock_detail1_idx` (`stock_detail_id`);

--
-- Indexes for table `stock_detail`
--
ALTER TABLE `stock_detail`
  ADD PRIMARY KEY (`stock_detail_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `fk_users_employee1_idx` (`employee_id`),
  ADD KEY `fk_users_customers1_idx` (`customer_id`);

--
-- Indexes for table `worktime`
--
ALTER TABLE `worktime`
  ADD PRIMARY KEY (`Worktime_id`),
  ADD KEY `fk_worktime_employee1_idx` (`employee_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absence`
--
ALTER TABLE `absence`
  MODIFY `absence_id` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `account_id` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `debtor`
--
ALTER TABLE `debtor`
  MODIFY `debtor_id` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `order_detail_id` int(11) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `rest_work`
--
ALTER TABLE `rest_work`
  MODIFY `rest_id` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `salary_month`
--
ALTER TABLE `salary_month`
  MODIFY `salaly_id` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `sell`
--
ALTER TABLE `sell`
  MODIFY `sell_id` int(11) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;
--
-- AUTO_INCREMENT for table `sell_detail`
--
ALTER TABLE `sell_detail`
  MODIFY `sell_detail_id` int(11) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `stock_id` int(11) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;
--
-- AUTO_INCREMENT for table `stock_detail`
--
ALTER TABLE `stock_detail`
  MODIFY `stock_detail_id` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `worktime`
--
ALTER TABLE `worktime`
  MODIFY `Worktime_id` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `fk_account_debtor1` FOREIGN KEY (`debtor_id`) REFERENCES `debtor` (`debtor_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_account_salary_month1` FOREIGN KEY (`salaly_id`) REFERENCES `salary_month` (`salaly_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
