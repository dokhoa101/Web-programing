<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa thông báo cho sinh viên</title>
</head>

<body>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "123";
    $dbname = "giuaky";

    if (isset($_GET['id'])) {
        $id = $_GET['id'];


        //laydulieu theo id
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT * FROM thongbaosv where maTB=" . $id);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $dulieu = $stmt->fetch();
            // use exec() because no results are returned
            echo "Tiến hành sửa thông báo.............";
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }

        $conn = null;
    }

    if (isset($_POST['update']) && ($_POST['update'])) {
        $id = $_POST['matin'];
        $content = $_POST['noidung'];
        $time = $_POST['time'];
        $title = $_POST['title'];
        $img = $_POST['img'];

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "UPDATE thongbaosv SET titleTB='$title', noidung='$content', time='$time' WHERE maTB=" . $id;

            // Prepare statement
            $stmt = $conn->prepare($sql);

            // execute the query
            $stmt->execute();
            echo "Cập nhật thành công!!!!!!!!!";
            header('Location: thongbaosinhvien_Themsuaxoa.php');
            // echo $stmt->rowCount() . " records UPDATED successfully";
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }

        $conn = null;
    }
    ?>
    <h2>Chỉnh sửa thông báo cho sinh viên</h2>
    <form action="thongbaosinhvien_sua.php" method="post" enctype="multipart/form-data">
        <h3>Title</h3>
        <input type="text" name="title" value="<?= $dulieu['titleTB'] ?>"><br>
        <h3>Content</h3>
        <input type="text" name="noidung" value="Thông báo sau chỉnh sửa: <?= $dulieu['noidung'] ?>"><br>
        <h3>Time (xx/xx/xxxx)</h3>
        <input type="date" name="time" value="<?= $dulieu['time'] ?>"><br>
        <input type="submit" name="update" value="UPDATE"><br>
        <!-- an id -->
        <input type="hidden" name="matin" value="<?= $_GET['id'] ?>">
    </form>
</body>

</html>