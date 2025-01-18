<?php

// Declaration de use ::
use controllers\AdminController;
use controllers\BaseController;
use controllers\UserController;

use flight\Engine;
use flight\net\Router;
//use Flight;

/** 
 * @var Router $router 
 * @var Engine $app
 */
/*$router->get('/', function() use ($app) {
	$Trajet_Controller = new TrajetController($app);
	$app->render('welcome', [ 'message' => 'It works!!' ]);
});*/

$User_Controller = new UserController();
$Compte_Controller = new CompteController();
$Gift_Controller = new GiftController();

$router->get('/hello-world/@name', function($name) {
	echo '<h1>Hello world! Oh hey '.$name.'!</h1>';
});
