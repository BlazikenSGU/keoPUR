<?php
include('../connectDB.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $title = $_POST["title"];
    $image = $_FILES["image"]["name"];
    $content = $_POST["content"];

    $title = mysqli_real_escape_string($conn, $title);
    $content = mysqli_real_escape_string($conn, $content);

    //xu ly hinh anh
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES["image"]["name"]);

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
        //upload thanh cong
    } else {
        echo "error1";
    }


    //check id chống trùng ID
    $check = "SELECT * FROM news WHERE id = '$id'";
    $result = $conn->query($check);

    if ($result->num_rows > 0) {
        echo "ma san pham da ton tai.";
    } else {
        //id chua ton tai, co the them vao DB
        $sql = "INSERT INTO news (id,
                                    title,
                                    image,
                                    content,
                                    createdAt,
                                    updatedAt )VALUES (
                                        NULL,
                                       '$title',
                                       '$image',
                                        '$content',
                                        NULL,
                                        NULL
                                    )";
        if ($conn->query($sql) === TRUE) {
            echo '<script> window.location = "index.php";</script>';
        } else {
            echo "Lỗi: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
}

?>