#include "SivitasAkademik.hpp"
#include <stdexcept>

// Konstruktor Default
SivitasAkademik::SivitasAkademik() : nik(""), nama(""), jenisKelamin("") {}

// Konstruktor Berparameter
SivitasAkademik::SivitasAkademik(const std::string& nik, const std::string& nama, const std::string& jenisKelamin) {
    setNik(nik);
    setNama(nama);
    setJenisKelamin(jenisKelamin);
}

// Virtual Destruktor
SivitasAkademik::~SivitasAkademik() {}

// Getter dan Setter
std::string SivitasAkademik::getNik() const {
    return nik;
}

void SivitasAkademik::setNik(const std::string& nik) {
    if (nik.empty()) {
        throw std::invalid_argument("NIK tidak boleh kosong.");
    }
    this->nik = nik;
}

std::string SivitasAkademik::getNama() const {
    return nama;
}

void SivitasAkademik::setNama(const std::string& nama) {
    if (nama.empty()) {
        throw std::invalid_argument("Nama tidak boleh kosong.");
    }
    this->nama = nama;
}

std::string SivitasAkademik::getJenisKelamin() const {
    return jenisKelamin;
}

void SivitasAkademik::setJenisKelamin(const std::string& jenisKelamin) {
    this->jenisKelamin = jenisKelamin;
}
