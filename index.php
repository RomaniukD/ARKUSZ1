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
    $conn = mysqli_connect('localhost', 'root', '', 'samochody');
    $query1 = "SELECT marka, model, cena FROM pojazdy WHERE marka = 'BM' ORDER BY cena ASC LIMIT 15";
    $query2 = "SELECT AVG(cena) as 'Średnia cena', MAX(cena) as 'Maksymalna cena' FROM pojazdy WHERE model='meta' ";
    $query3 = "SELECT p.marka, p.model, p.cena, k.nazwa, k.doplata 
           FROM pojazdy p 
           JOIN kolory k ON p.kolor = k.id 
           WHERE p.model = 'alfa'";

    $query4 = "SELECT marka, model, cena FROM pojazdy ORDER BY RAND() LIMIT 2;";

    ?>
    <header>
        <h1>Serwis konfiguracji samochodów</h1>
    </header>
    <nav>
        <h2>Samochody</h2>
        <h2>Konfigurator</h2>
        <h2>Kontakt</h2>
    </nav>
    <main>
        <section id="left">
            <table>
                <?php
                $wynik = $conn->query($query3);
                while ($wiersz = mysqli_fetch_assoc($wynik)) {
                    echo "<tr>";
                    echo "<td>{$wiersz['marka']}</td>";
                    echo "<td>{$wiersz['model']}</td>";
                    echo "<td>{$wiersz['nazwa']}</td>";
                    echo "<td>" . ($wiersz['cena'] + $wiersz['doplata']) . "</td>";
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
                    <td colspan="3"><img src="a1.jpg" alt="Konfiguracja 1"></td>
                </tr>

                <?php
                $query4 = "SELECT marka, model, cena FROM pojazdy ORDER BY RAND() LIMIT 2;";

                $wynik = $conn->query($query4);
                $auto1 = mysqli_fetch_assoc($wynik);
                if ($auto1) {
                    echo "<tr>";
                    echo "<td>Marka</td><td>{$auto1['marka']}</td>";
                    echo "<td rowspan='2'>{$auto1['cena']}</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>Model</td><td>{$auto1['model']}</td>"; // Poprawione z marka na model
                    echo "</tr>";
                }
                ?>

                <tr>
                    <td colspan="3"><img src="a2.jpg" alt="Konfiguracja 2"></td>
                </tr>

                <?php
                $auto2 = mysqli_fetch_assoc($wynik);
                if ($auto2) {
                    echo "<tr>";
                    echo "<td>Marka</td><td>{$auto2['marka']}</td>";
                    echo "<td rowspan='2'>{$auto2['cena']}</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>Model</td><td>{$auto2['model']}</td>";
                    echo "</tr>";
                }
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
