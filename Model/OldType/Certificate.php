<?php

/**
 * Descrive un certificato ISO riferito al fornitore, il certificato
 * è memorizzato all'interno di un file pdf, ogni certificato può essere di due
 * tipi
 * <ul>
 * <li>ISO 9001</li>
 * <li>ISO 14001</li>
 * </ul>
 * @author Samuele Resca
 * @access public
 */
class Certificate {

    /**
     * Si riferisce al file contenente il certificato
     * @var String
     */
    private $file;

    /**
     * Contiene il tipo di certificato
     * @var String 
     */
    private $type;

    /**
     * Contiene la data di emissione
     * @var Data 
     */
    private $dataEmissione;

    /**
     * Contiene la datandi scadenza
     * @var Data 
     */
    private $dataScadenza;

    /**
     * Inizializza gli attributi di classe
     * @param String $file
     * @param String $type
     * @param Data $dataEmissione
     * @param Data $dataScadenza
     */
    function __construct($file, $type, $dataEmissione, $dataScadenza) {
        $this->file = $file;
        $this->type = $type;
        $this->dataEmissione = $dataEmissione;
        $this->dataScadenza = $dataScadenza;
    }

    public function getDataEmissione() {
        return $this->dataEmissione;
    }

    public function setDataEmissione(Data $dataEmissione) {
        $this->dataEmissione = $dataEmissione;
    }

    public function getDataScadenza() {
        return $this->dataScadenza;
    }

    public function setDataScadenza(Data $dataScadenza) {
        $this->dataScadenza = $dataScadenza;
    }

    public function getFile() {
        return $this->file;
    }

    public function setFile($file) {
        $this->file = $file;
    }

    public function getType() {
        return $this->type;
    }

    public function setType($type) {
        $this->type = $type;
    }

}

?>
