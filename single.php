<?php get_header(); ?>

<style>
/* ===== SINGLE POST STYLES ===== */
.single-post-wrap {
    margin-top: 140px;
    min-height: 60vh;
    padding: 60px 0 80px;
    background: #f8f9fa;
}
.single-post-inner {
    max-width: 860px;
    margin: 0 auto;
    padding: 0 20px;
}
.single-post-header {
    text-align: center;
    margin-bottom: 40px;
}
.single-post-header h1 {
    font-family: 'Poppins', sans-serif;
    font-size: 2.4em;
    font-weight: 800;
    color: #1e3c72;
    line-height: 1.3;
    margin-bottom: 18px;
}
.single-post-meta {
    display: flex;
    justify-content: center;
    gap: 20px;
    color: #888;
    font-size: 0.95em;
    flex-wrap: wrap;
    margin-bottom: 30px;
}
.single-post-thumbnail {
    width: 100%;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0,0,0,0.12);
    margin-bottom: 50px;
}
.single-post-thumbnail img {
    width: 100%;
    height: auto;
    max-height: 480px;
    object-fit: cover;
    display: block;
}
/* Content */
.single-post-content {
    background: #ffffff;
    border-radius: 16px;
    padding: 50px 60px;
    box-shadow: 0 4px 6px rgba(0,0,0,0.04), 0 10px 20px rgba(0,0,0,0.04);
    font-size: 1.08em;
    line-height: 1.85;
    color: #333;
}
.single-post-content p {
    margin-bottom: 1.5em;
}
.single-post-content h1,
.single-post-content h2,
.single-post-content h3,
.single-post-content h4,
.single-post-content h5,
.single-post-content h6 {
    font-family: 'Poppins', sans-serif;
    color: #1e3c72;
    margin-top: 2em;
    margin-bottom: 0.8em;
    line-height: 1.3;
    font-weight: 700;
}
.single-post-content h2 { font-size: 1.7em; }
.single-post-content h3 { font-size: 1.4em; }
.single-post-content h4 { font-size: 1.2em; }
.single-post-content img {
    max-width: 100%;
    height: auto;
    border-radius: 10px;
    margin: 1.5em 0;
    box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    display: block;
}
.single-post-content ul,
.single-post-content ol {
    padding-left: 2em;
    margin-bottom: 1.5em;
}
.single-post-content li {
    margin-bottom: 0.5em;
}
.single-post-content blockquote {
    border-left: 4px solid #ffd700;
    background: #fffdf0;
    padding: 20px 25px;
    margin: 1.5em 0;
    border-radius: 0 8px 8px 0;
    font-style: italic;
    color: #555;
}
.single-post-content a {
    color: #2a5298;
    text-decoration: underline;
}
.single-post-content a:hover {
    color: #ffd700;
}
.single-post-content table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 1.5em;
    overflow-x: auto;
    display: block;
}
.single-post-content th,
.single-post-content td {
    border: 1px solid #e0e0e0;
    padding: 12px 15px;
    text-align: left;
}
.single-post-content th {
    background: #f4f6f9;
    font-weight: 600;
    color: #1e3c72;
}
/* Back button */
.single-post-back {
    margin-top: 40px;
    text-align: center;
}
.single-post-back a {
    display: inline-block;
    padding: 12px 30px;
    background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
    color: #ffffff;
    text-decoration: none;
    border-radius: 50px;
    font-weight: 600;
    font-size: 0.95em;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(30,60,114,0.2);
}
.single-post-back a:hover {
    background: linear-gradient(135deg, #ffd700 0%, #ffed4e 100%);
    color: #1e3c72;
    transform: translateY(-2px);
}
@media (max-width: 768px) {
    .single-post-header h1 { font-size: 1.8em; }
    .single-post-content { padding: 30px 24px; font-size: 1em; }
    .single-post-thumbnail img { max-height: 280px; }
}
@media (max-width: 480px) {
    .single-post-header h1 { font-size: 1.5em; }
    .single-post-content { padding: 24px 18px; }
}
</style>

<div class="single-post-wrap">
    <div class="single-post-inner">
        <?php while ( have_posts() ) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                <div class="single-post-header">
                    <h1><?php the_title(); ?></h1>
                    <div class="single-post-meta">
                        <span>📅 <?php echo get_the_date(); ?></span>
                        <span>👤 <?php the_author(); ?></span>
                    </div>
                </div>

                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="single-post-thumbnail">
                        <?php the_post_thumbnail( 'full' ); ?>
                    </div>
                <?php endif; ?>

                <div class="single-post-content">
                    <?php the_content(); ?>
                </div>

                <div class="single-post-back">
                    <?php
                    $blog_url = home_url( '/blog/' );
                    $blog_pages = get_pages( array(
                        'meta_key'   => '_wp_page_template',
                        'meta_value' => 'template-blog.php',
                    ) );
                    if ( ! empty( $blog_pages ) ) {
                        $blog_url = get_permalink( $blog_pages[0]->ID );
                    }
                    ?>
                    <a href="<?php echo esc_url( $blog_url ); ?>">← Kembali ke Semua Artikel</a>
                </div>

            </article>
        <?php endwhile; ?>
    </div>
</div>

<?php get_footer(); ?>
