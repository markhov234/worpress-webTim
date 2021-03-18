<?php get_header(); ?>
<?php echo "index.php"; ?>
<main id="articles">
    <?php

    if (have_posts()) {
        while (have_posts()) {
            the_post(); ?>
            <article>
                <header class="titre-article">
                    <h2>
                        <?php ?>
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h2>
                </header>
                <?php
                the_content();
                ?>
            </article>
            <?php
        }
    }
    ?>
</main>
<?php get_footer(); ?>
