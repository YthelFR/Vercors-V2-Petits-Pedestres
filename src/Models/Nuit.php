<?php

class Nuit{

    private $ID_NUIT;
    private $TYPE_NUIT;
    private $PRIX_NUIT;


    function __construct(array $datas){ 
        foreach ($datas as $key => $value) {
            $this->$key = $value;
        }
}

    /**
     * Get the value of ID_NUIT
     */
    public function getIDNUIT()
    {
        return $this->ID_NUIT;
    }

    /**
     * Set the value of ID_NUIT
     */
    public function setIDNUIT($ID_NUIT): self
    {
        $this->ID_NUIT = $ID_NUIT;

        return $this;
    }

    /**
     * Get the value of TYPE_NUIT
     */
    public function getTYPENUIT()
    {
        return $this->TYPE_NUIT;
    }

    /**
     * Set the value of TYPE_NUIT
     */
    public function setTYPENUIT($TYPE_NUIT): self
    {
        $this->TYPE_NUIT = $TYPE_NUIT;

        return $this;
    }

    /**
     * Get the value of PRIX_NUIT
     */
    public function getPRIXNUIT()
    {
        return $this->PRIX_NUIT;
    }

    /**
     * Set the value of PRIX_NUIT
     */
    public function setPRIXNUIT($PRIX_NUIT): self
    {
        $this->PRIX_NUIT = $PRIX_NUIT;

        return $this;
    }
}