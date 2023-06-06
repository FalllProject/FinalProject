<?php
include('../helper/connection.php');
$namaBarang = $_POST['namaBarang'];
$harga = $_POST['harga'];
$deskripsi = $_POST['deskripsi'];

if ($namaBarang == "") {
    echo "Nama masih kosong";
} else {
    // Menyiapkan validasi gambar yang akan diupload
    $file = $_FILES['foto']['name'];
    $tmp_dir = $_FILES['foto']['tmp_name'];
    $ukuran = $_FILES['foto']['size'];

    $direktori = 'gambar/'; // Path tempat penyimpanan gambar
    $ekstensi = strtolower(pathinfo($file, PATHINFO_EXTENSION)); // Dapatkan informasi ekstensi gambar
    $valid_ekstensi = array('jpeg', 'jpg', 'png', 'gif'); // Ekstensi yang diperbolehkan
    $gambar = rand(1000, 1000000) . "." . $ekstensi;

    // Mulai validasi
    // Cek ekstensi gambar
    if (in_array($ekstensi, $valid_ekstensi)) {
        // Cek ukuran gambar
        if ($ukuran < 1000000) {
            move_uploaded_file($tmp_dir, $direktori . $gambar);

            // Simpan data ke database
            $query = mysqli_query($connection, "INSERT INTO produk (id, namaBarang, harga, deskripsi, foto) VALUES (NULL, '$namaBarang', '$harga', '$deskripsi', '$gambar')");
            if ($query) {
                echo "Berhasil disimpan<br/>";
                echo "Nama: $namaBarang <br/> <img src='$direktori$gambar' height='200'><br/>";
                echo "Berhasil disimpan.<br/><a href='index.php'>Lihat Halaman Berikutnya</a>";
            } else {
                echo "Gagal menyimpan: " . mysqli_error($connection);
            }
        } else {
            echo "Ukuran gambar terlalu besar<br/>";
        }
    } else {
        echo "Ekstensi gambar tidak sesuai<br/>";
    }
}
?>
