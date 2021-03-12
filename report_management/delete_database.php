<?php 

include 'database_connection.php'; //database connection

if($_GET['did']){
    //delete user from datbase
    $sql = "DELETE FROM users WHERE id=".$_GET['did'];
    // query deletion
    mysqli_query($con, $sql);
    //redirect to role page
    include 'roles.php';
    die();
}//end-if
?>