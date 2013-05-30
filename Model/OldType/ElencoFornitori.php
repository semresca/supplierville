<?php

/**
 * Classe che descrive un elenco di fornitori.
 * Da questa classe è possibile recuperare dei fornitori ricercandoli in base ad
 * alcune caratteristiche
 * @author Samuele Resca
 */
class ElencoFornitori {

    /**
     * Contiene l'elenco dei fornitori
     * @var Fornitore[]
     */
    private $elencoFornitori;

    /**
     * Inizializza gli attributi di classe
     * @param Fornitore[] $elencoFornitori
     */
    function __construct($elencoFornitori) {
        $this->elencoFornitori = $elencoFornitori;
    }

}

?>
