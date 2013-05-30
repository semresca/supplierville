<?php

require_once './DBManagement.php';

$newOption = new DBManagement();
echo $newOption->addOption($_REQUEST["type"], $_REQUEST["option"]);
