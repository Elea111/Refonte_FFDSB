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
        $retour = $auth->authenticate($_POST['signin-email'], $_POST['signin-pwd']);
        $message = "Vous êtes desormais authentifié";
        $code = "success";
        $_SESSION['flash'][$code] = $message;
        $_SESSION['user']['id'] = $retour->getId();
        $_SESSION['user']['role'] = $retour->getRole();
        $direction = $_SERVER['HTTP_ORIGIN'];
        header("Location: $direction/HEADER-FOOTER/header.php");
        //header("Location: $direction/identification/page-identification.php");
    }
    catch(Exception $e) {
        $retour = false;
        $message = "Authentification impossible : " . $e->getMessage();
        $code = "warning";
        $_SESSION['flash'][$code] = $message;
        $direction = $_SERVER['HTTP_ORIGIN'];
        header("Location: $direction/identification/page-identification.php");
    }
}