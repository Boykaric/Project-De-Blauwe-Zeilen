<div class="container">
<?php
if ($_SESSION['level'] >= 3) {
  echo " <a href='?pagina=gebruikerToevoegen' class='btn btn-success mb-4 mt-4'> Gebruiker Toevoegen </a>";
}
$query = "SELECT * FROM gebruikers";

$result = mysqli_query($conn, $query);


if (isset($_POST["Delete"])) {
  $id = $_POST['id'];
  $query = $conn->prepare("DELETE FROM gebruikers WHERE id = '$id'");
  $query->execute();
  header("Refresh:0");
}

?>
<table class="table table-light">
  <thead class="table-dark">
    <tr>
      <th scope="col">voornaam</th>
      <th scope="col">achternaam</th>
      <th scope="col">Telefoonnummer</th>
      <th scope="col">Email</th>
      <th scope="col">Straatnaam</th>
      <th scope="col">Huisnummer</th>
      <th scope="col">Postcode</th>
      <th scope="col">Opmerking</th>
      <th scope="col">Niveau</th>
      <?php
      if ($_SESSION['level'] == 4) {
      ?>
        <th scope="col">Level</th>
      <?php
      }
      ?>
      <th scope="col">Buttons</th>
    </tr>
  </thead>
  <tbody>
    <?php
    if (mysqli_num_rows($result) > 0) {
      foreach ($result as $data) {
    ?>
        <tr>
          <td><?= $data['voornaam'] ?></td>
          <td><?= $data['achternaam'] ?></td>
          <td><?= $data['telnr'] ?></td>
          <td><?= $data['email'] ?></td>
          <td><?= $data['straatnaam'] ?></td>
          <td><?= $data['huisnr'] ?></td>
          <td><?= $data['postcode'] ?></td>
          <td><?= $data['opmerking'] ?></td>
          <td> <?= str_replace(['1', '2', '3'], ['Beginner', 'Gevorderd', 'Expert'], $data['niveau']); ?></td>
          <td> <?= str_replace(['1', '2', '3', '4'], ['Cursist', 'Instructeur', 'Admin', 'Eigenaar'], $data['level']); ?></td>
          <form action="" method="post">
            <td><a href="?pagina=gebruikerAanpassen&id=<?= $data['id'] ?>" class="pencil btn btn-primary"> <i class="fa-solid fa-pencil"></i> </a>
              <input type="hidden" name="id" value="<?= $data['id'] ?>">
              <button type="submit" name="Delete" class="btn btn-danger"> <i class="fa-solid fa-trash-can"></i> </button>
          </form>
          </td>
        </tr>
    <?php
      }
    } else  echo "Fout bij het uitvoeren van de query: " . mysqli_error($conn);
    ?>
  </tbody>
</table>
</div>