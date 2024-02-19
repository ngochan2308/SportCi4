
<!DOCTYPE html>
<html lang="en">

<head>
    <?= view('admin/layout/link_head'); ?>
</head>

<body>

    <?= view('admin/layout/sidebar'); ?>

    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <!-- ... (Spinner code remains unchanged) ... -->
        <!-- Spinner End -->

        <!-- Content Start -->
        <div class="content">
            <?= view('admin/layout/header'); ?>

           <!-- Chỉnh sửa thông tin sản phẩm -->
<div class="container-fluid pt-4 px-4">
    <h6 class="mb-4">Chỉnh sửa thông tin sản phẩm</h6>

  
        <form action="<?= base_url('admin/product/update/' . $product['MaSP']) ?>" method="post" enctype="multipart/form-data">

            <!-- Mã CSRF Token -->
            <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">

            <div class="mb-3">
                <label for="tenSP" class="form-label">Tên sản phẩm:</label>
                <input type="text" class="form-control" id="tenSP" name="TenSP" value="<?= $product['TenSP'] ?>">
            </div>

            <div class="mb-3">
                <label for="giaSP" class="form-label">Giá sản phẩm:</label>
                <input type="text" class="form-control" id="giaSP" name="GiaSP" value="<?= $product['GiaSP'] ?>">
            </div>
            <div class="mb-3">
                <label for="moTaSP" class="form-label">Mô tả sản phẩm:</label>
                <input type="text" class="form-control" id="moTaSP" name="MoTaSP" value="<?= $product['MoTaSP'] ?>">
            </div>
            <div class="mb-3">
                <label for="soLuongSP" class="form-label">Số lượng sản phẩm:</label>
                <input type="text" class="form-control" id="soLuongSP" name="SoLuongSP" value="<?= $product['SoLuongSP'] ?>">
            </div>
 

            <div class="mb-3">
                <label for="hinhAnhSP" class="form-label">Hình ảnh sản phẩm:</label>
                <input type="file" class="form-control" id="hinhAnhSP" name="HinhAnhSP">
                <img src="<?= base_url('public/uploads/' . $product['HinhAnhSP']) ?>" alt="Hình ảnh sản phẩm" style="max-width: 100px; max-height: 100px;">
            </div>

            <div class="mb-3">
                <label for="dacBiet" class="form-label">Đặc biệt:</label>
                <select class="form-select" id="dacBiet" name="DacBiet">
                    <option value="0" <?= ($product['DacBiet'] == 0) ? 'selected' : '' ?>>Không</option>
                    <option value="1" <?= ($product['DacBiet'] == 1) ? 'selected' : '' ?>>Có</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="maTheLoai" class="form-label">Chọn thể loại:</label>
                <select class="form-select" id="maTheLoai" name="MaTheLoai">
                    <?php foreach ($categories as $category) : ?>
                        <option value="<?= $category['MaTheLoai'] ?>"><?= $category['TenTheLoai'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
        </form>

</div>

        </div>
        <!-- Content End -->

        <!-- ... (Footer and Back to Top code remains unchanged) ... -->

    </div>

    <?= view('admin/layout/script'); ?>

</body>

</html>
