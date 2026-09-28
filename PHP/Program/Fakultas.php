<?php
// Fakultas.php
// Class Komposisi Tingkat Atas (Top-Level Composition) yang menaungi Program Studi

require_once 'Dosen.php';
require_once 'ProgramStudi.php';

class Fakultas {
    private string $kodeFakultas;
    private string $namaFakultas;
    private Dosen $dekan;
    private array $daftarProdi = [];

    public function __construct(string $kodeFakultas = "", string $namaFakultas = "", ?Dosen $dekan = null) {
        $this->setKodeFakultas($kodeFakultas);
        $this->setNamaFakultas($namaFakultas);
        $this->dekan = $dekan ?? new Dosen();
    }

    // Getter dan Setter
    public function getKodeFakultas(): string {
        return $this->kodeFakultas;
    }

    public function setKodeFakultas(string $kodeFakultas): void {
        $this->kodeFakultas = trim($kodeFakultas);
    }

    public function getNamaFakultas(): string {
        return $this->namaFakultas;
    }

    public function setNamaFakultas(string $namaFakultas): void {
        $this->namaFakultas = trim($namaFakultas);
    }

    public function getDekan(): Dosen {
        return $this->dekan;
    }

    public function setDekan(Dosen $dekan): void {
        $this->dekan = $dekan;
    }

    // Operasi Komposisi Program Studi dengan Validasi Duplikasi
    public function tambahProdi(ProgramStudi $p): void {
        foreach ($this->daftarProdi as $existing) {
            if ($existing->getKodeProdi() === $p->getKodeProdi()) {
                throw new RuntimeException("Program Studi dengan kode {$p->getKodeProdi()} sudah ada di dalam Fakultas {$this->namaFakultas}.");
            }
        }
        $this->daftarProdi[] = $p;
    }

    public function &getDaftarProdi(): array {
        return $this->daftarProdi;
    }

    // Menampilkan Informasi Lengkap Fakultas (CLI Format)
    public function tampilkanInformasiLengkapCLI(): void {
        $lineEq = str_repeat("=", 95) . "\n";
        $lineDash = str_repeat("-", 95) . "\n";

        echo $lineEq;
        echo "                 STRUKTUR & DATA AKADEMIK FAKULTAS                 \n";
        echo $lineEq;
        echo " Fakultas : [{$this->kodeFakultas}] {$this->namaFakultas}\n";
        echo " Dekan    : {$this->dekan->getNama()} (NIDN: {$this->dekan->getNidn()} | {$this->dekan->getJabatanFungsional()} - {$this->dekan->getKeahlian()})\n";
        echo " Total Program Studi : " . count($this->daftarProdi) . "\n";
        echo $lineEq;

        foreach ($this->daftarProdi as $pIdx => $prodi) {
            $num = $pIdx + 1;
            echo "\n>> PROGRAM STUDI #{$num}: [{$prodi->getKodeProdi()}] {$prodi->getNamaProdi()} ({$prodi->getJenjang()})\n";
            echo "   Ketua Prodi (Kaprodi): {$prodi->getKaprodi()->getNama()} (NIDN: {$prodi->getKaprodi()->getNidn()} | {$prodi->getKaprodi()->getKeahlian()})\n\n";

            // 1. TABEL DOSEN
            echo "   [1] Daftar Dosen ({$prodi->getNamaProdi()}):\n";
            echo $lineDash;
            printf("   | %-4s| %-12s| %-24s| %-10s| %-10s| %-18s| %-20s |\n",
                "No", "NIK", "Nama Dosen", "Gender", "NIDN", "Jabatan", "Keahlian");
            echo $lineDash;

            $listDosen = $prodi->getDaftarDosen();
            if (empty($listDosen)) {
                printf("   | %-87s |\n", "Belum ada data dosen terdaftar.");
            } else {
                foreach ($listDosen as $dIdx => $d) {
                    printf("   | %-4d| %-12s| %-24s| %-10s| %-10s| %-18s| %-20s |\n",
                        $dIdx + 1, $d->getNik(), $d->getNama(), $d->getJenisKelamin(),
                        $d->getNidn(), $d->getJabatanFungsional(), $d->getKeahlian());
                }
            }
            echo $lineDash;

            // 2. TABEL MAHASISWA
            echo "\n   [2] Daftar Mahasiswa Aktif ({$prodi->getNamaProdi()}):\n";
            echo $lineDash;
            printf("   | %-4s| %-12s| %-24s| %-10s| %-12s| %-10s| %-8s |\n",
                "No", "NIK", "Nama Mahasiswa", "Gender", "NIM", "Semester", "IPK");
            echo $lineDash;

            $listMhs = $prodi->getDaftarMahasiswa();
            if (empty($listMhs)) {
                printf("   | %-87s |\n", "Belum ada data mahasiswa terdaftar.");
            } else {
                foreach ($listMhs as $mIdx => $m) {
                    printf("   | %-4d| %-12s| %-24s| %-10s| %-12s| %-10d| %-8.2f |\n",
                        $mIdx + 1, $m->getNik(), $m->getNama(), $m->getJenisKelamin(),
                        $m->getNim(), $m->getSemester(), $m->getIpk());
                }
            }
            echo $lineDash;

            // 3. TABEL ASISTEN DOSEN
            echo "\n   [3] Daftar Asisten Dosen / Praktikum ({$prodi->getNamaProdi()}):\n";
            echo $lineDash;
            printf("   | %-4s| %-10s| %-20s| %-10s| %-24s| %-16s |\n",
                "No", "ID Asisten", "Nama Asisten", "NIM", "Mata Kuliah Binaan", "Honor/Bulan (Rp)");
            echo $lineDash;

            $listAsisten = $prodi->getDaftarAsisten();
            if (empty($listAsisten)) {
                printf("   | %-87s |\n", "Belum ada data asisten terdaftar.");
            } else {
                foreach ($listAsisten as $aIdx => $a) {
                    $honorStr = "Rp " . number_format($a->getHonorBulanan(), 0, ',', '');
                    printf("   | %-4d| %-10s| %-20s| %-10s| %-24s| %-16s |\n",
                        $aIdx + 1, $a->getIdAsisten(), $a->getNama(), $a->getNim(),
                        $a->getMataKuliahBinaan(), $honorStr);
                }
            }
            echo $lineDash . "\n";
        }
        echo $lineEq;
    }
}
?>
