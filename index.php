<?php
require_once __DIR__ . '/src/Jadwal.php';
require_once __DIR__ . '/src/PembayaranTunai.php';
require_once __DIR__ . '/src/PembayaranTransfer.php';

$pagi  = new Jadwal('Pagi', '08.00-10.00', 'Sampit - Banjarmasin', 500000);
$siang = new Jadwal('Siang', '13.00-15.00', 'Sampit - Palangkaraya & Sampit - Pangkalanbun', 300000);
$malam = new Jadwal('Malam', '16.00-20.00', 'Sampit - Kuala Pembuang', 250000);

$n = 1;
foreach ([[$pagi, 2], [$siang, 4], [$malam, 2]] as [$jadwal, $jumlah]) {
    for ($i = 1; $i <= $jumlah; $i++) {
        $jadwal->tambahMobil(new Mobil("MBL-$n", new Sopir("Sopir $n", "0812000000$n"), 7));
        $n++;
    }
}

echo "=== JADWAL ===\n";
foreach ([$pagi, $siang, $malam] as $j) {
    echo $j->getRingkasan() . "\n";
}

echo "\n=== PEMESANAN ===\n";
$rani = new Penumpang('Rani', '081234567890', 'Mahasiswa');
$hendra = new Penumpang('Pak Hendra', '081298765432');

$p1 = $siang->pesan($rani, new PembayaranTransfer('BRI'));
$p2 = $siang->pesan($hendra, new PembayaranTunai());

foreach ([$p1, $p2] as $p) {
    if ($p) {
        echo $p->getPenumpang()->getNama() . " [" . $p->getPenumpang()->getPeran() . "] -> "
            . $p->getStatus() . " | " . $p->getPembayaran()->bayar($p->getTarif()) . "\n";
    }
}

echo "\n=== STATUS MOBIL SIANG ===\n";
foreach ($siang->getDaftarMobil() as $m) {
    echo $m->getKode() . " (" . $m->getSopir()->getPeran() . "): terisi "
        . $m->jumlahPenumpang() . ", sisa " . $m->sisaKursi()
        . " | " . implode(', ', $m->daftarNama()) . "\n";
}
