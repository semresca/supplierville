<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'View/Template.php';

/**
 * Description of DashBoard
 *
 * @author semresca
 */
class DashBoard extends Template {

    public function setContent() {
        ?>

        <div id="login" title="EFFETTUA LOGIN">
            <br>
            <br>
            <img src="View/Images/splashScreen.png" width="491" height="115" alt="splashScreen"/>
            <br>
            <br>
            <form>
                <fieldset>
                    <br>
                    <br>
                    <div id="error"></div>
                    <br>
                    <label for="user"><h3>User</h3></label>
                    <input type="text" name="name" id="user" class="text ui-widget-content ui-corner-all" />
                    <label for="password"><h3>Password</h3></label>
                    <input type="password" name="password" id="password" value="" class="text ui-widget-content ui-corner-all" />
                </fieldset>
            </form>
        </div>
        <h2><a href="#">Dashboard</a>&raquo; <a href="#" class="active">Benvenuto in Supplierville!</a></h2>

        <br/>
        <br/>
        <br/>
        <br/><br/>
        <br/>


        <!--<div class="ui-widget">
            <div class="ui-state-error ui-corner-all" style="padding: 0 .7em; "> 
                <p>
                    <span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span>
                    <strong>Attenzione fornitori con certificazioni ISO 9001 SCADUTE:</strong> </p><br/><br/>

                <div id="scaduti">
                    <table id="scadutiTable9">
                        <thead>
                            <tr><th>ID</th> <th>Name</th> <th>Date</th></tr>             
                        </thead>
                    </table>
                </div>
                </p>
            </div>
        </div>
        <br>
        <br>
        <br>
        <div class="ui-widget">
            <div class="ui-state-error ui-corner-all" style="padding: 0 .7em; "> 
                <p>
                    <span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span>
                    <strong>Attenzione fornitori con certificazioni ISO 14001 SCADUTE:</strong></p><br/><br/>

                <div id="scaduti">
                    <table id="scadutiTable14">
                        <thead>
                            <tr><th>ID</th> <th>Name</th> <th>Date</th></tr>             
                        </thead>
                    </table>
                </div>
                </p>
            </div>
        </div>-->


        <h3>Novità</h3>

        <ul style="font-weight:bold">
            <li>Nuovo database: Al posto dei file CSV, il programma si basa su un database mySQL, molto più veloce e leggero.<br/>
                (ecco alcune aziende che utilizzano questa tecnologia: <a href="http://www.mysql.it/customers/">MySQL CUSTOMERS</a>) </li>

            <br/>
            <br/>
            <li>Nuova applicazione: L'applicazione è accessibile tramite un BROWSER, proprio come un sito web, questo permette di utilizzarla da diversi dispositivi(senza installazione)</li>
        </ul>

        <h3>Perchè un nuovo SUPPLIERVILLE?</h3>    

        <ul style="font-weight:bold">
            <li>Ho deciso di sviluppare una nuova versione del software sopratutto perchè sono venuto a conoscenza di nuove tecniche molto efficienti, che volevo sperimentare su un caso pratico</li>
            <br/>
            <br/>
            <li>Questa applicazione è stata realizzata per essere presentata al mio esame di maturità come progetto principale</li>
            <br/>
            <br/>

            <li style="color: red">L'applicazione non è ancora terminata</li>

            <br/>
            <br/>

        </ul> 

        <?php
    }

    public
            function setNavigationBar() {
        ?><ul id="mainNav">
            <li><a href="index.php" class="active">DASHBOARD</a></li>
            <li><a href="addVendor.php">ADDVENDOR</a></li> <!-- Use the "active" class for the active menu item  -->
            <li><a href="searchVendor.php">SEARCH</a></li>
            <li><a href="manage.php" >MANAGE</a></li>
            <li><a href="report.php">REPORT</a></li>

            <li class="logout"><a href="#">LOGOUT</a></li>
        </ul><?php
    }

    public function setScript() {
        ?>
        <script type="text/css">
            .ui-dialog-titlebar-close{
            display: none;
            }
        </script>
        <script type="text/javascript">

            $(function() {

            $("#login").dialog({
            autoOpen: false,
            height: 500,
            width: 650,
            modal: true,
            buttons: {
            "LOGIN": function() {
            var user = $("#user").val();
            var password = $("#password").val();
            $.ajax("Control/authuser.php?user=" + user + "&password=" + password, {
            type: "POST",
            dataType: 'html',
            success: function(data) {
            if (data == "1") location.href = "index.php";
            else $("#error").html("<b style=\"color: red\" >Errore credenziali</b>");
            }
            });
            }

            }

            });
            <?php
            if (isset($_SESSION["user"]) && isset($_SESSION["password"])) {
                ?>
                <?php
            } else {
                ?>
                $("#login").dialog("open");

            <?php }
            ?>

            });
        </script>


        <?php
    }

    public function setTitle() {
        ?>Dashboard<?php
    }

}
?>
