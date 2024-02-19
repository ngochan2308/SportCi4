<?php
// Lấy danh sách sản phẩm từ Session
$cartItems = session()->get('cart_items') ?? [];
$totalPrice = 0;

// ... (phần code khác của bạn)

// Xử lý khi người dùng xác nhận thanh toán
if (isset($_POST['xac_nhan_thanh_toan'])) {
    // Lấy thông tin người dùng từ form
    $userInfo = [
        'Fullname' => $_POST['fullname'],
        'email' => $_POST['email'],
        'Phone' => $_POST['phone'],
        'Address' => $_POST['address'],
        // Thêm các trường khác nếu cần
    ];

    // Lưu thông tin đơn hàng vào cơ sở dữ liệu
    $hoaDonModel = new \App\Models\HoaDonModel();
    $invoiceId = $hoaDonModel->insertHoaDon(
        $userInfo['Fullname'],
        $userInfo['email'],
        $userInfo['Phone'],
        $userInfo['Address']
    );

    // Lưu thông tin chi tiết đơn hàng vào bảng chitiethoadon
    $chiTietHoaDonModel = new \App\Models\ChiTietHoaDonModel();
    foreach ($cartItems as $item) {
        $detailData = [
            'MaHoaDon' => $invoiceId,
            'MaSP' => $item['MaSP'],
            'SoLuong' => $item['SoLuongSP'],
            'DonGia' => $item['GiaSP'],
            'ThanhTien' => $item['SoLuongSP'] * $item['GiaSP'],
        ];

        $chiTietHoaDonModel->insert($detailData);

        // Cập nhật số lượng sản phẩm trong bảng sanpham nếu cần
        // ...
    }

    // Hủy session sau khi xác nhận thanh toán (để làm mới giỏ hàng)
    unset($_SESSION['cart_items']);

    // Chuyển hướng hoặc thực hiện các hành động cần thiết sau khi thanh toán
    // ...
}

// ... (phần code khác của bạn)
?>
<!doctype html>
<html lang="en">
<head>
<?= view('user/layout/head'); ?>
<style>
    .cart table {
        width: 100%;
        border-collapse: collapse;
    }

    .cart table, .cart th, .cart td {
        border: 1px solid #ddd;
    }
    
    .cart th, .cart td {
        padding: 8px;
        text-align: left;
    }

    .cart th {
        background-color: #f2f2f2;
    }

    .product_image img {
        max-width: 80px;
        height: auto;
    }

    .product_name, .product_price, .product_quantity, .product_total {
        vertical-align: middle;
    }

    .quantity-container {
        max-width: 100px;
        margin: 0 auto;
    }

    .quantity-amount {
        width: 40px;
        text-align: center;
    }

    .btn-outline-black {
        padding: 5px 10px;
        font-size: 12px;
    }

    .product_total {
        font-weight: bold;
    }
    .section-heading{
        padding-top:50px;
        padding-bottom:20px;

        text-align:center;

    }

    /* form thanh toán */

    .shipping-info form label {
    display: block;
    margin-bottom: 5px;

    
}

.shipping-info form input,
.shipping-info form textarea {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
    box-sizing: border-box;
}
.shipping-info form select {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
    box-sizing: border-box;
}

button {
        background-color: #4CAF50;
        color: white;
        padding: 10px 30px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        margin-top: 10px;
    }

    button:hover {
        background-color: #45a049;
    }
    .tong{text-align:right;}

   

</style>

	</head>


	<body>

		<!-- Start Header/Navigation -->
		<?= view('user/layout/header'); ?>
		<!-- End Header/Navigation -->



		<div class="section-heading">
              <h2>THANH TOÁN SẢN PHẨM</h2>
            </div>

            <div class="container">
            <div class="row">
                <!-- Cột cho bảng -->
                <div class="col-md-8">
                    <div class="cart">
                        <div class="team-members">
                        
                            <table>
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Subtotal</th>
                                       
                                        <!-- Thêm các cột thông tin sản phẩm khác nếu cần -->
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                $totalPrice = 0; // Khởi tạo biến tổng giá trị
                foreach ($cart_items as $item): ?>
					<tr>
						<td class="product_image">
						<?php if (array_key_exists('HinhAnhSP', $item) && !empty($item['HinhAnhSP'])): ?>
							<img src="<?= base_url('asset_user/images/' . $item['HinhAnhSP']) ?>" class="img-fluid product-thumbnail">
						
						<?php endif; ?>
					</td>

<td class="product_name">
    <?php if (array_key_exists('TenSP', $item) && !empty($item['TenSP'])): ?>
        <strong class="product-title"><?= $item['TenSP'] ?></strong>

    <?php endif; ?>
</td>

<td class="product_price">
    <?php if (array_key_exists('GiaSP', $item) && !empty($item['GiaSP'])): ?>
        <strong class="product-price"><?= number_format($item['GiaSP']) ?></strong>

    <?php endif; ?>
</td>
<td class="product_quantity">
    <?php if (array_key_exists('SoLuongSP', $item) && !empty($item['SoLuongSP'])): ?>
           
        <strong class="product-title"><?= $item['SoLuongSP'] ?></strong>


       



    <?php endif; ?>
    <input type="hidden" name="product_id[]" value="<?= $item['MaSP'] ?>">

</td>



<td class="product_total">
<?php if (array_key_exists('SoLuongSP', $item) && array_key_exists('GiaSP', $item)): ?>
    <?php
    $quantity = is_numeric($item['SoLuongSP']) ? $item['SoLuongSP'] : 0;
    $price = is_numeric($item['GiaSP']) ? $item['GiaSP'] : 0;
    $totalItemPrice = $quantity * $price;
    $totalPrice += $totalItemPrice;
    echo number_format($totalItemPrice);
    ?>

<?php endif; ?>

</td>


</tr>

                <?php endforeach; ?>
        

                                </tbody>
                            </table>
                            <div class="tong">
                      
                        <span class="text-black">Total: </span>

                          <strong class="text-black"><?=  number_format($totalPrice) ?></strong>

                      </div>
                        </div>
                        
                    </div>
                    
                </div>
             



             <!-- Cột cho thông tin giao hàng -->
        <div class="col-md-4">
            <div class="shipping-info">
                <h3>Thông Tin Giao Hàng</h3>
               
                <form action="<?= base_url('thanh-toan') ?>" method="post">

                <?= csrf_field() ?>
    <div>
        <p>Fullname: <?= isset($userInfo['Fullname']) ? $userInfo['Fullname'] : 'Fullname not available' ?></p>
    </div>

    <div>
        <p>Email: <?= isset($userInfo['email']) ? $userInfo['email'] : 'Email not available' ?></p>
    </div>

    <div>
        <p>Phone: <?= isset($userInfo['Phone']) ? $userInfo['Phone'] : 'Phone not available' ?></p>
    </div>

    <div>
        <p>Address: <?= isset($userInfo['Address']) ? $userInfo['Address'] : 'Address not available' ?></p>
    </div>

    <div>
    <label for="payment_method">Payment Method:</label>
    <select name="payment_method" required>
        <option value="credit_card">Credit Card</option>
        <option value="paypal">PayPal</option>
        <option value="cast">Cast</option>

        <!-- Thêm các phương thức thanh toán khác nếu cần -->
    </select>
</div>

 <!-- Các trường ẩn để truyền dữ liệu lên server -->
 <input type="hidden" name="fullname" value="<?= $userInfo['Fullname'] ?>">
            <input type="hidden" name="email" value="<?= $userInfo['email'] ?>">
            <input type="hidden" name="phone" value="<?= $userInfo['Phone'] ?>">
            <input type="hidden" name="address" value="<?= $userInfo['Address'] ?>">

    
    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />

    <button type="submit" name="xac_nhan_thanh_toan">Xác nhận thanh toán</button>
    
</form>

            </div>
        </div>
    </div>
</div>




          <!-- cập nhật sản phẩm -->
          <!-- cập nhật sản phẩm -->

	
		<script src="<?= base_url('asset_user/js/bootstrap.bundle.min.js')?>"></>
		<script src="<?= base_url('asset_user/js/tiny-slider.js')?>"></script>
		<script src="<?= base_url('asset_user/js/custom.js')?>"></script>
	</body>

</html>