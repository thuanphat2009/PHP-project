-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2022 at 11:20 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminPass` varchar(255) NOT NULL,
  `adminUSer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminPass`, `adminUSer`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brandId` int(11) NOT NULL,
  `brandName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`brandId`, `brandName`) VALUES
(2, 'Sieu Nhan'),
(3, 'Cuong Phong');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `cateId` int(11) NOT NULL,
  `cateName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`cateId`, `cateName`) VALUES
(3, 'Nồi Cơm Điện'),
(4, 'Chảo Chống Dính'),
(5, 'Tủ lạnh'),
(6, 'Quạt Điều Hoà'),
(7, 'Lò Nướng'),
(8, 'Bình Đun Siêu Tốc'),
(9, 'Robot Hút Bụi'),
(10, 'Bình,ly giữ nhiệt'),
(11, 'Bếp Điện'),
(12, 'Tủ Đông'),
(13, 'Tivi'),
(14, 'Loa'),
(16, 'Máy Giặt'),
(17, 'Máy Lạnh'),
(19, 'Máy Xay-Vắt-Ép');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `customer_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_momo`
--

CREATE TABLE `tbl_momo` (
  `partnerCode` int(11) NOT NULL,
  `orderId` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `orderInfo` int(11) NOT NULL,
  `orderType` int(11) NOT NULL,
  `transId` int(11) NOT NULL,
  `payType` int(11) NOT NULL,
  `code_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `code_order` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `tongtien` double NOT NULL,
  `ngaylap` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_detail`
--

CREATE TABLE `tbl_order_detail` (
  `productId` int(11) NOT NULL,
  `code_order` int(11) NOT NULL,
  `soluong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `cateId` int(11) NOT NULL,
  `brandId` int(11) NOT NULL,
  `product_desc` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `type` int(1) NOT NULL,
  `image` varchar(255) NOT NULL,
  `tonkho` int(11) NOT NULL,
  `giamgia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`productId`, `productName`, `cateId`, `brandId`, `product_desc`, `price`, `type`, `image`, `tonkho`, `giamgia`) VALUES
(1, 'Nồi cơm cao tần GREE 1.5 lít GDCFWK-4004Ca', 3, 2, 'Nồi cơm điện cao tần sử dụng công nghệ cảm ứng từ đun nấu không tiếp xúc, tức là làm nồi cơm nóng trực tiếp chứ không qua mâm nhiệt giúp nấu cơm ngon hơn và bảo toàn dưỡng chất trong gạo, cho hạt cơm chín dẻo, đều, mà không bị thất thoát dinh dưỡng.\r\n\r\nNồ', 864000, 0, 'noi-com-cao-tan-gree-gdcfwk-4004ca-4l-1-1-org.jpg', 10, 0),
(2, 'Nồi cơm điện cao tần Bluestone 1.5 lít RCB-5987', 3, 3, 'Nồi cơm điện Bluestone thiết kế sang trọng, hình khối chắc chắn, vỏ nhựa + thép không gỉ bóng loáng, sáng đẹp\r\nThân nồi dày cho khả năng giữ nhiệt cao, giữ cơm ấm lên đến 720 phút liên tục, cơm ngon sẵn sàng cho bạn sử dụng mọi lúc.', 660000, 0, 'noi-com-dien-bluestone-rcb-5987-1-1-org.jpg', 12, 0),
(3, 'Nồi cơm điện cao tần Tefal 0.9 lít', 3, 2, 'Nồi cơm điện Tefal với thiết kế sang trọng, vỏ ngoài sáng bóng, màu sắc hiện đại, dễ dàng làm điểm nhấn đẹp mắt cho không gian bếp gia đình\r\nNồi có công suất 800 W giúp nấu cơm nhanh chóng, tiện lợi.', 1525000, 0, 'noi-com-dien-tefal-rk-803565-1-1-org.jpg', 13, 0),
(4, 'Nồi cơm điện tử Bluestone 1.5 lít RCB-5949', 3, 3, 'Đặc điểm nổi bật\r\nDung tích nồi 1.5 lít, phù hợp gia đình có 2 - 4 người.\r\nCông suất 860W, công nghệ nấu 3D cho ra cơm chín đều, thơm ngon. \r\n12 chế độ nấu cài đặt sẵn, giúp bạn chế biến đa dạng món ăn.\r\nLòng nồi dạng niêu bằng hợp kim nhôm phủ chống dính', 1899000, 0, 'tu-bluestone-15-lit-rcb-5949-2.jpg', 14, 0),
(5, 'Nồi cơm điện tử Philips 1 lít HD3030', 3, 2, 'Nồi cơm điện tử Philips HD3030 kiểu dáng hiện đại, sang trọng, dung tích 1 lít, phù hợp với các gia đình có từ 2 - 4 thành viên\r\n', 370000, 0, 'noi-com-dien-dien-tu-philips-hd3030-1-1.jpg', 15, 0),
(10, 'Android Tivi Sony 4K 50 inch KD-50X75', 13, 3, 'Thiết kế tinh tế, thanh lịch\r\nAndroid Tivi Sony 4K 50 inch KD-50X75 sở hữu thiết kế màn hình phẳng, tràn viền cho trải nghiệm xem tivi đắm chìm.\r\n\r\nBên cạnh đó, tivi Sony 50 inch còn có chân đế chữ V mỏng mang sự chắc chắn, thanh lịch phù hợp với mọi khôn', 15600000, 0, 'androidtivisony.jpg', 16, 0),
(13, 'Smart Tivi Samsung 4K 55 inch UA55TU6900', 13, 2, 'Thiết kế không viền 3 cạnh tinh tế\r\nSmart Tivi Samsung 4K 55 inch 55TU6900 được thiết kế màn hình không viền 3 cạnh tinh tế, màu đen thanh lịch. Kiểu dáng thanh mảnh, hứa hẹn sẽ làm nổi bật không gian nội thất nhà bạn.\r\nTivi Samsung 55 inch phù hợp trưng ', 16200000, 0, 'smart-samsung-4k-55-inch-55tu6900-3-3.jpg', 17, 0),
(14, 'Android Tivi QLED TCL 4K 55 inch 55Q726', 13, 3, 'Truyền tải trọn vẹn từng sắc màu cho khung hình tươi tắn, thuần khiết với màn hình chấm lượng tử Quantum Dot (Tivi QLED)\r\nCông nghệ Quantum Dot thêm vào khung hình hàng tỷ tinh thể nano lượng tử, nâng cao độ sáng, tái tạo dải màu phong phú cho màu sắc thể', 16490000, 0, 'qled-4k-tcl-55q726-2-org.jpg', 0, 0),
(15, 'Smart Tivi LG 4K 55 inch 55UP7750PTB', 13, 2, 'Thiết kế trang nhã, chắc chắn, hòa hợp trong mọi không gian\r\nSmart Tivi LG 4K 55 inch 55UP7750PTB được thiết kế màu đen thanh lịch, trang nhã, màn hình tivi siêu mỏng cho trải nghiệm xem tuyệt vời nhất. Bên cạnh đó, tivi còn sở hữu giá đỡ chữ V úp ngược c', 14400000, 0, '1-1-org-org.jpg', 0, 0),
(16, 'Loa Bluetooth Mozard E8', 14, 3, 'Kiểu dáng trẻ trung, màu sắc nổi bật\r\nLoa Bluetooth Mozard E8 có thiết kế trẻ trung, màu sắc nổi bật, loa có 2 màu sắc là đỏ và xanh Navy cho bạn dễ dàng lựa chọn theo sở thích. Loa có kích thước nhỏ gọn bạn có thể dễ dàng bỏ vào túi xách mang theo khi đi', 950000, 0, 'loa-bluetooth-mozard-e8-xanh-navy-1-org.jpg', 0, 0),
(17, 'Loa vi tính Bluetooth Enkor S2880 Đen', 14, 2, 'Đặc điểm nổi bật\r\n\r\nThiết kế nhỏ gọn, dạng vân gỗ đẹp mắt, với bộ 3 loa: 1 loa siêu trầm và 2 loa vệ tinh.\r\nTổng công suất 60W, công suất loa siêu trầm 30 W, công suất loa vệ tinh 15 W x 2 cho âm thanh ổn định, sống động hơn.\r\nCó thể phát nhạc qua Bluetoo', 1600000, 0, 'loa-vi-tinh-21-enkor-s2880-den-3-2-org.jpg', 0, 0),
(18, 'Loa Bluetooth Mozard S21', 14, 3, 'Đặc điểm nổi bật\r\n\r\nNhỏ gọn, sang trọng, với 3 gam màu trẻ trung tùy chọn.\r\nKết nối nhanh chóng, ổn định, mượt mà, khoảng cách tới 10 m với Bluetooth 5.0.\r\nCông suất 5 W cho âm thanh sinh động, tiếng bass sâu.\r\nKháng bụi, chống nước chuẩn IPX6.\r\nDung lượn', 550000, 0, 'bluetooth-mozard-s21-xanh-3.jpg', 0, 0),
(19, 'Loa vi tính Bluetooth Enkor S2850 Nâu', 14, 2, 'Đặc điểm nổi bật\r\n\r\nThiết kế cổ điển với màu gỗ nâu sang trọng, hiện đại.\r\nBộ sản phẩm gồm 1 loa siêu trầm và 2 loa vệ tinh.\r\nTổng công suất loa là 50W (loa siêu trầm 30W, 2 loa vệ tinh mỗi loa 10W), cho âm thanh sống động bùng nổ.\r\nKết nối và phát nhạc d', 1400000, 0, 'loa-vi-tinh-21-enkor-s2850-nau-1-org.jpg', 0, 0),
(20, 'Loa vi tính Microlab B26', 14, 3, 'Đặc điểm nổi bật\r\n\r\nThiết kế gọn nhẹ, dễ dàng dịch chuyển và lắp đặt. \r\nChất âm sống động cùng công suất 4 W, 2.0 kênh. \r\nTrang bị jack 3.5 mm và USB, dễ dùng với laptop, điện thoại, tablet,... \r\nĐiều khiển nút vặn dễ chỉnh âm lượng loa. ', 269000, 0, 'vi-tinh-microlab-b26-den-2-1.jpg', 0, 0),
(21, 'Loa Bluetooth Sony SRS-XB13', 14, 2, 'Đặc điểm nổi bật\r\n\r\nThiết kế nhỏ gọn, vỏ chống trầy với UV coating, có dây treo tiện dụng.\r\nÂm bass mạnh mẽ nhờ công nghệ Extra Bass và bộ xử lý khuếch tán âm thanh.\r\nHỗ trợ nghe nhạc không dây qua kết nối Bluetooth 4.2.\r\nKết nối cùng lúc 2 loa SRS-XB13 đ', 1290000, 0, 'sony-srs-xb13-3.jpg', 0, 0),
(22, 'Loa Bluetooth Fenda W8', 14, 3, 'Đặc điểm nổi bật\r\nKiểu dáng nhỏ gọn, dễ dàng mang đi bên mình.\r\nThiết kế hình trụ, cho âm thanh tràn ngập phòng 360 độ.\r\nHệ thống đèn Led thay đổi tạo cảm giác đẹp mắt và độc đáo.\r\nCông nghệ Bluetooth 4.2, cho khoảng cách kết nối có thể lên đến 10 m.\r\nDun', 350000, 0, 'loa-bluetooth-fenda-w8-2-org.jpg', 0, 0),
(23, 'Nồi cơm điện Philips 1.8 lít HD3115 ', 3, 2, 'Nồi cơm điện Philips có màu trắng tinh khôi, thanh lịch, vỏ nồi dày, bằng chất liệu cao cấp bền bỉ, kháng vỡ, ít bám bẩn\r\nKiểu nồi cơm nắp gài cho khả năng giữ ấm lâu, nắp gắn liền với nồi nên di chuyển gọn gàng, thuận tiện.', 263000, 0, 'noi-com-nap-gai-philips-hd3115-10.jpg', 0, 0),
(24, 'Nồi cơm điện Pensonic 1 lít PSR-1001R', 3, 3, 'Nồi cơm điện Pensonic thiết kế hiện đại, màu sắc nổi bật, góp phần làm tăng nét sáng sủa cho mọi không gian bếp', 340000, 0, 'pensonic-psr-1001r-do-1-org.jpg', 0, 0),
(25, 'Nồi cơm điện cao tần 1.5 lít Casper CI-15RC01', 3, 2, 'Công nghệ nấu cao tần sử dụng hệ thống cảm ứng từ để làm nóng nồi trực tiếp. Lượng nhiệt sẽ tỏa ra trên nắp, cho hơi nước bốc hơi, sau đó truyền thẳng xuống giúp hạt cơm chín đều, không bị khô hay nhão.\r\n\r\nHệ thống cảm ứng từ sẽ cung cấp nhiệt năng nhanh ', 1990000, 0, 'cao-tan-15-lit-casper-ci-15rc01-2.jpg', 0, 0),
(26, 'Chảo nhôm chống dính đáy từ 26 cm', 4, 3, 'Đặc điểm nổi bật\r\nĐường kính 26 cm chiên được 1 con cá lớn dưới 1.5 kg.\r\nChảo hợp kim nhôm dày 2.437 mm giúp giữ ấm tốt, hạn chế biến dạng do va đập.\r\nBề mặt là lớp chống dính vân đá phủ sơn Whitford Xylan chịu mức nhiệt tối đa 380 °C.\r\nTay cầm bọc nhựa c', 195000, 0, 'chao-nhom-chong-dinh-day-tu-phu-van-da-dmx-cdd-26c-1-1-org.jpg', 0, 0),
(27, 'Chảo nhôm chống dính 24 cm Sunhouse CT24C', 4, 2, 'Đặc điểm nổi bật\r\n\r\nChảo chống dính Sunhouse đường kính 24 cm, chiên được 4 trứng ốp la.\r\nChảo chống dính hợp kim nhôm, bề mặt lòng chảo bằng lớp chống dính phủ sơn Whitford chịu nhiệt tối đa 315 oC.\r\nTay cầm chắc chắn, cách nhiệt, có sẵn móc treo, di c', 136000, 0, 'sunhouse-24cm-ct24c-1-org.jpg', 0, 0),
(28, 'Chảo nhôm sâu chống dính nắp kính 34 cm Sunhouse PT34 ', 4, 3, 'Đặc điểm nổi bật\r\n\r\nChảo chống dính đường kính 34 cm, lòng sâu, chiên xào thoải mái cho gia đình đông người.\r\nChất liệu nhôm tấm siêu bền, bề mặt lòng chảo bằng lớp chống dính phủ sơn Whitford chịu nhiệt tối đa 315 oC.\r\nTay cầm to bản chắc chắn, có bọc c', 322000, 0, 'chao-phi-thuyen-nap-kinh-sunhouse-pt34-2-org.jpg', 0, 0),
(29, 'Chảo nhôm chống dính 20cm Elmich Harmonia EL-3779', 4, 2, 'Đặc điểm nổi bật\r\n\r\nChảo chống dính có thành bằng nhôm cao cấp, đáy inox 403, độ dày 2.844 mm.\r\nBề mặt chảo bằng lớp chống dính phủ sơn Whitford Quantanium chịu nhiệt tối đa 420 oC.\r\nĐường kính 20 cm, chiên được khoảng 2 - 3 trứng ốp la cùng lúc.\r\nSử dụng', 285000, 0, 'elmich-harmonia-el-3779-1-1-org.jpg', 0, 0),
(30, 'Tủ lạnh Samsung Inverter 319 lít RT32K5932BY/SV', 5, 3, 'Thiết kế sang trọng, sơn bóng giả gương sang trọng\r\nDù sở hữu thiết ngăn đá trên truyền thống, tủ lạnh Samsung Inverter 319 lít RT32K5932BY/SV vẫn sẽ mang đến cho không gian bếp nhà bạn một làn gió mới nhờ chất liệu cửa tủ mới lạ. Cửa tủ lạnh được làm từ ', 12590000, 0, 'samsung-rt32k5932by-sv-2-org.jpg', 0, 0),
(31, 'Tủ lạnh Samsung Inverter 208 lít RT19M300BGS/SV ', 5, 2, 'Thiết kế sang trọng, hiện đại\r\nBao quát bởi tông màu xám bạc cực kỳ sang trọng, tủ lạnh Samsung RT19M300BGS/SV sẽ góp phần mang đến vẻ đẹp hiện đại cho bất kỳ không gian nội thất nào.\r\nCông nghệ Digital Inverter siêu tiết kiệm điện năng\r\nCó khả năng điều ', 6290000, 0, 'samsung-rt19m300bgs-sv-1-org.jpg', 0, 0),
(32, 'Tủ lạnh Toshiba Inverter 513 lít GR-RS682WE-PMV(06)-MG', 5, 3, 'Thiết kế sang trọng, bảng điều khiển cảm ứng hiện đại bên ngoài \r\nToshiba Inverter 513 lít GR-RS682WE-PMV(06)-MG thuộc mẫu tủ lạnh side by side, gam màu đen tinh tế, cùng với bảng điều khiển cảm ứng hiện đại được thiết kế bên ngoài, ắt hẳn sẽ trở thành nộ', 26090000, 0, 'toshiba-gr-rs682we-pmv-06-mg-1-3-org.jpg', 0, 0),
(34, 'Tủ lạnh Toshiba Inverter 322 lít GR-RB405WE-PMV(06)-MG', 5, 2, 'Lấy nước lạnh nhanh chóng với khay lấy nước tự động ở bên ngoài\r\nĐiểm nổi bật đầu tiên khi nhìn vào chiếc tủ lạnh này là khay lấy nước tự động nằm ở bên ngoài cửa tủ, chỉ cần vài thao tác đơn giản là bạn đã có ngay ly nước mát lạnh tức thì. Hộp chứa nước ', 14090000, 0, 'toshiba-inverter-322-lit-gr-rb405we-pmv-06-mg-2.jpg', 0, 0),
(35, 'Tủ lạnh Sharp Inverter 605 lít SJ-FX688VG-BK', 5, 3, 'Thông tin sản phẩm\r\nThiết kế sáng tạo, kiểu dáng lịch lãm nổi bật không gian bếp\r\nTủ lạnh Sharp Inverter 605 lít SJ-FX688VG-BK được thiết kế có tủ 4 cửa tinh tế và hiện đại, tông màu đen cùng mặt gương phía trước thể hiện sự trang nhã, không gian nội thất', 26990000, 0, 'tu-lanh-sharp-sj-fx688vg-bk-1-1-org.jpg', 0, 0),
(36, 'Tủ lạnh Aqua 90 lít AQR-D99FA(BS)', 5, 2, 'Thiết kế nhỏ gọn, di chuyển dễ dàng\r\nTủ lạnh Aqua 90 lít AQR-D99FA thuộc dòng tủ lạnh mini có thiết kế nhỏ gọn, phù hợp với những không gian vừa và nhỏ. Với kiểu dáng nhỏ gọn, chiếc tủ lạnh mini 90 lít này sẽ là sự lựa chọn lý tưởng cho những gia đình nhỏ', 3290000, 0, 'aqua-aqr-d99fa-bs-1-org.jpg', 0, 0),
(37, 'Tủ lạnh Beko 93 lít RS9051P', 5, 3, 'Thiết kế nhỏ gọn, tiện lợi, dễ dàng di chuyển\r\nTủ lạnh Beko 93 lít RS9051P thuộc dòng tủ lạnh mini 1 cửa có chất liệu thép không gỉ với màu đen thời thượng, sang trọng, rất phù hợp để trang bị cho những không gian có diện tích nhỏ như phòng ngủ, phòng khá', 3190000, 0, 'beko-rs9051p-1-1-org.jpg', 0, 0),
(38, 'Quạt điều hòa Midea AC120-18AR', 6, 2, 'Quạt điều hòa Midea đi kèm theo quạt có 2 hộp đá khô tiện dụng, gia tăng hiệu quả làm mát cho những ngày nắng nóng\r\nLoại đá hóa học này có thể tái sử dụng. Khi muốn làm lạnh thì cho hộp đá khô vào ngăn đá tủ lạnh, sau đó cho vào bình chứa nước của quạt, n', 2990000, 0, 'quat-dieu-hoa-midea-ac120-18ar-1-4-org.jpg', 0, 0),
(39, 'Quạt điều hòa Comfee CF-AC12AR', 6, 3, 'Thông tin sản phẩm\r\nĐi kèm 2 hộp đá khô cho hiệu suất làm mát cao hơn\r\nĐá khô là loại đá hóa học khi muốn làm lạnh chỉ cần cho vào trong ngăn đá tủ lạnh (đá có thể tái sử dụng), sau đó, bạn cho hộp đá khô vào bình chứa nước của quạt, đá sẽ làm lạnh nước h', 2990000, 0, 'quat-dieu-hoa-comfee-cf-ac12ar-1-1-org.jpg', 0, 0),
(40, 'Quạt điều hòa Kangaroo KG50F79N', 6, 2, 'Quạt điều hòa Kangaroo có công suất 165W tạo lưu lượng gió 3500 m³/h, phù hợp phạm vi diện tích phòng 30 - 40 m2 \r\nQuạt tặng kèm 2 hộp nhựa đựng nước (không có đá khô) có thể để ngăn đá giúp làm mát hơn cho quạt.', 4990000, 0, 'kangaroo-kg50f79n-1-org.jpg', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brandId`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`cateId`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`code_order`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  ADD UNIQUE KEY `productId_2` (`productId`),
  ADD UNIQUE KEY `code_order_2` (`code_order`),
  ADD KEY `productId` (`productId`),
  ADD KEY `code_order` (`code_order`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`productId`),
  ADD KEY `brandId` (`brandId`),
  ADD KEY `cateId` (`cateId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brandId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `cateId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `code_order` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD CONSTRAINT `tbl_order_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `tbl_customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  ADD CONSTRAINT `tbl_order_detail_ibfk_1` FOREIGN KEY (`productId`) REFERENCES `tbl_product` (`productId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_order_detail_ibfk_2` FOREIGN KEY (`code_order`) REFERENCES `tbl_order` (`code_order`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD CONSTRAINT `tbl_product_ibfk_1` FOREIGN KEY (`brandId`) REFERENCES `tbl_brand` (`brandId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_product_ibfk_2` FOREIGN KEY (`cateId`) REFERENCES `tbl_category` (`cateId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
