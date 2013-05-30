<?php

require_once './DBManagement.php';

$newInsert = new DBManagement();
if (($response = $newInsert->writeNCR()) == "1") {
    echo $newInsert->loadNCR();
} else {
    echo $response;
}



                

//".$_REQUEST['idNCR'].",".$_REQUEST['issue'].",".$_REQUEST['close'].",".$_REQUEST['area'].",".$_REQUEST['object'].",".$_REQUEST['id']."