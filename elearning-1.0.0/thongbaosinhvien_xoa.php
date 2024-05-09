<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xóa thông báo cho sinh viên</title>
</head>

<body>
    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "giuaky";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // sql to delete a record
            $sql = "DELETE FROM thongbaosv WHERE maTB=" . $id;

            // use exec() because no results are returned
            $conn->exec($sql);
            echo "Xóa thành công!!!!!";
            echo "<a href = 'thongbaosinhvien_Themsuaxoa.php'>trở vể Danh sách</a>";
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }

        $conn = null;
    }
    ?>
</body>

</html>