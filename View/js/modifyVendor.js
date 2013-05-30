/**
 * Contiene i dati di overview
 * @type String[]
 */
var overview = Array();
/**
 * Contiene i dati ISO 9
 * @type String[]
 */
var certificateISO9 = Array();
/**
 * Contiene i dati ISO 14
 * @type String[]
 */
var certificateISO14 = Array();
/**
 * Id del fornitore cancellato
 * @type String
 */
var idDeleted = "";
/**
 * Chiede i dati di overview al DB
 * @param id String
 * @returns String[]
 */

function getOverview(id) {

    $.ajax("Control/getVendorOverview.php?id=" + id, {
        dataType: 'xml',
        success: function(data) {

            $(data).find('response').each(function() {

                overview[0] = $(this).find('name').text();
                overview[1] = $(this).find('code').text();
                overview[2] = $(this).find('address').text();
                overview[3] = $(this).find('zipcode').text();
                overview[4] = $(this).find('city').text();
                overview[5] = $(this).find('county').text();
                overview[6] = $(this).find('state').text();
                overview[7] = $(this).find('country').text();
                overview[8] = $(this).find('telephone').text();
                overview[9] = $(this).find('fax').text();
                overview[10] = $(this).find('email').text();
                overview[11] = $(this).find('contactperson').text();
                overview[12] = $(this).find('website').text();
                overview[13] = $(this).find('lineofbusiness').text();
                overview[14] = $(this).find('mobilephone').text();
                overview[15] = $(this).find('othercontact').text();
                overview[16] = $(this).find('duns').text();
                overview[17] = $(this).find('other').text();
                overview[18] = $(this).find('othercertificate').text();
                overview[19] = $(this).find('class').text();
                overview[20] = $(this).find('stateinformation').text();
                overview[21] = $(this).find('activity').text();
                overview[22] = $(this).find('product1').text();
                overview[23] = $(this).find('product2').text();
                overview[24] = $(this).find('product3').text();

            });
            $('title').val(overview[1] + "-" + overview[0]);
            setOverview();
            setInformationDetail();
            setCertificateISO();
        }
    });
}



/**
 * Chiede i certificati ISO9 al DB
 * @param String id
 * @returns String[]
 */
function getCertificateISO9(id) {

    $.ajax("Control/getVendorCertificate9.php?id=" + id, {
        dataType: 'html',
        success: function(data) {
            if (data !== "") {
                certificateISO9 = data.split(";");

            }
        }
    });

}
/**
 * Chiede i certificati ISO14 al DB
 * @param String id
 * @returns String[]
 */
function getCertificateISO14(id) {

    $.ajax("Control/getVendorCertificate14.php?id=" + id, {
        dataType: 'html',
        success: function(data) {
            if (data !== "") {
                certificateISO14 = data.split(";");

            }
        }
    });

}
/**
 * Setta sulla pagina le Overview del fornitore
 */
function setOverview() {
    //alert(overview[0]);
    $("#vendorName").val(overview[0]);
    $("#vendorCode").val(overview[1]);
    $("#address").val(overview[2]);
    $("#zipCode").val(overview[3]);
    $("#city").val(overview[4]);
    $("#county").val(overview[5]);
    $("#state").val(overview[6]);
    $("#country").val(overview[7]);
    $("#telephone").val(overview[8]);
    $("#fax").val(overview[9]);
    $("#email").val(overview[10]);
    $("#contactPerson").val(overview[11]);
    $("#webSite").val(overview[12]);

    $("#lineOfBusiness").val(overview[13]);
    $("#mobilePhone").val(overview[14]);
    $("#otherContact").val(overview[15]);
    $("#duns").val(overview[16]);
    $("#other").val(overview[17]);
    $("#otherCertificate").val(overview[18]);

}
/**
 *Setta sulla pagina le information detail
 */
function setInformationDetail() {
    $("#certificationClass").val(overview[19]);
    $("#stateInformation").val(overview[20]);
    $("#activity").val(overview[21]);
    $("#product1").val(overview[22]);
    $("#product2").val(overview[23]);
    $("#product3").val(overview[24]);


}
/**
 * Setta sulla pagina i certificati ISO
 */
function setCertificateISO() {

    if (certificateISO9[1] !== "0000-00-00") {
        $("#emissionData9").val(certificateISO9[1]);
    }

    if (certificateISO9[2] !== "0000-00-00") {
        $("#closeData9").val(certificateISO9[2]);
    }

    if (certificateISO14[1] !== "0000-00-00") {
        $("#emissionData14").val(certificateISO14[1]);
    }

    if (certificateISO14[2] !== "0000-00-00") {
        $("#closeData14").val(certificateISO14[2]);
    }

}
/**
 * Chiede gli NCR al DB e li setta sulla pagina
 * @param String id
 */
function getNCR(id) {

    $.ajax("Control/loadNCR.php?id=" + id, {
        dataType: 'html',
        success: function(data) {
            $("#NCRbody").html(data);
        }
    });


}

/**
 * Cancella un certificato NCR
 * @param String idNCR
 */
function deleteNCR(id) {

    $.ajax("Control/deleteNCR.php?id=" + overview[1] + "&idNCR=" + id, {
        dataType: 'html',
        success: function(data, status, xhr) {
            $("#NCRbody").html(data);
        }
    });


}

/**
 * Salva le modifiche fatte su DB e le setta sulla pagina 
 * @returns nothing
 */
function updateNCR() {

    var idNCR = $("#idNCRAddModifing").val();
    var issue = $("#issueModifing").val();
    var close = $("#closeModifing").val();
    var area = $("#areaModifing").val();
    var object = $("#objectModifing").val();

    var dataNCR = "idNCR=" + idNCR + "&issue=" + issue + "&close=" + close + "&area=" + area + "&object=" + object;
    $.ajax("Control/updateVendorNCR.php?id=" + overview[1] + "&" + dataNCR, {
        dataType: 'html',
        success: function(data) {
            $("#NCRbody").html(data);
        }
    });


}

/**
 * Scrive un nuovo NCR sul DB, 
 * @param String id
 */
function setNCR(id) {

    var idNCR = $("#idNCRAdd").val();
    var issue = $("#issue").val();
    var close = $("#close").val();
    var area = $("#area").val();
    var object = $("#object").val();

    if (idNCR !== "") {

        var dataNCR = "idNCR=" + idNCR + "&issue=" + issue + "&close=" + close + "&area=" + area + "&object=" + object;
        $.ajax("Control/setVendorNCR.php?id=" + id + "&" + dataNCR, {
            dataType: 'html',
            success: function(data) {
                if (data == "1062") {
                    $("#NCRIdDuplicate").dialog("open");
                } else
                    $("#NCRbody").html(data);
            }
        });
    } else
        $("#idNCRAdd").css("background-color", "red");

}
//idNCR, issue, close, area, object, id
/**
 * Modifica dinamicamente la visualizzazione dei NCR
 * @param {string} idNCR
 * @param {string} issue
 * @param {string} close
 * @param {string} area
 * @param {string} object
 */
function changeView(idNCR, issue, close, area, object) {

    if (!$("#idNCRAddModifing").length) {

        $("#NCR_" + idNCR).html("<td><input size=\"10\" type=\"text\" id=\"idNCRAddModifing\" name=\"idNCR\" disabled /></td><td><input size=\"10\" type=\"text\" id=\"issueModifing\" /></td><td> <p> <input size=\"10\" type=\"text\" id=\"closeModifing\" /></p> </td><td><input size=\"10\" type=\"text\" id=\"areaModifing\" name=\"area\"/></td><td><input size=\"10\" type=\"text\" id=\"objectModifing\" name=\"object\"/></td><td>&nbsp&nbsp&nbsp&nbsp&nbsp<a href=\"#\" onclick=\"updateNCR(this)\"id=\"saveNCRLink\"><img src=\"View/Images/save.png\"></img></a></td> ");

        $("#idNCRAddModifing").val(idNCR);
        $("#areaModifing").val(area);
        $("#objectModifing").val(object);


        $("#issueModifing").datepicker();
        $("#issueModifing").datepicker("option", "dateFormat", "yy-mm-dd");
        $("#issueModifing").datepicker("setDate", issue);
        $("#closeModifing").datepicker();
        $("#closeModifing").datepicker("option", "dateFormat", "yy-mm-dd");
        $("#closeModifing").datepicker("setDate", close);

    } else
        alert("stai già modificando");

}


