<?php 

    function drawImage($n)
    {
        for ($row = 1; $row <= $n; $row++)
        {

            for ($col = 1; $col <= $n; $col++)
            {
                echo ($col % 2 == 1 ? " * " : " # ");
                // echo $col.$row;
            }
            echo '<br/>';

        }
    }

    drawImage(5);

    