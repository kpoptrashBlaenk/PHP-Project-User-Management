<div class="px-4 py-5 my-5 text-center">
    <!-- Title -->
    <?php if (empty($_SESSION['user'])): ?>
        <h1 class="display-5 fw-bold text-body-emphasis">You are not logged in!</h1>
    <?php else: ?>
        <h1 class="display-5 fw-bold text-body-emphasis">Welcome!</h1>
    <?php endif; ?>

    <div class="col-lg-6 mx-auto">
        <!-- Subtitle text and buttons -->
        <?php if (empty($_SESSION['user'])): ?>
            <p class="lead mb-4">Log in or create an account to continue on this page!</p>
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                <a href="/session" class="text-decoration-none">
                    <button type="button" class="btn btn-outline-primary btn-lg px-4">
                        Login
                    </button>
                </a>
                <a href="/register" class="text-decoration-none">
                    <button type="button" class="btn btn-primary btn-lg px-4 gap-3">
                        Sign up
                    </button>
                </a>
            </div>
        <?php else: ?>
            <p class="lead mb-4">You can now see all the cool stuff!</p>
        <?php endif; ?>
    </div>
</div>