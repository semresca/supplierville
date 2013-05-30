 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


        <!-- CSS -->
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
        <!-- JavaScripts-->
        <script type="text/javascript" src="View/lib/jquery-1.9.1.min.js"></script>
        <script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>                                                                                                                                                                                                                                                                                                             <!--<script src="./xhtml/View/lib/jquery-1.9.1.min.js" type="text/javascript"></script>-->
        <script src="View/js/addVendorManager.js" type="text/javascript"></script>
        <script src="View/js/NCR.js" type="text/javascript"></script>
        <script src="View/js/CertificateIso.js" type="text/javascript"></script>
        <script src="View/js/control.js" type="text/javascript"></script>
        <script src="View/js/searchVendor.js" type="text/javascript"></script> 
        <style type="text/css">
            body {  }
            .big-link { display:block; margin-top: 100px; text-align: center; font-size: 70px; color: #06f; }
        </style>
        <script type="text/javascript">

            $(document).ready(function() {
            $("#key").bind('keypress', function() {
            getSearchedResult($("#key").val(), $('input:radio[name=type]:checked').val());

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



            });

            function getIdDelete(element) {
            openDialogDeleteSupplier(element.id);
            }

            function getIdModify(element) {
            modifySupplier(element.id);
            }


        </script>

    </head>

    <body>
        <div id="tabs">

            <ul>
                <li><a href="#tabs-1">Search</a></li>
            </ul>
            <div id="tabs-1">
                <div id="search">
                    <input type="text" id="key" name="key"/>
                    <input type="button" id="doSearch" name="doSearch" value="Search"/>
                </div>

                <div id="filters">
                    <table id="filtersTable">

                        <tr>
                            <td><input type="radio" name="type" id="type" value="name" checked/> Name</td>
                            <td><input type="radio" name="type" id="type" value="code"/> Code</td>
                        </tr>

                        <tr>
                            <td><input type="radio" name="type" id="type" value="activity"/> Activity </td>
                            <td><input type="radio" name="type" id="type" value="product"/> Product</td>
                        </tr>

                        <tr>
                            <td><input type="radio" name="type" id="type" value="state"/> State </td>
                            <td><input type="radio" name="type" id="type" value="class"/> Class </td>
                        </tr>
                    </table>



                </div>

                <div id="found">

                   <!-- <p><span class="ui-icon ui-icon-alert" style="float: left; margin: 0 7px 20px 0;"></span>Vuoi cancellare veramente il fornitore?</p>
                </div>           <!--RESULT AJAX REQUEST-->    
                </div>

                <div id="dialog-confirm" title="Cancellare il fornitore?">
                    <p><span class="ui-icon ui-icon-alert" style="float: left; margin: 0 7px 20px 0;"></span>Vuoi cancellare veramente il fornitore?</p>
                </div>
                </body>
                </html>