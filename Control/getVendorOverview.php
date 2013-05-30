<?php

require_once './DBManagement.php';

$getting = new DBManagement();
echo $getting->loadVendorOverview();
?>
