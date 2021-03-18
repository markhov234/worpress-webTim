<?php get_header();


$post=get_post(220);

$lienUnJour=get_field_object("lien_responsable");
$post_object=$lienUnJour['value'];


$lienPascal=add_query_arg('ID',$post_object->ID,get_the_permalink(46));

?>
<main>
<div class="page__stages">
    <div class="conteneur">
    <h1>Stages</h1>
        <?php echo get_post(220)->texte_texte ?>
        <a href="<?php echo $lienPascal ?>" class="boutonJaune">Écrire à Pascal Larose</a>

    </div>
</div>
</main>

<?php get_footer() ?>
