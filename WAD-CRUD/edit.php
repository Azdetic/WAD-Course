<?php
include 'config.php';

// Cek ID dari parameter URL
if(isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    
    // Ambil data mahasiswa berdasarkan ID
    $sql = "SELECT * FROM mahasiswa WHERE id = $id";
    $result = $conn->query($sql);
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nama = $row['nama'];
        $nim = $row['nim'];
        $email = $row['email'];
        $jurusan = $row['jurusan'];
    } else {
        header("Location: index.php");
        exit();
    }
}

// Proses form update
if(isset($_POST['submit'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $email = $_POST['email'];
    $jurusan = $_POST['jurusan'];
    
    // Query untuk update data
    $sql = "UPDATE mahasiswa SET nama='$nama', nim='$nim', email='$email', jurusan='$jurusan' WHERE id=$id";
    
    if($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mahasiswa</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Data Mahasiswa
                            <a href="index.php" class="btn btn-danger float-right">Kembali</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <input type="hidden" name="id" value="<?= $id; ?>">
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="nama" value="<?= $nama; ?>" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>NIM</label>
                                <input type="text" name="nim" value="<?= $nim; ?>" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" value="<?= $email; ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Jurusan</label>
                                <input type="text" name="jurusan" value="<?= $jurusan; ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <button type="submit" name="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
