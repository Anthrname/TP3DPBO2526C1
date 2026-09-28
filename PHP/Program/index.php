<?php
// index.php
// Program Utama TP 3 DPBO - Implementasi Hybrid Inheritance & Composition (PHP)
// Penulis: Najib Nurohman (NIM: 2509653)

require_once 'Dosen.php';
require_once 'Mahasiswa.php';
require_once 'AsistenDosen.php';
require_once 'ProgramStudi.php';
require_once 'Fakultas.php';

// Inisialisasi Data Awal
$dekanFakultas = new Dosen("32010099", "Prof. Dr. Tatang Sutisna, M.Kom.", "Laki-laki",
                           "0010056801", "Computer Vision", "Guru Besar");
$fakultas = new Fakultas("FPMIPA", "Fakultas Pendidikan Matematika dan Ilmu Pengetahuan Alam", $dekanFakultas);

// --- Inisialisasi Prodi 1: Ilmu Komputer ---
$kaprodiIlkom = new Dosen("32010101", "Dr. Rosa Ariani, M.T.", "Perempuan",
                          "0412038001", "Software Engineering", "Lektor Kepala");
$prodiIlkom = new ProgramStudi("PRODI-IK", "Ilmu Komputer", "S1", $kaprodiIlkom);

$prodiIlkom->tambahDosen($kaprodiIlkom);
$prodiIlkom->tambahDosen(new Dosen("32010102", "Yudi Ahmad Hambali, M.T.", "Laki-laki",
                                   "0415058502", "Artificial Intelligence", "Lektor"));
$prodiIlkom->tambahDosen(new Dosen("32010103", "Dr. Rani Megasari, M.T.", "Perempuan",
                                   "0422078603", "Data Science & Big Data", "Lektor"));

$prodiIlkom->tambahMahasiswa(new Mahasiswa("32040101", "Najib Nurohman", "Laki-laki", "2509653", 4, 3.92));
$prodiIlkom->tambahMahasiswa(new Mahasiswa("32040102", "Siti Nurhaliza", "Perempuan", "2509112", 4, 3.85));
$prodiIlkom->tambahMahasiswa(new Mahasiswa("32040103", "Fajar Ramadhan", "Laki-laki", "2509334", 2, 3.75));

$prodiIlkom->tambahAsistenDosen(new AsistenDosen("32040101", "Najib Nurohman", "Laki-laki",
                                                 "2509653", 4, 3.92,
                                                 "ASD-IK01", "DPBO & Algoritma", 1500000.0));

// --- Inisialisasi Prodi 2: Pendidikan Ilmu Komputer ---
$kaprodiPik = new Dosen("32010201", "Dr. Lala Septem, M.Kom.", "Perempuan",
                        "0420098201", "Educational Tech", "Lektor Kepala");
$prodiPik = new ProgramStudi("PRODI-PIK", "Pendidikan Ilmu Komputer", "S1", $kaprodiPik);

$prodiPik->tambahDosen($kaprodiPik);
$prodiPik->tambahDosen(new Dosen("32010202", "Enjang Ali Nurdin, M.Kom.", "Laki-laki",
                                 "0418088402", "Computer Networks", "Lektor"));

$prodiPik->tambahMahasiswa(new Mahasiswa("32040201", "Rian Pratama", "Laki-laki", "2508101", 6, 3.78));
$prodiPik->tambahMahasiswa(new Mahasiswa("32040202", "Anisa Rahmawati", "Perempuan", "2508102", 6, 3.88));

$prodiPik->tambahAsistenDosen(new AsistenDosen("32040202", "Anisa Rahmawati", "Perempuan",
                                               "2508102", 6, 3.88,
                                               "ASD-PIK01", "Jaringan Komputer", 1400000.0));

// Tambahkan Prodi ke Fakultas (Composition)
$fakultas->tambahProdi($prodiIlkom);
$fakultas->tambahProdi($prodiPik);

// Cek apakah dijalankan via CLI atau Web Browser
$isCLI = (php_sapi_name() === 'cli');

if ($isCLI) {
    try {
        echo "\n" . str_repeat("=", 95) . "\n";
        echo "               TP 3 DPBO - IMPLEMENTASI HYBRID INHERITANCE & COMPOSITION                       \n";
        echo "                    Oleh: Najib Nurohman | NIM: 2509653                                        \n";
        echo str_repeat("=", 95) . "\n\n";

        echo ">>> [TAHAP 1: KONDISI DATA AWAL SEBELUM PENAMBAHAN DATA BARU] <<<\n";
        $fakultas->tampilkanInformasiLengkapCLI();

        echo "\n" . str_repeat("=", 95) . "\n";
        echo "                         PROSES PENAMBAHAN DATA ENTITAS BARU                                   \n";
        echo str_repeat("=", 95) . "\n";
        echo "[+] Menambahkan Mahasiswa baru ke Prodi Ilmu Komputer: Muhammad Rizky (NIM: 2509445)\n";
        echo "[+] Menambahkan Asisten Dosen baru ke Prodi Ilmu Komputer: Siti Nurhaliza (ASD-IK02 - Basis Data)\n";
        echo "[+] Menambahkan Program Studi Baru ke Fakultas: Sistem Informasi Kelautan (PRODI-SIK)\n";
        echo "    Lengkap dengan Dosen, Mahasiswa, dan Asisten Dosen baru.\n";
        echo str_repeat("=", 95) . "\n\n";

        // Tambah data baru
        $prodiList = &$fakultas->getDaftarProdi();
        $prodiList[0]->tambahMahasiswa(new Mahasiswa("32040104", "Muhammad Rizky", "Laki-laki", "2509445", 2, 3.80));
        $prodiList[0]->tambahAsistenDosen(new AsistenDosen("32040102", "Siti Nurhaliza", "Perempuan", "2509112", 4, 3.85,
                                                           "ASD-IK02", "Sistem Basis Data", 1500000.0));

        $kaprodiSik = new Dosen("32010301", "Dr. Ayi Purbasari, M.T.", "Perempuan",
                                "0405118101", "Marine Informatics", "Lektor");
        $prodiSik = new ProgramStudi("PRODI-SIK", "Sistem Informasi Kelautan", "S1", $kaprodiSik);
        $prodiSik->tambahDosen($kaprodiSik);
        $prodiSik->tambahDosen(new Dosen("32010302", "Hendriyana, S.T., M.Kom.", "Laki-laki",
                                         "0414028803", "Geographic Info System", "Asisten Ahli"));
        $prodiSik->tambahMahasiswa(new Mahasiswa("32040301", "Ahmad Fauzi", "Laki-laki", "2507001", 2, 3.70));
        $prodiSik->tambahMahasiswa(new Mahasiswa("32040302", "Dewi Lestari", "Perempuan", "2507002", 2, 3.82));
        $prodiSik->tambahAsistenDosen(new AsistenDosen("32040302", "Dewi Lestari", "Perempuan",
                                                       "2507002", 2, 3.82,
                                                       "ASD-SIK01", "Pemetaan Digital Laut", 1350000.0));

        $fakultas->tambahProdi($prodiSik);

        echo ">>> [TAHAP 2: KONDISI DATA AKHIR SETELAH PENAMBAHAN DATA BARU LENGKAP] <<<\n";
        $fakultas->tampilkanInformasiLengkapCLI();

        // -------------------------------------------------------------
        // 5. DEMONSTRASI ERROR HANDLING & VALIDASI
        // -------------------------------------------------------------
        echo "\n" . str_repeat("=", 95) . "\n";
        echo "                         DEMONSTRASI ERROR HANDLING & VALIDASI                                 \n";
        echo str_repeat("=", 95) . "\n";

        // Contoh Kasus 1: Validasi Nilai IPK di luar batas (e.g., 4.50)
        try {
            echo "[Test 1] Mencoba membuat objek Mahasiswa dengan IPK = 4.50 (Batas 0.00 - 4.00)...\n";
            $mhsInvalid = new Mahasiswa("32049999", "Budi Invalid", "Laki-laki", "2509999", 2, 4.50);
        } catch (Exception $e) {
            echo "         [TERTANGKAP] Exception Berhasil Ditangani: " . $e->getMessage() . "\n\n";
        }

        // Contoh Kasus 2: Validasi Duplikasi Data (Duplikasi NIM)
        try {
            echo "[Test 2] Mencoba mendaftarkan Mahasiswa dengan NIM duplikat ('2509653') ke Prodi Ilmu Komputer...\n";
            $prodiList[0]->tambahMahasiswa(
                new Mahasiswa("32040199", "Najib Duplikat", "Laki-laki", "2509653", 4, 3.80)
            );
        } catch (Exception $e) {
            echo "         [TERTANGKAP] Exception Berhasil Ditangani: " . $e->getMessage() . "\n";
        }
        echo str_repeat("=", 95) . "\n";

    } catch (Exception $e) {
        echo "\n[FATAL ERROR] Terjadi kesalahan tak terduga: " . $e->getMessage() . "\n";
    }

    echo "\nProgram PHP selesai dieksekusi dengan sukses.\n";
    exit(0);
}

// JIKA DIAKSES DARI BROWSER (WEB INTERFACE)
$prodiList = &$fakultas->getDaftarProdi();
$prodiList[0]->tambahMahasiswa(new Mahasiswa("32040104", "Muhammad Rizky", "Laki-laki", "2509445", 2, 3.80));
$prodiList[0]->tambahAsistenDosen(new AsistenDosen("32040102", "Siti Nurhaliza", "Perempuan", "2509112", 4, 3.85,
                                                   "ASD-IK02", "Sistem Basis Data", 1500000.0));

$kaprodiSik = new Dosen("32010301", "Dr. Ayi Purbasari, M.T.", "Perempuan",
                        "0405118101", "Marine Informatics", "Lektor");
$prodiSik = new ProgramStudi("PRODI-SIK", "Sistem Informasi Kelautan", "S1", $kaprodiSik);
$prodiSik->tambahDosen($kaprodiSik);
$prodiSik->tambahDosen(new Dosen("32010302", "Hendriyana, S.T., M.Kom.", "Laki-laki",
                                 "0414028803", "Geographic Info System", "Asisten Ahli"));
$prodiSik->tambahMahasiswa(new Mahasiswa("32040301", "Ahmad Fauzi", "Laki-laki", "2507001", 2, 3.70));
$prodiSik->tambahMahasiswa(new Mahasiswa("32040302", "Dewi Lestari", "Perempuan", "2507002", 2, 3.82));
$prodiSik->tambahAsistenDosen(new AsistenDosen("32040302", "Dewi Lestari", "Perempuan",
                                               "2507002", 2, 3.82,
                                               "ASD-SIK01", "Pemetaan Digital Laut", 1350000.0));
$fakultas->tambahProdi($prodiSik);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TP 3 DPBO - Sistem Manajemen Fakultas (PHP)</title>
    <style>
        :root {
            --bg: #0f172a;
            --card-bg: #1e293b;
            --border: #334155;
            --primary: #38bdf8;
            --accent: #f59e0b;
            --text-main: #f1f5f9;
            --text-muted: #94a3b8;
            --success: #10b981;
        }
        * { box-sizing: border-box; margin: 0; padding: 0; font-family: 'Segoe UI', system-ui, sans-serif; }
        body { background: var(--bg); color: var(--text-main); padding: 30px 20px; }
        .container { max-width: 1100px; margin: 0 auto; }
        .header { background: linear-gradient(135deg, #1e293b, #0f172a); border: 1px solid var(--border); border-radius: 12px; padding: 24px; margin-bottom: 24px; box-shadow: 0 4px 20px rgba(0,0,0,0.4); }
        .header h1 { font-size: 22px; color: var(--primary); margin-bottom: 8px; }
        .header p { color: var(--text-muted); font-size: 14px; }
        .badge { display: inline-block; padding: 4px 10px; border-radius: 6px; font-size: 12px; font-weight: 600; background: rgba(56,189,248,0.15); color: var(--primary); border: 1px solid rgba(56,189,248,0.3); }
        .prodi-card { background: var(--card-bg); border: 1px solid var(--border); border-radius: 12px; padding: 20px; margin-bottom: 24px; }
        .prodi-title { font-size: 18px; color: var(--accent); margin-bottom: 4px; display: flex; align-items: center; justify-content: space-between; }
        .prodi-sub { color: var(--text-muted); font-size: 13px; margin-bottom: 16px; }
        .table-title { font-size: 14px; font-weight: 600; color: var(--text-main); margin: 14px 0 8px 0; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 14px; font-size: 13px; }
        th, td { padding: 8px 12px; text-align: left; border: 1px solid var(--border); }
        th { background: #0f172a; color: var(--primary); font-weight: 600; }
        tr:nth-child(even) { background: rgba(255,255,255,0.02); }
        .tag-role { background: rgba(16,185,129,0.15); color: var(--success); padding: 2px 8px; border-radius: 4px; font-size: 11px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <span class="badge">TP 3 DPBO - PHP IMPLEMENTATION</span>
            <h1 style="margin-top: 10px;"><?= $fakultas->getKodeFakultas() ?> - <?= $fakultas->getNamaFakultas() ?></h1>
            <p><strong>Dekan:</strong> <?= $fakultas->getDekan()->getNama() ?> (NIDN: <?= $fakultas->getDekan()->getNidn() ?> | <?= $fakultas->getDekan()->getJabatanFungsional() ?> - <?= $fakultas->getDekan()->getKeahlian() ?>)</p>
            <p style="margin-top: 4px;"><strong>Praktikan:</strong> Najib Nurohman | <strong>NIM:</strong> 2509653</p>
        </div>

        <?php foreach ($fakultas->getDaftarProdi() as $idx => $prodi): ?>
            <div class="prodi-card">
                <div class="prodi-title">
                    <span>#<?= $idx + 1 ?> [<?= $prodi->getKodeProdi() ?>] <?= $prodi->getNamaProdi() ?></span>
                    <span class="badge"><?= $prodi->getJenjang() ?></span>
                </div>
                <div class="prodi-sub"><strong>Kaprodi:</strong> <?= $prodi->getKaprodi()->getNama() ?> (NIDN: <?= $prodi->getKaprodi()->getNidn() ?> | <?= $prodi->getKaprodi()->getKeahlian() ?>)</div>

                <!-- 1. TABEL DOSEN -->
                <div class="table-title">📚 Daftar Dosen (<?= $prodi->getNamaProdi() ?>)</div>
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIK</th>
                            <th>Nama Dosen</th>
                            <th>Gender</th>
                            <th>NIDN</th>
                            <th>Jabatan</th>
                            <th>Keahlian</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($prodi->getDaftarDosen() as $dIdx => $d): ?>
                            <tr>
                                <td><?= $dIdx + 1 ?></td>
                                <td><?= $d->getNik() ?></td>
                                <td><?= $d->getNama() ?></td>
                                <td><?= $d->getJenisKelamin() ?></td>
                                <td><?= $d->getNidn() ?></td>
                                <td><span class="tag-role"><?= $d->getJabatanFungsional() ?></span></td>
                                <td><?= $d->getKeahlian() ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <!-- 2. TABEL MAHASISWA -->
                <div class="table-title">🎓 Daftar Mahasiswa Aktif</div>
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIK</th>
                            <th>Nama Mahasiswa</th>
                            <th>Gender</th>
                            <th>NIM</th>
                            <th>Semester</th>
                            <th>IPK</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($prodi->getDaftarMahasiswa() as $mIdx => $m): ?>
                            <tr>
                                <td><?= $mIdx + 1 ?></td>
                                <td><?= $m->getNik() ?></td>
                                <td><?= $m->getNama() ?></td>
                                <td><?= $m->getJenisKelamin() ?></td>
                                <td><?= $m->getNim() ?></td>
                                <td>Semester <?= $m->getSemester() ?></td>
                                <td><strong><?= number_format($m->getIpk(), 2) ?></strong></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <!-- 3. TABEL ASISTEN DOSEN -->
                <div class="table-title">💼 Daftar Asisten Dosen / Praktikum</div>
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID Asisten</th>
                            <th>Nama Asisten</th>
                            <th>NIM</th>
                            <th>Mata Kuliah Binaan</th>
                            <th>Honor / Bulan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($prodi->getDaftarAsisten() as $aIdx => $a): ?>
                            <tr>
                                <td><?= $aIdx + 1 ?></td>
                                <td><?= $a->getIdAsisten() ?></td>
                                <td><?= $a->getNama() ?></td>
                                <td><?= $a->getNim() ?></td>
                                <td><?= $a->getMataKuliahBinaan() ?></td>
                                <td>Rp <?= number_format($a->getHonorBulanan(), 0, ',', '.') ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
