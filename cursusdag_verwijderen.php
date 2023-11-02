<?php
    $result = mysqli_query($conn, "SELECT * FROM cursusdagen WHERE id =" . $_GET['id']);
    $result->fetch_assoc();

    foreach ($result as $row) {
?>

<body>
    <div class="container ">
        <h1>
            Weet u zeker dat u deze cursusdagen wilt verwijderen?
        </h1>
        <form method="post">
            <input type="submit" name="verwijderen" id="verwijderen" class="btn btn-danger" value="Verwijderen">
    </form>
    </div>
</body>

<?php
    }

    if (isset($_POST['verwijderen'])){
        mysqli_query($conn, "DELETE FROM `cursusdagen` WHERE id =" . $_GET['id']);
        header("location: ?pagina=beheren_cursus_dagen");
    };
?>