<?php    
    echo "=== Nomor 1: Constructor ===\n";
// objek pertama : fakultas tidak diisi 
    $m1 = new Mahasiswa(
    '123',
    'alya',
    'teknik sipil'
    'smk 2',
    3,
    'membaca',
    'islam'

);

// objek kedua : fakultas di isi 
    $m1 = new Mahasiswa(
    '123',
    'asep',
    'teknik informatika'
    'sma 3',
    3,
    'menulis',
    'islam',
    'fakultas sains dan teknologi'
);

echo "Mahasiswa 1: " . $m1->nama . "\n";
echo "fakultas: " . $m1->fakultas . "\n\n";

echo "Mahasiswa 2: " . $m2->nama . "\n";
echo "Fakultas: " . $m2->fakultas . "\n";

$latihan = new Latihan();
$latihan->hobi = 'Membaca';
echo "Hobi: " . $latihan->hobi . "\n";

cho isset($latihan->hobi)
? "Hobi tersedia\n"
: "Hobi tidak tersedia\n";
unset($latihan->hobi);
echo isset($latihan->hobi)
? "Hobi masih tersedia\n"
: "Hobi sudah dihapus\n";

echo $m->profilSingkat() . "\n";
try {
$m->methodTidakAda();
} catch (BadMethodCallException $e) {
echo "Exception tertangkap: "
. $e->getMessage() . "\n";
}
