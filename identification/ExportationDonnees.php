<?php

require_once 'BddConnect.php';
use identification\BddConnect;

session_start();
if(!isset($_SESSION['user']['id'])){
  throw new \Exception("Utilisateur non enregistré");
}

// Vérifie si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Simule un ID utilisateur pour l'exemple (vous devez adapter selon votre système d'authentification)
    $utilisateurId = $_SESSION['user']['id'];

    // Liste des questions du formulaire
    $questions = [
        1 => 'question1',
        2 => 'question2',
        3 => 'question3',
        4 => 'question4',
        5 => 'question5',
        6 => 'question6',
        7 => 'question7',
        8 => 'question8',
        9 => 'question9',
        10 => 'question10',
        11 => 'question11',
        12 => 'question12',
        13 => 'question13',
        14 => 'question14',
        15 => 'question15'
    ];

    $bdd = new BddConnect();
    $pdo = $bdd->connexion();
    // Prépare la requête pour insérer les réponses
    $stmt = $pdo->prepare('INSERT INTO reponses_utilisateurs (id_utilisateur, id_question, reponse) VALUES (:id_utilisateur, :id_question, :reponse)');

    // Parcourt toutes les questions pour insérer les réponses
    foreach ($questions as $questionId => $questionKey) {
        if (isset($_POST[$questionKey])) {
            $reponse = $_POST[$questionKey];
            $stmt->execute([
                ':id_utilisateur' => $utilisateurId,
                ':id_question' => $questionId,
                ':reponse' => $reponse
            ]);
        }
    }

    $message = "Vos réponses ont bien été enregistré";
    $code = "success";
    $_SESSION['flash'][$code] = $message;
    $direction = $_SERVER['HTTP_ORIGIN'];
    header("Location: $direction/page-accueil/page-actualité-local.php");
}
