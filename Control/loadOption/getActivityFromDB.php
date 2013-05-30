<?php

require_once '../../Model/DBConnection.php';

$connessione = new DBConnection();
$table = $connessione->query("SELECT * FROM Attivita");

if (!$table) {
    echo "Errore";
} else {

    $response = "<response>";
    $tmp = $table->fetch_object();
    while ($tmp != FALSE) {

        $response.="<data>";
        $response.="<id>" . $tmp->act_id . "</id>" . "<option>" . $tmp->act_description . "</option>";
        $response.="</data>";
        $tmp = $table->fetch_object();
    }

    $response.= "</response>";
    echo $response;
}
  