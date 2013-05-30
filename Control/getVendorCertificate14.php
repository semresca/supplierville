<?php

require_once './DBManagement.php';

$getting = new DBManagement();
echo $getting->loadVendorCertificateISO14($_REQUEST['id']);
?>
