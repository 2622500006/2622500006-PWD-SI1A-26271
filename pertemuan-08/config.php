<?php
session_start();

// P6: PHP dasar dan pemrograman sisi peladen 
// Bagian 1: Variabel dan konstanta 
$nim = "2622500006"; 
$namaMahasiswa = "Fahri Septa Ramadhan"; 
$programStudi = "SI"; 
$tahunAkademik = "2026/2027"; 
$semester = 1; 
$ipk = 4.00; 
$statusAktif = true; 
$catatanTambahan = null;
const NAMA_MATA_KULIAH = "Pemrograman Web Dasar";
const PROFIL_GITHUB = "satpamal";

// Bagian 2: Operator
$batasSemester = 8;
$sisaSemester = $batasSemester - $semester;
$semesterValid = $semester >= 1 && $semester <= $batasSemester;
$statusSemester = ($semesterValid && $statusAktif) ? "sesuai rentang" : "perlu diperiksa";

// Bagian 3: percabangan if-elseif-else
if ($semester < 3) {
  $keteranganSemester = "semester awal";
} elseif ($semester <= 6) {
  $keteranganSemester = "semester menengah";
} else {
  $keteranganSemester = "semester akhir";
}
$namaProdi = ($programStudi == "SI") ? "Sistem Informasi" : (($programStudi == "TI") ? "Teknik Informatika" : "Lainnya");

// Bagian 4: Percabangan switch-case-default
switch ($programStudi) {
  case "SI":
    $fokusprogramStudi = "Sistem informasi dan pusat bisnis";
    break;
  case "TI":
    $fokusprogramStudi = "Komputasi dan pengembangan perangkat lunak";
    break;
  default:
    $fokusprogramStudi = "Belum ditentukan";
}

// P7 : pengujian GET
$pesanKesalahan = '';
$nama = $email = $semesterForm = $tanggal = $jenisPesan = $prodi = $pesan = '';
$minat = [];
if (isset($_POST['nama'])) {
    $nama = trim((string) ($_POST['nama'] ?? '')); 
    $email = trim((string) ($_POST['email'] ?? ''));
    $semesterForm = trim((string) ($_POST['semester'] ?? ''));
    $tanggal = trim((string) ($_POST['tanggal'] ?? ''));
    $jenisPesan = trim((string) ($_POST['jenis_pesan'] ?? '')); 
    $prodi = trim((string) ($_POST['prodi'] ?? '')); 
    $pesan = trim((string) ($_POST['pesan'] ?? '')); 
    $minat = $_POST['minat'] ?? [];
    $pesanKesalahan = '' ;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (trim($nama ?? '') === '') {
            $pesanKesalahan .= 'Nama lengkap wajib diisi. ';
        }

        if (trim($email) === '') { 
            $pesanKesalahan .= 'Email wajib diisi. '; 
        }

        if (trim($semesterForm) === '') { 
            $pesanKesalahan .= 'Semester wajib diisi. ';
        }

        if (trim($tanggal) === '') { 
            $pesanKesalahan .= 'Tanggal kunjungan wajib diisi. ';
        }

        if ($jenisPesan === '') { 
            $pesanKesalahan .= 'Jenis pesan wajib dipilih. ';
        }

         if ($prodi === '') { 
            $pesanKesalahan .= 'Program studi wajib dipilih. ';
         }

        if  (trim($pesan) === '') { 
            $pesanKesalahan .= 'Pesan wajib diisi. '; 
        }

         if (empty($minat)) { 
            $pesanKesalahan .= 'Minat wajib dipilih minimal satu. '; 
         }
    }

if (trim($semesterForm) !== '') { 
  $semesterValid = filter_var( 
    $semesterForm, 
    FILTER_VALIDATE_INT 
  );

   if ( 
    $semesterValid === false || 
    $semesterValid < 1 || 
    $semesterValid > 14 
  ) { 
    $pesanKesalahan .= 'Semester harus berupa bilangan bulat antara 1 dan 14. '; 
  } 
}
if (trim($email) !== '') { 
  if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) { 
    $pesanKesalahan .= 'Format email tidak valid. '; 
  } 
} 
if (!in_array($jenisPesan, ['pertanyaan', 'saran'], true)) { 
  $pesanKesalahan .= 'Jenis pesan tidak valid. '; 
} 

if (!in_array($prodi, ['SI', 'TI'], true)) { 
  $pesanKesalahan .= 'Program studi tidak valid. '; 
} 

$minatDiizinkan = ['HTML', 'CSS'];

if (!is_array($minat)) { 
  $pesanKesalahan .= 'Format pilihan topik tidak valid. '; 
} else { 
  foreach ($minat as $topik) { 
    if (!in_array($topik, $minatDiizinkan, true)) { 
      $pesanKesalahan .= 'Pilihan topik tidak valid. '; 
      break; 
    } 
  } 
} 
}

// P7 
if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
  $_SESSION['pesanKesalahan'] = $pesanKesalahan; 
 
  $_SESSION['nama'] = $nama; 
  $_SESSION['email'] = $email; 
  $_SESSION['semester'] = $semesterForm; 
  $_SESSION['tanggal'] = $tanggal; 
  $_SESSION['jenis_pesan'] = $jenisPesan; 
  $_SESSION['prodi'] = $prodi; 
  $_SESSION['minat'] = $minat; 
  $_SESSION['pesan'] = $pesan; 
 
  header('Location: index.php'); 
  exit; 
} 

$pesanKesalahan = $_SESSION['pesanKesalahan'] ?? ''; 
 
$nama = $_SESSION['nama'] ?? ''; 
$email = $_SESSION['email'] ?? ''; 
$semesterForm = $_SESSION['semester'] ?? '' ; 
$tanggal = $_SESSION['tanggal'] ?? date("Y-m-d"); 
$jenisPesan = $_SESSION['jenis_pesan'] ?? ''; 
$prodi = $_SESSION['prodi'] ?? ''; 
$minat = $_SESSION['minat'] ?? ''; 
$pesan = $_SESSION['pesan'] ?? '';
?>