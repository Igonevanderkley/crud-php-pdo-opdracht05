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

} catch(PDOException $e) {
    echo $e->getMessage();
}

/**
 * We gaan een insert-query maken voor het wegschrijven van de formuliergegevens
 */
$sql = "INSERT INTO Inschrijving (Id
                            ,Homeclub
                            ,Lidmaatschap
                            ,Looptijd
                            ,Extra
                            ,Email
                            ,Verzendtijd)
        VALUES              (NULL
                            ,:homeclub
                            ,:lidmaatschap
                            ,:looptijd
                            ,:extra
                            ,:email
                            ,:verzendtijd);";

$statement = $pdo->prepare($sql);

$statement->bindValue(':homeclub', $_POST['homeclub'], PDO::PARAM_STR);
$statement->bindValue(':lidmaatschap', $_POST['lidmaatschap'], PDO::PARAM_STR);
$statement->bindValue(':looptijd', $_POST['looptijd'], PDO::PARAM_STR);
$statement->bindValue(':extra', $_POST['extra'], PDO::PARAM_STR);
$statement->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
$statement->bindValue(':verzendtijd', $_POST['verzendtijd'], PDO::PARAM_STR);

$result = $statement->execute();

if ($result) {
    echo "Er is een nieuw record gemaakt in de database.";
    header('Refresh:2; url=read.php');
} else {
    echo "Er is geen nieuw record gemaakt.";
    header('Refresh:2; url=read.php');
}
 