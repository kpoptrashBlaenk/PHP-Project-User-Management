<?php
require basePath('views/partials/head.php');
require basePath('views/partials/header.php');
?>

<div class="mt-5 pt-5 container">
    <form class="row g-3" action="/admin/prestation/store" method="POST">
        <div class="col-md-4">
            <label for="prestation_input" class="form-label">Prestation</label>
            <input type="text" class="form-control <?= isset($errors['prestation']) ? 'is-invalid' : '' ?>"
                id="prestation_input" name="prestation_input" min="0" max="100" value="<?= $old['prestation'] ?? '' ?>">
            <div class="invalid-feedback"><?= $errors['prestation'] ?? '' ?></div>
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