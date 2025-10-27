<?php
$tugas = readline("Masukkan nilai tugas: ");
$uts = readline("Masukkan nilai UTS: ");
$uas = readline("Masukkan nilai UAS: ");

$nilaiAkhir = (0.3 * $tugas) + (0.3 * $uts) + (0.4 * $uas);

echo "Nilai Akhir = " . $nilaiAkhir . "\n";
if ($nilaiAkhir >= 60) {
    echo "Status: Lulus\n";
} else {
    echo "Status: Tidak Lulus\n";
}