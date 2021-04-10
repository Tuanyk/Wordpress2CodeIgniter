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

    <!-- Blog Details Section Start -->
    <div class="section section-margin">
        <div class="container">
            <div class="row mb-n8">
                <?php foreach ($data_post as $post) { ?>
                <div class="col-md-6 col-lg-4 mb-8">
                    <!-- Single Blog Start -->
                    <div class="blog-single-post-wrapper">
                        <div class="blog-thumb">
                            <a class="blog-overlay" href="<?php echo $post['post_permalink'];?>">
                                <img src="<?php echo $post['post_featured_image'][2]; ?>" alt="<?php echo $post['post_title'];?>">
                            </a>
                        </div>
                        <div class="blog-content">
                            <h3 class="title"><a href="<?php echo $post['post_permalink'];?>"><?php echo $post['post_title'];?></a></h3>
                            <?php echo $post['post_excerpt'];?>
                            <a href="<?php echo $post['post_permalink'];?>" class="link">Xem thêm</a>
                        </div>
                    </div>
                    <!-- Single Blog End -->
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <!-- Blog Details Section End -->


<?php echo $this->endSection();?>



<?php echo $this->section("footer-single");?>
    
<?php echo $this->endSection();?>