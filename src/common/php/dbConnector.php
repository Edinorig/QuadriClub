<?php
session_start();

$_SESSION['address'] = "127.0.0.1:8889";


$_SESSION['user'] = "root";


$_SESSION['pwd'] = "root";


$_SESSION['db'] = "galleria5e";


$dbGdA = mysqli_connect($_SESSION['address'], $_SESSION['user'], $_SESSION['pwd'], $_SESSION['db']) or die("Error 418: I'm a teapot!");
