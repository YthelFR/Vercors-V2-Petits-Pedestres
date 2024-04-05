<?php

namespace src\Models;
use src\Services\Hydratation;


class Reservation
{
    private $ID_RESERVATION;
    private $ENFANT_RESERVATION;
    private $NOMBRECASQUES_RESERVATION;
    private $NOMBRELUGES_RESERVATION;
    private $NOMBRE_RESERVATION;
    private $ID_USER;


    use Hydratation;

    /**
     * Get the value of ID_RESERVATION
     */
    public function getIDRESERVATION()
    {
        return $this->ID_RESERVATION;
    }

    /**
     * Set the value of ID_RESERVATION
     */
    public function setIDRESERVATION($ID_RESERVATION): self
    {
        $this->ID_RESERVATION = $ID_RESERVATION;

        return $this;
    }

    /**
     * Get the value of ENFANT_RESERVATION
     */
    public function getENFANTRESERVATION()
    {
        return $this->ENFANT_RESERVATION;
    }

    /**
     * Set the value of ENFANT_RESERVATION
     */
    public function setENFANTRESERVATION($ENFANT_RESERVATION): self
    {
        $this->ENFANT_RESERVATION = $ENFANT_RESERVATION;

        return $this;
    }

    /**
     * Get the value of NOMBRECASQUES_RESERVATION
     */
    public function getNOMBRECASQUESRESERVATION()
    {
        return $this->NOMBRECASQUES_RESERVATION;
    }

    /**
     * Set the value of NOMBRECASQUES_RESERVATION
     */
    public function setNOMBRECASQUESRESERVATION($NOMBRECASQUES_RESERVATION): self
    {
        $this->NOMBRECASQUES_RESERVATION = $NOMBRECASQUES_RESERVATION;

        return $this;
    }

    /**
     * Get the value of NOMBRELUGES_RESERVATION
     */
    public function getNOMBRELUGESRESERVATION()
    {
        return $this->NOMBRELUGES_RESERVATION;
    }

    /**
     * Set the value of NOMBRELUGES_RESERVATION
     */
    public function setNOMBRELUGESRESERVATION($NOMBRELUGES_RESERVATION): self
    {
        $this->NOMBRELUGES_RESERVATION = $NOMBRELUGES_RESERVATION;

        return $this;
    }

    /**
     * Get the value of NOMBRE_RESERVATION
     */
    public function getNOMBRERESERVATION()
    {
        return $this->NOMBRE_RESERVATION;
    }

    /**
     * Set the value of NOMBRE_RESERVATION
     */
    public function setNOMBRERESERVATION($NOMBRE_RESERVATION): self
    {
        $this->NOMBRE_RESERVATION = $NOMBRE_RESERVATION;

        return $this;
    }

    /**
     * Get the value of ID_USER
     */
    public function getIDUSER()
    {
        return $this->ID_USER;
    }

    /**
     * Set the value of ID_USER
     */
    public function setIDUSER($ID_USER): self
    {
        $this->ID_USER = $ID_USER;

        return $this;
    }
}