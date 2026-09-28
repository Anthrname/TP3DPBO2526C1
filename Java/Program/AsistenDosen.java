// AsistenDosen.java
// Subclass dari Mahasiswa via Multilevel Inheritance (Membentuk Hybrid Inheritance)

public class AsistenDosen extends Mahasiswa {
    private String idAsisten;
    private String mataKuliahBinaan;
    private double honorBulanan;

    // Konstruktor Default
    public AsistenDosen() {
        super();
        this.idAsisten = "";
        this.mataKuliahBinaan = "";
        this.honorBulanan = 0.0;
    }

    // Konstruktor Berparameter
    public AsistenDosen(String nik, String nama, String jenisKelamin, 
                        String nim, int semester, double ipk,
                        String idAsisten, String mataKuliahBinaan, double honorBulanan) {
        super(nik, nama, jenisKelamin, nim, semester, ipk);
        setIdAsisten(idAsisten);
        setMataKuliahBinaan(mataKuliahBinaan);
        setHonorBulanan(honorBulanan);
    }

    // Getter dan Setter
    public String getIdAsisten() {
        return idAsisten;
    }

    public void setIdAsisten(String idAsisten) {
        if (idAsisten == null || idAsisten.trim().isEmpty()) {
            throw new IllegalArgumentException("ID Asisten tidak boleh kosong.");
        }
        this.idAsisten = idAsisten;
    }

    public String getMataKuliahBinaan() {
        return mataKuliahBinaan;
    }

    public void setMataKuliahBinaan(String mataKuliahBinaan) {
        this.mataKuliahBinaan = mataKuliahBinaan;
    }

    public double getHonorBulanan() {
        return honorBulanan;
    }

    public void setHonorBulanan(double honorBulanan) {
        if (honorBulanan < 0.0) {
            throw new IllegalArgumentException("Honor bulanan tidak boleh bernilai negatif.");
        }
        this.honorBulanan = honorBulanan;
    }
}
