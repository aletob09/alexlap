<?php
/**
 * Created by PhpStorm.
 * User: kase
 * Date: 01.03.2019
 * Time: 12:06
 */
echo '<h2>Startseite</h2>';
/* Ausgabe, geben Sie alle Tabellen der DB schule in einer HTML-Tabelle aus */

try
{
    $query = 'select ho_name, un_name, un_age, ge_name from unit
    inner join house using (ho_id)
    inner join gender using (ge_id);';
    $tabellen = $con->prepare($query);
    $tabellen->execute();
    echo '<table>';

    while ($row = $tabellen->fetch(PDO::FETCH_NUM))
    {
        echo '<tr>';
        foreach ($row as $r)
        {
            echo '<td>'.$r.'</td>';
        }
        echo '</tr>';
    }
    echo '</table>';
}
catch (Exception $e)
{

}


?>
