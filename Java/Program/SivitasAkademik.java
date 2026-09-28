// SivitasAkademik.java
// Base Class yang merepresentasikan identitas umum sivitas akademika

public class SivitasAkademik {
    protected String nik;
    protected String nama;
    protected String jenisKelamin;

    // Konstruktor Default
    public SivitasAkademik() {
        this.nik = "";
        this.nama = "";
        this.jenisKelamin = "";
    }

    // Konstruktor Berparameter
    public SivitasAkademik(String nik, String nama, String jenisKelamin) {
        setNik(nik);
        setNama(nama);
        setJenisKelamin(jenisKelamin);
    }

    // Getter dan Setter
    public String getNik() {
        return nik;
    }

    public void setNik(String nik) {
        if (nik == null || nik.trim().isEmpty()) {
            throw new IllegalArgumentException("NIK tidak boleh kosong.");
        }
        this.nik = nik;
    }

    public String getNama() {
        return nama;
    }

    public void setNama(String nama) {
        if (nama == null || nama.trim().isEmpty()) {
            throw new IllegalArgumentException("Nama tidak boleh kosong.");
        }
        this.nama = nama;
    }

    public String getJenisKelamin() {
        return jenisKelamin;
    }

    public void setJenisKelamin(String jenisKelamin) {
        this.jenisKelamin = jenisKelamin;
    }
}
