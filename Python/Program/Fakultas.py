# Fakultas.py
# Class Komposisi Tingkat Atas (Top-Level Composition) yang menaungi Program Studi

from typing import List, Optional
from Dosen import Dosen
from ProgramStudi import ProgramStudi

class Fakultas:
    def __init__(self, kode_fakultas: str = "", nama_fakultas: str = "", dekan: Optional[Dosen] = None):
        self.kode_fakultas = kode_fakultas
        self.nama_fakultas = nama_fakultas
        self.dekan = dekan if dekan is not None else Dosen()
        self._daftar_prodi: List[ProgramStudi] = []

    # Getter dan Setter Kode Fakultas
    @property
    def kode_fakultas(self) -> str:
        return self._kode_fakultas

    @kode_fakultas.setter
    def kode_fakultas(self, kode_fakultas: str):
        if not kode_fakultas and kode_fakultas != "":
            raise ValueError("Kode Fakultas tidak boleh kosong.")
        self._kode_fakultas = kode_fakultas

    # Getter dan Setter Nama Fakultas
    @property
    def nama_fakultas(self) -> str:
        return self._nama_fakultas

    @nama_fakultas.setter
    def nama_fakultas(self, nama_fakultas: str):
        if not nama_fakultas and nama_fakultas != "":
            raise ValueError("Nama Fakultas tidak boleh kosong.")
        self._nama_fakultas = nama_fakultas

    # Getter dan Setter Dekan
    @property
    def dekan(self) -> Dosen:
        return self._dekan

    @dekan.setter
    def dekan(self, dekan: Dosen):
        self._dekan = dekan

    # Operasi Komposisi Program Studi dengan Validasi Duplikasi
    def tambah_prodi(self, p: ProgramStudi):
        for existing in self._daftar_prodi:
            if existing.kode_prodi == p.kode_prodi:
                raise ValueError(f"Program Studi dengan kode {p.kode_prodi} sudah ada di dalam Fakultas {self.nama_fakultas}.")
        self._daftar_prodi.append(p)

    @property
    def daftar_prodi(self) -> List[ProgramStudi]:
        return self._daftar_prodi

    # Menampilkan Laporan Struktur Lengkap Fakultas
    def tampilkan_informasi_lengkap(self):
        line_eq = "=" * 95
        line_dash = "-" * 95

        print(line_eq)
        print("                 STRUKTUR & DATA AKADEMIK FAKULTAS                 ")
        print(line_eq)
        print(f" Fakultas : [{self._kode_fakultas}] {self._nama_fakultas}")
        print(f" Dekan    : {self._dekan.nama} (NIDN: {self._dekan.nidn} | {self._dekan.jabatan_fungsional} - {self._dekan.keahlian})")
        print(f" Total Program Studi : {len(self._daftar_prodi)}")
        print(line_eq)

        for p_idx, prodi in enumerate(self._daftar_prodi, start=1):
            print(f"\n>> PROGRAM STUDI #{p_idx}: [{prodi.kode_prodi}] {prodi.nama_prodi} ({prodi.jenjang})")
            print(f"   Ketua Prodi (Kaprodi): {prodi.kaprodi.nama} (NIDN: {prodi.kaprodi.nidn} | {prodi.kaprodi.keahlian})\n")

            # 1. TABEL DOSEN
            print(f"   [1] Daftar Dosen ({prodi.nama_prodi}):")
            print(line_dash)
            print(f"   | {'No':<4}| {'NIK':<12}| {'Nama Dosen':<24}| {'Gender':<10}| {'NIDN':<10}| {'Jabatan':<18}| {'Keahlian':<20} |")
            print(line_dash)
            if not prodi.daftar_dosen:
                print(f"   | {'Belum ada data dosen terdaftar.':<87} |")
            else:
                for d_idx, d in enumerate(prodi.daftar_dosen, start=1):
                    print(f"   | {d_idx:<4}| {d.nik:<12}| {d.nama:<24}| {d.jenis_kelamin:<10}| {d.nidn:<10}| {d.jabatan_fungsional:<18}| {d.keahlian:<20} |")
            print(line_dash)

            # 2. TABEL MAHASISWA
            print(f"\n   [2] Daftar Mahasiswa Aktif ({prodi.nama_prodi}):")
            print(line_dash)
            print(f"   | {'No':<4}| {'NIK':<12}| {'Nama Mahasiswa':<24}| {'Gender':<10}| {'NIM':<12}| {'Semester':<10}| {'IPK':<8} |")
            print(line_dash)
            if not prodi.daftar_mahasiswa:
                print(f"   | {'Belum ada data mahasiswa terdaftar.':<87} |")
            else:
                for m_idx, m in enumerate(prodi.daftar_mahasiswa, start=1):
                    print(f"   | {m_idx:<4}| {m.nik:<12}| {m.nama:<24}| {m.jenis_kelamin:<10}| {m.nim:<12}| {m.semester:<10}| {m.ipk:<8.2f} |")
            print(line_dash)

            # 3. TABEL ASISTEN DOSEN
            print(f"\n   [3] Daftar Asisten Dosen / Praktikum ({prodi.nama_prodi}):")
            print(line_dash)
            print(f"   | {'No':<4}| {'ID Asisten':<10}| {'Nama Asisten':<20}| {'NIM':<10}| {'Mata Kuliah Binaan':<24}| {'Honor/Bulan (Rp)':<16} |")
            print(line_dash)
            if not prodi.daftar_asisten:
                print(f"   | {'Belum ada data asisten terdaftar.':<87} |")
            else:
                for a_idx, a in enumerate(prodi.daftar_asisten, start=1):
                    honor_str = f"Rp {int(a.honor_bulanan)}"
                    print(f"   | {a_idx:<4}| {a.id_asisten:<10}| {a.nama:<20}| {a.nim:<10}| {a.mata_kuliah_binaan:<24}| {honor_str:<16} |")
            print(line_dash)
            print()

        print(line_eq)
