<?php

namespace app\controllers;

use app\models\SoldeModel;
use app\models\UserModel;
use app\models\CadeauModel;
use Flight;
use Exception;

class UserController extends BaseController {
    private $userModel;
    private $cadeauModel;

    public function __construct($db) {
        parent::__construct();
        $this->userModel = new UserModel($db);
        $this->cadeauModel = new CadeauModel($db);
    }

    public function goToInscriptionPage() {
        $this->goToPage('inscription-user-form');
    }

    public function goToLoginPage() {
        $this->goToPage('login-user-form');
    }

    public function goToHomePage() {
        session_start();
        if (!isset($_SESSION['user'])) {
            Flight::redirect(BASE_URL . 'login-user-form');
            return;
        }

        $user = $_SESSION['user'];
        $soldeModel = new SoldeModel(Flight::db());
        $solde = $soldeModel->getSolde($user['id_user'])[0]['montant'] ?? 0;
        $affectations = $this->cadeauModel->getAffectationsByUser($user['id_user']);
        
        Flight::render('home', [
            'user' => $user,
            'solde' => $solde,
            'affectations' => $affectations
        ]);
    }

    public function inscription() {
        $nom = htmlspecialchars(trim($_POST['nom']));
        $mdp = htmlspecialchars(trim($_POST['mdp']));

        if (empty($nom) || empty($mdp)) {
            Flight::render('inscription-user-form', ['message' => 'Veuillez remplir tous les champs.']);
            return;
        }

        $insertion = $this->userModel->insertUser($nom, $mdp);
        
        if ($insertion) {
            Flight::redirect(BASE_URL . 'login-user-form');
        } else {
            Flight::render('inscription-user-form', ['message' => "Échec de l'inscription."]);
        }
    }

    public function login() {
        $nom = htmlspecialchars(trim($_POST['nom']));
        $mdp = htmlspecialchars(trim($_POST['mdp']));

        if (empty($nom) || empty($mdp)) {
            Flight::render('login-user-form', ['message' => 'Veuillez remplir tous les champs.']);
            return;
        }

        try {
            $user = $this->userModel->authentification($nom, $mdp);
            if ($user) {
                session_start();
                $_SESSION['connected'] = true;
                $_SESSION['user'] = $user;
                Flight::redirect(BASE_URL . 'home');
            } else {
                Flight::render('login-user-form', ['message' => 'Nom ou mot de passe incorrect.']);
            }
        } catch (Exception $e) {
            $message = $e->getMessage();
            Flight::render('login-user-form', ['message' => $message]);
        }
    }

    public function deconnexion() {
        session_start();
        session_unset();
        session_destroy();
        Flight::redirect(BASE_URL . 'login-user-form');
    }
}
