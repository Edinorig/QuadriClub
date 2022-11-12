<?php
include_once("../../common/php/dbConnector.php");
$item = $_REQUEST['item'];
$user = $_REQUEST["user"];
$insertQuery = "INSERT INTO tprenotazioni(idOpera, idUtente, dataPren) VALUES (" . $item . ", " . $user . ", '" . date("Y-m-d H:i:d.u") . "')";
$updateQuery = "UPDATE topere SET prenotato = 's' WHERE id = '" . $item . "'";
mysqli_query($dbGdA, $insertQuery) or die($insertQuery);
mysqli_query($dbGdA, $updateQuery) or die($updateQuery);
echo "inserito";
