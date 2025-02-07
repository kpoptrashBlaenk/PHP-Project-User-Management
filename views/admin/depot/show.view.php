<?php
require basePath('views/partials/head.php');
require basePath('views/partials/header.php');
?>

<div class="table-responsive small container px-5">
    <div class="row ps-5">
        <div class="col-10"></div>
        <a href="/admin/depot/create" class="col-auto ms-4">
            <button type="button" class="btn btn-primary">Add New Depot</button>
        </a>
    </div>

    <table class="table table-sm text-center align-middle">
        <thead>
            <tr>
                <th scope="col">Card</th>
                <th scope="col">Name</th>
                <th scope="col">Category</th>
                <th scope="col">Caution</th>
                <th scope="col">Card Date</th>
                <th scope="col">Depot Date</th>
                <th scope="col">Price</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($depots as $depot): ?>
                <form action="/admin/depot/edit" method="GET">
                    <input type="hidden" name="card_id" value="<?= $depot['card_id'] ?>">
                    <input type="hidden" name="depot_date" value="<?= $depot['depot_date'] ?>">
                    <tr class="table-<?= $colors[$depot['card_id']] ?>">
                        <td><?= $depot['card_id'] ?></td>
                        <td><?= $depot['name'] ?></td>
                        <td><?= $depot['category'] ?></td>
                        <td><?= $depot['caution'] ?>€</td>
                        <td><?= $depot['card_date'] ?></td>
                        <td><?= $depot['depot_date'] ?></td>
                        <td><?= $depot['price'] ?>€</td>
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