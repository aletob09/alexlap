<?php
/* Created by PhpStorm. */
?>


    <!-- Verbindung zu DB -->
    <?php
    include('config.php');

    $query = 'select * from person';

    try
    {
        /* 1. prepare-Statement ist Abfrage möglich? */
        $stmtPerson = $con->prepare($query);
        $stmtPerson->execute();
        echo '<table>';

        while ($row = $stmtPerson->fetch())
        {
            echo '<tr>
                    <td>'.$row[0].'</td>
                    <td>'.$row[1].'</td>
                    <td>'.$row[2].'</td>
                  </tr>';
        }
        echo '</table>';
        echo '<h3>Sortierte Personentabelle</h3>';
        /* Personentabelle sortiert nach Nachnamen ausgeben */
        $queryAsc = 'select * from person order by per_nname';
        $stmtPAcs = $con->prepare($queryAsc);
        $stmtPAcs->execute();
        /* AUFGABE:
            1.= CSS-Datei. Tabellen mit Rahmen ausgeben
            2.) Die Spaltenüberschrift sollen "dymisch" sein,
            d. h. nicht händisch eintragen, Tipp: z.B. mit getColmnMeta
        */
        echo '<table>';


        while ($row = $stmtPAcs->fetch(PDO::FETCH_NUM))
        {
            echo '<tr>';

            foreach ($row as $r)
            {
                echo '<td>'.$r.'</td>';
            }
            echo '<tr>';
        }
        echo '</tr>';
    }
    catch (Exception $e)
    {
        $e->getMessage();
    }
    ?>

