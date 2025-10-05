<?php
$total = 0;

do {
    echo "=== MENU KASIR ===\n";
    echo "1. Nasi Goreng - 15000\n";
    echo "2. Mie Ayam - 12000\n";
    echo "3. Es Teh - 5000\n";
    echo "4. Kopi - 8000\n";

    $pilihan = (int)readline("Pilih menu (1-4): ");
    $jumlah = (int)readline("Jumlah pesanan: ");

    switch ($pilihan) {
        case 1: $harga = 15000; break;
        case 2: $harga = 12000; break;
        case 3: $harga = 5000; break;
        case 4: $harga = 8000; break;
        default: 
            echo "Menu tidak tersedia!\n";
            $harga = 0;
    }

    $subtotal = $harga * $jumlah;
    $total += $subtotal;

    echo "Subtotal: Rp $subtotal\n";

    $lagi = readline("Tambah pesanan lain? (y/n): ");
} while ($lagi == 'y');

echo "\n=== TOTAL PEMBAYARAN ===\n";
echo "Total yang harus dibayar: Rp $total\n";
?>
