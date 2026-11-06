<?php
declare(strict_types=1);

// ===================================================
// 1. CLASS BUKU (ENKAPSULASI & VALIDASI)
// ===================================================
class Buku
{
    private string $kodeBuku;
    private string $judul;
    private int $stok;

    public function __construct(string $kodeBuku, string $judul, int $stok)
    {
        // Validasi Judul wajib diisi
        if (trim($judul) === '') {
            throw new InvalidArgumentException("Judul buku wajib diisi!");
        }

        // Validasi Stok tidak boleh negatif
        if ($stok < 0) {
            throw new InvalidArgumentException("Stok tidak boleh negatif! (Input: {$stok})");
        }

        $this->kodeBuku = trim($kodeBuku);
        $this->judul = trim($judul);
        $this->stok = $stok;
    }

    // Getter untuk kodeBuku (hanya bisa dibaca, tidak ada setter)
    public function getKodeBuku(): string
    {
        return $this->kodeBuku;
    }

    // Getter & Setter untuk Judul
    public function getJudul(): string
    {
        return $this->judul;
    }

    public function setJudul(string $judul): void
    {
        if (trim($judul) === '') {
            throw new InvalidArgumentException("Judul buku tidak boleh kosong!");
        }
        $this->judul = trim($judul);
    }

    // Getter & Method Operasi Stok
    public function getStok(): int
    {
        return $this->stok;
    }

    public function tambahStok(int $jumlah): void
    {
        if ($jumlah <= 0) {
            throw new InvalidArgumentException("Jumlah penambahan stok harus lebih dari 0!");
        }
        $this->stok += $jumlah;
    }

    public function kurangiStok(int $jumlah): void
    {
        if ($jumlah <= 0) {
            throw new InvalidArgumentException("Jumlah pengurangan stok harus lebih dari 0!");
        }

        if ($jumlah > $this->stok) {
            throw new InvalidArgumentException("Stok tidak mencukupi! Stok saat ini: {$this->stok}, dicoba kurangi: {$jumlah}");
        }

        $this->stok -= $jumlah;
    }

    // Method untuk menampilkan info ringkas (mengembalikan nilai string)
    public function tampilInfo(): string
    {
        return "Kode: {$this->kodeBuku} | Judul: {$this->judul} | Stok: {$this->stok}";
    }
}

// ===================================================
// 2. SKRIP PENGUJIAN (2 INPUT VALID & 3 INPUT TIDAK VALID)
// ===================================================

echo "<h2>Hasil Pengujian Class Buku</h2>";

// ---------------------------------------------------
// UJI KASUS VALID (2 Input Valid)
// ---------------------------------------------------
echo "<h3>=== UJI KASUS VALID ===</h3>";

// 1. Uji Valid 1: Instansiasi & Operasi Stok Buku 1
try {
    $buku1 = new Buku("B-001", "Laskar Pelangi", 10);
    echo "<b>Valid 1 (Instansiasi awal):</b> " . $buku1->tampilInfo() . "<br>";

    $buku1->tambahStok(5);
    echo "-> Tambah stok +5. Stok sekarang: {$buku1->getStok()}<br>";

    $buku1->kurangiStok(3);
    echo "-> Kurangi stok -3. Stok sekarang: {$buku1->getStok()}<br><br>";
} catch (Throwable $e) {
    echo "Valid 1 Error: " . $e->getMessage() . "<br><br>";
}

// 2. Uji Valid 2: Instansiasi & Ubah Judul Buku 2
try {
    $buku2 = new Buku("B-002", "Bumi Manusia", 5);
    echo "<b>Valid 2 (Instansiasi awal):</b> " . $buku2->tampilInfo() . "<br>";

    $buku2->setJudul("Bumi Manusia (Edisi Revisi)");
    echo "-> Ubah judul sukses: " . $buku2->getJudul() . "<br><br>";
} catch (Throwable $e) {
    echo "Valid 2 Error: " . $e->getMessage() . "<br><br>";
}

// ---------------------------------------------------
// UJI KASUS TIDAK VALID (3 Input Tidak Valid)
// ---------------------------------------------------
echo "<h3>=== UJI KASUS TIDAK VALID ===</h3>";

// 1. Uji Tidak Valid 1: Judul Kosong (saat __construct)
echo "<b>Tidak Valid 1 (Judul Kosong):</b><br>";
try {
    $bukuGagal1 = new Buku("B-003", "", 5);
} catch (Throwable $e) {
    echo "<span style='color:red;'>DITOLAK: " . htmlspecialchars($e->getMessage()) . "</span><br><br>";
}

// 2. Uji Tidak Valid 2: Stok Awal Negatif (saat __construct)
echo "<b>Tidak Valid 2 (Stok Awal Negatif):</b><br>";
try {
    $bukuGagal2 = new Buku("B-004", "Belajar OOP", -5);
} catch (Throwable $e) {
    echo "<span style='color:red;'>DITOLAK: " . htmlspecialchars($e->getMessage()) . "</span><br><br>";
}

// 3. Uji Tidak Valid 3: Pengurangan Stok Melebihi Stok Tersedia
echo "<b>Tidak Valid 3 (Kurangi Stok Melebihi Batas):</b><br>";
try {
    $bukuTest = new Buku("B-005", "Filosofi Teras", 4);
    echo "Stok awal: {$bukuTest->getStok()}, mencoba kurangi stok sebesar 10...<br>";
    $bukuTest->kurangiStok(10);
} catch (Throwable $e) {
    echo "<span style='color:red;'>DITOLAK: " . htmlspecialchars($e->getMessage()) . "</span><br><br>";
}