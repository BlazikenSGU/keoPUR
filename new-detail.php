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
                <i class="ri-paint-fill nav__logo-icon"></i> Gia Công CLC
            </a>

            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item">
                        <a href="home" class="nav__link ">Trang chủ</a>
                    </li>
                    <li class="nav__item">
                        <a href="#about" class="nav__link">Thông tin</a>
                    </li>
                    <li class="nav__item">
                        <a href="#products" class="nav__link">Sản phẩm</a>
                    </li>
                    <li class="nav__item">
                        <a href="#faqs" class="nav__link active-link">Tin tức</a>
                    </li>
                    <li class="nav__item">
                        <a href="#contact" class="nav__link">Liên hệ</a>
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
                <button id="url" class="buttonBack ">
                    <i class="ri-arrow-go-back-fill button__icon"></i>
                </button>
            </div>

            <div class="detail-content">
                <h1>
                    <?= $row['title'] ?>
                </h1>
                <span>
                    <i class="ri-time-line"></i>:
                    <?php $ori = $row['createdAt'];
                    $datetime = new DateTime($ori);
                    $formatDatetime = $datetime->format('H:i:s d-m-Y');

                    echo $formatDatetime;
                    ?>
                </span>
                <img src="admin/uploads/<?= $row['image'] ?>" alt="">
                <div>
                    <?php
                    $content = $row['content'];
                    $content = preg_replace('/(<img[^>]*\s+src=["\'])upload\//i', '$1admin/upload/', $content);

                    echo $content;
                    ?>

                </div>
            </div>

        </section>
    </main>


    <?php
    include('footer.php');
    ?>

    <a href="new-detail/<?= $row['id'] ?>" class="scrollup" id="scroll-up">
        <i class="ri-arrow-up-circle-line scrollup__icon"></i>
    </a>

    <script src="assets/js/main.js"></script>
    <script src="assets/js/back.js"></script>
</body>

</html>