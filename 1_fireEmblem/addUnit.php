<?php

echo "<h3>Fähigkeiten</h3>";

if(isset($_POST["save"]))
{
  $house = $_POST['house'];
  $name = $_POST['name'];
  $age = $_POST['age'];
  $gender = $_POST['gender'];

  try {
    
    $query = 'insert into unit (ho_id, un_name, un_age, ge_id) values(?, ?, ?, ?)';
    $insertPerson = $con->prepare($query);

    echo '<p>Der/Die neu Schüler/in wurde gespeichert</p>';

    $insertPerson->execute([$house, $name, $age, $gender]);

    } catch (Exception $e) {
      $e->getMessage();
    }

}else {
?>

<h3>Schüler erfassen</h3>
<form method="post">
    <div class="table">
      <div class="tr">
          <div class="th">
              <label>House:</label>
          </div>
          <div class="td">
            <select id="g" name="house" required>
            <option value="1">Golden Deer</option>
            <option value="2">Blue Lions</option>
            <option value="3">Black Eagles</option>
            </select>
          </div>
      </div>

      <div class="tr">
          <div class="th">
              <label>Vorname:</label>
          </div>
          <div class="td">
              <input id="n" type="text" name="name" required>
          </div>
      </div>
      <div class="tr">
          <div class="th">
              <label>Age:</label>
          </div>
          <div class="td">
              <input id="a" type="number" name="age" required>
          </div>
      </div>
      <div class="tr">
          <div class="th">
              <label>Gender:</label>
          </div>
          <div class="td">
              <select id="g" name="gender" required>
              <option value="1">Male</option>
              <option value="2">Female</option>
              </select>
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
