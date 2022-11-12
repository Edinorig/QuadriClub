<?php
include_once("../../common/php/dbConnector.php");
$item = $_REQUEST['item'];
$user = $_REQUEST["user"];
$insertQuery = "INSERT INTO tprenotazioni(idOpera, idUtente, dataPren) VALUES (" . $item . ", " . $user . ", '" . date("Y-m-d H:i:d.u") . "')";
mysqli_query($dbGdA, $insertQuery) or die($insertQuery);
echo "inserito";
