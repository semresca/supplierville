<?php

require_once 'View/DashBoard.php';
session_start();
//echo count($_SESSION);    
$newPage = new DashBoard();
$newPage->show();

?>
