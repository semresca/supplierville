/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function getExpired9() {
    //  alert("prova");
    $.ajax("Control/getExpired.php?type=9", {
        dataType: 'xml',
        success: function(data) {

            var expired = [];
            $(data).find('response').each(function() {
                $(data).find('expired').each(function() {
                    //alert("sono dentro")
                    expired[0] = $(this).find('sup_name').text();
                    expired[1] = $(this).find('sup_code').text();
                    expired[2] = $(this).find('iso_close').text();
                    setWarningsOnPage(expired, true);
                });
            });
        }
    });
}

function getExpired14() {
    $.ajax("Control/getExpired.php?type=14", {
        dataType: 'xml',
        success: function(data) {
            var expired = [];
            //alert(data);
            ////alert(data.childNodes[0].nodeName);

            $(data).find('response').each(function() {
                $(data).find('expired').each(function() {
                    //alert(data.childNodes[0].nodeName);
                    expired[0] = $(this).find('sup_name').text();
                    expired[1] = $(this).find('sup_code').text();
                    expired[2] = $(this).find('iso_close').text();
                    setWarningsOnPage(expired, false);
                });
            });
        }
    });
}

function setWarningsOnPage(scaduti, isISONine) {
    i = 0;
    while (i < scaduti.length) {
        k = i + 1;
        j = i + 2;
        var tmp = "<tr><td>" + scaduti[i] + "</td><td>" + scaduti[k] + "</td><td>" + scaduti[j] + "</td></tr>";
        if (isISONine) {
            //Ci va la visualizzazione
            $("#scadutiTable9").append(tmp);
        } else
            $("#scadutiTable14").append(tmp);
        i = i + 3;

    }

}
