/* 
 *ID riferito al fornitore che si vuole cancellare      
 */
var idDelete = "";
/**
 * Id del fornitore da modificare
 */
var idModify = "";


var tmpKey = "";
/**
 * Fa una richiesta di ricerca allo script SEARCH
 * @param {string} key
 * @param {string} type
 */
function getSearchedResult(page) {


    var key = $("#key").val().toString();
    var type = $('input:radio[name=type]:checked').val();
    $.ajax("Control/searchVendor.php?key=" + key + "&type=" + type + "&page=" + page, {
        dataType: 'html',
        success: function(data) {
            $("#found").html(data);
        }
    });
    // $("#" + page).removeClass();

}

function eraseAll() {
    //$("#key").val("");
    $("#found").html("");
}
/**
 * Conferma la scelta di eliminazione del fornitore
 * @param {type} id
 * @returns {undefined}
 */
function openDialogDeleteSupplier(id) {
    $("#dialog-confirm").dialog("open");
    idDelete = id;

}

function deleteSupplier() {
    // alert(idDelete);
    $.ajax("Control/deleteVendor.php?id=" + idDelete, {
        dataType: 'html',
        success: function(data, status, xhr) {
            //alert(data);
        }
    });

    $("#dialog-confirm").dialog("close");

}


function modifySupplier(id) {
    window.open("modify.php?id='" + id + "'", "Modify", "width=1095px , height=580px , resizable=yes");
}


