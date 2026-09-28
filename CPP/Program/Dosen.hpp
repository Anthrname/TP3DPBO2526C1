#ifndef DOSEN_HPP
#define DOSEN_HPP

#include "SivitasAkademik.hpp"
#include <string>

class Dosen : public SivitasAkademik {
private:
    std::string nidn;
    std::string keahlian;
    std::string jabatanFungsional;

public:
    // Konstruktor Default
    Dosen();

    // Konstruktor Berparameter
    Dosen(const std::string& nik, const std::string& nama, const std::string& jenisKelamin,
          const std::string& nidn, const std::string& keahlian, const std::string& jabatanFungsional);

    // Destruktor
    virtual ~Dosen();

    // Getter dan Setter
    std::string getNidn() const;
    void setNidn(const std::string& nidn);

    std::string getKeahlian() const;
    void setKeahlian(const std::string& keahlian);

    std::string getJabatanFungsional() const;
    void setJabatanFungsional(const std::string& jabatanFungsional);
};

#endif // DOSEN_HPP
