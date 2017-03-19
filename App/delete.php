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

$res = $vacationService->deleteReservation($id);
$session->addMessage("Reservation deleted.", 0);
$view->redirect("home");