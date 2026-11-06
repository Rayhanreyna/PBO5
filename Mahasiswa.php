<?php
declare(strict_types=1);

class Mahasiswa
{
    // 1. Semua properti PRIVATE (Termasuk Properti Alamat Baru)
    private string $nim;
    private string $nama;
    private string $alamat; 
    private string $fakultas;
    private string $prodi;
    private string $asalSekolah;
    private int $semester;
    private string $hobi;
    private string $agama;

    // Daftar agama yang diizinkan (Aturan Validasi)
    public const AGAMA_IZIN = ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Khonghucu'];

    public function __construct(
        string $nim,
        string $nama,
        string $alamat, 
        string $fakultas,
        string $prodi,
        string $asalSekolah,
        int $semester,
        string $hobi,
        string $agama
    ) {
        $this->setNim($nim);
        $this->setNama($nama);
        $this->setAlamat($alamat); 
        $this->fakultas = trim($fakultas);
        $this->prodi = trim($prodi);
        $this->asalSekolah = trim($asalSekolah);
        $this->setSemester($semester);
        $this->hobi = trim($hobi);
        $this->setAgama($agama);
        
    }

    // ===================================================
    // GETTER
    // ===================================================
    public function getNim(): string { return $this->nim; }
    public function getNama(): string { return $this->nama; }
    public function getAlamat(): string { return $this->alamat; } 
    public function getFakultas(): string { return $this->fakultas; }
    public function getProdi(): string { return $this->prodi; }
    public function getAsalSekolah(): string { return $this->asalSekolah; }
    public function getSemester(): int { return $this->semester; }
    public function getHobi(): string { return $this->hobi; }
    public function getAgama(): string { return $this->agama; }

    // ===================================================
    // SETTER (Hanya Atribut yang Boleh Diubah)
    // ===================================================
    private function setNim(string $nim): void
    {
        if (trim($nim) === '') {
            throw new InvalidArgumentException("NIM wajib diisi!");
        }
        $this->nim = trim($nim);
    }

    public function setNama(string $nama): void
    {
        if (trim($nama) === '') {
            throw new InvalidArgumentException("Nama tidak boleh kosong!");
        }
        $this->nama = trim($nama);
    }

    public function setAlamat(string $alamat): void // <--- DITAMBAHKAN
    {
        $this->alamat = trim($alamat);
    }

    public function setFakultas(string $fakultas): void
    {
        $this->fakultas = trim($fakultas);
    }

    public function setProdi(string $prodi): void
    {
        $this->prodi = trim($prodi);
    }

    public function setAsalSekolah(string $asalSekolah): void
    {
        $this->asalSekolah = trim($asalSekolah);
    }

    public function setSemester(int $semester): void
    {
        if ($semester < 1 || $semester > 14) {
            throw new InvalidArgumentException("Semester harus bernilai antara 1 sampai 14!");
        }
        $this->semester = $semester;
    } // <--- PASTIKAN KURUNG KURAWAL TUTUP INI ADA

    public function setHobi(string $hobi): void
    {
        $this->hobi = trim($hobi);
    }
    public function setAgama(string $agama): void
    {
        $agamaTrimmed = trim($agama);
        if (!in_array($agamaTrimmed, self::AGAMA_IZIN, true)) {
            throw new InvalidArgumentException("Pilihan agama harus termasuk daftar yang diizinkan (" . implode(', ', self::AGAMA_IZIN) . ")!");
        }
        $this->agama =$agamaTrimmed;
    }
}