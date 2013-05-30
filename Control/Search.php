<?php

require_once '../Model/DBConnection.php';
require_once '../Model/Pager.php';

class Search {

    private $myconnection;
    private $pager;

    function __construct() {
        $this->myconnection = new DBConnection();
        $this->pager = new Pager();
    }

    /**
     * 
     * @param type $name
     * @return string
     */
    function searchSupplierByName($name, $number) {

        $resultN = $this->myconnection->query("SELECT count(sup_code) total
            FROM Supplier 
            WHERE sup_name LIKE '" . $name . "_%'");
        $tmp = $resultN->fetch_object();
        $previous = $this->pager->getNumberElement() * ($number - 1);
        $totalRows = $tmp->total;
        $pagination = $this->pager->createPagination($totalRows, $number);



        $found = FALSE;
        $result = $this->myconnection->query("SELECT * 
            FROM Supplier 
            WHERE sup_name LIKE '" . $name . "_%' ORDER BY(`sup_code`) LIMIT {$previous}, {$this->pager->getNumberElement()}");
        $table = "<table><thead><tr><th>ID</th><th>Nome</th></tr></thead><tbody>";

        while (($tmp = $result->fetch_object()) != FALSE) {
            $found = TRUE;
            $table.="<tr><td>{$tmp->sup_code}</td><td>{$tmp->sup_name}</td><td> <a href='#' id='{$tmp->sup_code}'  name='delete' onclick='getIdDelete(this)'> <img name='delete'id='{$tmp->sup_code}' src='View/Images/delete.png' alt='Delete' height='16' width='16'></a>
                     &nbsp&nbsp&nbsp<a href='#'  id='{$tmp->sup_code}'  name='modify' onclick='getIdModify(this)'><img id='{$tmp->sup_code}' src='View/Images/modify.png' alt='Modify' height='16' width='16'></a></td></tr>";
        }

        $table.="</tbody></table>" . $pagination;
        if (!$found)
            return "<h4>No results found!</h4>";
        return $table;
    }

    /**
     * 
     * @param type $code
     * @return string
     */
    function searchSupplierByCode($code, $number) {

        $resultN = $this->myconnection->query("SELECT count(sup_code) total
            FROM Supplier 
            WHERE sup_code LIKE '" . $code . "%'");
        $tmp = $resultN->fetch_object();
        $previous = $this->pager->getNumberElement() * ($number - 1);
        $totalRows = $tmp->total;
        $pagination = $this->pager->createPagination($totalRows, $number);



        $found = FALSE;

        $result = $this->myconnection->query("SELECT * 
            FROM Supplier 
                WHERE sup_code LIKE '" . $code . "%'  ORDER BY(`sup_code`) LIMIT {$previous}, {$this->pager->getNumberElement()}");
        $table = "<table><thead><tr><th>ID</th><th>Nome</th></tr></thead><tbody>";

        while (($tmp = $result->fetch_object()) != FALSE) {
            $found = TRUE;
            $table.="<tr><td>{$tmp->sup_code}</td><td>{$tmp->sup_name}</td><td>  <a id='{$tmp->sup_code}'  name='delete' onclick='getIdDelete(this)'><img name='delete' id='{$tmp->sup_code}' src='View/Images/delete.png' alt='Delete' height='16' width='16'></a>
                     &nbsp&nbsp&nbsp<a href='#'  id='{$tmp->sup_code}'  name='modify' onclick='getIdModify(this)'><img id='{$tmp->sup_code}' src='View/Images/modify.png' alt='Modify' height='16' width='16'></a></td></tr>";
        }

        $table.="</tbody></table>" . $pagination;
        if (!$found)
            return "<h4>No results found!</h4>";
        return $table;
    }

    /**
     * 
     * @param type $activity
     * @return string
     */
    function searchSupplierByActivity($activity, $number) {

        $resultN = $this->myconnection->query("SELECT count(sup_code) total
            FROM Supplier 
             JOIN Attivita USING(act_id)
            WHERE act_description LIKE '" . $activity . "_%'");

        $tmp = $resultN->fetch_object();
        $previous = $this->pager->getNumberElement() * ($number - 1);
        $totalRows = $tmp->total;
        $pagination = $this->pager->createPagination($totalRows, $number);

        $found = FALSE;
        $tableInit = "<table   id='newid'><thead><tr><th>ID</th><th>Name</th><th>Activity</th></tr></thead><tbody>";

        $result = $this->myconnection->query("SELECT sup_name, sup_code, act_description
            FROM Supplier 
                JOIN Attivita USING(act_id) 
            WHERE act_description LIKE '" . $activity . "_%' ORDER BY(`sup_code`)  LIMIT {$previous},{$this->pager->getNumberElement()}");

        while ($tmp = $result->fetch_object()) {
            $found = TRUE;
            $tableInit.="<tr><td>{$tmp->sup_code}</td><td>{$tmp->sup_name}</td><td width='200'>{$tmp->act_description}</td><td> <a id='{$tmp->sup_code}'  name='delete' onclick='getIdDelete(this)'><img name='delete' id='{$tmp->sup_code}' src='View/Images/delete.png' alt='Delete' height='16' width='16'></a>
                     &nbsp&nbsp&nbsp<a href='#'  id='{$tmp->sup_code}'  name='modify' onclick='getIdModify(this)'><img id='{$tmp->sup_code}' src='View/Images/modify.png' alt='Modify' height='16' width='16'></a></td></tr>";
        }

        $tableInit.="</tbody></table>" . $pagination;

        if (!$found)
            return "<h4>No results found!</h4>";
        return $tableInit;
    }

    /**
     * 
     * @param type $class
     * @return string
     */
    function searchSupplierByClass($class, $number) {


        $resultN = $this->myconnection->query("SELECT count(sup_code) total
            FROM Supplier 
             JOIN Classi USING(class_id)
            WHERE class_description LIKE '" . $class . "_%'");

        $tmp = $resultN->fetch_object();
        $previous = $this->pager->getNumberElement() * ($number - 1);
        $totalRows = $tmp->total;
        $pagination = $this->pager->createPagination($totalRows, $number);


        $found = FALSE;
        $tableInit = "<table><thead><tr><th>ID</th><th>Name</th><th>Class</th></tr></thead><tbody>";

        $result = $this->myconnection->query("SELECT sup_name, sup_code, class_description
            FROM Supplier 
                JOIN Classi USING(class_id)
            WHERE class_description LIKE '" . $class . "_%' ORDER BY('sup_code') LIMIT {$previous}, {$this->pager->getNumberElement()}");

        while ($tmp = $result->fetch_object()) {
            $found = TRUE;
            $tableInit.="<tr><td>{$tmp->sup_code}</td>
                    <td>{$tmp->sup_name}</td>
                        <td width= '200'>{$tmp->class_description}</td><td> <a id='{$tmp->sup_code}'  name='delete' onclick='getIdDelete(this)'><img name='delete' id='{$tmp->sup_code}' src='View/Images/delete.png' alt='Delete' height='16' width='16'></a>
                     &nbsp&nbsp&nbsp<a href='#'  id='{$tmp->sup_code}'  name='modify' onclick='getIdModify(this)'><img id='{$tmp->sup_code}' src='View/Images/modify.png' alt='Modify' height='16' width='16'></a></td></tr>";
        }

        $tableInit.="</tbody></table>" . $pagination;

        if (!$found)
            return "<h4>No results found!</h4>";
        return $tableInit;
    }

    /**
     * 
     * @param type $state
     * @return string
     */
    function searchSupplierByState($state, $number) {

        $resultN = $this->myconnection->query("SELECT count(sup_code) total
            FROM Supplier 
             JOIN Stati USING(sta_id)
            WHERE sta_description LIKE '" . $state . "_%'");

        $tmp = $resultN->fetch_object();
        $previous = $this->pager->getNumberElement() * ($number - 1);
        $totalRows = $tmp->total;
        $pagination = $this->pager->createPagination($totalRows, $number);

        $found = FALSE;
        $tableInit = "<table><thead><tr><th>ID</th><th>Name</th><th>State</th></tr></thead><tbody>";

        $result = $this->myconnection->query("SELECT sup_name, sup_code, sta_description
            FROM Supplier 
                JOIN Stati USING(sta_id)
            WHERE sta_description LIKE '" . $state . "_%' ORDER BY(`sup_code`) LIMIT {$previous},{$this->pager->getNumberElement()}");

        while ($tmp = $result->fetch_object()) {
            $found = TRUE;
            $tableInit.="<tr><td>{$tmp->sup_code}</td><td>{$tmp->sup_name}</td><td width='200'>{$tmp->sta_description}</td><td> <a id='{$tmp->sup_code}'  name='delete' onclick='getIdDelete(this)'> <img name='delete' id='{$tmp->sup_code}' src='View/Images/delete.png' alt='Delete' height='16' width='16'></a>
                     &nbsp&nbsp&nbsp<a href='#'  id='{$tmp->sup_code}'  name='modify' onclick='getIdModify(this)'><img id='{$tmp->sup_code}' src='View/Images/modify.png' alt='Modify' height='16' width='16'></a></td></tr>";
        }

        $tableInit.="</tbody></table>" . $pagination;

        if (!$found)
            return "<h4>No results found!</h4>";
        return $tableInit;
    }

}

?>
