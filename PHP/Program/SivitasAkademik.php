<?php
// SivitasAkademik.php
// Base Class yang merepresentasikan identitas umum sivitas akademika

class SivitasAkademik {
    protected string $nik;
    protected string $nama;
    protected string $jenisKelamin;

    public function __construct(string $nik = "", string $nama = "", string $jenisKelamin = "") {
        $this->setNik($nik);
        $this->setNama($nama);
        $this->setJenisKelamin($jenisKelamin);
    }

    // Getter dan Setter
    public function getNik(): string {
        return $this->nik;
    }

    public function setNik(string $nik): void {
        if ($nik === "") {
            $this->nik = "";
            return;
        }
        $this->nik = trim($nik);
    }

    public function getNama(): string {
        return $this->nama;
    }

    public function setNama(string $nama): void {
        if ($nama === "") {
            $this->nama = "";
            return;
        }
        $this->nama = trim($nama);
    }

    public function getJenisKelamin(): string {
        return $this->jenisKelamin;
    }

    public function setJenisKelamin(string $jenisKelamin): void {
        $this->jenisKelamin = $jenisKelamin;
    }
}
?>
