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

    $idAnggota = htmlspecialchars($data["idAnggota"]);
    $nama = htmlspecialchars($data["nama"]);
    $jenisKelamin = htmlspecialchars($data["jenisKelamin"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $status = "Tidak Meminjam";
    $gambar   = $_FILES['fotoAnggota']['name'];
    if (!empty($gambar)) {
        // Baca lokasi file sementar dan nama file dari form (upload)
        $lokasi_file = $_FILES['fotoAnggota']['tmp_name'];
        $tipe_file = pathinfo($gambar, PATHINFO_EXTENSION);
        $file_foto = $idAnggota . "." . $tipe_file;

        // Tentukan folder untuk menyimpan file
        $folder = "./asset/images/$file_foto";
        // Apabila file berhasil di upload
        move_uploaded_file($lokasi_file, "$folder");
    } else {
        $file_foto = null;
    }

    $query = "INSERT INTO tbanggota 
                (idanggota, nama, jeniskelamin, alamat, status, foto)
				VALUES
                ('$idAnggota', '$nama', '$jenisKelamin', '$alamat', '$status', '$file_foto')";
    mysqli_query($con, $query);

    return mysqli_affected_rows($con);
}

function hapus($id)
{
    global $con;
    $anggota = query("SELECT * FROM tbanggota WHERE idanggota = '$id'")[0];
    $foto = $anggota['foto'];
    unlink("./asset/images/$foto");
    mysqli_query($con, "DELETE FROM tbanggota WHERE idanggota = '$id'");
    return mysqli_affected_rows($con);
}

function ubah($data)
{
    global $con;

    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $jenisKelamin = htmlspecialchars($data["jenisKelamin"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $gambar   = $_FILES['fotoAnggota']['name'];
    $foto_lama =  htmlspecialchars($data["fotoLama"]);
    if (!empty($gambar)) {
        // Baca lokasi file sementar dan nama file dari form (fupload)
        $lokasi_file = $_FILES['fotoAnggota']['tmp_name'];
        $tipe_file = pathinfo($gambar, PATHINFO_EXTENSION);
        $file_foto = $id . "." . $tipe_file;
        // Tentukan folder untuk menyimpan file
        $folder = "./asset/images/$file_foto";
        $hapus_foto_lama = "./asset/images/$foto_lama";
        unlink("$hapus_foto_lama");
        // Apabila file berhasil di upload
        move_uploaded_file($lokasi_file, "$folder");
    } else {
        $file_foto = $foto_lama;
    }
    $query = "UPDATE tbanggota SET
				nama = '$nama',
				jeniskelamin = '$jenisKelamin',
				alamat = '$alamat',
				foto = '$file_foto'
			  WHERE idanggota = '$id'
			";
    mysqli_query($con, $query);

    return mysqli_affected_rows($con);
}
