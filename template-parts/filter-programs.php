<?php

/**
 * Template part for displaying filtering options
 *
 * for Degrees CPT
 *
 * template part added from content-degrees.php
 *
 *  @package UC_Santa_Cruz
 */

// debug
// $meta = get_post_meta($post->ID);
// echo '<pre>';
// var_dump($values);
// echo '</pre>'

// end debug


$degreeTypes = array(
    "phd" => "Doctor of Philosophy",
    "ma" => "Master of Arts",
    "ms" => "Master of Science",
    "designatedemphasis" => "Designated Emphasis",
    "contig" => "Contiguous Bachelor's/Master's",
    "ba" => "Bachelor of Arts",
    "bs" => "Bachelor of Science",
    "undergradminor" => "Undergraduate Minor",
    "designatedemphasis" => "Designated Emphasis"
);

?>

<ul id="filterSelect" class="flex-wrap filter-list no-list-style">

    <li>
        <select name="degreetype" id="degreetype-select" class="filter-select">
            <option selected="selected" value="clear">By degree type</option>
            <?php if ($degreeTypes) {
                foreach ($degreeTypes as $key => $value) {
                    echo '<option value="' . $key . '">' . $value . '</option>';
                }
            } ?>
        </select>
    </li>
    <li>
        <select name="department" id="department-select" class="filter-select">
            <option selected="selected" value="clear">By department</option>
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
        <input type="search" class="search" id="degree-search" placeholder="Search Here..." />
    </li>
    <li>
        <input type="reset" type="reset" id="degree-clear" class="primary filter-clear" value="Reset">
    </li>
</ul>