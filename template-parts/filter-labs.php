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

$postTax1 = 'researcher-faculty-labs-tax';
$postTax2 = 'resesarch-area-expertise-tax';
$selectID = 'researcher_faculty_labs_list';
$taxTitle1 = 'Affiliation';
$taxTitle2 = 'Expertise';
$taxTerms1 = get_terms($postTax1, ['hide_empty' => false]);
$taxTerms2 = get_terms($postTax2, ['hide_empty' => false]);

?>
<h3 class="filter-head">Filter this list:</h3>
<ul class="filter-list no-list-style">
    <li>
        <select class="filter-select" id="<?php echo $postTax1 ?>">
            <option selected="selected" value="clear"><?php echo $taxTitle1 ?></option>
            <?php if ($taxTerms1) {
                foreach ($taxTerms1 as $taxTerm1) {
                    echo '<option value="' . $taxTerm1->slug . '">' . $taxTerm1->name . '</option>';
                }
            } ?>
        </select>
    </li>
    <li>
        <select class="filter-select" id="<?php echo $postTax2 ?>">
            <option selected="selected" value="clear"><?php echo $taxTitle2 ?></option>
            <?php if ($taxTerms2) {
                foreach ($taxTerms2 as $taxTerm2) {
                    echo '<option value="' . $taxTerm2->slug . '">' . $taxTerm2->name . '</option>';
                }
            } ?>
        </select>
    </li>
    <li>
        <select class="filter-select" id="researcher-faculty-department-select2">
            <option selected="selected" value="clear">Department</option>
            <?php
            $depargs = array(
                'post_type' => 'department',
                'orderby' => 'title',
                'order' => 'ASC',
                'posts_per_page' => '-1'
            );
            $departmentsList = get_posts($depargs);

            if ($departmentsList) {
                foreach ($departmentsList as $department) {
                    $deptSlug = $department->post_name;
                    $deptTitle = $department->post_title;
                    echo '<option value="' . $deptSlug . '">' . $deptTitle . '</option>';
                }
            }
            ?>

        </select>
    </li>
    <li>
        <input type="search" class="search" id="lab-search" placeholder="Search by keyword" />
    </li>
    <li>
        <input value="Clear all filters" type="reset" class="primary filter-clear" id="lab-clear">
    </li>
</ul>