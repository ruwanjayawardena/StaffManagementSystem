<?php

include '../models/district.php';

/**
 * @author Ruwan Jayawardena
 */
$ctrl = new District();
if (array_key_exists("action", $_POST)) {
    if ($_POST['action'] == "getAllDistrict") {        
        $ctrl->getAllDistrict();
    } else if ($_POST['action'] == "getDistrictByID") {
        $ctrl->setDtr_id($_POST['dtr_id']);
        $ctrl->getDistrictByID();
    } else if ($_POST['action'] == "cmbDistrict") {        
        $ctrl->cmbDistrict();
    } else if ($_POST['action'] == "deleteDistrict") {
        $ctrl->setDtr_id($_POST['dtr_id']);
        $ctrl->deleteDistrict();
    } else if ($_POST['action'] == "saveDistrict") {
        $ctrl->setDtr_name($_POST['dtr_name']);       
        $ctrl->saveDistrict();
    } else if ($_POST['action'] == 'editDistrict') {
        $ctrl->setDtr_id($_POST['dtr_id']);
        $ctrl->setDtr_name($_POST['dtr_name']);       
        $ctrl->editDistrict();
    }
}