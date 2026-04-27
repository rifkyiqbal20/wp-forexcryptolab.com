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
        
        // Custom Query untuk memanggil semua artikel buatan Bot
        $blog_query = new WP_Query( array(
            'post_type'      => 'post',
            'post_status'    => 'publish',
            'paged'          => $paged,
            'posts_per_page' => 12, // Anda bisa ubah ini untuk membatasi jumlah artikel per halaman
        ) );
        ?>

        <?php if ( $blog_query->have_posts() ) : ?>
            <div class="blog-grid">
                <?php while ( $blog_query->have_posts() ) : $blog_query->the_post(); ?>
                    <article class="blog-card">
                        <div class="blog-image" style="padding: 0; overflow: hidden; background: #eee;">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <?php the_post_thumbnail( 'medium', array( 'style' => 'width:100%; height:100%; object-fit:cover;' ) ); ?>
                            <?php else : ?>
                                <span style="font-size: 3em; display:flex; align-items:center; justify-content:center; width:100%; height:100%;">📝</span>
                            <?php endif; ?>
                        </div>
                        <div class="blog-content">
                            <p class="blog-date"><?php echo get_the_date(); ?></p>
                            <h3><a href="<?php the_permalink(); ?>" style="text-decoration:none; color:inherit;"><?php the_title(); ?></a></h3>
                            <p><?php echo wp_trim_words( get_the_excerpt(), 15, '...' ); ?></p>
                            <a href="<?php the_permalink(); ?>" class="read-more">Read Full Article →</a>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>
            
            <div class="pagination-wrapper" style="margin-top: 60px; text-align: center;">
                <?php
                echo paginate_links( array(
                    'total'     => $blog_query->max_num_pages,
                    'current'   => $paged,
                    'mid_size'  => 2,
                    'prev_text' => __( '← Previous', 'forexcryptolab' ),
                    'next_text' => __( 'Next →', 'forexcryptolab' ),
                ) );
                ?>
            </div>
            <style>
                .pagination-wrapper .page-numbers { display: inline-block; padding: 10px 20px; background: white; border-radius: 8px; text-decoration: none; color: #1e3c72; font-weight: bold; box-shadow: 0 4px 6px rgba(0,0,0,0.05); transition: all 0.3s; margin: 0 5px; }
                .pagination-wrapper .page-numbers.current { background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%); color: white; }
                .pagination-wrapper .page-numbers:hover:not(.current) { background: #ffd700; color: #1e3c72; transform: translateY(-2px); }
            </style>
            <?php wp_reset_postdata(); ?>
        <?php else : ?>
            <div style="text-align: center; padding: 50px 0;">
                <p><?php _e( 'Belum ada artikel saat ini.', 'forexcryptolab' ); ?></p>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>
