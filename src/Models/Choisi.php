<?php
namespace Models;

class Choisi{

    private $ID_PASS;
    private $ID_RESERVATION;
    private $DATE_PASS;

    function __construct(array $datas){
        foreach ($datas as $key => $value) {
            $this->$key = $value;
        }
    }





    /**
     * Get the value of ID_PASS
     */
    public function getIDPASS()
    {
        return $this->ID_PASS;
    }

    /**
     * Set the value of ID_PASS
     */
    public function setIDPASS($ID_PASS): self
    {
        $this->ID_PASS = $ID_PASS;

        return $this;
    }


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
     * Get the value of DATE_PASS
     */
    public function getDATEPASS()
    {
        return $this->DATE_PASS;
    }

    /**
     * Set the value of DATE_PASS
     */
    public function setDATEPASS($DATE_PASS): self
    {
        $this->DATE_PASS = $DATE_PASS;

        return $this;
    }
}

    