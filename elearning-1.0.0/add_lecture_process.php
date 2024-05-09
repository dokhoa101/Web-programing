<?php
require_once ('./Entities/Monhoc.php');

// add
if (isset($_POST["btnsubmit"])) {
    // Lấy giá trị từ form collection 
    $TenBaiGiang = $_POST["LessonName"];
    $MaMonHoc = $_POST["IDMonhoc"];
    $Noidung = $_POST["lectureContent"];
    $IDBaiGiang = isset($_POST["LessonID"])?$_POST["LessonID"]:null;

    $Tailieu =  $_FILES["lectureDocument"];


    //khởi tạo đối tượng product
    $Monhocs = Monhoc::list_monhoc();
    $found = false;

    

    foreach ($Monhocs as $monhoc) {
        if ($MaMonHoc == $monhoc['IDMonHoc']) {
            $found = true;
            break;
        }
    }


    if ($found) {
        $newMonhoc = new Monhoc( $TenBaiGiang, $MaMonHoc, $Noidung, $Tailieu, $IDBaiGiang);
        $result = $newMonhoc->save();
       
    } 

    if (!$result) {
       

        header("Location: add_lecture.php?failure");
    } else {
        header("Location: add_lecture.php?inserted");

    }
}
// else {
//     echo "Lỗi: Không có dữ liệu được gửi đi.";
// }


// update
if (isset($_POST["btnupdate"])) {
    $TenBaiGiang = $_POST["LessonName"];
    $MaMonHoc = $_POST["IDMonhoc"];
    $Noidung = $_POST["lectureContent"];
    $IDBaiGiang = isset($_POST["LessonID"])?$_POST["LessonID"]:null;
    $Tailieu =  $_FILES["lectureDocument"];


    $Monhocs = Monhoc::list_monhoc();
    $found = false;

    

    foreach ($Monhocs as $monhoc) {
        if ($MaMonHoc == $monhoc['IDMonHoc']) {
            $found = true;
            break;
        }
    }


    if ($found) {
        $newMonhoc = new Monhoc( $TenBaiGiang, $MaMonHoc, $Noidung, $Tailieu, $IDBaiGiang);
        $result = $newMonhoc->update();
       
    } 

    if (!$result) {
        

        header("Location: add_lecture.php");    
    } else {
        
        header("Location: add_lecture.php");

    }
}
// else {
//     echo "Lỗi: Không có dữ liệu được gửi đi. abc";
// }

// delete
if (isset($_POST["btndelete"])) {
    $TenBaiGiang = $_POST["LessonName"];
    $MaMonHoc = $_POST["IDMonhoc"];
    $Noidung = $_POST["lectureContent"];
    $IDBaiGiang = isset($_POST["LessonID"])?$_POST["LessonID"]:null;
    $Tailieu =  $_FILES["lectureDocument"];


    $Monhocs = Monhoc::list_monhoc();
    $found = false;

    

    foreach ($Monhocs as $monhoc) {
        if ($MaMonHoc == $monhoc['IDMonHoc']) {
            $found = true;
            break;
        }
    }


    if ($found) {
        $newMonhoc = new Monhoc( $TenBaiGiang, $MaMonHoc, $Noidung, $Tailieu, $IDBaiGiang);
        $result = $newMonhoc->delete();
       
    } 

    if (!$result) {
        

        header("Location: add_lecture.php");    
    } else {
        
        header("Location: add_lecture.php");

    }
}
// else {
//     echo "Lỗi: Không có dữ liệu được gửi đi. abc";
// }