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

    $idBuku = htmlspecialchars($data["idBuku"]);
    $judul = htmlspecialchars($data["judul"]);
    $kategori = htmlspecialchars($data["kategori"]);
    $pengarang = htmlspecialchars($data["pengarang"]);
    $penerbit = htmlspecialchars($data["penerbit"]);
    $status = "Tersedia";

    $query = "INSERT INTO tbbuku 
                (idbuku, judulbuku, kategori, pengarang, penerbit, status)
				VALUES
                ('$idBuku', '$judul', '$kategori', '$pengarang', '$penerbit', '$status')";
    mysqli_query($con, $query);

    return mysqli_affected_rows($con);
}

function hapus($id)
{
    global $con;

    mysqli_query($con, "DELETE FROM tbbuku WHERE idbuku = '$id'");
    return mysqli_affected_rows($con);
}

function ubah($data)
{
    global $con;

    $id = $data["id"];
    $judul = htmlspecialchars($data["judul"]);
    $kategori = htmlspecialchars($data["kategori"]);
    $pengarang = htmlspecialchars($data["pengarang"]);
    $penerbit = htmlspecialchars($data["penerbit"]);
    $status = htmlspecialchars($data["status"]);

    $query = "UPDATE tbbuku SET
				judulbuku = '$judul',
				kategori = '$kategori',
				pengarang = '$pengarang',
				penerbit = '$penerbit',
				status = '$status'
			    WHERE idbuku = '$id'
			";

    mysqli_query($con, $query);

    return mysqli_affected_rows($con);
}
