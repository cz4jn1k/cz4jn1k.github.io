<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>STRONA 23 LISTOPADA</title>
    <style>
    body{background-color: lightblue;}
    table,td,tr,th{border-style: solid; border-color: green; border-collapse: collapse;border-spacing: 5px;}
    td{padding: 7px; text-align: center;}
    </style>
</head>
<body>
    <table>
        <tr>
            <th>Typ samolotu</th>
            <th>Linia</th>
            <th>Numer rejsu</th>
            <th>Kierunek</th>
            <th>Dzień</th>
            <th>Czas</th>
        </tr>
    <?php
    $connect = mysqli_connect("localhost", "root", "", "test");
    $query = "SELECT samoloty.typ, samoloty.linie, `nr_rejsu`, `kierunek`, `czas`, `dzien` FROM `przyloty`, `samoloty` WHERE samoloty.id = przyloty.samoloty_id";
    $wynik = mysqli_query($connect, $query);
    while($rekord=mysqli_fetch_array($wynik)){
        echo "<tr>  
        <td>$rekord[0]</td>
        <td>$rekord[1]</td>
        <td>$rekord[2]</td>
        <td>$rekord[3]</td>
        <td>$rekord[4]</td>
        <td>$rekord[5]</td>
        </tr>";
        }
    echo "</table>";
    $query2 = "SELECT `nazwaPliku`, `podpis` FROM `zdjecia`";
    $wynik = mysqli_query($connect, $query2);
    while($rekord = mysqli_fetch_array($wynik)){
        echo "<img src=$rekord[0] alt=$rekord[1] title = $rekord[1]>";
    }


    $query3 = "SELECT `nazwa`, `cena` FROM `uslugi`";
    $wynik = mysqli_query($connect, $query3);
    while($rekord = mysqli_fetch_array($wynik)){
        echo "
        <ul>
        <li>$rekord[0], $rekord[1] zł</li>
        </ul>";
    }
    mysqli_close($connect);
    ?>
    <form action="" method="post">
    <input type="number" length="200" name="cena" id="" value="" placeholder="Wybierz maksymalną cenę">
    <button type="submit">Zatwierdź</button>    
    </form>
    
    <?php
    $connect = mysqli_connect("localhost", "root", "", "test");
    $query4 = "SELECT `nazwa`, `cena` FROM `uslugi`";
    $wynik = mysqli_query($connect, $query4);
    if(isset($_POST['cena'])){
    $wybrana = $_POST['cena'];
    $query4 = "SELECT `cena` FROM `uslugi` WHERE `cena` <= '$wybrana'";
    $wynik = mysqli_query($connect, $query4);
    while($rekord = mysqli_fetch_array($wynik))
    echo "<p>$rekord[0]</p>";
    }
    mysqli_close($connect);
    ?>
    </body>
    
</html>
