# main.py
# Program Utama TP 3 DPBO - Implementasi Hybrid Inheritance & Composition (Python)
# Penulis: Najib Nurohman (NIM: 2509653)

from Dosen import Dosen
from Mahasiswa import Mahasiswa
from AsistenDosen import AsistenDosen
from ProgramStudi import ProgramStudi
from Fakultas import Fakultas

def main():
    print("\n" + "=" * 95)
    print("               TP 3 DPBO - IMPLEMENTASI HYBRID INHERITANCE & COMPOSITION                       ")
    print("                    Oleh: Najib Nurohman | NIM: 2509653                                        ")
    print("=" * 95 + "\n")

    try:
        # -------------------------------------------------------------
        # 1. MEMBUAT DATA AWAL FAKULTAS & PROGRAM STUDI
        # -------------------------------------------------------------
        dekan_fakultas = Dosen("32010099", "Prof. Dr. Tatang Sutisna, M.Kom.", "Laki-laki",
                               "0010056801", "Computer Vision", "Guru Besar")
        fakultas = Fakultas("FPMIPA", "Fakultas Pendidikan Matematika dan Ilmu Pengetahuan Alam", dekan_fakultas)

        # --- Inisialisasi Prodi 1: Ilmu Komputer ---
        kaprodi_ilkom = Dosen("32010101", "Dr. Rosa Ariani, M.T.", "Perempuan",
                              "0412038001", "Software Engineering", "Lektor Kepala")
        prodi_ilkom = ProgramStudi("PRODI-IK", "Ilmu Komputer", "S1", kaprodi_ilkom)

        # Menambahkan Dosen ke Prodi 1
        prodi_ilkom.tambah_dosen(kaprodi_ilkom)
        prodi_ilkom.tambah_dosen(Dosen("32010102", "Yudi Ahmad Hambali, M.T.", "Laki-laki",
                                       "0415058502", "Artificial Intelligence", "Lektor"))
        prodi_ilkom.tambah_dosen(Dosen("32010103", "Dr. Rani Megasari, M.T.", "Perempuan",
                                       "0422078603", "Data Science & Big Data", "Lektor"))

        # Menambahkan Mahasiswa ke Prodi 1
        prodi_ilkom.tambah_mahasiswa(Mahasiswa("32040101", "Najib Nurohman", "Laki-laki", "2509653", 4, 3.92))
        prodi_ilkom.tambah_mahasiswa(Mahasiswa("32040102", "Siti Nurhaliza", "Perempuan", "2509112", 4, 3.85))
        prodi_ilkom.tambah_mahasiswa(Mahasiswa("32040103", "Fajar Ramadhan", "Laki-laki", "2509334", 2, 3.75))

        # Menambahkan Asisten Dosen ke Prodi 1
        prodi_ilkom.tambah_asisten_dosen(AsistenDosen("32040101", "Najib Nurohman", "Laki-laki",
                                                      "2509653", 4, 3.92,
                                                      "ASD-IK01", "DPBO & Algoritma", 1500000.0))

        # --- Inisialisasi Prodi 2: Pendidikan Ilmu Komputer ---
        kaprodi_pik = Dosen("32010201", "Dr. Lala Septem, M.Kom.", "Perempuan",
                            "0420098201", "Educational Tech", "Lektor Kepala")
        prodi_pik = ProgramStudi("PRODI-PIK", "Pendidikan Ilmu Komputer", "S1", kaprodi_pik)

        # Menambahkan Dosen ke Prodi 2
        prodi_pik.tambah_dosen(kaprodi_pik)
        prodi_pik.tambah_dosen(Dosen("32010202", "Enjang Ali Nurdin, M.Kom.", "Laki-laki",
                                     "0418088402", "Computer Networks", "Lektor"))

        # Menambahkan Mahasiswa ke Prodi 2
        prodi_pik.tambah_mahasiswa(Mahasiswa("32040201", "Rian Pratama", "Laki-laki", "2508101", 6, 3.78))
        prodi_pik.tambah_mahasiswa(Mahasiswa("32040202", "Anisa Rahmawati", "Perempuan", "2508102", 6, 3.88))

        # Menambahkan Asisten Dosen ke Prodi 2
        prodi_pik.tambah_asisten_dosen(AsistenDosen("32040202", "Anisa Rahmawati", "Perempuan",
                                                    "2508102", 6, 3.88,
                                                    "ASD-PIK01", "Jaringan Komputer", 1400000.0))

        # Menambahkan Prodi ke Fakultas (Composition)
        fakultas.tambah_prodi(prodi_ilkom)
        fakultas.tambah_prodi(prodi_pik)

        # -------------------------------------------------------------
        # 2. MENAMPILKAN DATA SEBELUM PENAMBAHAN ENTITAS BARU
        # -------------------------------------------------------------
        print("\n>>> [TAHAP 1: KONDISI DATA AWAL SEBELUM PENAMBAHAN DATA BARU] <<<")
        fakultas.tampilkan_informasi_lengkap()

        # -------------------------------------------------------------
        # 3. OPERASI PENAMBAHAN DATA BARU (DINAMIS & EKSPANDIF)
        # -------------------------------------------------------------
        print("\n" + "=" * 95)
        print("                         PROSES PENAMBAHAN DATA ENTITAS BARU                                   ")
        print("=" * 95)
        print("[+] Menambahkan Mahasiswa baru ke Prodi Ilmu Komputer: Muhammad Rizky (NIM: 2509445)")
        print("[+] Menambahkan Asisten Dosen baru ke Prodi Ilmu Komputer: Siti Nurhaliza (ASD-IK02 - Basis Data)")
        print("[+] Menambahkan Program Studi Baru ke Fakultas: Sistem Informasi Kelautan (PRODI-SIK)")
        print("    Lengkap dengan Dosen, Mahasiswa, dan Asisten Dosen baru.")
        print("=" * 95 + "\n")

        # 3a. Menambahkan data ke Prodi 1 yang sudah ada di dalam Fakultas
        fakultas.daftar_prodi[0].tambah_mahasiswa(
            Mahasiswa("32040104", "Muhammad Rizky", "Laki-laki", "2509445", 2, 3.80)
        )
        fakultas.daftar_prodi[0].tambah_asisten_dosen(
            AsistenDosen("32040102", "Siti Nurhaliza", "Perempuan", "2509112", 4, 3.85,
                         "ASD-IK02", "Sistem Basis Data", 1500000.0)
        )

        # 3b. Membuat dan Menambahkan Program Studi Baru (Prodi ke-3) ke Fakultas
        kaprodi_sik = Dosen("32010301", "Dr. Ayi Purbasari, M.T.", "Perempuan",
                            "0405118101", "Marine Informatics", "Lektor")
        prodi_sik = ProgramStudi("PRODI-SIK", "Sistem Informasi Kelautan", "S1", kaprodi_sik)

        prodi_sik.tambah_dosen(kaprodi_sik)
        prodi_sik.tambah_dosen(Dosen("32010302", "Hendriyana, S.T., M.Kom.", "Laki-laki",
                                     "0414028803", "Geographic Info System", "Asisten Ahli"))

        prodi_sik.tambah_mahasiswa(Mahasiswa("32040301", "Ahmad Fauzi", "Laki-laki", "2507001", 2, 3.70))
        prodi_sik.tambah_mahasiswa(Mahasiswa("32040302", "Dewi Lestari", "Perempuan", "2507002", 2, 3.82))

        prodi_sik.tambah_asisten_dosen(AsistenDosen("32040302", "Dewi Lestari", "Perempuan",
                                                    "2507002", 2, 3.82,
                                                    "ASD-SIK01", "Pemetaan Digital Laut", 1350000.0))

        # Menambahkan Prodi SIK ke Fakultas
        fakultas.tambah_prodi(prodi_sik)

        # -------------------------------------------------------------
        # 4. MENAMPILKAN DATA SESUDAH PENAMBAHAN ENTITAS BARU
        # -------------------------------------------------------------
        print("\n>>> [TAHAP 2: KONDISI DATA AKHIR SETELAH PENAMBAHAN DATA BARU LENGKAP] <<<")
        fakultas.tampilkan_informasi_lengkap()

        # -------------------------------------------------------------
        # 5. DEMONSTRASI ERROR HANDLING & VALIDASI
        # -------------------------------------------------------------
        print("\n" + "=" * 95)
        print("                         DEMONSTRASI ERROR HANDLING & VALIDASI                                 ")
        print("=" * 95)

        # Contoh Kasus 1: Validasi Nilai IPK di luar batas (e.g., 4.50)
        try:
            print("[Test 1] Mencoba membuat objek Mahasiswa dengan IPK = 4.50 (Batas 0.00 - 4.00)...")
            mhs_invalid = Mahasiswa("32049999", "Budi Invalid", "Laki-laki", "2509999", 2, 4.50)
        except Exception as e:
            print(f"         [TERTANGKAP] Exception Berhasil Ditangani: {e}\n")

        # Contoh Kasus 2: Validasi Duplikasi Data (Duplikasi NIM)
        try:
            print("[Test 2] Mencoba mendaftarkan Mahasiswa dengan NIM duplikat ('2509653') ke Prodi Ilmu Komputer...")
            fakultas.daftar_prodi[0].tambah_mahasiswa(
                Mahasiswa("32040199", "Najib Duplikat", "Laki-laki", "2509653", 4, 3.80)
            )
        except Exception as e:
            print(f"         [TERTANGKAP] Exception Berhasil Ditangani: {e}")
        print("=" * 95)

    except Exception as e:
        print(f"\n[FATAL ERROR] Terjadi kesalahan tak terduga: {e}")

    print("\nProgram Python selesai dieksekusi dengan sukses.")

if __name__ == "__main__":
    main()
