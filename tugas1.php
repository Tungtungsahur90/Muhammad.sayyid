<?php
// Cek apakah jumlah siswa sudah diinput
if (!isset($_POST['jumlah'])) {
    // Form awal: tanya berapa siswa
    ?>
    <form method="post">
        <h2><b>Input Biodata Siswa</b></h2>
        <label>Masukkan jumlah siswa: </label>
        <input type="number" name="jumlah" required>
        <button type="submit">Lanjut</button>
    </form>
    <?php
} else {
    $jumlah = (int)$_POST['jumlah'];

    // Jika sudah isi biodata
    if (isset($_POST['simpan'])) {
        $biodata = [];
        for ($i = 0; $i < $jumlah; $i++) {
            $biodata[] = [
                "nama_lengkap" => $_POST['nama_lengkap'][$i],
                "nisn"         => $_POST['nisn'][$i],
                "umur"         => $_POST['umur'][$i]
            ];
        }

        echo "<h3>Data Siswa:</h3>";
        foreach ($biodata as $index => $data) {
            echo "<b>Siswa ".($index + 1)."</b><br>";
            echo "Nama Lengkap : ".$data['nama_lengkap']."<br>";
            echo "NISN         : ".$data['nisn']."<br>";
            echo "Umur         : ".$data['umur']."<br><br>";
        }

    } else {
        // Form input biodata sesuai jumlah
        echo "<h3>Masukkan Biodata $jumlah Siswa</h3>";
        echo '<form method="post">';
        echo '<input type="hidden" name="jumlah" value="'.$jumlah.'">';
        for ($i = 0; $i < $jumlah; $i++) {
            echo "<fieldset style='margin-bottom:10px;'>";
            echo "<legend>Siswa ".($i + 1)."</legend>";
            echo "Nama Lengkap: <input type='text' name='nama_lengkap[]' required><br>";
            echo "NISN: <input type='text' name='nisn[]' required><br>";
            echo "Umur: <input type='number' name='umur[]' required><br>";
            echo "</fieldset>";
        }
        echo '<button type="submit" name="simpan">Simpan</button>';
        echo '</form>';
    }
}
?>
