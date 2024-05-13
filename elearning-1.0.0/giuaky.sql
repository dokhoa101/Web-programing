-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2024 at 08:48 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `giuaky`
--

-- --------------------------------------------------------

--
-- Table structure for table `baigiang`
--

CREATE TABLE `baigiang` (
  `IDBaiGiang` int(11) NOT NULL,
  `TenBaiGiang` varchar(20) NOT NULL,
  `MaMonHoc` varchar(5) NOT NULL,
  `Noidung` text NOT NULL,
  `Tailieu` text NOT NULL,
  `Thoidiem` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `baigiang`
--

INSERT INTO `baigiang` (`IDBaiGiang`, `TenBaiGiang`, `MaMonHoc`, `Noidung`, `Tailieu`, `Thoidiem`) VALUES
(10, 'chương 123', '01001', 'abcdefg', 'upload/20240507105701lab6.py\n', '2024-05-07 10:57:01'),
(11, 'hjagkljhdfa', '01001', 'Đoạn 1.10.33 trong \"De Finibus Bonorum et Malorum\" viết bởi Cicero năm 45 trước Công Nguyên\"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum qui', 'upload/20240505111128lab4.py\nupload/20240505111128lab5.py\nupload/20240505111128lab6.py\n', '2024-05-05 11:11:28'),
(14, 'jhgjk,hsa', '01002', '12345', 'upload/20240506115042lab4.py\nupload/20240506115042lab5.py\nupload/20240506115042lab6.py\n', '2024-05-08 06:49:33'),
(17, 'abc', '01002', 'syudakjhd', 'upload/20240508064735lab4.py\nupload/20240508064735lab5.py\nupload/20240508064735lab6.py\n', '2024-05-08 06:47:35'),
(24, 'chuong 2', '01001', 'safS', 'upload/20240511105225lab5.py\nupload/20240511105225lab6.py\n', '2024-05-11 10:52:25'),
(40, 'chuong 2', '01001', 'bai 1', 'upload/20240512074000lab4.py\nupload/20240512074000lab5.py\n', '2024-05-12 07:40:24'),
(41, 'jhhbjkldf', '01001', 'fsdhjhjfad', '', '2024-05-12 11:31:14'),
(42, 'fgdssdf', '01003', 'hgdfgag', 'upload/20240512011045lab5.py\nupload/20240512011045lab6.py\n', '2024-05-12 01:10:45'),
(43, 'fsgff', '01001', 'hsfdsgf', '', '2024-05-13 12:16:00');

-- --------------------------------------------------------

--
-- Table structure for table `diem`
--

CREATE TABLE `diem` (
  `MaSV` varchar(7) NOT NULL,
  `MaMonHoc` varchar(5) NOT NULL,
  `CuoiKy` float NOT NULL,
  `GiuaKy` float NOT NULL,
  `QuaTrinh2` float NOT NULL,
  `QuaTrinh1` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doitac`
--

CREATE TABLE `doitac` (
  `MaCongTy` varchar(3) NOT NULL,
  `TenCongTy` varchar(20) NOT NULL,
  `Infor` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `giangvien`
--

CREATE TABLE `giangvien` (
  `Email` varchar(30) NOT NULL,
  `pass` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `giangvien`
--

INSERT INTO `giangvien` (`Email`, `pass`) VALUES
('202401@teacher.tdtu.vn', 'leduckhien'),
('202402@teacher.tdtu.vn', 'dakho1010'),
('202403@teacher.tdtu.vn', 'catrentroi'),
('202404@teacher.tdtu.vn', 'chungtacuahientai'),
('202405@teacher.tdtu.vn', 'lovcakakesitink');

-- --------------------------------------------------------

--
-- Table structure for table `lop`
--

CREATE TABLE `lop` (
  `MaLop` varchar(7) NOT NULL,
  `MaSV` varchar(7) NOT NULL,
  `MaGV` varchar(30) NOT NULL,
  `MaMonHoc` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `monhoc`
--

CREATE TABLE `monhoc` (
  `IDMonHoc` varchar(5) NOT NULL,
  `TenMonHoc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `monhoc`
--

INSERT INTO `monhoc` (`IDMonHoc`, `TenMonHoc`) VALUES
('01001', 'Lap trinh web va ung dung\r\n'),
('01002', 'To chuc may tinh'),
('01003', 'Giai tich CNTT'),
('01004', 'Nhap mon mang may tinh'),
('01005', 'He dieu hanh'),
('02001', 'Lap trinh huong doi tuong'),
('02002', 'He co so du lieu'),
('02003', 'Giao thuc mang'),
('02004', 'Lap trinh mang'),
('03001', 'IoT co ban'),
('03002', 'Thiet ke mang\r\n     '),
('03003', 'Cong nghe phan mem');

-- --------------------------------------------------------

--
-- Table structure for table `sinhvien`
--

CREATE TABLE `sinhvien` (
  `MaSV` varchar(7) NOT NULL,
  `infor` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sinhvien`
--

INSERT INTO `sinhvien` (`MaSV`, `infor`) VALUES
('5220010', 'Khoa hoc may tinh'),
('5220011', 'Khoa hoc may tinh'),
('5220012', 'Khoa hoc may tinh'),
('5220013', 'Khoa hoc may tinh'),
('5220014', 'Khoa hoc may tinh'),
('5220015', 'Khoa hoc may tinh'),
('5220020', 'Mang may tinh va truyen thong du lieu'),
('5220021', 'Mang may tinh va truyen thong du lieu'),
('5220022', 'Mang may tinh va truyen thong du lieu'),
('5220023', 'Mang may tinh va truyen thong du lieu'),
('5220024', 'Mang may tinh va truyen thong du lieu'),
('5220025', 'Mang may tinh va truyen thong du lieu'),
('5220030', 'Cong nghe phan mem'),
('5220031', 'Cong nghe phan mem'),
('5220032', 'Cong nghe phan mem'),
('5220033', 'Cong nghe phan mem'),
('5220034', 'Cong nghe phan mem'),
('5220035', 'Cong nghe phan mem'),
('5220036', 'Cong nghe phan mem');

-- --------------------------------------------------------

--
-- Table structure for table `thongbaosv`
--

CREATE TABLE `thongbaosv` (
  `MaTB` int(11) NOT NULL,
  `titleTB` text NOT NULL,
  `NoiDung` text NOT NULL,
  `time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `thongbaosv`
--

INSERT INTO `thongbaosv` (`MaTB`, `titleTB`, `NoiDung`, `time`) VALUES
(2, 'Tôi đã khô còn bạn?', 'Red Star News đưa tin ngày 3/5, đại diện của Cục quản lý khẩn cấp quận Tập Mỹ (Hạ Môn) xác nhận có xảy ra vụ tai nạn thương tâm trên địa bàn. Ba nạn nhân sau đó được đưa đến bệnh viện cấp cứu. Đáng tiếc, một trong số họ được xác định tử vong sau khi quá trình hồi sức không thành công. Hai người khác đã qua cơn nguy kịch nhưng bị gãy đốt sống lưng.\r\n\r\nĐại diện Cục Văn hóa và Du lịch quận Tập Mỹ cho biết nhà chức trách đang điều tra vụ việc, phải chờ báo cáo cuối cùng mới rõ tình hình cụ thể.\r\n\r\nPhía Công ty Biểu diễn Nghệ thuật Hạ Môn Linh Linh cũng thông báo các tình huống liên quan đến vụ tai nạn đang được xử lý, đồng thời cam kết bồi thường và an ủi hợp lý cho các gia đình liên quan.\r\n\r\n163 dẫn lời một số người quen thuộc với vụ việc cho biết 3 nạn nhân bị rơi là Mỹ Lôi, Huệ Huệ và Tâm Ngữ. Trong đó, người xấu số là Tâm Ngữ, mới chỉ hơn 10 tuổi. Mỹ Lôi và Huệ Huệ đã qua tuổi vị thành niên.\r\n\r\nKhông lâu sau vụ tai nạn, mẹ của Tâm Ngữ đăng lên tài khoản cá nhân dòng trạng thái: \"Đứa con tội nghiệp của tôi, mẹ sẽ đau khổ suốt đời\".', '2024-05-10'),
(3, 'Cái gì? Đức Hiền hả???????\r\nHmmmmmmmmmmmmmmmmmmmmmmmmmmmm', '“Khi biết nổ tại Công ty Bình Minh làm chết nhiều người. Tôi vội lấy điện thoại ra gọi cho chồng thì điện thoại thuê bao, không liên lạc được. Lúc này, tôi nghi ngờ chồng bị nạn rồi, vì trước đây khi có vụ gì là chồng hay gọi điện về báo cho hay, nhưng hôm đó anh ấy không gọi về...”, chị Đào kể trong đau đớn.\r\n\r\nCũng theo lời chị Đào, một lúc sau, chị chạy xe máy qua Công ty Bình Minh để xem thì thấy hiện trường tan hoang, nhiều người chết và bị thương. Khi đến nhận dạng, chị cũng không nhận ra thi thể chồng mình, vì không còn nguyên vẹn.\r\n\r\n“Hồi anh C. còn sống, hai vợ chồng động viên nhau cố gắng làm kiếm tiền về quê xây dựng một căn nhà kiên cố để ở, rồi kiếm việc làm thêm ở quê trang trải cuộc sống. Nếu được nghỉ lễ về quê thì anh ấy không phải chết đột ngột như vậy”, kể đến đây khóe mắt chị Đào ngấn lệ và không nói thêm được nữa.\r\n\r\nNgồi tiếp chuyện với chúng tôi, ông Trần Văn Miên (66 tuổi, cha ruột anh C.) buồn bã nói thêm: “Theo lẽ, mấy ngày nghỉ lễ này, hai vợ chồng nó về nhà chơi, nhưng cố gắng ở lại làm một ngày được tính bằng hai ngày công thường. Nào ngờ chuyện lại xảy ra như vậy…”.', '2024-05-07'),
(4, 'Bình thường thôiiiiiiiiiiiiiiiiiiiii', 'ất cả nguyện vọng của thí sinh bắt buộc phải đăng ký xét tuyển trên Cổng thông tin tuyển sinh chung của Bộ GD&ĐT hoặc tại Cổng dịch vụ công quốc gia (nội dung và thời gian thực hiện theo quy định). Thí sinh không đăng ký nguyện vọng vào những ngành, chương trình đào tạo không đủ điều kiện để xét tuyển.\r\n\r\nThứ hai, thí sinh cần khai báo, cung cấp đầy đủ, chính xác tất cả thông tin đăng ký dự tuyển vào các cơ sở đào tạo.\r\n\r\nNội dung tiếp theo khai báo chính xác, trung thực và chịu trách nhiệm thông tin (các mốc thời gian theo hướng dẫn) để hưởng khu vực ưu tiên, đối tượng ưu tiên (nếu có) tại thời điểm đăng ký dự thi kỳ thi tốt nghiệp THPT năm 2024 (gửi kèm minh chứng đối tượng ưu tiên nếu có). Thông tin nơi thường trú ở các giai đoạn do thí sinh khai báo sẽ được các cơ quan chức năng kiểm tra và xác thực trên cơ sở dữ liệu về dân cư.\r\n\r\nThứ tư, thí sinh đủ điều kiện đăng ký xét tuyển theo phương thức xét tuyển thẳng, ưu tiên xét tuyển theo quy định của Quy chế tuyển sinh của Bộ GD&ĐT, lưu ý trước 17h ngày 30/6 cần nộp hồ sơ xét tuyển thẳng và ưu tiên xét tuyển không giới hạn số nguyện vọng về các cơ sở đào tạo theo hướ', '2024-05-10');

-- --------------------------------------------------------

--
-- Table structure for table `thongtinvieclam`
--

CREATE TABLE `thongtinvieclam` (
  `maso` int(6) NOT NULL,
  `vitri` varchar(255) NOT NULL,
  `luong` float NOT NULL,
  `yeucau` text NOT NULL,
  `time` date NOT NULL,
  `tencongty` varchar(255) NOT NULL,
  `gioithieucongty` text NOT NULL,
  `anhcongty` text NOT NULL,
  `diachicongty` text NOT NULL,
  `kinhnghiem` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `thongtinvieclam`
--

INSERT INTO `thongtinvieclam` (`maso`, `vitri`, `luong`, `yeucau`, `time`, `tencongty`, `gioithieucongty`, `anhcongty`, `diachicongty`, `kinhnghiem`) VALUES
(1, 'Senior Fullstack Developer (Magento, Korean speaking)', 3000, 'Yêu cầu công việc\r\n+6 years of experience with Magento 2 Opensource or Commerce and having experience in Java are required\r\nBackend Development: Magento2, MAMP, LAMP, Elasticsearch, Redis\r\nSource control: Git, Gitlab\r\nFrontend Development: JavaScript, CSS3, Less, KnockoutJS\r\nInfrastructure: Magento Cloud\r\nUnderstanding design patterns, coding standards, solid\r\nHaving Magento 2 certificate is a plus.\r\nHaving clear code style, methodical, fully annotated\r\nGood English skills and Korean skills as well\r\nUnderstanding optimizing query speed, optimizing database is an advantage \r\nHumble, open-minded, eager to learn and share knowledge \r\nHas a professional working style, and good teamwork and communication ability', '2024-05-02', 'CJ OLIVENETWORKS VINA CO., LTD', 'Mô tả công việc\r\nAbout Us:\r\n\r\nCJ OliveNetworks Vina is a dynamic and innovative IT company, dedicated to fostering talent and providing exciting growth opportunities. We are committed to innovation and excellence in everything we do, and we are looking for talented individuals to join our team and help us continue to grow. We are seeking a highly skilled and motivated Senior Fullstack Developer to join our growing team.\r\n\r\n \r\n\r\nJob Description\r\n\r\nOperate a cosmetics online mall, e-commerce systems in Taiwan, Vietnam, Korea, Singapore, and Vietnam, and develop E-commerce platforms with Magento 2 Commerce Cloud\r\nE-commerce experience and business understanding are required\r\nContribute to the overall component design and play a key role in implementing features\r\nDesign, develop and test specific component features and functions, prepare functional specifications, and build prototypes\r\nWork on multiple highly complex major tasks requiring innovative solutions including security, scalability, and performance requirements\r\nImplement E-commerce features like site search, product recommendation, payment, shipping, promotions, loyalty, return & exchange, and more\r\nResearch, install Magento extensions, and customize to meet client requirements \r\nIntegrate with 3rd-party applications e.g. SAP, CRM, POS via APIs \r\nEnsure proper test coverage exists based on requirement and design specification\r\nWrite test cases for the existing and the created code to ensure compatibility and stability', 'https://static.ybox.vn/2021/8/5/1628240503557-Thi%E1%BA%BFt%20k%E1%BA%BF%20kh%C3%B4ng%20t%C3%AAn%20(14).png', 'TPHCM', '4 - 6+ năm'),
(2, 'Tester (QA QC)', 1000, 'Yêu cầu công việc\\r\\nTốt nghiệp Đại học chuyên ngành CNTT, Toán tin, Viễn thông, Tài chính ngân hàng... hoặc trái ngành nhưng đã có kinh nghiệm, đã học các khóa học về kiểm thử; \\r\\nKinh nghiệm từ 01 năm trở lên; \\r\\nHiểu biết về quy trình phát triển phần mềm và các giai đoạn kiểm thử; \\r\\nCó khả năng/kinh nghiệm lập các Test Plan và thiết kế các Test Case, Test Data; \\r\\nCó tư duy logic cao, kỹ năng phân tích và giải quyết vấn đề tốt;\\r\\nThành thạo tin học văn phòng; \\r\\nTiếng Anh đọc hiểu tài liệu là một lợi thế.', '2024-05-03', 'BIM Group', 'Mô tả công việc\\r\\nTham gia phân tích làm rõ yêu cầu; \\r\\nLên kế hoạch (test plan) và viết kịch bản test (test case); \\r\\nQuản lý, phân tích và theo dõi kết quả kiểm tra, báo cáo test; \\r\\nTest sản phẩm, viết/kiểm tra tài liệu hướng dẫn cài đặt và hướng dẫn sử dụng; \\r\\nNghiên cứu, ứng dụng các công cụ test phục vụ cho việc kiểm thử;\\r\\nHỗ trợ các bộ phận phân tích nghiệp vụ, triển khai và đào tạo người sử dụng; \\r\\nThực hiện các công việc khác theo sự phân công của Quản lý trực tiếp.', 'https://th.bing.com/th/id/OIP.ESGM4tkdC4iPjjZVAMqMpAAAAA?rs=1&pid=ImgDetMain', 'TPHCM', 'không yêu cầu kinh nghiệm');

-- --------------------------------------------------------

--
-- Table structure for table `tinkhoacntt`
--

CREATE TABLE `tinkhoacntt` (
  `MaTin` int(4) NOT NULL,
  `title` text NOT NULL,
  `body` text NOT NULL,
  `linkAnh` text DEFAULT NULL,
  `time` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tinkhoacntt`
--

INSERT INTO `tinkhoacntt` (`MaTin`, `title`, `body`, `linkAnh`, `time`) VALUES
(1, 'Trường Đại học Tôn Đức Thắng tổ chức Ngày hội tư vấn tuyển sinh đại học năm 2024', 'Ngày 30/3/2024, Ngày hội tư vấn tuyển sinh đại học năm 2024 (TDTU Open Day 2024) được tổ chức tại trụ sở chính của Trường Đại học Tôn Đức Thắng (TDTU) đã thu hút khoảng 3.000 học sinh các trường THPT trên địa bàn TP. Hồ Chí Minh và các tỉnh phía Nam đến tham dự.', 'https://tdtu.edu.vn/sites/www/files/articles/2024/Mar/OPEN%20DAY%202024/NBP_0293.png', '30/03/2024'),
(2, 'Trường ĐH Tôn Đức Thắng tổ chức Lễ kết nạp Đoàn viên ưu tú vào Đảng Cộng sản Việt Nam nhân Tháng thanh niên năm 2024', 'Ngày 24/03/2024, tại Trường Đại học Tôn Đức Thắng, Đoàn TNCS HCM Trường Đại học Tôn Đức Thắng phối hợp cùng các cấp ủy chi bộ sinh viên đã long trọng tổ chức Lễ kết nạp Đảng cho 06 đoàn viên ưu tú nhân kỷ niệm 93 năm Ngày thành lập Đoàn TNCS Hồ Chí Minh (26/3/1931 – 26/3/2024).Đến tham dự Lễ kết nạp Đảng viên mới dịp này có sự hiện diện của đồng chí Đặng Thùy Khánh Vân - Ủy viên Ban Chấp hành, Trưởng ban Tuyên giáo Đảng bộ Khối Đại học - Cao đẳng TP.HCM; Đồng chí Nguyễn Tất Toàn - Uỷ viên Ban Thường vụ, Trưởng Ban Thanh niên trường học Thành Đoàn, Phó Chủ tịch Thường trực Hội sinh viên Việt Nam Thành phố; TS. Vũ Anh Đức, Bí thư Đảng ủy, Chủ tịch Hội đồng Trường; TS. Đồng Sĩ Thiên Châu - Phó Hiệu trưởng Nhà trường cùng các đồng chí Đảng ủy viên, Ủy viên Ban Chấp hành Đoàn – Hội trường, quý vị phụ huynh của các đồng chí đảng viên mới và tập thể Đảng viên các chi bộ.Trong không khí hân hoan chào mừng kỷ niệm 93 năm Ngày thành lập Đoàn TNCS Hồ Chí Minh, Đoàn trường Đại học Tôn Đức Thắng đã tổ chức Lễ Dâng hương báo công Chủ tịch Tôn Đức Thắng, tổng kết công tác bồi dưỡng, phát hiện và giới thiệu nguồn Đoàn viên ưu tú cho Đảng, phối hợp tổ chức Lễ kết nạp Đảng viên mới.Phát biểu tại buổi lễ, đồng chí Vũ Anh Đức – Bí thư Đảng uỷ, Chủ tịch Hội đồng Trường đã chúc mừng các tập thể Chi bộ, biểu dương sự cố gắng của Đoàn trường, các tập thể Chi bộ và giao nhiệm vụ cho các đồng chí Đảng viên mới kết nạp nhân dịp đặc biệt này.', 'https://tdtu.edu.vn/sites/www/files/articles/2024/Mar/K%E1%BA%BFt%20n%E1%BA%A1p%20%C4%90%E1%BA%A3ng%20vi%C3%AAn%20m%E1%BB%9Bi/TDTU1670.png', '24/03/2024'),
(3, 'Trường ĐH Tôn Đức Thắng tiếp và làm việc với đoàn Viện Công nghệ Ấn Độ Indore, Ấn Độ', 'Ngày 11/3/2024, Đoàn Viện Công nghệ Ấn Độ Indore (Indian Institute of Technology Indore - IIT Indore), Ấn Độ do GS. Suhas Joshi - Giám đốc IIT Indore làm Trưởng đoàn đã đến thăm và làm việc tại Trường Đại học Tôn Đức Thắng (TDTU).\r\n\r\nTiếp và làm việc với  Đoàn IIT Indore, có sự hiện diện của TS. Đinh Hoàng Bách - Viện trưởng, Viện Hợp tác, Nghiên cứu và Đào tạo quốc tế (INCRETI); TS. Trần Thanh Phương - Phụ trách Khoa, Khoa Điện - Điện tử; TS. Phạm Văn Huy - Trưởng Khoa, Khoa Công nghệ thông tin và giảng viên Khoa Khoa học ứng dụng và Khoa Kỹ thuật công trình TDTU.\r\n\r\nHai bên đã trao đổi nội dung hợp tác về các lĩnh vực như: Trao đổi về việc xây dựng các chương trình trao đổi ngắn hạn cho sinh viên các ngành Kỹ thuật và Công nghệ của hai trường sang học tập/thực tập/trao đổi văn hóa; Hợp tác nghiên cứu giữa các nhóm nghiên cứu/trung tâm/viện nghiên cứu các ngành Kỹ thuật và Công nghệ của hai trường; Tổ chức hội nghị / hội thảo / seminar / workshop.\r\n\r\nPhát biểu tại buổi làm việc, GS. Suhas Joshi - Giám đốc IIT Indore đã giới thiệu về lịch sử hình thành và phát triển của IIT Indore, cũng như dành lời cảm ơn về sự hiếu khách, tiếp đón nồng hậu và thân tình của Nhà trường.\r\n\r\nIIT Indore xếp Top 500 theo Bảng xếp hạng (BXH) QS World University Ranking 2024; Xếp Top 800 theo BXH THE World University Ranking 2023. IIT Indore được thành lập vào năm 2009, là một trong hệ thống các viện công nghệ được chính phủ Ấn Độ thành lập nhằm đẩy mạnh việc đào tạo nguồn nhân lực chất lượng cao trong lĩnh vực kỹ thuật và công nghệ cho Ấn Độ. Với thế mạnh là Điện – Điện tử, Khoa học máy tính và Hệ thống công nghệ thông tin, Cơ khí, Toán, Vật lý và Thiên văn học, IIT Indore hiện có gần 2000 sinh viên theo học các ngành nghề về kỹ thuật và khoa học – công nghệ.', 'https://tdtu.edu.vn/sites/www/files/articles/2024/Mar/TDTU-IIT/tdtu-iit-2.png', '12/03/2024');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `baigiang`
--
ALTER TABLE `baigiang`
  ADD PRIMARY KEY (`IDBaiGiang`),
  ADD KEY `MaMonHoc` (`MaMonHoc`);

--
-- Indexes for table `diem`
--
ALTER TABLE `diem`
  ADD KEY `MaSV` (`MaSV`),
  ADD KEY `MaMonHoc` (`MaMonHoc`);

--
-- Indexes for table `doitac`
--
ALTER TABLE `doitac`
  ADD PRIMARY KEY (`MaCongTy`);

--
-- Indexes for table `giangvien`
--
ALTER TABLE `giangvien`
  ADD PRIMARY KEY (`Email`);

--
-- Indexes for table `lop`
--
ALTER TABLE `lop`
  ADD KEY `MaSV` (`MaSV`),
  ADD KEY `MaMonHoc` (`MaMonHoc`),
  ADD KEY `MaGV` (`MaGV`);

--
-- Indexes for table `monhoc`
--
ALTER TABLE `monhoc`
  ADD PRIMARY KEY (`IDMonHoc`);

--
-- Indexes for table `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD PRIMARY KEY (`MaSV`);

--
-- Indexes for table `thongbaosv`
--
ALTER TABLE `thongbaosv`
  ADD PRIMARY KEY (`MaTB`);

--
-- Indexes for table `thongtinvieclam`
--
ALTER TABLE `thongtinvieclam`
  ADD PRIMARY KEY (`maso`);

--
-- Indexes for table `tinkhoacntt`
--
ALTER TABLE `tinkhoacntt`
  ADD PRIMARY KEY (`MaTin`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `baigiang`
--
ALTER TABLE `baigiang`
  MODIFY `IDBaiGiang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `thongbaosv`
--
ALTER TABLE `thongbaosv`
  MODIFY `MaTB` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `thongtinvieclam`
--
ALTER TABLE `thongtinvieclam`
  MODIFY `maso` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tinkhoacntt`
--
ALTER TABLE `tinkhoacntt`
  MODIFY `MaTin` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `baigiang`
--
ALTER TABLE `baigiang`
  ADD CONSTRAINT `baigiang_ibfk_1` FOREIGN KEY (`MaMonHoc`) REFERENCES `monhoc` (`IDMonHoc`);

--
-- Constraints for table `diem`
--
ALTER TABLE `diem`
  ADD CONSTRAINT `diem_ibfk_1` FOREIGN KEY (`MaSV`) REFERENCES `sinhvien` (`MaSV`),
  ADD CONSTRAINT `diem_ibfk_2` FOREIGN KEY (`MaMonHoc`) REFERENCES `monhoc` (`IDMonHoc`);

--
-- Constraints for table `lop`
--
ALTER TABLE `lop`
  ADD CONSTRAINT `lop_ibfk_1` FOREIGN KEY (`MaSV`) REFERENCES `sinhvien` (`MaSV`),
  ADD CONSTRAINT `lop_ibfk_2` FOREIGN KEY (`MaMonHoc`) REFERENCES `monhoc` (`IDMonHoc`),
  ADD CONSTRAINT `lop_ibfk_3` FOREIGN KEY (`MaGV`) REFERENCES `giangvien` (`Email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
