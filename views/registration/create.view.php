<?php
require basePath('views/partials/head.php');
require basePath('views/partials/header.php');
?>

<div class="container">
    <form action="/register" method="POST" id="registrationForm">
        <h1 class="h3 mb-3 fw-normal">Please sign up</h1>

        <!-- First Name -->
        <div class="form-floating mb-2">
            <input type="text" class="form-control <?= isset($errors['first_name']) ? 'is-invalid' : '' ?>"
                id="firstNameInput" name="first_name_input" placeholder="First Name"
                value="<?= $old['first_name'] ?? '' ?>">
            <label for="firstNameInput">First Name</label>
            <?php if (isset($errors['first_name'])): ?>
                <div class="invalid-feedback ms-2"><?= $errors['first_name'] ?? '' ?></div>
            <?php endif; ?>
        </div>

        <!-- Last Name -->
        <div class="form-floating mb-2">
            <input type="text" class="form-control <?= isset($errors['last_name']) ? 'is-invalid' : '' ?>"
                id="lastNameInput" name="last_name_input" placeholder="Last Name"
                value="<?= $old['last_name'] ?? '' ?>">
            <label for="lastNameInput">Last Name</label>
            <?php if (isset($errors['last_name'])): ?>
                <div class="invalid-feedback ms-2"><?= $errors['last_name'] ?? '' ?></div>
            <?php endif; ?>
        </div>

        <!-- Email -->
        <div class="form-floating mb-2">
            <input type="email" class="form-control <?= isset($errors['email']) ? 'is-invalid' : '' ?>" id="emailInput"
                name="email_input" placeholder="Email address" value="<?= $old['email'] ?? '' ?>">
            <label for="emailInput">Email address</label>
            <?php if (isset($errors['email'])): ?>
                <div class="invalid-feedback ms-2"><?= $errors['email'] ?? '' ?></div>
            <?php endif; ?>
        </div>

        <!-- Password -->
        <div class="form-floating mb-2">
            <input type="password" class="form-control <?= isset($errors['password']) ? 'is-invalid' : '' ?>"
                id="passwordInput" name="password_input" placeholder="Password" value="<?= $old['password'] ?? '' ?>">
            <label for="passwordInput">Password</label>
            <?php if (isset($errors['password'])): ?>
                <div class="invalid-feedback ms-2"><?= $errors['password'] ?? '' ?></div>
            <?php endif; ?>
        </div>

        <!-- Remember -->
        <div class="form-check text-start my-3">
            <input class="form-check-input" type="checkbox" value="remember" id="rememberInput" name="remember_input"
                <?= isset($old['remember']) ? 'checked' : '' ?>>
            <label class="form-check-label" for="rememberInput">
                Remember me
            </label>
        </div>
        <button class="btn btn-primary w-100 py-2" type="submit">Sign up</button>
    </form>
</div>

<?php
require basePath('views/partials/footer.php');
require basePath('views/partials/foot.php');
?>