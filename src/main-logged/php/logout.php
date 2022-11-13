<?php
include_once("../../common/php/dbConnector.php");
unset($_SESSION["loggedUser"]);
unset($_SESSION["userId"]);
session_destroy();
