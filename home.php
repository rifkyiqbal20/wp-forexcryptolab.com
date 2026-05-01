<?php get_header(); ?>

<?php /* Reuse page-blog.php logic via include */ ?>
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

<style>
.blog-archive-wrap {
    margin-top: 140px;
    min-height: 60vh;
    padding: 60px 0 80px;
    background: #f8f9fa;
}
.blog-archive-header {
    text-align: center;
    margin-bottom: 50px;
}
.blog-archive-header h1 {
    font-family: 'Poppins', sans-serif;
    font-size: 2.6em;
    font-weight: 800;
    color: #1e3c72;
    margin-bottom: 15px;
    position: relative;
    padding-bottom: 20px;
}
.blog-archive-header h1::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 80px;
    height: 4px;
    background: linear-gradient(90deg, #1e3c72, #ffd700);
    border-radius: 2px;
}
.blog-archive-header p { font-size: 1.1em; color: #666; max-width: 600px; margin: 0 auto; }
.blog-archive-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 28px;
    margin-bottom: 60px;
}
.blog-archive-card {
    background: #ffffff;
    border-radius: 16px;
    overflow: hidden;
    text-decoration: none;
    color: inherit;
    display: flex;
    flex-direction: column;
    box-shadow: 0 4px 6px rgba(0,0,0,0.06), 0 10px 20px rgba(0,0,0,0.04);
    border: 1px solid rgba(0,0,0,0.06);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.blog-archive-card:hover { transform: translateY(-8px); box-shadow: 0 16px 40px rgba(0,0,0,0.12); }
.blog-archive-card-img { width: 100%; height: 200px; overflow: hidden; background: #e9ecef; flex-shrink: 0; }
.blog-archive-card-img img { width: 100%; height: 100%; object-fit: cover; display: block; transition: transform 0.4s ease; }
.blog-archive-card:hover .blog-archive-card-img img { transform: scale(1.07); }
.blog-archive-card-noimg { width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); font-size: 3.5em; }
.blog-archive-card-body { padding: 22px 22px 26px; display: flex; flex-direction: column; flex: 1; }
.blog-archive-card-date { font-size: 0.82em; color: #999; margin-bottom: 10px; }
.blog-archive-card-body h3 { font-family: 'Poppins', sans-serif; font-size: 1.1em; font-weight: 700; color: #1e3c72; margin: 0 0 10px 0; line-height: 1.4; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; }
.blog-archive-card-body p { font-size: 0.9em; color: #666; line-height: 1.6; margin: 0 0 16px 0; flex: 1; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; }
.blog-archive-card-link { font-size: 0.88em; font-weight: 600; color: #2a5298; transition: color 0.3s; margin-top: auto; }
.blog-archive-card:hover .blog-archive-card-link { color: #ffd700; }
.blog-archive-nav { display: flex; align-items: center; justify-content: center; gap: 12px; flex-wrap: wrap; }
.blog-archive-nav-btn { display: inline-block; padding: 12px 28px; background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%); color: #ffffff !important; text-decoration: none; border-radius: 50px; font-weight: 600; font-size: 0.95em; transition: all 0.3s ease; box-shadow: 0 4px 15px rgba(30,60,114,0.2); white-space: nowrap; }
.blog-archive-nav-btn:hover { background: linear-gradient(135deg, #ffd700 0%, #ffed4e 100%); color: #1e3c72 !important; transform: translateY(-2px); }
.blog-archive-nav-pages { display: flex; gap: 6px; align-items: center; }
.blog-archive-nav-pages .page-numbers { display: inline-flex; align-items: center; justify-content: center; width: 42px; height: 42px; background: #ffffff; border-radius: 10px; text-decoration: none; color: #1e3c72; font-weight: 600; box-shadow: 0 2px 8px rgba(0,0,0,0.06); transition: all 0.3s ease; border: 1px solid rgba(0,0,0,0.08); }
.blog-archive-nav-pages .page-numbers.current { background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%); color: #ffffff; border-color: transparent; }
.blog-archive-nav-pages .page-numbers:hover:not(.current) { background: #ffd700; color: #1e3c72; transform: translateY(-2px); }
@media (max-width: 1024px) { .blog-archive-grid { grid-template-columns: repeat(2, 1fr); } }
@media (max-width: 640px) { .blog-archive-header h1 { font-size: 1.9em; } .blog-archive-grid { grid-template-columns: 1fr; } .blog-archive-nav { flex-direction: column; } .blog-archive-nav-btn { width: 100%; text-align: center; } }
</style>

<div class="blog-archive-wrap">
    <div class="container">
        <div class="blog-archive-header">
            <h1>Berita &amp; Artikel Terbaru</h1>
            <p>Kumpulan berita, analisis, dan artikel terbaru dari Forex Crypto Lab.</p>
        </div>

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
                            <span class="blog-archive-card-date">📅 <?php echo get_the_date(); ?></span>
                            <h3><?php the_title(); ?></h3>
                            <p><?php echo wp_trim_words( get_the_excerpt(), 18, '...' ); ?></p>
                            <span class="blog-archive-card-link">Baca Selengkapnya →</span>
                        </div>
                    </a>
                <?php endwhile; ?>
            </div>

            <div class="blog-archive-nav">
                <?php if ( $paged > 1 ) : ?>
                    <a href="<?php echo esc_url( get_pagenum_link( $paged - 1 ) ); ?>" class="blog-archive-nav-btn">← Artikel Terbaru</a>
                <?php endif; ?>
                <?php if ( $blog_query->max_num_pages > 1 ) : ?>
                <div class="blog-archive-nav-pages">
                    <?php echo paginate_links( array( 'total' => $blog_query->max_num_pages, 'current' => $paged, 'mid_size' => 2, 'prev_text' => '', 'next_text' => '', 'type' => 'plain' ) ); ?>
                </div>
                <?php endif; ?>
                <?php if ( $paged < $blog_query->max_num_pages ) : ?>
                    <a href="<?php echo esc_url( get_pagenum_link( $paged + 1 ) ); ?>" class="blog-archive-nav-btn">Artikel Sebelumnya →</a>
                <?php endif; ?>
            </div>

            <?php wp_reset_postdata(); ?>
        <?php else : ?>
            <div style="text-align:center; padding:80px 20px; color:#999;">
                <p style="font-size:1.2em;">Belum ada artikel saat ini.</p>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>
