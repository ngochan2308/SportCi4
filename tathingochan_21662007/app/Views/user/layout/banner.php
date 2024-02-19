<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .herro-img-wrap img {
            width: 100%;
            height: 100%;
            object-fit: cover; 
        }

        .herro {
            position: relative;
            height: 600px;
            overflow: hidden;
        }

        .slides {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }

        .slide {
            min-width: 100%;
        }
    </style>
</head>
<body>

<!-- Start herro Section -->
<div class="herro">
    <div class="slides">
        <div class="slide">
            <img src="asset_user/images/slide_03.webp" class="img-fluid">
        </div>
        <div class="slide">
            <img src="asset_user/images/banner_bad.webp" class="img-fluid">
        </div>
        <div class="slide">
            <img src="asset_user/images/slide_02.webp" class="img-fluid">
        </div>
        <div class="slide">
            <img src="asset_user/images/slide_04.webp" class="img-fluid">
        </div>
        <!-- Thêm các ảnh khác nếu cần thiết -->
    </div>
</div>
<!-- End herro Section -->

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const slides = document.querySelector(".slides");
        let counter = 0;

        function nextSlide() {
            counter++;
            if (counter === slides.children.length) {
                counter = 0;
            }
            updateSlidePosition();
        }

        function updateSlidePosition() {
            slides.style.transform = "translateX(" + -counter * 100 + "%)";
        }

        setInterval(nextSlide, 3000); // Chuyển ảnh mỗi 3 giây
    });
</script>

</body>
</html>
