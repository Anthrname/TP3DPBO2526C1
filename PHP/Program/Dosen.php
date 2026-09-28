<?php
// Dosen.php
// Subclass dari SivitasAkademik via Hierarchical Inheritance

require_once 'SivitasAkademik.php';

class Dosen extends SivitasAkademik {
    private string $nidn;
    private string $keahlian;
    private string $jabatanFungsional;

    public function __construct(string $nik = "", string $nama = "", string $jenisKelamin = "",
                                string $nidn = "", string $keahlian = "", string $jabatanFungsional = "") {
        parent::__construct($nik, $nama, $jenisKelamin);
        $this->nidn = $nidn;
        $this->keahlian = $keahlian;
        $this->jabatanFungsional = $jabatanFungsional;
    }

    // Getter dan Setter
    public function getNidn(): string {
        return $this->nidn;
    }

    public function setNidn(string $nidn): void {
        $this->nidn = $nidn;
    }

    public function getKeahlian(): string {
        return $this->keahlian;
    }

    public function setKeahlian(string $keahlian): void {
        $this->keahlian = $keahlian;
    }

    public function getJabatanFungsional(): string {
        return $this->jabatanFungsional;
    }

    public function setJabatanFungsional(string $jabatanFungsional): void {
        $this->jabatanFungsional = $jabatanFungsional;
    }
}
?>
