<header id="masthead" class="site-header">
    <div class="site-branding">
        <div class="no-hero flex-wrap">
            <div class="header-runner">
                <div class="wrap flex-wrap">
                    <header class="entry-header flex-wrap">
                        <div class="entry-header-right">
                            <?php get_template_part('template-parts/breadcrumbs', 'head'); ?>
                            <span class="entry-header-span-b flex-wrap">
                                <?php
                                if (is_search()) {
                                    echo '<h1>';
                                    /* translators: %s: search query. */
                                    printf(esc_html__('Search Results for: %s', 'ucsc-pbsci'), '<span>' . get_search_query() . '</span>');
                                    echo '</h1>';
                                } else {
                                    the_archive_title('<h1 class="page-title">', '</h1>');
                                }
                                ?>
                            </span>
                        </div>
                    </header><!-- .entry-header -->

                </div><!-- .hero-home wrap -->
            </div><!-- .header-runner -->

        </div><!-- .site-branding -->
</header><!-- #masthead -->
