<?php
require basePath('views/partials/head.php');
require basePath('views/partials/header.php');
?>

<div class="mt-5 pt-5 container">
    <form class="row g-3" action="/admin/tariff/update" method="POST">
        <input hidden name="_method" value="PATCH">
        <input hidden name="prestation_id" value="PATCH">
        <input hidden name="category_id" value="PATCH">

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
            <input type="number" class="form-control" id="price_input" name="price_input"
                value="<?= $old['price'] ?? $tariff['price'] ?>">
            <div class="invalid-feedback">ERROR</div>
        </div>

        <div class="col-12">
            <button class="btn btn-primary" type="Submit">Save</button>
        </div>
    </form>
</div>


<?php
require basePath('views/partials/footer.php');
require basePath('views/partials/foot.php');
?>