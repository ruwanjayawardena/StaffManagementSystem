<?php

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
include '../dbconfig/connectDB.php';

/**
 * @author Ruwan Jayawardena
 */
class District extends ConnectDB {

    const TBL_District = 'st_district';

    private $flag = false;
    private $dtr_id;
    private $dtr_name;

    public function getFlag() {
        return $this->flag;
    }

    public function getDtr_id() {
        return $this->dtr_id;
    }

    public function getDtr_name() {
        return $this->dtr_name;
    }    

    public function setFlag($flag) {
        $this->flag = $flag;
    }

    public function setDtr_id($dtr_id) {
        $this->dtr_id = $dtr_id;
    }

    public function setDtr_name($dtr_name) {
        $this->dtr_name = $dtr_name;
    }   

    public function getAllDistrict() {
        $data = array();
        $sql = "SELECT
st_district.dtr_id,
st_district.dtr_name
FROM
st_district
ORDER BY
st_district.dtr_id DESC";
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

    public function cmbDistrict() {
        $data = array();
        $sql = "SELECT
st_district.dtr_id,
st_district.dtr_name
FROM
st_district
ORDER BY
st_district.dtr_name ASC";
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

    public function getDistrictByID() {
        $data = array();
        $sql = "SELECT
st_district.dtr_id,
st_district.dtr_name
FROM
st_district
WHERE
st_district.dtr_id = :dtr_id";
        try {
            $readstmt = $this->con->prepare($sql);
            $readstmt->bindParam(':dtr_id', $this->getDtr_id(), PDO::PARAM_INT);
            $readstmt->execute();
            while ($row = $readstmt->fetch(PDO::FETCH_ASSOC)) {
                $data[] = $row;
            }
            echo json_encode($data);
        } catch (Exception $exc) {
            echo json_encode($data);
        }
    }

    public function saveDistrict() {
        $sql = "INSERT INTO `st_district` (`dtr_name`) VALUES (:dtr_name);";
        try {
            $createstmt = $this->con->prepare($sql);
            $createstmt->bindParam(':dtr_name', $this->getDtr_name(), PDO::PARAM_STR);           
            if ($createstmt->execute()) {
                echo json_encode(array("msgType" => 1, "msg" => "Successfully saved"));
            } else {
                echo json_encode(array("msgType" => 2, "msg" => "Sorry! saving failed"));
            }
        } catch (Exception $exc) {
            if ($exc->getCode() == 23000) {
                echo json_encode(array("msgType" => 2, "msg" => "You are entered duplicate zone.Please check and change it"));
            } else {
                echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
            }
        }
    }

    public function deleteDistrict() {
        $sql = "DELETE FROM `st_district` WHERE (`dtr_id`=:dtr_id);";
        try {
            $createstmt = $this->con->prepare($sql);
            $createstmt->bindParam(':dtr_id', $this->getDtr_id(), PDO::PARAM_INT);
            if ($createstmt->execute()) {
                echo json_encode(array("msgType" => 1, "msg" => "Successfully deleted"));
            } else {
                echo json_encode(array("msgType" => 2, "msg" => "Sorry! deleting failed"));
            }
        } catch (Exception $exc) {
            echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
        }
    }

    public function editDistrict() {
        $sql = "UPDATE `st_district` SET `dtr_name`=:dtr_name WHERE (`dtr_id`=:dtr_id);";
        try {
            $createstmt = $this->con->prepare($sql);
            $createstmt->bindParam(':dtr_name', $this->getDtr_name(), PDO::PARAM_STR);            
            $createstmt->bindParam(':dtr_id', $this->getDtr_id(), PDO::PARAM_INT);
            if ($createstmt->execute()) {
                echo json_encode(array("msgType" => 1, "msg" => "Successfully updated"));
            } else {
                echo json_encode(array("msgType" => 2, "msg" => "Sorry! updating failed"));
            }
        } catch (Exception $exc) {
            if ($exc->getCode() == 23000) {
                echo json_encode(array("msgType" => 2, "msg" => "You are entered duplicate zone.Please check and change it"));
            } else {
                echo json_encode(array("msgType" => 2, "msg" => $exc->getMessage()));
            }
        }
    }

}
