<?php session_start(); /* Starts the session */

/* Check Login form submitted */
if (isset($_POST['submit'])) {
        /* Define username and associated password array */
        $logins = array('admin' => 'admin', 'user1' => 'password1', 'user2' => 'password2');

        /* Check and assign submitted Username and Password to new variable */
        $Username = isset($_POST['Username']) ? $_POST['Username'] : '';
        $Password = isset($_POST['Password']) ? $_POST['Password'] : '';

        /* Check Username and Password existence in defined array */
        if (isset($logins[$Username]) && $logins[$Username] == $Password) {
                /* Success: Set session variables and redirect to Protected page  */
                $_SESSION['UserData']['Username'] = $logins[$Username];
                header("Location:index.php");
                exit;
        } else {
                /*Unsuccessful attempt: Set error message */
                header("Location: login.php?error=Invalid Login Details");
        }
}
?>

<!DOCTYPE html>
<html>

<head>
        <title>LOGIN</title>
        <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
        <form action="" method="post">
                <h2>LOGIN</h2>
                <?php if (isset($_GET['error'])) { ?>
                        <p class="error">
                                <?php echo $_GET['error']; ?>
                        </p>
                <?php } ?>
                <label>User Name</label>
                <input type="text" name="Username" placeholder="User Name"><br>

                <label>Password</label>
                <input type="password" name="Password" placeholder="Password"><br>

                <button name="submit" type="submit">Login</button>
        </form>
</body>

</html>