<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Them/Sua/Xoa</title>
</head>

<body>

<?php
    if (isset($_POST['them']) && ($_POST['them'])) {
        //laydulieu tu form
        $content = $_POST['noidung'];
        $time = $_POST['time'];
        $title = $_POST['title'];

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "giuaky";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO thongbaosv ( titleTB, NoiDung, time) VALUES ('$title', '$content', '$time')";
            // use exec() because no results are returned
            $conn->exec($sql);
            echo "Thông báo thành công........!";
            header('Location: thongbaosinhvien_Themsuaxoa.php');
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }

        $conn = null;
    }
    ?>
    


    


</body>

</html>