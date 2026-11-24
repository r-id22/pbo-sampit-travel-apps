<?php
abstract class Pengguna
{
    public function __construct(protected string $nama, protected string $noHp)
    {
    }

    public function getNama(): string
    {
        return $this->nama;
    }

    public function getNoHp(): string
    {
        return $this->noHp;
    }

    abstract public function getPeran(): string;
}
