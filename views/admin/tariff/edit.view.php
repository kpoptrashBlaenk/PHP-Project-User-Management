<?php
require basePath('views/partials/head.php');
require basePath('views/partials/header.php');
?>

<div class="mt-5 pt-5 container">
    <form class="row g-3" action="/admin/tariff/update" method="POST">
        <input hidden name="_method" value="PATCH" id="method">
        <input hidden name="prestation_id" value="<?= $tariff['prestation_id'] ?>">
        <input hidden name="category_id" value="<?= $tariff['category_id'] ?>">

        <div class="col-md-4">
            <label for="prestation_input" class="form-label">Prestation</label>
            <select class="form-select" id="prestation_input" disabled>
                <option selected> <?= $tariff['prestation'] ?></option>
            </select>
        </div>

        <div class="col-md-4">
            <label for="category_input" class="form-label">Category</label>
            <select class="form-select" id="category_input" disabled>
                <option selected> <?= $tariff['category'] ?></option>
            </select>
        </div>

        <div class="col-md-4">
            <label for="price_input" class="form-label">Price</label>
            <input type="number" class="form-control <?= isset($errors['price']) ? 'is-invalid' : '' ?>"
                id="price_input" name="price_input" min="0" max="100" value="<?= $old['price'] ?? $tariff['price'] ?>">
            <div class="invalid-feedback"><?= $errors['price'] ?? $tariff['price'] ?></div>
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