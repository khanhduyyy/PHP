-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 17, 2021 lúc 09:33 AM
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
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `AccountID` int(10) NOT NULL,
  `Username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `PrivilegeID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `CategoryID` int(10) NOT NULL,
  `Name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Description` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`CategoryID`, `Name`, `Description`) VALUES
(1, 'Giày Nam', ''),
(2, 'Giày Nữ', ''),
(3, 'Giày Trẻ Em', ''),
(4, 'Phụ kiện', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `CustomerID` int(10) NOT NULL,
  `AccountID` int(10) NOT NULL,
  `Password` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Fullname` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `Address` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `City` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `inventory`
--

CREATE TABLE `inventory` (
  `InventoryID` int(10) NOT NULL,
  `Name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `inventory`
--

INSERT INTO `inventory` (`InventoryID`, `Name`) VALUES
(1, 'Công ty Nike');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderdetail`
--

CREATE TABLE `orderdetail` (
  `OrderID` int(10) NOT NULL,
  `ProductID` int(10) NOT NULL,
  `Quantity` tinyint(4) NOT NULL,
  `Price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `OrderID` int(10) NOT NULL,
  `CustomerID` int(10) NOT NULL,
  `SellerID` int(10) NOT NULL,
  `Date` date NOT NULL,
  `Total` float NOT NULL,
  `Note` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `privilege`
--

CREATE TABLE `privilege` (
  `PrivilegeID` int(10) NOT NULL,
  `Name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `ProductID` int(10) NOT NULL,
  `CategoryID` int(10) NOT NULL,
  `InventoryID` int(10) NOT NULL,
  `ProductName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
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
(15, 2, 1, ' GIÀY ADIDAS QT Boost', 50, 'img_product/AdidasQTBoost.jpg', 1750000),
(16, 3, 1, ' GIÀY ADIDAS ĐEN TRẮNG', 50, 'img_product/Adidasdentreem.jpg', 1100000),
(17, 3, 1, 'GIÀY ADIDAS FORTARUN SUPERHERO ĐỎ', 50, 'img_product/AdidasFortaRunSuperHeroRed.jpg', 720000),
(18, 3, 1, 'GIÀY ADIDAS FORTARUN SUPERHERO XANH LÁ', 50, 'img_product/AdidasFortaRunSuperHeroGreen.jpg', 720000),
(19, 3, 1, 'GIÀY ADIDAS FORTARUN SUPERHERO XANH BIỂN', 50, 'img_product/AdidasFortaRunSuperHeroBlue.jpg', 720000),
(20, 4, 1, 'VỚ ADIDAS CAO ĐẾN CỔ CHÂN', 50, 'img_product/vo.jpg', 100000),
(21, 4, 1, 'TÚI ĐEO ADIDAS NHỎ\r\n', 50, 'img_product/tui.jpg', 350000),
(22, 4, 1, 'NÓN ADIDAS', 50, 'img_product/non.jpeg', 100000),
(23, 4, 1, 'TÚI ADIDAS ESSENTIAL CLASSIC', 50, 'img_product/tui1.jpg', 100000),
(24, 4, 1, 'TÚI ADIDAS ESSENTIAL CROSSBODY', 50, 'img_product/tui2.jpg', 400000),
(25, 4, 1, 'TÚI ADIDAS ESSENTIAL CROSSBODY', 50, 'img_product/tui3.jpg', 400000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `seller`
--

CREATE TABLE `seller` (
  `SellerID` int(10) NOT NULL,
  `AccountID` int(10) NOT NULL,
  `Name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Phone` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `Salary` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`AccountID`),
  ADD KEY `PrivilegeID` (`PrivilegeID`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`CustomerID`),
  ADD KEY `AccountID` (`AccountID`);

--
-- Chỉ mục cho bảng `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`InventoryID`);

--
-- Chỉ mục cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD KEY `OrderID` (`OrderID`),
  ADD KEY `VegetableID` (`ProductID`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `CustomerID` (`CustomerID`),
  ADD KEY `SellerID` (`SellerID`);

--
-- Chỉ mục cho bảng `privilege`
--
ALTER TABLE `privilege`
  ADD PRIMARY KEY (`PrivilegeID`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductID`),
  ADD KEY `CategoryID` (`CategoryID`),
  ADD KEY `InventoryID` (`InventoryID`);

--
-- Chỉ mục cho bảng `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`SellerID`),
  ADD KEY `AccountID` (`AccountID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `account`
--
ALTER TABLE `account`
  MODIFY `AccountID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `inventory`
--
ALTER TABLE `inventory`
  MODIFY `InventoryID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `privilege`
--
ALTER TABLE `privilege`
  MODIFY `PrivilegeID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `seller`
--
ALTER TABLE `seller`
  MODIFY `SellerID` int(10) NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_ibfk_1` FOREIGN KEY (`PrivilegeID`) REFERENCES `privilege` (`PrivilegeID`);

--
-- Các ràng buộc cho bảng `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_ibfk_1` FOREIGN KEY (`AccountID`) REFERENCES `account` (`AccountID`);

--
-- Các ràng buộc cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD CONSTRAINT `orderdetail_ibfk_1` FOREIGN KEY (`OrderID`) REFERENCES `orders` (`OrderID`),
  ADD CONSTRAINT `orderdetail_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `product` (`ProductID`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `customers` (`CustomerID`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`SellerID`) REFERENCES `seller` (`SellerID`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`CategoryID`) REFERENCES `category` (`CategoryID`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`InventoryID`) REFERENCES `inventory` (`InventoryID`);

--
-- Các ràng buộc cho bảng `seller`
--
ALTER TABLE `seller`
  ADD CONSTRAINT `seller_ibfk_1` FOREIGN KEY (`AccountID`) REFERENCES `account` (`AccountID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
