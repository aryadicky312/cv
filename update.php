<?php
include_once("config.php");

if (isset($_POST['update'])) {
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);
    $telepon = mysqli_real_escape_string($conn, $_POST['telepon']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $web = mysqli_real_escape_string($conn, $_POST['web']);
    $pendidikan = mysqli_real_escape_string($conn, $_POST['pendidikan']);
    $pengalaman_kerja = mysqli_real_escape_string($conn, $_POST['pengalaman_kerja']);
    $keterampilan = mysqli_real_escape_string($conn, $_POST['keterampilan']);

    $result = mysqli_query($conn, "UPDATE cv_data SET 
        nama='$nama', 
        alamat='$alamat', 
        telepon='$telepon', 
        email='$email', 
        web='$web', 
        pendidikan='$pendidikan', 
        pengalaman_kerja='$pengalaman_kerja', 
        keterampilan='$keterampilan' 
        WHERE id='$id'");

    if ($result) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

$id = $_GET['id'] ?? 1; // Jika $_GET['id'] tidak ada, maka akan menggunakan nilai default 1
$id = mysqli_real_escape_string($conn, $id);

$result = mysqli_query($conn, "SELECT * FROM cv_data WHERE id='$id'");
$row = mysqli_fetch_array($result);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Update Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            color: #333;
            margin-top: 15px;
            margin-left: 520px;
            font-weight: bold;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
            font-weight: bold;
        }

        form input {
            margin-bottom: 10px;
            padding: 8px;
            width: 100%;
            box-sizing: border-box;
        }

        form input[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            cursor: pointer;
        }

        form input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .btn {
            margin-top: 10px;
            text-decoration: none;
            padding: 8px 16px;
            background-color: #007BFF;
            color: #fff;
            border-radius: 4px;
            display: inline-block;
        }

        .btn:hover {
            background-color: #0056b3;
        }
    </style>

</head>

<body class="p-3">
    <h1>Update Data CV</h1>

    <form action="update.php" method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        Nama <input type="text" name="nama" value="<?php echo $row['nama']; ?>"><br>
        Alamat <input type="text" name="alamat" value="<?php echo $row['alamat']; ?>"><br>
        Telepon <input type="text" name="telepon" value="<?php echo $row['telepon']; ?>"><br>
        Email <input type="text" name="email" value="<?php echo $row['email']; ?>"><br>
        Web <input type="text" name="web" value="<?php echo $row['web']; ?>"><br>
        Pendidikan <input type="text" name="pendidikan" value="<?php echo $row['pendidikan']; ?>"><br>
        Pengalaman Kerja <input type="text" name="pengalaman_kerja" value="<?php echo $row['pengalaman_kerja']; ?>"><br>
        Keterampilan <input type="text" name="keterampilan" value="<?php echo $row['keterampilan']; ?>"><br>
        Foto <input type="text" name="foto_path" value="<?php echo $row['foto_path']; ?>"><br>
        <input type="submit" name="update" value="Update">
    </form>

    <a class="btn btn-primary" href="index.php">Kembali</a>
</body>

</html>