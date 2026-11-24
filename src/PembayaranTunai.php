<?php
require_once __DIR__ . '/Pembayaran.php';

class PembayaranTunai implements Pembayaran
{
    public function bayar(int $jumlah): string
    {
        return "Bayar tunai Rp " . number_format($jumlah, 0, ',', '.') . " di loket/sopir";
    }

    public function getMetode(): string
    {
        return "Tunai";
    }
}
