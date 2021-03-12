<?php 

include 'database_connection.php';

if (isset($_POST['send'])) {
    $email = $_POST['email'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $permissions = $_POST['permissions'];
    $role = $_POST['role'];
    $param_password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Creates a password hash

    $sql = "INSERT INTO users (email, password, first_name, last_name, permissions, role) VALUES ('$email','$param_password', '$first_name','$last_name', '$permissions','$role')";


    if (mysqli_query($con, $sql)) {
        echo "    Your has been send successfully !</h3>";
		include 'roles.php';
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($con);
     }
  
}//end-if

?>