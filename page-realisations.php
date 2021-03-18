<?php get_header();
//echo "page-realisations.php"
?>
<main>
    <?php

    //    Pour trouver les cours de la session
    $args = array(
        'post_type' => 'cours',
        'posts_per_page' => -1,
        'post_status' => 'publish',
        'order_by' => 'post_date',
        'order' => 'ASC'
    );

    //fait fonctionner ma requête
    $the_query = new WP_Query($args);

    //    array de la liste des cours
    $listeCours = array();
    //    array de la liste des cours
    $listeInt = 0;

    if ($the_query->have_posts()) {

        while ($the_query->have_posts()) {
            $the_query->the_post();


            $listeCours[$listeInt] = array(
                'nom_cours' => get_field('nom_cour'),
                'session_cours' => get_field('session_cour'),
                'id_cours' => get_field('id_cour')

            );
            $listeInt++;
        }
    }
    // pour reset la requêtes
    wp_reset_postdata();

    //Pour trouver les finissant
    $args = array(
        'post_type' => 'finissant',
        'posts_per_page' => -1,
        'post_status' => 'publish',
        'order_by' => 'post_date',
        'order' => 'Asc'
    );
    //    fait fonnctionner ma requête
    $the_query = new WP_Query($args);

    //    array des finissants
    $listeDiplomes = array();
    //    compteur
    $listeInt = 0;
    //    boucle qui rempli mon array
    if ($the_query->have_posts()) {

        while ($the_query->have_posts()) {
            $the_query->the_post();


            $listeDiplomes[$listeInt] = array(
                'nom' => get_field('nom_finissant'),
                'prenom' => get_field('prenom_finissant'),
                'courriel' => get_field('courriel_finissant'),
                'interetDesign' => get_field('interet_design'),
                'interetGestion' => get_field('interet_gestion'),
                'interetIntegration' => get_field('interet_integration'),
                'interetProg' => get_field('interet_programmation'),
                'interetTraitement' => get_field('interet_traitement'),
                'linked' => get_field('linked_finissant'),
                'nomAdmin' => get_field('nom_admin'),
                'presentation' => get_field('presentation_etudiant'),
                'siteWeb' => get_field('site_web'),
                'pseudoTwitter' => get_field('pseudo_twitter'),
                'id_finissant' => get_field('id_finissant'),
                'lienSingle' => get_the_permalink(),
                'idPost' => get_the_ID()

            );

            $listeInt++;


        }
    }
    //pour reset le data
    wp_reset_postdata();


    //    Pour les réalisations
    $args = array(
        'post_type' => 'projets',
        'posts_per_page' => -1,
        'post_status' => 'publish',
        'meta_key' => 'titre_realisation',
        'order_by' => 'meta_value',
        'order' => 'ASC'
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
                'image2' => get_field('photo_2')

            );

            $listeInt++;

        }

    }
    $lienSingle=get_the_permalink(204);
    ?>

    <div class="enteteRealisation conteneur">
        <canvas class="canvas" id="canvas"></canvas>

        <div  class="galerie">
            <h1>Réalisations</h1>
            <?php for ($i = 0;
            $i < count($listeRealisations);
            $i++) { ?>

            <div class="galerie__zone" data-aos="fade-up">
                <div class="slickCaroussel">
                    <picture id="pict<?php echo $i ?>" class="imgRealisation">
                        <source media="(min-width:802px)" srcset="<?php echo $listeRealisations[$i]['image']['sizes']['image_pagerea_1x']?> 1x, <?php echo $listeRealisations[$i]['image']['sizes']['image_pagerea_2x'] ?> 2x">
                        <source media="(min-width:602px)" srcset="<?php echo $listeRealisations[$i]['image']['sizes']['image_pagerea_mobile_1x'] ?> 1x, <?php echo $listeRealisations[$i]['image']['sizes']['image_pagerea_mobile_2x'] ?> 2x">
                        <img src="<?php echo $listeRealisations[$i]['image']['sizes']['image_pagerea_1x'] ?>"
                             alt="Image du projet <?php echo $listeRealisations[$i]['titre'] ?>">
                    </picture>
                    <picture id="pict<?php echo $i ?>" class="imgRealisation">
                        <source media="(min-width:802px)" srcset="<?php echo $listeRealisations[$i]['image2']['sizes']['image_pagerea_1x'] ?> 1x, <?php echo $listeRealisations[$i]['image2']['sizes']['image_pagerea_2x'] ?> 2x">
                        <source media="(min-width:602px)" srcset="<?php echo $listeRealisations[$i]['image2']['sizes']['image_pagerea_mobile_1x'] ?> 1x, <?php echo $listeRealisations[$i]['image2']['sizes']['image_pagerea_mobile_2x'] ?> 2x">
                        <img src="<?php echo $listeRealisations[$i]['image2']['sizes']['image_pagerea_1x'] ?>"
                             alt="Image du projet <?php echo $listeRealisations[$i]['titre'] ?>">
                    </picture>
                </div>

                <h3 class="h2"><?php echo $listeRealisations[$i]['titre'] ?></h3>
                <div class="galerie__description">
                    <p><?php echo $listeRealisations[$i]['techno'] ?></p>


                    <?php

//                    $description= $listeRealisations[$i]['description'];
//                    $finDescription = '</span></p>';
//                    $descriptionModifier= $description.$finDescription;
//
//                    $milieuDescription= "<span id='dots'>...</span><span id='more'>";
//                    $descriptionFini=substr_replace($descriptionModifier,$milieuDescription,250,0);

                                            echo $listeRealisations[$i]['description'];


                    ?>

                    <?php if ($listeRealisations[$i]['expose'] == '') { ?>
                        <p><?php echo $listeRealisations[$i]['url'] ?></p>
                    <?php } ?>
                    <?php if ($listeRealisations[$i]['expose'] == 1) { ?>
                        <p><?php echo $listeRealisations[$i]['expose'] ?></p>
                    <?php } ?>
                    <!--                            Boucle pour trouver le bon id au cours inscrit-->
                    <p class="cours">Réalisé dans le cadre du cours de :<br>
                        <span>
                                <?php for ($i3 = 0; $i3 < count($listeCours); $i3++) {
                                    if ($listeRealisations[$i]['idCours'] == $listeCours[$i3]["id_cours"]) {
                                        echo $listeCours[$i3]['nom_cours'];
                                    }
                                } ?>
                                    </span>
                    </p>

                    <!--                            Boucle pour trouver le bon étudiants au projet-->
                    <?php for ($i2 = 0; $i2 < count($listeDiplomes); $i2++) {
                        if ($listeRealisations[$i]['id_finissant'] == $listeDiplomes[$i2]['id_finissant']) { ?>
                            <p class="nomFinissant">
                                Réalisé par
                                :
                                <a class="hyperLien" href="<?php echo      add_query_arg('ID',$listeDiplomes[$i2]['idPost'],get_the_permalink(204)); ?>"><?php echo $listeDiplomes[$i2]['prenom'], ' ', $listeDiplomes[$i2]['nom']; ?></a>
                            </p>
                        <?php }
                    }
                    ?>
                </div>
            </div>
                <?php } ?>
        </div>
        </div>
</main>

<?php get_footer() ?>
