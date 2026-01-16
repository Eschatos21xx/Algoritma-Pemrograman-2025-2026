<?php
$nama = "";
while(true){
    echo "Masukkan Nama: ";
    $nama = trim(fgets(STDIN));
    if($nama != "") break;
}

echo "Nama benar? (true/false): ";
$cek = trim(fgets(STDIN));
while($cek != "true"){
    echo "Masukkan Nama: ";
    $nama = trim(fgets(STDIN));
    echo "Nama benar? (true/false): ";
    $cek = trim(fgets(STDIN));
}

echo "Masukkan NIM: ";
$nim = trim(fgets(STDIN));
$saldo = (int)$nim;

echo "Nama: $nama\n";
echo "Saldo awal: Rp ".number_format($saldo,0,",",".")."\n";

echo "1. Cek Saldo\n";
echo "2. Tarik Tunai\n";
echo "3. Setor Tunai\n";
echo "4. Transfer\n";
echo "5. Keluar\n";

$pilih = trim(fgets(STDIN));
switch($pilih){
    case 1: echo "Saldo kamu Rp ".number_format($saldo,0,",","."); break;
    case 2: echo "Tarik berapa: "; $t=trim(fgets(STDIN)); $saldo-=$t; echo $saldo; break;
    case 3: echo "Setor berapa: "; $t=trim(fgets(STDIN)); $saldo+=$t; echo $saldo; break;
    case 4: echo "Transfer berapa: "; $t=trim(fgets(STDIN)); $saldo-=$t; echo $saldo; break;
    default: echo "Keluar";
}
?>
