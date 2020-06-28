-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 28, 2020 lúc 08:36 PM
-- Phiên bản máy phục vụ: 10.4.8-MariaDB
-- Phiên bản PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
  `tengopy` varchar(250) NOT NULL,
  `noidung` text NOT NULL,
  `ngaygopy` date NOT NULL,
  `id_nguoi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(7, 'nguyenvanto.jpg', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoi`
--

CREATE TABLE `nguoi` (
  `id_nguoi` int(11) NOT NULL,
  `hoten` varchar(250) NOT NULL,
  `gioitinh` enum('Nam','Nữ') NOT NULL,
  `ngaysinh` date NOT NULL,
  `tinhtrang_honnhan` varchar(250) NOT NULL,
  `id_tieusu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `nguoi`
--

INSERT INTO `nguoi` (`id_nguoi`, `hoten`, `gioitinh`, `ngaysinh`, `tinhtrang_honnhan`, `id_tieusu`) VALUES
(1, 'Ti', 'Nam', '2020-06-10', 'xbzcv', 1),
(2, 'Suu', 'Nữ', '2020-06-23', 'zxc', 1),
(3, 'Dan', 'Nam', '2020-06-10', 'xbzcv', 1),
(4, 'Meo', 'Nữ', '2020-06-23', 'zxc', 1),
(5, 'Thin', 'Nữ', '2020-06-23', 'zxc', 1);

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
  `noidung` varchar(250) NOT NULL,
  `url` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `slide`
--

INSERT INTO `slide` (`id`, `noidung`, `url`) VALUES
(1, 'Gia Phả Việt Nam', 'banner4.jpg'),
(2, 'Họ Tộc Việt Nam', 'banner2.jpg'),
(3, 'Quản Lý Họ Tộc', 'asd.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sukien`
--

CREATE TABLE `sukien` (
  `id_sukien` int(11) NOT NULL,
  `tensukien` varchar(250) NOT NULL,
  `noidung_sk` text NOT NULL,
  `id_nguoi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `id_taikhoan` int(11) NOT NULL,
  `tendangnhap` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `vaitro` int(10) NOT NULL,
  `email` varchar(250) NOT NULL,
  `id_nguoi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`id_taikhoan`, `tendangnhap`, `password`, `vaitro`, `email`, `id_nguoi`) VALUES
(1, 'admin', 'admin123', 0, '', 1),
(2, 'superadmin', 'superadmin123', 0, '', 2),
(3, 'pokemon', '$2y$10$AvYoUxyfrhsk/d1hnHdyc.FMpUl8yT4SHCttN8dP6n9UK7FjHs8OC', 0, 'nhanphuong1998@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tieusu`
--

CREATE TABLE `tieusu` (
  `id_tieusu` int(11) NOT NULL,
  `tentieusu` varchar(250) NOT NULL,
  `noidung` text NOT NULL,
  `quequan` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tieusu`
--

INSERT INTO `tieusu` (`id_tieusu`, `tentieusu`, `noidung`, `quequan`) VALUES
(1, 'zxcv', 'zxcv', 'TPHCM'),
(2, 'dfgsdf', 'sdfg', 'BRVT');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tintuc`
--

CREATE TABLE `tintuc` (
  `id_tintuc` int(11) NOT NULL,
  `tieude` varchar(250) NOT NULL,
  `noidung_tt` text NOT NULL,
  `ngaydang` date NOT NULL,
  `id_taikhoan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tintuc`
--

INSERT INTO `tintuc` (`id_tintuc`, `tieude`, `noidung_tt`, `ngaydang`, `id_taikhoan`) VALUES
(1, 'Giỗ tổ', 'Ngày 10/3/2020 vừa qua, Ban liên lạc họ Nguyễn Đức có chuyến thăm và dự buổi lễ giổ tổ chi họ Nguyễn ĐỨc tại Phước Xuân Ban liên lạc họ Nguyễn Đức qua lời mời của bác trưởng họ Nguyễn Đức tại đây. Về dự ngày giỗ tổ năm nay, còn có sự tham dự của đại diện ban liên lạc họ Nguyễn Đức\r\n\r\nNgay từ sáng sớm, tại từ đường họ Ninh đã rất đông vui và nhộn nhịp trong tiếng nói, tiếng cười, sự chuẩn bị thật chu đáo cho buổi lễ.\r\n\r\nBan liên lạc rất vui và vinh dự khi nhận được sự đón tiếp nồng hậu của bà con họ Ninh tại đây.\r\n\r\nMong rằng, trong những năm tiếp theo, các hoạt động thường niên của ban liên lạc ở tại các địa phương như Phước Xuân nói riêng, các địa phương khác nói chung, sẽ có nhiều bà con họ Nguyễn Đức ở các nơi về tham dự cùng, để họ Ninh ngày một đoàn kết, phát triển, vững mạnh!', '2020-06-03', 1),
(2, 'Họp thường niên', 'Ngày 2/6/2019 vừa qua, Ban liên lạc Dòng họ Nguyễn Đức đã tổ chức “Hội nghị đại biểu thường niên năm 2019” tại Quảng Ngãi. Tiếp nối sự thành công của Hội nghị đại biểu toàn quốc tổ chức ngày 3/6/2018. Về tham dự với chương trình năm nay có hơn 80 đại biểu.\r\n\r\nNgay từ rất sớm, các đoàn đại biểu đã có mặt rất đông đủ và thảo luận rất sôi nổi với nhau trước khi đại hội chính thức bắt đầu. Không giấu nổi những tình cảm, hân hoan và vui mừng sau 1 năm mới gặp lại, các đại biểu đã dành cho nhau những nụ cười thật tươi và những cái bắt tay thật chặt!', '2020-06-02', 1),
(3, 'Chương trình khuyến học', 'Không chỉ còn là một chương trình dành cho các tân sinh viên, chương trình khuyến học năm 2019 của dòng họ Nguyễn Đức năm 2019 còn thực sự là một “ngày hội” của người họ Nguyễn Đức…\r\n\r\nCác vị phụ huynh và các bạn tân sinh viên về tham dự chương trình, nơi có cộng đồng người họ Nguyễn Đức sinh sống.', '2020-06-12', 1),
(4, 'Trăm năm tìm kiếm họ hàng - Kỳ 2: Ngàn dặm họ Nguyễn', 'Một ngày cuối tháng 4-2018, chúng tôi cùng đại diện dòng họ Nguyễn ở làng Dương Nổ (Phú Vang, Thừa Thiên - Huế) tìm về đất tổ họ Nguyễn tại làng Nguyệt Viên (Hoằng Hóa, Thanh Hóa).\r\n\r\nTrong 5 người của đoàn, có 3 người lần đầu về thăm quê tổ.\r\n\r\nVề thăm quê tổ\r\n\r\nXe vừa dừng ngay đầu cầu Nguyệt Viên, những cái bắt tay, ôm chầm thắm thiết khi gặp ông Nguyễn Văn Cư, được họ Nguyễn làng Nguyệt Viên cắt cử đón đoàn. Bên mâm cơm gia đình và những chén rượu nồng, câu chuyện dòng họ được bàn luận sôi động.\r\n\r\nAnh Nguyễn Hữu Hoàng, đời thứ 21 của dòng họ Nguyễn Hữu ở Huế, hàn huyên với anh Nguyễn Trường Xuân, đời thứ 16 của họ Nguyễn ở Thanh Hóa, về chuyện công việc, gia đình. Anh Hoàng hứa sẽ dẫn anh Xuân đi thăm làng Dương Nổ và các phái họ Nguyễn ở Huế.\r\n\r\n\"Đúng là máu mủ, dù có xa cách nhau ngàn dặm vẫn thấy lòng âm ấm, cứ như đã gặp nhau, thân thuộc từ lâu lắm rồi!\" - anh Nguyễn Hữu Hoàng bày tỏ.\r\n\r\nTừ sáng sớm, hàng trăm con cháu họ Nguyễn men theo bờ đê sông Mã tiến ra khu mộ của vị cao tổ nằm giữa một bãi đất bồi trù phú. Khu mộ rộng cả trăm mét vuông vừa được xây mới, có la thành, nhà bia, bình phong và ba nấm mộ lớn.\r\n\r\nNgười họ Nguyễn ở Nguyệt Viên và các huyện thị khác của tỉnh Thanh Hóa, đoàn họ Nguyễn ở Thừa Thiên - Huế, rồi Hưng Yên, Nghệ An và cả từ Cộng hòa Pháp về... lần lượt dâng hương lên mộ ngài cao tổ.\r\n\r\nCâu chuyện và văn bản của họ Nguyễn làng Dương Nổ kể rằng dưới thời Trần (1226-1400), ngài tổ Nguyễn Quang Cao từ đất Nam Sách (Hải Dương) cùng con cháu vào mảnh đất ven bờ sông Mã nay là làng Nguyệt Viên, cắm đất lập nghiệp.\r\n\r\nTrải qua nhiều đời, đến năm 1471, ngài Nguyễn Hữu Duế thuộc đời thứ 12 theo vua Lê Thánh Tôn chinh phạt phương Nam. Sau đó, ngài Duế được bổ làm quan tri huyện ở Phú Vang của Huế.\r\n\r\nTại đây, ngài nhắm đến mảnh đất đẹp ở hữu ngạn sông Hương, rồi về quê vời con cháu họ Nguyễn vào Nam mở đất lập làng.', '2020-06-10', 1),
(5, 'Tưởng nhớ cụ Nguyễn Văn Tổ', 'Ngạn ngữ có câu Đời người không nằm ở việc sống lâu hay ngắn mà nằm ở việc giác ngộ sớm hay muộn. Cuộc đời của cụ Nguyễn Văn Tố, vị Chủ tịch Quốc hội đầu tiên vô cùng đáng kính của chúng ta đúng là người như vậy.\r\nCụ Nguyễn Văn Tố, tên hiệu là Ứng Hoè sinh ngày 5-6-1889 tại làng Đông Thành, tổng Tiến Túc, Thọ Xương, nay là số nhà 32, phố Bát Sứ, Hà Nội. Thân sinh ra Cụ là nhà nho yêu nước Nguyễn Văn Thịnh và bà Lê Thị Kim, một phụ nữ buôn bán nhỏ. Được biết Cụ còn có hai người anh em nhưng nay vẫn chưa tìm biết được tên tuổi và hoạt động của họ. Vợ của cụ là bà Vũ Thị Chắt, kém cụ hai tuổi, quê ở làng Mọc, sau khi lấy cụ đã ra Hà Nội và làm nghề buôn bán thuốc nhuộm. Vợ chồng cụ có ba người con. Người con gái đầu lấy chồng họ Đặng Vũ, làng Hành Thiện , Nam Định. Bà mất sớm vì bệnh lao. Con trai của hai ông bà là Đại uý liệt sĩ Đặng Vũ Quang Đàm, hy sinh trên chiến trường miền Nam năm 1966\r\n. Người con thứ hai là Nguyễn Văn Bảo, trước học trường Bưởi. năm 1935 sang Pháp học Nha khoa và mất tại Toulouse năm 1935. Người con trai thứ ba là nhà giáo Nguyễn Tá, dạy môn Vạn vật (Sinh học) tại trường Bưởi, sau sống cùng gia đình ở Canada, nhưng nay vẫn chưa có thông tin gì thêm.\r\nVốn bản tính thông minh, cụ được gia đình cho học chữ nho theo sách Tam Tự Kinh từ nhỏ. Chỉ sau 1 năm cậu Tố đã đọc thông, viết thạo chữ nho của cả tập sách này. Từ năm lên 6 đến năm lên 9 cậu Tố đã học hết nội dung cơ sở của Nho học thời ấy và được bố giảng giải cho nghe về những câu chuyện lịch sử từ thời Hùng Vương dựng nước.\r\nSau khi triều đình nhà Nguyễn ký hiệp ước Patenôtre với Pháp, nhiều phong trào khởi nghĩa chống Pháp đã nổ ra như phong trào Cần Vương, khởi nghĩa Bãi Sậy, khởi nghĩa Tây Bắc, khởi nghĩa Hương Khê, khởi nghĩa Yên Thế, khởi nghĩa Ba Đình… Sau đó là phong trào Đông Du và phong trào Đông Kinh nghĩa thục. Những sự kiện này đã gây chấn động khắp cả nước và tất nhiên đã tác động không ít đến chàng thanh niên Nguyễn Văn Tố. Anh rất khâm phục các nghĩa sĩ yêu nước nhưng mong muốn cứu nước bằng con đường khác, với suy nghĩ Biết mình, biết người, trăm trận, trăm thắng . Anh xin gia đình cho vào học trường Thông ngôn (Collège des interprètes) do Pháp mở tại Hà Nội. Sau ba năm học ở trường này, năm 1905 chàng trai Nguyễn Văn Tố 16 tuổi đã tốt nghiệp ở vị trí đầu bảng và được ngài Alfred Foucher, Quyền Giám đốc Học viện Viễn đông Bác cổ, chọn ngay vào làm việc ở Học viện danh tiếng này. Trong tâm trí của Nguyễn Văn Tố lúc này là muốn đánh thắng thực dân Pháp cần hiẻu sâu về nền văn hoá Pháp và cách cai trị thuộc địa của thực dân Pháp. Cùng làm việc với Nguyễn Văn Tố thời đó có bố vợ tôi là Tiến sĩ Nguyễn Văn Huyên và thầy giáo tôi là học giả Trần Văn Giáp. Họ đã có không ít những công trình nghiên cứu sâu sắc về văn hoá Việt mà sau này đặt nền móng cho rất nhiều các công trình nghiên cứu tiếp theo.\r\nĐể tự nâng cao năng lực chuyên môn của mình Nguyễn Văn Tố đã tiếp tục tự học thêm kiến thức chuyên môn vào ngoài giờ làm việc và vào ngày chủ nhật ở Hội Trí Tri (nơi có nhiều trí thức yêu nước tham gia như Đặng Phúc Thông, Dương Quảng Hàm, Đăng Thai Mai, Nguyễn Xiển, Phạm Huy Thông, Nam Sơn, Nguyễn văn Thọ, Tô Ngọc Vân, Đoàn Phú Tứ, Trần Văn Lai…)\r\nNăm 1905, ở tuổi 16 Nguyễn Văn Tố đã đỗ đầu kỳ thi ngạch Phán sự-thông dịch (secrétaire interprète) do Toà Thống sứ Bắc Kỳ tổ chức. Sau đó 1 năm, Nguyễn Văn Tố được chính thức nhận mức Phán sự-thông ngôn phụ tá bậc 4 tại Học viện Viễn đông Bác cổ. Những năm 1911-1912 ở tuổi 22-23 chàng thanh niên Nguyễn Văn Tố đã có nhiều công trình nghiên cứu về văn học, văn hoá, lịch sử bằng tiếng Việt và tiếng Pháp đăng trên Tập san Tri thức của Hội Trí Tri và trên tạp chí của Học viện Viễn đông bác cổ. Đáng chú ý là các công trình nghiên cứu Cây cỏ trong nghệ thuật Việt Nam, Chùa Việt Nam, Gốm Đai La…\r\nNăm 1912 Hội Trí Tri đã phát triển thành một tổ chức xã hội có uy tín với 14 lớp học và 582 hội viên thuộc 18 Chi hội khác nhau. Từ năm 1923 Nguyễn Văn Tố đã bắt đầu sự nghiệp báo chí với một loạt bài đăng trên Đông Dương tạp chí, trong đó có nhiều bài dịch về tư tưởng và học thuật từ Pháp văn và Hán văn. Nguyễn Văn Tố tiếp tục cộng tác với tờ Nam Phong tạp chí. Trong khoảng 1930-1934 Nguyễn Văn Tố có những bài viết bằng tiếng Pháp được đông đảo bạn đọc quan tâm, như các bài Cá nhân trong xã hội Việt Nam cổ, Về vấn đề lòng yêu nước và chủ nghĩa dân tộc, Đạo đức Việt và đạo đức phương Tây, Về vấn đề lịch sử và khảo cổ của Việt-Chăm, Đạo đức và tôn giáo…\r\nNăm 1920 số hội viên của Hội Trí Tri ở Bắc Kỳ đã lên đến 1000 người và Nguyễn Văn Tố luôn là người nổi bật trong các hoạt động về giáo dục và văn hoá của Hội. Tập san Trí Tri đã do Nguyễn Văn Tố làm Trưởng ban biên tập. Những thành viên tích cực trong Hội Trí Tri đã tạo nên một giai tầng trí thức mới. Họ đã hoạt động tích cực cho nền giáo dục Việt Nam và gieo mầm cho một lực lượng xã hội góp phần làm thay đổi tư duy kinh tế cùng những cách nhìn nhận mới tiến bộ về xã hội Việt Nam. Nguyễn Văn Tố ở tuổi ngoài 30 đã góp phần quan trọng vào việc truyền bá kiến thức và tinh thần khoa học phương Tây vào xã hội Việt Nam. Nền giáo dục theo mô hình phương Tây được gọi là nền Thực học khác với nền học vấn và khoa cử Nho giáo lạc hậu.\r\nNăm 1920 Nguyễn Văn Tố được xếp vào ngạch Tham tá bậc 5 và làm việc tại tạp chí của Hội Viễn đông bác cổ. Ở tuổi 31 Nguyễn Văn Tố đã trở thành chủ sự của tờ tạp chí danh tiếng của Hội này. Năm 1921 Nguyễn Văn Tố được bầu là Thủ thư của Hội Trí Tri và Tổng biên tập tờ Tạp chí của Hội. Năm 1923 Nguyễn Văn Tố được xếp vào ngạch Tham Tá hạng 4, năm 1926 được xếp vào ngạch Tham tá bậc 3 và năm 1927 được xếp vào ngạch Tham tá bậc 2 của Học viện Viễn đông Bác cổ. Năm 1930 Nguyễn Văn Tố được bổ nhiệm làm Viên chức Hàn lâm (Offcier d’Académie) của Học viện Viễn đông Bác cổ . Với các nghiên cứu về lịch sử, văn học nghệ thuật và khoa học, năm 1931 Nguyễn Văn Tố được thưởng Huân chương Monisapharon của Hoàng gia Campuchia. Hồi đó ngoài công việc Tổng dẫn sách và lập Thư mục cho Học viện, Nguyễn Văn Tố còn viết Việt Nam từ điển và cộng tác với Nguyễn Văn Vĩnh trong tạp chí An Nam nouveau. Cũng năm đó ông bắt đầu viết bài về tục lệ Việt Nam cho tạp chí Pháp Việt báo (Revue Judiciaire Franco-Annamite). Năm 1932 Nguyễn Văn Tố được giao phụ trách công việc xuất bản của Hội Viễn đông Bác cổ. Ông còn cộng tác với Đông Thanh tạp chí với hàng loạt bài như Nước Chiêm Thành, Hai tập thơ Pháp của người Đông Dương viết, Mỹ thuật nước nhà, Tiền sử là gì, Hùng Vương hay Lạc Vương, Tiếng ta gốc tự tiếng nào, Vua Gia Long có phải một bậc đại anh hùng hay không, Sách mới, Di tích thành Đai La, Nước ta đúc tiền từ đời nào, Một đoạn Nam sử rất vẻ vang, Có Vua Triệu Việt Vương hay không, Sự tích ông Lý Phật Tử, Ông Mai Hắc Đế có phải người Thổ hay không, Bộ Tự điển của Hội Khai Trí, Văn Tàu của người Nam, Tên ông Kiên Trai là gì, Khảo về tiền cổ, Văn hoá Đông Phương, Thời đại tự chủ bắt đầu từ bao giờ, Một bộ sách giáo khoa mới khảo về Nho giáo, một loạt bài về Những điều luật nên sửa lại…Ngần ấy công trình nghiên cứu được viết ra bởi nhà nghiên cứu Nguyễn Văn Tố khi chỉ mới ở tuổi 43-44. Cũng trong thời gian này Nguyễn Văn Tố còn viết nhiều bài cho tờ nguyệt san Pháp Việt báo và cho tờ Tập san của Hội Trí Tri. Năm 1934 ông được bổ nhiệm làm Trợ lý chính hạng 3 của Học viện Viễn đông Bác cổ và trở thành thành viên tích cực của Hội Những người bạn của Học viện Viễn đông Bác cổ. Ngày 29-6-1934, ở tuổi 45 Nguyễn Văn Tố được bầu làm Hội trưởng Hội Trí Tri, ông tận tâm xây dựng và phát triển Hội này cho đến tận năm 1946.\r\nNăm 1938, Hội Truyền bá học quốc ngữ được thành lập do Nguyễn Văn Tố làm Chủ tịch.Trụ sở của Hội đặt ở số nhà 78 phố Bát Sứ Hà Nội. Trong Hồi ký, đồng chí Trần Huy Liệu đã viết: Theo quyết nghị của Đảng, để tiến tới một tổ chức chống nạn thất học, chúng tôi, một số đồng chí đã họp với một số nhân sĩ để bàn về việc này. Buổi họp ở tại nhà anh Phan Thanh, trong đó có các anh Phan Thanh, Đăng Thai Mai, Võ Nguyên Giáp và tôi cùng mấy nhân sĩ là Bùi Kỷ Nguyễn Văn Tố… Hội nghị đi tới việc xin phép thành lập một hội, trước định là “Hội chống nạn thất học”, sau đổi là “Hội truyền bá học Quốc ngữ”. Vì vậy sau khi thảo luận chúng tôi đồng ý cho cụ Nguyễn Văn Tố, Hội trưởng Hội Trí Tri hồi ấy đứng ra đảm nhiệm việc này”. Ngày 25-5-1938 Hội Truyền bá học quốc ngữ ở Bắc Kỳ do cụ Nguyễn Văn Tố làm Hội trưởng chính thức làm lễ ra mắt nhân dân và được hàng nghìn người đến tham dự, hưởng ứng. Mục đích của Hội là Dạy cho đồng bào Việt Nam biết đọc, biết viết tiếng của mình để dễ đọc được những điều thường thức cần dùng trong sự sinh hoạt hàng ngày. Cốt cho mọi người viết chữ quốc ngữ giống nhau. Ngày 29-7- 1938 Thống sứ Bắc Kỳ là Saten buộc phải ký giấy chính thức công nhận sự hoạt động hợp pháp của Hội . Hội truyền bá học quốc ngữ lúc này mới chính thức được ra đời. Kể từ đây, phong trào truyền bá quốc ngữ lan rộng, trở thành một trong những hoạt động quần chúng sâu rộng và cũng rất cấp tiến của những người trí thức yêu nước. Trong Hồi ký của mình, cha tôi- nhà giáo Nguyễn Lân đã viết: Ở Huế, ngoài việc giảng dạy và sáng tác, tôi tham gia tích cực vào hai phong trào. Một là Hội truyền bá Quốc ngữ Trung kỳ. Tôi là một trong những người đứng ra sáng lập, theo gương của Hội ở miền Bắc. Tôi cùng ông Đào Duy Anh phụ trách việc soạn các bài dạy. Tôi mở một lớp ở gần nhà, tức là ở chùa Từ Đàm, để thường xuyên trông coi và lên lớp cùng với những anh chị em học sinh của tôi ở Quốc học và Đồng Khánh… Phong trào thứ hai mà tôi tham gia là phong trào Hướng Đạo…\r\nTrên cương vị Chủ tịch của Hội, cụ Nguyễn Văn Tố tổ chức các hoạt động của Hội nhằm xoá nạn mù chữ trong nhân dân. Cụ và các thành viên Ban lãnh đạo Hội yêu cầu những người đã được dạy cho biết chữ phải cố gắng dạy lại cho một số người thất học khác xung quanh mình. Hội đã có được 17 chi nhánh ở Bắc kỳ với 820 lớp học, 2903 giáo viên, dạy cho 41 118 người biết đọc, biết viết. Ở Trung kỳ đã thành lập được 11 chi nhánh…Nghị quyết của Xứ uỷ Bắc Kỳ tháng 8-1938 đã nhận định thật là một công cuộc phát triển văn hoá quan trọng.', '2020-04-14', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `gopy`
--
ALTER TABLE `gopy`
  ADD PRIMARY KEY (`id_gopy`),
  ADD KEY `id_nguoi` (`id_nguoi`);

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
  ADD KEY `id_tieusu` (`id_tieusu`);

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
-- Chỉ mục cho bảng `tieusu`
--
ALTER TABLE `tieusu`
  ADD PRIMARY KEY (`id_tieusu`);

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
  MODIFY `id_gopy` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `hinhanh`
--
ALTER TABLE `hinhanh`
  MODIFY `id_hinh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `nguoi`
--
ALTER TABLE `nguoi`
  MODIFY `id_nguoi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `id_sukien` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id_taikhoan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tieusu`
--
ALTER TABLE `tieusu`
  MODIFY `id_tieusu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  MODIFY `id_tintuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `gopy`
--
ALTER TABLE `gopy`
  ADD CONSTRAINT `gopy_ibfk_1` FOREIGN KEY (`id_nguoi`) REFERENCES `nguoi` (`id_nguoi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `hinhanh`
--
ALTER TABLE `hinhanh`
  ADD CONSTRAINT `FK_tintuc_hinhanh` FOREIGN KEY (`id_tintuc`) REFERENCES `tintuc` (`id_tintuc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `nguoi`
--
ALTER TABLE `nguoi`
  ADD CONSTRAINT `nguoi_ibfk_1` FOREIGN KEY (`id_tieusu`) REFERENCES `tieusu` (`id_tieusu`) ON DELETE CASCADE ON UPDATE CASCADE;

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
