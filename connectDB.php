<?php 
    $conn = mysqli_connect("localhost","root","","keopur") 
        or die('connect fail');

    $stmt = $conn->prepare("SELECT * FROM news ORDER BY createdAt DESC");
    $stmt->execute();
    
    $news = $stmt->get_result();
    
    
?>