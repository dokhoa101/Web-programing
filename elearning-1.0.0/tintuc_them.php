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
            header("Location: tintuc_themSuaXoa.php?inserted");

            // echo "Thêm thành công 1 bài báo.";
            // echo "<a href = 'tintuc_themSuaXoa.php'>trở vể Danh sách</a>";
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }

        $conn = null;
    }
    ?>
    


    


</body>

</html>