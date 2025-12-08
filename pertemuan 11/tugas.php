<?php
$nim = readline("Masukkan NIM: ");

$digit = [];
for ($i = 0; $i < strlen($nim); $i++) {
    $digit[] = intval($nim[$i]);
}

$total = 0;
foreach ($digit as $d) {
    $total += $d;
}

$max_val = $digit[0];
foreach ($digit as $d) {
    if ($d > $max_val) {
        $max_val = $d;
    }
}

$minim = $digit[0];
foreach ($digit as $d) {
    if ($d < $minim) {
        $minim = $d;
    }
}

$rata = $total / count($digit);

$rev = [];
for ($i = count($digit) - 1; $i >= 0; $i--) {
    $rev[] = $digit[$i];
}

echo "digit         : ";
print_r($digit);
echo "total         : $total\n";
echo "max           : $max_val\n";
echo "min           : $minim\n";
echo "rata-rata     : $rata\n";
echo "reverse array : ";
print_r($rev);
?>