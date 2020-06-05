<?php
/**
 * Created by PhpStorm.
 * User: kase
 * Date: 01.03.2019
 * Time: 12:38
 */

include('config.php');

try
{
    /* Personen eine Strasse und Hausnummer zuordnen */
    /* 1. Formular erstellen */
    /* Datensatz speichern */

    echo '<h3>Personen, Strasse und Hausnummer festlegen</h3>';
}
catch (Exception $e)
{
    $e->getMessage();
}
?>

<!DOCTYPE html>
    <html lang="en" xmlns="http://www.w3.org/1999/html">
    <head>
        <meta charset="UTF-8">
        <title>Formular</title>
    </head>
<body>
<nav>
    <!-- TODO: Menü -->
</nav>
    <main>
        <form action="output.php" method="post">

            <label for="p">Personen:</label>
            <select name="personen" id="p">
                <?php
                    $query = "select * from person";
                    $personStatement = $con->prepare($query);
                    $personStatement->execute();

                    while ($row = $personStatement->fetch(PDO::FETCH_NUM))
                    {
                        echo '<option value="'.$row[0].'">'.$row[1].' '.$row[2].'</option>';
                    }
                ?>
            </select>
            <br>
            <label for="s">Strassen:</label>
            <select name="strassen" id="s">
                <?php
                $query = "select * from strasse";
                $streetStatement = $con->prepare($query);
                $streetStatement->execute();

                while ($row = $streetStatement->fetch(PDO::FETCH_NUM))
                {
                    echo '<option value="'.$row[0].'">'.$row[1].'</option>';
                }
                ?>
            </select>
            <br>
            <label for="vn">Hausnummer:</label>
            <input type="number" min="1" id="hn" name="hnum"
                   placeholder="z.B.: 12, 32, 42..." required>
            <br><br>

            <input type="submit" name="show" value="Daten bestätigen!">
        </form>
    </main>
</body>
</html>
