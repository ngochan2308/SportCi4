-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2024 at 08:30 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci4`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_contact`
--

CREATE TABLE `blog_contact` (
  `contact_id` int(11) NOT NULL,
  `contact_name` varchar(50) NOT NULL,
  `contact_email` varchar(100) NOT NULL,
  `contact_phone` varchar(50) NOT NULL,
  `contact_message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog_contact`
--

INSERT INTO `blog_contact` (`contact_id`, `contact_name`, `contact_email`, `contact_phone`, `contact_message`) VALUES
(59, 'Nguyễn Kim Ngọc Thích', 'ngochan20010823@gmail.com', '0912345678', 'Sản phẩm rất đẹp');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `MaTheLoai` int(11) NOT NULL,
  `TenTheLoai` varchar(50) NOT NULL,
  `HinhAnhTheLoai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`MaTheLoai`, `TenTheLoai`, `HinhAnhTheLoai`) VALUES
(1, 'BADMINTON', 'banner_bad.webp'),
(2, 'SHOE', 'banner_run.jpg'),
(3, 'GOLF', 'banner_golf.jpg'),
(4, 'SNOWBOARDING', 'banner_snow.jpg'),
(5, 'TENNIS', 'banner_tennis.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `MaChiTietHoaDon` int(11) NOT NULL,
  `MaHoaDon` int(11) DEFAULT NULL,
  `MaSP` int(11) DEFAULT NULL,
  `SoLuong` int(11) DEFAULT NULL,
  `DonGia` decimal(18,2) DEFAULT NULL,
  `ThanhTien` decimal(18,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chitiethoadon`
--

INSERT INTO `chitiethoadon` (`MaChiTietHoaDon`, `MaHoaDon`, `MaSP`, `SoLuong`, `DonGia`, `ThanhTien`) VALUES
(10, 14, 2, 1, 3500000.00, 3500000.00),
(11, 14, 8, 1, 3000000.00, 3000000.00),
(12, 14, 11, 1, 500000.00, 500000.00);

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE `hoadon` (
  `MaHoaDon` int(11) NOT NULL,
  `Fullname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `Phone` varchar(20) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `PhuongThucTT` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hoadon`
--

INSERT INTO `hoadon` (`MaHoaDon`, `Fullname`, `email`, `Phone`, `Address`, `PhuongThucTT`) VALUES
(14, 'Nguyễn Ngọc Lan', 'chuchu123@gmail.com', '9343485806', 'TP Ho Chi Minh', 'cast');

-- --------------------------------------------------------

--
-- Table structure for table `loaitaikhoan`
--

CREATE TABLE `loaitaikhoan` (
  `MaTaiKhoan` int(11) NOT NULL,
  `TenTaiKhoan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `loaitaikhoan`
--

INSERT INTO `loaitaikhoan` (`MaTaiKhoan`, `TenTaiKhoan`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `MaSP` int(11) NOT NULL,
  `TenSP` varchar(50) NOT NULL,
  `GiaSP` int(50) NOT NULL,
  `MoTaSP` varchar(50) NOT NULL,
  `SoLuongSP` int(11) NOT NULL,
  `HinhAnhSP` varchar(30) NOT NULL,
  `DacBiet` int(11) NOT NULL,
  `MaTheLoai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`MaSP`, `TenSP`, `GiaSP`, `MoTaSP`, `SoLuongSP`, `HinhAnhSP`, `DacBiet`, `MaTheLoai`) VALUES
(1, 'NANOFLARE NEXTAGE', 500000, 'Length 10 mm longer', 10, 'caulong1.webp', 1, 1),
(2, 'MAVIS 2000', 3500000, 'Length 10 mm longer', 10, 'caulong2.webp', 1, 1),
(3, 'NANOFLARE 001 ABILITY', 2500000, 'Length 10 mm longer', 10, 'caulong3.webp', 0, 1),
(4, 'MAVIS 3000', 3500000, 'Length 10 mm longer', 10, 'caulong4.webp', 0, 1),
(5, 'CARBON CRUISE AERUS MEN', 3000000, 'Material Durable Skin Light, msLITE X', 3, 'giay1.webp', 1, 2),
(6, 'SAFERUN 100X MEN', 2800000, 'Material Durable Skin Light, msLITE X', 10, 'giay2.webp', 1, 2),
(7, 'SAFERUN 200X WOMEN', 2500000, 'Material Durable Skin Light, msLITE X', 10, 'giay3.webp', 0, 2),
(8, 'SAFERUN AERUS WOMEN', 3000000, 'Material Durable Skin Light, msLITE X', 10, 'giay4.webp', 0, 2),
(9, 'SAFERUN FITJOG MEN', 4000000, 'Made In Japan', 10, 'golf1.webp', 1, 3),
(10, 'EZONE ELITE 4.0 IRON [MEN\'S]', 3200000, 'Made In France ', 10, 'golf2.webp', 1, 3),
(11, 'EZONE ELITE 4.0 PUTTER [MEN\'S]', 500000, 'Made In Germany ', 10, 'golf3.webp', 0, 3),
(12, 'EZONE P-01 PUTTER (Pin Type)', 3500000, 'Length 10 mm longer', 10, 'golf4.webp', 0, 3),
(13, 'ASTREL 100', 2400000, 'Weight 280 g / 9.9 oz', 10, 'tennis1.webp', 1, 5),
(14, 'OSAKA EZONE 98', 3500000, 'Weight 290 g / 10.1 oz', 10, 'tennis2.webp', 1, 5),
(15, 'PERCEPT 97D', 4000000, 'Weight 290 g / 10.1 oz', 10, 'tennis3.webp', 0, 5),
(16, 'PRO RACQUET BAG (9PCS)', 2800000, 'Weight 290 g / 10.1 oz', 10, 'tennis4.webp', 0, 5),
(43, 'ACHSE', 3500000, 'Structure	CENTROid', 10, 'tuyet1.webp', 1, 4),
(44, 'GROWENT', 4100000, 'Structure CENTROid', 10, 'tuyet2.webp', 1, 4),
(45, 'LUVARTH', 4000000, 'Structure Graphite ', 10, 'tuyet3.webp', 0, 4),
(46, 'REV', 4000000, 'Structure CSMC', 10, 'tuyet4.webp', 0, 4),
(58, 'ARCSABER 11 PRO', 4000000, 'Made in American', 10, 'caulong5.webp', 0, 1),
(59, 'ARCSABER 11 TOUR', 3000000, 'Structure	CENTROid', 10, 'caulong6.webp', 0, 1),
(60, 'NANOFLARE 70', 3000000, 'Structure	CENTROid', 10, 'caulong7.webp', 0, 1),
(61, 'EZONE TP PUTTERS TP-F1C', 3500000, 'Made In Japan', 10, 'golf5.webp', 0, 3),
(62, 'EZONE TP PUTTERS TP-GR2', 3500000, 'Made In Japan', 10, 'golf6.webp', 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `MaTaiKhoan` int(11) NOT NULL,
  `Fullname` varchar(100) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Phone` varchar(10) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Birthday` date NOT NULL,
  `HinhAnh` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`id`, `username`, `password`, `email`, `MaTaiKhoan`, `Fullname`, `Gender`, `Phone`, `Address`, `Birthday`, `HinhAnh`) VALUES
(45, 'admin123', 'e10adc3949ba59abbe56e057f20f883e', 'admin123@gmail.com', 1, 'TTNH', 'male', '0934348580', 'HCM', '2024-01-01', 'user2'),
(48, 'user', 'e10adc3949ba59abbe56e057f20f883e', 'user@gmail.com', 2, 'Nguyễn Văn Vũ', 'male', '0912345678', 'Bình Thuận', '2024-01-01', 'user4'),
(50, 'NgocLan01', 'e10adc3949ba59abbe56e057f20f883e', 'chuchu123@gmail.com', 2, 'Nguyễn Ngọc Lan', 'female', '9343485806', 'TP Ho Chi Minh', '2024-01-09', 'user3'),
(51, 'user123', 'e10adc3949ba59abbe56e057f20f883e', 'ngochan20010823@gmail.com', 2, 'Nguyễn Văn Bình', 'male', '0912345678', 'Bình Thuận', '2024-01-10', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog_contact`
--
ALTER TABLE `blog_contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`MaTheLoai`);

--
-- Indexes for table `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD PRIMARY KEY (`MaChiTietHoaDon`),
  ADD KEY `MaHoaDon` (`MaHoaDon`),
  ADD KEY `MaSP` (`MaSP`);

--
-- Indexes for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`MaHoaDon`);

--
-- Indexes for table `loaitaikhoan`
--
ALTER TABLE `loaitaikhoan`
  ADD PRIMARY KEY (`MaTaiKhoan`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`MaSP`),
  ADD KEY `fk_product_category` (`MaTheLoai`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Username` (`username`),
  ADD KEY `MaTaiKhoan` (`MaTaiKhoan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog_contact`
--
ALTER TABLE `blog_contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `MaTheLoai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  MODIFY `MaChiTietHoaDon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `MaHoaDon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `loaitaikhoan`
--
ALTER TABLE `loaitaikhoan`
  MODIFY `MaTaiKhoan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `MaSP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD CONSTRAINT `chitiethoadon_ibfk_1` FOREIGN KEY (`MaHoaDon`) REFERENCES `hoadon` (`MaHoaDon`),
  ADD CONSTRAINT `chitiethoadon_ibfk_2` FOREIGN KEY (`MaSP`) REFERENCES `product` (`MaSP`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_product_category` FOREIGN KEY (`MaTheLoai`) REFERENCES `category` (`MaTheLoai`),
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`MaTheLoai`) REFERENCES `category` (`MaTheLoai`);

--
-- Constraints for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD CONSTRAINT `taikhoan_ibfk_1` FOREIGN KEY (`MaTaiKhoan`) REFERENCES `loaitaikhoan` (`MaTaiKhoan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
