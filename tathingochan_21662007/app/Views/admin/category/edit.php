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
                <h6 class="mb-4">Chỉnh sửa danh mục</h6>
                <form action="<?= base_url('admin/category/update/' . $category['MaTheLoai']) ?>" method="post" enctype="multipart/form-data">
                    <!-- Mã CSRF Token -->
                    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">
                    
                    <div class="mb-3">
                        <label for="tenTheLoai" class="form-label">Tên thể loại:</label>
                        <input type="text" class="form-control" id="tenTheLoai" name="TenTheLoai" value="<?= $category['TenTheLoai'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="hinhAnhTheLoai" class="form-label">Hình ảnh thể loại:</label>
                        <input type="file" class="form-control" id="hinhAnhTheLoai" name="HinhAnhTheLoai">
                        <img src="<?= base_url('uploads/' . $category['HinhAnhTheLoai']) ?>" alt="Hình ảnh thể loại" style="max-width: 100px; max-height: 100px;">
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
