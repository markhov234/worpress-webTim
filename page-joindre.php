<?php get_header(); ?>

<?php
/*
 Template name: Page Contactez-nous
 */

$args = array(
    'post_type' => 'responsables',
    'post_per_page' => -1,
    'post_status' => 'publish',
    'order_by' => 'post_date',
    'order' => 'ASC',
);
$the_query = new WP_Query($args);

$listeResponsables = array();
$listeInt = 0;

if ($the_query->have_posts()) {

    while ($the_query->have_posts()) {
        $the_query->the_post();

        $listeResponsables[$listeInt] = array(
            'nom' => get_field('nom_responsable'),
            'prenom' => get_field('prenom_responsable'),
            'courriel' => get_field('courriel_responsable'),
            'telephone' => get_field('telephone_responsable'),
            'responsabilite' => get_field('responsabilite_responsable'),
            'image' => get_field('photo_1'),
            'id' => get_field('id_responsable')

        );

        $listeInt++;
    }

}


if (isset($_GET['ID'])) {
    $idDestinataires = get_field('id_responsable', $_GET['ID']);
} else {
    $idDestinataires = null;
}

$donneVerification = $_POST;

foreach ($donneVerification as $inputVerification => $valeur) {
    $pattern = "";
    $valide = false;
    $message = null;

    if ($inputVerification == 'nom') {

        $pattern = '#^[a-zA-ZÀ-ÿ -]+$#';

        if ($valeur == "") {

            $message = "Entrez votre prénom et nom complet";


        } else {
            if (preg_match($pattern, $valeur) == 1) {
//            valide dans le tableau réponse qu'il est true.
                $valide = true;
            } else {

                $message = 'Votre prénom et/ou votre nom comporte des caractères illégaux!';

            }
        }


    } elseif ($inputVerification == "courriel") {
        $pattern = "#[a-zA-Z0-9_]+(.[a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+(.[a-zA-Z0-9_]+)*.[a-zA-Z]{2,4}#";

        if ($valeur == "") {

            $message = "Veuillez entrer votre adresse courriel, s'il-vous-plaît.";


        } else {
            if (preg_match($pattern, $valeur) == 1) {
//            valide dans le tableau réponse qu'il est true.
                $valide = true;
            } else {
            $message="Veulliez entrer une adresse courriel valide!";

            }
        }

    } elseif ($inputVerification == "destinataire") {

        if ($valeur == "") {

            $message = "Sélectionnez un ou une destinataire!";


        } else {
            $valide = true;
        }

    } elseif ($inputVerification == 'sujet') {

        $pattern = '#[A-zÀ-ÿ0-9( |\-|\')!?;:]{1,49}#';

        if ($valeur == "") {

            $message = "Entrez le sujet du courriel!";


        } else {
            if (preg_match($pattern, $valeur) == 1) {
//            valide dans le tableau réponse qu'il est true.
                $valide = true;
            } else {
                $message="Le sujet du courriel comporte des caractères illégaux!";

            }
        }


    } elseif ($inputVerification == 'message') {

        $pattern = '#[A-zÀ-ÿ0-9( |\-|\')!?;:]{1,49}#';
        $valeurModif=ltrim($valeur,"");
        if ($valeurModif == "") {

            $message = "Votre message est absent!";


        } else {
            if (preg_match($pattern, $valeur) == 1) {
//            valide dans le tableau réponse qu'il est true.
                $valide = true;
            } else {
                $message="Votre message comporte des caractères illégaux!";
            }
        }


    }


    $tAValider[$inputVerification] = array('valeur' => $valeur, 'valide' => $valide, 'message' => $message);

    $_SESSION['tValidation'] = array();
    $_SESSION['tValidation'] = $tAValider;

    $donneBonne = array();
    $formulaireBien=false;

    foreach ($tAValider as $information) {
        array_push($donneBonne, $information['valide']);
    }
    $formValide = (count(array_unique($donneBonne)));

    if ($formValide == 1 && $donneBonne[0] == true) {

        $formulaireBien=true;
        unset($_SESSION['formu']);
    }
}


?>
<?php
//
//if(isset($_POST['g-recaptcha-reponse'])){
//    $capthca=$_POST['g-recaptcha-reponse'];
//}
//
//if ($capthca){
//    if ($formulaireBien=true){
//        $secretKey="6Ld2xZAUAAAAAKTP2SAEIyikTTN2uzxmgcNRaiLv";
//        $ip=$_SERVER['REMOTE_ADDR'];
//        $response=file_get_contents("https://www.google.recaptcha/api/siteverify?secret=".$secretKey."&response=".$capthca."&remoteip=".$ip);
//        $responseKey=json_decode($response,true);
//        if(intval($responseKey['sucess']===1)){
//            $to =get_option('admin_email');
//            $subject="Qulqu'un a envoyé une message depuis le site ".get_bloginfo('name');
//            $headers = 'De: '.$courriel.
//        }
//    }
//}
?>
<main>
    <div class="joindre conteneur">
        <h1>Nous joindre</h1>

        <div class="joindre__responsable">
            <?php for ($i = 0; $i < count($listeResponsables); $i++) {
                ?>
                <ul>
                    <li class="imgResponsable">
                        <picture  class="pictureResponsable">
                            <source media="(min-width:802px)" srcset="<?php echo $listeResponsables[$i]['image']['sizes']['image_joindre_1x'] ?> 1x, <?php echo $listeResponsables[$i]['image']['sizes']['image_joindre_2x'] ?> 2x">
                            <img src="<?php echo $listeResponsables[$i]['image']['sizes']['image_joindre_1x'] ?>"
                                 alt="Image de l'étudiant <?php echo $listeResponsables[$i]['prenom'] ?> <?php echo $listeResponsables[$i]['nom'] ?>">
                        </picture>
                    </li>
                    <li class="decriptionResponsable">
                        <ul>
                            <li class="responsableNom"><?php echo $listeResponsables[$i]['nom'] ?><?php echo $listeResponsables[$i]['prenom'] ?></li>
                            <li class="responsableRole"><?php echo $listeResponsables[$i]['responsabilite'] ?></li>
                            <li class="responsableNum"><?php echo $listeResponsables[$i]['telephone'] ?></li>
                        </ul>
                    </li>
                </ul>

                <?php
            }
            ?>
        </div>

        <div class="joindre__formu">
            <form id="formu" action='<?php get_the_permalink(46) ?>' novalidate class="rejoindreFormulaire" method="post">
                <fieldset class="rejoindreFormulaire__fieldset">
                    <!-- Prénom ---------------------->
                    <div class="formulaire__item">
                        <label for="nom">Votre nom complet</label>

                        <input type="text" name="nom" id="nom" placeholder=""
                               pattern="^[a-zA-ZÀ-ÿ -]+$"
                               title="Caractères alphabétiques français seulement."

                            <?php if (isset($_SESSION['tValidation'])){

                                $valeur = $_SESSION['tValidation']['nom']['valeur']; ?>
                                value="<?php echo $valeur ?>"
                            <?php } ?>

                        >
                        <p class="erreur__message">
                            <?php if (isset($_SESSION['tValidation'])){
                                echo $_SESSION['tValidation']['nom']['message'] ;
                            } ?>
                        </p>
                        <span class="fas fa-exclamation-circle

                        <?php
                        $visible='invisible';
                        if (isset($_SESSION['tValidation'])){
                            if ($_SESSION['tValidation']['nom']['valide'] != true) {
                                $visible= "";
                            } }

                        echo $visible?> ">
                        </span>

                    </div>


                    <!--Courriel------------------>
                    <div class="formulaire__item">
                        <label for="courriel">Courriel</label>

                        <input class="responsableEmail" type="email" name="courriel" id="courriel"
                               pattern="[a-zA-Z0-9_]+(.[a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+(.[a-zA-Z0-9_]+)*.[a-zA-Z]{2,4}"

                            <?php if (isset($_SESSION['tValidation'])){

                                $valeur = $_SESSION['tValidation']['courriel']['valeur']; ?>
                               value="<?php echo $valeur ?>"
                            <?php } ?>
                        >
                        <p class="erreur__message">
                            <?php if (isset($_SESSION['tValidation'])){
                                echo $_SESSION['tValidation']['courriel']['message'] ;
                            } ?>
                        </p><span
                                class="fas fa-exclamation-circle
                                  <?php
                                $visible='invisible';
                                if (isset($_SESSION['tValidation'])){
                                    if ($_SESSION['tValidation']['courriel']['valide'] != true) {
                                        $visible= "";
                                    } }

                                echo $visible?>


                                "></span>

                    </div>

                    <div class="formulaire__item">
                        <label for="destinataire">Destinataire</label>
                        <select name="destinataire" id="destinataire" title="destinataire" class="destinataire">

                            <option value="">Sélectionnez un ou une destinataire!</option>

                            <?php
                            for ($i = 0; $i < count($listeResponsables); $i++) {

                                ?>
                                <option <?php if ($idDestinataires == $listeResponsables[$i]["id"]) { ?>
                                    selected="<?php echo "selected" ?>"

                                <?php } ?>
                                        value="<?php echo $listeResponsables[$i]["id"]; ?>"><?php echo $listeResponsables[$i]["prenom"] . " " . $listeResponsables[$i]["nom"]; ?></option>

                            <?php } ?>
                        </select>
                        <p class="erreur__message">

                        </p>
                        <span class="fas fa-exclamation-circle invisible"></span>
                    </div>

                    <!-- Prénom ---------------------->
                    <div class="formulaire__item">
                        <label for="sujet">Sujet</label>


                        <input type="text" name="sujet"
                               id="sujet"
                               title="Seulement des lettres, des espaces ou des appostrophes"
                               class="sujet_formu " pattern="[A-zÀ-ÿ0-9( |\-|\')!?;:]{1,49}"
                            <?php if (isset($_SESSION['tValidation'])){

                                $valeur = $_SESSION['tValidation']['sujet']['valeur']; ?>
                                value="<?php echo $valeur ?>"
                            <?php } ?>

                        >
                        <p class="erreur__message">
                            <?php if (isset($_SESSION['tValidation'])){
                                echo $_SESSION['tValidation']['sujet']['message'] ;
                            } ?>
                        </p>     <span
                                class="fas fa-exclamation-circle
                                       <?php
                                $visible='invisible';
                                if (isset($_SESSION['tValidation'])){
                                    if ($_SESSION['tValidation']['sujet']['valide'] != true) {
                                        $visible= "";
                                    } }

                                echo $visible?>
                                "></span>

                    </div>


                    <div class="formulaire__item">
                        <label for="message">Votre message</label>
                        <textarea rows="5" name="message" id="message" class="message_formu" data-pattern="[A-zÀ-ÿ0-9( |\-|'|\r|\n|\)|\(|)!?;:,\.]{1,299}"<?php if (isset($_SESSION['tValidation'])){$valeur = $_SESSION['tValidation']['message']['valeur']; ?>value="<?php echo $valeur ?>"<?php } ?>></textarea>
                        <p class="erreur__message">
                            <?php if (isset($_SESSION['tValidation'])){
                                echo $_SESSION['tValidation']['message']['message'] ;
                            } ?>
                        </p>
                        <span
                                class="fas fa-exclamation-circle
                                  <?php
                                $visible='invisible';
                                if (isset($_SESSION['tValidation'])){
                                    if ($_SESSION['tValidation']['message']['valide'] != true) {
                                        $visible= "";
                                    } }

                                echo $visible?>


                                "></span>
                    </div>

                            <div class="g-recaptcha" data-sitekey="6Ld2xZAUAAAAAJ2AKX2HBkO1X3vSb6vuQ4ireXAK"></div>
                    <button class="boutonJaune" type="submit" value="Submit">Envoyer le formulaire</button>
                </fieldset>
            </form>
        </div>
    </div>

</main>

<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<?php get_footer() ?>
