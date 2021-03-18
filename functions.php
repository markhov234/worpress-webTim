<?php

if (function_exists('register_sidebar')){

    $args =array(
        'name' => __('Ma barre latérale','theme_text_domain'),
        'id' => 'unique-sidebar-id',
        'description' =>'',
        'class' => '',
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>'

    );

    if (! function_exists('fa_custom_setup_kit') ) {
        function fa_custom_setup_kit($kit_url = '') {
            foreach ( [ 'wp_enqueue_scripts', 'admin_enqueue_scripts', 'login_enqueue_scripts' ] as $action ) {
                add_action(
                    $action,
                    function () use ( $kit_url ) {
                        wp_enqueue_script( 'font-awesome-kit', $kit_url, [], null );
                    }
                );
            }
        }
    }


    if(function_exists('register_nav_menus')){
        register_nav_menus(
            array(
                'principal' => 'Menu principal'
            )
        );
    }
}



//Function pour les customs advanced field

//Function pour les responsables de la tim

function tim_responsable_custom_post(){

    $labels = array(
        'name' => _x('Responsable de la TIM', 'Post Type General Name'),
        'singular_name' => _x('Responsable', 'Post Type Singular Name'),
        'menu_name' =>__('Responsables 2021'),
        'all_items' =>__('Tous nos responsables'),
        'view_item' =>__('Voir nos responsables'),
        'add_new_item' =>__('Ajouter un nouveau responsable'),
        'add_new' =>__('Ajouter'),
        'edit_item' =>__('Éditer un responsable'),
        'update_item' =>__('Modifier un responsable'),
        'search_items' =>__('Rechercher un responsable'),
        'not_found' =>__('Non trouvé'),
        'not_found_in_trash' =>__('Non trouvé dans la corbeille')

    );

    $args =array(
        'label'=> __('Nos responsables'),
        'descriptionn'=> __('Tous sur nos responsables'),
        'labels'=> $labels,
        'supports'=> array(
            'title','editor','excerpt','author','thumbnail','comments','revisions','custom-fields',
        ),
        'hierarchical' =>false,
        'public'=>true,
        'has_archive'=>true,
        'rewrite'=>array('slug'=>'responsables'),
    );

    register_post_type('responsables',$args);

}

add_action('init','tim_responsable_custom_post',0);
//functionn pour les finissants de la TIM

function tim_finissant_custom_post(){

    $labels = array(
        'name' => _x('Finnissant de la TIM', 'Post Type General Name'),
        'singular_name' => _x('Finnissant', 'Post Type Singular Name'),
        'menu_name' =>__('Finnissant 2021'),
        'all_items' =>__('Tous nos finissants'),
        'view_item' =>__('Voir nos finissant'),
        'add_new_item' =>__('Ajouter un nouveau finissant'),
        'add_new' =>__('Ajouter'),
        'edit_item' =>__('Éditer un finissant'),
        'update_item' =>__('Modifier un finissant'),
        'search_items' =>__('Rechercher un finissant'),
        'not_found' =>__('Non trouvé'),
        'not_found_in_trash' =>__('Non trouvé dans la corbeille')

    );

    $args =array(
        'label'=> __('Nos finissant'),
        'descriptionn'=> __('Tous sur nos finissant'),
        'labels'=> $labels,
        'supports'=> array(
            'title','editor','excerpt','author','thumbnail','comments','revisions','custom-fields',
        ),
        'hierarchical' =>false,
        'public'=>true,
        'has_archive'=>true,
        'rewrite'=>array('slug'=>'finissant'),
    );

    register_post_type('finissant',$args);

}

add_action('init','tim_finissant_custom_post',0);

//functionn pour les cours

function tim_cours_custom_post(){

    $labels = array(
        'name' => _x('Cours de la TIM', 'Post Type General Name'),
        'singular_name' => _x('Cours', 'Post Type Singular Name'),
        'menu_name' =>__('Cours 2021'),
        'all_items' =>__('Tous nos Cours'),
        'view_item' =>__('Voir nos Cours'),
        'add_new_item' =>__('Ajouter un nouveau Cours'),
        'add_new' =>__('Ajouter'),
        'edit_item' =>__('Éditer un Cours'),
        'update_item' =>__('Modifier un Cours'),
        'search_items' =>__('Rechercher un Cours'),
        'not_found' =>__('Non trouvé'),
        'not_found_in_trash' =>__('Non trouvé dans la corbeille')

    );

    $args =array(
        'label'=> __('Nos Cours'),
        'descriptionn'=> __('Tous sur nos Cours'),
        'labels'=> $labels,
        'supports'=> array(
            'title','editor','excerpt','author','thumbnail','comments','revisions','custom-fields',
        ),
        'hierarchical' =>false,
        'public'=>true,
        'has_archive'=>true,
        'rewrite'=>array('slug'=>'Cours'),
    );

    register_post_type('cours',$args);

}

add_action('init','tim_Cours_custom_post',0);

//functionn pour les projets

function tim_projet_custom_post(){

    $labels = array(
        'name' => _x('Projets de la TIM', 'Post Type General Name'),
        'singular_name' => _x('Cours', 'Post Type Singular Name'),
        'menu_name' =>__('Projets 2021'),
        'all_items' =>__('Tous nos projets'),
        'view_item' =>__('Voir nos projets'),
        'add_new_item' =>__('Ajouter un nouveau projet'),
        'add_new' =>__('Ajouter'),
        'edit_item' =>__('Éditer un projet'),
        'update_item' =>__('Modifier un projet'),
        'search_items' =>__('Rechercher un projet'),
        'not_found' =>__('Non trouvé'),
        'not_found_in_trash' =>__('Non trouvé dans la corbeille')

    );

    $args =array(
        'label'=> __('Nos projets'),
        'descriptionn'=> __('Tous sur nos projets'),
        'labels'=> $labels,
        'supports'=> array(
            'title','editor','excerpt','author','thumbnail','comments','revisions','custom-fields',
        ),
        'hierarchical' =>false,
        'public'=>true,
        'has_archive'=>true,
        'rewrite'=>array('slug'=>'projets'),
    );

    register_post_type('projets',$args);

}

add_action('init','tim_projet_custom_post',0);

//functionn pour les témoignages

function tim_temoignage_custom_post(){

    $labels = array(
        'name' => _x('Témoignages de la TIM', 'Post Type General Name'),
        'singular_name' => _x('témoignage', 'Post Type Singular Name'),
        'menu_name' =>__('Témoignages 2021'),
        'all_items' =>__('Tous nos témoignages'),
        'view_item' =>__('Voir nos témoignages'),
        'add_new_item' =>__('Ajouter un nouveau témoignage'),
        'add_new' =>__('Ajouter'),
        'edit_item' =>__('Éditer un témoignage'),
        'update_item' =>__('Modifier un témoignage'),
        'search_items' =>__('Rechercher un témoignage'),
        'not_found' =>__('Non trouvé'),
        'not_found_in_trash' =>__('Non trouvé dans la corbeille')

    );

    $args =array(
        'label'=> __('Nos témoignages'),
        'descriptionn'=> __('Tous sur nos témoignages'),
        'labels'=> $labels,
        'supports'=> array(
            'title','editor','excerpt','author','thumbnail','comments','revisions','custom-fields',
        ),
        'hierarchical' =>false,
        'public'=>true,
        'has_archive'=>true,
        'rewrite'=>array('slug'=>'temoignage'),
    );

    register_post_type('temoignage',$args);

}

add_action('init','tim_temoignage_custom_post',0);


function tim_texte_custom_post(){

    $labels = array(
        'name' => _x('Textes de la TIM', 'Post Type General Name'),
        'singular_name' => _x('texte', 'Post Type Singular Name'),
        'menu_name' =>__('Texte 2021'),
        'all_items' =>__('Tous nos textes'),
        'view_item' =>__('Voir nos textes'),
        'add_new_item' =>__('Ajouter un nouveau textes'),
        'add_new' =>__('Ajouter'),
        'edit_item' =>__('Éditer un textes'),
        'update_item' =>__('Modifier un textes'),
        'search_items' =>__('Rechercher un textes'),
        'not_found' =>__('Non trouvé'),
        'not_found_in_trash' =>__('Non trouvé dans la corbeille')

    );

    $args =array(
        'label'=> __('Nos textes'),
        'descriptionn'=> __('Tous sur nos textes'),
        'labels'=> $labels,
        'supports'=> array(
            'title','editor','excerpt','author','thumbnail','comments','revisions','custom-fields',
        ),
        'hierarchical' =>false,
        'public'=>true,
        'has_archive'=>true,
        'rewrite'=>array('slug'=>'texte'),
    );

    register_post_type('texte',$args);

}

add_action('init','tim_texte_custom_post',0);

function tim_description_custom_post(){

    $labels = array(
        'name' => _x('Descriptions des cours de la TIM', 'Post Type General Name'),
        'singular_name' => _x('Description', 'Post Type Singular Name'),
        'menu_name' =>__('Description des cours 2021'),
        'all_items' =>__('Tous nos descriptions'),
        'view_item' =>__('Voir nos descriptions'),
        'add_new_item' =>__('Ajouter un nouveau descriptions'),
        'add_new' =>__('Ajouter'),
        'edit_item' =>__('Éditer un description'),
        'update_item' =>__('Modifier un description'),
        'search_items' =>__('Rechercher un description'),
        'not_found' =>__('Non trouvé'),
        'not_found_in_trash' =>__('Non trouvé dans la corbeille')

    );

    $args =array(
        'label'=> __('Nos descriptions'),
        'descriptionn'=> __('Tous sur nos descriptions'),
        'labels'=> $labels,
        'supports'=> array(
            'title','editor','excerpt','author','thumbnail','comments','revisions','custom-fields',
        ),
        'hierarchical' =>false,
        'public'=>true,
        'has_archive'=>true,
        'rewrite'=>array('slug'=>'description'),
    );

    register_post_type('description',$args);

}

add_action('init','tim_description_custom_post',0);

function tim_etudiantUnJour_custom_post(){

    $labels = array(
        'name' => _x('etudiantUnJour de la TIM', 'Post Type General Name'),
        'singular_name' => _x('etudiantUnJour', 'Post Type Singular Name'),
        'menu_name' =>__('EtudiantUnJour 2021'),
        'all_items' =>__('Tous nos etudiantUnJour'),
        'view_item' =>__('Voir nos etudiantUnJour'),
        'add_new_item' =>__('Ajouter un nouveau etudiantUnJour'),
        'add_new' =>__('Ajouter'),
        'edit_item' =>__('Éditer un etudiantUnJour'),
        'update_item' =>__('Modifier un etudiantUnJour'),
        'search_items' =>__('Rechercher un etudiantUnJour'),
        'not_found' =>__('Non trouvé'),
        'not_found_in_trash' =>__('Non trouvé dans la corbeille')

    );

    $args =array(
        'label'=> __('Nos etudiantUnJours'),
        'descriptionn'=> __('Tous sur nos etudiantUnJour'),
        'labels'=> $labels,
        'supports'=> array(
            'title','editor','excerpt','author','thumbnail','comments','revisions','custom-fields',
        ),
        'hierarchical' =>false,
        'public'=>true,
        'has_archive'=>true,
        'rewrite'=>array('slug'=>'etudiantUnJour'),
    );

    register_post_type('etudiantUnJour',$args);

}

add_action('init','tim_etudiantUnJour_custom_post',0);

function add_file_types_to_uploads($file_types){
    $new_filetypes = array();
    $new_filetypes['svg'] = 'image/svg+xml';
    $file_types = array_merge($file_types, $new_filetypes );
    return $file_types;
}
add_filter('upload_mimes', 'add_file_types_to_uploads');


add_theme_support('post-thumbnails');

//Code pour éviter la compression de WP
add_filter('jpeg_quality', function($arg){return 100;});

//Ajout d'une nouvelle taille d'image
if (function_exists('add_image_size')) {
    //    IMAGE NOUS JOINDRES
    add_image_size('image_joindre_1x', 150, 150, true);

    add_image_size('image_joindre_2x', 300, 300, true);

//    IMAGE DIPLOMER
    add_image_size('image_diplomer_1x', 522, 522, true);

    add_image_size('image_diplomer_2x', 1044, 1044, true);

    add_image_size('image_diplomer_mobile_1x', 386, 386, true);

    add_image_size('image_diplomer_mobile_2x', 772, 772, true);

    //    IMAGE RÉALISATIONS
    add_image_size('image_pagerea_1x', 523, 288, true);

    add_image_size('image_pagerea_2x', 1046, 576, true);

    add_image_size('image_pagerea_mobile_1x', 387, 212, true);

    add_image_size('image_pagerea_mobile_2x', 744, 426, true);

//    IMAGES ACCUEIL

    add_image_size('image_realisation_1x', 380, 558, true);

    add_image_size('image_realisation_2x', 740, 1116, true);

    add_image_size('image_realisation_mobile_1x', 355, 558, true);

    add_image_size('image_realisation_mobile_2x', 710, 1116, true);

    add_image_size('image_carre_325_1x', 325,325, true);
    add_image_size('image_carre_325_2x', 650,650, true);

    add_image_size('image_logo_1x', 136,60, true);
    add_image_size('image_logo_2x', 272,120, true);


}
