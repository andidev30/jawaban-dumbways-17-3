<?php 

    function hitungBarang($barang, $qty)
    {
        $barangA = 4550;
        $barangB = 5330;
        $barangC = 8653;
        $diskon = 0;

        if ($barang == "A") {
            if ($qty > 13) {
                $diskon = 231 * $qty; 
            }
            echo "Total Harga Barang : " . ($barangA * $qty);
            echo "<br>";
            echo "Potongan : "  . $diskon;
            echo "<br>";
            echo "Total Yang Harus dibayar : " . (($barangA * $qty) - $diskon);
        }

        if ($barang == "B") {
            if ($qty > 7) {
                $diskon = (23 * ($barangB * $qty) / 100); 
            }
            echo "Total Harga Barang : " . ($barangB * $qty);
            echo "<br>";
            echo "Potongan : "  . $diskon;
            echo "<br>";
            echo "Total Yang Harus dibayar : " . (($barangB * $qty) - $diskon);
        }

        if ($barang == "C") {
            echo "Total Harga Barang : " . ($barangc * $qty);
            echo "<br>";
            echo "Potongan : "  . $diskon;
            echo "<br>";
            echo "Total Yang Harus dibayar : " . (($barangC * $qty) - $diskon);
        }
    }

    hitungBarang('B', 8);