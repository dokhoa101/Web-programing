<?php
session_start();
$_SESSION['url'] = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

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
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>

    <script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>
</head>

<body>
    <header>
        <!-- Navigation bar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a href="index.php" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
                    <img src="img/TDT_logo.png" alt="tdt logo">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class=" row collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <form class="form-inline  input-group">
                            <input class="form-control mr-sm-2 " type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                        </form>
                    </ul>
                </div>


            </div>
        </nav>

    </header>




    <main id=" mainContent">
        <div class="row">

            <div class="col-md-3 col-sd-3" id="sub_menu">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="add_lecture.php">Courses</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </div>
            <div class="col-md-9 col-sd-9">



                <?php



                if (isset($_GET['IDMonHoc'])) {
                    $db = new DB;


                    $IDMonHoc = $_GET['IDMonHoc'];


                    $result = $db->select_to_array("SELECT * FROM monhoc WHERE IDMonHoc = '{$IDMonHoc}'");

                    $tenmonhoc = $result[0]['TenMonHoc'];
                    echo "<div class='container'>
                    <div class='row'>
                      <div class='col-md-9'>
                        <h2 class='display-4 text-start'>{$tenmonhoc}</h2>
                        <hr>
                        
                      </div>
                    </div>
                  </div>";




                    $item_per_page = !empty($_GET['per_page']) ? ($_GET['per_page']) : 4;
                    $current_page = !empty($_GET['page']) ? ($_GET['page']) : 1;
                    $offset = ($current_page - 1) * $item_per_page;
                    $lessons = $db->select_to_array("SELECT * FROM baigiang WHERE MaMonHoc = {$IDMonHoc}  ORDER BY MaMonHoc ASC LIMIT {$item_per_page} OFFSET {$offset}");
                    $totalRecords = $db->query_execute("SELECT * FROM baigiang WHERE MaMonHoc = {$IDMonHoc}");
                    $totalRecords = $totalRecords->num_rows;

                    $totalPages = ceil($totalRecords / $item_per_page);

                    foreach ($lessons as $lesson) {
                        $tenbaigiang = $lesson['TenBaiGiang'];
                        $mamonhoc = $lesson['MaMonHoc'];
                        $IDBaiGiang = $lesson['IDBaiGiang'];
                        $noidung = $lesson['Noidung'];
                        $tailieu = $lesson['Tailieu'];
                        $thoidiem = $lesson['Thoidiem'];



                        $listtailieu = explode("\n", $tailieu);
                        $listtailieu = array_filter($listtailieu);
                        $tenfileArray = array();


                        foreach ($listtailieu as $item) {
                            $tenfile = basename(($item));
                            $tenfile = substr($tenfile, 14);
                            $tenfileArray[] = $tenfile;
                        }






                        echo "<section class='my-2 '>                    
                        <div class='row'>
                        <div class='card col-md-9 col-sm-9' '>
                        <div class='card-body'>

                        <h5 class='card-title'><i class='fa-solid fa-book'></i> Tên bài giảng: {$tenbaigiang} ";
                        
                        if (isset($_SESSION['email'])) {
                        
                        echo"
                        <a href='#' class='' data-value=' {$IDBaiGiang}' data-bs-toggle='modal' data-bs-target='#editlectureModal'>Edit </a></h5>
                        ";
                        }
                        echo"
                        

                        <h6 class='card-subtitle mb-2 text-body-secondary'>Mã môn học: {$mamonhoc}</h6>
                        <p class='card-text'>Nội dung: {$noidung}</p>
                        <p>Thời điểm: {$thoidiem}</p>
                        <p>Tài liệu:</p>";
                        foreach ($listtailieu as $key => $item) {

                            $tenfile = $tenfileArray[$key];
                            echo "
                            <a href='{$item}' download> {$tenfile}</a>";
                        }

                        echo "
                        </div>
                        </div>
                        </div>
                        </section>";
                    }
                } else {
                    echo "Không tìm thấy giá trị môn học.";
                }

                ?>

                <?php
                require_once("pagination.php");

                ?>





            </div>


        </div>


        <?php
        require_once("footer.php");
        ?>



    </main>

    <!-- The Edit Modal -->
    <div class="modal fade" id="editlectureModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Edit lecture</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <form method="post" action="add_lecture_process.php" id="edit" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="lectureName" class="form-label">lecture Name:</label>
                            <select name="IDMonhoc" id="lectureName">
                                <?php
                                $Monhocs = Monhoc::list_monhoc();

                                foreach ($Monhocs as $monhoc) {
                                    if ($monhoc['IDMonHoc'] == $IDMonHoc) {
                                        echo "<option value='{$monhoc['IDMonHoc']}' selected>{$monhoc['TenMonHoc']}</option>";
                                    }
                                }
                                ?>

                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="LessonName" class="form-label">Lesson ID::</label>

                            <input type="number" class="form-control" id="LessonID" name='LessonID'></input>

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
                    <button type="submit" class="btn btn-danger" name="btndelete" form="edit" onclick="confirmDelete(event)">Delete</button>
                    <button type="submit" class="btn btn-primary" name="btnupdate" form="edit">Update</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                </div>

            </div>
        </div>
    </div>




    <script>
        let editors = [];
        ClassicEditor
            .create(document.querySelector('#LessonName'))
            .then(newEditor => {
                editors.push(newEditor);
            })
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#lectureContent'))
            .then(newEditor => {
                editors.push(newEditor);
            })
            .catch(error => {
                console.error(error);
            });


        function confirmDelete(event) {
            if (confirm("Bạn có chắc chắn muốn xóa môn học?")) {

                document.getElementById("edit").submit();
            } else {
                event.preventDefault();
                window.close();
            }
        }


        $(document).ready(function() {
            // Lấy giá trị của thuộc tính data-value khi click vào thẻ a
            $('#editlectureModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget); // Button that triggered the modal
                var value = button.data('value'); // Extract value from data-value attribute
                console.log(value);
                var modal = $(this);

                $.ajax({
                    type: "GET",
                    url: "modal_content.php",
                    data: {
                        value: value
                    },
                    dataType: "json",
                    success: function(response) {

                        var lessonIDInput = document.getElementById("LessonID");
                        lessonIDInput.value = response.IDBaiGiang;
                        editors[0].setData(response.TenBaiGiang);
                        editors[1].setData(response.Noidung);



                    }
                });
                // Gán giá trị vào phần tử có id="modalValue"
            });
        });
    </script>




    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>