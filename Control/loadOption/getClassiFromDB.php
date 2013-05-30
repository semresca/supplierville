<?php

require_once '../../Model/DBConnection.php';
$connessione = new DBConnection();
$table = $connessione->query("SELECT * FROM Classi");

if (!$table) {
    echo "Errore";
} else {
    $response = "<response>";
    $tmp = $table->fetch_object();
    while ($tmp != FALSE) {

        $response.="<data>";
        $response.="<id>" . $tmp->class_id . "</id>" . "<option>" . $tmp->class_description . "</option>";
        $response.="</data>";
        $tmp = $table->fetch_object();
    }

    $response.= "</response>";
    echo $response;
}
  