#ifndef SIVITAS_AKADEMIK_HPP
#define SIVITAS_AKADEMIK_HPP

#include <string>
#include <iostream>

class SivitasAkademik {
protected:
    std::string nik;
    std::string nama;
    std::string jenisKelamin;

public:
    // Konstruktor Default
    SivitasAkademik();

    // Konstruktor Berparameter
    SivitasAkademik(const std::string& nik, const std::string& nama, const std::string& jenisKelamin);

    // Virtual Destruktor
    virtual ~SivitasAkademik();

    // Getter dan Setter
    std::string getNik() const;
    void setNik(const std::string& nik);

    std::string getNama() const;
    void setNama(const std::string& nama);

    std::string getJenisKelamin() const;
    void setJenisKelamin(const std::string& jenisKelamin);
};

#endif // SIVITAS_AKADEMIK_HPP
