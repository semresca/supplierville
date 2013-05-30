<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require_once "../Model/DBConnection.php";

/**
 * Description of DBManagement
 *
 * @author semresca
 */
class DBManagement {

    /**
     *
     * @var type 
     */
    private $myconnection;

    /**
     * 
     */
    function __construct() {
        $this->myconnection = new DBConnection();
    }

    /**
     * 
     */
    function writeOverview() {


        $vendorName = str_replace("&", "&amp;", $_REQUEST["vendorName"]);
        $vendorCode = $_REQUEST["vendorCode"];
        $address = $_REQUEST["address"];
        $zipCode = $_REQUEST["zipCode"];
        $city = $_REQUEST["city"];
        $county = $_REQUEST["county"];
        $state = $_REQUEST["state"];
        $country = $_REQUEST["country"];
        $telephone = $_REQUEST["telephone"];
        $fax = $_REQUEST["fax"];
        $email = $_REQUEST["email"];
        $contactPerson = $_REQUEST["contactPerson"];
        $webSite = $_REQUEST["webSite"];
        $lineOfBusiness = $_REQUEST["lineOfBusiness"];
        $mobilePhone = $_REQUEST["mobilePhone"];
        $otherContact = $_REQUEST["otherContact"];
        $duns = $_REQUEST["duns"];
        $other = $_REQUEST["other"];
        $otherCertificate = $_REQUEST["otherCertificate"];
        $class = $_REQUEST["certificationClass"];
        $stateInformation = $_REQUEST["stateInformation"];
        $activity = $_REQUEST["activity"];


        $response = $this->myconnection->query("INSERT INTO `Supplier` (`sup_name`, `sup_code`, `sup_address`, `sup_zipcode`, `sup_city`, `sup_county`, `sup_state`, `sup_country`, `sup_telephone`, `sup_fax`, `sup_email`, `sup_contactperson`, `sup_website`, `sup_lineofbusiness`, `sup_mobilephone`, `sup_othercontact`, `sup_duns`, `sup_other`, `sup_othercertificate`, `class_id`, `sta_id`, `act_id`)" . "
                         VALUES ('" . $vendorName . "','" . $vendorCode . "','" . $address . "','" . $zipCode . "','" . $city . "','" . $county . "','" . $state . "','" . $country . "','" . $telephone . "','" . $fax . "','" . $email . "','" . $contactPerson . "','" . $webSite . "','" . $lineOfBusiness . "','" . $mobilePhone . "','" . $otherContact . "','" . $duns . "','" . $other . "','" . $otherCertificate . "','" . $class . "','" . $stateInformation . "','" . $activity . "')");


        if ($response == 1) {
            $this->writeOverviewCertificate();
            $this->writeProducts();
        } else {
            return $response;
        }
        // echo $_REQUEST['emissionData9'];
    }

    private function writeProducts() {

        if ($_REQUEST['product1'] != "1") {
            $this->myconnection->query("INSERT INTO `sup_pro`(`sup_code`,`pro_id`) VALUES('{$_REQUEST["vendorCode"]}','{$_REQUEST["product1"]}')");
        }

        if ($_REQUEST['product2'] != "1") {
            $this->myconnection->query("INSERT INTO `sup_pro`(`sup_code`,`pro_id`) VALUES('{$_REQUEST["vendorCode"]}','{$_REQUEST["product2"]}')");
        }

        if ($_REQUEST['product3'] != "1") {
            $this->myconnection->query("INSERT INTO `sup_pro`(`sup_code`,`pro_id`) VALUES('{$_REQUEST["vendorCode"]}','{$_REQUEST["product3"]}')");
        }
    }

    private function writeOverviewCertificate() {



        $this->myconnection->query("INSERT INTO `CertificateISO9` (`sup_code`, `iso9_issue`, `iso9_close`) 
                        VALUES ('" . $_REQUEST["vendorCode"] . "', '" . $_REQUEST['emissionData9'] . "','" . $_REQUEST['closeData9'] . "')");

        $this->myconnection->query("INSERT INTO `CertificateISO14` (`sup_code`, `iso14_issue`, `iso14_close`)
                        VALUES ('" . $_REQUEST["vendorCode"] . "', '" . $_REQUEST['emissionData14'] . "','" . $_REQUEST['closeData14'] . "')");
    }

    function writeNCR() {
        return $this->myconnection->query(
                        "INSERT INTO `NCR` (`ncr_id`, `ncr_issue`, `ncr_close`, `ncr_area`,`ncr_object`,`sup_code`) 
                    VALUES ('" . $_REQUEST["idNCR"] . "','" . $_REQUEST["issue"] . "','" . $_REQUEST["close"] . "','" . $_REQUEST["area"] . "','" . $_REQUEST["object"] . "','" . $_REQUEST["id"] . "')");
    }

    function updateNCR() {
        return $this->myconnection->query(
                        "UPDATE  `NCR` SET `ncr_issue`=  \"" . $_REQUEST["issue"] . "\",
                     `ncr_close`=\"" . $_REQUEST["close"] . "\",
                     `ncr_area`=\"" . $_REQUEST["area"] . "\",
                     `ncr_object`=\"" . $_REQUEST["object"] . "\" WHERE `ncr_id`=\"" . $_REQUEST["idNCR"] . "\";");
    }

    function deleteNCR() {
        return $this->myconnection->query("DELETE FROM `NCR` WHERE `ncr_id` = '" . $_REQUEST["idNCR"] . "'");
    }

    function loadNCR() {
        $result = $this->myconnection->query(
                "SELECT * FROM `NCR` WHERE sup_code = {$_REQUEST['id']}"
        );

        if ($result == TRUE) {
            $response = "";
            while (($newNCR = $result->fetch_object()) != FALSE) {

                $idNCR = $newNCR->ncr_id;
                $issue = $newNCR->ncr_issue;
                $close = $newNCR->ncr_close;
                $area = $newNCR->ncr_area;
                $object = $newNCR->ncr_object;



                $response.="<tr id=\"NCR_" . $idNCR . "\">
                            <td><span name=\"idNCRAdd\" id=\"" . $idNCR . "\"> " . $idNCR . "</span> </td>
                            <td><span name=\"issue\" id=\"" . $idNCR . "_" . $issue . "\">" . $issue . " </span>  </td>
                            <td><span name=\"close\" id=\"" . $idNCR . "_" . $close . "\">" . $close . " </span>  </td>
                            <td><span name=\"area\" id=\"" . $idNCR . "_" . $area . "\" > " . $area . " </span>  </td>
                            <td><span name=\"object\" id=\"" . $idNCR . "_" . $object . "\">" . $object . "</span>  </td> 
                            <td><a href='#'  id=\"" . $idNCR . "\"  name='modify' onclick=\"changeView('" . $idNCR . "','" . $issue . "','" . $close . "','" . $area . "','" . $object . "','" . $_REQUEST['id'] . "')\"><img id=\"NCR_" . $idNCR . ")\" src='View/Images/modify.png' alt='Modify' height='16' width='16'></a>  
                              &nbsp&nbsp&nbsp<a href='#'  id=\"" . $idNCR . "\"  name='delete' onclick=\"deleteNCR('" . $idNCR . "')\"><img id=\"NCR_" . $idNCR . ")\" src='View/Images/delete.png' alt='Delete' height='16' width='16'></a></td>  
                        </tr>";
            }
            return $response;
        }
    }

    /**
     * 
     * @param type $id
     */
    function deleteVendor() {
        $this->myconnection->query("DELETE FROM `Supplier` WHERE `sup_code` = '" . $_REQUEST["id"] . "'");
    }

    function loadVendorOverview() {

        $result = $this->myconnection->query("SELECT * 
                    FROM Supplier 
                    WHERE sup_code LIKE '" . $_REQUEST["id"] . "'");
        $getted = $result->fetch_object();
        //$getted=$result->fetch_object();

        return $this->vendorToXML($this->loadVendorProduct($getted));
    }

    private function loadVendorProduct($getted) {
        $totale = $this->myconnection->query("SELECT `pro_id`, count('pro_id') totale FROM `sup_pro` WHERE `sup_code` LIKE '{$getted->sup_code}'");
        $prodotti = $this->myconnection->query("SELECT `pro_id` FROM `sup_pro` WHERE `sup_code` LIKE '{$getted->sup_code}'");

        $pro1 = "1";
        $pro2 = "1";
        $pro3 = "1";

        $tot = $totale->fetch_object()->totale;
        if ($tot == "3") {
            $pro1 = $prodotti->fetch_object()->pro_id;
            $pro2 = $prodotti->fetch_object()->pro_id;
            $pro3 = $prodotti->fetch_object()->pro_id;
        } else if ($tot == "2") {
            $pro1 = $prodotti->fetch_object()->pro_id;
            $pro2 = $prodotti->fetch_object()->pro_id;
        } else if ($tot == "1") {
            $pro1 = $prodotti->fetch_object()->pro_id;
        }

        $getted->pro1 = $pro1;
        $getted->pro2 = $pro2;
        $getted->pro3 = $pro3;

        return $getted;
    }

    function loadVendorCertificateISO9() {
        $result = $this->myconnection->query("SELECT * 
                    FROM CertificateISO9 
                    WHERE sup_code LIKE '" . $_REQUEST["id"] . "'");
        $getted = $result->fetch_array(MYSQLI_NUM);

        if (count($getted) == 0)
            return "";
        else
            return $this->toCSV($getted);
    }

    function loadVendorCertificateISO14() {
        $result = $this->myconnection->query("SELECT * 
                    FROM CertificateISO14 
                    WHERE sup_code LIKE '" . $_REQUEST["id"] . "'");
        $getted = $result->fetch_array(MYSQLI_NUM);
        if (count($getted) == 0)
            return "";
        else
            return $this->toCSV($getted);
    }

    function modifyOverview() {


        $vendorName = $_REQUEST["vendorName"];
        $vendorCode = $_REQUEST["vendorCode"];
        $address = $_REQUEST["address"];
        $zipCode = $_REQUEST["zipCode"];
        $city = $_REQUEST["city"];
        $county = $_REQUEST["county"];
        $state = $_REQUEST["state"];
        $country = $_REQUEST["country"];
        $telephone = $_REQUEST["telephone"];
        $fax = $_REQUEST["fax"];
        $email = $_REQUEST["email"];
        $contactPerson = $_REQUEST["contactPerson"];
        $webSite = $_REQUEST["webSite"];
        $lineOfBusiness = $_REQUEST["lineOfBusiness"];
        $mobilePhone = $_REQUEST["mobilePhone"];
        $otherContact = $_REQUEST["otherContact"];
        $duns = $_REQUEST["duns"];
        $other = $_REQUEST["other"];
        $otherCertificate = $_REQUEST["otherCertificate"];
        $class = $_REQUEST["certificationClass"];
        $stateInformation = $_REQUEST["stateInformation"];
        $activity = $_REQUEST["activity"];


        $this->myconnection->query("UPDATE `Supplier`  SET
            `sup_name`='{$vendorName}',
            `sup_address`='{$address}', 
            `sup_zipcode`='{$zipCode}', 
            `sup_city`='{$city}', 
            `sup_county`='{$county}', 
            `sup_state`='{$state}', 
            `sup_country`='{$country}', 
            `sup_telephone`='{$telephone}', 
            `sup_fax`='{$fax}', 
            `sup_email`='{$email}', 
            `sup_contactperson`='{$contactPerson}', 
            `sup_website`='{$webSite}', 
            `sup_lineofbusiness`='{$lineOfBusiness}', 
            `sup_mobilephone`='{$mobilePhone}', 
            `sup_othercontact`='{$otherContact}', 
            `sup_duns`='{$duns}', 
            `sup_other`='{$other}', 
            `sup_othercertificate`='{$otherCertificate}', 
            `class_id`='{$class}', 
            `sta_id`='{$stateInformation}', 
            `act_id`='{$activity}' 
            WHERE `sup_code`='{$vendorCode}'"
        );

        $this->modifyOverviewCertificate();
        $this->deleteProducts();
        $this->writeProducts();
    }

    private function deleteProducts() {
        $this->myconnection->query("DELETE FROM `sup_pro` 
            WHERE `sup_code` = '{$_REQUEST["vendorCode"]}'");
    }

    private function modifyOverviewCertificate() {

        $result = $this->myconnection->query("SELECT COUNT(  `sup_code` ) 
                        FROM  `CertificateISO9` 
                        WHERE  `sup_code` =  '{$_REQUEST['vendorCode']}'");

        $getted = $result->fetch_array(MYSQLI_NUM);

        if ($getted[0] == 0) {
            $this->myconnection->query("INSERT INTO `CertificateISO9`  (`iso9_issue`,`iso9_close`,`sup_code`) 
                          VALUES ('{$_REQUEST['emissionData9']}','{$_REQUEST['closeData9']}','{$_REQUEST['vendorCode']}') "
            );
        } else {


            $this->myconnection->query("UPDATE `CertificateISO9` SET
                `iso9_issue`='{$_REQUEST['emissionData9']}', 
                `iso9_close`='{$_REQUEST['closeData9']}'
                WHERE `sup_code`='{$_REQUEST['vendorCode']}'
            "
            );
        }

        $result = $this->myconnection->query("SELECT COUNT(  `sup_code` ) 
                        FROM  `CertificateISO14` 
                        WHERE  `sup_code` =  '{$_REQUEST['vendorCode']}'");

        $getted = $result->fetch_array(MYSQLI_NUM);

        if ($getted[0] == 0) {
            $this->myconnection->query("INSERT INTO `CertificateISO14`  (`iso14_issue`,`iso14_close`,`sup_code`) 
                          VALUES ('{$_REQUEST['emissionData14']}','{$_REQUEST['closeData14']}','{$_REQUEST['vendorCode']}') "
            );
        } else {


            $this->myconnection->query("UPDATE `CertificateISO14` SET
                `iso14_issue`='{$_REQUEST['emissionData14']}', 
                `iso14_close`='{$_REQUEST['closeData14']}'
                WHERE `sup_code`='{$_REQUEST['vendorCode']}'
            "
            );
        }
    }

    /**
     * 
     * @param string $type 0=Act, 1=Class, 2=State, 3=Product
     * @param type $option
     */
    function addOption($type, $option) {
        if ($type == "0")
            $this->myconnection->query("INSERT INTO `Attivita` (`act_description`) VALUES('{$option}')");
        else if ($type == "1")
            $this->myconnection->query("INSERT INTO `Classi` (`class_description`) VALUES('{$option}')");
        else if ($type == "2")
            $this->myconnection->query("INSERT INTO `Stati` (`sta_description`) VALUES('{$option}')");
        else if ($type == "3")
            $this->myconnection->query("INSERT INTO `Prodotti` (`description`) VALUES('{$option}')");
    }

    private function vendorToXML($vendor) {

        $xml = "<response><name>{$vendor->sup_name}</name> 
                    <code>{$vendor->sup_code}</code>
                        <address>{$vendor->sup_address}</address>
                            <zipcode>{$vendor->sup_zipcode}</zipcode>
                                <city>{$vendor->sup_city}</city>
                                    <county>{$vendor->sup_county}</county>
                                        <state>{$vendor->sup_state}</state>
                                            <country>{$vendor->sup_country}</country>
                                                <telephone>{$vendor->sup_telephone}</telephone>
                                                    <fax>{$vendor->sup_fax}</fax>
                                                        <email>{$vendor->sup_email}</email>
                                                            <contactperson>{$vendor->sup_contactperson}</contactperson>
                                                                <website>{$vendor->sup_website}</website>
                                                                    <lineofbusiness>{$vendor->sup_lineofbusiness}</lineofbusiness>
                                                                        <mobilephone>{$vendor->sup_mobilephone}</mobilephone>
                                                                            <othercontact>{$vendor->sup_othercontact}</othercontact>
                                                                                <duns>{$vendor->sup_duns}</duns>
                                                                                    <other>{$vendor->sup_other}</other>
                                                                                        <othercertificate>{$vendor->sup_othercertificate}</othercertificate>
                                                                                            <class>{$vendor->class_id}</class>
                                                                                                <stateinformation>{$vendor->sta_id}</stateinformation>
                                                                                                    <activity>{$vendor->act_id}</activity>
                                                                                                    <product1>{$vendor->pro1}</product1>
                                                                                                <product2>{$vendor->pro2}</product2>
                                                                                                    <product3>{$vendor->pro3}</product3></response>";

        return $xml;
    }

    private function toCSV($vendorList) {

        $csvString = implode(';', $vendorList);
        return $csvString;
    }

}

?>
