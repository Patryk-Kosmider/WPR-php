<?php
session_start();

$poprawny_login = 'uzytkownik';
$poprawne_haslo = 'haslo';

$blad_logowania = '';

if (isset($_POST['zaloguj'])) {
    $login = isset($_POST['login']) ? $_POST['login'] : '';
    $haslo = isset($_POST['haslo']) ? $_POST['haslo'] : '';

    if ($login === $poprawny_login && $haslo === $poprawne_haslo) {
        $_SESSION['zalogowany'] = true;
        $_SESSION['login'] = $login;
    } else {
        $blad_logowania = "Nieprawidłowy login lub hasło.";
    }
}

// Wylogowanie
if (isset($_POST['wyloguj'])) {
    session_unset();
    session_destroy();
}

// Wyczyść ciasteczka
if (isset($_POST['wyczysc'])) {
    setcookie('ilosc_osob', '', time() - 3600);
    setcookie('imie', '', time() - 3600);
    setcookie('nazwisko', '', time() - 3600);
    setcookie('adres', '', time() - 3600);
    setcookie('numer_karty', '', time() - 3600);
    setcookie('data_waznosci', '', time() - 3600);
    setcookie('cvc', '', time() - 3600);
    setcookie('data_przyjazdu', '', time() - 3600);
    setcookie('data_odjazdu', '', time() - 3600);
}

// Zapisanie danych z formularza do ciasteczek
if (isset($_SESSION['zalogowany']) && isset($_POST['ilosc_osob'])) {
    setcookie('ilosc_osob', $_POST['ilosc_osob'], time() + 3600);
    setcookie('imie', isset($_POST['imie']) ? $_POST['imie'] : '', time() + 3600);
    setcookie('nazwisko', isset($_POST['nazwisko']) ? $_POST['nazwisko'] : '', time() + 3600);
    setcookie('adres', isset($_POST['adres']) ? $_POST['adres'] : '', time() + 3600);
    setcookie('numer_karty', isset($_POST['numer_karty']) ? $_POST['numer_karty'] : '', time() + 3600);
    setcookie('data_waznosci', isset($_POST['data_waznosci']) ? $_POST['data_waznosci'] : '', time() + 3600);
    setcookie('cvc', isset($_POST['cvc']) ? $_POST['cvc'] : '', time() + 3600);
    setcookie('data_przyjazdu', isset($_POST['data_przyjazdu']) ? $_POST['data_przyjazdu'] : '', time() + 3600);
    setcookie('data_odjazdu', isset($_POST['data_odjazdu']) ? $_POST['data_odjazdu'] : '', time() + 3600);
}
?>


<!DOCTYPE html>
<html lang="pl">
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

        .rezerwacja {
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
    <?php if (!isset($_SESSION['zalogowany'])): ?>
        <div class="login">
            <form method="post" action="">
                <input type="text" name="login" placeholder="Login"><br>
                <input type="password" name="haslo" placeholder="Hasło"><br>
                <button type="submit" name="zaloguj">Zaloguj się</button><br>
                <?php if (isset($blad_logowania)): ?>
                    <p style="color: red;"><?php echo $blad_logowania; ?></p>
                <?php endif; ?>
            </form>
        </div>
    <?php else: ?>
        <p>Witaj, <?php echo htmlspecialchars($_SESSION['login']); ?>!</p>
        <form method="post" action="">
            <label for="ilosc_osob">Ilość osób: </label><br>
            <select name="ilosc_osob" id="ilosc_osob">
                <option value="1" <?php echo (isset($_COOKIE['ilosc_osob']) && $_COOKIE['ilosc_osob'] == '1') ? 'selected' : ''; ?>>1</option>
                <option value="2" <?php echo (isset($_COOKIE['ilosc_osob']) && $_COOKIE['ilosc_osob'] == '2') ? 'selected' : ''; ?>>2</option>
                <option value="3" <?php echo (isset($_COOKIE['ilosc_osob']) && $_COOKIE['ilosc_osob'] == '3') ? 'selected' : ''; ?>>3</option>
                <option value="4" <?php echo (isset($_COOKIE['ilosc_osob']) && $_COOKIE['ilosc_osob'] == '4') ? 'selected' : ''; ?>>4</option>
            </select>
            <br>
            <input type="text" name="imie" id="imie" placeholder="Podaj imię" value="<?php echo isset($_COOKIE['imie']) ? htmlspecialchars($_COOKIE['imie']) : ''; ?>"><br>
            <input type="text" name="nazwisko" id="nazwisko" placeholder="Podaj nazwisko" value="<?php echo isset($_COOKIE['nazwisko']) ? htmlspecialchars($_COOKIE['nazwisko']) : ''; ?>"><br>
            <input type="text" name="adres" id="adres" placeholder="Podaj adres" value="<?php echo isset($_COOKIE['adres']) ? htmlspecialchars($_COOKIE['adres']) : ''; ?>"><br>
            <input type="text" name="numer_karty" id="numer_karty" maxlength="16" placeholder="Numer karty" pattern="[0-9]{16}" value="<?php echo isset($_COOKIE['numer_karty']) ? htmlspecialchars($_COOKIE['numer_karty']) : ''; ?>"><br>
            <input type="text" name="data_waznosci" id="data_waznosci" pattern="(0[1-9]|1[0-2])\/\d{2}" placeholder="Data ważności karty MM/YY" value="<?php echo isset($_COOKIE['data_waznosci']) ? htmlspecialchars($_COOKIE['data_waznosci']) : ''; ?>"><br>
            <input type="text" name="cvc" id="cvc" pattern="[0-9]{3}" placeholder="CVC karty (3 cyfry)" value="<?php echo isset($_COOKIE['cvc']) ? htmlspecialchars($_COOKIE['cvc']) : ''; ?>"><br>
            <label for="data_przyjazdu"> Data przyjazdu:</label><br>
            <input type="date" name="data_przyjazdu" id="data_przyjazdu" value="<?php echo isset($_COOKIE['data_przyjazdu']) ? $_COOKIE['data_przyjazdu'] : ''; ?>"><br>
            <label for="data_odjazdu"> Data odjazdu:</label><br>
            <input type="date" name="data_odjazdu" id="data_odjazdu" value="<?php echo isset($_COOKIE['data_odjazdu']) ? $_COOKIE['data_odjazdu'] : ''; ?>"><br>

            <button type="submit">Rezerwuj!</button><br>
        </form>
        <form method="post" action="">
            <button type="submit" name="wyczysc">Wyczyść formularz</button>
        </form>
        <form method="post" action="">
            <button type="submit" name="wyloguj">Wyloguj się</button>
        </form>

        <div class="rezerwacja">  
        <?php 
            if (isset($_SESSION['zalogowany']) && isset($_POST['ilosc_osob'])) {
                $ilosc_osob = $_POST['ilosc_osob'];
                $imie = isset($_POST['imie']) ? $_POST['imie'] : '';
                $nazwisko = isset($_POST['nazwisko']) ? $_POST['nazwisko'] : '';
                $adres = isset($_POST['adres']) ? $_POST['adres'] : '';
                $numer_karty = isset($_POST['numer_karty']) ? $_POST['numer_karty'] : '';
                $data_waznosci = isset($_POST['data_waznosci']) ? $_POST['data_waznosci'] : '';
                $cvc = isset($_POST['cvc']) ? $_POST['cvc'] : '';
                $data_przyjazdu = isset($_POST['data_przyjazdu']) ? $_POST['data_przyjazdu'] : '';
                $data_odjazdu = isset($_POST['data_odjazdu']) ? $_POST['data_odjazdu'] : '';

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
    <?php endif; ?>
</body>
</html>
