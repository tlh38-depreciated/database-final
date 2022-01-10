<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    include 'config.php';
    $connectionInfo = array("UID" => "tlh38", "pwd" => $connPassword, "Database" => "tlh38PTC", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
    $serverName = "tcp:tlh38.database.windows.net,1433";
    $conn = sqlsrv_connect($serverName, $connectionInfo);

    if (!$conn)
    {
        echo '<script>alert("Connection failed to establish!")</script>';
        die(print_r(sqlsrv_errors(), true));
    }

    $sql = "SELECT * FROM CUSTOMER";
    $result = sqlsrv_query($conn, $sql);
    if ($result == FALSE)
        die(FormatErrors(sqlsrv_errors()));

    echo ("<select>");
    while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC))
    {
        echo ('<option value="' . $row['CUSTID'] . '"> ' . $row['FNAME'] . ' </option>');
    }
    echo ("</select>");
    ?>

</body>

</html>