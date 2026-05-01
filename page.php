<?php
/**
 * Default Page Template
 * 
 * @package ForexCryptoLab
 */

get_header(); 
?>

<main class="main-content" style="margin-top: 150px; min-height: 50vh;">
    <div class="container">
        <?php while ( have_posts() ) : the_post(); ?>
            <article id="page-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header style="text-align: center; margin-bottom: 40px;">
                    <h1 class="section-title"><?php the_title(); ?></h1>
                </header>
                <div class="entry-content prose bot-content-wrapper">
                    <?php the_content(); ?>
                </div>
            </article>
        <?php endwhile; ?>
    </div>
</main>

<?php get_footer(); ?>
