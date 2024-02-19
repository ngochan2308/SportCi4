<?php

// Kiểm tra xem form đã được submit chưa
if(isset($_POST['xac_nhan_thanh_toan'])){
    
    // Lấy thông tin từ form
    $fullname = isset($userInfo['Fullname']) ? $userInfo['Fullname'] : 'Fullname not available';
    $email = isset($userInfo['email']) ? $userInfo['email'] : 'Email not available';
    $phone = isset($userInfo['Phone']) ? $userInfo['Phone'] : 'Phone not available';
    $address = isset($userInfo['Address']) ? $userInfo['Address'] : 'Address not available';
    $paymentMethod = $_POST['payment_method'];
    
    // Lưu thông tin vào bảng hoadon
    $dataHoaDon = [
        'Fullname' => $fullname,
        'Email' => $email,
        'Phone' => $phone,
        'Address' => $address,
        'PaymentMethod' => $paymentMethod,
        // Thêm các trường khác nếu cần
    ];

    $hoadonId = db_insert('hoadon', $dataHoaDon); // Giả sử hoadon có trường id là khóa chính

    // Lưu thông tin vào bảng chitiethoadon
    foreach ($cart_items as $item) {
        $dataChiTietHoaDon = [
            'HoaDonID' => $hoadonId,
            'ProductID' => $item['MaSP'],
            'Quantity' => $item['SoLuongSP'],
            'UnitPrice' => $item['GiaSP'],
            // Thêm các trường khác nếu cần
        ];

        db_insert('chitiethoadon', $dataChiTietHoaDon);
    }

    // Xóa giỏ hàng sau khi đã thanh toán
    session()->remove('cart_items');

    // Redirect hoặc hiển thị thông báo thành công
    header('Location: thanh-toan-thanh-cong.php');
    exit();
} else {
    // Hiển thị thông báo lỗi hoặc xử lý khác nếu form chưa được submit
    // ...
}
