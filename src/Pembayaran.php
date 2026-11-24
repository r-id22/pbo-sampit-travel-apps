<?php
interface Pembayaran
{
    public function bayar(int $jumlah): string;
    public function getMetode(): string;
}
