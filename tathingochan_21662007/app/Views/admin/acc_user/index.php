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
                    <h6 class="mb-4">DANH MỤC TÀI KHOẢN KHÁCH HÀNG</h6>
                    <div class="addnew">
                  
                     <a href="<?= base_url('admin/acc_user/create')?>" class="btn btn-sm btn-success">Thêm mới</a>
                  

                     </div>
                 
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <!-- <th scope="col"></th> -->
                                <th scope="col">ID</th>
                                <th scope="col">Username</th>
                              
                                <th scope="col">Email</th>
                                <!-- <th scope="col">MaTaiKhoan</th> -->
                                <th scope="col">Fullname</th>
                                <th scope="col">Image</th>

                                <!-- <th scope="col">Gender</th> -->
                                <th scope="col">Phone</th>
                                <th scope="col">Address</th>
                                <!-- <th scope="col">DOB</th> -->
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($account as $row): ?>
                            <tr>
                            <td>
                                    <?php if (isset($row['id'])): ?>
                                        <?= $row['id'] ?>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if (isset($row['username'])): ?>
                                        <?= $row['username'] ?>
                                    <?php endif; ?>
                                </td>
                              <td>
                                    <?php if (isset($row['email'])): ?>
                                        <?= $row['email'] ?>
                                    <?php endif; ?>
                                </td> 
                                <!-- <td>
                                    <?php if (isset($row['MaTaiKhoan'])): ?>
                                        <?= $row['MaTaiKhoan'] ?>
                                    <?php endif; ?>
                                </td>  -->
                                <td>
                                    <?php if (isset($row['Fullname'])): ?>
                                        <?= $row['Fullname'] ?>
                                    <?php endif; ?>
                                </td>
                                <td>
                                <?php if (isset($row['HinhAnh'])): ?>
    <img src="<?= base_url('uploads/' . $row['HinhAnh']) ?>" alt="Hình ảnh user" style="max-width: 100px; max-height: 100px;">
<?php endif; ?>

</td>


                                <!-- <td>
                                    <?php if (isset($row['Gender'])): ?>
                                        <?= $row['Gender'] ?>
                                    <?php endif; ?>
                                </td>  -->
                                <td>
                                    <?php if (isset($row['Phone'])): ?>
                                        <?= $row['Phone'] ?>
                                    <?php endif; ?>
                                </td> <td>
                                    <?php if (isset($row['Address'])): ?>
                                        <?= $row['Address'] ?>
                                    <?php endif; ?>
                                </td> 
                                <!-- <td>
                                    <?php if (isset($row['Birthday'])): ?>
                                        <?= $row['Birthday'] ?>
                                    <?php endif; ?>
                                </td> -->

                                <td>
                                    <a href="<?= base_url('admin/acc_user/edit/' . $row['id']) ?>" class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i></a>
                                    <a href="<?= base_url('admin/acc_user/delete/' . $row['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Bạn có chắc muốn xóa tài khoản này không?');"><i class="bi bi-trash"></i></a>
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