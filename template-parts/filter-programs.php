<?php
// debug
        // $meta = get_post_meta($post->ID);
        // echo '<pre>';
        // var_dump($values);
        // echo '</pre>'
        // echo '<pre>';
        // var_dump($meta);
        // echo '</pre>';
// end debug
// ob_start();
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

    <?php
    // return ob_get_clean();