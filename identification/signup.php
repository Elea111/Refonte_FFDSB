<?php
session_start();

require_once 'BddConnect.php';
require_once 'UserRepository.php';
require_once 'Authentification.php';
require_once 'Utilisateurs.php';

use identification\Authentification;
use identification\BddConnect;
use identification\UserRepository;

    $bdd = new BddConnect();
    $pdo = $bdd->connexion();

    $userRepository = new UserRepository($pdo);
    $auth = new Authentification($userRepository);
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $retour = $auth->register($_POST['signup-email'], $_POST['signup-pwd'], $_POST['signup-verifpwd'], $_POST['signup-last']);
        $message = "Vous êtes enregistré. Vous pouvez vous authentifier";
        $code = "success";
    }
    catch(Exception $e) {
        $retour = false;
        $message = "Enregistrement impossible : " . $e->getMessage();
        $code = "warning";
    }
    $_SESSION['flash'][$code] = $message;

    $direction = $_SERVER['HTTP_ORIGIN'];
    header("Location: $direction/identification/page-identification.php");
}

