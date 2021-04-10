<?php echo $this->extend("layout");?>

<?php echo $this->section("header-single");?>
<title>Trang tìm kiếm - Đá quý An An</title>
<meta name="description" content="Tìm kiếm sản phẩm, bài viết tại Đá quý An An"/>
<meta name="robots" content="noindex"/>
<link href="https://daquyanan.com/tim-kiem/" rel="canonical"/>
<?php echo $this->endSection();?>

<?php echo $this->section("content");?>
    <div class="section section-margin">
        <div class="container">
            <div class="row">
                <h1>Kết quả tìm kiếm sản phẩm và bài viết tại Đá quý An An cho: <?php echo $search_str; ?></h1>
                <?php Search_by_title($search_str);?>
            </div>
        </div>
    </div>
<?php echo $this->endSection();?>


<?php echo $this->section("footer-single");?>
    
<?php echo $this->endSection();?>