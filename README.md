# CustomModule
I. Pull source code về project

B1: Mở terminal, chạy : cd /var/www/html/tên project/app/code

B2: git clone https://github.com/Thaotb02/CustomModule.git

B3: bin/magento c:c && bin/magento s:up && bin/magento s:s:d -f && bin/magento s:d:c =>Hoàn thành

II. Đề bài

1. Module Attribute Customer
    Thêm các trường sau để khách hàng hoàn thành khi đăng ký:
    - Organization Name (Textfield)
    - Contact Phone Number(Textfield)
    - Company Type (Dropdown)
      + CBD Manufacturer
      + CBD Brand and Marketing company
      + CBD Extractor
      + Other
    Note: Chỉ hiển thị Attribute Organization Name khi chọn Company Type = Other
    
2. Module Custom Checkout
    - Thêm một step trang checkout để khách hàng nhập thông tin ngày giao hàng và note 
    - Ngày giao hàng requireAdmin có thể xem + sửa thông tin ngày giao hàng và note ở backend ( Order detail )
    
3. Module Product Order Grid
    - Trong backend thêm Grid Order ở trong Product edit
    - Bảng Product Order hiển thị những order có product item là sản phẩm đã chọn

