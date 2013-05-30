<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'View/Template.php';

/**
 * Description of Report
 *
 * @author samueleresca
 */
class Report extends Template {

    public function setContent() {
        ?> 

 <h2><a href="#">Dashboard</a> &raquo; <a href="#" class="active">Report</a></h2>
        <br/><br/><br/><br/><br/>

        <div class="ui-widget" class="box">
            <div class="ui-state-error ui-corner-all" style="padding: 0 .7em; "> 
                <p>
                    <span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span>
                    <strong>Attenzione fornitori con certificazioni ISO 9001 SCADUTE:</strong> </p><br/><br/>

                <div id="scaduti" class="box">
                    <table id="scadutiTable9" class="tableExpired"     style=' width : 630px; height : 210px; overflow: auto'>
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

        <div class="ui-widget" class="box">
            <div class="ui-state-error ui-corner-all" style="padding: 0 .7em; "> 
                <p>
                    <span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span>
                    <strong>Attenzione fornitori con certificazioni ISO 14001 SCADUTE:</strong></p><br/><br/>

                <div id="scaduti" class="box">
                    <table id="scadutiTable14" class="tableExpired"     style=' width : 630px; height : 210px; overflow: auto'>
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
        <?php
    }

    public function setNavigationBar() {
        ?> <!-- You can name the links with lowercase, they will be transformed to uppercase by CSS, we prefered to name them with uppercase to have the same effect with disabled stylesheet -->
        <ul id="mainNav">
            <li><a href="index.php">DASHBOARD</a></li>
            <li><a href="./addVendor.php">ADDVENDOR</a></li> <!-- Use the "active" class for the active menu item  -->
            <li><a href="./searchVendor.php">SEARCH</a></li>
            <li><a href="manage.php">MANAGE</a></li>
            <li><a href="./report.php" class="active">REPORT</a></li>

            <li class="logout"><a href="#">LOGOUT</a></li>
        </ul><?php
    }

    public function setScript() {
        ?>
        <script type="application/javascript" src="View/chart/awesomechart.js"></script>
        <script type="application/javascript" src="View/js/report.js"></script>
        <style type="text/css">


        </style>
        <script type="text/javascript">
            getExpired9();
            getExpired14();

            function drawMyChart(){
            if(!!document.createElement('canvas').getContext){ //check that the canvas
            // element is supported
            var mychart = new AwesomeChart('chart1');
            mychart.title = "Product Sales - 2010";
            mychart.data = [1532, 3251, 3460, 1180, 6543];
            mychart.labels = ["Desktops", "Laptops", "Netbooks", "Tablets", "Smartphones"];
            mychart.draw();
            }
            }

            window.onload = drawMyChart;
        </script>
        <?php
    }

    public
            function setTitle() {
        ?>









        Report Page<?php
    }

}
?>
