<?php
// AsistenDosen.php
// Subclass dari Mahasiswa via Multilevel Inheritance (Membentuk Hybrid Inheritance)

require_once 'Mahasiswa.php';

class AsistenDosen extends Mahasiswa {
    private string $idAsisten;
    private string $mataKuliahBinaan;
    private float $honorBulanan;

    public function __construct(string $nik = "", string $nama = "", string $jenisKelamin = "",
                                string $nim = "", int $semester = 1, float $ipk = 0.0,
                                string $idAsisten = "", string $mataKuliahBinaan = "", float $honorBulanan = 0.0) {
        parent::__construct($nik, $nama, $jenisKelamin, $nim, $semester, $ipk);
        $this->setIdAsisten($idAsisten);
        $this->setMataKuliahBinaan($mataKuliahBinaan);
        $this->setHonorBulanan($honorBulanan);
    }

    // Getter dan Setter
    public function getIdAsisten(): string {
        return $this->idAsisten;
    }

    public function setIdAsisten(string $idAsisten): void {
        $this->idAsisten = trim($idAsisten);
    }

    public function getMataKuliahBinaan(): string {
        return $this->mataKuliahBinaan;
    }

    public function setMataKuliahBinaan(string $mataKuliahBinaan): void {
        $this->mataKuliahBinaan = $mataKuliahBinaan;
    }

    public function getHonorBulanan(): float {
        return $this->honorBulanan;
    }

    public function setHonorBulanan(float $honorBulanan): void {
        if ($honorBulanan < 0.0) {
            throw new InvalidArgumentException("Honor bulanan tidak boleh bernilai negatif.");
        }
        $this->honorBulanan = $honorBulanan;
    }
}
?>
