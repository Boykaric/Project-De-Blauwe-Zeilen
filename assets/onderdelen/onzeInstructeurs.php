<h1 class="homepage-title">Onze Instructeurs</h1>

<?php
$result = mysqli_query($conn, "SELECT * FROM gebruikers WHERE level = 2");
$result->fetch_assoc();
$x = 0;
foreach ($result as $row) {
    if ($x == 0) {
        echo '<div class="row">
            <div class="col-4">
                <div class="card">
                <img class="card-img-top" src="https://dummyimage.com/200x200" alt="Title">
                    <div class="card-body">
                    
                        <h3 class="card-title">' . $row['voornaam'] . ' ' . $row['achternaam'] . '</h3>
                        <p class="card-text">' . $row['opmerking'] . '</p>
                    </div>
                </div>
            </div>';
    }
    if ($x == 1) {
        echo '<div class="col-4">
                <div class="card">
                <img class="card-img-top" src="https://dummyimage.com/200x200" alt="Title">
                    <div class="card-body">
                        <h3 class="card-title">' . $row['voornaam'] . ' ' . $row['achternaam'] . '</h3>
                        <p class="card-text">' . $row['opmerking'] . '</p>
                    </div>
                </div>
            </div>';
    }
    if ($x == 2) {
        echo '<div class="col-4">
                <div class="card">
                <img class="card-img-top" src="https://dummyimage.com/200x200" alt="Title">
                    <div class="card-body">
                        <h3 class="card-title">' . $row['voornaam'] . ' ' . $row['achternaam'] . '</h3>
                        <p class="card-text">' . $row['opmerking'] . '</p>
                    </div>
            </div>
        </div>
    </div>';
        $x = 0;
    }
    $x++;
}
?>