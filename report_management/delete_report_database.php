<?php 


include 'database_connection.php'; //database connection

if($_GET['did']){
     //delete report from datbase
    $sql = "DELETE FROM reportDoc WHERE id=".$_GET['did'];
    // query deletion
    mysqli_query($con, $sql);
     //redirect to role page
    include 'reports.php';
    die();
}//end-if

?>