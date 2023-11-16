<?php
$query = "SELECT * FROM gebruikers";

$result = mysqli_query($conn, $query);


if (isset($_POST["Delete"])) {
  $id = $_POST['id'];
  $query = $conn->prepare("DELETE FROM gebruikers WHERE id = '$id'");
  $query->execute();
  header("Refresh:0");
}

?>
<div class="container">
<h1> Gebruikers </h1>
  <?php
  if ($_SESSION['level'] >= 3) {
    echo " <a href='?pagina=gebruikerToevoegen' class='btn btn-success mb-4 mt-4'> Gebruiker Toevoegen </a>";
  }
  ?>
  <table class="table table_boten table-striped">
    <thead class="header_boten">
      <tr class="header_row_boten text-center">
        <th>voornaam</th>
        <th>achternaam</th>
        <th>Telefoonnummer</th>
        <th>Email</th>
        <th>Straatnaam</th>
        <th>Huisnummer</th>
        <th>Postcode</th>
        <th>Opmerking</th>
        <th>Niveau</th>
        <?php
        if ($_SESSION['level'] == 4) {
          ?>
          <th>Level</th>
          <?php
        }
        ?>
        <th>Extra Knoppen</th>
      </tr>
    </thead>
    <tbody class="body_boten text-center">
      <?php
      if (mysqli_num_rows($result) > 0) {
        foreach ($result as $data) {
          ?>
          <tr>
            <td>
              <?= $data['voornaam'] ?>
            </td>
            <td>
              <?= $data['achternaam'] ?>
            </td>
            <td>
              <?= $data['telnr'] ?>
            </td>
            <td>
              <?= $data['email'] ?>
            </td>
            <td>
              <?= $data['straatnaam'] ?>
            </td>
            <td>
              <?= $data['huisnr'] ?>
            </td>
            <td>
              <?= $data['postcode'] ?>
            </td>
            <td>
              <?= $data['opmerking'] ?>
            </td>
            <td>
              <?= str_replace(['1', '2', '3'], ['Beginner', 'Gevorderd', 'Expert'], $data['niveau']); ?>
            </td>
            <td>
              <?= str_replace(['1', '2', '3', '4'], ['Cursist', 'Instructeur', 'Admin', 'Eigenaar'], $data['level']); ?>
            </td>
              <td>
                <a href="?pagina=gebruikerAanpassen&id=<?= $data['id'] ?>" class="pencil btn btn-warning mb-1"><i class="fa-solid fa-pencil"></i></a>
                <a href="?pagina=gebruikerVerwijderen&id=<?= $data['id'] ?>" class="pencil btn btn-danger"><i class="fa-solid fa-trash-can"></i></a>
              </td>
          </tr>
          <?php
        }
      } else
        echo "Fout bij het uitvoeren van de query: " . mysqli_error($conn);
      ?>
    </tbody>
  </table>
</div>