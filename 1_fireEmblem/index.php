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
    <title>Fire Emblem</title>
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
            case 'search':
                include ('search.php');
                break;
            case 'skills':
                include ('skills.php');
                break;
            case 'addUnit':
                include ('addUnit.php');
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
