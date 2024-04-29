<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data i czas 2</title>
</head>
<body>
    <form action="" method='get'>
        <input type="number" name="n" id="n">
        <button type="submit">WYŚLIJ</button>
    </form>

        <?php
            function silnia($n){
                $silnia = 1;
                for($i = $n; $i > 1; $i--){
                    $silnia = $silnia * $i;
                }
                return $silnia;
            }

            function silnia_rek($n){
                if($n <= 1){
                    return 1;
                } else {
                    return $n * silnia_rek($n - 1);
                }
            }

            if(isset($_GET['n'])){
                $n = $_GET['n'];    

                $start_silnia = microtime(true);
                $czas_silnia = silnia($n);
                $koniec_silnia = microtime(true);
                
                $wynik_silnia = number_format($koniec_silnia - $start_silnia, 10);

                $start_silnia_rek = microtime(true);
                $czas_silnia_rek = silnia_rek($n);
                $koniec_silnia_rek = microtime(true);

                $wynik_silnia_rek = number_format($koniec_silnia_rek - $start_silnia_rek, 10);

                if($wynik_silnia < $wynik_silnia_rek){
                    $szybsza_funckja = "iteracyjna";
                } else {
                    $szybsza_funckja = "rekurencyjna";
                }

                echo '<p> Czas silni: ' . $wynik_silnia . 'sekund</p>'; 
                echo '<p> Czas silni rekurencyjnie: ' . $wynik_silnia_rek . 'sekund</p>';
                echo '<p> Szybsza funkcja to: ' . $szybsza_funckja . '</p>';
                echo '<p> Różnica czasu to: ' . number_format(abs($wynik_silnia_rek - $wynik_silnia), 10) . '</p>'; 

            }



        ?>



</body>
</html>
