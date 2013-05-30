<?php

require_once 'Data.php';

/**
 * Descrive un verbale di non conformità, ovvero il verbale che viene prodotto
 * nel caso il fornitore abbia spedito del materiale fallato o difettoso
 * @author Samuele  Resca
 * @access public
 */
class VNC {

    /**
     * Cotiene l'id del VNC
     * @var String
     */
    private $idVNC;

    /**
     * Oggetto del verbale
     * @var String 
     */
    private $oggettoVerbale;

    /**
     * Nome del fornitore soggetto al verbale
     * @var String 
     */
    private $nomeFornitore;

    /**
     * Settore aziendale alla quale è riferito
     * @var string
     */
    private $settore;

    /**
     * Codice fornitore alla quale è rifertito
     * @var String 
     */
    private $codiceFornitore;

    /**
     * Data di scrittura del verbale
     * @var Data
     */
    private $dataApertura;

    /**
     * Data di chiusura verbale
     * @var Data 
     */
    private $dataChiusura;

    /**
     * 
     * @param string $idVNC
     * @param string $oggettoVerbale
     * @param string $nomeFornitore
     * @param string $settore
     * @param string $codiceFornitore
     * @param Data   $dataApertura
     * @param Data   $dataChiusura
     */
    function __construct($idVNC, $oggettoVerbale, $nomeFornitore, $settore, $codiceFornitore, $dataApertura, $dataChiusura) {
        $this->idVNC = $idVNC;
        $this->oggettoVerbale = $oggettoVerbale;
        $this->nomeFornitore = $nomeFornitore;
        $this->settore = $settore;
        $this->codiceFornitore = $codiceFornitore;
        $this->dataApertura = $dataApertura;
        $this->dataChiusura = $dataChiusura;
    }

    public function getIdVNC() {
        return $this->idVNC;
    }

    public function setIdVNC($idVNC) {
        $this->idVNC = $idVNC;
    }

    public function getOggettoVerbale() {
        return $this->oggettoVerbale;
    }

    public function setOggettoVerbale($oggettoVerbale) {
        $this->oggettoVerbale = $oggettoVerbale;
    }

    public function getNomeFornitore() {
        return $this->nomeFornitore;
    }

    public function setNomeFornitore($nomeFornitore) {
        $this->nomeFornitore = $nomeFornitore;
    }

    public function getSettore() {
        return $this->settore;
    }

    public function setSettore($settore) {
        $this->settore = $settore;
    }

    public function getCodiceFornitore() {
        return $this->codiceFornitore;
    }

    public function setCodiceFornitore($codiceFornitore) {
        $this->codiceFornitore = $codiceFornitore;
    }

    public function getDataApertura() {
        return $this->dataApertura;
    }

    public function setDataApertura($dataApertura) {
        $this->dataApertura = $dataApertura;
    }

    public function getDataChiusura() {
        return $this->dataChiusura;
    }

    public function setDataChiusura($dataChiusura) {
        $this->dataChiusura = $dataChiusura;
    }

}

?>