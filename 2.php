<?php 

    function urutkan($data)
    {
        $length = count($data);

        for( $i = 0; $i < $length; $i++ ){

            for($a = 0; $a < $length-1; $a++) {
                
                if($data[$a] > $data[$a+1]){
    
                   $wadah = $data[$a];
                   $data[$a]   = $data[$a+1];
                   $data[$a+1] = $wadah;
    
                }

            }

        }

        foreach($data as $angka){
            echo $angka . " ";
        }
    }


    $angka = [20, 12, 35, 11, 17, 9, 58, 23, 69, 21];

    urutkan($angka);