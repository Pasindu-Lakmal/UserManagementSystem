<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

    <form action="abc.php" method="post">
        <p>First name : <input type="text" name="fname" value=""></p>
        <p>Last name : <input type="text" name="lname" value=""></p>
        <input type="submit" name="submit" value="submit">
    </form>
    <?php




    function pre_r($result)
    {
        echo "<pre>";
        print_r($result);
        echo "</pre>";
    }


    ?>
</body>

</html>