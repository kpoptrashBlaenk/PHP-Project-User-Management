<?php
require basePath('views/partials/head.php');
require basePath('views/partials/header.php');
?>

<div class="table-responsive small container px-5">
    <div class="row ps-5">
        <div class="col-10"></div>
        <a href="/admin/ticket/create" class="col-auto ms-4">
            <button type="button" class="btn btn-primary">Add New Ticket</button>
        </a>
    </div>

    <table class="table table-sm text-center align-middle">
        <thead>
            <tr>
                <th scope="col">Ticket</th>
                <th scope="col">Card</th>
                <th scope="col">Name</th>
                <th scope="col">Category</th>
                <th scope="col">Caution</th>
                <th scope="col">Card Date</th>
                <th scope="col">Buy Date</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tickets as $ticket): ?>
                <form action="/admin/ticket/edit" method="GET">
                    <input type="hidden" name="ticket_id" value="<?= $ticket['ticket_id'] ?>">
                    <tr class="table-<?= $colors[$ticket['ticket_id']] ?>">
                        <td><?= $ticket['ticket_id'] ?></td>
                        <td><?= $ticket['card_id'] ?></td>
                        <td><?= $ticket['name'] ?></td>
                        <td><?= $ticket['category'] ?></td>
                        <td><?= $ticket['caution'] ?>€</td>
                        <td><?= $ticket['card_date'] ?></td>
                        <td><?= $ticket['ticket_date'] ?></td>
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