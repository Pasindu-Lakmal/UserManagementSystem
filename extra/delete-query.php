<?php
require_once('inc/connection.php');
?>

<!-- update query -->

<?php
/*DELETE table_name
WHERE column_name =value
LIMIT 1*/

$query = "DELETE FROM user WHERE id=10";
$result_set = mysqli_query($connection, $query);
if ($result_set) {
    echo mysqli_affected_rows($connection) . " rows deleted";
} else {
    echo "query fail";
}
?>







<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete query</title>
</head>

<body>

</body>

</html>


<?php
mysqli_close($connection);
?>