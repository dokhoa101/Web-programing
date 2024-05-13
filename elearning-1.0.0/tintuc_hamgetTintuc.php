<?php
function getnew()
{
    $conn = tintuc_ketnoi();
    $sql = "SELECT * from tinkhoacntt ORDER BY MaTin DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $alltintuc = $stmt->fetchAll();
    $conn = null;
    return $alltintuc;
}
function chitietTintuc()
{
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        //laydulieu theo id

        $conn = tintuc_ketnoi();
        $sql = "SELECT * from tinkhoacntt where MaTin='" . $id . "'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $tintuc = $stmt->fetch();
        // use exec() because no results are returned
        $conn = null;
        return $tintuc;
    }
}
function getvieclam()
{
    $conn = tintuc_ketnoi();
    $sql = "SELECT * from thongtinvieclam ORDER BY maso DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $allvieclam = $stmt->fetchAll();
    $conn = null;
    return $allvieclam;
}
function chitietvieclam()
{
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        //laydulieu theo id

        $conn = tintuc_ketnoi();
        $sql = "SELECT * from thongtinvieclam where maso=" . $id;
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $tintuc = $stmt->fetch();
        // use exec() because no results are returned
        $conn = null;
        return $tintuc;
    }
}
function getthongbao()
{
    $conn = tintuc_ketnoi();
    $sql = "SELECT * FROM thongbaosv ORDER BY maTB DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    $conn = null;
    return $result;
}

function chitietthongbao()
{
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        //laydulieu theo id

        $conn = tintuc_ketnoi();
        $sql = "SELECT * from thongbaosv where maTB=" . $id;
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $tintuc = $stmt->fetch();
        // use exec() because no results are returned
        $conn = null;
        return $tintuc;
    }
}

