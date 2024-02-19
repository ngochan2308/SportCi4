<!DOCTYPE html>
<html lang="en">

<head>
    <?= view('admin/layout/link_head'); ?>
    <style>
.short-input {
    width: 150px; 
}

    </style>
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
                <h6 class="mb-4">Chỉnh sửa tài khoản Admin</h6>
                
                <form action="<?= base_url('admin/acc_admin/update/' . $account['id']) ?>" method="post" enctype="multipart/form-data">

                <?= csrf_field() ?>
                <div class="mb-3">
                    <label for="hinhAnh" class="form-label">Hình ảnh:</label>
                    <input type="file" class="form-control" id="hinhAnh" name="HinhAnh">
                    <img src="<?= base_url('uploads/' . $account['HinhAnh']) ?>" alt="Hình ảnh" style="max-width: 100px; max-height: 100px;">
                </div>



                <div class="mb-3">
                    <label for="username" class="form-label">Username:</label>
                    <input type="text" class="form-control" id="username" name="username" value="<?= $account['username'] ?>">

                    <?php if (isset($validation) && $validation->hasError('username')): ?>
                        <div class="text-danger"><?= $validation->getError('username') ?></div>
                    <?php endif; ?>
                    <?php if (isset($username_error)): ?>
                        <div class="text-danger"><?= $username_error ?></div>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password:</label>
                    <input type="password" class="form-control" id="password" name="password"value="<?= $account['password'] ?>">
                    <?php if (isset($validation) && $validation->hasError('password')): ?>
                        <div class="text-danger"><?= $validation->getError('password') ?></div>
                    <?php endif; ?>
                    <?php if (isset($password_error)): ?>
                        <div class="text-danger"><?= $password_error ?></div>
                    <?php endif; ?>
                </div>
                <?php if (isset($data['error_message'])): ?>
                    <div class="text-danger"><?= $data['error_message'] ?></div>
                <?php endif; ?>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?= $account['email'] ?>">
                        <?php if (isset($validation) && $validation->hasError('email')): ?>
                            <div class="text-danger"><?= $validation->getError('email') ?></div>
                        <?php endif; ?>
                        <?php if (isset($email_error)): ?>
                            <div class="text-danger"><?= $email_error ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="mb-3">
                        <label for="fullname" class="form-label">Fullname:</label>
                        <input type="text" class="form-control" id="fullname" name="fullname" value="<?= $account['Fullname'] ?>">
                        <?php if (isset($validation) && $validation->hasError('fullname')): ?>
                            <div class="text-danger"><?= $validation->getError('fullname') ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Gender:</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="male" value="male" <?= ($account['Gender'] == 'male') ? 'checked' : '' ?>>
                            <label class="form-check-label" for="male">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="female" value="female"<?= ($account['Gender'] == 'female') ? 'checked' : '' ?>>
                            <label class="form-check-label" for="female">Female</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="other" value="other"<?= ($account['Gender'] == 'other') ? 'checked' : '' ?>>
                            <label class="form-check-label" for="other">Other</label>
                        </div>
                    </div>      
                    <?php if (isset($validation) && $validation->hasError('gender')): ?>
                        <div class="text-danger"><?= $validation->getError('gender') ?></div>
                    <?php endif; ?>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone:</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="<?= $account['Phone'] ?>">
                    </div>
                    <?php if (isset($validation) && $validation->hasError('phone')): ?>
                            <div class="text-danger"><?= $validation->getError('phone') ?></div>
                        <?php endif; ?>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address:</label>
                        <input type="text" class="form-control" id="address" name="address" value="<?= $account['Address'] ?>">
                    </div>
                    <?php if (isset($validation) && $validation->hasError('address')): ?>
                            <div class="text-danger"><?= $validation->getError('address') ?></div>
                        <?php endif; ?>
                    <div class="mb-3">
                        <label for="birthday" class="form-label">Birthday:</label>
                        <input type="date" class="form-control short-input" id="birthday" name="birthday" value="<?= $account['Birthday'] ?>">
                    </div>
                    <?php if (isset($validation) && $validation->hasError('birthday')): ?>
                            <div class="text-danger"><?= $validation->getError('birthday') ?></div>
                        <?php endif; ?>

                
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
