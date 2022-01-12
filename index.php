<!DOCTYPE html>
<html lang="en">
<?php
include 'functions.php';

?>
<script>
    var raceDesc = [],
        classDesc = [],
        profDesc = [],
        facDesc = [],
        zoneDesc = [];
</script>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="script.js"></script>
    <link href="style.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Character Creation</title>
</head>

<body onload="setDescriptions()">
    <div class="container">
        <div>
            <form action="createChar.php" method="POST">


                <div class='form-group'>
                    <label for='characterName'>Character Name</label>
                    <input type='text' class='form-control' name='characterName' placeholder='Character Name' required onchange="nameChange()" id='characterName' />
                </div>

                <div class='form-group'>
                    <label for='raceSelection'>Race</label>
                    <select class='form-control' onchange='raceSelected()' name='raceSelection' id='raceSelection'>
                        <?php
                        $result = getResult("selectAllRace");
                        $x = 0;
                        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC))
                        {

                            echo ('<option value="' . $row['RaceID'] . '"> ' . $row['Name'] . ' </option>');
                            echo ('<script>raceDesc[' . $x . ']="' . str_replace("\"", "\'", $row["Description"])  . '"</script>'); // str_replace fixes issues with strings that have parentheses
                            $x++;
                        }
                        ?>
                    </select>
                </div>

                <div class='form-group'>
                    <label for='classSelection'>Class</label>
                    <select class='form-control' onchange='classSelected()' name='classSelection' id='classSelection'>
                        <?php
                        $result = getResult("selectAllClass");
                        $x = 0;
                        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC))
                        {
                            echo ('<option value="' . $row['ClassID'] . '"> ' . $row['Name'] . ' </option>');
                            echo ('<script>classDesc[' . $x . ']="' . str_replace("\"", "\'", $row["Description"])  . '"</script>'); // str_replace fixes issues with strings that have parentheses
                            $x++;
                        }
                        ?>
                    </select>
                </div>

                <div class='form-group'>
                    <label for='professionSelection'>Profession</label>
                    <select class='form-control' onchange='professionSelected()' name='professionSelection' id='professionSelection'>
                        <?php
                        $result = getResult("selectAllProfession");
                        $x = 0;
                        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC))
                        {
                            echo ('<option value="' . $row['ProfID'] . '"> ' . $row['Name'] . ' </option>');
                            echo ('<script>profDesc[' . $x . ']="' . str_replace("\"", "\'", $row["Description"])  . '"</script>'); // str_replace fixes issues with strings that have parentheses
                            $x++;
                        }
                        ?>
                    </select>
                </div>

                <div class='form-group'>
                    <label for='factionSelection'>Faction</label>
                    <select class='form-control' onchange='factionSelected()' name='factionSelection' id='factionSelection'>
                        <?php
                        $result = getResult("selectAllFaction");
                        $x = 0;
                        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC))
                        {
                            echo ('<option value="' . $row['FactionID'] . '"> ' . $row['Name'] . ' </option>');
                            echo ('<script>facDesc[' . $x . ']="' . str_replace("\"", "\'", $row["Description"])  . '"</script>'); // str_replace fixes issues with strings that have parentheses
                            $x++;
                        }
                        ?>
                    </select>
                </div>

                <div class='form-group'>
                    <label for='startingZoneSelection'>Starting Zone</label>
                    <select class='form-control' onchange='zoneSelected()' name='startingZoneSelection' id='startingZoneSelection'>
                        <?php
                        $result = getResult("selectAllZone");
                        $x = 0;
                        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC))
                        {
                            echo ('<option value="' . $row['ZoneID'] . '"> ' . $row['Name'] . ' </option>');
                            echo ('<script>zoneDesc[' . $x . ']="' . str_replace("\"", "\'", $row["Description"])  . '"</script>'); // str_replace fixes issues with strings that have parentheses
                            $x++;
                        }
                        ?>
                    </select>
                </div>


                <button type='submit' class='btn btn-primary' style="margin-top: 1em;">Create Character</button>
            </form>
            <button onclick="window.location='searchChar.php'" class='btn btn-primary' style="margin-top: 1em;">Search Character</button>
        </div>
        <div id="characterView">
            <div id="images">
                <h1 id="charImgName"></h1>
                <img src="images/races/human.png" alt="" id="raceImage">
                <img src="images/classes/battleaxe.png" alt="" id="classImage">
            </div>
        </div>
        <div id="characterInformation">
            <div class="infoBox">
                <div class="infoBox-title">
                    <p>Race</p>
                </div>
                <div class="infoBox-paragraph">
                    <p id="infoBox-race">

                    </p>

                </div>
            </div>
            <div class="infoBox">
                <div class="infoBox-title">
                    <p>Class</p>
                </div>
                <div class="infoBox-paragraph">
                    <p id="infoBox-class"></p>
                </div>
            </div>
            <div class="infoBox">
                <div class="infoBox-title">
                    <p>Profession</p>
                </div>
                <div class="infoBox-paragraph">
                    <p id="infoBox-profession"></p>
                </div>
            </div>
            <div class="infoBox">
                <div class="infoBox-title">
                    <p>Faction</p>
                </div>
                <div class="infoBox-paragraph">
                    <p id="infoBox-faction"></p>
                </div>
            </div>
            <div class="infoBox">
                <div class="infoBox-title">
                    <p>Starting Zone</p>
                </div>
                <div class="infoBox-paragraph">
                    <p id="infoBox-zone"></p>
                </div>

            </div>
        </div>
    </div>
</body>

</html>