<?php

include '../models/dsoffice.php';

/**
 * @author Ruwan Jayawardena
 */
$ctrl = new DSOffice();
if (array_key_exists("action", $_POST)) {
    if ($_POST['action'] == "getAllDSOffice") {
        $ctrl->setDsof_district($_POST['dsof_district']);
        $ctrl->getAllDSOffice();
    } else if ($_POST['action'] == "getDSOfficeByID") {
        $ctrl->setDsof_id($_POST['dsof_id']);
        $ctrl->getDSOfficeByID();
    } else if ($_POST['action'] == "cmbDSOffice") {
        $ctrl->setDsof_district($_POST['dsof_district']);
        $ctrl->cmbDSOffice();
    } else if ($_POST['action'] == "deleteDSOffice") {
        $ctrl->setDsof_id($_POST['dsof_id']);
        $ctrl->deleteDSOffice();
    } else if ($_POST['action'] == "saveDSOffice") {
        $ctrl->setDsof_name($_POST['dsof_name']);
        $ctrl->setDsof_district($_POST['dsof_district']);
        $ctrl->saveDSOffice();
    } else if ($_POST['action'] == 'editDSOffice') {
        $ctrl->setDsof_id($_POST['dsof_id']);
        $ctrl->setDsof_name($_POST['dsof_name']);
        $ctrl->setDsof_district($_POST['dsof_district']);
        $ctrl->editDSOffice();
    }
}