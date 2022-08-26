<?php
require_once('inc/connection.php');
?>

<!-- update query -->

<?php
/*UPDATE table_name
SET column1 =value1,column2 =value1
WHERE column_name =value
LIMIT 1*/

$query = "UPDATE user SET first_name='jayantha' WHERE id=4";
$result_set = mysqli_query($connection, $query);
if ($result_set) {
    echo mysqli_affected_rows($connection) . " rows update completed";
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
    <title>Upadte query</title>
</head>

<body>

</body>

</html>


<?php
mysqli_close($connection);
?>