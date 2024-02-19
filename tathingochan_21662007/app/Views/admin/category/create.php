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
                <h6 class="mb-4">Thêm danh mục mới</h6>
                
                <form action="<?= base_url('add_category')?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <!-- <div class="mb-3">
                        <label for="maTheLoai" class="form-label">Mã thể loại:</label>
                        <input type="text" class="form-control" id="maTheLoai" name="MaTheLoai" value="">
                    </div> -->
                    <div class="mb-3">
                        <label for="tenTheLoai" class="form-label">Tên thể loại:</label>
                        <input type="text" class="form-control" id="tenTheLoai" name="TenTheLoai" value="">
                    </div>
                    <div class="mb-3">
                        <label for="hinhAnhTheLoai" class="form-label">Hình ảnh thể loại:</label>
                        <input type="file" class="form-control" id="hinhAnhTheLoai" name="HinhAnhTheLoai">
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
