<?php

require_once '../Model/Data.php';
require_once '../Model/Certificate.php';

/**
 * Classe per il controllo dei dati provenienti dal FORM di aggiunta venditore
 * @author Samuele Resca
 */
class AddVendorControl {

    public function certificateISOSelected() {

        $certificateDate = array();
        /**
         * Inizializza gli attributi di classe
         * @param String $file
         * @param String $type
         * @param Data $dataEmissione
         * @param Data $dataScadenza
         */
        if ($_REQUEST['evaluationType'] == "ND") {
            
        } else if ($_REQUEST['evaluationType'] == "9") {

            $newIssue = new Data($_REQUEST["day9o"], $_REQUEST["month9o"], $_REQUEST["year9o"]);
            $newClosed = new Data($_REQUEST["day9c"], $_REQUEST["month9c"], $_REQUEST["year9c"]);
            $certificateDate = new Certificate("", "ISO9001", $newIssue, $newClosed);
        } else if ($_REQUEST['evaluationType'] == "14") {

            $newIssue = new Data($_REQUEST["day14o"], $_REQUEST["month14o"], $_REQUEST["year14o"]);
            $newClosed = new Data($_REQUEST["day14c"], $_REQUEST["month14c"], $_REQUEST["year14c"]);
            $certificateDate = new Certificate("", "ISO14001", $newIssue, $newClosed);
        } else if ($_REQUEST['evaluationType'] == "914") {

            $newIssue = new Data($_REQUEST["day9o"], $_REQUEST["month9o"], $_REQUEST["year9o"]);
            $newClosed = new Data($_REQUEST["day9c"], $_REQUEST["month9c"], $_REQUEST["year9c"]);
            $certificateDate = new Certificate("", "ISO9001", $newIssue, $newClosed);

            $newIssue = new Data($_REQUEST["day14o"], $_REQUEST["month14o"], $_REQUEST["year14o"]);
            $newClosed = new Data($_REQUEST["day14c"], $_REQUEST["month14c"], $_REQUEST["year14c"]);
            $certificateDate = new Certificate("", "ISO14001", $newIssue, $newClosed);
        }

        return $certificateDate;
    }

    public function certificateVNC() {

        if ($_REQUEST["idNCR"] == "") {
            echo "error";
        }
    }

    public function getClass() {

        if ($_REQUEST["certificationClass"] == "-1") {

            return "-1";
        } else {
            return $_REQUEST["certificationClass"];
        }
    }

    public function getActivity() {

        if ($_REQUEST["activity"] == "-1") {

            return "-1";
        } else {
            return $_REQUEST["activity"];
        }
    }

    public function getState() {

        if ($_REQUEST["stateInformation"] == "-1") {

            return "-1";
        } else {
            return $_REQUEST["stateInformation"];
        }
    }

}

?>
