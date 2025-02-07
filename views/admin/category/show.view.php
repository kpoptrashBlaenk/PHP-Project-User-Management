<?php
require basePath('views/partials/head.php');
require basePath('views/partials/header.php');
?>

<div class="table-responsive small container px-5">
    <div class="row ps-5">
        <div class="col-10"></div>
        <a href="/admin/category/create" class="col-auto ms-3">
            <button type="button" class="btn btn-primary">Add New Category</button>
        </a>
    </div>

    <table class="table table-sm text-center align-middle">
        <thead>
            <tr>
                <th scope="col">Category</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categories as $category): ?>
                <form action="/admin/category/edit" method="GET">
                    <input type="hidden" name="category_id" value="<?= $category['category_id'] ?>">
                    <tr class="table-<?= $colors[$category['category']] ?>">
                        <td><?= $category['category'] ?></td>
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