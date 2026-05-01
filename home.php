<?php get_header(); ?>

<main class="main-content" style="margin-top: 150px; min-height: 50vh;">
    <div class="container">
        <h1 class="section-title">Berita &amp; Artikel Terbaru</h1>
        <p class="section-subtitle">Kumpulan berita, analisis, dan artikel terbaru dari Forex Crypto Lab.</p>
        
        <?php 
        // Hitung nomor awal berdasarkan halaman
        $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
        $posts_per_page = get_option( 'posts_per_page', 10 );
        $article_number = ( ( $paged - 1 ) * $posts_per_page ) + 1;
        ?>

        <?php if ( have_posts() ) : ?>
            <div class="blog-list">
                <?php while ( have_posts() ) : the_post(); ?>
                    <article class="blog-list-item">
                        <div class="blog-list-number">
                            <span><?php echo esc_html( $article_number ); ?></span>
                        </div>
                        <div class="blog-list-thumbnail">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail( 'medium' ); ?>
                                </a>
                            <?php else : ?>
                                <a href="<?php the_permalink(); ?>" class="blog-list-placeholder">
                                    <span>📝</span>
                                </a>
                            <?php endif; ?>
                        </div>
                        <div class="blog-list-content">
                            <div class="blog-list-meta">
                                <span>📅 <?php echo get_the_date(); ?></span>
                                <span>👤 <?php the_author(); ?></span>
                            </div>
                            <h3 class="blog-list-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>
                            <p class="blog-list-excerpt"><?php echo wp_trim_words( get_the_excerpt(), 25, '...' ); ?></p>
                            <a href="<?php the_permalink(); ?>" class="blog-list-readmore">Baca Selengkapnya →</a>
                        </div>
                    </article>
                <?php 
                $article_number++;
                endwhile; ?>
            </div>
            
            <!-- Navigasi Artikel Sebelumnya / Selanjutnya -->
            <div class="blog-navigation">
                <div class="blog-nav-links">
                    <div class="blog-nav-older">
                        <?php next_posts_link( '← Artikel Sebelumnya' ); ?>
                    </div>
                    <div class="blog-nav-newer">
                        <?php previous_posts_link( 'Artikel Terbaru →' ); ?>
                    </div>
                </div>
                
                <?php
                $total_pages = $GLOBALS['wp_query']->max_num_pages;
                if ( $total_pages > 1 ) :
                ?>
                <div class="blog-pagination">
                    <?php
                    echo paginate_links( array(
                        'total'     => $total_pages,
                        'current'   => $paged,
                        'mid_size'  => 2,
                        'prev_text' => '«',
                        'next_text' => '»',
                    ) );
                    ?>
                </div>
                <?php endif; ?>
            </div>

        <?php else : ?>
            <div class="blog-empty">
                <p>Belum ada artikel saat ini.</p>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>
