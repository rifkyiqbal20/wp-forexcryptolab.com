<?php
/*
Template Name: Blog Page
*/

get_header(); 
?>

<main class="main-content" style="margin-top: 150px; min-height: 50vh;">
    <div class="container">
        <h1 class="section-title">
            <?php the_title(); ?>
        </h1>
        <p class="section-subtitle">Kumpulan berita, analisis, dan artikel terbaru dari Forex Crypto Lab.</p>
        
        <?php 
        // Mengambil nomor halaman saat ini (untuk Pagination)
        $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
        $posts_per_page = 10;
        
        // Custom Query untuk memanggil semua artikel
        $blog_query = new WP_Query( array(
            'post_type'      => 'post',
            'post_status'    => 'publish',
            'paged'          => $paged,
            'posts_per_page' => $posts_per_page,
        ) );
        
        // Hitung nomor awal berdasarkan halaman
        $article_number = ( ( $paged - 1 ) * $posts_per_page ) + 1;
        ?>

        <?php if ( $blog_query->have_posts() ) : ?>
            <div class="blog-list">
                <?php while ( $blog_query->have_posts() ) : $blog_query->the_post(); ?>
                    <article class="blog-list-item">
                        <div class="blog-list-number">
                            <span><?php echo $article_number; ?></span>
                        </div>
                        <div class="blog-list-thumbnail">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail( 'medium', array( 'style' => 'width:100%; height:100%; object-fit:cover;' ) ); ?>
                                </a>
                            <?php else : ?>
                                <a href="<?php the_permalink(); ?>" class="blog-list-placeholder">
                                    <span>📝</span>
                                </a>
                            <?php endif; ?>
                        </div>
                        <div class="blog-list-content">
                            <p class="blog-list-date">📅 <?php echo get_the_date(); ?> &nbsp;|&nbsp; 👤 <?php the_author(); ?></p>
                            <h3 class="blog-list-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>
                            <p class="blog-list-excerpt"><?php echo wp_trim_words( get_the_excerpt(), 25, '...' ); ?></p>
                            <a href="<?php the_permalink(); ?>" class="read-more">Baca Selengkapnya →</a>
                        </div>
                    </article>
                <?php 
                $article_number++;
                endwhile; ?>
            </div>
            
            <!-- Navigasi Artikel Sebelumnya / Selanjutnya -->
            <div class="blog-navigation">
                <div class="blog-nav-links">
                    <div class="blog-nav-prev">
                        <?php
                        // Untuk custom WP_Query, kita pakai paginate_links
                        if ( $paged > 1 ) :
                            $prev_page = $paged - 1;
                        ?>
                            <a href="<?php echo esc_url( get_pagenum_link( $prev_page ) ); ?>">← Artikel Terbaru</a>
                        <?php endif; ?>
                    </div>
                    <div class="blog-nav-next">
                        <?php if ( $paged < $blog_query->max_num_pages ) :
                            $next_page = $paged + 1;
                        ?>
                            <a href="<?php echo esc_url( get_pagenum_link( $next_page ) ); ?>">Artikel Sebelumnya →</a>
                        <?php endif; ?>
                    </div>
                </div>
                
                <?php if ( $blog_query->max_num_pages > 1 ) : ?>
                <div class="blog-pagination">
                    <?php
                    echo paginate_links( array(
                        'total'     => $blog_query->max_num_pages,
                        'current'   => $paged,
                        'mid_size'  => 2,
                        'prev_text' => '«',
                        'next_text' => '»',
                    ) );
                    ?>
                </div>
                <?php endif; ?>
            </div>
            
            <?php wp_reset_postdata(); ?>
        <?php else : ?>
            <div style="text-align: center; padding: 50px 0;">
                <p><?php _e( 'Belum ada artikel saat ini.', 'forexcryptolab' ); ?></p>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>
