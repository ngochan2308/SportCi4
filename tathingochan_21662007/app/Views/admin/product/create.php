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

            <div class="container-fluid pt-4 px-4">
                <h6 class="mb-4">Thêm sản phẩm mới</h6>
                
                <form action="<?= base_url('add_product')?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field() ?>
           
                    <div class="mb-3">
                        <label for="tenSP" class="form-label">Tên sản phẩm:</label>
                        <input type="text" class="form-control" id="tenSP" name="TenSP" value="">
                    </div>
                    <div class="mb-3">
                        <label for="giaSP" class="form-label">Giá sản phẩm:</label>
                        <input type="text" class="form-control" id="giaSP" name="GiaSP" value="">
                    </div>
                    <div class="mb-3">
                        <label for="moTaSP" class="form-label">Mô tả sản phẩm:</label>
                        <input type="text" class="form-control" id="moTaSP" name="MoTaSP" value="">
                    </div>
                    <div class="mb-3">
                        <label for="soLuongSP" class="form-label">Số lượng sản phẩm:</label>
                        <input type="text" class="form-control" id="soLuongSP" name="SoLuongSP" value="">
                    </div>
                    <div class="mb-3">
                        <label for="hinhAnhSP" class="form-label">Hình ảnh sản phẩm:</label>
                        <input type="file" class="form-control" id="hinhAnhSP" name="HinhAnhSP">
                    </div>

                    <div class="mb-3">
                        <label for="dacBiet" class="form-label">Đặc biệt:</label>
                        <select class="form-select" id="dacBiet" name="DacBiet">
                            <option value="0">Không</option>
                            <option value="1">Có</option>
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
