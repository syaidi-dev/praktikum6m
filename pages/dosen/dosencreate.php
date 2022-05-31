<h2>Tambah Data Dosen</h2>
<?php
if (isset($_POST['button_simpan'])) {
    $nama_dosen = $_POST['nama_dosen'];
    $handphone = $_POST['handphone'];
    $email = $_POST['email'];

    // $createSQL = "INSERT INTO `dosen` (`id`, `nama_dosen`, `handphone`, `email`) VALUES (NULL, '$nama_dosen', '$handphone', '$email')";
    $createSQL = "INSERT INTO `dosen` (`id`, `nama_dosen`, `handphone`, `email`) VALUES (NULL, ?, ?, ?)";

    include_once("../database/database.php");
    $database = new Database;
    $connection = $database->getConnection();
    $statement = $connection->prepare($createSQL);
    $statement->bindParam(1, $nama_dosen);
    $statement->bindParam(2, $handphone);
    $statement->bindParam(3, $email);
    $statement->execute();
?>
    <div class="alert alert-success" role="alert">
        Berhasil simpan data
    </div>
<?php
    $_SESSION['pesan'] = "Berhasil simpan data";
    header('Location: main.php?page=dosen');
}
?>
<div class="row">
    <form action="" method="post">
        <div class="mb-3">
            <label for="nama_dosen" class="form-label">Nama Dosen</label>
            <input type="text" class="form-control" id="nama_dosen" name="nama_dosen" required>
        </div>
        <div class="mb-3">
            <label for="handphone" class="form-label">Handphone</label>
            <input type="text" class="form-control" id="handphone" name="handphone" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
        </div>
        <button type="submit" class="btn btn-success" name="button_simpan">Simpan</button>
    </form>
</div>