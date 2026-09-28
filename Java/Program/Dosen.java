// Dosen.java
// Subclass dari SivitasAkademik via Hierarchical Inheritance

public class Dosen extends SivitasAkademik {
    private String nidn;
    private String keahlian;
    private String jabatanFungsional;

    // Konstruktor Default
    public Dosen() {
        super();
        this.nidn = "";
        this.keahlian = "";
        this.jabatanFungsional = "";
    }

    // Konstruktor Berparameter
    public Dosen(String nik, String nama, String jenisKelamin, 
                 String nidn, String keahlian, String jabatanFungsional) {
        super(nik, nama, jenisKelamin);
        this.nidn = nidn;
        this.keahlian = keahlian;
        this.jabatanFungsional = jabatanFungsional;
    }

    // Getter dan Setter
    public String getNidn() {
        return nidn;
    }

    public void setNidn(String nidn) {
        this.nidn = nidn;
    }

    public String getKeahlian() {
        return keahlian;
    }

    public void setKeahlian(String keahlian) {
        this.keahlian = keahlian;
    }

    public String getJabatanFungsional() {
        return jabatanFungsional;
    }

    public void setJabatanFungsional(String jabatanFungsional) {
        this.jabatanFungsional = jabatanFungsional;
    }
}
