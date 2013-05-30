<?php

require_once './View/SearchVendor.php';
session_start();
if (isset($_SESSION["user"]) && isset($_SESSION["password"])) {
    
} else {

    header("Location: index.php");
}
$newPage = new SearchVendor();
$newPage->show();
?>
