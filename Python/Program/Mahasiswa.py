# Mahasiswa.py
# Subclass dari SivitasAkademik via Hierarchical Inheritance

from SivitasAkademik import SivitasAkademik

class Mahasiswa(SivitasAkademik):
    def __init__(self, nik: str = "", nama: str = "", jenis_kelamin: str = "",
                 nim: str = "", semester: int = 1, ipk: float = 0.0):
        super().__init__(nik, nama, jenis_kelamin)
        self.nim = nim
        self.semester = semester
        self.ipk = ipk

    # Getter dan Setter NIM
    @property
    def nim(self) -> str:
        return self._nim

    @nim.setter
    def nim(self, nim: str):
        if not nim and nim != "":
            raise ValueError("NIM tidak boleh kosong.")
        self._nim = nim

    # Getter dan Setter Semester
    @property
    def semester(self) -> int:
        return self._semester

    @semester.setter
    def semester(self, semester: int):
        if semester < 1:
            raise ValueError("Semester harus minimal 1.")
        self._semester = semester

    # Getter dan Setter IPK
    @property
    def ipk(self) -> float:
        return self._ipk

    @ipk.setter
    def ipk(self, ipk: float):
        if ipk < 0.0 or ipk > 4.0:
            raise ValueError(f"IPK tidak valid! Harus berada dalam rentang 0.00 hingga 4.00 (Diberikan: {ipk:.2f}).")
        self._ipk = ipk
