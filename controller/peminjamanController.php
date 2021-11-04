<?php

include('./controller/connection.php');

function query($query)
{
    global $con;
    $result = mysqli_query($con, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data)
{
    global $con;

    $idTransaksi = htmlspecialchars($data["idTransaksi"]);
    $peminjam = htmlspecialchars($data["peminjam"]);
    $buku = htmlspecialchars($data["buku"]);
    $tglPinjam = date('Y-m-d');
    $tglKembali = date('Y-m-d', '0000-00-00');
    $status = "Dipinjam";
    $statusAnggota = "Sedang Meminjam";

    $query = "INSERT INTO tbtransaksi 
                (idtransaksi, idanggota, idbuku, tglpinjam, tglkembali)
				VALUES
                ('$idTransaksi', '$peminjam', '$buku', '$tglPinjam', '$tglKembali')";

    $query2 = "UPDATE tbbuku SET
                status = '$status'
                WHERE idbuku = '$buku'
                ";
    $query3 = "UPDATE tbanggota SET
                status = '$statusAnggota'
                WHERE idanggota = '$peminjam'
                ";
    mysqli_query($con, $query);
    mysqli_query($con, $query2);
    mysqli_query($con, $query3);

    return mysqli_affected_rows($con);
}

function hapus($id)
{
    global $con;
    $transaksi = query("SELECT * FROM tbtransaksi WHERE idtransaksi = '$id'")[0];
    $idBuku = $transaksi['idbuku'];
    $idAnggota = $transaksi['idanggota'];
    $query1 = "UPDATE tbbuku SET
                status = 'Tersedia'
                WHERE idbuku = '$idBuku'
                ";

    $query2 = "UPDATE tbanggota SET
                status = 'Tidak Meminjam'
                WHERE idanggota = '$idAnggota'
                ";

    mysqli_query($con, $query1);
    mysqli_query($con, $query2);
    mysqli_query($con, "DELETE FROM tbtransaksi WHERE idtransaksi = '$id'");
    return mysqli_affected_rows($con);
}

function ubah($data)
{
    global $con;

    $id = $data["id"];
    $peminjamBaru = htmlspecialchars($data["peminjam"]);
    $peminjamLama = htmlspecialchars($data["peminjamLama"]);
    $bukuBaru = htmlspecialchars($data["buku"]);
    $bukuLama = htmlspecialchars($data["bukuLama"]);
    $tglPinjam = date($data["tglPinjam"]);
    $peminjam = "";
    $buku = "";

    if ($peminjamBaru != $peminjamLama) {
        $peminjam = $peminjamBaru;
        $queryPeminjamBaru = "UPDATE tbanggota SET
                status = 'Sedang Meminjam'
                WHERE idanggota = '$peminjamBaru'
                ";
        $queryPeminjamLama = "UPDATE tbanggota SET
                status = 'Tidak Meminjam'
                WHERE idanggota = '$peminjamLama'
                ";
        mysqli_query($con, $queryPeminjamLama);
        mysqli_query($con, $queryPeminjamBaru);
    } else {
        $peminjam = $peminjamLama;
    }

    if ($bukuBaru != $bukuLama) {
        $buku = $bukuBaru;
        $queryBukuBaru = "UPDATE tbbuku SET
                status = 'Dipinjam'
                WHERE idbuku = '$bukuBaru'
                ";
        $queryBukuLama = "UPDATE tbbuku SET
                status = 'Tersedia'
                WHERE idbuku = '$bukuLama'
                ";
        mysqli_query($con, $queryBukuLama);
        mysqli_query($con, $queryBukuBaru);
    } else {
        $buku = $bukuLama;
    }

    $query = "UPDATE tbtransaksi SET
				idanggota = '$peminjam',
				idbuku = '$buku',
                tglpinjam = '$tglPinjam'
			    WHERE idtransaksi = '$id'
			";

    mysqli_query($con, $query);

    return mysqli_affected_rows($con);
}
