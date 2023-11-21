<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pendaftaran";

$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi database
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data dari formulir
$nama = $_POST['nama'];
$email = $_POST['email'];
$nohp = $_POST['nohp'];
$semester = $_POST['semester'];
$ipk = $_POST['ipk'];
$beasiswa = $_POST['beasiswa'];
$berkas = $_POST['berkas'];

// Query untuk menyimpan data ke tabel dengan prepared statements
$sql = "INSERT INTO mahasiswa (nama, email, nohp, semester, ipk, beasiswa, berkas) VALUES (?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssss", $nama, $email, $nohp, $semester, $ipk, $beasiswa, $berkas);

if ($stmt->execute()) {
    echo "Pendaftaran berhasil!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$stmt->close();