<?php


class Nuitee{

    private $ID_NUITEE;
    private $ID_RESERVATION;
    private $DATE_NUITEE;


function __construct (array $datas){
    foreach ($datas as $key => $value) {
        $this->$key = $value;
    }
}


    /**
     * Get the value of ID_NUITEE
     */
    public function getIDNUITEE()
    {
        return $this->ID_NUITEE;
    }

    /**
     * Set the value of ID_NUITEE
     */
    public function setIDNUITEE($ID_NUITEE): self
    {
        $this->ID_NUITEE = $ID_NUITEE;

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
     * Get the value of DATE_NUITEE
     */
    public function getDATENUITEE()
    {
        return $this->DATE_NUITEE;
    }

    /**
     * Set the value of DATE_NUITEE
     */
    public function setDATENUITEE($DATE_NUITEE): self
    {
        $this->DATE_NUITEE = $DATE_NUITEE;

        return $this;
    }
}