# ProgramStudi.py
# Class Komposisi & Pengelola Array of Objects (Dosen, Mahasiswa, AsistenDosen)

from typing import List, Optional
from Dosen import Dosen
from Mahasiswa import Mahasiswa
from AsistenDosen import AsistenDosen

class ProgramStudi:
    def __init__(self, kode_prodi: str = "", nama_prodi: str = "", jenjang: str = "", kaprodi: Optional[Dosen] = None):
        self.kode_prodi = kode_prodi
        self.nama_prodi = nama_prodi
        self.jenjang = jenjang
        self.kaprodi = kaprodi if kaprodi is not None else Dosen()
        self._daftar_dosen: List[Dosen] = []
        self._daftar_mahasiswa: List[Mahasiswa] = []
        self._daftar_asisten: List[AsistenDosen] = []

    # Getter dan Setter Kode Prodi
    @property
    def kode_prodi(self) -> str:
        return self._kode_prodi

    @kode_prodi.setter
    def kode_prodi(self, kode_prodi: str):
        if not kode_prodi and kode_prodi != "":
            raise ValueError("Kode Prodi tidak boleh kosong.")
        self._kode_prodi = kode_prodi

    # Getter dan Setter Nama Prodi
    @property
    def nama_prodi(self) -> str:
        return self._nama_prodi

    @nama_prodi.setter
    def nama_prodi(self, nama_prodi: str):
        if not nama_prodi and nama_prodi != "":
            raise ValueError("Nama Prodi tidak boleh kosong.")
        self._nama_prodi = nama_prodi

    # Getter dan Setter Jenjang
    @property
    def jenjang(self) -> str:
        return self._jenjang

    @jenjang.setter
    def jenjang(self, jenjang: str):
        self._jenjang = jenjang

    # Getter dan Setter Kaprodi
    @property
    def kaprodi(self) -> Dosen:
        return self._kaprodi

    @kaprodi.setter
    def kaprodi(self, kaprodi: Dosen):
        self._kaprodi = kaprodi

    # Operasi Array of Objects dengan Validasi Duplikasi
    def tambah_dosen(self, d: Dosen):
        for existing in self._daftar_dosen:
            if existing.nidn == d.nidn:
                raise ValueError(f"Dosen dengan NIDN {d.nidn} ({d.nama}) sudah terdaftar di Prodi {self.nama_prodi}.")
        self._daftar_dosen.append(d)

    def tambah_mahasiswa(self, m: Mahasiswa):
        for existing in self._daftar_mahasiswa:
            if existing.nim == m.nim:
                raise ValueError(f"Mahasiswa dengan NIM {m.nim} ({m.nama}) sudah terdaftar di Prodi {self.nama_prodi}.")
        self._daftar_mahasiswa.append(m)

    def tambah_asisten_dosen(self, a: AsistenDosen):
        for existing in self._daftar_asisten:
            if existing.id_asisten == a.id_asisten:
                raise ValueError(f"Asisten Dosen dengan ID {a.id_asisten} ({a.nama}) sudah terdaftar di Prodi {self.nama_prodi}.")
        self._daftar_asisten.append(a)

    @property
    def daftar_dosen(self) -> List[Dosen]:
        return self._daftar_dosen

    @property
    def daftar_mahasiswa(self) -> List[Mahasiswa]:
        return self._daftar_mahasiswa

    @property
    def daftar_asisten(self) -> List[AsistenDosen]:
        return self._daftar_asisten
