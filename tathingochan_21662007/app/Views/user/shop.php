<!doctype html>
<html lang="en">
<head>
<?= view('user/layout/head'); ?>
</head>

	<body>

		<!-- Start Header/Navigation -->
		<nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">

			<div class="container">
				<a class="navbar-brand" href="index.html">Sport<span>.</span></a>

				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarsFurni">
					<ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
					<li class="nav-item">
						<a class="nav-link" href="<?= base_url('user') ?>">Home</a>
					</li>
					<li><a class="nav-link" href="<?= base_url('shop') ?>">Shop</a></li>
					<li><a class="nav-link" href="<?= base_url('about.php') ?>">About us</a></li>
					<li><a class="nav-link" href="<?= base_url('services.php') ?>">Services</a></li>
					<li><a class="nav-link" href="<?= base_url('blog.php') ?>">Blog</a></li>
					<li><a class="nav-link" href="<?= base_url('contact.php') ?>">Contact us</a></li>
					</ul>

					<ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
						<li><a class="nav-link" href="#"><img src="<?= base_url('asset_user/images/user.svg')?>"></a></li>
						<li><a class="nav-link" href="<?= base_url('cart')?>"><img src="<?= base_url('asset_user/images/cart.svg')?>"></a></li>
					</ul>
				</div>
			</div>
				
		</nav>
		<!-- End Header/Navigation -->

		<!-- Start Hero Section -->
			<div class="hero">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-5">
							<div class="intro-excerpt">
								<h1>Shop</h1>
							</div>
						</div>
						<div class="col-lg-7">
							
						</div>
					</div>
				</div>
			</div>
		<!-- End Hero Section -->

		

		<div class="untree_co-section product-section before-footer-section">
		    <div class="container">
		      	<div class="row">

		      		<!-- Start Column 1 -->
					<?php foreach ($product as $item): ?>
						<div class="col-12 col-md-4 col-lg-3 mb-5">
							<div class="product-item">
								<img src="<?= base_url('asset_user/images/' . $item['HinhAnhSP']) ?>" class="img-fluid product-thumbnail">
								<h3 class="product-title"><?= $item['TenSP'] ?></h3>
								<strong class="product-price"><?= $item['GiaSP'] ?></strong>

								<!-- Form để thêm vào giỏ hàng -->
								<?= form_open('cart/add', ['method' => 'post']) ?>
									<!-- Sử dụng input hidden để truyền mã sản phẩm và giá -->
									<?= form_hidden('product_id', $item['MaSP']) ?>
									<?= form_hidden('product_price', $item['GiaSP']) ?>
									<?= form_hidden('product_name', $item['TenSP']) ?>
									<?= form_hidden('product_image', $item['HinhAnhSP']) ?>

							<!-- //hêm một trường ẩn để lưu trữ số lượng sản phẩm. -->
									<input type="hidden" name="quantity" value="1"> 

									<!-- Sử dụng button type submit để gửi form -->
									<?= form_submit(['name' => 'add_to_cart', 'value' => 'Add to Cart', 'class' => 'btn btn-primary']) ?>
								<?= form_close() ?>
							</div>
						</div>
											<?php endforeach; ?>
					<!-- End Column 1 -->

                    
					

		      	</div>
		    </div>
		</div>


		<!-- Start Footer Section -->
	
		<?= view('user/layout/footer'); ?>
		<!-- End Footer Section -->	


                    
		<?= view('user/layout/script'); ?>
    </body>
</html>
                    