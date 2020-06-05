<?php
/**
 * Created by PhpStorm.
 * User: kase
 * Date: 01.03.2019
 * Time: 11:55
 * Startseite für DB schule Website
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>DB Schule</title>
    <meta charset="UTF-8">
    <link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<nav>
    <?php include('menu.html'); ?>
</nav>
<main>
    <?php include('config.php');
    if(isset($_GET['menu']))
    {
        switch ($_GET['menu'])
        {
            case 'start':
                include ('start.php');
                break;
            case 'perTab':
                include ('personen_tabelle.php');
                break;
            /* case 'adr':
                include ('addressen.php');
                break; */
            case 'perNeu':
                include ('personen_erfassen.php');
                break;
            case 'strNeu':
                include ('strassen.php');
                break;
            case 'adrPer':
                include ('adr_per.php');
                break;
            case 'suchPer':
                include ('suchePerson.php');
                break;
        }
    }
    else
    {
        include ('start.php');
    }
    ?>
</main>
</body>
</html>