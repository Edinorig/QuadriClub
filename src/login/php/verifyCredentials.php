<?php
include_once("../../common/php/dbConnector.php");
$name = $_REQUEST['user'];
$pass = $_REQUEST['pass'];
$userSerch = "SELECT nome, cognome FROM tutenti WHERE user = '$name' AND pass = '$pass'";
$searchResult = mysqli_query($dbGdA, $userSerch) or die($userSerch);
if (mysqli_num_rows($searchResult) > 0) {
    $user = mysqli_fetch_array($searchResult);
    $_SESSION['loggedUser'] = $user['nome'] . " " . $user['cognome'];
    echo "true";
} else {
    unset($_SESSION['loggedUser']);
    echo "false";
}
