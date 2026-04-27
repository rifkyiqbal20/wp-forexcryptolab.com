<?php get_header(); ?>

<main class="main-content" style="margin-top: 130px; min-height: 60vh;">
    <div class="container">
        <?php while ( have_posts() ) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header" style="text-align: center; margin-bottom: 40px; max-width: 900px; margin-left: auto; margin-right: auto;">
                    <h1 class="entry-title" style="font-size: 2.8em; color: #1e3c72; margin-bottom: 15px; font-weight: 800; line-height: 1.3;"><?php the_title(); ?></h1>
                    
                    <div class="entry-meta" style="color: #666; margin-bottom: 30px; font-size: 1.1em;">
                        <span>📅 <?php echo get_the_date(); ?></span>
                        <span style="margin-left: 20px;">👤 <?php the_author(); ?></span>
                    </div>

                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="post-hero-image" style="margin-bottom: 40px; border-radius: 16px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
                            <?php the_post_thumbnail( 'full', array( 'style' => 'width: 100%; height: auto; display: block; max-height: 500px; object-fit: cover;' ) ); ?>
                        </div>
                    <?php endif; ?>
                </header>

                <div class="entry-content prose bot-content-wrapper">
                    <?php the_content(); ?>
                </div>
            </article>
        <?php endwhile; ?>
    </div>
</main>

<?php get_footer(); ?>
