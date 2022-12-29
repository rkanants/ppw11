
<?php 

// Saat variabel 'submit' sudah dideklarasikan (tidak NULL):
if (isset($_POST['buttonSubmit'])) {
    
    // Saat variabel 'txtName', 'txtEmail', 'txtAddress', 'txtGender', 'txtPosition', dan 'txtStatus' sudah dideklarasikan (tidak NULL): 
    if (isset($_POST['txtName']) && isset($_POST['txtEmail']) &&
        isset($_POST['txtAddress']) && isset($_POST['txtGender']) &&
        isset($_POST['txtPosition']) && isset($_POST['txtStatus'])) {
        
        // Hasil input pengguna disimpan di variabel baru (untuk mempermudah penggunaan)
        $name = $_POST['txtName'];
        $email = $_POST['txtEmail'];
        $address = $_POST['txtAddress'];
        $gender = $_POST['txtGender'];
        $position = $_POST['txtPosition'];
        $status = $_POST['txtStatus'];

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

        // Saat database MySQL terkoneksi:
        else {
            // Dilakukan SELECT dan INSERT:
            $SELECT = "SELECT email FROM karyawan WHERE email = ? LIMIT 1";
            $INSERT = "INSERT INTO karyawan(name, email, address, gender, position, status) VALUES(?, ?, ?, ?, ?, ?)";

            //
            $stmt = $conn -> prepare($SELECT);
            $stmt -> bind_param("s", $email);
            $stmt -> execute();
            $stmt -> bind_result($resultEmail);
            $stmt -> store_result();
            $stmt -> fetch();
            $rnum = $stmt -> num_rows;

            // Ketika email belum terdaftar di database
            if ($rnum == 0) {
                //
                $stmt -> close();

                //
                $stmt = $conn -> prepare($INSERT);
                $stmt -> bind_param("ssssss", $name, $email, $address, $gender, $position, $status);

                //
                if ($stmt -> execute()) { 
                    echo "<script>alert('The data is successfully stored in the database!')</script>";
                    header('location:ppw11_dataShow.php');
                }

                //
                else {
                    echo $stmt -> error;
                }
            }

            // Ketika email sudah didaftarkan oleh pengguna lain:
            else {
                echo "Somebody is alredy use this email, please use another email!";
            }

            //
            $stmt->close();
            $conn->close();
        }

    }

    // Saat variabel 'txtName', 'txtEmail', 'txtAddress', 'txtGender', 'txtPosition', dan 'txtStatus' belum dideklarasikan:
    else {
        echo "Please fill in the data first!";
        die();
    }
}

// Saat variabel 'submit' belum dideklarasikan:
else {
    echo "Submit button isn't set!";
}

?>


