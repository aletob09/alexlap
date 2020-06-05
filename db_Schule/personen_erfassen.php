<?php
/* Created by PhpStorm. */
?>



    <?php
    include('config.php');

    /*zuerst prüfen ob sperichern Button gedrückt wurde
    Nein, Formular ... ja, speichervorgang in db
    */

    if(isset($_POST['save'])){
        try{
            $vname = $_POST['vname'];
            $nname = $_POST['nname'];
            $geb = $_POST['geb'];
            echo '<span>Folgende Daten wurden gespeichert: ' .$vname. ' ' .$nname. ', ' .$geb. '</span><br>';



            $query = 'insert into person (per_vname, per_nname, per_geburt) values(?, ?, ?)';
            $insertPerson = $con->prepare($query);

            echo '<p>Die Person mit der ID' .$con->lastInsertId(). ' gespeichert.</p>';

            /*
            $InsertPerson->bindParam(1, $vname);
            $insertPerson->bindParam(2, $nname);
            $insertPerson->bindParam(3, $geb);
            $insertPerson->execute();
            ODER
            */

            $insertPerson->execute([$vname, $nname, $geb]);



        }
        catch (Exception $e) {
            $e->getMessage();
        }
    }else{
        ?>
        <h3>Personendaten erfassen</h3>
        <form method="post">
            <div class="table">
                <div class="tr">
                    <div class="th">
                        <label>Vorname:</label>
                    </div>
                    <div class="td">
                        <input id="vn" type="text" name="vname" placeholder="Max" required>
                    </div>
                </div>

                <div class="tr">
                    <div class="th">
                        <label>Nachname:</label>
                    </div>
                    <div class="td">
                        <input id="nn" type="text" name="nname" placeholder="Mustermann" required>
                    </div>
                </div>

                <div class="tr">
                    <div class="th">
                        <label>Geburtsdatum:</label>
                    </div>
                    <div class="td">
                        <input id="gd" type="date" name="geb"  required>
                    </div>
                </div>
                <div>
                    <input type="submit" name="save" value="speichern">
                </div>
            </div>
        </form>
        <?php
    }
?>

