<?php ?>
<div id="app" class="some-class">
    {{ message }}
</div>
<div id="app-2">
    <span v-bind:title="message">
        Hover your mouse over me for a few seconds
        to see my dynamically bound title!
    </span>
</div>
<div id="app-4">
    <ol>
        <li v-for="todo in todos">
            {{ todo.text }}
        </li>
    </ol>
</div>
<div id="app-5">
    <p>{{ message }}</p>
    <button v-on:click="reverseMessage">Reverse Message</button>
</div>
<div id="app-7">
    <ol>
        <!-- Create an instance of the todo-item component -->
        <todo-item v-for="item in groceryList" v-bind:todo="item" v-bind:key="item.id"></todo-item>
    </ol>
</div>
<div id="post">
    <article>
        <header>
            <h1 class="post-title">
                {{post.title.rendered}}
            </h1>
        </header>
        <div class="entry-content" v-html="post.content.rendered">
            {{post.content.rendered}}
        </div>
    </article>
</div>

<div id="test">

    <button-counter></button-counter>
</div>

<?php
$args = array(
    'post_type' => 'degree',
    'orderby' => 'title',
    'order' => 'ASC',
    'posts_per_page' => '-1'
);

$pbscidegrees = get_posts($args);

if ($pbscidegrees) :
    echo '<ul>';
    foreach ($pbscidegrees as $pbscidegree) :
        $program_title = get_the_title($pbscidegree->ID);
        $degrees_offered = get_field_object('degrees_offered', $pbscidegree->ID);
        $degrees = $degrees_offered['value'];
        foreach ($degrees as $degree) {
            echo '<li>' . $degree . '</li>';
        };
    endforeach;
    echo '</ul>';
endif;

if ($pbscidegrees) : ?>
<script>
ajaxurl = "/wp-admin/admin-ajax.php"

var programs = [
    <?php foreach ($pbscidegrees as $pbscidegree) {
                //Set up the parts
                $program_title = get_the_title($pbscidegree->ID);
                $program_subtitle = get_field('program_subtitle', $pbscidegree->ID);
                $program_blurb = get_the_excerpt($pbscidegree->ID);
                $program_departments = get_field('department_link', $pbscidegree->ID);
                $program_majors = get_field('major_link', $pbscidegree->ID);
                $degrees_offered = get_field_object('degrees_offered', $pbscidegree->ID);
                $degrees = $degrees_offered['value'];
                $academic_options = get_field('additional_academic_options', $pbscidegree->ID);
                $postid = get_the_ID($pbscidegree->ID); ?> {
        "id": <?php echo $pbscidegree->ID; ?>,
        "title": "<?php echo $program_title; ?>",
        "subtitle": "<?php echo $program_subtitle; ?>",
        "visible": true,
        "selected": false,
        "department": "<?php echo $degrees; ?>",
        "degrees-offered": "<?php echo wp_json_encode($degrees, '', 512); ?>",

    },
    <?php
            }
            ?>

];

console.log(programs);
</script>
<?php endif; ?>