<?php
include_once("../../common/php/dbConnector.php");
$user = $_REQUEST['user'];
$pass = $_REQUEST['pass'];
$userSerch = "SELECT id FROM tutenti WHERE user = '$user' AND pass = '$pass'";
$searchResult = mysqli_query($dbGdA, $userSerch) or die($userSerch);
if (mysqli_num_rows($searchResult) > 0) {
    $_SESSION['userId'] = mysqli_fetch_array($searchResult)['id'];
    echo "true";
} else {
    unset($_SESSION['userId']);
    echo "false";
}
