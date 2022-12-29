<?php 
if ( isset($_GET["id"]) ) {
    $id = $_GET['id'];

    // Mendefinisikan host, username, password, dan nama dari database untuk keperluan penggunaan database
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = ""; 
    $dbName = "praktikum_11";

    // Melakukan koneksi dengan database MySQL:
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

    // Saat database MySQL tidak terkoneksi:
    if ($conn -> connect_error) {
        die("Can't connect to MySQL Database");
    }

    // Dilakukan penghapusan
    $sql = "DELETE FROM karyawan WHERE id=$id";
    $conn -> query($sql);

    $sql = "SELECT * FROM karyawan";
    $result = $conn -> query($sql);
}

header('location:ppw11_dataShow.php');
exit;
?>