<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package UC_Santa_Cruz
 */

$dept_name = get_field('department_address_dept_name');
$location = get_field('department_location');
$website = get_field('department_website');
$email = get_field('department_email');
$street_address = get_field('department_address_university_street_address');
$city = get_field('department_address_city');
$state = get_field('department_address_state');
$zip = get_field('department_address_zip');
$mail_stop = get_field('department_address_mail_stop');
$delivery_addr = get_field('department_address_delivery_building_room_number');
$office_hours = get_field('department_office_hours');
?>

<div class="row-flex dept-info">
    <div class="column column-half">
        <h3>Department Details</h3>
        <?php
        if ( !empty( $location ) ) : ?>
            <span class="dept-label">Campus Location: </span> <?php print $location; ?><br />
        <?php endif; ?>

        <?php
        if ( !empty( $email ) ) : ?>
            <span class="dept-label">Department email: </span><a href="mailto:<?php print $email; ?>"><?php print $email ?></a><br />
        <?php endif; ?>

        <?php
        if ( have_rows( 'department_phone_numbers' ) ) : while ( have_rows( 'department_phone_numbers' ) ) : the_row();
            $phone_line = get_sub_field('phone_line');
            $phone_number = get_sub_field('phone_number');
            if ( !empty ( $phone_line ) ) : ?>
                <span class="dept-label"><?php echo $phone_line; ?>: </span>
            <?php endif ?>
            <?php if ( !empty( $phone_number ) ) : ?>
                <span><?php echo $phone_number; ?></span><br />
            <?php endif;
        endwhile;
        endif;

        if ( !empty( $website ) ) : ?>
            <a href="<?php echo $website; ?>">Department Website</a>
        <?php endif;

        if ( !empty( $office_hours ) ) : ?>
            <h3>Office Hours</h3>
        <?php endif;

        if ( have_rows( 'department_office_hours' ) ) : while ( have_rows( 'department_office_hours' ) ) : the_row();
            $day_from = get_sub_field('day_from');
            $day_to = get_sub_field('day_to');
            $morning_open = get_sub_field('morning_open');
            $morning_closed = get_sub_field('morning_closed');
            $afternoon_open = get_sub_field('afternoon_open');
            $afternoon_closed = get_sub_field('afternoon_closed');

            if ($day_from) : ?>
                <span class="dept-label"><?php echo $day_from.' - '.$day_to; ?>:</span>
            <?php endif ?>

            <?php
            // TODO: Jonathan to look at the logic here and make it better
            if ($morning_open && $morning_closed) {
                echo $morning_open.' - '.$morning_closed.'<br />';
            } else if ($morning_open) {
                echo $morning_open.' - '.$afternoon_closed.'<br />';
            }
            if ($afternoon_open){
                echo $afternoon_open.' - '.$afternoon_closed;
            }
        endwhile;
        endif;
        ?>
    </div>
    <div class="column column-half">
        <h3>USPS Mailing Address</h3>
        UC Santa Cruz<br />
        Department of <?php echo $dept_name; ?><br />
        <?php echo $street_address; ?><br />
        <?php if ( !empty( $mail_stop ) ) : ?>
            MS: <?php echo $mail_stop; ?><br />
        <?php endif ?>
        <?php echo $city . ', ' . $state . ' ' . $zip; ?><br />
        <h3>FedEx/UPS Delivery Address</h3>
        UC Santa Cruz<br />
        Department of <?php echo $dept_name; ?><br />
        <?php echo $street_address; ?><br />
        <?php if ( !empty( $delivery_addr ) ) : ?>
            <?php echo $delivery_addr; ?><br />
        <?php endif ?>
        <?php echo $city . ', ' . $state . ' ' . $zip; ?><br />
    </div>
</div>