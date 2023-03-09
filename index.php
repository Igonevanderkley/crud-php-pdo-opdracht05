<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>BASIC-FIT Utrecht</h1>

    <form action="create.php" method="post">

        <label for="homeclub">Kies je homeclub:</label>
        <select id="homeclub" name="homeclub">
            <option value="optie1">optie1</option>
            <option value="optie2">optie2</option>
            <option value="optie3">optie3</option>
            <option value="optie4">optie4</option>
        </select>

        <br><br>

        <p>Selecteer een lidmaatschap:</p>
        <input type="radio" id="Comfort" name="lidmaatschap" value="Comfort">
        <label for="Comfort">Comfort</label><br>
        <input type="radio" id="Premium" name="lidmaatschap" value="Premium">
        <label for="Premium">Premium</label><br>
        <input type="radio" id="All in" name="lidmaatschap" value="All in">
        <label for="All in">All in</label>

        <br><br>

        <p>Looptijd:</p>
        <input type="radio" id="Jaarlidmaatschap" name="looptijd" value="Jaarlidmaatschap">
        <label for="Jaarlidmaatschap">Jaarlidmaatschap</label><br>
        <input type="radio" id="Flex optie" name="looptijd" value="Flex optie">
        <label for="Flex optie">Flex optie</label><br>


        <br><br>

        <p>Selecteer je extra's:</p>
        <input type="checkbox" id="Yanga" name="extra" value="Yanga sportswater €2,50 per 4 weken">
        <label for="Yanga">Yanga sportswater €2,50 per 4 weken</label><br>
        <input type="checkbox" id="OnlineCoach" name="extra" value="Personal online coach €60,00 eenmalig">
        <label for="OnlineCoach">Personal online coach €60,00 eenmalig</label><br>
        <input type="checkbox" id="PersonalTrainingIntro" name="extra" value="Personal training intro €25,00 eenmalig">
        <label for="PersonalTrainingIntro">Personal training intro €25,00 eenmalig</label><br>

        <br><br>

        <label for="email">E-mail:</label><br>
        <input type="email" id="email" name="email">

        <br><br>

        <input type="hidden" name="verzendtijd" id="verzendtijd">



        <script>
            document.getElementById('verzendtijd').value = new Date().toLocaleString();
        </script>


        <input type="submit" value="Sla op">
        <input type="reset" value="Reset">

    </form>



</body>

</html>