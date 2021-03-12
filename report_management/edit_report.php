<!DOCTYPE html>
<html>
<head>
    <title>Report Management System</title>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="mainstyle.css">
    <style type="text/css">
    body {
        background-image: url("background.jpg");
        background-size: cover;
    }

    * {
        box-sizing: border-box;
    }

    .container {
        position: absolute;
        margin-left: 330px;
        margin-top: 0px;
        max-width: 600px;
        padding-left: 10px;
        padding-bottom: 10px;
        padding-right: 10px;
        background-color: white;
        opacity: 0.6;
    }


    input[type=text],
    input[type=password] {
        width: 100%;
        padding: 15px;
        margin: 5px 0 22px 0;
        border: none;
        background: #f1f1f1;
    }

    input[type=text]:focus,
    input[type=password]:focus {
        background-color: #ddd;
        outline: none;
    }

    input[type=file],
    input[type=password] {
        width: 100%;
        padding: 15px;
        margin: 5px 0 22px 0;
        border: none;
        background: #f1f1f1;
    }

    input[type=file]:focus,
    input[type=password]:focus {
        background-color: #ddd;
        outline: none;
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
    </style>
</head>

<body>
    <header class="row">
        <div class="column">
            <img src="leaf-white.PNG" height="30" width="30" alt="image not found" />
        </div>
        <ul>
        <!-- toolbar -->
            <li><a href="roles.php">UserRoles</a></li>
            <li><a href="reports.php">Reports</a></li>
            <li> <a href="logout.php">Log out</a></li>
        </ul>
    </header>

    <?php 
   include 'database_connection.php';

   if($_GET['did']){
      $sql = "SELECT  groups, tags FROM reportdoc WHERE id=".$_GET['did'];
      $result = mysqli_query($con, $sql);
      
        echo " <div class='bg-img'>
        <form action='edit_report_database.php' method='POST' class='container' enctype='multipart/form-data'>
          <h1>Report</h1>";

          $row = mysqli_fetch_assoc($result);

          echo "<label for='groups'><b> Report ID </b></label> ";
          echo "<input type='text' value='" . $_GET['did']. "' name='id' readonly>";

        echo "<label for='groups'><b> Groups </b></label> ";
          echo "<input type='text' placeholder='" . $row['groups']. "' name='groups' required>";

          echo "<label for='tag'><b>Tag</b></label>";
          echo "<input type='text' placeholder='". $row['tags'] ."' name='tags' required>";
      
          echo "<label for='file'><b>File</b></label>";
          echo "<input type='file' name='image' />";

          echo "<button type='submit' name='send' class='btn'>Edit</button>";
          echo " </form>";
          echo " </div>";
}//END-if
  ?>
</body>
</html>