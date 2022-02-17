-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th2 17, 2022 lúc 04:59 PM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ct466`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `ad_id` int(255) NOT NULL,
  `ad_email` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi_tiet_hoa_don`
--

CREATE TABLE `chi_tiet_hoa_don` (
  `cthd_soluong` int(11) NOT NULL,
  `cthd_gia` float NOT NULL,
  `cthd_idsp` int(255) NOT NULL,
  `cthd_idhd` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danh_gia`
--

CREATE TABLE `danh_gia` (
  `dg_id` int(255) NOT NULL,
  `dg_email` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danh_muc`
--

CREATE TABLE `danh_muc` (
  `dm_id` int(255) NOT NULL,
  `dm_ten` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `danh_muc`
--

INSERT INTO `danh_muc` (`dm_id`, `dm_ten`) VALUES
(1, 'thử 1'),
(3, 'thử 2'),
(5, 'Sách Thiếu Nhi'),
(6, 'Văn Học'),
(7, 'Kinh Tế'),
(8, 'Kỹ Năng Sống'),
(9, 'Tiểu Sử - Hồi Ký'),
(10, 'Nuôi Dạy Con'),
(11, 'Sách Ngoại Ngữ'),
(12, 'Sách Tham Khảo');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dia_chi`
--

CREATE TABLE `dia_chi` (
  `dc_id` int(255) NOT NULL,
  `dc_idkh` int(255) NOT NULL,
  `dc_hoten` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `dc_sdt` int(255) NOT NULL,
  `dc_diachi` varchar(500) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoa_don`
--

CREATE TABLE `hoa_don` (
  `hd_id` int(255) NOT NULL,
  `hd_idkh` int(255) NOT NULL,
  `hd_tongtiendonhang` float NOT NULL,
  `hd_trangthai` int(255) NOT NULL,
  `hd_thoigianlapdonhang` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khach_hang`
--

CREATE TABLE `khach_hang` (
  `kh_id` int(255) NOT NULL,
  `kh_ten` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `kh_email` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `kh_matkhau` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `khach_hang`
--

INSERT INTO `khach_hang` (`kh_id`, `kh_ten`, `kh_email`, `kh_matkhau`) VALUES
(1, 'Quỳnh Hương', 'qh123@gmail.com', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ngon_ngu`
--

CREATE TABLE `ngon_ngu` (
  `nn_id` int(255) NOT NULL,
  `nn_ngonngu` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `ngon_ngu`
--

INSERT INTO `ngon_ngu` (`nn_id`, `nn_ngonngu`) VALUES
(3, 'Tiếng Anh'),
(4, 'Tiếng Nhật'),
(6, 'Tiếng Trung Quốc'),
(10, 'tienh phap'),
(11, 'Tiếng Việt');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nha_cung_cap`
--

CREATE TABLE `nha_cung_cap` (
  `ncc_id` int(255) NOT NULL,
  `ncc_ten` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `ncc_sdt` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `ncc_diachi` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `nha_cung_cap`
--

INSERT INTO `nha_cung_cap` (`ncc_id`, `ncc_ten`, `ncc_sdt`, `ncc_diachi`) VALUES
(1, 'NCC A1', '001', 'A- CT'),
(3, 'Skybooks', '024 3843 8220', 'Số 83 Lý Nam Đế, Phường Cửa Đông');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nha_xuat_ban`
--

CREATE TABLE `nha_xuat_ban` (
  `nxb_id` int(255) NOT NULL,
  `nxb_ten` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `nxb_sdt` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `nxb_diachi` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `nha_xuat_ban`
--

INSERT INTO `nha_xuat_ban` (`nxb_id`, `nxb_ten`, `nxb_sdt`, `nxb_diachi`) VALUES
(1, 'NXB AA', '1234567809', 'Đường A11- Cần Thơ'),
(2, 'NXB Dân Trí', '303265974', '18 Nguyễn Trường Tộ - Ba Đình - Hà Nội'),
(3, 'NXB Phụ Nữ Việt Nam', '326015459', 'Phòng 501, Nhà Điều hành ĐHQG-HCM, phường Linh Trung, quận Thủ Đức, TP Hồ Chí Minh'),
(5, 'Nhà Xuất Bản Kim Đồng', '1900571595', 'Số 55 Quang Trung, Nguyễn Du, Hai Bà Trưng, Hà Nội'),
(6, 'NXB Dân Trí', '(024).66860753', 'Số 9, ngõ 26, phố Hoàng Cầu, phường Ô Chợ Dừa, quận Đống Đa, Hà Nội'),
(7, 'NXB Phụ Nữ Việt Nam', '(024) 39710717', '39 Hàng Chuối, Q. Hai Bà Trưng, Hà Nội');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `sp_id` int(255) NOT NULL,
  `sp_idtheloai` int(255) NOT NULL,
  `sp_idnxb` int(255) NOT NULL,
  `sp_idnn` int(255) NOT NULL,
  `sp_idncc` int(255) NOT NULL,
  `sp_idtg` int(255) NOT NULL,
  `sp_tensach` varchar(500) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `sp_gia` float NOT NULL,
  `sp_hinhanh` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `sp_mota` varchar(500) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `sp_soluong` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`sp_id`, `sp_idtheloai`, `sp_idnxb`, `sp_idnn`, `sp_idncc`, `sp_idtg`, `sp_tensach`, `sp_gia`, `sp_hinhanh`, `sp_mota`, `sp_soluong`) VALUES
(5, 2, 2, 3, 1, 2, 'Butter', 46000, '../../img/bookimg/z3071384178511_32bba77229dc165be92a640b2f903b8b.jpg', 'bbb', 136),
(7, 2, 2, 6, 1, 3, 'We are Bulletproof ', 123000, '../../img/bookimg/bia1_tobinhyen_2_1_1.jpg', 'vd2', 120),
(11, 2, 3, 4, 1, 2, 'Butter', 520000, '../../img/bookimg/Box_dang_hinh_thanh_am.jpg', 'rh', 4),
(12, 5, 3, 11, 3, 6, 'Vui Vẻ Không Quạu Nha (Tái Bản 2021)', 65000, '../../img/bookimg/vuivekhongquao.jpg', 'Cuộc đời ngày ngày nói yêu mình. Xong cuộc đời lại đủ thứ phức tạp và bất công với mình. Vậy là cuộc đời ghét mình rồi! Thôi nào! Thả lỏng và tận hưởng sự vui vẻ đi. Vì chẳng phải cuộc đời đang ghét bạn đâu, mà chính bạn bạn đang loay hoay với những mệt nhọc ở trên đời. Ví dụ như nay đã là deadline mà bỗng bị rớt mạng, sáng nay đi làm quên đem theo ví, hay đồng nghiệp ở công ty nói xấu mình,... Nếu kể ra thì sẽ có ti tỉ thứ khôn', 100);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tac_gia`
--

CREATE TABLE `tac_gia` (
  `tg_id` int(255) NOT NULL,
  `tg_hoten` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `tg_diachi` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `tac_gia`
--

INSERT INTO `tac_gia` (`tg_id`, `tg_hoten`, `tg_diachi`) VALUES
(2, 'Kim TaeHyung', 'Deagu'),
(3, 'JeiKei', 'Busan'),
(5, 'abc', NULL),
(6, 'Ở Đây Zui Nè', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `the_loai`
--

CREATE TABLE `the_loai` (
  `tl_id` int(255) NOT NULL,
  `tl_iddm` int(255) NOT NULL,
  `tl_tentheloai` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `the_loai`
--

INSERT INTO `the_loai` (`tl_id`, `tl_iddm`, `tl_tentheloai`) VALUES
(2, 1, 'noah'),
(3, 3, 'Light Novel'),
(4, 1, 'Du Lịch'),
(5, 6, 'Truyện Ngắn - Tản Văn'),
(6, 6, 'Tiểu Thuyết'),
(7, 6, 'Ngôn Tình'),
(8, 6, 'Light Novel'),
(9, 7, 'Nhân Vật - Bài Học Kinh Doanh'),
(10, 8, 'Tâm Lý'),
(11, 9, 'Câu Truyện Cuộc Đời'),
(12, 10, 'Phương Pháp Giáo Dục Trẻ'),
(13, 5, 'Kiến Thức Bách Khoa'),
(14, 11, 'Tiếng Anh'),
(15, 12, 'Sách Giáo Khoa');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ad_id`);

--
-- Chỉ mục cho bảng `chi_tiet_hoa_don`
--
ALTER TABLE `chi_tiet_hoa_don`
  ADD KEY `cthd_idsp` (`cthd_idsp`),
  ADD KEY `cthd_idhd` (`cthd_idhd`);

--
-- Chỉ mục cho bảng `danh_gia`
--
ALTER TABLE `danh_gia`
  ADD PRIMARY KEY (`dg_id`);

--
-- Chỉ mục cho bảng `danh_muc`
--
ALTER TABLE `danh_muc`
  ADD PRIMARY KEY (`dm_id`);

--
-- Chỉ mục cho bảng `dia_chi`
--
ALTER TABLE `dia_chi`
  ADD PRIMARY KEY (`dc_id`),
  ADD KEY `dc_idkh` (`dc_idkh`);

--
-- Chỉ mục cho bảng `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD PRIMARY KEY (`hd_id`),
  ADD KEY `hd_idkh` (`hd_idkh`);

--
-- Chỉ mục cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`kh_id`);

--
-- Chỉ mục cho bảng `ngon_ngu`
--
ALTER TABLE `ngon_ngu`
  ADD PRIMARY KEY (`nn_id`);

--
-- Chỉ mục cho bảng `nha_cung_cap`
--
ALTER TABLE `nha_cung_cap`
  ADD PRIMARY KEY (`ncc_id`);

--
-- Chỉ mục cho bảng `nha_xuat_ban`
--
ALTER TABLE `nha_xuat_ban`
  ADD PRIMARY KEY (`nxb_id`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`sp_id`),
  ADD KEY `sp_idtheloai` (`sp_idtheloai`),
  ADD KEY `sp_idnxb` (`sp_idnxb`),
  ADD KEY `sp_idnn` (`sp_idnn`),
  ADD KEY `sp_idncc` (`sp_idncc`),
  ADD KEY `sp_idtg` (`sp_idtg`);

--
-- Chỉ mục cho bảng `tac_gia`
--
ALTER TABLE `tac_gia`
  ADD PRIMARY KEY (`tg_id`);

--
-- Chỉ mục cho bảng `the_loai`
--
ALTER TABLE `the_loai`
  ADD PRIMARY KEY (`tl_id`),
  ADD KEY `tl_iddm` (`tl_iddm`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `ad_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `danh_gia`
--
ALTER TABLE `danh_gia`
  MODIFY `dg_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `danh_muc`
--
ALTER TABLE `danh_muc`
  MODIFY `dm_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `dia_chi`
--
ALTER TABLE `dia_chi`
  MODIFY `dc_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `hoa_don`
--
ALTER TABLE `hoa_don`
  MODIFY `hd_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  MODIFY `kh_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `ngon_ngu`
--
ALTER TABLE `ngon_ngu`
  MODIFY `nn_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `nha_cung_cap`
--
ALTER TABLE `nha_cung_cap`
  MODIFY `ncc_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `nha_xuat_ban`
--
ALTER TABLE `nha_xuat_ban`
  MODIFY `nxb_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `sp_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `tac_gia`
--
ALTER TABLE `tac_gia`
  MODIFY `tg_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `the_loai`
--
ALTER TABLE `the_loai`
  MODIFY `tl_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chi_tiet_hoa_don`
--
ALTER TABLE `chi_tiet_hoa_don`
  ADD CONSTRAINT `chi_tiet_hoa_don_ibfk_1` FOREIGN KEY (`cthd_idsp`) REFERENCES `sanpham` (`sp_id`),
  ADD CONSTRAINT `chi_tiet_hoa_don_ibfk_2` FOREIGN KEY (`cthd_idhd`) REFERENCES `hoa_don` (`hd_id`);

--
-- Các ràng buộc cho bảng `dia_chi`
--
ALTER TABLE `dia_chi`
  ADD CONSTRAINT `dia_chi_ibfk_1` FOREIGN KEY (`dc_idkh`) REFERENCES `khach_hang` (`kh_id`);

--
-- Các ràng buộc cho bảng `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD CONSTRAINT `hoa_don_ibfk_1` FOREIGN KEY (`hd_idkh`) REFERENCES `khach_hang` (`kh_id`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`sp_idtheloai`) REFERENCES `the_loai` (`tl_id`),
  ADD CONSTRAINT `sanpham_ibfk_2` FOREIGN KEY (`sp_idnxb`) REFERENCES `nha_xuat_ban` (`nxb_id`),
  ADD CONSTRAINT `sanpham_ibfk_3` FOREIGN KEY (`sp_idnn`) REFERENCES `ngon_ngu` (`nn_id`),
  ADD CONSTRAINT `sanpham_ibfk_4` FOREIGN KEY (`sp_idncc`) REFERENCES `nha_cung_cap` (`ncc_id`),
  ADD CONSTRAINT `sanpham_ibfk_5` FOREIGN KEY (`sp_idtg`) REFERENCES `tac_gia` (`tg_id`);

--
-- Các ràng buộc cho bảng `the_loai`
--
ALTER TABLE `the_loai`
  ADD CONSTRAINT `the_loai_ibfk_1` FOREIGN KEY (`tl_iddm`) REFERENCES `danh_muc` (`dm_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
