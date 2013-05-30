<?php

require_once '../Model/DBConnection.php';
session_start();
$newConnect = new DBConnection();

$result = $newConnect->query("SELECT count(user) presente
    FROM users 
    WHERE user='{$_REQUEST["user"]}' AND
    password='" . md5($_REQUEST["password"]) . "'");

if ($result->fetch_object()->presente == 1) {
    $_SESSION["user"] = $_REQUEST["user"];
    $_SESSION["password"] = $_REQUEST["password"];
    echo 1;
}
else
    echo 0;
?>
