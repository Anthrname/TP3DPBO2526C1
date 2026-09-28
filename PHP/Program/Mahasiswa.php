<?php
// Mahasiswa.php
// Subclass dari SivitasAkademik via Hierarchical Inheritance

require_once 'SivitasAkademik.php';

class Mahasiswa extends SivitasAkademik {
    protected string $nim;
    protected int $semester;
    protected float $ipk;

    public function __construct(string $nik = "", string $nama = "", string $jenisKelamin = "",
                                string $nim = "", int $semester = 1, float $ipk = 0.0) {
        parent::__construct($nik, $nama, $jenisKelamin);
        $this->setNim($nim);
        $this->setSemester($semester);
        $this->setIpk($ipk);
    }

    // Getter dan Setter
    public function getNim(): string {
        return $this->nim;
    }

    public function setNim(string $nim): void {
        $this->nim = trim($nim);
    }

    public function getSemester(): int {
        return $this->semester;
    }

    public function setSemester(int $semester): void {
        if ($semester < 1) {
            throw new InvalidArgumentException("Semester harus minimal 1.");
        }
        $this->semester = $semester;
    }

    public function getIpk(): float {
        return $this->ipk;
    }

    public function setIpk(float $ipk): void {
        if ($ipk < 0.0 || $ipk > 4.0) {
            throw new InvalidArgumentException(sprintf("IPK tidak valid! Harus berada dalam rentang 0.00 hingga 4.00 (Diberikan: %.2f).", $ipk));
        }
        $this->ipk = $ipk;
    }
}
?>
