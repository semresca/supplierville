<?php

require_once './Search.php';

$newSearch = new Search();

if ($_REQUEST["type"] == "name") {
    echo $newSearch->searchSupplierByName($_REQUEST["key"], $_REQUEST["page"]);
} else if ($_REQUEST["type"] == "code") {

    echo $newSearch->searchSupplierByCode($_REQUEST["key"], $_REQUEST["page"]);
} else if ($_REQUEST["type"] == "activity") {

    echo $newSearch->searchSupplierByActivity($_REQUEST["key"], $_REQUEST["page"]);
} else if ($_REQUEST["type"] == "class") {

    echo $newSearch->searchSupplierByClass($_REQUEST["key"], $_REQUEST["page"]);
} else if ($_REQUEST["type"] == "state") {

    echo $newSearch->searchSupplierByState($_REQUEST["key"], $_REQUEST["page"]);
}
?>
