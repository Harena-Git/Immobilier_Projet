<?php
namespace app\models;
use PDO;
use Exception;
use Flight;
class UserModel extends BaseModel{
    function __construct($db){
        parent::__construct($db);
    }

   /**
     * Insère un nouvel utilisateur
     */
    public function insertUser($nom_user, $pwd_user)
    {
        $data = [
            'nom_user' => $nom_user,
            'pwd_user' => $pwd_user
        ];
        
        $user = $this->insert($data, 'Noel_Utilisateur');
        $id_user = $this->db->lastInsertId();
        $solde = [
            'id_user' => $id_user,
            'montant' => 0
        ];

        $this->insert($solde, 'Noel_Solde');
        
        return $user;
    }

    /**
     * Authentifie un utilisateur
     */
    public function authentification($nom_user, $pwd_user)
    {
        $criteria = ['nom_user' => $nom_user, 'pwd_user' => $pwd_user];
        $results = $this->findBy($criteria, 'Noel_Utilisateur');

        if (count($results) === 1) {
            return $results[0];
        }

        throw new Exception("Nom d'utilisateur ou mot de passe incorrect.");
    }
}