<?php
namespace app\controllers;
use Flight;

class BaseController {
    public function __construct() {
        // Initialisation si nécessaire
    }

    public function goToPage($page) {
        // Ajoute automatiquement BASE_URL à la page demandée
        Flight::render(BASE_URL . '/' . $page);
    }
}
