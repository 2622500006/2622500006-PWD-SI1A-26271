# pertemuan-07 Pemrosesan Formulir dengan PHP,  Validasi Sisi Peladen, dan PRG

## Deskripsi 

Dokumentasi pengembangan halaman Profil Mahasiswa pada P7. Artefak P6 digunakan sebagai baseline, lalu dikembangkan agar formulir Kontak dapat mengirim dan memproses data menggunakan PHP: metode GET dan POST, validasi sisi peladen, pengamanan keluaran HTML dengan htmlspecialchars(), penggunaan session, dan pola Post-Redirect-Get (PRG). Penyimpanan data ke basis data tidak termasuk dalam P7.

## Fitur dan Pengembangan 
1. Baseline P6: Artefak P6 (index.php, style.css, script.js, aset gambar) disalin ke pertemuan-07/ tanpa mengubah folder P6.
2. Penerimaan GET ($_GET): PHP membaca parameter nama dari URL dan menampilkannya dengan htmlspecialchars().
3. Pengiriman formulir GET: Menambahkan contactForm.submit(); pada script.js setelah validasi JavaScript berhasil, sehingga formulir benar-benar terkirim.
4. Demonstrasi GET (indexGet.php): Salinan index.php disimpan sebagai pembanding dengan action="indexGet.php" dan method="get".
5. Formulir utama POST: Atribut method pada index.php diubah menjadi post.
6. Penerimaan POST ($_POST): Membaca seluruh input formulir. Checkbox minat diubah menjadi name="minat[]" agar diterima sebagai larik, dan selector JavaScript disesuaikan agar mendukung minat dan minat[].
7. Validasi sisi peladen: Pemeriksaan kelengkapan, format email dan semester (1 sampai 14), serta kesesuaian nilai pilihan (jenis pesan, program studi, minat) dengan daftar yang diizinkan.
8. Pengamanan keluaran: Seluruh data yang ditampilkan kembali dibungkus htmlspecialchars(), dan pesan memakai nl2br() setelah diamankan.
9. Session dan PRG: session_start(), penyimpanan hasil ke $_SESSION, header('Location: index.php') dan exit, lalu pengambilan data dari session. Pesan kesalahan dihapus dengan unset() setelah ditampilkan.
## Pengujian 
1. Baseline P7
 - Langkah: buka halaman P7 melalui localhost dan bandingkan dengan P6.
2. Parameter GET (?nama=Andi, ?nama=Budi Anduk, tanpa parameter).
 - Langkah: akses URL dengan parameter nama, ganti nilainya, lalu akses tanpa parameter.
3. Pengiriman formulir GET (indexGet.php).
 - Langkah: isi seluruh kolom dengan data valid, klik Kirim, amati parameter pada URL. Ulangi dengan satu kolom kosong.
 4. formulir POST (index.php)
  - Langkah: lihat sumber halaman (CTRL+U) dan pastikan method="post", kirim formulir dan pastikan nilai tidak muncul di URL.
5. Checkbox minat[] dan validasi JavaScript.
 - Langkah: uji dengan dua topik, satu topik, dan tanpa topik, pada index.php dan indexGet.php.
6. Validasi sisi peladen
 - Langkah: nonaktifkan sementara script.js, kirim formulir kosong, kirim dengan email tidak valid, dan kirim tanpa minat. Aktifkan kembali script.js setelahnya..
7. Pengamanan keluaran HTML
 - Langkah: isi pesan dengan <b>Mahasiswa</b> dan pastikan tampil sebagai teks biasa.
8. Session dan PRG
 - Langkah: kirim data valid, pastikan bagian Data yang Diterima Peladen tampil, lalu tekan CTRL+SHIFT+R dan pastikan tidak ada permintaan kirim ulang formulir.

## Riwayat Pengembangan 
- `menyalin artefak pertemuan-06 ke pertemuan-07 untuk digunakan sebagai baseline`: Menyalin `index.php`, `style.css`, `script.js`, dan aset gambar dari P6 ke `pertemuan-07/` tanpa mengubah folder P6. Hasil yang diharapkan: berkas lengkap dan halaman dapat dijalankan.
- `menguji [URL pertemuan-07] dengan hasil sama dengan pertemuan-06`: Menjalankan Laragon (Start All, Apache aktif) dan membuka halaman P7 melalui localhost. Hasil yang diharapkan: tampilan, navigasi, dan gambar profil sama dengan P6.
- `mempelajari penggunaan parameter GET`: Menambahkan blok `isset($_GET['nama'])` dengan `htmlspecialchars()`. Diuji dengan `?nama=Andi`, `?nama=Budi Anduk`, dan tanpa parameter. Hasil yang diharapkan: nama tampil sesuai parameter, dan tanpa parameter tidak ada teks maupun peringatan.
- `mempraktikkan pengiriman formulir GET`: Menambahkan `contactForm.submit();` pada `script.js` setelah validasi berhasil. Hasil yang diharapkan: formulir terkirim dan parameter terlihat di URL, sedangkan data tidak valid ditolak oleh validasi JavaScript.
- `menyimpan demonstrasi formulir GET`: Menyalin `index.php` menjadi `indexGet.php` dengan `action="indexGet.php"` dan `method="get"`. Hasil yang diharapkan: halaman demonstrasi dapat dibuka dan parameter tampil di URL.
- `mengubah formulir utama menjadi POST`: Mengubah `method="get"` menjadi `method="post"` pada `index.php`. Hasil yang diharapkan: CTRL+U menunjukkan `method="post"`, tampilan formulir tetap normal.
- `menerima data formulir menggunakan POST`: Mengganti `$_GET` dengan `$_POST` pada blok penerimaan data. Hasil yang diharapkan: nama tampil di halaman dan tidak muncul di URL.
- `menyesuaikan pembacaan input dan validasi formulir`: Membaca seluruh input lewat `$_POST`, mengubah checkbox menjadi `minat[]`, dan menyesuaikan selector JavaScript menjadi `input[name="minat"]:checked, input[name="minat[]"]:checked`. Hasil yang diharapkan: validasi mengenali topik yang dipilih di `index.php` dan `indexGet.php`.
- `menampilkan pesan kesalahan validasi PHP`: Menambahkan validasi kelengkapan, format email, rentang semester, dan nilai pilihan, serta menampilkan `$pesanKesalahan`. Diuji dengan `script.js` dinonaktifkan sementara. Hasil yang diharapkan: pesan sesuai kondisi yang dilanggar, lalu `script.js` diaktifkan kembali.
- `mengamankan keluaran data formulir`: Menampilkan data POST dengan `htmlspecialchars()` dan `nl2br()`. Diuji dengan input `<b>Mahasiswa</b>`. Hasil yang diharapkan: tampil sebagai teks biasa, bukan huruf tebal.
- `menerapkan session dan pola PRG`: Menambahkan `session_start()`, penyimpanan ke `$_SESSION`, `header('Location: index.php')`, dan `exit`. Hasil yang diharapkan: setelah kirim, halaman kembali dengan GET dan data tetap tampil. Saat dimuat ulang tidak ada permintaan kirim ulang formulir.
- Perbaikan kesalahan sintaks `index.php`: Terjadi parse error "unexpected 'endif'" karena `if` pesan kesalahan tidak memakai titik dua, dan "unexpected '$nim'" karena `session_start` kurang `();`. Keduanya diperbaiki, tag `<form>` ganda dihapus, dan tautan GitHub dirapikan. Halaman dimuat ulang dengan CTRL+SHIFT+R.