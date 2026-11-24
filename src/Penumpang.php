<?php
require_once __DIR__ . '/Pengguna.php';

class Penumpang extends Pengguna
{
    public function __construct(string $nama, string $noHp, private string $kategori = 'Umum')
    {
        parent::__construct($nama, $noHp);
    }

    public function getKategori(): string
    {
        return $this->kategori;
    }

    public function getPeran(): string
    {
        return "Penumpang ({$this->kategori})";
    }
}
