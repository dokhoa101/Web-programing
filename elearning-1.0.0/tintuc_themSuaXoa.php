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
        $img = $_POST['img'];

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "giuaky";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO tinkhoacntt ( title, body, linkAnh, time) VALUES ('$title', '$content', '$img', '$time')";
            // use exec() because no results are returned
            $conn->exec($sql);
            echo "Thêm thành công 1 bài báo.";
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }

        $conn = null;
    }
    ?>
    <h2>ADD</h2>
    <form action="tintuc_themSuaXoa.php" method="post" enctype="multipart/form-data">
        <h3>Title</h3>
        <input type="text" name="title"><br>
        <h3>Content</h3>
        <input type="text" name="noidung"><br>
        <h3>Link Img</h3>
        <input type="text" name="img"><br>
        <h3>Time (xx/xx/xxxx)</h3>
        <input type="text" name="time"><br>
        <input type="submit" name="them" value="ADD"><br>
    </form>


    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "giuaky";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT * FROM tinkhoacntt");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $dulieu = $stmt->fetchAll();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    $conn = null;
    ?>

    <h1>Danh sách bài báo</h1>
    <table border=1 style="border: 5px solid #CCC; border-collapse:collapse">
        <tr>
            <td>ID</td>
            <td>Title</td>
            <td>Content</td>
            <td>Link Img</td>
            <td>Time</td>
            <td>Sửa</td>
            <td>Xóa</td>
        </tr>
        <?php
        if (isset($dulieu)) {
            foreach ($dulieu as $dulieu) {
                $sua = "<a href = 'tintuc_tabSua.php?id=" . $dulieu['MaTin'] . "'>Sửa</a>";
                $xoa = "<a href = 'tintuc_tabDelete.php?id=" . $dulieu['MaTin'] . "' onclick = 'return confirm(\"Bạn chắc chắn muốn xóa à?\")'>Xóa</a>";
                echo '
                <tr>
                    <td>' . $dulieu['MaTin'] . '</td>
                    <td>' . $dulieu['title'] . '</td>
                    <td>' . $dulieu['body'] . '</td>
                    <td>' . $dulieu['linkAnh'] . '</td>
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