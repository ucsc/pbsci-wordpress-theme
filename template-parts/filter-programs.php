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

echo '<pre>';
// var_dump($query);
echo '</pre>';

$depargs = array(
    'post_type' => 'department',
    'orderby' => 'title',
    'order' => 'ASC',
    'posts_per_page' => '-1'
);
$departmentsList = get_posts($depargs);

if ($departmentsList) {
    echo '<ul>';
    foreach ($departmentsList as $department) {
        $deptSlug = $department->post_name;
        $deptTitle = $department->post_title;
        echo '<li>slug: ' . $deptSlug . ' title: ' . $deptTitle . '</li>';
    }
    echo '</ul>';
}

// echo '<pre>';
// var_dump($departmentsList);
// echo '</pre>';
?>

<div id="ajax-filter-search">
    <form action="" method="get">
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
                <select name="focusarea" id="focusarea">
                    <option value="">By focus area</option>
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
                    <option value="undergradminor">Astronomy & Astrophysics</option>
                    <option value="gradminor">Chemistry & Biochemistry</option>
                    <option value="ba">Earth & Planetary Sciences</option>
                    <option value="bs">Mathematics</option>
                    <option value="ma">Microbiology & Environmental Toxicology</option>
                    <option value="ms">Molecular, Cell & Developmental Biology</option>
                    <option value="phd">Ocean Sciences</option>
                    <option value="phd">Physics</option>
                    <option value="phd">Science Communication</option>
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