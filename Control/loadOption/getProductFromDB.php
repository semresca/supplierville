<?php

require_once '../../Model/DBConnection.php';
$connessione = new DBConnection();
$result = $connessione->query("SELECT count(pro_id) total
            FROM Prodotti");
$obj = $result->fetch_object();
$total = $obj->total;
$pages = ceil($total / 100);
$j = 0;
$i = 0;
$response = "<response>";
//header("Content-Type:text/xml");
while ($i <= $pages) {
    $limit = 50;
    $table = $connessione->query("SELECT * FROM Prodotti LIMIT " . $j . "," . $limit); //LIMIT 0 , 30 
    //altro while

    while (($tmp = $table->fetch_object()) != FALSE) {
        $response.="<data>";
        $response.="<id>" . $tmp->pro_id . "</id>" . "<option>" . $tmp->pro_description . "</option>";
        $response.="</data>";
    }
    $j+=$limit;
    $i++;
}

$response.= "</response>";
echo $response;


