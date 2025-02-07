<?php
require basePath('views/partials/head.php');
require basePath('views/partials/header.php');
?>

<div class="table-responsive small container px-5">
    <div class="row ps-5">
        <div class="col-10"></div>
        <a href="/admin/card/create" class="col-auto ms-4">
            <button type="button" class="btn btn-primary">Add New Card</button>
        </a>
    </div>

    <table class="table table-sm text-center align-middle">
        <thead>
            <tr>
                <th scope="col">Card</th>
                <th scope="col">Name</th>
                <th scope="col">Category</th>
                <th scope="col">Caution</th>
                <th scope="col">Date</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cards as $card): ?>
                <form action="/admin/category/edit" method="GET">
                    <input type="hidden" name="card_id" value="<?= $card['card_id'] ?>">
                    <tr class="table-<?= $colors[$card['card_id']] ?>">
                        <td><?= $card['card_id'] ?></td>
                        <td><?= $card['name'] ?></td>
                        <td><?= $card['category'] ?></td>
                        <td><?= $card['caution'] ?>€</td>
                        <td><?= $card['date'] ?></td>
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