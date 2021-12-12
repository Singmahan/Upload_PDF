<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Display PDF</title>
</head>

<body>
    <?php

    include 'db.php';

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM pdf WHERE id = $id";
        $query = mysqli_query($con, $sql);
        while ($info = mysqli_fetch_array($query)) {
    ?>

            <embed type="application/pdf" src="PDF/<?php echo $info['pdf_file']; ?>" frameBorder="0" width="1600px" height="2100px" />
    <?php
        }
    }

    ?>
</body>

</html>