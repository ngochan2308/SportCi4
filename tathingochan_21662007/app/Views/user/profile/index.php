<!DOCTYPE html>
<html lang="en">
<head>
    <?= view('user/layout/head'); ?>
    <style>
body, h1, p {
    margin: 0;
    padding: 0;
}

/* Style the profile-user */
.profile-user {
    max-width: 800px;
    margin: 50px auto;
    background-color: #f9f9f9;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h1 {
    font-size: 32px;
    text-align: center;
    color: #1f7a1f; /* Màu xanh lá cây đậm */
    margin-bottom: 20px;
}

/* Style individual info items */
.profile-user div {
    margin-bottom: 15px;
    padding: 10px;
    background-color: #ffffff; /* Màu nền trắng */
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

/* Style info labels */
.profile-user div p:first-child {
    font-weight: bold;
    color: #333;
}

/* Add some spacing between the labels and values */
.profile-user div p {
    margin: 8px 0;
}

/* Style the "User not found" message */
p.error-message {
    color: #ff0000;
    font-weight: bold;
}

/* Optional: Hover effect on individual info items */
.profile-user div:hover {
    background-color: #e0e0e0;
    transition: background-color 0.3s ease-in-out;
}

.center-image {
    display: block;
    margin: auto;
    max-width: 400px; /* Điều chỉnh theo nhu cầu */
    max-height: 400px; /* Điều chỉnh theo nhu cầu */
}

/* Thêm vào trong thẻ <style> của bạn */

/* Style the "Chỉnh sửa thông tin" button container */
.button-container {
    text-align: center;
    margin-top: 20px; /* Điều chỉnh khoảng cách từ nút lên phần thông tin người dùng */
}

/* Style the "Chỉnh sửa thông tin" button */
.btn-primary {
    background-color: #1f7a1f; /* Màu xanh lá cây đậm */
    color: #fff;
    border: none;
  
    cursor: pointer;
    text-decoration: none; /* Loại bỏ gạch chân khi dùng như hyperlink */
}

/* Optional: Hover effect on the button */
.btn-primary:hover {
    background-color: #155c15; /* Màu xanh lá cây nhạt hơn */
}

    </style>
</head>
<body>
    <!-- Start Header/Navigation -->
    <?= view('user/layout/header'); ?>
    <!-- End Header/Navigation -->
    <div class="profile-user">
        <h1><b>USER PROFILE</b></h1>
        <?php if (!empty($userInfo)): ?>
            <ul>



            <div class="hinhanhuser">
    <?php if (isset($userInfo['HinhAnh'])): ?>
        <img src="<?= base_url('uploads/' . $userInfo['HinhAnh']) ?>" alt="Hình ảnh thể loại" class="center-image">
    <?php endif; ?>
</div>



            <div>
        <!-- Check if 'username' key exists in $userInfo array before using it -->
        <?php if (isset($userInfo['username'])): ?>
            <p>Username: <?= $userInfo['username'] ?></p>
        <?php else: ?>
            <p>Username not available</p>
        <?php endif; ?>
    </div>

    <div>
        <!-- Check if 'username' key exists in $userInfo array before using it -->
        <?php if (isset($userInfo['email'])): ?>
            <p>Email: <?= $userInfo['email'] ?></p>
        <?php else: ?>
            <p>Email not available</p>
        <?php endif; ?>
    </div>


    <div>
        <!-- Check if 'username' key exists in $userInfo array before using it -->
        <?php if (isset($userInfo['Fullname'])): ?>
            <p>Fullname: <?= $userInfo['Fullname'] ?></p>
        <?php else: ?>
            <p>Fullname not available</p>
        <?php endif; ?>
    </div>


    <div>
        <!-- Check if 'username' key exists in $userInfo array before using it -->
        <?php if (isset($userInfo['Gender'])): ?>
            <p>Gender: <?= $userInfo['Gender'] ?></p>
        <?php else: ?>
            <p>Gender not available</p>
        <?php endif; ?>
    </div>


    <div>
        <!-- Check if 'username' key exists in $userInfo array before using it -->
        <?php if (isset($userInfo['Phone'])): ?>
            <p>Phone: <?= $userInfo['Phone'] ?></p>
        <?php else: ?>
            <p>Phone not available</p>
        <?php endif; ?>
    </div>


    <div>
        <!-- Check if 'username' key exists in $userInfo array before using it -->
        <?php if (isset($userInfo['Address'])): ?>
            <p>Address: <?= $userInfo['Address'] ?></p>
        <?php else: ?>
            <p>Username not available</p>
        <?php endif; ?>
    </div>



    <div>
        <!-- Check if 'username' key exists in $userInfo array before using it -->
        <?php if (isset($userInfo['Birthday'])): ?>
            <p>Birthday: <?= $userInfo['Birthday'] ?></p>
        <?php else: ?>
            <p>Birthday not available</p>
        <?php endif; ?>
    </div>


        <?php else: ?>
            <p>User not found.</p>
        <?php endif; ?>
    </div>


    <div class="button-container">
    <a href="<?= site_url('profile/edit-profile') ?>" class="btn btn-primary">Chỉnh sửa thông tin</a>
</div>

</body>
</html>
