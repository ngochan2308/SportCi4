<!-- user/edit_profile.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <?= view('user/layout/head'); ?>


<style>
    body, h1, p {
        margin: 0;
        padding: 0;
    }

    /* Style the form container */
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

    /* Style the image container */
    .hinhanhuser {
        text-align: center;
        margin-bottom: 20px;
    }

    .hinhanhuser img {
        max-width: 100%;
        max-height: 200px; /* Điều chỉnh theo nhu cầu */
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    /* Style individual form items */
    .profile-user div {
        margin-bottom: 15px;
    }

    label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
    }

    input,
    select {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
    }

    /* Style the submit button */
    button {
        background-color: #1f7a1f; /* Màu xanh lá cây đậm */
        color: #fff;
        padding: 10px 15px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    /* Optional: Add some hover effect on the button */
    button:hover {
        background-color: #155c15; /* Màu xanh lá cây nhạt hơn */
    }
</style>

</head>
<body>
    <!-- Start Header/Navigation -->
    <?= view('user/layout/header'); ?>
    <!-- End Header/Navigation -->

    <div class="profile-user">
        <h1><b>EDIT PROFILE</b></h1>
        <?php if (!empty($userInfo)): ?>
            <form action="<?= site_url('profile/update-profile') ?>" method="post">
            <?= csrf_field() ?>
            <div class="hinhanhuser">
                    <?php if (isset($userInfo['HinhAnh'])): ?>
                        <img src="<?= base_url('uploads/' . $userInfo['HinhAnh']) ?>" alt="Hình ảnh thể loại" class="center-image">
                    <?php endif; ?>
                </div>
                <div>
                    <label for="avatar">Choose a new avatar:</label>
                    <input type="file" name="avatar" accept="image/*">
                </div>

                <div>
                    <label for="username">Username:</label>
                    <input type="text" name="username" value="<?= $userInfo['username'] ?>" required>
                </div>

                <div>
                    <label for="email">Email:</label>
                    <input type="email" name="email" value="<?= $userInfo['email'] ?>" required>
                </div>

                <div>
                    <label for="Fullname">Fullname:</label>
                    <input type="text" name="Fullname" value="<?= $userInfo['Fullname'] ?>" required>
                </div>

                <div>
                    <label for="Gender">Gender:</label>
                    <select name="Gender" required>
                        <option value="Male" <?= ($userInfo['Gender'] == 'Male') ? 'selected' : '' ?>>Male</option>
                        <option value="Female" <?= ($userInfo['Gender'] == 'Female') ? 'selected' : '' ?>>Female</option>
                    </select>
                </div>

                <div>
                    <label for="Phone">Phone:</label>
                    <input type="tel" name="Phone" value="<?= $userInfo['Phone'] ?>" required>
                </div>

                <div>
                    <label for="Address">Address:</label>
                    <input type="text" name="Address" value="<?= $userInfo['Address'] ?>" required>
                </div>

                <div>
                    <label for="Birthday">Birthday:</label>
                    <input type="date" name="Birthday" value="<?= $userInfo['Birthday'] ?>" required>
                </div>

                <button type="submit">Update Profile</button>
            </form>
        <?php else: ?>
            <p>User not found.</p>
        <?php endif; ?>
    </div>

    <!-- Thêm footer hoặc các phần khác tùy vào cấu trúc trang của bạn -->

</body>
</html>
