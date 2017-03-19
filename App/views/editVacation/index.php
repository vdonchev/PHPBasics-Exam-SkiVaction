<?php /** @var $this \App\Core\View\View */; ?>
<?php $formData = $this->getSession()->getFormData("addVacation"); ?>
<?php /** @var $viewData \App\Models\Entities\ReservationEntity */; ?>
<?php $reservation = $viewData; ?>
<div class="col-md-12">
    <h1 class="h2">Edit vacation</h1>
    <hr>
    <form action="<?= \App\Core\Config::APP_ROOT; ?>/editVacation" method="post" class="form-horizontal" name="addVacation">
        <fieldset>
            <input type="hidden" value="<?= htmlspecialchars($reservation->getId());?>" name="id">
            <div class="form-group">
                <label class="col-lg-2 control-label" for="firstName">First Name</label>
                <div class="col-lg-10">
                    <input class="form-control" id="firstName" name="firstName" type="text" placeholder="First Name"
                           value="<?= htmlspecialchars($reservation->getFirstName());?>"
                           required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-2 control-label" for="lastName">Last Name</label>
                <div class="col-lg-10">
                    <input class="form-control" id="lastName" name="lastName" type="text" placeholder="Last Name"
                           value="<?= htmlspecialchars($reservation->getLastName());?>"
                           required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-2 control-label" for="phone">Phone Number</label>
                <div class="col-lg-10">
                    <input class="form-control" id="phone" name="phone" type="number" placeholder="Phone Number"
                           value="<?= htmlspecialchars($reservation->getPhone());?>"
                           required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-2 control-label" for="email">Email</label>
                <div class="col-lg-10">
                    <input class="form-control" id="email" name="email" type="email" placeholder="Email"
                           value="<?= htmlspecialchars($reservation->getEmail());?>"
                           required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-2 control-label" for="confirmEmail">Confirm Email</label>
                <div class="col-lg-10">
                    <input class="form-control" id="confirmEmail" name="confirmEmail" type="email"
                           placeholder="Confirm Email"
                           value="<?= htmlspecialchars($reservation->getEmail());?>"
                           required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-2 control-label" for="children">Number of children</label>
                <div class="col-lg-10">
                    <input class="form-control" id="children" name="children" type="number" placeholder="Number of children"
                           value="<?= htmlspecialchars($reservation->getChildren());?>"
                           required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-2 control-label" for="adults">Number of adults</label>
                <div class="col-lg-10">
                    <input class="form-control" id="adults" name="adults" type="number" placeholder="Number of adults"
                           value="<?= htmlspecialchars($reservation->getAdults());?>"
                           required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-2 control-label" for="rooms">Number of rooms</label>
                <div class="col-lg-10">
                    <input class="form-control" id="rooms" name="rooms" type="number" placeholder="Number of rooms"
                           value="<?= htmlspecialchars($reservation->getRooms());?>"
                           required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                    <button class="btn btn-default" type="reset">Clear</button>
                    <button class="btn btn-primary" type="submit" name="editTheVacation">Edit Vaction</button>
                </div>
            </div>
        </fieldset>
    </form>
</div>