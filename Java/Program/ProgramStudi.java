// ProgramStudi.java
// Class Komposisi & Pengelola Array of Objects (Dosen, Mahasiswa, AsistenDosen)

import java.util.ArrayList;
import java.util.List;

public class ProgramStudi {
    private String kodeProdi;
    private String namaProdi;
    private String jenjang;
    private Dosen kaprodi;
    private List<Dosen> daftarDosen;
    private List<Mahasiswa> daftarMahasiswa;
    private List<AsistenDosen> daftarAsisten;

    // Konstruktor Default
    public ProgramStudi() {
        this.kodeProdi = "";
        this.namaProdi = "";
        this.jenjang = "";
        this.kaprodi = new Dosen();
        this.daftarDosen = new ArrayList<>();
        this.daftarMahasiswa = new ArrayList<>();
        this.daftarAsisten = new ArrayList<>();
    }

    // Konstruktor Berparameter
    public ProgramStudi(String kodeProdi, String namaProdi, String jenjang, Dosen kaprodi) {
        setKodeProdi(kodeProdi);
        setNamaProdi(namaProdi);
        setJenjang(jenjang);
        setKaprodi(kaprodi);
        this.daftarDosen = new ArrayList<>();
        this.daftarMahasiswa = new ArrayList<>();
        this.daftarAsisten = new ArrayList<>();
    }

    // Getter dan Setter
    public String getKodeProdi() {
        return kodeProdi;
    }

    public void setKodeProdi(String kodeProdi) {
        if (kodeProdi == null || kodeProdi.trim().isEmpty()) {
            throw new IllegalArgumentException("Kode Prodi tidak boleh kosong.");
        }
        this.kodeProdi = kodeProdi;
    }

    public String getNamaProdi() {
        return namaProdi;
    }

    public void setNamaProdi(String namaProdi) {
        if (namaProdi == null || namaProdi.trim().isEmpty()) {
            throw new IllegalArgumentException("Nama Prodi tidak boleh kosong.");
        }
        this.namaProdi = namaProdi;
    }

    public String getJenjang() {
        return jenjang;
    }

    public void setJenjang(String jenjang) {
        this.jenjang = jenjang;
    }

    public Dosen getKaprodi() {
        return kaprodi;
    }

    public void setKaprodi(Dosen kaprodi) {
        this.kaprodi = kaprodi;
    }

    // Operasi Kumpulan Objek (Array of Objects) dengan Validasi Duplikasi
    public void tambahDosen(Dosen d) {
        for (Dosen existing : daftarDosen) {
            if (existing.getNidn().equals(d.getNidn())) {
                throw new IllegalStateException("Dosen dengan NIDN " + d.getNidn() + " (" + d.getNama() + ") sudah terdaftar di Prodi " + namaProdi + ".");
            }
        }
        daftarDosen.add(d);
    }

    public void tambahMahasiswa(Mahasiswa m) {
        for (Mahasiswa existing : daftarMahasiswa) {
            if (existing.getNim().equals(m.getNim())) {
                throw new IllegalStateException("Mahasiswa dengan NIM " + m.getNim() + " (" + m.getNama() + ") sudah terdaftar di Prodi " + namaProdi + ".");
            }
        }
        daftarMahasiswa.add(m);
    }

    public void tambahAsistenDosen(AsistenDosen a) {
        for (AsistenDosen existing : daftarAsisten) {
            if (existing.getIdAsisten().equals(a.getIdAsisten())) {
                throw new IllegalStateException("Asisten Dosen dengan ID " + a.getIdAsisten() + " (" + a.getNama() + ") sudah terdaftar di Prodi " + namaProdi + ".");
            }
        }
        daftarAsisten.add(a);
    }

    public List<Dosen> getDaftarDosen() {
        return daftarDosen;
    }

    public List<Mahasiswa> getDaftarMahasiswa() {
        return daftarMahasiswa;
    }

    public List<AsistenDosen> getDaftarAsisten() {
        return daftarAsisten;
    }
}
