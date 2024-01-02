<?php
include('connectDB.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="assets/img/logo.png" type="image/x-icon">

    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.0.0/fonts/remixicon.css" rel="stylesheet" />

    <link rel="stylesheet" href="assets/css/style.css">

    <title>Tin tức</title>

    <script src="assets/js/convertDateFormat.js"></script>
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
                        <a href="" class="nav__link">About</a>
                    </li>
                    <li class="nav__item">
                        <a href="" class="nav__link">Product</a>
                    </li>
                    <li class="nav__item">
                        <a href="" class="nav__link active-link">News</a>
                    </li>
                    <li class="nav__item">
                        <a href="" class="nav__link">Contact</a>
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

        <section class="viewlist section container">

            <h1 class="news-title">TIN TỨC BÀI VIẾT</h1>

            <div class="grid-container">
               
                <?php while ($row = $news->fetch_assoc()) { ?>
                    <div class="new">
                        <img src="<?= $row['image'] ?>" alt="">
                        <div class="info">
                            <a href="new-detail/<?= $row['id']?>">
                                <h3>
                                    <?= $row['title'] ?>
                                </h3>
                                <span>
                                    <?= $row['createdAt'] ?>
                                </span>
                            </a>
                        </div>

                    </div>
                <?php } ?>

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



    <script src="assets/js/main.js"></script>

</body>

</html>