<header id="masthead" class="site-header">
    <div class="site-branding">
        <div class="no-hero flex-wrap">
            <div class="header-runner">
                <div class="wrap flex-wrap">
                    <header class="entry-header flex-wrap">
                        <div class="entry-header-right">
                            <?php get_template_part('template-parts/breadcrumbs', 'head'); ?>
                            <span class="entry-header-span-b flex-wrap">
                                <?php $page_for_posts = get_option('page_for_posts');
                                echo '<h1 class="entry-title">' . get_the_title($page_for_posts) . '</h1>'; ?>
                            </span>
                        </div>
                    </header><!-- .entry-header -->

                </div><!-- .hero-home wrap -->
            </div><!-- .header-runner -->

        </div><!-- .site-branding -->
</header><!-- #masthead -->