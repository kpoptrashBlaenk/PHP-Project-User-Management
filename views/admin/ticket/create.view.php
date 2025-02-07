<?php
require basePath('views/partials/head.php');
require basePath('views/partials/header.php');
?>

<div class="mt-5 pt-5 container">
    <form class="row g-3" action="/admin/ticket/store" method="POST">

        <div class="col-md-3">
            <label for="card_input" class="form-label">Card</label>
            <select class="form-select <?= isset($errors['card']) ? 'is-invalid' : '' ?>" id="card_input"
                name="card_input">
                <option value="" selected>Choose a card...</option>
                <?php foreach ($cards as $card): ?>
                    <option value="<?= $card['card_id'] ?>"> <?= $card['card_id'] ?></option>
                <?php endforeach; ?>
            </select>
            <div class="invalid-feedback"><?= $errors['card'] ?? '' ?></div>
        </div>

        <div class="col-md-3">
            <label for="date_input" class="form-label">Date</label>
            <input type="date" class="form-control <?= isset($errors['date']) ? 'is-invalid' : '' ?>" id="date_input"
                name="date_input" value="<?= $old['date'] ?? '' ?>">
            <div class="invalid-feedback"><?= $errors['date'] ?? '' ?></div>
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