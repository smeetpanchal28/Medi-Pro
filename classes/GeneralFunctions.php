<?php
include_once("Database.php");
/**
 * Created by PhpStorm.
 * User: Himanshu
 * Date: 3/4/2018
 * Time: 4:44 PM
 */
class GeneralFunctions
{
    private $connection;
    public function __construct()
    {
        global $database;
        $this->connection = $database->getConnection();
    }

    public function getAllDetailsByID($tableName, $id){
        $sql = "SELECT * FROM $tableName WHERE id=$id";
        $result_set = $this->connection->query($sql);
        if ($this->connection->error)
            echo $this->connection->error;
        return ($result_set);
    }

    public function getTotalRecordCount($tableName)
    {
        $sql = "SELECT count(*) AS total_count from $tableName WHERE deleted=0";
        $result_set = $this->connection->query($sql);
        if ($row = mysqli_fetch_assoc($result_set)) {
            return $row['total_count'];
        } else {
            die("Error while Fetching total count of students");
        }
    }
    public function getTotalRecordCountWithCondition($tableName, $condition)
    {
        $sql = "SELECT count(*) AS total_count from $tableName WHERE deleted=0 ".$condition;
        if($this->connection == null){
            echo "connection is null";
        }
        $result_set = $this->connection->query($sql);
        if ($row = mysqli_fetch_assoc($result_set)) {
            return $row['total_count'];
        } else {
            die("Error while Fetching total count of students");
        }
    }
    public function readAllRecords($tableName)
    {
        $result_set = $this->connection->query("SELECT * FROM $tableName WHERE deleted = 0");
        return $result_set;
    }
    public function readAllRecordsWithCondition($tableName, $condition)
    {
        $sql  = "SELECT * FROM $tableName WHERE deleted = 0 ".$condition;

        $result_set = $this->connection->query($sql);
        return $result_set;
    }
}