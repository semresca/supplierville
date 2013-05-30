<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Pager
 *
 * @author samueleresca
 */
class Pager {

    private $numberElement;

    function __construct() {
        $this->numberElement = 30;
    }

    function createPagination($total, $startPage) {

        // return $totalRows;
        //echo $total;
        $pages = ceil($total / $this->numberElement);

        //echo $pages;
        $pagination = "";
        if ($pages > 1) {
            $pagination .= '<br><br><table cellpadding="5" WIDTH="5" class="paginate">';
            $i = $startPage;
            while ($i <= $pages && $i <= $startPage + 10) {
                $previous = $i - 1;
                if ($i == $startPage + 10) {
                    $pagination .= '<a href="#found" onClick="getSearchedResult(this.id)" style= "margin-left:5px;" class="paginate_click" id="' . $i . '">' . ">>" . '</a>';
                } else if ($i == $startPage && $i > 1) {
                    $pagination .= '<a href="#found" onClick="getSearchedResult(this.id)" style= "margin-left:5px;" class="paginate_click" id="' . $previous . '">' . "<<" . '</a>';
                }
                else
                    $pagination .= '<a href="#found" onClick="getSearchedResult(this.id)" style= "margin-left:5px;" class="paginate_click" id="' . $i . '">' . $i . '</a>';

                $i++;
            }
            $pagination .= "<tr><b style=\"margin-left: 30px\">Page: {$startPage}</b></tr>";
            $pagination .= '</table>';
        }

        return $pagination;
    }

    function getNumberElement() {
        return $this->numberElement;
    }

}