<?php
// debug
// $meta = get_post_meta($post->ID);
// echo '<pre>';
// var_dump($values);
// echo '</pre>'

// end debug
// ob_start();
$degargs = array(
    'post_type' => 'degree',
    'orderby' => 'title',
    'order' => 'ASC',
    'posts_per_page' => '-1'
);

$degs = get_posts($degargs);
if ($degs) {
    $degsOffered = get_field_object('degrees_offered');
    // echo '<ul>';
    // foreach ($degsOffered as $deg) {
    // echo '<li>label: ' . $deg['label'] . ' value: ' . $deg['value'] . '</li>';
    // }
    // echo '</ul>';
}

// echo '<pre>';
// var_dump($query);
// echo '</pre>';



// echo '<pre>';
// var_dump($departmentsList);
// echo '</pre>';
?>

<div id="ajax-filter-search">
    <form id="program-filter" class="program-filter" action="" method="get">
        <ul class="flex-wrap">
            <li>
                <select name="degreetype" id="degreetype">
                    <option value="">By degree type</option>
                    <option value="undergradminor">Undergraduate Minor</option>
                    <option value="gradminor">Graduate Minor</option>
                    <option value="ba">Bachelor of Arts</option>
                    <option value="bs">Bachelor of Science</option>
                    <option value="ma">Master of Arts</option>
                    <option value="ms">Master of Science</option>
                    <option value="phd">Doctor of Philosophy</option>
                </select>
            </li>
            <li>
                <select name="department" id="department">
                    <option value="">By department</option>
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
                <input type="text" name="search" id="search" value="" placeholder="Search Here..">
                <input type="submit" id="submit" name="submit" value="Search">
            </li>
        </ul>
    </form>
    <ul id="ajax_fitler_search_results"></ul>
</div>