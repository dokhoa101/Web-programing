<?php
require_once('./config/Teacher.php');
require_once('./config/Monhoc.php');
?>

<?php
$teachers = Teacher::list_teacher();
?>
<?php foreach ($teachers as $teacher) { ?>
    <div class="col-sm-4 mb-sm-0">
        <p class="text-danger"><?php echo $teacher["Email"]; ?></p>
        <p class="text-info"><?php echo $teacher["pass"]; ?></p>
    </div>
<?php } ?>


<?php
$Monhocs = Monhoc::list_monhoc();
?>

<?php foreach ($Monhocs as $Monhoc) { ?>
    <div class="col-sm-4 mb-sm-0">
        <p class="text-danger"><?php echo $Monhoc["IDMonHoc"]; ?></p>
        <p class="text-info"><?php echo $Monhoc["TenMonHoc"]; ?></p>
    </div>
<?php } ?>