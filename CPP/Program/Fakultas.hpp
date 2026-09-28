#ifndef FAKULTAS_HPP
#define FAKULTAS_HPP

#include "Dosen.hpp"
#include "ProgramStudi.hpp"
#include <string>
#include <vector>

class Fakultas {
private:
    std::string kodeFakultas;
    std::string namaFakultas;
    Dosen dekan;
    std::vector<ProgramStudi> daftarProdi;

public:
    // Konstruktor Default
    Fakultas();

    // Konstruktor Berparameter
    Fakultas(const std::string& kodeFakultas, const std::string& namaFakultas, const Dosen& dekan);

    // Destruktor
    virtual ~Fakultas();

    // Getter dan Setter
    std::string getKodeFakultas() const;
    void setKodeFakultas(const std::string& kodeFakultas);

    std::string getNamaFakultas() const;
    void setNamaFakultas(const std::string& namaFakultas);

    Dosen getDekan() const;
    void setDekan(const Dosen& dekan);

    // Operasi Komposisi Program Studi
    void tambahProdi(const ProgramStudi& p);
    std::vector<ProgramStudi>& getDaftarProdi();
    const std::vector<ProgramStudi>& getDaftarProdi() const;

    // Menampilkan Informasi Lengkap Fakultas dan Seluruh Komponennya
    void tampilkanInformasiLengkap() const;
};

#endif // FAKULTAS_HPP
