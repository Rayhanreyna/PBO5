<?php
declare(strict_types=1);

class Buku
{

    public string $judul;
    public string $penulis;
    private int $tahun;

    public function __construct(
        string $judul, 
        string $penulis,
        int $tahun
    ) {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->tahun = $tahun;
    }

    public function tampilInfo(): string
    {
        echo "Judul: " . $this->judul . "\n";
        echo "Penulis: " . $this->penulis . "\n";
        echo "Tahun: " . $this->tahun . "\n";

     }


    public function __destruct()
    {
    echo "Destructor dijalankan: "
        . $this->judul . "\n";
    }
}

$buku1 = new Buku("Laskar Pelangi", "Andrea Hirata", 2005);
$buku2 = new Buku("Bumi Manusia", "Pramoedya Ananta Toer", 1980);
$buku3 = new Buku("Filosfi Teras", "Henry Manampiring", 2018);

// Menampilkan informasi dari masing-masing objek
echo $buku1->tampilInfo() . "<br>";
echo $buku2->tampilInfo() . "<br>";
echo $buku3->tampilInfo() . "<br>";

$buku4 = new Buku(
'Pemograman PHP',
'Andi',
2024
);
unset($buku4);
echo "Buku4 sudah di-unset\n";

echo "\n=== UJI ALIAS OBJECT ===\n";

$buku5 = new Buku(
'Belajar OOP',
'Sinta',
2025

);
$alias = $buku5;
unset($buku5);
echo "Buku5 sudah di-unset\n";
echo "Judul melalui alias: " . $alias->judul . "\n";
unset($alias);

