<?php
// debug
// $meta = get_post_meta($post->ID);
// echo '<pre>';
// var_dump($values);
// echo '</pre>'

// end debug

$postTax = 'student-opportunities-tax';
$selectID = 'student_opportunities_list';
$taxTitle = 'Student Research Opportunities';
$taxTerms = get_terms($postTax, ['hide_empty' => false]);

?>

<ul class="flex-wrap filter-select">

    <li>
        <select class="link-select" id="<?php echo $postTax ?>">
            <option selected="selected" value="clear"><?php echo $taxTitle ?></option>
            <?php if ($taxTerms) {
                foreach ($taxTerms as $taxTerm) {
                    echo '<option value="' . $taxTerm->name . '">' . $taxTerm->name . '</option>';
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