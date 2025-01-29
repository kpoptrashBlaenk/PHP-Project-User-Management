<?php
require basePath('views/partials/head.php');
require basePath('views/partials/header.php');
?>

<div class="container">
    <form>
        <h1 class="h3 mb-3 fw-normal">Please log in</h1>

        <div class="form-floating">
            <input type="email" class="form-control" id="emailInput" placeholder="name@example.com">
            <label for="emailInput">Email address</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" id="passwordInput" placeholder="Password">
            <label for="passwordInput">Password</label>
        </div>

        <div class="form-check text-start my-3">
            <input class="form-check-input" type="checkbox" value="remember-me" id="rememberInput">
            <label class="form-check-label" for="rememberInput">
                Remember me
            </label>
        </div>
        <button class="btn btn-primary w-100 py-2" type="submit">Login</button>
    </form>
</div>

<?php
require basePath('views/partials/footer.php');
require basePath('views/partials/foot.php');
?>