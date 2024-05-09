<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Them/Sua/Xoa Thông báo sinh viên</title>
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
        $password = "123";
        $dbname = "giuaky";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO thongbaosv ( titleTB, noidung, time) VALUES ('$title', '$content', '$time')";
            // use exec() because no results are returned
            $conn->exec($sql);
            echo "Thông báo thành công........!";
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }

        $conn = null;
    }
    ?>
    <h2>Thêm thông báo cho sinh viên</h2>
    <form action="thongbaosinhvien_Themsuaxoa.php" method="post" enctype="multipart/form-data">
        <h3>Title</h3>
        <input type="text" name="title"><br>
        <h3>Nội dung thông báo</h3>
        <input type="text" name="noidung"><br>
        <h3>Time (xx/xx/xxxx)</h3>
        <input type="date" name="time"><br>
        <input type="submit" name="them" value="ADD"><br>
    </form>


    <?php
    $servername = "localhost";
    $username = "root";
    $password = "123";
    $dbname = "giuaky";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT * FROM thongbaosv ORDER BY maTB DESC");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $dulieu = $stmt->fetchAll();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    $conn = null;
    ?>

    <h1>Danh sách bài báo</h1>
    <table border="1" style="border: 5px solid #CCC; border-collapse: collapse;">

        <tr>
            <td>ID</td>
            <td>Title</td>
            <td>Content</td>
            <td>Time</td>
            <td>Sửa</td>
            <td>Xóa</td>
        </tr>
        <?php
        if (isset($dulieu)) {
            foreach ($dulieu as $dulieu) {
                $sua = "<a href = 'thongbaosinhvien_sua.php?id=" . $dulieu['maTB'] . "'>Sửa</a>";
                $xoa = "<a href = 'thongbaosinhvien_xoa.php?id=" . $dulieu['maTB'] . "' onclick = 'return confirm(\"Bạn chắc chắn muốn xóa à?\")'>Xóa</a>";
                echo '
                <tr>
                    <td>' . $dulieu['maTB'] . '</td>
                    <td>' . $dulieu['titleTB'] . '</td>
                    <td>' . $dulieu['noidung'] . '</td>
                    <td>' . $dulieu['time'] . '</td>
                    <td>' . $sua . '</td>
                    <td>' . $xoa . '</td>
                </tr>
                    ';
            }
        }
        ?>
    </table>
</body>

</html>