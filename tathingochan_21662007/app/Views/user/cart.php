
<!doctype html>
<html lang="en">
<head>
<?= view('user/layout/head'); ?>
<style>
	.section-heading{
		padding-top:50px;
		padding-left:100px;
	}

	.right-word a{
		text-decoration:none;
		color: #007bff;
		
	}
	.right-word
	{
		padding-left:100px;
		
	}
  .btn-thanhtoan{
    margin-bottom:20px;
    text-align:center;
  }
</style>
	</head>


	<body>

		<!-- Start Header/Navigation -->
		<?= view('user/layout/header'); ?>
		<!-- End Header/Navigation -->



		<div class="section-heading">
              <h2>GIỎ HÀNG CỦA BẠN</h2>
            </div>

			<div class="right-word">
    

        <a href="<?= base_url('user')?>">Tiếp tục chọn mua hàng</a> | <a href="<?= base_url('thanhtoan')?>">Đặt mua giỏ hàng</a>
    </div>

		<div class="untree_co-section before-footer-section">
            <div class="container">

			  <div class="row mb-5">
        <form class="col-md-12" method="post" action="<?= base_url('cart/updateCart') ?>">

			  <?= csrf_field() ?>
    <div class="site-blocks-table">
        <table class="table">
            <thead>
                <tr>
                    <th class="product_image">Image</th>
                    <th class="product_name">Product</th>
                    <th class="product_price">Price</th>
                    <th class="product_quantity">Quantity</th>
                    <th class="product_total">Subtotal</th>
                    <th class="product_remove">Delete</th>
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
        <h3 class="product-title"><?= $item['TenSP'] ?></h3>

    <?php endif; ?>
</td>

<td class="product_price">
    <?php if (array_key_exists('GiaSP', $item) && !empty($item['GiaSP'])): ?>
        <strong class="product-price"><?= number_format($item['GiaSP']) ?></strong>

    <?php endif; ?>
</td>
<td class="product_quantity">
    <?php if (array_key_exists('SoLuongSP', $item) && !empty($item['SoLuongSP'])): ?>
        <div class="input-group mb-3 d-flex align-items-center quantity-container" style="max-width: 120px;">
            <div class="input-group-prepend">
                <button class="btn btn-outline-black decrease" type="button">&minus;</button>
            </div>
          

       
            <input type="text" class="form-control text-center quantity-amount" name="quantity[]" value="<?= $item['SoLuongSP'] ?>" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">


                <button class="btn btn-outline-black increase" type="submit">&plus;</button>

            </div>
        </div>
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
<td class="product_remove">
    <?php if (array_key_exists('MaSP', $item) && !empty($item['MaSP'])): ?>
        <button class="btn btn-outline-danger remove-item" 
        type="button" 
        data-product-id="<?= $item['MaSP'] ?>"
        data-action="remove">
    Xóa
</button>
    <?php endif; ?>
</td>

                    </tr>
                <?php endforeach; ?>

				
            </tbody>
        </table>
    </div>
</form>

</div>


<!-- ... (các phần HTML khác của trang cart.php) ... -->

        
              <div class="row">
                <div class="col-md-6">
                  <!-- <div class="row mb-5">
                    <div class="col-md-6 mb-3 mb-md-0">
                      <button type="submit" class="btn btn-black btn-sm btn-block">Update cart</button>

                    </div>
                   
                  </div> -->
                
                </div>
                
                <div class="col-md-6 pl-5">
                  <div class="row justify-content-end">
                    <div class="col-md-7">
                      
                      <div class="row">
                        <div class="col-md-12 text-right border-bottom mb-5">
                          <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                        </div>
                      </div>
                 
                      <div class="row mb-5">
                        <div class="col-md-6">
                          <span class="text-black">Total</span>
                        </div>
                        <div class="col-md-6 text-right">
                          <strong class="text-black"><?=  number_format($totalPrice) ?></strong>

                        </div>
                      </div>
        
                      <div class="row">
                      <div class="col-md-6 mb-3 mb-md-0">
                      <button class="btn btn-thanhtoan btn-sm btn-block" id="btnThanhToan">Đặt hàng</button>
                      
                    </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
		



          <!-- cập nhật sản phẩm -->
          <!-- cập nhật sản phẩm -->
          <script>
document.getElementById('btnThanhToan').addEventListener('click', function() {
    // Lưu danh sách sản phẩm trong giỏ hàng vào Session
    <?php session()->set('cart_items', $cart_items); ?>
    
    // Chuyển hướng đến trang thanhtoan.php
    window.location.href = '<?= base_url('thanhtoan') ?>';
});


</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.remove-item').forEach(function (button) {
            button.addEventListener('click', function (event) {
                // Ngăn chặn việc gửi mặc định của biểu mẫu
                event.preventDefault();

                // Lấy ID sản phẩm
                var productId = button.getAttribute('data-product-id');

                // Hiển thị hộp thoại xác nhận
                var isConfirmed = confirm('Bạn có chắc chắn muốn xóa sản phẩm này khỏi giỏ hàng không?');

                if (isConfirmed) {
                    // Gửi yêu cầu không đồng bộ để xóa mục
                    fetch('<?= base_url('cart/removeItem') ?>/' + productId, {
                        method: 'GET',
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Cập nhật hiển thị giỏ hàng hoặc thực hiện các hành động cần thiết
                            console.log('Xóa mục thành công');

                            // Xóa mục khỏi giao diện người dùng
                            var row = button.closest('tr');
                            row.parentNode.removeChild(row);

                            // Kích hoạt sự kiện gửi biểu mẫu
                            submitForm(button);
                        } else {
                            console.error('Lỗi khi xóa mục khỏi giỏ hàng');
                        }
                    })
                    .catch(error => {
                        console.error('Lỗi:', error);
                    });
                }
            });
        });

        function submitForm(button) {
            // Tìm biểu mẫu chứa nút
            var form = button.closest('form');

            // Tạo và kích hoạt sự kiện gửi
            var submitEvent = new Event('submit', { cancelable: true });
            form.dispatchEvent(submitEvent);

            // Nếu sự kiện gửi không bị hủy bỏ, gửi biểu mẫu
            if (!submitEvent.defaultPrevented) {
                form.submit();
            }
        }
    });
</script>



	
		<script src="<?= base_url('asset_user/js/bootstrap.bundle.min.js')?>"></>
		<script src="<?= base_url('asset_user/js/tiny-slider.js')?>"></script>
		<script src="<?= base_url('asset_user/js/custom.js')?>"></script>
	</body>

</html>