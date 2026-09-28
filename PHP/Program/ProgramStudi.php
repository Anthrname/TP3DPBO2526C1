<?php
// ProgramStudi.php
// Class Komposisi & Pengelola Array of Objects (Dosen, Mahasiswa, AsistenDosen)

require_once 'Dosen.php';
require_once 'Mahasiswa.php';
require_once 'AsistenDosen.php';

class ProgramStudi {
    private string $kodeProdi;
    private string $namaProdi;
    private string $jenjang;
    private Dosen $kaprodi;
    private array $daftarDosen = [];
    private array $daftarMahasiswa = [];
    private array $daftarAsisten = [];

    public function __construct(string $kodeProdi = "", string $namaProdi = "", string $jenjang = "", ?Dosen $kaprodi = null) {
        $this->setKodeProdi($kodeProdi);
        $this->setNamaProdi($namaProdi);
        $this->setJenjang($jenjang);
        $this->kaprodi = $kaprodi ?? new Dosen();
    }

    // Getter dan Setter
    public function getKodeProdi(): string {
        return $this->kodeProdi;
    }

    public function setKodeProdi(string $kodeProdi): void {
        $this->kodeProdi = trim($kodeProdi);
    }

    public function getNamaProdi(): string {
        return $this->namaProdi;
    }

    public function setNamaProdi(string $namaProdi): void {
        $this->namaProdi = trim($namaProdi);
    }

    public function getJenjang(): string {
        return $this->jenjang;
    }

    public function setJenjang(string $jenjang): void {
        $this->jenjang = $jenjang;
    }

    public function getKaprodi(): Dosen {
        return $this->kaprodi;
    }

    public function setKaprodi(Dosen $kaprodi): void {
        $this->kaprodi = $kaprodi;
    }

    // Operasi Kumpulan Objek (Array of Objects) dengan Validasi Duplikasi
    public function tambahDosen(Dosen $d): void {
        foreach ($this->daftarDosen as $existing) {
            if ($existing->getNidn() === $d->getNidn()) {
                throw new RuntimeException("Dosen dengan NIDN {$d->getNidn()} ({$d->getNama()}) sudah terdaftar di Prodi {$this->namaProdi}.");
            }
        }
        $this->daftarDosen[] = $d;
    }

    public function tambahMahasiswa(Mahasiswa $m): void {
        foreach ($this->daftarMahasiswa as $existing) {
            if ($existing->getNim() === $m->getNim()) {
                throw new RuntimeException("Mahasiswa dengan NIM {$m->getNim()} ({$m->getNama()}) sudah terdaftar di Prodi {$this->namaProdi}.");
            }
        }
        $this->daftarMahasiswa[] = $m;
    }

    public function tambahAsistenDosen(AsistenDosen $a): void {
        foreach ($this->daftarAsisten as $existing) {
            if ($existing->getIdAsisten() === $a->getIdAsisten()) {
                throw new RuntimeException("Asisten Dosen dengan ID {$a->getIdAsisten()} ({$a->getNama()}) sudah terdaftar di Prodi {$this->namaProdi}.");
            }
        }
        $this->daftarAsisten[] = $a;
    }

    public function getDaftarDosen(): array {
        return $this->daftarDosen;
    }

    public function getDaftarMahasiswa(): array {
        return $this->daftarMahasiswa;
    }

    public function getDaftarAsisten(): array {
        return $this->daftarAsisten;
    }
}
?>
