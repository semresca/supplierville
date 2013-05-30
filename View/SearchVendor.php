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
class SearchVendor extends Template {

    public function setContent() {
        ?>

        <h2><a href="#">Dashboard</a> &raquo; <a href="#" class="active">Search vendor</a></h2>

        <br/><br/><br/><br/><br/>
        <div id="tabs">

            <ul>
                <li><a href="#tabs-1"><p id="titleH3">Search</p></a></li>
            </ul>
            <div id="tabs-1">
                <div id="search">
                    <br/>

                    <h3>Key: </h3><input size="25" type="text" id="key" name="key"/><input id="searchButton" type="button" value="Search" autofocus/>
                    <br/>

                </div>

                <div id="filters">

                    <h3>Search by:</h3>

                    <input type="radio" name="type" id="typeName" value="name" checked/> <label for="typeName">Name</label>
                    <input type="radio" name="type" id="typeSurname" value="code"/> <label for="typeSurname">Code</label>


                    <input type="radio" name="type" id="typeActivity" value="activity"/> <label for="typeActivity">Activity</label>
                    <input type="radio" name="type" id="typeProduct" value="product"/> <label for="typeProduct">Product</label>
                    <input type="radio" name="type" id="typeState" value="state"/> <label for="typeState">State</label> 
                    <input type="radio" name="type" id="typeClass" value="class"/> <label for="typeClass">Class</label>





                </div>
                <br/>
                <br/>
                <br/>
                <div id="found" class="ui-widget">
                    <!--JAVASCRIPT GENERATED CODE-->
                                                                                                                                                                                                                <!-- <p><span class="ui-icon ui-icon-alert" style="float: left; margin: 0 7px 20px 0;"></span>Vuoi cancellare veramente il fornitore?</                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                </div>           <!--RESULT AJAX REQUEST-->    
                </div>

            </div>
        </div>
        <br/>
        <br/>
        <br/>
        <div id="dialog-confirm" title="Cancellare il fornitore?">
            <p><span class="ui-icon ui-icon-alert" style="float: left; margin: 0 7px 20px 0;"></span>Vuoi cancellare veramente il fornitore?</p>
        </div><?php
    }

    public function setScript() {
        ?>                                                                                                                                                                                                                                                                                                          <!--<script src="./xhtml/View/lib/jquery-1.9.1.min.js" type="text/javascript"></script>-->
        <script src="View/js/addVendorManager.js" type="text/javascript"></script>
        <script src="View/js/control.js" type="text/javascript"></script>
        <script src="View/js/searchVendor.js" type="text/javascript"></script> 
        <style type="text/css">
            body {  }
            .big-link { display:block; margin-top: 100px; text-align: center; font-size: 70px; color: #06f; }
        </style>
        <script type="text/javascript">

            $(document).ready(function() {

            $("input:radio[name=type]").change(function() {

            eraseAll();
            });
            $("#searchButton").bind('click', function() {
            getSearchedResult(1);
            });

            $("#tabs").tabs();

            $("#dialog-confirm").dialog({
            resizable: false,
            height: 250,
            modal: true,
            autoOpen: false,
            buttons: {
            "Delete supplier": function() {
            deleteSupplier();
            },
            Cancel: function() {
            $(this).dialog("close");
            }
            }
            });

            /*Controllo dei bottoni jquery*/
            $("input[type=button]")
            .button()
            .click(function(event) {
            event.preventDefault();
            });

            });

            function getIdDelete(element) {
            openDialogDeleteSupplier(element.id);
            }
            function getIdModify(element) {
            modifySupplier(element.id);
            }

            $(function() {
            $("#filters").buttonset();
            });

            $("tr:odd").addClass('alt');

        </script><?php
    }

    public function setTitle() {
        ?>Search Vendor<?php
    }

    public function setNavigationBar() {
        ?>
        <!-- You can name the links with lowercase, they will be transformed to uppercase by CSS, we prefered to name them with uppercase to have the same effect with disabled stylesheet -->
        <ul id="mainNav">
            <li><a href="index.php">DASHBOARD</a></li>
            <li><a href="./addVendor.php">ADDVENDOR</a></li> <!-- Use the "active" class for the active menu item  -->
            <li><a href="./searchVendor.php"  class="active">SEARCH</a></li>
            <li><a href="manage.php">MANAGE</a></li>
            <li><a href="./report.php">REPORT</a></li>

            <li class="logout"><a href="#">LOGOUT</a></li>
        </ul>
        <?php
    }

}
?>
