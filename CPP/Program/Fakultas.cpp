#include "Fakultas.hpp"
#include <iostream>
#include <iomanip>
#include <sstream>
#include <stdexcept>

// Konstruktor Default
Fakultas::Fakultas() : kodeFakultas(""), namaFakultas(""), dekan() {}

// Konstruktor Berparameter
Fakultas::Fakultas(const std::string& kodeFakultas, const std::string& namaFakultas, const Dosen& dekan) {
    setKodeFakultas(kodeFakultas);
    setNamaFakultas(namaFakultas);
    setDekan(dekan);
}

// Destruktor
Fakultas::~Fakultas() {}

// Getter dan Setter
std::string Fakultas::getKodeFakultas() const {
    return kodeFakultas;
}

void Fakultas::setKodeFakultas(const std::string& kodeFakultas) {
    if (kodeFakultas.empty()) {
        throw std::invalid_argument("Kode Fakultas tidak boleh kosong.");
    }
    this->kodeFakultas = kodeFakultas;
}

std::string Fakultas::getNamaFakultas() const {
    return namaFakultas;
}

void Fakultas::setNamaFakultas(const std::string& namaFakultas) {
    if (namaFakultas.empty()) {
        throw std::invalid_argument("Nama Fakultas tidak boleh kosong.");
    }
    this->namaFakultas = namaFakultas;
}

Dosen Fakultas::getDekan() const {
    return dekan;
}

void Fakultas::setDekan(const Dosen& dekan) {
    this->dekan = dekan;
}

// Operasi Komposisi Program Studi dengan Validasi Duplikasi
void Fakultas::tambahProdi(const ProgramStudi& p) {
    for (const auto& existing : daftarProdi) {
        if (existing.getKodeProdi() == p.getKodeProdi()) {
            throw std::runtime_error("Program Studi dengan kode " + p.getKodeProdi() + " sudah ada di dalam Fakultas " + namaFakultas + ".");
        }
    }
    daftarProdi.push_back(p);
}

std::vector<ProgramStudi>& Fakultas::getDaftarProdi() {
    return daftarProdi;
}

const std::vector<ProgramStudi>& Fakultas::getDaftarProdi() const {
    return daftarProdi;
}

// Helper format separator
static void printLine(int length, char ch = '-') {
    for (int i = 0; i < length; ++i) std::cout << ch;
    std::cout << "\n";
}

void Fakultas::tampilkanInformasiLengkap() const {
    printLine(95, '=');
    std::cout << "                 STRUKTUR & DATA AKADEMIK FAKULTAS                 \n";
    printLine(95, '=');
    std::cout << " Fakultas : [" << kodeFakultas << "] " << namaFakultas << "\n";
    std::cout << " Dekan    : " << dekan.getNama() << " (NIDN: " << dekan.getNidn() 
              << " | " << dekan.getJabatanFungsional() << " - " << dekan.getKeahlian() << ")\n";
    std::cout << " Total Program Studi : " << daftarProdi.size() << "\n";
    printLine(95, '=');

    for (size_t p = 0; p < daftarProdi.size(); ++p) {
        const auto& prodi = daftarProdi[p];
        std::cout << "\n>> PROGRAM STUDI #" << (p + 1) << ": [" << prodi.getKodeProdi() 
                  << "] " << prodi.getNamaProdi() << " (" << prodi.getJenjang() << ")\n";
        std::cout << "   Ketua Prodi (Kaprodi): " << prodi.getKaprodi().getNama() 
                  << " (NIDN: " << prodi.getKaprodi().getNidn() << " | " << prodi.getKaprodi().getKeahlian() << ")\n\n";

        // 1. TABEL DOSEN
        std::cout << "   [1] Daftar Dosen (" << prodi.getNamaProdi() << "):\n";
        printLine(95, '-');
        std::cout << "   | " << std::left << std::setw(4) << "No"
                  << "| " << std::setw(12) << "NIK"
                  << "| " << std::setw(24) << "Nama Dosen"
                  << "| " << std::setw(10) << "Gender"
                  << "| " << std::setw(10) << "NIDN"
                  << "| " << std::setw(18) << "Jabatan"
                  << "| " << std::setw(20) << "Keahlian" << " |\n";
        printLine(95, '-');

        const auto& listDosen = prodi.getDaftarDosen();
        if (listDosen.empty()) {
            std::cout << "   | Belum ada data dosen terdaftar." << std::setw(61) << " |\n";
        } else {
            for (size_t i = 0; i < listDosen.size(); ++i) {
                std::cout << "   | " << std::left << std::setw(4) << (i + 1)
                          << "| " << std::setw(12) << listDosen[i].getNik()
                          << "| " << std::setw(24) << listDosen[i].getNama()
                          << "| " << std::setw(10) << listDosen[i].getJenisKelamin()
                          << "| " << std::setw(10) << listDosen[i].getNidn()
                          << "| " << std::setw(18) << listDosen[i].getJabatanFungsional()
                          << "| " << std::setw(20) << listDosen[i].getKeahlian() << " |\n";
            }
        }
        printLine(95, '-');

        // 2. TABEL MAHASISWA
        std::cout << "\n   [2] Daftar Mahasiswa Aktif (" << prodi.getNamaProdi() << "):\n";
        printLine(95, '-');
        std::cout << "   | " << std::left << std::setw(4) << "No"
                  << "| " << std::setw(12) << "NIK"
                  << "| " << std::setw(24) << "Nama Mahasiswa"
                  << "| " << std::setw(10) << "Gender"
                  << "| " << std::setw(12) << "NIM"
                  << "| " << std::setw(10) << "Semester"
                  << "| " << std::setw(8)  << "IPK" << " |\n";
        printLine(95, '-');

        const auto& listMhs = prodi.getDaftarMahasiswa();
        if (listMhs.empty()) {
            std::cout << "   | Belum ada data mahasiswa terdaftar." << std::setw(58) << " |\n";
        } else {
            for (size_t i = 0; i < listMhs.size(); ++i) {
                std::stringstream ipkStr;
                ipkStr << std::fixed << std::setprecision(2) << listMhs[i].getIpk();
                std::cout << "   | " << std::left << std::setw(4) << (i + 1)
                          << "| " << std::setw(12) << listMhs[i].getNik()
                          << "| " << std::setw(24) << listMhs[i].getNama()
                          << "| " << std::setw(10) << listMhs[i].getJenisKelamin()
                          << "| " << std::setw(12) << listMhs[i].getNim()
                          << "| " << std::setw(10) << listMhs[i].getSemester()
                          << "| " << std::setw(8)  << ipkStr.str() << " |\n";
            }
        }
        printLine(95, '-');

        // 3. TABEL ASISTEN DOSEN
        std::cout << "\n   [3] Daftar Asisten Dosen / Praktikum (" << prodi.getNamaProdi() << "):\n";
        printLine(95, '-');
        std::cout << "   | " << std::left << std::setw(4) << "No"
                  << "| " << std::setw(10) << "ID Asisten"
                  << "| " << std::setw(20) << "Nama Asisten"
                  << "| " << std::setw(10) << "NIM"
                  << "| " << std::setw(24) << "Mata Kuliah Binaan"
                  << "| " << std::setw(16) << "Honor/Bulan (Rp)" << " |\n";
        printLine(95, '-');

        const auto& listAsisten = prodi.getDaftarAsisten();
        if (listAsisten.empty()) {
            std::cout << "   | Belum ada data asisten terdaftar." << std::setw(60) << " |\n";
        } else {
            for (size_t i = 0; i < listAsisten.size(); ++i) {
                std::stringstream honorStr;
                honorStr << std::fixed << std::setprecision(0) << listAsisten[i].getHonorBulanan();
                std::cout << "   | " << std::left << std::setw(4) << (i + 1)
                          << "| " << std::setw(10) << listAsisten[i].getIdAsisten()
                          << "| " << std::setw(20) << listAsisten[i].getNama()
                          << "| " << std::setw(10) << listAsisten[i].getNim()
                          << "| " << std::setw(24) << listAsisten[i].getMataKuliahBinaan()
                          << "| " << std::setw(16) << ("Rp " + honorStr.str()) << " |\n";
            }
        }
        printLine(95, '-');
        std::cout << "\n";
    }
    printLine(95, '=');
}
