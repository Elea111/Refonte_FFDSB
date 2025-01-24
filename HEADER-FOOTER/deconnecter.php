<?php
session_start(); // Démarre ou reprend la session

// Détruit la session pour déconnecter l'utilisateur
session_unset();

$message = "Vous êtes désormais déconnecté";
$code = "success";
$_SESSION['flash'][$code] = $message;

// Récupère l'URL de redirection passée dans l'URL (paramètre redirect)
$redirect = $_GET['redirect'] ?? '../page-accueil/page-actualité-local'; // Par défaut, redirige vers index.php

// Redirige vers l'URL d'origine
header("Location: $redirect");
exit();
