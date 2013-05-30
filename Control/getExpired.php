<?php

require_once '../Model/Warnings.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$newWarnings = new Warnings();
$listExpired = "";
if ($_REQUEST['type'] == "9")
    $listExpired = $newWarnings->getIso9Expired();
if ($_REQUEST['type'] == "14")
    $listExpired = $newWarnings->getIso14Expired();

echo "<response>" . $listExpired . "</response>";
?>
