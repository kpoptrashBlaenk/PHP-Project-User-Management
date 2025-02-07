<?php
require basePath('views/partials/head.php');
require basePath('views/partials/header.php');
?>

<div class="mt-5 pt-5 container">
    <form class="row g-3" action="/admin/user/update" method="POST">
        <input hidden name="_method" value="PATCH" id="method">
        <input hidden name="user_id" value="<?= $user['user_id'] ?>">

        <div class="col-md-3">
            <label for="last_name_input" class="form-label">Last Name</label>
            <input type="text" class="form-control <?= isset($errors['last_name']) ? 'is-invalid' : '' ?>"
                id="last_name_input" name="last_name_input" value="<?= $old['last_name'] ?? $user['last_name'] ?>">
            <div class="invalid-feedback"><?= $errors['last_name'] ?? $user['last_name'] ?></div>
        </div>

        <div class="col-md-3">
            <label for="first_name_input" class="form-label">First Name</label>
            <input type="text" class="form-control <?= isset($errors['first_name']) ? 'is-invalid' : '' ?>"
                id="first_name_input" name="first_name_input" value="<?= $old['first_name'] ?? $user['first_name'] ?>">
            <div class="invalid-feedback"><?= $errors['first_name'] ?? $user['first_name'] ?></div>
        </div>

        <div class="col-md-3">
            <label for="email_input" class="form-label">Email</label>
            <input type="email" class="form-control <?= isset($errors['email']) ? 'is-invalid' : '' ?>" id="email_input"
                name="email_input" value="<?= $old['email'] ?? $user['email'] ?>">
            <div class="invalid-feedback"><?= $errors['email'] ?? $user['email'] ?></div>
        </div>

        <div class="col-md-3">
            <label for="rights_input" class="form-label">Rights</label>
            <select class="form-select <?= isset($errors['rights']) ? 'is-invalid' : '' ?>" id="rights_input"
                name="rights_input">
                <?php foreach ($rights as $right): ?>
                    <option value="<?= $right['rights_id'] ?>" <?= $right['rights_id'] === $user['rights_id'] ? 'selected' : '' ?>> <?= $right['rights'] ?></option>
                <?php endforeach; ?>
            </select>
            <div class="invalid-feedback"><?= $errors['rights'] ?? '' ?></div>
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