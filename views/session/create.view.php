<?php
require basePath('views/partials/head.php');
require basePath('views/partials/header.php');
?>

<div class="container">
    <form action="/session" method="POST" id="loginForm">
        <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

        <!-- Email -->
        <div class="form-floating mb-2">
            <input type="email" class="form-control" id="emailInput" name="email_input" placeholder="Email address"
                value="<?= $old['email'] ?? '' ?>">
            <label for="emailInput">Email address</label>
        </div>

        <!-- Password -->
        <div class="form-floating mb-2">
            <input type="password" class="form-control" id="passwordInput" name="password_input" placeholder="Password"
                value="<?= $old['password'] ?? '' ?>">
            <label for="passwordInput">Password</label>
        </div>

        <!-- Remember -->
        <div class="form-check text-start my-3">
            <input class="form-check-input" type="checkbox" value="remember" id="rememberInput" name="remember_input"
                <?= isset($old['remember']) ? 'checked' : '' ?>>
            <label class="form-check-label" for="rememberInput">
                Remember me
            </label>
        </div>

        <div class="text-danger ms-2 mb-2"><?= $errors['all'] ?? '' ?></div>

        <button class="btn btn-primary w-100 py-2" type="submit">Login</button>
    </form>
</div>

<?php
require basePath('views/partials/footer.php');
require basePath('views/partials/foot.php');
?>