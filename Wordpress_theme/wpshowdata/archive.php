<?php

if(strtoupper($_SERVER['REQUEST_METHOD']) === 'POST' ||  is_user_logged_in()) {

	if ( ( isset($_POST['passport']) && $_POST['passport'] == "yourpasswordhere" ) ||  is_user_logged_in()){
		?>
<html>
<head>
    <?php wp_head();?>
</head>
<body>
<?php wp_body_open();?>

<?php if( have_posts() ) : ?>
	<div id="data-type">category</div>
	<div id="data-id"><?php echo get_queried_object_id();?></div>
	<div id="data-slug-post"><?php echo $_SERVER['REQUEST_URI'];?></div>
	<div id="data-entry-title"><?php the_archive_title( '<h1>', '</h1>' ); ?></div>
	<div id="data-excerpt"><?php echo wp_kses_post( wpautop( get_the_archive_description() ) ); ?></div>
	<div id="data-yoast-description">
		<?php echo YoastSEO()->meta->for_current_page()->description;?>
	</div>
    <?php while( have_posts() ) : the_post(); ?>
			<div class="data-post-infomation">
				<?php the_title('<h2 class="post-title">', '</h2>'); ?>	
				<div class="post-excerpt"><?php the_excerpt(); ?></div>
				<div class="post-yoast-description"><?php echo get_post_meta(get_the_ID(), '_yoast_wpseo_metadesc', true); ?></div>
				<div class="post-permalink"><?php the_permalink();?></div>
				<div class="post-featured-image">
					<img src="<?php echo get_the_post_thumbnail_url();?>" data-full-image="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full');?>" data-medium-image="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium');?>" data-thumbnail-image="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'thumbnail');?>"/>
				</div>
			</div>
    <?php endwhile; // while has_post(); ?>
<?php endif; // if has_post() ?>

<?php wp_footer();?>
</body>
</html>

<?php }}
else {header("HTTP/1.1 301 Moved Permanently"); header("Location: https://daquyanan.com/");exit();}?>