<?php
require basePath('views/partials/head.php');
require basePath('views/partials/header.php');
?>

<div class="mt-5 pt-5 container">
    <form class="row g-3" action="/admin/prestation/update" method="POST">
        <input hidden name="_method" value="PATCH" id="method">
        <input hidden name="prestation_id" value="<?= $prestation['prestation_id'] ?>">

        <div class="col-md-4">
            <label for="prestation_input" class="form-label">Prestation</label>
            <input type="text" class="form-control <?= isset($errors['prestation']) ? 'is-invalid' : '' ?>"
                id="prestation_input" name="prestation_input" min="0" max="100"
                value="<?= $old['prestation'] ?? $prestation['prestation'] ?>">
            <div class="invalid-feedback"><?= $errors['prestation'] ?? $prestation['prestation'] ?></div>
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