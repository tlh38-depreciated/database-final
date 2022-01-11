<!DOCTYPE html>
<html lang="en">
<?php
include 'config.php';

$charName = $raceSel = $classSel = $profSel = $facSel = $zoneSel = "";

$connectionInfo = array("UID" => "tlh38", "pwd" => $connPassword, "Database" => "tlh38PTC", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:tlh38.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);

if (!$conn)
{
    echo '<script>alert("Connection failed to establish!")</script>';
    die(print_r(sqlsrv_errors(), true));
}

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $charName = test_input($_POST["characterName"]);
    $raceSel = $_POST["raceSelection"];
    $classSel = $_POST["classSelection"];
    $profSel = $_POST["professionSelection"];
    $facSel = $_POST["factionSelection"];
    $zoneSel = $_POST["startingZoneSelection"];
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function getResult($sql) // grabs the connection to the database, checks if the $result has data and then sends that data back
{
    global $conn;
    $result = sqlsrv_query($conn, $sql);
    if ($result == FALSE)
        die(FormatErrors(sqlsrv_errors()));

    return $result;
}

?>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Character Creation</title>
</head>

<body>
    <form style="width: 50%; float: left;" method="POST">


        <div class='form-group'>
            <label for='characterName'>Character Name</label>
            <input type='text' class='form-control' name='characterName' placeholder='Character Name' required>
        </div>

        <div class='form-group'>
            <label for='raceSelection'>Race</label>
            <select class='form-control' onchange='raceSelected()' name='raceSelection' id='raceSelection'>
                <?php
                $result = getResult("SELECT * FROM Race");
                while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC))
                {
                    echo ('<option value="' . $row['RaceID'] . '"> ' . $row['Name'] . ' </option>');
                }
                ?>
            </select>
        </div>

        <div class='form-group'>
            <label for='classSelection'>Class</label>
            <select class='form-control' onchange='classSelected()' name='classSelection' id='classSelection'>
                <?php
                $result = getResult("SELECT * FROM Class");
                while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC))
                {
                    echo ('<option value="' . $row['ClassID'] . '"> ' . $row['Name'] . ' </option>');
                }
                ?>
            </select>
        </div>

        <div class='form-group'>
            <label for='professionSelection'>Profession</label>
            <select class='form-control' onchange='' name='professionSelection'>
                <?php
                $result = getResult("SELECT * FROM Profession");
                while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC))
                {
                    echo ('<option value="' . $row['ProfID'] . '"> ' . $row['Name'] . ' </option>');
                }
                ?>
            </select>
        </div>

        <div class='form-group'>
            <label for='factionSelection'>Faction</label>
            <select class='form-control' onchange='' name='factionSelection'>
                <?php
                $result = getResult("SELECT * FROM Faction");
                while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC))
                {
                    echo ('<option value="' . $row['FactionID'] . '"> ' . $row['Name'] . ' </option>');
                }
                ?>
            </select>
        </div>

        <div class='form-group'>
            <label for='startingZoneSelection'>Starting Zone</label>
            <select class='form-control' onchange='' name='startingZoneSelection'>
                <?php
                $result = getResult("SELECT * FROM StartingZone");
                while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC))
                {
                    echo ('<option value="' . $row['ZoneID'] . '"> ' . $row['Name'] . ' </option>');
                }
                ?>
            </select>
        </div>

        <button type='submit' class='btn btn-primary'>Create Character</button>


    </form>
    <div style="margin-left: 50%; height: 600px;">
        <div id="images" style="display:flex;justify-content:center">
            <img src="images/races/human.png" alt="" id="raceImage">
            <img src="images/classes/battleaxe.png" alt="" id="classImage" style="position: absolute;">
        </div>
    </div>
</body>

</html>

<script>
    function raceSelected() {
        var selected = document.getElementById("raceSelection").value;
        var image = document.getElementById("raceImage");

        if (selected == 1) {
            image.src = "images/races/human.png";
            image.alt = "Human Race";
        } else if (selected == 2) {
            image.src = "images/races/orc.png";
            image.alt = "Orc Race";
        } else if (selected == 3) {
            image.src = "images/races/elf.png";
            image.alt = "Elf Race";
        } else if (selected == 4) {
            image.src = "images/races/snyr.png";
            image.alt = "Snyr Race";
        } else if (selected == 5) {
            image.src = "images/races/khaldium.png";
            image.alt = "Khaldium Race";
        } else if (selected == 6) {
            image.src = "images/races/darkelf.png";
            image.alt = "Dark Elf Race";
        } else if (selected == 7) {
            image.src = "images/races/troll.png";
            image.alt = "Troll Race";
        } else if (selected == 8) {
            image.src = "images/races/demon.png";
            image.alt = "Demon Race";
        } else if (selected == 9) {
            image.src = "images/races/torga.png";
            image.alt = "Torga Race";
        } else if (selected == 10) {
            image.src = "images/races/ancient.png";
            image.alt = "Ancient Race";
        }
    }

    function classSelected() {
        var selected = document.getElementById("classSelection").value;
        var image = document.getElementById("classImage");

        if (selected == 1) {
            image.src = "images/classes/battleaxe.png";
            image.alt = "Warrior Class";
        } else if (selected == 2) {
            image.src = "images/classes/bow.png";
            image.alt = "Hunter Class";
        } else if (selected == 3) {
            image.src = "images/classes/daggers.png";
            image.alt = "Rogue Class";
        } else if (selected == 4) {
            image.src = "images/classes/wand.png";
            image.alt = "Trickster Class";
        } else if (selected == 5) {
            image.src = "images/classes/wand.png";
            image.alt = "Mage Class";
        } else if (selected == 6) {
            image.src = "images/classes/bookoflight.png";
            image.alt = "Cleric Class";
        } else if (selected == 7) {
            image.src = "images/classes/flute.png";
            image.alt = "Bard Class";
        } else if (selected == 8) {
            image.src = "images/classes/wand.png";
            image.alt = "Warlock Class";
        } else if (selected == 9) {
            image.src = "images/classes/shield.png";
            image.alt = "Brute Class";
        } else if (selected == 10) {
            image.src = "images/classes/dice.png";
            image.alt = "Gambler Class";
        }
    }
</script>