<?php
/**
 * Created by PhpStorm.
 * User: kase
 * Date: 11.03.2019
 * Time: 13:09
 * suchePerson.php
 */


echo '<h3>Suche nach Personen - Nachname </h3>';
/* Abfrage, ob Formular oder Ausgabe angezeigt werden soll */

if(isset($_POST['search']))
{
    // Ausgabe der Suche
    $suche = $_POST['search'];
    $nname = $_POST['nname'];
    $wort = $_POST['wort'];

    switch ($wort)
    {
        case 0:
            echo '<p>Suche im Wortverlauf</p>';
            $suche = '%'.$nname.'%';
            break;
        case 1:
            echo '<p>Suche am Wortanfang</p>';
            $suche = $nname.'%';
            break;
        case 2:
            echo '<p>Suche am Wortende</p>';
            $suche = '%'.$nname;
            break;
    }

    try
    {
        $query = 'select * from person where per_nname like ?';
        $select = $con->prepare($query);
        $select->execute([$suche]);

        echo '<p>Suchergebnisse für "'.$nname.'"</p>';
        echo '<p>Es wurden '.$select->rowCount().' Einträge gefunden!</p>';

        echo '<form>';
        while ($row = $select->fetch(PDO::FETCH_NUM))
        {
            foreach ($row as $r)
            {
                echo '<input type="radio" name="wort" value=".$r.">';
            }
            echo '<br>';
        }
        echo '</form>';
    }
    catch (Exception $exception)
    {
        $exception->getMessage();
    }
}
else
{
    // Formular für die Suche:
?>
    <form method="post">
        <label for="nn">Nachname:</label>
        <!-- Formular ändern
             Auswahl:
             - Suche im Wortverlauf
             - Suche as Wortanfang
             - Suche as Wortende
        -->
        <input type="text" name="nname" id="nn" placeholder="Wort suchen">
        <br>
        <input type="radio" name="wort" value="0" checked>Wortverlauf<br>
        <input type="radio" name="wort" value="1">Wortanfang<br>
        <input type="radio" name="wort" value="2">Wortende<br>
        <br>
        <input type="submit" name="search" value="Suche starten">
    </form>
<?php
}
?>






