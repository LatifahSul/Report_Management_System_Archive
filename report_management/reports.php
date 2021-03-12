<!DOCTYPE html>
<html>

<head>
  <title>Report Management System</title>
  <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@1,900&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="mainstyle.css">
  <style type="text/css">
    /* Set a style for the body and container */
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

    /**Buttons 1,2,3,4 */
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
      margin-left: 45px;
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
    <!-- create toolbar -->
    <ul>
      <li><a href="roles.php">UserRoles</a></li>
      <li><a href="reports.php">Reports</a></li>
      <li> <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for tag, group.." title="Type in a name"> </li>
      <li> <a href="logout.php">Log out</a></li>
    </ul>
  </header>


  <?php
  //include the database connection 
  include 'database_connection.php';

  //sql select query
  $sql = "SELECT id, groups, tags FROM reportdoc";
  // query selection 
  $result = mysqli_query($con, $sql);

  //Create (create button)
  echo "<button class='button button1' onclick='createRecord()'>Create</button>";

  // create reports table
  echo "<table border='1' id='myTable'>
  <tr class='header'>
    <th>Report ID</th>
    <th>Groups</th>
    <th>Tags</th>
    <th>Actions</th>
  </tr>";

  // get all the report from database to the report table
  while ($row = mysqli_fetch_array($result)) {
    echo "<tr >";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['groups'] . "</td>";
    echo "<td>" . $row['tags'] . "</td>";
    // create button for each row (edit, view, and delete)
    echo "<td><button class='button button2' onclick='updateRecord(id="  . $row['id'] .
      ")'>Edit</button> <button class='button button3' onclick='viewRecord(id="  . $row['id'] .
      ")'>View</button> <button class='button button4' onclick='delRecord(this, id="  . $row['id'] .
      ")'>Delete</button></td>";

    echo "</tr>";
  } //ENd-while
  echo "</table>";
  //close database connection
  mysqli_close($con);
  ?>

  <script>
    function createRecord() {
      //create new report and insert it to the database
      window.location = "create_report.php?";
    } //end-funtion

    function viewRecord(id) {
      // view a specific report
      window.location = "view_record_database.php?did=" + id;
    } //end-function

    function delRecord(o, id) {
      // delete a specific report from database and report table
      var msg = confirm("Are you sure you want to delete this report?");

      if (msg) {
        var p = o.parentNode.parentNode;
        p.parentNode.removeChild(p);

        window.location = "delete_report_database.php?did=" + id;
      } //end-if
    } //end-funtion

    function updateRecord(id) {
      // update/edit a specific report from databse and report table
      window.location = "edit_report.php?did=" + id;

    } //end-funtion

    /**
     * This method for search by report, group
     */
    function myFunction() {
      var input, filter, table, tr, td, cell, i, j;
      input = document.getElementById("myInput");
      filter = input.value.toUpperCase();
      table = document.getElementById("myTable");
      tr = table.getElementsByTagName("tr");
      for (i = 1; i < tr.length; i++) {
        // Hide the row initially.
        tr[i].style.display = "none";

        td = tr[i].getElementsByTagName("td");
        for (var j = 0; j < td.length; j++) {
          cell = tr[i].getElementsByTagName("td")[j];
          if (cell) {
            if (cell.innerHTML.toUpperCase().indexOf(filter) > -1) {
              console.log("remove::" + cell.innerHTML.toUpperCase().indexOf(filter));
              // console.log("remove length::"+i);
              tr[i].style.display = "";
              break;
            }//end-if
          }//end-if
        }//end-for
      }//end-for
    } //END-Function()
  </script>
</body>
</html>