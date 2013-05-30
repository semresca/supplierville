<?php

require_once './DBManagement.php';

$newInsert = new DBManagement();
$newInsert->modifyOverview();

echo " <script language=\"Javascript\">
 window.close();
</script>";
?>
