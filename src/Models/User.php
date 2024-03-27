<?php

namespace src\Models;

class User
{
    private $_id;
    private $_Nom;
    private $_Prenom;
    private $_Mail;
    private $_password;
    // #
    private $_logged;
    private $_role;
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

    public function __construct(string $Nom, string $Prenom, string $Mail, string $password, int|string $id = "à créer", bool $logged = false, string $role = "user")
    {
        $this->setId($id);
        $this->setNom($Nom);
        $this->setPrenom($Prenom);
        $this->setMail($Mail);
        $this->setpassword($password);
        $this->setLogged($logged);
        $this->setRole($role);
    }

    public function getId(): int
    {
        return $this->_id;
    }
    public function setId(int|string $id): void
    {
        if (is_string($id) && $id == "à créer") {
            $this->_id = $this->id_utilisateur();
        } else {
            $this->_id = $id;
        }
    }

    public function getNom(): string
    {
        return $this->_Nom;
    }
    public function setNom(string $Nom)
    {
        $this->_Nom = $Nom;
    }

    public function getPrenom(): string
    {
        return $this->_Prenom;
    }
    public function setPrenom(string $Prenom)
    {
        $this->_Prenom = $Prenom;
    }

    public function getpassword(): string
    {
        return $this->_password;
    }
    public function setpassword(string $password)
    {
        $this->_password = $password;
    }

    public function getMail(): string
    {
        return $this->_Mail;
    }

    public function setMail(string $Mail)
    {
        $this->_Mail = $Mail;
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

    public function getRole(): string
    {
        return $this->_role;
    }

    public function setRole(string $role): void
    {
        $this->_role = $role;
    }

    public function admin()
    {
        if ($this->getRole() == "admin") {
            return true;
        } else {
            return false;
        }
    }

    public function getObjectToArray(): array
    {
        return [
            'id' => $this->getId(),
            'Nom' => $this->getNom(),
            'Prenom' => $this->getPrenom(),
            'Mail' => $this->getMail(),
            'password' => $this->getpassword(),
            'logged' => $this->getLogged(),
            'role' => $this->getRole()
        ];
    }

    public function passwordverify(string $password): bool
    {
        return password_verify($password, $this->getpassword());
    }

    private function id_utilisateur()
    {
        $Database = new Database;
        $utilisateurs = $Database->ToutLesUtilisateurs();
        $Ids = [];
        foreach ($utilisateurs as $utilisateur) {
            $Ids[] = $utilisateur->getId();
        }
        $i = 1;
        $unique = false;
        while ($unique === false) {
            if (in_array($i, $Ids)) {
                $i++;
            } else {
                $unique = true;
            }
        }
        return $i;
    }
}
