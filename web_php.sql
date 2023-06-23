-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 12, 2023 lúc 06:31 PM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `web_php`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` int(50) NOT NULL,
  `level` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `level`) VALUES
(1, 'phantienhuy', 'tienhuy@gmail.com', 123456, 0),
(2, 'admin', 'admin@gmail.com', 123456, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id_cate` int(11) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id_cate`, `type`) VALUES
(1, 'piano'),
(2, 'organ'),
(3, 'Drum'),
(4, 'guitar');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact`
--

CREATE TABLE `contact` (
  `name` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` varchar(255) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `contact`
--

INSERT INTO `contact` (`name`, `phone`, `email`, `message`, `id`) VALUES
('Ngô Anh Đức', 1234456789, 'ngoanhduc10a2@gmail.com', 'Sản phẩm của các bạn rất tuyệt vời', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `invoice_details`
--

CREATE TABLE `invoice_details` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `name_product` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `invoice_details`
--

INSERT INTO `invoice_details` (`order_id`, `product_id`, `name_product`, `quantity`) VALUES
(7, 1, 'ROLAND RP-30', 1),
(7, 7, 'Kawai GL-50', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `id_user` int(50) NOT NULL,
  `receiv_name` varchar(255) NOT NULL,
  `receiv_phone` char(20) NOT NULL,
  `receiv_address` text NOT NULL,
  `status` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `total_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `id_user`, `receiv_name`, `receiv_phone`, `receiv_address`, `status`, `time`, `total_price`) VALUES
(4, 12, 'Nguyễn Hải Đăng', '39659343', 'Thôn Lương Quy', 0, '2023-05-11 15:01:33', 31600000),
(5, 12, 'Nguyễn Hải Đăng1', '39659343', 'Thôn Lương Quy', 0, '2023-05-11 15:03:29', 15800000),
(6, 12, 'Nguyễn Hải Đăng', '39659343', 'Thôn Lương Quy', 0, '2023-05-11 17:46:47', 15800000),
(7, 12, 'Nguyễn Hải Đăng2', '39659343', 'Thôn Lương Quy', 0, '2023-05-12 13:05:06', 475700000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `detail` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `product_name`, `img`, `price`, `detail`, `category_id`) VALUES
(1, 'ROLAND RP-30', 'https://vietthuong.vn/image/cache/catalog/casio/Piano/dan-piano-dien-roland-rp30-chinh-hang-450x471.jpg', 15800000, 'Phím đàn với độ nhạy và độ chính xác cao giúp cải thiện kĩ năng của trẻ. Được trang bị ba bàn đạp để chơi những giai điệu cổ', 1),
(2, 'Roland RP-501R', 'https://vietthuong.vn/image/catalog/roland/piano/piano-roland-501r-mau-den.jpg', 27200000, 'Nhỏ gọn, tính năng tập luyện thân thiện với giá cả phải chăng cho mọi gia đình\r\nĐàn piano điện Roland RP-501R mới, là cây piano đầu tiên rất lý tưởng và sẵn sàng để hỗ trợ bạn học tập nếu bạn đang có ý định sở hữu nó. \r\n\r\nThiết kế nhỏ gọn, tích hợp nhiều ', 1),
(3, 'Kawai ND-21', 'https://vietthuong.vn/image/cache/catalog/kawai/Upright/dan-piano-kawai-nd21-chinh-hang-400x400.jpg', 90000000, 'Đàn piano Kawai ND-21 mang đến chất lượng âm thanh trong, mạnh và một sự ổn định tuyệt đối về kết cấu bề mặt bởi kỹ thuật bộ máy được sản xuất theo tiêu chuẩn của hãng Kawai – Nhật Bản.\r\n1.Thiết kế của Bản cộng hưởng (Soundboard)\r\nBản cộng hưởng Soundboar', 1),
(4, 'KAWAI K-15E', 'https://vietthuong.vn/image/catalog/kawai/Upright/piano-kawai-k15e.jpg', 79000000, 'K-15E là sản phẩm tuyệt hảo để đưa khách hàng vào dòng sản phẩm K-Series cao cấp của KAWAI PIANO. Được trang bị Soundboard gỗ nguyên khối và bộ máy đàn Millenium II - ABS-Styran cực nhạy, làm cho các nghệ nhân và người chơi Piano rất yêu thích. Ngôn ngữ t', 1),
(5, 'Casio AP-470', 'https://vietthuong.vn/image/catalog/casio/Piano/dan-piano-dien-casio-ap-470.jpg', 24900000, 'Đàn piano Điện Casio Celviano AP-470 với thiết kế đẹp mắt, sang trọng, được cho ra mắt vào tháng 4 năm nay nhằm thay thế người tiền nhiệm AP-460, với những nâng cấp đáng kể AP-470 mang đến âm thanh tuyệt vời, cảm giác bàn phím chân thật, cùng với mức poly', 1),
(6, 'Roland GP-609', 'https://vietthuong.vn/image/catalog/roland/piano/dan-piano-dien-roland-gp609-sang-trong.jpg', 293700000, 'Kể từ khi tạo ra piano điện tử cảm ứng đầu tiên trên thế giới vào năm 1974, Roland đã trở thành một nhà lãnh đạo trong đổi mới đàn piano kỹ thuật số - và GP609 mới thể hiện niềm tin của chúng tôi rằng công nghệ tiên tiến và bí quyết có thể đưa âm nhạc của', 1),
(7, 'Kawai GL-50', 'https://vietthuong.vn/image/cache/catalog/kawai/Grand/dan-piano-kawai-gl50-sang-trong-400x400.jpg', 459900000, 'Lựa chọn hàng đầu về thiết kế\r\n\r\nĐược coi là một thương hiệu luôn chú trọng trong việc đầu tư về sản phẩm, Kawai luôn kết hợp những điều tinh túy nhất trong công nghiệp thủ công và công nghệ tinh tiến hiện đại vào những cây đàn của mình. Đó là sự kết hợp ', 1),
(8, 'Kawai K-800', 'https://vietthuong.vn/image/cache/catalog/kawai/Upright/dan-piano-kawai-k800-sang-trong-400x400.jpg', 272000000, 'Đàn Piano Kawai K800 là cây đàn piano cơ thuộc dòng upright piano kawai K series của Nhật bản, thiết kế với kiểu dáng thanh lịch, giai điệu ấm áp, chân thực. K800 được mệnh danh là cây đàn piano Upright cao cấp, được rất nhiều giới nhạc công, nghệ sĩ đánh', 1),
(9, 'Roland LX706', 'https://vietthuong.vn/image/cache/catalog/roland/piano/dan-piano-dien-Roland-LX706-sang-trong-400x400.jpg', 109000000, 'Đàn piano điện Roland LX 706 với hệ thống 6 loa lấp đầy không gian trong căn phòng của bạn. Giá đàn piano LX-706 giá cả phải chăng, phù hợp với người mới học đàn piano, người chơi piano giải trí và cả nghệ sĩ chuyên nghiệp.\r\nĐối với những người chơi đang ', 1),
(10, 'Samick J310B/WHHP', 'https://vietthuong.vn/image/cache/catalog/Samick/piano-samick-j310b-400x400.jpg', 95000000, 'Piano Samick J310B/WHHP là một trong những mẫu đàn cực kỳ đặc biệt của Samick, mẫu này giới hạn số lượng. Mang tâm hồn Nghệ thuật Hội hoạ vào Piano, J310B thực sự là tuyệt phẩm song tấu của Âm Nhạc và Hội Hoạ được gửi đến người dùng.\r\nPiano Samick J310B/W', 1),
(11, 'Samick JS121FD', 'https://vietthuong.vn/image/cache/catalog/Samick/piano-samick-JS121FD-400x400.jpg', 96000000, 'Piano Samick JS121FD một trong những sự lựa chọn tối ưu dành cho sự khởi đầu âm nhạc của bạn. Cây đàn piano này có các chi tiết được ưu ái hơn hẳn, giá tốt sẽ khó có cây Piano nào so sánh được trong phân khúc nội tại.\r\nJS121FD mang đặc điểm nổi bật là “ch', 1),
(12, 'Samick JS121MD/MAHP', 'https://vietthuong.vn/image/cache/catalog/Samick/piano-samick-JS121MD-MAHP-400x400.jpg', 90000000, 'Samick JS121MD\r\nJS121MD mang kiểu dáng tiêu chuẩn của dòng Upright Piano, có màu gỗ đẹp mắt nên phù hợp với những ai yêu thích lối thiết kế mộc mạc thuần gỗ, nếu nội thất chủ đạo là gỗ, thì cây Piano này là lựa chọn đầu tiên.\r\n\r\nNgày nay, dòng JS-Series c', 1),
(13, 'Samick SK122Q', 'https://vietthuong.vn/image/cache/catalog/Samick/piano-samick-sk122q-400x400.jpg', 94000000, 'SK122Q là một trong những mẫu đàn rất đặc biệt của Samick.\r\n2 vạch đỏ cân xứng là điểm nhấn hoàn hảo cho sự chú ý khi vừa nhìn vào sản phẩm, kết hợp bảng kê sách nhạc có thể mở ra đóng vào, góp phần vào việc phát xuất âm thanh trực diện, tạo cảm giác kết ', 1),
(14, 'Casio CDP-S160', 'https://vietthuong.vn/image/catalog/casio/Piano/casio-cdp-s160-bk.jpg', 13800000, 'Thiết kế\r\nThiết kế thân đàn mỏng với chiều sâu chỉ 232 mm\r\nĐơn giản nhưng sang trọng\r\nCông nghệ ghép mật độ cao độc quyền của CASIO với các bộ phận thu nhỏ và kết cấu tiết kiệm không gian bên trong chính là chìa khóa làm nên phần thân thanh mảnh của chiếc', 1),
(15, 'Casio PX-S1100(', 'https://vietthuong.vn/image/catalog/casio/Piano/dan-piano-dien-casio-px-s1100.jpg', 18300000, 'Đàn piano đặc biệt dành cho không gian đặc biệt\r\nKích thước thanh mảnh và thiết kế đơn giản, tối giản được chế tác phù hợp với nhiều kích thước phòng và nội thất.\r\nĐàn piano kỹ thuật số thanh mảnh nhất thế giới * phù hợp cho mọi không gian\r\nPhần thân than', 1),
(16, 'KAWAI KDP75', 'https://vietthuong.vn/image/cache/catalog/kawai/Digital/piano-kawai-kdp-75-400x400.jpg', 21900000, 'CÔNG NGHỆ PIANO KỸ THUẬT SỐ TỪ KAWAI\r\nMột sản phẩm mới xuất hiện trong đại gia đình Piano Kỹ Thuật Số KAWAI, model KDP75, trang bị hệ thống cơ học RHC do chính KAWAI, phản hồi lực đánh ngay dưới ngón tay người chơi theo thông số đo đạc của các nghệ nhân K', 1),
(17, 'Casio GP-500', 'https://vietthuong.vn/image/cache/catalog/1a-Tuvan/gp-500-400x400.png', 90000000, 'Đàn Piano điện Casio GP-500 thuộc dòng sản phẩm Celviano Grand Hybrid - dòng đàn piano cao cấp nhất của thương hiệu Casio. Casio GP-500 có thiết kế nổi bật, được trang bị công nghệ âm thanh AiR Grand, GP-500 mô phỏng âm thanh của những cây đàn Acoustic pi', 1),
(18, 'Roland GP-3', 'https://vietthuong.vn/image/cache/catalog/piano/Roland-GP-3-400x400.jpg', 77000000, 'GP-3 là cây đàn grand nhỏ gọn và giá cả phải chăng nhất trong dòng GP nổi tiếng, mang đến cho bạn hiệu suất piano cao cấp trong một thiết kế rút gọn độc đáo tạo nên sự nổi bật trong mọi không gian sống. Các tính năng hiện đại và lợi ích mang lại của Rolan', 1),
(19, 'Roland LX705', 'https://vietthuong.vn/image/catalog/roland/piano/dan-piano-dien-roland-lx-705-mau-nau1.jpg', 54900000, 'Piano điện Roland mẫu mới nhất thuộc series LX700 là những model LX 705, LX 706, LX 708, sản phẩm có nhiều màu, giá cả phải chăng, là model piano điện dành cho người mới học, giải trí gia đình và nghệ sĩ biểu diễn. Đặt mua đàn piano điện Roland LX705 tại ', 1),
(20, 'Casio PX-S6000', 'https://vietthuong.vn/image/cache/catalog/casio/Piano/piano-casio-px-s6000-03-400x400.jpg', 39000000, 'Chất lượng cao và vô cùng linh hoạt, phù hợp với nhu cầu của bạn\r\nĐàn PX-S6000 có các chức năng điều khiển âm tùy ý mang đến sự linh hoạt chưa từng có cho màn biểu diễn của bạn, đồng thời giúp bạn tự do thưởng thức âm thanh phong phú từ công nghệ âm thanh', 1),
(21, 'Casio SA-80', 'https://vietthuong.vn/image/cache/catalog/casio/Organ/casio-sa-80-400x400.jpg', 2707000, '44 phím cỡ nhỏ giúp cho cả những đôi bàn tay bé cũng chơi được dễ dàng\r\n100 âm cài sẵn chất lượng cao bao gồm nhiều loại nhạc cụ, từ đàn piano, bộ hơi đến bộ gõ cùng nhiều loại khác, tất cả được lấy mẫu từ nhạc cụ thật\r\nCác nút định hướng âm giúp bạn chọn', 2),
(22, 'Casio Casiotone CT-S200', 'https://vietthuong.vn/image/catalog/casio/dan_organ_casio_CT_S200_den_2.png', 3500000, 'Tính năng Dance Music Mode cho phép người chơi Casiotone tạo ra những tiếng trống, bass, câu nhạc điện tử và giai điệu sôi động.12 tiếng điện tử được thêm vào giúp người chơi sáng tạo và thưởng thức âm nhạc trọn vẹn hơn. Trên dòng Casiotone CT-S200, CT-S3', 2),
(23, 'Casio SA-81', 'https://vietthuong.vn/image/cache/catalog/casio/Organ/casio-sa-81-400x400.jpg', 2070000, 'Bàn phím đôi (Layer): Chơi hai âm chồng lên nhau\r\nNgân dài (Sustain): Cho phép âm tiếp tục kéo dài (ngân) sau khi nhả phím.\r\nVang âm (Reverb): Thêm hiệu ứng vang âm (reverb) để âm thanh có thể biểu đạt nhiều cung bậc cảm xúc hơn. Chọn một trong bốn loại: ', 2),
(24, 'Casiotone CT-S410', 'https://vietthuong.vn/image/cache/catalog/casio/Organ/Casiotone-CT-S410-400x400.jpg', 6300000, 'Điểm nổi bật của CT-S410\r\nAC hoặc chạy bằng pin, để mang âm nhạc của bạn đi bất cứ đâu.\r\n61 nốt, bàn phím cảm ứng với các phím hình đàn piano.\r\n600 Âm thanh AiX chất lượng cao.\r\n200 Nhạc đệm tự động.\r\nDuy trì đầu vào bàn đạp.\r\nChế độ âm thanh vòm.\r\nKết nố', 2),
(25, 'Casio Casiotone LK-S250', 'https://vietthuong.vn/image/cache/catalog/casio/Organ/dan-organ-casiotone-lk-s250-400x400.jpg', 5200000, 'Trong tháng 8 năm 2019, tại Summer NAMM show, Casio ra mắt hai dòng sản phẩm Keyboard mới dành cho trẻ em, có sức hút mạnh mẽ với các nhà đầu tư nhạc cụ cũng như người dùng với phân khúc đàn Keyboard phổ thông thuộc dòng Casiotone CT-S series và Casiotone', 2),
(26, 'Casio CT-X800', 'https://vietthuong.vn/image/cache/catalog/casio/Organ/dan-organ-casio-ctx800-chinh-hang-400x400.jpg', 5900000, 'Đàn organ Casio CT-X800 mới không chỉ gây ấn tượng với thiết kế hiện đại và tính năng cải tiến của nó, mà còn là công nghệ âm thanh AIX tuyệt vời giúp tái tạo âm thanh đặc trưng của nhạc cụ - làm cho nó mạnh mẽ đặc biệt. Sản phẩm phù hợp cho những người m', 2),
(27, 'Roland Fantom 06', 'https://vietthuong.vn/image/cache/catalog/Synthesizers/roland-fantom-06-400x400.jpg', 37660000, 'Được trang bị bàn phím 61 nốt được thiết kế mới, FANTOM-06 có mọi thứ bạn cần để tạo và biểu diễn ở mức cao nhất. Phát và sản xuất với hàng ngàn âm thanh hay nhất của Roland và thỏa sức thể hiện tầm nhìn âm nhạc của bạn với màn hình cảm ứng màu, điều khiể', 2),
(28, 'Roland Fantom 07', 'https://vietthuong.vn/image/cache/catalog/Synthesizers/roland-fantom-07-400x400.jpg', 43960000, 'Đáp ứng hiệu quả tất cả mọi thể loại âm nhạc bạn cần\r\n\r\nFANTOM-0 có mọi thứ bạn cần để tạo và thực hiện ở mức cao nhất. Và với thiết kế tương tác mở rộng I/O (nâng cấp các bộ tiếng mới bằng Sampler từ Roland Cloud) bạn sẽ hòa nhập vào mọi công việc một cá', 2),
(29, 'Roland Fantom 08', 'https://vietthuong.vn/image/cache/catalog/Synthesizers/roland-fantom-08-400x400.jpg', 49210000, 'Luôn trải nghiệm tuyệt vời\r\n\r\nNhững âm thanh Piano SuperNATURAL hoàn toàn mới của FANTOM-0 cho người chơi cảm giác luôn mới bằng những phản hồi giống như những cây đàn acoustic đích thực.\r\n\r\nBộ âm thanh Organ cơ học\r\n\r\nĐược phát triển từ dòng đàn organ VK', 2),
(30, 'Roland XPS-30', 'https://vietthuong.vn/image/cache/catalog/roland/organ/roland-xps-30-400x400.jpg', 26030000, 'Keyboard Roland XPS-30 bắt đầu với thiết lập tính năng tuyệt vời của XPS-10 và bổ sung thêm nhiều cải tiến mạnh mẽ mà chắc chắn người chơi sẽ rất yêu thích. Các yếu tố cần thiết như tiếng acoustic và piano điện tốt hơn, thiết lập dạng sóng nội bộ có thể d', 2),
(31, 'Roland JUNO-DS76', 'https://vietthuong.vn/image/cache/catalog/roland/organ/roland-juno-ds76-01-400x400.jpg', 28340000, 'Với những chuyến lưu diễn, các buổi tập yêu cầu các ban nhạc phải di chuyển nhanh chóng và thường xuyên, bạn sẽ không có đủ thời gian để loay hoay với một synth phức tạp, cồng kềnh khó sử dụng. Synth Roland JUNO-DS76 mới với thiết kế hiện đại xách tay chí', 2),
(32, 'Roland XPS-10', 'https://vietthuong.vn/image/cache/catalog/roland/organ/roland-xps-10-400x400.jpg', 14130000, 'Đàn Organ Roland XPS-10 là một sản phẩm hoàn hảo cho các nhạc công áp dụng phong cách kết hợp biểu diễn giữa 2 dòng sản điệu và tiếng, Roland XPS-10 là một sản phẩm có chất lượng âm thanh tuyệt đỉnh nhưng lại được định vị là 1 trong những dòng sản phẩm ke', 2),
(33, 'Casio Casiotone CT-S300', 'https://vietthuong.vn/image/cache/catalog/casio/Organ/dan-organ-casiotone-cts300-gia-tot-2020-400x400.jpg', 5130000, 'Đàn organ Casio CT-S300 có thiết kế nhỏ gọn với chỉ 3,3kg cùng thiết kế 61 phím giúp cho bạn dễ dàng thưởng thức âm nhạc mọi lúc, mọi nơi bạn thích.\r\n \r\nCT-S300 là model đàn được phát triển từ dòng đàn Casiotone của thương hiệu Casio được sản xuất vào nhữ', 2),
(34, 'Casio WK-240', 'https://vietthuong.vn/image/cache/catalog/casio/Organ/organ-casio-wk-240-400x400.jpg', 7490000, 'Chất lượng âm thanh và cảm giác bàn phím được cải tiến\r\nNguồn âm thanh AHL*\r\nTất cả các âm có sẵn, bao gồm âm của đàn piano và các nhạc cụ truyền thống, giờ đây nghe hay hơn bao giờ hết! Phức điệu tối đa 48 âm cung cấp nhiều biên độ để giảm thiểu nguy cơ ', 2),
(35, 'Casio CT-X3000', 'https://vietthuong.vn/image/cache/catalog/casio/Organ/organ-Casio-CT-X3000-400x400.jpg', 8110000, 'Đàn organ Casio CT-X3000 được tạo ra để thỏa mãn niềm đam mê âm nhạc của bạn, với công nghệ âm thanh AiX và một loạt các tính năng tuyệt vời khác như: thư viện 800 âm thanh, 260 phong cách đệm và hệ thống loa bass reflex, khả năng là vô tận.\r\nÂm thanh thế', 2),
(36, 'Roland BK-3', 'https://vietthuong.vn/image/cache/catalog/roland/organ/roland-bk3-02-400x400.jpg', 15840000, 'Hoàn hảo cho giải trí cá nhân và gia đình, BK3 Backing Keyboard mang đến một cấp độ mới về biểu diễn với các thiết bị điện tử tự động. Với một loạt các tiếng và điệu chất lượng, tính năng phát lại bài hát thông qua bộ nhớ USB, loa tích hợp, và nhiều hơn n', 2),
(37, 'Roland JD-XI', 'https://vietthuong.vn/image/cache/catalog/roland/organ/roland-JD-Xi-01-400x400.jpg', 15940000, 'Synth nhỏ gọn nhưng mạnh mẽ với pattern sequencer onboard và vocal FX\r\n\r\nNhỏ bé, mạnh mẽ với giá cả phải chăng, JD-Xi thực sự mang đến một động cơ synth analog đúng nghĩa, âm thanh synth SuperNATURAL nổi tiếng của Roland và nhiều công cụ sáng tạo khác. Đư', 2),
(38, 'ROLAND JUNO-DS88', 'https://vietthuong.vn/image/cache/catalog/roland/organ/roland-juno-ds88-01-400x400.jpg', 32400000, 'Đàn organ JUNO-DS88 hội tụ một loạt biểu tượng cho cấp độ mới khi trình diễn, cộng thêm nhiều cải tiến mạnh mẽ trong khi vẫn giữ sự vận hành hợp lý và đơn giản.\r\nĐơn giản là Sáng tạo\r\n\r\nSynthesizer của Roland được biết đến với chất âm tuyệt vời, dễ sử dụn', 2),
(39, 'Roland E-X30', 'https://vietthuong.vn/image/cache/catalog/roland/organ/dan-organ-roland-ex30-400x400.jpg', 38400000, 'Đàn Organ Roland E-X30 sở hữu âm thanh piano cổ điển chuẩn, rất phù hợp để những người mới phát triển kỹ năng thẩm âm. Không những thế, chiếc đàn organ này cũng được trang bị những âm thanh phong phú khác, bao gồm nhiều giai điệu truyền thống và phong các', 2),
(40, 'Casio LK-266/265', 'https://vietthuong.vn/image/catalog/casio/Organ/dan-organ-casio-lk266.jpg', 4680000, 'Thiết kế bàn phím sáng\r\nCasio LK-266/265 là thiết kế mới nhất của hãng Casio có bàn phím sáng, Kích thước (Rộng x Sâu x Cao) tương đương 946 x 307 x 92mm, trọng lượng 3,6kg.\r\n\r\nThiết kế bàn phím sáng của đàn Organ Casio không những kích thích tính tò mò m', 2),
(41, 'Roland TD-1DMK', 'https://vietthuong.vn/image/cache/catalog/trong-dien-tu-roland-td-1dmk--500x500-400x400.jpg', 23030000, 'Roland vừa cho ra mắt bộ trống V-Drum TD-1DMK hoàn toàn mới cho phân khúc entry-level, với mục đích nhằm giúp những người chơi mới phát triển kĩ năng một cách nhanh chóng và dễ dàng nhất có thể.\r\nThiết kế đơn giản\r\nBộ trống có thiết kế khá đơn giản, chỉ c', 3),
(42, 'Roland TD-17KL', 'https://vietthuong.vn/image/cache/catalog/work/td-17kl-400x400-400x400.jpg', 36680000, 'Roland TD-17KL: Trở thành tay trống giỏi trong thời gian nhanh nhất!\r\n\r\nKhi bạn có những đam mê nghiêm túc với bộ môn trống, bạn rất cần một bộ trống phù hợp với tham vọng trở thành một tay trống chuyên nghiệp của mình. Dòng V-Drums TD-17 cho phép kỹ thuậ', 3),
(43, 'Trống PEARL Roadshow RS525 standard', 'https://vietthuong.vn/image/catalog/pearl/trong-pearl-roadshow-525-standard-c31.jpg', 12450000, '\r\nPHẦN CỨNG (Hardware)\r\n\r\nCymbal, hi-hat và snare với một chân chống mạnh mẽ và cân bằng. Các chân Double-brace và các miếng điều chỉnh độ nghiêng cũng rất quan trọng để giữ cho tất cả các bộ phận của bộ trống được cân bằng dưới áp lực của lực đánh lớn. T', 3),
(44, 'Alesis Command Mesh Kit', 'https://vietthuong.vn/image/cache/catalog/Drum-Trong/alesis_command_mesh_kit-400x400.jpg', 25100000, 'Bùng nổ cho mọi cuộc chơi\r\nCommand Mesh Kit có tất cả các miếng đệm bằng mặt lưới, mang lại trải nghiệm đánh trống đích thực. Bộ sản phẩm này bao gồm một trống kick 8” đi kèm pedal, 1 snare dual-zone 10”, và 3 tom dual-zone 8”. Set 2 cymbals và 1 hihat 10', 3),
(45, 'Alesis Surge Mesh Kit', 'https://vietthuong.vn/image/cache/catalog/Drum-Trong/alesis_surge_mesh_kit-400x400.jpg', 16910000, 'Cảm giác cao cấp và động lực học tự nhiên\r\nSurge Mesh Kit là một bộ trống điện tử 8 chi tiết hoàn chỉnh bao gồm mọi thứ mà một tay trống cần để chơi như một bộ trống chuyên nghiệp. Nó có 1 snare dual-zone 10”, và 3 tom dual-zone 8”, và 1 trống kick đi kèm', 3),
(46, 'Alesis Crimson II SE', 'https://vietthuong.vn/image/cache/catalog/CRIMSONIISE-400x400.jpg', 29300000, 'Cảm giác hoàn hảo và phần cứng cao cấp\r\nAlesis Crimson II Kit là bộ trống điện tử 9 chi tiết có đệm mặt lưới độc quyền của Alesis ( bằng sáng chế Hoa Kỳ 9.424.827) mang lại biểu cảm và cảm giác hoàn hảo. Bộ sản phẩm gồm 1 trống kick 8 inch, trống snare du', 3),
(47, 'Trống Pearl Roadshow 505', 'https://vietthuong.vn/image/catalog/pearl/trong-pearl-roadshow-505-c703.jpg', 11600000, 'Trống Pearl Roadshow RS505 - THE RHYTHM IS IN YOU\r\nTất cả mọi thứ bạn cần đều được cung cấp. Trọn bộ trống mới với tất cả mọi thứ bạn cần để bắt đầu cuộc hành trình nhịp điệu của bạn.\r\n\r\nBài viết được quan tâm: \r\n\r\nTrống pearl roadshow 525 standard\r\nTrốn', 3),
(48, 'Roland TD-07KV', 'https://vietthuong.vn/image/cache/catalog/work/td-07kv-400x400-400x400.jpg', 30650000, 'Nhỏ gọn, tiện lợi và lý tưởng cho việc đánh trống tại nhà, bộ trống Roland TD-07KV mang lại khả năng biểu đạt và khả năng chơi vượt trội với một chi phí hợp lí. Bộ trống này cũng cho phép bạn khám phá những cơ hội sáng tạo vượt xa bất kỳ bộ trống nào, với', 3),
(49, 'Trống Pearl Roadshow 584 Jazz style', 'https://vietthuong.vn/image/catalog/pearl/trong-pearl-roadshow-584-jazz-style-C706.jpg', 9890000, 'Pearl RS 584 CC bao gồm\r\n\r\nPearl Roadshow series (4 trống, kick 18\")\r\n18\"x12\" Bass - 10\"x07\" Tom - 14\"x10\" Floor - 13\"x5\" Snare\r\nGiá đã bao gồm đầy đủ: Trống RS + Hardware + Cymbal Pearl + ghế trống + Dùi trống + túi dùi\r\nRoadshow có 4 màu: #31, #91, #706', 3),
(50, 'ROLAND TD-17KV-X2', 'https://vietthuong.vn/image/cache/catalog/Drum-Trong/trong-dien-roland-td-17-kvx2-1-400x400.jpg', 55510000, 'Khi bạn có những đam mê nghiêm túc với bộ môn trống, bạn rất cần một bộ trống phù hợp với tham vọng trở thành một tay trống chuyên nghiệp của mình. Dòng V-Drums TD-17 cho phép kỹ thuật của bạn tỏa sáng thực sự, được tích hợp tính năng của các công cụ đào ', 3),
(51, 'ROLAND TD-17KV-2', 'https://vietthuong.vn/image/cache/catalog/Drum-Trong/trong-dien-roland-td-17-kv2-1-400x400.jpg', 41860000, 'Khi bạn có những đam mê nghiêm túc với bộ môn trống, bạn rất cần một bộ trống phù hợp với tham vọng trở thành một tay trống chuyên nghiệp của mình. Dòng V-Drums TD-17 cho phép kỹ thuật của bạn tỏa sáng thực sự, được tích hợp tính năng của các công cụ đào ', 3),
(52, 'Trống Compact Traveler Kit PCTK-1810', 'https://vietthuong.vn/image/cache/catalog/work/trong-compact-traveler-kit-pctk-1810-3-400x400-400x400.gif', 4590000, 'Với một thiết kế vô cùng tối giản, bộ trống di động nhỏ gọn Compact Traveler Kit (PCTK-1810) đúng với tên gọi của nó, cấu tạo bộ trống gồm 1 trống Bass 18” và 1 trống Snare 10” được gắn vào khung giá đỡ nhưng vẫn đảm bảo độ chắc chắn mà không lo bị lật.\r\n', 3),
(53, 'Roland TD-25KVX + KD-220', 'https://vietthuong.vn/image/cache/catalog/work/roland-td25kvx_(1)-400x400.jpg', 134380000, 'Roland TD-25KVX + KD-220: Lựa chọn tuyệt vời cho những tay trống chuyên nghiệp\r\n\r\nTrống điện Roland TD-25KVX được trang bị công nghệ cao cấp từ dòng TD-30, mang đến tất cả sự biểu cảm tuyệt vời nhất để trở thành sự lựa chọn tuyệt vời với những tay trống c', 3),
(54, 'Roland TD-50K', 'https://vietthuong.vn/image/cache/catalog/work/roland-td50-400x400-400x400.jpg', 170970000, 'Bộ trống ROLAND TD-50K bao gồm Gía đỡ MDS-50K; KD-120BKJ V-KICK TRIGGER; TD-50KA; TD-50DP đem lại hiệu suất cao cho buổi diễn cũng như phòng thu.\r\n\r\nSở hữu bộ TD-50DP chuyên nghiệp\r\nBộ công cụ TD-50DP chuyên nghiệp đã được thêm vào bộ trống TD-50 với PD-1', 3),
(55, 'Roland TD-25KVX + KD-180', 'https://vietthuong.vn/image/cache/catalog/work/roland-td25kvx-400x400.jpg', 134380000, 'Âm thanh chân thực đến kinh ngạc\r\nRoland TD-25KVX sử dụng Công nghệ âm thanh độc quyền SuperNATURAL với Behavior Modeling mang tới âm thanh chân thực, đầy đủ sắc thái biểu cảm được thể hiện một cách chi tiết khi chơi rim shots, rolls, flams, và ghost note', 3),
(56, 'Alesis Debut Kit', 'https://vietthuong.vn/image/cache/catalog/alesis-debut-kit-4-400x400.jpg', 8820000, 'Bộ trống có mọi thứ bạn cần để bắt đầu ngay\r\nChơi trống chưa bao giờ dễ tiếp cận đến thế. Giới thiệu bộ Debut Kit của Alesis, một hệ thống đánh trống điện tử hoàn chỉnh trong một bộ.\r\n\r\nSản phẩm này có thể phát nhạc đi kèm với mọi chức năng cần thiết để c', 3),
(57, 'Alesis Nitro Mesh Kit', 'https://vietthuong.vn/image/cache/catalog/alesis-nitro-mesh-kit-400x400.jpg', 14910000, 'Cảm giác cao cấp và động lực học tự nhiên là cảm nhận sự khác biệt mà mặt lưới có thể tạo ra\r\nAlesis Nitro Mesh là một bộ trống điện tử 8 phần hoàn chỉnh xoay quanh công nghệ trống mặt lưới AlesisMesh thế hệ tiếp theo. Mặt lưới được nhiều người chơi trống', 3),
(58, 'Alesis Surge SE Kit', 'https://vietthuong.vn/image/cache/catalog/Drum-Trong/01-SurgeMeshKit_SE-400x400.jpg', 16910000, 'Bộ trống điện tử 8 chi tiết dành cho người mới tập chơi\r\n\r\nGiải pháp trống tất cả trong một cho người mới bắt đầu\r\nPhiên bản đặc biệt Surge SE Kit là một bộ trống điện tử cung cấp mọi thứ mà những người trẻ tuổi cần để học chơi trống với âm thanh thu hút ', 3),
(59, 'Alesis Nitro Mesh SE Kit', 'https://vietthuong.vn/image/cache/catalog/Drum-Trong/alesis_nitro_mesh_se-400x400.png', 14910000, 'Cảm giác cao cấp và động lực học tự nhiên là cảm nhận sự khác biệt mà mặt lưới có thể tạo ra\r\nAlesis Nitro Mesh SE Kit là một bộ trống điện tử 8 phần hoàn chỉnh xoay quanh công nghệ trống mặt lưới Alesis Mesh thế hệ tiếp theo. Mặt lưới được nhiều người ch', 3),
(60, 'VIVA VR-BDSET-NH trống bass VIVA', 'https://vietthuong.vn/image/cache/catalog/Meinl/viva-vr-bdset-nh-trong-bass-viva-400x400.jpg', 8810000, 'VIVA VR-BDSET-NH trống bass VIVA với âm thanh tuyệt vời và độ bền vượt trội.\r\n\r\nDòng âm thanh mềm mang đến VIVA VR-BDSET-NH trống bass VIVA âm sắc tổng thể thấp hơn với khả năng trình diễn nổi bật. Vỏ tổng hợp của phụ kiện có đáy cao su để chống trượt hoặ', 3),
(61, 'Suzuki SDG-6NL', 'https://vietthuong.vn/image/cache/catalog/work/Suzuki-SDG-6NL-1-270x270-400x400.jpg', 2500000, 'Đàn Guitar Suzuki SDG-6NL là đàn guitar Acoustic chính hãng do thương hiệu guitar nổi tiếng Suzuki sản xuất, đây là loại đàn thông dụng và phổ biến dành cho lứa tuổi học sinh,sinh viên, người mới tập chơi guitar chọn lựa.\r\n\r\n\r\n\r\nĐàn Guitar Suzuki SDG-6NL ', 4),
(62, 'Kapok D-118AC', 'https://vietthuong.vn/image/cache/catalog/work/Kapok-D-118AC-1-400x400-400x400.jpg', 2720000, 'Kapok D118-AC: Guitar giá tốt cho người mới\r\n\r\nĐàn guitar Kapok D-118AC thuộc phân khúc giá rẻ, phù hợp túi tiền với người mới bắt đầu cần một cây đàn làm quen hay những bạn học sinh, sinh viên điều kiện kinh tế còn hạn chế. Kapok luôn đảm bảo các công đo', 4),
(63, 'Taylor AD17E', 'https://vietthuong.vn/image/cache/catalog/Taylor_AD17E-400x400.png', 44100000, 'Một chương mới về giá trị và hiệu suất của Taylor\r\n\r\nVới loạt guitar acoustic do Mỹ chế tạo trong American Dream, Bob Taylor và Andy Powers đã mở ra một chương mới về giá trị và hiệu suất của Taylor. Chưa bao giờ việc sở hữu một cây đàn guitar Taylor do M', 4),
(64, 'Guitar Cordoba Stage', 'https://vietthuong.vn/image/cache/catalog/cordoba/guitar-cordoba-stage-001-400x400.jpg', 17360000, 'Cuộc cách mạng thiết kế Guitar :\r\n- Về mặt thiết kế đàn, Sp này mang thân mỏng giúp chống Feedback(Cộng hưởng, hú) trên sân khấu, phòng thu. Đàn Guitar thùng to rất dễ bị cộng hưởng.\r\n- Hãy nhìn lỗ thoát âm 3 lổ nhỏ ở trên, mục đích là giảm cổng hưởng ở 1', 4),
(65, 'Takamine GD10CE', 'https://vietthuong.vn/image/cache/catalog/work/Takamine-GD10CE-1-400x400-400x400.jpg', 7440000, 'Takamine GD10CE: Dáng dreadnought cutaway cá tính vừa tầm giá\r\nTakamine GD10CE là cây guitar được thiết kế đẹp mắt với thùng đàn lớn dáng dreadnought quen thuộc mang tới âm thanh acoustic cực kỳ mạnh mẽ. Đây còn là cây đàn lý tưởng cho biểu diễn sân khấu ', 4),
(66, 'Fender CD-60S', 'https://vietthuong.vn/image/catalog/fender-cd-60s.jpg', 5850000, 'Guitar Fender CD-60S nổi bật với thiết kế đẹp mắt. Đàn có dáng Dreadnought, thùng đàn lớn cho tiếng đàn to, ấm và đầy hơn, phù hợp cho các bạn chơi đệm và dùng pick. Cây đàn là một trong những mẫu Guitar phổ biến nhất của thương hiệu Fender ở mức giá tầm ', 4),
(67, 'Squier AFFINITY SERIES™ STRATOCASTER® HH', 'https://vietthuong.vn/image/cache/catalog/squier-affinity-series-stratocaster-hh-2-400x400.jpg', 7790000, 'Squier® Affinity Series ™ Stratocaster® HH mang đến thiết kế huyền thoại và giai điệu tinh túy cho người chơi guitar đầy khát vọng ngày nay. Dáng Strat® này có một số cải tiến thân thiện với người chơi như thân mỏng và nhẹ, Neck hình chữ “C” mỏng và thoải', 4),
(68, 'Squier AFFINITY SERIES™ PRECISION BASS® PJ', 'https://vietthuong.vn/image/catalog/squier-affinity-series-precision-bass-pj-3.jpg', 8200000, 'Squier® Affinity Series ™ Precision Bass® PJ mang đến thiết kế huyền thoại và giai điệu tinh túy cho tay bass đầy tham vọng ngày nay. P Bass® này có một số cải tiến thân thiện với người chơi như body mỏng và nhẹ, cổ hình chữ “C” mỏng và thoải mái và khoá ', 4),
(69, 'Fender FSR V3 CD60 CHY WN', 'https://vietthuong.vn/image/cache/catalog/fender/fender-fsr-v3-cd60-chy-wn-01-400x400.jpg', 1287000, 'CD-60 là một trong những mô hình phổ biến nhất của Fender và lý tưởng cho những người chơi đang tìm kiếm một cây đàn dáng dreadnought chất lượng cao giá cả phải chăng với giai điệu cùng khả năng chơi tuyệt vời. \r\nVới gỗ gụ (Mahogany) chất lượng ở Back & S', 4),
(70, 'Fender CC-60SCE', 'https://vietthuong.vn/image/cache/catalog/fender/fender-CC-60SCE-0970153006-01-400x400.jpg', 9290000, 'Nhỏ gọn và thoải mái, CC-60SCE lý tưởng cho người mới chơi. Đàn có dáng Concert nhỏ gọn, dễ dàng chơi ở bất kỳ vị trí nào với âm thanh tuyệt vời. Mặt trước bằng gỗ spruce nguyên khối, cần đàn thoải mái, và mặt sau và mặt gỗ gụ làm cho CC-60SCE trở thành l', 4),
(71, 'Guitar Classic Cordoba Fusion 5 Kèm Bag Guclcor-05407', 'https://vietthuong.vn/image/cache/catalog/cordoba/guitar-classic-cordoba-fusion-5-kem-bag-guclcor-05407-400x400.jpg', 12450000, 'Guitar Classic Cordoba FUSION 5 được thiết kế dáng Cutaway giúp người chơi dễ dàng bấm ở các ngăn cao, hợp âm cuối một cách dễ dàng, vừa tăng thêm tính thẩm mỹ cho cây đàn. Mặt top của đàn là gỗ nguyên tấm Solid mang đến âm thanh trong trẻo, ấm áp, vang h', 4),
(72, 'Fender Player Plus Stratocaster®', 'https://vietthuong.vn/image/catalog/fender-player-plus-stratocaster.jpg', 27000000, 'Kết hợp giữa thiết kế Fender® cổ điển với các tính năng hỗ trợ người chơi và lớp phủ mới thú vị, Player Plus Stratocaster® mang đến khả năng chơi tuyệt vời và phong cách không thể nhầm lẫn. Trọng tâm của Series này là bộ ba Pickup Player Plus Noiseless ™ ', 4),
(73, 'TANGLEWOOD TWCR DCE CROSSROADS DREADNOUGHT ACOUSTIC', 'https://vietthuong.vn/image/cache/catalog/tanglewood/tanglewood-twcrdce-400x400.jpg', 4130000, 'Crossroads bày tỏ sự tôn kính đối với phong cách và âm thanh của các nhạc cụ cổ điển từ năm 1930 của Mỹ. Những năm 30 là khoảng thời gian khó khăn trên khắp nước Mỹ với cuộc Đại suy thoái khiến các cộng đồng phải quỳ gối và cuộc chiến và nỗi đau của nghèo', 4),
(74, 'Squier AFFINITY SERIES™ STRATOCASTER® FMT HSS', 'https://vietthuong.vn/image/catalog/squier-affinity-series-stratocaster-fmt-hss-2.jpg', 8750000, 'Squier® Affinity Series ™ Stratocaster® FMT HSS mang đến thiết kế huyền thoại và giai điệu tinh túy cho người chơi guitar đầy khát vọng ngày nay. Dáng Strat® này có một số cải tiến thân thiện với người chơi như thân mỏng và nhẹ Flame Maple Top, Neck hình ', 4),
(75, 'Squier CLASSIC VIBE 60S JAZZMASTER', 'https://vietthuong.vn/image/cache/catalog/squier-classic-vibe-60s-jazzmaster-2-400x400.jpg', 11550000, 'Classic Vibe ‘60s Jazzmaster® là một sự tôn kính trung thành và nổi bật đối với sự yêu thích mang tính biểu tượng của Fender, tạo ra giai điệu Jazzmaster không thể phủ nhận của những chiếc xe Pickup Singcold được thiết kế bởi Fender', 4),
(76, 'Cordoba 55FCE Negra - Ziricote W/C', 'https://vietthuong.vn/image/cache/catalog/cordoba-55FCE-2-400x400.jpg', 45900000, 'Đàn ghita dây nylon Crossover xuất sắc\r\n\r\n\r\n55FCE Negra bổ sung thêm lớp exotic ziricote ở mặt sau và hai bên cho chiếc 55FCE sẵn sàng trên sân khấu. Thân đàn mỏng, chống feedback của 55FCE Negra được làm thủ công, làm cho cây đàn guitar sản xuất tại Tây ', 4),
(77, 'Tanglewood TWBB SFCE', 'https://vietthuong.vn/image/cache/catalog/tanglewood/tanglewoodguitars-twbbsfce-01-400x400.jpg', 6240000, 'Tanglewood TWBB SFCE là mẫu đàn guitar acoustic dành cho người chơi, có thiết kế đẹp, âm thanh hay & giá thành canh tranh. Đàn có kiểu dáng Super Folk Cutaway (dáng A khuyết góc) nhìn khá sang trọng và hiện đại, toàn bộ đàn được làm từ gỗ cao cấp, trang b', 4),
(78, 'Fender SQ Bass J Affinity SLS', 'https://vietthuong.vn/image/cache/catalog/2-electric-guitar/fender-sq-bass-j-affinity-sls-400x400.jpg', 6200000, 'Là một cửa ngõ tuyệt vời vào gia đình Fender® nổi tiếng với thời gian, Squier® Affinity Series ™ Jazz Bass® mang đến thiết kế huyền thoại và giai điệu tinh túy cho nghệ sĩ bass đầy tham vọng ngày nay. J Bass® có một số cải tiến thân thiện với người chơi n', 4),
(79, 'Gretsch G5024E', 'https://vietthuong.vn/image/cache/catalog/Guitar/gretsch/gretsch-g5024e-400x400.jpg', 7990000, 'Guitar acoustic Gretsch-G5024E hoàn hảo từ trong ra ngoài. Gretsch-G5024E là cây guitar acoustic được đánh giá là đáng mua nhất với lớp sơn bóng bẩy trên nền sunburst. \r\nVới hệ thống điện tử được tích hợp sẵn mang đến âm thanh tuyệt vời và cái nhìn bắt mắ', 4),
(80, 'American Professional II Jazz Bass® V', 'https://vietthuong.vn/image/cache/catalog/fender/american-professional-ii-jazz-bass-v-0193992763-400x400.jpg', 51690000, 'American Professional II Jazz Bass® dựa trên hơn sáu mươi năm đổi mới, truyền cảm hứng và tiến hóa để đáp ứng nhu cầu của các nhạc sĩ chuyên nghiệp ngày nay. Cổ “Slim C” phổ biến của chúng tôi hiện nay có các cạnh phím đàn tròn nhẵn, lớp hoàn thiện bằng s', 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` int(20) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `email`, `password`, `phone`, `address`) VALUES
(1, 'dddd', 'ngoanhduc@gmail.com', '123456', 2323434, 'hanoi'),
(7, 'tienhuy', 'ngoanhduc10a2@gmail.com', '123456', 39659343, 'Thôn Lương Quy'),
(12, 'tienhuy@gmail.com', 'ngoanhduc9a@gmail.com', '123456', 39659343, 'Thôn Lương Quy');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_cate`);

--
-- Chỉ mục cho bảng `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD PRIMARY KEY (`order_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `key_type` (`category_id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id_cate` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD CONSTRAINT `invoice_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `invoice_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`user_id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `key_type` FOREIGN KEY (`category_id`) REFERENCES `category` (`id_cate`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
