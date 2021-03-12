<?php
// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to home page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: Home.html");
    exit;
}

// Include database connection
require_once "database_connection.php";

// Define variables (password and username) and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Check if username is empty
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter username.";
    } else {
        $username = trim($_POST["username"]);
    }

    // Check if password is empty
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter your password.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate credentials
    if (empty($username_err) && empty($password_err)) {
        // Prepare a select statement
        $sql = "SELECT id, email, password, role FROM users WHERE email = ?";

        echo "<h1>SELECT id, username, password FROM test_users WHERE username = ?</h1>";

        if ($stmt = mysqli_prepare($con, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = $username;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Store result
                mysqli_stmt_store_result($stmt);

                // Check if username exists, if yes then verify password
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password, $role);
                    if (mysqli_stmt_fetch($stmt)) {
                        if (password_verify($password, $hashed_password)) {
                            // Password is correct, so start a new session
                            session_start();

                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;

                            // Redirect user to role page
                            if (strcmp(strtolower($role), "admin") == 0) {
                                header("location: roles.php");
                            } //END-if
                            else {
                                // Redirect user to user page
                                header("location: users.php?did=$id");
                            } //END-else
                        } else {
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else {
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that username.";
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        } //END-if
    } //END-if

    // Close connection
    mysqli_close($con);
} //END-if
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Report Management System</title>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="mainstyle.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">

      /* Set a style for the container and body */
        .wrapper {
            width: 100%;
            padding-left: 60px;
            padding-bottom: 60px;
            padding-right: 60px;
            margin-top: 55px;
        }

        body {
            font: 14px sans-serif;
            background-image: url("background.jpg");
            background-size: cover;
        }

        * {
            box-sizing: border-box;
        }


        .container {
            position: absolute;
            margin-left: 330px;
            margin-top: 55px;
            max-width: 600px;
            padding-left: 10px;
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
    </style>
</head>

<body>
    <div class='container'>
        <div class="wrapper">
            <h2>Login</h2>
            <p>Please fill in your credentials to login.</p>
            <!-- Create the login form -->
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                    <span class="help-block"><?php echo $username_err; ?></span>
                </div>
                <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control">
                    <span class="help-block"><?php echo $password_err; ?></span>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Login">
                </div>
                <p>Don't have an account? <a href="register.php">Sign up now</a>.</p>
            </form>
        </div>
    </div>
</body>

</html>