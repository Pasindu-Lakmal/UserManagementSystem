<?php
require_once('../inc/connection.php');
?>
<?php
/*Insert query
INSERT INTO table_name(
    column1,cloumn2,cloumn3,etc
    )VALUES(
     value1,value2,value3,etc
    )*/
// $first_name = "pasindu";
// $last_name = "lakmal";
// $email_adress = "pasindulakmal@gmail.com";
// $password = "pasindu";
// $is_deleted = 0;
$first_name = "hasindu";
$last_name = "lakmal";
$email_adress = "hasindulakmal@gmail.com";
$password = "hasindu";
$is_deleted = 0;

$hashed_password = sha1($password);
//echo "Hashed password : {$hashed_password} <br>";


$query = "INSERT INTO user(first_name,last_name,email_adress,password,is_deleted)
    VALUES('{$first_name}','{$last_name}','{$email_adress}','{$hashed_password}',{$is_deleted})";

$result = mysqli_query($connection, $query);
if ($result) {
    echo "1 Record added";
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
    <title>Insert query</title>
</head>

<body>

</body>

</html>

<?php
mysqli_close($connection);
?>