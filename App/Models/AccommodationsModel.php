<?php

namespace App\Models;

use App\Models\Entities\AccommodationEntity;

class AccommodationsModel
{
    private $accommodations;

    /**
     * @return AccommodationEntity[]|\Generator
     */
    public function getAccommodations() {
        return $this->accommodations;
    }

    public function setAccommodations(callable $callable) {
        $generator = $callable();
        $this->accommodations = $generator;
    }
}