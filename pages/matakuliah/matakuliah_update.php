<h2>Ubah Data Matakuliah</h2>
<?php
include_once("../database/database.php");
$database = new Database;
$connection = $database->getConnection();

$id = $_GET['id'];

$findSQL = "SELECT * FROM matakuliah WHERE id = ?";
$statement = $connection->prepare($findSQL);
$statement->bindParam(1, $id);
$statement->execute();
$data = $statement->fetch();

if (isset($_POST['button_simpan'])) {
    $nama_matakuliah = $_POST['nama_matakuliah'];
    $hari = $_POST['hari'];
    $jam = $_POST['jam'];
    $dosen_id = $_POST['dosen_id'];
    $id = $_POST['id'];

    $updateSQL = "UPDATE `matakuliah` SET `nama_matakuliah` = ?, `hari` = ?, `jam` = ?, `dosen_id` = ? WHERE `matakuliah`.`id` = ?";

    $statement = $connection->prepare($updateSQL);
    $statement->bindParam(1, $nama_matakuliah);
    $statement->bindParam(2, $hari);
    $statement->bindParam(3, $jam);
    $statement->bindParam(4, $dosen_id);
    $statement->bindParam(5, $id);
    $statement->execute();
?>
    <div class="alert alert-success" role="alert">
        Berhasil simpan data
    </div>
<?php
    $_SESSION['pesan'] = "Berhasil ubah data";
    header('Location: main.php?page=matakuliah');
}
?>
<div class="row">
    <form action="" method="post">
        <!-- <div class="mb-3">
            <label for="id" class="form-label">Id</label>
            <input type="text" class="form-control" id="id" name="id" value="<?php echo $data['id'] ?>" readonly>
        </div> -->
        <div class="mb-3">
            <label for="nama_dosen" class="form-label">Nama Matakuliah</label>
            <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $data['id'] ?>" readonly>
            <input type="text" class="form-control" id="nama_matakuliah" name="nama_matakuliah" value="<?php echo $data['nama_matakuliah'] ?>" required>
        </div>
        <div>
            <label for="hari">Hari</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" value="Senin" type="radio" name="hari" id="hari1" required <?php echo ($data['hari'] == 'Senin') ? " checked" : "" ?>>
            <label class="form-check-label" for="hari">
                Senin
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" value="Selasa" type="radio" name="hari" id="hari2" <?php echo ($data['hari'] == 'Selasa') ? " checked" : "" ?>>
            <label class="form-check-label" for="hari">
                Selasa
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" value="Rabu" type="radio" name="hari" id="hari3" <?php echo ($data['hari'] == 'Rabu') ? " checked" : "" ?>>
            <label class="form-check-label" for="hari">
                Rabu
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" value="Kamis" type="radio" name="hari" id="hari4" <?php echo ($data['hari'] == 'Kamis') ? " checked" : "" ?>>
            <label class="form-check-label" for="hari">
                Kamis
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" value="Jumat" type="radio" name="hari" id="hari5" <?php echo ($data['hari'] == 'Jumat') ? " checked" : "" ?>>
            <label class="form-check-label" for="hari">
                Jumat
            </label>
        </div>
        <div class="mb-3">
            <label for="jam" class="form-label">Jam</label>
            <input type="text" class="form-control" id="jam" name="jam" value="<?php echo $data['jam'] ?>" required>
        </div>
        </div>
            <div class="mb-3">
            <label for="dosen_id" class="form-label">Dosen</label>
            <select class="form-select" aria-label="Default select example" name="dosen_id">
                <option selected>Pilih Dosen</option>
                <?php
                    $selectDosentSQL = "SELECT * FROM dosen";
                    $database = new Database;
                    $connection = $database->getConnection();
                    $statement = $connection->prepare($selectDosentSQL);
                    $statement->execute();

                    while ($data_dosen = $statement->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                        <option value="<?php echo $data_dosen['id'] ?>" <?php echo ($data['dosen_id'] == $data_dosen['id'] ? "selected" : "") ?>>
                        <?php echo $data_dosen['nama_dosen']?>
                        </option>
                    <?php
                    }
                ?>
            </select>
        </div>
        <button type="submit" class="btn btn-success" name="button_simpan">Simpan</button>
    </form>
</div>