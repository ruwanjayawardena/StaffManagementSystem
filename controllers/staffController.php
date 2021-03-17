<?php

include '../models/staff.php';

/**
 * @author Ruwan Jayawardena
 */
$ctrl = new Staff();
if (array_key_exists("action", $_POST)) {
	if ($_POST['action'] == "getAllStaff") {
		$ctrl->getAllStaff();
	} else if ($_POST['action'] == "getStaffByID") {
		$ctrl->setStf_id($_POST['stf_id']);
		$ctrl->getStaffByID();
	} else if ($_POST['action'] == "findStaffByNIC") {
		$ctrl->setStf_nic($_POST['stf_nic']);
		$ctrl->findStaffByNIC();
	} else if ($_POST['action'] == "getAllQualificationByStaffID") {
		$ctrl->setStf_id($_POST['stf_id']);
		$ctrl->getAllQualificationByStaffID();
	} else if ($_POST['action'] == "getAllChildrenByStaffID") {
		$ctrl->setStf_id($_POST['stf_id']);
		$ctrl->getAllChildrenByStaffID();
	} else if ($_POST['action'] == "getAllSpouseByStaffID") {
		$ctrl->setStf_id($_POST['stf_id']);
		$ctrl->getAllSpouseByStaffID();
	} else if ($_POST['action'] == "getAllServiceByStaffID") {
		$ctrl->setStf_id($_POST['stf_id']);
		$ctrl->getAllServiceByStaffID();
	} else if ($_POST['action'] == "getAllEbExamByStaffID") {
		$ctrl->setStf_id($_POST['stf_id']);
		$ctrl->setSev_id($_POST['sev_id']);
		$ctrl->getAllEbExamByStaffID();
	} else if ($_POST['action'] == "getQualificationByID") {
		$ctrl->setQu_id($_POST['qu_id']);
		$ctrl->getQualificationByID();
	} else if ($_POST['action'] == "getChildrenByID") {
		$ctrl->setCh_id($_POST['ch_id']);
		$ctrl->getChildrenByID();
	} else if ($_POST['action'] == "getEbExamByID") {
		$ctrl->setEx_id($_POST['ex_id']);
		$ctrl->getEbExamByID();
	} else if ($_POST['action'] == "getServiceByID") {
		$ctrl->setSev_id($_POST['sev_id']);
		$ctrl->getServiceByID();
	} else if ($_POST['action'] == "getSpouseByID") {
		$ctrl->setSp_id($_POST['sp_id']);
		$ctrl->getSpouseByID();
	} else if ($_POST['action'] == "deleteEbExam") {
		$ctrl->setEx_id($_POST['ex_id']);
		$ctrl->deleteEbExam();
	} else if ($_POST['action'] == "deleteStaff") {
		$ctrl->setStf_id($_POST['stf_id']);
		$ctrl->deleteStaff();
	} else if ($_POST['action'] == "deleteQualification") {
		$ctrl->setQu_id($_POST['qu_id']);
		$ctrl->deleteQualification();
	} else if ($_POST['action'] == "deleteChildren") {
		$ctrl->setCh_id($_POST['ch_id']);
		$ctrl->deleteChildren();
	} else if ($_POST['action'] == "deleteSpouse") {
		$ctrl->setSp_id($_POST['sp_id']);
		$ctrl->deleteSpouse();
	} else if ($_POST['action'] == "deleteService") {
		$ctrl->setSev_id($_POST['sev_id']);
		$ctrl->deleteService();
	} else if ($_POST['action'] == "saveStaff") {
		$ctrl->setStf_district($_POST['stf_district']);
		$ctrl->setStf_dsoffice($_POST['stf_dsoffice']);
		$ctrl->setStf_gndivision($_POST['stf_gndivision']);
		$ctrl->setStf_name_full($_POST['stf_name_full']);
		$ctrl->setStf_name_initial($_POST['stf_name_initial']);
		$ctrl->setStf_nic($_POST['stf_nic']);
		$ctrl->setStf_passport($_POST['stf_passport']);
		$ctrl->setStf_gender($_POST['stf_gender']);
		$ctrl->setStf_dob($_POST['stf_dob']);
		$ctrl->setStf_religion($_POST['stf_religion']);
		$ctrl->setStf_contact_resident($_POST['stf_contact_resident']);
		$ctrl->setStf_contact_mobile($_POST['stf_contact_mobile']);
		$ctrl->setStf_official_tel($_POST['stf_official_tel']);
		$ctrl->setStf_official_fax($_POST['stf_official_fax']);
		$ctrl->setStf_email($_POST['stf_email']);
		$ctrl->setStf_civil_status($_POST['stf_civil_status']);
		$ctrl->setStf_p_add1($_POST['stf_p_add1']);
		$ctrl->setStf_p_add2($_POST['stf_p_add2']);
		$ctrl->setStf_p_add3($_POST['stf_p_add3']);
		$ctrl->setStf_p_postalcode($_POST['stf_p_postalcode']);
		$ctrl->setStf_t_add1($_POST['stf_t_add1']);
		$ctrl->setStf_t_add2($_POST['stf_t_add2']);
		$ctrl->setStf_t_add3($_POST['stf_t_add3']);
		$ctrl->setStf_t_postalcode($_POST['stf_t_postalcode']);
		$ctrl->setStf_wop_number($_POST['stf_wop_number']);
		$ctrl->setStf_salary_increment_month($_POST['stf_salary_increment_month']);
		$ctrl->setStf_salary_increment_day($_POST['stf_salary_increment_day']);
		$ctrl->setStf_first_appoinment_date($_POST['stf_first_appoinment_date']);
		$ctrl->saveStaff();
	} else if ($_POST['action'] == "saveQualification") {
		$ctrl->setQu_institute($_POST['qu_institute']);
		$ctrl->setQu_title($_POST['qu_title']);
		$ctrl->setQu_year($_POST['qu_year']);
		$ctrl->setQu_desc($_POST['qu_desc']);
		$ctrl->setStf_id($_POST['stf_id']);
		$ctrl->saveQualification();
	} else if ($_POST['action'] == "saveChildren") {
		$ctrl->setCh_gender($_POST['ch_gender']);
		$ctrl->setCh_name($_POST['ch_name']);
		$ctrl->setCh_dob($_POST['ch_dob']);
		$ctrl->setStf_id($_POST['stf_id']);
		$ctrl->saveChildren();
	} else if ($_POST['action'] == "editQualification") {
		$ctrl->setQu_institute($_POST['qu_institute']);
		$ctrl->setQu_title($_POST['qu_title']);
		$ctrl->setQu_year($_POST['qu_year']);
		$ctrl->setQu_desc($_POST['qu_desc']);
		$ctrl->setQu_id($_POST['qu_id']);
		$ctrl->editQualification();
	}
	else if ($_POST['action'] == "saveEbExam") {
		$ctrl->setEx_ebexam($_POST['ex_ebexam']);
		$ctrl->setEx_year($_POST['ex_year']);
		$ctrl->setSev_id($_POST['sev_id']);
		$ctrl->setStf_id($_POST['stf_id']);
		$ctrl->saveEbExam();
	} 
	else if ($_POST['action'] == "savePensionStatus") {
		$ctrl->setStf_pension_date($_POST['stf_pension_date']);
		$ctrl->setStf_pension_status($_POST['stf_pension_status']);		
		$ctrl->setStf_id($_POST['stf_id']);	
		$ctrl->savePensionStatus();
	} 
	else if ($_POST['action'] == "editEbExam") {
		$ctrl->setEx_ebexam($_POST['ex_ebexam']);
		$ctrl->setEx_year($_POST['ex_year']);
		$ctrl->setEx_id($_POST['ex_id']);
		$ctrl->editEbExam();
	} else if ($_POST['action'] == "saveSpouse") {
		$ctrl->setSp_name_full($_POST['sp_name_full']);
		$ctrl->setSp_name_initial($_POST['sp_name_initial']);
		$ctrl->setSp_nic($_POST['sp_nic']);
		$ctrl->setSp_occup($_POST['sp_occup']);
		$ctrl->setSp_occup_type($_POST['sp_occup_type']);
		$ctrl->setSp_office_address($_POST['sp_office_address']);
		$ctrl->setSp_desig($_POST['sp_desig']);
		$ctrl->setStf_id($_POST['stf_id']);
		$ctrl->saveSpouse();
	} else if ($_POST['action'] == "saveService") {
		$ctrl->setSev_zonal($_POST['sev_zonal']);
		$ctrl->setSev_branch($_POST['sev_branch']);
		$ctrl->setSev_division($_POST['sev_division']);
		$ctrl->setSev_institute($_POST['sev_institute']);
		$ctrl->setSev_servicetype($_POST['sev_servicetype']);
		$ctrl->setSev_service($_POST['sev_service']);
		$ctrl->setSev_classgrade($_POST['sev_classgrade']);
		$ctrl->setSev_desig($_POST['sev_desig']);
		$ctrl->setSev_servicecategory($_POST['sev_servicecategory']);
		$ctrl->setSev_ap_pre_sevdate($_POST['sev_ap_pre_sevdate']);
		$ctrl->setSev_pre_sevfileno($_POST['sev_pre_sevfileno']);
		$ctrl->setSev_app_mode($_POST['sev_app_mode']);
		$ctrl->setSev_salarycode($_POST['sev_salarycode']);
		$ctrl->setSev_pre_salary($_POST['sev_pre_salary']);
		$ctrl->setStf_id($_POST['stf_id']);
		$ctrl->setSev_apo_date_cw($_POST['sev_apo_date_cw']);
		$ctrl->setSev_apo_date_pc($_POST['sev_apo_date_pc']);
		$ctrl->saveService();
	} else if ($_POST['action'] == "editService") {
		$ctrl->setSev_zonal($_POST['sev_zonal']);
		$ctrl->setSev_branch($_POST['sev_branch']);
		$ctrl->setSev_division($_POST['sev_division']);
		$ctrl->setSev_institute($_POST['sev_institute']);
		$ctrl->setSev_servicetype($_POST['sev_servicetype']);
		$ctrl->setSev_service($_POST['sev_service']);
		$ctrl->setSev_classgrade($_POST['sev_classgrade']);
		$ctrl->setSev_desig($_POST['sev_desig']);
		$ctrl->setSev_servicecategory($_POST['sev_servicecategory']);
		$ctrl->setSev_ap_pre_sevdate($_POST['sev_ap_pre_sevdate']);
		$ctrl->setSev_pre_sevfileno($_POST['sev_pre_sevfileno']);
		$ctrl->setSev_app_mode($_POST['sev_app_mode']);
		$ctrl->setSev_salarycode($_POST['sev_salarycode']);
		$ctrl->setSev_pre_salary($_POST['sev_pre_salary']);
		$ctrl->setSev_id($_POST['sev_id']);
		$ctrl->setSev_apo_date_cw($_POST['sev_apo_date_cw']);
		$ctrl->setSev_apo_date_pc($_POST['sev_apo_date_pc']);
		$ctrl->editService();
	} else if ($_POST['action'] == "editSpouse") {
		$ctrl->setSp_name_full($_POST['sp_name_full']);
		$ctrl->setSp_name_initial($_POST['sp_name_initial']);
		$ctrl->setSp_nic($_POST['sp_nic']);
		$ctrl->setSp_occup($_POST['sp_occup']);
		$ctrl->setSp_occup_type($_POST['sp_occup_type']);
		$ctrl->setSp_office_address($_POST['sp_office_address']);
		$ctrl->setSp_desig($_POST['sp_desig']);
		$ctrl->setSp_id($_POST['sp_id']);
		$ctrl->editSpouse();
	} else if ($_POST['action'] == "editChildren") {
		$ctrl->setCh_gender($_POST['ch_gender']);
		$ctrl->setCh_name($_POST['ch_name']);
		$ctrl->setCh_dob($_POST['ch_dob']);
		$ctrl->setStf_id($_POST['stf_id']);
		$ctrl->setCh_id($_POST['ch_id']);
		$ctrl->editChildren();
	} else if ($_POST['action'] == 'editStaff') {
		$ctrl->setStf_district($_POST['stf_district']);
		$ctrl->setStf_dsoffice($_POST['stf_dsoffice']);
		$ctrl->setStf_gndivision($_POST['stf_gndivision']);
		$ctrl->setStf_name_full($_POST['stf_name_full']);
		$ctrl->setStf_name_initial($_POST['stf_name_initial']);
		$ctrl->setStf_nic($_POST['stf_nic']);
		$ctrl->setStf_passport($_POST['stf_passport']);
		$ctrl->setStf_gender($_POST['stf_gender']);
		$ctrl->setStf_dob($_POST['stf_dob']);
		$ctrl->setStf_religion($_POST['stf_religion']);
		$ctrl->setStf_contact_resident($_POST['stf_contact_resident']);
		$ctrl->setStf_contact_mobile($_POST['stf_contact_mobile']);
		$ctrl->setStf_official_tel($_POST['stf_official_tel']);
		$ctrl->setStf_official_fax($_POST['stf_official_fax']);
		$ctrl->setStf_email($_POST['stf_email']);
		$ctrl->setStf_civil_status($_POST['stf_civil_status']);
		$ctrl->setStf_p_add1($_POST['stf_p_add1']);
		$ctrl->setStf_p_add2($_POST['stf_p_add2']);
		$ctrl->setStf_p_add3($_POST['stf_p_add3']);
		$ctrl->setStf_p_postalcode($_POST['stf_p_postalcode']);
		$ctrl->setStf_t_add1($_POST['stf_t_add1']);
		$ctrl->setStf_t_add2($_POST['stf_t_add2']);
		$ctrl->setStf_t_add3($_POST['stf_t_add3']);
		$ctrl->setStf_t_postalcode($_POST['stf_t_postalcode']);
		$ctrl->setStf_wop_number($_POST['stf_wop_number']);
		$ctrl->setStf_salary_increment_month($_POST['stf_salary_increment_month']);
		$ctrl->setStf_salary_increment_day($_POST['stf_salary_increment_day']);
		$ctrl->setStf_first_appoinment_date($_POST['stf_first_appoinment_date']);
		$ctrl->setStf_id($_POST['stf_id']);
		$ctrl->editStaff();
	}
}