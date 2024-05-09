<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Them/Sua/Xoa Thong tin viec lam</title>
</head>

<body>

    <?php
    if (isset($_POST['them']) && ($_POST['them'])) {
        //laydulieu tu form
        $vitri = $_POST['vitri'];
        $luong = $_POST['luong'];
        $ten = $_POST['ten'];
        $yc = $_POST['yeucau'];
        $gioithieu = $_POST['gioithieu'];
        $img = $_POST['img'];
        $time = $_POST['time'];


        $servername = "localhost";
        $username = "root";
        $password = "123";
        $dbname = "giuaky";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO thongtinvieclam (vitri, luong, yeucau, time, tencongty, gioithieucongty, anhcongty) 
                VALUES ('$vitri', '$luong','$yc', '$time' ,'$ten', '$gioithieu','$img')";
            // use exec() because no results are returned
            $conn->exec($sql);
            echo "Thêm thành công việc làm.";
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }

        $conn = null;
    }
    ?>
    <h2>ADD Công Ty</h2>
    <form action="vieclam_Themsuaxoa.php" method="post" enctype="multipart/form-data">
        <h3>Vị trí</h3>
        <input type="text" name="vitri"><br>
        <h3>luong</h3>
        <input type="number" name="luong"><br>
        <h3>Tên công ty</h3>
        <input type="text" name="ten"><br>
        <h3>Yêu cầu</h3>
        <input type="text" name="yeucau"><br>
        <h3>Giới thiệu</h3>
        <input type="text" name="gioithieu"><br>
        <h3>Link Img</h3>
        <input type="text" name="img"><br>
        <h3>Time (xx/xx/xxxx)</h3>
        <input type="date" name="time"><br>
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
        $stmt = $conn->prepare("SELECT * FROM thongtinvieclam ORDER BY maso DESC");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $dulieu = $stmt->fetchAll();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    $conn = null;
    ?>

    <h1>Danh sách việc làm</h1>
    <table border=1 style="border: 5px solid #CCC; border-collapse:collapse">
        <tr>
            <td>ID</td>
            <td>Vị Trí</td>
            <td>Mức Lương</td>
            <td>Link img</td>
            <td>Tên Công Ty</td>
            <td>Yêu Cầu</td>
            <td>Giới Thiệu</td>
            <td>Thời gian đăng bài</td>
            <td>Sửa</td>
            <td>Xóa</td>
        </tr>
        <?php
        if (isset($dulieu)) {
            foreach ($dulieu as $dulieu) {
                $sua = "<a href = 'vieclam_sua.php?id=" . $dulieu['maso'] . "'>Sửa</a>";
                $xoa = "<a href = 'vieclam_xoa.php?id=" . $dulieu['maso'] . "' onclick = 'return confirm(\"Bạn chắc chắn muốn xóa à?\")'>Xóa</a>";
                echo '
                <tr>
                    <td>' . $dulieu['maso'] . '</td>
                    <td>' . $dulieu['vitri'] . '</td>
                    <td>' . $dulieu['luong'] . '</td>
                    <td>' . $dulieu['anhcongty'] . '</td>
                    <td>' . $dulieu['tencongty'] . '</td>
                    <td>' . $dulieu['yeucau'] . '</td>
                    <td>' . $dulieu['gioithieucongty'] . '</td>
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