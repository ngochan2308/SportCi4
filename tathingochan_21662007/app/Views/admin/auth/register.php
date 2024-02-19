<!DOCTYPE html>
<html lang="en">

<head>
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

    <style>
        h3{
            padding-left:100px;
        }
    </style>
</head>
<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->




        <!-- Sign Up Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                          
                            <h3>Sign Up</h3>
                        </div>
                        <form action="/admin/auth/processRegistration" method="post">
                        <?= csrf_field() ?>
                  
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control"  id="username" name="username" placeholder="jhondoe">
                            <label for="username">Username</label>
                        </div>
                        <?php if (isset($validation) && $validation->hasError('username')): ?>
                            <div class="text-danger"><?= $validation->getError('username') ?></div>
                        <?php endif; ?>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
                            <label for="email">Email address</label>
                        </div>
                        <?php if (isset($validation) && $validation->hasError('email')): ?>
                            <div class="text-danger"><?= $validation->getError('email') ?></div>
                        <?php endif; ?>
                        <div class="form-floating mb-4">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                            <label for="password">Password</label>
                        </div>
                    
                        
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control"  id="fullname" name="fullname" placeholder="jhondoe">
                            <label for="fullname">Full name</label>
                        </div>
                        <?php if (isset($validation) && $validation->hasError('fullname')): ?>
                            <div class="text-danger"><?= $validation->getError('fullname') ?></div>
                        <?php endif; ?>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control"  id="address" name="address" placeholder="jhondoe">
                            <label for="address">Address</label>
                        </div>
                        <?php if (isset($validation) && $validation->hasError('address')): ?>
                            <div class="text-danger"><?= $validation->getError('address') ?></div>
                        <?php endif; ?>
                        <div class="form-floating mb-3">
                        <label for="gender">Gender</label><br> <br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="male" value="male">
                            <label class="form-check-label" for="male">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                            <label class="form-check-label" for="female">Female</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="other" value="other">
                            <label class="form-check-label" for="other">Other</label>
                        </div>
                    </div>
                    <?php if (isset($validation) && $validation->hasError('gender')): ?>
                        <div class="text-danger"><?= $validation->getError('gender') ?></div>
                    <?php endif; ?>


                        
                        <div class="form-floating mb-3">
                            <input type="date" class="form-control"  id="birthday" name="birthday" placeholder="jhondoe">
                            <label for="birthday">Date of Birth</label>
                        </div>
                        <?php if (isset($validation) && $validation->hasError('birthday')): ?>
                            <div class="text-danger"><?= $validation->getError('birthday') ?></div>
                        <?php endif; ?>

                        <div class="form-floating mb-3">
                            <input type="tel" class="form-control"  id="phone" name="phone" placeholder="jhondoe">
                            <label for="phone">Phone number</label>
                        </div>
                        <?php if (isset($validation) && $validation->hasError('phone')): ?>
                            <div class="text-danger"><?= $validation->getError('phone') ?></div>
                        <?php endif; ?>

                     

<!--  -->
                        <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Sign Up</button>
                        <p class="text-center mb-0">Already have an Account? <a href="/">Sign In</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sign Up End -->
    </div>

    <?= view('admin/layout/script'); ?>
</body>

</html>