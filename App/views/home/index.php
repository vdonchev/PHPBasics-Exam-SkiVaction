<div class="jumbotron">
    <h1>Welcome to <?= \App\Core\Config::SITE_NAME; ?>!</h1>
    <p><?= \App\Core\Config::SITE_DESCRIPTION; ?></p>
    <?php /** @var $this \App\Core\View\ViewInterface */; ?>

    <?php /** @var $viewData \App\Models\ReservationModel */; ?>
    <?php $reservations = $viewData->getReservations(); ?>
</div>

<?php if (count($reservations) > 0) : ; ?>
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Accommodation Details</th>
            <th>Vacation Details</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($reservations as $reservation):; ?>
            <tr>
                <td><?= htmlspecialchars($reservation->getFirstName()); ?>
                    <?= htmlspecialchars($reservation->getLastName()); ?></td>
                <td><?= htmlspecialchars($reservation->getPhone()); ?></td>
                <td><?= htmlspecialchars($reservation->getEmail()); ?></td>
                <td><?= htmlspecialchars($reservation->getAccommodationName()); ?>,
                    <?= htmlspecialchars($reservation->getRooms()); ?> Rooms,
                    <?= htmlspecialchars($reservation->getAdults()); ?> Adults and
                    <?= htmlspecialchars($reservation->getChildren()); ?> Children
                </td>
                <td>
                    <?= htmlspecialchars($reservation->getCheckIn()); ?> -
                    <?= htmlspecialchars($reservation->getCheckOut()); ?>
                    <?php if ($reservation->getLiftPass() === "0") : ?>
                        No
                    <?php endif; ?> Lift Pass and
                    <?php if ($reservation->getSkiInstruktur() == "0") : ?>
                        No
                    <?php endif; ?> Ski Instruktor
                </td>
                <td>
                    <form action="<?= \App\Core\Config::APP_ROOT; ?>/editVacation" method="post">
                        <input type="hidden" name="id" value="<?= $reservation->getId(); ?>">
                        <input type="submit" name="edit" value="Edit">
                    </form>
                </td>
                <td>
                    <form action="<?= \App\Core\Config::APP_ROOT; ?>/delete" method="post">
                        <input type="hidden" name="id" value="<?= $reservation->getId(); ?>">
                        <input type="submit" name="delete" value="Delete">
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>
