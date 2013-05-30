/* 
 * Contiene metodi di controllo
 */


/**
 * 
 */
function controlVendorName() {
    if ($("#vendorName").val() == "") {
        $("#vendorNameText").css("background-color", "red");
        return false;
    } else
        return true;
}
/**
 * 
 */
function controlVendorCode() {
    if ($("#vendorCode").val() == "") {
        $("#vendorCodeText").css("background-color", "red");
        return false;
    } else
        return true;
}


