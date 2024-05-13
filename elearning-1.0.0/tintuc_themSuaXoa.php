<?php
session_start();
?>
<?php
require_once("Entities/Monhoc.php");
require_once("config/db.class.php");


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resources</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>
    <!-- File-input-bootstrap -->
    <!-- bootstrap 5.x or 4.x is supported. You can also use the bootstrap css 3.3.x versions -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" crossorigin="anonymous">

    <!-- default icons used in the plugin are from Bootstrap 5.x icon library (which can be enabled by loading CSS below) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.min.css" crossorigin="anonymous">

    <!-- alternatively you can use the font awesome icon library if using with `fas` theme (or Bootstrap 4.x) by uncommenting below. -->
    <!-- link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" crossorigin="anonymous" -->

    <!-- the fileinput plugin styling CSS file -->
    <link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />

    <!-- if using RTL (Right-To-Left) orientation, load the RTL CSS file after fileinput.css by uncommenting below -->
    <!-- link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/css/fileinput-rtl.min.css" media="all" rel="stylesheet" type="text/css" /-->

    <!-- the jQuery Library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>

    <!-- buffer.min.js and filetype.min.js are necessary in the order listed for advanced mime type parsing and more correct
      preview. This is a feature available since v5.5.0 and is needed if you want to ensure file mime type is parsed 
      correctly even if the local file's extension is named incorrectly. This will ensure more correct preview of the
      selected file (note: this will involve a small processing overhead in scanning of file contents locally). If you 
      do not load these scripts then the mime type parsing will largely be derived using the extension in the filename
      and some basic file content parsing signatures. -->
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/plugins/buffer.min.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/plugins/filetype.min.js" type="text/javascript"></script>

    <!-- piexif.min.js is needed for auto orienting image files OR when restoring exif data in resized images and when you
     wish to resize images before upload. This must be loaded before fileinput.min.js -->
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/plugins/piexif.min.js" type="text/javascript"></script>

    <!-- sortable.min.js is only needed if you wish to sort / rearrange files in initial preview. 
     This must be loaded before fileinput.min.js -->
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/plugins/sortable.min.js" type="text/javascript"></script>

    <!-- bootstrap.bundle.min.js below is needed if you wish to zoom and preview file content in a detail modal
     dialog. bootstrap 5.x or 4.x is supported. You can also use the bootstrap js 3.3.x versions. -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

    <!-- the main fileinput plugin script JS file -->
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/fileinput.min.js"></script>

    <!-- following theme script is needed to use the Font Awesome 5.x theme (`fa5`). Uncomment if needed. -->
    <!-- script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/themes/fa5/theme.min.js"></script -->

    <!-- optionally if you need translation for your language then include the locale file as mentioned below (replace LANG.js with your language locale) -->
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/locales/LANG.js"></script>

    <link href="css/style.css" rel="stylesheet">

</head>

<body>


    <header>

        <!-- Navigation bar -->
        <?php
        include 'header_menu.php';
        ?>


    </header>

    <!-- The ADD Modal -->
    <div class="modal fade" id="addlectureModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Add New lecture</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <form method="post" action="add_lecture_process.php" id="add" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="lectureName" class="form-label">lecture Name:</label>
                            <select name="IDMonhoc" id="lectureName">
                                <?php
                                $Monhocs = Monhoc::list_monhoc();
                                foreach ($Monhocs as $monhoc) {
                                    echo "<option value='{$monhoc['IDMonHoc']}'>{$monhoc['TenMonHoc']}</option>";
                                }
                                ?>

                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="LessonName" class="form-label">Lesson Name:</label>
                            <textarea class="form-control" id="LessonName" name='LessonName'></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="lectureContent" class="form-label">lecture Content:</label>
                            <textarea class="" id="lectureContent" name='lectureContent'></textarea>

                        </div>
                        <div class="mb-3">
                            <label for="lectureDocument" class="form-label">lecture Document:</label>
                            <input id="lectureDocument" name='lectureDocument[]' type="file" class="file" multiple data-show-upload="false" data-show-caption="true" data-msg-placeholder="Select {files} for upload...">
                        </div>


                    </form>
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="btnsubmit" form="add">Save</button>
                </div>

            </div>
        </div>
    </div>


    <main id="mainContent">
        <div class="container-fluid">
            <div class=" row">

                <div class="col-md-2 col-sd-2 sidebar " id="sub_menu">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">
                                <i class="fas fa-home"></i> Home
                            </a>
                        </li>

                        <li class="dropdown">
                            <a class="nav-link dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-regular fa-square-plus"></i>
                                Tài liệu
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <?php
                                if (isset($_SESSION['email'])) {
                                ?>
                                    <li class="nav-item ">
                                        <a href="#" class="dropdown-item " data-bs-toggle="modal" data-bs-target="#addlectureModal">Thêm tài liệu</a>
                                    </li>

                                <?php
                                }
                                ?>
                                <li><a class="dropdown-item" href="admin.php">Tất cả tài liệu</a></li>

                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="tintuc_themSuaXoa.php">
                                <i class="fa-regular fa-square-plus"></i> Tin tức
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="thongbaosinhvien_Themsuaxoa.php">
                                <i class="fa-regular fa-square-plus"></i> Thông báo
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="vieclam_Themsuaxoa.php">
                                <i class="fa-regular fa-square-plus"></i> Tuyển dụng
                            </a>
                        </li>

                    </ul>



                </div>
                <div class="col-md-10 col-sd-10">
                    <div class="row">
                        <div class="pt-3">
                            <form action="./tintuc_them.php" method="post" enctype="multipart/form-data">
                                <div class="form-group my-2">
                                    <label for="title">Title</label>
                                    <textarea id="title" name="title" class="form-control"></textarea>
                                </div>

                                <div class="form-group my-2">
                                    <label for="noidung">Content</label>
                                    <textarea id="noidung" name="noidung" class="form-control"></textarea>
                                </div>

                                <div class="form-group my-2">
                                    <label for="img">Link Img</label>
                                    <input type="text" id="img" name="img" class="form-control" placeholder="Link Img">
                                </div>

                                <div class="form-group my-2">
                                    <label for="time">Thời gian</label>
                                    <input type="date" id="time" name="time" class="form-control" placeholder="Thời gian">
                                </div>

                                <div class="form-group " style="display:flex;flex-direction: column; align-items: flex-end;">
                                    <input type="submit" name="them" class="btn btn-primary float-right" value="ADD">
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="row">
                        <div class="">
                            <?php
                            $servername = "localhost";
                            $username = "root";
                            $password = "";
                            $dbname = "giuaky";

                            try {
                                $item_per_page = !empty($_GET['per_page']) ? ($_GET['per_page']) : 2;
                                $current_page = !empty($_GET['page']) ? ($_GET['page']) : 1;
                                $offset = ($current_page - 1) * $item_per_page;

                                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                                // set the PDO error mode to exception
                                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                $stmt = $conn->prepare("SELECT * FROM tinkhoacntt ORDER BY MaTin ASC LIMIT {$item_per_page} OFFSET {$offset}");
                                $stmt->execute();
                                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                                $dulieu_tintuc = $stmt->fetchAll();

                                $stmt = $conn->prepare("SELECT * FROM tinkhoacntt ");
                                $stmt->execute();
                                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                                $totalRecords = $stmt->rowCount();
                                $totalPages = ceil($totalRecords / $item_per_page);

                            } catch (PDOException $e) {
                                echo "Error: " . $e->getMessage();
                            }

                            $conn = null;
                            ?>

                            <h1>Danh sách bài báo</h1>
                            <div class="table-responsive" style="max-width: fit-content;max-height:min-content;">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Content</th>
                                            <th>Link Img</th>
                                            <th>Time</th>
                                            <th>Sửa</th>
                                            <th>Xóa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        if (isset($dulieu_tintuc)) {
                                            foreach ($dulieu_tintuc as $tintuc) { // Sửa tên biến từ $dulieu thành $tintuc
                                                $sua = "<a href='tintuc_tabSua.php?id=" . $tintuc['MaTin'] . "'>Sửa</a>"; // Sửa từ $dulieu['MaTin'] thành $tintuc['MaTin']
                                                $xoa = "<a href='tintuc_tabDelete.php?id=" . $tintuc['MaTin'] . "' onclick='return confirm(\"Bạn chắc chắn muốn xóa à?\")'>Xóa</a>"; // Sửa từ $dulieu['MaTin'] thành $tintuc['MaTin']
                                                echo '
                                        <tr>
                                            <td><div class="limited-height">' . $tintuc['MaTin'] . '</div></td> 
                                            <td><div class="limited-height">' . $tintuc['title'] . '</div></td> 
                                            <td><div class="limited-height">' . $tintuc['body'] . '</div></td>
                                            <td><div class="limited-height">' . $tintuc['linkAnh'] . '</div></td>
                                            <td>' . $tintuc['time'] . '</td>
                                            <td>' . $sua . '</td>
                                            <td>' . $xoa . '</td>
                                        </tr>
                                    ';
                                            }
                                        }
                                        ?>

                                    </tbody>
                                </table>
                            </div>
                            <?php
                            require_once("pagination.php");

                            ?>



                        </div>

                    </div>

                </div>



            </div>
        </div>



        <?php
        require_once("footer.php");
        ?>



    </main>




    <script>
        document.addEventListener("DOMContentLoaded", function() {
            ClassicEditor
                .create(document.querySelector('#title'))
                .catch(error => {
                    console.error(error);
                });
            ClassicEditor
                .create(document.querySelector('#noidung'))
                .catch(error => {
                    console.error(error);
                });

        });

        ClassicEditor
            .create(document.querySelector('#lectureContent'))
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#LessonName'))
            .catch(error => {
                console.error(error);
            });
    </script>




    <!-- Include Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> -->

    <!-- Bootstrap 3.3.7 -->
    <!-- DataTables -->
    <!-- <script src="../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script> -->
    <!-- AdminLTE App -->
    <!-- <script src="../dist/js/adminlte.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>