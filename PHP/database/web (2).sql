-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 19, 2023 at 12:08 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id_account` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `id_group_roles` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id_account`, `username`, `password`, `id_group_roles`) VALUES
('acct6463107809fd2', 'cus1', '123@abc', 'grup6463091469b90'),
('acct646459d938068', 'empl646459cb66e10', '1234', 'grup6464789110551'),
('admin', 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id_category` varchar(100) NOT NULL,
  `nameCate` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id_category`, `nameCate`) VALUES
('cate646675f22abb1', 'Polo'),
('cate6466764ad53a5', 'T-SHIRT'),
('cate6466765764b19', 'LEN'),
('cate6466968f23533', 'sơ mi'),
('cate646697a9b8bb0', 'Yếm'),
('cate646698259aab7', 'HOODIE');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_customer` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `birthday` varchar(100) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `id_account` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_customer`, `name`, `birthday`, `gender`, `address`, `phone`, `id_account`) VALUES
('cust646310780b814', 'cus123', '30-05-2023', 'Male', 'abcde', '0987654321', 'acct6463107809fd2'),
('empl646459cb66e10', '123', '02-05-2023', 'Male', '123', '0987654331', 'acct646459d938068');

-- --------------------------------------------------------

--
-- Table structure for table `group_roles`
--

CREATE TABLE `group_roles` (
  `id_group_roles` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `group_roles`
--

INSERT INTO `group_roles` (`id_group_roles`, `name`) VALUES
('admin', 'admin'),
('grup6463091469b90', 'Customer'),
('grup6464789110551', 'emp1');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id_invoice` varchar(100) NOT NULL,
  `create_date` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `sum_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id_invoice`, `create_date`, `status`, `sum_price`) VALUES
('invc64669c758e23f', '18-05-2023', 'accept', 6650000);

-- --------------------------------------------------------

--
-- Table structure for table `invoice_detail`
--

CREATE TABLE `invoice_detail` (
  `id_invoice` varchar(100) NOT NULL,
  `id_product` varchar(100) NOT NULL,
  `color` varchar(100) NOT NULL,
  `size` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `invoice_detail`
--

INSERT INTO `invoice_detail` (`id_invoice`, `id_product`, `color`, `size`, `quantity`, `price`) VALUES
('invc64669c758e23f', 'prod64668719598ec', 'đen', 'XL', 10, 350000),
('invc64669c758e23f', 'prod646694d361707', 'đen', 'M', 10, 315000);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id_order` varchar(100) NOT NULL,
  `id_customer` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `create_date` varchar(100) NOT NULL,
  `recieve_date` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id_order`, `id_customer`, `address`, `phone`, `create_date`, `recieve_date`, `status`) VALUES
('ordr64669c758e244', 'cust646310780b814', 'abcde', '0987654321', '18-05-2023', '25-05-2023', 'accept');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id_order` varchar(100) NOT NULL,
  `id_invoice` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id_order`, `id_invoice`) VALUES
('ordr64669c758e244', 'invc64669c758e23f');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id_product` varchar(100) NOT NULL,
  `nameProd` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `description` varchar(100) NOT NULL,
  `material` varchar(100) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `made_by` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `id_category` varchar(100) NOT NULL,
  `timeLabel` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id_product`, `nameProd`, `price`, `description`, `material`, `gender`, `made_by`, `status`, `id_category`, `timeLabel`) VALUES
('prod64668719598ec', 'Áo T-shirt ngắn tay Aristino', 350000, 'Thiết kế cổ tròn dệt rib dễ mặc. Họa tiết in chữ trước ngực mang đến cho người mặc diện mạo ấn tượng', 'Cotton', 'Male', 'Aristino', 'Hàng có sẵn', 'cate6466764ad53a5', '2081'),
('prod64668ce27c0b4', 'Áo polo nam cổ ngắn tay Aristino', 595000, 'Thiết kế basic với cổ dệt lịch sự kết hợp họa tiết những đường kẻ cách điệu trẻ trung, đem đến diện ', 'Cotton', 'Male', 'Aristino', 'Hàng có sẵn', 'cate646675f22abb1', '2146'),
('prod6466929abe85e', 'Áo Polo Nữ Cafe Phối Nẹp Siêu Nhẹ Siêu Mát', 350000, 'Áo nỉ dành cho nữ, ấm áp, mềm mại', 'Len', 'Female', 'Yody', 'Hàng có sẵn', 'cate6466765764b19', '2076'),
('prod646693491a947', 'Áo Polo nữ cafe phối đẹp ', 300000, 'Áo len nữ dệt gân dáng ôm với phần cổ tim nữ tính', 'Len', 'Female', 'Yody', 'Hàng có sẵn', 'cate646675f22abb1', '2074'),
('prod646694d361707', 'Áo sơ mi nam', 315000, 'Áo Sơ Mi Nam - Bestie - toát lên thể hiện năng lượng của đôi bạn thân luôn phóng khoáng và n', 'Kaki', 'Male', 'TODAY', 'Hàng có sẵn', 'cate6466968f23533', '2114'),
('prod64669679a4630', 'Áo sơ mi nữ', 250000, 'Sức hút vô tận từ những đường nét tinh tế và tỉ mĩ, áo sơ mi vừa trình làng nhà TOTODAY sẽ là \"best ', 'Cotton', 'Female', 'TODAY', 'Hàng có sẵn', 'cate6466968f23533', '2123'),
('prod6466980199c98', 'Yếm', 170000, 'Sức hút vô tận từ những đường nét tinh tế và tỉ mĩ', 'Jeans', 'Female', 'TODAY', 'Hàng có sẵn', 'cate646697a9b8bb0', '2102'),
('prod6466989015154', 'Áo Hoodie nữ', 300000, 'Đa dạng phong cách \"street style\" của các FRIENDs Girl với mẫu áo Hoodie mới của TOTODAY. Thiết kế s', 'Cotton', 'Female', 'TODAY', 'Hàng có sẵn', 'cate646698259aab7', '2127'),
('prod64669f997dbf0', 'test', 123, '123', '123', 'Male', '123', 'Hàng có sẵn', 'cate646675f22abb1', '2158');

-- --------------------------------------------------------

--
-- Table structure for table `product_detail`
--

CREATE TABLE `product_detail` (
  `id_product` varchar(100) NOT NULL,
  `color` varchar(50) NOT NULL,
  `size` varchar(10) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `quantity_purchased` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_detail`
--

INSERT INTO `product_detail` (`id_product`, `color`, `size`, `quantity`, `image`, `quantity_purchased`) VALUES
('prod64668719598ec', 'đen', 'XL', 40, 'tshirt1.jpg', 10),
('prod64668719598ec', 'trắng', 'M', 100, 'tshirt4.jpg', 0),
('prod64668719598ec', 'xanh', 'XXL', 100, 'tshirt6.jpg', 0),
('prod64668ce27c0b4', 'xanh', 'XL', 100, 'poloman2.jpg', 0),
('prod64668ce27c0b4', 'đỏ', 'M', 100, 'poloman3.jpg', 0),
('prod6466929abe85e', 'xanh', 'M', 100, 'polowomen4.jpg', 0),
('prod6466929abe85e', 'trắng', 'XL', 100, 'polowomen5.jpg', 0),
('prod6466929abe85e', 'hồng', 'XL', 100, 'polowomen7.jpg', 0),
('prod6466929abe85e', 'trắng', 'M', 100, 'polowomen5.jpg', 0),
('prod646693491a947', 'cam', 'S', 100, 'polowomen1.jpg', 0),
('prod646693491a947', 'trắng', 'M', 100, 'polowomen5.jpg', 0),
('prod646693491a947', 'trắng', 'XL', 100, 'polowomen5.jpg', 0),
('prod646693491a947', 'hồng', 'M', 100, 'polowomen7.jpg', 0),
('prod646694d361707', 'trắng', 'S', 100, 'somimen2.jpg', 0),
('prod646694d361707', 'trắng', 'M', 100, 'somimen2.jpg', 0),
('prod646694d361707', 'đen', 'M', 40, 'somimen1.jpg', 10),
('prod646694d361707', 'xanh', 'XL', 100, 'somimen3jpg.jpeg', 0),
('prod64669679a4630', 'trắng', 'M', 100, 'somiwomen1.jpg', 0),
('prod64669679a4630', 'trắng', 'XL', 100, 'somiwomen1.jpg', 0),
('prod64669679a4630', 'đen', 'XL', 100, 'somiwomen2.jpg', 0),
('prod64669679a4630', 'xanh', 'M', 100, 'somiwomen3.jpg', 0),
('prod6466980199c98', 'trắng', 'M', 100, 'yemwomen1.jpg', 0),
('prod6466980199c98', 'trắng', 'S', 100, 'yemwomen1.jpg', 0),
('prod6466989015154', 'hồng', 'S', 100, 'hoodiewomen1.jpg', 0),
('prod6466989015154', 'hồng', 'M', 100, 'hoodiewomen1.jpg', 0),
('prod6466989015154', 'xanh', 'XL', 100, 'hoodiewomen2.jpg', 0),
('prod6466989015154', 'xanh', 'XXL', 100, 'hoodiewomen2.jpg', 0),
('prod64669f997dbf0', '123', 'S', 123, 'N', 0);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `name`) VALUES
('1', 'ManageProduction'),
('10', 'Order'),
('11', 'ManageEmployee'),
('2', 'ManageCategory'),
('3', 'ManageType'),
('4', 'ManageInvoice'),
('5', 'ManageCustomer'),
('7', 'ManageGroupRole'),
('8', 'ManageOrder'),
('9', 'Cart');

-- --------------------------------------------------------

--
-- Table structure for table `role_in_group`
--

CREATE TABLE `role_in_group` (
  `id_role` varchar(100) NOT NULL,
  `id_group_role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role_in_group`
--

INSERT INTO `role_in_group` (`id_role`, `id_group_role`) VALUES
('9', 'grup6463091469b90'),
('10', 'grup6463091469b90'),
('4', 'grup6464789110551'),
('8', 'grup6464789110551'),
('1', 'admin'),
('2', 'admin'),
('3', 'admin'),
('4', 'admin'),
('5', 'admin'),
('7', 'admin'),
('8', 'admin'),
('11', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `type_product`
--

CREATE TABLE `type_product` (
  `id_type_product` varchar(100) NOT NULL,
  `nameType` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `type_product`
--

INSERT INTO `type_product` (`id_type_product`, `nameType`) VALUES
('type645c6da6bfacd', 'summer'),
('type645c6dae28358', 'spring'),
('type64627c83be2e2', 'zzz'),
('type64627c9c7b9c3', 'ggg'),
('type64627cce3b5c8', 'sss');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id_account`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`),
  ADD KEY `FK_customer_account` (`id_account`);

--
-- Indexes for table `group_roles`
--
ALTER TABLE `group_roles`
  ADD PRIMARY KEY (`id_group_roles`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id_invoice`);

--
-- Indexes for table `invoice_detail`
--
ALTER TABLE `invoice_detail`
  ADD KEY `FK_invoiceDetail_product` (`id_product`),
  ADD KEY `FK_invoiceDetail_invoice` (`id_invoice`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `FK_order_customer` (`id_customer`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD KEY `FK_orderDetail_order` (`id_order`),
  ADD KEY `FK_orderDetail_invoice` (`id_invoice`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `FK_product_category` (`id_category`);

--
-- Indexes for table `product_detail`
--
ALTER TABLE `product_detail`
  ADD KEY `FK_product_detail` (`id_product`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `role_in_group`
--
ALTER TABLE `role_in_group`
  ADD KEY `FK_roleInGroup_Role` (`id_role`),
  ADD KEY `FK_roleInGroup_groupRole` (`id_group_role`);

--
-- Indexes for table `type_product`
--
ALTER TABLE `type_product`
  ADD PRIMARY KEY (`id_type_product`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `FK_customer_account` FOREIGN KEY (`id_account`) REFERENCES `account` (`id_account`);

--
-- Constraints for table `invoice_detail`
--
ALTER TABLE `invoice_detail`
  ADD CONSTRAINT `FK_invoiceDetail_invoice` FOREIGN KEY (`id_invoice`) REFERENCES `invoice` (`id_invoice`),
  ADD CONSTRAINT `FK_invoiceDetail_product` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`);

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `FK_order_customer` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id_customer`);

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `FK_orderDetail_invoice` FOREIGN KEY (`id_invoice`) REFERENCES `invoice` (`id_invoice`),
  ADD CONSTRAINT `FK_orderDetail_order` FOREIGN KEY (`id_order`) REFERENCES `order` (`id_order`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK_product_category` FOREIGN KEY (`id_category`) REFERENCES `category` (`id_category`);

--
-- Constraints for table `product_detail`
--
ALTER TABLE `product_detail`
  ADD CONSTRAINT `FK_product_detail` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`);

--
-- Constraints for table `role_in_group`
--
ALTER TABLE `role_in_group`
  ADD CONSTRAINT `FK_roleInGroup_Role` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`),
  ADD CONSTRAINT `FK_roleInGroup_groupRole` FOREIGN KEY (`id_group_role`) REFERENCES `group_roles` (`id_group_roles`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
