// Main.java
// Program Utama TP 3 DPBO - Implementasi Hybrid Inheritance & Composition (Java)
// Najib Nurohman (NIM: 2509653)

public class Main {
    public static void main(String[] args) {
        System.out.println("\n===============================================================================================");
        System.out.println("               TP 3 DPBO - IMPLEMENTASI HYBRID INHERITANCE & COMPOSITION                       ");
        System.out.println("                    Oleh: Najib Nurohman | NIM: 2509653                                        ");
        System.out.println("===============================================================================================\n");

        try {
            // -------------------------------------------------------------
            // 1. MEMBUAT DATA AWAL FAKULTAS & PROGRAM STUDI
            // -------------------------------------------------------------
            Dosen dekanFakultas = new Dosen("32010099", "Prof. Dr. Tatang Sutisna, M.Kom.", "Laki-laki",
                                            "0010056801", "Computer Vision", "Guru Besar");
            Fakultas fakultas = new Fakultas("FPMIPA", "Fakultas Pendidikan Matematika dan Ilmu Pengetahuan Alam", dekanFakultas);

            // --- Inisialisasi Prodi 1: Ilmu Komputer ---
            Dosen kaprodiIlkom = new Dosen("32010101", "Dr. Rosa Ariani, M.T.", "Perempuan",
                                           "0412038001", "Software Engineering", "Lektor Kepala");
            ProgramStudi prodiIlkom = new ProgramStudi("PRODI-IK", "Ilmu Komputer", "S1", kaprodiIlkom);

            // Menambahkan Dosen ke Prodi 1
            prodiIlkom.tambahDosen(kaprodiIlkom);
            prodiIlkom.tambahDosen(new Dosen("32010102", "Yudi Ahmad Hambali, M.T.", "Laki-laki",
                                             "0415058502", "Artificial Intelligence", "Lektor"));
            prodiIlkom.tambahDosen(new Dosen("32010103", "Dr. Rani Megasari, M.T.", "Perempuan",
                                             "0422078603", "Data Science & Big Data", "Lektor"));

            // Menambahkan Mahasiswa ke Prodi 1
            prodiIlkom.tambahMahasiswa(new Mahasiswa("32040101", "Najib Nurohman", "Laki-laki", "2509653", 4, 3.92));
            prodiIlkom.tambahMahasiswa(new Mahasiswa("32040102", "Siti Nurhaliza", "Perempuan", "2509112", 4, 3.85));
            prodiIlkom.tambahMahasiswa(new Mahasiswa("32040103", "Fajar Ramadhan", "Laki-laki", "2509334", 2, 3.75));

            // Menambahkan Asisten Dosen ke Prodi 1
            prodiIlkom.tambahAsistenDosen(new AsistenDosen("32040101", "Najib Nurohman", "Laki-laki",
                                                          "2509653", 4, 3.92,
                                                          "ASD-IK01", "DPBO & Algoritma", 1500000.0));

            // --- Inisialisasi Prodi 2: Pendidikan Ilmu Komputer ---
            Dosen kaprodiPik = new Dosen("32010201", "Dr. Lala Septem, M.Kom.", "Perempuan",
                                         "0420098201", "Educational Tech", "Lektor Kepala");
            ProgramStudi prodiPik = new ProgramStudi("PRODI-PIK", "Pendidikan Ilmu Komputer", "S1", kaprodiPik);

            // Menambahkan Dosen ke Prodi 2
            prodiPik.tambahDosen(kaprodiPik);
            prodiPik.tambahDosen(new Dosen("32010202", "Enjang Ali Nurdin, M.Kom.", "Laki-laki",
                                           "0418088402", "Computer Networks", "Lektor"));

            // Menambahkan Mahasiswa ke Prodi 2
            prodiPik.tambahMahasiswa(new Mahasiswa("32040201", "Rian Pratama", "Laki-laki", "2508101", 6, 3.78));
            prodiPik.tambahMahasiswa(new Mahasiswa("32040202", "Anisa Rahmawati", "Perempuan", "2508102", 6, 3.88));

            // Menambahkan Asisten Dosen ke Prodi 2
            prodiPik.tambahAsistenDosen(new AsistenDosen("32040202", "Anisa Rahmawati", "Perempuan",
                                                        "2508102", 6, 3.88,
                                                        "ASD-PIK01", "Jaringan Komputer", 1400000.0));

            // Menambahkan Prodi ke Fakultas (Composition)
            fakultas.tambahProdi(prodiIlkom);
            fakultas.tambahProdi(prodiPik);

            // -------------------------------------------------------------
            // 2. MENAMPILKAN DATA SEBELUM PENAMBAHAN ENTITAS BARU
            // -------------------------------------------------------------
            System.out.println("\n>>> [TAHAP 1: KONDISI DATA AWAL SEBELUM PENAMBAHAN DATA BARU] <<<");
            fakultas.tampilkanInformasiLengkap();

            // -------------------------------------------------------------
            // 3. OPERASI PENAMBAHAN DATA BARU (DINAMIS & EKSPANDIF)
            // -------------------------------------------------------------
            System.out.println("\n" + "=".repeat(95));
            System.out.println("                         PROSES PENAMBAHAN DATA ENTITAS BARU                                   ");
            System.out.println("=".repeat(95));
            System.out.println("[+] Menambahkan Mahasiswa baru ke Prodi Ilmu Komputer: Muhammad Rizky (NIM: 2509445)");
            System.out.println("[+] Menambahkan Asisten Dosen baru ke Prodi Ilmu Komputer: Siti Nurhaliza (ASD-IK02 - Basis Data)");
            System.out.println("[+] Menambahkan Program Studi Baru ke Fakultas: Sistem Informasi Kelautan (PRODI-SIK)");
            System.out.println("    Lengkap dengan Dosen, Mahasiswa, dan Asisten Dosen baru.");
            System.out.println("=".repeat(95) + "\n");

            // 3a. Menambahkan data ke Prodi 1 yang sudah ada di dalam Fakultas
            fakultas.getDaftarProdi().get(0).tambahMahasiswa(
                new Mahasiswa("32040104", "Muhammad Rizky", "Laki-laki", "2509445", 2, 3.80)
            );
            fakultas.getDaftarProdi().get(0).tambahAsistenDosen(
                new AsistenDosen("32040102", "Siti Nurhaliza", "Perempuan", "2509112", 4, 3.85,
                                 "ASD-IK02", "Sistem Basis Data", 1500000.0)
            );

            // 3b. Membuat dan Menambahkan Program Studi Baru (Prodi ke-3) ke Fakultas
            Dosen kaprodiSik = new Dosen("32010301", "Dr. Ayi Purbasari, M.T.", "Perempuan",
                                         "0405118101", "Marine Informatics", "Lektor");
            ProgramStudi prodiSik = new ProgramStudi("PRODI-SIK", "Sistem Informasi Kelautan", "S1", kaprodiSik);

            prodiSik.tambahDosen(kaprodiSik);
            prodiSik.tambahDosen(new Dosen("32010302", "Hendriyana, S.T., M.Kom.", "Laki-laki",
                                           "0414028803", "Geographic Info System", "Asisten Ahli"));

            prodiSik.tambahMahasiswa(new Mahasiswa("32040301", "Ahmad Fauzi", "Laki-laki", "2507001", 2, 3.70));
            prodiSik.tambahMahasiswa(new Mahasiswa("32040302", "Dewi Lestari", "Perempuan", "2507002", 2, 3.82));

            prodiSik.tambahAsistenDosen(new AsistenDosen("32040302", "Dewi Lestari", "Perempuan",
                                                        "2507002", 2, 3.82,
                                                        "ASD-SIK01", "Pemetaan Digital Laut", 1350000.0));

            // Menambahkan Prodi SIK ke Fakultas
            fakultas.tambahProdi(prodiSik);

            // -------------------------------------------------------------
            // 4. MENAMPILKAN DATA SESUDAH PENAMBAHAN ENTITAS BARU
            // -------------------------------------------------------------
            System.out.println("\n>>> [TAHAP 2: KONDISI DATA AKHIR SETELAH PENAMBAHAN DATA BARU LENGKAP] <<<");
            fakultas.tampilkanInformasiLengkap();

            // -------------------------------------------------------------
            // 5. DEMONSTRASI ERROR HANDLING & VALIDASI
            // -------------------------------------------------------------
            System.out.println("\n" + "=".repeat(95));
            System.out.println("                         DEMONSTRASI ERROR HANDLING & VALIDASI                                 ");
            System.out.println("=".repeat(95));

            // Contoh Kasus 1: Validasi Nilai IPK di luar batas (e.g., 4.50)
            try {
                System.out.println("[Test 1] Mencoba membuat objek Mahasiswa dengan IPK = 4.50 (Batas 0.00 - 4.00)...");
                Mahasiswa mhsInvalid = new Mahasiswa("32049999", "Budi Invalid", "Laki-laki", "2509999", 2, 4.50);
            } catch (Exception e) {
                System.out.println("         [TERTANGKAP] Exception Berhasil Ditangani: " + e.getMessage() + "\n");
            }

            // Contoh Kasus 2: Validasi Duplikasi Data (Duplikasi NIM)
            try {
                System.out.println("[Test 2] Mencoba mendaftarkan Mahasiswa dengan NIM duplikat ('2509653') ke Prodi Ilmu Komputer...");
                fakultas.getDaftarProdi().get(0).tambahMahasiswa(
                    new Mahasiswa("32040199", "Najib Duplikat", "Laki-laki", "2509653", 4, 3.80)
                );
            } catch (Exception e) {
                System.out.println("         [TERTANGKAP] Exception Berhasil Ditangani: " + e.getMessage());
            }
            System.out.println("=".repeat(95));

        } catch (Exception e) {
            System.err.println("\n[FATAL ERROR] Terjadi kesalahan tak terduga: " + e.getMessage());
        }

        System.out.println("\nProgram Java selesai dieksekusi dengan sukses.");
    }
}
