<?php
// Konfigurasi database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "forum";

// Membuat koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Jika kondisi memenuhi, lakukan redirect ke halaman utama

header("Location:/buku-tamu.php"); // Ganti /path/to/index.php dengan path yang sesuai pada situs web Anda
exit(); // Pastikan untuk keluar setelah melakukan redirect

// Memeriksa apakah ada data yang dikirimkan melalui metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mendapatkan nilai dari formulir
    $name = $_POST["Name"];
    $address = $_POST["Address"];
    $jumlahTamu = $_POST["Jumlah_Tamu"];
    $status = $_POST["status"];

    // Menyimpan data ke tabel database
    $sql = "INSERT INTO data_rsvp (name, address, jumlah_tamu, status) VALUES ('$name', '$address', '$jumlahTamu', '$status')";

    if ($conn->query($sql) === TRUE) {
        // Jika data berhasil disimpan
        $response = array(
            "success" => true,
            "message" => "Data berhasil disimpan"
        );
        echo json_encode($response);
    } else {
        // Jika terjadi kesalahan saat menyimpan data
        $response = array(
            "success" => false,
            "message" => "Gagal menyimpan data: " . $conn->error
        );
        echo json_encode($response);
    }
}

// Menutup koneksi database
$conn->close();
?>
