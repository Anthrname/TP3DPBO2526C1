#include "ProgramStudi.hpp"
#include <stdexcept>

// Konstruktor Default
ProgramStudi::ProgramStudi()
    : kodeProdi(""), namaProdi(""), jenjang(""), kaprodi() {}

// Konstruktor Berparameter
ProgramStudi::ProgramStudi(const std::string& kodeProdi, const std::string& namaProdi,
                           const std::string& jenjang, const Dosen& kaprodi)
    : kodeProdi(kodeProdi), namaProdi(namaProdi), jenjang(jenjang), kaprodi(kaprodi) {}

// Destruktor
ProgramStudi::~ProgramStudi() {}

// Getter dan Setter
std::string ProgramStudi::getKodeProdi() const {
    return kodeProdi;
}

void ProgramStudi::setKodeProdi(const std::string& kodeProdi) {
    if (kodeProdi.empty()) {
        throw std::invalid_argument("Kode Prodi tidak boleh kosong.");
    }
    this->kodeProdi = kodeProdi;
}

std::string ProgramStudi::getNamaProdi() const {
    return namaProdi;
}

void ProgramStudi::setNamaProdi(const std::string& namaProdi) {
    if (namaProdi.empty()) {
        throw std::invalid_argument("Nama Prodi tidak boleh kosong.");
    }
    this->namaProdi = namaProdi;
}

std::string ProgramStudi::getJenjang() const {
    return jenjang;
}

void ProgramStudi::setJenjang(const std::string& jenjang) {
    this->jenjang = jenjang;
}

Dosen ProgramStudi::getKaprodi() const {
    return kaprodi;
}

void ProgramStudi::setKaprodi(const Dosen& kaprodi) {
    this->kaprodi = kaprodi;
}

// Operasi Kumpulan Objek (Array of Objects) dengan Validasi Duplikasi
void ProgramStudi::tambahDosen(const Dosen& d) {
    for (const auto& existing : daftarDosen) {
        if (existing.getNidn() == d.getNidn()) {
            throw std::runtime_error("Dosen dengan NIDN " + d.getNidn() + " (" + d.getNama() + ") sudah terdaftar di Prodi " + namaProdi + ".");
        }
    }
    daftarDosen.push_back(d);
}

void ProgramStudi::tambahMahasiswa(const Mahasiswa& m) {
    for (const auto& existing : daftarMahasiswa) {
        if (existing.getNim() == m.getNim()) {
            throw std::runtime_error("Mahasiswa dengan NIM " + m.getNim() + " (" + m.getNama() + ") sudah terdaftar di Prodi " + namaProdi + ".");
        }
    }
    daftarMahasiswa.push_back(m);
}

void ProgramStudi::tambahAsistenDosen(const AsistenDosen& a) {
    for (const auto& existing : daftarAsisten) {
        if (existing.getIdAsisten() == a.getIdAsisten()) {
            throw std::runtime_error("Asisten Dosen dengan ID " + a.getIdAsisten() + " (" + a.getNama() + ") sudah terdaftar di Prodi " + namaProdi + ".");
        }
    }
    daftarAsisten.push_back(a);
}

const std::vector<Dosen>& ProgramStudi::getDaftarDosen() const {
    return daftarDosen;
}

const std::vector<Mahasiswa>& ProgramStudi::getDaftarMahasiswa() const {
    return daftarMahasiswa;
}

const std::vector<AsistenDosen>& ProgramStudi::getDaftarAsisten() const {
    return daftarAsisten;
}
