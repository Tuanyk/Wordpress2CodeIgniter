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
        <div id="entry-content">
            <?php the_content();?>
        </div>
		<div id="data-type">page</div>
        <div id="data-id"><?php the_ID(); ?></div>
        <div id="data-slug-post"><?php echo $_SERVER['REQUEST_URI'];?></div>
        <div id="data-publish-time"><?php echo get_the_date();?></div>

    <?php endwhile; // while has_post(); ?>
<?php endif; // if has_post() ?>

<?php wp_footer();?>
</body>
</html><?php

	}
}
else {header("HTTP/1.1 301 Moved Permanently"); header("Location: https://daquyanan.com/");exit();}?>