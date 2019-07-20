-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 20, 2019 lúc 01:10 PM
-- Phiên bản máy phục vụ: 10.1.40-MariaDB
-- Phiên bản PHP: 7.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `19php01_mvc_basic`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `avatar`) VALUES
(26, 'Mai', '4d7474478fc6fdf773f8b09bacc92f33', '5d2d4204de0b0_56957729_439031690175080_523952221604282368_n.jpg'),
(31, 'admin', '1b2b1c1b9a4f61971e9332ba3772cdd8', '5d2d498588098_56957729_439031690175080_523952221604282368_n.jpg'),
(35, 'Admin', 'b984c27be5af11095e0e4e66725791f9', '5d317a415d4f7_[Fancam] Jimin &#064;Hongdae fansign Mèo... mèo tam... - VMinKook-BTS Vietnamese Fanpage.mp4'),
(36, 'giang222', '8ae8862ffce3f6caf76211eaed2ab88e', 'default.jpg'),
(37, 'giang', 'ed2b1f468c5f915f3f1cf75d7068baae', 'default.jpg'),
(38, 'giang', 'ed2b1f468c5f915f3f1cf75d7068baae', 'default.jpg'),
(39, 'adnub', '6f20179784bf6f15e9fdc403ab81a6a1', 'default.jpg'),
(40, 'giang', 'ed2b1f468c5f915f3f1cf75d7068baae', '');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
