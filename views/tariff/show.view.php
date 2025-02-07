<?php
require basePath('views/partials/head.php');
require basePath('views/partials/header.php');
?>

<div class="table-responsive small container px-5">
    <table class="table table-sm text-center">
        <thead>
            <tr>
                <th scope="col">Prestation</th>
                <th scope="col">Category</th>
                <th scope="col">Price</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tariffs as $tariff): ?>
                <tr class="table-<?= $colors[$tariff['prestation']] ?>">
                    <td><?= $tariff['prestation'] ?></td>
                    <td><?= $tariff['category'] ?></td>
                    <td><?= $tariff['price'] ?>€</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php
require basePath('views/partials/footer.php');
require basePath('views/partials/foot.php');
?>