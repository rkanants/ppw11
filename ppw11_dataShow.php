<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Praktikum Pemrograman Web 11: Show Table (Arkananta Dhimas Naufal || 105220041)</title>

    <link rel="stylesheet" href="ppw11_interfaceDesign.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@800&display=swap" rel="stylesheet">

    <!-- Tabel -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body style="margin: 50px">

    <div>
        <h1>PT. Arkananta Employee Data Table</h1>
    </div>

    <div>
        <br>
        <a class='btn btn-warning btn-sm' href="ppw11_dataAdd.html" role='button'>Add New Data</a>
        <br><br>
    </div>

    <div> 
        <div>
            <table class="table">
                    <thead class="thead-dark">
                        <th>Nomor</th>
                        <th>id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Gender</th>
                        <th>Position</th>
                        <th>Status</th>
                        <th>Action</th>
                    </thead>

                    <tbody scope='row'>
                        <?php

                        // Mendefinisikan host, username, password, dan nama dari database untuk keperluan penggunaan database
                        $host = "localhost";
                        $dbUsername = "root";
                        $dbPassword = ""; 
                        $dbName = "praktikum_11";
                        
                        // Melakukan koneksi dengan database MySQL:
                        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

                        // Mengecek koneksi database MySQL:
                        if ($conn -> connect_error) {
                            die("Can't connect to MySQL Database");
                        }

                        // Membaca semua data yang ada pada tabel 'karyawan'
                        $sql = "SELECT * FROM karyawan";
                        $result = $conn -> query($sql);
                        
                        // Membaca data dari masing-masing row pada tabel
                        $i = 0;
                        while ($row = $result -> fetch_assoc()) {
                            $i = $i+1;
                            echo 
                                "<tr>   
                                    <td>$i</td>
                                    <td>" . $row["id"] . "</td>
                                    <td>" . $row["name"] . "</td>
                                    <td>" . $row["email"] . "</td>
                                    <td>" . $row["address"] . "</td>
                                    <td>" . $row["gender"] . "</td>
                                    <td>" . $row["position"] . "</td>
                                    <td>" . $row["status"] . "</td>
                                    <td>
                                        <a class='btn btn-primary btn-sm' href='ppw11_dataUpdate.html' role='button'>Update Data</a>
                                        <a class='btn btn-danger btn-sm' href='ppw11_dataDelete.php role='button'>Delete Data</a>
                                    </td>
                                </tr>";
                        }
                        
                        ?>
                    </tbody>
            </table>
        </div>
    </div>
    
</body>
</html>

<?php 


?>