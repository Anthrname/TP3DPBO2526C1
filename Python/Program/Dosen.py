# Dosen.py
# Subclass dari SivitasAkademik via Hierarchical Inheritance

from SivitasAkademik import SivitasAkademik

class Dosen(SivitasAkademik):
    def __init__(self, nik: str = "", nama: str = "", jenis_kelamin: str = "",
                 nidn: str = "", keahlian: str = "", jabatan_fungsional: str = ""):
        super().__init__(nik, nama, jenis_kelamin)
        self._nidn = nidn
        self._keahlian = keahlian
        self._jabatan_fungsional = jabatan_fungsional

    # Getter dan Setter NIDN
    @property
    def nidn(self) -> str:
        return self._nidn

    @nidn.setter
    def nidn(self, nidn: str):
        self._nidn = nidn

    # Getter dan Setter Keahlian
    @property
    def keahlian(self) -> str:
        return self._keahlian

    @keahlian.setter
    def keahlian(self, keahlian: str):
        self._keahlian = keahlian

    # Getter dan Setter Jabatan Fungsional
    @property
    def jabatan_fungsional(self) -> str:
        return self._jabatan_fungsional

    @jabatan_fungsional.setter
    def jabatan_fungsional(self, jabatan_fungsional: str):
        self._jabatan_fungsional = jabatan_fungsional
