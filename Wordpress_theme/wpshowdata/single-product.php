<?php

if(strtoupper($_SERVER['REQUEST_METHOD']) === 'POST' ||  is_user_logged_in()) {

	if ( ( isset($_POST['passport']) && $_POST['passport'] == "yourpasswordhere" ) ||  is_user_logged_in()){
		?><html>
<head>
    <?php wp_head();?>
</head>
<body>
<?php wp_body_open();
do_action( 'woocommerce_before_single_product' );
?>
<!-- Requiemda -->
<?php if( have_posts() ) : 
    global $product; 
        

    ?>
<!-- Requiemda -->
    <?php while( have_posts() ) : the_post(); ?>
		
        <h1 id="entry-title"><?php the_title();?></h1>
        <div id="featured-image">
            <?php echo '<img src="' . wp_get_attachment_url($product->get_image_id()) . '"/>';?>
        </div> 
		<div id="featured-image-all-size">
			<?php echo '<img class="medium" src="' . wp_get_attachment_image_src($product->get_image_id(), 'medium')[0] . '"/>';?>
			<?php echo '<img class="thumbnail" src="' . wp_get_attachment_image_src($product->get_image_id(), 'thumbnail')[0] . '"/>';?>
		</div>
		<div id="data-image-galleries">
			<?php $attachment_ids = $product->get_gallery_image_ids(); 
			foreach ( $attachment_ids as $attachment_id ) 
				{
					$Original_image_url = wp_get_attachment_url( $attachment_id );
					$full_url = wp_get_attachment_image_src( $attachment_id, 'full' )[0];
					$medium_url = wp_get_attachment_image_src( $attachment_id, 'medium' )[0];
					$thumbnail_url = wp_get_attachment_image_src( $attachment_id, 'thumbnail' )[0];
				
					echo '<img class="original-url" src="' .$Original_image_url . '" data-full-url="' . $full_url . '" data-medium-url="' . $medium_url . '" data-thumbnail-url="' . $thumbnail_url .'"/>';
				}
			?>
		</div>
        <div id="woo-hook">
            <?php 
                do_action( 'woocommerce_before_single_product_summary' );
                do_action( 'woocommerce_single_product_summary' );
                do_action( 'woocommerce_after_single_product_summary' );
            ?>
        
        </div>
        <div id="entry-content">
            <?php the_content() ;?>
        </div>
		<div id="data-type">product</div>
		<div id="data-short-description"><?php echo apply_filters( 'woocommerce_short_description',$product->get_short_description());?></div>
        <div id="data-id"><?php the_ID(); ?></div>
	<?php $product_category_objects = get_category_list_with_hierarchy(get_the_terms($product->get_id(), "product_cat"));?> 
	
        <div id="data-category-name"><?php foreach($product_category_objects as $cat) {
				echo '<a href="';
				echo get_term_link($cat);
				echo '">';
				echo $cat->name;
				echo '</a> &gt;&gt; ';
			} ?></div>
		<div id="data-category-id"><?php
			foreach($product_category_objects as $cat) {
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
        <div id="data-attribute"><?php echo wc_display_product_attributes($product);?></div>
        <div id="data-price-html"><?php echo $product->get_price_html(); ?></div>
    <?php endwhile; // while has_post(); ?>
<?php endif; // if has_post() ?>

<?php 
do_action( 'woocommerce_after_single_product' );
wp_footer();?>
</body>
</html><?php }}
else {header("HTTP/1.1 301 Moved Permanently"); header("Location: https://daquyanan.com/");exit();}?>