-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 11, 2022 lúc 12:27 PM
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
-- Cơ sở dữ liệu: `do_an`
--

-- --------------------------------------------------------

--
-- Cấu trúc đóng vai cho view `sanphambanchay`
-- (See below for the actual view)
--
CREATE TABLE `sanphambanchay` (
`soluong` bigint(21)
,`MaSanPham` int(11)
);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_chitietdonhang`
--

CREATE TABLE `tbl_chitietdonhang` (
  `MaCTDH` int(11) NOT NULL,
  `MaDonHang` int(11) NOT NULL,
  `TenNguoiNhan` varchar(150) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `SDTNguoiNhan` varchar(10) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `GhiChu` varchar(150) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `MaSanPham` int(11) NOT NULL,
  `SoLuongSP` int(11) NOT NULL,
  `SizeSanPham` int(11) DEFAULT NULL,
  `DiaChiNguoiNhan` varchar(150) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_chitietdonhang`
--

INSERT INTO `tbl_chitietdonhang` (`MaCTDH`, `MaDonHang`, `TenNguoiNhan`, `SDTNguoiNhan`, `GhiChu`, `MaSanPham`, `SoLuongSP`, `SizeSanPham`, `DiaChiNguoiNhan`) VALUES
(28, 36, '', '', '', 3, 1, NULL, ''),
(29, 36, '', '', '', 4, 1, NULL, ''),
(30, 37, '', '', '', 3, 1, 1, ''),
(31, 37, '', '', '', 4, 1, NULL, ''),
(32, 38, '', '', '', 23, 1, NULL, ''),
(33, 39, '', '', '', 3, 2, NULL, ''),
(34, 39, '', '', '', 4, 1, NULL, ''),
(35, 40, 'Trường Thái Lam', '0905040861', '11', 11, 9, NULL, '92 đào duy từ'),
(36, 40, 'Trường Thái Lam', '0905040861', '11', 43, 1, NULL, '92 đào duy từ'),
(37, 40, 'Trường Thái Lam', '0905040861', '11', 9, 1, NULL, '92 đào duy từ'),
(38, 41, 'Truong', '0905040861', '', 4, 5, NULL, '123'),
(39, 41, 'Truong', '0905040861', '', 23, 1, NULL, '123'),
(40, 41, 'Truong', '0905040861', '', 63, 4, NULL, '123'),
(41, 41, 'Truong', '0905040861', '', 2, 2, NULL, '123'),
(42, 41, 'Truong', '0905040861', '', 34, 1, NULL, '123'),
(43, 41, 'Truong', '0905040861', '', 5, 2, NULL, '123'),
(44, 41, 'Truong', '0905040861', '', 2, 1, NULL, '123');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_donhang`
--

CREATE TABLE `tbl_donhang` (
  `MaDonHang` int(11) NOT NULL,
  `MaKhachHang` int(11) NOT NULL,
  `NgayDat` date NOT NULL DEFAULT current_timestamp(),
  `TongTien` int(50) NOT NULL,
  `TrangThai` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_donhang`
--

INSERT INTO `tbl_donhang` (`MaDonHang`, `MaKhachHang`, `NgayDat`, `TongTien`, `TrangThai`) VALUES
(36, 1, '2022-04-01', 4880000, 3),
(37, 1, '2022-04-01', 4880000, 2),
(38, 1, '2022-04-01', 1700000, 4),
(39, 1, '2022-04-02', 7170000, 1),
(40, 1, '2022-04-03', 29110000, 1),
(41, 1, '2022-04-04', 37150000, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_giohang`
--

CREATE TABLE `tbl_giohang` (
  `id` varchar(150) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `MaKhachHang` int(11) DEFAULT NULL,
  `MaSanPham` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `MaGioHang` int(11) NOT NULL,
  `created_at` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_giohang`
--

INSERT INTO `tbl_giohang` (`id`, `MaKhachHang`, `MaSanPham`, `SoLuong`, `MaGioHang`, `created_at`) VALUES
(NULL, 1, 7, 1, 143, '2022-04-05'),
(NULL, 1, 3, 1, 145, '2022-04-06'),
(NULL, 1, 4, 1, 146, '2022-04-06'),
(NULL, 1, 4, 1, 147, '2022-04-06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_khachhang`
--

CREATE TABLE `tbl_khachhang` (
  `MaKhachHang` int(11) NOT NULL,
  `TenKhachHang` varchar(150) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `SDT` varchar(10) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `DiaChi` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `TenDangNhap` varchar(150) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `MatKhau` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `NgaySinh` date DEFAULT NULL,
  `Email` varchar(150) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `TrangThai` varchar(50) COLLATE utf8mb4_unicode_520_ci DEFAULT 'Active',
  `VaiTro` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_khachhang`
--

INSERT INTO `tbl_khachhang` (`MaKhachHang`, `TenKhachHang`, `SDT`, `DiaChi`, `TenDangNhap`, `MatKhau`, `NgaySinh`, `Email`, `TrangThai`, `VaiTro`) VALUES
(1, 'Thai Lam Truong', '0905040861', 'ạdfhfkkdlk', 'lamtruong14', 'ff14a9faa64f86c0c4c3b0fd2751ab3f', '2022-03-02', 'thailamtruong@gmail.com', 'Active', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_loaisanpham`
--

CREATE TABLE `tbl_loaisanpham` (
  `MaLoai` int(11) NOT NULL,
  `TenLoai` varchar(150) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `HinhAnh` text COLLATE utf8mb4_unicode_520_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_loaisanpham`
--

INSERT INTO `tbl_loaisanpham` (`MaLoai`, `TenLoai`, `HinhAnh`) VALUES
(1, 'ADIDAS', NULL),
(2, 'NIKE', NULL),
(3, 'CONVERSE', NULL),
(4, 'VANS', NULL),
(6, 'ASICS', NULL),
(7, 'BITIS', NULL),
(8, 'PUMA', NULL),
(10, 'ANANAS', NULL),
(11, 'NEW BALANCE', NULL),
(13, 'FILA', NULL),
(14, 'REEBOK', NULL),
(15, 'RieVenan', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_quantri`
--

CREATE TABLE `tbl_quantri` (
  `MaQuanTri` int(11) NOT NULL,
  `TenDangNhap` varchar(150) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `MatKhau` varchar(150) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `TenNguoiQuanTri` varchar(150) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `Email` varchar(150) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `TrangThai` varchar(50) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `MaVaiTro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_sanpham`
--

CREATE TABLE `tbl_sanpham` (
  `MaSanPham` int(11) NOT NULL,
  `TenSanPham` varchar(150) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `HinhAnhSanPham` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `SoLuongSanPham` int(10) NOT NULL,
  `MoTaSanPham` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `GiaSanPham` int(50) NOT NULL,
  `TrangThaiSanPham` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `GiamGia` int(10) DEFAULT 0,
  `created_at` date DEFAULT current_timestamp(),
  `updated_at` date DEFAULT current_timestamp(),
  `LoaiSanPham` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_sanpham`
--

INSERT INTO `tbl_sanpham` (`MaSanPham`, `TenSanPham`, `HinhAnhSanPham`, `SoLuongSanPham`, `MoTaSanPham`, `GiaSanPham`, `TrangThaiSanPham`, `GiamGia`, `created_at`, `updated_at`, `LoaiSanPham`) VALUES
(2, 'NIKE AIR MAX 90 ORANGE BLUE', '1588063932.jpg', 10, 'Goood', 3600000, '1', 10, '2022-03-22', '2022-03-22', 2),
(3, 'ADIDAS CONTINENTAL 80 BLACK RED', '1588063992.jpg', 10, 'Gooood', 2290000, '1', 20, '2022-03-22', '2022-03-22', 1),
(4, 'ADIDAS ALPHABOOST PARLEY BLACK', '1588064018.jpg', 9, 'OKEYYs', 2590000, '1', 30, '2022-03-22', '2022-03-22', 1),
(5, 'CONVERSE CHUCK TAYLOR CLASSIC BLACK', '1588064044.jpg', 10, 'Là một trong những thương hiệu giày hàng đầu thế giới về loại giày sneaker với nhiều tính năng phù hợp cho cả nam và nữ tại Việt Nam.', 1500000, '1', 40, '2022-03-22', '2022-03-22', 3),
(6, 'ssCONVERSE CHUCK TAYLOR CLASSIC NAVY', '1588064069.jpg', 10, 'Okeyyy', 1330000, '1', 50, '2022-03-22', '2022-03-22', 3),
(7, 'VANS OLD SKOOL BLACK', '1588064102.jpg', 10, 'Goood', 1700000, '1', 60, '2022-03-22', '2022-03-22', 4),
(8, 'VANS CLASSIC SLIP ON SKULLS BLACK', '1588064130.jpg', 8, 'Gooood', 1400000, '1', 70, '2022-03-22', '2022-03-22', 4),
(9, 'BITIS HUNTER X 2019 JET BLACK', '1588064170.jpg', 10, 'Nice', 800000, '1', 80, '2022-03-22', '2022-03-22', 7),
(11, 'NIKE LEGEND REACT 2 BLUE', '1588064219.jpg', 10, 'Okey', 2990000, '1', 90, '2022-03-22', '2022-03-22', 2),
(12, 'PUMA CELL PHASE WHITE RED', '1588064243.jpg', 10, 'Goood', 2830000, '1', 80, '2022-03-22', '2022-03-22', 8),
(13, 'NEW BALANCE 530 BLACK WHITE', '1588064283.jpg', 6, 'Goood', 1500000, '1', 65, '2022-03-22', '2022-03-22', 11),
(14, 'Puma RS-X Hard Drive Mens White/Galaxy Blue', '1588446585.jpg', 10, 'Giày Sneakers Puma RS-X Hard Drive Mens White/Galaxy Blue sở hữu kiểu dáng siêu phong cách, hiện đại với thiết kế các lớp TPU được sắp xếp hợp lý, giày Puma RS-X Hard Drive sẽ là mẫu giày mới nhất được đ', 2400000, '1', 20, '2022-03-22', '2022-03-22', 8),
(15, 'PUMA COURT STAR SUEDE PM34645', '1588450980.jpg', 10, 'Với thiết kế thon gọn nhưng vẫn rất thời thượng, trẻ trung. Phần Upper phía trên được sử dụng là bằng vải mang lại sự sang chảnh, trẻ trung. Phong cách thiết kế khỏe khoắn tạo nên sự nam tính cho người đi.', 2390000, '1', 0, '2022-03-22', '2022-03-22', 8),
(16, 'PUMA CELL ALIEN OG SNEAKERS', '1588451424.jpg', 10, 'CELL Alien chỉ cần chạm xuống từ không gian. Được tạo ra lần đầu tiên dưới dạng giày chạy bộ vào năm 1998, biểu tượng này trở lại thế giới ngày nay với công nghệ đệm CELL ban đầu, pha trộn màu sắc nổi bật và thiết kế siêu tươi.', 1950000, '1', 0, '2022-03-22', '2022-03-22', 8),
(17, 'PUMA NOVA 90S PINK/BLACK/WHITE', '1588451698.jpg', 10, 'Okeeyyy', 1750000, '1', 0, '2022-03-22', '2022-03-22', 8),
(18, 'PUMA MUSE X-2 METALLIC', '1588451768.jpg', 10, 'Okeyyy', 1680000, '1', 0, '2022-03-22', '2022-03-22', 8),
(19, 'PUMA RS-100 SOUND MEN SNEAKERS', '1588451925.jpg', 10, 'Okeyyy', 1400000, '1', 0, '2022-03-22', '2022-03-22', 8),
(20, 'PUMA RS-0 OPTIC BLACK WHITE', '1588451994.jpg', 10, 'GIỐNG NHƯ HÌNH', 2100000, '1', 0, '2022-03-22', '2022-03-22', 8),
(21, 'PUMA THUNDER SPECTRA GREY & YELLOW', '1588452048.jpg', 10, 'GIỐNG NHƯ HÌNH', 2950000, '1', 0, '2022-03-22', '2022-03-22', 8),
(22, 'PUMA TSUGI NETFIT V2 EVOKNIT SNEAKERS', '1588453106.jpg', 10, 'Okeyyy', 1750000, '1', 0, '2022-03-22', '2022-03-22', 8),
(23, 'ADIDAS SUPERSTAR BLACK CHÍNH HÃNG', '1588453225.jpg', 10, 'CHÍNH HÃNG', 1700000, '1', 0, '2022-03-22', '2022-03-22', 1),
(24, 'ADIDAS NEO LABEL CLOUDFOAM RACE', '1588453305.jpg', 7, 'Giống hình', 1660000, '1', 0, '2022-03-22', '2022-03-22', 1),
(25, 'Adidas EQT Bask ADV Xám Gót Xanh', '1588453448.jpg', 10, 'adidas', 1950000, '1', 0, '2022-03-22', '2022-03-22', 1),
(26, 'Adidas Ultraboost 19 Oreo 5.0', '1588453533.jpg', 10, 'Nhẹ', 3000000, '1', 0, '2022-03-22', '2022-03-22', 1),
(27, 'Adidas AlphaBounce Beyond xám khói', '1588453597.jpg', 10, 'xám khói', 2000000, '1', 0, '2022-03-22', '2022-03-22', 1),
(28, 'ADIDAS FALCON SHOES D96699', '1588453730.jpg', 10, 'shoes', 1950000, '1', 0, '2022-03-22', '2022-03-22', 2),
(29, 'Adidas NMD Human Race Solarhu', '1588453836.jpg', 10, 'Soloaa', 4800000, '1', 0, '2022-03-22', '2022-03-22', 2),
(30, 'Adidas Pharrell x NMD Human race', '1588453887.jpg', 10, 'Chúng tôi cam kết chuyên cung cấp giày thể thao  chuẩn nhất với mức giá tốt nhất.', 4900000, '1', 0, '2022-03-22', '2022-03-22', 1),
(31, 'Adidas NMD Human Race yellow', '1588453930.jpg', 10, 'Đầy đủ phụ kiện: túi, box… Bảo hàng 6 tháng bằng Bill mua hàng', 4800000, '1', 0, '2022-03-22', '2022-03-22', 1),
(32, 'NIKE AIR FORCE 1 SHADOW ', '1588454749.jpg', 3, 'kạkjcakjc', 2700000, '1', 0, '2022-03-22', '2022-03-22', 2),
(33, 'Nike Air Max 98 \"University Red White\"', '1588454438.jpg', 10, 'accacc', 2200000, '1', 0, '2022-03-22', '2022-03-22', 2),
(34, 'Nike Air Jordan 1 Mid 2019 \"Royal Blue\"', '1588454475.jpg', 10, 'xcczczcxzcz', 3500000, '1', 0, '2022-03-22', '2022-03-22', 2),
(35, 'Nike React Presto \"Brutal Honey\"', '1588454516.jpg', 10, 'xzccsâc', 3000000, '1', 0, '2022-03-22', '2022-03-22', 2),
(36, 'Nike React Presto \"Ghost\"', '1588454562.jpg', 8, 'ácgfdgdfgdfg', 3000000, '1', 0, '2022-03-22', '2022-03-22', 2),
(37, 'Nike Air Zoom Pegasus 34 \"Black/Orange\"', '1588454812.jpg', 10, 'Black/Orange', 2500000, '1', 0, '2022-03-22', '2022-03-22', 2),
(38, 'Nike Air Max 97 Ultra 17 PRM \"Navy/Obsidian\"', '1588454855.jpg', 10, '\"Navy/Obsidian\"', 4000000, '1', 0, '2022-03-22', '2022-03-22', 2),
(39, 'Nike Air VRTX \"Black/White\"', '1588454908.jpg', 10, 'cxvcxvbxb', 1300000, '1', 0, '2022-03-22', '2022-03-22', 2),
(40, 'Nike Air Zoom Pegasus 34 SHIELD', '1588454972.jpg', 10, 'xcxcvxcvxcvxc', 2500000, '1', 0, '2022-03-22', '2022-03-22', 2),
(41, 'Converse Chuck Taylor All Star VLTG - Back to Earth', '1588455426.png', 9, 'Mẫu giày cao cổ Chuck Taylor All Star VLTG giúp cho người sử dụng có vẻ ngoài siêu chất và cá tính. Điểm nhấn nổi bật khác của sản phẩm ngoài họa tiết chữ V xếp chồng đó chính là  icon hình ngôi sao được cách điệu ở phần foxing tạo điểm nhấn và sự khác biệt so với các sản phẩm khác.', 1600000, '1', 0, '2022-03-22', '2022-03-22', 3),
(42, 'Converse Chuck Taylor All Star Side Pocket', '1588455551.jpg', 7, 'xcczczxc', 1600000, '1', 0, '2022-03-22', '2022-03-22', 3),
(43, 'Converse Chuck Taylor All Star Faux Leather Photon Dust', '1588455642.jpg', 10, 'Thương hiệu Converse Xuất xứ thương hiệu Mỹ Sản xuất tại Việt Nam', 1400000, '1', 0, '2022-03-22', '2022-03-22', 3),
(44, 'Converse Chuck Taylor All Star Archival Camo', '1588455701.jpg', 7, 'Nằm trong BST Converse Camo Connection, Giày Converse Chuck Taylor All Star Camo Patch trang bị đế OrthoLite® giúp người dùng có được sự thoải mái tối đa khi sử dụng. Chất liệu vải canvas thoáng mát. Phần vải lót bên trong của giày in hoạt tiết camo thời thượng ', 1500000, '1', 0, '2022-03-22', '2022-03-22', 3),
(45, 'Converse Chuck Taylor All Star Camo Connection', '1588455772.jpg', 10, 'Thương hiệu Converse Xuất xứ thương hiệu Mỹ Sản xuất tại Việt Nam', 1600000, '1', 0, '2022-03-22', '2022-03-22', 3),
(46, 'Converse Chuck Taylor All Star Love Fearlessly', '1588455898.png', 10, 'Fearlessly', 1600000, '1', 0, '2022-03-22', '2022-03-22', 3),
(47, 'Converse Chuck Taylor All Star Love Fearlessly', '1588455966.png', 10, 'Fearlessly', 1500000, '1', 0, '2022-03-22', '2022-03-22', 3),
(48, 'Converse Chuck Taylor All Star Fearless', '1588456020.png', 8, 'Fearless', 1500000, '1', 0, '2022-03-22', '2022-03-22', 3),
(49, 'Vans Old Skool 36 DX Anaheim Factory', '1588456223.jpg', 6, 'Kiểu dáng Old Skool cổ điển với lót giày được nâng cấp công nghệ Đệm lót UltraCush mang đến một cảm nhận khác biệt với dòng giày cao cấp này của nhà Vans mang lại sự thoải mái & êm ái cho đôi chân. Anaheim Factory 36DX Vintage với chất liệu kết hợp giữa Suede và Canvas. Đặc biệt tông màu trắng ngà đặc biệt trendy được nhiều người tìm kiếm với khả năng phối đồ cực đỉnh. Đệm lót UltraCush mang đến một cảm nhận khác biệt với dòng giày cao cấp này của nhà Vans', 2200000, '1', 0, '2022-03-22', '2022-03-22', 4),
(50, 'Vans Old Skool V Sport', '1588456302.jpg', 10, 'Dòng sản phẩm này hướng tới sự đơn giản nhưng vẫn có điểm nhấn, dải logo Flying V được đặt bên hông giày vừa mang dấu ấn thương hiệu vừa giúp cho những chiếc giày thêm sức hút. Ngoài ra, phần thân Vans Sport hiện nay cũng được bao bọc bởi chất liệu da lộn – chất liệu chủ đạo hay được sử dụng của thời trang những năm 90.', 2000000, '1', 0, '2022-03-22', '2022-03-22', 4),
(51, 'Vans Old Skool Alien Ghosts', '1588456386.jpg', 10, 'Vans Old Skool Alien Ghosts đột phá với chi tiết phản quang trendy, sử dụng kết hợp chất liệu vải Canvas truyền thống, thoáng mát, kết hợp với da lộn được phối ở mũi giày và đế giày mang đến cho bạn sự thoải mái khi di chuyển.Vans old skool được thiết kế cho những môn thể thao mạo hiểm như trượt ván, xe đạp BMX, mô tô đua v.v... đảm bảo độ bền chắc và có độ bám tốt.', 1850000, '1', 0, '2022-03-22', '2022-03-22', 4),
(52, 'Vans SK8-Hi Alien Ghosts', '1588456465.jpg', 10, 'Vans Sk8- Hi Alien Ghosts đột phá với chi tiết phản quang trendy, sử dụng kết hợp chất liệu vải Canvas truyền thống, thoáng mát, kết hợp với da lộn được phối ở mũi giày và đế giày mang đến cho bạn sự thoải mái khi di chuyển.giày Vans Sk8- Hi được thiết kế cho những môn thể thao mạo hiểm như trượt ván, xe đạp BMX, mô tô đua v.v... đảm bảo độ bền chắc và có độ bám tốt.', 2050000, '1', 0, '2022-03-22', '2022-03-22', 4),
(53, 'Vans Check Bess NI Shoes', '1588456554.jpg', 9, 'ans Check Bess Ni với thiết kế khỏe khoắn, sự thoải mái của lót Ultra Cush cùng màu sắc trẻ trung mang lại cho khách hàng sự lựa chọn tuyệt vời', 1900000, '1', 0, '2022-03-22', '2022-03-22', 4),
(54, 'Vans Era Lady Vans', '1588456628.png', 10, 'Vans Lady Vans có thiết kế là kiểu dáng Vans Era quen thuộc kết hợp những họa tiết lạ mắt và hình hoa hồng đen độc đáo phủ khắp thân giày tạo điểm nhấn cuốn hút cho sản phẩm.', 1450000, '1', 0, '2022-03-22', '2022-03-22', 4),
(55, 'Asics Gel-Bnd -1021', '1588456743.png', 9, 'Công nghệ REARFOOT GEL TECHNOLOGY hỗ trợ tác động trợ lực, giúp nâng niu bàn chân trên mọi điều kiện địa hình.', 2745000, '1', 0, '2022-03-22', '2022-03-22', 6),
(56, 'Asics Gt-1000 9 -1011', '1588456870.jpg', 10, 'Không đúng kích cỡ hoặc màu sắc? Quý khách có thể đổi size khác hay sản phẩm khác thật dễ dàng.', 3400000, '1', 0, '2022-03-22', '2022-03-22', 6),
(57, 'Asics Gel-Bnd -1022', '1588456961.png', 10, 'Công nghệ REARFOOT GEL TECHNOLOGY hỗ trợ tác động trợ lực, giúp nâng niu bàn chân trên mọi điều kiện địa hình.', 2745000, '1', 0, '2022-03-22', '2022-03-22', 6),
(58, 'Asics Gel-Kayano 5 Og Running', '1588457009.jpg', 10, 'Được tạo ra bởi việc kết hợp các thành phần tiên tiến với thiết kế mới nổi bật nhằm tôn vinh di sản của Tokyo. Sản phẩm này cho phép bạn giải quyết khoảng cách ở các chặng đường xa một cách thoải mái, nhờ vào công nghệ GEL® ở chân sau được thiết kế lại để cải thiện khả năng giảm xóc khi va chạm', 4044000, '1', 0, '2022-03-22', '2022-03-22', 6),
(59, 'Asics Gel-Quantum Lyte Running FW19', '1588457076.jpg', 10, 'Công nghệ REARFOOT GEL TECHNOLOGY hỗ trợ tác động trợ lực, giúp nâng niu bàn chân trên mọi điều kiện địa hình.', 2554000, '1', 0, '2022-03-22', '2022-03-22', 6),
(60, 'Asics Gel-Pulse 11 Running FW19', '1588457125.jpg', 9, 'Được tạo ra bởi việc kết hợp các thành phần tiên tiến với thiết kế mới nổi bật nhằm tôn vinh di sản của Tokyo. Sản phẩm này cho phép bạn giải quyết khoảng cách ở các chặng đường xa một cách thoải mái,', 3144000, '1', 0, '2022-03-22', '2022-03-22', 6),
(61, 'Asics Gel-Quantum Infinity Jin Running', '1588457171.jpg', 10, 'Được tạo ra bởi việc kết hợp các thành phần tiên tiến với thiết kế mới nổi bật nhằm tôn vinh di sản của Tokyo.', 4044000, '1', 0, '2022-03-22', '2022-03-22', 6),
(62, 'BASAS BUMPER GUM - LOW TOP - OFFWHITE', 'ananas1.jpg', 4, 'Vẫn là màu trắng cổ điển của dòng giày Basas, nhưng phần mũi của những sản phẩm thuộc Basas \"Bumper Gum\" lại sở hữu một diện mạo hoàn toàn khác biệt nhờ miếng cao su thô màu nâu đầy sáng tạo, phá cách. \"Bumper Gum\" là đôi giày dành cho những ai tìm kiếm sự mới mẻ từ những điều quen thuộc, truyền thống.', 450000, '1', 0, '2022-03-22', '2022-03-22', 10),
(63, 'Giày Fila Disruptor 2 Trắng ', 'fila1.jpg', 10, 'Fila Disruptor 2 Trắng  sở hữu thiết kế khá ấn tượng, mang đậm phong cách sporty. Mẫu giày mang đến cho người mang sự trẻ trung, năng động, thoải mái, sắc trắng bao phủ hầu hết thân giày,  vừa là điểm nhấn, vừa mang đến sự tinh tế.', 1300000, '0', 0, '2022-03-22', '2022-03-22', 13),
(64, 'Giày Reebok Royal Bridge DV5170', 'reebok1.jpg', 7, 'nhẹ,êm chân', 2000000, '0', 0, '2022-03-22', '2022-03-22', 14);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_trangthaidonhang`
--

CREATE TABLE `tbl_trangthaidonhang` (
  `MaTrangThai` int(11) NOT NULL,
  `TenTrangThai` varchar(150) COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_trangthaidonhang`
--

INSERT INTO `tbl_trangthaidonhang` (`MaTrangThai`, `TenTrangThai`) VALUES
(1, 'Chuẩn bị hàng'),
(2, 'Chờ giao hàng'),
(3, 'Giao hàng'),
(4, 'Giao hàng thành công');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_vaitro`
--

CREATE TABLE `tbl_vaitro` (
  `MaVaiTro` int(11) NOT NULL,
  `TenVaiTro` varchar(150) COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_vaitro`
--

INSERT INTO `tbl_vaitro` (`MaVaiTro`, `TenVaiTro`) VALUES
(1, 'Admin'),
(2, 'KhachHang'),
(3, 'NhanVien');

-- --------------------------------------------------------

--
-- Cấu trúc cho view `sanphambanchay`
--
DROP TABLE IF EXISTS `sanphambanchay`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sanphambanchay`  AS SELECT count(`tbl_chitietdonhang`.`MaSanPham`) AS `soluong`, `tbl_chitietdonhang`.`MaSanPham` AS `MaSanPham` FROM `tbl_chitietdonhang` GROUP BY `tbl_chitietdonhang`.`MaSanPham` ORDER BY count(`tbl_chitietdonhang`.`MaSanPham`) DESC LIMIT 0, 15 ;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_chitietdonhang`
--
ALTER TABLE `tbl_chitietdonhang`
  ADD PRIMARY KEY (`MaCTDH`),
  ADD KEY `frk_order` (`MaDonHang`),
  ADD KEY `frk_masp_sp` (`MaSanPham`);

--
-- Chỉ mục cho bảng `tbl_donhang`
--
ALTER TABLE `tbl_donhang`
  ADD PRIMARY KEY (`MaDonHang`),
  ADD KEY `frk_ttdh` (`TrangThai`),
  ADD KEY `frk_kh` (`MaKhachHang`);

--
-- Chỉ mục cho bảng `tbl_giohang`
--
ALTER TABLE `tbl_giohang`
  ADD PRIMARY KEY (`MaGioHang`);

--
-- Chỉ mục cho bảng `tbl_khachhang`
--
ALTER TABLE `tbl_khachhang`
  ADD PRIMARY KEY (`MaKhachHang`),
  ADD KEY `frk_vt` (`VaiTro`);

--
-- Chỉ mục cho bảng `tbl_loaisanpham`
--
ALTER TABLE `tbl_loaisanpham`
  ADD PRIMARY KEY (`MaLoai`);

--
-- Chỉ mục cho bảng `tbl_quantri`
--
ALTER TABLE `tbl_quantri`
  ADD PRIMARY KEY (`MaQuanTri`),
  ADD KEY `frk_mavt` (`MaVaiTro`);

--
-- Chỉ mục cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  ADD PRIMARY KEY (`MaSanPham`),
  ADD KEY `frk_sp_lsp` (`LoaiSanPham`);

--
-- Chỉ mục cho bảng `tbl_trangthaidonhang`
--
ALTER TABLE `tbl_trangthaidonhang`
  ADD PRIMARY KEY (`MaTrangThai`);

--
-- Chỉ mục cho bảng `tbl_vaitro`
--
ALTER TABLE `tbl_vaitro`
  ADD PRIMARY KEY (`MaVaiTro`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_chitietdonhang`
--
ALTER TABLE `tbl_chitietdonhang`
  MODIFY `MaCTDH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT cho bảng `tbl_donhang`
--
ALTER TABLE `tbl_donhang`
  MODIFY `MaDonHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT cho bảng `tbl_giohang`
--
ALTER TABLE `tbl_giohang`
  MODIFY `MaGioHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT cho bảng `tbl_khachhang`
--
ALTER TABLE `tbl_khachhang`
  MODIFY `MaKhachHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `tbl_loaisanpham`
--
ALTER TABLE `tbl_loaisanpham`
  MODIFY `MaLoai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `tbl_quantri`
--
ALTER TABLE `tbl_quantri`
  MODIFY `MaQuanTri` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  MODIFY `MaSanPham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT cho bảng `tbl_vaitro`
--
ALTER TABLE `tbl_vaitro`
  MODIFY `MaVaiTro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tbl_chitietdonhang`
--
ALTER TABLE `tbl_chitietdonhang`
  ADD CONSTRAINT `frk_masp_sp` FOREIGN KEY (`MaSanPham`) REFERENCES `tbl_sanpham` (`MaSanPham`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `frk_order` FOREIGN KEY (`MaDonHang`) REFERENCES `tbl_donhang` (`MaDonHang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_donhang`
--
ALTER TABLE `tbl_donhang`
  ADD CONSTRAINT `frk_kh` FOREIGN KEY (`MaKhachHang`) REFERENCES `tbl_khachhang` (`MaKhachHang`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `frk_ttdh` FOREIGN KEY (`TrangThai`) REFERENCES `tbl_trangthaidonhang` (`MaTrangThai`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_khachhang`
--
ALTER TABLE `tbl_khachhang`
  ADD CONSTRAINT `frk_vt` FOREIGN KEY (`VaiTro`) REFERENCES `tbl_vaitro` (`MaVaiTro`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Các ràng buộc cho bảng `tbl_quantri`
--
ALTER TABLE `tbl_quantri`
  ADD CONSTRAINT `frk_mavt` FOREIGN KEY (`MaVaiTro`) REFERENCES `tbl_vaitro` (`MaVaiTro`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  ADD CONSTRAINT `frk_sp_lsp` FOREIGN KEY (`LoaiSanPham`) REFERENCES `tbl_loaisanpham` (`MaLoai`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
