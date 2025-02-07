<?php
require basePath('views/partials/head.php');
require basePath('views/partials/header.php');
?>

<div class="table-responsive small container px-5">
    <div class="row ps-5">
        <div class="col-10"></div>
        <a href="/admin/prestation/create" class="col-auto ms-3">
            <button type="button" class="btn btn-primary">Add New Prestation</button>
        </a>
    </div>

    <table class="table table-sm text-center align-middle">
        <thead>
            <tr>
                <th scope="col">Prestation</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($prestations as $prestation): ?>
                <form action="/admin/prestation/edit" method="GET">
                    <input type="hidden" name="prestation_id" value="<?= $prestation['prestation_id'] ?>">
                    <tr class="table-<?= $colors[$prestation['prestation']] ?>">
                        <td><?= $prestation['prestation'] ?></td>
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