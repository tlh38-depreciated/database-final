<?php
include 'functions.php';

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

global $conn;
$sql = "INSERT INTO CHARACTER (Name, FactionID, ClassID, RaceID, ProfID, ZoneID) VALUES('$charName',$facSel,$classSel,$raceSel,$profSel,$zoneSel)";
unset($_POST);

#echo ("<script>console.log('$sql')</script>");

$stmt1 = sqlsrv_query($conn, $sql);
if ($stmt1 === false)
{
    echo "Error in execution of INSERT.\n";
    die(print_r(sqlsrv_errors(), true));
}
sqlsrv_close($conn);
#header('Location: index.php');
?>

<html>

<h1>Your character <?php global $name;
                    echo ($name); ?> has been created succesfully!</h1>
<a href="index.php">Back to Character Creation</a>

</html>