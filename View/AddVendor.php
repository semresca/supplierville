<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'View/Template.php';

/**
 * Description of AddVendor
 *
 * @author semresca
 */
class AddVendor extends Template {

    public function setContent() {
        ?>
         <h2><a href="#">Dashboard</a>&raquo; <a href="#" class="active">Add Vendor</a></h2>
        <br/><br/><br/><br/><br/>
        <div id="tabs">

            <ul>
                <li><a href="#tabs-1"><p id="titleH3">Overview</p></a></li>
                <li><a href="#tabs-2"><p id="titleH3">Certificate</p></a></li>
                <li><a id="NCRTabs" href="#tabs-3"><p id="titleH3">No Conformity Report</p></a></li>
                <li><a href="#tabs-4"><p id="titleH3">Information Detail</p></a></li>
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
                    <br/>
                    <h4>Senzione relativa alla certificazione ISO del fornitore:</h4>
                    <br/>
                    <!--  <div id="evaluation"> 
                          <input type="radio" id="ND" name="evaluationType" value="ND" checked /> Nessuno
                          <input type="radio" id="ISO9" name="evaluationType" value="9" /> ISO 9001
                          <input type="radio" id="ISO14" name="evaluationType" value="14"/> ISO 14001
                          <input type="radio" id="ISO914" name="evaluationType" value="914"/> ISO 9001-14001
                          <br/><br/>-->
                    <div id="dataDiv9">
                        <!--Javascript generated code-->
                    </div>
                    <div id="dataDiv14">
                        <!--Javascript generated code-->
                    </div> 
                    <div id="otherCertificateDiv">
                        <br/>
                        <b>Other certificate </b>
                        <input type="text" id="otherCertificate" name="otherCertificate"/>      
                    </div> 
                </div>

                <div id="tabs-3">


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
                            <td>
                                <select id="product1" name="product1"></select>  
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Product 2
                            </td>
                            <td>
                                <select id="product2" name="product2"></select>  
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Product 3
                            </td>
                            <td>
                                <select id="product3" name="product3"></select>  
                            </td>
                        </tr>
                    </table>
                </div>
            </form>  
        </div>
        <BR/>
        <BR/>
        <input type="button" id="save" value="Save" autofocus/>
        &nbsp&nbsp&nbsp&nbsp&nbsp
        <input type="button" id="annulla" value="Annulla"/>
        <br/>
        <br/>


        <div id="NCRdialog" title="Attenzione!">
            <p>Prima di poter aggiungere NCR, salvare il nuovo fornitore nel database</p>
        </div>

        <div id="IdErrordialog" title="Errore aggiunta fornitore">
            <p> ID già esistente. Il fornitore non è stato aggiunto, perfavore cambiare il campo ID</p>
        </div>

        <div id="NoIDErrordialog" title="Errore aggiunta fornitore">
            <p> Si prega di compilare i campi "Vendor Name" e "Vendor Code", per una corretta memorizzazione del fornitore</p>
        </div>
        <?php
    }

    public function setScript() {
        ?>
        <!-- JavaScripts-->                                                                                                                                                                                                                                                                                                        <!--<script src="./xhtml/View/lib/jquery-1.9.1.min.js" type="text/javascript"></script>-->
        <script src="View/js/addVendorManager.js" type="text/javascript"></script>
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
            viewISO();


            /**
            * ______________Controllo della selezione del tipo di certificato____________________
            */

            $("#emissionData9").datepicker();
            $("#emissionData9").datepicker("option", "dateFormat", "yy-mm-dd");
            $("#closeData9").datepicker();
            $("#closeData9").datepicker("option", "dateFormat", "yy-mm-dd");

            $("#emissionData14").datepicker();
            $("#emissionData14").datepicker("option", "dateFormat", "yy-mm-dd");
            $("#closeData14").datepicker();
            $("#closeData14").datepicker("option", "dateFormat", "yy-mm-dd");

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
            * _____________________Istruzioni per l'invio dei dati_________________________
            */
            $("#save").bind('click', function() {


            //document.close();
            var vendorName = $("#vendorName").val();
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
            var otherCertificate = $("#otherCertificate").val();
            var emissionData9 = $("#emissionData9").val();
            var emissionData14 = $("#emissionData14").val();
            var closeData9 = $("#closeData9").val();
            var closeData14 = $("#closeData14").val();
            var certificationClass = $("#certificationClass").val();
            var activity = $("#activity").val();
            var stateInformation = $("#stateInformation").val();
            var product1 = $("#product1").val();
            var product2 = $("#product2").val();
            var product3 = $("#product3").val();

            var newVendor = "vendorName=" + vendorName + "&" + "vendorCode=" + vendorCode + "&" + "address=" + address + "&" + "zipCode=" + zipCode + "&" + "city=" + city + "\n\
            &county=" + county + "&state=" + state + "&country=" + country + "&telephone=" + telephone + "\n\
            &fax=" + fax + "&email=" + email + "&contactPerson=" + contactPerson + "&webSite=" + webSite + "\n\
            &lineOfBusiness=" + lineOfBusiness + "&mobilePhone=" + mobilePhone + "&otherContact=" + otherContact + "&duns=" + duns + "\n\
            &other=" + other + "&otherCertificate=" + otherCertificate + "\n\
            &emissionData9=" + emissionData9 + "&closeData9=" + closeData9 + "&emissionData14=" + emissionData14 + "&closeData14=" + closeData14 + "&certificationClass=" + certificationClass + "&activity=" + activity + "&stateInformation=" + stateInformation + "&product1=" + product1 + "&product2=" + product2 + "&product3=" + product3;

            if (controlVendorCode() && controlVendorName()) {
            $.ajax("./Control/addVendor.php?" + newVendor, {
            dataType: 'html',
            success: function(data, status, xhr) {
            //  alert(data);
            if (data == "1062") {

            $("#IdErrordialog").dialog("open");
            } else {
            location.href = "./index.php";
            }
            }
            });
            } else
            $("#NoIDErrordialog").dialog("open");
            });

            /*
            * _____________________________________________________________________________________
            */

            $("#annulla").click(function() {
            $(window.location).attr('href', 'index.php');
            });


            $("#NCRdialog").dialog({
            autoOpen: false

            });
            $("#IdErrordialog").dialog({
            autoOpen: false

            });

            $("#NoIDErrordialog").dialog({
            autoOpen: false

            });


            $("#tabs").tabs();
            $("#NCRTabs").bind('click', function() {
            $("#NCRdialog").dialog("open");
            });

            /*Controllo dei bottoni jquery*/
            $("input[type=button]")
            .button()
            .click(function(event) {
            event.preventDefault();
            });

            });





        </script><?php
    }

    public function setTitle() {
        ?>Add Vendor<?php
    }

    public function setNavigationBar() {
        ?>
        <!-- You can name the links with lowercase, they will be transformed to uppercase by CSS, we prefered to name them with uppercase to have the same effect with disabled stylesheet -->
        <ul id="mainNav">
            <li><a href="index.php">DASHBOARD</a></li>
            <li><a href="#" class="active">ADDVENDOR</a></li> <!-- Use the "active" class for the active menu item  -->
            <li><a href="searchVendor.php">SEARCH</a></li>
            <li><a href="manage.php">MANAGE</a></li>
            <li><a href="./report.php">REPORT</a></li>

            <li class="logout"><a href="#">LOGOUT</a></li>
        </ul>
        <?php
    }

}
?>
