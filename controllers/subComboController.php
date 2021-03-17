<?php

include '../models/subCombo.php';

/**
 * @author Ruwan Jayawardena
 */
$ctrl = new SubCombo();
if (array_key_exists("action", $_POST)) {
	if ($_POST['action'] == "getAllSubCombo") {
		$ctrl->setScmb_maincmb($_POST['scmb_maincmb']);
		$ctrl->setScmb_relatecmb($_POST['scmb_relatecmb']);
		$ctrl->setScmb_relationship($_POST['scmb_relationship']);
		$ctrl->getAllSubCombo();
	} else if ($_POST['action'] == "getSubComboByID") {
		$ctrl->setScmb_id($_POST['scmb_id']);
		$ctrl->getSubComboByID();
	} else if ($_POST['action'] == "cmbSubCombo") {
		$ctrl->setScmb_maincmb($_POST['mcmb_id']);		
		$ctrl->cmbSubCombo();
	} else if ($_POST['action'] == "deleteSubCombo") {
		$ctrl->setScmb_id($_POST['scmb_id']);
		$ctrl->deleteSubCombo();
	} else if ($_POST['action'] == "saveSubCombo") {
		$ctrl->setScmb_name($_POST['scmb_name']);
		$ctrl->setScmb_maincmb($_POST['scmb_maincmb']);
		$ctrl->setScmb_relatecmb($_POST['scmb_relatecmb']);
		$ctrl->setScmb_relationship($_POST['scmb_relationship']);
		$ctrl->saveSubCombo();
	} else if ($_POST['action'] == 'editSubCombo') {
		$ctrl->setScmb_id($_POST['scmb_id']);
		$ctrl->setScmb_name($_POST['scmb_name']);
		$ctrl->editSubCombo();
	}
	//main combo box
	else if ($_POST['action'] == 'getMainComboInfoByID') {
		$ctrl->setMcmb_id($_POST['mcmb_id']);
		$ctrl->getMainComboInfoByID();
	}
	//relate combo box
	else if ($_POST['action'] == 'saveRelateCombo') {
		$ctrl->setMcmb_id($_POST['mcmb_id']);
		$ctrl->setRlcmb_name($_POST['rlcmb_name']);
		$ctrl->saveRelateCombo();
	} else if ($_POST['action'] == 'editRelateCombo') {
		$ctrl->setRlcmb_id($_POST['rlcmb_id']);
		$ctrl->setRlcmb_name($_POST['rlcmb_name']);
		$ctrl->editRelateCombo();
	} else if ($_POST['action'] == 'deleteRelateCombo') {
		$ctrl->setRlcmb_id($_POST['rlcmb_id']);
		$ctrl->deleteRelateCombo();	
	} else if ($_POST['action'] == 'getAllRelateCombo') {
		$ctrl->setMcmb_id($_POST['mcmb_id']);
		$ctrl->getAllRelateCombo();	
	} else if ($_POST['action'] == 'getRelateComboByID') {
		$ctrl->setRlcmb_id($_POST['rlcmb_id']);
		$ctrl->getRelateComboByID();	
	} else if ($_POST['action'] == 'cmbRelateCombo') {
		$ctrl->setMcmb_id($_POST['mcmb_id']);
		$ctrl->cmbRelateCombo();	
	} 
	else if ($_POST['action'] == 'cmbRelateSubCombo') {
		$ctrl->setMcmb_id($_POST['mcmb_id']);
		$ctrl->setRlcmb_id($_POST['rlcmb_id']);		
		$ctrl->cmbRelateSubCombo();	
	} 
	//Relate Sub Combo
	else if ($_POST['action'] == 'editRelateSubCombo') {
		$ctrl->setScmb_id($_POST['scmb_id']);
		$ctrl->setScmb_name($_POST['scmb_name']);
		$ctrl->setScmb_relatecmb($_POST['scmb_relatecmb']);
		$ctrl->editRelateSubCombo();	
	}
}