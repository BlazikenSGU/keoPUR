<?php

session_start();
ob_start();

if(isset($_SESSION["role"]) && $_SESSION["role"] == 1) {

include('../connectDB.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>

    <link rel="stylesheet" href="admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.4.1/css/all.min.css"
        integrity="sha512-/RUbtHakVMJrg1ILtwvDIceb/cDkk97rWKvfnFSTOmNbytCyEylutDqeEr9adIBye3suD3RfcsXLOLBqYRW4gw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <header class="header">
        <nav>
            <div class="nav container">

            </div>
        </nav>
    </header>

    <main class="main">
        <section class="">
            <div class=" container section">
                <h1 class="add_title">Quản lý bài viết</h1>
                <a href="add.php" class="btn btn-primary button__add">Thêm bài viết</a>
                <a href="http://localhost/keoPUR/" class="btn btn-success">Trang chủ Client</a>
                <a class="btn btn-primary" href="logout.php">Đăng xuất</a>
                <table class="table caption-top">
                  
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Tiêu đề</th>
                            <th scope="col">Image đại diện</th>
                            <th scope="col">Thời gian tạo</th>
                            <th scope="col">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $news->fetch_assoc()) { ?>
                            <tr>
                                <th scope="row">
                                    <?= $row['id'] ?>
                                </th>
                                <td>
                                    <?= $row['title'] ?>
                                </td>
                                <td class="td__img"><img src="uploads/<?= $row['image'] ?>" alt=""></td>
                                <td>
                                    <?php $ori =  $row['createdAt'];
                                        $datetime = new DateTime($ori);
                                        $formatDatetime = $datetime->format('H:i:s d-m-Y');

                                        echo $formatDatetime;
                                    ?>
                                </td>
                                <td class="td__function">
                                    <a href="view.php?id=<?=$row['id']?>"><i class="far fa-eye"></i></a>
                                    <a href="edit.php?id=<?=$row['id']?>"><i class="fas fa-edit"></i></a>
                                    <a href="javascript:void(0);" onclick="confirmRemove(<?=$row['id']?>)" ><i class="far fa-trash-alt"></i></a>

                                </td>
                            </tr>
                        <?php } ?>

                    </tbody>
                </table>
            </div>
        </section>

    </main>
    <footer>

    </footer>

<script>
    function confirmRemove(id){
        var confirmResult = confirm("Bạn có chắc chắn xoá ?");

        if(confirmResult){
            window.location.href = "remove.php?id=" + id;
        }else{
            //
        }
    }
</script>

</body>

</html>

<?php } else{
    header('location: login.php');
}
?>