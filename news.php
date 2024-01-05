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
                        <img src="admin/uploads/<?= $row['image'] ?>" alt="">
                        <div class="info">
                            <a href="new-detail/<?= $row['id'] ?>">
                                <h3>
                                    <?= $row['title'] ?>
                                </h3>
                                <span>
                                    <i class="ri-time-line"></i>:
                                    <?php $ori =  $row['createdAt'];
                                        $datetime = new DateTime($ori);
                                        $formatDatetime = $datetime->format('H:i:s d-m-Y');

                                        echo $formatDatetime;
                                    ?>
                                </span>
                            </a>
                        </div>

                    </div>
                <?php } ?>

            </div>
            

        </section>
    </main>

    <?php
    include('footer.php');
    ?>

    <!-- scroll up -->
    <a href="#" class="scrollup" id="scroll-up">
        <i class="ri-arrow-up-circle-line scrollup__icon"></i>
    </a>

    <script src="assets/js/main.js"></script>

</body>

</html>