<?php
echo"done select"; 
  $server="127.0.0.1";
$user="root";
$pass="";
$db= "report";
$conn = mysqli_connect($server, $user, $pass, $db);
if(!$conn)
	die("field");
echo("<h2 style='color:blue;text-align:center;'>Suessfully Registration</h2>");

  $result = mysqli_query($con,"SELECT id, email, first_name, last_name, permissions, password FROM users");

  echo"done select"; 

  echo "<table style='width:100%'>
  <tr>
    <th>ID</th>
    <th>Email</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Permissions</th>
    <th>Action</th>
  </tr>";

  while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['id'] . "</td>";
  echo "<td>" . $row['email'] . "</td>";
  echo "<td>" . $row['first_name'] . "</td>";
  echo "<td>" . $row['last_name'] . "</td>";
  echo "<td>" . $row['permissions'] . "</td>";
  echo "<td>" . $row['password'] . "</td>";
  echo "</tr>";
  }
  echo "</table>";
  

  mysqli_close($con);
  ?>