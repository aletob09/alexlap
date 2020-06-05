<?php
/**
 * Created by PhpStorm.
 * User: kase
 * Date: 01.03.2019
 * Time: 11:04
 */
?>
<!-- Verbindung zu DB -->
<?php
include('config.php');

    if(isset($_POST['save'])) {
        // Daten in DB speichern
        try
        {
            $street = $_POST['street'];
            echo '<span>Folgende Daten werden gespeichert: ' . $street. '<span><br>';

            $query = 'insert into strasse (str_name) values (?)';
            $insertStreet = $con->prepare($query);
            $insertStreet->execute([$street]);
        }
        catch (Exception $e)
        {
            if($e->getCode() == 23000)
            {
                echo '<h3>Die Strasse '.$street.' wurde bereits erfasst!</h3>';
            }
            else
            {
                echo $e->getMessage();
            }
        }
    }
    else
    {
        ?>

        <h3>Strassen erfassen</h3>
        <form method="post">

            <div class="table">

                <div class="tr">
                    <div class="th">
                        <label for="st"">Strassennamen:</label>
                    </div>
                    <div class="td">
                        <input id="st" type="text" name="street" placeholder="z.B. Wiener Strasse" required>
                    </div>
                </div>
                <div>
                    <input type="submit" name="save" value="speichern">
                </div>
        </form>

        <?php
    }
?>
