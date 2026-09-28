# AsistenDosen.py
# Subclass dari Mahasiswa via Multilevel Inheritance (Membentuk Hybrid Inheritance)

from Mahasiswa import Mahasiswa

class AsistenDosen(Mahasiswa):
    def __init__(self, nik: str = "", nama: str = "", jenis_kelamin: str = "",
                 nim: str = "", semester: int = 1, ipk: float = 0.0,
                 id_asisten: str = "", mata_kuliah_binaan: str = "", honor_bulanan: float = 0.0):
        super().__init__(nik, nama, jenis_kelamin, nim, semester, ipk)
        self.id_asisten = id_asisten
        self.mata_kuliah_binaan = mata_kuliah_binaan
        self.honor_bulanan = honor_bulanan

    # Getter dan Setter ID Asisten
    @property
    def id_asisten(self) -> str:
        return self._id_asisten

    @id_asisten.setter
    def id_asisten(self, id_asisten: str):
        if not id_asisten and id_asisten != "":
            raise ValueError("ID Asisten tidak boleh kosong.")
        self._id_asisten = id_asisten

    # Getter dan Setter Mata Kuliah Binaan
    @property
    def mata_kuliah_binaan(self) -> str:
        return self._mata_kuliah_binaan

    @mata_kuliah_binaan.setter
    def mata_kuliah_binaan(self, mata_kuliah_binaan: str):
        self._mata_kuliah_binaan = mata_kuliah_binaan

    # Getter dan Setter Honor Bulanan
    @property
    def honor_bulanan(self) -> float:
        return self._honor_bulanan

    @honor_bulanan.setter
    def honor_bulanan(self, honor_bulanan: float):
        if honor_bulanan < 0.0:
            raise ValueError("Honor bulanan tidak boleh bernilai negatif.")
        self._honor_bulanan = honor_bulanan
