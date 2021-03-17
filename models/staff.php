<?php

if (session_status() !== PHP_SESSION_ACTIVE) {
	session_start();
}
include '../dbconfig/connectDB.php';

/**
 * @author Ruwan Jayawardena
 */
class Staff extends ConnectDB {

	const TBL_Staff = 'st_staff_personalinfo';

	private $flag = false;
	private $stf_id;
	private $stf_district;
	private $stf_dsoffice;
	private $stf_gndivision;
	private $stf_name_full;
	private $stf_name_initial;
	private $stf_nic;
	private $stf_passport;
	private $stf_gender;
	private $stf_dob;
	private $stf_religion;
	private $stf_contact_resident;
	private $stf_contact_mobile;
	private $stf_official_tel;
	private $stf_official_fax;
	private $stf_email;
	private $stf_civil_status;
	private $stf_p_add1;
	private $stf_p_add2;
	private $stf_p_add3;
	private $stf_p_postalcode;
	private $stf_t_add1;
	private $stf_t_add2;
	private $stf_t_add3;
	private $stf_t_postalcode;
	private $stf_wop_number;
	private $stf_salary_increment_date;
	private $stf_first_appoinment_date;
	private $stf_salary_increment_month;
	private $stf_salary_increment_day;
	private $stf_pension_status;
	private $stf_pension_date;
	//Qualification
	private $qu_id;
	private $qu_title;
	private $qu_institute;
	private $qu_year;
	private $qu_desc;
	//children
	private $ch_id;
	private $ch_name;
	private $ch_dob;
	private $ch_gender;
	//spouse
	private $sp_id;
	private $sp_name_full;
	private $sp_name_initial;
	private $sp_nic;
	private $sp_occup;
	private $sp_occup_type;
	private $sp_desig;
	private $sp_office_address;
//	service
	private $sev_id;
	private $sev_zonal;
	private $sev_branch;
	private $sev_division;
	private $sev_institute;
	private $sev_servicetype;
	private $sev_service;
	private $sev_classgrade;
	private $sev_desig;
	private $sev_servicecategory;
	private $sev_ap_pre_sevdate;
	private $sev_pre_sevfileno;
	private $sev_app_mode;
	private $sev_salarycode;
	private $sev_pre_salary;
	private $sev_apo_date_cw;
	private $sev_apo_date_pc;
	//eb
	private $ex_id;
	private $ex_ebexam;
	private $ex_year;

	public function getStf_pension_status() {
		return $this->stf_pension_status;
	}

	public function getStf_pension_date() {
		return $this->stf_pension_date;
	}

	public function setStf_pension_status($stf_pension_status) {
		$this->stf_pension_status = $stf_pension_status;
		return $this;
	}

	public function setStf_pension_date($stf_pension_date) {
		$this->stf_pension_date = $stf_pension_date;
		return $this;
	}

	public function getSev_apo_date_cw() {
		return $this->sev_apo_date_cw;
	}

	public function getSev_apo_date_pc() {
		return $this->sev_apo_date_pc;
	}

	public function setSev_apo_date_cw($sev_apo_date_cw) {
		$this->sev_apo_date_cw = $sev_apo_date_cw;
		return $this;
	}

	public function setSev_apo_date_pc($sev_apo_date_pc) {
		$this->sev_apo_date_pc = $sev_apo_date_pc;
		return $this;
	}

	public function getStf_salary_increment_month() {
		return $this->stf_salary_increment_month;
	}

	public function getStf_salary_increment_day() {
		return $this->stf_salary_increment_day;
	}

	public function setStf_salary_increment_month($stf_salary_increment_month) {
		$this->stf_salary_increment_month = $stf_salary_increment_month;
		return $this;
	}

	public function setStf_salary_increment_day($stf_salary_increment_day) {
		$this->stf_salary_increment_day = $stf_salary_increment_day;
		return $this;
	}

	public function getEx_id() {
		return $this->ex_id;
	}

	public function getEx_ebexam() {
		return $this->ex_ebexam;
	}

	public function getEx_year() {
		return $this->ex_year;
	}

	public function setEx_id($ex_id) {
		$this->ex_id = $ex_id;
		return $this;
	}

	public function setEx_ebexam($ex_ebexam) {
		$this->ex_ebexam = $ex_ebexam;
		return $this;
	}

	public function setEx_year($ex_year) {
		$this->ex_year = $ex_year;
		return $this;
	}

	public function getSev_id() {
		return $this->sev_id;
	}

	public function getSev_zonal() {
		return $this->sev_zonal;
	}

	public function getSev_branch() {
		return $this->sev_branch;
	}

	public function getSev_division() {
		return $this->sev_division;
	}

	public function getSev_institute() {
		return $this->sev_institute;
	}

	public function getSev_servicetype() {
		return $this->sev_servicetype;
	}

	public function getSev_service() {
		return $this->sev_service;
	}

	public function getSev_classgrade() {
		return $this->sev_classgrade;
	}

	public function getSev_desig() {
		return $this->sev_desig;
	}

	public function getSev_servicecategory() {
		return $this->sev_servicecategory;
	}

	public function getSev_ap_pre_sevdate() {
		return $this->sev_ap_pre_sevdate;
	}

	public function getSev_pre_sevfileno() {
		return $this->sev_pre_sevfileno;
	}

	public function getSev_app_mode() {
		return $this->sev_app_mode;
	}

	public function getSev_salarycode() {
		return $this->sev_salarycode;
	}

	public function getSev_pre_salary() {
		return $this->sev_pre_salary;
	}

	public function setSev_id($sev_id) {
		$this->sev_id = $sev_id;
		return $this;
	}

	public function setSev_zonal($sev_zonal) {
		$this->sev_zonal = $sev_zonal;
		return $this;
	}

	public function setSev_branch($sev_branch) {
		$this->sev_branch = $sev_branch;
		return $this;
	}

	public function setSev_division($sev_division) {
		$this->sev_division = $sev_division;
		return $this;
	}

	public function setSev_institute($sev_institute) {
		$this->sev_institute = $sev_institute;
		return $this;
	}

	public function setSev_servicetype($sev_servicetype) {
		$this->sev_servicetype = $sev_servicetype;
		return $this;
	}

	public function setSev_service($sev_service) {
		$this->sev_service = $sev_service;
		return $this;
	}

	public function setSev_classgrade($sev_classgrade) {
		$this->sev_classgrade = $sev_classgrade;
		return $this;
	}

	public function setSev_desig($sev_desig) {
		$this->sev_desig = $sev_desig;
		return $this;
	}

	public function setSev_servicecategory($sev_servicecategory) {
		$this->sev_servicecategory = $sev_servicecategory;
		return $this;
	}

	public function setSev_ap_pre_sevdate($sev_ap_pre_sevdate) {
		$this->sev_ap_pre_sevdate = $sev_ap_pre_sevdate;
		return $this;
	}

	public function setSev_pre_sevfileno($sev_pre_sevfileno) {
		$this->sev_pre_sevfileno = $sev_pre_sevfileno;
		return $this;
	}

	public function setSev_app_mode($sev_app_mode) {
		$this->sev_app_mode = $sev_app_mode;
		return $this;
	}

	public function setSev_salarycode($sev_salarycode) {
		$this->sev_salarycode = $sev_salarycode;
		return $this;
	}

	public function setSev_pre_salary($sev_pre_salary) {
		$this->sev_pre_salary = $sev_pre_salary;
		return $this;
	}

	public function getSp_id() {
		return $this->sp_id;
	}

	public function getSp_name_full() {
		return $this->sp_name_full;
	}

	public function getSp_name_initial() {
		return $this->sp_name_initial;
	}

	public function getSp_nic() {
		return $this->sp_nic;
	}

	public function getSp_occup() {
		return $this->sp_occup;
	}

	public function getSp_occup_type() {
		return $this->sp_occup_type;
	}

	public function getSp_desig() {
		return $this->sp_desig;
	}

	public function getSp_office_address() {
		return $this->sp_office_address;
	}

	public function setSp_id($sp_id) {
		$this->sp_id = $sp_id;
		return $this;
	}

	public function setSp_name_full($sp_name_full) {
		$this->sp_name_full = $sp_name_full;
		return $this;
	}

	public function setSp_name_initial($sp_name_initial) {
		$this->sp_name_initial = $sp_name_initial;
		return $this;
	}

	public function setSp_nic($sp_nic) {
		$this->sp_nic = $sp_nic;
		return $this;
	}

	public function setSp_occup($sp_occup) {
		$this->sp_occup = $sp_occup;
		return $this;
	}

	public function setSp_occup_type($sp_occup_type) {
		$this->sp_occup_type = $sp_occup_type;
		return $this;
	}

	public function setSp_desig($sp_desig) {
		$this->sp_desig = $sp_desig;
		return $this;
	}

	public function setSp_office_address($sp_office_address) {
		$this->sp_office_address = $sp_office_address;
		return $this;
	}

	public function getCh_id() {
		return $this->ch_id;
	}

	public function getCh_name() {
		return $this->ch_name;
	}

	public function getCh_dob() {
		return $this->ch_dob;
	}

	public function getCh_gender() {
		return $this->ch_gender;
	}

	public function setCh_id($ch_id) {
		$this->ch_id = $ch_id;
		return $this;
	}

	public function setCh_name($ch_name) {
		$this->ch_name = $ch_name;
		return $this;
	}

	public function setCh_dob($ch_dob) {
		$this->ch_dob = $ch_dob;
		return $this;
	}

	public function setCh_gender($ch_gender) {
		$this->ch_gender = $ch_gender;
		return $this;
	}

	public function getQu_id() {
		return $this->qu_id;
	}

	public function getQu_title() {
		return $this->qu_title;
	}

	public function getQu_institute() {
		return $this->qu_institute;
	}

	public function getQu_year() {
		return $this->qu_year;
	}

	public function getQu_desc() {
		return $this->qu_desc;
	}

	public function setQu_id($qu_id) {
		$this->qu_id = $qu_id;
		return $this;
	}

	public function setQu_title($qu_title) {
		$this->qu_title = $qu_title;
		return $this;
	}

	public function setQu_institute($qu_institute) {
		$this->qu_institute = $qu_institute;
		return $this;
	}

	public function setQu_year($qu_year) {
		$this->qu_year = $qu_year;
		return $this;
	}

	public function setQu_desc($qu_desc) {
		$this->qu_desc = $qu_desc;
		return $this;
	}

	function getFlag() {
		return $this->flag;
	}

	function getStf_id() {
		return $this->stf_id;
	}

	function getStf_district() {
		return $this->stf_district;
	}

	function getStf_dsoffice() {
		return $this->stf_dsoffice;
	}

	function getStf_gndivision() {
		return $this->stf_gndivision;
	}

	function getStf_name_full() {
		return $this->stf_name_full;
	}

	function getStf_name_initial() {
		return $this->stf_name_initial;
	}

	function getStf_nic() {
		return $this->stf_nic;
	}

	function getStf_passport() {
		return $this->stf_passport;
	}

	function getStf_gender() {
		return $this->stf_gender;
	}

	function getStf_dob() {
		return $this->stf_dob;
	}

	function getStf_religion() {
		return $this->stf_religion;
	}

	function getStf_contact_resident() {
		return $this->stf_contact_resident;
	}

	function getStf_contact_mobile() {
		return $this->stf_contact_mobile;
	}

	function getStf_official_tel() {
		return $this->stf_official_tel;
	}

	function getStf_official_fax() {
		return $this->stf_official_fax;
	}

	function getStf_email() {
		return $this->stf_email;
	}

	function getStf_civil_status() {
		return $this->stf_civil_status;
	}

	function getStf_p_add1() {
		return $this->stf_p_add1;
	}

	function getStf_p_add2() {
		return $this->stf_p_add2;
	}

	function getStf_p_add3() {
		return $this->stf_p_add3;
	}

	function getStf_p_postalcode() {
		return $this->stf_p_postalcode;
	}

	function getStf_t_add1() {
		return $this->stf_t_add1;
	}

	function getStf_t_add2() {
		return $this->stf_t_add2;
	}

	function getStf_t_add3() {
		return $this->stf_t_add3;
	}

	function getStf_t_postalcode() {
		return $this->stf_t_postalcode;
	}

	function getStf_wop_number() {
		return $this->stf_wop_number;
	}

	function getStf_salary_increment_date() {
		return $this->stf_salary_increment_date;
	}

	function getStf_first_appoinment_date() {
		return $this->stf_first_appoinment_date;
	}

	function setFlag($flag) {
		$this->flag = $flag;
		return $this;
	}

	function setStf_id($stf_id) {
		$this->stf_id = $stf_id;
		return $this;
	}

	function setStf_district($stf_district) {
		$this->stf_district = $stf_district;
		return $this;
	}

	function setStf_dsoffice($stf_dsoffice) {
		$this->stf_dsoffice = $stf_dsoffice;
		return $this;
	}

	function setStf_gndivision($stf_gndivision) {
		$this->stf_gndivision = $stf_gndivision;
		return $this;
	}

	function setStf_name_full($stf_name_full) {
		$this->stf_name_full = $stf_name_full;
		return $this;
	}

	function setStf_name_initial($stf_name_initial) {
		$this->stf_name_initial = $stf_name_initial;
		return $this;
	}

	function setStf_nic($stf_nic) {
		$this->stf_nic = $stf_nic;
		return $this;
	}

	function setStf_passport($stf_passport) {
		$this->stf_passport = $stf_passport;
		return $this;
	}

	function setStf_gender($stf_gender) {
		$this->stf_gender = $stf_gender;
		return $this;
	}

	function setStf_dob($stf_dob) {
		$this->stf_dob = $stf_dob;
		return $this;
	}

	function setStf_religion($stf_religion) {
		$this->stf_religion = $stf_religion;
		return $this;
	}

	function setStf_contact_resident($stf_contact_resident) {
		$this->stf_contact_resident = $stf_contact_resident;
		return $this;
	}

	function setStf_contact_mobile($stf_contact_mobile) {
		$this->stf_contact_mobile = $stf_contact_mobile;
		return $this;
	}

	function setStf_official_tel($stf_official_tel) {
		$this->stf_official_tel = $stf_official_tel;
		return $this;
	}

	function setStf_official_fax($stf_official_fax) {
		$this->stf_official_fax = $stf_official_fax;
		return $this;
	}

	function setStf_email($stf_email) {
		$this->stf_email = $stf_email;
		return $this;
	}

	function setStf_civil_status($stf_civil_status) {
		$this->stf_civil_status = $stf_civil_status;
		return $this;
	}

	function setStf_p_add1($stf_p_add1) {
		$this->stf_p_add1 = $stf_p_add1;
		return $this;
	}

	function setStf_p_add2($stf_p_add2) {
		$this->stf_p_add2 = $stf_p_add2;
		return $this;
	}

	function setStf_p_add3($stf_p_add3) {
		$this->stf_p_add3 = $stf_p_add3;
		return $this;
	}

	function setStf_p_postalcode($stf_p_postalcode) {
		$this->stf_p_postalcode = $stf_p_postalcode;
		return $this;
	}

	function setStf_t_add1($stf_t_add1) {
		$this->stf_t_add1 = $stf_t_add1;
		return $this;
	}

	function setStf_t_add2($stf_t_add2) {
		$this->stf_t_add2 = $stf_t_add2;
		return $this;
	}

	function setStf_t_add3($stf_t_add3) {
		$this->stf_t_add3 = $stf_t_add3;
		return $this;
	}

	function setStf_t_postalcode($stf_t_postalcode) {
		$this->stf_t_postalcode = $stf_t_postalcode;
		return $this;
	}

	function setStf_wop_number($stf_wop_number) {
		$this->stf_wop_number = $stf_wop_number;
		return $this;
	}

	function setStf_salary_increment_date($stf_salary_increment_date) {
		$this->stf_salary_increment_date = $stf_salary_increment_date;
		return $this;
	}

	function setStf_first_appoinment_date($stf_first_appoinment_date) {
		$this->stf_first_appoinment_date = $stf_first_appoinment_date;
		return $this;
	}

	public function getAllStaff() {
		$data = array();
		$sql = "SELECT
st_staff_personalinfo.stf_id,
st_staff_personalinfo.stf_district,
st_staff_personalinfo.stf_dsoffice,
st_staff_personalinfo.stf_gndivision,
st_staff_personalinfo.stf_name_full,
st_staff_personalinfo.stf_name_initial,
st_staff_personalinfo.stf_nic,
st_staff_personalinfo.stf_passport,
st_staff_personalinfo.stf_gender,
st_staff_personalinfo.stf_dob,
st_staff_personalinfo.stf_religion,
st_staff_personalinfo.stf_contact_resident,
st_staff_personalinfo.stf_contact_mobile,
st_staff_personalinfo.stf_official_tel,
st_staff_personalinfo.stf_official_fax,
st_staff_personalinfo.stf_email,
st_staff_personalinfo.stf_civil_status,
st_staff_personalinfo.stf_p_add1,
st_staff_personalinfo.stf_p_add2,
st_staff_personalinfo.stf_p_add3,
st_staff_personalinfo.stf_p_postalcode,
st_staff_personalinfo.stf_t_add1,
st_staff_personalinfo.stf_t_add2,
st_staff_personalinfo.stf_t_add3,
st_staff_personalinfo.stf_t_postalcode,
st_staff_personalinfo.stf_wop_number,
st_staff_personalinfo.stf_first_appoinment_date,
st_staff_personalinfo.stf_salary_increment_month,
st_staff_personalinfo.stf_salary_increment_day,
st_staff_personalinfo.stf_pension_status,
st_staff_personalinfo.stf_pension_date,
CONCAT_WS('.',st_staff_personalinfo.stf_salary_increment_month,st_staff_personalinfo.stf_salary_increment_day) AS stf_salary_increment_date
FROM
st_staff_personalinfo
ORDER BY
st_staff_personalinfo.stf_id DESC
";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function getStaffByID() {
		$data = array();
		$sql = "SELECT
st_staff_personalinfo.stf_id,
st_staff_personalinfo.stf_district,
st_staff_personalinfo.stf_dsoffice,
st_staff_personalinfo.stf_gndivision,
st_staff_personalinfo.stf_name_full,
st_staff_personalinfo.stf_name_initial,
st_staff_personalinfo.stf_nic,
st_staff_personalinfo.stf_passport,
st_staff_personalinfo.stf_gender,
st_staff_personalinfo.stf_dob,
st_staff_personalinfo.stf_religion,
st_staff_personalinfo.stf_contact_resident,
st_staff_personalinfo.stf_contact_mobile,
st_staff_personalinfo.stf_official_tel,
st_staff_personalinfo.stf_official_fax,
st_staff_personalinfo.stf_email,
st_staff_personalinfo.stf_civil_status,
st_staff_personalinfo.stf_p_add1,
st_staff_personalinfo.stf_p_add2,
st_staff_personalinfo.stf_p_add3,
st_staff_personalinfo.stf_p_postalcode,
st_staff_personalinfo.stf_t_add1,
st_staff_personalinfo.stf_t_add2,
st_staff_personalinfo.stf_t_add3,
st_staff_personalinfo.stf_t_postalcode,
st_staff_personalinfo.stf_wop_number,
st_staff_personalinfo.stf_first_appoinment_date,
st_staff_personalinfo.stf_salary_increment_month,
st_staff_personalinfo.stf_salary_increment_day,
st_staff_personalinfo.stf_pension_status,
st_staff_personalinfo.stf_pension_date
FROM
st_staff_personalinfo
WHERE
st_staff_personalinfo.stf_id = :stf_id";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':stf_id', $this->getStf_id(), PDO::PARAM_INT);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function findStaffByNIC() {
		$like = '%' . $this->getStf_nic() . '%';
		$data = array();
		$sql = "SELECT
st_staff_personalinfo.stf_id,
st_staff_personalinfo.stf_nic,
st_staff_personalinfo.stf_name_initial,
(SELECT
st_subcombo.scmb_name
FROM
st_subcombo
WHERE
st_subcombo.scmb_id = st_staff_personalinfo.stf_gender) AS stf_gender
FROM
st_staff_personalinfo
WHERE
st_staff_personalinfo.stf_nic = :stf_nic OR
st_staff_personalinfo.stf_nic LIKE :stf_nic_sh";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':stf_nic', $this->getStf_nic(), PDO::PARAM_STR);
			$readstmt->bindParam(':stf_nic_sh', $like, PDO::PARAM_STR);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function getAllQualificationByStaffID() {
		$data = array();
		$sql = "SELECT
st_staff_qualification.qu_id,
st_staff_qualification.qu_staff_id,
st_staff_qualification.qu_title,
st_staff_qualification.qu_institute,
st_staff_qualification.qu_year,
st_staff_qualification.qu_desc,
st_subcombo.scmb_name
FROM
st_staff_qualification
INNER JOIN st_subcombo ON st_staff_qualification.qu_title = st_subcombo.scmb_id
WHERE
st_staff_qualification.qu_staff_id = :stf_id";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':stf_id', $this->getStf_id(), PDO::PARAM_INT);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function getAllChildrenByStaffID() {
		$data = array();
		$sql = "SELECT
st_staff_children.ch_id,
st_staff_children.ch_name,
st_staff_children.ch_dob,
st_staff_children.ch_gender,
st_staff_children.ch_staff_id,
st_subcombo.scmb_name
FROM
st_staff_children
INNER JOIN st_subcombo ON st_staff_children.ch_gender = st_subcombo.scmb_id
WHERE
st_staff_children.ch_staff_id = :stf_id
ORDER BY
st_staff_children.ch_id DESC";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':stf_id', $this->getStf_id(), PDO::PARAM_INT);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function getAllSpouseByStaffID() {
		$data = array();
		$sql = "SELECT
st_subcombo.scmb_name,
st_staff_spouse.sp_id,
st_staff_spouse.sp_staff_id,
st_staff_spouse.sp_name_full,
st_staff_spouse.sp_name_initial,
st_staff_spouse.sp_nic,
st_staff_spouse.sp_occup,
st_staff_spouse.sp_occup_type,
st_staff_spouse.sp_desig,
st_staff_spouse.sp_office_address
FROM
st_staff_spouse
INNER JOIN st_subcombo ON st_staff_spouse.sp_occup_type = st_subcombo.scmb_id
WHERE
st_staff_spouse.sp_staff_id = :stf_id
ORDER BY
st_staff_spouse.sp_id DESC";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':stf_id', $this->getStf_id(), PDO::PARAM_INT);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function getAllEbExamByStaffID() {
		$data = array();
		$sql = "SELECT
st_eb_examination.ex_ebexam,
st_eb_examination.ex_year,
st_eb_examination.ex_id,
st_subcombo.scmb_name,
st_eb_examination.ex_staff_sevid,
st_eb_examination.ex_staff_id
FROM
st_eb_examination
INNER JOIN st_subcombo ON st_eb_examination.ex_ebexam = st_subcombo.scmb_id
WHERE
st_eb_examination.ex_staff_id = :stf_id AND
st_eb_examination.ex_staff_sevid = :sev_id
ORDER BY
st_eb_examination.ex_id DESC";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':stf_id', $this->getStf_id(), PDO::PARAM_INT);
			$readstmt->bindParam(':sev_id', $this->getSev_id(), PDO::PARAM_INT);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function getAllServiceByStaffID() {
		$data = array();
		$sql = "SELECT
st_staff_serviceinfo.sev_id,
st_staff_serviceinfo.sev_staff_id,
st_staff_serviceinfo.sev_zonal,
st_staff_serviceinfo.sev_branch,
st_staff_serviceinfo.sev_division,
st_staff_serviceinfo.sev_institute,
st_staff_serviceinfo.sev_apo_date_cw,
st_staff_serviceinfo.sev_apo_date_pc,
(SELECT
st_subcombo.scmb_name
FROM
st_subcombo
WHERE
st_subcombo.scmb_id = st_staff_serviceinfo.sev_servicetype) AS sev_servicetype,
(SELECT
st_relatecombo.rlcmb_name
FROM
st_relatecombo
WHERE
st_relatecombo.rlcmb_id = st_staff_serviceinfo.sev_service) AS sev_service,
st_staff_serviceinfo.sev_service AS sev_service_id,
(SELECT
st_subcombo.scmb_name
FROM
st_subcombo
WHERE
st_subcombo.scmb_id = st_staff_serviceinfo.sev_classgrade) AS sev_classgrade,
(SELECT
st_subcombo.scmb_name
FROM
st_subcombo
WHERE
st_subcombo.scmb_id = st_staff_serviceinfo.sev_desig) AS sev_desig,
(SELECT
st_subcombo.scmb_name
FROM
st_subcombo
WHERE
st_subcombo.scmb_id = st_staff_serviceinfo.sev_servicecategory) AS sev_servicecategory,
st_staff_serviceinfo.sev_ap_pre_sevdate,
st_staff_serviceinfo.sev_pre_sevfileno,
(SELECT
st_subcombo.scmb_name
FROM
st_subcombo
WHERE
st_subcombo.scmb_id = st_staff_serviceinfo.sev_app_mode) AS sev_app_mode,
(SELECT
st_subcombo.scmb_name
FROM
st_subcombo
WHERE
st_subcombo.scmb_id = st_staff_serviceinfo.sev_salarycode) AS sev_salarycode,
st_staff_serviceinfo.sev_pre_salary,
st_zonal.zol_name,
st_branch.br_name,
st_division.div_name,
st_institute.inst_name
FROM
st_staff_serviceinfo
INNER JOIN govedustock.st_zonal ON st_staff_serviceinfo.sev_zonal = govedustock.st_zonal.zol_id
INNER JOIN st_branch ON st_branch.br_zone = govedustock.st_zonal.zol_id AND st_staff_serviceinfo.sev_branch = st_branch.br_id
INNER JOIN govedustock.st_division ON govedustock.st_division.div_zone = govedustock.st_zonal.zol_id AND st_staff_serviceinfo.sev_division = govedustock.st_division.div_id
INNER JOIN govedustock.st_institute ON govedustock.st_institute.inst_zonal = govedustock.st_zonal.zol_id AND govedustock.st_institute.inst_division = govedustock.st_division.div_id AND st_staff_serviceinfo.sev_institute = govedustock.st_institute.inst_id
WHERE
st_staff_serviceinfo.sev_staff_id = :stf_id
ORDER BY
st_staff_serviceinfo.sev_id DESC";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':stf_id', $this->getStf_id(), PDO::PARAM_INT);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function getChildrenByID() {
		$data = array();
		$sql = "SELECT
st_staff_children.ch_id,
st_staff_children.ch_name,
st_staff_children.ch_dob,
st_staff_children.ch_gender,
st_staff_children.ch_staff_id
FROM
st_staff_children
WHERE
st_staff_children.ch_id = :ch_id;";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':ch_id', $this->getCh_id(), PDO::PARAM_INT);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function getEbExamByID() {
		$data = array();
		$sql = "SELECT
st_eb_examination.ex_id,
st_eb_examination.ex_staff_id,
st_eb_examination.ex_staff_sevid,
st_eb_examination.ex_ebexam,
st_eb_examination.ex_year
FROM
st_eb_examination
WHERE
st_eb_examination.ex_id = :ex_id";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':ex_id', $this->getEx_id(), PDO::PARAM_INT);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function getServiceByID() {
		$data = array();
		$sql = "SELECT
edustaffmgmt.st_staff_serviceinfo.sev_id,
edustaffmgmt.st_staff_serviceinfo.sev_staff_id,
edustaffmgmt.st_staff_serviceinfo.sev_zonal,
edustaffmgmt.st_staff_serviceinfo.sev_branch,
edustaffmgmt.st_staff_serviceinfo.sev_division,
edustaffmgmt.st_staff_serviceinfo.sev_institute,
edustaffmgmt.st_staff_serviceinfo.sev_servicetype,
edustaffmgmt.st_staff_serviceinfo.sev_service,
edustaffmgmt.st_staff_serviceinfo.sev_classgrade,
edustaffmgmt.st_staff_serviceinfo.sev_desig,
edustaffmgmt.st_staff_serviceinfo.sev_servicecategory,
edustaffmgmt.st_staff_serviceinfo.sev_ap_pre_sevdate,
edustaffmgmt.st_staff_serviceinfo.sev_pre_sevfileno,
edustaffmgmt.st_staff_serviceinfo.sev_app_mode,
edustaffmgmt.st_staff_serviceinfo.sev_salarycode,
edustaffmgmt.st_staff_serviceinfo.sev_pre_salary,
edustaffmgmt.st_staff_serviceinfo.sev_apo_date_cw,
edustaffmgmt.st_staff_serviceinfo.sev_apo_date_pc,
govedustock.st_province.prov_id
FROM
edustaffmgmt.st_staff_serviceinfo
INNER JOIN govedustock.st_zonal ON edustaffmgmt.st_staff_serviceinfo.sev_zonal = govedustock.st_zonal.zol_id
INNER JOIN govedustock.st_province ON govedustock.st_zonal.zol_province = govedustock.st_province.prov_id
WHERE
edustaffmgmt.st_staff_serviceinfo.sev_id = :sev_id";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':sev_id', $this->getSev_id(), PDO::PARAM_INT);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function getSpouseByID() {
		$data = array();
		$sql = "SELECT
st_staff_spouse.sp_id,
st_staff_spouse.sp_staff_id,
st_staff_spouse.sp_name_full,
st_staff_spouse.sp_name_initial,
st_staff_spouse.sp_nic,
st_staff_spouse.sp_occup,
st_staff_spouse.sp_occup_type,
st_staff_spouse.sp_desig,
st_staff_spouse.sp_office_address
FROM
st_staff_spouse
WHERE
st_staff_spouse.sp_id = :sp_id;";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':sp_id', $this->getSp_id(), PDO::PARAM_INT);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function getQualificationByID() {
		$data = array();
		$sql = "SELECT
st_staff_qualification.qu_id,
st_staff_qualification.qu_title,
st_staff_qualification.qu_institute,
st_staff_qualification.qu_year,
st_staff_qualification.qu_desc,
st_staff_qualification.qu_staff_id
FROM
st_staff_qualification
WHERE
st_staff_qualification.qu_id = :qu_id";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':qu_id', $this->getQu_id(), PDO::PARAM_INT);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function saveStaff() {
		$sql = "INSERT INTO `st_staff_personalinfo` ( `stf_district`, `stf_dsoffice`, `stf_gndivision`, `stf_name_full`, `stf_name_initial`, `stf_nic`, `stf_passport`, `stf_gender`, `stf_dob`, `stf_religion`, `stf_contact_resident`, `stf_contact_mobile`, `stf_official_tel`, `stf_official_fax`, `stf_email`, `stf_civil_status`, `stf_p_add1`, `stf_p_add2`, `stf_p_add3`, `stf_p_postalcode`, `stf_t_add1`, `stf_t_add2`, `stf_t_add3`, `stf_t_postalcode`, `stf_wop_number`, `stf_salary_increment_month`, `stf_salary_increment_day`, `stf_first_appoinment_date`) VALUES (:stf_district,:stf_dsoffice, :stf_gndivision, :stf_name_full, :stf_name_initial, :stf_nic, :stf_passport, :stf_gender, :stf_dob, :stf_religion, :stf_contact_resident, :stf_contact_mobile, :stf_official_tel, :stf_official_fax, :stf_email, :stf_civil_status, :stf_p_add1, :stf_p_add2, :stf_p_add3, :stf_p_postalcode, :stf_t_add1, :stf_t_add2, :stf_t_add3, :stf_t_postalcode, :stf_wop_number, :stf_salary_increment_month, :stf_salary_increment_day, :stf_first_appoinment_date);";
		try {
			$createstmt = $this->con->prepare($sql);
			$createstmt->bindParam(':stf_district', $this->getStf_district(), PDO::PARAM_INT);
			$createstmt->bindParam(':stf_dsoffice', $this->getStf_dsoffice(), PDO::PARAM_INT);
			$createstmt->bindParam(':stf_gndivision', $this->getStf_gndivision(), PDO::PARAM_INT);
			$createstmt->bindParam(':stf_name_full', $this->getStf_name_full(), PDO::PARAM_STR);
			$createstmt->bindParam(':stf_name_initial', $this->getStf_name_initial(), PDO::PARAM_STR);
			$createstmt->bindParam(':stf_nic', $this->getStf_nic(), PDO::PARAM_STR);
			$createstmt->bindParam(':stf_passport', $this->getStf_passport(), PDO::PARAM_STR);
			$createstmt->bindParam(':stf_gender', $this->getStf_gender(), PDO::PARAM_INT);
			$createstmt->bindParam(':stf_dob', $this->getStf_dob(), PDO::PARAM_STR);
			$createstmt->bindParam(':stf_religion', $this->getStf_religion(), PDO::PARAM_INT);
			$createstmt->bindParam(':stf_contact_resident', $this->getStf_contact_resident(), PDO::PARAM_STR);
			$createstmt->bindParam(':stf_contact_mobile', $this->getStf_contact_mobile(), PDO::PARAM_STR);
			$createstmt->bindParam(':stf_official_tel', $this->getStf_official_tel(), PDO::PARAM_STR);
			$createstmt->bindParam(':stf_official_fax', $this->getStf_official_fax(), PDO::PARAM_STR);
			$createstmt->bindParam(':stf_email', $this->getStf_email(), PDO::PARAM_STR);
			$createstmt->bindParam(':stf_civil_status', $this->getStf_civil_status(), PDO::PARAM_INT);
			$createstmt->bindParam(':stf_p_add1', $this->getStf_p_add1(), PDO::PARAM_STR);
			$createstmt->bindParam(':stf_p_add2', $this->getStf_p_add2(), PDO::PARAM_STR);
			$createstmt->bindParam(':stf_p_add3', $this->getStf_p_add3(), PDO::PARAM_STR);
			$createstmt->bindParam(':stf_p_postalcode', $this->getStf_p_postalcode(), PDO::PARAM_STR);
			$createstmt->bindParam(':stf_t_add1', $this->getStf_t_add1(), PDO::PARAM_STR);
			$createstmt->bindParam(':stf_t_add2', $this->getStf_t_add2(), PDO::PARAM_STR);
			$createstmt->bindParam(':stf_t_add3', $this->getStf_t_add3(), PDO::PARAM_STR);
			$createstmt->bindParam(':stf_t_postalcode', $this->getStf_t_postalcode(), PDO::PARAM_STR);
			$createstmt->bindParam(':stf_wop_number', $this->getStf_wop_number(), PDO::PARAM_STR);
			$createstmt->bindParam(':stf_salary_increment_month', $this->getStf_salary_increment_month(), PDO::PARAM_INT);
			$createstmt->bindParam(':stf_salary_increment_day', $this->getStf_salary_increment_day(), PDO::PARAM_INT);
			$createstmt->bindParam(':stf_first_appoinment_date', $this->getStf_first_appoinment_date(), PDO::PARAM_STR);

			if ($createstmt->execute()) {
				echo json_encode(array("msgType" => 1, "msg" => "Successfully saved"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry! saving failed"));
			}
		} catch (Exception $exc) {
			if ($exc->getCode() == 23000) {
				echo json_encode(array("msgType" => 2, "msg" => "You are entered duplicate staff personal information.Please check and change it"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
			}
		}
	}

	public function saveQualification() {
		$sql = "INSERT INTO `st_staff_qualification` (`qu_staff_id`, `qu_title`, `qu_institute`, `qu_year`, `qu_desc`) VALUES (:qu_staff_id, :qu_title, :qu_institute, :qu_year, :qu_desc);";
		try {
			$createstmt = $this->con->prepare($sql);
			$createstmt->bindParam(':qu_staff_id', $this->getStf_id(), PDO::PARAM_INT);
			$createstmt->bindParam(':qu_title', $this->getQu_title(), PDO::PARAM_INT);
			$createstmt->bindParam(':qu_institute', $this->getQu_institute(), PDO::PARAM_STR);
			$createstmt->bindParam(':qu_year', $this->getQu_year(), PDO::PARAM_INT);
			$createstmt->bindParam(':qu_desc', $this->getQu_desc(), PDO::PARAM_STR);

			if ($createstmt->execute()) {
				echo json_encode(array("msgType" => 1, "msg" => "Successfully saved"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry! saving failed"));
			}
		} catch (Exception $exc) {
			if ($exc->getCode() == 23000) {
				echo json_encode(array("msgType" => 2, "msg" => "You are entered duplicate entry.Please review it"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
			}
		}
	}

	public function saveEbExam() {
		$sql = "INSERT INTO `st_eb_examination` (`ex_staff_id`, `ex_staff_sevid`, `ex_ebexam`, `ex_year`) VALUES (:ex_staff_id, :ex_staff_sevid, :ex_ebexam, :ex_year);";
		try {
			$createstmt = $this->con->prepare($sql);
			$createstmt->bindParam(':ex_staff_id', $this->getStf_id(), PDO::PARAM_INT);
			$createstmt->bindParam(':ex_staff_sevid', $this->getSev_id(), PDO::PARAM_INT);
			$createstmt->bindParam(':ex_ebexam', $this->getEx_ebexam(), PDO::PARAM_INT);
			$createstmt->bindParam(':ex_year', $this->getEx_year(), PDO::PARAM_STR);
			if ($createstmt->execute()) {
				echo json_encode(array("msgType" => 1, "msg" => "Successfully saved"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry! saving failed"));
			}
		} catch (Exception $exc) {
			if ($exc->getCode() == 23000) {
				echo json_encode(array("msgType" => 2, "msg" => "You are entered duplicate entry.Please review it"));
//				echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
			}
		}
	}

	public function savePensionStatus() {
		$sql = "UPDATE `st_staff_personalinfo` SET `stf_pension_status`=:stf_pension_status, `stf_pension_date`=:stf_pension_date WHERE (`stf_id`=:stf_id);";
		try {
			$createstmt = $this->con->prepare($sql);
			$createstmt->bindParam(':stf_pension_status', $this->getStf_pension_status(), PDO::PARAM_INT);
			$createstmt->bindParam(':stf_pension_date', $this->getStf_pension_date(), PDO::PARAM_STR);
			$createstmt->bindParam(':stf_id', $this->getStf_id(), PDO::PARAM_INT);
			if ($createstmt->execute()) {
				echo json_encode(array("msgType" => 1, "msg" => "Pension Status changed Successfully "));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry! pension status changing failed"));
			}
		} catch (Exception $exc) {
			echo json_encode(array("msgType" => 2, "msg" => "Sorry! pension status changing failed"));
		}
	}

	public function editEbExam() {
		$sql = "UPDATE `st_eb_examination` SET `ex_ebexam`=:ex_ebexam, `ex_year`=:ex_year WHERE (`ex_id` = :ex_id);";
		try {
			$createstmt = $this->con->prepare($sql);
			$createstmt->bindParam(':ex_id', $this->getEx_id(), PDO::PARAM_INT);
			$createstmt->bindParam(':ex_ebexam', $this->getEx_ebexam(), PDO::PARAM_INT);
			$createstmt->bindParam(':ex_year', $this->getEx_year(), PDO::PARAM_STR);
			if ($createstmt->execute()) {
				echo json_encode(array("msgType" => 1, "msg" => "Successfully updated"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry! update failed"));
			}
		} catch (Exception $exc) {
			if ($exc->getCode() == 23000) {
				echo json_encode(array("msgType" => 2, "msg" => "You are entered duplicate entry.Please review it"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
			}
		}
	}

	public function saveChildren() {
		$sql = "INSERT INTO `st_staff_children` (`ch_staff_id`, `ch_name`, `ch_dob`, `ch_gender`) VALUES (:ch_staff_id, :ch_name, :ch_dob, :ch_gender);";
		try {
			$createstmt = $this->con->prepare($sql);
			$createstmt->bindParam(':ch_staff_id', $this->getStf_id(), PDO::PARAM_INT);
			$createstmt->bindParam(':ch_name', $this->getCh_name(), PDO::PARAM_STR);
			$createstmt->bindParam(':ch_dob', $this->getCh_dob(), PDO::PARAM_STR);
			$createstmt->bindParam(':ch_gender', $this->getCh_gender(), PDO::PARAM_INT);
			if ($createstmt->execute()) {
				echo json_encode(array("msgType" => 1, "msg" => "Successfully saved"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry! saving failed"));
			}
		} catch (Exception $exc) {
			if ($exc->getCode() == 23000) {
				echo json_encode(array("msgType" => 2, "msg" => "You are entered duplicate entry.Please review it"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
			}
		}
	}

	public function saveSpouse() {
		$sql = "INSERT INTO `st_staff_spouse` (`sp_staff_id`, `sp_name_full`, `sp_name_initial`, `sp_nic`, `sp_occup`, `sp_occup_type`, `sp_desig`, `sp_office_address`) VALUES (:sp_staff_id, :sp_name_full, :sp_name_initial, :sp_nic, :sp_occup, :sp_occup_type, :sp_desig, :sp_office_address);";
		try {
			$createstmt = $this->con->prepare($sql);
			$createstmt->bindParam(':sp_staff_id', $this->getStf_id(), PDO::PARAM_INT);
			$createstmt->bindParam(':sp_name_full', $this->getSp_name_full(), PDO::PARAM_STR);
			$createstmt->bindParam(':sp_name_initial', $this->getSp_name_initial(), PDO::PARAM_STR);
			$createstmt->bindParam(':sp_nic', $this->getSp_nic(), PDO::PARAM_STR);
			$createstmt->bindParam(':sp_occup', $this->getSp_occup(), PDO::PARAM_STR);
			$createstmt->bindParam(':sp_occup_type', $this->getSp_occup_type(), PDO::PARAM_INT);
			$createstmt->bindParam(':sp_desig', $this->getSp_desig(), PDO::PARAM_STR);
			$createstmt->bindParam(':sp_office_address', $this->getSp_office_address(), PDO::PARAM_STR);
			if ($createstmt->execute()) {
				echo json_encode(array("msgType" => 1, "msg" => "Successfully saved"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry! saving failed"));
			}
		} catch (Exception $exc) {
			if ($exc->getCode() == 23000) {
				echo json_encode(array("msgType" => 2, "msg" => "You are entered duplicate entry.Please review it"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
			}
		}
	}

	public function saveService() {
		$sql = "INSERT INTO `st_staff_serviceinfo` (`sev_staff_id`, `sev_zonal`, `sev_branch`, `sev_division`, `sev_institute`, `sev_servicetype`, `sev_service`, `sev_classgrade`, `sev_desig`, `sev_servicecategory`, `sev_ap_pre_sevdate`, `sev_pre_sevfileno`, `sev_app_mode`, `sev_salarycode`, `sev_pre_salary`,`sev_apo_date_cw`,`sev_apo_date_pc`) VALUES (:sev_staff_id, :sev_zonal, :sev_branch, :sev_division, :sev_institute, :sev_servicetype, :sev_service, :sev_classgrade, :sev_desig, :sev_servicecategory, :sev_ap_pre_sevdate, :sev_pre_sevfileno, :sev_app_mode, :sev_salarycode, :sev_pre_salary,:sev_apo_date_cw,:sev_apo_date_pc);";
		try {
			$createstmt = $this->con->prepare($sql);
			$createstmt->bindParam(':sev_staff_id', $this->getStf_id(), PDO::PARAM_INT);
			$createstmt->bindParam(':sev_zonal', $this->getSev_zonal(), PDO::PARAM_INT);
			$createstmt->bindParam(':sev_branch', $this->getSev_branch(), PDO::PARAM_INT);
			$createstmt->bindParam(':sev_division', $this->getSev_division(), PDO::PARAM_INT);
			$createstmt->bindParam(':sev_institute', $this->getSev_institute(), PDO::PARAM_INT);
			$createstmt->bindParam(':sev_servicetype', $this->getSev_servicetype(), PDO::PARAM_INT);
			$createstmt->bindParam(':sev_service', $this->getSev_service(), PDO::PARAM_INT);
			$createstmt->bindParam(':sev_classgrade', $this->getSev_classgrade(), PDO::PARAM_INT);
			$createstmt->bindParam(':sev_desig', $this->getSev_desig(), PDO::PARAM_INT);
			$createstmt->bindParam(':sev_servicecategory', $this->getSev_servicecategory(), PDO::PARAM_INT);
			$createstmt->bindParam(':sev_ap_pre_sevdate', $this->getSev_ap_pre_sevdate(), PDO::PARAM_STR);
			$createstmt->bindParam(':sev_pre_sevfileno', $this->getSev_pre_sevfileno(), PDO::PARAM_STR);
			$createstmt->bindParam(':sev_app_mode', $this->getSev_app_mode(), PDO::PARAM_INT);
			$createstmt->bindParam(':sev_salarycode', $this->getSev_salarycode(), PDO::PARAM_INT);
			$createstmt->bindParam(':sev_pre_salary', $this->getSev_pre_salary(), PDO::PARAM_STR);
			$createstmt->bindParam(':sev_apo_date_cw', $this->getSev_apo_date_cw(), PDO::PARAM_STR);
			$createstmt->bindParam(':sev_apo_date_pc', $this->getSev_apo_date_pc(), PDO::PARAM_STR);
			if ($createstmt->execute()) {
				echo json_encode(array("msgType" => 1, "msg" => "Successfully saved"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry! saving failed"));
			}
		} catch (Exception $exc) {
			if ($exc->getCode() == 23000) {
				echo json_encode(array("msgType" => 2, "msg" => "You are entered duplicate entry.Please review it"));
//				echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
			}
		}
	}

	public function editService() {
		$sql = "UPDATE `st_staff_serviceinfo` SET `sev_zonal`=:sev_zonal, `sev_branch`=:sev_branch, `sev_division`=:sev_division, `sev_institute`=:sev_institute, `sev_servicetype`=:sev_servicetype, `sev_service`=:sev_service, `sev_classgrade`=:sev_classgrade, `sev_desig`=:sev_desig, `sev_servicecategory`=:sev_servicecategory, `sev_ap_pre_sevdate`=:sev_ap_pre_sevdate, `sev_pre_sevfileno`=:sev_pre_sevfileno, `sev_app_mode`=:sev_app_mode, `sev_salarycode`=:sev_salarycode, `sev_pre_salary`=:sev_pre_salary, `sev_apo_date_cw`=:sev_apo_date_cw, `sev_apo_date_pc`=:sev_apo_date_pc WHERE (`sev_id` = :sev_id);";
		try {
			$createstmt = $this->con->prepare($sql);
			$createstmt->bindParam(':sev_id', $this->getSev_id(), PDO::PARAM_INT);
			$createstmt->bindParam(':sev_zonal', $this->getSev_zonal(), PDO::PARAM_INT);
			$createstmt->bindParam(':sev_branch', $this->getSev_branch(), PDO::PARAM_INT);
			$createstmt->bindParam(':sev_division', $this->getSev_division(), PDO::PARAM_INT);
			$createstmt->bindParam(':sev_institute', $this->getSev_institute(), PDO::PARAM_INT);
			$createstmt->bindParam(':sev_servicetype', $this->getSev_servicetype(), PDO::PARAM_INT);
			$createstmt->bindParam(':sev_service', $this->getSev_service(), PDO::PARAM_INT);
			$createstmt->bindParam(':sev_classgrade', $this->getSev_classgrade(), PDO::PARAM_INT);
			$createstmt->bindParam(':sev_desig', $this->getSev_desig(), PDO::PARAM_INT);
			$createstmt->bindParam(':sev_servicecategory', $this->getSev_servicecategory(), PDO::PARAM_INT);
			$createstmt->bindParam(':sev_ap_pre_sevdate', $this->getSev_ap_pre_sevdate(), PDO::PARAM_STR);
			$createstmt->bindParam(':sev_pre_sevfileno', $this->getSev_pre_sevfileno(), PDO::PARAM_STR);
			$createstmt->bindParam(':sev_app_mode', $this->getSev_app_mode(), PDO::PARAM_INT);
			$createstmt->bindParam(':sev_salarycode', $this->getSev_salarycode(), PDO::PARAM_INT);
			$createstmt->bindParam(':sev_pre_salary', $this->getSev_pre_salary(), PDO::PARAM_STR);
			$createstmt->bindParam(':sev_apo_date_cw', $this->getSev_apo_date_cw(), PDO::PARAM_STR);
			$createstmt->bindParam(':sev_apo_date_pc', $this->getSev_apo_date_pc(), PDO::PARAM_STR);
			if ($createstmt->execute()) {
				echo json_encode(array("msgType" => 1, "msg" => "Successfully saved"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry! saving failed"));
			}
		} catch (Exception $exc) {
			if ($exc->getCode() == 23000) {
				echo json_encode(array("msgType" => 2, "msg" => "You are entered duplicate entry.Please review it"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
			}
		}
	}

	public function editSpouse() {
		$sql = "UPDATE `st_staff_spouse` SET `sp_name_full`=:sp_name_full, `sp_name_initial`=:sp_name_initial, `sp_nic`=:sp_nic, `sp_occup`=:sp_occup, `sp_occup_type`=:sp_occup_type, `sp_desig`=:sp_desig, `sp_office_address`=:sp_office_address WHERE (`sp_id` = :sp_id);";
		try {
			$createstmt = $this->con->prepare($sql);
			$createstmt->bindParam(':sp_id', $this->getSp_id(), PDO::PARAM_INT);
			$createstmt->bindParam(':sp_name_full', $this->getSp_name_full(), PDO::PARAM_STR);
			$createstmt->bindParam(':sp_name_initial', $this->getSp_name_initial(), PDO::PARAM_STR);
			$createstmt->bindParam(':sp_nic', $this->getSp_nic(), PDO::PARAM_STR);
			$createstmt->bindParam(':sp_occup', $this->getSp_occup(), PDO::PARAM_STR);
			$createstmt->bindParam(':sp_occup_type', $this->getSp_occup_type(), PDO::PARAM_INT);
			$createstmt->bindParam(':sp_desig', $this->getSp_desig(), PDO::PARAM_STR);
			$createstmt->bindParam(':sp_office_address', $this->getSp_office_address(), PDO::PARAM_STR);
			if ($createstmt->execute()) {
				echo json_encode(array("msgType" => 1, "msg" => "Successfully saved"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry! saving failed"));
			}
		} catch (Exception $exc) {
			if ($exc->getCode() == 23000) {
				echo json_encode(array("msgType" => 2, "msg" => "You are entered duplicate entry.Please review it"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
			}
		}
	}

	public function editChildren() {
		$sql = "UPDATE `st_staff_children` SET `ch_name`=:ch_name, `ch_dob`=:ch_dob, `ch_gender`=:ch_gender WHERE (`ch_id` = :ch_id);";
		try {
			$createstmt = $this->con->prepare($sql);
			$createstmt->bindParam(':ch_name', $this->getCh_name(), PDO::PARAM_STR);
			$createstmt->bindParam(':ch_dob', $this->getCh_dob(), PDO::PARAM_STR);
			$createstmt->bindParam(':ch_gender', $this->getCh_gender(), PDO::PARAM_INT);
			$createstmt->bindParam(':ch_id', $this->getCh_id(), PDO::PARAM_INT);
			if ($createstmt->execute()) {
				echo json_encode(array("msgType" => 1, "msg" => "Successfully updated"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry! update failed"));
			}
		} catch (Exception $exc) {
			if ($exc->getCode() == 23000) {
				echo json_encode(array("msgType" => 2, "msg" => "You are entered duplicate entry.Please review it"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
			}
		}
	}

	public function editQualification() {
		$sql = "UPDATE `st_staff_qualification` SET `qu_id`=:qu_id, `qu_title`=:qu_title, `qu_institute`=:qu_institute, `qu_year`=:qu_year, `qu_desc`=:qu_desc WHERE (`qu_id` = :qu_id);";
		try {
			$createstmt = $this->con->prepare($sql);
			$createstmt->bindParam(':qu_staff_id', $this->getStf_id(), PDO::PARAM_INT);
			$createstmt->bindParam(':qu_title', $this->getQu_title(), PDO::PARAM_INT);
			$createstmt->bindParam(':qu_institute', $this->getQu_institute(), PDO::PARAM_STR);
			$createstmt->bindParam(':qu_year', $this->getQu_year(), PDO::PARAM_INT);
			$createstmt->bindParam(':qu_desc', $this->getQu_desc(), PDO::PARAM_STR);
			$createstmt->bindParam(':qu_id', $this->getQu_id(), PDO::PARAM_INT);

			if ($createstmt->execute()) {
				echo json_encode(array("msgType" => 1, "msg" => "Successfully updated"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry! update failed"));
			}
		} catch (Exception $exc) {
			if ($exc->getCode() == 23000) {
				echo json_encode(array("msgType" => 2, "msg" => "You are entered duplicate entry.Please review it"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
			}
		}
	}

	public function deleteStaff() {
		$sql = "DELETE FROM `st_staff_personalinfo` WHERE (`stf_id`=:stf_id);";
		try {
			$createstmt = $this->con->prepare($sql);
			$createstmt->bindParam(':stf_id', $this->getStf_id(), PDO::PARAM_INT);
			if ($createstmt->execute()) {
				echo json_encode(array("msgType" => 1, "msg" => "Successfully deleted"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry! deleting failed"));
			}
		} catch (Exception $exc) {
			echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
		}
	}

	public function deleteEbExam() {
		$sql = "DELETE FROM `st_eb_examination` WHERE (`ex_id`=:ex_id);";
		try {
			$createstmt = $this->con->prepare($sql);
			$createstmt->bindParam(':ex_id', $this->getEx_id(), PDO::PARAM_INT);
			if ($createstmt->execute()) {
				echo json_encode(array("msgType" => 1, "msg" => "Successfully deleted"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry! deleting failed"));
			}
		} catch (Exception $exc) {
			echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
		}
	}

	public function deleteQualification() {
		$sql = "DELETE FROM `st_staff_qualification` WHERE (`qu_id`=:qu_id);";
		try {
			$createstmt = $this->con->prepare($sql);
			$createstmt->bindParam(':qu_id', $this->getQu_id(), PDO::PARAM_INT);
			if ($createstmt->execute()) {
				echo json_encode(array("msgType" => 1, "msg" => "Successfully deleted"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry! deleting failed"));
			}
		} catch (Exception $exc) {
			echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
		}
	}

	public function deleteChildren() {
		$sql = "DELETE FROM `st_staff_children` WHERE (`ch_id`=:ch_id);";
		try {
			$createstmt = $this->con->prepare($sql);
			$createstmt->bindParam(':ch_id', $this->getCh_id(), PDO::PARAM_INT);
			if ($createstmt->execute()) {
				echo json_encode(array("msgType" => 1, "msg" => "Successfully deleted"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry! deleting failed"));
			}
		} catch (Exception $exc) {
			echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
		}
	}

	public function deleteSpouse() {
		$sql = "DELETE FROM `st_staff_spouse` WHERE (`sp_id`=:sp_id);";
		try {
			$createstmt = $this->con->prepare($sql);
			$createstmt->bindParam(':sp_id', $this->getSp_id(), PDO::PARAM_INT);
			if ($createstmt->execute()) {
				echo json_encode(array("msgType" => 1, "msg" => "Successfully deleted"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry! deleting failed"));
			}
		} catch (Exception $exc) {
			echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
		}
	}

	public function deleteService() {
		$sql = "DELETE FROM `st_staff_serviceinfo` WHERE (`sev_id`=:sev_id);";
		try {
			$createstmt = $this->con->prepare($sql);
			$createstmt->bindParam(':sev_id', $this->getSev_id(), PDO::PARAM_INT);
			if ($createstmt->execute()) {
				echo json_encode(array("msgType" => 1, "msg" => "Successfully deleted"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry! deleting failed"));
			}
		} catch (Exception $exc) {
			echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
		}
	}

	public function editStaff() {
		$sql = "UPDATE `st_staff_personalinfo` SET `stf_district`=:stf_district, `stf_dsoffice`=:stf_dsoffice, `stf_gndivision`=:stf_gndivision, `stf_name_full`=:stf_name_full, `stf_name_initial`=:stf_name_initial, `stf_nic`=:stf_nic, `stf_passport`=:stf_passport, `stf_gender`=:stf_gender, `stf_dob`=:stf_dob, `stf_religion`=:stf_religion, `stf_contact_resident`=:stf_contact_resident, `stf_contact_mobile`=:stf_contact_mobile, `stf_official_tel`=:stf_official_tel, `stf_official_fax`=:stf_official_fax, `stf_email`=:stf_email, `stf_civil_status`=:stf_civil_status, `stf_p_add1`=:stf_p_add1, `stf_p_add2`=:stf_p_add2, `stf_p_add3`=:stf_p_add3, `stf_p_postalcode`=:stf_p_postalcode, `stf_t_add1`=:stf_t_add1, `stf_t_add2`=:stf_t_add2, `stf_t_add3`=:stf_t_add3, `stf_t_postalcode`=:stf_t_postalcode, `stf_wop_number`=:stf_wop_number, `stf_salary_increment_month`=:stf_salary_increment_month, `stf_salary_increment_day`=:stf_salary_increment_day, `stf_first_appoinment_date`=:stf_first_appoinment_date WHERE (`stf_id` = :stf_id);";
		try {
			$createstmt = $this->con->prepare($sql);
			$createstmt->bindParam(':stf_district', $this->getStf_district(), PDO::PARAM_INT);
			$createstmt->bindParam(':stf_dsoffice', $this->getStf_dsoffice(), PDO::PARAM_INT);
			$createstmt->bindParam(':stf_gndivision', $this->getStf_gndivision(), PDO::PARAM_INT);
			$createstmt->bindParam(':stf_name_full', $this->getStf_name_full(), PDO::PARAM_STR);
			$createstmt->bindParam(':stf_name_initial', $this->getStf_name_initial(), PDO::PARAM_STR);
			$createstmt->bindParam(':stf_nic', $this->getStf_nic(), PDO::PARAM_STR);
			$createstmt->bindParam(':stf_passport', $this->getStf_passport(), PDO::PARAM_STR);
			$createstmt->bindParam(':stf_gender', $this->getStf_gender(), PDO::PARAM_INT);
			$createstmt->bindParam(':stf_dob', $this->getStf_dob(), PDO::PARAM_STR);
			$createstmt->bindParam(':stf_religion', $this->getStf_religion(), PDO::PARAM_INT);
			$createstmt->bindParam(':stf_contact_resident', $this->getStf_contact_resident(), PDO::PARAM_STR);
			$createstmt->bindParam(':stf_contact_mobile', $this->getStf_contact_mobile(), PDO::PARAM_STR);
			$createstmt->bindParam(':stf_official_tel', $this->getStf_official_tel(), PDO::PARAM_STR);
			$createstmt->bindParam(':stf_official_fax', $this->getStf_official_fax(), PDO::PARAM_STR);
			$createstmt->bindParam(':stf_email', $this->getStf_email(), PDO::PARAM_STR);
			$createstmt->bindParam(':stf_civil_status', $this->getStf_civil_status(), PDO::PARAM_INT);
			$createstmt->bindParam(':stf_p_add1', $this->getStf_p_add1(), PDO::PARAM_STR);
			$createstmt->bindParam(':stf_p_add2', $this->getStf_p_add2(), PDO::PARAM_STR);
			$createstmt->bindParam(':stf_p_add3', $this->getStf_p_add3(), PDO::PARAM_STR);
			$createstmt->bindParam(':stf_p_postalcode', $this->getStf_p_postalcode(), PDO::PARAM_STR);
			$createstmt->bindParam(':stf_t_add1', $this->getStf_t_add1(), PDO::PARAM_STR);
			$createstmt->bindParam(':stf_t_add2', $this->getStf_t_add2(), PDO::PARAM_STR);
			$createstmt->bindParam(':stf_t_add3', $this->getStf_t_add3(), PDO::PARAM_STR);
			$createstmt->bindParam(':stf_t_postalcode', $this->getStf_t_postalcode(), PDO::PARAM_STR);
			$createstmt->bindParam(':stf_wop_number', $this->getStf_wop_number(), PDO::PARAM_STR);
			$createstmt->bindParam(':stf_salary_increment_month', $this->getStf_salary_increment_month(), PDO::PARAM_INT);
			$createstmt->bindParam(':stf_salary_increment_day', $this->getStf_salary_increment_day(), PDO::PARAM_INT);
			$createstmt->bindParam(':stf_first_appoinment_date', $this->getStf_first_appoinment_date(), PDO::PARAM_STR);
			$createstmt->bindParam(':stf_id', $this->getStf_id(), PDO::PARAM_INT);
			if ($createstmt->execute()) {
				echo json_encode(array("msgType" => 1, "msg" => "Successfully updated"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry! updating failed"));
			}
		} catch (Exception $exc) {
			if ($exc->getCode() == 23000) {
				echo json_encode(array("msgType" => 2, "msg" => "You are entered duplicate staff personal information.Please check and change it"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
			}
		}
	}

}
