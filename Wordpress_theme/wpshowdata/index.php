<?php

if(strtoupper($_SERVER['REQUEST_METHOD']) === 'POST') {

	if ( isset($_POST['passport']) && $_POST['passport'] == "yourpasswordhere" ) {
		
		if(isset($_POST['route_list']) && $_POST['route_list'] == "all_link") {
			$all_categories = get_categories();
			$all_product_categories = get_categories(array('taxonomy'=>'product_cat'));
			$all_product_attributes = get_terms( 'pa_hop-menh' );
			$all_posts = get_posts(array('numberposts'=>-1));
			$all_pages = get_posts(array('post_type'=>'page','numberposts'=>-1));
			$all_products = get_posts(array('post_type'=>'product','numberposts'=>-1));
			
			echo '<div id="categories">' ;
			foreach ($all_categories as $category) {
				$uncategorized_name = array("uncategorized"=>1);
				if( in_array($category->cat_ID, $uncategorized_name) ) continue;
				echo '<div class="item">';
				echo '<div class="link">';
				echo get_category_link($category);
				echo '</div>';
				echo '<div class="id">';
				echo $category->term_id;
				echo '</div>';
				echo '</div>';
			}
			echo '</div>';
			
			echo '<div id="product-categories">' ;
			foreach ($all_product_categories as $category) {
				$uncategorized_name = array("uncategorized"=>15);
				if( in_array($category->cat_ID, $uncategorized_name) ) continue;
				echo '<div class="item">';
				echo '<div class="link">';
				echo get_category_link($category);
				echo '</div>';
				echo '<div class="id">';
				echo $category->term_id;
				echo '</div>';
				echo '</div>';
			}
			echo '</div>';
			
			echo '<div id="product-attributes">' ;
			foreach ($all_product_attributes as $category) {
				echo '<div class="item">';
				echo '<div class="link">';
				echo get_category_link($category);
				echo '</div>';
				echo '<div class="id">';
				echo $category->term_id;
				echo '</div>';
				echo '</div>';
			}
			echo '</div>';
			
			echo '<div id="posts">' ;
			foreach ($all_posts as $each_post) {
				echo '<div class="item">';
				echo '<div class="link">';
				echo get_permalink($each_post);
				echo '</div>';
				echo '<div class="id">';
				echo $each_post->ID;
				echo '</div>';
				echo '</div>';
			}
			echo '</div>';
			
			echo '<div id="pages">' ;
			foreach ($all_pages as $each_post) {
				$unprint_page = array("cua-hang"=>6, "gio-hang"=>7, "tai-khoan"=>9, "thanh-toan"=>8, "wishlist"=>2809);
				if ( in_array($each_post->ID, $unprint_page  )) continue;
				echo '<div class="item">';
				echo '<div class="link">';
				echo get_permalink($each_post);
				echo '</div>';			
				echo '<div class="id">';
				echo $each_post->ID;
				echo '</div>';
				echo '</div>';
			}
			echo '</div>';
			
			echo '<div id="products">' ;
			foreach ($all_products as $each_post) {
				echo '<div class="item">';
				echo '<div class="link">';
				echo get_permalink($each_post);
				echo '</div>';
				echo '<div class="id">';
				echo $each_post->ID;
				echo '</div>';
				echo '</div>';
			}
			echo '</div>';
		}
		if(isset($_POST['category_list']) && $_POST['category_list'] == "all_link") {
			$all_categories = get_categories();
			echo '<div id="list">' ;
			foreach ($all_categories as $category) {
				$uncategorized_name = array("uncategorized"=>1);
				if( in_array($category->cat_ID, $uncategorized_name) ) continue;
				echo '<div class="link">';
				echo get_category_link($category);
				echo '</div>';
			}
			echo '</div>';
		}
		if(isset($_POST['product_category_list']) && $_POST['product_category_list'] == "all_link") {
			$all_categories = get_categories(array('taxonomy'=>'product_cat'));
			echo '<div id="list">' ;
			foreach ($all_categories as $category) {
				$uncategorized_name = array("uncategorized"=>15);
				if( in_array($category->cat_ID, $uncategorized_name) ) continue;
				echo '<div class="link">';
				echo get_category_link($category);
				echo '</div>';
			}
			echo '</div>';
		}
		if(isset($_POST['product_attrs_list']) && $_POST['product_attrs_list'] == "all_link") {
			$all_categories = get_terms( 'pa_hop-menh' );
			echo '<div id="list">' ;
			foreach ($all_categories as $category) {
				echo '<div class="link">';
				echo get_category_link($category);
				echo '</div>';
			}
			echo '</div>';
		}
		if(isset($_POST['post_list']) && $_POST['post_list'] == "all_link") {
			$all_posts = get_posts(array('numberposts'=>-1));
			echo '<div id="list">' ;
			foreach ($all_posts as $each_post) {
				echo '<div class="link">';
				echo get_permalink($each_post);
				echo '</div>';
			}
			echo '</div>';
		}
		if(isset($_POST['page_list']) && $_POST['page_list'] == "all_link") {
			$all_posts = get_posts(array('post_type'=>'page','numberposts'=>-1));
			echo '<div id="list">' ;
			foreach ($all_posts as $each_post) {
				$unprint_page = array("cua-hang"=>6, "gio-hang"=>7, "tai-khoan"=>9, "thanh-toan"=>8, "wishlist"=>2809);
				if ( in_array($each_post->ID, $unprint_page  )) continue;
				echo '<div class="link">';
				echo get_permalink($each_post);
				echo '</div>';
			}
			echo '</div>';
		}
		if(isset($_POST['product_list']) && $_POST['product_list'] == "all_link") {
			$all_posts = get_posts(array('post_type'=>'product','numberposts'=>-1));
			echo '<div id="list">' ;
			foreach ($all_posts as $each_post) {
				echo '<div class="link">';
				echo get_permalink($each_post);
				echo '</div>';
			}
			echo '</div>';
		}	
		if(isset($_POST['menu_list']) && $_POST['menu_list'] == "all_link") {
			wp_nav_menu( array( 'theme_location' => 'primary-menu', "menu_id" => 'main-menu') );
		}
		
		if(isset($_POST['search_list']) && $_POST['search_list'] == "all_link") {
			$all_products = get_posts(array('post_type'=>'product','numberposts'=>-1));
			echo '<div id="list-product">' ;
			foreach ($all_products as $each_product) {
				echo '<div class="item">';
				echo '<div class="link">';
				echo get_permalink($each_product);
				echo '</div>';
				echo '<div class="title">';
				echo esc_html( get_the_title($each_product) );
				echo '</div>';
				echo '<div class="id">';
				echo $each_product->ID;
				echo '</div>';
				echo '</div>';
			}
			echo '</div>';
			
			$all_posts = get_posts(array('numberposts'=>-1));
			echo '<div id="list-post">' ;
			foreach ($all_posts as $each_post) {
				echo '<div class="item">';
				echo '<div class="link">';
				echo get_permalink($each_post);
				echo '</div>';
				echo '<div class="title">';
				echo esc_html( get_the_title($each_post) );
				echo '</div>';
				echo '<div class="id">';
				echo $each_post->ID;
				echo '</div>';
				echo '</div>';
			}
			echo '</div>';
		}
		
		if(isset($_POST['shop_list']) && $_POST['shop_list'] == "all_link") {
			$all_p = wc_get_products(array('post_type'=>'product','numberposts'=>-1));
    echo '<div id="list-product-shop">' ;
    foreach ($all_p as $_product) {
        echo '<div class="item">';

            echo '<div class="link">';
                echo get_permalink($_product->get_id());
            echo '</div>';

            echo '<div class="category">';
                $product_category_objects = get_category_list_with_hierarchy(get_the_terms($_product->get_id(), "product_cat"));
                foreach($product_category_objects as $cat) {
                    echo '<div class="term-item">';
                    echo '<div class="term_id">';
                    echo $cat->term_id;
                    echo '</div>';
                    echo '<div class="term_link">';
                    echo get_term_link($cat);
                    echo '</div>';
                    echo '<div class="term_name">';
                    echo $cat->name;
                    echo '</div>';
                    echo '</div>';
                }
            echo '</div>';

            echo '<div class="title">';
                echo $_product->name;
            echo '</div>';

            echo '<div class="id">';
                echo $_product->get_id();
            echo '</div>';

            echo '<div class="attributes">';
                echo '<div class="hop-menh">';
                    echo $_product->get_attribute('pa_hop-menh');
                echo '</div>';
                echo '<div class="chat-lieu">';
                    echo $_product->get_attribute('pa_chat-lieu');
                echo '</div>';
                echo '<div class="kich-co">';
                    echo $_product->get_attribute('pa_kich-co');
                echo '</div>';
                echo '<div class="kieu-dang">';
                    echo $_product->get_attribute('pa_kieu-dang');
                echo '</div>';
            echo '</div>';
            
            echo '<div class="featured-image">';
                echo '<img class="full" src="' . wp_get_attachment_image_src($_product->get_image_id(), 'full')[0] . '"/>';
                echo '<img class="medium" src="' . wp_get_attachment_image_src($_product->get_image_id(), 'medium')[0] . '"/>';
                echo '<img class="thumbnail" src="' . wp_get_attachment_image_src($_product->get_image_id(), 'thumbnail')[0] . '"/>';
            echo '</div>';

            echo '<div class="date">';
                echo get_the_date('Y-m-d', $_product->get_id());
            echo '</div>';

            echo '<div class="price">';
                echo '<div class="regular">';
                echo $_product->get_regular_price();
                echo '</div>';
                echo '<div class="sale">';
                echo $_product->get_sale_price();
                echo '</div>';
                echo '<div class="price">';
                echo $_product->get_price();
                echo '</div>';
                echo '<div class="html-price">';
                echo $_product->get_price_html();
                echo '</div>';
            echo '</div>';
            
        echo '</div>';
    }
    echo '</div>';
		}
	}
	
}
elseif ( is_user_logged_in() ) {
	echo "You're admin!";
}
else {header("HTTP/1.1 301 Moved Permanently"); header("Location: https://daquyanan.com/");exit();}