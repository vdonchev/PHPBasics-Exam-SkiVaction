<?php

namespace App\Services;

use App\Models\AccommodationsModel;
use App\Models\Entities\ReservationEntity;
use App\Models\ReservationModel;

interface VacationServiceInterface
{
    public function getReservations(): ReservationModel;

    public function addReservation(
        string $firstName,
        string $lastName,
        string $phone,
        string $email,
        int $accommodationId,
        int $children,
        int $adults,
        int $rooms,
        string $checkIn,
        string $checkOut,
        int $lift,
        int $instruktor): bool;


    public function getAccommodations(): AccommodationsModel;

    public function accommodationExists(int $id): bool;

    public function reservationExists(int $id): bool;

    public function deleteReservation(int $id);

    public function getReservationBtId(int $id): ReservationEntity;

    public function editReservation(int $id,
                                    string $firstName,
                                    string $lastName,
                                    string $phone,
                                    string $email,
                                    int $children,
                                    int $adults,
                                    int $rooms): bool;
}