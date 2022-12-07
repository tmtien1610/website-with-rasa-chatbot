-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 30, 2022 lúc 03:06 PM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `nln_mt`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ctdt`
--

CREATE TABLE `ctdt` (
  `ID` varchar(20) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `CTDT` varchar(255) NOT NULL,
  `KHHT` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `ctdt`
--

INSERT INTO `ctdt` (`ID`, `Name`, `CTDT`, `KHHT`) VALUES
('ATTT', 'An toàn thông tin', 'CTDT_ATTT.pdf', 'KHHT_ATTT.pdf'),
('CNTT', 'Công Nghệ Thông Tin', 'CTDT_CNTT.pdf', 'KHHT_CNTT.pdf'),
('CNTTCLC', 'Công nghệ thông tin chất lượng cao', 'CTDT_CNTTCLC.pdf', 'KHHT_CNTTCLC.pdf'),
('HTTT', 'Hệ thống thông tin', 'CTDT_HTTT.pdf', 'KHHT_HTTT.pdf'),
('KHMT', 'Khoa học máy tính', 'CTDT_KHMT.pdf', 'KHHT_KHMT.pdf'),
('KHMTCLC', 'Khoa Học Máy Tính Chất Lượng cao', 'NLN_TrinhMinhTien_B1812311.pdf', 'NLN_TrinhMinhTien_B1812311.pdf'),
('KTPM', 'Kĩ thuật phần mềm', 'CTDT_KTPM.pdf', 'KHHT_KTPM.pdf'),
('KTPMCLC', 'Kĩ thuật phần mềm chất lượng cao', 'CTDT_KTPMCLC.pdf', 'KHHT_KTPMCLC.pdf'),
('MMTTTDL', 'Mạng máy tính và truyền thông dữ liệu', 'CTDT_MMTTTDL.pdf', 'KHHT_MMTTTDL.pdf'),
('TTDPT', 'Truyền thông đa phương tiện', 'CTDT_TTDPT.pdf', 'KHHT_TTDPT.pdf');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pages`
--

CREATE TABLE `pages` (
  `ID` varchar(20) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Dir_name` varchar(50) NOT NULL,
  `on_nav` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `pages`
--

INSERT INTO `pages` (`ID`, `Name`, `Dir_name`, `on_nav`) VALUES
('AGT', 'Giới Thiệu', 'gioi-thieu', 1),
('DT', 'Đào Tạo', 'dao-tao', 1),
('PTXT', 'Phương thức xét tuyển', 'ptxt', 1),
('PTXT1', 'Phương thức xét tuyển 1', 'ptxt1', 0),
('PTXT2', 'Phương thức xét tuyển 2', 'ptxt2', 0),
('PTXT3', 'Phương thức xét tuyển 3 ', 'ptxt3', 0),
('PTXT4', 'Phương thức xét tuyển 4', 'ptxt4', 0),
('PTXT5', 'Phương thức xét tuyển 5', 'ptxt5', 0),
('PTXT6', 'Phương thức xét tuyển 6 ', 'ptxt6', 0),
('TTTS', 'Thông tin tuyển sinh', 'ttts', 1),
('TTTSATTT', 'Thông tin tuyển sinh ngành An toàn thông tin', 'tttsattt', 0),
('TTTSCNTT', 'Thông tin tuyển sinh ngành Công nghệ thông tin', 'ttts_cntt', 0),
('TTTSCNTTCLC', 'Thông tin tuyển sinh ngành Công nghệ thông tin chất lượng cao', 'tttscnttclc', 0),
('TTTSHTTT', 'Thông tin tuyển sinh ngành Hệ thống thông tin', 'tttshttt', 0),
('TTTSKHMT', 'Thông tin tuyển sinh ngành Khoa học máy tính', 'tttskhmt', 0),
('TTTSKTMT', 'Thông tin tuyển sinh ngành Kĩ thuật máy tính', 'tttsktmt', 0),
('TTTSKTPM', 'Thông tin tuyển sinh ngành Kĩ thuật phần mềm', 'tttsktpm', 0),
('TTTSKTPMCLC', 'Thông tin tuyển sinh Kĩ thuật phần mềm chất lượng cao', 'tttsktpmclc', 0),
('TTTSMMTTTDL', 'Thông tin tuyển sinh ngành Mạng máy tính và truyền thông dữ liệu', 'tttsmmtttdl', 0),
('TTTSTTDPT', 'Thông tin tuyển sinh ngành Truyền thông đa phương tiện', 'tttsttdpt', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `ctdt`
--
ALTER TABLE `ctdt`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Dir_name` (`Dir_name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
