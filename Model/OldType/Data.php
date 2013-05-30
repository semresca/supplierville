<?php

/**
 * Descrive la struttura di una data:
 * <ul>
 * <li>Un'attributo intero contenente il giorno</li>
 * <li>Un'attributo intero contenente il mese</li>
 * <li>Un'attributo intero contenente l'anno</li>
 * </ul>
 * @author Samuele Resca
 * @access public
 * @package Resolution
 */
class Data {

    /**
     * Giorno
     * @var int 
     */
    private $giorno;

    /**
     * Mese
     * @var int
     */
    private $mese;

    /**
     * Anno 
     * @var int 
     */
    private $anno;

    /**
     * 
     * @param int $giorno
     * @param int $mese
     * @param int $anno
     */
    function __construct($giorno, $mese, $anno) {
        $this->giorno = $giorno;
        $this->mese = $mese;
        $this->anno = $anno;
    }

    function initString($data) {

        if ($data != "") {

            $splitted = explode("/", $data);
            $this->giorno = $splitted[0];
            $this->mese = $splitted[1];
            $this->anno = $splitted[2];
        } else {

            $this->giorno = 0;
            $this->mese = 00;
            $this->anno = 0000;
        }
    }

    public function getGiorno() {
        return $this->giorno;
    }

    public function setGiorno($giorno) {
        $this->giorno = $giorno;
    }

    public function getMese() {
        return $this->mese;
    }

    public function setMese($mese) {
        $this->mese = $mese;
    }

    public function getAnno() {
        return $this->anno;
    }

    public function setAnno($anno) {
        $this->anno = $anno;
    }

    public function __toString() {
        return $this->giorno . "/" . $this->mese . "/" . $this->anno;
    }

}

?>