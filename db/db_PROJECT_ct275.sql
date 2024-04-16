drop database if exists db_project_ct275;
create database db_project_ct275;
use db_project_ct275;

-- Bảng tkadmin
drop table  if exists admin;
create table admin (
  tenDN varchar(50)  NOT NULL,
  matKhau varchar(50)  NOT NULL,
  primary key (tenDN)
) ;
INSERT INTO admin (tenDN, matKhau) VALUES
('admin', 'admin');


-- Bảng TK user
create table `nguoiDung` (
  `emaildn` varchar(50) NOT NULL,
  `matKhau` int(200) NOT NULL,
  `hoTen` varchar(100)  NOT NULL,
  `dienThoai` varchar(50) NOT NULL,
    primary key (emaildn)
);

INSERT INTO `nguoiDung` (`emaildn`, `matKhau`, `hoTen`, `dienThoai`) VALUES
('thanh@gmail.com', 123, 'Thanh Truong', '1234567890'),
('tungvu@gmail.com', 123, 'Vũ Đình Tùng', '0123456789'),
('nguyenvana@gmail.com', 123, 'Nguyễn Văn A', '0855191708'),
('nguyenvanb@gmail.com', 123, 'Nguyễn Văn B', '0986557167'),
('tramnguyen@gmail.com', 123, 'Nguyễn Thị Bảo Trâm', '0357160516'),
('chuongcao@gmail.com', 123, 'Cao Quốc Chương', '0822034324');

-- Bảng tác giả
create table tacGia (
	maTG char(10) not null,
    tenTG varchar(50) not null,
    website varchar(50),
    ghiChu varchar(255),
    primary key (maTG)
);

-- Bảng thể loại
create table theLoai (
	maTL char(10) not null,
    tenTL varchar(50) not null,
    primary key (maTL)
);

-- Bảng nhà xuất bản
create table nhaXuatBan (
	maNXB char(10) not null,
    tenNXB varchar(50) not null,
    diaChi varchar(100),
    email varchar(50),
    primary key (maNXB)
);

-- Bảng sách
create table sach (
	maSach char(10) not null,
	tenSach varchar(50) not null, 
    giaSach double not null, 
    hinhAnh varchar(200) not null, 
    maTG char(10) not null,
    maTL char(10) not null,
    maNXB char(10) not null,
	namXuatBan int, 
    mota text not null, 
	primary key (maSach),
	foreign key (maTG) references tacGia(maTG),
	foreign key (maTL) references theLoai(maTL),
	foreign key (maNXB) references nhaXuatBan(maNXB)
);


-- Hóa đơn
drop table if exists hoaDon;
-- DELETE FROM hoadon WHERE sodh > 0;
CREATE TABLE `hoaDon` (
  `soHD` varchar(50) NOT NULL,
  `ngayLap` date NOT NULL,
  `dcGiaoHang` varchar(250)  NOT NULL,
  `hinhThucTT` varchar(100) NOT NULL,
   `emaildn` varchar(50) NOT NULL,
	primary key (soHD),
	foreign key (emaildn) references nguoiDung(emaildn)
);

-- Cấu trúc bảng cho bảng `chitiethoadon`
drop table if exists CTHD;
CREATE TABLE `CTHD` (
  `id_CTHD` varchar(50) NOT NULL,
  `soHD` varchar(50) NOT NULL,
  `maSach` char(10) NOT NULL,
  `soLuong` int(11) NOT NULL,
  `thanhTien` decimal(9,2) NOT NULL,
  foreign key (soHD) references hoaDon(soHD),
  foreign key (maSach) references sach(maSach),
primary key (id_CTHD)
);

-- INSERT CÁC BẢNG DỮ LIỆU

insert into tacGia(maTG, tenTG, website, ghiChu) values
("TG001", "Trần Công Án", "abc.com", "Chủ biên"),
("TG002", "Đặng Quốc Bảo", "cde.com", "Chủ biên"),
("TG003", "Nguyễn Ngọc Bình Phương", "fgh.com", "Tổng hợp và biên dịch"),
("TG004", "Bộ Giáo dục và Đào Tạo", "ijk.com", "Bộ"),
("TG005", "Trương Quốc Định", "def.com", "Chủ biên"),
("TG006", "Trần Thành Trai", "ttt.com", "Chủ biên"),
("TG007", "Đào Phương Chi", "", ""),
("TG008", "Đinh Ngọc Thạch", "dnt.com", "Chủ biên"),
("TG009", "Dương Trọng Phúc", "dtp.com", ""),
("TG010", "Nguyễn Khanh Văn", "", "");

insert into theLoai(maTL, tenTL) values
("TL001", "Công nghệ thông tin"),
("TL002", "Triết học"),
("TL003", "Khoa học xã hội"),
("TL004", "Khoa học tự nhiên"),
("TL005", "Ngoại ngữ");

insert into nhaXuatBan(maNXB, tenNXB, diaChi , email) values
("NXB001", "Nhà xuất bản Đại học Cần Thơ", "Cần Thơ", "nxbdhct@ctu.edu.vn"),
("NXB002", "Nhà xuất bản Giao thông vận tải", "Hà Nội", "nxbgtvt@fpt.vn"),
("NXB003", "Nhà xuất bản chính trị quốc gia sự thật", "Cần Thơ", "sachsuthatcantho@gmail.com"),
("NXB004", "Nhà xuất bản Thống kê", "Hà Nội", "nxbtk@gmail.com"),
("NXB005", "Nhà xuất bản Khoa học xã hội", "Hà Nội", "nxbkhxh@gmail.com"),
("NXB006", "Nhà xuất bản Tổng hợp", "Hồ Chí Minh", "tonghop@nxbhcm.com.vn"),
("NXB007", "Nhà xuất bản Bách khoa Hà Nội", "Hà Nội", "nxbbk@hust.edu.vn");
select * from nhaxuatban;


insert into sach(maSach, tenSach,giaSach,  hinhAnh, maTG, maTL, maNXB, namXuatBan, mota) values
("S001", "Nguyên Lý Hệ quản trị cơ sở dữ liệu",40, "anh1.png",  "TG001", "TL001", "NXB001", 2020, "Nguyên Lý Hệ quản trị cơ sở dữ liệu là một cuốn sách cung cấp kiến thức căn bản và nâng cao về quản trị cơ sở dữ liệu (DBMS). Cuốn sách này giới thiệu những nguyên lý cơ bản của hệ quản trị cơ sở dữ liệu, bao gồm thiết kế cơ sở dữ liệu, truy vấn dữ liệu, quản lý dữ liệu, bảo mật dữ liệu và hiệu suất hệ thống."),
("S002", "Cơ sở dữ liệu", 45, "anh2.png",  "TG002", "TL001", "NXB001", 2018, "Quyển sách cơ sở dữ liệu thường được sử dụng trong các khoá học đại học và cao đẳng về cơ sở dữ liệu, cũng như là tài liệu tham khảo cho những người làm việc trong lĩnh vực công nghệ thông tin và quản trị hệ thống. Đối với sinh viên và chuyên gia IT, đây là một nguồn tư liệu quý báu để hiểu rõ hơn về cơ sở dữ liệu và áp dụng kiến thức vào thực tiễn."),
("S003", "Các giải pháp lập trình C#",50, "anh3.png", "TG003", "TL001", "NXB002", 2019, "Cuốn sách này thường bao gồm các chủ đề như cú pháp cơ bản của C#, cấu trúc dữ liệu và thuật toán, lập trình hướng đối tượng (OOP), xử lý ngoại lệ và quản lý lỗi, đa luồng và bất đồng bộ trong C#, giao diện người dùng và tương tác với cơ sở dữ liệu."),
("S004", "Giáo trình Tư tưởng Hồ Chí Minh", 55, "anh4.png", "TG004", "TL002", "NXB003", 2021, "Giáo trình Tư tưởng Hồ Chí Minh là tài liệu học tập cung cấp cái nhìn tổng quan về tư tưởng và triết lý của Chủ tịch Hồ Chí Minh, từ cuộc đời đến sự nghiệp cách mạng và xây dựng quốc gia. Với các chủ đề như tư duy quốc gia, dân chủ, và xã hội chủ nghĩa, giáo trình này nhấn mạnh vai trò lãnh đạo của Hồ Chí Minh trong đấu tranh, xây dựng và bảo vệ Tổ quốc Việt Nam."),
("S005", "Giáo trình Lịch sử Đảng Cộng sản Việt Nam", 60, "anh5.png","TG004", "TL002", "NXB003", 2021, "Giáo trình Lịch sử Đảng Cộng sản Việt Namlà một tài liệu quan trọng trong hệ thống giáo trình của các trường đại học và các cơ sở đào tạo ở Việt Nam. Trong giáo trình này, được biên soạn bởi các chuyên gia và nhà nghiên cứu lịch sử, nhà triết học, được chính Đảng Cộng sản Việt Nam phê duyệt, cung cấp một cái nhìn tổng quan về quá trình hình thành, phát triển của Đảng từ những ngày đầu tiên cho đến thời điểm hiện tại."),
("S006", "Giáo trình Chủ nghĩa xã hội và khoa học", 65, "anh6.png", "TG004", "TL002", "NXB003", 2021, "Giáo trình Chủ nghĩa xã hội và khoa học là một tài liệu giáo trình chuyên sâu, giải thích về mối quan hệ giữa chủ nghĩa xã hội và khoa học. Trong giáo trình này, được biên soạn bởi các chuyên gia về lịch sử, triết học, và khoa học xã hội, nhấn mạnh vào vai trò của khoa học trong việc hiểu và xây dựng chủ nghĩa xã hội."),
("S007", "Giáo trình Kinh tế chính trị Mác-Lênin", 70, "anh7.png", "TG004", "TL002", "NXB003", 2021, "Giáo trình Kinh tế chính trị Mác-Lênin là một tài liệu chuyên sâu về lý thuyết kinh tế và chính trị do Karl Marx và Friedrich Engels (về phần Mác) cùng với các nhà lý luận tiếp theo (về phần Lênin) đã phát triển và mở rộng."),
("S008", "Giáo trình Triết học Mác-Lênin", 75, "anh8.png", "TG004", "TL002", "NXB003", 2021, "Giáo trình Triết học Mác-Lênin là một tài liệu chuyên sâu về triết học chính trị do Karl Marx và Friedrich Engels (về phần Mác) cùng với V.I. Lenin và các nhà lý luận tiếp theo (về phần Lênin) đã phát triển và mở rộng."),
("S009", "Giáo trình Phân tích thiết kế hệ thống thông tin", 80, "anh9.png","TG005", "TL001", "NXB001", 2015, "Giáo trình Phân tích thiết kế hệ thống thông tin là một tài liệu hướng dẫn về quy trình phân tích, thiết kế và triển khai các hệ thống thông tin. Trong giáo trình này, người đọc sẽ tìm hiểu về các phương pháp và công cụ để phân tích yêu cầu của người dùng, thiết kế cấu trúc dữ liệu, xác định các quy trình kinh doanh, và triển khai các giải pháp công nghệ thông tin."),
("S010", "Giáo trình PTTK hệ thống thông tin quản lý",85, "anh10.png", "TG006", "TL001", "NXB004", 1994, "Giáo trình Phân tích thiết kế hệ thống thông tin quản lý là một tài liệu chuyên sâu giúp học viên hiểu và áp dụng các phương pháp, kỹ thuật trong việc phân tích, thiết kế và triển khai hệ thống thông tin trong lĩnh vực quản lý."),
("S011", "Giáo trình Anh văn căn bản 1",  90, "anh11.png", "TG004","TL005", "NXB001", 2023, "Giáo trình Anh văn căn bản 1là một tài liệu học tập được thiết kế để giúp người học bắt đầu từ những kiến thức căn bản về ngôn ngữ Anh. Trong giáo trình này, người học sẽ được giới thiệu với các khái niệm cơ bản về ngữ pháp, từ vựng và kỹ năng giao tiếp.");

insert into hoaDon(soHD,ngayLap, dcGiaoHang, hinhThucTT,emaildn ) values
("HD001", "2021-06-26", "Hà Nội", "ATM", "thanh@gmail.com"),
("HD002", "2021-06-27", "Hồ Chí Minh", "Chuyển khoản", "nguyenvana@gmail.com"),
("HD003", "2021-06-28", "An Giang", "ATM", "nguyenvanb@gmail.com"),
("HD004", "2021-06-29", "Cần Thơ", "Chuyển khoản", "tungvu@gmail.com"),
("HD005", "2021-06-30", "Vĩnh Long", "ATM", "chuongcao@gmail.com"),
("HD006", "2021-06-30", "Sóc Trăng", "Chuyển khoản", "tramnguyen@gmail.com");

insert into CTHD(id_CTHD, soHD,maSach, soLuong, thanhTien) values
("CT001", "HD001", "S001", 1,40.00),
("CT002", "HD001", "S003", 2,100.00),
("CT003", "HD002", "S003", 1,50.00),
("CT004", "HD003", "S004", 1,55.00),
("CT005", "HD003", "S005", 2,120.00),
("CT006", "HD003", "S006", 1,65.00),
("CT007", "HD004", "S007", 3,210.00),
("CT008", "HD004", "S008", 1,75.00),
("CT009", "HD004", "S009", 3,240.00),
("CT010", "HD004", "S010", 2,170.00),
("CT011", "HD005", "S001", 1,40.00),
("CT012", "HD006", "S001", 2,80.00),
("CT013", "HD005", "S003", 3,150.00);

select * from sach; 
select * from tacgia;
select * from theloai;
select * from nhaxuatban;
select * from hoadon;
select * from CTHD;
select * from admin;
select * from nguoiDung;

-- -- Lấy ra chi tiết hóa đơn có số hóa đơn ="HD003"
-- select ct.id_CTHD, s.tenSach, s.giaSach, ct.soLuong, ct.thanhTien
-- from CTHD ct
-- join hoadon hd on hd.soHD = ct.soHD
-- join sach s on s.maSach = ct.maSach
-- where hd.soHD="HD003";

-- -- Tính tổng tiền của một hóa đơn
-- SELECT SUM(ct.thanhTien) AS tongTien
-- FROM CTHD ct
-- JOIN hoaDon hd ON hd.soHD = ct.soHD
-- JOIN sach s ON s.maSach = ct.maSach
-- WHERE hd.soHD = "HD003";

-- -- Lấy nội dung của một hóa đơn
-- SELECT h.soHD,h.ngayLap, nd.hoTen as HTKH, nd.dienThoai as DTKH, h.dcGiaoHang, h.hinhThucTT
--                                                 from hoaDon h
--                                                 join nguoiDung nd on nd.emaildn = h.emaildn
--                                                 Order by h.soHD;

-- DELETE FROM sach WHERE maSach = 'S003';
-- UPDATE tacGia
--         SET tenTG = 'đã sửa', website = 'đã sửa', ghiChu = 'đã sửa'
--         WHERE maTG = 'TG001';