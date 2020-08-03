<?php
/**
 * Alert Bar
 */

$alert_bar_type = get_theme_mod( 'alert_type', 'notice' );
$alert_bar_text = get_theme_mod( 'alert_bar_text', '' );
$alert_url = get_theme_mod( 'alert_url', '' );
$alert_cta = get_theme_mod( 'alert_cta', 'View Details' );
?>
<div class="alert-bar <?php print $alert_bar_type; ?>">
    <div class="alert-wrapper"><?php print $alert_bar_text; ?></div>
    <?php if ($alert_url) : ?>
       <a class="button" href="<?php print $alert_url; ?>"><?php print $alert_cta; ?></a>
     <?php endif; ?>
</div>