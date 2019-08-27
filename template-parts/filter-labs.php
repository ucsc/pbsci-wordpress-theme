<?php

/**
 * Template part for displaying filtering options
 *
 * for Faculty and Researcher Labs CPT
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

$postTax = 'researcher-faculty-labs-tax';
$selectID = 'researcher_faculty_labs_list';
$taxTitle = 'Faculty Researchers List';
$taxTerms = get_terms($postTax, ['hide_empty' => false]);

?>

<ul class="flex-wrap filter-list no-list-style">

    <li>
        <select class="filter-select" id="<?php echo $postTax ?>">
            <option selected="selected" value="clear"><?php echo $taxTitle ?></option>
            <?php if ($taxTerms) {
                foreach ($taxTerms as $taxTerm) {
                    echo '<option value="' . $taxTerm->name . '">' . $taxTerm->name . '</option>';
                }
            } ?>
        </select>
    </li>
    <li>
        <input type="search" class="search" id="lab-search" placeholder="Search Here.." />
    </li>
    <li>
        <input value="reset" type="reset" class="primary filter-clear" id="lab-clear">
    </li>
</ul>