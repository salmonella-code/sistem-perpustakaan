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

function approve($id)
{
    global $con;

    $transaksi = query("SELECT * FROM tbtransaksi WHERE idtransaksi = '$id'")[0];
    $idTransaksi = $transaksi['idtransaksi'];
    $idBuku = $transaksi['idbuku'];
    $idAnggota = $transaksi['idanggota'];
    $tglKembali = date('Y-m-d');
    $query1 = "UPDATE tbbuku SET
                status = 'Tersedia'
                WHERE idbuku = '$idBuku'
                ";

    $query2 = "UPDATE tbanggota SET
                status = 'Tidak Meminjam'
                WHERE idanggota = '$idAnggota'
                ";

    $query3 = "UPDATE tbtransaksi SET
                tglkembali = '$tglKembali'
                WHERE idtransaksi = '$idTransaksi'
                ";

    // die(var_dump($query1, $query2, $query3));

    mysqli_query($con, $query1);
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

function disapprove($id)
{
    global $con;

    $transaksi = query("SELECT * FROM tbtransaksi WHERE idtransaksi = '$id'")[0];
    $idTransaksi = $transaksi['idtransaksi'];
    $idBuku = $transaksi['idbuku'];
    $idAnggota = $transaksi['idanggota'];
    $tglKembali = date('1970-01-01');
    $query1 = "UPDATE tbbuku SET
                status = 'Dipinjam'
                WHERE idbuku = '$idBuku'
                ";

    $query2 = "UPDATE tbanggota SET
                status = 'Sedang Meminjam'
                WHERE idanggota = '$idAnggota'
                ";

    $query3 = "UPDATE tbtransaksi SET
                tglkembali = '$tglKembali'
                WHERE idtransaksi = '$idTransaksi'
                ";

    // die(var_dump($query1, $query2, $query3));

    mysqli_query($con, $query1);
    mysqli_query($con, $query2);
    mysqli_query($con, $query3);

    return mysqli_affected_rows($con);
}