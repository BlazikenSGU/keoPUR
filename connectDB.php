<?php 
    $conn = mysqli_connect("localhost","root","","keopur") 
        or die('connect fail');

    $stmt = $conn->prepare("SELECT * FROM news ORDER BY createdAt DESC");
    $stmt->execute();
    
    $news = $stmt->get_result();

    // lay ra title random
    $check = $conn->prepare("SELECT * FROM news ORDER BY RAND() LIMIT 4");
    $check->execute();

    $check2 = $check->get_result();


    // lay ra user de dang nhap admin
    $user = $conn->prepare("SELECT * FROM users");
    $user->execute();

    $user2 = $user->get_result();
     
?>