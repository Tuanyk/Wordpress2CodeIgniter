<?php echo $this->extend("layout");?>

<?php echo $this->section("header-single");?>
	<title><?php echo $title;?></title>
    <?php echo $meta;?>
    <?php echo $link_tag;?>
    <?php echo $schema;?>
    <style type="text/css">
        ul.toc_list li a:hover {color: #3a3a3a;}
        ul.toc_list li a {color: #0274be; font-size: 18px;}
        ul.toc_list, ul.toc_list li ul {list-style-type: none;}

        p.toc_title {font-size: 24px !important; font-weight: 700; line-height: 28px;}

        #toc_container {
        max-width: 600px;
        margin: auto;
        margin-bottom: 10px;
        padding: 30px 36px 30px;
        border-top: 4px solid #ec0606;
        box-shadow: 0 4px 12px 0 rgb(99 115 129 / 65%);
        }
    </style>
<?php echo $this->endSection();?>




<?php echo $this->section("content");?>

    <!-- Breadcrumb Section Start -->
    <div class="section">
        <!-- Breadcrumb Area Start -->
        <div class="breadcrumb-area bg-light">
            <div class="container-fluid">
                <div class="breadcrumb-content text-center">
                    <h1 class="title"><?php echo $title;?></h1>
                    <ul>
                        <li>
                            <a href="/">Trang chủ </a>
                        </li>
                        <li class="active"> <a href="/<?php echo sanitize_title($category_name);?>/"><?php echo $category_name;?></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Breadcrumb Area End -->

    </div>
    <!-- Breadcrumb Section End -->

    <!-- Blog Details Section Start -->
    <div class="section section-margin">
        <div class="container">

            <div class="row">
                <!-- Blog Main Area Start -->
                <div class="col-lg-9 m-auto overflow-hidden">

                    <!-- Single Post Details Start -->
                    <div class="blog-details mb-10">

                        <!-- Blog Details Image Start -->
                        <div class="image mb-6">
                            <div style="position:relative;width:100%;padding-bottom:<?php echo floatval($featured_image_size[1]) / floatval($featured_image_size[0]) * 100;?>%;background:#7b7b7b;">
                            <img class="fit-image" style="position: absolute;" src="<?php echo $featured_image;?>" alt="Blog">
                            </div>
                        </div>
                        <!-- Blog Details Image End -->

                        <!-- Single Post Details Content Start -->
                        <div class="content">

                            <!-- Meta List Start -->
                            <div class="meta-list mb-3">
                                <span>By <a href="#" class="meta-item author mr-1">An An,</a></span>
                                <span class="meta-item date"><?php echo $publish_time; ?></span>
                            </div>
                            <!-- Meta List End -->

                            <!-- Description Start -->
                            <div class="desc">
                                <?php echo $content;?>
                            </div>
                            <!-- Description End -->

                        </div>
                        <!-- Single Post Details Content End -->

                        <!-- Single Post Details Footer Start -->
                        <div class="single-post-details-footer mt-10">
                            <!-- Shear Article Start -->
                            <div class="share-article">
                                <span class="left-side">
                                </span>
                                <h6 class="share-title text-uppercase">Chia sẻ bài viết</h6>
                                <span class="right-side">
                                </span>
                            </div>
                            <!-- Shear Article Start -->
                            <!-- Social Shear Start -->
                            <div class="widget-social border-top pt-2">
                            <a rel="nofollow" title="Facebook" href="https://www.facebook.com/sharer.php?u=<?php echo current_url();?>"><i class="fa fa-facebook-f"></i></a>
                                <a rel="nofollow" title="Twitter" href="https://twitter.com/share?url=<?php echo current_url();?>"><i class="fa fa-twitter"></i></a>
                                <a rel="nofollow" title="Linkedin" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo current_url();?>&title=<?php echo urlencode($title);?>"><i class="fa fa-linkedin"></i></a>
                            </div>
                            <!-- Social Shear Start -->
                        </div>
                        <!-- Single Post Details Footer End -->

                    </div>
                    <!-- Single Post Details End -->

                </div>
                <!-- Blog Main Area End -->
            </div>

        </div>
    </div>
    <!-- Blog Details Section End -->

<?php echo $this->endSection();?>



<?php echo $this->section("footer-single");?>
    
<?php echo $this->endSection();?>