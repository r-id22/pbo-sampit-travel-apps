<?php
require_once __DIR__ . '/Pembayaran.php';

class PembayaranTransfer implements Pembayaran
{
    public function __construct(private string $bank)
    {
    }

    public function bayar(int $jumlah): string
    {
        return "Transfer {$this->bank} Rp " . number_format($jumlah, 0, ',', '.') . " (menunggu verifikasi)";
    }

    public function getMetode(): string
    {
        return "Transfer " . $this->bank;
    }
}
