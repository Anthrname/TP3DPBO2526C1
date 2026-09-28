#include "Dosen.hpp"

// Konstruktor Default
Dosen::Dosen() : SivitasAkademik(), nidn(""), keahlian(""), jabatanFungsional("") {}

// Konstruktor Berparameter
Dosen::Dosen(const std::string& nik, const std::string& nama, const std::string& jenisKelamin,
             const std::string& nidn, const std::string& keahlian, const std::string& jabatanFungsional)
    : SivitasAkademik(nik, nama, jenisKelamin), nidn(nidn), keahlian(keahlian), jabatanFungsional(jabatanFungsional) {}

// Destruktor
Dosen::~Dosen() {}

// Getter dan Setter
std::string Dosen::getNidn() const {
    return nidn;
}

void Dosen::setNidn(const std::string& nidn) {
    this->nidn = nidn;
}

std::string Dosen::getKeahlian() const {
    return keahlian;
}

void Dosen::setKeahlian(const std::string& keahlian) {
    this->keahlian = keahlian;
}

std::string Dosen::getJabatanFungsional() const {
    return jabatanFungsional;
}

void Dosen::setJabatanFungsional(const std::string& jabatanFungsional) {
    this->jabatanFungsional = jabatanFungsional;
}
