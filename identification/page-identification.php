<?php
if(!session_id())
    session_start();

require_once 'flash.php';
messageFlash();
?>

<?php include '../HEADER-FOOTER/header.php'; ?>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style-identification.css" xmlns="http://www.w3.org/1999/html">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans+Narrow:wght@400;700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=PT+Serif:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous">
    </script>

    <script src="../../PHP/refonte_ffdsb/refonte_FFDSB/HEADER-FOOTER/recherche.js"></script>
<body>

<div><br><br><br>
    <h1 style="color : #01628D; "><strong>Fédération française pour le don du sang</strong></h1><br><br>
        <p class="sous-titre">le seul organisme de France représentant tous les donneurs de sang auprès des pouvoirs publics</p>
</div><br>

<div class="container mt-3">
    <h2>Identification</h2><br>
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" data-bs-toggle="tab" href="#signin">S'identifier</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#signup">S'inscrire</a>
        </li>
    </ul>

    <div class="tab-content">
        <div id="signin" class="container tab-pane active"><br>
            <h4>Connexion</h4><br>
            <form class="row g-3 needs-validation" method="post" action="signin.php">
                <div class="col-md-4 ">
                    <label for="signin-email" class="form-label">Adresse email</label>
                    <input type="text" class="form-control" id="signin-email" name="signin-email" placeholder="Votre adresse email..."
                           required>
                </div>
                <div class="col-md-4">
                    <label for="signin-pwd" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control" id="signin-pwd" name="signin-pwd" placeholder="Votre mot de passe"
                           required>
                </div>

                <div class="row g-3">
                    <div class="col-md-2">
                        <button class="btn btn-primary" type="submit">Se connecter</button>
                    </div>
                </div>
            </form>
        </div>
        <div id="signup" class="container tab-pane fade"><br>
            <h4>Formulaire d'inscription</h4>
            <form class="row g-3 needs-validation " method="post" action="signup.php">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="signup-last" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="signup-last" name="signup-last" placeholder="Votre nom..." required>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-md-8">
                        <label for="signup-email" class="form-label">Adresse email</label>
                        <input type="email" class="form-control" id="signup-email" name="signup-email" placeholder="Votre adresse email..."
                               required>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-md-8">
                        <label for="signup-pwd" class="form-label">Mot de passe</label>
                        <input type="password" class="form-control" id="signup-pwd" name="signup-pwd" placeholder="Votre mot de passe..." required>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-md-8">
                        <label for="signup-pwd" class="form-label">Réécrivez votre mot de passe</label>
                        <input type="password" class="form-control" id="signup-verifpwd" name="signup-verifpwd" placeholder="Votre mot de passe..." required>
                    </div>
                </div>

                <div class="row g-3">
                    <button class="btn btn-outline-danger col-md-3 mr-3" type="reset">Annuler</button>
                    <button class="btn btn-primary col-md-3 ml-3" type="submit">S'inscrire</button>
                </div>

            </form>
            <br><br><br>
        </div>
        <br><br><br>
    </div>
</div>





</body>



<?php include '../HEADER-FOOTER/footer.php'; ?>


