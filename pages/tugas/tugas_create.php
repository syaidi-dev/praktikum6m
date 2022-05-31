<h2>Tambah Tugas</h2>
<?php
include_once("../database/database.php");

if (isset($_POST['button_simpan'])) {

        $matakuliah_id = $_POST['matakuliah_id'];
        $nama_tugas = $_POST['nama_tugas'];
        $keterangan = $_POST['keterangan'];
        $deadline = $_POST['deadline'];


        $createSQL = "INSERT INTO `tugas` (`id`,`matakuliah_id`,`nama_tugas`,`keterangan`, `deadline`) VALUES (NULL, ?,?,?,?)";

        include_once("../database/database.php");
        $database = new Database;
        $connection = $database->getConnection();
        $statement = $connection->prepare($createSQL);
        $statement->bindParam(1, $matakuliah_id);
        $statement->bindParam(2, $nama_tugas);
        $statement->bindParam(3, $keterangan);
        $statement->bindParam(4, $deadline);
        $statement->execute();
?>
    <div class="alert alert-success" role="alert">
        Berhasil simpan data
    </div>
<?php
    $_SESSION['pesan'] = "Berhasil simpan data";
    header('Location: main.php?page=tugas');
}
?>
<div class="row">
    <form action="" method="post">
        <div class="mb-3">
            <label for="matakuliah_id" class="form-label">Matakuliah</label>                          
            <select class="form-select" aria-label="Default select example" name="matakuliah_id">
                <option value="" selected>-- Pilih Matakuliah --</option>
                <?php 
                 $selectMatakuliahSQL ="SELECT * FROM matakuliah";
                 $database = new Database;
                 $connection = $database->getConnection();
                 $statement = $connection->prepare($selectMatakuliahSQL);
                 $statement->execute();
    
                 while ($data = $statement->fetch(PDO::FETCH_ASSOC)) {

                ?>
                    <option value="<?php echo $data['id'] ?>"><?php echo $data['nama_matakuliah'] ?></option>
                <?php
                 }
                ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="nama_tugas" class="form-label">Nama Tugas</label>
            <input type="text" class="form-control" id="nama_tugas" name="nama_tugas" required>
        </div>
        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <input type="text" class="form-control" id="keterangan" name="keterangan" required>
        </div>
        <div class="mb-3">
            <label for="deadline" class="form-label">deadline</label>
            <input type="text" class="form-control" id="deadline" name="deadline" required>
        </div>
        <button type="submit" class="btn btn-success" name="button_simpan">Simpan</button>
    </form>