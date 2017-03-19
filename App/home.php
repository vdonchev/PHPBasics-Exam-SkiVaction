<?php
use App\Services\VacationService;

$vacationService = new VacationService($db);
$reservations = $vacationService->getReservations();
$view->render("home/index", $reservations);