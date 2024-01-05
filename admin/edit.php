<?php
include('../connectDB.php');

if (isset($_GET['id'])) {
    $item_id = $_GET['id'];

    $stmt = $conn->prepare("SELECT * FROM news WHERE id = ?");
    $stmt->bind_param("i", $item_id);
    $stmt->execute();
    $get_item = $stmt->get_result();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>

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


    <script src="tinymce/js/tinymce/tinymce.min.js"></script>
    <script src="tinymce/js/tinymce/plugins"></script>
    <script>

        tinymce.init({
            selector: '#content',
            height: 800,
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
            tinycomments_mode: 'embedded',
            images_upload_url: 'tinymce_upload.php',
            images_upload_handler: (blobInfo, progress) => new Promise((resolve, reject) => {
                const xhr = new XMLHttpRequest();
                xhr.withCredentials = false;
                xhr.open('POST', 'tinymce_upload.php');

                xhr.upload.onprogress = (e) => {
                    progress(e.loaded / e.total * 100);
                };

                xhr.onload = () => {
                    if (xhr.status === 403) {
                        reject({ message: 'HTTP Error: ' + xhr.status, remove: true });
                        return;
                    }

                    if (xhr.status < 200 || xhr.status >= 300) {
                        reject('HTTP Error: ' + xhr.status);
                        return;
                    }

                    console.log(xhr.responseText);
                    const json = JSON.parse(xhr.responseText);


                    if (!json || typeof json.location != 'string') {
                        reject('Invalid JSON: ' + xhr.responseText);
                        return;
                    }

                    resolve(json.location);
                };

                xhr.onerror = () => {
                    reject('Image upload failed due to a XHR Transport error. Code: ' + xhr.status);
                };

                const formData = new FormData();
                formData.append('file', blobInfo.blob(), blobInfo.filename());

                xhr.send(formData);
            })
        });
    </script>

</head>

<body>
    <div class=" container_view">

        <button id="url" class="btn btn-secondary back" type="button">
            <i class="fas fa-arrow-left"></i>
        </button>

        <h1 class="add_title">Chỉnh sửa bài viết</h1>
        <?php if ($row = $get_item->fetch_assoc()) { ?>

            <form action="sql_edit.php" method="post" class="edit__news" enctype="multipart/form-data">
                <span>ID:</span>
                <input type="text" name="id" readonly value="<?= $row['id'] ?>">

                <span>Title</span>
                <input type="text" name="title" value="<?= $row['title'] ?>">

                <span>Image đại diện</span>
                <img src="uploads/<?= $row['image'] ?>" alt="">
                Source:
                <input type="text" name="image" readonly value="<?= $row['image'] ?>">

                <span>Nội dung mô tả</span>
                <div class="box">
                    <div class="form-group">
                        <textarea name="content" id="content" cols="50" rows="10">
                                            <?= $row['content'] ?>
                        </textarea>
                    </div>
                </div>

                <span>Time</span>
                <input type="text" readonly value="<?php $ori =  $row['createdAt'];
                                        $datetime = new DateTime($ori);
                                        $formatDatetime = $datetime->format('H:i:s d-m-Y');

                                        echo $formatDatetime;
                                    ?>">
                <br>

                <input type="submit" value="Lưu" name="save" class="btn btn-success">

            </form>
        <?php } ?>
    </div>

    <script src="../assets/js/back.js"></script>

</body>

</html>