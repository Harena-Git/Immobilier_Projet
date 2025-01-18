<?php
namespace app\models;
use PDO;
use Exception;

class AdminModel extends BaseModel{
    function __construct($db){
        parent::__construct($db);
    }
     /**
     * Insère un nouvel admin
     */
    public function insertAdmin($Nom, $Pwd){
        $data = [
            'Nom' => $Nom,
            'Pwd' => $Pwd
        ];

        return $this->insert($data, 'Noel_Admin');
    }

    /**
     * Authentifie un admin
     */
    public function authentification($Nom, $Pwd){
        $criteria = ['nom' => $Nom, 'pwd' => $Pwd];
        $results = $this->findBy($criteria, 'Noel_Admin');

        if (count($results) === 1) {
            return $results[0];
        }

        throw new Exception("Nom d'admin ou mot de passe incorrect.");
    }
}