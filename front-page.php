<?php get_header(); ?>

    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="container">
            <h1><?php echo esc_html( get_theme_mod( 'hero_title', 'Transform Your Trading Journey Today' ) ); ?></h1>
            <p><?php echo esc_html( get_theme_mod( 'hero_subtitle', 'Unlock the secrets of profitable trading with expert insights, proven strategies, and real-time market intelligence' ) ); ?></p>
            <a href="<?php echo esc_url( get_theme_mod( 'hero_button_url', '#blog' ) ); ?>" class="cta-button"><?php echo esc_html( get_theme_mod( 'hero_button_text', 'Start Learning Now - It\'s Free!' ) ); ?></a>
        </div>
    </section>

    <!-- Market Ticker -->
    <div class="market-ticker">
        <div class="container">
            <div class="ticker-content">
                <div class="ticker-item">
                    <span class="symbol">BTC/USD</span>
                    <span class="price">$65,432.10</span>
                    <span style="color: #27ae60;">+2.45%</span>
                </div>
                <div class="ticker-item">
                    <span class="symbol">ETH/USD</span>
                    <span class="price">$3,245.67</span>
                    <span style="color: #27ae60;">+1.89%</span>
                </div>
                <div class="ticker-item">
                    <span class="symbol">EUR/USD</span>
                    <span class="price">1.0856</span>
                    <span style="color: #e74c3c;">-0.23%</span>
                </div>
                <div class="ticker-item">
                    <span class="symbol">GBP/USD</span>
                    <span class="price">1.2634</span>
                    <span style="color: #27ae60;">+0.45%</span>
                </div>
                <div class="ticker-item">
                    <span class="symbol">XRP/USD</span>
                    <span class="price">$0.5234</span>
                    <span style="color: #27ae60;">+3.12%</span>
                </div>
                <!-- Duplicate for seamless scroll -->
                <div class="ticker-item">
                    <span class="symbol">BTC/USD</span>
                    <span class="price">$65,432.10</span>
                    <span style="color: #27ae60;">+2.45%</span>
                </div>
                <div class="ticker-item">
                    <span class="symbol">ETH/USD</span>
                    <span class="price">$3,245.67</span>
                    <span style="color: #27ae60;">+1.89%</span>
                </div>
                <div class="ticker-item">
                    <span class="symbol">EUR/USD</span>
                    <span class="price">1.0856</span>
                    <span style="color: #e74c3c;">-0.23%</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <main class="main-content">
        <!-- Trust Section -->
        <section class="trust-section">
            <div class="container">
                <div class="trust-items">
                    <div class="trust-item">
                        <span class="icon">✓</span>
                        <span>Expert Analysis</span>
                    </div>
                    <div class="trust-item">
                        <span class="icon">✓</span>
                        <span>Real-Time Data</span>
                    </div>
                    <div class="trust-item">
                        <span class="icon">✓</span>
                        <span>Trusted by 50,000+ Traders</span>
                    </div>
                    <div class="trust-item">
                        <span class="icon">✓</span>
                        <span>Updated Daily</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- Topics Section -->
        <section id="topics" class="container">
            <h2 class="section-title">Trading Topics & Resources</h2>
            <p class="section-subtitle">Everything you need to master forex and cryptocurrency trading</p>
            <div class="topics-grid">
                <div class="topic-card">
                    <div class="topic-icon">📊</div>
                    <h3>CoinMarketCap</h3>
                    <p>Never miss a market move! Track live prices, discover trending coins, and spot opportunities before everyone else.</p>
                    <a href="#" class="learn-more">Discover Now →</a>
                </div>
                <div class="topic-card">
                    <div class="topic-icon">🔷</div>
                    <h3>Binance</h3>
                    <p>Trade like a pro on the world's #1 crypto exchange. Low fees, high liquidity, and endless opportunities await.</p>
                    <a href="#" class="learn-more">Start Trading →</a>
                </div>
                <div class="topic-card">
                    <div class="topic-icon">💹</div>
                    <h3>Exness</h3>
                    <p>Lightning-fast execution, zero spread accounts, and unlimited leverage. Your gateway to professional forex trading.</p>
                    <a href="#" class="learn-more">Get Started →</a>
                </div>
                <div class="topic-card">
                    <div class="topic-icon">💱</div>
                    <h3>Forex Trading</h3>
                    <p>Turn currency movements into profit! Learn proven strategies that work in any market condition.</p>
                    <a href="#" class="learn-more">Master Forex →</a>
                </div>
                <div class="topic-card">
                    <div class="topic-icon">₿</div>
                    <h3>Cryptocurrency</h3>
                    <p>The future of money is here. Stay ahead with breaking news, expert analysis, and winning investment strategies.</p>
                    <a href="#" class="learn-more">Explore Crypto →</a>
                </div>
                <div class="topic-card">
                    <div class="topic-icon">📈</div>
                    <h3>Trading Charts</h3>
                    <p>Read the market like a book! Master technical analysis and predict price movements with confidence.</p>
                    <a href="#" class="learn-more">Learn Analysis →</a>
                </div>
                <div class="topic-card">
                    <div class="topic-icon">🖥️</div>
                    <h3>MetaTrader 5</h3>
                    <p>The ultimate trading weapon. Automate your strategy, analyze multiple markets, and trade smarter, not harder.</p>
                    <a href="#" class="learn-more">Setup MT5 →</a>
                </div>
                <div class="topic-card">
                    <div class="topic-icon">🎯</div>
                    <h3>Demo Trading</h3>
                    <p>Practice makes profit! Test your strategies risk-free and build unshakeable confidence before going live.</p>
                    <a href="#" class="learn-more">Try Demo →</a>
                </div>
                <div class="topic-card">
                    <div class="topic-icon">🏆</div>
                    <h3>OlympTrade</h3>
                    <p>Simple, fast, profitable. Start with just $10 and access powerful tools designed for winning trades.</p>
                    <a href="#" class="learn-more">Join Now →</a>
                </div>
                <div class="topic-card">
                    <div class="topic-icon">💼</div>
                    <h3>FXTrade</h3>
                    <p>Compare, choose, conquer! Find the perfect broker and platform to match your trading style and goals.</p>
                    <a href="#" class="learn-more">Compare Now →</a>
                </div>
            </div>
        </section>

        <!-- Blog Section -->
        <section id="blog" class="container">
            <h2 class="section-title">Latest Articles & Insights</h2>
            <p class="section-subtitle">Expert guides and strategies to boost your trading success</p>
            <div class="blog-grid">
                <?php
                $recent_posts = new WP_Query( array(
                    'posts_per_page' => 6,
                    'post_status'    => 'publish',
                    'ignore_sticky_posts' => true
                ) );

                if ( $recent_posts->have_posts() ) :
                    while ( $recent_posts->have_posts() ) : $recent_posts->the_post();
                ?>
                <article class="blog-card">
                    <div class="blog-image" style="padding: 0; overflow: hidden; background: #eee;">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <?php the_post_thumbnail( 'medium', array( 'style' => 'width:100%; height:100%; object-fit:cover;' ) ); ?>
                        <?php else : ?>
                            <span style="font-size: 3em; display:flex; align-items:center; justify-content:center; width:100%; height:100%;">📊</span>
                        <?php endif; ?>
                    </div>
                    <div class="blog-content">
                        <p class="blog-date"><?php echo get_the_date(); ?></p>
                        <h3><a href="<?php the_permalink(); ?>" style="text-decoration:none; color:inherit;"><?php the_title(); ?></a></h3>
                        <p><?php echo wp_trim_words( get_the_excerpt(), 15, '...' ); ?></p>
                        <a href="<?php the_permalink(); ?>" class="read-more">Read Full Guide →</a>
                    </div>
                </article>
                <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                ?>
                    <p style="text-align:center; grid-column: 1 / -1;"><?php _e( 'Belum ada artikel.', 'forexcryptolab' ); ?></p>
                <?php endif; ?>
            </div>
            
            <div style="text-align: center; margin-top: 50px;">
                <?php
                // Mencari URL dari halaman yang menggunakan "Template: Blog Page"
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
                <a href="<?php echo esc_url( $blog_url ); ?>" class="cta-button" style="padding: 15px 40px;">View All Articles</a>
            </div>
        </section>

        <!-- Platforms Section -->
        <section id="platforms" class="platforms">
            <div class="container">
                <h2 class="section-title">Trusted Trading Platforms</h2>
                <p class="section-subtitle">Industry-leading platforms for forex and crypto trading</p>
                <div class="platforms-grid">
                    <div class="platform-item">
                        <div class="platform-logo">🔷</div>
                        <h4>Binance</h4>
                        <p>Crypto Exchange</p>
                    </div>
                    <div class="platform-item">
                        <div class="platform-logo">💹</div>
                        <h4>Exness</h4>
                        <p>Forex Broker</p>
                    </div>
                    <div class="platform-item">
                        <div class="platform-logo">🖥️</div>
                        <h4>MetaTrader 5</h4>
                        <p>Trading Platform</p>
                    </div>
                    <div class="platform-item">
                        <div class="platform-logo">🏆</div>
                        <h4>OlympTrade</h4>
                        <p>Trading Platform</p>
                    </div>
                    <div class="platform-item">
                        <div class="platform-logo">📊</div>
                        <h4>CoinMarketCap</h4>
                        <p>Market Data</p>
                    </div>
                </div>
            </div>
        </section>
    </main>

<?php get_footer(); ?>
