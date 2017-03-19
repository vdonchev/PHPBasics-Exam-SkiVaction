<?php

namespace App\Models\Entities;

class ReservationEntity
{
    private $id;
    private $firstName;
    private $lastName;
    private $phone;
    private $email;
    private $accommodationName;
    private $children;
    private $adults;
    private $rooms;
    private $checkIn;
    private $checkOut;
    private $liftPass;
    private $skiInstruktor;

    public function getId()
    {
        return $this->id;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getAccommodationName()
    {
        return $this->accommodationName;
    }

    public function getChildren()
    {
        return $this->children;
    }

    public function getAdults()
    {
        return $this->adults;
    }

    public function getRooms()
    {
        return $this->rooms;
    }

    public function getCheckIn()
    {
        return $this->checkIn;
    }

    public function getCheckOut()
    {
        return $this->checkOut;
    }

    public function getLiftPass()
    {
        return $this->liftPass;
    }

    public function getSkiInstruktur()
    {
        return $this->skiInstruktor;
    }
}