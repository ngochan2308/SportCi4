<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        em{
            color: #bd2130;
            font-style: normal; 
        }

        .custom-navbar-nav .nav-link {
            margin-right: 30px; /* Adjust the value as needed */
        }
        .custom-navbar-nav .nav-item a {
            position: relative;
            text-decoration: none;
            color: #fff; /* Set the text color for regular state */
        }

        /* Add an underline effect on hover */
        .custom-navbar-nav .nav-item a:hover::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: -3px; /* Adjust the distance of the underline from the text */
            width: 100%;
            height: 2px; /* Set the height of the underline */
            background-color: #bd2130; /* Set the color of the underline */
        }

         /* Style for the dropdown menu */
         .custom-navbar-nav .dropdown {
            position: relative;
            display: inline-block;
        }

        .custom-navbar-nav .dropdown-content {
            display: none;
            position: absolute;
            background-color: #333; /* Set the background color of the dropdown */
            box-shadow: 0 8px 16px rgba(0,0,0,0.2);
            z-index: 1;
            padding:20px;
          
        }
        .custom-navbar-nav .dropdown-content a {
            display: block;
            width: 100%; /* Đảm bảo chiều rộng của mỗi mục là 100% */
            box-sizing: border-box; /* Đảm bảo chiều rộng bao gồm cả padding và border */
        }

        .custom-navbar-nav .dropdown:hover .dropdown-content {
            display: block;
        }

        .navbar-brand{
            padding-left:20px;
        }



/* Style for the dropdown menu */
.custom-navbar-cta .dropdown {
    position: relative;
    display: inline-block;
    
}

.custom-navbar-cta .dropdown-menu {
    display: none;
    position: absolute;
    background-color: #333; /* Set the background color of the dropdown */
    box-shadow: 0 8px 10px rgba(0,0,0,0.2);
    z-index: 1;

}
.custom-navbar-cta .dropdown-menu a {
    color: #fff; /* Set the default text color for dropdown items */
}
.custom-navbar-cta .dropdown-menu a:hover {
    background-color: #bd2130; /* Set the background color on hover */
}
.custom-navbar-cta .dropdown:hover .dropdown-menu {
    display: block;
    
}

    </style>
</head>
<body>
    <!-- Start Header/Navigation -->



    <nav class="custom navbar navbar-expand-md navbar-dark bg-black" aria-label="Furni navigation bar">
        <a class="navbar-brand" href="<?= base_url('user') ?>"><h2>SPORT <em>STORE</em></h2></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="container">
            <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('user') ?>">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link">Shop</a>
                    <div class="dropdown-content">
                        <a href="<?= base_url('badminton')?>">BADMINTON</a>
                        <a href="<?= base_url('golf')?>">GOLF</a>
                        <a href="<?= base_url('snow')?>">SNOWBOARDING</a>
                        <a href="<?= base_url('tennis')?>">TENNIS</a>
                        <a href="<?= base_url('running')?>">RUNNING</a>

                    </div>
                </li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url('about') ?>">About us</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url('contact') ?>">Contact us</a></li>
                
            </ul>
            <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
    <li class="nav-item dropdown">
        <a class="nav-link" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="<?= base_url('asset_user/images/user.svg')?>">
        </a>
        <ul class="dropdown-menu" aria-labelledby="userDropdown">
            <li><a class="dropdown-item" href="<?= base_url('profile')?>">View</a></li>
            <li><a class="dropdown-item" href="<?= base_url('/')?>">Logout</a></li>
        </ul>
    </li>
    <li><a class="nav-link" href="<?= base_url('cart') ?>"><img src="<?= base_url('asset_user/images/cart.svg')?>"></a></li>
</ul>

        </div>
    </nav>


    
        </div>
    </nav>
    </div>
</div>
    
</nav>
</body>
</html>