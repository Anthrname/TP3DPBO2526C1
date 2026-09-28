#ifndef PROGRAM_STUDI_HPP
#define PROGRAM_STUDI_HPP

#include "Dosen.hpp"
#include "Mahasiswa.hpp"
#include "AsistenDosen.hpp"
#include <string>
#include <vector>

class ProgramStudi {
private:
    std::string kodeProdi;
    std::string namaProdi;
    std::string jenjang;
    Dosen kaprodi;
    std::vector<Dosen> daftarDosen;
    std::vector<Mahasiswa> daftarMahasiswa;
    std::vector<AsistenDosen> daftarAsisten;

public:
    // Konstruktor Default
    ProgramStudi();

    // Konstruktor Berparameter
    ProgramStudi(const std::string& kodeProdi, const std::string& namaProdi,
                 const std::string& jenjang, const Dosen& kaprodi);

    // Destruktor
    virtual ~ProgramStudi();

    // Getter dan Setter
    std::string getKodeProdi() const;
    void setKodeProdi(const std::string& kodeProdi);

    std::string getNamaProdi() const;
    void setNamaProdi(const std::string& namaProdi);

    std::string getJenjang() const;
    void setJenjang(const std::string& jenjang);

    Dosen getKaprodi() const;
    void setKaprodi(const Dosen& kaprodi);

    // Operasi Kumpulan Objek (Array of Objects)
    void tambahDosen(const Dosen& d);
    void tambahMahasiswa(const Mahasiswa& m);
    void tambahAsistenDosen(const AsistenDosen& a);

    const std::vector<Dosen>& getDaftarDosen() const;
    const std::vector<Mahasiswa>& getDaftarMahasiswa() const;
    const std::vector<AsistenDosen>& getDaftarAsisten() const;
};

#endif // PROGRAM_STUDI_HPP
