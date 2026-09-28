#include "Mahasiswa.hpp"
#include <stdexcept>

// Konstruktor Default
Mahasiswa::Mahasiswa() : SivitasAkademik(), nim(""), semester(1), ipk(0.0) {}

// Konstruktor Berparameter
Mahasiswa::Mahasiswa(const std::string& nik, const std::string& nama, const std::string& jenisKelamin,
                     const std::string& nim, int semester, double ipk)
    : SivitasAkademik(nik, nama, jenisKelamin) {
    setNim(nim);
    setSemester(semester);
    setIpk(ipk);
}

// Destruktor
Mahasiswa::~Mahasiswa() {}

// Getter dan Setter
std::string Mahasiswa::getNim() const {
    return nim;
}

void Mahasiswa::setNim(const std::string& nim) {
    if (nim.empty()) {
        throw std::invalid_argument("NIM tidak boleh kosong.");
    }
    this->nim = nim;
}

int Mahasiswa::getSemester() const {
    return semester;
}

void Mahasiswa::setSemester(int semester) {
    if (semester < 1) {
        throw std::invalid_argument("Semester harus minimal 1.");
    }
    this->semester = semester;
}

double Mahasiswa::getIpk() const {
    return ipk;
}

void Mahasiswa::setIpk(double ipk) {
    if (ipk < 0.0 || ipk > 4.0) {
        throw std::invalid_argument("IPK tidak valid! Harus berada dalam rentang 0.00 hingga 4.00 (Diberikan: " + std::to_string(ipk) + ").");
    }
    this->ipk = ipk;
}
