<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Jadwal Ibadah</title>
</head>
<body>
    <h1>Admin Panel - Jadwal Ibadah</h1>

    <?php
    // Koneksi ke database MySQL
    $servername = "localhost";
    $username = "username";
    $password = "password";
    $dbname = "nama_database";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Cek koneksi
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Ambil data dari tabel "jadwal_ibadah"
    $sql = "SELECT * FROM jadwal_ibadah";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>
            <tr>
                <th>Hari</th>
                <th>Jam</th>
                <th>Pelayan Firman</th>
                <th>Liturgis</th>
                <th>Pemain Musik</th>
                <th>Lokasi</th>
            </tr>";

        // Tampilkan data dalam tabel
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>" . $row['hari'] . "</td>
                <td>" . $row['jam'] . "</td>
                <td>" . $row['pelayan_firman'] . "</td>
                <td>" . $row['liturgis'] . "</td>
                <td>" . $row['pemain_musik'] . "</td>
                <td>" . $row['lokasi'] . "</td>
            </tr>";
        }
        echo "</table>";
    } else {
        echo "Tidak ada data yang tersedia.";
    }

    $conn->close();
    ?>
</body>
</html>