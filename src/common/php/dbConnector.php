<?php
session_start();
if (!isset($_SESSION['address'])) {
    $_SESSION['address'] = "127.0.0.1";
}
if (!isset($_SESSION['user'])) {
    $_SESSION['user'] = "root";
}
if (!isset($_SESSION['pwd'])) {
    $_SESSION['pwd'] = "";
}
if (!isset($_SESSION['db'])) {
    $_SESSION['db'] = "galleria5e";
}

$dbGdA = mysqli_connect($_SESSION['address'], $_SESSION['user'], $_SESSION['pwd'], $_SESSION['db']) or die("Error 418: I'm a teapot!");
