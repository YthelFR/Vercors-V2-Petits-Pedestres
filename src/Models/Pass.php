<?php
namespace Models;

class Pass{

    private $ID_PASS;
    private $CHOIX_PASS;
    private $TARIF_PASS;
    private $REDUIT_PASS;

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
     * Get the value of CHOIX_PASS
     */
    public function getCHOIXPASS()
    {
        return $this->CHOIX_PASS;
    }

    /**
     * Set the value of CHOIX_PASS
     */
    public function setCHOIXPASS($CHOIX_PASS): self
    {
        $this->CHOIX_PASS = $CHOIX_PASS;

        return $this;
    }

    

    /**
     * Get the value of TARIF_PASS
     */
    public function getTARIFPASS()
    {
        return $this->TARIF_PASS;
    }

    /**
     * Set the value of TARIF_PASS
     */
    public function setTARIFPASS($TARIF_PASS): self
    {
        $this->TARIF_PASS = $TARIF_PASS;

        return $this;
    }

    

    /**
     * Get the value of REDUIT_PASS
     */
    public function getREDUITPASS()
    {
        return $this->REDUIT_PASS;
    }

    /**
     * Set the value of REDUIT_PASS
     */
    public function setREDUITPASS($REDUIT_PASS): self
    {
        $this->REDUIT_PASS = $REDUIT_PASS;

        return $this;
    }
}
