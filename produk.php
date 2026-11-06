<?php
declare(strict_types=1);

// 1. Class Induk (Superclass)
class Produk 
{
    public string $nama;
    protected string $kategori;
    private int $harga;

    public function __construct(string $nama, string $kategori, int $harga)
    {
        $this->nama = $nama;
        $this->kategori = $kategori;
        $this->harga = $harga;
    }
}

// 2. Class Turunan (Subclass) untuk Menguji Properti Protected
class ProdukDigital extends Produk 
{
    public function getKategoriDariSubclass(): string 
    {
        // Berhasil diakses karena 'protected' diizinkan di dalam class turunan
        return $this->kategori;
    }
}

// ===================================================
// PENGUJIAN HAK AKSES
// ===================================================
$produk = new Produk("Laptop Gaming", "Elektronik", 15000000);
$produkDigital = new ProdukDigital("E-Book OOP PHP", "Buku Digital", 50000);

echo "<h2>Hasil Pengujian Hak Akses Properti (Encapsulation)</h2>";

// UJI 1: PUBLIC
echo "<b>1. Akses Properti Public (\$nama) dari Luar Class:</b><br>";
try {
    echo "Hasil: " . $produk->nama . " (BERHASIL)<br><br>";
} catch (Throwable $e) {
    echo "Hasil: " . $e->getMessage() . "<br><br>";
}

// UJI 2: PROTECTED VIA SUBCLASS
echo "<b>2. Akses Properti Protected (\$kategori) dari Subclass:</b><br>";
echo "Hasil: " . $produkDigital->getKategoriDariSubclass() . " (BERHASIL)<br><br>";

// UJI 3: PROTECTED LANGSUNG DARI LUAR CLASS
echo "<b>3. Akses Properti Protected (\$kategori) Langsung dari Luar Class:</b><br>";
try {
    echo $produk->kategori;
} catch (Throwable $e) {
    echo "Hasil: <span style='color:red;'>DITOLAK (" . $e->getMessage() . ")</span><br><br>";
}

// UJI 4: PRIVATE LANGSUNG DARI LUAR CLASS
echo "<b>4. Akses Properti Private (\$harga) Langsung dari Luar Class:</b><br>";
try {
    echo $produk->harga;
} catch (Throwable $e) {
    echo "Hasil: <span style='color:red;'>DITOLAK (" . $e->getMessage() . ")</span><br><br>";
}