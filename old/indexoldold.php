 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


        <!-- CSS -->
        <link href="View/style/css/transdmin.css" rel="stylesheet" type="text/css" media="screen" />
        <link rel="stylesheet" href="View/js/reveal.css"></link>
        <link rel="stylesheet" href="View/overcast/jquery-ui-1.10.2.custom.min.css" />
        <!-- JavaScripts-->
        <script type="text/javascript" src="View/lib/jquery-1.9.1.min.js"></script>
        <script type="text/javascript" src="View/overcast/jquery-1.9.1.min.js"></script>
        <script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
        <script type="text/javascript" src="View/js/jquery.reveal.js"></script>                                                                                                                                                                                                                                                                                                              <!--<script src="./xhtml/View/lib/jquery-1.9.1.min.js" type="text/javascript"></script>-->
        <script src="View/js/addVendorManager.js" type="text/javascript"></script>
        <script src="View/js/NCR.js" type="text/javascript"></script>
        <script src="View/js/CertificateIso.js" type="text/javascript"></script>
        <script src="View/js/control.js" type="text/javascript"></script>
        <script src="View/js/searchVendor.js" type="text/javascript"></script>
        <!-- <script src="View/js/jquery.msgBox.js" type="text/javascript"></script>-->

        <script type="text/javascript">
            /**
            * Elenco dei NCR aggiunti
            */
            var elencoNCR = new Array();

            //var req = new XMLHttpRequest();

            /**
            * Attende il caricamento del documento
            */
            $(document).ready(function() {
            /**
            * ____________________Caricamento da database delle select___________________________
            */
            getActivityFromDB();
            getStatiFromDB();
            getClassiFromDB();
            getProductFromDB();

            /**
            */
            /**
            * ______________Controllo della selezione del tipo di certificato____________________
            */
            $("#ISO9").bind('click', function() {

            viewISO(1);

            $("#emissionData9").datepicker();
            $("#emissionData9").datepicker("option", "dateFormat", "yy-mm-dd");
            $("#closeData9").datepicker();
            $("#closeData9").datepicker("option", "dateFormat", "yy-mm-dd");
            });
            $("#ISO14").bind('click', function() {
            viewISO(2);
            $("#emissionData14").datepicker();
            $("#emissionData14").datepicker("option", "dateFormat", "yy-mm-dd");
            $("#closeData14").datepicker();
            $("#closeData14").datepicker("option", "dateFormat", "yy-mm-dd");
            });
            $("#ISO914").bind('click', function() {
            viewISO(3);
            $("#emissionData9").datepicker();
            $("#emissionData9").datepicker("option", "dateFormat", "yy-mm-dd");
            $("#closeData9").datepicker();
            $("#closeData9").datepicker("option", "dateFormat", "yy-mm-dd");

            $("#emissionData14").datepicker();
            $("#emissionData14").datepicker("option", "dateFormat", "yy-mm-dd");
            $("#closeData14").datepicker();
            $("#closeData14").datepicker("option", "dateFormat", "yy-mm-dd");
            });
            $("#ND").bind('click', function() {
            viewISO(4);
            });


            /**
            * __________________________________________________________________________________
            */

            /*
            * __________________Controllo per l'aggiunta di un Not-Conformity Report____________
            */
            $("#changeNCR").bind('click', function() {

            if ($("#idNCRAdd").val() !== "") {
            var id = $("#idNCRAdd").val();
            var area = $("#area").val();
            var object = $("#object").val();

            var dayI = $("#dayI").val();
            var monthI = $("#monthI").val();
            var yearI = $("#yearI").val();


            var dayc = $("#dayc").val();
            var monthc = $("#monthc").val();
            var yearc = $("#yearc").val();

            var newNCR = new NCR(id, dayI + "/" + monthI + "/" + yearI, dayc + "/" + monthc + "/" + yearc, area, object);
            elencoNCR[id] = newNCR;
            newNCR.setOnPage();

            $("#certificateNumber").append("<option value='" + id + "'>" + id + "</option>");


            } else
            alert("ID obbligatorio!");
            });
            /*
            * ___________________________________________________________________________________
            */



            /**
            * ______________________________Constrollo eventi su la select No-Conformity Report_________________________
            */

            $("#certificateNumber").bind('click', function() {

            if ($('#certificateNumber').val() == "-1") {
            var newNCR = new NCR("", "-1/-1/-1", "-1/-1/-1", "", "");
            newNCR.setOnPage();
            } else {

            for (id in elencoNCR) {
            if (id == $("#certificateNumber").val())
            elencoNCR[id].setOnPage();
            }

            }
            });

            /**
            * ___________________________________________________________________________
            */
            /**
            * _____________________Istruzioni per l'invio dei dati_________________________
            */
            $("#save").bind('click', function() {

            //document.close();
            /*var vendorName = $("#vendorName").val();
            var vendorCode = $("#vendorCode").val();
            var address = $("#address").val();
            var zipCode = $("#zipCode").val();
            var city = $("#city").val();
            var county = $("#county").val();
            var state = $("#state").val();
            var country = $("#country").val();
            var telephone = $("#telephone").val();
            var fax = $("#fax").val();
            var email = $("#email").val();
            var contactPerson = $("#contactPerson").val();
            var webSite = $("#webSite").val();
            var lineOfBusiness = $("#lineOfBusiness").val();
            var mobilePhone = $("#mobilePhone").val();
            var otherContact = $("#otherContact").val();
            var duns = $("#duns").val();
            var other = $("#other").val();
            var otherCertificate = $("#otherCertificate").val();*/

            if (controlVendorCode() || controlVendorName()) {
            $("#addVendor").submit();
            }
            });

            /*
            * _____________________________________________________________________________________
            */

            /**      /**
            *Si occupa della creazione e dell'invio della 
            *richiesta XML
            **/
            function requestProcess(data) {

            if (req.readyState == 4 || req.readyState == 0) { //oggetto libero invia richiesta asincrona



            req.open("GET", "../Control/control.php?elencoNCR=" + data, true);
            //req.onreadystatechange=gestioneRisposta;
            req.send(null);

            }

            }

            $("#tabs").tabs();

            $("#NCRTabs").bind('click', function() {

            NCRdialog();
            });
            });





        </script>

    </head>





    <div id="tabs">

        <ul>
            <li><a href="#tabs-1">Overview</a></li>
            <li><a href="#tabs-2">Certificate</a></li>
            <li><a id="NCRTabs" href="#tabs-3">No Conformity Report</a></li>
            <li><a href="#tabs-4">Information Detail</a></li>
        </ul>
        <form action="Control/addVendor.php" id="addVendor" method="GET" name="addVendor">
            <div id="tabs-1">

                <table  id="overviewTable">
                    <tr>
                        <td id="vendorNameText">Vendor Name</td>
                        <td><input type="text" name="vendorName" id="vendorName" /></td>
                    </tr>
                    <tr>
                        <td id="vendorCodeText">Vendor Code</td>
                        <td><input type="text" name="vendorCode" id="vendorCode" /></td>
                    </tr>
                    <tr>
                        <td> Address</td>
                        <td><input type="text" name="address" id="address" /></td>
                    </tr>
                    <tr>
                        <td> Zip/Post Code  </td>
                        <td><input type="text" name="zipCode" id="zipCode" /></td>
                    </tr>
                    <tr>
                        <td>  City </td>
                        <td><input type="text" name="city" id="city" /></td>
                    </tr>
                    <tr>
                        <td>County </td>
                        <td><input type="text" name="county" id="county" /></td>
                    </tr>
                    <tr>
                        <td>State</td>
                        <td>  <input type="text" name="state" id="state" /></td>
                    </tr>
                    <tr>
                        <td>Country/Region </td>
                        <td> <input type="text" name="country" id="country" /></td>
                    </tr>
                    <tr>
                        <td>Telephone  </td>
                        <td>     <input type="text" name="telephone" id="telephone" /></td>
                    </tr>
                    <tr>
                        <td>Fax  </td>
                        <td><input type="text" name="fax" id="fax" /></td>
                    </tr>

                    <tr>
                        <td>E-mail </td>
                        <td><input type="text" name="email" id="email" /></td>
                    </tr>
                    <tr>
                        <td> Contact Person</td>
                        <td><input type="text" name="contactPerson" id="contactPerson" /></td>
                    </tr>
                    <tr>
                        <td>Web site  </td>
                        <td> <input type="text" name="webSite" id="webSite" /></td>
                    </tr>
                    <tr>
                        <td>Line of business </td>
                        <td><input type="text" name="lineOfBusiness" id="lineOfBusiness" /></td>
                    </tr>
                    <tr>
                        <td>  Mobile phone </td>
                        <td><input type="text" name="mobilePhone" id="mobilePhone" /></td>
                    </tr>
                    <tr>
                        <td>  Other contact </td>
                        <td>   <input type="text" name="otherContact" id="otherContact" /></td>
                    </tr>
                    <tr>
                        <td> D-U-N-S</td>
                        <td>    <input type="text" name="duns" id="duns" /><br /></td>
                    </tr>
                    <tr>
                        <td>Other</td>
                        <td><input type="text" name="other" id="other" /><br /></td>
                    </tr>
                </table>
            </div>





            <div id="tabs-2">

                <div id="evaluation"> 
                    <input type="radio" id="ND" name="evaluationType" value="ND" checked /> Nessuno
                    <input type="radio" id="ISO9" name="evaluationType" value="9" /> ISO 9001
                    <input type="radio" id="ISO14" name="evaluationType" value="14"/> ISO 14001
                    <input type="radio" id="ISO914" name="evaluationType" value="914"/> ISO 9001-14001
                    <br/><br/>
                    <div id="dataDiv9">
                        <!--Javascript generated code-->
                    </div>
                    <div id="dataDiv14">
                        <!--Javascript generated code-->
                    </div> 
                    <div id="otherCertificateDiv">
                        <br/>
                        Other certificate 
                        <input type="text" id="otherCertificate" name="otherCertificate"/>      
                    </div> 
                </div>
            </div>
            <div id="tabs-3">
                <fieldset  disabled>

                    <!---  <div id="draggable" class="ui-widget-content">
                          <h3>Prima di poter modificare i NCR aggiungi il fornitore al database</h3>
                      </div>-->


                    <div id="nonConformityRep" style="visibility:"> 
                        <br/>
                        <br/>
                        <table id="nonConformityRepTable">
                            <tr>
                                <td>
                                    <select id="certificateNumber" name="certificateNumber" multiple="multiple">
                                        <option value="-1">Add</option>

                                    </select><br/><br/>
                                    <input type="button" id="changeNCR" name="changeNCR" value="Save changes"/>  <br/>
                                    <input type="button" id="removeNCR" name="removeNCR" value="Remove"/><br/>

                                </td>
                                <td>

                                    <table id="NCRData">
                                        <tr>

                                            <td>ID</td>
                                            <td><input type="text" id="idNCRAdd" name="idNCR"/></td>
                                        </tr>
                                        <tr>
                                            <td>Issue</td>
                                            <td> <input type="text" id="issue" /></p> </td>
                                        </tr>
                                        <tr>
                                            <td>Close</td>
                                            <td> <p> <input type="text" id="close" /></p> </td>
                                        </tr>
                                        <tr>
                                            <td> Area </td>
                                            <td><input type="text" id="area" name="area"/></td>
                                        </tr>
                                        <tr>
                                            <td> Object</td>
                                            <td><input type="text" id="object" name="object"/></td>
                                        </tr>
                                    </table>

                                </td>
                            </tr>
                            <tr>
                                <td>

                                </td>
                            </tr>
                        </table>
                    </div>
                </fieldset>
            </div>

            <div id="tabs-4" >
                <table id="informationDetailTable">
                    <tr>
                        <td>
                            Certification Class  
                        </td>
                        <td>
                            <select id="certificationClass" name="certificationClass"></select>  
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Activity  
                        </td>
                        <td>
                            <select id="activity" name="activity"></select>  
                        </td>
                    </tr>
                    <tr>
                        <td>
                            State
                        </td>
                        <td>
                            <select id="stateInformation" name="stateInformation"></select>  
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Product 1
                        </td>
                        <td><select id="product1alpha"></select></td>
                        <td>
                            <select id="product1" name="product1"></select>  
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Product 2
                        </td>
                        <td><select id="product2alpha">

                                <td>
                                    <select id="product2" name="product2"></select>  
                                </td>
                                </tr>
                                <tr>
                                    <td>
                                        Product 3
                                    </td>
                                    <td><select id="product3alpha"></select></td>
                                    <td>
                                        <select id="product3" name="product3"></select>  
                                    </td>
                                </tr>
                                </table>
                                </div>
                                </form>  
                                </div>


                                <input type="button" value="Debug" onclick="meo()"/>
                                <input type="button" id="save" value="Save" autofocus/>
                                <input type="button" id="annulla" value="Annulla"/>



                                <div id="NCRdialog" title="Attenzione!">
                                    <p>Prima di poter aggiungere NCR, salvare il nuovo fornitore nel database</p>
                                </div>