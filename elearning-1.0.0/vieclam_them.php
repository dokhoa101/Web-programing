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
        $vitri = $_POST['vitri'];
        $luong = $_POST['luong'];
        $ten = $_POST['ten'];
        $yc = $_POST['yeucau'];
        $gioithieu = $_POST['gioithieu'];
        $img = $_POST['img'];
        $time = $_POST['time'];


        $servername = "localhost";
        $username = "root";
        $password = "";
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
            header('Location: vieclam_Themsuaxoa.php');
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }

        $conn = null;
    }
    ?>
    
</body>

</html>