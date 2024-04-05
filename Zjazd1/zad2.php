<!DOCTYPE html>
<html>
<body>


<?php

function czyPierwsza($n){
    if($n < 2){
        return false;
    } else {
        for($i = 2; $i *$i <= $n; $i++){
            if($n % $i == 0){
                return false;
            }
        }
    }
    return true;
    
}

$poczatek = 0;
$koniec = 30;

for($i = $poczatek; $i <= $koniec; $i++){
    if(czyPierwsza($i)){
        echo $i . "<br>";
    }
}

?>

</body>
</html>
