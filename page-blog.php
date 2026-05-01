<?php
/**
 * Template untuk Page dengan slug "blog"
 * WordPress otomatis pakai file ini untuk halaman /blog/
 * 
 * @package ForexCryptoLab
 */

get_header(); 
?>

<main class="blog-archive" style="margin-top: 140px; min-height: 60vh; padding: 60px 0;">
    <div class="container">
        <div class="blog-archive-header">
            <h1>Berita &amp; Artikel Terbaru</h1>
            <p>Kumpulan berita, analisis, dan artikel terbaru dari Forex Crypto Lab.</p>
        </div>
        
        <?php 
        $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
        $posts_per_page = 9;
        
        $blog_query = new WP_Query( array(
            'post_type'      => 'post',
            'post_status'    => 'publish',
            'paged'          => $paged,
            'posts_per_page' => $posts_per_page,
        ) );
        ?>

        <?php if ( $blog_query->have_posts() ) : ?>
            <div class="blog-archive-grid">
                <?php while ( $blog_query->have_posts() ) : $blog_query->the_post(); ?>
                    <a href="<?php the_permalink(); ?>" class="blog-archive-card">
                        <div class="blog-archive-card-img">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <?php the_post_thumbnail( 'medium_large' ); ?>
                            <?php else : ?>
                                <div class="blog-archive-card-noimg">📝</div>
                            <?php endif; ?>
                        </div>
                        <div class="blog-archive-card-body">
                            <span class="blog-archive-card-date"><?php echo get_the_date(); ?></span>
                            <h3><?php the_title(); ?></h3>
                            <p><?php echo wp_trim_words( get_the_excerpt(), 15, '...' ); ?></p>
                            <span class="blog-archive-card-link">Baca Selengkapnya →</span>
                        </div>
                    </a>
                <?php endwhile; ?>
            </div>
            
            <!-- Navigasi -->
            <div class="blog-archive-nav">
                <?php if ( $paged > 1 ) : ?>
                    <a href="<?php echo esc_url( get_pagenum_link( $paged - 1 ) ); ?>" class="blog-archive-nav-btn">
                        ← Artikel Terbaru
                    </a>
                <?php endif; ?>
                
                <div class="blog-archive-nav-pages">
                    <?php
                    echo paginate_links( array(
                        'total'     => $blog_query->max_num_pages,
                        'current'   => $paged,
                        'mid_size'  => 2,
                        'prev_text' => '',
                        'next_text' => '',
                        'type'      => 'plain',
                    ) );
                    ?>
                </div>
                
                <?php if ( $paged < $blog_query->max_num_pages ) : ?>
                    <a href="<?php echo esc_url( get_pagenum_link( $paged + 1 ) ); ?>" class="blog-archive-nav-btn">
                        Artikel Sebelumnya →
                    </a>
                <?php endif; ?>
            </div>
            
            <?php wp_reset_postdata(); ?>
        <?php else : ?>
            <div style="text-align: center; padding: 80px 20px; color: #999;">
                <p style="font-size: 1.2em;">Belum ada artikel saat ini.</p>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>
