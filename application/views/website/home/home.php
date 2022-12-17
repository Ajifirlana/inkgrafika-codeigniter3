<!DOCTYPE html>
<html lang="en">
<head>
  <?php include'head.php';?>
</head>

<body onload="onLoad()">
    <!-- =============== Preloader =============== -->
   
    <!-- =============== nav =============== -->
   <?php include'menu.php';?>

   <?php include'slider.php';?>
    <!-- =============== header =============== -->
   
    <?php include'formulir_pengajuan.php';?>
 

    <?php include'alur_pengajuan.php';?>

    <!-- testimoni -->
    <?php include 'testimoni.php'; ?>
    <?php include 'galeri.php'; ?>
    <?php include 'artikel.php'; ?>
    <?php include 'buletin.php'; ?>
    <!-- testimoni -->
    <!-- =============== Price =============== -->
   
    <!-- =============== Contact =============== -->
   
 <?php include 'footer.php';?>
    <!-- =============== jQuery =============== -->
    <script src="assets/website/js/jquery.js"></script>
    <!-- =============== Bootstrap Core JavaScript =============== -->
    <script src="assets/website/js/bootstrap.min.js"></script>
    <!-- =============== Plugin JavaScript =============== -->
    <script src="assets/website/js/jquery.easing.min.js"></script>
    <script src="assets/website/js/jquery.fittext.js"></script>
    <script src="assets/website/js/wow.min.js"></script>
    <!-- =============== Custom Theme JavaScript =============== -->
    <script src="assets/website/js/creative.js"></script>
    <!-- =============== owl carousel =============== -->
    <script src="assets/website/owl-carousel/owl.carousel.js"></script>
    <script>
        $(document).ready(function () {
            $("#owl-demo").owlCarousel({
                autoPlay: 3000,
                items: 3,
                itemsDesktop: [1199, 3],
                itemsDesktopSmall: [979, 3]
            });

        });
        $(document).ready(function () {
            $("#owl-galeri").owlCarousel({
                autoPlay: 3000,
                items: 2,
                itemsDesktop: [1199, 3],
                itemsDesktopSmall: [979, 3]
            });

        });
        $(document).ready(function () {
            $("#owl-buletin").owlCarousel({
                autoPlay: 3000,
                items: 2,
                itemsDesktop: [1199, 3],
                itemsDesktopSmall: [979, 3]
            });

        });
        $(document).ready(function () {
            $("#owl-artikel").owlCarousel({
                autoPlay: 3000,
                items: 3,
                itemsDesktop: [1199, 3],
                itemsDesktopSmall: [979, 3]
            });

        });
    </script>
</body>
</html>