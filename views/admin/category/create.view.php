<?php
require basePath('views/partials/head.php');
require basePath('views/partials/header.php');
?>

<div class="mt-5 pt-5 container">
    <form class="row g-3" action="/admin/category/store" method="POST">
        <div class="col-md-4">
            <label for="category_input" class="form-label">Category</label>
            <input type="text" class="form-control <?= isset($errors['category']) ? 'is-invalid' : '' ?>"
                id="category_input" name="category_input" min="0" max="100" value="<?= $old['category'] ?? '' ?>">
            <div class="invalid-feedback"><?= $errors['category'] ?? '' ?></div>
        </div>

        <div class="col-12">
            <button class="btn btn-primary" type="Submit">Add</button>
        </div>

        <div class="text-danger ms-2 mb-2"><?= $errors['all'] ?? '' ?></div>
    </form>
</div>

<?php
require basePath('views/partials/footer.php');
require basePath('views/partials/foot.php');
?>