<?php
include 'config.php';

$charName = $raceSel = $classSel = $profSel = $facSel = $zoneSel = "";
$raceDescArr = [];

$connectionInfo = array("UID" => "tlh38", "pwd" => $connPassword, "Database" => "tlh38PTC", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:tlh38.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);

if (!$conn)
{
    echo '<script>alert("Connection failed to establish!")</script>';
    die(print_r(sqlsrv_errors(), true));
}

function getResult($sql) // grabs the connection to the database, checks if the $result has data and then sends that data back
{
    global $conn;
    $result = sqlsrv_query($conn, $sql);
    if ($result == FALSE)
        die(FormatErrors(sqlsrv_errors()));

    return $result;
}

#characterSearch arrays for easier data display

$searchRaceArr = [1 => 'Human', 'Orc', 'Elf', 'Snyr', 'Khaldium', 'Dark Elf', 'Troll', 'Demon', 'Torga', 'Ancient'];
$searchClassArr = [1 => 'Warrior', 'Hunter', 'Rogue', 'Trickster', 'Mage', 'Cleric', 'Bard', 'Warlock', 'Brute', 'Gambler'];
$searchProfArr = [1 => 'Herbalist', 'Hunter', 'Blacksmith', 'Farmer', 'Cook', 'Fisherman', 'Miner', 'Runewriter', 'Stablemaster', 'Trademaster'];
$searchFacArr = [1 => 'Alliance', 'Darkness', 'Thieves Guild', 'Ancient Accordance', 'Fishing Guild', 'Trapdoor', 'New Truth', 'Atlantis', 'Potion Makers Inc.', 'Tree Fellers'];
$searchZoneArr = [1 => 'Sanctuary', 'Krator', 'Sanctuary Sewers', 'Nokrian', 'Bouy', 'Frontline', 'Jakram', 'Laympr', 'Tripolar', 'Aquwa'];
