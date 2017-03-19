<?php
use App\Services\VacationService;

$vacationService = new VacationService($db);
if ($request->isPost()) {
    $firstName = trim($request->getData()["firstName"]);
    $lastName = trim($request->getData()["lastName"]);
    $phone = trim($request->getData()["phone"]);
    $email = trim($request->getData()["email"]);
    $confirmEmail = trim($request->getData()["confirmEmail"]);
    $accommodationId = trim($request->getData()["accommodationId"]);
    $children = trim($request->getData()["children"]);
    $adults = trim($request->getData()["adults"]);
    $rooms = trim($request->getData()["rooms"]);
    $checkIn = trim($request->getData()["checkIn"]);
    $checkOut = trim($request->getData()["checkOut"]);
    $lift = trim($request->getData()["lift"]);
    $instruktor = trim($request->getData()["instruktor"]);

    if (strlen($firstName) < 1) {
        $session->addMessage("First Name cannot be empty.", 1);
    }

    $session->addFormData("addVacation", "firstName", $firstName);

    if (strlen($lastName) < 1) {
        $session->addMessage("Last Name cannot be empty.", 1);
    }

    $session->addFormData("addVacation", "lastName", $lastName);

    if (preg_match("/\\d+/", $phone) === 0) {
        $session->addMessage("Phone number can be only numbers.", 1);
    }

    $session->addFormData("addVacation", "phone", $phone);

    if (strlen($email) < 1) {
        $session->addMessage("Email cannot be empty.", 1);
    } else {
        if (strlen($confirmEmail) < 1) {
            $session->addMessage("Confirmation Email cannot be empty.", 1);
        } else {
            if ($email != $confirmEmail) {
                $session->addMessage("Emails does not match.", 1);
            }
        }
    }

    $session->addFormData("addVacation", "email", $email);
    $session->addFormData("addVacation", "confirmEmail", $confirmEmail);

    $accommodationId = filter_var($accommodationId, FILTER_VALIDATE_INT);
    if ($accommodationId === false ||
        !$vacationService->accommodationExists($accommodationId)
    ) {
        $session->addMessage("Accommodation type is not valid.", 1);
    } else {
        $session->addFormData("addVacation", "accommodationId", $email);
    }

    $children = filter_var($children, FILTER_VALIDATE_INT);
    if ($children === false || $children < 0) {
        $session->addMessage("Invalid number of children.", 1);
    }

    $session->addFormData("addVacation", "children", $children);

    $adults = filter_var($adults, FILTER_VALIDATE_INT);
    if ($adults === false || $adults < 0) {
        $session->addMessage("Invalid number of adults.", 1);
    }

    $session->addFormData("addVacation", "adults", $adults);

    $rooms = filter_var($rooms, FILTER_VALIDATE_INT);
    if ($rooms === false || $rooms < 0) {
        $session->addMessage("Invalid number of rooms.", 1);
    }

    $session->addFormData("addVacation", "rooms", $rooms);

    $session->addFormData("addVacation", "checkIn", $checkIn);
    if (strlen($checkIn) < 1) {
        $session->addMessage("Check-in date cannot be empty.", 1);
    } else {
        $checkIn = new DateTime($checkIn);
        $checkIn = $checkIn->format("Y-m-d H:i:s");
    }

    $session->addFormData("addVacation", "checkOut", $checkOut);
    if (strlen($checkOut) < 1) {
        $session->addMessage("Check-out date cannot be empty.", 1);
    } else {
        $checkOut = new DateTime($checkIn);
        $checkOut = $checkOut->format("Y-m-d H:i:s");
    }

    $session->addFormData("addVacation", "lift", $lift);
    $session->addFormData("addVacation", "instruktor", $instruktor);
    if ($lift === "on") {
        $lift = 1;
    } else {
        $lift = 0;
    }

    if ($instruktor === "on") {
        $instruktor = 1;
    } else {
        $instruktor = 0;
    }


    if ($session->getMessagesCount(1) !== 0) {
        $view->redirect("addVaction");
    }

    if (!$vacationService->addReservation(
        $firstName,
        $lastName,
        $phone,
        $email,
        $accommodationId,
        $children,
        $adults,
        $rooms,
        $checkIn,
        $checkOut,
        $lift,
        $instruktor)
    ) {
        $session->addMessage("Vacation add failed. Try again.", 1);
        $view->redirect("addVacation");
    }

    $session->getFormData("addVacation");
    $session->addMessage("Vacation added successfully!", 0);
    $view->redirect("home");
}

$accommodationsModel = $vacationService->getAccommodations();
$view->render("addVacation/index", $accommodationsModel);