<?php
require basePath('views/partials/head.php');
require basePath('views/partials/header.php');
?>

<div class="container">
    <form action="/register" method="POST" id="registrationForm">
        <h1 class="h3 mb-3 fw-normal">Please log in</h1>

        <div class="form-floating">
            <input type="text" class="form-control" id="firstNameInput" name="first_name_input"
                placeholder="First Name">
            <label for="firstNameInput">First Name</label>
        </div>
        <div class="form-floating">
            <input type="text" class="form-control" id="lastNameInput" name="last_name_input" placeholder="Last Name">
            <label for="lastNameInput">Last Name</label>
        </div>
        <div class="form-floating">
            <input type="email" class="form-control" id="emailInput" name="email_input" placeholder="name@example.com">
            <label for="emailInput">Email address</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" id="passwordInput" name="password_input" placeholder="Password">
            <label for="passwordInput">Password</label>
        </div>

        <div class="form-check text-start my-3">
            <input class="form-check-input" type="checkbox" value="remember-me" id="rememberInput"
                name="remember_input">
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