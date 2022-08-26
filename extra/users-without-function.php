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
$user_list = "";
$query = "SELECT * FROM user WHERE  is_deleted=0 ORDER BY first_name";
$users = mysqli_query($connection, $query);
if ($users) {
    while ($user = mysqli_fetch_assoc($users)) {
        $user_list .= "<tr>
        <td>{$user['first_name']}</td>
        <td>{$user['last_name']}</td>
        <td>{$user['email_adress']}</td>
        <td>{$user['last_login']}</td>
        <td><a href=\"modify-user.php?user_id={$user['id']}\">Edit</a></td>
        <td><a href=\"delete-user.php?user_id={$user['id']}\">Delete</a></td>
    </tr>";
    }
} else {
    echo "Database query fail";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
    <header>

        <div class="appname">User Management System</div>
        <div class="loggedin">Welcome <?php echo $_SESSION['first_name']; ?> ! <a href="logout.php">Log Out</a></div>
    </header>
    <main>
        <h1>Users <span><a href="add-user.php">+Add new</a></span></h1>
        <table class="masterlist">
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Last login</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <?php echo $user_list ?>
        </table>
    </main>
</body>

</html>