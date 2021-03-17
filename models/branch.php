<?php

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
include '../dbconfig/connectDB.php';

/**
 * @author Ruwan Jayawardena
 */
class Branch extends ConnectDB {

    const TBL_Branch = 'st_branch';

    private $flag = false;
    private $br_id;
    private $br_name;
    private $br_zone;

    public function getFlag() {
        return $this->flag;
    }

    public function getBr_id() {
        return $this->br_id;
    }

    public function getBr_name() {
        return $this->br_name;
    }

    public function getBr_zone() {
        return $this->br_zone;
    }

    public function setFlag($flag) {
        $this->flag = $flag;
    }

    public function setBr_id($br_id) {
        $this->br_id = $br_id;
    }

    public function setBr_name($br_name) {
        $this->br_name = $br_name;
    }

    public function setBr_zone($br_zone) {
        $this->br_zone = $br_zone;
    }

    public function getAllBranch() {
        $data = array();
        $sql = "SELECT
edustaffmgmt.st_branch.br_id,
edustaffmgmt.st_branch.br_name,
edustaffmgmt.st_branch.br_zone,
govedustock.st_zonal.zol_name
FROM
edustaffmgmt.st_branch
INNER JOIN govedustock.st_zonal ON edustaffmgmt.st_branch.br_zone = govedustock.st_zonal.zol_id
WHERE
edustaffmgmt.st_branch.br_zone = :br_zone
ORDER BY
edustaffmgmt.st_branch.br_id DESC";
        try {
            $readstmt = $this->con->prepare($sql);
            $readstmt->bindParam(':br_zone', $this->getBr_zone(), PDO::PARAM_INT);
            $readstmt->execute();
            while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
                $data[] = $row;
            }
            echo json_encode($data);
        } catch (Exception $exc) {
            echo json_encode($data);
        }
    }

    public function cmbBranch() {
        $data = array();
        $sql = "SELECT
st_branch.br_id,
st_branch.br_name,
st_branch.br_zone
FROM
st_branch
WHERE
st_branch.br_zone = :br_zone
ORDER BY
st_branch.br_name ASC";
        try {
            $readstmt = $this->con->prepare($sql);
            $readstmt->bindParam(':br_zone', $this->getBr_zone(), PDO::PARAM_INT);
            $readstmt->execute();
            while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
                $data[] = $row;
            }
            echo json_encode($data);
        } catch (Exception $exc) {
            echo json_encode($data);
        }
    }

    public function getBranchByID() {
        $data = array();
        $sql = "SELECT
edustaffmgmt.st_branch.br_name,
edustaffmgmt.st_branch.br_id,
govedustock.st_zonal.zol_id,
edustaffmgmt.st_branch.br_zone,
govedustock.st_province.prov_id
FROM
edustaffmgmt.st_branch
INNER JOIN govedustock.st_zonal ON edustaffmgmt.st_branch.br_zone = govedustock.st_zonal.zol_id
INNER JOIN govedustock.st_province ON govedustock.st_zonal.zol_province = govedustock.st_province.prov_id
WHERE
edustaffmgmt.st_branch.br_id = :br_id";
        try {
            $readstmt = $this->con->prepare($sql);
            $readstmt->bindParam(':br_id', $this->getBr_id(), PDO::PARAM_INT);
            $readstmt->execute();
            while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
                $data[] = $row;
            }
            echo json_encode($data);
        } catch (Exception $exc) {
            echo json_encode($data);
        }
    }

    public function saveBranch() {		
        $sql = "INSERT INTO `st_branch` (`br_name`, `br_zone`) VALUES (:br_name, :br_zone);";
        try {
            $createstmt = $this->con->prepare($sql);
            $createstmt->bindParam(':br_name', $this->getBr_name(), PDO::PARAM_STR);
            $createstmt->bindParam(':br_zone', $this->getBr_zone(), PDO::PARAM_INT);
            if ($createstmt->execute()) {
                echo json_encode(array("msgType" => 1, "msg" => "Successfully saved"));
            } else {
                echo json_encode(array("msgType" => 2, "msg" => "Sorry! saving failed"));
            }
        } catch (Exception $exc) {
            if ($exc->getCode() == 23000) {
                echo json_encode(array("msgType" => 2, "msg" => "You are entered duplicate division.Please check and change it"));
            } else {
                echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
            }
        }
    }

    public function deleteBranch() {
        $sql = "DELETE FROM `st_branch` WHERE (`br_id`=:br_id);";
        try {
            $createstmt = $this->con->prepare($sql);
            $createstmt->bindParam(':br_id', $this->getBr_id(), PDO::PARAM_INT);
            if ($createstmt->execute()) {
                echo json_encode(array("msgType" => 1, "msg" => "Successfully deleted"));
            } else {
                echo json_encode(array("msgType" => 2, "msg" => "Sorry! deleting failed"));
            }
        } catch (Exception $exc) {
            echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
        }
    }

    public function editBranch() {
        $sql = "UPDATE `st_branch` SET `br_name`=:br_name, `br_zone`=:br_zone WHERE (`br_id`=:br_id);";
        try {
            $createstmt = $this->con->prepare($sql);
            $createstmt->bindParam(':br_name', $this->getBr_name(), PDO::PARAM_STR);
            $createstmt->bindParam(':br_zone', $this->getBr_zone(), PDO::PARAM_INT);
            $createstmt->bindParam(':br_id', $this->getBr_id(), PDO::PARAM_INT);
            if ($createstmt->execute()) {
                echo json_encode(array("msgType" => 1, "msg" => "Successfully updated"));
            } else {
                echo json_encode(array("msgType" => 2, "msg" => "Sorry! updating failed"));
            }
        } catch (Exception $exc) {
            if ($exc->getCode() == 23000) {
                echo json_encode(array("msgType" => 2, "msg" => "You are entered duplicate division.Please check and change it"));
            } else {
                echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
            }
        }
    }

}
