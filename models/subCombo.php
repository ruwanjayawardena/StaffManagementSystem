<?php

if (session_status() !== PHP_SESSION_ACTIVE) {
	session_start();
}
include '../dbconfig/connectDB.php';

/**
 * @author Ruwan Jayawardena
 */
class SubCombo extends ConnectDB {

	const TBL_SubCombo = 'st_subcombo';

	private $flag = false;
	//sub Combo box
	private $scmb_id;
	private $scmb_name;
	private $scmb_maincmb;
	private $scmb_relatecmb;
	private $scmb_relationship;
	//main combo box
	private $mcmb_id;
	//relate combo box
	private $rlcmb_id;
	private $rlcmb_name;

	function getRlcmb_id() {
		return $this->rlcmb_id;
	}

	function getRlcmb_name() {
		return $this->rlcmb_name;
	}

	function setRlcmb_id($rlcmb_id) {
		$this->rlcmb_id = $rlcmb_id;
		return $this;
	}

	function setRlcmb_name($rlcmb_name) {
		$this->rlcmb_name = $rlcmb_name;
		return $this;
	}

	function getMcmb_id() {
		return $this->mcmb_id;
	}

	function setMcmb_id($mcmb_id) {
		$this->mcmb_id = $mcmb_id;
		return $this;
	}

	function getFlag() {
		return $this->flag;
	}

	function getScmb_id() {
		return $this->scmb_id;
	}

	function getScmb_name() {
		return $this->scmb_name;
	}

	function getScmb_maincmb() {
		return $this->scmb_maincmb;
	}

	function getScmb_relatecmb() {
		return $this->scmb_relatecmb;
	}

	function getScmb_relationship() {
		return $this->scmb_relationship;
	}

	function setFlag($flag) {
		$this->flag = $flag;
		return $this;
	}

	function setScmb_id($scmb_id) {
		$this->scmb_id = $scmb_id;
		return $this;
	}

	function setScmb_name($scmb_name) {
		$this->scmb_name = $scmb_name;
		return $this;
	}

	function setScmb_maincmb($scmb_maincmb) {
		$this->scmb_maincmb = $scmb_maincmb;
		return $this;
	}

	function setScmb_relatecmb($scmb_relatecmb) {
		$this->scmb_relatecmb = $scmb_relatecmb;
		return $this;
	}

	function setScmb_relationship($scmb_relationship) {
		$this->scmb_relationship = $scmb_relationship;
		return $this;
	}

	public function getMainComboInfoByID() {
		$data = array();
		$sql = "SELECT
st_maincombo.mcmb_id,
st_maincombo.mcmb_name,
st_maincombo.mcmb_class,
st_maincombo.mcmb_relatetsub
FROM
st_maincombo
WHERE
st_maincombo.mcmb_id = :mcmb_id";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':mcmb_id', $this->getMcmb_id(), PDO::PARAM_INT);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function getAllSubCombo() {
		$data = array();
		$sql = "SELECT
st_subcombo.scmb_id,
st_subcombo.scmb_name,
st_maincombo.mcmb_id,
st_maincombo.mcmb_name,
st_maincombo.mcmb_class
FROM
st_subcombo
INNER JOIN st_maincombo ON st_subcombo.scmb_maincmb = st_maincombo.mcmb_id
WHERE
st_subcombo.scmb_maincmb = :scmb_maincmb AND";
		if ($this->getScmb_relationship() == 2) {
			//1 - Main Combo, 2 - Relate Combo
			$sql .= " st_subcombo.scmb_relatecmb = :scmb_relatecmb AND";
		}
		$sql .= " st_subcombo.scmb_relationship = :scmb_relationship
ORDER BY
st_subcombo.scmb_id DESC";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':scmb_maincmb', $this->getScmb_maincmb(), PDO::PARAM_INT);
			if ($this->getScmb_relationship() == 2) {
				//1 - Main Combo, 2 - Relate Combo
				$readstmt->bindParam(':scmb_relatecmb', $this->getScmb_relatecmb(), PDO::PARAM_INT);
			}
			$readstmt->bindParam(':scmb_relationship', $this->getScmb_relationship(), PDO::PARAM_INT);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function getAllRelateCombo() {
		$data = array();
		$sql = "SELECT
st_relatecombo.rlcmb_id,
st_relatecombo.rlcmb_name,
st_relatecombo.rlcmb_maincmb
FROM
st_relatecombo
WHERE
st_relatecombo.rlcmb_maincmb = :rlcmb_maincmb
ORDER BY
st_relatecombo.rlcmb_id DESC";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':rlcmb_maincmb', $this->getMcmb_id(), PDO::PARAM_INT);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function cmbRelateCombo() {
		$data = array();
		$sql = "SELECT
st_relatecombo.rlcmb_id,
st_relatecombo.rlcmb_name
FROM
st_relatecombo
WHERE
st_relatecombo.rlcmb_maincmb = :rlcmb_maincmb
ORDER BY
st_relatecombo.rlcmb_name ASC";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':rlcmb_maincmb', $this->getMcmb_id(), PDO::PARAM_INT);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function cmbSubCombo() {
		$data = array();
		$sql = "SELECT
st_subcombo.scmb_id,
st_subcombo.scmb_name
FROM
st_subcombo
WHERE
st_subcombo.scmb_maincmb = :scmb_maincmb";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':scmb_maincmb', $this->getScmb_maincmb(), PDO::PARAM_INT);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function getSubComboByID() {
		$data = array();
		$sql = "SELECT
st_subcombo.scmb_name,
st_subcombo.scmb_id,
st_subcombo.scmb_relatecmb
FROM
st_subcombo
WHERE
st_subcombo.scmb_id = :scmb_id";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':scmb_id', $this->getScmb_id(), PDO::PARAM_INT);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function getRelateComboByID() {
		$data = array();
		$sql = "SELECT
st_relatecombo.rlcmb_id,
st_relatecombo.rlcmb_name,
st_relatecombo.rlcmb_maincmb
FROM
st_relatecombo
WHERE
st_relatecombo.rlcmb_id = :rlcmb_id";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':rlcmb_id', $this->getRlcmb_id(), PDO::PARAM_INT);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

	public function saveSubCombo() {
		$sql = "INSERT INTO `st_subcombo` (`scmb_name`, `scmb_maincmb`, `scmb_relatecmb`, `scmb_relationship`) VALUES (:scmb_name, :scmb_maincmb, :scmb_relatecmb, :scmb_relationship);";
		try {
			$createstmt = $this->con->prepare($sql);
			$createstmt->bindParam(':scmb_name', $this->getScmb_name(), PDO::PARAM_STR);
			$createstmt->bindParam(':scmb_maincmb', $this->getScmb_maincmb(), PDO::PARAM_INT);
			if ($this->getScmb_relatecmb() == 0) {
				$myNull = null;
				$createstmt->bindParam(':scmb_relatecmb', $myNull, PDO::PARAM_NULL);
			} else {
				$createstmt->bindParam(':scmb_relatecmb', $this->getScmb_relatecmb(), PDO::PARAM_INT);
			}
			$createstmt->bindParam(':scmb_relationship', $this->getScmb_relationship(), PDO::PARAM_INT);
			if ($createstmt->execute()) {
				echo json_encode(array("msgType" => 1, "msg" => "Successfully saved"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry! saving failed"));
			}
		} catch (Exception $exc) {
			if ($exc->getCode() == 23000) {
				echo json_encode(array("msgType" => 2, "msg" => "You are entered duplicate entry.Please check and change it"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
			}
		}
	}

	public function saveRelateCombo() {
		$sql = "INSERT INTO `st_relatecombo` (`rlcmb_name`, `rlcmb_maincmb`) VALUES (:rlcmb_name, :rlcmb_maincmb);";
		try {
			$createstmt = $this->con->prepare($sql);
			$createstmt->bindParam(':rlcmb_name', $this->getRlcmb_name(), PDO::PARAM_STR);
			$createstmt->bindParam(':rlcmb_maincmb', $this->getMcmb_id(), PDO::PARAM_INT);
			if ($createstmt->execute()) {
				echo json_encode(array("msgType" => 1, "msg" => "Successfully saved"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry! saving failed"));
			}
		} catch (Exception $exc) {
			if ($exc->getCode() == 23000) {
				echo json_encode(array("msgType" => 2, "msg" => "You are entered duplicate entry.Please check and change it"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
			}
		}
	}

	public function deleteSubCombo() {
		$sql = "DELETE FROM `st_subcombo` WHERE (`scmb_id`=:scmb_id);";
		try {
			$createstmt = $this->con->prepare($sql);
			$createstmt->bindParam(':scmb_id', $this->getScmb_id(), PDO::PARAM_INT);
			if ($createstmt->execute()) {
				echo json_encode(array("msgType" => 1, "msg" => "Successfully deleted"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry! deleting failed"));
			}
		} catch (Exception $exc) {
			echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
		}
	}

	public function deleteRelateCombo() {
		$sql = "DELETE FROM `st_relatecombo` WHERE (`rlcmb_id` = :rlcmb_id);";
		try {
			$createstmt = $this->con->prepare($sql);
			$createstmt->bindParam(':rlcmb_id', $this->getRlcmb_id(), PDO::PARAM_INT);
			if ($createstmt->execute()) {
				echo json_encode(array("msgType" => 1, "msg" => "Successfully deleted"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry! deleting failed"));
			}
		} catch (Exception $exc) {
			echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
		}
	}

	public function editSubCombo() {
		$sql = "UPDATE `st_subcombo` SET `scmb_name`=:scmb_name WHERE (`scmb_id` = :scmb_id);";
		try {
			$createstmt = $this->con->prepare($sql);
			$createstmt->bindParam(':scmb_name', $this->getScmb_name(), PDO::PARAM_STR);
			$createstmt->bindParam(':scmb_id', $this->getScmb_id(), PDO::PARAM_INT);
			if ($createstmt->execute()) {
				echo json_encode(array("msgType" => 1, "msg" => "Successfully updated"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry! updating failed"));
			}
		} catch (Exception $exc) {
			if ($exc->getCode() == 23000) {
				echo json_encode(array("msgType" => 2, "msg" => "You are entered duplicate entry.Please check and change it"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
			}
		}
	}

	public function editRelateSubCombo() {
		$sql = "UPDATE `st_subcombo` SET `scmb_name`=:scmb_name, `scmb_relatecmb` = :scmb_relatecmb WHERE (`scmb_id` = :scmb_id);";
		try {
			$createstmt = $this->con->prepare($sql);
			$createstmt->bindParam(':scmb_name', $this->getScmb_name(), PDO::PARAM_STR);
			$createstmt->bindParam(':scmb_id', $this->getScmb_id(), PDO::PARAM_INT);
			$createstmt->bindParam(':scmb_relatecmb', $this->getScmb_relatecmb(), PDO::PARAM_INT);
			if ($createstmt->execute()) {
				echo json_encode(array("msgType" => 1, "msg" => "Successfully updated"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry! updating failed"));
			}
		} catch (Exception $exc) {
			if ($exc->getCode() == 23000) {
				echo json_encode(array("msgType" => 2, "msg" => "You are entered duplicate entry.Please check and change it"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
			}
		}
	}

	public function editRelateCombo() {
		$sql = "UPDATE `st_relatecombo` SET `rlcmb_name`=:rlcmb_name WHERE (`rlcmb_id` = :rlcmb_id);";
		try {
			$createstmt = $this->con->prepare($sql);
			$createstmt->bindParam(':rlcmb_name', $this->getRlcmb_name(), PDO::PARAM_STR);
			$createstmt->bindParam(':rlcmb_id', $this->getRlcmb_id(), PDO::PARAM_INT);
			if ($createstmt->execute()) {
				echo json_encode(array("msgType" => 1, "msg" => "Successfully updated"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry! updating failed"));
			}
		} catch (Exception $exc) {
			if ($exc->getCode() == 23000) {
				echo json_encode(array("msgType" => 2, "msg" => "You are entered duplicate entry.Please check and change it"));
			} else {
				echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
			}
		}
	}

	public function cmbRelateSubCombo() {
		$data = array();
		$sql = "SELECT
st_subcombo.scmb_id,
st_subcombo.scmb_name
FROM
st_subcombo
WHERE
st_subcombo.scmb_maincmb = :scmb_maincmb AND
st_subcombo.scmb_relatecmb = :scmb_relatecmb AND
st_subcombo.scmb_relationship = 2
ORDER BY
st_subcombo.scmb_name ASC";
		try {
			$readstmt = $this->con->prepare($sql);
			$readstmt->bindParam(':scmb_maincmb', $this->getMcmb_id(), PDO::PARAM_INT);
			$readstmt->bindParam(':scmb_relatecmb', $this->getRlcmb_id(), PDO::PARAM_INT);
			$readstmt->execute();
			while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
				$data[] = $row;
			}
			echo json_encode($data);
		} catch (Exception $exc) {
			echo json_encode($data);
		}
	}

}
