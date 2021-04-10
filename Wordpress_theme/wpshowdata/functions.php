<?php

add_theme_support( 'menus' );
add_action( 'init', 'register_my_menus' );

    function register_my_menus() {
        register_nav_menus(
            array(
                'primary-menu' => __( 'Primary Menu' ),
                'secondary-menu' => __( 'Secondary Menu' )
            )
        );
    }

if (!function_exists('get_all_category_posts')) {
 function get_all_category_posts( $query ) {
    if( ! is_admin() && $query->is_main_query() && is_category() ) {
        $query->set( 'posts_per_page', '-1' );
    }
 }
}

add_action( 'pre_get_posts', 'get_all_category_posts' );

function prefix_category_title( $title ) {
    if ( is_category() || is_product_category() ) {
        $title = single_cat_title( '', false );
    }
    return $title;
}
add_filter( 'get_the_archive_title', 'prefix_category_title' );

function mytheme_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );

// Disable Woocommerce Header in WP Admin 
add_action('admin_head', 'Hide_WooCommerce_Breadcrumb');

function Hide_WooCommerce_Breadcrumb() {
  echo '<style>
    .woocommerce-layout__header {
        display: none;
    }
    .woocommerce-layout__activity-panel-tabs {
        display: none;
    }
    .woocommerce-layout__header-breadcrumbs {
        display: none;
    }
    .woocommerce-embed-page .woocommerce-layout__primary{
        display: none;
    }
    .woocommerce-embed-page #screen-meta, .woocommerce-embed-page #screen-meta-links{top:0;}
    </style>';
}

$hook_to = 'woocommerce_checkout_order_processed';
$what_to_hook = 'wl8OrderPlacedTriggerSomething';
$prioriy = 111;
$num_of_arg = 1;    
add_action($hook_to, $what_to_hook, $prioriy, $num_of_arg);

function wl8OrderPlacedTriggerSomething($order_id){
	$order = wc_get_order( $order_id );
	$txt_mess = "Đơn hàng mới\nTên: " . $order->get_billing_first_name() . "\nĐịa chỉ: " . $order->get_billing_address_1() . "\nEmail: " . $order->get_billing_email() . "\nĐiện thoại: " . $order->get_billing_phone() . "\nGhi chú: " . $order->get_customer_note() . "\nSản phẩm:\n";
$product_items = $order->get_items();
$k_num=1;
foreach ($product_items as $p)
	{
		$txt_mess .= strval($k_num) . ", SP: " . $p->get_name() . " | Số lượng: " . $p->get_quantity() . " | Giá sp: " . number_format($p->get_subtotal()) . " | Tổng: " . number_format($p->get_total());
		$k++;
	}
	
	  $url = "YOUR TELEGRAM BOT LINK" . urlencode($txt_mess);
	  file_get_contents($url);
}

add_action('transition_post_status', 'wpse171719_submit_post_save_data', 111, 3);
function wpse171719_submit_post_save_data($new_status, $old_status, $post) {
    global $wpdb;
	$post_id = $post->ID;
	$post_type = $post->post_type;
	$post_permalink = get_permalink($post);
	if ($post_type == "post") {
		$result = exec("cd /var/www/daquyanan.com/htdocsci/app/Data && python3 /var/www/daquyanan.com/htdocsci/app/Data/main2.py --postid=$post_id --postlink=$post_permalink");
		exec("cd /var/www/daquyanan.com/htdocsci/app/Data && python3 /var/www/daquyanan.com/htdocsci/app/Data/t.py --sm=$post_permalink");
	}
    elseif ($post_type == "product") {
		$result = exec("cd /var/www/daquyanan.com/htdocsci/app/Data && python3 /var/www/daquyanan.com/htdocsci/app/Data/main2.py --productid=$post_id --productlink=$post_permalink");
		exec("cd /var/www/daquyanan.com/htdocsci/app/Data && python3 /var/www/daquyanan.com/htdocsci/app/Data/t.py --sm=$post_permalink");
	}
}

add_action('transition_post_status', 'clear_cache_ci', 123);
function clear_cache_ci() {
 exec("python3 /var/www/daquyanan.com/htdocsci/app/Data/clearcache.py");

}

function addHopmenhbutton() {
	global $product;
	$hopmenh = $product->get_attribute("Hợp mệnh");
	if ($hopmenh !== "") {
												echo "<p><strong>Hợp mệnh: </strong></p><span class='Hopmenh'>";
												if (strpos($hopmenh, "Kim") !== false) {echo '<label class="button" style="background-color:#e6e6e6;"><a href="https://daquyanan.com/hop-menh/kim/" class="button-hop-menh">Kim</a></label>';}
												if (strpos($hopmenh, "Mộc") !== false) {echo '<label class="button" style="background-color:#449d44;"><a href="https://daquyanan.com/hop-menh/moc/" class="button-hop-menh">Mộc</a></label>';}
												if (strpos($hopmenh, "Thủy") !== false) {echo '<label class="button" style="background-color:#5bc0de;"><a href="https://daquyanan.com/hop-menh/thuy/" class="button-hop-menh">Thủy</a></label>';}
												if (strpos($hopmenh, "Hỏa") !== false) {echo '<label class="button" style="background-color:#ff3832;"><a href="https://daquyanan.com/hop-menh/hoa/" class="button-hop-menh">Hỏa</a></label>'; }
												if (strpos($hopmenh, "Thổ") !== false) {echo '<label class="button" style="background-color:#ee9a1c;"><a href="https://daquyanan.com/hop-menh/tho/" class="button-hop-menh">Thổ</a></label>'; }
												echo '</span>';
											}
}

add_action('woocommerce_single_product_summary', 'addHopmenhbutton');

function get_category_depth($category_obj) {
	$depth = 1;
	$current_cat = $category_obj;
	while ($current_cat->parent != 0) {
		$current_cat = $current_cat->parent;
		$depth++;
	}
	return $depth;
}

function get_category_list_with_hierarchy($product_cats) {
	$result = array();
	$cats_depth_array = array();
	$maxium_depth = 1;
	foreach ($product_cats as $key=>$cat) {
		$cat_depth = get_category_depth($cat);
		array_push($cats_depth_array, $cat_depth);
		if ($cat_depth > $maxium_depth) $maxium_depth = $cat_depth;
	}
	for ($i=1;$i<$maxium_depth+1;$i++){
		foreach ($cats_depth_array as $key=>$item) {
			if ($item==$i) array_push($result, $product_cats[$key]);
		}
	}
	return $result;
}

function ShowProductByID($args) {
	$product_ids = $args['id'];
    $product_ids = str_replace(" ", "", $product_ids);
    $product_ids = explode(",", $product_ids);
    $products = array();
    foreach ($product_ids as $product_id) {
        array_push($products, wc_get_product($product_id));
    }
	ob_start();
    ?>

                <!-- Shop Wrapper Start -->
                <div class="row shop_wrapper grid_4">
                    <?php foreach ($products as $product){ ?>
                    <!-- Single Product Start -->
                    <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 product">
                        <div class="product-inner">
                            <div class="thumb-blog">
                                <a href="<?php echo get_permalink($product->get_id());?>" class="image">
                                    <img class="first-image" src="<?php echo wp_get_attachment_image_src($product->get_image_id(), 'thumbnail')[0]; ?>"
                                        alt="<?php echo $product->get_name();?>" />
                                    <img class="second-image" src="<?php echo wp_get_attachment_image_src($product->get_image_id(), 'thumbnail')[0]; ?>"
                                    alt="<?php echo $product->get_name();?>" />
                                </a>
                            </div>
                            <div class="content">
                                <h4 class="title"><a href="<?php echo get_permalink($product->get_id());?>"><?php echo $product->get_name();?></a></h4>
                                <span class="price">
                                <?php echo $product->get_price_html();?>
                                </span>
                                <div class="shop-list-btn">
                                    <button onclick="window.location.href='<?php echo get_permalink($product->get_id());?>'" class="btn btn-sm btn-outline-dark btn-hover-primary"
                                        title="Xem ngay">Xem ngay</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Single Product End -->
                    <?php } ?>
                </div>
                <!-- Shop Wrapper End -->

    <?php $contents=ob_get_contents();
ob_end_clean();
return $contents;
}

add_shortcode( 'sp', 'ShowProductByID' );

function ShowProductByCat1($args) {
	$product_ids = $args['id'];
    $product_ids = str_replace(" ", "", $product_ids);
    $product_ids = explode(",", $product_ids);
    $products = array();
    foreach ($product_ids as $product_id) {
        array_push($products, wc_get_product($product_id));
    }
	ob_start();
    ?>

                <!-- Shop Wrapper Start -->
                <div class="row shop_wrapper grid_4">
                    <?php foreach ($products as $product){ ?>
                    <!-- Single Product Start -->
                    <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 product">
                        <div class="product-inner">
                            <div class="thumb-blog">
                                <a href="<?php echo get_permalink($product->get_id());?>" class="image">
                                    <img class="first-image" src="<?php echo wp_get_attachment_image_src($product->get_image_id(), 'thumbnail')[0]; ?>"
                                        alt="<?php echo $product->get_name();?>" />
                                    <img class="second-image" src="<?php echo wp_get_attachment_image_src($product->get_image_id(), 'thumbnail')[0]; ?>"
                                    alt="<?php echo $product->get_name();?>" />
                                </a>
                            </div>
                            <div class="content">
                                <h4 class="title"><a href="<?php echo get_permalink($product->get_id());?>"><?php echo $product->get_name();?></a></h4>
                                <span class="price">
                                <?php echo $product->get_price_html();?>
                                </span>
                                <div class="shop-list-btn">
                                    <button onclick="window.location.href='<?php echo get_permalink($product->get_id());?>'" class="btn btn-sm btn-outline-dark btn-hover-primary"
                                        title="Xem ngay">Xem ngay</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Single Product End -->
                    <?php } ?>
                </div>
                <!-- Shop Wrapper End -->

    <?php $contents=ob_get_contents();
ob_end_clean();
return $contents;
}

function ShowProductByCat($args) {
	$data = get_category(28);
	var_dump($data);
ob_start();

	?>
	
	<?php
$contents=ob_get_contents();
ob_end_clean();
return $contents;
}

add_shortcode( 'cat', 'ShowProductByCat' );