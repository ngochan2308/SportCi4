<!DOCTYPE html>
<html lang="en">
<head>
    <?= view('user/layout/head'); ?>
    <style>
       .hero_banner {
    position: relative;
    text-align: left;
}

.hero_banner img {
    width: 100%;
    height: auto;
}

.search-bar {
    margin-top: 20px; /* Khoảng cách giữa h1 và ô tìm kiếm */
    text-align: right;
    padding-right: 100px;
    padding-top: 20px;
}

.search-bar input[type="text"] {
    width: 250px; /* Chiều rộng của ô tìm kiếm */
    padding: 5px;
    border: none;
    border-radius: 3px;
}

.search-bar button {
    padding: 5px 10px;
    margin-left: 5px;
    background-color: #bd2130; /* Màu nền của nút tìm kiếm */
    color: #fff; /* Màu chữ của nút tìm kiếm */
    border: none;
    border-radius: 3px;
    cursor: pointer;
}

h1 {
    display: inline-block;
    margin-right: 20px; /* Khoảng cách giữa h1 và ô tìm kiếm */
}

    </style>
</head>

<body>
    <!-- Start Header/Navigation -->
    <?= view('user/layout/header'); ?>
    <!-- End Header/Navigation -->

    <!-- Start Hero Section -->
    <div class="hero_banner">
        <img src="<?= base_url('asset_user/images/banner_bad.webp') ?>" class="img-fluid" alt="Hero Image">
    </div>
    <!-- End Hero Section -->

    <!-- Start Search Bar -->
    <div class="search-bar">
  
        
    <form action="<?= base_url('badminton/search') ?>" method="post">
    <?= csrf_field() ?>
        <!-- <h1>Badminton Products</h1> -->
        <div>
            <input type="text" name="search_keyword" placeholder="Tìm kiếm tên sản phẩm...">
            <button type="submit">Tìm kiếm</button>
        </div>
    </form>
    </div>
    <!-- End Search Bar -->
    

    <div class="untree_co-section product-section before-footer-section">
        
        <div class="container">
        
      
            <div class="row">
              
                <?php foreach ($product as $item): ?>
                    <?php if ($item['MaTheLoai'] == 1): ?>
                        <div class="col-12 col-md-4 col-lg-3 mb-5">
                            <div class="product-item">
                                <img src="<?= base_url('asset_user/images/' . $item['HinhAnhSP']) ?>" class="img-fluid product-thumbnail">
                                <h3 class="product-title"><?= $item['TenSP'] ?></h3>
                                <strong class="product-price"><?= number_format($item['GiaSP']) ?></strong>
                                <?= form_open('cart/add', ['method' => 'post']) ?>
                                    <?= form_hidden('product_id', $item['MaSP']) ?>
                                    <?= form_hidden('product_price', $item['GiaSP']) ?>
                                    <?= form_hidden('product_name', $item['TenSP']) ?>
                                    <?= form_hidden('product_image', $item['HinhAnhSP']) ?>
                                    <input type="hidden" name="quantity" value="1">
                                    <?= form_submit(['name' => 'add_to_cart', 'value' => 'Add to Cart', 'class' => 'btn btn-primary']) ?>
                                <?= form_close() ?>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <!-- Start Footer Section -->
    <?= view('user/layout/footer'); ?>
    <!-- End Footer Section -->

    <?= view('user/layout/script'); ?>
</body>
</html>
