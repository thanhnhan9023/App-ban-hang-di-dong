-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 06, 2019 at 05:14 AM
-- Server version: 10.3.14-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id9396505_thuongmaidientu`
--
CREATE DATABASE IF NOT EXISTS `id9396505_thuongmaidientu` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `id9396505_thuongmaidientu`;

-- --------------------------------------------------------

--
-- Table structure for table `chitiecdonhang`
--

CREATE TABLE `chitiecdonhang` (
  `id` int(11) NOT NULL,
  `madonhang` int(11) NOT NULL,
  `masanpham` int(11) NOT NULL,
  `soluongsanpham` int(11) NOT NULL,
  `tientungsanpham` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chitiecdonhang`
--

INSERT INTO `chitiecdonhang` (`id`, `madonhang`, `masanpham`, `soluongsanpham`, `tientungsanpham`) VALUES
(12, 20, 20, 4, 65960000),
(13, 21, 21, 1, 30490000),
(14, 22, 21, 2, 60980000),
(15, 22, 19, 4, 65560000),
(16, 23, 19, 4, 65560000),
(17, 24, 2, 1, 21990000),
(18, 24, 17, 1, 19990000),
(19, 24, 23, 1, 22990000),
(20, 25, 1, 1, 5400000),
(21, 25, 2, 1, 21990000),
(22, 25, 10, 3, 65970000),
(23, 27, 21, 1, 30490000),
(24, 28, 18, 6, 53940000),
(25, 28, 17, 1, 19990000),
(26, 28, 10, 2, 43980000),
(27, 29, 12, 2, 25980000);

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE `donhang` (
  `id` int(11) NOT NULL,
  `idkhachhang` int(11) DEFAULT NULL,
  `TONGTIEN` float DEFAULT NULL,
  `NgayThanhToan` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `donhang`
--

INSERT INTO `donhang` (`id`, `idkhachhang`, `TONGTIEN`, `NgayThanhToan`) VALUES
(20, 11, 65960000, '2019-05-03'),
(21, 0, 30490000, '2019-05-03'),
(22, 12, 126540000, '2019-05-03'),
(23, 3, 65560000, '2019-05-05'),
(24, 3, 64970000, '2019-05-06'),
(25, 13, 93360000, '2019-05-06'),
(26, 13, 30490000, '2019-05-06'),
(27, 13, 30490000, '2019-05-06'),
(28, 3, 117910000, '2019-05-06'),
(29, 13, 25980000, '2019-05-06');

-- --------------------------------------------------------

--
-- Table structure for table `loaisanpham`
--

CREATE TABLE `loaisanpham` (
  `Id` int(11) NOT NULL,
  `TenLoaiSanPham` varchar(200) NOT NULL,
  `hinhanhloaisanpham` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loaisanpham`
--

INSERT INTO `loaisanpham` (`Id`, `TenLoaiSanPham`, `hinhanhloaisanpham`) VALUES
(1, 'Điện Thoại', 'https://vn-test-11.slatic.net/p/huawei-gr5-mini-l31g-16gb-gold-8778-6189362-2eb679224529d3ff0f02a4f320843b9f-catalog.jpg_340x340q80.jpg_.webp'),
(2, 'Laptop', 'https://i.dell.com/sites/csimages/Videos_Images/en/9eb776ec-d2b3-450c-b340-e1b5f6f31eeb.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `loaitaikhoan`
--

CREATE TABLE `loaitaikhoan` (
  `STT` int(11) NOT NULL,
  `TenLoai` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loaitaikhoan`
--

INSERT INTO `loaitaikhoan` (`STT`, `TenLoai`) VALUES
(1, 'Người Quản Trị'),
(2, 'Khách Hàng');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(11) NOT NULL,
  `tensanpham` varchar(200) NOT NULL,
  `giasanpham` int(15) NOT NULL,
  `hinhanhsanpham` varchar(2000) NOT NULL,
  `motasanpham` varchar(1000) NOT NULL,
  `idsanpham` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`id`, `tensanpham`, `giasanpham`, `hinhanhsanpham`, `motasanpham`, `idsanpham`) VALUES
(1, 'Huawei Y9 2019', 5400000, 'https://cdn.tgdd.vn/Products/Images/42/192313/huawei-y9-2019-blue-600x600.jpg', 'Màn hình \"tai thỏ\" FullView kích thước lớn.Huawei Y9 (2019) mang trong mình tới 4 camera với camera kép phía trước độ phân giải 16 MP + 2 MP và camera kép phía sau là 13 MP + 2 MP, cả hai cụm camera đều tích hợp với công nghệ chụp ảnh AI .Công nghệ nhận diện vân tay 4.0\r\n', 1),
(2, 'Huawei Mate 20 Pro', 21990000, 'https://cdn.tgdd.vn/Products/Images/42/188963/huawei-mate-20-pro-tim-400x460.png', 'Huawei Mate 20 Pro được trang bị một không gian hiển thị rộng rãi có kích thước lên đến 6.39 inch đi kèm độ phân giải Quad HD+ (2K+) siêu nét.-Hiệu năng hàng đầu hiện nay.-6 GB RAM và 128 GB bộ nhớ trong đi kèm giúp bạn thỏa sức chạy đa nhiệm hay lưu trữ game và ứng dụng mà không cần lo lắng', 1),
(3, 'Samsung Galaxy Note 9', 17490000, 'https://cellphones.com.vn/media/catalog/product/cache/7/image/9df78eab33525d08d6e5fb8d27136e95/g/a/galaxy-note-9-bronze.jpg', 'Sử dụng chung con chip Exynos 9810 nhưng Galaxy Note 9 sẽ có RAM mặc định 6GB (thay vì chỉ có một số phiên bản). Mặt khác, bộ nhớ trong cũng khởi đầu từ 128GB và cao nhất lên đến 512GB, tức tương đương nhiều mẫu laptop, giúp người dùng thoải mái chơi nhiều game 3D và lưu trữ nhiều tài liệu công việc hoặc video phim, ca nhạc để giải trí.', 1),
(4, 'Samsung Galaxy A7 (2018)', 6390000, 'https://cellphones.com.vn/media/catalog/product/cache/7/image/9df78eab33525d08d6e5fb8d27136e95/a/7/a7_xanh.jpg', 'Galaxy A7 2018 sở hữu màn hình có kích thước 6 inch tỷ lệ 18,5:9, độ phân giải FullHD+ kết hợp với công nghệ hiển thị Super AMOLED mang lại những hình ảnh sắc nét với màu sắc rực rỡ, màu đen sâu. Đồng thời, màn hình được tối ưu phần viền giúp cho màn hình có thêm không gian hiển thị đáp ứng nhu cầu xem phim, giải trí thú vị hơn', 1),
(5, 'Điện thoại OPPO Find X', 20990000, 'https://cdn.tgdd.vn/Products/Images/42/165189/oppo-find-x-2-400x460-400x460.png', 'Sức mạnh đến từ con chip Snapdragon 845 cùng 8 GB RAM sẽ là thông số đáng mơ ước trên một chiếc smartphone và nay đã có mặt trên OPPO Find X.', 1),
(6, 'Điện thoại OPPO R17 Pro', 16990000, 'https://cdn.tgdd.vn/Products/Images/42/186395/oppo-r17-pro-2-400x460.png', 'Sức mạnh của R17 Pro sẽ không làm bạn thất vọng khi mang trong mình con chip Snapdragon 710 kết hợp 8 GB RAM cùng 128 GB bộ nhớ trong.', 1),
(7, 'Điện thoại iPhone Xs Max 512GB', 43990000, 'https://cdn.tgdd.vn/Products/Images/42/191482/iphone-xs-max-512gb-gold-400x460.png', 'Là chiếc smartphone cao cấp nhất của Apple với mức giá khủng chưa từng có, bộ nhớ trong lên tới 512GB, iPhone XS Max 512GB - sở hữu cái tên khác biệt so với các thế hệ trước, trang bị tới 6.5 inch đầu tiên của hãng cùng các thiết kế cao cấp hiện đại từ chip A12 cho tới camera AI.', 1),
(8, 'Laptop Dell Vostro 3468', 10490000, 'https://cdn.tgdd.vn/Products/Images/44/166382/dell-vostro-3468-70142649-450-600x600.jpg', 'Dell Vostro 3468 i3 6006U là chiếc máy tính xách tay có cấu hình tốt trong tầm giá, được trang bị chip Intel Core i3 cho hiệu năng ổn định, ổ cứng HDD lưu trữ lên đến 500 GB.', 2),
(9, 'Laptop Dell Inspiron', 11990000, 'https://cdn.tgdd.vn/Products/Images/44/189385/dell-inspiron-3476-8j61p11-450-600x600.png', 'Dell Inspiron 3476 i3 8130U là phiên bản máy tính xách tay được trang bị cấu hình cơ bản với chip Intel Core i3 Kabylake Refresh, RAM DDR4 4 GB, ổ cứng HDD lên đến 1 TB, cùng hệ điều hành Windows 10 được cài đặt sẵn. Đây sẽ là lựa chọn phù hợp cho đối tượng như học sinh - sinh viên cần một chiếc laptop đáp ứng tốt các nhu cầu cơ bản của công việc văn phòng cũng như học tập.', 2),
(10, 'Laptop Apple Macbook Air', 21990000, 'https://cdn.tgdd.vn/Products/Images/44/106875/apple-macbook-air-mqd32sa-a-i5-5350u-400-1-450x300-600x600.jpg', 'Macbook Air MQD32SA/A i5 5350U với thiết kế vỏ nhôm nguyên khối Unibody rất đẹp, chắc chắn và sang trọng. Macbook Air là một chiếc máy tính xách tay siêu mỏng nhẹ, hiệu năng ổn định mượt mà, thời lượng pin cực lâu, phục vụ tốt cho nhu cầu làm việc lẫn giải trí..', 2),
(11, 'Laptop Acer Aspire', 9990000, 'https://cdn.tgdd.vn/Products/Images/44/160296/acer-aspire-e5-476-i3-8130u-nxgwtsv002-ava-600x600.jpg', 'Acer Aspire E5 476 i3 8130U là phiên bản máy tính xách tay với cấu hình cao, sử dụng vi xử lý mạnh mẽ trong phân khúc nhưng vẫn rất tiết kiệm pin do sử dụng kiến trúc chip mới từ Intel. Laptop Acer với mức giá thành hợp lý cùng cấu hình cực kì mạnh mẽ, Aspire E5 476 có thể đáp ứng tốt cho người dùng phổ thông cần một chiếc máy laptop để học tập, giải trí.', 2),
(12, 'Laptop Acer Spin 3 SP314 51 39WK', 12990000, 'https://cdn.tgdd.vn/Products/Images/44/145919/acer-spin-3-sp314-51-39wk-i3-7130u-nxguwsv001-cava-600x600.jpg', 'Acer Spin 3 SP314 51 39WK là mẫu máy tính có thiên hướng thiết kế về thời trang và sự linh hoạt, tiện lợi vượt trội. Là một chiếc laptop nhỏ gọn, màn hình cảm ứng và có thể biến đổi nhiều hình dạng phù hợp với các nhu cầu sử dụng.', 2),
(13, 'Laptop HP Pavilion x360 ba080TU ', 12990000, 'https://cdn.tgdd.vn/Products/Images/44/179677/hp-pavilion-x360-ba080tu-3mr79pa-450-600x600.jpg', 'HP Pavilion x360 ba080TU là chiếc laptop xuất thân từ dòng sản phẩm Pavillion đến từ thương hiệu nổi tiếng HP. Với thiết kế vô cùng gọn nhẹ và cấu hình khá tốt, đáp ứng tốt cho người dùng có nhu cầu mang theo máy tính để học tập, làm việc', 2),
(14, 'Laptop HP Pavilion 14 ce1011TU i3', 13290000, 'https://cdn.tgdd.vn/Products/Images/44/197626/hp-pavilion-14-ce1011tu-i3-8145u-4gb-1tb-win10-5j-600x600.jpg', 'Laptop HP Pavilion 14 ce1011TU (5JN17PA) với thiết kế trang nhã, mỏng nhẹ thuận tiện cho việc di chuyển. Cùng với đó là một cấu hình đáp ứng mượt mà các ứng dụng văn phòng cũng như xử lý khá tốt các ứng dụng đồ họa cơ bản, thì đây chắc hẳn sẽ là một sự lựa chọn đáng để cân nhắc dành cho các bạn sinh viên và nhân viên văn phòng trong phân khúc', 2),
(15, 'Laptop Lenovo IdeaPad 130', 8990000, 'https://cdn.tgdd.vn/Products/Images/44/187012/lenovo-ideapad-130-14ikb-81h60017vn-ava-600x600.jpg', 'Laptop Lenovo IdeaPad 130 14IKB có cấu hình ở mức khá với hệ điều hành Windows 10 bản quyền, chip Intel Core i3 thế hệ thứ 7, 4 GB RAM cùng ổ cứng lưu trữ HDD 1 TB, cho hiệu năng hoạt động ổn định đối với các tác vụ cơ bản như soạn thảo văn bản, nhập liệu, học anh văn, làm bài thuyết trình,... Đây sẽ là chiếc máy tính phù hợp với đối tượng người dùng như nhân viên văn phòng, học sinh - sinh viên', 2),
(16, 'Samsung Galaxy S9', 20990000, 'https://cdn.tgdd.vn/Products/Images/42/154695/samsung-galaxy-s9-plus-128gb-400x460-400x460.png', 'Samsung Galaxy S9 Plus 128Gb, siêu phẩm smartphone hàng đầu trong thế giới Android đã ra mắt với màn hình vô cực, camera chuyên nghiệp như máy ảnh và hàng loạt những tính năng cao cấp đầy hấp dẫn.', 1),
(17, ' Samsung Galaxy S9', 19990000, 'https://cdn.tgdd.vn/Products/Images/42/197080/samsung-galaxy-s9-plus-64gb-vang-do-400x460.png', 'Galaxy S9+ Vang Đỏ đã được Samsung chính thức mở bán vào dịp Noel, đầu năm mới. Máy tích hợp toàn bộ những tính năng cao cấp nhất như camera kép điều chỉnh khẩu độ, quét mống mắt, chống nước chống bụi và trang bị chip Exynos 9810 đầy mạnh mẽ', 1),
(18, 'Samsung Galaxy A8 Star', 8990000, 'https://cdn.tgdd.vn/Products/Images/42/166247/samsung-galaxy-a8-star-tet-giatot-400x460-400x460.png', 'Samsung Galaxy A8 Star là một biến thể mới của dòng A trong gia đình Samsung với sự nâng cấp vượt trội về camera cũng như thay đổi trong thiết kế', 1),
(19, 'Laptop HP Pavilion 14', 16390000, 'https://cdn.tgdd.vn/Products/Images/44/196907/hp-pavilion-14-ce1018tu-i5-8265u-4gb-16gb-1tb-14f-33397-thumb-600x600.jpg', 'Laptop HP Pavilion 14 (5RL41PA) vừa được HP đưa ra thị trường với thiết kế tinh tế, cùng với trọng lượng khá nhẹ thuận tiện hơn cho việc di chuyển hằng ngày. Cấu hình đủ mạnh để chạy mượt mà các ứng dụng văn phòng, xử lý tốt các thao tác kéo thả trong ứng dụng đồ họa cơ bản. Đây sẽ là sự lựa chọn đáng cân nhắc cho các bạn nhà học sinh, sinh viên và nhân viên văn phòng', 2),
(20, 'Laptop HP 15', 16490000, 'https://cdn.tgdd.vn/Products/Images/44/181322/hp-15-da0036tx-4me78pa-cava-600x600.jpg', 'Laptop HP 15 da0036TX i7 8550U với cấu hình khá nhau mang đến hiệu năng hoạt động mượt mà cùng khả năng tiết kiệm điện năng, ổ cứng HDD 1 TB lưu trữ dữ liệu thoải mái. Trọng lượng máy khá nhẹ thích hợp cho nhiều đối tượng khách hàng khác nhau từ học sinh, sinh viên dùng để học tập - làm việc cho đến những người chuyên làm về thiết kế đồ hoạ hay những khách hàng thường xuyên di chuyển cùng chiếc \"laptop\"', 2),
(21, 'Laptop MSI GF63 9RD', 30490000, 'https://asset.msi.com/resize/image/global/product/product_7_20180212154449_5a8145f16571d.png62405b38c58fe0f07fcef2367d8a9ba1/600.png', '      MSI GF63 8RD là sự lựa chọn dành cho người dùng nói chung và game thủ nói riêng khi có ý định chọn mua laptop gaming của MSI. Máy được trang bị chip Intel Core i7 cùng card đồ hoạ rời NVIDIA GeForce GTX 1050Ti đủ sức chiến mọi game \"khủng\" hiện nay trên thị trường  ', 2),
(23, 'Macbook Air 13 128GB', 22990000, 'https://cdn.fptshop.com.vn/Uploads/Originals/2017/7/13/636355328334271890_Macbook-Air-13%202017%20(1).jpg', 'Macbook Air 13 128 GB MQD32SA/A (2017) với thiết kế không thay đổi, vỏ nhôm sang trọng, siêu mỏng và siêu nhẹ, hiệu năng được nâng cấp, thời lượng pin cực lâu, phù hợp cho nhu cầu làm việc văn phòng nhẹ nhàng, không cần quá chú trọng vào hiển thị của màn hình.\r\n ', 2);

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `MaTaiKhoan` int(11) NOT NULL,
  `Ho` varchar(150) DEFAULT NULL,
  `Ten` varchar(150) DEFAULT NULL,
  `Email` varchar(150) DEFAULT NULL,
  `MatKhau` varchar(250) DEFAULT NULL,
  `SDT` varchar(150) DEFAULT NULL,
  `GioiTinh` varchar(150) DEFAULT NULL,
  `MaLoaiTK` int(11) DEFAULT NULL,
  `diachi` varchar(355) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`MaTaiKhoan`, `Ho`, `Ten`, `Email`, `MatKhau`, `SDT`, `GioiTinh`, `MaLoaiTK`, `diachi`) VALUES
(3, 'mai ', 'thanh nhan', 'nhandycu@gmail.com', '0494459ab444f856789bd049f000c5ce', '0943597722', 'Nam', 2, 'Cánh mạng tháng 8 xã an nhứt'),
(6, 'Ly ', 'xuan thanh', 'minhhoangnam1997@gmail.com', '0494459ab444f856789bd049f000c5ce', '0947994443', 'Nam', 2, 'Cánh mạng tháng 8 xã an nhứt');


--
-- Indexes for dumped tables
--

--
-- Indexes for table `chitiecdonhang`
--
ALTER TABLE `chitiecdonhang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loaisanpham`
--
ALTER TABLE `loaisanpham`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `loaitaikhoan`
--
ALTER TABLE `loaitaikhoan`
  ADD PRIMARY KEY (`STT`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`MaTaiKhoan`),
  ADD KEY `MaLoaiTK` (`MaLoaiTK`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chitiecdonhang`
--
ALTER TABLE `chitiecdonhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `loaisanpham`
--
ALTER TABLE `loaisanpham`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `loaitaikhoan`
--
ALTER TABLE `loaitaikhoan`
  MODIFY `STT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `MaTaiKhoan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD CONSTRAINT `taikhoan_ibfk_1` FOREIGN KEY (`MaLoaiTK`) REFERENCES `loaitaikhoan` (`STT`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
