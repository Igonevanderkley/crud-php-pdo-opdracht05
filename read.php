<?php
require('config.php');

$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=UTF8";

try {
    $pdo = new PDO($dsn, $dbUser, $dbPass);

    if ($pdo) {
        echo "ja";
    } else {
        echo "nah";
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}

$sql = "SELECT * FROM Inschrijving";

$statement = $pdo->prepare($sql);
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_OBJ);

$rows = "";
foreach ($result as $info) {
    $rows .= "<tr>
                    <td>$info->Id</td>
                    <td>$info->Homeclub</td>
                    <td>$info->Lidmaatschap</td>
                    <td>$info->Looptijd</td>
                    <td>$info->Extra</td>
                    <td>$info->Email</td>
                    <td>$info->Verzendtijd</td>
                    <td>
                    <a href='delete.php?Id=$info->Id'>
                        <img src='img/b_drop.png' alt='kruis'>
                    </a>
                </td>
                <td>
                <a href='update.php?Id=$info->Id'>
                    <img src='img/b_edit.png' alt='potlood'>
                </a>
                    </td>
                    <tr>      
         ";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>basic-fit</title>
</head>

<body>
   <a href="index.php">
        <input type="button" value="Nieuw record">
    </a>
    <br>
    <br>
    <table border='1'>
        <thead>
            <th>Id</th>
            <th>Homeclub</th>
            <th>Lidmaatschap</th>
            <th>Looptijd</th>
            <th>Extra</th>
            <th>Email</th>
            <th>Verzendtijd</th>
            <th></th>
            <th></th>
            <t/head>
        <tbody>
            <?= $rows ?>
        </tbody>
    </table>
</body>

</html>
