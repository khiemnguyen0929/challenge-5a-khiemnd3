-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 08, 2024 lúc 05:50 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `khiemnd3_challenge5a`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `type` enum('student','teacher','admin') NOT NULL,
  `message` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`id`, `username`, `password`, `fullname`, `email`, `phone`, `type`, `message`) VALUES
(1, 'teacher1', '$2y$10$v8k1HMG12F540VaMgmMo9.fcOVUx6DNJbtnWUFlDISSQ5kKV72nL2', 'Hồ Anh Khoa', 'khoaah@gmail.com', '0853204121', 'admin', NULL),
(2, 'student1', '$2y$10$Q2w/O7TOsnDapS2OD5dEQ.fyaozkJ2xXJ2JVQEuLF9jsPeptm3D1W', 'Nguyễn Đình Khiêm', 'khiemnd3@gmail.com', '0853204122', 'student', NULL),
(3, 'teacher2', '$2y$10$pkCI8s/VY.PCqG6NsLhtMeeq1UzcxPSh1wVePeqlo2GHiH4ykLo2C', 'Nguyễn Tiến Phong', 'phongnt@gmail.com', '0853204123', 'teacher', NULL),
(4, 'student2', '$2y$10$jghoqlbm3AYN01C8MjirM.SGscxlX1jH0hpn3H/CFMPWL3tFazI.G', 'Ngô Bá Khá', 'khanb@gmail.com', '0853204124', 'student', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
