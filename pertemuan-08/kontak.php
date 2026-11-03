<?php include 'config.php'; ?>
<?php include 'header.php'; ?>

      <section id="contact">
        <h2>Kontak</h2>
        <?php if($pesanKesalahan !== ''): ?>
            <p class="form-feedback-error">
                <?= htmlspecialchars($pesanKesalahan, ENT_QUOTES, 'UTF-8') ?>
        </p>

        <?php 
        unset(
          $_SESSION['pesanKesalahan']
        );
        ?>
        <?php endif; ?>

        <p>
          Kunjungi 
          <a target="_blank" href="https://github.com/2622500006/2622500006-PWD-SI1A-26271/?= PROFIL_GITHUB ?>">profil GitHub saya</a>.
        </p>

        <form id="contactForm" action="index.php" method="post" novalidate>
          <form id="contactForm" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>#contact" method="get" novalidate>
          <div class="form-group">
            <label for="nama">Nama Lengkap</label><br>

            <input 
              class="input-form"
              type="text"
              id="nama"
              name="nama"
              placeholder="Masukkan nama lengkap Anda"
              minlength="3"
              maxlength="50"
              required>
            
          </div>

          <div class="form-group">
            <label for="email">Email</label><br>

            <input 
              class="input-form"
              type="email"
              id="email"
              name="email"
              placeholder="Masukkan email Anda"
              required>
          </div>

          <div class="form-group">
            <label for="semester">Semester</label><br>

            <input 
              class="input-form"
              type="number"
              id="semester"
              name="semester"
              min="1"
              max="14"
              required>
          </div>

          <div class="form-group">
            <label for="tanggal">Tanggal Kunjungan</label><br>

            <input 
              class="input-form"
              type="date"
              id="tanggal"
              name="tanggal"
              required>
          </div>

          <div class="form-group">
            <p>Jenis Pesan</p>

            <input type="radio" id="pertanyaan" name="jenis_pesan"
                      value="pertanyaan" required>
            <label for="pertanyaan">Pertanyaan</label>

            <input type="radio" id="saran" name="jenis_pesan"
                      value="saran" required>
            <label for="saran">Saran</label>
          </div>

          <div class="form-group">
            <p>Topik Yang Diminati</p>

            <input type="checkbox" id="minat-html" name="minat[]" value="HTML" />
            <label for="minat-html">HTML</label>

            <input type="checkbox" id="minat-css" name="minat[]" value="CSS" />
            <label for="minat-css">CSS</label>
          </div>

          <div class="form-group">
            <label for="prodi">Program Studi</label><br> 

            <select class="input-form" id="prodi" name="prodi" required>
              <option value="">-- Pilih Program Studi --</option>
              <option value="SI">Sistem Informasi</option>
              <option value="TI">Teknik Informatika</option>
            </select>
          </div>

          <div class="form-group">
            <label for="pesan">Pesan</label><br>

            <textarea 
              class="input-form"
              id="pesan"
              name="pesan"
              maxlength="300"
              placeholder="Tulis pesan Anda di sini..."
              required
            ></textarea>
          </div>

          <button type="submit">Kirim</button>
          <button type="reset">Reset</button>
          <p id="formFeedback"></p>
        </form>

        <?php if (!empty($nama)): ?>
        <h3>Data yang diterima peladen</h3>

        <p> Nama:
          <?= htmlspecialchars($nama, ENT_QUOTES, 'UTF-8') ?>
        </P>

         <p>Email: 
          <?= htmlspecialchars($email, ENT_QUOTES, 'UTF-8') ?> 
        </p>

         <p>Semester: 
          <?= htmlspecialchars($semesterForm, ENT_QUOTES, 'UTF-8') ?> 
        </p>

        <p>Tanggal kunjungan: 
          <?= htmlspecialchars($tanggal, ENT_QUOTES, 'UTF-8') ?> 
        </p> 

         <p>Jenis pesan: 
          <?= htmlspecialchars($jenisPesan, ENT_QUOTES, 'UTF-8') ?> 
        </p> 

         <p>Program studi: 
          <?= htmlspecialchars($prodi, ENT_QUOTES, 'UTF-8') ?> 
        </p> 

        <P>Minat:</p>

        <?php if (is_array($minat) && count($minat) > 0): ?> 
          <ul> 
            <?php foreach ($minat as $topik): ?> 
              <li> 
                <?= htmlspecialchars((string) $topik, ENT_QUOTES, 'UTF-8') ?> 
              </li> 
            <?php endforeach; ?>
          </ul>
         <?php else: ?> 
          <p>Tidak ada minat yang dipilih.</p> 
        <?php endif; ?> 
 
        <p>Pesan:</p> 
 
        <p><?= nl2br(htmlspecialchars($pesan, ENT_QUOTES, 'UTF-8')) ?></p>

      <?php endif; ?> 
      </section>
    </main>

<?php include 'footer.php'; ?>