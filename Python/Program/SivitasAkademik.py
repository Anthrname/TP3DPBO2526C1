# SivitasAkademik.py
# Base Class yang merepresentasikan entitas sivitas di lingkungan akademik

class SivitasAkademik:
    def __init__(self, nik: str = "", nama: str = "", jenis_kelamin: str = ""):
        self.nik = nik
        self.nama = nama
        self.jenis_kelamin = jenis_kelamin

    # Getter dan Setter NIK
    @property
    def nik(self) -> str:
        return self._nik

    @nik.setter
    def nik(self, nik: str):
        if not nik and nik != "":
            raise ValueError("NIK tidak boleh None.")
        self._nik = nik

    # Getter dan Setter Nama
    @property
    def nama(self) -> str:
        return self._nama

    @nama.setter
    def nama(self, nama: str):
        if not nama and nama != "":
            raise ValueError("Nama tidak boleh None.")
        self._nama = nama

    # Getter dan Setter Jenis Kelamin
    @property
    def jenis_kelamin(self) -> str:
        return self._jenis_kelamin

    @jenis_kelamin.setter
    def jenis_kelamin(self, jenis_kelamin: str):
        self._jenis_kelamin = jenis_kelamin
