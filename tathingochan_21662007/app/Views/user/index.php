<!doctype html>
<php lang="en">
<head>
<?= view('user/layout/head'); ?>
<style>
.product-section .product-item {
            display: block;
            text-decoration: none;
            border: 1px solid #ddd; /* Add a border for better visibility */
            padding: 15px; /* Add some padding for spacing */
            margin-bottom: 20px; /* Add margin between items */
            border-radius: 8px; /* Add rounded corners */
        }

        .product-section .product-item:hover {
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Add a subtle box shadow on hover */
        }

        .product-section .product-thumbnail {
            max-width: 100%;
            height: auto;
        }

        .product-section .product-title {
            margin-top: 10px; /* Add margin to the top of the title */
            font-size: 18px; /* Increase font size for better visibility */
        }

        /* Adjust column width for medium and large screens */
        @media (min-width: 768px) {
            .product-section .col-md-4 {
                flex: 0 0 33.3333%; /* Set column width to 33.3333% for medium screens */
                max-width: 33.3333%;
            }
        }
</style>
	</head>

	<body>

	<?= view('user/layout/header'); ?>
		<!-- End Header/Navigation -->

		<!-- Start Hero Section -->
	<?= view('user/layout/banner'); ?>
		<!-- End Hero Section -->

		<!-- Start Product Section -->
		<div class="product-section">
    <div class="container">
        <div class="row">
			
			<!-- Iterate through categories -->
			<?php foreach ($categories as $category): ?>
				<div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
					<a class="product-item">
						<img src="<?= base_url('uploads/' . $category['HinhAnhTheLoai']) ?>" class="img-fluid product-thumbnail">
						<h3 class="product-title"><?= $category['TenTheLoai'] ?></h3>
						<!-- You may need to adjust this based on your actual category structure -->
						<!-- Add other details like price if necessary -->

					
					</a>
				</div>
			<?php endforeach; ?>


        </div>
    </div>
</div>

		<!-- End Product Section -->

		<!-- Start Why Choose Us Section -->
		<div class="why-choose-section">
			<div class="container">
				<div class="row justify-content-between">
					<div class="col-lg-6">
						<h2 class="section-title">Why Choose Us</h2>
						<p>Yonex -Thương hiệu uy tín hàng đầu trong lĩnh vực bán dụng cụ thể thao. Là một địa chỉ đáng tin cậy cho những người yêu thể thao và đam mê hoạt động vận động. Tại đây, chúng tôi tự hào là điểm đến đầy đủ những dụng cụ thể thao chất lượng và đa dạng, giúp bạn tối ưu hóa trải nghiệm và hiệu suất tập luyện của mình.</p>

						<div class="row my-5">
							<div class="col-6 col-md-6">
								<div class="feature">
									<div class="icon">
										<img src="<?= base_url('asset_user/images/truck.svg')?>" alt="Image" class="imf-fluid">
									</div>
									<h3>Fast &amp; Free Shipping</h3>
									<p>Vận chuyển nhanh chóng và có nhiều ưu đãi freeship cho mọi khách hàng. </p>
								</div>
							</div>

							<div class="col-6 col-md-6">
								<div class="feature">
									<div class="icon">
										<img src="<?= base_url('asset_user/images/bag.svg')?>" alt="Image" class="imf-fluid">
									</div>
									<h3>Easy to Shop</h3>
									<p>Giao diện dễ thao tác để khách hàng có những trãi nghiệm mua sắm thú vị.</p>
								</div>
							</div>

							<div class="col-6 col-md-6">
								<div class="feature">
									<div class="icon">
										<img src="<?= base_url('asset_user/images/support.svg')?>" alt="Image" class="imf-fluid">
									</div>
									<h3>24/7 Support</h3>
									<p> Tổng đài chăm sóc khách hàng hoạt động 24/7 để lắng nghe những phản hồi của khách hàng</p>  
								</div>
							</div>

							<div class="col-6 col-md-6">
								<div class="feature">
									<div class="icon">
										<img src="<?= base_url('asset_user/images/return.svg')?>" alt="Image" class="imf-fluid">
									</div>
									<h3>Hassle Free Returns</h3>
									<p>Đổi trả hàng dễ dàng cho khách hàng, nếu sản phẩm có lỗi do nhà sản xuất.</p>       
								</div>
							</div>

						</div>
					</div>

					<div class="col-lg-5">
						<div class="img-wrap">
							<img src="<?= base_url('asset_user/images/bg1.jpg')?>" alt="Image" class="img-fluid">
						</div>
					</div>

				</div>
			</div>
		</div>
		<!-- End Why Choose Us Section -->




		<!-- Start Footer Section -->
		<?= view('user/layout/footer'); ?>
		<!-- End Footer Section -->	

		<?= view('user/layout/script'); ?>
	</body>

</php>
