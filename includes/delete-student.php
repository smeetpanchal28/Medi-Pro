<?php
    include_once("../classes/Student.php");
    if($_REQUEST['sid']){   //REQUEST is the super global method - get post and cookie
        $sid = $_REQUEST['sid'];
        $student = new Student();
        $student->deleteStudent($sid);
    }
?>