<!DOCTYPE html>
<html>
<head>

<?php echo $this->include("template-parts/header");?>
<?php echo $this->renderSection("header-single");?>

</head>
<body>
<?php echo $this->include("template-parts/page-header");?>

<?php echo $this->renderSection("content");?>

<?php echo $this->include("template-parts/footer");?>
<?php echo $this->renderSection("footer-single");?>
</body>
</html>