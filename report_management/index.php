<!DOCTYPE html>
<html>
<head>
    <title>Report Management System</title>
</head>
<body>
<?php
$msg = '';
if($_SERVER['REQUEST_METHOD']=='POST'){
    $image = $_FILES['image']['tmp_name'];
    $img = file_get_contents($image);
    include 'database_connection.php'; //database connection
    $sql = "insert into test (image) values(?)";

    $stmt = mysqli_prepare($con,$sql);

    mysqli_stmt_bind_param($stmt, "s",$img);
    mysqli_stmt_execute($stmt);

    $check = mysqli_stmt_affected_rows($stmt);
    if($check==1){
        $msg = 'Image Successfullly Uploaded';
    }else{
        $msg = 'Error uploading image';
    }
    mysqli_close($con);
}//END-if
?>
<form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="image" />
    <button>Upload</button>
</form>
<?php
    echo $msg;
?>
</body>
</html>