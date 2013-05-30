<?php

require_once '../../Model/DBConnection.php';
$connessione = new DBConnection();
$table = $connessione->query("SELECT * FROM Stati");

if (!$table) {
    echo "Errore";
} else {
    $response = "<response>";
    $tmp = $table->fetch_object();
    while ($tmp != FALSE) {

        $response.="<data>";
        $response.="<id>" . $tmp->sta_id . "</id>" . "<option>" . $tmp->sta_description . "</option>";
        $response.="</data>";
        $tmp = $table->fetch_object();
    }

    $response.= "</response>";
    echo $response;
}
  