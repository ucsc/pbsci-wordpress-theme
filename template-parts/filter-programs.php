<?php
// debug
// $meta = get_post_meta($post->ID);
// echo '<pre>';
// var_dump($values);
// echo '</pre>'

// end debug


$degreeTypes = array(
    "undergradminor" => "Undergraduate Minor",
    "gradminor" => "Graduate Minor",
    "ba" => "Bachelor of Arts",
    "bs" => "Bachelor of Science",
    "ma" => "Master of Arts",
    "ms" => "Master of Science",
    "phd" => "Doctor of Philosophy"
);

?>

<ul class="flex-wrap filter-select">

    <li>
        <select name="degreetype" id="degreetype-select">
            <option selected="selected" value="clear">By degree type</option>
            <?php if ($degreeTypes) {
                foreach ($degreeTypes as $key => $value) {
                    echo '<option value="' . $key . '">' . $value . '</option>';
                }
            } ?>
        </select>
    </li>
    <li>
        <select name="department" id="department-select">
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
        <input class="search" id="degree-search" placeholder="Search Here.." />
    </li>
    <li>
        <button id="filter-clear">
            clear
        </button>
    </li>
</ul>