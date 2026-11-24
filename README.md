# Sampit Travel Apps (PBO Lab 10)

Aplikasi pemesanan mobil travel Terminal Patih Rumbih Sampit. Repository ini berisi kode PHP hasil penerjemahan UML class diagram.

## Jadwal Layanan

| Sesi | Jam (WIB) | Rute | Mobil | Tarif |
|---|---|---|---|---|
| Pagi | 08.00 - 10.00 | Sampit - Banjarmasin | 2 | Rp 500.000 |
| Siang | 13.00 - 15.00 | Sampit - Palangkaraya & Sampit - Pangkalanbun | 4 | Rp 300.000 |
| Malam | 16.00 - 20.00 | Sampit - Kuala Pembuang | 2 | Rp 250.000 |

## Menjalankan

```
php index.php
```

## Class Diagram

```mermaid
classDiagram
    class Pengguna {
        <<abstract>>
        #nama: string
        #noHp: string
        +getNama() string
        +getNoHp() string
        +getPeran()* string
    }
    class Penumpang {
        -kategori: string
        +getKategori() string
        +getPeran() string
    }
    class Sopir {
        +getPeran() string
    }
    class Pembayaran {
        <<interface>>
        +bayar(jumlah) string
        +getMetode() string
    }
    class PembayaranTunai {
        +bayar(jumlah) string
        +getMetode() string
    }
    class PembayaranTransfer {
        -bank: string
        +bayar(jumlah) string
        +getMetode() string
    }
    class Pemesanan {
        -status: string
        -tarif: int
        +konfirmasi() void
        +getStatus() string
    }
    class Mobil {
        -kode: string
        -kapasitas: int
        +tambahPemesanan(p) bool
        +sisaKursi() int
        +daftarNama() array
    }
    class Jadwal {
        -sesi: string
        -jam: string
        -rute: string
        -tarif: int
        +tambahMobil(m) void
        +pesan(penumpang, pembayaran) Pemesanan
    }

    Pengguna <|-- Penumpang
    Pengguna <|-- Sopir
    Pembayaran <|.. PembayaranTunai
    Pembayaran <|.. PembayaranTransfer
    Jadwal "1" o-- "1..*" Mobil
    Mobil "1" o-- "0..*" Pemesanan
    Pemesanan --> Penumpang
    Pemesanan --> Pembayaran
    Mobil --> Sopir
```

## Relasi Antarkelas

| Jenis Relasi | Kelas |
|---|---|
| Generalisasi | `Penumpang` dan `Sopir` meng-extends `Pengguna` |
| Realisasi | `PembayaranTunai` dan `PembayaranTransfer` meng-implements `Pembayaran` |
| Agregasi | `Jadwal` o-- `Mobil`, dan `Mobil` o-- `Pemesanan` |

## Struktur Folder

```
pbo-sampit-travel-apps/
├── index.php
├── README.md
└── src/
    ├── Jadwal.php
    ├── Mobil.php
    ├── Pembayaran.php
    ├── PembayaranTransfer.php
    ├── PembayaranTunai.php
    ├── Pemesanan.php
    ├── Pengguna.php
    ├── Penumpang.php
    └── Sopir.php
```

Catatan: kapasitas 7 kursi per mobil adalah asumsi.

## Anggota Kelompok

1. Rahmansyah
2. Okta Ramadhani
3. M. Fitriannur Akbar
4. Novy Astoty
5. Ega Apriliani
6. Ruli Sihab
