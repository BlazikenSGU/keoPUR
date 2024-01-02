<?php
include('connectDB.php');

$row = $news->fetch_assoc();

$currentURL = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
if (strpos($currentURL, 'new-detail') !== false) {
    $urlParts = explode('new-detail', $currentURL);
    $newURL = $urlParts[0];
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM news WHERE id = '" . $id . "' ";
    $result = $conn->query($query);

    $row = $result->fetch_assoc();
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <base href="<?php echo $newURL ?>">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="assets/img/logo.png" type="image/x-icon">

    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.0.0/fonts/remixicon.css" rel="stylesheet" />

    <link rel="stylesheet" href="assets/css/style.css">

    <title> Thông tin chi tiết </title>
</head>

<body>

    <header class="header" id="header">
        <nav class="nav container">
            <a href="home" class="nav__logo">
                <i class="ri-leaf-line nav__logo-icon"></i> Đông Bắc
            </a>

            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item">
                        <a href="home" class="nav__link ">Home</a>
                    </li>
                    <li class="nav__item">
                        <a href="#" class="nav__link">About</a>
                    </li>
                    <li class="nav__item">
                        <a href="#" class="nav__link">Product</a>
                    </li>
                    <li class="nav__item">
                        <a href="#" class="nav__link active-link">News</a>
                    </li>
                    <li class="nav__item">
                        <a href="#" class="nav__link">Contact</a>
                    </li>
                </ul>

                <div class="nav__close" id="nav-close">
                    <i class="ri-close-circle-line"></i>
                </div>
            </div>

            <div class="nav__btns">
                <i class="ri-moon-line change-theme" id="theme-button"></i>

                <div class="nav__toggle" id="nav-toggle">
                    <i class="ri-menu-line"></i>
                </div>
            </div>
        </nav>
    </header>


    <main class="main">
        <section class="detail section container">
            <div>
                <button id="url" class="buttonBack">
                    <i class="ri-arrow-go-back-fill"></i>
                </button>
            </div>

            <div class="detail-content">
                <h1>
                    <?= $row['title'] ?>
                </h1>
                <span>
                    <i class="ri-time-line"></i>:
                    <?= $row['createdAt'] ?>
                </span>
                <img src="<?= $row['image'] ?>" alt="">
                <p>
                    <?= $row['content'] ?>
                </p>
            </div>
            <hr>
        </section>
    </main>


    <footer class="footer section">
        <div class="footer__container container grid">
            <div class="footer__content">
                <a href="#" class="footer__logo">
                    <i class="ri-leaf-line footer__logo-icon"></i>Đông Bắc
                </a>

                <h3 class="footer__title">
                    subscribe to our newsletter <br> to stay update
                </h3>

                <div class="footer__subscribe">
                    <input type="email" placeholder="Enter your email" class="footer__input">

                    <button class="button button--flex footer__button">
                        Subscribe
                        <i class="ri-arrow-right-up-line button__icon"></i>
                    </button>
                </div>

            </div>

            <div class="footer__content">
                <h3 class="footer__title">
                    Địa chỉ
                </h3>
                <ul class="footer__data">
                    <li class="footer__infomation">35 Duong van an</li>
                    <li class="footer__infomation">35 Duong van an</li>
                    <li class="footer__infomation">35 Duong van an</li>
                </ul>
            </div>

            <div class="footer__content">
                <h3 class="footer__title">
                    Contact Us
                </h3>
                <ul class="footer__data">
                    <li class="footer__infomation">+84 123 456 789</li>

                    <div class="footer__social">
                        <a href="https://www.facebook.com/" class="footer__social-link">
                            <i class="ri-facebook-fill"></i>
                        </a>
                        <a href="https://www.instagram.com/" class="footer__social-link">
                            <i class="ri-instagram-line"></i>
                        </a>
                        <a href="https://www.youtube.com/" class="footer__social-link">
                            <i class="ri-youtube-line"></i>
                        </a>
                    </div>
                </ul>
            </div>

            <div class="footer__content">
                <h3 class="footer__title">
                    Phương thức thanh toán
                </h3>
                <ul class="footer__cards">
                    <img src="assets/img/card1.png" alt="" class="footer__card">
                    <img src="assets/img/card2.png" alt="" class="footer__card">
                    <img src="assets/img/card3.png" alt="" class="footer__card">
                    <img src="assets/img/card4.png" alt="" class="footer__card">
                </ul>
            </div>
        </div>

        <p class="footer__copy">
            &#169; Copyright. All rights reserved 25/12/2023
        </p>
    </footer>

    <a href="#" class="scrollup" id="scroll-up">
        <i class="ri-arrow-up-circle-line scrollup__icon"></i>
    </a>

    <script src="assets/js/rewrite.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/back.js"></script>

</body>

</html>