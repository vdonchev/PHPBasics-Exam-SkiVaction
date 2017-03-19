<?php

namespace App\Models;

interface AccommodationServiceInterface
{
    public function getAccommodations();

    public function setAccommodations(callable $callable);
}