<?php

/**
 * Classe che descrive un fornitore, ovvero un'azienda che produce un determinato prodotto,
 * questa classe conterrà tutti gli attributi necessari per descrivere le informazioni
 * necessarie all'ufficio acquisti
 * @author Samuele Resca
 * @access public
 * 
 */
class Fornitore {

    /**
     * Cotniene il codice identificativo del fornitore
     * @var String
     */
    private $codiceFornitore;

    /**
     * Contiene il nome del fornitore
     * @var String
     */
    private $ragioneSociale;

    /**
     * Indirizzo dell azienda
     * @var String
     */
    private $indirizzo;

    /**
     * Cap 
     * @var String
     */
    private $cap;

    /**
     * Città nella quale è situata l'azienda
     * @var String 
     */
    private $città;

    /**
     * Provincia nella quale è situata l'azienda
     * @var String
     */
    private $provincia;

    /**
     * Nazione nella quale è situata l'azienda
     * @var String 
     */
    private $nazione;

    /**
     * Numero di telefono dell'azienda
     * @var String
     */
    private $telefono;

    /**
     * Numero di fax dell'azienda
     * @var String 
     */
    private $fax;

    /**
     * E-mail dell'azienda
     * @var type 
     */
    private $email;

    /**
     * Tipologia di prodotto venduto
     * @var String
     */
    private $classe;

    /**
     * Stato di affidabilità dell'azienda
     * @var string 
     */
    private $stato;

    /**
     * Prodotti venduti dall'azienda
     * @var String[] ?Prodotti[]
     */
    private $prodotti;

    /**
     * true= ha una sede secondaria | false= non ha sede secondaria
     * @var boolean 
     */
    private $sedeSecondaria;

    /**
     * La regione dell'azienda
     * @var String
     */
    private $regioneState;

    /**
     *
     * @var type 
     */
    private $extension;

    /**
     * Numero di cellulare del referente dell'azienda
     * @var String 
     */
    private $mobilePhone;

    /**
     * Nome del referente dell'azienda
     * @var String
     */
    private $pager;

    /**
     * Altri contatti
     * @var String 
     */
    private $altriContatti;

    /**
     * Sito web dell'azienda
     * @var String
     */
    private $internetAddress;

    /**
     * Codice line of Business
     * @var Sting 
     */
    private $lineOfBusiness;

    /**
     * 
     * @var type 
     */
    private $attività;

    /**
     * True= il fornitore è stato revisionato | false= fornitore da revisionare
     * (Si utilizza nel caso il fornitore sia stato dichiarato non affidabile)
     * @var String
     */
    private $revisionato;

    /**
     * Cotiene le note relative al fornitore
     * @var String 
     */
    private $noteFornitore;

    /**
     * Data di validazione interna del fornitore
     * @var Data 
     */
    private $validazioneInterna;

    /**
     * Codice D.U.N.S 
     * @var String 
     */
    private $duns;

    /**
     * Altre informazioni riferite al fornitore
     * @var String
     */
    private $altreInfo;

    /**
     * Contiene un certificato, non classificato come ISO 9001-14001
     * @var String
     */
    private $otherCertificate;

    /**
     * Elenco dei certificati di non conformità
     * @var VNC[]
     */
    private $elencoNonConformi;

    /**
     * Elenco dei certificati iso  del fornitore
     * @var Certificate[] 
     */
    private $certificatiISO;

    /**
     * Cotiene la data di revisione interna
     * @var Data
     */
    private $dataRevisionato;

    /**
     * 
     * @param string $codiceFornitore
     * @param string $ragioneSociale
     * @param string $indirizzo
     * @param string $cap
     * @param string $città
     * @param string $provincia
     * @param string $nazione
     * @param string $telefono
     * @param string $fax
     * @param string $email
     * @param string $classe
     * @param string $stato
     * @param string $prodotti
     * @param string $sedeSecondaria
     * @param string $regioneState
     * @param string $extension
     * @param string $mobilePhone
     * @param string $pager
     * @param string $altriContatti
     * @param string $internetAddress
     * @param string $lineOfBusiness
     * @param string $attività
     * @param boolean $revisionato
     * @param string $noteFornitore
     * @param Data   $validazioneInterna
     * @param string $duns
     * @param string $altreInfo
     * @param string $otherCertificate
     * @param VNC[] $elencoNonConformi
     * @param Certificate[] $certificatiISO
     * @param Data  $dataRevisionato
     */
    function __construct($codiceFornitore, $ragioneSociale, $indirizzo, $cap, $città, $provincia, $nazione, $telefono, $fax, $email, $classe, $stato, $prodotti, $sedeSecondaria, $regioneState, $extension, $mobilePhone, $pager, $altriContatti, $internetAddress, $lineOfBusiness, $attività, $revisionato, $noteFornitore, $validazioneInterna, $duns, $altreInfo, $otherCertificate, $elencoNonConformi, $certificatiISO, $dataRevisionato) {
        $this->codiceFornitore = $codiceFornitore;
        $this->ragioneSociale = $ragioneSociale;
        $this->indirizzo = $indirizzo;
        $this->cap = $cap;
        $this->città = $città;
        $this->provincia = $provincia;
        $this->nazione = $nazione;
        $this->telefono = $telefono;
        $this->fax = $fax;
        $this->email = $email;
        $this->classe = $classe;
        $this->stato = $stato;
        $this->prodotti = $prodotti;
        $this->sedeSecondaria = $sedeSecondaria;
        $this->regioneState = $regioneState;
        $this->extension = $extension;
        $this->mobilePhone = $mobilePhone;
        $this->pager = $pager;
        $this->altriContatti = $altriContatti;
        $this->internetAddress = $internetAddress;
        $this->lineOfBusiness = $lineOfBusiness;
        $this->attività = $attività;
        $this->revisionato = $revisionato;
        $this->noteFornitore = $noteFornitore;
        $this->validazioneInterna = $validazioneInterna;
        $this->duns = $duns;
        $this->altreInfo = $altreInfo;
        $this->otherCertificate = $otherCertificate;
        $this->elencoNonConformi = $elencoNonConformi;
        $this->certificatiISO = $certificatiISO;
        $this->dataRevisionato = $dataRevisionato;
    }

    public function getCodiceFornitore() {
        return $this->codiceFornitore;
    }

    public function setCodiceFornitore($codiceFornitore) {
        $this->codiceFornitore = $codiceFornitore;
    }

    public function getRagioneSociale() {
        return $this->ragioneSociale;
    }

    public function setRagioneSociale($ragioneSociale) {
        $this->ragioneSociale = $ragioneSociale;
    }

    public function getIndirizzo() {
        return $this->indirizzo;
    }

    public function setIndirizzo($indirizzo) {
        $this->indirizzo = $indirizzo;
    }

    public function getCap() {
        return $this->cap;
    }

    public function setCap($cap) {
        $this->cap = $cap;
    }

    public function getCittà() {
        return $this->città;
    }

    public function setCittà($città) {
        $this->città = $città;
    }

    public function getProvincia() {
        return $this->provincia;
    }

    public function setProvincia($provincia) {
        $this->provincia = $provincia;
    }

    public function getNazione() {
        return $this->nazione;
    }

    public function setNazione($nazione) {
        $this->nazione = $nazione;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    public function getFax() {
        return $this->fax;
    }

    public function setFax($fax) {
        $this->fax = $fax;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getClasse() {
        return $this->classe;
    }

    public function setClasse($classe) {
        $this->classe = $classe;
    }

    public function getStato() {
        return $this->stato;
    }

    public function setStato($stato) {
        $this->stato = $stato;
    }

    public function getProdotti() {
        return $this->prodotti;
    }

    public function setProdotti($prodotti) {
        $this->prodotti = $prodotti;
    }

    public function getSedeSecondaria() {
        return $this->sedeSecondaria;
    }

    public function setSedeSecondaria($sedeSecondaria) {
        $this->sedeSecondaria = $sedeSecondaria;
    }

    public function getRegioneState() {
        return $this->regioneState;
    }

    public function setRegioneState($regioneState) {
        $this->regioneState = $regioneState;
    }

    public function getExtension() {
        return $this->extension;
    }

    public function setExtension($extension) {
        $this->extension = $extension;
    }

    public function getMobilePhone() {
        return $this->mobilePhone;
    }

    public function setMobilePhone($mobilePhone) {
        $this->mobilePhone = $mobilePhone;
    }

    public function getPager() {
        return $this->pager;
    }

    public function setPager($pager) {
        $this->pager = $pager;
    }

    public function getAltriContatti() {
        return $this->altriContatti;
    }

    public function setAltriContatti($altriContatti) {
        $this->altriContatti = $altriContatti;
    }

    public function getInternetAddress() {
        return $this->internetAddress;
    }

    public function setInternetAddress($internetAddress) {
        $this->internetAddress = $internetAddress;
    }

    public function getLineOfBusiness() {
        return $this->lineOfBusiness;
    }

    public function setLineOfBusiness($lineOfBusiness) {
        $this->lineOfBusiness = $lineOfBusiness;
    }

    public function getAttività() {
        return $this->attività;
    }

    public function setAttività($attività) {
        $this->attività = $attività;
    }

    public function getRevisionato() {
        return $this->revisionato;
    }

    public function setRevisionato($revisionato) {
        $this->revisionato = $revisionato;
    }

    public function getNoteFornitore() {
        return $this->noteFornitore;
    }

    public function setNoteFornitore($noteFornitore) {
        $this->noteFornitore = $noteFornitore;
    }

    public function getValidazioneInterna() {
        return $this->validazioneInterna;
    }

    public function setValidazioneInterna($validazioneInterna) {
        $this->validazioneInterna = $validazioneInterna;
    }

    public function getDuns() {
        return $this->duns;
    }

    public function setDuns($duns) {
        $this->duns = $duns;
    }

    public function getAltreInfo() {
        return $this->altreInfo;
    }

    public function setAltreInfo($altreInfo) {
        $this->altreInfo = $altreInfo;
    }

    public function getOtherCertificate() {
        return $this->otherCertificate;
    }

    public function setOtherCertificate($otherCertificate) {
        $this->otherCertificate = $otherCertificate;
    }

    public function getElencoNonConformi() {
        return $this->elencoNonConformi;
    }

    public function setElencoNonConformi($elencoNonConformi) {
        $this->elencoNonConformi = $elencoNonConformi;
    }

    public function getCertificatiISO() {
        return $this->certificatiISO;
    }

    public function setCertificatiISO($certificatiISO) {
        $this->certificatiISO = $certificatiISO;
    }

    public function getDataRevisionato() {
        return $this->dataRevisionato;
    }

    public function setDataRevisionato($dataRevisionato) {
        $this->dataRevisionato = $dataRevisionato;
    }

}

?>