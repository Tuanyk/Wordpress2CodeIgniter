<?php

if(strtoupper($_SERVER['REQUEST_METHOD']) === 'POST' ||  is_user_logged_in()) {

	if ( ( isset($_POST['passport']) && $_POST['passport'] == "yourpasswordhere" ) ||  is_user_logged_in()){
		?><html>
<head>
    <?php wp_head();?>
</head>
<body>
<?php wp_body_open();?>

<?php if( have_posts() ) : ?>
    <?php while( have_posts() ) : the_post(); ?>
        <h1 id="entry-title">
            <?php the_title();?>
        </h1>
        <div id="featured-image">
            <?php the_post_thumbnail();?>
        </div> 
        <div id="entry-content">
            <?php the_content();?>
        </div>
		<div id="data-type">post</div>
        <div id="data-id"><?php the_ID(); ?></div>
        <div id="data-category-name"><?php the_category(","); ?></div>
		<div id="data-category-id"><?php $category_objects = get_the_category();
			foreach($category_objects as $cat) {
				echo '<div class="item">';
				echo '<div class="term_id">';
				echo $cat->term_id;
				echo '</div>';
				echo '<div class="term_link">';
				echo get_term_link($cat);
				echo '</div>';
				echo '</div>';
			}
			?>
		</div>
        <div id="data-slug-post"><?php echo $_SERVER['REQUEST_URI'];?></div>
        <div id="data-publish-time"><?php echo get_the_date();?></div>
    <?php endwhile; // while has_post(); ?>
<?php endif; // if has_post() ?>

<?php wp_footer();?>
</body>
</html><?php }}
else {header("HTTP/1.1 301 Moved Permanently"); header("Location: https://daquyanan.com/");exit();}?>