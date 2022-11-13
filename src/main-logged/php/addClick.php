
<?php
include_once("../../common/php/dbConnector.php");

if (isset($_REQUEST['id']) && isset($_REQUEST['val'])) {
    $clickQuery = "UPDATE topere SET click = " . $_REQUEST['val'] . " WHERE id = " . $_REQUEST['id'] . ";";
    mysqli_query($dbGdA, $clickQuery) or die($clickQuery);
    echo "Success, added 1 click to " . $_REQUEST['id'];
} else {
    echo "Missing data";
}
