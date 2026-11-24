<?php
require_once __DIR__ . '/Penumpang.php';
require_once __DIR__ . '/Pembayaran.php';

class Pemesanan
{
    public const DIAJUKAN = 'Diajukan';
    public const TERKUNCI = 'Terkunci';

    private string $status = self::DIAJUKAN;

    public function __construct(
        private Penumpang $penumpang,
        private Pembayaran $pembayaran,
        private int $tarif
    ) {
    }

    public function konfirmasi(): void
    {
        $this->status = self::TERKUNCI;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getPenumpang(): Penumpang
    {
        return $this->penumpang;
    }

    public function getPembayaran(): Pembayaran
    {
        return $this->pembayaran;
    }

    public function getTarif(): int
    {
        return $this->tarif;
    }
}
