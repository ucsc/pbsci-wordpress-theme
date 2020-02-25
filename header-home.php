<header id="masthead" class="site-header">

    <div class="site-branding">
        <?php
        /**
         * Hero code for home page
         */
        $postID = get_the_ID();
        $homeHero = get_field('home_hero');
        $hero = $homeHero['hero_image'];
        $slideRows = $homeHero['hero_stats_slider'];
        
        // print_r($slideRows);
        if ($hero) {
            echo '<div class="hero-home"
        style="background:url(' . $hero . ') no-repeat top; background-size: cover;">';
        } else {
            echo '<div class="hero-home">';
        }
        if ($slideRows) {
            echo '<div class="flex-column flex-wrap"><div class="hero-hidden"></div><div class="panel"><div class="wrap"><div class="flexslider carousel"><ul class="slides stats-home">';
            foreach ($slideRows as $slideRow) {
                echo '<li><div class="stats-container"><div class="stats-rank"><p>#' . $slideRow['stat_rank'] . '</p></div><div class="stats-meta"><p class="stats-headline">' . $slideRow['stat_heading'] . '</p><p class="stats-source">Source: <a href="' . $slideRow['source_link'] . '">' . $slideRow['stat_source'] . '</a></p></div></div> </li>';
            }
            echo '</ul></div></div>';
        }
        
        ?>
    </div>
    </div><!-- .hero-home -->
    </div><!-- .site-branding -->
</header>
