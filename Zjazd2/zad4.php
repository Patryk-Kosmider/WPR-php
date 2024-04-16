<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liczba pierwsza</title>
</head>
<body>
    <form action="" method="post">
        <input type="number" name="liczba" id="liczba">
        <button type="submit">Sprawdz</button>
    </form>

    <?php
    function czyPierwsza($n){
        global $i;
        if($n <= 1){
            return false;
        }
        for($i = 2; $i <= sqrt($n); $i++){
            $i++;
            if($n % $i == 0){
                return false;
            }
        }
        return true;
    }
            
    if($_POST){
        $n = $_POST['liczba'];
        if($n > 0 && ctype_digit($n)){
            $i = 1;
            if(czyPierwsza($n)){
                echo "Liczba jest pierwsza - ilość iteracji : $i";
            } else {
                echo "Liczba nie jest pierwsza - ilość iteracji: $i";
            }
        } else {
            echo "Liczba nie jest całkowita";
        }
    }
    ?>
</body>
</html>
