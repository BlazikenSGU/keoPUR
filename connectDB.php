<?php 
    $conn = mysqli_connect("localhost","root","","keopur") 
        or die('connect fail');

    $stmt = $conn->prepare("SELECT * FROM news");
    $stmt->execute();
    
    $news = $stmt->get_result();
    
    
?>