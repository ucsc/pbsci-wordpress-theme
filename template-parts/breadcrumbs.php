<?php
/**
 * Breadcrumbs
 */
?>

<div class="breadcrumbs-container">
    <div class="wrap">
        <?php
            if ( function_exists('breadcrumb_trail') ) {
                breadcrumb_trail();
            }
        ?>
    </div>
</div>
