<?php session_start(); ?>
<?php
require_once('inc/connection.php');
require_once('inc/functions.php');
?>
<?php
//checheking if user is logged in
if (!(isset($_SESSION['user_id']))) {
    header('Location: index.php');
}
$errors = array();
$user_id = '';
$first_name = '';
$last_name = '';
$email_adress = '';

if (isset($_GET['user_id'])) {
    //Getting the user information
    $user_id = mysqli_real_escape_string($connection, $_GET['user_id']);
    $query = "SELECT * FROM user WHERE id = '{$user_id}' LIMIT 1";
    $result_set = mysqli_query($connection, $query);
    if ($result_set) {
        if (mysqli_num_rows($result_set) == 1) {
            //user found
            $result = mysqli_fetch_assoc($result_set);
            $first_name = $result['first_name'];
            $last_name = $result['last_name'];
            $email_adress = $result['email_adress'];
        } else {
            //user not found
            header('Location: users.php?err=user_not_found');
        }
    } else {
        //query unsuccessful
        header('Location: users.php?err=query_failed');
    }
}


if (isset($_POST['submit'])) {

    $user_id = $_POST['user_id'];
    $password = $_POST['password'];

    //checking reqired fields
    $req_fields = array('user_id', 'password');

    $errors = array_merge($errors, check_req_field($req_fields));

    //checking max leanth
    $max_len_fields = array('password' => 40);
    $errors = array_merge($errors, check_max_len($max_len_fields));

    //adding data to database

    if (empty($errors)) {
        //no error found...  adding data

        $password  = mysqli_real_escape_string($connection, $_POST['password']);
        $hashed_password = sha1($password);

        $query = "UPDATE user SET ";
        $query .= "password = '{$hashed_password}' ";
        $query .= "WHERE id = {$user_id} LIMIT 1";

        $result = mysqli_query($connection, $query);
        if ($result) {
            header('Location: users.php?user_modified=true');
        } else {
            $errors[] = "faild to update the password.";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change password</title>
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
    <header>

        <div class="appname">User Management System</div>
        <div class="loggedin">Welcome <?php echo $_SESSION['first_name']; ?> ! <a href="logout.php">Log Out</a></div>
    </header>
    <main>
        <!-- input name no need to equal database field name but it is easy to handle -->
        <h1>Change password<span><a href="users.php">
                    < Back to User list</a></span></h1>
        <?php
        if (!empty($errors)) {
            display_errors($errors);
        }
        ?>

        <form action="change-password.php" method="post" class="userform">
            <input type="hidden" name="user_id" <?php echo 'value = "' . $user_id .  '"'; ?>>

            <p>

                <label for="">First name : </label>
                <input type=" text" name="first_name" <?php echo 'value = "' . $first_name .  '"'; ?> disabled>
            </p>
            <p>
                <label for="">Last name : </label>
                <input type="text" name="last_name" <?php echo 'value = "' . $last_name .  '"'; ?> disabled>
            </p>
            <p>
                <label for="">Email : </label>
                <input type="text" name="email_adress" <?php echo 'value = "' . $email_adress .  '"'; ?> disabled>
            </p>
            <p>
                <label for="">New Password : </label>
                <input type="password" name="password" id="password">

            </p>
            <p>
                <label for="">Show password : </label>
                <input type="checkbox" name="showpassword" id="showpassword" style="width: 20px; height:20px;">

            </p>
            <p>
                <label for="">&nbsp;</label>
                <button type="submit" name="submit">Update password</button>
            </p>
        </form>


    </main>
    <script src="js/jquery.js"></script>
    <script>
        $(document).ready(function() {
            $('#showpassword').click(function() {
                if ($('#showpassword').is(':checked')) {
                    $('#password').attr('type', 'text');
                } else {
                    $('#password').attr('type', 'password');
                }

            });
        });
    </script>
</body>

</html>