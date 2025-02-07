<?php
require basePath('views/partials/head.php');
require basePath('views/partials/header.php');
?>

<div class="table-responsive small container px-5">
    <div class="row ps-5">
        <div class="col-10"></div>
        <a href="/admin/tariff/create" class="col-auto ms-4">
            <button type="button" class="btn btn-primary">Add New Tariff</button>
        </a>
    </div>

    <table class="table table-sm text-center align-middle">
        <thead>
            <tr>
                <th scope="col">Prestation</th>
                <th scope="col">Category</th>
                <th scope="col">Price</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tariffs as $tariff): ?>
                <form action="/admin/tariff/edit" method="GET">
                    <input type="hidden" name="prestation_id" value="<?= $tariff['prestation_id'] ?>">
                    <input type="hidden" name="category_id" value="<?= $tariff['category_id'] ?>">
                    <tr class="table-<?= $colors[$tariff['prestation']] ?>">
                        <td><?= $tariff['prestation'] ?></td>
                        <td><?= $tariff['category'] ?></td>
                        <td><?= $tariff['price'] ?>€</td>
                        <td><button type="submit" class="btn btn-primary btn-sm">Edit</button></td>
                    </tr>
                </form>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php
require basePath('views/partials/footer.php');
require basePath('views/partials/foot.php');
?>