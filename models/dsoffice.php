<?php

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
include '../dbconfig/connectDB.php';

/**
 * @author Ruwan Jayawardena
 */
class DSOffice extends ConnectDB {

    const TBL_DSOffice = 'st_dsoffice';

    private $flag = false;
    private $dsof_id;
    private $dsof_name;
    private $dsof_district;

	function getFlag() {
		return $this->flag;
	}

	function getDsof_id() {
		return $this->dsof_id;
	}

	function getDsof_name() {
		return $this->dsof_name;
	}

	function getDsof_district() {
		return $this->dsof_district;
	}

	function setFlag($flag) {
		$this->flag = $flag;
		return $this;
	}

	function setDsof_id($dsof_id) {
		$this->dsof_id = $dsof_id;
		return $this;
	}

	function setDsof_name($dsof_name) {
		$this->dsof_name = $dsof_name;
		return $this;
	}

	function setDsof_district($dsof_district) {
		$this->dsof_district = $dsof_district;
		return $this;
	}
	
    public function getAllDSOffice() {
        $data = array();
        $sql = "SELECT
st_dsoffice.dsof_id,
st_dsoffice.dsof_name,
st_dsoffice.dsof_district,
st_district.dtr_name
FROM
st_dsoffice
INNER JOIN st_district ON st_dsoffice.dsof_district = st_district.dtr_id
WHERE
st_dsoffice.dsof_district = :dsof_district
ORDER BY
st_dsoffice.dsof_id DESC";
        try {
            $readstmt = $this->con->prepare($sql);
            $readstmt->bindParam(':dsof_district', $this->getDsof_district(), PDO::PARAM_INT);
            $readstmt->execute();
            while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
                $data[] = $row;
            }
            echo json_encode($data);
        } catch (Exception $exc) {
            echo json_encode($data);
        }
    }

    public function cmbDSOffice() {
        $data = array();
        $sql = "SELECT
st_dsoffice.dsof_id,
st_dsoffice.dsof_name,
st_dsoffice.dsof_district
FROM
st_dsoffice
WHERE
st_dsoffice.dsof_district = :dsof_district
ORDER BY
st_dsoffice.dsof_name ASC";
        try {
            $readstmt = $this->con->prepare($sql);
            $readstmt->bindParam(':dsof_district', $this->getDsof_district(), PDO::PARAM_INT);
            $readstmt->execute();
            while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
                $data[] = $row;
            }
            echo json_encode($data);
        } catch (Exception $exc) {
            echo json_encode($data);
        }
    }

    public function getDSOfficeByID() {
        $data = array();
        $sql = "SELECT
st_dsoffice.dsof_id,
st_dsoffice.dsof_name,
st_dsoffice.dsof_district,
st_district.dtr_name
FROM
st_dsoffice
INNER JOIN st_district ON st_dsoffice.dsof_district = st_district.dtr_id
WHERE
st_dsoffice.dsof_id  = :dsof_id";
        try {
            $readstmt = $this->con->prepare($sql);
            $readstmt->bindParam(':dsof_id', $this->getDsof_id(), PDO::PARAM_INT);
            $readstmt->execute();
            while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
                $data[] = $row;
            }
            echo json_encode($data);
        } catch (Exception $exc) {
            echo json_encode($data);
        }
    }

    public function saveDSOffice() {		
        $sql = "INSERT INTO `st_dsoffice` (`dsof_name`, `dsof_district`) VALUES (:dsof_name, :dsof_district);";
        try {
            $createstmt = $this->con->prepare($sql);
            $createstmt->bindParam(':dsof_name', $this->getDsof_name(), PDO::PARAM_STR);
            $createstmt->bindParam(':dsof_district', $this->getDsof_district(), PDO::PARAM_INT);
            if ($createstmt->execute()) {
                echo json_encode(array("msgType" => 1, "msg" => "Successfully saved"));
            } else {
                echo json_encode(array("msgType" => 2, "msg" => "Sorry! saving failed"));
            }
        } catch (Exception $exc) {
            if ($exc->getCode() == 23000) {
                echo json_encode(array("msgType" => 2, "msg" => "You are entered duplicate DS Office.Please check and change it"));
            } else {
                echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
            }
        }
    }

    public function deleteDSOffice() {
        $sql = "DELETE FROM `st_dsoffice` WHERE (`dsof_id`=:dsof_id);";
        try {
            $createstmt = $this->con->prepare($sql);
            $createstmt->bindParam(':dsof_id', $this->getDsof_id(), PDO::PARAM_INT);
            if ($createstmt->execute()) {
                echo json_encode(array("msgType" => 1, "msg" => "Successfully deleted"));
            } else {
                echo json_encode(array("msgType" => 2, "msg" => "Sorry! deleting failed"));
            }
        } catch (Exception $exc) {
            echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
        }
    }

    public function editDSOffice() {
        $sql = "UPDATE `st_dsoffice` SET `dsof_name`=:dsof_name, `dsof_district`=:dsof_district WHERE (`dsof_id`=:dsof_id);";
        try {
            $createstmt = $this->con->prepare($sql);
            $createstmt->bindParam(':dsof_name', $this->getDsof_name(), PDO::PARAM_STR);
            $createstmt->bindParam(':dsof_district', $this->getDsof_district(), PDO::PARAM_INT);
            $createstmt->bindParam(':dsof_id', $this->getDsof_id(), PDO::PARAM_INT);
            if ($createstmt->execute()) {
                echo json_encode(array("msgType" => 1, "msg" => "Successfully updated"));
            } else {
                echo json_encode(array("msgType" => 2, "msg" => "Sorry! updating failed"));
            }
        } catch (Exception $exc) {
            if ($exc->getCode() == 23000) {
                echo json_encode(array("msgType" => 2, "msg" => "You are entered duplicate DS Office.Please check and change it"));
            } else {
                echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
            }
        }
    }

}
