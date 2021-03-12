<?php 

include 'database_connection.php';

if(isset($_POST['send']))
{    
     $groups = $_POST['groups'];
	 $tags = $_POST['tags'];
     $id = $_POST['id'];

     $sql = "UPDATE reportDoc SET groups='" . $groups . "' , tags='". $tags ."'  WHERE id=".$id;

     if (mysqli_query($con, $sql)) {
        // echo "<h2></h2>";
     } else {
        echo ">>>>>>Error: " . $sql . ":-" . mysqli_error($con);
     }//end-else
}//end-if

$msg = '';
if($_SERVER['REQUEST_METHOD']=='POST'){
    $image = $_FILES['image']['tmp_name'];
    $img = file_get_contents($image);
    include 'database_connection.php'; //database connection
   $sql = "UPDATE reportDoc SET  file_image=(?)  WHERE id=".$id;


    $stmt = mysqli_prepare($con,$sql);

    mysqli_stmt_bind_param($stmt, "s",$img);
    mysqli_stmt_execute($stmt);

    $check = mysqli_stmt_affected_rows($stmt);
    if($check==1){
        $msg = 'Image Successfullly Uploaded';
        include 'reports.php';
    }else{
        $msg = 'Error uploading image';
        echo "<h4><b>$msg</b></h4>";
        include 'reports.php';
    }//end-else
}//END-if

?>