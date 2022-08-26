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

$first_name = '';
$last_name = '';
$email_adress = '';


$errors = array();

if (isset($_POST['submit'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email_adress = $_POST['email_adress'];
    //checking reqired fields
    $req_fields = array('first_name', 'last_name', 'email_adress', 'password');

    $errors = array_merge($errors, check_req_field($req_fields));

    //checking max leanth
    $max_len_fields = array('first_name' => 50, 'last_name' => 100, 'email_adress' => 100, 'password' => 40);
    $errors = array_merge($errors, check_max_len($max_len_fields));

    //checking email is valid is email is inside the function.php
    if (!is_email($_POST['email_adress'])) {
        $errors[] = "email is invalid";
    }

    //checking email adress id alredy exisist
    $email  = mysqli_real_escape_string($connection, $_POST['email_adress']);

    $query = "SELECT * FROM user WHERE email_adress ='{$email}'";
    $result_set = mysqli_query($connection, $query);
    if ($result_set) {
        if (mysqli_num_rows($result_set) == 1) {
            $errors[] = "Email adress alredy exist";
        }
    }

    //adding data to database

    if (empty($errors)) {
        //no error found...  adding data
        $first_name  = mysqli_real_escape_string($connection, $_POST['first_name']);
        $last_name  = mysqli_real_escape_string($connection, $_POST['last_name']);
        $password  = mysqli_real_escape_string($connection, $_POST['password']);

        //email adress is alredy sanitize
        $hassed_password  = sha1($password);
        $query = "INSERT INTO user ";
        $query .= "(first_name,last_name,email_adress,password,is_deleted)";
        $query .= "VALUES";
        $query .= "('{$first_name}','{$last_name}','{$email_adress}','{$hassed_password}', 0 )";

        $result = mysqli_query($connection, $query);
        if ($result) {
            header('Location: users.php?user_added=true');
        } else {
            $errors[] = "faild to add a  new record";
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
    <title>Add New User</title>
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
    <header>

        <div class="appname">User Management System</div>
        <div class="loggedin">Welcome <?php echo $_SESSION['first_name']; ?> ! <a href="logout.php">Log Out</a></div>
    </header>
    <main>
        <!-- input name no need to equal database field name but it is easy to handle -->
        <h1>Add New User <span><a href="users.php">
                    < Back to User list</a></span></h1>
        <?php
        if (!empty($errors)) {
            display_errors($errors);
        }
        ?>

        <form action="add-user.php" method="post" class="userform">
            <p>

                <label for="">First name : </label>
                <input type="text" name="first_name" <?php echo 'value = "' . $first_name .  '"'; ?>>
            </p>
            <p>
                <label for="">Last name : </label>
                <input type="text" name="last_name" <?php echo 'value = "' . $last_name .  '"'; ?>>
            </p>
            <p>
                <label for="">Email : </label>
                <input type="text" name="email_adress" <?php echo 'value = "' . $email_adress .  '"'; ?>>
            </p>
            <p>
                <label for="">New Password : </label>
                <input type="password" name="password">
            </p>
            <p>
                <label for="">&nbsp;</label>
                <button type="submit" name="submit">Save</button>
            </p>
        </form>


    </main>
</body>

</html>