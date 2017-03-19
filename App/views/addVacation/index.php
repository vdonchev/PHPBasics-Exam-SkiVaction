<?php /** @var $this \App\Core\View\View */; ?>
<?php $formData = $this->getSession()->getFormData("addVacation"); ?>
<div class="col-md-12">
    <h1 class="h2">Add vacation</h1>
    <hr>
    <form action="<?= \App\Core\Config::APP_ROOT; ?>/addVaction" method="post" class="form-horizontal" name="addVacation">
        <fieldset>
            <div class="form-group">
                <label class="col-lg-2 control-label" for="firstName">First Name</label>
                <div class="col-lg-10">
                    <input class="form-control" id="firstName" name="firstName" type="text" placeholder="First Name"
                           value="<?= isset($formData["firstName"]) ? htmlspecialchars($formData["firstName"]) : ""; ?>"
                           required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-2 control-label" for="lastName">Last Name</label>
                <div class="col-lg-10">
                    <input class="form-control" id="lastName" name="lastName" type="text" placeholder="Last Name"
                           value="<?= isset($formData["lastName"]) ? htmlspecialchars($formData["lastName"]) : ""; ?>"
                           required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-2 control-label" for="phone">Phone Number</label>
                <div class="col-lg-10">
                    <input class="form-control" id="phone" name="phone" type="number" placeholder="Phone Number"
                           value="<?= isset($formData["phone"]) ? htmlspecialchars($formData["phone"]) : ""; ?>"
                           required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-2 control-label" for="email">Email</label>
                <div class="col-lg-10">
                    <input class="form-control" id="email" name="email" type="email" placeholder="Email"
                           value="<?= isset($formData["email"]) ? htmlspecialchars($formData["email"]) : ""; ?>"
                           required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-2 control-label" for="confirmEmail">Confirm Email</label>
                <div class="col-lg-10">
                    <input class="form-control" id="confirmEmail" name="confirmEmail" type="email"
                           placeholder="Confirm Email"
                           value="<?= isset($formData["confirmEmail"]) ? htmlspecialchars($formData["confirmEmail"]) : ""; ?>"
                           required>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <label for="accommodationId" class="col-lg-2 control-label">Accommodation type</label>
                <div class="col-lg-10">
                    <select class="form-control" id="select" name="accommodationId" required>
                        <?php /** @var $viewData \App\Models\AccommodationsModel */; ?>
                        <?php $accommodations = $viewData->getAccommodations(); ?>
                        <?php foreach ($accommodations as $accommodation):; ?>
                            <option value="<?= $accommodation->getId(); ?>"
                                <?= isset($formData["accommodationId"]) && $formData["accommodationId"] == $accommodation->getId() ? "selected" : ""; ?>
                            ><?= htmlspecialchars($accommodation->getName()); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-2 control-label" for="children">Number of children</label>
                <div class="col-lg-10">
                    <input class="form-control" id="children" name="children" type="number" placeholder="Number of children"
                           value="<?= isset($formData["children"]) ? htmlspecialchars($formData["children"]) : ""; ?>"
                           required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-2 control-label" for="adults">Number of adults</label>
                <div class="col-lg-10">
                    <input class="form-control" id="adults" name="adults" type="number" placeholder="Number of adults"
                           value="<?= isset($formData["adults"]) ? htmlspecialchars($formData["adults"]) : ""; ?>"
                           required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-2 control-label" for="rooms">Number of rooms</label>
                <div class="col-lg-10">
                    <input class="form-control" id="rooms" name="rooms" type="number" placeholder="Number of rooms"
                           value="<?= isset($formData["rooms"]) ? htmlspecialchars($formData["rooms"]) : ""; ?>"
                           required>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <label class="col-lg-2 control-label" for="checkIn">Check-in Date</label>
                <div class="col-lg-10">
                    <input class="form-control" id="checkIn" name="checkIn" type="date" placeholder="Check-in Date"
                           value="<?= isset($formData["checkIn"]) ? htmlspecialchars($formData["checkIn"]) : ""; ?>"
                           required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-2 control-label" for="checkIn">Check-in Date</label>
                    <div class="col-lg-10">
                    <input class="form-control" id="checkOut" name="checkOut" type="date" placeholder="Check-out Date"
                           value="<?= isset($formData["checkOut"]) ? htmlspecialchars($formData["checkOut"]) : ""; ?>"
                           required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-2 control-label" for="checkIn">Options</label>
                <div class="col-lg-10">
                    <div class="checkbox">
                        <label>
                            <input type="hidden" name="lift" value="off">
                            <input name="lift" id="lift" type="checkbox"
                                <?= isset($formData["lift"]) && $formData["lift"] == "on" ? "checked" : ""; ?>> lift Pass
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="hidden" name="instruktor" value="off">
                            <input name="instruktor" id="instruktor" type="checkbox"
                                <?= isset($formData["instruktor"]) && $formData["instruktor"] == "on" ? "checked" : ""; ?>> Ski Instruktor
                        </label>
                    </div>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                    <button class="btn btn-default" type="reset">Clear</button>
                    <button class="btn btn-primary" type="submit" name="addVaction">Add Vaction</button>
                </div>
            </div>
        </fieldset>
    </form>
</div>