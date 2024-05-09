<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Tin Tức</title>
</head>

<body>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "giuaky";

    if (isset($_GET['id'])) {
        $id = $_GET['id'];


        //laydulieu theo id
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT * FROM tinkhoacntt where MaTin=" . $id);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $dulieu = $stmt->fetch();
            // use exec() because no results are returned
            echo "Tiến hành sửa tin tức.";
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

            $sql = "UPDATE tinkhoacntt SET title='$title', body='$content', linkAnh='$img', time='$time' WHERE MaTin=" . $id;

            // Prepare statement
            $stmt = $conn->prepare($sql);

            // execute the query
            $stmt->execute();
            echo "Cập nhật thành công!!!!!!!!!";
            header('Location: tintuc_themSuaXoa.php');
            // echo $stmt->rowCount() . " records UPDATED successfully";
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }

        $conn = null;
    }
    ?>
    <h2>Edit Tin Tức</h2>
    <form action="tintuc_tabSua.php" method="post" enctype="multipart/form-data">
        <h3>Title</h3>
        <input type="text" name="title" value="<?= $dulieu['title'] ?>"><br>
        <h3>Content</h3>
        <input type="text" name="noidung" value="<?= $dulieu['body'] ?>"><br>
        <h3>Link Img</h3>
        <input type="text" name="img" value="<?= $dulieu['linkAnh'] ?>"><br>
        <h3>Time (xx/xx/xxxx)</h3>
        <input type="text" name="time" value="<?= $dulieu['time'] ?>"><br>
        <input type="submit" name="update" value="UPDATE"><br>
        <!-- an id -->
        <input type="hidden" name="matin" value="<?= $_GET['id'] ?>">
    </form>
</body>

</html>