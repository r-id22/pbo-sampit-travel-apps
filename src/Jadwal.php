<?php
require_once __DIR__ . '/Mobil.php';

// Agregasi: Jadwal "1" o-- "1..*" Mobil
class Jadwal
{
    private array $daftarMobil = [];

    public function __construct(
        private string $sesi,
        private string $jam,
        private string $rute,
        private int $tarif
    ) {
    }

    public function tambahMobil(Mobil $m): void
    {
        $this->daftarMobil[] = $m;
    }

    public function jumlahMobil(): int
    {
        return count($this->daftarMobil);
    }

    public function getTarif(): int
    {
        return $this->tarif;
    }

    public function getRingkasan(): string
    {
        return "{$this->sesi} ({$this->jam} WIB) | {$this->rute} | Rp "
            . number_format($this->tarif, 0, ',', '.') . " | {$this->jumlahMobil()} mobil";
    }

    public function pesan(Penumpang $penumpang, Pembayaran $pembayaran): ?Pemesanan
    {
        foreach ($this->daftarMobil as $mobil) {
            if ($mobil->sisaKursi() > 0) {
                $p = new Pemesanan($penumpang, $pembayaran, $this->tarif);
                $mobil->tambahPemesanan($p);
                $p->konfirmasi();
                return $p;
            }
        }
        return null;
    }

    public function getDaftarMobil(): array
    {
        return $this->daftarMobil;
    }
}
