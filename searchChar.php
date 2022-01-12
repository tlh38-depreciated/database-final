<?php
include 'functions.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="script.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div id="searchArea">
            <form action="searchChar.php" method="POST">
                <label for='characterName'>Character Name</label>
                <input type='text' class='form-control' name='characterName' placeholder='Character Name' required />
                <button type='submit' class='btn btn-primary' style="margin-top: 1em;">Search Character</button>
            </form>
            <button onclick="window.location='index.php'" class='btn btn-primary' style="margin-top: 1em;">Create Character</button>
        </div>
        <div id="charList">
            <ol>
                <?php
                #echo ("<script>console.log('" . $_POST['characterName'] . "')</script>");
                if (isset($_POST['characterName']))
                {
                    global $searchRaceArr;
                    global $searchClassArr;
                    $result = getResult("SELECT * FROM searchCharacter('" . $_POST['characterName'] . "')");

                    while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC))
                    {
                        echo ('<li> <span>Name: </span>' . $row['Name'] . ', <span>Race: </span>' . $searchRaceArr[$row['RaceID']] . ', <span>Class: </span>' . $searchClassArr[$row['ClassID']] . ', <span>Profession: </span>' . $searchProfArr[$row['ProfID']] . ', <span>Faction: </span>' . $searchFacArr[$row['FactionID']] . ', <span>Starting Zone: </span>' . $searchZoneArr[$row['ZoneID']] . '</li>');
                    }
                }

                ?>
            </ol>
        </div>
    </div>
</body>

</html>

<style>
    .container {
        display: grid;
        grid-template-columns: 1fr fit-content(1fr);
        margin-left: auto;
        margin-right: auto;
    }

    #searchArea {
        grid-column-start: 1;
    }

    #charList {
        grid-column-start: 2;
    }

    li span {
        font-weight: 700;
    }
</style>