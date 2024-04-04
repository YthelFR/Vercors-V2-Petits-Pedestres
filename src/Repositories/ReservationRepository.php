<?php

namespace src\Repositories;

use src\Models\Database;
use src\Models\Reservation;

class ReservationRepository
{
    private $pdo;
    public function __construct(Database $DB)
    {
        $this->pdo = $DB->getDB();
    }
    public function addReservation(Reservation $Reservation)
    {

        try {
            $stmt = $this->pdo->prepare("INSERT INTO asy_reservation VALUES(NULL, ?, ?, ?, ?, ?)");
            $stmt->execute([$Reservation->getENFANTRESERVATION(), $Reservation->getNOMBRECASQUESRESERVATION(), $Reservation->getNOMBRELUGESRESERVATION(), $Reservation->getNOMBRERESERVATION(), $_SESSION["id"]]);

            return  $this->pdo->lastInsertId();
        } catch (\PDOException $e) {
            return $e;
        }
    }

    public function getAllReservations(): array
    {
        $reservationArray = [];
        $id = $_SESSION["id"];

        try {
            $stmt = $this->pdo->query("SELECT 
                asy_reservation.ID_RESERVATION, 
                asy_reservation.ENFANT_RESERVATION, 
                asy_reservation.NOMBRECASQUES_RESERVATION, 
                asy_reservation.NOMBRELUGES_RESERVATION, 
                asy_reservation.NOMBRE_RESERVATION, 
                asy_user.ID_USER, 
                asy_user.NOM_USER, 
                asy_user.PRENOM_USER, 
                asy_user.ADRESSE_USER, 
                asy_user.IS_ADMIN, 
                asy_user.DATE_RGPD, 
                asy_user.PASSWORD_USER, 
                asy_user.EMAIL_USER, 
                asy_user.TELEPHONE_USER
                FROM 
                    asy_reservation 
                INNER JOIN 
                    asy_user ON asy_reservation.ID_USER = asy_user.ID_USER;
            ");
        } catch (\PDOException $e) {
            var_dump($e);
        }
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $reservationArray[] = $row;
        }

        return $reservationArray;
    }


    public function getReservationByEmail(string $email): array
    {
        $reservationArray = [];

        try {

            $stmt = $this->pdo->prepare("SELECT 
            asy_user.ID_USER, 
            asy_user.EMAIL_USER,
            asy_reservation.ID_RESERVATION, 
            asy_reservation.ENFANT_RESERVATION, 
            asy_reservation.NOMBRECASQUES_RESERVATION, 
            asy_reservation.NOMBRELUGES_RESERVATION, 
            asy_reservation.NOMBRE_RESERVATION
            FROM 
                asy_reservation 
            INNER JOIN 
                asy_user ON asy_reservation.ID_USER = asy_user.ID_USER
            WHERE 
                asy_user.EMAIL_USER = :email");

            $stmt->bindParam(':email', $email);

            $stmt->execute();

            while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                $reservationArray[] = $row;
            }
        } catch (\PDOException $e) {

            var_dump($e);
            return false;
        }

        return $reservationArray;
    }
}
