<?php
require_once('../inc/connection.php');
?>
<?php
$query = "SELECT id,first_name,last_name,email_adress FROM user";
$result_set  = mysqli_query($connection, $query);
if ($result_set) {
    //checking how many record return from query    
    echo mysqli_num_rows($result_set) . "<br>";
    //echo "Query succesful";

    //return record as a assosoative arry
    /*while ($record = mysqli_fetch_assoc($result_set)) {
        echo "<pre>";
        print_r($record);
        echo "</pre>";
    }
    echo "<hr>";*/


    //create table and insert data
    $table = "<table>";
    $table .= "<tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Email</th></tr> ";

    while ($record = mysqli_fetch_assoc($result_set)) {
        $table .= "<tr>";
        $table .= "<td>" . $record["id"] . "</td>";
        $table .= "<td>" . $record["first_name"] . "</td>";
        $table .= "<td>" . $record["last_name"] . "</td>";
        $table .= "<td>" . $record["email_adress"] . "</td>";
        $table .= "</tr>";
    }
    $table .= "</table>";
} else {
    echo "Query fail";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>select query</title>
    <style>
        table {
            border-collapse: collapse;
        }

        td,
        th {
            border: 3px solid black;
            padding: 10px;
        }
    </style>
</head>

<body>
    <?php
    echo $table;
    ?>

</body>

</html>

<?php
mysqli_close($connection);
?>