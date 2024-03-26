<?php

namespace src\Models;

class Reservation
{
    private $_Id;
    private $_Tarif;
    private $_NombrePlaces;
    private $_NombreLugesEte;
    private $_NombreCasquesEnfants;
    private $_Prix_jour_van;
    private $_Nombre_de_nuit_van;
    private $_Prix_jour_tente;
    private $_Nombre_de_nuit_tente;
    private $_Email;
    /**
     * [__construct description]
     *
     * @param   [int]  $Tarif                 [$Tarif description]
     * @param   [int]  $NombrePlaces          [$NombrePlaces description]
     * @param   [int]  $NombreLugesEte        [$NombreLugesEte description]
     * @param   [int]  $NombreCasquesEnfants  [$NombreCasquesEnfants description]
     * @param   [int]  $Prix_jour_van         [$Prix_jour_van description]
     * @param   [int]  $Nombre_de_nuit_van    [$Nombre_de_nuit_van description]
     * @param   [int]  $Prix_jour_tente       [$Prix_jour_tente description]
     * @param   [int]  $Nombre_de_nuit_tente  [$Nombre_de_nuit_tente description]
     * @param   [string]  $Email                 [$Email description]
     * @param   int                            [ description]
     * @param   int  $Id                    [$Id description]
     *
     * @return  [type]                         [return description]
     */
    public function __construct(int $Tarif, $NombrePlaces, $NombreLugesEte, $NombreCasquesEnfants, $Prix_jour_van, $Nombre_de_nuit_van, $Prix_jour_tente, $Nombre_de_nuit_tente, $Email, int|string $Id = "à créer")
    {
        $this->setTarif($Tarif);
        $this->setNombrePlaces($NombrePlaces);
        $this->setNombreLugesEte($NombreLugesEte);
        $this->setNombreCasquesEnfants($NombreCasquesEnfants);
        $this->setPrix_jour_van($Prix_jour_van);
        $this->setNombre_de_nuit_van($Nombre_de_nuit_van);
        $this->setPrix_jour_tente($Prix_jour_tente);
        $this->setNombre_de_nuit_tente($Nombre_de_nuit_tente);
        $this->setEmail($Email);
        $this->setId($Id);
    }
    function getTarif()
    {
        return $this->_Tarif;
    }
    function setTarif($Tarif)
    {
        return $this->_Tarif = $Tarif;
    }

    function getNombrePlaces()
    {
        return $this->_NombrePlaces;
    }
    function setNombrePlaces($NombrePlaces)
    {
        return $this->_NombrePlaces = $NombrePlaces;
    }

    function getNombreLugesEte()
    {
        return $this->_NombreLugesEte;
    }
    function setNombreLugesEte($NombreLugesEte)
    {
        return $this->_NombreLugesEte = $NombreLugesEte;
    }

    function getNombreCasquesEnfants()
    {
        return $this->_NombreCasquesEnfants;
    }
    function setNombreCasquesEnfants($NombreCasquesEnfants)
    {
        return $this->_NombreCasquesEnfants = $NombreCasquesEnfants;
    }

    function getPrix_jour_van()
    {
        return $this->_Prix_jour_van;
    }
    function setPrix_jour_van($Prix_jour_van)
    {
        return $this->_Prix_jour_van = $Prix_jour_van;
    }

    function getNombre_de_nuit_van()
    {
        return $this->_Nombre_de_nuit_van;
    }
    function setNombre_de_nuit_van($Nombre_de_nuit_van)
    {
        return $this->_Nombre_de_nuit_van = $Nombre_de_nuit_van;
    }

    function getPrix_jour_tente()
    {
        return $this->_Prix_jour_tente;
    }
    function setPrix_jour_tente($Prix_jour_tente)
    {
        return $this->_Prix_jour_tente = $Prix_jour_tente;
    }

    function getNombre_de_nuit_tente()
    {
        return $this->_Nombre_de_nuit_tente;
    }
    function setNombre_de_nuit_tente($Nombre_de_nuit_tente)
    {
        return $this->_Nombre_de_nuit_tente = $Nombre_de_nuit_tente;
    }

    function getEmail()
    {
        return $this->_Email;
    }
    function setEmail($Email)
    {
        return $this->_Email = $Email;
    }

    function getId()
    {
        return $this->_Id;
    }

    public function setId(int|string $Id): voId
    {
        if (is_string($Id) && $Id == "à créer") {
            $this->_Id = $this->Id_Reservation();
        } else {
            $this->_Id = $Id;
        }
    }

    public function Id_Reservation()
    {
        $Database_reservation = new Database_reservation();
        $Reservations = $Database_reservation->Toute_Les_Reservations();
        $Ids = [];
        foreach ($Reservations as $Reservations) {
            $Ids[] = $Reservations->getId();
        }
        $i = 1;
        $unique = false;
        while ($unique === false) {
            if (in_array($i, $Ids)) {
                $i++;
                $unique = false;
            } else {
                $unique = true;
                break;
            }
        }
        return $i;
    }
    
    function getObject_Recap(): array
    {
        return [
            'Tarif_total' => $this->getTarif(),
            'Nombre_de_place_choisi' => $this->getNombrePlaces(),
            'Nombre_de_luge' => $this->getNombreLugesEte(),
            'Nombre_de_casque' => $this->getNombreCasquesEnfants(),
            'Prix_par_nuit_van' => $this->getPrix_jour_van(),
            'Nombre_de_nuit_van' => $this->getNombre_de_nuit_van(),
            'Prix_par_nuit_tente' => $this->getPrix_jour_tente(),
            'Nombre_de_nuit_tente' => $this->getNombre_de_nuit_tente(),
            'Email' => $this->getEmail(),
            'id' => $this->getId()
        ];
    }
}
