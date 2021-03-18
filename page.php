<?php get_header();
echo "page.php"
?>
<main>
    <?php the_post(); ?>
<div class="en-tete-page">
    <h1><?php the_title(); ?></h1>
</div>
    <?php the_content(); ?>
</main>

<?php get_footer() ?>
