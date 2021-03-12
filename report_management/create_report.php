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
      /* margin-top: 99px; */
      margin-left: 790px;
      color: black;
      border: 2px solid #4CAF50;
    }

    .button1:hover {
      background-color: #4CAF50;
      color: white;
    }

    </style>
</head>

<body>
    <header class="row">
        <div class="column">
            <img src="leaf-white.PNG" height="30" width="30" alt="image not found" />
        </div>
        <ul>
            <!-- create toolbar -->
            <li><a href="roles.php">UserRoles</a></li>
            <li><a href="reports.php">Reports</a></li>
            <li> <a href="logout.php">Log out</a></li>
        </ul>
    </header>

    <?php

    $groupName="test";

echo " <button class='button button1' onclick='addInput(`input1`)'>Add Permission</button>";
    echo " <div class='bg-img'>
        <form action='create_report_database.php?did=$groupName' method='POST' class='container' enctype='multipart/form-data'>
          <h1>Report</h1>";

    echo "<div id='input1'>
    <label for='groups'><b> Permission 1 </b></label>
    <input type='text' placeholder='Permission Name' id='Permission1' name='groups'>
    </div>";

    echo "<label for='tag'><b>Tag</b></label>";
    echo "<input type='text' placeholder='Enter Tag Name' name='tags'>";

    echo "<label for='file'><b>File</b></label>";
    echo "<input type='file' name='image' />";

    echo "<button type='submit' name='send' class='btn'>Edit</button>";
    echo " </form>";
    echo " </div>";

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

                if (counter == 1) {
                    groupname = (document.getElementById(id).value);
                } else {
                    groupname = groupname + "," + (document.getElementById(id).value);
                }//end-else

                newdiv.innerHTML = "Permission " + (counter + 1) + " ";
                var newInput = document.createElement('input');
                newInput.id = "Permission" + (counter + 1);
                newInput.type = 'text';
                newInput.placeholder = 'Permission Name';
                newInput.name = 'groups';
                newInput.value = groupname;

                document.getElementById(divName).appendChild(newdiv);
                document.getElementById(divName).appendChild(document.createElement('b'));
                document.getElementById(divName).appendChild(newInput);
                counter++;
            }//end-else
        } //end-funtion
    </script>
</body>
</html>