<?php

require_once './DBManagement.php';

$getting = new DBManagement();
echo $getting->loadVendorCertificateISO9($_REQUEST['id']);
?>
