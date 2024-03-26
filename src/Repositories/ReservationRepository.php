<?php

namespace src\Repositories;

class ReservationRepository
{
    private $_DB;
    public function __construct()
    {
        $this->_DB = __DIR__ . "/../csv/reservation.csv";
    }
    public function save_reservation(Reservation $Reservation): bool
    {
        $fichier = fopen($this->_DB, "ab");
        $retour = fputcsv($fichier, $Reservation->getObject_Recap());
        fclose($fichier);
        return $retour;
    }
    public function Toute_Les_Reservations(): array
    {
        $fichier = fopen($this->_DB, "r");
        $Reservations = [];

        while (($ligne = fgetcsv($fichier, 1000, ",")) !== false) {
            $Reservations[] = new Reservation($ligne[0], $ligne[1], $ligne[2], $ligne[3], $ligne[4], $ligne[5], $ligne[6], $ligne[7], $ligne[8], $ligne[9]);
        }
        fclose($fichier);
        return $Reservations;
    }

    public function find_Reservation_By_Email(string $email): Reservation|bool
    {
        $fichier = fopen($this->_DB, "r");
        while (($Reservation = fgetcsv($fichier, 1000, ",")) !== false) {
            if ($Reservation[8] === $email) {
                $Reservation = new Reservation($Reservation[0], $Reservation[1], $Reservation[2], $Reservation[3], $Reservation[4], $Reservation[5], $Reservation[6], $Reservation[7], $Reservation[8], $Reservation[9]);
                break;
            } else {
                $Reservation = false;
            }
        }
        fclose($fichier);
        return $Reservation;
    }
}
