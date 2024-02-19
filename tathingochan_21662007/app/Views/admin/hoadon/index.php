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
                    <h6 class="mb-4">DANH MỤC HÓA ĐƠN</h6>
                   
                 
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <!-- <th scope="col"></th> -->
                                <th scope="col">Mã hóa đơn</th>
                                <th scope="col">Họ tên khách hàng</th>
                                <th scope="col">Email</th>
                                <th scope="col">Số điện thoại</th>
                                <th scope="col">Địa chỉ giao hàng</th>
                                <th scope="col">Phương thức thanh toán</th>
                                
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($hoadon as $row): ?>
                            <tr>
                            <td>
                                    <?php if (isset($row['MaHoaDon'])): ?>
                                        <?= $row['MaHoaDon'] ?>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if (isset($row['Fullname'])): ?>
                                        <?= $row['Fullname'] ?>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if (isset($row['email'])): ?>
                                        <?= $row['email'] ?>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if (isset($row['Phone'])): ?>
                                        <?= $row['Phone'] ?>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if (isset($row['Address'])): ?>
                                        <?= $row['Address'] ?>
                                    <?php endif; ?>
                                </td>
                               
                                <td>
                                    <?php if (isset($row['PhuongThucTT'])): ?>
                                        <?= $row['PhuongThucTT'] ?>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <a href="<?= base_url('admin/hoadon/delete/' . $row['MaHoaDon']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Bạn có chắc muốn xóa hóa đơn này không?');"><i class="bi bi-trash"></i></a>
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