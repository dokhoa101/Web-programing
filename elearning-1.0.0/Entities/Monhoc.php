<?php
require_once('config\db.class.php');
class Monhoc
{
    public $TenBaiGiang;
    public $MaMonHoc;
    public $Noidung;

    public $Tailieu;
    public $IDBaiGiang;


    public function __construct($TenBaiGiang, $MaMonHoc, $Noidung, $Tailieu, $IDBaiGiang)
    {
        $this->TenBaiGiang = $TenBaiGiang;
        $this->MaMonHoc = $MaMonHoc;
        $this->Noidung = $Noidung;
        $this->Tailieu = $Tailieu;
        $this->IDBaiGiang = $IDBaiGiang;
    }


    public static function list_monhoc()
    {
        $db = new Db();
        $sql = "select * from monhoc";
        $result = $db->select_to_array($sql);
        return $result;
    }

    public static function list_baigiang($IDMonhoc)
    {
        $db = new Db();
        $sql = "select * from baigiang where MaMonHoc= '$IDMonhoc' ";
        $result = $db->select_to_array($sql);
        return $result;
    }




    public function save()
    {
        try {

            $lesson_name = strip_tags($this->TenBaiGiang);
            $content = strip_tags($this->Noidung);
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $timestamp  = date("Y") . date("m") . date("d") . date("h") . date("i") . date("s");



            $filepaths = "";

            foreach ($this->Tailieu["tmp_name"] as $key => $file_temp) {
                $user_file = $this->Tailieu["name"][$key];
                $filepath = "upload/" . $timestamp . $user_file;

                if (move_uploaded_file($file_temp, $filepath)) {
                    $filepaths .= $filepath . "\n";
                }
            }




            $db = new Db();
            $sql = "INSERT INTO baigiang ( TenBaiGiang, MaMonHoc, Noidung, Tailieu, Thoidiem) VALUES
                ( '$lesson_name', '$this->MaMonHoc', '$content','$filepaths','$timestamp' )";
            $result = $db->query_execute($sql);
            return $result;
        } catch (Exception $exception) {
            echo $exception;
        }
    }


    public function update()
    {
        try {
            $db = new Db();
            $lesson_name = strip_tags($this->TenBaiGiang);
            $content = strip_tags($this->Noidung);
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $timestamp  = date("Y") . date("m") . date("d") . date("h") . date("i") . date("s");



            $filepaths = "";






            if (!(empty($this->Tailieu['name'][0]) && empty($this->Tailieu['size'][0]))) {
                foreach ($this->Tailieu["tmp_name"] as $key => $file_temp) {
                    $user_file = $this->Tailieu["name"][$key];
                    $filepath = "upload/" . $timestamp . $user_file;

                    if (move_uploaded_file($file_temp, $filepath)) {
                        $filepaths .= $filepath . "\n";
                    }
                }


                $sql = "UPDATE baigiang SET TenBaiGiang = '$lesson_name', MaMonHoc = '$this->MaMonHoc', Noidung = '$content', Tailieu = '$filepaths', Thoidiem = '$timestamp' WHERE IDBaiGiang = ' $this->IDBaiGiang'";
            } else {
                $sql = "UPDATE baigiang SET TenBaiGiang = '$lesson_name', MaMonHoc = '$this->MaMonHoc', Noidung = '$content', Thoidiem = '$timestamp' WHERE IDBaiGiang = ' $this->IDBaiGiang'";
            }
            $result = $db->query_execute($sql);
            return $result;
        } catch (Exception $exception) {
            echo $exception;
        }
    }

    public function delete()
    {
        try {
            $db = new Db();

            $lesson_name = strip_tags($this->TenBaiGiang);
            $content = strip_tags($this->Noidung);
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $timestamp  = date("Y") . date("m") . date("d") . date("h") . date("i") . date("s");


            $sql_tailieu = "SELECT Tailieu FROM baigiang WHERE IDBaiGiang = ' $this->IDBaiGiang'";
            $tailieu = $db->select_to_array($sql_tailieu);


            $listtailieu = explode("\n", $tailieu[0]['Tailieu']);
            $listtailieu = array_filter($listtailieu);

            foreach ($listtailieu as $item ) {
                if (file_exists($item)) {
                    if (unlink($item)) {
                        // 
                    } else {
                        echo "Không thể xóa file.";
                    }
                } else {
                    echo "File không tồn tại.";
                }
            }



            




            $sql = "DELETE FROM baigiang WHERE IDBaiGiang = ' $this->IDBaiGiang'";
            $result = $db->query_execute($sql);
            return $result;
        } catch (Exception $exception) {
            echo $exception;
        }
    }
}
