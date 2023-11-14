<h1 class="homepage-title">Onze Boten</h1>

<?php
$result = mysqli_query($conn, "SELECT * FROM Boten");
$result->fetch_assoc();
$i = 0;
foreach ($result as $row) {

    ?>
    <div class="accordion accordion-flush" id="accordionFlush<?=$i?>">
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-heading1">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#flush-collapse<?= $i ?>" aria-expanded="true" aria-controls="flush-collapse<?= $i ?>">
                    <?= ucfirst($row['naam']) ?>
                </button>
            </h2>
            <div id="flush-collapse<?= $i ?>" class="accordion-collapse collapse" aria-labelledby="flush-heading<?= $i ?>"
                data-bs-parent="#accordionFlush<?=$i?>">
                <div class="accordion-body">
                    <ul class=''>
                        <li><p>Minimum Passagiers: <?= $row['minpassagiers'] ?></p></li>
                        <li><p>Maximum Passagiers: <?= $row['maxpassagiers'] ?></p></li>
                        <li><p>Grootte: <?= $row['grootte'] ?></p></li>
                        <li><p>Niveau: <?= $row['niveau'] ?></p></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <?php
    $i++;
}
?>