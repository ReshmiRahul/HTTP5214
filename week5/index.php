<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $connect = mysqli_connect(
            'localhost',
            'root',
            '',
            'webdevelopment'
        );
        if(!$connect) {
            echo 'Error code: ' . mysqli_connect_errno();
            echo 'Error Message: ' . mysqli_connect_error();
        }
        $query = 'SELECT `Name`, `Hex` FROM colors';
        
        $results = mysqli_query($connect, $query);
        if(!$results) {
            echo 'Error Message: ' . mysqli_error($connect);
        } else echo 'The query found: ' . mysqli_num_rows($results);
        while ($row = mysqli_fetch_assoc($results)) {
            $name = $row['Name'];
            $hex = $row['Hex'];   
            echo "<div class='color-box' style='background-color: $hex;'>$name</div>";
        }
    ?>
</body>
</html>