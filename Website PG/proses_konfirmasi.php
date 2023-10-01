<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['konfirmasiNama'];
    $email = $_POST['konfirmasiEmail'];

    // Handle file upload
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["buktiTransfer"]["name"]);
    if (move_uploaded_file($_FILES["buktiTransfer"]["tmp_name"], $target_file)) {
        $sql = "INSERT INTO konfirmasi (nama, email, bukti_transfer) VALUES ('$nama', '$email', '$target_file')";

        if (mysqli_query($koneksi, $sql)) {
            echo "Data berhasil disimpan.";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
        }
    } else {
        echo "Maaf, terdapat kesalahan saat mengunggah file.";
    }
}
?>