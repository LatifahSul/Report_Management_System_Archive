<?php 

include 'database_connection.php'; 

 if(isset($_POST['send'])){

    $sql = "UPDATE users SET email='" . $_POST['email'].
    "', first_name='". $_POST['first_name'].
    "', last_name='".$_POST['last_name'].
    "', permissions='" . $_POST['permissions'] .
     "', role='".$_POST['role']."' WHERE id=".$_POST['id'];

    mysqli_query($con, $sql);
   
    include 'roles.php';
    die();
}
