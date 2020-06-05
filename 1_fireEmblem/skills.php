<?php

echo "<h3>Fähigkeiten</h3>";

if(isset($_POST["selected"]))
{
  $unit = $_POST["unit"];
}else {
  $unit = "Unit";
}


?>
  <form method="post">
    <label for="name">Name:</label>
    <select class="" name="unit">
      <?php
      try {
        $query = 'select un_name from unit;';
        $select = $con->prepare($query);
        $select->execute();
        while ($row = $select->fetch(PDO::FETCH_NUM))
        {
            echo '<option value="'.$row[0].'" '.(($row[0]==$unit)?'selected="selected"':"").'>'.$row[0].'</option>';
        }
      } catch (Exception $e) {
        $e->getMessage();
      }
      ?>
    </select>
    <input type="submit" name="selected" value="select">
  </form>
<?php


if(isset($_POST["selected"]))
{
  //$unit = $_POST["unit"];
  echo "<h4>".$unit."</h4>";

  try {
    $query1 = 'select sk_name, ra_id from unit_has_skills
    inner join skills using (sk_id)
    inner join unit using (un_id)
    where un_name = "'.$unit.'";';
    $select1 = $con->prepare($query1);
    $select1->execute();

    echo '<form>';
      echo '<table>';
        echo '<tr>';
          echo '<th>Skill</th>';
          echo '<th>Rank</th>';
        echo '</tr>';
        while ($row = $select1->fetch(PDO::FETCH_NUM))
        {
          echo '<tr>';
            echo '<td>'.$row[0].'</td>';
            echo '<td>'.$row[1].'</td>';
          echo '</tr>';
        }
      echo '</table>';
    echo '</form>';



    } catch (Exception $e) {
      $e->getMessage();
    }

}else {
?>


<?php
}
?>
