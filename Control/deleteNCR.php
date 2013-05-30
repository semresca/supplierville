<?php

require_once './DBManagement.php';

$newConnect = new DBManagement();
$newConnect->deleteNCR();

echo $newConnect->loadNCR();
?>
