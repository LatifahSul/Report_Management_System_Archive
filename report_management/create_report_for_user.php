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

        #groups{
        margin: 5px 0 12px 10px;
    }
    
    </style>
</head>

<?php
$id = $_GET['did'];
echo '<body onload ="radioButton(`' .$id. '`)">';
?>

    <header class="row">
        <div class="column">
            <img src="leaf-white.PNG" height="30" width="30" alt="image not found" />
        </div>
        <ul>
            <!-- create toolbar -->
            <?php 
            $user_id = $_GET['id'];
            echo '<li><a href="users.php?did='.$user_id.'">User</a></li>';
            ?>
            <li> <a href="logout.php">Log out</a></li>
        </ul>
    </header>

    <?php

        echo " <div class='bg-img'>
        <form action='create_report_user_database.php?did=$user_id' method='POST' class='container' enctype='multipart/form-data'>
          <h1>Report</h1>";

        echo "<label for='groups'><b> Groups </b></label> ";
        echo '<div id="container"></div>';

        echo "<label for='tag'><b>Tag</b></label>";
        echo "<input type='text' placeholder='Enter Tag Name' name='tags'>";

        echo "<label for='file'><b>File</b></label>";
        echo "<input type='file' name='image' />";


        echo "<button type='submit' name='send' class='btn'>Edit</button>";
        echo " </form>";
        echo " </div>";
  
    ?>

<script>
     function radioButton(groups) {
            groups_split = groups.split(",");
            var i = 0;
            while (i < groups_split.length) {
                var radiobox = document.createElement('input');
                radiobox.type = 'radio';
                radiobox.id = 'groups';
                radiobox.name = 'groups';
                radiobox.value = groups_split[i];

                var label = document.createElement('label')
                label.htmlFor = 'contact';

                var description = document.createTextNode(groups_split[i]);
                label.appendChild(description);

                var newline = document.createElement('br');

                var container = document.getElementById('container');
                container.appendChild(radiobox);
                container.appendChild(label);
                container.appendChild(newline);

                ++i;
            }//end while
        }//end-funtion
</script>
</body>

</html>