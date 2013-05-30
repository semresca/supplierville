<?php

require_once './DBManagement.php';

$newInsert = new DBManagement();
$newInsert->updateNCR();
echo $newInsert->loadNCR();




//".$_REQUEST['idNCR'].",".$_REQUEST['issue'].",".$_REQUEST['close'].",".$_REQUEST['area'].",".$_REQUEST['object'].",".$_REQUEST['id']."