
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


        <!-- CSS -->
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
        <!-- JavaScripts-->
        <script type="text/javascript" src="View/lib/jquery-1.9.1.min.js"></script>
        <script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>                                                                                                                                                                                                                                                                                    <!--<script src="./xhtml/View/lib/jquery-1.9.1.min.js" type="text/javascript"></script>-->
        <script src="View/js/addVendorManager.js" type="text/javascript"></script>
        <script src="View/js/control.js" type="text/javascript"></script>
        <script src="View/js/modifyVendor.js" type="text/javascript"></script>
        <!-- <script src="View/js/jquery.msgBox.js" type="text/javascript"></script>-->

        <script type="text/javascript">
            /**
            * Elenco dei NCR aggiunti
            */

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


            getOverview(<?php
            echo $_REQUEST['id'];
            ?>);

            getCertificateISO9(<?php
            echo $_REQUEST['id'];
            ?>);
            getCertificateISO14(<?php
            echo $_REQUEST['id'];
            ?>);


            getNCR(<?php
            echo $_REQUEST['id'];
            ?>);

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

            $("#saveNCR").bind('click', function() {
            setNCR(<?php
            echo $_REQUEST["id"]
            ?>);
            });


            $("#issue").datepicker();
            $("#issue").datepicker("option", "dateFormat", "yy-mm-dd");
            $("#close").datepicker();
            $("#close").datepicker("option", "dateFormat", "yy-mm-dd");


            $("#tabs").tabs();


            });






        </script>

    </head>





    <div id="tabs">

        <ul>
            <li><a href="#tabs-1">Overview</a></li>
            <li><a href="#tabs-2" onclick="setCertificateISO()">Certificate</a></li>
            <li><a href="#tabs-3">No Conformity Report</a></li>
            <li><a href="#tabs-4" onclick="setInformationDetail()">Information Detail</a></li>
        </ul>
        <form action="Control/modifyVendor.php" id="addVendor" method="GET" name="addVendor">
            <div id="tabs-1">

                <table  id="overviewTable">
                    <tr>
                        <td id="vendorNameText">Vendor Name</td>
                        <td><input type="text" name="vendorName" id="vendorName" /></td>
                    </tr>
                    <tr>
                        <td id="vendorCodeText">Vendor Code</td>
                        <td><input type="text" name="vendorCode" id="vendorCode"  /></td>
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

                <!---  <div id="draggable" class="ui-widget-content">
                      <h3>Prima di poter modificare i NCR aggiungi il fornitore al database</h3>
             </div>-->


                <div id="nonConformityRep" style="visibility:"> 
                    <br/>
                    <br/>
                    <table id="NCRCertificates">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Issue</th>
                                <th>Close</th>
                                <th>Area</th>
                                <th>Object</th>
                            </tr>
                        </thead>
                        <tr >
                            <td><input type="text" id="idNCRAdd" name="idNCR"/></td>
                            <td><p><input type="text" id="issue" /></p></td>
                            <td> <p> <input type="text" id="close"/></p> </td>
                            <td><input type="text" id="area" name="area"/></td>
                            <td><input type="text" id="object" name="object"/></td>
                            <td><input type="button" id="saveNCR" value="Add New Certificate"/></td>
                        </tr>   

                        <tbody id="NCRbody">

<!--<tr id="">
     <td><span id="idNCRAdd"> </span> </td>
     <td><span id="issue"> </span>  </td>
     <td> <p> <span id="close"> </span>  </td>
     <td><span id="area" name="area"> </span>  </td>
     <td><span id="object" name="object">poòjkl </span>  </td>
     <td><span type="button" id="saveNCR" value="Save"/></td>
 </tr> -->  
                        </tbody>
                    </table>
                </div>

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


    <input type="button" value="Debug" onclick="meo()"/>
    <input type="button" id="save" value="Save" autofocus/>
    <input type="button" id="annulla" value="Annulla"/>

