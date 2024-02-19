<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
    <title>DASHMIN - Bootstrap Admin Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="<?= base_url('asset_admin/img/favicon.ico') ?>" rel="icon">


    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?= base_url('asset_admin/lib/owlcarousel/assets/owl.carousel.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('asset_admin/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') ?>" rel="stylesheet" />
    
    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?= base_url('asset_admin/css/bootstrap.min.css') ?>" rel="stylesheet">
    
    <!-- Template Stylesheet -->
    <link href="<?= base_url('asset_admin/css/style.css') ?>" rel="stylesheet">
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
      
        <?= view('admin/layout/header'); ?>
       

        <?= view('admin/layout/container');?>
          
      

        
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

        <?= view('admin/layout/script'); ?>
</body>

</html>