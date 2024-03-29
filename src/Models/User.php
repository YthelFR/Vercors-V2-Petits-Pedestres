<?php

namespace src\Models;

class User
{
    private $ID_USER;
    private $NOM_USER;
    private $PRENOM_USER;
    private $ADRESSE_USER;
    private $IS_ADMIN;
    private $DATE_RGPD;
    private $PASSWORD_USER;
    private $EMAIL_USER;
    private $TELEPHONE_USER;
    private $_logged;

    /**
     * [__construct description]
     *
     * @param   string  $Nom       [$Nom description]
     * @param   string  $Prenom    [$Prenom description]
     * @param   string  $password  [$password description]
     * @param   string  $Mail      [$Mail description]
     * @param   int                [ description]
     * @param   string  $id        [$id description]
     * @param   bool    $logged    [$logged description]
     * @param   false              [ description]
     *
     * @return  [type]             [return description]
     */

    public function __construct(array $datas)
    {
        foreach ($datas as $key => $value) {
            $this->$key = $value;
        }
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

    /**
     * Get the value of NOM_USER
     */
    public function getNOMUSER()
    {
        return $this->NOM_USER;
    }

    /**
     * Set the value of NOM_USER
     */
    public function setNOMUSER($NOM_USER): self
    {
        $this->NOM_USER = $NOM_USER;

        return $this;
    }

    /**
     * Get the value of PRENOM_USER
     */
    public function getPRENOMUSER()
    {
        return $this->PRENOM_USER;
    }

    /**
     * Set the value of PRENOM_USER
     */
    public function setPRENOMUSER($PRENOM_USER): self
    {
        $this->PRENOM_USER = $PRENOM_USER;

        return $this;
    }

    /**
     * Get the value of ADRESSE_USER
     */
    public function getADRESSEUSER()
    {
        return $this->ADRESSE_USER;
    }

    /**
     * Set the value of ADRESSE_USER
     */
    public function setADRESSEUSER($ADRESSE_USER): self
    {
        $this->ADRESSE_USER = $ADRESSE_USER;

        return $this;
    }

    #
    public function getLogged(): bool
    {
        return $this->_logged;
    }

    public function setLogged(bool $logged)
    {
        $this->_logged = $logged;
    }

    public function logIn()
    {
        $this->setLogged(true);
    }
    public function logOut()
    {
        $this->setLogged(false);
    }

    public function getISADMIN(): bool
    {
        return $this->IS_ADMIN;
    }

    public function setISADMIN(bool $IS_ADMIN): void
    {
        $this->IS_ADMIN = $IS_ADMIN;
    }

    public function admin()
    {
        if ($this->getISADMIN() == "admin") {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get the value of DATE_RGPD
     */
    public function getDATERGPD()
    {
        return $this->DATE_RGPD;
    }

    /**
     * Set the value of DATE_RGPD
     */
    public function setDATERGPD($DATE_RGPD): self
    {
        $this->DATE_RGPD = $DATE_RGPD;

        return $this;
    }

    /**
     * Get the value of PASSWORD_USER
     */
    public function getPASSWORDUSER()
    {
        return $this->PASSWORD_USER;
    }

    /**
     * Set the value of PASSWORD_USER
     */
    public function setPASSWORDUSER($PASSWORD_USER): self
    {
        $this->PASSWORD_USER = $PASSWORD_USER;

        return $this;
    }

    /**
     * Get the value of EMAIL_USER
     */
    public function getEMAILUSER()
    {
        return $this->EMAIL_USER;
    }

    /**
     * Set the value of EMAIL_USER
     */
    public function setEMAILUSER($EMAIL_USER): self
    {
        $this->EMAIL_USER = $EMAIL_USER;

        return $this;
    }

    /**
     * Get the value of TELEPHONE_USER
     */
    public function getTELEPHONEUSER()
    {
        return $this->TELEPHONE_USER;
    }

    /**
     * Set the value of TELEPHONE_USER
     */
    public function setTELEPHONEUSER($TELEPHONE_USER): self
    {
        $this->TELEPHONE_USER = $TELEPHONE_USER;

        return $this;
    }

    public function hashPassword($password)
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }
}
