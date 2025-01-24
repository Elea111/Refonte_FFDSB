<?php
session_start();

require_once '../identification/BddConnect.php';
use identification\BddConnect;

$bdd = new BddConnect();
$pdo = $bdd->connexion();

if(!isset($_SESSION['user']['id'])){
    throw new \Exception("Utilisateur non enregistré");
}

// Vérification dans la table reponses_question
$stmt = $pdo->prepare("SELECT COUNT(*) AS nombre_reponses FROM reponses_utilisateurs WHERE id_utilisateur = :user_id");
$stmt->execute(['user_id' => $_SESSION['user']['id']]);
$result = $stmt->fetch(PDO::FETCH_ASSOC);

if ($result['nombre_reponses'] > 0) {
    $message = "Vous avez déjà réalisé le QCM";
    $code = "warning";
    $_SESSION['flash'][$code] = $message;

    $redirect = $_GET['redirect'] ?? '../page-accueil/page-actualité-local.php';
    header("Location: $redirect");
}
include '../HEADER-FOOTER/header.php';
?>

<link rel="stylesheet" href="../../refonte_ffdsb/refonte_FFDSB/Enquete/enquete.css">

<div class="titre">

    <a href="/PAGE%20ETHIQUE/page%20ethique.html">
        <h1> Fédération française pour le don du sang </h1>
    </a>
    <a href="/PAGE%20ETHIQUE/page%20ethique.html">
        <p class="p4">le seul organisme de France représentant tous les donneurs de sang auprès des pouvoirs</p>
    </a>
</div>


    <h1>Questionnaire</h1>
    <form action="../identification/ExportationDonnees.php" method="POST">
    
    <!-- Thématique 1 : Qui a répondu à l'enquête -->
    
    <section id="theme1" class="theme">
    <h2 style="background-color: #01628D; color: white; padding: 10px; border-radius: 10px 10px 0 0;">1 / Qui a répondu à l'enquête </h2>
    <div class="question-box">
        <!-- Question 1 -->
        <label for="question1">1. Quel âge avez-vous ?</label><br><br>
        <input type="radio" name="question1" value="Moins de 18 ans" required> Moins de 18 ans <br><br>
        <input type="radio" name="question1" value="18-25 ans"> 18-25 ans <br><br>
        <input type="radio" name="question1" value="26-40"> 26-40 ans <br><br>
        <input type="radio" name="question1" value="41-60"> 41-60 ans <br><br><br>
        <input type="radio" name="question1" value="Plus de 60 ans"> Plus de 60 ans <br><br><br>
    </div>
        
    <div class="question-box">
        <!-- Question 2 -->
        <label for="question2">2. Quel est votre genre ?</label><br><br>
        <input type="radio" name="question2" value="Homme" required> Homme <br><br>
        <input type="radio" name="question2" value="Femme"> Femme <br><br>
        <input type="radio" name="question2" value="Non-Binaire"> Non-Binaire <br><br>
        <input type="radio" name="question2" value="Préfère ne pas répondre"> Préfère ne pas répondre <br><br><br>
    </div> 
    
    <div class="question-box">       
        <!-- Question 3 -->
        <label for="question3">3. Quel est votre groupe sanguin ?</label><br><br>
        <select id="question3" name="question3" required>
          <option value="" disabled selected>Choisissez votre groupe sanguin</option>
          <option value="A+">A+</option>
          <option value="A-">A-</option>
          <option value="B+">B+</option>
          <option value="B-">B-</option>
          <option value="AB+">AB+</option>
          <option value="AB-">AB-</option>
          <option value="O+">O+</option>
          <option value="O-">O-</option>
          <option value="Je ne sais pas">Je ne sais pas</option>
        </select>
        <br><br>
    </div>
    <div class="button-container">
    <button type="button" onclick="showTheme(2)">Suivant</button>
    </div>
</section>
 
 <!-- Thématique 2 : Lieu de vie -->
<section id="theme2" class="theme">
    <h2 style="background-color: #01628D; color: white; padding: 10px; border-radius: 10px 10px 0 0;"> 2 / Lieu de vie </h2>
    <div class="question-box">       
        <!-- Question 4 -->
        <label for="question4">4. Dans quel région habitez-vous ?</label><br><br>
        <select id="regions" name="region">
        <option value="" disabled selected>Choisissez votre région</option>
        <option value="01">Auvergne-Rhône-Alpes</option>
        <option value="02">Bourgogne-Franche-Comté</option>
        <option value="03">Bretagne</option>
        <option value="04">Centre-Val de Loire</option>
        <option value="05">Corse</option>
        <option value="06">Grand Est</option>
        <option value="07">Hauts-de-France</option>
        <option value="08">Île-de-France</option>
        <option value="09">Normandie</option>
        <option value="10">Nouvelle-Aquitaine</option>
        <option value="11">Occitanie</option>
        <option value="12">Pays de la Loire</option>
        <option value="13">Provence-Alpes-Côte d'Azur</option>
        <option value="14">Guadeloupe</option>
        <option value="15">Martinique</option>
        <option value="16">Guyane</option>
        <option value="17">La Réunion</option>
        <option value="18">Mayotte</option>
        </select>
        <br><br>
        </div>
        
    <div class="question-box">
        <!-- Question 5 -->
        <label for="question5">5. Quel est votre type de résidence ?</label><br><br>
        <input type="radio" name="question5" value="Maison" required> Maison <br><br>
        <input type="radio" name="question5" value="Appartement"> Appartement <br><br>
        <input type="radio" name="question5" value="Colocation"> Colocation <br><br>
        <input type="radio" name="question5" value="Autre"> Autre <br><br>
        </div>
        
    <div class="question-box">
        <!-- Question 6 -->
        <label for="question6">6. Depuis combien de temps habitez-vous à cette adresse ?</label><br><br>
        <input type="radio" name="question6" value="Moins de 6 mois" required> Moins de 6 mois <br><br>
        <input type="radio" name="question6" value="6 mois à 2 ans"> 6 mois à 2 ans <br><br>
        <input type="radio" name="question6" value="2 à 5 ans"> 2 à 5 ans <br><br>
        <input type="radio" name="question6" value="Plus de 5 ans"> Plus de 5 ans <br><br>
        </div>
        <div class="button-container">
        <button type="button" onclick="showTheme(1)">Précédent</button>
        <button type="button" onclick="showTheme(3)">Suivant</button>
        </div>
</section>
 
 <!-- Thématique 3 : Insertions professionnelle et sociale -->
<section id="theme3" class="theme">
    <h2 style="background-color: #01628D; color: white; padding: 10px; border-radius: 10px 10px 0 0;"> 3 / Insertions professionnelle et sociale </h2>
    <div class="question-box">       
        <!-- Question 7 -->
        <label for="question7">7. Quel est votre statut professionnel ?</label><br><br>
        <input type="radio" name="question7" value="Étudiant" required> Étudiant <br><br>
        <input type="radio" name="question7" value="Salarié"> Salarié <br><br>
        <input type="radio" name="question7" value="Indépendant"> Indépendant <br><br>
        <input type="radio" name="question7" value="Retraité"> Retraité <br><br>
        <input type="radio" name="question7" value="Sans emploi"> Sans emploi <br><br>
    </div>
    
    <div class="question-box">
        <!-- Question 8 -->
        <label for="question8">8. Avez-vous des activités associatives ou bénévoles ?</label><br><br>
        <input type="radio" name="question8" value="Oui" required> Oui <br><br>
        <input type="radio" name="question8" value="Non"> Non <br><br>
    </div>
    
    <div class="question-box">    
        <!-- Question 9 -->
        <label for="question9">9. Combien d'heures par semaine consacrez-vous à des activités sociales (association, club, bénévolat, etc.) ?</label><br><br>
        <input type="radio" name="question9" value="Aucune" required> Aucune <br><br>
        <input type="radio" name="question9" value="Moins de 2 heures"> Moins de 2 heures <br><br>
        <input type="radio" name="question9" value="2 à 5 heures"> 2 à 5 heures <br><br>
        <input type="radio" name="question9" value="Plus de 5 heures"> Plus de 5 heures <br><br>
    </div>
    <div class="button-container">
    <button type="button" onclick="showTheme(2)">Précédent</button>
    <button type="button" onclick="showTheme(4)">Suivant</button>
    </div>
</section>

<!-- Thématique 4 : Qualité de vie -->
<section id="theme4" class="theme">
    <h2 style="background-color: #01628D; color: white; padding: 10px; border-radius: 10px 10px 0 0;"> 4 / Qualité de vie  </h2>
    <div class="question-box">       
        <!-- Question 10 -->
        <label for="question10">10. Comment évaluez-vous votre état de santé général ?</label><br><br>
        <input type="radio" name="question10" value="Très bon" required> Très bon <br><br>
        <input type="radio" name="question10" value="Bon"> Bon <br><br>
        <input type="radio" name="question10" value="Moyen"> Moyen <br><br>
        <input type="radio" name="question10" value="Mauvais"> Mauvais <br><br>
    </div>
    
    <div class="question-box">
        <!-- Question 11 -->
        <label for="question11">11. Êtes-vous satisfait de votre accès aux soins médicaux ?</label><br><br>
        <input type="radio" name="question11" value="Oui, totalement" required> Oui, totalement <br><br>
        <input type="radio" name="question11" value="Plutôt oui"> Plutôt oui <br><br>
        <input type="radio" name="question11" value="Plutôt non"> Plutôt non <br><br>
        <input type="radio" name="question11" value="Non, pas du tout"> Non, pas du tout <br><br>
    </div>
    
    <div class="question-box">
        <!-- Question 12 -->
        <label for="question12">12. Pratiquez-vous une activité physique régulière ?</label><br><br>
        <input type="radio" name="question12" value="Oui, plusieurs fois par semaine" required> Oui, plusieurs fois par semaine <br><br>
        <input type="radio" name="question12" value="Oui, une fois par semaine"> Oui, une fois par semaine <br><br>
        <input type="radio" name="question12" value="Rarement"> Rarement <br><br>
        <input type="radio" name="question12" value="Jamais"> Jamais <br><br>
    </div>   
       
    <div class="question-box">
        <!-- Question 13 -->
        <label for="question13">13. Avez-vous des conditions médicales ou des antécédents médicaux dont nous devrions être informés ?</label><br><br>
        <input type="radio" name="question13" value="Oui" required> Oui <br><br>
        <input type="radio" name="question13" value="Non"> Non <br><br>
        <input type="radio" name="question13" value="Préfère ne pas répondre"> Préfère ne pas répondre <br><br>
    </div>
    <div class="button-container">
    <button type="button" onclick="showTheme(3)">Précédent</button>
    <button type="button" onclick="showTheme(5)">Suivant</button>
    </div>
</section>

<!-- Thématique 5 : Besoin de soutien -->
<section id="theme5" class="theme">
    <h2 style="background-color: #01628D; color: white; padding: 10px; border-radius: 10px 10px 0 0;"> 5 / Besoin de soutien </h2>
    <div class="question-box"> 
        <!-- Question 14 -->
        <label for="question14">14. Connaissez-vous les critères d’éligibilité pour donner votre sang ?</label><br><br>
        <input type="radio" name="question14" value="Oui, parfaitement" required> Oui, parfaitement <br><br>
        <input type="radio" name="question14" value="Oui, mais partiellement"> Oui, mais partiellement <br><br>
        <input type="radio" name="question14" value="Non, pas du tout"> Non, pas du tout <br><br>
    </div>
    
    <div class="question-box"> 
        <!-- Question 15 -->
        <label for="question15">15. Seriez-vous intéressé par des séances d’information ou des campagnes de sensibilisation sur le don de sang ?</label><br><br>
        <input type="radio" name="question15" value="Oui" required> Oui <br><br>
        <input type="radio" name="question15" value="Non"> Non <br><br>
        <input type="radio" name="question15" value="Peut-être"> Peut-être <br><br>
    </div>
    
    <!-- Soumission -->
    <div class="button-container">
        <button type="button" onclick="showTheme(4)">Précédent</button>
        <button type="submit">Envoyer</button><br><br><br><br>
    </div>
</section>

    </form>


<?php include '../HEADER-FOOTER/footer.php';?>

<!-- Script JavaScript -->
<script>
    function showTheme(themeNumber) {
        let themes = document.querySelectorAll('.theme');
        themes.forEach(theme => theme.style.display = 'none');
        document.getElementById('theme' + themeNumber).style.display = 'block';
    }

    function validateAndNext(themeNumber) {
        let currentTheme = document.querySelector('#theme' + (themeNumber - 1));
        let inputs = currentTheme.querySelectorAll('input[type="radio"]:required');
        let isValid = true;

        inputs.forEach(input => {
            let label = input.closest('div').querySelector('label');
            let span = label.querySelector('.required');
            if (!input.checked && !span.innerHTML) {
                span.innerHTML = ' *';
                span.style.color = 'red';
                isValid = false;
            }
        });

        if (isValid) {
            showTheme(themeNumber);
        }
    }

    document.addEventListener('DOMContentLoaded', function () {
        showTheme(1);
    });
</script>

</body>
</html>

