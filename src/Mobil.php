<?php
require_once __DIR__ . '/Sopir.php';
require_once __DIR__ . '/Pemesanan.php';

// Agregasi: Mobil "1" o-- "0..*" Pemesanan
class Mobil
{
    private array $daftarPemesanan = [];

    public function __construct(
        private string $kode,
        private Sopir $sopir,
        private int $kapasitas = 7
    ) {
    }

    public function getKode(): string
    {
        return $this->kode;
    }

    public function getSopir(): Sopir
    {
        return $this->sopir;
    }

    public function tambahPemesanan(Pemesanan $p): bool
    {
        if ($this->sisaKursi() <= 0) {
            return false;
        }
        $this->daftarPemesanan[] = $p;
        return true;
    }

    public function jumlahPenumpang(): int
    {
        return count($this->daftarPemesanan);
    }

    public function sisaKursi(): int
    {
        return $this->kapasitas - count($this->daftarPemesanan);
    }

    public function daftarNama(): array
    {
        return array_map(fn(Pemesanan $p) => $p->getPenumpang()->getNama(), $this->daftarPemesanan);
    }
}
