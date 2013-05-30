/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 * Invia l'option al db
 */
function setOptionToDB() {
    //alert("");
    var type = $('input[name=type]:checked').val();
    var text = $("#newOption").val();

    $.ajax("./Control/addOptionToDB.php?type=" + type + "&option=" + text, {
        dataType: 'html',
        success: function(data, status, xhr) {
            if (!data) {
                $("#fornitoreAggiunto").show();
            }
        }
    });

}