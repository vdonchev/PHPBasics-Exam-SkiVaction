<?php

namespace App\Services;

use App\Core\Database\DatabaseInterface;
use App\Models\AccommodationsModel;
use App\Models\Entities\AccommodationEntity;
use App\Models\Entities\ReservationEntity;
use App\Models\ReservationModel;

class VacationService implements VacationServiceInterface
{
    private $db;

    public function __construct(DatabaseInterface $db)
    {
        $this->db = $db;
    }

    /**
     * @return ReservationModel
     */
    public function getReservations(): ReservationModel
    {
        $stmt = $this->db->prepare("SELECT 
                                        reservations.id,
                                        first_name AS firstName, 
                                        last_name AS lastName, 
                                        phone_number AS phone, 
                                        email AS email, 
                                        accommodation_types.name AS accommodationName, 
                                        children, 
                                        adults, 
                                        rooms, 
                                        DATE(check_in_date) AS checkIn,
                                        DATE(check_out_date) AS checkOut, 
                                        lift_pass AS liftPass,
                                        ski_instruktor AS skiInstruktor
                                    FROM reservations
                                    LEFT JOIN accommodation_types
                                      ON reservations.accommodation_type_id = accommodation_types.id
                                    WHERE is_deleted IS NULL 
                                    ORDER BY check_in_date ASC, check_in_date ASC");
        $stmt->execute([]);

        $model = new ReservationModel();
        $callable = function () use ($stmt) {
            while ($reservation = $stmt->fetchObj(ReservationEntity::class)) {
                yield $reservation;
            }
        };

        $model->setReservations($callable);

        return $model;
    }

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
        int $instruktor): bool
    {
        $stmt = $this->db->prepare("INSERT INTO reservations
                                        (first_name, 
                                        last_name, 
                                        phone_number, 
                                        email, 
                                        accommodation_type_id, 
                                        children, 
                                        adults, 
                                        rooms, 
                                        check_in_date,
                                        check_out_date, 
                                        lift_pass,
                                        ski_instruktor) 
                                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        return $stmt->execute(
            [
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
                $instruktor
            ]
        );
    }

    /**
     * @return AccommodationsModel
     */
    public function getAccommodations(): AccommodationsModel
    {
        $stmt = $this->db->prepare("SELECT id, name FROM accommodation_types");
        $stmt->execute([]);

        $model = new AccommodationsModel();
        $callable = function () use ($stmt) {
            while ($accommodation = $stmt->fetchObj(AccommodationEntity::class)) {
                yield $accommodation;
            }
        };

        $model->setAccommodations($callable);

        return $model;
    }

    public function accommodationExists(int $id): bool
    {
        $stmt = $this->db->prepare("SELECT name FROM accommodation_types WHERE id = ?");
        $stmt->execute([$id]);

        return $stmt->rowCount() > 0;
    }

    public function reservationExists(int $id): bool
    {
        $stmt = $this->db->prepare("SELECT first_name FROM reservations WHERE id = ?");
        $stmt->execute([$id]);

        return $stmt->rowCount() > 0;
    }

    public function deleteReservation(int $id)
    {
        $stmt = $this->db->prepare("UPDATE reservations 
                                    SET is_deleted = NOW() 
                                    WHERE id = ?");

        $stmt->execute([$id]);
        return $stmt->rowCount();
    }

    public function getReservationBtId(int $id): ReservationEntity
    {
        $stmt = $this->db->prepare("SELECT 
                                        id,
                                        first_name AS firstName, 
                                        last_name AS lastName, 
                                        phone_number AS phone, 
                                        email,
                                        children, 
                                        adults, 
                                        rooms
                                    FROM reservations
                                    WHERE id = ?");

        $stmt->execute([$id]);
        return $stmt->fetchObj(ReservationEntity::class);
    }

    public function editReservation(int $id,
                                    string $firstName,
                                    string $lastName,
                                    string $phone,
                                    string $email,
                                    int $children,
                                    int $adults,
                                    int $rooms): bool
    {
        $stmt = $this->db->prepare("UPDATE reservations 
                                    SET first_name = ?, 
                                    last_name = ?, 
                                    phone_number = ?, 
                                    email = ?,
                                    children = ?,
                                    adults = ?,
                                    rooms = ?,
                                    is_deleted = NULL 
                                    WHERE id = ?");

        $stmt->execute([$firstName, $lastName, $phone, $email, $children, $adults, $rooms, $id]);
        return $stmt->rowCount() > 0;
    }
}