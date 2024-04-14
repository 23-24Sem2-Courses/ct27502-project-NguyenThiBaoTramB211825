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
('tungvu@gmail.com', 123, 'Vũ Đình Tùng', '0123456789');


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
("S001", "Nguyên Lý Hệ quản trị cơ sở dữ liệu",40, "anh1.png",  "TG001", "TL001", "NXB001", 2020, "Nguyên lý hệ quản trị cơ sở dữ liệu"),
("S002", "Cơ sở dữ liệu", 45, "anh2.png",  "TG002", "TL001", "NXB001", 2018, "Cơ sở dữ liệu"),
("S003", "Các giải pháp lập trình C#",50, "anh3.png", "TG003", "TL001", "NXB002", 2019, "Các giải pháp lập trình C#"),
("S004", "Giáo trình Tư tưởng Hồ Chí Minh", 55, "anh4.png", "TG004", "TL002", "NXB003", 2021, "Giáo trình Tư tưởng Hồ Chí Minh"),
("S005", "Giáo trình Lịch sử Đảng Cộng sản Việt Nam", 60, "anh5.png","TG004", "TL002", "NXB003", 2021, "Giáo trình Lịch sử Đảng Cộng sản Việt Nam"),
("S006", "Giáo trình Chủ nghĩa xã hội và khoa học", 65, "anh6.png", "TG004", "TL002", "NXB003", 2021, "Giáo trình Chủ nghĩa xã hội và khoa học"),
("S007", "Giáo trình Kinh tế chính trị Mác-Lênin", 70, "anh7.png", "TG004", "TL002", "NXB003", 2021, "Giáo trình Kinh tế chính trị Mác-Lênin"),
("S008", "Giáo trình Triết học Mác-Lênin", 75, "anh8.png", "TG004", "TL002", "NXB003", 2021, "Giáo trình Triết học Mác-Lênin"),
("S009", "Giáo trình Phân tích thiết kế hệ thống thông tin", 80, "anh9.png","TG005", "TL001", "NXB001", 2015, "Giáo trình Phân tích thiết kế hệ thống thông tin"),
("S010", "Giáo trình Phân tích thiết kế hệ thống thông tin quản lý",85, "anh10.png", "TG006", "TL001", "NXB004", 1994, "Giáo trình Phân tích thiết kế hệ thống thông tin quản lý"),
("S011", "Giáo trình Anh văn căn bản 1",  90, "anh11.png", "TG004","TL005", "NXB001", 2023, "Giáo trình Anh văn căn bản 1");

insert into hoaDon(soHD,ngayLap, dcGiaoHang, hinhThucTT,emaildn ) values
("HD001", '2021-06-26', 'Hà Nội', 'ATM', 'thanh@gmail.com');

insert into CTHD(id_CTHD, soHD,maSach, soLuong, thanhTien) values
("CT001", "HD001", "S001", 1,40.00),
("CT002", "HD001", "S003", 2,90.00);

select * from sach; 
select * from tacgia;
select * from theloai;
select * from nhaxuatban;
select * from hoadon;
select * from CTHD;
select * from admin;
