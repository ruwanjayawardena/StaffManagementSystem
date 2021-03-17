<?php

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
include '../dbconfig/connectDB.php';

/**
 * @author Ruwan Jayawardena
 */
class GNDivision extends ConnectDB {

    const TBL_GNDivision = 'st_gndivision';

    private $flag = false;
    private $gnd_id;
    private $gnd_name;
    private $gnd_dsoffice;

	function getFlag() {
		return $this->flag;
	}

	function getGnd_id() {
		return $this->gnd_id;
	}

	function getGnd_name() {
		return $this->gnd_name;
	}

	function getGnd_dsoffice() {
		return $this->gnd_dsoffice;
	}

	function setFlag($flag) {
		$this->flag = $flag;
		return $this;
	}

	function setGnd_id($gnd_id) {
		$this->gnd_id = $gnd_id;
		return $this;
	}

	function setGnd_name($gnd_name) {
		$this->gnd_name = $gnd_name;
		return $this;
	}

	function setGnd_dsoffice($gnd_dsoffice) {
		$this->gnd_dsoffice = $gnd_dsoffice;
		return $this;
	}
	
    public function getAllGNDivision() {
        $data = array();
        $sql = "SELECT
st_gndivision.gnd_id,
st_gndivision.gnd_name,
st_gndivision.gnd_dsoffice,
st_dsoffice.dsof_name
FROM
st_gndivision
INNER JOIN st_dsoffice ON st_gndivision.gnd_dsoffice = st_dsoffice.dsof_id
WHERE
st_gndivision.gnd_dsoffice = :gnd_dsoffice
ORDER BY
st_gndivision.gnd_id DESC";
        try {
            $readstmt = $this->con->prepare($sql);
            $readstmt->bindParam(':gnd_dsoffice', $this->getGnd_dsoffice(), PDO::PARAM_INT);
            $readstmt->execute();
            while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
                $data[] = $row;
            }
            echo json_encode($data);
        } catch (Exception $exc) {
            echo json_encode($data);
        }
    }

    public function cmbGNDivision() {
        $data = array();
        $sql = "SELECT
st_gndivision.gnd_id,
st_gndivision.gnd_name,
st_gndivision.gnd_dsoffice
FROM
st_gndivision
WHERE
st_gndivision.gnd_dsoffice = :gnd_dsoffice
ORDER BY
st_gndivision.gnd_name ASC";
        try {
            $readstmt = $this->con->prepare($sql);
            $readstmt->bindParam(':gnd_dsoffice', $this->getGnd_dsoffice(), PDO::PARAM_INT);
            $readstmt->execute();
            while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
                $data[] = $row;
            }
            echo json_encode($data);
        } catch (Exception $exc) {
            echo json_encode($data);
        }
    }

    public function getGNDivisionByID() {
        $data = array();
        $sql = "SELECT
st_gndivision.gnd_id,
st_gndivision.gnd_name,
st_gndivision.gnd_dsoffice,
st_dsoffice.dsof_name
FROM
st_gndivision
INNER JOIN st_dsoffice ON st_gndivision.gnd_dsoffice = st_dsoffice.dsof_id
WHERE
st_gndivision.gnd_id  = :gnd_id";
        try {
            $readstmt = $this->con->prepare($sql);
            $readstmt->bindParam(':gnd_id', $this->getGnd_id(), PDO::PARAM_INT);
            $readstmt->execute();
            while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
                $data[] = $row;
            }
            echo json_encode($data);
        } catch (Exception $exc) {
            echo json_encode($data);
        }
    }

    public function saveGNDivision() {		
        $sql = "INSERT INTO `st_gndivision` (`gnd_name`, `gnd_dsoffice`) VALUES (:gnd_name, :gnd_dsoffice);";
        try {
            $createstmt = $this->con->prepare($sql);
            $createstmt->bindParam(':gnd_name', $this->getGnd_name(), PDO::PARAM_STR);
            $createstmt->bindParam(':gnd_dsoffice', $this->getGnd_dsoffice(), PDO::PARAM_INT);
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

    public function deleteGNDivision() {
        $sql = "DELETE FROM `st_gndivision` WHERE (`gnd_id`=:gnd_id);";
        try {
            $createstmt = $this->con->prepare($sql);
            $createstmt->bindParam(':gnd_id', $this->getGnd_id(), PDO::PARAM_INT);
            if ($createstmt->execute()) {
                echo json_encode(array("msgType" => 1, "msg" => "Successfully deleted"));
            } else {
                echo json_encode(array("msgType" => 2, "msg" => "Sorry! deleting failed"));
            }
        } catch (Exception $exc) {
            echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
        }
    }

    public function editGNDivision() {
        $sql = "UPDATE `st_gndivision` SET `gnd_name`=:gnd_name, `gnd_dsoffice`=:gnd_dsoffice WHERE (`gnd_id`=:gnd_id);";
        try {
            $createstmt = $this->con->prepare($sql);
            $createstmt->bindParam(':gnd_name', $this->getGnd_name(), PDO::PARAM_STR);
            $createstmt->bindParam(':gnd_dsoffice', $this->getGnd_dsoffice(), PDO::PARAM_INT);
            $createstmt->bindParam(':gnd_id', $this->getGnd_id(), PDO::PARAM_INT);
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
