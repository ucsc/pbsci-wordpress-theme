<?php

/**
 * Template part for displaying filtering options
 *
 * for Student Opportunities CPT
 *
 * template part added from content-links.php
 *
 *  @package UC_Santa_Cruz
 */

// debug
// $meta = get_post_meta($post->ID);
// echo '<pre>';
// var_dump($values);
// echo '</pre>'

// end debug

// load taxonomy slugs into variables
$postTax1 = 'student-opportunities-tax';
$postTax2 = 'student-opp-eligib-tax';
$postTax3 = 'student-opp-avail-tax';
// id
$selectID = 'student_opportunities_list';
// select value for null / top select drop-down values
$selectTitle1 = 'Student Research Opportunities';
$selectTitle2 = 'By eligibility';
$selectTitle3 = 'By availability';
// all taxonomy terms per taxonomy -- used to build select
$taxTerms1 = get_terms($postTax1, ['hide_empty' => false]);
$taxTerms2 = get_terms($postTax2, ['hide_empty' => false]);
$taxTerms3 = get_terms($postTax3, ['hide_empty' => false]);



?>

<ul class="flex-wrap filter-select">

    <li>
        <select class="link-select" id="<?php echo $postTax1 ?>">
            <option selected="selected" value="clear"><?php echo $selectTitle1 ?></option>
            <?php if ($taxTerms1) {
                foreach ($taxTerms1 as $taxTerm1) {
                    echo '<option value="' . $taxTerm1->name . '">' . $taxTerm1->name . '</option>';
                }
            } ?>
        </select>
    </li>
    <li>
        <select class="link-select" id="<?php echo $postTax2 ?>">
            <option selected="selected" value="clear"><?php echo $selectTitle2 ?></option>
            <?php if ($taxTerms2) {
                foreach ($taxTerms2 as $taxTerm2) {
                    echo '<option value="' . $taxTerm2->name . '">' . $taxTerm2->name . '</option>';
                }
            } ?>
        </select>
    </li>
    <li>
        <select class="link-select" id="<?php echo $postTax3 ?>">
            <option selected="selected" value="clear"><?php echo $selectTitle3 ?></option>
            <?php if ($taxTerms3) {
                foreach ($taxTerms3 as $taxTerm3) {
                    echo '<option value="' . $taxTerm3->name . '">' . $taxTerm3->name . '</option>';
                }
            } ?>
        </select>
    </li>
    <li>
        <input class="search" id="opportunity-search" placeholder="Search Here.." />
    </li>
    <li>
        <button class="filter-clear" id="lab_clear">
            clear
        </button>
    </li>
</ul>