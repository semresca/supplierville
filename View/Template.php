<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Template
 *
 * @author semresca
 */
abstract class Template {

    abstract function setTitle();

    function setHeader() {
        ?>

        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml">
            <head>

                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                <title><?php $this->setTitle(); ?></title>
                <!-- CSS -->
                <link href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="stylesheet" type="text/css"></link>
                <link href="View/css/transdmin.css" rel="stylesheet" type="text/css" media="screen" />
                <!-- JavaScripts-->
                <script type="text/javascript" src="View/lib/jquery-1.9.1.min.js"></script>
                <script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>   
                <?php $this->setScript(); ?>
            </head>

            <?php
            }

            abstract function setScript();

            abstract function setNavigationBar();

            abstract

            function setContent();

            function

            setFooter() {
            ?>
            <p id="footer">Powered by   <b>Samuele Resca</b>  
                <a align="right" href="#"><img align="right"
                                               src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Transitional" height="31" width="88" /></a>

                <a align="right" href="#">
                    <img align="right" style="border:0;width:88px;height:31px"
                         src="http://jigsaw.w3.org/css-validator/images/vcss-blue"
                         alt="CSS Valido!" />
                </a>
            </p>












            <?php
            }
                    function

            show() {

            $this->
            setHeader();
            ?>

    












            <body>
                <div id="wrapper">
                    <!-- h1 tag stays for the logo, you can use the a tag for linking the index page -->
                    <h1><a href="#"><span>GEA</span></a></h1>
                    <?php
                    $this->
                    setNavigationBar();
                    ?>
                    <div id="containerHolder">
                        <div id="container">


                            <!-- h2 stays for breadcrumbs -->
                            <div id="main">
                                <br/>


        <?php $this->setContent() ?>
                            </div>
                            <!-- // #main -->
                            <div class="clear"></div>
                        </div>
                        <!-- // #container -->
                    </div>	
                    <!-- // #containerHolder -->
        <?php $this->setFooter();
        ?>
                </div>

            </body>
        </html>
        <?php
        }

        }


        