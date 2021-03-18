<?php get_header();
/*
 Template name: Page Diplômé
 */
?>
<main>
    <?php

    $args = array(
        'post_type' => 'finissant',
        'posts_per_page' => -1,
        'post_status' => 'publish',
        'order_by' => 'post_date',
        'order' => 'DESC'
    );
    $the_query = new WP_Query( $args );

    $listeDiplomes= array();
    $listeInt=0;
    if ($the_query->have_posts()) {
        while ($the_query->have_posts()) {
            $the_query->the_post();

            $listeDiplomes[$listeInt]=array(
                'nom'=>get_field('nom_finissant'),
                'prenom'=>get_field('prenom_finissant'),
                'interetDesign'=> get_field('interet_design'),
                'interetGestion'=> get_field('interet_gestion'),
                'interetIntegration'=> get_field('interet_integration'),
                'interetProg'=> get_field('interet_programmation'),
                'interetTraitement'=> get_field('interet_traitement'),
                'linked'=> get_field('linked_finissant'),
                'nomAdmin'=> get_field('nom_admin'),
                'presentation'=> get_field('presentation_etudiant'),
                'siteWeb'=> get_field('site_web'),
                'pseudoTwitter'=>get_field('pseudo_twitter'),
                'lienSingle'=> get_the_permalink(),
                'image'=> get_field('photo_1'),
                'idPost' => get_the_ID()

            );

            $listeInt++;


        }


    }

    ?>
    <canvas class="canvas" id="canvas"></canvas>
    <div class=" conteneur">
        <div class="galerie">
            <h1>Diplômés</h1>
     <?php for ($i=0;$i<count($listeDiplomes);$i++){
        ?>
            <div data-aos="fade-up" class="galerie__zone">
                <picture>
                    <source media="(min-width:802px)" srcset="<?php echo $listeDiplomes[$i]['image']['sizes']['image_diplomer_1x'] ?> 1x, <?php echo $listeDiplomes[$i]['image']['sizes']['image_diplomer_2x'] ?> 2x">
                    <source media="(min-width:602px)" srcset="<?php echo $listeDiplomes[$i]['image']['sizes']['image_diplomer_mobile_1x'] ?> 1x, <?php echo $listeDiplomes[$i]['image']['sizes']['image_diplomer_mobile_2x'] ?> 2x">
                    <img src="<?php echo $listeDiplomes[$i]['image']['sizes']['image_diplomer_1x'] ?>"
                         alt="Image de l'étudiant <?php echo $listeDiplomes[$i]['prenom'] ?> <?php echo $listeDiplomes[$i]['nom'] ?>">
                </picture>

                <a class="hyperLien" href="<?php echo add_query_arg('ID',$listeDiplomes[$i]['idPost'],get_the_permalink(204)); ?>">
                    <h2><?php echo $listeDiplomes[$i]['prenom'] ?> <?php echo $listeDiplomes[$i]['nom'] ?></h2>
                </a>
                <div class="descriptionDiplomer">
                    <?php echo $listeDiplomes[$i]['presentation'] ?>
                    <a class="boutonJaune h4 " href="<?php echo add_query_arg('ID',$listeDiplomes[$i]['idPost'],get_the_permalink(204)); ?>">Voir le profil</a>
                </div>
            </div>

     <?php } ?>

        </div>


    </div>
</main>

<?php get_footer() ?>
