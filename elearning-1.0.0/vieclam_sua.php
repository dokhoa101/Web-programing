<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Việc làm</title>
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
        input[type="number"],
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
        <h2>Edit Việc làm</h2>
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
                $stmt = $conn->prepare("SELECT * FROM thongtinvieclam where maso=" . $id);
                $stmt->execute();
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                $dulieu = $stmt->fetch();
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
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sql = "UPDATE thongtinvieclam SET vitri='$vitri', luong='$luong', anhcongty='$img', time='$time', tencongty ='$ten', gioithieucongty = '$gioithieu', yeucau = '$yc' WHERE maso=" . $id;

                $stmt = $conn->prepare($sql);
                $stmt->execute();
                echo "Cập nhật thành công!!!!!!!!!";
                header('Location: vieclam_Themsuaxoa.php');
            } catch (PDOException $e) {
                echo $sql . "<br>" . $e->getMessage();
            }

            $conn = null;
        }
        ?>
        <form action="vieclam_sua.php" method="post" enctype="multipart/form-data">
            <h3>Vị trí</h3>
            <textarea id="vitri" name="vitri"><?= $dulieu['vitri'] ?></textarea>
            <h3>Lương</h3>
            <textarea id="luong" name="luong"><?= $dulieu['luong'] ?></textarea><br>
            <h3>Tên công ty</h3>
            <textarea id="ten" name="ten"><?= $dulieu['tencongty'] ?></textarea><br>
            <h3>Yêu cầu</h3>
            <textarea id="yeucau" name="yeucau"><?= $dulieu['yeucau'] ?></textarea><br>
            <h3>Giới thiệu</h3>
            <textarea id="gt" name="gioithieu"><?= $dulieu['gioithieucongty'] ?></textarea><br>
            <h3>Link Img</h3>
            <input type="text" name="img" value="<?= $dulieu['anhcongty'] ?>"><br>
            <h3>Thời gian (xx/xx/xxxx)</h3>
            <input type="date" name="time" value="<?= $dulieu['time'] ?>"><br>
            <input type="submit" name="update" value="Cập nhật"><br>
            <input type="hidden" name="maso" value="<?= $_GET['id'] ?>">
        </form>
    </div>
    <script>
       document.addEventListener("DOMContentLoaded", function() {
            ClassicEditor
                .create(document.querySelector('#vitri'))
                .catch(error => {
                    console.error(error);
                });
            ClassicEditor
                .create(document.querySelector('#luong'))
                .catch(error => {
                    console.error(error);
                });
            ClassicEditor
                .create(document.querySelector('#ten'))
                .catch(error => {
                    console.error(error);
                });
            ClassicEditor
                .create(document.querySelector('#yeucau'))
                .catch(error => {
                    console.error(error);
                });
            ClassicEditor
                .create(document.querySelector('#gt'))
                .catch(error => {
                    console.error(error);
                });
        });
    </script>
</body>

</html>