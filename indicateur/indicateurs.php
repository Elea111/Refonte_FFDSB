
<?php
require_once '../identification/BddConnect.php';
use identification\BddConnect;

$bdd = new BddConnect();
$pdo = $bdd->connexion();

// Requête pour récupérer les réponses aux questions
$ageData = $pdo->query("SELECT reponse AS age, COUNT(*) AS count FROM reponses_utilisateurs WHERE id_question = 1 GROUP BY reponse")->fetchAll(PDO::FETCH_ASSOC);
$statutData = $pdo->query("SELECT reponse AS statut, COUNT(*) AS count FROM reponses_utilisateurs WHERE id_question = 7 GROUP BY reponse")->fetchAll(PDO::FETCH_ASSOC);
$soinData = $pdo->query("SELECT reponse AS soin, COUNT(*) AS count FROM reponses_utilisateurs WHERE id_question = 11 GROUP BY reponse")->fetchAll(PDO::FETCH_ASSOC);
$soutienData = $pdo->query("SELECT reponse AS soutien, COUNT(*) AS count FROM reponses_utilisateurs WHERE id_question = 15 GROUP BY reponse")->fetchAll(PDO::FETCH_ASSOC);
$activiteSocialeData = $pdo->query("SELECT reponse AS activite, COUNT(*) AS count FROM reponses_utilisateurs WHERE id_question = 9 GROUP BY reponse")->fetchAll(PDO::FETCH_ASSOC);

$ageDataJson = json_encode($ageData);
$statutDataJson = json_encode($statutData);
$soinDataJson = json_encode($soinData);
$soutienDataJson = json_encode($soutienData);
$activiteSocialeDataJson = json_encode($activiteSocialeData);

include '../HEADER-FOOTER/header.php';
?>
    <link rel="stylesheet" href="style.css">
<body>
<h1>Résultats du Questionnaire</h1>

<section>
    <h2>Répartition des âges</h2>
    <svg id="ageGraph" width="600" height="400"></svg>
</section>

<section>
    <h2>Heures consacrées aux activités sociales</h2>
    <svg id="activiteSocialeGraph" width="600" height="400"></svg>
</section>

<section>
    <h2>Statut professionnel</h2>
    <svg id="statutBarChart" width="600" height="400"></svg>
</section>

<section>
    <h2>Satisfaction sur l'accès aux soins</h2>
    <svg id="soinDonutChart" width="400" height="400"></svg>
</section>

<section>
    <h2>Intérêt pour des campagnes de sensibilisation</h2>
    <svg id="soutienGaugeChart" width="400" height="200"></svg>
</section>

<?php include '../HEADER-FOOTER/footer.php'; ?>

<script>
    const ageData = <?php echo $ageDataJson; ?>;
    const statutData = <?php echo $statutDataJson; ?>;
    const soinData = <?php echo $soinDataJson; ?>;
    const soutienData = <?php echo $soutienDataJson; ?>;
    const activiteSocialeData = <?php echo $activiteSocialeDataJson; ?>;
</script>
<script src="https://d3js.org/d3.v7.min.js"></script>
<script src="resultats.js"></script>
</body>
</html>