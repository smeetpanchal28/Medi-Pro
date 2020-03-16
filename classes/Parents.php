<?php 

include_once("Database.php");

/*
    pid, parent_first_name, parent_number, parent_email, parent_gender, created_at, updated_at, updated_by, deleted, deleted_at, deleted_by

    pid, $parent_first_name, $parent_number, $parent_email, $parent_gender, $created_at, $updated_at, $updated_by, $deleted, $deleted_at, $deleted_by
*/

class Parents{
    private $connection;
    public function __construct()
    {
        global $database;
        $this->connection = $database->getConnection();
        if(!isset($_SESSION['login'])){
            session_start();
        }
    }
    public function readAllParent(){
        global $database;
        $result_set = $this->connection->query("SELECT * FROM parents");
        return $result_set;
    }   

    public function getFatherDetails($sid){
        $sql = "SELECT * FROM parents WHERE pid in (SELECT pid FROM guardian WHERE sid = $sid)";
        $result_set = $this->connection->query($sql);
        while($row = mysqli_fetch_assoc($result_set)){
            if($row['parent_gender'] == "Male"){
                return $row;
            }
        }
    }
    
    public function getMotherDetails($sid){
        $sql = "SELECT * FROM parents WHERE pid in (SELECT pid FROM guardian WHERE sid = $sid)";
        $result_set = $this->connection->query($sql);
        while($row = mysqli_fetch_assoc($result_set)){
            if($row['parent_gender'] == "Female"){
                return $row;
            }
        }
    }
    
    public function insertParentDetails($parent_first_name, $parent_number, $parent_email, $parent_gender){    

        $current_date = date("Y-m-d h:i:sa");
        $created_by = $_SESSION['member_id'];
        $updated_by = $_SESSION['member_id'];
        $deleted = 0;

        $query = "INSERT INTO parents(parent_first_name, parent_number, parent_email, parent_gender, created_by, created_at, updated_at, updated_by, deleted) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $preparedStatement = $this->connection->prepare($query);
        $preparedStatement->bind_param("ssssissii", $parent_first_name, $parent_number, $parent_email, $parent_gender, $created_by, $current_date, $current_date, $updated_by, $deleted);

        if($preparedStatement->execute()){
            return $this->connection->insert_id;
        } else{
            die("ERROR WHILE INSERTING PARENT");
        }
    }
    
    public function updateParentDetails($pid, $parent_first_name, $parent_number, $parent_email){    

        $current_date = date("Y-m-d h:i:sa");
        $updated_by = $_SESSION['member_id'];

        $query = "UPDATE parents SET parent_first_name = ?, parent_number = ?, parent_email = ?, updated_at = ?, updated_by = ?  WHERE pid = ?";

        $preparedStatement = $this->connection->prepare($query);
        $preparedStatement->bind_param("ssssii", $parent_first_name, $parent_number, $parent_email, $current_date, $updated_by, $pid);

        if($preparedStatement->execute()){
            return true;
        } else{
            die("ERROR WHILE INSERTING PARENT");
        }
    }
}
?>