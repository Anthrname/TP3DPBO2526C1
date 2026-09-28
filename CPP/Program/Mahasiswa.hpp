#ifndef MAHASISWA_HPP
#define MAHASISWA_HPP

#include "SivitasAkademik.hpp"
#include <string>

class Mahasiswa : public SivitasAkademik {
protected:
    std::string nim;
    int semester;
    double ipk;

public:
    // Konstruktor Default
    Mahasiswa();

    // Konstruktor Berparameter
    Mahasiswa(const std::string& nik, const std::string& nama, const std::string& jenisKelamin,
              const std::string& nim, int semester, double ipk);

    // Destruktor
    virtual ~Mahasiswa();

    // Getter dan Setter
    std::string getNim() const;
    void setNim(const std::string& nim);

    int getSemester() const;
    void setSemester(int semester);

    double getIpk() const;
    void setIpk(double ipk);
};

#endif // MAHASISWA_HPP
