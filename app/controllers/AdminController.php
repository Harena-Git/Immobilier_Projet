<?php

namespace app\controllers;

use app\models\AdminModel;
use app\models\CadeauModel;
use Flight;
use Exception;

class AdminController extends BaseController {
    private $adminModel;

    public function __construct($db) {
        parent::__construct();
        $this->adminModel = new AdminModel($db);
    }

    public function goToInscriptionPage() {
        $this->goToPage('inscription-admin-form');
    }

    public function goToLoginPage() {
        $this->goToPage('login-admin-form');
    }

    public function login() {
        $nom = $_POST['nom'];
        $mdp = $_POST['mdp'];

        try {
            $admin = $this->adminModel->authentification($nom, $mdp);
            if ($admin) {
                session_start();
                $_SESSION['connected_admin'] = true;
                $_SESSION['admin'] = $admin;
                Flight::redirect(BASE_URL . 'home-admin');
            }
        } catch (Exception $e) {
            $message = $e->getMessage();
            Flight::render('login-admin-form', ['message' => $message]);
        }
    }

    public function goToHomePage() {
        session_start();
        if (!isset($_SESSION['connected_admin']) || $_SESSION['connected_admin'] == false) {
            Flight::redirect(BASE_URL . 'login-admin-form');
            return;
        }
        $admin = $_SESSION['admin'];
        $cadeauModel = new CadeauModel(Flight::db());
        $cadeaux = $cadeauModel->getAllCadeaux();
        Flight::render('home-admin', ['admin' => $admin, 'cadeaux' => $cadeaux]);
    }

    public function deconnexion() {
        session_start();
        session_destroy();
        Flight::redirect(BASE_URL . '/');
    }
}
