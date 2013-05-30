<?php

require_once './DBManagement.php';


$newInsert = new DBManagement();
$response = $newInsert->writeOverview();
if ($response !== "1")
    echo $response;
?>
