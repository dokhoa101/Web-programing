
<?php
session_start();
require_once("Entities/Monhoc.php");
require_once("config/db.class.php");





if (isset($_GET['value'])) {
    $db = new Db();
    $IDBaiGiang = $_GET['value'];
    $currentLessonName = $db->select_to_array("SELECT * FROM baigiang WHERE IDBaiGiang = '{$IDBaiGiang}'");
    echo json_encode($currentLessonName[0]);
    ;

    // var_dump($currentLessonName);exit;

} else {
    // Xử lý khi khóa 'IDBaiGiang' không tồn tại trong $_GET
}
