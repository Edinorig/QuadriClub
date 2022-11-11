<?php
include_once("../../common/php/dbConnector.php");
unset($_SESSION["loggedUser"]);
session_destroy();
