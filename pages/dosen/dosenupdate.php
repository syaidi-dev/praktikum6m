<h2>Ubah Data Dosen</h2>
<?php
include_once("../database/database.php");
$database = new Database;
$connection = $database->getConnection();

$id = $_GET['id'];

$findSQL = "SELECT * FROM dosen WHERE id = ?";
$statement = $connection->prepare($findSQL);
$statement->bindParam(1, $id);
$statement->execute();
$data = $statement->fetch();

if (isset($_POST['button_simpan'])) {
    $nama_dosen = $_POST['nama_dosen'];
    $handphone = $_POST['handphone'];
    $email = $_POST['email'];
    $id = $_POST['id'];

    // $createSQL = "INSERT INTO `dosen` (`id`, `nama_dosen`, `handphone`, `email`) VALUES (NULL, '$nama_dosen', '$handphone', '$email')";
    $updateSQL = "UPDATE `dosen` SET `nama_dosen` = ?, `handphone` = ?, `email` = ? WHERE `dosen`.`id` = ?";


    $statement = $connection->prepare($updateSQL);
    $statement->bindParam(1, $nama_dosen);
    $statement->bindParam(2, $handphone);
    $statement->bindParam(3, $email);
    $statement->bindParam(4, $id);
    $statement->execute();
?>
    <div class="alert alert-success" role="alert">
        Berhasil simpan data
    </div>
<?php
    $_SESSION['pesan'] = "Berhasil ubah data";
    header('Location: main.php?page=dosen');
}
?>
<div class="row">
    <form action="" method="post">
        <!-- <div class="mb-3">
            <label for="id" class="form-label">Id</label>
            <input type="text" class="form-control" id="id" name="id" value="<?php echo $data['id'] ?>" readonly>
        </div> -->
        <div class="mb-3">
            <label for="nama_dosen" class="form-label">Nama Dosen</label>
            <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $data['id'] ?>" readonly>
            <input type="text" class="form-control" id="nama_dosen" name="nama_dosen" value="<?php echo $data['nama_dosen'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="handphone" class="form-label">Handphone</label>
            <input type="text" class="form-control" id="handphone" name="handphone" value="<?php echo $data['handphone'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" value="<?php echo $data['email'] ?>" required>
        </div>
        <button type="submit" class="btn btn-success" name="button_simpan">Simpan</button>
    </form>
</div>