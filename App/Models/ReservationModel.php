<?php

namespace App\Models;

use App\Models\Entities\ReservationEntity;

class ReservationModel implements ReservationModelInterface
{
    private $reservations;

    /**
     * @return ReservationEntity[]|\Generator
     */
    public function getReservations() {
        return $this->reservations;
    }

    public function setReservations(callable $callable) {
        $generator = $callable();
        $this->reservations = $generator;
    }
}