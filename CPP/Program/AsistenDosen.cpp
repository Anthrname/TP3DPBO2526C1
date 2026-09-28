#include "AsistenDosen.hpp"
#include <stdexcept>

// Konstruktor Default
AsistenDosen::AsistenDosen()
    : Mahasiswa(), idAsisten(""), mataKuliahBinaan(""), honorBulanan(0.0) {}

// Konstruktor Berparameter
AsistenDosen::AsistenDosen(const std::string& nik, const std::string& nama, const std::string& jenisKelamin,
                           const std::string& nim, int semester, double ipk,
                           const std::string& idAsisten, const std::string& mataKuliahBinaan, double honorBulanan)
    : Mahasiswa(nik, nama, jenisKelamin, nim, semester, ipk) {
    setIdAsisten(idAsisten);
    setMataKuliahBinaan(mataKuliahBinaan);
    setHonorBulanan(honorBulanan);
}

// Destruktor
AsistenDosen::~AsistenDosen() {}

// Getter dan Setter
std::string AsistenDosen::getIdAsisten() const {
    return idAsisten;
}

void AsistenDosen::setIdAsisten(const std::string& idAsisten) {
    if (idAsisten.empty()) {
        throw std::invalid_argument("ID Asisten tidak boleh kosong.");
    }
    this->idAsisten = idAsisten;
}

std::string AsistenDosen::getMataKuliahBinaan() const {
    return mataKuliahBinaan;
}

void AsistenDosen::setMataKuliahBinaan(const std::string& mataKuliahBinaan) {
    this->mataKuliahBinaan = mataKuliahBinaan;
}

double AsistenDosen::getHonorBulanan() const {
    return honorBulanan;
}

void AsistenDosen::setHonorBulanan(double honorBulanan) {
    if (honorBulanan < 0.0) {
        throw std::invalid_argument("Honor bulanan tidak boleh bernilai negatif.");
    }
    this->honorBulanan = honorBulanan;
}
