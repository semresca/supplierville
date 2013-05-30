<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require_once '../Model/DBConnection.php';

/**
 * Description of Warnings
 *
 * @author samueleresca
 */
class Warnings {

    /**
     *
     * @var DBConnection 
     */
    private $myConnection;

    function __construct() {
        $this->myConnection = new DBConnection();
    }

    function getIso9Expired() {
        $expired = "";

        $result = $this->myConnection->query('SELECT `sup_code`,`sup_name`,`iso9_close` FROM  `Supplier` 
          JOIN  `CertificateISO9` USING (  `sup_code` ) 
          
           WHERE  `iso9_close` < CURDATE( ) AND `iso9_close`<> "0000-00-00"');

        while (($tmp = $result->fetch_object()) != FALSE) {
            $expired.=$this->expiredToXML($tmp->sup_name, $tmp->sup_code, $tmp->iso9_close);
        }

        return $expired;
    }

    function getIso14Expired() {
        $expired = "";

        $result = $this->myConnection->query('SELECT `sup_code`,`sup_name`,`iso14_close` FROM  `Supplier` 
          JOIN  `CertificateISO14` USING (  `sup_code` ) 
           WHERE  `iso14_close` < CURDATE( ) AND `iso14_close`<> "0000-00-00"');

        while (($tmp = $result->fetch_object()) != FALSE) {
            //return $tmp->sup_name;
            $expired.=$this->expiredToXML($tmp->sup_name, $tmp->sup_code, $tmp->iso14_close);
        }

        return $expired;
    }

    function expiredToXML($sup_name, $sup_code, $iso_close) {
        return $expired = "<expired><sup_name>" . $sup_name . "</sup_name>" .
                "<sup_code>" . $sup_code . "</sup_code>" . "<iso_close>" . $iso_close . "</iso_close>" . "</expired>";
        return $expired;
    }

}

?>
