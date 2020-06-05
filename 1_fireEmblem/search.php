<?php

echo "<h3>Suche nach Schülern</h3>";

if(isset($_POST["search"]))
{
  $suche = $_POST["search"];
  $name = $_POST["name"];

  $suche = "%".$name."%";

  try {
    $query = 'select ho_name, un_name, un_age, ge_name from unit
    inner join house using (ho_id)
    inner join gender using (ge_id)
    where un_name like ?;';
    $select = $con->prepare($query);
    $select->execute([$suche]);

    echo '<form>';
    echo '<table>';
      echo '<tr>';
        echo '<th>House</th>';
        echo '<th>Name</th>';
        echo '<th>Age</th>';
        echo '<th>Gender</th>';
      echo '</tr>';
    while ($row = $select->fetch(PDO::FETCH_NUM))
    {
        echo '<tr>';
          echo '<td>'.$row[0].'</td>';
          echo '<td>'.$row[1].'</td>';
          echo '<td>'.$row[2].'</td>';
          echo '<td>'.$row[3].'</td>';
        echo '</tr>';
    }
    echo '</table>';
    echo '</form>';

  } catch (Exception $e) {
    $e->getMessage();
  }

}else {
?>
  <form method="post">
    <label for="name">Name:</label>
    <input type="text" name="name" id="nn" placeholder="Schüler suchen">
    <input type="submit" name="search" value="Suche starten">
  </form>

<?php
}
?>
