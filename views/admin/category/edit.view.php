<?php
require basePath('views/partials/head.php');
require basePath('views/partials/header.php');
?>

<div class="mt-5 pt-5 container">
    <form class="row g-3" action="/admin/category/update" method="POST">
        <input hidden name="_method" value="PATCH" id="method">
        <input hidden name="category_id" value="<?= $category['category_id'] ?>">

        <div class="col-md-4">
            <label for="category_input" class="form-label">Category</label>
            <input type="text" class="form-control <?= isset($errors['category']) ? 'is-invalid' : '' ?>"
                id="category_input" name="category_input" min="0" max="100"
                value="<?= $old['category'] ?? $category['category'] ?>">
            <div class="invalid-feedback"><?= $errors['category'] ?? $category['category'] ?></div>
        </div>

        <div class="col-12">
            <button class="btn btn-primary" type="Submit">Save</button>
            <button id="deleteButton" class="btn btn-danger" type="submit">Delete</button>
        </div>
    </form>
</div>

<?php
require basePath('views/partials/footer.php');
require basePath('views/partials/foot.php');
?>