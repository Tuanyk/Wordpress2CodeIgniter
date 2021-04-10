<?php echo $this->extend("layout");?>

<?php echo $this->section("header-single");?>
    <title><?php echo $title;?></title>
    <?php echo $meta;?>
    <?php echo $link_tag;?>
    <?php echo $schema;?>
    <link rel='stylesheet' id='devvn-quickbuy-style-css'  href='/wp-content/plugins/devvn-quick-buy/css/devvn-quick-buy.css?ver=2.1.7' type='text/css' media='all' />
    <script type="text/template" id="tmpl-variation-template">
        <div class="woocommerce-variation-description">{{{ data.variation.variation_description }}}</div>
        <div class="woocommerce-variation-price">{{{ data.variation.price_html }}}</div>
        <div class="woocommerce-variation-availability">{{{ data.variation.availability_html }}}</div>
    </script>
    <script type="text/template" id="tmpl-unavailable-variation-template">
        <p>Rất tiếc, sản phẩm này hiện không tồn tại. Hãy chọn một phương thức kết hợp khác.</p>
    </script>
    <style>
        .button {
            font: bold 11px Arial;
            text-decoration: none;
            color: #333333;
            padding: 2px 6px 2px 6px;
            border-top: 1px solid #CCCCCC;
            border-right: 1px solid #333333;
            border-bottom: 1px solid #333333;
            border-left: 1px solid #CCCCCC;
            margin-right: 10px;
        }
        .product-name-area {
            padding: 40px 0;
        }
    </style>
<?php echo $this->endSection();?>




<?php echo $this->section("content");?>

    <!-- Single Product Section Start -->
    <div class="section section-margin">
        <div class="container">

            <div class="row">
                <div class="breadcrumb"><?php echo $category_name ;?></div>
                <div class="col-lg-5 offset-lg-0 col-md-8 offset-md-2 col-custom">

                    <!-- Product Details Image Start -->
                    <div class="product-details-img">

                        <!-- Single Product Image Start -->
                        <div class="single-product-img swiper-container gallery-top">
                            <div class="swiper-wrapper popup-gallery">

                                <a class="swiper-slide w-100" href="<?php echo $featured_image;?>">
                                    <img class="w-100" src="<?php echo $featured_image;?>" alt="<?php echo $title;?>">
                                </a>
                                <?php foreach ($product_images as $product_image) { ?>
                                <a class="swiper-slide w-100" href="<?php echo $product_image[0];?>">
                                    <img class="w-100" src="<?php echo $product_image[0];?>" alt="<?php echo $title;?>">
                                </a>
                                <?php }?>
                            </div>
                        </div>
                        <!-- Single Product Image End -->

                        <!-- Single Product Thumb Start -->
                        <div class="single-product-thumb swiper-container gallery-thumbs">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img src="<?php echo $featured_image;?>" alt="<?php echo $title;?>">
                                </div>
                                <?php foreach ($product_images as $product_image) { ?>
                                <div class="swiper-slide">
                                    <img src="<?php echo $product_image[3];?>" alt="<?php echo $title;?>">
                                </div>
                                <?php }?>
                            </div>

                            <!-- Next Previous Button Start -->
                            <div class="swiper-button-horizental-next  swiper-button-next"><i
                                    class="pe-7s-angle-right"></i></div>
                            <div class="swiper-button-horizental-prev swiper-button-prev"><i
                                    class="pe-7s-angle-left"></i></div>
                            <!-- Next Previous Button End -->

                        </div>
                        <!-- Single Product Thumb End -->

                    </div>
                    <!-- Product Details Image End -->

                </div>
                <div class="col-lg-7 col-custom">

                    <!-- Product Summery Start -->
                    <div class="product-summery position-relative">

                        <!-- Product Head Start -->
                        <div class="product-head mb-3">
                            <h2 class="product-title"><?php echo $title;?></h2>
                        </div>
                        <!-- Product Head End -->

                        <!-- Price Box Start -->
                        <div class="price-box mb-2">
                            <?php echo $price;?>
                        </div>
                        <!-- Price Box End -->
                        
                        <!-- Hopmenh Start -->
                        <?php if($hopmenh_button != "") {?>
                        <div class="Hopmenh_box">
                            <span><strong>Hợp mệnh: </strong></span>
                            <?php echo $hopmenh_button;?>
                        </div>
                        <?php }?>
                        <!-- Hopmenh End -->

                        <!-- Product Variations Start -->
                        <?php if($variations_form != "") {?>
                        <div class="product_variations">
                            <?php echo $variations_form;?>
                        </div>
                        <?php }?>
                        <!-- Product Variations End -->

                        <!-- Description Start -->
                        <?php echo $description;?>
                        <!-- Description End -->
                        
                        <!-- Buynow Button Start -->
                        <?php echo $buynow_button; ?>
                        <!-- Buynow Button End -->


                    </div>
                    <!-- Product Summery End -->

                </div>
            </div>

            <div class="row section-margin">
                <!-- Single Product Tab Start -->
                <div class="col-lg-12 col-custom single-product-tab">
                    <div class="tab-content mb-text" id="myTabContent">
                        <div class="tab-pane fade show active" id="connect-1" role="tabpanel"
                            aria-labelledby="home-tab">
                            <div class="desc-content border p-3">
                                <?php echo $content;?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Single Product Tab End -->
            </div>



        </div>
    </div>
    <!-- Single Product Section End -->
    <?php RelatedProduct($product_ID);?>
<?php echo $this->endSection();?>



<?php echo $this->section("footer-single");?>
<script type='text/javascript' src='/wp-content/plugins/devvn-quick-buy/js/jquery.validate.min.js?ver=2.1.7' id='jquery.validate-js'></script>
<script type='text/javascript' src='/wp-includes/js/underscore.min.js?ver=1.8.3' id='underscore-js'></script>
<script type='text/javascript' id='wp-util-js-extra'>
        /* <![CDATA[ */
        var _wpUtilSettings = {
            "ajax": {
                "url": "https:\/\/wp.daquyanan.com\/wp-admin\/admin-ajax.php"
            }
        };
        /* ]]> */
    </script>
<script type='text/javascript' src='/wp-includes/js/wp-util.min.js?ver=5.6.1' id='wp-util-js'></script>


<script type='text/javascript' src='/wp-content/plugins/woocommerce/assets/js/jquery-blockui/jquery.blockUI.min.js?ver=2.70' id='jquery-blockui-js'></script>


<script type='text/javascript' id='wc-add-to-cart-variation-js-extra'>
        /* <![CDATA[ */
        var wc_add_to_cart_variation_params = {
            "wc_ajax_url": "https:\/\/wp.daquyanan.com\/?wc-ajax=%%endpoint%%",
            "i18n_no_matching_variations_text": "R\u1ea5t ti\u1ebfc, kh\u00f4ng c\u00f3 s\u1ea3n ph\u1ea9m n\u00e0o ph\u00f9 h\u1ee3p v\u1edbi l\u1ef1a ch\u1ecdn c\u1ee7a b\u1ea1n. H\u00e3y ch\u1ecdn m\u1ed9t ph\u01b0\u01a1ng th\u1ee9c k\u1ebft h\u1ee3p kh\u00e1c.",
            "i18n_make_a_selection_text": "Ch\u1ecdn c\u00e1c t\u00f9y ch\u1ecdn cho s\u1ea3n ph\u1ea9m tr\u01b0\u1edbc khi cho s\u1ea3n ph\u1ea9m v\u00e0o gi\u1ecf h\u00e0ng c\u1ee7a b\u1ea1n.",
            "i18n_unavailable_text": "R\u1ea5t ti\u1ebfc, s\u1ea3n ph\u1ea9m n\u00e0y hi\u1ec7n kh\u00f4ng t\u1ed3n t\u1ea1i. H\u00e3y ch\u1ecdn m\u1ed9t ph\u01b0\u01a1ng th\u1ee9c k\u1ebft h\u1ee3p kh\u00e1c."
        };
        /* ]]> */
    </script>
    <script type='text/javascript' src='/wp-content/plugins/woocommerce/assets/js/frontend/add-to-cart-variation.min.js?ver=5.0.0' id='wc-add-to-cart-variation-js'></script>


    <script type='text/javascript' id='devvn-quickbuy-script-js-extra'>
/* <![CDATA[ */
var devvn_quickbuy_array = {"ajaxurl":"https:\/\/wp.daquyanan.com\/wp-admin\/admin-ajax.php","siteurl":"https:\/\/wp.daquyanan.com","popup_error":"\u0110\u1eb7t h\u00e0ng th\u1ea5t b\u1ea1i. Vui l\u00f2ng \u0111\u1eb7t h\u00e0ng l\u1ea1i. Xin c\u1ea3m \u01a1n!","out_of_stock_mess":"H\u1ebft h\u00e0ng!","price_decimal":".","num_decimals":"0","price_thousand":",","currency_format":"\u20ab","qty_text":"S\u1ed1 l\u01b0\u1ee3ng","name_text":"H\u1ecd v\u00e0 t\u00ean l\u00e0 b\u1eaft bu\u1ed9c","phone_text":"S\u1ed1 \u0111i\u1ec7n tho\u1ea1i l\u00e0 b\u1eaft bu\u1ed9c","valid_phone_text":"Nh\u1eadp l\u1ea1i s\u1ed1 \u0111i\u1ec7n tho\u1ea1i l\u00e0 b\u1eaft bu\u1ed9c","valid_phone_text_equalto":"Vui l\u00f2ng nh\u1eadp l\u1ea1i c\u00f9ng s\u1ed1 \u0111i\u1ec7n tho\u1ea1i","email_text":"Email l\u00e0 b\u1eaft bu\u1ed9c","quan_text":"Qu\u1eadn huy\u1ec7n l\u00e0 b\u1eaft bu\u1ed9c","xa_text":"X\u00e3\/Ph\u01b0\u1eddng l\u00e0 b\u1eaft bu\u1ed9c","address_text":"S\u1ed1 nh\u00e0, t\u00ean \u0111\u01b0\u1eddng l\u00e0 b\u1eaft bu\u1ed9c"};
/* ]]> */</script>
    <script type='text/javascript' src='/wp-content/plugins/devvn-quick-buy/js/devvn-quick-buy.js?ver=2.1.7' id='devvn-quickbuy-script-js'></script>
    <style> #sticky_footer { position:fixed; bottom:0; height:50px; width:100%; background:#ffffff; text-align: center; padding: 10px 20px 0px 20px; display: none;} #sticky_footer a.devvn_buy_now_style {width:150px;}</style>
<div id="sticky_footer"><?php echo $buynow_button;?></div>
<script>
	window.onscroll = function() {sticky_footer_function_smooth()};

var footer = document.getElementById("sticky_footer");

// Get the offset position of the navbar
var sticky = 600;

function sticky_footer_function_smooth() {
  if (window.pageYOffset > sticky) {
    footer.style.display = "block";
    opacity = (window.pageYOffset - sticky) / 200;
    if (opacity > 1) {footer.style.opacity = "1";}
    else {footer.style.opacity = opacity;}
  } else {
    footer.style.display = "none";
  }
} 
</script>

<?php echo $this->endSection();?>