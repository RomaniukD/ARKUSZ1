<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfigurator samochodów</title>
    <link rel="stylesheet" href="styl.css">
</head>

<body>
    <?php
    $conn = mysqli_connect('localhost', 'root', '', 'samochody')
    $query1 = "SELECT marka, model, cena FROM pojazdy WHERE marka = 'BM' ORDER BY cena ASC LIMIT 15"
    $query2 = "SELECT AVG(cena) as 'Średnia cena', MAX(cena) as 'Maksymalna cena' FROM pojazdy WHERE model='meta' "
    $query3 = "SELECT p.marka, p.model, p.cena, k.nazwa, k.doplata FROM pojazdy p JOIN kolory k on pojazdy.kolor = kolory.id WHERE model='alfa' "
    $query4 = "SELECT marka, model, cena FROM pojazdy ORDER BY RAND()"
    
    ?>
    <header>
        <h1>Serwis konfiguracji samochodów</h1>
    </header>
    <nav>
        <h2>Samochody</h2>
        <h2>Konfigurato</h2>
        <h2>Kontakt</h2>
    </nav>
    <main>
        <section id="left">
            <table>
                <?php
                $wynik = $connect -> query($query3);
               while ($wiersz = mysqli_fetch_assoc($wynik)) {
            echo "<tr>";
            echo "<td>{$wiersz[0]}</td>";
            echo "<td>{$wiersz[1]}</td>";
            echo "<td>{$wiersz[2]}</td>";
            echo "<td>{$wiersz[2] + $wiersz[4]}</td>";
            echo "</tr>";
        }

                    ?>
            </table>
        </section>

        <section id="middle">
            <table>

                <tr>
                    <th colspan="2">Konfiguracja</th>
                    <th>Cena</th>
                </tr>
                <tr>
                    <img src="a1.jpg" alt="Konfiguracja 1">
                </tr>
                <?php
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                   
                    <tr>
                      <img src="a2.jpg" alt="Konfiguracja 2">
                    </tr>
                     <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                 ?>
            </table>
        </section>

        <section id="right">
            <h3>111 222 444</h3>
            <img src="a3.png" alt="Samochód">
        </section>
    </main>

    <footer>Stronę wykonał: Romaniuk Denis</footer>
</body>

</html>