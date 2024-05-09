<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Việc làm</title>
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
            $stmt = $conn->prepare("SELECT * FROM thongtinvieclam where maso=" . $id);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $dulieu = $stmt->fetch();
            // use exec() because no results are returned
            echo "Tiến hành sửa thông tin việc làm...";
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }

        $conn = null;
    }

    if (isset($_POST['update']) && ($_POST['update'])) {
        $id = $_POST['maso'];
        $vitri = $_POST['vitri'];
        $luong = $_POST['luong'];
        $ten = $_POST['ten'];
        $yc = $_POST['yeucau'];
        $gioithieu = $_POST['gioithieu'];
        $img = $_POST['img'];
        $time = $_POST['time'];

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "UPDATE thongtinvieclam SET vitri='$vitri', luong='$luong', anhcongty='$img', time='$time', tencongty ='$ten', gioithieucongty = '$gioithieu', yeucau = '$yc' WHERE maso=" . $id;

            // Prepare statement
            $stmt = $conn->prepare($sql);

            // execute the query
            $stmt->execute();
            echo "Cập nhật thành công!!!!!!!!!";
            header('Location: vieclam_Themsuaxoa.php');
            // echo $stmt->rowCount() . " records UPDATED successfully";
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }

        $conn = null;
    }
    ?>
    <h2>ADD Công Ty</h2>
    <form action="vieclam_sua.php" method="post" enctype="multipart/form-data">
        <h3>Vị trí</h3>
        <input type="text" name="vitri" value="<?= $dulieu['vitri'] ?>"><br>
        <h3>luong</h3>
        <input type="number" name="luong" value="<?= $dulieu['luong'] ?>"><br>
        <h3>Tên công ty</h3>
        <input type="text" name="ten" value="<?= $dulieu['tencongty'] ?>"><br>
        <h3>Yêu cầu</h3>
        <input type="text" name="yeucau" value="<?= $dulieu['yeucau'] ?>"><br>
        <h3>Giới thiệu</h3>
        <input type="text" name="gioithieu" value="<?= $dulieu['gioithieucongty'] ?>"><br>
        <h3>Link Img</h3>
        <input type="text" name="img" value="<?= $dulieu['anhcongty'] ?>"><br>
        <h3>Time (xx/xx/xxxx)</h3>
        <input type="date" name="time" value="<?= $dulieu['time'] ?>"><br>
        <input type="submit" name="update" value="UPDATE"><br>
        <!-- an id -->
        <input type="hidden" name="maso" value="<?= $_GET['id'] ?>">
    </form>
</body>

</html>