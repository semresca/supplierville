<?php

/**
 * Classe che si occupa della connessione al database, e della gestione delle query
 * 
 * @author Samuele Resca
 */
class DBConnection extends mysqli {

    /**
     * Costruttore di classe:
     * Si connette al database <b>Supplierville</b>
     */
    function __construct() {
        parent::__construct('localhost', 'root', '', 'Supplierville');
        if ($this->connect_error) {
            die("Connection FAILED!" . $this->connect_error);
        }
    }

    /**
     * Su occupa dele query, in caso di errore comunica all'utente il problema
     * @param String $query
     * @return Response Query Response
     */
    function query($query) {
        $response = parent::query($query);
        if ($this->error) {
            return $this->errno;
        }
        return $response;
    }

}

?>
