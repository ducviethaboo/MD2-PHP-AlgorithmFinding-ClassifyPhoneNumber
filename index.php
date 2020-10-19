<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form method="post">
    <textarea name="phonenumber"></textarea>
    <input type="submit" value="Filter">
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $phonenumber = $_REQUEST['phonenumber'];
    $viettel = [];
    $mobi = [];
    $vina = [];
    $viet = ['086', '096', '097', '098', '032', '033', '034', '035', '036', '037', '038', '039'];
    $vin = ['084', '085', '081', '082'];
    $mob = ['090', '093', '089'];
    $textArea = explode(',', $phonenumber);

    for ($i = 0; $i < count($textArea); $i++) {
        $result = substr($textArea[$i], 0, 3);
        if (in_array($result, $viet)) {
            array_push($viettel, $textArea[$i]);
        } elseif (in_array($result, $vin)) {
            array_push($mobi, $textArea[$i]);
        } elseif (in_array($result, $mob)) {
            array_push($vina, $textArea[$i]);
        }
    }

    echo "Viettel :";
    echo "<br>";
    foreach ($viettel as $value) {
        echo $value . ' ';
    }
    echo "<br>";
    echo "Mobiphone";
    echo "<br>";
    foreach ($mobi as $value) {
        echo $value . ' ';
    }
    echo "<br>";
    echo "Vinaphone";
    echo "<br>";
    foreach ($vina as $value) {
        echo $value . ' ';
    }


}
?>
</body>
</html>