</main>
<div class="container">
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
        <p class="col-md-4 mb-0 text-body-secondary">Aldin Music</p>

        <ul class="nav col-md-4 justify-content-end">
            <!-- Default -->
            <li class="nav-item"><a href="/"
                    class="nav-link px-2 <?= $_SERVER['REQUEST_URI'] === '/' ? 'link-secondary' : '' ?>">Home</a></li>

            <!-- If authenticated -->
            <?php if (isset($_SESSION['user'])): ?>
                <li class="nav-item"><a href="/tariff"
                        class="nav-link px-2 <?= $_SERVER['REQUEST_URI'] === '/tariff' ? 'link-secondary' : '' ?>">Tariff</a>
                </li>
                <li class="nav-item"><a href="/category"
                        class="nav-link px-2 <?= $_SERVER['REQUEST_URI'] === '/category' ? 'link-secondary' : '' ?>">Category</a>
                </li>
                <li class="nav-item"><a href="/prestation"
                        class="nav-link px-2 <?= $_SERVER['REQUEST_URI'] === '/prestation' ? 'link-secondary' : '' ?>">Prestation</a>
                </li>
                <li class="nav-item"><a href="/card"
                        class="nav-link px-2 <?= $_SERVER['REQUEST_URI'] === '/card' ? 'link-secondary' : '' ?>">Card</a>
                </li>
                <li class="nav-item"><a href="/user"
                        class="nav-link px-2 <?= $_SERVER['REQUEST_URI'] === '/user' ? 'link-secondary' : '' ?>">User</a>
                </li>
            <?php endif; ?>
        </ul>
    </footer>
</div>