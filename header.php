<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <title>
        <?php /*afficher le slogan comme titre page dans accueil ou le               titre de la page autre comme titre de page*/
        bloginfo("name");
        if (is_home() || is_front_page()) {
            ?>
            | <?php bloginfo("description");
        } else {
            ?>
            | <?php wp_title("", true);
        } ?>
    </title>
    <meta charset="<?php bloginfo('charset') ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/liaisons/css/stylesMinify.css">
          <?php wp_head(); ?>

    <script src="https://kit.fontawesome.com/57261986b0.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<body>
<header>
</header>
<div class="boutonMobile">
    <span class=" fas fa-bars"></span>
</div>
<nav id="menu" class="sidebar cacher">
    <div class="text">
        <ul>
            <li class=""><a class="specialLink" href="<?php echo get_site_url();?>">   <img src="https://timunix2.cegep-ste-foy.qc.ca/~mahovington/timcsf/wp-content/uploads/2021/03/c7289561-630d-4445-b966-08e8aa53b938_200x200.png" alt="Logo de les tim"></a> </li>
            <li class=""><a class="specialLink" href="<?php echo get_site_url();?>">Accueil</a> </li>
            <li class=""><a class="specialLink" href="<?php echo get_site_url();?>/diplomer">Les diplômés</a> </li>
            <li><a class="specialLink" href="<?php echo get_site_url();?>/realisations">Réalisations</a> </li>
            <li class=""><a class="specialLink" href="<?php echo get_site_url();?>/stage">Stages</a> </li>
            <li class=""><a class="specialLink" href="<?php echo get_site_url();?>/joindre">Nous joindre</a> </li>
        </ul>
    </div>
</nav>
<div id="contenu">

