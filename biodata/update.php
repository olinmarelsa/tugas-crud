<?php
header('Content-Type: application/json');
include "konekdb.php";

if (!isset($_POST['id'])) {
    echo json_encode(['success' => false, 'message' => 'ID tidak ditemukan']);
    exit;
}

$nis = $_POST['nis'];
$nama = $_POST['nama'];
$tplahir = $_POST['tplahir'];
$tglahir = $_POST['tglahir'];
$kelamin = $_POST['kelamin'];
$agama = $_POST['agama'];
$alamat = $_POST['alamat'];
$id = $_POST['id']; // ID untuk kondisi WHERE

$stmt = $db->prepare("UPDATE siswa SET nis = ?, nama = ?, tplahir = ?, tglahir = ?, kelamin = ?, agama = ?, alamat = ? WHERE id = ?");
$result = $stmt->execute([$nis, $nama, $tplahir, $tglahir, $kelamin, $agama, $alamat, $id]);

echo json_encode([
    'success' => $result
]);
