<?php get_header(); ?>
<?php //echo "index.php"; ?>
<?php

//    Pour trouver les cours de la session
$args = array(
    'post_type' => 'etudiantUnJour',
    'posts_per_page' => -1,
    'post_status' => 'publish',
    'order_by' => 'post_date',
    'order' => 'ASC'
);

//fait fonctionner ma requête
$the_query = new WP_Query($args);

//    array de la liste des cours
$listeEtudiantUnJour = array();
//    array de la liste des cours
$listeInt = 0;

if ($the_query->have_posts()) {

    while ($the_query->have_posts()) {
        $the_query->the_post();


        $listeEtudiantUnJour[$listeInt] = array(
            'nom_etudiant' => get_field('nom_etudiant'),
            'prenom_etudiant' => get_field('prenom_etudiant'),
            'description_etudiant' => get_field('description_etudiant'),
            'image' => get_field('photo_1'),

        );
        $listeInt++;
    }
}
// pour reset la requêtes
wp_reset_postdata();

$args = array(
    'post_type' => 'description',
    'posts_per_page' => -1,
    'post_status' => 'publish',
    'order_by' => 'post_date',
    'order' => 'ASC'
);

//fait fonctionner ma requête
$the_query = new WP_Query($args);

//    array de la liste des cours
$listeDescription = array();
//    array de la liste des cours
$listeInt = 0;

if ($the_query->have_posts()) {

    while ($the_query->have_posts()) {
        $the_query->the_post();


        $listeDescription[$listeInt] = array(
            'nom_cours' => get_field('nom_cour'),
            'acquis_cours' => get_field('acquis_cours'),
            'description_cours' => get_field('description_cours'),

        );
        $listeInt++;
    }
}

// pour reset la requêtes
wp_reset_postdata();

$args = array(
    'post_type' => 'temoignage',
    'posts_per_page' => -1,
    'post_status' => 'publish',
    'order_by' => 'post_date',
    'order' => 'ASC'
);

//fait fonctionner ma requête

$the_query = new WP_Query($args);

//    array de la liste des cours
$listeTemoin = array();
//    array de la liste des cours
$listeInt = 0;
if ($the_query->have_posts()) {

    while ($the_query->have_posts()) {
        $the_query->the_post();


        $listeTemoin[get_field('id_temoignage')] = array(
            'nom' => get_field('nom_temoignage'),
            'description' => get_field('description_temoignage'),
            'anneeDiplome' => get_field('diplomation_temoignage'),
            'posteTemoin' => get_field('poste_temoignage'),
            'image' => get_field('photo_1'),

        );
    }
}
// pour reset la requêtes
wp_reset_postdata();

//    Pour les réalisations
$args = array(
    'post_type' => 'projets',
    'posts_per_page' => 3,
    'post_status' => 'publish',
    'orderby' => 'rand'
);
//    fait fonnctionner ma requête
$the_query = new WP_Query($args);

//    array des réalisations
$listeRealisations = array();
//    compteur
$listeInt = 0;
//    boucle qui rempli mon array
if ($the_query->have_posts()) {
    while ($the_query->have_posts()) {
        $the_query->the_post();


        $listeRealisations[$listeInt] = array(
            'titre' => get_field('titre_realisation'),
            'techno' => get_field('technologies_realisation'),
            'description' => get_field('description_realisation'),
            'url' => get_field('url_realisation'),
            'expose' => get_field('expose_realisation'),
            'id_finissant' => get_field('diplome_realisation'),
            'idCours' => get_field('idCours_realisation'),
            'image' => get_field('photo_1'),
            'id' => get_field('id_realisation'),
            'lien' => get_the_permalink()

        );
        $listeInt++;
    }

}

$post = get_post(216);
$lienUnJour = get_field_object("lien_responsable");
$post_object = $lienUnJour['value'];


$lienBenoit = add_query_arg('ID', $post_object->ID, get_the_permalink(46));

$post = get_post(218);

$lienUnJour = get_field_object("lien_responsable");
$post_object = $lienUnJour['value'];


$lienSylvain = add_query_arg('ID', $post_object->ID, get_the_permalink(46));


?>


<div id="accueil" class="accueil">
    <div class="accueil__creedB">
        <div class="accueil__entete conteneur">
            <h1>Techniques
                Intégration
                Multimédia
            </h1>

            <div class="imgA">
                <video id="video" muted autoplay preload>
                    <source src="https://timunix2.cegep-ste-foy.qc.ca/~mahovington/timcsf/wp-content/uploads/2021/03/logo_tim.mp4"
                            type="video/mp4">
                </video>
            </div>
        </div>
    </div>
    <div class="accueil__creedI">

        <div class="accueil__realisations conteneur">
            <h2 class='h1'>
                Réalisations
            </h2>
            <div class="accueil__realisations__enveloppe">
                <?php
                for ($cpt = 0;
                     $cpt < count($listeRealisations);
                     $cpt++) {

                    if ($listeRealisations[$cpt]['image'] != null) {
                        ?>
                        <div class="accueil__realisations__enveloppe__items img<?php echo $cpt ?> ">
                            <picture id="pict<?php echo $cpt ?>" class="imgRealisation">
                                <source media="(min-width:802px)"
                                        srcset="<?php echo $listeRealisations[$cpt]['image']['sizes']['image_realisation_1x'] ?> 1x, <?php echo $listeRealisations[$cpt]['image']['sizes']['image_realisation_2x'] ?> 2x">
                                <source media="(min-width:602px)"
                                        srcset="<?php echo $listeRealisations[$cpt]['image']['sizes']['image_realisation_mobile_1x'] ?> 1x, <?php echo $listeRealisations[$cpt]['image']['sizes']['image_realisation_mobile_2x'] ?> 2x">
                                <img src="<?php echo $listeRealisations[$cpt]['image']['sizes']['image_realisation_1x'] ?>"
                                     alt="Image du projet <?php echo $listeRealisations[$cpt]['titre'] ?>">
                            </picture>

                            <div class="descriptionRealisation">
                                <div class="nomRealisation">
                                    <h3 class="titre"><?php echo $listeRealisations[$cpt]['titre'] ?></h3>
                                </div>

                                <?php
                                if (strlen($listeRealisations[$cpt]['description']) > 350) {
                                    $descriptionCourte = substr($listeRealisations[$cpt]['description'], 0, 250) . '...</p>';
                                    echo $descriptionCourte;
                                } else {
                                    echo $listeRealisations[$cpt]['description'];
                                }

                                ?>
                                <a class="boutonJaune h4 " href="<?php echo get_the_permalink(12); ?>">Admire les
                                    réalisations</a>
                            </div>
                        </div>
                    <?php }
                } ?>
            </div>

            <div class="boutonRealisations">
                <button class="boutonRond" id="img1"></button>
                <button class="boutonRond" id="img2"></button>
                <button class="boutonRond" id="img3"></button>
            </div>

        </div>
    </div>
    <div class="accueil__creedR">
        <h2 class=' conteneur h1'>
            Description des cours
        </h2>
        <div class="accueil__wrap">
            <div class="accueil__description">
                <?php for ($i = 0; $i < count($listeDescription); $i++) {
                    ?>
                    <div class="accueil__description__boite">
                        <h3 class="h2"><?php echo $listeDescription[$i]['nom_cours'] ?></h3>
                        <div class="accueil__description__boite__acquis">
                            <h4 class="h3">
                                Acquis
                            </h4>
                            <?php echo $listeDescription[$i]['acquis_cours'] ?>
                            <h4>
                                Description
                            </h4>
                            <?php echo $listeDescription[$i]['description_cours'] ?>
                            <a class="boutonJaune h4 " href="<?php echo get_site_url(); ?>/realisations">Consulter le
                                site web</a>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>
    </div>
    <div class="accueil__creedN">
        <div class="layer1">
            <div class="figure1">
                <svg width="121" height="138" viewBox="0 0 121 138" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.87586 7.92481L109.994 71.4601L4.91203 126.398L9.87586 7.92481Z" stroke="#4B1FFF"
                          stroke-width="8"/>
                </svg>
            </div>
            <div class="figure2">
                <svg width="137" height="150" viewBox="0 0 137 150" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M121.788 62.607L28.7302 149.481L0.0239788 25.4538L121.788 62.607Z" fill="#4B1FFF"/>
                </svg>

            </div>
            <div class="figure3">
                <svg width="180" height="340" viewBox="0 0 122 129" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.87586 7.92481L109.994 71.4601L4.91203 126.398L9.87586 7.92481Z" stroke="#4B1FFF"
                          stroke-width="8"/>
                </svg>
            </div>
            <div class="figure4">
                <svg width="137" height="150" viewBox="0 0 176 201" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M121.788 62.607L28.7302 149.481L0.0239788 25.4538L121.788 62.607Z" fill="#4B1FFF"/>
                </svg>

            </div>
        </div>
        <div class="layer2">
            <div class="figure5">
                <svg width="121" height="138" viewBox="0 0 135 240" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.87586 7.92481L109.994 71.4601L4.91203 126.398L9.87586 7.92481Z" stroke="#4B1FFF"
                          stroke-width="8"/>
                </svg>
            </div>
            <div class="figure6">
                <svg width="137" height="150" viewBox="0 0 190 230" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M121.788 62.607L28.7302 149.481L0.0239788 25.4538L121.788 62.607Z" fill="#4B1FFF"/>
                </svg>

            </div>
            <div class="figure7">
                <svg width="110" height="340" viewBox="0 0 122 129" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.87586 7.92481L109.994 71.4601L4.91203 126.398L9.87586 7.92481Z" stroke="#4B1FFF"
                          stroke-width="8"/>
                </svg>
            </div>
            <div class="figure8">
                <svg width="197" height="180" viewBox="0 0 103 149" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M121.788 62.607L28.7302 149.481L0.0239788 25.4538L121.788 62.607Z" fill="#4B1FFF"/>
                </svg>

            </div>
        </div>
        <div class="accueil__etudiant conteneur">
            <h2 class="h1"> <?php echo get_post(216)->titre_texte ?></h2>
            <div class="accueil__etudiant__enveloppe">
                <div class="etudiantUnJour">
                    <picture class="etudiantImage">
                        <source srcset="<?php echo $listeEtudiantUnJour[0]['image']['sizes']['image_carre_325_1x'] ?> 1x, <?php echo $listeEtudiantUnJour[0]['image']['sizes']['image_carre_325_2x'] ?> 2x">
                        <img src="<?php echo $listeEtudiantUnJour[0]['image']['sizes']['image_carre_325_1x'] ?>"
                             alt="Image de l'étudiant <?php echo $listeEtudiantUnJour[0]['prenom'] ?> <?php echo $listeEtudiantUnJour[0]['nom'] ?>">
                    </picture>
                    <div class="etudiantTexte">
                        <?php echo get_post(329)->description_etudiant ?>
                    </div>
                </div>
                <div class="apprendre">
                    <?php echo get_post(216)->texte_texte ?>
                    <a class="boutonJaune" href="<?= $lienBenoit ?>">Contacter Benoit Frigon</a>
                </div>
                <div class="quiz">
                    <h3><?php echo get_post(332)->titre_texte ?></h3>
                    <?php echo get_post(332)->texte_texte ?>

                </div>
            </div>
        </div>

    </div>
    <div class="accueil__creedB">
        <div class="accueil__temoignage">

            <h2 class="h1 conteneur">
                Témoignages
            </h2>
            <div class="accueil__temoignage__enveloppe ">
                <div class="conteneur flexTemoignage gauche">

                    <?php $idAlexia = get_post(649)->id_temoignage; ?>
                    <?php $idAlexandre = get_post(637)->id_temoignage; ?>
                    <picture class="temoignageImage">
                        <source srcset="<?php echo $listeTemoin[$idAlexia]['image']['sizes']['image_realisation_1x'] ?> 1x, <?php echo $listeTemoin[$idAlexia]['image']['sizes']['image_carre_325_2x'] ?> 2x">
                        <img src="<?php echo $listeTemoin[$idAlexia]['image']['sizes']['image_realisation_1x'] ?>"
                             alt="Image du projet <?php echo get_post(649)->nom_temoignage ?>">
                    </picture>
                    <div class="temoignageInformation">
                        <h3 class="h2"><?php echo get_post(649)->nom_temoignage ?></h3>
                        <p class="posteTemoignage h3"><?php echo get_post(649)->poste_temoignage ?></p>
                    </div>
                    <p class="temoigagneDescription"><?php echo get_post(649)->description_temoignage ?></p>
                    <p class="h4 temoignageAnnee"><?php echo get_post(649)->diplomation_temoignage ?></p>
                </div>
            </div>
            <div class="accueil__temoignage__enveloppe">
                <div class="conteneur flexTemoignage droite">

                    <picture class="temoignageImage">
                        <source srcset="<?php echo $listeTemoin[$idAlexandre]['image']['sizes']['image_realisation_1x'] ?> 1x, <?php echo $listeTemoin[$idAlexandre]['image']['sizes']['image_carre_325_2x'] ?> 2x">
                        <img src="<?php echo $listeTemoin[$idAlexandre]['image']['sizes']['image_realisation_1x'] ?>"
                             alt="Image du projet <?php echo get_post(637)->nom_temoignage ?>">
                    </picture>

                    <div class="temoignageInformation">
                        <h3 class="h2"><?php echo get_post(637)->nom_temoignage ?></h3>
                        <p class="posteTemoignage h3"><?php echo get_post(637)->poste_temoignage ?></p>
                    </div>
                    <p class="temoigagneDescription"><?php echo get_post(637)->description_temoignage ?></p>
                    <p class="h4 temoignageAnnee"><?php echo get_post(637)->diplomation_temoignage ?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="accueil__creedN">

        <div class="accueil__inscription conteneur">
            <h2 class="h1">Inscription</h2>

            <div class="accueil__inscription__admission">
                <h3><?php echo get_post(219)->titre_texte ?></h3>
                <?php echo get_post(219)->texte_texte ?>
                <a href="#" class="boutonJaune">Faire une demande d'admission</a>
            </div>
            <div class="accueil__inscription__question">
                <h3><?php echo get_post(218)->titre_texte ?></h3>
                <?php echo get_post(218)->texte_texte ?>
                <a class="boutonJaune" href="<?= $lienSylvain ?>">Contacter Sylvain Lamoureux</a>
            </div>
        </div>
    </div>

</div>


</div>
<?php get_footer() ?>
