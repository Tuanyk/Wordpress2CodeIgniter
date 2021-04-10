<?php
define("JSON_PATH", APPPATH . "Data/data_json/");
define("POST_PATH", APPPATH . "Data/data_json/post/");
define("POST_CAT_PATH", APPPATH . "Data/data_json/postcat/");
define("PRODUCT_PATH", APPPATH . "Data/data_json/product/");
define("PRODUCT_CAT_PATH", APPPATH . "Data/data_json/productcat/");
define("PRODUCT_ATT_PATH", APPPATH . "Data/data_json/productatt/");
define("PAGE_PATH", APPPATH . "Data/data_json/page/");
define("ROUTE_PATH", APPPATH . "Data/data_json/route");
define("MENU_PATH", APPPATH . "Data/data_json/menu");
define("SEARCH_PATH", APPPATH . "Data/data_json/search");
define("SHOP_PATH", APPPATH . "Data/data_json/shop");



function getContentofFile($filepath)
    {
        return json_decode(file_get_contents($filepath), TRUE);
    }

function getPostData($id)
    {
        return getContentofFile(POST_PATH . $id);
    }
function getPostCatData($id)
    {
        return getContentofFile(POST_CAT_PATH . $id);
    }
function getProductData($id)
    {
        return getContentofFile(PRODUCT_PATH . $id);
    }
function getProductcatData($id)
    {
        return getContentofFile(PRODUCT_CAT_PATH . $id);
    }
function getProductattData($id)
    {
        return getContentofFile(PRODUCT_ATT_PATH . $id);
    }
function getPageData($id)
    {
        return getContentofFile(PAGE_PATH . $id);
    }
function getRouteData()
    {
        return getContentofFile(ROUTE_PATH);
    }
function getSearchData()
    {
        return getContentofFile(SEARCH_PATH);
    }
function getShopData()
    {
        return getContentofFile(SHOP_PATH);
    }
function getMenuData()
    {
        return getContentofFile(MENU_PATH);
    }

function getFirstLevelofMenuHierarchy($menu_hierarchy)
    {
        $first_level_menu_key = array();
        for ($i=0;$i<count($menu_hierarchy);$i++)
            {
                if ($menu_hierarchy[$i] == "1") array_push($first_level_menu_key, $i);
            }
        return $first_level_menu_key;
    }



function getRightData($str)
    {
        $data_type = explode('/', $str)[1];
        $data_id = explode('/', $str)[2];
        if ($data_type == "product") return "Blog::product/$data_id";
        if ($data_type == "post") return "Blog::post/$data_id";
        if ($data_type == "productcat") return "Blog::productcat/$data_id";
        if ($data_type == "productatt") return "Blog::productatt/$data_id";
        if ($data_type == "page") return "Blog::page/$data_id";
        if ($data_type == "postcat") return "Blog::postcat/$data_id";
    }

function showProductCarousel($product_array_id, $carousel_name)
    {   
        if (empty($product_array_id)) return;
        $product_array_carousel = array();
        foreach ( $product_array_id as $p_id ) 
            {
                array_push($product_array_carousel, getProductData($p_id));
            }
        
        ?>
            <!-- Products Start -->
            <div class="row">

                <div class="col-12">
                    <!-- Section Title Start -->
                    <div class="section-title aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">
                        <h2 class="title pb-3"><?php echo $carousel_name;?></h2>
                        <span></span>
                        <div class="title-border-bottom"></div>
                    </div>
                    <!-- Section Title End -->
                </div>

                <div class="col">
                    <div class="product-carousel">

                        <div class="swiper-container">
                            <div class="swiper-wrapper">

                            <?php foreach ($product_array_carousel as $product_item) { 
                                        $first_image = $product_item['featured_image_medium'];
                                        $second_image = $product_item['featured_image_medium'];
                                        if (count($product_item['product_images']) > 1) {
                                            $first_image = $product_item['product_images'][0][2] ;
                                            $second_image = $product_item['product_images'][1][2] ;
                                        }
                                        ?>

                                <!-- Product Start -->
                                <div class="swiper-slide product-wrapper">

                                    <!-- Single Product Start -->
                                    <div class="product product-border-left" data-aos="fade-up" data-aos-delay="300">
                                        <div class="thumb">
                                            <a href="single-product.html" class="image">
                                                <img class="first-image" src="<?php echo $first_image;?>"
                                                    alt="Product" />
                                                <img class="second-image" src="<?php echo $second_image;?>"
                                                    alt="Product" />
                                            </a>
                                            <div class="actions">
                                                <a href="#" class="action wishlist"><i class="pe-7s-like"></i></a>
                                                <a href="#" class="action quickview" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModalCenter"><i
                                                        class="pe-7s-search"></i></a>
                                                <a href="#" class="action compare"><i class="pe-7s-shuffle"></i></a>
                                            </div>
                                        </div>
                                        <div class="content">
                                            <h4 class="sub-title"><a href="single-product.html">Studio Design</a></h4>
                                            <h5 class="title"><a href="single-product.html"><?php echo $product_item['title'];?></a>
                                            </h5>
                                            <span class="ratings">
                                                <span class="rating-wrap">
                                                    <span class="star" style="width: 100%"></span>
                                                </span>
                                                <span class="rating-num">(4)</span>
                                            </span>
                                            <span class="price">
                                                <?php echo $product_item['price'];?>
                                            </span>
                                            <button class="btn btn-sm btn-outline-dark btn-hover-primary">Add To
                                                Cart</button>
                                        </div>
                                    </div>
                                    <!-- Single Product End -->
                                    
                                </div>
                                <!-- Product End -->
                                <?php } ?>

                            </div>

                            <!-- Swiper Pagination Start -->
                            <div class="swiper-pagination d-md-none"></div>
                            <!-- Swiper Pagination End -->

                            <!-- Next Previous Button Start -->
                            <div class="swiper-product-button-next swiper-button-next swiper-button-white d-md-flex d-none">
                                <i class="pe-7s-angle-right"></i></div>
                            <div class="swiper-product-button-prev swiper-button-prev swiper-button-white d-md-flex d-none">
                                <i class="pe-7s-angle-left"></i></div>
                            <!-- Next Previous Button End -->

                        </div>

                    </div>
                </div>

            </div>
            <!-- Products End -->
        <?php
    }


function HomeProductCarouselItem($product_id_1, $product_id_2)
    {
        $product_1 = getProductData($product_id_1);
        $product_2 = getProductData($product_id_2);
        ?>
                                        <div class="swiper-slide product-wrapper">

                                            <!-- Single Product Start -->
                                            <div class="product product-border-left mb-10" data-aos="fade-up"
                                                data-aos-delay="300">
                                                <div class="thumb">
                                                    <a href="<?php echo $product_1['slug'];?>" class="image">
                                                        <img class="first-image"
                                                            src="<?php echo $product_1['featured_image_medium'];?>"
                                                            alt="Product" />
                                                        <img class="second-image"
                                                            src="<?php echo $product_1['featured_image_medium'];?>"
                                                            alt="Product" />
                                                    </a>
                                                    <div class="actions">
                                                        <a href="#" class="action wishlist"><i
                                                                class="pe-7s-like"></i></a>
                                                        <a href="#" class="action quickview" data-bs-toggle="modal"
                                                            data-bs-target="#exampleModalCenter"><i
                                                                class="pe-7s-search"></i></a>
                                                        <a href="#" class="action compare"><i
                                                                class="pe-7s-shuffle"></i></a>
                                                    </div>
                                                </div>
                                                <div class="content">
                                                    <h5 class="title"><a href="<?php echo $product_1['slug'];?>"><?php echo $product_1['title'];?></a></h5>
                                                    <span class="price">
                                                    <?php echo $product_1['price'];?>
                                                    </span>
                                                    <button onclick="window.location.href='<?php echo $product_1['slug'];?>'" class="btn btn-sm btn-outline-dark btn-hover-primary">Xem ngay</button>
                                                </div>
                                            </div>
                                            <!-- Single Product End -->

                                            <!-- Single Product Start -->
                                            <div class="product product-border-left mb-10" data-aos="fade-up"
                                                data-aos-delay="400">
                                                <div class="thumb">
                                                    <a href="<?php echo $product_2['slug'];?>" class="image">
                                                        <img class="first-image"
                                                            src="<?php echo $product_2['featured_image_medium'];?>"
                                                            alt="Product" />
                                                        <img class="second-image"
                                                            src="<?php echo $product_2['featured_image_medium'];?>"
                                                            alt="Product" />
                                                    </a>
                                                    <div class="actions">
                                                        <a href="#" class="action wishlist"><i
                                                                class="pe-7s-like"></i></a>
                                                        <a href="#" class="action quickview" data-bs-toggle="modal"
                                                            data-bs-target="#exampleModalCenter"><i
                                                                class="pe-7s-search"></i></a>
                                                        <a href="#" class="action compare"><i
                                                                class="pe-7s-shuffle"></i></a>
                                                    </div>
                                                </div>
                                                <div class="content">
                                                    <h5 class="title"><a href="<?php echo $product_2['slug'];?>"><?php echo $product_2['title'];?></a></h5>
                                                    <span class="price">
                                                    <?php echo $product_2['price'];?>
                                                    </span>
                                                    <button onclick="window.location.href='<?php echo $product_2['slug'];?>'" class="btn btn-sm btn-outline-dark btn-hover-primary">Xem ngay</button>
                                                </div>
                                            </div>
                                            <!-- Single Product End -->

                                        </div>
        <?php
    }

function HomeProductListItem($product_id)
    {
        $product = getProductData($product_id);
        ?>
            <!-- Single Product List Start -->
            <div class="single-product-list product-hover mb-6">

                <div class="thumb">
                    <a href="<?php echo $product['slug'];?>" class="image">
                        <img class="first-image"
                            src="<?php echo $product['featured_image_medium'];?>" alt="<?php echo $product['title'];?>" />
                        <img class="second-image"
                            src="<?php echo $product['featured_image_medium'];?>" alt="<?php echo $product['title'];?>" />
                    </a>
                </div>
                <div class="content">
                    <h5 class="title"><a href="<?php echo $product['slug'];?>"><?php echo $product['title'];?></a>
                    </h5>
                    <span class="price">
                    <?php echo $product['price'];?>
                    </span>
                </div>
            </div>
            <!-- Single Product List End -->

        <?php
    }

function RelatedProduct($product_id, $limit=4) {
    $product = getProductData($product_id);
    $product_categories = $product["category"];
    $last_product_category = getProductcatData($product_categories[count($product_categories)-1][0]);
    $data_post = $last_product_category["data_post"];
    if (count($data_post) < 4) {$limit = count($data_post);}
    ?>
<div class="section section-margin">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Sản phẩm liên quan: </h2>
                <!--shop toolbar start-->
                <div class="shop_toolbar_wrapper flex-column flex-md-row mb-10">

                    <!-- Shop Top Bar Left start -->
                    <div class="shop-top-bar-left mb-md-0 mb-2">
                        <div class="shop-top-show">
                            <span>Các sản phẩm <strong><a href="<?php echo $last_product_category["data_cat"]["cat_slug"] ;?>"><?php echo $last_product_category['data_cat']['title'];?></a></strong> tại Đá quý An An</span>
                        </div>
                    </div>
                    <!-- Shop Top Bar Left end -->

                    <!-- Shopt Top Bar Right Start -->
                    <div class="shop-top-bar-right">
                        <div class="shop_toolbar_btn">
                            <button data-role="grid_4" type="button" class="active btn-grid-4" title="Grid"><i
                                    class="fa fa-th"></i></button>
                            <button data-role="grid_list" type="button" class="btn-list" title="List"><i
                                    class="fa fa-th-list"></i></button>
                        </div>
                    </div>
                    <!-- Shopt Top Bar Right End -->

                </div>
                <!--shop toolbar end-->

                <!-- Shop Wrapper Start -->
                <div class="row shop_wrapper grid_4">
                    <?php for ($i=0;$i<$limit;$i++){ $post = $data_post[$i]; ?>
                    <!-- Single Product Start -->
                    <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 product">
                        <div class="product-inner">
                            <div class="thumb">
                                <a href="<?php echo $post['post_permalink'];?>" class="image">
                                    <img class="first-image" src="<?php echo $post['post_featured_image'][2]; ?>"
                                        alt="<?php echo $post['post_title'];?>" />
                                    <img class="second-image" src="<?php echo $post['post_featured_image'][2]; ?>"
                                    alt="<?php echo $post['post_title'];?>" />
                                </a>
                            </div>
                            <div class="content">
                                <h4 class="title"><a href="<?php echo $post['post_permalink'];?>"><?php echo $post['post_title'];?></a></h4>
                                <?php echo $post['post_excerpt'];?>
                                <span class="price">
                                <?php echo $post['price'];?>
                                </span>
                                <div class="shop-list-btn">
                                    <button onclick="window.location.href='<?php echo $post['post_permalink'];?>'" class="btn btn-sm btn-outline-dark btn-hover-primary"
                                        title="Xem ngay">Xem ngay</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Single Product End -->
                    <?php } ?>
                </div>
                <!-- Shop Wrapper End -->
            </div>
        </div>
    </div>
</div>
    <?php
}

function Search_by_title_match_word($search_str) {
    helper("sanitize");
    $search_data = getSearchData();
    $result_product = array();
    $result_post = array();
    foreach($search_data as $k=>$v) {
        $id = $v[0];
        $title = sanitize_title("T " . $v[1]);
        $permalink = $v[2];
        $post_type = $v[3];
        if (stripos($title, sanitize_title($search_str)) !== FALSE) {
            if ($post_type == "product") {
                $current_data = getProductData($id);
                array_push($result_product, $current_data);
            }
            if ($post_type == "post") {
                $current_data = getPostData($id);
                array_push($result_post, $current_data);
            }
        }
    }
    if (count($result_product) > 0) {
        ?>
                <div class="section section-margin">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <!--shop toolbar start-->
                                <div class="shop_toolbar_wrapper flex-column flex-md-row mb-10">

                                    <!-- Shop Top Bar Left start -->
                                    <div class="shop-top-bar-left mb-md-0 mb-2">
                                        <div class="shop-top-show">
                                            <span>Kết quả tìm kiếm sản phẩm tại Đá quý An An</span>
                                        </div>
                                    </div>
                                    <!-- Shop Top Bar Left end -->

                                    <!-- Shopt Top Bar Right Start -->
                                    <div class="shop-top-bar-right">
                                        <div class="shop_toolbar_btn">
                                            <button data-role="grid_4" type="button" class="active btn-grid-4" title="Grid"><i
                                                    class="fa fa-th"></i></button>
                                            <button data-role="grid_list" type="button" class="btn-list" title="List"><i
                                                    class="fa fa-th-list"></i></button>
                                        </div>
                                    </div>
                                    <!-- Shopt Top Bar Right End -->

                                </div>
                                <!--shop toolbar end-->

                                <!-- Shop Wrapper Start -->
                                <div class="row shop_wrapper grid_4">
                                    <?php
                                    foreach ($result_product as $product) {
                                        ?>
                                    <!-- Single Product Start -->
                                    <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 product">
                                        <div class="product-inner">
                                            <div class="thumb">
                                                <a href="<?php echo $product['slug'];?>" class="image">
                                                    <img class="first-image" src="<?php echo $product['featured_image_medium']; ?>"
                                                        alt="<?php echo $product['title'];?>" />
                                                    <img class="second-image" src="<?php echo $product['featured_image_medium']; ?>"
                                                    alt="<?php echo $product['title'];?>" />
                                                </a>
                                            </div>
                                            <div class="content">
                                                <h4 class="title"><a href="<?php echo $product['slug'];?>"><?php echo $product['title'];?></a></h4>
                                                <?php echo $product['excerpt'];?>
                                                <span class="price">
                                                <?php echo $product['price'];?>
                                                </span>
                                                <div class="shop-list-btn">
                                                    <button onclick="window.location.href='<?php echo $product['slug'];?>'" class="btn btn-sm btn-outline-dark btn-hover-primary"
                                                        title="Xem ngay">Xem ngay</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Product End -->
                                    <?php } ?>
                                </div>
                                <!-- Shop Wrapper End -->
                            </div>
                        </div>
                    </div>
                </div>
            <?php
    }
    if (count($result_post) > 0) {
        ?>
        <h2>Kết quả tìm kiếm bài viết: </h2>
        <div class="section section-margin">
            <div class="container">
                <div class="row mb-n8">
        <?php
        foreach ($result_post as $post) {
            ?>
                <div class="col-md-6 col-lg-4 mb-8">
                    <!-- Single Blog Start -->
                    <div class="blog-single-post-wrapper">
                        <div class="blog-thumb">
                            <a class="blog-overlay" href="<?php echo $post['slug'];?>">
                                <img src="<?php echo $post['featured_image']; ?>" alt="<?php echo $post['title'];?>">
                            </a>
                        </div>
                        <div class="blog-content">
                            <h3 class="title"><a href="<?php echo $post['slug'];?>"><?php echo $post['title'];?></a></h3>
                            <a href="<?php echo $post['slug'];?>" class="link">Xem thêm</a>
                        </div>
                    </div>
                    <!-- Single Blog End -->
                </div>
            <?php
        }
        ?>
                </div>
            </div>
        </div>
        <?php
    }
    if ((count($result_post) + count($result_product)) == 0) {
        echo "<strong>Không tìm thấy kết quả nào !</strong>";
    }
}

function Search_by_title($search_str) {
    helper("sanitize");
    $search_str_word = explode(" ", $search_str);
    $search_data = getSearchData();
    $result_product = array();
    $result_post = array();

    foreach($search_data as $k=>$v) {
        $id = $v[0];
        $title = sanitize_title("T " . $v[1]);
        $permalink = $v[2];
        $post_type = $v[3];
        $is_match = true;
        foreach ($search_str_word as $s_w) {
            if (stripos($title, sanitize_title($s_w)) === FALSE) $is_match = false;
        }
        if ($is_match) {
            if ($post_type == "product") {
                $current_data = getProductData($id);
                array_push($result_product, $current_data);
            }
            if ($post_type == "post") {
                $current_data = getPostData($id);
                array_push($result_post, $current_data);
            }
        }
    }
    if (count($result_product) > 0) {
        ?>
                <div class="section section-margin">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <!--shop toolbar start-->
                                <div class="shop_toolbar_wrapper flex-column flex-md-row mb-10">

                                    <!-- Shop Top Bar Left start -->
                                    <div class="shop-top-bar-left mb-md-0 mb-2">
                                        <div class="shop-top-show">
                                            <span>Kết quả tìm kiếm sản phẩm tại Đá quý An An</span>
                                        </div>
                                    </div>
                                    <!-- Shop Top Bar Left end -->

                                    <!-- Shopt Top Bar Right Start -->
                                    <div class="shop-top-bar-right">
                                        <div class="shop_toolbar_btn">
                                            <button data-role="grid_4" type="button" class="active btn-grid-4" title="Grid"><i
                                                    class="fa fa-th"></i></button>
                                            <button data-role="grid_list" type="button" class="btn-list" title="List"><i
                                                    class="fa fa-th-list"></i></button>
                                        </div>
                                    </div>
                                    <!-- Shopt Top Bar Right End -->

                                </div>
                                <!--shop toolbar end-->

                                <!-- Shop Wrapper Start -->
                                <div class="row shop_wrapper grid_4">
                                    <?php
                                    foreach ($result_product as $product) {
                                        ?>
                                    <!-- Single Product Start -->
                                    <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 product">
                                        <div class="product-inner">
                                            <div class="thumb">
                                                <a href="<?php echo $product['slug'];?>" class="image">
                                                    <img class="first-image" src="<?php echo $product['featured_image_medium']; ?>"
                                                        alt="<?php echo $product['title'];?>" />
                                                    <img class="second-image" src="<?php echo $product['featured_image_medium']; ?>"
                                                    alt="<?php echo $product['title'];?>" />
                                                </a>
                                            </div>
                                            <div class="content">
                                                <h4 class="title"><a href="<?php echo $product['slug'];?>"><?php echo $product['title'];?></a></h4>
                                                <?php echo $product['excerpt'];?>
                                                <span class="price">
                                                <?php echo $product['price'];?>
                                                </span>
                                                <div class="shop-list-btn">
                                                    <button onclick="window.location.href='<?php echo $product['slug'];?>'" class="btn btn-sm btn-outline-dark btn-hover-primary"
                                                        title="Xem ngay">Xem ngay</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Product End -->
                                    <?php } ?>
                                </div>
                                <!-- Shop Wrapper End -->
                            </div>
                        </div>
                    </div>
                </div>
            <?php
    }
    if (count($result_post) > 0) {
        ?>
        <h2>Kết quả tìm kiếm bài viết: </h2>
        <div class="section section-margin">
            <div class="container">
                <div class="row mb-n8">
        <?php
        foreach ($result_post as $post) {
            ?>
                <div class="col-md-6 col-lg-4 mb-8">
                    <!-- Single Blog Start -->
                    <div class="blog-single-post-wrapper">
                        <div class="blog-thumb">
                            <a class="blog-overlay" href="<?php echo $post['slug'];?>">
                                <img src="<?php echo $post['featured_image']; ?>" alt="<?php echo $post['title'];?>">
                            </a>
                        </div>
                        <div class="blog-content">
                            <h3 class="title"><a href="<?php echo $post['slug'];?>"><?php echo $post['title'];?></a></h3>
                            <a href="<?php echo $post['slug'];?>" class="link">Xem thêm</a>
                        </div>
                    </div>
                    <!-- Single Blog End -->
                </div>
            <?php
        }
        ?>
                </div>
            </div>
        </div>
        <?php
    }
    if ((count($result_post) + count($result_product)) == 0) {
        echo "<strong>Không tìm thấy kết quả nào !</strong>";
    }
}