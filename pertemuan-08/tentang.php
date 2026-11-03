<?php include 'config.php'; ?>
<?php include 'header.php'; ?>

<section id="about">
        <h2>Fahri Trip</h2>

        <article>
            <img src="img/baju 1.jpg">
            <img src="img/baju 2.jpg">
            <img src="img/baju 3.jpg">
            <img src="img/baju 4.jpg">
            <img src="img/baju 5.jpg">
          <h3>Fahri Trip</h3>
          <p>Jualan baju Trip: <?php echo $namaProdi . " (" . $programStudi . ")"; ?></p>
          <p>Fokus ngetrip: <?php echo $fokusprogramStudi; ?></p>
          <p>Status jualan: <?php echo $statusAktif ? "Aktif" : "Tidak aktif"; ?></p> 
          <p>Stok baju masih banyak <?php echo $sisaSemester; ?></p>
          <p>Kuliah sambil kerja: <?php echo $statusSemester; ?></p>
          <p>IPK: <?php echo number_format($ipk, 2, ',', '.'); ?></p>
          <p>Catatan tambahan: <?php echo $catatanTambahan === null ? "semoga laris" : $catatanTambahan; 
?></p> 
          <p>Semester: <?php echo $semester . " (" . $keteranganSemester . ")"; ?></p>
          <p>Saya Mahasiswa Program Studi Sistem Informasi</p>

          <h3>Target Jualan(perulangan for)</h3>
          <ol>
            <?php 
            // Perulangan for tanpa array; materi larik dibahas pada P9. 
            for ($i = 1; $i <= 5; $i++) { 
              echo "<li>Target jualan ke-" . $i . ": "; 
              switch ($i) { 
                case 1: 
                  echo "laris manis."; 
                  break; 
                case 2: 
                  echo "Membantu orang yang membutuhkan."; 
                  break; 
                case 3: 
                  echo "Mencoba hal baru."; 
                  break; 
                case 4: 
                  echo "mencoba barang pribadi."; 
            } 
            echo "</li>"; 
        } 
        ?> 
          </ol>
        </article>
          <h3>membuka beberapa cabang :</h3> 
          <ol> 
            <?php 
            $nomorSemester = 1; 
            while ($nomorSemester <= 3) { 
              echo "<li>Semester " . $nomorSemester . "</li>"; 
              $nomorSemester++; // operator penugasan 
            } 
            ?> 
          </ol> 
      </section>

<?php include 'footer.php'; ?>