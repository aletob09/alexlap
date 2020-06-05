<?php
/**
 * Created by PhpStorm.
 * User: kase
 * Date: 11.03.2019
 * Time: 15:20
 * function.php
 */

/**
 * makeStatement: für ein beliebiges Query mit null oder mehreren Parametern
 */

function makeStatement($con, $query, $bindArray = null)
{
    $stmt = $con->prepare($query);
    // falls bindArray dann bindParam ausführen

    if ($bindArray != null) {
        $countBindParm = sizeof($bindArray); // "wie viele ? gibt es"
        for ($i = 0; $i < $countBindParm; $i++)
        {
            $stmt->bindParam($i + 1, $bindArray[$i]);
        }
    }
    $stmt->execute();
    return $stmt;
}

function makeHtmlTable($stmt)
{
    $columnCount = $stmt->columnCount();

    if (columnCount() > 0)
    {
        $meta = array();

        echo '<table><tr>';

        for ($i = 0; $i < $columnCount; $i++)
        {
            $columnCount = $stmt->getColumnMeta($i);
        }
        echo '</tr>';

        while ($row = $stmt->fetch(PDO::FETCH_NUM))
        {
            echo '<tr>';
            foreach ($row as $r)
            {
                echo '<td>' . $r . '</td>';
            }
            echo '</tr>';
        }
    }
    else
    {
        echo '<p>Es sind keine DS zur Ausgabe vorhanden</p>';
    }
}