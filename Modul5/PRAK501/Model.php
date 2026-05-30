<?php
require_once 'Koneksi.php';

function getAllMember() {
    $conn = koneksiDatabase();
    $query = "SELECT * FROM member";
    $result = mysqli_query($conn, $query);
    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    mysqli_close($conn);
    return $data;
}

function getMemberById($id) {
    $conn = koneksiDatabase();
    $query = "SELECT * FROM member WHERE id_member = $id";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);
    mysqli_close($conn);
    return $data;
}

function insertMember($nomor, $nama, $alamat, $tgl_daftar, $tgl_bayar) {
    $conn = koneksiDatabase();
    $query = "INSERT INTO member (nomor_member, nama_member, alamat, tgl_mendaftar, tgl_terakhir_bayar) VALUES ('$nomor', '$nama', '$alamat', '$tgl_daftar', '$tgl_bayar')";
    $result = mysqli_query($conn, $query);
    mysqli_close($conn);
    return $result;
}

function updateMember($id, $nomor, $nama, $alamat, $tgl_daftar, $tgl_bayar) {
    $conn = koneksiDatabase();
    $query = "UPDATE member SET nomor_member='$nomor', nama_member='$nama', alamat='$alamat', tgl_mendaftar='$tgl_daftar', tgl_terakhir_bayar='$tgl_bayar' WHERE id_member = $id";
    $result = mysqli_query($conn, $query);
    mysqli_close($conn);
    return $result;
}

function deleteMember($id) {
    $conn = koneksiDatabase();
    $query = "DELETE FROM member WHERE id_member = $id";
    $result = mysqli_query($conn, $query);
    mysqli_close($conn);
    return $result;
}

function getAllBuku() {
    $conn = koneksiDatabase();
    $query = "SELECT * FROM buku";
    $result = mysqli_query($conn, $query);
    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    mysqli_close($conn);
    return $data;
}

function getBukuById($id) {
    $conn = koneksiDatabase();
    $query = "SELECT * FROM buku WHERE id_buku = $id";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);
    mysqli_close($conn);
    return $data;
}

function insertBuku($judul, $penulis, $penerbit, $tahun) {
    $conn = koneksiDatabase();
    $query = "INSERT INTO buku (judul_buku, penulis, penerbit, tahun_terbit) VALUES ('$judul', '$penulis', '$penerbit', '$tahun')";
    $result = mysqli_query($conn, $query);
    mysqli_close($conn);
    return $result;
}

function updateBuku($id, $judul, $penulis, $penerbit, $tahun) {
    $conn = koneksiDatabase();
    $query = "UPDATE buku SET judul_buku='$judul', penulis='$penulis', penerbit='$penerbit', tahun_terbit='$tahun' WHERE id_buku = $id";
    $result = mysqli_query($conn, $query);
    mysqli_close($conn);
    return $result;
}

function deleteBuku($id) {
    $conn = koneksiDatabase();
    $query = "DELETE FROM buku WHERE id_buku = $id";
    $result = mysqli_query($conn, $query);
    mysqli_close($conn);
    return $result;
}

function getAllPeminjaman() {
    $conn = koneksiDatabase();
    $query = "SELECT p.*, m.nama_member, b.judul_buku FROM peminjaman p JOIN member m ON p.id_member = m.id_member JOIN buku b ON p.id_buku = b.id_buku";
    $result = mysqli_query($conn, $query);
    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    mysqli_close($conn);
    return $data;
}

function getPeminjamanById($id) {
    $conn = koneksiDatabase();
    $query = "SELECT * FROM peminjaman WHERE id_peminjaman = $id";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);
    mysqli_close($conn);
    return $data;
}

function insertPeminjaman($id_member, $id_buku, $tgl_pinjam, $tgl_kembali) {
    $conn = koneksiDatabase();
    $query = "INSERT INTO peminjaman (id_member, id_buku, tgl_pinjam, tgl_kembali) VALUES ('$id_member', '$id_buku', '$tgl_pinjam', '$tgl_kembali')";
    $result = mysqli_query($conn, $query);
    mysqli_close($conn);
    return $result;
}

function updatePeminjaman($id, $id_member, $id_buku, $tgl_pinjam, $tgl_kembali) {
    $conn = koneksiDatabase();
    $query = "UPDATE peminjaman SET id_member='$id_member', id_buku='$id_buku', tgl_pinjam='$tgl_pinjam', tgl_kembali='$tgl_kembali' WHERE id_peminjaman = $id";
    $result = mysqli_query($conn, $query);
    mysqli_close($conn);
    return $result;
}

function deletePeminjaman($id) {
    $conn = koneksiDatabase();
    $query = "DELETE FROM peminjaman WHERE id_peminjaman = $id";
    $result = mysqli_query($conn, $query);
    mysqli_close($conn);
    return $result;
}
?>