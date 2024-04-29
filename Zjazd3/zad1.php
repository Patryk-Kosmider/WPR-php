<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data i czas</title>
</head>
<body>
        <form action="" method="get">
            <input type="date" name="data" id="data">
            <button type="submit">WYŚLIJ</button>
        </form>

        <?php
            if(isset($_GET['data'])){
                $data = strtotime($_GET['data']);
                echo '<p> Dzień tygodnia: ' . dzien_tygodnia($data) . '</p>';
                echo '<p> Wiek: ' . wiek($data) . '</p>';
                echo '<p> Ilość dni do najbliższych urodzin: ' . ilosc_dni($data) . '</p>';
            }

            function dzien_tygodnia($date){
                $dzien_tygodnia = date('l', $date);
                return $dzien_tygodnia;
            }

            function wiek($date){
                $wiek = date('Y') - date('Y', $date);
                return $wiek;
            }
            function ilosc_dni($date){
                $obecna_data = date('Y-m-d');
                
                $m_d = date('m-d', $date);
                
                $obecny_m_d = date('m-d');
            
                if ($m_d >= $obecny_m_d) {
                    $urodziny = date('Y') . '-' . date('m-d', $date);
                } else { 
                    $urodziny = (date('Y') + 1) . '-' . date('m-d', $date);
                }
            
                $ilosc_dni = ceil((strtotime($urodziny) - strtotime($obecna_data)) / (60 * 60 * 24));
                
                return $ilosc_dni;
            }
            
        
        ?>

</body>
</html>
