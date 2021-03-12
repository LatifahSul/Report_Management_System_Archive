<?php
//database connection
include 'database_connection.php';

if (isset($_POST['send'])) {
    $groups = $_POST['groups'];
    $tags = $_POST['tags'];

    $sql = "INSERT INTO reportDoc (groups, tags, file_image) VALUES ('$groups','$tags', ?)";

    $msg = '';
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $image = $_FILES['image']['tmp_name'];
        $img = file_get_contents($image);
      
        $stmt = mysqli_prepare($con, $sql);

        mysqli_stmt_bind_param($stmt, "s", $img);
        mysqli_stmt_execute($stmt);

        $check = mysqli_stmt_affected_rows($stmt);
        if ($check == 1) {
            $msg = 'Image Successfullly Uploaded';
            header("location: users.php?did=".$_GET['did']);
        } else {
            $msg = 'Error uploading image';
            echo "<h4><b>$msg</b></h4>";
            header("location: users.php?did=".$_GET['did']);
        }//end-else
    } //END-if
}//end-if
?>