<?php echo $this->extend("layout");?>

<?php echo $this->section("header-single");?>
<title><?php echo $data_cat['title'];?></title>
<meta name="description" content="<?php echo $data_cat['yoast_description'];?>"/>

<?php echo $this->endSection();?>




<?php echo $this->section("content");?>

    <!-- Breadcrumb Section Start -->
    <div class="section">
        <!-- Breadcrumb Area Start -->
        <div class="breadcrumb-area bg-light">
            <div class="container-fluid">
                <div class="breadcrumb-content text-center">
                    <h1 class="title"><?php echo $data_cat['title'];?></h1>
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

                <!--shop toolbar start-->
                <div class="shop_toolbar_wrapper flex-column flex-md-row mb-10">

                    <!-- Shop Top Bar Left start -->
                    <div class="shop-top-bar-left mb-md-0 mb-2">
                        <div class="shop-top-show">
                            <span>Hiển thị <?php echo count($data_post);?> kết quả</span>
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
                    <?php foreach ($data_post as $post) { ?>
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

			    <!-- Category Description Section Start -->
			    <div class="description" style="padding-top:50px;">
			    	<?= $data_cat['excerpt']; ?>
			    </div>
			    <!-- Category Description Section End -->
            </div>
        </div>
    </div>
</div>

<?php echo $this->endSection();?>



<?php echo $this->section("footer-single");?>
    
<?php echo $this->endSection();?>