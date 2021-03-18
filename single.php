<?php get_header(); ?>
<?php echo "la vraie single.php"; ?>

<main>
    <?php the_post(); ?>
    <div id="article-seul">
        <h2>
            <?php the_title(); ?>
        </h2>
        <?php the_content(); ?>
        <p class="metadata">Par : <?php the_author(); ?></p>
        <p class="metadata">Publié le : <?php the_date(); ?></p>
    </div>
</main>


<?php get_footer() ?>
