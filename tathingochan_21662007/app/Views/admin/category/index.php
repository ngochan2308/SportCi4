<!DOCTYPE html>
<html lang="en">


<head>
<?=view('admin/layout/link_head');?>

    <style>
       .addnew{
        text-align:right;
            padding-right:50px;
       }
    </style>
</head>

<body>
    
    <?= view('admin/layout/sidebar'); // Nạp sidebar vào trang index.php ?>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

   


        <!-- Content Start -->
        <div class="content">
        <!-- Navbar Start -->
        <?= view('admin/layout/header'); ?>

        <!-- Navbar End -->

        <!-- Table Start -->
        
        <div class="container-fluid pt-4 px-4">
            
        <div class="row g-4">
            
            <div class="col-12">
                
                <div class="bg-light rounded h-100 p-4">
                <?php if (session()->getFlashdata('success')): ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->getFlashdata('success') ?>
                    </div>
                <?php endif; ?>
                    <h6 class="mb-4">DANH MỤC THỂ LOẠI</h6>
                    <div class="addnew">
                  
                     <a href="<?= base_url('admin/category/create')?>" class="btn btn-sm btn-success">Thêm danh mục mới</a>
                  

                     </div>
                 
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <!-- <th scope="col"></th> -->
                                <th scope="col">Mã thể loại</th>
                                <th scope="col">Tên thể loại</th>
                                <th scope="col">Hình ảnh thể loại</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($category as $row): ?>
                            <tr>
                            <td>
                                    <?php if (isset($row['MaTheLoai'])): ?>
                                        <?= $row['MaTheLoai'] ?>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if (isset($row['TenTheLoai'])): ?>
                                        <?= $row['TenTheLoai'] ?>
                                    <?php endif; ?>
                                </td>
                                <td>
    <?php if (isset($row['HinhAnhTheLoai'])): ?>
        <img src="<?= base_url('uploads/' . $row['HinhAnhTheLoai']) ?>" alt="Hình ảnh thể loại" style="max-width: 100px; max-height: 100px;">
    <?php endif; ?>
</td>

                                <td>
                                    <a href="<?= base_url('admin/category/edit/' . $row['MaTheLoai']) ?>" class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i></a>
                                    <a href="<?= base_url('admin/category/delete/' . $row['MaTheLoai']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Bạn có chắc muốn xóa thể loại này không?');"><i class="bi bi-trash"></i></a>
                                </td>
                                
                            </tr>
                        <?php endforeach; ?>

                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>




        <!-- Table End -->
        <!-- Footer Start -->
        <?= view('admin/layout/footer');?>
        <!-- Footer End -->
        </div>
        <!-- Content End -->
         <!-- Back to Top -->
         <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>


    <?= view('admin/layout/script'); ?>

</body>