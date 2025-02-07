<?php
require basePath('views/partials/head.php');
require basePath('views/partials/header.php');
?>

<div class="table-responsive small container px-5">
    <table class="table table-sm text-center align-middle">
        <thead>
            <tr>
                <th scope="col">Last Name</th>
                <th scope="col">First Name</th>
                <th scope="col">Email</th>
                <th scope="col">Rights</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <form action="/admin/user/edit" method="GET">
                    <input type="hidden" name="user_id" value="<?= $user['user_id'] ?>">
                    <tr class="table-<?= $colors[$user['user_id']] ?>">
                        <td><?= $user['last_name'] ?></td>
                        <td><?= $user['first_name'] ?></td>
                        <td><?= $user['email'] ?></td>
                        <td><?= $user['rights'] ?></td>
                        <td><button type="submit" class="btn btn-primary btn-sm">Edit</button></td>
                    </tr>
                </form>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php
require basePath('views/partials/footer.php');
require basePath('views/partials/foot.php');
?>