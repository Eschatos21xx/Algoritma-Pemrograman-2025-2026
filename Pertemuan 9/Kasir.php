<?php

$nama = readline("Masukkan Nama Barang: ");
$harga = floatval(readline("Masukkan Harga Barang: "));
$jumlah = intval(readline("Masukkan Jumlah Beli: "));
$nim3 = intval(readline("Masukkan 3 Angka Terakhir NIM: "));
$nim1 = intval(readline("Masukkan 1 Angka Terakhir NIM: "));

$total = $harga * $jumlah;
$minimal = $nim3 * 100;
$diskon_persen = $nim1;

if ($total >= $minimal) {
    $diskon = $total * ($diskon_persen / 100);
} else {
    $diskon = 0;
    $diskon_persen = 0;
}

$total_bayar = $total - $diskon;

echo "\n===== STRUK BELANJA =====\n";
echo "Nama Barang        : $nama\n";
echo "Harga Satuan       : $harga\n";
echo "Jumlah Beli        : $jumlah\n";
echo "Total Harga        : $total\n";
echo "Minimal Diskon     : $minimal\n";
echo "Diskon (%)         : $diskon_persen%\n";
echo "Diskon (Rp)        : $diskon\n";
echo "Total Bayar        : $total_bayar\n";
echo "=========================\n";

?>
