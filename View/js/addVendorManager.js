/* 
 *ADD VENDOR FORM SCRIPT:
 *
 *Si occupa della gestione della pagina di aggiunta fornitore:
 *Contiene funzioni per le richieste AJAX, per la visualizzazione dei diversi div
 *e per il controllo delle scelte fatte dall'utente.
 */



/**
 * Visualizza le DIV ISO a seconda del parametro passato
 * @returns {undefined}
 */
function viewISO() {

    $("#dataDiv14").html("<br/><h4>ISO 14001:</h4><br/>                                             Data emissione <div id=\"emissionData\"><input type=\"text\" name=\"emissionData14\"  id=\"emissionData14\" /></div>\n\
                                        Data chiusura <div id=\"closeData\"> <input type=\"text\" name=\"closeData14\"  id=\"closeData14\" />");
    $("#dataDiv9").html("<br/><h4>ISO 9001:</h4><br/>Data emissione  <div id=\"emissionData\"><input type=\"text\" name=\"emissionData9\" id=\"emissionData9\" /></div>\n\
                                        Data chiusura <div id=\"closeData\"> <input type=\"text\" name=\"closeData9\" id=\"closeData9\" />");
}


/**
 * Controlla la presenza di un id NCR
 * @returns {Boolean|$}
 */
function IdControl() {

    if ($("#idNCR") === "") {
        alert("non c'è id");
        return false;
    } else
        return $("#idNCR");

}
/**
 * Restituisce la data di chiusura dei certificati NCR
 */
function getIssue() {

    var dayIssue = "";

    dayIssue = $("#dayI").selectedIndex;
    dayIssue = +"/" + $("#monthI").selectedIndex;
    dayIssue = +"/" + $("#yearI").selectedIndex;
    return dayIssue;
}

/**
 *Restituisce la data di chiusura dei certificati NCR
 */
function getClose() {

    var dayClosed = "";

    dayClosed = $("#dayc").selectedIndex;
    dayClosed = +"/" + $("#monthc").selectedIndex;
    dayClosed = +"/" + $("#yearc").selectedIndex;
    return dayClosed;
}


/**
 * Richiede le Activity al database
 */
function getActivityFromDB() {
    $.ajax("./Control/loadOption/getActivityFromDB.php", {
        dataType: 'xml',
        success: function(data, status, xhr) {
            $(data).find('data').each(function() {
                var id = $(this).find('id').text();
                var option = $(this).find('option').text();
                $("#activity").append("<option value=" + id + ">" + option + "</option>");
            });
        }
    });

}

/**
 * Richiede i Prodotti al database
 */
function getProductFromDB() {

    $.ajax("./Control/loadOption/getProductFromDB.php", {
        dataType: 'html',
        success: function(data, status, xhr) {

            $(data).find('data').each(function() {
                //alert(data);
                var id = $(this).find('id').text();
                var option = $(this).find('option').text();
                $("#product1").append("<option value=" + id + ">" + option + "</option>");
                $("#product2").append("<option value=" + id + ">" + option + "</option>");
                $("#product3").append("<option value=" + id + ">" + option + "</option>");
            });
        }
    });
}
/**
 * Richiede gli stati al database
 */
function getStatiFromDB() {
    $.ajax("./Control/loadOption/getStatiFromDB.php", {
        dataType: 'xml',
        success: function(data, status, xhr) {
            $(data).find('data').each(function() {
                var id = $(this).find('id').text();
                var option = $(this).find('option').text();
                $("#stateInformation").append("<option value=" + id + ">" + option + "</option>");
            });
        }
    });

}
/**
 * Richiede le Classi al database
 */
function getClassiFromDB() {
    $.ajax("./Control/loadOption/getClassiFromDB.php", {
        dataType: 'xml',
        success: function(data, status, xhr) {
            $(data).find('data').each(function() {
                var id = $(this).find('id').text();
                var option = $(this).find('option').text();
                $("#certificationClass").append("<option value=" + id + ">" + option + "</option>");
            });
        }
    });

}


