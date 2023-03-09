<?php

require 'config.php';

$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=UTF8";

try {
    $pdo = new PDO($dsn, $dbUser, $dbPass);

    if ($pdo) {
        // echo "Jeeejjj!!";
    } else {
        echo "Neeeeee!!";
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    var_dump($_POST);

    try {
        $sql = "UPDATE Inschrijving SET 
                Homeclub = :homeclub,
                Lidmaatschap = :lidmaatschap,
                Looptijd = :looptijd,
                Extra = :extra,
                Email = :email,
                verzendtijd = :verzendtijd
            WHERE Id = :id";

        $statement = $pdo->prepare($sql);
        $statement->bindValue(':homeclub', $_POST['homeclub'], PDO::PARAM_STR);
        $statement->bindvalue(':lidmaatschap', $_POST['lidmaatschap'], PDO::PARAM_STR);
        $statement->bindValue(':looptijd', $_POST['looptijd'], PDO::PARAM_STR);
        $statement->bindValue(':extra', $_POST['extra'], PDO::PARAM_STR);
        $statement->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
        $statement->bindValue(':verzendtijd', $_POST['verzendtijd'], PDO::PARAM_STR);

        $statement->bindValue(':id', $_POST['id'], PDO::PARAM_INT);
        $statement->execute();

        echo 'update voltooid';
        header('Refresh:3; url=read.php');
    } catch (PDOException $e) {
        echo 'Update niet voltooid';
        header('Refresh:50; url=read.php');
        echo $e->getMessage();
    }

    exit();
}

$sql = "SELECT Id,
             Homeclub, 
             Lidmaatschap, 
             Looptijd, 
             Extra, 
             Email,  
             Verzendtijd
 FROM Inschrijving WHERE Id = :Id";

$statement = $pdo->prepare($sql);
$statement->bindValue(':Id', $_GET['Id'], PDO::PARAM_INT);
$statement->execute();

$result = $statement->fetch(PDO::FETCH_OBJ);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>PHP PDO CRUD</h1>

    <form action="update.php" method="post">

        <label for="homeclub">Kies je homeclub:</label>
        <select id="homeclub" name="homeclub">
            <option value="<?= $result->Homeclub; ?>">optie1</option>
            <option value="<?= $result->Homeclub; ?>">optie2</option>
            <option value="<?= $result->Homeclub; ?>">optie3</option>
            <option value="<?= $result->Homeclub; ?>">optie4</option>
        </select>


        <br><br>


        <p>Selecteer een lidmaatschap:</p>
        <input type="radio" id="Comfort" name="lidmaatschap" value="<?= $result->Lidmaatschap; ?>">
        <label for="Comfort">Comfort</label><br>
        <input type="radio" id="Premium" name="lidmaatschap" value="<?= $result->Lidmaatschap; ?>">
        <label for="Premium">Premium</label><br>
        <input type="radio" id="All in" name="lidmaatschap" value="<?= $result->Lidmaatschap; ?>">
        <label for="All in">All in</label>

        <br><br>

        <p>Looptijd:</p>
        <input type="radio" id="Jaarlidmaatschap" name="looptijd" value="<?= $result->Looptijd; ?>">
        <label for="Jaarlidmaatschap">Jaarlidmaatschap</label><br>
        <input type="radio" id="Flex optie" name="looptijd" value="<?= $result->Looptijd; ?>">
        <label for="Flex optie">Flex optie</label><br>


        <br><br>

        <p>Selecteer je extra's:</p>
        <input type="checkbox" id="Yanga" name="extra" value="<?= $result->Extra; ?>">
        <label for="Yanga">Yanga sportswater €2,50 per 4 weken</label><br>
        <input type="checkbox" id="OnlineCoach" name="extra" value="<?= $result->Extra; ?>">
        <label for="OnlineCoach">Personal online coach €60,00 eenmalig</label><br>
        <input type="checkbox" id="PersonalTrainingIntro" name="extra" value="<?= $result->Extra; ?>">
        <label for="PersonalTrainingIntro">Personal training intro €25,00 eenmalig</label><br>

        <br><br>

        <label for="email">E-mail:</label><br>
        <input type="email" id="email" name="email" value="<?= $result->Email; ?>">

        <br><br>

        <input type="hidden" name="verzendtijd" id="verzendtijd">

        <script>
            document.getElementById('verzendtijd').value = new Date().toLocaleString();
        </script>


        <input type="submit" value="Sla op">
        <input type="reset" value="Reset">

        <input type="hidden" name="id" value="<?= $result->Id; ?>">
        
        <br>


    </form>
    

    <a href="read.php">read</a>



</body>
</html>