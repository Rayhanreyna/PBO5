<?php
class Latihan {
    private array $atributTambahan = [];

    public function __set(string $nama, mixed $nilai): void {
        $this->atributTambahan[$nama] = $nilai;
    }

    public function __get(string $nama): mixed {
        return $this->atributTambahan[$nama] ?? null;
    }
    public function __isset(string $nama): bool {
        return isset($this->atributTambahan[$nama]);
    }
    public function __unset(string $nama): void {
        unset($this->atributTambahan[$nama]);
    }
}