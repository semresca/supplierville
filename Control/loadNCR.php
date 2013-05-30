<?php

require_once './DBManagement.php';

$newConnect = new DBManagement();
echo $newConnect->loadNCR();

