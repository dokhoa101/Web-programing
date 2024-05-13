<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa thông báo cho sinh viên</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding-top: 50px;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            margin-bottom: 20px;
        }

        h3 {
            margin-top: 20px;
        }

        input[type="text"],
        input[type="date"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    

    <div class="container">
        <h2>Chỉnh sửa thông báo cho sinh viên</h2>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "giuaky";

        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $conn->prepare("SELECT * FROM thongbaosv where maTB=" . $id);
                $stmt->execute();
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                $dulieu = $stmt->fetch();
                echo "Tiến hành sửa thông báo.............";
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }

            $conn = null;
        }

        if (isset($_POST['update']) && ($_POST['update'])) {
            $id = $_POST['matin'];
            $content = $_POST['noidung'];
            $time = $_POST['time'];
            $title = $_POST['title'];

            try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sql = "UPDATE thongbaosv SET titleTB='$title', noidung='$content', time='$time' WHERE maTB=" . $id;

                $stmt = $conn->prepare($sql);
                $stmt->execute();
                echo "Cập nhật thành công!!!!!!!!!";
                header('Location: thongbaosinhvien_Themsuaxoa.php');
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }

            $conn = null;
        }
        ?>
        <form action="thongbaosinhvien_sua.php" method="post" enctype="multipart/form-data">
            <h3>Title</h3>
            <textarea id="title" type="text" name="title"><?= $dulieu['titleTB'] ?></textarea><br>
            <h3>Content</h3>
            <textarea id="noidung" name="noidung"><?= $dulieu['NoiDung'] ?></textarea><br>
            <h3>Time (xx/xx/xxxx)</h3>
            <input type="date" name="time" value="<?= $dulieu['time'] ?>"><br>
            <input type="submit" name="update" value="UPDATE"><br>
            <input type="hidden" name="matin" value="<?= $_GET['id'] ?>">
        </form>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            ClassicEditor
                .create(document.querySelector('#noidung'))
                .catch(error => {
                    console.error(error);
                });
            ClassicEditor
                .create(document.querySelector('#title'))
                .catch(error => {
                    console.error(error);
                });
        });
    </script>
</body>

</html>