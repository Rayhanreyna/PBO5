<?php
declare(strict_types=1);
require_once __DIR__ . '/Mahasiswa.php';

class DataMahasiswa
{
    /** @var array<string, Mahasiswa> */
    private array $data = []; // ENKAPSULASI: Data disimpan private

    // CONSTRUCT: Memuat data awal berupa array object Mahasiswa
    public function __construct(array $data = [])
    {
        foreach ($data as $nim => $item) {
            if ($item instanceof Mahasiswa) {
                $this->data[(string) $nim] = $item;
            }
        }
    }

    // DESTRUCT: Dipanggil otomatis saat skrip selesai dieksekusi / repository dilepas
    public function __destruct()
    {
        // Contoh pemanfaatan destruct untuk logging total data yang dikelola sebelum skrip selesai
        error_log('DataMahasiswa Destructed. Total data dikelola: ' . count($this->data));
    }

    public function tambah(Mahasiswa $mahasiswa): bool
    {
        if (isset($this->data[$mahasiswa->getNim()])) return false;
        $this->data[$mahasiswa->getNim()] = $mahasiswa;
        return true;
    }

    /** @return array<string, Mahasiswa> */
    public function semua(): array 
    { 
        return $this->data; 
    }

    public function cari(string $nim): ?Mahasiswa
    {
        return $this->data[$nim] ?? null;
    }

    public function ubah(string $nimLama, Mahasiswa $baru): bool
    {
        if (!isset($this->data[$nimLama])) return false;
        if ($nimLama !== $baru->getNim() && isset($this->data[$baru->getNim()])) return false;
        
        unset($this->data[$nimLama]);
        $this->data[$baru->getNim()] = $baru;
        return true;
    }

    public function hapus(string $nim): bool
    {
        if (!isset($this->data[$nim])) return false;
        unset($this->data[$nim]);
        return true;
    }
}