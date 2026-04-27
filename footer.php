    <!-- Footer -->
    <footer id="about">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3>About Forex Crypto Lab</h3>
                    <p>We're on a mission to democratize trading success. Whether you're starting with $100 or $100,000, our expert insights, proven strategies, and real-time analysis give you the edge you need to win in forex and crypto markets.</p>
                    <div class="disclaimer">
                        <strong>⚠️ Risk Disclaimer</strong>
                        Trading forex and cryptocurrencies involves substantial risk of loss and is not suitable for all investors. Past performance is not indicative of future results. Please trade responsibly and only invest what you can afford to lose.
                    </div>
                </div>
                <div class="footer-section">
                    <h3>Quick Links</h3>
                    <ul>
                        <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>#home">Home</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>#topics">Trading Topics</a></li>
                        <li><a href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ); ?>">Blog & Articles</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>#platforms">Platforms</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h3>Trading Resources</h3>
                    <ul>
                        <li><a href="#">Forex Trading Guide</a></li>
                        <li><a href="#">Crypto Trading Guide</a></li>
                        <li><a href="#">Technical Analysis</a></li>
                        <li><a href="#">Trading Strategies</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h3>Platforms</h3>
                    <ul>
                        <li><a href="#">Binance</a></li>
                        <li><a href="#">Exness</a></li>
                        <li><a href="#">MetaTrader 5</a></li>
                        <li><a href="#">OlympTrade</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; <?php echo date('Y'); ?> Forex Crypto Lab. All rights reserved.</p>
                <p style="margin-top: 10px; font-size: 0.9em; opacity: 0.8;">Educational and informational purposes only. Not financial advice. Always do your own research.</p>
            </div>
        </div>
    </footer>

    <script>
        // Mobile Menu Toggle
        const menuToggle = document.getElementById('menuToggle');
        const mainNav = document.getElementById('mainNav');
        const menuOverlay = document.getElementById('menuOverlay');
        const navLinks = document.querySelectorAll('.nav-link');

        // Toggle menu
        if(menuToggle) {
            menuToggle.addEventListener('click', () => {
                menuToggle.classList.toggle('active');
                mainNav.classList.toggle('active');
                menuOverlay.classList.toggle('active');
                document.body.style.overflow = mainNav.classList.contains('active') ? 'hidden' : '';
            });
        }

        // Close menu when clicking overlay
        if(menuOverlay) {
            menuOverlay.addEventListener('click', () => {
                menuToggle.classList.remove('active');
                mainNav.classList.remove('active');
                menuOverlay.classList.remove('active');
                document.body.style.overflow = '';
            });
        }

        // Close menu when clicking nav link
        if(navLinks) {
            navLinks.forEach(link => {
                link.addEventListener('click', () => {
                    if(menuToggle && menuToggle.classList.contains('active')) {
                        menuToggle.classList.remove('active');
                        mainNav.classList.remove('active');
                        menuOverlay.classList.remove('active');
                        document.body.style.overflow = '';
                    }
                });
            });
        }

        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                const targetId = this.getAttribute('href');
                if (targetId === '#') return;
                
                const target = document.querySelector(targetId);
                if (target) {
                    e.preventDefault();
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Add active class to navigation on scroll
        window.addEventListener('scroll', () => {
            let current = '';
            const sections = document.querySelectorAll('section');
            
            sections.forEach(section => {
                const sectionTop = section.offsetTop;
                if (pageYOffset >= (sectionTop - 200)) {
                    current = section.getAttribute('id');
                }
            });

            document.querySelectorAll('nav a.nav-link').forEach(link => {
                link.classList.remove('active');
                const href = link.getAttribute('href');
                if (href && href.includes('#' + current) && current !== '') {
                    link.classList.add('active');
                }
            });
        });

        // Close menu on window resize
        window.addEventListener('resize', () => {
            if (window.innerWidth > 768 && menuToggle) {
                menuToggle.classList.remove('active');
                mainNav.classList.remove('active');
                menuOverlay.classList.remove('active');
                document.body.style.overflow = '';
            }
        });

        // Scroll reveal animation
        const revealElements = document.querySelectorAll('.topic-card, .blog-card');
        
        const revealOnScroll = () => {
            const windowHeight = window.innerHeight;
            revealElements.forEach(element => {
                const elementTop = element.getBoundingClientRect().top;
                const revealPoint = 100;
                
                if (elementTop < windowHeight - revealPoint) {
                    element.classList.add('reveal', 'active');
                }
            });
        };

        window.addEventListener('scroll', revealOnScroll);
        // Initial check
        if(revealElements.length > 0) {
            setTimeout(revealOnScroll, 100);
        }
    </script>
    <?php wp_footer(); ?>
</body>
</html>
