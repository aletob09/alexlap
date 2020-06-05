<!DOCTYPE html>
<head>
    <title>Formulardaten ausgeben</title>
    <meta charset="utf-8"
</head>
<body>
<nav>
    <?php include('menu.html'); ?>
</nav>
<main>
    <?php
    echo '<h2>Daten</h2>';

    if(isset($_POST['show']))
    {
        include "config.php";

        echo 'Personen = ' . $_POST['personen'].'<br>';
        echo 'Strassen = ' . $_POST['strassen'].'<br>';
        echo 'Hausnummer = ' . $_POST['hnum'].'<br>';

        $query = "insert into person_strasse (per_id, str_id, pest_nr) VALUES (?, ?, ?)";
        $streetStatement = $con->prepare($query);
        $streetStatement->execute([$_POST['personen'], $_POST['strassen'], $_POST['hnum']]);
    }
    ?>
</main>
</body>
