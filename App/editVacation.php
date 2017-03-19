<?php
if (!$request->isPost()) {
    $view->redirect("home");
}

$id = $request->getData()["id"];
$id = filter_var($id, FILTER_VALIDATE_INT);
if ($id === false) {
    $view->redirect("home");
}

$vacationService = new \App\Services\VacationService($db);
if (!$vacationService->reservationExists($id)) {
    $view->redirect("home");
}

if (isset($request->getData()["editTheVacation"])) {
    $firstName = trim($request->getData()["firstName"]);
    $lastName = trim($request->getData()["lastName"]);
    $phone = trim($request->getData()["phone"]);
    $email = trim($request->getData()["email"]);
    $confirmEmail = trim($request->getData()["confirmEmail"]);
    $children = trim($request->getData()["children"]);
    $adults = trim($request->getData()["adults"]);
    $rooms = trim($request->getData()["rooms"]);

    if (strlen($firstName) < 1) {
        $session->addMessage("First Name cannot be empty.", 1);
    }

    if (strlen($lastName) < 1) {
        $session->addMessage("Last Name cannot be empty.", 1);
    }

    if (preg_match("/\\d+/", $phone) === 0) {
        $session->addMessage("Phone number can be only numbers.", 1);
    }

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

    $children = filter_var($children, FILTER_VALIDATE_INT);
    if ($children === false || $children < 0) {
        $session->addMessage("Invalid number of children.", 1);
    }

    $adults = filter_var($adults, FILTER_VALIDATE_INT);
    if ($adults === false || $adults < 0) {
        $session->addMessage("Invalid number of adults.", 1);
    }

    $rooms = filter_var($rooms, FILTER_VALIDATE_INT);
    if ($rooms === false || $rooms < 0) {
        $session->addMessage("Invalid number of rooms.", 1);
    }

    if ($session->getMessagesCount(1) !== 0) {
        $view->redirect("addVaction");
    }

    if (!$vacationService->editReservation(
        $id,
        $firstName,
        $lastName,
        $phone,
        $email,
        $children,
        $adults,
        $rooms)
    ) {
        $session->addMessage("Edit failed. Try again.", 1);
    }

    $session->addMessage("Edit successful", 0);
    $view->redirect("home");
}

$reservation = $vacationService->getReservationBtId($id);
$view->render("editVacation/index", $reservation);