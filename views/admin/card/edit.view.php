<?php
require basePath('views/partials/head.php');
require basePath('views/partials/header.php');
?>

<div class="mt-5 pt-5 container">
    <form class="row g-3" action="/admin/card/update" method="POST">
        <input hidden name="_method" value="PATCH" id="method">
        <input hidden name="card_id" value="<?= $card['card_id'] ?>">

        <div class="col-md-3">
            <label for="name_input" class="form-label">Name</label>
            <input type="text" class="form-control <?= isset($errors['name']) ? 'is-invalid' : '' ?>" id="name_input"
                name="name_input" min="0" max="100" value="<?= $old['name'] ?? $card['name'] ?>">
            <div class="invalid-feedback"><?= $errors['name'] ?? $card['name'] ?></div>
        </div>

        <div class="col-md-3">
            <label for="category_input" class="form-label">Category</label>
            <select class="form-select <?= isset($errors['category']) ? 'is-invalid' : '' ?>" id="category_input"
                name="category_input">
                <?php foreach ($categories as $category): ?>
                    <option value="<?= $category['category_id'] ?>" <?= $category['category_id'] === $card['category_id'] ? 'selected' : '' ?>> <?= $category['category'] ?></option>
                <?php endforeach; ?>
            </select>
            <div class="invalid-feedback"><?= $errors['category'] ?? '' ?></div>
        </div>

        <div class="col-md-3">
            <label for="caution_input" class="form-label">Caution</label>
            <input type="text" class="form-control <?= isset($errors['caution']) ? 'is-invalid' : '' ?>"
                id="caution_input" name="caution_input" min="0" max="100"
                value="<?= $old['caution'] ?? $card['caution'] ?>">
            <div class="invalid-feedback"><?= $errors['caution'] ?? $card['caution'] ?></div>
        </div>

        <div class="col-md-3">
            <label for="date_input" class="form-label">Caution</label>
            <input type="date" class="form-control <?= isset($errors['date']) ? 'is-invalid' : '' ?>" id="date_input"
                name="date_input" min="0" max="100" value="<?= $old['date'] ?? $card['date'] ?>">
            <div class="invalid-feedback"><?= $errors['date'] ?? $card['date'] ?></div>
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