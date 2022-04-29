<?php if (isset($_SESSION['username'])){ ?>
<h1>Összes beküldött üzenet:</h1><br><br><br>

<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli("localhost", "root", "", "imami");

$query = "SELECT * FROM uzenetek ORDER BY id DESC";
$result = $mysqli->query($query);

?>
<table class="table">
  <thead>
    <tr>
        <th scope="col">Küldés ideje</th>
      <th scope="col">Vezetéknév</th>
      <th scope="col">Keresztnév</th>
      <th scope="col">Üzenet</th>
    </tr>
  </thead>
  <tbody>
<?php
while($row = mysqli_fetch_array($result)){
    echo "<tr><td>" . ($row['date']) . "</td><td>" . ($row['vezeteknev']) . "</td><td>" . ($row['keresztnev']) . "</td><td>" . ($row['uzenet']) . "</td></tr>";
    }
?>
</tbody>
</table>
<?php } else { echo "<h3 style='margin:20px;'>Megtekintéshez be kell jelentkezned!</h3>"; } ?>