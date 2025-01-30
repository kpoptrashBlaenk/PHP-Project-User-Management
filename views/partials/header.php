<div class=container>
    <header
        class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">

        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <li><a href="/" class="nav-link px-2 link-secondary">Home</a></li>
        </ul>

        <div class="col-md-3 text-end">
            <?php if (isset($_SESSION['user'])): ?>
                <form action="/session" method="POST">
                    <input type="hidden" name="_method" value="DELETE" />
                    <a href="" class="text-decoration-none">
                        <button type="submit" class="btn btn-danger">
                            Logout
                        </button>
                    </a>
                </form>
            <?php else: ?>
                <a href="/session" class="text-decoration-none">
                    <button type="button" class="btn btn-outline-primary me-2">
                        Login
                    </button>
                </a>
                <a href="/register" class="text-decoration-none">
                    <button type="button" class="btn btn-primary">
                        Sign up
                    </button>
                </a>
            <?php endif; ?>
        </div>
    </header>
</div>
<main>