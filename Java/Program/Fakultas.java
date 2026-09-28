// Fakultas.java
// Class Komposisi Tingkat Atas (Top-Level Composition) yang menaungi Program Studi

import java.util.ArrayList;
import java.util.List;

public class Fakultas {
    private String kodeFakultas;
    private String namaFakultas;
    private Dosen dekan;
    private List<ProgramStudi> daftarProdi;

    // Konstruktor Default
    public Fakultas() {
        this.kodeFakultas = "";
        this.namaFakultas = "";
        this.dekan = new Dosen();
        this.daftarProdi = new ArrayList<>();
    }

    // Konstruktor Berparameter
    public Fakultas(String kodeFakultas, String namaFakultas, Dosen dekan) {
        setKodeFakultas(kodeFakultas);
        setNamaFakultas(namaFakultas);
        setDekan(dekan);
        this.daftarProdi = new ArrayList<>();
    }

    // Getter dan Setter
    public String getKodeFakultas() {
        return kodeFakultas;
    }

    public void setKodeFakultas(String kodeFakultas) {
        if (kodeFakultas == null || kodeFakultas.trim().isEmpty()) {
            throw new IllegalArgumentException("Kode Fakultas tidak boleh kosong.");
        }
        this.kodeFakultas = kodeFakultas;
    }

    public String getNamaFakultas() {
        return namaFakultas;
    }

    public void setNamaFakultas(String namaFakultas) {
        if (namaFakultas == null || namaFakultas.trim().isEmpty()) {
            throw new IllegalArgumentException("Nama Fakultas tidak boleh kosong.");
        }
        this.namaFakultas = namaFakultas;
    }

    public Dosen getDekan() {
        return dekan;
    }

    public void setDekan(Dosen dekan) {
        this.dekan = dekan;
    }

    // Operasi Komposisi Program Studi dengan Validasi Duplikasi
    public void tambahProdi(ProgramStudi p) {
        for (ProgramStudi existing : daftarProdi) {
            if (existing.getKodeProdi().equals(p.getKodeProdi())) {
                throw new IllegalStateException("Program Studi dengan kode " + p.getKodeProdi() + " sudah ada di dalam Fakultas " + namaFakultas + ".");
            }
        }
        daftarProdi.add(p);
    }

    public List<ProgramStudi> getDaftarProdi() {
        return daftarProdi;
    }

    // Helper cetak garis
    private void printLine(int length, char ch) {
        StringBuilder sb = new StringBuilder();
        for (int i = 0; i < length; i++) sb.append(ch);
        System.out.println(sb.toString());
    }

    // Menampilkan Informasi Lengkap Fakultas dan Seluruh Komponennya
    public void tampilkanInformasiLengkap() {
        printLine(95, '=');
        System.out.println("                 STRUKTUR & DATA AKADEMIK FAKULTAS                 ");
        printLine(95, '=');
        System.out.println(" Fakultas : [" + kodeFakultas + "] " + namaFakultas);
        System.out.println(" Dekan    : " + dekan.getNama() + " (NIDN: " + dekan.getNidn() + " | " 
                           + dekan.getJabatanFungsional() + " - " + dekan.getKeahlian() + ")");
        System.out.println(" Total Program Studi : " + daftarProdi.size());
        printLine(95, '=');

        for (int p = 0; p < daftarProdi.size(); p++) {
            ProgramStudi prodi = daftarProdi.get(p);
            System.out.println("\n>> PROGRAM STUDI #" + (p + 1) + ": [" + prodi.getKodeProdi() 
                               + "] " + prodi.getNamaProdi() + " (" + prodi.getJenjang() + ")");
            System.out.println("   Ketua Prodi (Kaprodi): " + prodi.getKaprodi().getNama() 
                               + " (NIDN: " + prodi.getKaprodi().getNidn() + " | " + prodi.getKaprodi().getKeahlian() + ")\n");

            // 1. TABEL DOSEN
            System.out.println("   [1] Daftar Dosen (" + prodi.getNamaProdi() + "):");
            printLine(95, '-');
            System.out.printf("   | %-4s| %-12s| %-24s| %-10s| %-10s| %-18s| %-20s |\n",
                    "No", "NIK", "Nama Dosen", "Gender", "NIDN", "Jabatan", "Keahlian");
            printLine(95, '-');

            List<Dosen> listDosen = prodi.getDaftarDosen();
            if (listDosen.isEmpty()) {
                System.out.printf("   | %-87s |\n", "Belum ada data dosen terdaftar.");
            } else {
                for (int i = 0; i < listDosen.size(); i++) {
                    Dosen d = listDosen.get(i);
                    System.out.printf("   | %-4d| %-12s| %-24s| %-10s| %-10s| %-18s| %-20s |\n",
                            (i + 1), d.getNik(), d.getNama(), d.getJenisKelamin(),
                            d.getNidn(), d.getJabatanFungsional(), d.getKeahlian());
                }
            }
            printLine(95, '-');

            // 2. TABEL MAHASISWA
            System.out.println("\n   [2] Daftar Mahasiswa Aktif (" + prodi.getNamaProdi() + "):");
            printLine(95, '-');
            System.out.printf("   | %-4s| %-12s| %-24s| %-10s| %-12s| %-10s| %-8s |\n",
                    "No", "NIK", "Nama Mahasiswa", "Gender", "NIM", "Semester", "IPK");
            printLine(95, '-');

            List<Mahasiswa> listMhs = prodi.getDaftarMahasiswa();
            if (listMhs.isEmpty()) {
                System.out.printf("   | %-87s |\n", "Belum ada data mahasiswa terdaftar.");
            } else {
                for (int i = 0; i < listMhs.size(); i++) {
                    Mahasiswa m = listMhs.get(i);
                    System.out.printf("   | %-4d| %-12s| %-24s| %-10s| %-12s| %-10d| %-8.2f |\n",
                            (i + 1), m.getNik(), m.getNama(), m.getJenisKelamin(),
                            m.getNim(), m.getSemester(), m.getIpk());
                }
            }
            printLine(95, '-');

            // 3. TABEL ASISTEN DOSEN
            System.out.println("\n   [3] Daftar Asisten Dosen / Praktikum (" + prodi.getNamaProdi() + "):");
            printLine(95, '-');
            System.out.printf("   | %-4s| %-10s| %-20s| %-10s| %-24s| %-16s |\n",
                    "No", "ID Asisten", "Nama Asisten", "NIM", "Mata Kuliah Binaan", "Honor/Bulan (Rp)");
            printLine(95, '-');

            List<AsistenDosen> listAsisten = prodi.getDaftarAsisten();
            if (listAsisten.isEmpty()) {
                System.out.printf("   | %-87s |\n", "Belum ada data asisten terdaftar.");
            } else {
                for (int i = 0; i < listAsisten.size(); i++) {
                    AsistenDosen a = listAsisten.get(i);
                    String honorStr = String.format("Rp %.0f", a.getHonorBulanan());
                    System.out.printf("   | %-4d| %-10s| %-20s| %-10s| %-24s| %-16s |\n",
                            (i + 1), a.getIdAsisten(), a.getNama(), a.getNim(),
                            a.getMataKuliahBinaan(), honorStr);
                }
            }
            printLine(95, '-');
            System.out.println();
        }
        printLine(95, '=');
    }
}
