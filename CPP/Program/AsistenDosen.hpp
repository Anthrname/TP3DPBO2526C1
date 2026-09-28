#ifndef ASISTEN_DOSEN_HPP
#define ASISTEN_DOSEN_HPP

#include "Mahasiswa.hpp"
#include <string>

class AsistenDosen : public Mahasiswa {
private:
    std::string idAsisten;
    std::string mataKuliahBinaan;
    double honorBulanan;

public:
    // Konstruktor Default
    AsistenDosen();

    // Konstruktor Berparameter
    AsistenDosen(const std::string& nik, const std::string& nama, const std::string& jenisKelamin,
                 const std::string& nim, int semester, double ipk,
                 const std::string& idAsisten, const std::string& mataKuliahBinaan, double honorBulanan);

    // Destruktor
    virtual ~AsistenDosen();

    // Getter dan Setter
    std::string getIdAsisten() const;
    void setIdAsisten(const std::string& idAsisten);

    std::string getMataKuliahBinaan() const;
    void setMataKuliahBinaan(const std::string& mataKuliahBinaan);

    double getHonorBulanan() const;
    void setHonorBulanan(double honorBulanan);
};

#endif // ASISTEN_DOSEN_HPP
