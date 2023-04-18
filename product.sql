-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 16, 2021 lúc 04:57 PM
-- Phiên bản máy phục vụ: 10.1.38-MariaDB
-- Phiên bản PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `cuahangtrangsuc`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `ProductID` int(10) NOT NULL,
  `CategoryID` int(10) NOT NULL,
  `InventoryID` int(10) NOT NULL,
  `ProductName` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Amount` int(10) NOT NULL,
  `Image` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`ProductID`, `CategoryID`, `InventoryID`, `ProductName`, `Amount`, `Image`, `Price`) VALUES
(1, 1, 1, ' GIÀY ADIDAS EQT SUPPORT ADV', 50, 'img_product/AdidasEQT.jpg', 21000000),
(2, 1, 1, ' GIÀY ADIDAS PROPHERE', 50, 'img_product/AdidasProphere.jpg', 2400000),
(3, 1, 1, 'GIÀY ADIDAS XPLR', 50, 'img_product/AdidasXPLRWhite.jpg', 1350000),
(4, 1, 1, 'GIÀY ADIDAS YEEZY', 50, 'img_product/Adidasyeezy.jpeg', 20000000),
(5, 1, 1, 'GIÀY ADIDAS STANSMITH', 50, 'img_product/AdidasStanSmith.jpg', 1900000),
(6, 1, 1, 'GIÀY ADIDAS ULTRABOOST', 50, 'img_product/AdidasUltraboost.jpg', 2500000),
(7, 1, 1, 'GIÀY ADIDAS U PATH', 50, 'img_product/AdidasU_PATH.jpg', 2400000),
(8, 1, 1, 'GIÀY ADIDAS ULTRABOOTS 5.0', 50, 'img_product/AdidasULTRA5.0.jpg', 2600000),
(9, 2, 1, 'GIÀY ADIDAS NEO PINK', 50, 'img_product/AdidasPink.jpg', 1700000),
(10, 2, 1, 'GIÀY ADIDAS ORIGINALS PINK', 50, 'img_product/AdidasOriginals.jpg', 14000000),
(11, 2, 1, 'GIÀY ADIDAS OZWEEGO', 50, 'img_product/AdidasOZWEEGO.jpg', 2480000),
(12, 2, 1, 'GIÀY ADIDAS SUPERSTAR', 50, 'img_product/AdidasSUPERSTAR.jpg', 1500000),
(13, 2, 1, 'GIÀY ADIDAS SI 7000', 50, 'img_product/AdidasSI7000.jpg', 6000000),
(14, 2, 1, 'GIÀY ADIDAS YUNG-96', 50, 'img_product/AdidasYung-96.jpg', 3000000),
(15, 2, 1, ' GIÀY ADIDAS QT Boost', 50, 'img_product/AdidasQTBoost.jpg', 1750000);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductID`),
  ADD KEY `CategoryID` (`CategoryID`),
  ADD KEY `InventoryID` (`InventoryID`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`CategoryID`) REFERENCES `category` (`CategoryID`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`InventoryID`) REFERENCES `inventory` (`InventoryID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
