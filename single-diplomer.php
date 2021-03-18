<?php get_header(); ?>
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
            'id'=> get_field('id_finissant'),
            'idPost' => get_the_ID()

        );

        $listeInt++;


    }
}


if (isset($_GET['ID'])) {
    $idDiplomer = get_field('id_finissant', $_GET['ID']);
} else {
    $idDiplomer = null;
}

?>

<main>
    <canvas class="canvas" id="canvas"></canvas>
    <div class="ficheDiplomer conteneur">
        <?php for($i=0;$i<count($listeDiplomes);$i++){
            if($listeDiplomes[$i]['id']==$idDiplomer){
                ?>
        <h1>La fiche de <?php echo $listeDiplomes[$i]['prenom']?>  </h1>


        <div class="ficheDiplomer__image">
            <picture class="ficheDiplomer__image--img">
                <source srcset="<?php echo $listeDiplomes[$i]['image']['sizes']['image_carre_325_1x'] ?> 1x, <?php echo $listeDiplomes[$i]['image']['sizes']['image_carre_325_2x'] ?> 2x">
                <img src="<?php echo $listeDiplomes[$i]['image']['sizes']['image_carre_325_1x'] ?>"
                     alt="Image de l'étudiant <?php echo $listeDiplomes[$i]['prenom'] ?> <?php echo $listeDiplomes[$i]['nom'] ?>">
            </picture>
        </div>
        <div class="ficheDiplomer__description">
            <h2><?php echo $listeDiplomes[$i]['prenom']. " ". $listeDiplomes[$i]['nom']?></h2>
            <div class="ficheDiplomer__description__interet">
                <p>Mon intérêt en design d'interface est de <span class="texteRose"><?php echo $listeDiplomes[$i]['interetDesign']?></span> sur 10</p>
                <p>Mon intérêt en gestion de projet est de <span class="texteRose"><?php echo $listeDiplomes[$i]['interetGestion']?></span> sur 10</p>
                <p>Mon intérêt en intégration est de <span class="texteRose"><?php echo $listeDiplomes[$i]['interetIntegration']?></span> sur 10</p>
                <p>Mon intérêt en programmation est de <span class="texteRose"><?php echo $listeDiplomes[$i]['interetProg']?></span> sur 10</p>
                <p>Mon intérêt en traitement des médias est de <span class="texteRose"><?php echo $listeDiplomes[$i]['interetTraitement']?></span> sur 10</p>
            </div>
            <?php echo $listeDiplomes[$i]['presentation']?>

            <div class="ficheDiplomer__description__contact">
                <p class="h4">Vous pouvez me joindre en consultant </p>
                <?php if ($listeDiplomes[$i]['pseudoTwitter']!=null){ ?>
                    <a href=" <?php echo $listeDiplomes[$i]['pseudoTwitter']?>" class="boutonMauve">
                        Mon Twitter
                    </a>
                <?php } ?>
                <?php if ($listeDiplomes[$i]['linked']!=null){ ?>
                    <a  href=" <?php echo $listeDiplomes[$i]['linked']?>" class="boutonMauve">
                        Mon linkedin
                    </a>
                <?php } ?>
                <?php if ($listeDiplomes[$i]['siteWeb']!=null){ ?>
                    <a href="<?php echo $listeDiplomes[$i]['siteWeb']?>" class="boutonMauve">
                        Mon site web
                    </a>
                <?php } ?>
            </div>
        </div>

<?php } } ?>
    </div>
</main>


<?php get_footer() ?>
