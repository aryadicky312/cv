<?php
//gunakan file config.php
include_once("config.php");

//ambil data dan simpan kedalam variabel result
$result = mysqli_query($conn, "SELECT * FROM cv_data");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <style>
    .navbar {
    background-color: #ffffff;
    display: flex;
    align-items: center;
    justify-content: space-between;
    height: 50px;
    padding: 0 15px;
}
    
.navbar h1 {
    font-size: 35px;
    font-weight: bold;
}

.navbar a {
    color: #FFFFFF;
    text-decoration: none;
}
    
.navbar a:hover {
    color: #F6F6FA;
}
</style>

    <title>SIMPLE CV</title>

</head>

<body class="p-3">
    
    <div class="navbar">
    <h1>Curiculum Vitae</h1>
    <a class="btn btn-primary" href="update.php">Update Data</a>
    </div>


    <div class="row">
        <div class="col-sm-12">
            <table class="table table-hover">
                <?php
                while ($row = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>Nama</td>";
                    echo "<td>" . $row['nama'] . "</td>";
                    echo "</tr>";

                    echo "<tr>";
                    echo "<td>Alamat</td>";
                    echo "<td>" . $row['alamat'] . "</td>";
                    echo "</tr>";

                    echo "<tr>";
                    echo "<td>Telepon</td>";
                    echo "<td>" . $row['telepon'] . "</td>";
                    echo "</tr>";

                    echo "<tr>";
                    echo "<td>Email</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "</tr>";

                    echo "<tr>";
                    echo "<td>Web</td>";
                    echo "<td>" . $row['web'] . "</td>";
                    echo "</tr>";

                    echo "<tr>";
                    echo "<td>Pendidikan</td>";
                    echo "<td>" . $row['pendidikan'] . "</td>";
                    echo "</tr>";

                    echo "<tr>";
                    echo "<td>Pengalaman Kerja</td>";
                    echo "<td>" . $row['pengalaman_kerja'] . "</td>";
                    echo "</tr>";

                    echo "<tr>";
                    echo "<td>Keterampilan</td>";
                    echo "<td>" . $row['keterampilan'] . "</td>";
                    echo "</tr>";

                    echo "<tr>";
                    echo "<td>Foto</td>";
                    echo "<td><img src='" . $row['foto_path'] . "' alt='Foto'></td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
    </div>
</body>

</html>