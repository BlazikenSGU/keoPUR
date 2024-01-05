<?php
session_start();
ob_start();

include('../connectDB.php');

if(isset($_POST['login']) && ($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $username = $conn->real_escape_string($username);
    $password = $conn->real_escape_string($password);

    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password' ";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
        $role = $result->fetch_assoc();

        if($role['role'] == 1){
            $_SESSION['role'] = $role['role'];
            $_SESSION['id'] = $role['id'];
            $_SESSION['username'] = $role['username'];

            header('location: index.php');
            exit();
        }else{
            $txt_error = "Tài khoản không có quyền đăng nhập";
        }
    }else {
        $txt_error = "Sai toàn khoản hoặc mật khẩu.";
    }
    $conn->close();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

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

    <div class="container_view">
        <div class="admin_form_login">
            <h2>ĐĂNG NHẬP ADMIN</h2>
            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" class="form_login">
                <label >Username</label>
                <input type="text" name="username">

                <label >Password</label>
                <input type="text" name="password">

                <input name="login" class="btn btn-success" type="submit" value="LOGIN">
                <?php 
                    if(isset($txt_error) && ($txt_error != '')){
                        echo $txt_error;
                    }
                ?>

            </form>
        </div>

    </div>

</body>

</html>