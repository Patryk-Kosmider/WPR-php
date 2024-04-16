<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formularz rezerwacji</title>
    <style>
      body {
            background-color: grey;
        }

        form {
            max-width: 500px;
            margin: 0 auto;
            background-color: white;
        }

        input, select {
            width: 80%;
            margin: 5px;
            margin-left: 40px;
            padding: 10px;
        }
        button[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
        }
        .rezerwacja{
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #f4f4f4;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

    </style>
</head>
<body>
    <form method="post" action="">
        <label for="ilosc_p">Ilość osób: </label><br>
        <select name="ilosc_p" id="ilosc_p">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        </select>
        <br>
        <input type="text" name="imie" id="imie" placeholder="Podaj imię"><br>
        <input type="text" name="nazwisko" id="nazwisko" placeholder="Podaj nazwisko"><br>
        <input type="text" name="adres" id="adres" placeholder="Podaj adres"><br>
        <input type="text" name="karta" id="karta" maxlength="16" placeholder="Numer karty" pattern="[0-9]{16}"><br>
        <input type="text" name="karta_exp" id="karta_exp" pattern="(0[1-9]|1[0-2])\/\d{2}" placeholder="Data waznosci karty MM/YY"><br>
        <input type="text" name="cvc" id="cvc" pattern="[0-9]{3}" placeholder="CVC karty (3 cyfry)"><br>
        <label for="data_przyjazdu"> Data przyjazdu:</label><br>
        <input type="date" name="data_przyjazdu" id="data_przyjazdu"><br>
        <label for="data_odjazdu"> Data odjazdu:</label><br>
        <input type="date" name="data_odjazdu" id="data_odjazdu"><br>

        <button type="submit">Rezerwuj!</button><br>
    </form> 
    <div class="rezerwacja">  
        <?php 
            if ($_POST){
                $ilosc_osob = $_POST['ilosc_p'];
                $imie = $_POST['imie'];
                $nazwisko = $_POST['nazwisko'];
                $adres = $_POST['adres'];
                $numer_karty = $_POST['karta'];
                $data_waznosci = $_POST['karta_exp'];
                $cvc = $_POST['cvc'];
                $data_przyjazdu = $_POST['data_przyjazdu'];
                $data_odjazdu = $_POST['data_odjazdu'];

                echo "<p><strong>Ilość osób:</strong> $ilosc_osob</p>";
                echo "<p><strong>Imię:</strong> $imie</p>";
                echo "<p><strong>Nazwisko:</strong> $nazwisko</p>";
                echo "<p><strong>Adres:</strong> $adres</p>";
                echo "<p><strong>Numer karty:</strong> $numer_karty</p>";
                echo "<p><strong>Data ważności karty:</strong> $data_waznosci</p>";
                echo "<p><strong>CVC karty:</strong> $cvc</p>";
                echo "<p><strong>Data przyjazdu:</strong> $data_przyjazdu</p>";
                echo "<p><strong>Data odjazdu:</strong> $data_odjazdu</p>";
        }
        ?>
    </div> 
</body>
</html>
