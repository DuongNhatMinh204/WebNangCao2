# Xây dựng Web du lịch

## Giới thiệu
Trang web là một hệ thống quản lý và đặt tour du lịch trực tuyến, được xây dựng bằng PHP Laravel với cơ sở dữ liệu MySQL. Hệ thống hỗ trợ người dùng đặt tour, quản lý thông tin cá nhân, và cung cấp giao diện quản trị để quản lý các nội dung liên quan đến tour du lịch.

## Công nghệ sử dụng
- **Backend:** PHP Laravel
- **Frontend:** HTML, CSS, JavaScript
- **Database:** MySQL
- **Authentication:** Laravel Auth (Sử dụng bcrypt để mã hóa mật khẩu)

## Chức năng chính

### 1. Chức năng người dùng
- **Đăng ký & Đăng nhập**: Người dùng có thể đăng ký tài khoản bằng số điện thoại và mật khẩu, sau đó đăng nhập vào hệ thống.
- **Đặt tour**: Người dùng có thể xem danh sách các tour du lịch, chọn tour mong muốn và tiến hành đặt tour.
- **Quản lý đặt tour**: Xem danh sách các tour đã đặt, hủy tour nếu cần thiết.
- **Cập nhật thông tin cá nhân**: Người dùng có thể chỉnh sửa thông tin cá nhân như họ tên, email, số điện thoại.

### 2. Chức năng quản trị viên (Admin)
- **Quản lý người dùng**: Xem danh sách người dùng, chỉnh sửa hoặc xóa tài khoản.
- **Quản lý tour du lịch**: Thêm, sửa, xóa tour du lịch.
- **Quản lý đơn đặt tour**: Xem danh sách đơn đặt tour, xác nhận hoặc hủy đơn đặt tour.

## Cách chạy dự án trên Local

### 1. Cài đặt Laravel và các dependencies
```bash
composer install
```
![image](https://github.com/user-attachments/assets/32b52d7a-7b4f-4fc2-9457-41e059612420)


### 2. Cấu hình môi trường
- Sao chép tệp `.env.example` thành `.env`
- Thiết lập kết nối cơ sở dữ liệu trong `.env`
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=travel_webnangcao
DB_USERNAME=root
DB_PASSWORD=
```

### 3. Tạo và chạy migration database
```bash
php artisan migrate --seed
```

### 4. Chạy ứng dụng
```bash
php artisan serve
```

Sau đó, truy cập vào `http://127.0.0.1:8000/` để sử dụng hệ thống.

## Tài khoản mẫu
- **Admin**:  
  - Email: `admin@gmail.com`  
  - Mật khẩu: `admin123`

- **Người dùng**:  
  - Số điện thoại: `0912345678`  
  - Mật khẩu: `user123`



