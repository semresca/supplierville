<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'View/Template.php';

/**
 * Description of AddOption
 *
 * @author samueleresca
 */
class Manage extends Template {

    public function setContent() {
        ?> 

        <h2><a href="#">Dashboard</a> &raquo; <a href="#" class="active">Add options</a></h2>

        <br/><br/><br/><br/><br/>
        <div id="tabs">            
            <ul>
                <li><a href="#tabs-1"><p id="titleH3">Add option</p></a></li>
            </ul>
            <div id="tabs-1">

                <div id="fornitoreAggiunto" class="ui-widget">
                    <div class="ui-state-highlight ui-corner-all" style="padding: 0 .7em; "> 
                        <p>
                            <span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span>
                            <b>E' stata aggiunta la nuova opzione</b>
                        </p>

                    </div>
                </div>

                <div id="addOptionDiv">

                </div>

                <div id="add">

                    <h3>Add:</h3>


                    <input type="radio" name="type" id="typeActivity" value="0" checked/> <label for="typeActivity">Activity</label>
                    <input type="radio" name="type" id="typeProduct" value="3"/> <label for="typeProduct">Product</label>
                    <input type="radio" name="type" id="typeState" value="2"/> <label for="typeState">State</label> 
                    <input type="radio" name="type" id="typeClass" value="1"/> <label for="typeClass">Class</label>


                </div>
                <br>

                <input type="text" name="newOption" id="newOption"  value="New option"/>
                &nbsp&nbsp&nbsp<input type="button" name="addOption" id="addOptionButton"  value="Add option"/>
            </div>
        </div>

        <br>


        <?php
    }

    public function setNavigationBar() {
        ?><ul id="mainNav">
            <li><a href="index.php" >DASHBOARD</a></li>
            <li><a href="addVendor.php">ADDVENDOR</a></li> <!-- Use the "active" class for the active menu item  -->
            <li><a href="searchVendor.php">SEARCH</a></li>
            <li><a href="manage.php" class="active">MANAGE</a></li>
            <li><a href="report.php">REPORT</a></li>

            <li class="logout"><a href="#">LOGOUT</a></li>
        </ul><?php
    }

    public function setScript() {
        ?>
        <script src="View/js/addOption.js" type="text/javascript"></script>
        <script>
            $(document).ready(function() {
            $("#tabs").tabs();

            $(function() {
            $("#add").buttonset();
            });
            $("tr:odd").addClass('alt');

            /*Controllo dei bottoni jquery*/
            $("input[type=button]")
            .button()
            .click(function(event) {
            event.preventDefault();
            setOptionToDB();
            });

            $("#fornitoreAggiunto").hide();
            });
        </script><?php
    }

    public function setTitle() {
        ?>Add option<?php
    }

}
?>
