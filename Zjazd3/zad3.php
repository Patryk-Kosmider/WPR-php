<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Operacje na plikach</title>
</head>
<body>
    <form action="" method="get">
    <p>Ścieżka katalogu: </p>
    <input type="text" name="sciezka" id="sciezka">
    <p>Nazwa katalogu: </p>
    <input type="text" name="katalog" id="katalog">
    <p>Operacja: </p>
    <select name="operacja" id="operacja">
        <option value="odczyt" selected>Odczyt</option>
        <option value="usun">Usuń</option>
        <option value="stworz">Stwórz</option>
    </select>
    <button type="submit">Wyślij</button>
    </form>

    <?php
        if(isset($_GET['sciezka']) && isset($_GET['katalog']) && isset($_GET['operacja'])){
            $sciezka = $_GET['sciezka'];
            $katalog = $_GET['katalog'];
            $operacja = $_GET['operacja'];
        

        if(substr($sciezka, -1) != "/"){
            $sciezka = $sciezka . "/";
        }
        operacje($sciezka, $katalog, $operacja);
    }

        function operacje($sciezka, $katalog, $operacja){
            $pelna_sciezka = $sciezka . $katalog;
            if($operacja == "odczyt"){
                if(!is_dir($pelna_sciezka)){
                    echo "<p> Dana ścieżka nie istnieje </p>";
                    return 0;
                }
                $pliki = scandir($pelna_sciezka);
                echo "<p> Zawartość katalogu: " . $katalog . "</p>";
                foreach($pliki as $plik){
                    echo "<p>" . $plik . "</p>";
                }
            }
            if($operacja == "usun"){
                if(is_dir($pelna_sciezka) && count(scandir($pelna_sciezka)) <= 2){
                    rmdir($pelna_sciezka);
                    echo "<p> Usunięto " . $katalog . "</p>";
                } else {
                    echo "<p> Katalog " . $katalog . " nie jest pusty </p>";
                }
            }
            if($operacja == "stworz"){
                if(is_dir($pelna_sciezka)){
                    echo "<p> Dana ścieżka już istnieje </p>";
                } else {
                    mkdir($pelna_sciezka);
                    echo "<p> Katalog " . $katalog . " został utworzony </p>"; 
                }
            }
    }

    ?>


</body>
</html>
