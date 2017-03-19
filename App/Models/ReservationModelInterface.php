<?php

namespace App\Models;

interface ReservationModelInterface
{
    public function getReservations();

    public function setReservations(callable $callable) ;
}