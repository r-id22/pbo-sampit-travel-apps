<?php
require_once __DIR__ . '/Pengguna.php';

class Sopir extends Pengguna
{
    public function getPeran(): string
    {
        return "Sopir Travel";
    }
}
