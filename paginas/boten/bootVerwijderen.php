<?php
    $result = mysqli_query($conn, "SELECT * FROM boten WHERE id =" . $_GET['id']);
    $result->fetch_assoc();

    foreach ($result as $row) {
?>

<body>
    <div class="container ">
        <h1>
            Weet u zeker dat u <strong> <?= $row['naam']; ?> </strong> Wilt verwijderen?
        </h1>
        <form method="post">
            <input type="submit" name="verwijderen" id="verwijderen" class="btn btn-danger" value="Verwijderen">
            <a href="?pagina=boten" class="btn btn-secondary"> Annuleren</a>
    </form>
    </div>
</body>

<?php
    }

    if (isset($_POST['verwijderen'])){
        mysqli_query($conn, "DELETE FROM `boten` WHERE id =" . $_GET['id']);
        header("location: ?pagina=boten");
    };
?>
