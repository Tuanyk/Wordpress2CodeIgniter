<?php echo $this->extend("layout");?>

<?php echo $this->section("header-single");?>
<title>Cửa hàng Đá quý An An</title>
<meta name="description" content="Sản phẩm phong thủy tại Đá quý An An: Vòng tay phong thủy, mặt đá phong thủy, vật phẩm phong thủy,..."/>
<meta name="robots" content="noindex" />
<?php echo $this->endSection();?>




<?php echo $this->section("content");?>

    <!-- Breadcrumb Section Start -->
    <div class="section">
        <!-- Breadcrumb Area Start -->
        <div class="breadcrumb-area bg-light">
            <div class="container-fluid">
                <div class="breadcrumb-content text-center">
                    <h1 class="title">Cửa hàng</h1>
                </div>
            </div>
        </div>
        <!-- Breadcrumb Area End -->

    </div>
    <!-- Breadcrumb Section End -->



    <div class="section section-margin">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div id="product_filter">
                    <button onclick='filterProduct("Tỳ hưu");'>Tỳ hưu</button>
                </div>
                <!-- Shop Wrapper Start -->
                <div class="row shop_wrapper grid_4">
                    
                    <?php
                    $all_cat = array();
                    foreach ($products as $product) {
                        $p_cat = '[';
                        foreach ($product["category"] as $k=>$cat) {
                            if (!in_array($cat, $all_cat)) array_push($all_cat, $cat);
                            $p_cat .= '"' . $cat['name'] . '"';
                            if ($k < count($product["category"]) -1) $p_cat .= ",";
                        }
                        $p_cat .= ']';

                        ?>
                        <!-- Single Product Start -->
                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 product" data-groups='<?= $p_cat;?>'>
                            <div class="product-inner">
                                <div class="thumb">
                                    <a href="<?php echo $product['link'];?>" class="image">
                                        <img class="first-image" src="<?php echo $product['featured_image']['medium']; ?>"
                                            alt="<?php echo $product['title'];?>" />
                                        <img class="second-image" src="<?php echo $product['featured_image']['medium']; ?>"
                                        alt="<?php echo $product['title'];?>" />
                                    </a>
                                </div>
                                <div class="content">
                                    <h4 class="title"><a href="<?php echo $product['link'];?>"><?php echo $product['title'];?></a></h4>
                                    <span class="price">
                                    <?php echo $product['price']['html'];?>
                                    </span>
                                    <div class="shop-list-btn">
                                        <button onclick="window.location.href='<?php echo $product['link'];?>'" class="btn btn-sm btn-outline-dark btn-hover-primary"
                                            title="Xem ngay">Xem ngay</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Single Product End -->
                    <?php } ?>

                    
                    <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 sizer-item"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php echo $this->endSection();?>



<?php echo $this->section("footer-single");?>
    <script src="/assets/js/shuffle.min.js"></script>
    <script>
    var Shuffle = window.Shuffle;
    var element = document.querySelector('.shop_wrapper');
    var sizer = element.querySelector('.sizer-item');

    var shuffleInstance = new Shuffle(element, {
    itemSelector: '.product',
    sizer: sizer // could also be a selector: '.my-sizer-element'
    });
    function filterProduct(s) {
        shuffleInstance.filter(s);
    }
    </script>
<?php echo $this->endSection();?>