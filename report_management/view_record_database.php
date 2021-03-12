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

        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 5px;
            text-align: left;
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

        #myTable {
            border-collapse: collapse;
            width: 60%;
            margin-left: 255px;
            margin-top: 100px;
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

        #myTable tr.header {
            background-color: #f1f1f1;

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
    if ($_GET['did']) {

        $id = $_GET['did'];
        $sql = "SELECT id, groups, tags, file_image FROM reportdoc WHERE  id=" . $id;
        $result = mysqli_query($con, $sql);

        echo "<table border='1'  id='myTable'>
                <tr class='header'>
                    <th>Report ID</th>
                    <th>Groups</th>
                    <th>Tags</th>
                    <th>File</th>
                </tr>";

        while ($row = mysqli_fetch_array($result)) {
            echo "<tr >";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['groups'] . "</td>";
            echo "<td>" . $row['tags'] . "</td>";

            echo '<td> <img src="data:image/jpeg;base64,' . base64_encode($row['file_image']) . '" width="220" height="120"/></td>';

            echo "</tr>";
        }
        echo "</table>";

        mysqli_close($con);
    } //end-if
    ?>
</body>
</html>