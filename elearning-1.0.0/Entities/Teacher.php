<?php 
require_once('db.class.php');
class Teacher
{

public static function list_teacher(){
    $db = new Db();
    $sql = "select * from giangvien";
    $result=$db->select_to_array($sql);
    return $result;
}


}   
?>