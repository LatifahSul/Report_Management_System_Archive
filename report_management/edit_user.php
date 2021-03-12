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

        #role {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
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

    if ($_GET['did']) {
        $sql = "SELECT   id, email, first_name, last_name, permissions, role FROM users WHERE id=" . $_GET['did'];
        $result = mysqli_query($con, $sql);

        echo " <div class='bg-img'>
        <form action='update_user_database.php' method='POST' class='container'>
          <h1>User</h1>";

        $row = mysqli_fetch_assoc($result);

        echo "<label for='groups'><b> User ID </b></label> ";
        echo "<input type='text' value='" . $_GET['did'] . "' name='id' readonly>";

        echo "<label for='email'><b> Email </b></label> ";
        echo "<input type='text' value='" . $row['email'] . "' name='email' readonly>";

        echo "<label for='first_name'><b>First Name</b></label>";
        echo "<input type='text' placeholder='" . $row['first_name'] . "' name='first_name' required>";

        echo "<label for='last_name'><b>Last Name</b></label>";
        echo "<input type='text' placeholder='" . $row['last_name'] . "' name='last_name' required>";

        // echo '<div id="input1">';
        echo "<label for='permissions'><b>Permissions</b></label>";
        echo "<input type='text' placeholder='" . $row['permissions'] . "' id='Permission1' name='permissions' required>";
       
        // echo '<button name="addFeilds"  onclick="addInput("input1")"><b>add</b></button>';
        // echo " </div>";
        
        echo "<label for='role'><b>Role</b></label>";
        //   echo "<input type='text' placeholder='". $row['role'] ."' name='role'>";
        echo '<select id="role" name="role" required>
                    <option selected>Please Select</option>
                    <option>Admin</option>
                    <option>User</option>
                </select>';

        // }//END-while

        echo "<button type='submit' name='send' class='btn'>Edit</button>";
        echo " </form>";
        echo " </div>";
    } //END-if
    ?>

    <script>
        var counter = 1;
        var limit = 10;
        var groupname = "";

        function addInput(divName) {
            if (counter == limit) {
                alert("You have reached the limit of adding " + counter + " inputs");
            } else {
                var newdiv = document.createElement('div');
                var id = "Permission" + (counter);
                groupname = (document.getElementById(id).value) + "#";

                alert("vr::" + document.getElementById(id).value);
                newdiv.innerHTML = "Permission " + (counter + 1) + " ";
                var newInput = document.createElement('input');
                newInput.id = "Permission" + (counter + 1);

                document.getElementById(divName).appendChild(newdiv);
                document.getElementById(divName).appendChild(document.createElement('b'));
                document.getElementById(divName).appendChild(newInput);
                counter++;
            }
        } //end-funtion
    </script>
</body>

</html>