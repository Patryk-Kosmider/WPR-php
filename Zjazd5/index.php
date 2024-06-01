<?php
$serwer = "localhost";
$uzytkownik = "root";
$haslo = "";
$baza_danych = "zad5php";

$conn = new mysqli($serwer, $uzytkownik, $haslo, $baza_danych);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$insert_sql = "INSERT INTO klient (imie, nazwisko) VALUES ('Jan', 'Kowalski'), ('Anna', 'Nowak'), ('Piotr', 'Wiśniewski')";
if ($conn->query($insert_sql) === TRUE) {
    echo "New records created successfully<br>";
} else {
    echo "Error: " . $insert_sql . "<br>" . $conn->error;
}

$select_sql = "SELECT * FROM klient";
$wynik = $conn->query($select_sql);

if ($wynik->num_rows > 0) {
    echo "Number of rows: " . $wynik->num_rows . "<br><br>";

    echo "Using mysqli_fetch_row:<br>";
    while ($row = mysqli_fetch_row($wynik)) {
        echo "ID: " . $row[0] . " - Imię: " . $row[1] . " - Nazwisko: " . $row[2] . "<br>";
    }
    echo "<br>";

    $wynik->data_seek(0);

    echo "Using mysqli_fetch_array:<br>";
    while ($row = mysqli_fetch_array($wynik, MYSQLI_ASSOC)) {
        echo "ID: " . $row['id'] . " - Imię: " . $row['imie'] . " - Nazwisko: " . $row['nazwisko'] . "<br>";
    }
} else {
    echo "0 results";
}

$conn->close();
?>
