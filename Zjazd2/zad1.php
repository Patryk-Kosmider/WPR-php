<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prosty kalkulator</title>
</head>
<body>
    <form method="post" action="">
        <input type="number" name="liczba1" id="liczba1" placeholder="Podaj liczbe 1:">
        <select name="dzialanie" id="dzialanie">
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
        </select>
        <input type="number" name="liczba2" id="liczba2" placeholder="Podaj liczbe 2:">
        <button type="submit">OBLICZ</button>
    </form>

    <?php
        if($_POST){
            $liczba1 = $_POST['liczba1'];
            $liczba2 = $_POST['liczba2'];
            $wynik = 0;
            if($_POST['dzialanie'] == "+"){
                $wynik = $liczba1 + $liczba2;
            } else if ($_POST['dzialanie'] == "-"){
                $wynik = $liczba1 - $liczba2;
            } else if ($_POST['dzialanie'] == "*"){
                $wynik = $liczba1 * $liczba2;
            } else {
                if($liczba2 == 0)
                {    
                    $wynik = "<p>Nie mozna dzielic przez zero</p>";
                    
                } else {
                    $wynik = $liczba1 / $liczba2;
                }
            }

            echo "<p>Wynik: $wynik</p>";
        }
    ?>

</body>
</html>
