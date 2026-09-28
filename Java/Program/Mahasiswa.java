// Mahasiswa.java
// Subclass dari SivitasAkademik via Hierarchical Inheritance

public class Mahasiswa extends SivitasAkademik {
    protected String nim;
    protected int semester;
    protected double ipk;

    // Konstruktor Default
    public Mahasiswa() {
        super();
        this.nim = "";
        this.semester = 1;
        this.ipk = 0.0;
    }

    // Konstruktor Berparameter
    public Mahasiswa(String nik, String nama, String jenisKelamin, 
                     String nim, int semester, double ipk) {
        super(nik, nama, jenisKelamin);
        setNim(nim);
        setSemester(semester);
        setIpk(ipk);
    }

    // Getter dan Setter
    public String getNim() {
        return nim;
    }

    public void setNim(String nim) {
        if (nim == null || nim.trim().isEmpty()) {
            throw new IllegalArgumentException("NIM tidak boleh kosong.");
        }
        this.nim = nim;
    }

    public int getSemester() {
        return semester;
    }

    public void setSemester(int semester) {
        if (semester < 1) {
            throw new IllegalArgumentException("Semester harus minimal 1.");
        }
        this.semester = semester;
    }

    public double getIpk() {
        return ipk;
    }

    public void setIpk(double ipk) {
        if (ipk < 0.0 || ipk > 4.0) {
            throw new IllegalArgumentException(String.format("IPK tidak valid! Harus berada dalam rentang 0.00 hingga 4.00 (Diberikan: %.2f).", ipk));
        }
        this.ipk = ipk;
    }
}
