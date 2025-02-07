<?php
require basePath('views/partials/head.php');
require basePath('views/partials/header.php');
?>

<div class="mt-5 pt-5 container">
    <form class="row g-3" action="/admin/tariff/store" method="POST">
        <div class="col-md-4">
            <label for="prestation_input" class="form-label">Prestation</label>
            <select class="form-select <?= isset($errors['prestation']) ? 'is-invalid' : '' ?>" id="prestation_input"
                name="prestation_input">
                <option value="" selected>Choose a prestation...</option>
                <?php foreach ($prestations as $prestation): ?>
                    <option value="<?= $prestation['prestation_id'] ?>"> <?= $prestation['prestation'] ?></option>
                <?php endforeach; ?>
            </select>
            <div class="invalid-feedback"><?= $errors['prestation'] ?? '' ?></div>
        </div>

        <div class="col-md-4">
            <label for="category_input" class="form-label">Category</label>
            <select class="form-select <?= isset($errors['category']) ? 'is-invalid' : '' ?>" id="category_input"
                name="category_input">
                <option value="" selected>Choose a prestation...</option>
                <?php foreach ($categories as $category): ?>
                    <option value="<?= $category['category_id'] ?>"> <?= $category['category'] ?></option>
                <?php endforeach; ?>
            </select>
            <div class="invalid-feedback"><?= $errors['category'] ?? '' ?></div>
        </div>

        <div class="col-md-4">
            <label for="price_input" class="form-label">Price</label>
            <input type="number" class="form-control <?= isset($errors['price']) ? 'is-invalid' : '' ?>"
                id="price_input" name="price_input" min="0" max="100" value="<?= $old['price'] ?? '' ?>">
            <div class="invalid-feedback"><?= $errors['price'] ?? '' ?></div>
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