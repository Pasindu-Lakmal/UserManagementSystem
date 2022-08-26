<?php session_start(); ?>
<?php
require_once('inc/connection.php');
require_once('inc/functions.php');

?>
<?php
//check for form submission
if (isset($_POST["submit"])) {

    $errors = array();
    //chech if the user name and password has beeen entered
    if (!(isset($_POST['email'])) || strlen(trim($_POST['email'])) < 1) {
        $errors[] = "inavalid / missing email 1";
    }
    if (!(isset($_POST['password'])) || strlen(trim($_POST['password'])) < 1) {
        $errors[] = "inavalid / missing password 2";
    }
    //save user name and password into vairiable
    if (empty($errors)) {
        $email = mysqli_real_escape_string($connection, $_POST['email']);
        $password = mysqli_real_escape_string($connection, $_POST['password']);
        $hashed_password = sha1($password);

        //prepare database query
        $query = "SELECT * FROM user WHERE email_adress='{$email}' AND password = '{$hashed_password}' LIMIT 1";

        $reusult_set = mysqli_query($connection, $query);


        if ($reusult_set) {
            if (mysqli_num_rows($reusult_set) == 1) {
                //valid user found 
                //redirect to user.php

                $user = mysqli_fetch_assoc($reusult_set);
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['first_name'] = $user['first_name'];
                //updateing ladt login
                $queary = "UPDATE user SET last_login = NOW() WHERE id= {$_SESSION['user_id']} LIMIT 1";
                $result = mysqli_query($connection, $queary);
                if (!$result) {
                    die("Database query failed");
                }
                header('Location: users.php');
            } else {
                $errors[] = 'Invalide username / password 3';
            }
        } else {
            $errors[] = "Database query faild 4";
        }
        //if not diplay the errors - > it is on form
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In - User Management System</title>
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
    <div class="login">
        <form action="index.php" method="post">
            <fieldset>
                <legend>
                    <h1>LOG IN</h1>
                </legend>
                <?php
                if (isset($errors) && !empty($errors))
                    echo '<p class="error">Invalid Username/ Password</p>';
                ?>
                <?php
                if (isset($_GET['logout']))
                    echo '<p class="info">Sussesfully log out</p>';
                ?>
                <p>
                    <label for="">Username:</label>
                    <input type="text" id="" name="email" placeholder="Email Adress">
                </p>
                <p>
                    <label for="">Password:</label>
                    <input type="password" id="" name="password" placeholder="Password">
                </p>
                <p>
                    <button type="submit" name="submit">Log In</button>
                </p>

            </fieldset>

        </form>
    </div>
</body>

</html>

<?php
mysqli_close($connection);
?>