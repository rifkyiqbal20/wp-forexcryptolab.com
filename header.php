<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Forex Crypto Lab - Your trusted source for forex trading, cryptocurrency news, market analysis, and trading insights">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

    <!-- Header -->
    <header>
        <div class="header-top">
            <div class="container">
                <p>🚀 Join 50,000+ Traders Making Smarter Decisions Every Day | 📈 Real-Time Market Analysis</p>
            </div>
        </div>
        <div class="container">
            <div class="header-content">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo">Forex<span>Crypto</span>Lab</a>
                <button class="menu-toggle" id="menuToggle" aria-label="Toggle menu">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <nav id="mainNav">
                    <?php
                    if ( has_nav_menu( 'primary' ) ) {
                        wp_nav_menu( array(
                            'theme_location' => 'primary',
                            'container'      => false,
                            'menu_class'     => '',
                            'fallback_cb'    => false,
                            'items_wrap'     => '<ul>%3$s</ul>',
                        ) );
                    } else {
                        ?>
                        <ul>
                            <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>#home" class="nav-link">Home</a></li>
                            <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>#topics" class="nav-link">Topics</a></li>
                            <?php
                            $blog_pages = get_pages(array(
                                'meta_key' => '_wp_page_template',
                                'meta_value' => 'template-blog.php'
                            ));
                            $page_for_posts = get_option('page_for_posts');
                            if ( !empty($blog_pages) ) {
                                $blog_url = get_permalink($blog_pages[0]->ID);
                            } elseif ( $page_for_posts ) {
                                $blog_url = get_permalink($page_for_posts);
                            } else {
                                $blog_url = home_url('/blog/');
                            }
                            ?>
                            <li><a href="<?php echo esc_url( $blog_url ); ?>" class="nav-link">Blog</a></li>
                            <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>#platforms" class="nav-link">Platforms</a></li>
                            <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>#about" class="nav-link">About</a></li>
                        </ul>
                        <?php
                    }
                    ?>
                </nav>
            </div>
        </div>
    </header>

    <!-- Menu Overlay -->
    <div class="menu-overlay" id="menuOverlay"></div>
