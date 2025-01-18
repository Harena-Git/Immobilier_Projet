<?php
namespace app\models;
use PDO;
class BaseModel
{
    protected $db; // Instance PDO
   

    public function __construct($db)
    {
        $this->db = $db;
    }

    /**
     * Récupère toutes les entrées de la table
     */
    public function selectAll($columns ,$table)
    {
        $sql = "SELECT $columns FROM {$table}";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Récupère une entrée par son ID
     */
    public function getById($id,$table)
    {
        $sql = "SELECT * FROM {$table} WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Insère une nouvelle entrée dans la table
     */
    public function insert($data,$table)
    {
        $columns = implode(',', array_keys($data));
        $placeholders = implode(',', array_map(fn($key) => ":$key", array_keys($data)));
        $sql = "INSERT INTO {$table} ($columns) VALUES ($placeholders)";

        $stmt = $this->db->prepare($sql);
        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }

        return $stmt->execute();
    }

    /**
     * Met à jour une entrée existante
     */
    public function update($criteria, $data,$table)
    {
        $updates = implode(',', array_map(fn($key) => "$key = :$key", array_keys($data)));
        $conditions = implode(' AND ', array_map(fn($cle) => "$cle = :$cle", array_keys($criteria)));
        $sql = "UPDATE {$table} SET $updates WHERE $conditions";

        $stmt = $this->db->prepare($sql);
        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        foreach ($criteria as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        

        return $stmt->execute();
    }

    /**
     * Supprime une entrée par son ID
     */
    public function delete($id,$table)
    {
        $sql = "DELETE FROM {$table} WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    /**
     * Rechercher dans la table avec des critères personnalisés
     */
    public function findBy($criteria ,$table)
    {
        $conditions = implode(' AND ', array_map(fn($key) => "$key = :$key", array_keys($criteria)));
        $sql = "SELECT * FROM {$table} WHERE $conditions";

        $stmt = $this->db->prepare($sql);
        foreach ($criteria as $key => $value) {
             $value = $value."";
            $stmt->bindValue(":$key", $value);
        }

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Retourne les id_cadeau dans Noel_Affectation correspondant à un utilisateur et une id_affectation donnés.
     */
    public function getCadeauIdsByUserAndAffectation($idUser, $idAffectation)
    {
        return $this->findBy(['id_user' => $idUser, 'id_affectation' => $idAffectation], 'Noel_Affectation');
    }

    /**
     * Retourne les cadeaux dans Noel_Cadeau correspondant à un tableau de id_cadeau.
     */
    public function getCadeauxByIds($cadeauIds)
    {
        $placeholders = implode(',', array_fill(0, count($cadeauIds), '?'));
        $sql = "SELECT * FROM Noel_Cadeau WHERE id_cadeau IN ($placeholders)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute($cadeauIds);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
}

// Exemple d'utilisation dans une classe enfant
// class UserModel extends BaseModel
// {
//     public function __construct($db)
//     {
//         parent::__construct($db, 'users'); // Table "users"
//     }
// }

// // Intégration avec FlightPHP
// Flight::register('db', 'PDO', ['mysql:host=localhost;dbname=testdb', 'root', '']);
// Flight::register('userModel', 'UserModel', [Flight::db()]);

// // Exemple d’appels pour chaque fonction :
// Flight::route('/users', function () {
//     $userModel = Flight::userModel();

//     // selectAll
//     $users = $userModel->selectAll();
//     Flight::json($users);

//     // getById
//     $user = $userModel->getById(1);
//     Flight::json($user);

//     // insert
//     $newUser = [
//         'name' => 'John Doe',
//         'email' => 'john@example.com'
//     ];
//     $userModel->insert($newUser);
//     Flight::json(['message' => 'User added']);

//     // update
//     $updatedUser = [
//         'name' => 'John Smith',
//         'email' => 'johnsmith@example.com'
//     ];
//     $userModel->update(1, $updatedUser);
//     Flight::json(['message' => 'User updated']);

//     // delete
//     $userModel->delete(2);
//     Flight::json(['message' => 'User deleted']);

//     // findBy
//     $criteria = ['email' => 'johnsmith@example.com'];
//     $foundUsers = $userModel->findBy($criteria);
//     Flight::json($foundUsers);
// });