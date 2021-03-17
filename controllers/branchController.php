<?php

include '../models/branch.php';

/**
 * @author Ruwan Jayawardena
 */
$ctrl = new Branch();
if (array_key_exists("action", $_POST)) {
    if ($_POST['action'] == "getAllBranch") {
        $ctrl->setBr_zone($_POST['br_zone']);
        $ctrl->getAllBranch();
    } else if ($_POST['action'] == "getBranchByID") {
        $ctrl->setBr_id($_POST['br_id']);
        $ctrl->getBranchByID();
    } else if ($_POST['action'] == "cmbBranch") {
        $ctrl->setBr_zone($_POST['br_zone']);
        $ctrl->cmbBranch();
    } else if ($_POST['action'] == "deleteBranch") {
        $ctrl->setBr_id($_POST['br_id']);
        $ctrl->deleteBranch();
    } else if ($_POST['action'] == "saveBranch") {
        $ctrl->setBr_name($_POST['br_name']);
        $ctrl->setBr_zone($_POST['br_zone']);
        $ctrl->saveBranch();
    } else if ($_POST['action'] == 'editBranch') {
        $ctrl->setBr_id($_POST['br_id']);
        $ctrl->setBr_name($_POST['br_name']);
        $ctrl->setBr_zone($_POST['br_zone']);
        $ctrl->editBranch();
    }
}