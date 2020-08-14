<header id="masthead" class="site-header">
    <div class="site-branding">
        <?php $page_for_posts = get_option('page_for_posts');
        echo '<h1 class="entry-title sr-only">' . get_the_title($page_for_posts) . '</h1>'; ?>
    </div><!-- .site-branding -->
</header><!-- #masthead -->