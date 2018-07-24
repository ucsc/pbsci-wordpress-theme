<?php
/**
 * Template Name: Test Template
 * 
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package UC_Santa_Cruz
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
		<!-- <div class="row"> -->
		<?php
        echo 'hello world';

        $request = wp_remote_get( 'http://ucsc.staging.localist.com/api/2/events?days=90' );

    if(is_wp_error($request)){
        return false; //Bail Early
    }
    $body = wp_remote_retrieve_body($request);
    $data = json_decode($body);
    var_dump($request);
    print_r($request);
    if(!empty($data)){
        echo '<ul>';
        foreach ($data->events as $event){
            echo '<li>';
            echo '<a href="'. esc_url($event->event->url).'">'.$event->event->title.'</a>';
        }
        echo '</ul>';
    }
		?>
		<!-- </div> -->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
