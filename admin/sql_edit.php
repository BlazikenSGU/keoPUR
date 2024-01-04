<?php 
    include('../connectDB.php');

    if(isset($_POST['save'])){
        $id = $_POST['id'];
        $title = $_POST['title'];
        $image = $_POST['image'];
        $content = $_POST['content'];

        $sql  = "UPDATE news SET
                        title = '$title',
                        image = '$image',
                        content = '$content'
                        WHERE id = $id
                        ";

        if(mysqli_query($conn, $sql )){
            echo '<script>
                alert("update thành công");
                window.location = "index.php";
            </script>';
        }  else{
            echo '<script>
                alert("error update");
                window.location = "edit.php?id='.$id.'";
            </script>';
        }              

        mysqli_close($conn);

    }
?>