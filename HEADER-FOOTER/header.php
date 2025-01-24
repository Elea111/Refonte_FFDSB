<?php
if(!session_id())
    session_start();

require_once(__DIR__ . '/../identification/flash.php');
messageFlash();
?>

<!DOCTYPE html>
<html lang="fr">
<body>
  <meta charset="UTF-8">
  <title>Fédération française pour le don du sang</title>
  <link rel="stylesheet" href="../../refonte_ffdsb/refonte_FFDSB/HEADER-FOOTER/header.css">
  <script src="recherche.js"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=PT+Sans+Narrow:wght@400;700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=PT+Serif:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">

  </script>
  <header>
    <div class="partie-logo">
      <a href="../page-accueil/page-actualité-local.php">
        <img class="logoffdsb" src="../HEADER-FOOTER/logoffdsb.png" alt="Logo FFDSB">
      </a>
    </div>
    <nav class="menu">
      <ul class="menu-list">
        <li class="search-container">
          <form class="search-form" onsubmit="return false;">
            <img class="search-icon" src="../../refonte_ffdsb/refonte_FFDSB/HEADER-FOOTER/clipart150759.png" alt="Rechercher">
            <input id="search-input" type="search" placeholder="Rechercher" class="search-input">
            <ul id="search-results" class="search-results hidden"></ul>
          </form>
        </li>
        <li><a href="https://ffdsb.org/faire-un-don/">FAIRE UN DON € </a></li>
        <li><a href="https://ffdsb.org/faq/">FAQ</a></li>
        <li><a href="https://dondesang.efs.sante.fr/trouver-une-collecte?menu=da">OÙ DONNER MON SANG</a></li>
          <?php
          if(isset($_SESSION['user'])){
              $currentUrl = urlencode($_SERVER['REQUEST_URI']);
              echo '<li><a href="../HEADER-FOOTER/deconnecter.php?redirect='.$currentUrl.'"
                    class="deconnecter-btn">SE DECONNECTER</a></li>';
              if($_SESSION['user']['role']=='admin')
                  echo '<li><a href="../indicateur/indicateurs.php" class="identifier-btn">RESULTATS QUESTIONNAIRE</a></li>';
              echo '<li><a href="../../refonte_ffdsb/refonte_FFDSB/Enquete/enquete.php" class="identifier-btn">QUESTIONNAIRE</a></li>';
          }
          else
              echo '<li><a href="../identification/page-identification.php" class="identifier-btn">S\'IDENTIFIER</a></li>';
          ?>

      </ul>
    </nav>
  </header>

  <div class="header-image-container">
    <img class="image-entete" src="../../refonte_ffdsb/refonte_FFDSB/HEADER-FOOTER/entete.jpg" alt="Image d'entête">
    <a href="https://dondesang.efs.sante.fr/trouver-une-collecte" class="don-btn">JE DONNE MON SANG</a>
  </div>

  <nav class="menu-deroulant">
    <ul>
      <li>
        <a href="#">COMPRENDRE LE DON DU SANG</a>
        <ul class="sous-menu1">
          <li><a href="../page-ethique/page-ethique.php">ÉTHIQUE DU DON DE SANG</a></li>
          <li><a href="https://ffdsb.org/comprendre-le-don-du-sang/les-3-types-de-don-du-sang/">LES 3 TYPES DE DON DU SANG</a></li>
          <li><a href="../page-mode-emploi/page-mode-emploi.php">DON DE SANG : MODE D'EMPLOI</a></li>
        </ul>
      </li>
      <li>
        <a href="#">LES AUTRES DONS</a>
        <ul class="sous-menu2">
          <li><a href="https://ffdsb.org/comprendre-les-autres-dons/don-de-moelle-osseuse/">DON DE MOELLE OSSEUSE</a></li>
          <li><a href="https://ffdsb.org/comprendre-les-autres-dons/don-de-tissus-et-dorganes/">DON DE TISSUS ET D'ORGANES</a></li>
          <li><a href="https://ffdsb.org/comprendre-les-autres-dons/don-de-gametes/">DON DE GAMÈTES</a></li>
        </ul>
      </li>
      <li>
        <a href="#">L'ACTUALITÉ</a>
        <ul class="sous-menu3">
          <li><a href="https://ffdsb.org/actualite-du-don/nationale/">NATIONALE</a></li>
          <li><a href="#https://ffdsb.org/actualite-du-don/locale/">LOCALE</a></li>
          <li><a href="https://ffdsb.org/actualite-du-don/la-revue-dsb/">LA REVUE DSB</a></li>
          <li><a href="https://ffdsb.org/actualite-du-don/sante/">SANTÉ</a></li>
        </ul>
      </li>
    </ul>
  </nav>

</body>
</html>

