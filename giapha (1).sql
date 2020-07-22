-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 22, 2020 lúc 08:43 PM
-- Phiên bản máy phục vụ: 10.4.13-MariaDB
-- Phiên bản PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `giapha`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gopy`
--

CREATE TABLE `gopy` (
  `id_gopy` int(11) NOT NULL,
  `noidung` text NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` datetime NOT NULL,
  `id_taikhoan` int(11) NOT NULL,
  `id_tintuc` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `gopy`
--

INSERT INTO `gopy` (`id_gopy`, `noidung`, `updated_at`, `created_at`, `id_taikhoan`, `id_tintuc`, `status`) VALUES
(1, 'asdasd', '2020-07-10', '2020-07-10 00:00:00', 5, 1, 0),
(2, '12313123123123123', '2020-07-10', '2020-07-10 18:22:50', 5, 1, 0),
(3, 'adf', '2020-07-11', '2020-07-11 16:25:27', 5, 2, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hinhanh`
--

CREATE TABLE `hinhanh` (
  `id_hinh` int(11) NOT NULL,
  `tenhinh` varchar(250) NOT NULL,
  `id_tintuc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `hinhanh`
--

INSERT INTO `hinhanh` (`id_hinh`, `tenhinh`, `id_tintuc`) VALUES
(1, 'gio.jpg', 1),
(2, 'hop.jpg', 2),
(3, 'chuongtrinh.jpg', 3),
(4, 'ky.jpg', 4),
(6, 'ky1.jpg', 4),
(7, 'nguyenvanto.jpg', 5),
(8, 'tin6.jpg', 6),
(9, 'tin7.jpg', 6),
(10, 'tin8.jpg', 7),
(11, 'tin9.jpg', 7),
(12, 'tin10.jpg', 7),
(13, 'tin11.jpg', 8);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoi`
--

CREATE TABLE `nguoi` (
  `id_nguoi` int(11) NOT NULL,
  `hoten` varchar(250) NOT NULL,
  `gioitinh` enum('Nam','Nữ') NOT NULL,
  `ngaysinh` date NOT NULL,
  `ngaymat` datetime DEFAULT NULL,
  `hinh` varchar(250) NOT NULL,
  `tieusu` text NOT NULL,
  `id_tinh` int(11) DEFAULT NULL,
  `tinhtrang` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `nguoi`
--

INSERT INTO `nguoi` (`id_nguoi`, `hoten`, `gioitinh`, `ngaysinh`, `ngaymat`, `hinh`, `tieusu`, `id_tinh`, `tinhtrang`) VALUES
(1, 'Ti', 'Nam', '2020-06-10', '2018-08-21 00:00:00', '', 'xbzcv', 1, 'Chết'),
(2, 'Suu', 'Nữ', '2020-06-23', '2017-10-27 00:00:00', '', 'zxc', 1, 'Sống'),
(3, 'Dan', 'Nam', '2020-06-10', '2020-06-07 00:00:00', '', 'xbzcv', 1, 'Sống'),
(4, 'Meo', 'Nữ', '2020-06-23', '2020-07-19 00:37:50', '', 'zxc', 1, 'Không xác định'),
(5, 'Thin', 'Nữ', '2020-06-23', NULL, '', 'zxc', 1, 'Sống'),
(7, 'mui', 'Nữ', '2020-06-30', NULL, '', 'asdsad', 2, 'Sống');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguongoc`
--

CREATE TABLE `nguongoc` (
  `id_nguongoc` int(11) NOT NULL,
  `id_nguoi` int(11) NOT NULL,
  `id_nguoi_moiquanhe` int(11) NOT NULL,
  `moiquanhe` enum('Cha','Con') NOT NULL,
  `nhanh` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `nguongoc`
--

INSERT INTO `nguongoc` (`id_nguongoc`, `id_nguoi`, `id_nguoi_moiquanhe`, `moiquanhe`, `nhanh`) VALUES
(1, 1, 2, 'Cha', '1-2'),
(3, 1, 3, 'Cha', '1-3'),
(4, 2, 4, 'Cha', '1-2-4'),
(5, 2, 5, 'Cha', '1-2-5');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slide`
--

CREATE TABLE `slide` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `noidung` text NOT NULL,
  `url` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `slide`
--

INSERT INTO `slide` (`id`, `title`, `noidung`, `url`) VALUES
(1, 'Gia Phả Là Gì?', 'Gia phả là một từ Hán Việt, trong đó Gia có nghĩa là gia đình, gia tộc, họ tộc; Phả (còn có âm là Phổ) là cuốn sách biên chép con người,  sự việc theo thứ tự, hệ thống.  Người ta có một trong những cách định nghĩa:\r\n\r\nGia phả (hay gia phổ) là cuốn sách ghi chép lại lịch sử các thế hệ của một gia đình hay họ tộc.\r\n\r\nTùy quy mô và cách viết, Gia phả còn được gọi là Tộc phả (Tộc phổ), Phả ký, Phả chí, Phả hệ, Phả truyền. Các nhà tông thất còn gọi gia phả của vương triều, dòng tộc mình là Ngọc phả, Thế phả.\r\n\r\nỞ các đền miếu, đình làng cũng có các sách chép về lịch sử ra đời của công trình cũng như sự tích, truyền thuyết các Thần, Thánh, Thành hoàng được thờ phụng. Sách đó gọi là Thần phả, Thánh phả.', 'banner4.jpg'),
(2, 'Gia Phả Là Gì?', 'Gia phả là cuốn sách biên chép lịch sử các thế hệ của gia đình, họ tộc. Xưa nay gia phả vẫn được coi là \"gia bảo\". Đọc gia phả giúp các lớp hậu thế hiểu rõ nguồn cội và quan hệ huyết thống của mình, qua đó tăng thêm niềm tự hào đối với Tổ tiên, dòng tộc cũng như đối với đất nước, quê hương..', 'banner2.jpg'),
(3, 'Gia Phả Là Gì?', 'Gia phả là sách ghi chép lại lai lịch, thân thế và sự nghiệp của từng người trong gia tộc, theo thứ tự các đời. Mỗi dòng họ đều có gia phả để ghi lại những người cùng huyết thống, các thế hệ tiếp nối nhau, kế thừa và phát huy truyền thống tốt đẹp của dòng họ. Gia phả giúp cho các thành viên trong dòng tộc nhớ một cách chính xác về ngày giỗ của những người trong dòng họ cũng như các phần mộ để tiện cho việc hương hỏa và phát huy các truyền thống tốt đẹp của dòng họ mình cũng như phát huy truyền thống uống nước nhớ nguồn của dân tộc Việt Nam.', 'asd.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sukien`
--

CREATE TABLE `sukien` (
  `id_sukien` int(11) NOT NULL,
  `tensukien` varchar(250) NOT NULL,
  `id_nguoi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sukien`
--

INSERT INTO `sukien` (`id_sukien`, `tensukien`, `id_nguoi`) VALUES
(1, 'Giỗ của asdasd', 1),
(2, 'Giỗ tổ của Suu', 2),
(3, 'Giỗ tổ của Dần', 3),
(4, 'Giỗ tổ của Meo', 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `id_taikhoan` int(11) NOT NULL,
  `tendangnhap` varchar(250) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `vaitro` int(10) NOT NULL,
  `email` varchar(250) NOT NULL,
  `avatar` varchar(250) DEFAULT NULL,
  `id_nguoi` int(11) DEFAULT NULL,
  `provider` varchar(250) DEFAULT NULL,
  `provider_id` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`id_taikhoan`, `tendangnhap`, `password`, `vaitro`, `email`, `avatar`, `id_nguoi`, `provider`, `provider_id`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500', 0, 'hoangduc98nt@gmail.com', '', 1, '', ''),
(2, 'superadmin', 'superadmin123', 0, 'byachampion191@gmail.com', '', 2, '', ''),
(4, 'asdasd', '$2y$10$gGkKLSLlORJzUWO00ntVWOvN0mFDqpfJyF3EMDMD9YN4hiuJ9L7wK', 0, 'nguyenmanhquynh.cntt@gmail.com', 'user.png', NULL, '', ''),
(5, 'pokemon', '$2y$10$Ynmk4wK6UCCvJEDPlJMZ1OFC4ZEg7s0RGtrcEZ8KV9pu7joLnsANW', 0, 'nhanphuong1998@gmail.com', 'user.png', 7, '', ''),
(7, NULL, NULL, 0, 'boy_firesi@yahoo.com.vn', 'https://graph.facebook.com/v3.3/3343585585762001/picture?type=normal', NULL, 'facebook', '3343585585762001');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tinh`
--

CREATE TABLE `tinh` (
  `id_tinh` int(11) NOT NULL,
  `tinh_tp` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tinh`
--

INSERT INTO `tinh` (`id_tinh`, `tinh_tp`) VALUES
(1, 'BRVT'),
(2, 'TPHCM');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tintuc`
--

CREATE TABLE `tintuc` (
  `id_tintuc` int(11) NOT NULL,
  `tieudekhongdau` varchar(250) NOT NULL,
  `tieude` varchar(250) NOT NULL,
  `noidung_tt` text NOT NULL,
  `ngaydang` date NOT NULL,
  `id_taikhoan` int(11) NOT NULL,
  `luotxem` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tintuc`
--

INSERT INTO `tintuc` (`id_tintuc`, `tieudekhongdau`, `tieude`, `noidung_tt`, `ngaydang`, `id_taikhoan`, `luotxem`) VALUES
(1, 'gio-to', 'Giỗ tổ', '<p>Ng&agrave;y 10/3/2020 vừa qua, Ban li&ecirc;n lạc họ Nguyễn Đức c&oacute; chuyến thăm v&agrave; dự buổi lễ giổ tổ chi họ Nguyễn ĐỨc tại Phước Xu&acirc;n Ban li&ecirc;n lạc họ Nguyễn Đức qua lời mời của b&aacute;c trưởng họ Nguyễn Đức tại đ&acirc;y. Về dự ng&agrave;y giỗ tổ năm nay, c&ograve;n c&oacute; sự tham dự của đại diện ban li&ecirc;n lạc họ Nguyễn Đức</p>\r\n\r\n<p>Ngay từ s&aacute;ng sớm, tại từ đường họ Ninh đ&atilde; rất đ&ocirc;ng vui v&agrave; nhộn nhịp trong tiếng n&oacute;i, tiếng cười, sự chuẩn bị thật chu đ&aacute;o cho buổi lễ.</p>\r\n\r\n<p>Ban li&ecirc;n lạc rất vui v&agrave; vinh dự khi nhận được sự đ&oacute;n tiếp nồng hậu của b&agrave; con họ Ninh tại đ&acirc;y.</p>\r\n\r\n<p>Mong rằng, trong những năm tiếp theo, c&aacute;c hoạt động thường ni&ecirc;n của ban li&ecirc;n lạc ở tại c&aacute;c địa phương như Phước Xu&acirc;n n&oacute;i ri&ecirc;ng, c&aacute;c địa phương kh&aacute;c n&oacute;i chung, sẽ c&oacute; nhiều b&agrave; con họ Nguyễn Đức ở c&aacute;c nơi về tham dự c&ugrave;ng, để họ Ninh ng&agrave;y một đo&agrave;n kết, ph&aacute;t triển, vững mạnh!</p>\r\n', '2020-06-03', 1, 452),
(2, 'hop-thuong-nien', 'Họp thường niên', '<p>Ng&agrave;y 2/6/2019 vừa qua, Ban li&ecirc;n lạc D&ograve;ng họ Nguyễn Đức đ&atilde; tổ chức &ldquo;Hội nghị đại biểu thường ni&ecirc;n năm 2019&rdquo; tại Quảng Ng&atilde;i. Tiếp nối sự th&agrave;nh c&ocirc;ng của Hội nghị đại biểu to&agrave;n quốc tổ chức ng&agrave;y 3/6/2018. Về tham dự với chương tr&igrave;nh năm nay c&oacute; hơn 80 đại biểu. Ngay từ rất sớm, c&aacute;c đo&agrave;n đại biểu đ&atilde; c&oacute; mặt rất đ&ocirc;ng đủ v&agrave; thảo luận rất s&ocirc;i nổi với nhau trước khi đại hội ch&iacute;nh thức bắt đầu. Kh&ocirc;ng giấu nổi những t&igrave;nh cảm, h&acirc;n hoan v&agrave; vui mừng sau 1 năm mới gặp lại, c&aacute;c đại biểu đ&atilde; d&agrave;nh cho nhau những nụ cười thật tươi v&agrave; những c&aacute;i bắt tay thật chặt!</p>\r\n\r\nNgay từ rất sớm, các đoàn đại biểu đã có mặt rất đông đủ và thảo luận rất sôi nổi với nhau trước khi đại hội chính thức bắt đầu. Không giấu nổi những tình cảm, hân hoan và vui mừng sau 1 năm mới gặp lại, các đại biểu đã dành cho nhau những nụ cười thật tươi và những cái bắt tay thật chặt!', '2020-06-02', 1, 123),
(3, 'chuong-trinh-khuyen-hoc', 'Chương trình khuyến học', '<p>Kh&ocirc;ng chỉ c&ograve;n l&agrave; một chương tr&igrave;nh d&agrave;nh cho c&aacute;c t&acirc;n sinh vi&ecirc;n, chương tr&igrave;nh khuyến học năm 2019 của d&ograve;ng họ Nguyễn Đức năm 2019 c&ograve;n thực sự l&agrave; một &ldquo;ng&agrave;y hội&rdquo; của người họ Nguyễn Đức&hellip; C&aacute;c vị phụ huynh v&agrave; c&aacute;c bạn t&acirc;n sinh vi&ecirc;n về tham dự chương tr&igrave;nh, nơi c&oacute; cộng đồng người họ Nguyễn Đức sinh sống.</p>\r\n', '2020-06-12', 1, 2452),
(4, 'tram-nam-tim-kiem-ho-hang-ky-2-ngan-dam-ho-nguyen', 'Trăm năm tìm kiếm họ hàng - Kỳ 2: Ngàn dặm họ Nguyễn', '<p>M&ocirc;̣t ngày cu&ocirc;́i tháng 4-2018, ch&uacute;ng t&ocirc;i cùng đại di&ecirc;̣n dòng họ Nguy&ecirc;̃n ở làng Dương N&ocirc;̉ (Phú Vang, Thừa Thi&ecirc;n - Hu&ecirc;́) t&igrave;m về đ&acirc;́t t&ocirc;̉ họ Nguy&ecirc;̃n tại làng Nguy&ecirc;̣t Vi&ecirc;n (Hoằng Hóa, Thanh Hóa).</p>\r\n\r\n<p>Trong 5 người của đoàn, có 3 người l&acirc;̀n đ&acirc;̀u v&ecirc;̀ thăm qu&ecirc; t&ocirc;̉.</p>\r\n\r\n<p>Về thăm qu&ecirc; tổ</p>\r\n\r\n<p>Xe vừa dừng ngay đ&acirc;̀u c&acirc;̀u Nguy&ecirc;̣t Vi&ecirc;n, những cái bắt tay, &ocirc;m ch&acirc;̀m thắm thi&ecirc;́t khi gặp &ocirc;ng Nguy&ecirc;̃n Văn Cư, được họ Nguy&ecirc;̃n làng Nguyệt Vi&ecirc;n cắt cử đón đoàn. B&ecirc;n m&acirc;m cơm gia đình và những chén rượu n&ocirc;̀ng, c&acirc;u chuy&ecirc;̣n dòng họ được bàn lu&acirc;̣n s&ocirc;i đ&ocirc;̣ng.</p>\r\n\r\n<p>Anh Nguy&ecirc;̃n Hữu Hoàng, đời thứ 21 của d&ograve;ng họ Nguyễn Hữu ở Huế, h&agrave;n huy&ecirc;n với anh Nguy&ecirc;̃n Trường Xu&acirc;n, đời thứ 16 của họ Nguyễn ở Thanh Hóa, về chuy&ecirc;̣n c&ocirc;ng vi&ecirc;̣c, gia đình. Anh Hoàng hứa sẽ dẫn anh Xu&acirc;n đi thăm làng Dương N&ocirc;̉ và các phái họ Nguy&ecirc;̃n ở Huế.</p>\r\n\r\n<p>&quot;Đúng là máu mủ, d&ugrave; c&oacute; xa c&aacute;ch nhau ng&agrave;n dặm vẫn th&acirc;́y lòng &acirc;m &acirc;́m, cứ như đã gặp nhau, th&acirc;n thu&ocirc;̣c từ l&acirc;u lắm r&ocirc;̀i!&quot; - anh Nguy&ecirc;̃n Hữu Hoàng bày tỏ.</p>\r\n\r\n<p>Từ s&aacute;ng sớm, hàng trăm con cháu họ Nguy&ecirc;̃n men theo bờ đ&ecirc; s&ocirc;ng Mã ti&ecirc;́n ra khu m&ocirc;̣ của vị cao tổ nằm giữa m&ocirc;̣t bãi đ&acirc;́t b&ocirc;̀i trù phú. Khu m&ocirc;̣ r&ocirc;̣ng cả trăm mét vu&ocirc;ng vừa được x&acirc;y mới, có la thành, nhà bia, bình phong và ba n&acirc;́m m&ocirc;̣ lớn.</p>\r\n\r\n<p>Người họ Nguy&ecirc;̃n ở Nguy&ecirc;̣t Vi&ecirc;n v&agrave; các huy&ecirc;̣n thị kh&aacute;c của tỉnh Thanh Hóa, đo&agrave;n họ Nguyễn ở Thừa Thi&ecirc;n - Hu&ecirc;́, rồi Hưng Y&ecirc;n, Ngh&ecirc;̣ An và cả từ C&ocirc;̣ng hòa Pháp về... lần lượt d&acirc;ng hương l&ecirc;n mộ ngài cao t&ocirc;̉.</p>\r\n\r\n<p>C&acirc;u chuyện v&agrave; văn bản của họ Nguy&ecirc;̃n làng Dương N&ocirc;̉ k&ecirc;̉ rằng dưới thời Tr&acirc;̀n (1226-1400), ngài t&ocirc;̉ Nguy&ecirc;̃n Quang Cao từ đ&acirc;́t Nam Sách (Hải Dương) cùng con cháu vào mảnh đ&acirc;́t ven bờ s&ocirc;ng Mã nay là làng Nguy&ecirc;̣t Vi&ecirc;n, cắm đ&acirc;́t l&acirc;̣p nghi&ecirc;̣p.<img alt=\"\" src=\"/frontend/images/bg-img/images/ky1.jpg\" style=\"height:367px; margin:20px; width:586px\" /></p>\r\n\r\n<p>Trải qua nhi&ecirc;̀u đời, đ&ecirc;́n năm 1471, ngài Nguy&ecirc;̃n Hữu Du&ecirc;́ thu&ocirc;̣c đời thứ 12 theo vua L&ecirc; Thánh T&ocirc;n chinh phạt phương Nam. Sau đ&oacute;, ngài Du&ecirc;́ được b&ocirc;̉ làm quan tri huy&ecirc;̣n ở Phú Vang của Hu&ecirc;́.</p>\r\n\r\n<p>Tại đ&acirc;y, ngài nhắm đ&ecirc;́n mảnh đ&acirc;́t đẹp ở hữu ngạn s&ocirc;ng Hương, r&ocirc;̀i v&ecirc;̀ qu&ecirc; vời con cháu họ Nguy&ecirc;̃n v&agrave;o Nam mở đất l&acirc;̣p làng.</p>\r\n', '2020-06-10', 1, 782),
(5, 'tuong-nho-cu-nguyen-van-to', 'Tưởng nhớ cụ Nguyễn Văn Tổ', '<p>Ngạn ngữ c&oacute; c&acirc;u Đời người kh&ocirc;ng nằm ở việc sống l&acirc;u hay ngắn m&agrave; nằm ở việc gi&aacute;c ngộ sớm hay muộn. Cuộc đời của cụ Nguyễn Văn Tố, vị Chủ tịch Quốc hội đầu ti&ecirc;n v&ocirc; c&ugrave;ng đ&aacute;ng k&iacute;nh của ch&uacute;ng ta đ&uacute;ng l&agrave; người như vậy.<br />\r\nCụ Nguyễn Văn Tố, t&ecirc;n hiệu l&agrave; Ứng Ho&egrave; sinh ng&agrave;y 5-6-1889 tại l&agrave;ng Đ&ocirc;ng Th&agrave;nh, tổng Tiến T&uacute;c, Thọ Xương, nay l&agrave; số nh&agrave; 32, phố B&aacute;t Sứ, H&agrave; Nội. Th&acirc;n sinh ra Cụ l&agrave; nh&agrave; nho y&ecirc;u nước Nguyễn Văn Thịnh v&agrave; b&agrave; L&ecirc; Thị Kim, một phụ nữ bu&ocirc;n b&aacute;n nhỏ. Được biết Cụ c&ograve;n c&oacute; hai người anh em nhưng nay vẫn chưa t&igrave;m biết được t&ecirc;n tuổi v&agrave; hoạt động của họ. Vợ của cụ l&agrave; b&agrave; Vũ Thị Chắt, k&eacute;m cụ hai tuổi, qu&ecirc; ở l&agrave;ng Mọc, sau khi lấy cụ đ&atilde; ra H&agrave; Nội v&agrave; l&agrave;m nghề bu&ocirc;n b&aacute;n thuốc nhuộm. Vợ chồng cụ c&oacute; ba người con. Người con g&aacute;i đầu lấy chồng họ Đặng Vũ, l&agrave;ng H&agrave;nh Thiện , Nam Định. B&agrave; mất sớm v&igrave; bệnh lao. Con trai của hai &ocirc;ng b&agrave; l&agrave; Đại u&yacute; liệt sĩ Đặng Vũ Quang Đ&agrave;m, hy sinh tr&ecirc;n chiến trường miền Nam năm 1966<br />\r\n. Người con thứ hai l&agrave; Nguyễn Văn Bảo, trước học trường Bưởi. năm 1935 sang Ph&aacute;p học Nha khoa v&agrave; mất tại Toulouse năm 1935. Người con trai thứ ba l&agrave; nh&agrave; gi&aacute;o Nguyễn T&aacute;, dạy m&ocirc;n Vạn vật (Sinh học) tại trường Bưởi, sau sống c&ugrave;ng gia đ&igrave;nh ở Canada, nhưng nay vẫn chưa c&oacute; th&ocirc;ng tin g&igrave; th&ecirc;m.<br />\r\nVốn bản t&iacute;nh th&ocirc;ng minh, cụ được gia đ&igrave;nh cho học chữ nho theo s&aacute;ch Tam Tự Kinh từ nhỏ. Chỉ sau 1 năm cậu Tố đ&atilde; đọc th&ocirc;ng, viết thạo chữ nho của cả tập s&aacute;ch n&agrave;y. Từ năm l&ecirc;n 6 đến năm l&ecirc;n 9 cậu Tố đ&atilde; học hết nội dung cơ sở của Nho học thời ấy v&agrave; được bố giảng giải cho nghe về những c&acirc;u chuyện lịch sử từ thời H&ugrave;ng Vương dựng nước.<br />\r\nSau khi triều đ&igrave;nh nh&agrave; Nguyễn k&yacute; hiệp ước Paten&ocirc;tre với Ph&aacute;p, nhiều phong tr&agrave;o khởi nghĩa chống Ph&aacute;p đ&atilde; nổ ra như phong tr&agrave;o Cần Vương, khởi nghĩa B&atilde;i Sậy, khởi nghĩa T&acirc;y Bắc, khởi nghĩa Hương Kh&ecirc;, khởi nghĩa Y&ecirc;n Thế, khởi nghĩa Ba Đ&igrave;nh&hellip; Sau đ&oacute; l&agrave; phong tr&agrave;o Đ&ocirc;ng Du v&agrave; phong tr&agrave;o Đ&ocirc;ng Kinh nghĩa thục. Những sự kiện n&agrave;y đ&atilde; g&acirc;y chấn động khắp cả nước v&agrave; tất nhi&ecirc;n đ&atilde; t&aacute;c động kh&ocirc;ng &iacute;t đến ch&agrave;ng thanh ni&ecirc;n Nguyễn Văn Tố. Anh rất kh&acirc;m phục c&aacute;c nghĩa sĩ y&ecirc;u nước nhưng mong muốn cứu nước bằng con đường kh&aacute;c, với suy nghĩ Biết m&igrave;nh, biết người, trăm trận, trăm thắng . Anh xin gia đ&igrave;nh cho v&agrave;o học trường Th&ocirc;ng ng&ocirc;n (Coll&egrave;ge des interpr&egrave;tes) do Ph&aacute;p mở tại H&agrave; Nội. Sau ba năm học ở trường n&agrave;y, năm 1905 ch&agrave;ng trai Nguyễn Văn Tố 16 tuổi đ&atilde; tốt nghiệp ở vị tr&iacute; đầu bảng v&agrave; được ng&agrave;i Alfred Foucher, Quyền Gi&aacute;m đốc Học viện Viễn đ&ocirc;ng B&aacute;c cổ, chọn ngay v&agrave;o l&agrave;m việc ở Học viện danh tiếng n&agrave;y. Trong t&acirc;m tr&iacute; của Nguyễn Văn Tố l&uacute;c n&agrave;y l&agrave; muốn đ&aacute;nh thắng thực d&acirc;n Ph&aacute;p cần hiẻu s&acirc;u về nền văn ho&aacute; Ph&aacute;p v&agrave; c&aacute;ch cai trị thuộc địa của thực d&acirc;n Ph&aacute;p. C&ugrave;ng l&agrave;m việc với Nguyễn Văn Tố thời đ&oacute; c&oacute; bố vợ t&ocirc;i l&agrave; Tiến sĩ Nguyễn Văn Huy&ecirc;n v&agrave; thầy gi&aacute;o t&ocirc;i l&agrave; học giả Trần Văn Gi&aacute;p. Họ đ&atilde; c&oacute; kh&ocirc;ng &iacute;t những c&ocirc;ng tr&igrave;nh nghi&ecirc;n cứu s&acirc;u sắc về văn ho&aacute; Việt m&agrave; sau n&agrave;y đặt nền m&oacute;ng cho rất nhiều c&aacute;c c&ocirc;ng tr&igrave;nh nghi&ecirc;n cứu tiếp theo.<br />\r\nĐể tự n&acirc;ng cao năng lực chuy&ecirc;n m&ocirc;n của m&igrave;nh Nguyễn Văn Tố đ&atilde; tiếp tục tự học th&ecirc;m kiến thức chuy&ecirc;n m&ocirc;n v&agrave;o ngo&agrave;i giờ l&agrave;m việc v&agrave; v&agrave;o ng&agrave;y chủ nhật ở Hội Tr&iacute; Tri (nơi c&oacute; nhiều tr&iacute; thức y&ecirc;u nước tham gia như Đặng Ph&uacute;c Th&ocirc;ng, Dương Quảng H&agrave;m, Đăng Thai Mai, Nguyễn Xiển, Phạm Huy Th&ocirc;ng, Nam Sơn, Nguyễn văn Thọ, T&ocirc; Ngọc V&acirc;n, Đo&agrave;n Ph&uacute; Tứ, Trần Văn Lai&hellip;)<br />\r\nNăm 1905, ở tuổi 16 Nguyễn Văn Tố đ&atilde; đỗ đầu kỳ thi ngạch Ph&aacute;n sự-th&ocirc;ng dịch (secr&eacute;taire interpr&egrave;te) do To&agrave; Thống sứ Bắc Kỳ tổ chức. Sau đ&oacute; 1 năm, Nguyễn Văn Tố được ch&iacute;nh thức nhận mức Ph&aacute;n sự-th&ocirc;ng ng&ocirc;n phụ t&aacute; bậc 4 tại Học viện Viễn đ&ocirc;ng B&aacute;c cổ. Những năm 1911-1912 ở tuổi 22-23 ch&agrave;ng thanh ni&ecirc;n Nguyễn Văn Tố đ&atilde; c&oacute; nhiều c&ocirc;ng tr&igrave;nh nghi&ecirc;n cứu về văn học, văn ho&aacute;, lịch sử bằng tiếng Việt v&agrave; tiếng Ph&aacute;p đăng tr&ecirc;n Tập san Tri thức của Hội Tr&iacute; Tri v&agrave; tr&ecirc;n tạp ch&iacute; của Học viện Viễn đ&ocirc;ng b&aacute;c cổ. Đ&aacute;ng ch&uacute; &yacute; l&agrave; c&aacute;c c&ocirc;ng tr&igrave;nh nghi&ecirc;n cứu C&acirc;y cỏ trong nghệ thuật Việt Nam, Ch&ugrave;a Việt Nam, Gốm Đai La&hellip;<br />\r\nNăm 1912 Hội Tr&iacute; Tri đ&atilde; ph&aacute;t triển th&agrave;nh một tổ chức x&atilde; hội c&oacute; uy t&iacute;n với 14 lớp học v&agrave; 582 hội vi&ecirc;n thuộc 18 Chi hội kh&aacute;c nhau. Từ năm 1923 Nguyễn Văn Tố đ&atilde; bắt đầu sự nghiệp b&aacute;o ch&iacute; với một loạt b&agrave;i đăng tr&ecirc;n Đ&ocirc;ng Dương tạp ch&iacute;, trong đ&oacute; c&oacute; nhiều b&agrave;i dịch về tư tưởng v&agrave; học thuật từ Ph&aacute;p văn v&agrave; H&aacute;n văn. Nguyễn Văn Tố tiếp tục cộng t&aacute;c với tờ Nam Phong tạp ch&iacute;. Trong khoảng 1930-1934 Nguyễn Văn Tố c&oacute; những b&agrave;i viết bằng tiếng Ph&aacute;p được đ&ocirc;ng đảo bạn đọc quan t&acirc;m, như c&aacute;c b&agrave;i C&aacute; nh&acirc;n trong x&atilde; hội Việt Nam cổ, Về vấn đề l&ograve;ng y&ecirc;u nước v&agrave; chủ nghĩa d&acirc;n tộc, Đạo đức Việt v&agrave; đạo đức phương T&acirc;y, Về vấn đề lịch sử v&agrave; khảo cổ của Việt-Chăm, Đạo đức v&agrave; t&ocirc;n gi&aacute;o&hellip;<br />\r\nNăm 1920 số hội vi&ecirc;n của Hội Tr&iacute; Tri ở Bắc Kỳ đ&atilde; l&ecirc;n đến 1000 người v&agrave; Nguyễn Văn Tố lu&ocirc;n l&agrave; người nổi bật trong c&aacute;c hoạt động về gi&aacute;o dục v&agrave; văn ho&aacute; của Hội. Tập san Tr&iacute; Tri đ&atilde; do Nguyễn Văn Tố l&agrave;m Trưởng ban bi&ecirc;n tập. Những th&agrave;nh vi&ecirc;n t&iacute;ch cực trong Hội Tr&iacute; Tri đ&atilde; tạo n&ecirc;n một giai tầng tr&iacute; thức mới. Họ đ&atilde; hoạt động t&iacute;ch cực cho nền gi&aacute;o dục Việt Nam v&agrave; gieo mầm cho một lực lượng x&atilde; hội g&oacute;p phần l&agrave;m thay đổi tư duy kinh tế c&ugrave;ng những c&aacute;ch nh&igrave;n nhận mới tiến bộ về x&atilde; hội Việt Nam. Nguyễn Văn Tố ở tuổi ngo&agrave;i 30 đ&atilde; g&oacute;p phần quan trọng v&agrave;o việc truyền b&aacute; kiến thức v&agrave; tinh thần khoa học phương T&acirc;y v&agrave;o x&atilde; hội Việt Nam. Nền gi&aacute;o dục theo m&ocirc; h&igrave;nh phương T&acirc;y được gọi l&agrave; nền Thực học kh&aacute;c với nền học vấn v&agrave; khoa cử Nho gi&aacute;o lạc hậu.<br />\r\nNăm 1920 Nguyễn Văn Tố được xếp v&agrave;o ngạch Tham t&aacute; bậc 5 v&agrave; l&agrave;m việc tại tạp ch&iacute; của Hội Viễn đ&ocirc;ng b&aacute;c cổ. Ở tuổi 31 Nguyễn Văn Tố đ&atilde; trở th&agrave;nh chủ sự của tờ tạp ch&iacute; danh tiếng của Hội n&agrave;y. Năm 1921 Nguyễn Văn Tố được bầu l&agrave; Thủ thư của Hội Tr&iacute; Tri v&agrave; Tổng bi&ecirc;n tập tờ Tạp ch&iacute; của Hội. Năm 1923 Nguyễn Văn Tố được xếp v&agrave;o ngạch Tham T&aacute; hạng 4, năm 1926 được xếp v&agrave;o ngạch Tham t&aacute; bậc 3 v&agrave; năm 1927 được xếp v&agrave;o ngạch Tham t&aacute; bậc 2 của Học viện Viễn đ&ocirc;ng B&aacute;c cổ. Năm 1930 Nguyễn Văn Tố được bổ nhiệm l&agrave;m Vi&ecirc;n chức H&agrave;n l&acirc;m (Offcier d&rsquo;Acad&eacute;mie) của Học viện Viễn đ&ocirc;ng B&aacute;c cổ . Với c&aacute;c nghi&ecirc;n cứu về lịch sử, văn học nghệ thuật v&agrave; khoa học, năm 1931 Nguyễn Văn Tố được thưởng Hu&acirc;n chương Monisapharon của Ho&agrave;ng gia Campuchia. Hồi đ&oacute; ngo&agrave;i c&ocirc;ng việc Tổng dẫn s&aacute;ch v&agrave; lập Thư mục cho Học viện, Nguyễn Văn Tố c&ograve;n viết Việt Nam từ điển v&agrave; cộng t&aacute;c với Nguyễn Văn Vĩnh trong tạp ch&iacute; An Nam nouveau. Cũng năm đ&oacute; &ocirc;ng bắt đầu viết b&agrave;i về tục lệ Việt Nam cho tạp ch&iacute; Ph&aacute;p Việt b&aacute;o (Revue Judiciaire Franco-Annamite). Năm 1932 Nguyễn Văn Tố được giao phụ tr&aacute;ch c&ocirc;ng việc xuất bản của Hội Viễn đ&ocirc;ng B&aacute;c cổ. &Ocirc;ng c&ograve;n cộng t&aacute;c với Đ&ocirc;ng Thanh tạp ch&iacute; với h&agrave;ng loạt b&agrave;i như Nước Chi&ecirc;m Th&agrave;nh, Hai tập thơ Ph&aacute;p của người Đ&ocirc;ng Dương viết, Mỹ thuật nước nh&agrave;, Tiền sử l&agrave; g&igrave;, H&ugrave;ng Vương hay Lạc Vương, Tiếng ta gốc tự tiếng n&agrave;o, Vua Gia Long c&oacute; phải một bậc đại anh h&ugrave;ng hay kh&ocirc;ng, S&aacute;ch mới, Di t&iacute;ch th&agrave;nh Đai La, Nước ta đ&uacute;c tiền từ đời n&agrave;o, Một đoạn Nam sử rất vẻ vang, C&oacute; Vua Triệu Việt Vương hay kh&ocirc;ng, Sự t&iacute;ch &ocirc;ng L&yacute; Phật Tử, &Ocirc;ng Mai Hắc Đế c&oacute; phải người Thổ hay kh&ocirc;ng, Bộ Tự điển của Hội Khai Tr&iacute;, Văn T&agrave;u của người Nam, T&ecirc;n &ocirc;ng Ki&ecirc;n Trai l&agrave; g&igrave;, Khảo về tiền cổ, Văn ho&aacute; Đ&ocirc;ng Phương, Thời đại tự chủ bắt đầu từ bao giờ, Một bộ s&aacute;ch gi&aacute;o khoa mới khảo về Nho gi&aacute;o, một loạt b&agrave;i về Những điều luật n&ecirc;n sửa lại&hellip;Ngần ấy c&ocirc;ng tr&igrave;nh nghi&ecirc;n cứu được viết ra bởi nh&agrave; nghi&ecirc;n cứu Nguyễn Văn Tố khi chỉ mới ở tuổi 43-44. Cũng trong thời gian n&agrave;y Nguyễn Văn Tố c&ograve;n viết nhiều b&agrave;i cho tờ nguyệt san Ph&aacute;p Việt b&aacute;o v&agrave; cho tờ Tập san của Hội Tr&iacute; Tri. Năm 1934 &ocirc;ng được bổ nhiệm l&agrave;m Trợ l&yacute; ch&iacute;nh hạng 3 của Học viện Viễn đ&ocirc;ng B&aacute;c cổ v&agrave; trở th&agrave;nh th&agrave;nh vi&ecirc;n t&iacute;ch cực của Hội Những người bạn của Học viện Viễn đ&ocirc;ng B&aacute;c cổ. Ng&agrave;y 29-6-1934, ở tuổi 45 Nguyễn Văn Tố được bầu l&agrave;m Hội trưởng Hội Tr&iacute; Tri, &ocirc;ng tận t&acirc;m x&acirc;y dựng v&agrave; ph&aacute;t triển Hội n&agrave;y cho đến tận năm 1946.<br />\r\nNăm 1938, Hội Truyền b&aacute; học quốc ngữ được th&agrave;nh lập do Nguyễn Văn Tố l&agrave;m Chủ tịch.Trụ sở của Hội đặt ở số nh&agrave; 78 phố B&aacute;t Sứ H&agrave; Nội. Trong Hồi k&yacute;, đồng ch&iacute; Trần Huy Liệu đ&atilde; viết: Theo quyết nghị của Đảng, để tiến tới một tổ chức chống nạn thất học, ch&uacute;ng t&ocirc;i, một số đồng ch&iacute; đ&atilde; họp với một số nh&acirc;n sĩ để b&agrave;n về việc n&agrave;y. Buổi họp ở tại nh&agrave; anh Phan Thanh, trong đ&oacute; c&oacute; c&aacute;c anh Phan Thanh, Đăng Thai Mai, V&otilde; Nguy&ecirc;n Gi&aacute;p v&agrave; t&ocirc;i c&ugrave;ng mấy nh&acirc;n sĩ l&agrave; B&ugrave;i Kỷ Nguyễn Văn Tố&hellip; Hội nghị đi tới việc xin ph&eacute;p th&agrave;nh lập một hội, trước định l&agrave; &ldquo;Hội chống nạn thất học&rdquo;, sau đổi l&agrave; &ldquo;Hội truyền b&aacute; học Quốc ngữ&rdquo;. V&igrave; vậy sau khi thảo luận ch&uacute;ng t&ocirc;i đồng &yacute; cho cụ Nguyễn Văn Tố, Hội trưởng Hội Tr&iacute; Tri hồi ấy đứng ra đảm nhiệm việc n&agrave;y&rdquo;. Ng&agrave;y 25-5-1938 Hội Truyền b&aacute; học quốc ngữ ở Bắc Kỳ do cụ Nguyễn Văn Tố l&agrave;m Hội trưởng ch&iacute;nh thức l&agrave;m lễ ra mắt nh&acirc;n d&acirc;n v&agrave; được h&agrave;ng ngh&igrave;n người đến tham dự, hưởng ứng. Mục đ&iacute;ch của Hội l&agrave; Dạy cho đồng b&agrave;o Việt Nam biết đọc, biết viết tiếng của m&igrave;nh để dễ đọc được những điều thường thức cần d&ugrave;ng trong sự sinh hoạt h&agrave;ng ng&agrave;y. Cốt cho mọi người viết chữ quốc ngữ giống nhau. Ng&agrave;y 29-7- 1938 Thống sứ Bắc Kỳ l&agrave; Saten buộc phải k&yacute; giấy ch&iacute;nh thức c&ocirc;ng nhận sự hoạt động hợp ph&aacute;p của Hội . Hội truyền b&aacute; học quốc ngữ l&uacute;c n&agrave;y mới ch&iacute;nh thức được ra đời. Kể từ đ&acirc;y, phong tr&agrave;o truyền b&aacute; quốc ngữ lan rộng, trở th&agrave;nh một trong những hoạt động quần ch&uacute;ng s&acirc;u rộng v&agrave; cũng rất cấp tiến của những người tr&iacute; thức y&ecirc;u nước. Trong Hồi k&yacute; của m&igrave;nh, cha t&ocirc;i- nh&agrave; gi&aacute;o Nguyễn L&acirc;n đ&atilde; viết: Ở Huế, ngo&agrave;i việc giảng dạy v&agrave; s&aacute;ng t&aacute;c, t&ocirc;i tham gia t&iacute;ch cực v&agrave;o hai phong tr&agrave;o. Một l&agrave; Hội truyền b&aacute; Quốc ngữ Trung kỳ. T&ocirc;i l&agrave; một trong những người đứng ra s&aacute;ng lập, theo gương của Hội ở miền Bắc. T&ocirc;i c&ugrave;ng &ocirc;ng Đ&agrave;o Duy Anh phụ tr&aacute;ch việc soạn c&aacute;c b&agrave;i dạy. T&ocirc;i mở một lớp ở gần nh&agrave;, tức l&agrave; ở ch&ugrave;a Từ Đ&agrave;m, để thường xuy&ecirc;n tr&ocirc;ng coi v&agrave; l&ecirc;n lớp c&ugrave;ng với những anh chị em học sinh của t&ocirc;i ở Quốc học v&agrave; Đồng Kh&aacute;nh&hellip; Phong tr&agrave;o thứ hai m&agrave; t&ocirc;i tham gia l&agrave; phong tr&agrave;o Hướng Đạo&hellip;<br />\r\nTr&ecirc;n cương vị Chủ tịch của Hội, cụ Nguyễn Văn Tố tổ chức c&aacute;c hoạt động của Hội nhằm xo&aacute; nạn m&ugrave; chữ trong nh&acirc;n d&acirc;n. Cụ v&agrave; c&aacute;c th&agrave;nh vi&ecirc;n Ban l&atilde;nh đạo Hội y&ecirc;u cầu những người đ&atilde; được dạy cho biết chữ phải cố gắng dạy lại cho một số người thất học kh&aacute;c xung quanh m&igrave;nh. Hội đ&atilde; c&oacute; được 17 chi nh&aacute;nh ở Bắc kỳ với 820 lớp học, 2903 gi&aacute;o vi&ecirc;n, dạy cho 41 118 người biết đọc, biết viết. Ở Trung kỳ đ&atilde; th&agrave;nh lập được 11 chi nh&aacute;nh&hellip;Nghị quyết của Xứ uỷ Bắc Kỳ th&aacute;ng 8-1938 đ&atilde; nhận định thật l&agrave; một c&ocirc;ng cuộc ph&aacute;t triển văn ho&aacute; quan trọng.</p>\r\n', '2020-04-14', 1, 84),
(6, 'net-dep-hong-ho-nguyen-to-dong', 'Nét đẹp dòng họ Nguyễn Tồ Đống\r\n', '<p>Theo gia phả họ Nguyễn Tồ Đống ghi lại: Thượng Tổ l&agrave; Nguyễn Tr&iacute; T&agrave;i sinh năm 1248 ở Thừa Thi&ecirc;n Huế. &Ocirc;ng thi đỗ t&uacute; t&agrave;i v&agrave; l&agrave;m quan dưới triều nh&agrave; Trần. Kh&aacute;ng chiến chống qu&acirc;n Nguy&ecirc;n M&ocirc;ng lần thứ 2 (1285) &ocirc;ng được triều đ&igrave;nh cử cầm qu&acirc;n đ&aacute;nh giặc v&ugrave;ng Nghệ An, Thanh Ho&aacute; ra Bắc. Lần thứ 3 (1288) &ocirc;ng c&ugrave;ng c&aacute;c tướng sĩ nh&agrave; Trần lập c&ocirc;ng lớn đ&aacute;nh tan qu&acirc;n Nguy&ecirc;n M&ocirc;ng tr&ecirc;n s&ocirc;ng Bạch Đằng lịch sử.</p>\r\n\r\n<p>Đất nước bước v&agrave;o thời kỳ th&aacute;i b&igrave;nh thịnh trị nhưng bọn giặc cỏ thường hay nổi loạn ở c&aacute;c tỉnh miền n&uacute;i bi&ecirc;n giới ph&iacute;a Đ&ocirc;ng Bắc, Nguyễn Tr&iacute; T&agrave;i c&ugrave;ng con trai l&agrave; Nguyễn Viết Thinh được triều đ&igrave;nh cử cầm qu&acirc;n l&ecirc;n dẹp loạn trấn ải miền Đ&ocirc;ng Bắc. Khi đến x&atilde; Vị Loại, tổng Vạn An, huyện Ho&agrave;nh Bồ, phủ Sơn Định, sau l&agrave; Sơn Động &ocirc;ng lấy đồi Tồ Đống để đ&oacute;ng qu&acirc;n, r&egrave;n luyện binh sĩ, lại cho đ&agrave;o ao tắm ngựa cạnh đồi Tồ Đống n&ecirc;n mọi người quen gọi l&agrave; họ Nguyễn Tồ Đống. Nay dấu t&iacute;ch ao tắm ngựa, đấu đong qu&acirc;n vẫn c&ograve;n.</p>\r\n\r\n<p><img alt=\"\" src=\"/CodeLuanVan/public/frontend/images/bg-img/images/tin7.jpg\" style=\"height:563px; margin:10px; width:1000px\" /></p>\r\n\r\n<p>Trong lịch sử đấu tranh bảo vệ Tổ quốc, nh&agrave; L&yacute; v&agrave; nh&agrave; Trần với ch&iacute;nh s&aacute;ch &ldquo;nhu viễn&rdquo; d&ugrave;ng c&aacute;c động th&aacute;i mềm dẻo nhằm động vi&ecirc;n những người đứng đầu c&aacute;c địa phương, c&aacute;c t&ugrave; trưởng dốc sức giữ y&ecirc;n bờ c&otilde;i. Th&ecirc;m v&agrave;o đ&oacute;, khi c&oacute; sự biến, c&aacute;c t&ugrave; trưởng n&agrave;y sẽ mang qu&acirc;n đi đ&aacute;nh dẹp. Vương triều L&yacute; - Trần thường gả c&ocirc;ng ch&uacute;a cho c&aacute;c t&ugrave; trưởng, vị tướng so&aacute;i lập c&ocirc;ng lớn ở c&aacute;c địa phương hoặc cắt cử những vị tướng lĩnh giỏi l&ecirc;n v&ugrave;ng n&uacute;i trấn ải. Cha con Nguyễn Tr&iacute; T&agrave;i được nh&agrave; Trần cắt cử l&ecirc;n trấn ải ở v&ugrave;ng đất Vị Loại thuộc ch&acirc;u Sơn Động xưa.</p>\r\n\r\n<p>Kh&ocirc;ng chỉ c&oacute; c&ocirc;ng dẹp y&ecirc;n giặc cỏ bảo vệ miền bi&ecirc;n ải xưa, Nguyễn Tr&iacute; T&agrave;i c&ograve;n l&agrave; người c&oacute; c&ocirc;ng vận động nh&acirc;n d&acirc;n khai khẩn đất đai mở rộng l&agrave;ng bản tăng gia sản xuất. &Ocirc;ng mất ng&agrave;y 23 th&aacute;ng Gi&ecirc;ng năm 1321, mộ để ở Tồ Cang trong hậu cung đền thờ &ocirc;ng hiện nay. Sau n&agrave;y nh&acirc;n d&acirc;n l&agrave;ng Hạ ghi nhớ c&ocirc;ng ơn, đ&atilde; lập đ&igrave;nh Hạ t&ocirc;n thờ v&agrave; suy t&ocirc;n &ocirc;ng l&agrave; Đức Th&aacute;nh Cả.</p>\r\n\r\n<p>D&ograve;ng họ Nguyễn Tồ Đống x&acirc;y dựng đền thờ &ocirc;ng c&ugrave;ng con trai tr&ecirc;n đồi Tồ Cang, th&ocirc;n Hạ nh&igrave;n về hướng Nam. B&igrave;nh đồ kiến tr&uacute;c theo kiểu h&igrave;nh chữ đinh gồm t&ograve;a Tiền tế ba gian nối t&ograve;a Hậu cung một gian. B&ecirc;n trong Hậu cung x&acirc;y lăng mộ v&agrave; b&agrave;n thờ tổ họ Nguyễn Tr&iacute; T&agrave;i. Tại đền thờ c&ograve;n lưu giữ sắc ấn của nh&agrave; Trần cho d&ograve;ng họ Nguyễn Tồ Đống, cuốn gia phả ghi ch&eacute;p phả hệ đầy đủ từ thượng tổ Nguyễn Tr&iacute; T&agrave;i cho tới c&aacute;c đời con ch&aacute;u sau n&agrave;y. D&ograve;ng họ Nguyễn Tồ Đống c&ograve;n c&oacute; &ocirc;ng Nguyễn Chỉ Huy h&uacute;y Thọ cũng l&agrave; người t&agrave;i giỏi v&otilde; nghệ c&oacute; c&ocirc;ng đ&aacute;nh giặc tiễu phỉ lại c&oacute; c&oacute; sức khỏe giết hổ bảo vệ d&acirc;n l&agrave;ng, d&acirc;n l&agrave;ng Lốc, x&atilde; Dương Hưu (Sơn Động) đ&atilde; x&acirc;y đ&igrave;nh v&agrave; ngh&egrave; thờ &ocirc;ng l&agrave;m Th&agrave;nh Ho&agrave;ng l&agrave;ng.</p>\r\n\r\n<p>Cụ thượng tổ mất, con trai cụ Nguyễn Tr&iacute; T&agrave;i l&agrave; Nguyễn Viết Thinh tiếp nối cha cai quản v&ugrave;ng đất n&agrave;y, &ocirc;ng lấy vợ người họ Ngọc x&atilde; Vị Loại sinh hạ được ba người con, trải qua mấy trăm năm, qua mười mấy đời con ch&aacute;u nay đại diện cho d&ograve;ng họ Nguyễn Tồ Đống c&oacute; ba chi, sinh sống chủ yếu ở th&ocirc;n Hạ, x&atilde; Long Sơn. Ng&agrave;y giỗ tổ họ 23 th&aacute;ng Gi&ecirc;ng &acirc;m lịch. Tiếp nối truyền thống y&ecirc;u nước của d&ograve;ng họ, trong hai cuộc kh&aacute;ng chiến chống Ph&aacute;p v&agrave; Mỹ, d&ograve;ng họ Nguyễn Tồ Đống c&oacute; 145 người con gia nhập qu&acirc;n đội nh&acirc;n d&acirc;n, trong đ&oacute; 22 người l&agrave; thương binh v&agrave; 13 người con l&agrave; liệt sĩ hy sinh v&igrave; nền độc lập của tổ quốc. Ph&aacute;t huy truyền thống ấy, ng&agrave;y nay hậu duệ trong d&ograve;ng họ Nguyễn Tồ Đống tại huyện Sơn Động c&oacute; nhiều người đ&atilde; v&agrave; đang tham gia c&ocirc;ng t&aacute;c cống hiến tr&ecirc;n nhiều lĩnh vực tr&ecirc;n cả nước.</p>\r\n', '2020-07-29', 1, 623),
(7, 'gia-pha-la-gi', 'Gia Phả là gì? Hình thức lập Gia Phả và Tộc Phả', '<p>Gia phả: C&oacute; thể gọi l&agrave; T&ocirc;ng Chi Phả l&agrave; chi tộc nhỏ trong một D&ograve;ng tộc của một Gia phả lớn c&oacute; thể gọi l&agrave; Tộc phả. T&ocirc;ng Chi Phả l&agrave; mấu chốt của một Gia đ&igrave;nh, một Họ...Tuy n&oacute; kh&ocirc;ng đủ mọi chi tiết nhưng n&oacute; cung cấp cho ta biết từ bậc &Ocirc;ng B&agrave;, Cha Mẹ đến con ch&aacute;u một giai đọan để c&oacute; đủ t&agrave;i liệu về tiểu sử l&yacute; lịch của mỗi c&aacute; nh&acirc;n : ng&agrave;y th&aacute;ng năm sinh, nơi sinh (sinh qu&aacute;n) sống chết, nghề nghiệp, địa chỉ (tr&uacute; qu&aacute;n)...Ngo&agrave;i ra c&ograve;n nhiều vấn đề như: Học vấn, th&agrave;nh t&iacute;ch.. của mỗi người trong gia đ&igrave;nh đ&oacute; đ&atilde; đ&oacute;ng g&oacute;p li&ecirc;n quan đến x&atilde; hội đến sự hưng vong của Gia đ&igrave;nh, Tổ ti&ecirc;n, D&acirc;n tộc v&agrave; Quốc gia...Ảnh hưởng chung đến c&aacute;c sinh hoạt kinh tế, văn h&oacute;a,&nbsp;<strong><a href=\"http://lichvansu.wap.vn/thu-vien/phong-tuc-tap-quan.html\" title=\"Phong tuc tap quan\">phong tục tập qu&aacute;n</a></strong>&nbsp;trong x&atilde; hội...</p>\r\n\r\n<p>Tại Việt Nam, gia phả sơ giản ghi ch&eacute;p t&ecirc;n c&uacute;ng cơm, ng&agrave;y giỗ v&agrave; địa điểm an t&aacute;ng của &ocirc;ng cha. Theo c&aacute;c nh&agrave;&nbsp;sử học phỏng đo&aacute;n th&igrave; gia phả đ&atilde; xuất hiện từ thời Sĩ Nhiếp l&agrave;m Th&aacute;i th&uacute; ở Giao Chỉ, hoặc gần hơn tức l&agrave; từ thời L&yacute; Nam Đế (khoảng nǎm 476-545). Nhưng phải đến thời nh&agrave; L&yacute;, nh&agrave; Trần mới xuất hiện những cuốn tộc phả, thế phả (ghi cả thế thứ, t&ocirc;ng t&iacute;ch to&agrave;n họ), phả k&yacute; (ghi lại h&agrave;nh trạng, sự nghiệp của tổ ti&ecirc;n).</p>\r\n\r\n<p>Người Việt ch&uacute;ng ta đ&atilde; l&acirc;u đời bị ảnh hưởng nền văn h&oacute;a Trung hoa s&acirc;u đậm n&ecirc;n việc lập Gia phả xa hơn nữa l&agrave; Tộc phả để biết Tổ ti&ecirc;n D&ograve;ng tộc, họ h&agrave;ng anh em b&agrave; con xa gần để c&ograve;n nhận biết nhau tr&aacute;nh cho anh em con ch&aacute;u khỏi cưới hỏi lẫn nhau v&agrave; tr&aacute;nh được nhiều điều đ&aacute;ng tiếc trong Gia tộc.</p>\r\n\r\n<p><em>Anh em c&ugrave;ng d&ograve;ng m&aacute;u<br />\r\nĐ&aacute;nh nhau vỡ cả đầu<br />\r\nNgờ đ&acirc;u c&ugrave;ng d&ograve;ng họ<br />\r\nL&uacute;c đ&oacute; mới nhận nhau.</em></p>\r\n\r\n<p>Quan trọng hơn nữa để mọi th&agrave;nh vi&ecirc;n trong Gia đ&igrave;nh D&ograve;ng tộc biết đến mồ mả Tổ ti&ecirc;n, &Ocirc;ng b&agrave;, Cha mẹ...Để tỏ l&ograve;ng hiếu nghĩa, nhớ c&ocirc;ng ơn sinh th&agrave;nh dưỡng dục, hương kh&oacute;i c&uacute;ng giỗ, cầu hồn, x&acirc;y đắp sửa sang mồ mả h&agrave;ng năm...</p>\r\n\r\n<p><em>Ăn c&aacute; ao phải nhớ kẻ đ&agrave;o<br />\r\n&ldquo;Ăn c&acirc;y n&agrave;o phải r&agrave;o c&acirc;y ấy.<br />\r\nĂn quả nhớ kẻ trồng c&acirc;y&ldquo;<br />\r\nUống nước phải nhớ bởi đ&acirc;y c&oacute; nguồn.</em></p>\r\n\r\n<p>Vậy Gia phả là quy&ecirc;̉n sách, quy&ecirc;̉n t&acirc;̣p ghi chép t&ecirc;n tu&ocirc;̉i, kỷ sự (ti&ecirc;̉u sử thu gọn), ghi ngày sanh, ngày tử, vị tr&iacute; ph&acirc;̀n m&ocirc;̣ v&agrave; ng&agrave;y lập mộ (đã ch&ecirc;́t)&hellip;của từng người trong họ, theo thứ tự các đời.</p>\r\n\r\n<p>Từ đi&ecirc;̉n Hán-Vi&ecirc;̣t Đào Duy Anh định nghĩa gia phả l&agrave;: &ldquo;Sách ghi th&ecirc;́ h&ecirc;̣ trong họ và lịch sử t&ocirc;̉ ti&ecirc;n&rdquo;.</p>\r\n\r\n<p><strong>Gia phả ho&agrave;n chỉnh c&oacute; những mục g&igrave;?</strong></p>\r\n\r\n<p><img alt=\"\" src=\"/CodeLuanVan/public/frontend/images/bg-img/images/tin9.jpg\" style=\"height:190px; margin-left:200px; margin-right:200px; width:266px\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Gia phả được coi l&agrave; ho&agrave;n chỉnh trước hết phải l&agrave; một gia phả được ghi ch&eacute;p r&otilde; r&agrave;ng, chữ nghĩa ch&acirc;n phương c&oacute; ghi r&otilde; t&ecirc;n người sao lục, bi&ecirc;n soạn thuộc đời thứ mấy, năm n&agrave;o, triều vua n&agrave;o, căn cứ v&agrave;o bản n&agrave;o, t&ecirc;n người tục bi&ecirc;n qua c&aacute;c đời cũng c&oacute; cước ch&uacute; r&otilde; r&agrave;ng. Đầu gia phả c&oacute; lời tựa ghi được nguồn gốc xuất xứ của thủy tổ c&oacute; cứ liệu th&agrave;nh văn hay truyền ng&ocirc;n.</p>\r\n\r\n<p><strong>Gia phả l&agrave; gia bảo c&oacute; đ&uacute;ng kh&ocirc;ng?</strong></p>\r\n\r\n<p>Đ&uacute;ng v&agrave; rất đ&uacute;ng với những người c&oacute; &yacute; thức t&ocirc;n k&iacute;nh tổ ti&ecirc;n v&agrave; qu&yacute; trọng t&igrave;nh cảm họ h&agrave;ng gia tộc. Gia phả l&agrave; lịch sử của một d&ograve;ng họ, một gia đ&igrave;nh lớn. Thiết tưởng kh&ocirc;ng cần phải n&oacute;i nhiều về &yacute; nghĩa m&agrave; mỗi cuốn gia phả của từng d&ograve;ng họ đều đ&atilde; n&oacute;i r&otilde; trong từng lời tựa. Đ&agrave;nh rằng c&aacute;i ăn, c&aacute;i mặc để nu&ocirc;i sống gia đ&igrave;nh v&agrave; bản th&acirc;n l&agrave; việc h&agrave;ng đầu. Nhưng c&oacute; thấy nỗi day dứt của những người c&oacute; t&acirc;m huyết muốn truyền cho con ch&aacute;u biết đời cha m&igrave;nh do ai sinh ra, từ đ&acirc;u đến, tổ ti&ecirc;n c&ocirc;ng đức ra sao, ngặt v&igrave; gia phả đ&atilde; mất; c&oacute; thấy được nỗi niềm của những người tr&uacute; ngụ ở phương xa kh&ocirc;ng được cha &ocirc;ng truyền cho biết gốc g&aacute;c của m&igrave;nh từ đ&acirc;u, họ h&agrave;ng l&agrave; ai, khi đ&oacute; mới thấy đầy đủ &yacute; nghĩa của hai chữ &quot;Gia phả-Gia bảo&quot;. Giọt nước rất qu&yacute; đối với người sống tr&ecirc;n sa mạc, c&ograve;n đối với người sống ven s&ocirc;ng, dễ g&igrave; mỗi lần &quot;Uống nước&quot; lại phải &quot;Nhớ nguồn&quot;.</p>\r\n\r\n<p><img alt=\"\" src=\"/CodeLuanVan/public/frontend/images/bg-img/images/tin10.jpg\" style=\"height:800px; margin-left:20px; margin-right:20px; width:600px\" /></p>\r\n\r\n<p>Thời trước họ n&agrave;o cũng c&oacute; gia phả, c&oacute; họ từng nh&agrave; c&ograve;n c&oacute; gia phả. Nếu v&igrave; thuỷ, hỏa, đạo tặc để mất v&agrave;ng bạc- của cải g&igrave; th&igrave; mất, chứ kh&ocirc;ng để mất gia phả. Ngặt v&igrave; gia phả ng&agrave;y xưa viết bằng chữ H&aacute;n, hơn nữa từng chi từng nh&agrave; chỉ nối phần trực hệ của chi m&igrave;nh, nh&agrave; m&igrave;nh, thảng hoặc mới c&oacute; một cuốn gia phả ghi đời tiếp nối của chi anh, chi em, đến đời hai đời ba l&agrave; c&ugrave;ng, do đ&oacute; nếu một chi mất gia phả th&igrave; chi kh&aacute;c kh&ocirc;ng thể bổ cứu. Hiện nay, do mất gia phả n&ecirc;n nhiều họ tuy c&ugrave;ng ở với nhau trong một địa phương vẫn kh&ocirc;ng biết nhau, kh&ocirc;ng nhận được quan hệ họ h&agrave;ng.</p>\r\n\r\n<p>Về một &yacute; nghĩa kh&aacute;c, gia phả sở dĩ gọi l&agrave; gia bảo v&igrave; đ&oacute; l&agrave; lịch sử của tổ ti&ecirc;n nhiều đời truyền lại, l&agrave; điều tổ ti&ecirc;n muốn gửi gắm lại cho đời sau. Bất cứ họ n&agrave;o, bất cứ con người n&agrave;o trong họ, c&oacute; t&agrave;i năng lỗi lạc đến đ&acirc;u, c&aacute; nh&acirc;n cũng kh&ocirc;ng thể viết được to&agrave;n bộ gia phả m&agrave; chỉ c&oacute; kế thừa đời trước v&agrave; truyền dẫn đời sau.</p>\r\n\r\n<p>Gia phả c&aacute;c họ l&agrave; c&aacute;c nguồn bổ sung tư liệu rất qu&yacute;, rất dồi d&agrave;o cho quốc sử, nếu c&aacute;c nh&agrave; sử học biết khai th&aacute;c cũng c&oacute; khả năng từ gia bảo trở th&agrave;nh quốc bảo.</p>\r\n', '2020-07-22', 1, 645),
(8, 'hoi-nghi-gia-pha-hoc-viet-nam-khang-dinh-vai-tro-cua-dong-ho', 'HỘI NGHỊ GIA PHẢ HỌC VIỆT NAM KHẲNG ĐỊNH VAI TRÒ CỦA DÒNG HỌ', '<p>Hội nghị nhằm nối kết c&aacute;c hoạt động li&ecirc;n ng&agrave;nh gia phả học cả nước v&agrave; tăng cường đo&agrave;n kết, trao đổi kinh nghiệm giữa c&aacute;c d&ograve;ng họ trong việc gi&aacute;o dục con ch&aacute;u.</p>\r\n\r\n<p>Tại hội nghị, c&aacute;c đại biểu đ&atilde; tr&igrave;nh b&agrave;y nhiều tham luận v&agrave; chỉ r&otilde; những vấn đề nổi bật đang tồn tại trong d&ograve;ng họ, trong đ&oacute; nhấn mạnh đến gi&aacute; trị của việc duy tr&igrave; c&aacute;c d&ograve;ng họ, tộc đ&atilde; tồn tại qua nhiều năm lịch sử. Ngo&agrave;i ra, nhiều đại biểu cũng n&ecirc;u những mặt hạn chế của việc ph&aacute;t triển, ph&aacute;t huy vai tr&ograve; của d&ograve;ng họ tộc trong sự ph&aacute;t triển của x&atilde; hội hiện nay.</p>\r\n\r\n<p><img alt=\"\" src=\"https://giaphatphcm.com/userfiles/hungvuong.jpg\" style=\"height:375px; width:500px\" /></p>\r\n\r\n<p><em>Lễ rước kiệu về Đền H&ugrave;ng (Ảnh: Qu&yacute; Trung - TTXVN)</em></p>\r\n\r\n<p>Chia sẻ tại hội nghị, một số t&aacute;c giả tr&igrave;nh b&agrave;y vấn đề l&agrave;m thế n&agrave;o để thu h&uacute;t thế hệ trung ni&ecirc;n v&agrave; giới trẻ trong việc t&ocirc;n trọng Quốc Tổ H&ugrave;ng Vương, g&oacute;p phần tăng cường đo&agrave;n kết c&aacute;c d&ograve;ng họ với nhau.</p>\r\n\r\n<p>Đ&aacute;ng ch&uacute; &yacute; l&agrave; b&agrave;i tham luận tr&igrave;nh b&agrave;y chi tiết v&agrave; s&acirc;u s&aacute;t của Gi&aacute;o sư-Anh h&ugrave;ng lao động Vũ Khi&ecirc;u với chủ đề &ldquo;Vua H&ugrave;ng với trăm họ - Tr&aacute;ch nhiệm của c&aacute;c d&ograve;ng họ với nhiệm vụ trước mắt của đất nước&rdquo;; tham luận &ldquo;Cấu tr&uacute;c v&agrave; vai tr&ograve; của lịch sử d&ograve;ng họ đối với qu&ecirc; hương đất nước&rdquo; của tiến sỹ L&ecirc; Văn Tuấn&hellip;</p>\r\n\r\n<p>Dịp n&agrave;y, hội nghị cũng ghi nhận &yacute; kiến của c&aacute;c đại biểu đại diện cho c&aacute;c d&ograve;ng họ, c&aacute;c chi họ về kinh nghiệm c&aacute;c hoạt động, đồng thời tiếp thu những đề xuất hợp t&aacute;c giữa c&aacute;c d&ograve;ng họ trong nghi&ecirc;n cứu lịch sử d&ograve;ng họ, ph&aacute;t huy vai tr&ograve; của d&ograve;ng họ trong gi&aacute;o dục con ch&aacute;u, tăng cường c&aacute;c hoạt động tương th&acirc;n tương &aacute;i.</p>\r\n', '2020-07-10', 1, 62);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `gopy`
--
ALTER TABLE `gopy`
  ADD PRIMARY KEY (`id_gopy`),
  ADD KEY `id_taikhoan` (`id_taikhoan`),
  ADD KEY `id_tintuc` (`id_tintuc`);

--
-- Chỉ mục cho bảng `hinhanh`
--
ALTER TABLE `hinhanh`
  ADD PRIMARY KEY (`id_hinh`),
  ADD KEY `id_tintuc` (`id_tintuc`);

--
-- Chỉ mục cho bảng `nguoi`
--
ALTER TABLE `nguoi`
  ADD PRIMARY KEY (`id_nguoi`),
  ADD KEY `id_tinh` (`id_tinh`);

--
-- Chỉ mục cho bảng `nguongoc`
--
ALTER TABLE `nguongoc`
  ADD PRIMARY KEY (`id_nguongoc`),
  ADD KEY `id_nguoi` (`id_nguoi`),
  ADD KEY `id_nguoi_moiquanhe` (`id_nguoi_moiquanhe`);

--
-- Chỉ mục cho bảng `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sukien`
--
ALTER TABLE `sukien`
  ADD PRIMARY KEY (`id_sukien`),
  ADD KEY `id_nguoi` (`id_nguoi`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`id_taikhoan`),
  ADD KEY `id_nguoi` (`id_nguoi`);

--
-- Chỉ mục cho bảng `tinh`
--
ALTER TABLE `tinh`
  ADD PRIMARY KEY (`id_tinh`);

--
-- Chỉ mục cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  ADD PRIMARY KEY (`id_tintuc`),
  ADD KEY `id_taikhoan` (`id_taikhoan`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `gopy`
--
ALTER TABLE `gopy`
  MODIFY `id_gopy` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `hinhanh`
--
ALTER TABLE `hinhanh`
  MODIFY `id_hinh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `nguoi`
--
ALTER TABLE `nguoi`
  MODIFY `id_nguoi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `nguongoc`
--
ALTER TABLE `nguongoc`
  MODIFY `id_nguongoc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `sukien`
--
ALTER TABLE `sukien`
  MODIFY `id_sukien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id_taikhoan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `tinh`
--
ALTER TABLE `tinh`
  MODIFY `id_tinh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  MODIFY `id_tintuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `gopy`
--
ALTER TABLE `gopy`
  ADD CONSTRAINT `FK_gopy_taikhoan` FOREIGN KEY (`id_taikhoan`) REFERENCES `taikhoan` (`id_taikhoan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_gopy_tintuc` FOREIGN KEY (`id_tintuc`) REFERENCES `tintuc` (`id_tintuc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `hinhanh`
--
ALTER TABLE `hinhanh`
  ADD CONSTRAINT `FK_tintuc_hinhanh` FOREIGN KEY (`id_tintuc`) REFERENCES `tintuc` (`id_tintuc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `nguoi`
--
ALTER TABLE `nguoi`
  ADD CONSTRAINT `nguoi_ibfk_1` FOREIGN KEY (`id_tinh`) REFERENCES `tinh` (`id_tinh`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `nguongoc`
--
ALTER TABLE `nguongoc`
  ADD CONSTRAINT `nguongoc_ibfk_1` FOREIGN KEY (`id_nguoi`) REFERENCES `nguoi` (`id_nguoi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nguongoc_ibfk_2` FOREIGN KEY (`id_nguoi_moiquanhe`) REFERENCES `nguoi` (`id_nguoi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `sukien`
--
ALTER TABLE `sukien`
  ADD CONSTRAINT `sukien_ibfk_1` FOREIGN KEY (`id_nguoi`) REFERENCES `nguoi` (`id_nguoi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD CONSTRAINT `taikhoan_ibfk_1` FOREIGN KEY (`id_nguoi`) REFERENCES `nguoi` (`id_nguoi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  ADD CONSTRAINT `tintuc_ibfk_1` FOREIGN KEY (`id_taikhoan`) REFERENCES `taikhoan` (`id_taikhoan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
