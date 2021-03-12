<!DOCTYPE html>
<html>

<head>
  <title>Report Management System</title>
  <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@1,900&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="mainstyle.css">
  <style type="text/css">
    /* Set a style for the container and body */
    body {
      background-image: url("background.jpg");
      background-size: cover;
    }

    * {
      box-sizing: border-box;
    }

    .container {
      position: absolute;
      margin-left: 530px;
      margin-top: 0px;
      max-width: 600px;
      padding-left: 0px;
      padding-bottom: 10px;
      padding-right: 0px;
      background-color: white;
      opacity: 0.6;
    }



    /* Set a style for the submit button */
    .btn {
      background-color: #4CAF50;
      color: white;
      font-size: 100%;
      padding: 10px 20px;
      border: none;
      cursor: pointer;
      width: 100%;
      opacity: 0.9;
    }

    .btn:hover {
      opacity: 2.5;
    }


    /* Set a style for the table */
    table,
    th,
    td {
      border: 1px solid black;
      border-collapse: collapse;
    }

    th,
    td {
      padding: 15px;
      text-align: left;
    }

    #myTable {
      border-collapse: collapse;
      width: 60%;
      margin-left: 255px;
      border: 1px solid #ddd;
      font-size: 18px;
    }

    #myTable th,
    #myTable td {
      text-align: left;
      padding: 9px;
    }

    #myTable tr {
      border-bottom: 1px solid #ddd;
    }

    #myTable tr.header,
    #myTable tr:hover {
      background-color: #f1f1f1;

    }

    /**Buttons */
    .button {
      border: none;
      color: white;
      padding: 6px 12px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 4px 2px;
      transition-duration: 0.4s;
      cursor: pointer;
    }

    .button1 {
      background-color: white;
      border-radius: 25px;
      margin-left: 930px;
      color: black;
      border: 2px solid #4CAF50;
    }

    .button1:hover {
      background-color: #4CAF50;
      color: white;
    }

    .button2 {
      background-color: white;
      border-radius: 25px;
      color: black;
      border: 2px solid #008CBA;
    }

    .button2:hover {
      background-color: #008CBA;
      color: white;
    }

    .button3 {
      background-color: white;
      border-radius: 25px;
      color: black;
      border: 2px solid #FFD700;
    }

    .button3:hover {
      background-color: #FFD700;
      color: white;
    }

    .button4 {
      background-color: white;
      border-radius: 25px;
      color: black;
      border: 2px solid #CD5C5C;
    }

    .button4:hover {
      background-color: #CD5C5C;
      color: white;
    }

    /* Set a style for the input(type=text) */
    #myInput {
      background-position: 20px 20px;
      background-repeat: no-repeat;
      width: 100%;
      font-size: 14px;
      padding: 5px 0px 5px 30px;
      border: 1px solid #ddd;
      border-radius: 25px;
      margin-bottom: 2px;
      margin-top: 6px;
    }
  </style>
</head>

<body>
  <header class="row">
    <div class="column">
      <img src="leaf-white.PNG" height="30" width="30" alt="image not found" />
    </div>
    <ul>
      <!--create toolbar -->
      <li><a href="roles.php">UserRoles</a></li>
      <li><a href="reports.php">Reports</a></li>
      <li> <a href="logout.php">Log out</a></li>
    </ul>
  </header>

  <?php
  //include the database connection 
  include 'database_connection.php';

  //sql select query
  $sql = "SELECT id, email, first_name, last_name, permissions, role FROM users";
  // query selection 
  $result = mysqli_query($con, $sql);

  //Create (create button)
  echo "<button class='button button1' onclick='createRecord()'>Create</button>";

  // create reports table
  echo "<table border='1' id='myTable'>
  <tr class='header'>
    <th>ID</th>
    <th>Email</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Permissions</th>
    <th>Role</th>
    <th>Actions</th>
  </tr>";

  // get all the user role from database to the user role table
  while ($row = mysqli_fetch_array($result)) {
    echo "<tr >";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['email'] . "</td>";
    echo "<td>" . $row['first_name'] . "</td>";
    echo "<td>" . $row['last_name'] . "</td>";
    echo "<td>" . $row['permissions'] . "</td>";
    echo "<td>" . $row['role'] . "</td>";
    // create button for each row (edit, view, and delete)
    echo "<td><button class='button button2' onclick='updateRecord(id="  . $row['id'] .
      ")'>Edit</button><button class='button button4' onclick='deluserRole(this, id="  . $row['id'] .
      ")'>Delete</button></td>";

    echo "</tr>";
  } //ENd-while
  echo "</table>";
  //close database connection
  mysqli_close($con);
  ?>

  <script>
    function createRecord() {
      //create new user role and insert it to the database
      window.location = "create_user.php?";
    } //END-function()

    function deluserRole(o, id) {
      // delete a specific user role from database and user role table
      var msg = confirm("Are you sure you want to delete this user?");

      if (msg) {
        var p = o.parentNode.parentNode;
        p.parentNode.removeChild(p);

        window.location = "delete_database.php?did=" + id;
      } //end-if
    } //end-funtion

    function updateRecord(id) {
      // update/edit a specific user role from databse and user role table
      window.location = "edit_user.php?did=" + id;

    } //end-funtion
  </script>
</body>
</html>