<?php

include '../models/gndivision.php';

/**
 * @author Ruwan Jayawardena
 */
$ctrl = new GNDivision();
if (array_key_exists("action", $_POST)) {
    if ($_POST['action'] == "getAllGNDivision") {
        $ctrl->setGnd_dsoffice($_POST['gnd_dsoffice']);
        $ctrl->getAllGNDivision();
    } else if ($_POST['action'] == "getGNDivisionByID") {
        $ctrl->setGnd_id($_POST['gnd_id']);
        $ctrl->getGNDivisionByID();
    } else if ($_POST['action'] == "cmbGNDivision") {
        $ctrl->setGnd_dsoffice($_POST['gnd_dsoffice']);
        $ctrl->cmbGNDivision();
    } else if ($_POST['action'] == "deleteGNDivision") {
        $ctrl->setGnd_id($_POST['gnd_id']);
        $ctrl->deleteGNDivision();
    } else if ($_POST['action'] == "saveGNDivision") {
        $ctrl->setGnd_name($_POST['gnd_name']);
        $ctrl->setGnd_dsoffice($_POST['gnd_dsoffice']);
        $ctrl->saveGNDivision();
    } else if ($_POST['action'] == 'editGNDivision') {
        $ctrl->setGnd_id($_POST['gnd_id']);
        $ctrl->setGnd_name($_POST['gnd_name']);
        $ctrl->setGnd_dsoffice($_POST['gnd_dsoffice']);
        $ctrl->editGNDivision();
    }
}