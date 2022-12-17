<!DOCTYPE html>
<html lang="en">
<head>
  <?php $this->load->view('website/home/head.php');?>

<style>
table, th, td {
  border: 0px solid black;
  border-collapse: collapse;
}
th, td {
  padding-top: 10px;
  padding-bottom: 20px;
  padding-left: 30px;
  padding-right: 40px;
}
</style>
</head>

<body onload="onLoad()">
    <!-- =============== Preloader =============== -->
    <!-- =============== nav =============== --> 

   

     <div id="preloader">
        <div id="loading">
        </div>
    </div> 
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo base_url('/'); ?>"><img src="assets/website/img/danalogo.png" alt="Logo">
                    </a>
                </div>


                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a class="page-scroll" href="<?php echo base_url('/'); ?>">Home</a>
                        </li> 
                        <li>
                            <a class="page-scroll" href="<?php echo base_url('pensiunhebat'); ?>">#PensiunHebat</a>
                        </li>
                        <li>
                        <li>
                            <a class="page-scroll" href="<?php echo base_url('forum'); ?>">#Forum Tanya Jawab</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="<?php echo base_url('tentang'); ?>">Tentang Kami</a>
                        </li> 
                          
                        <li>
                            <a class="page-scroll" href="#contact">Contact</a>
                        </li>
                        <li>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </nav>


    <!-- =============== container =============== -->
      <section>
           
     <span></span>     
         
                   <div id="myCarousel" class="carousel slide" data-ride="carousel" >
    <!-- Indicators -->
    <ol class="carousel-indicators">

      <?php foreach($slider as $row){ ?>
      <li data-target="#myCarousel" data-slide-to="<?php echo $row->id_slider;?>" <?php if($row->id_slider == '1'){echo"class='active'";}else{ echo"";}?>></li>

      <?php } ?>
      <!-- <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li> -->
    </ol>

    <!-- Wrapper for slides -->
<style type="text/css">
   .crop {
        width: 100%;
        height: 150px;
        max-width: 200px;
    }

    .crop img {
        width: 400px;
        height: 300px;
        margin: -75px 0 0 -100px;
    }
}
</style>
    <div class="carousel-inner">
      <?php foreach($slider as $row){ ?>
      <div class="<?php if($row->id_slider == '2'){ echo 'item';}elseif($row->id_slider == '1'){ echo 'item active';}else{ echo 'item';}?>">
<?php if (file_exists('gambar/thumb/'.$row->image)) { ?>
        <img src ="<?php echo base_url('gambar/thumb/'.$row->image);?>" class="bg-image" width="100%">
      </div>
<?php }else {?>
  <img src="assets/website/img/bg_slilder-1.jpg"  class="bg-image" >

<?php }?>
<?php }?>
     <!-- <div class="item">
        <img src="assets/website/img/bg_slilder-1.jpg"  class="crop">
      </div>
    
      <div class="item">
        <img src="assets/website/img/bg_slilder-1.jpg" alt="New york" class="crop">
      </div>
    </div>  -->

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
                <div class="col-xs-12 col-sm-7 col-md-7 wow slideInLeft animated">
                    <!-- <img src="assets/website/img/phones.png" alt="phones" /> -->
                </div>
          </section>
    <!-- =============== container end =============== -->
 
 

        <section id="Price">
        <div class="container">
        <span class="angle2"></span>
        <span class="angle"></span>
        <h1>Artikel Terkini</h1><hr>
         <?php foreach($artikel as $row){?>
             <article>
               <figure>
                <table border="0">
                    <tr>
                        <td style="width: 40%;">
                            <a href=""><img src="<?php echo base_url('gambar/thumb/'.$row->artikel)?>" alt="Owl Image" style='width: 100%;'></a>
                        </td> 
                        <td>
                            <a href="<?php echo base_url('artikel/detail/'.str_replace(' ', '-', $row->judul))?>"><h2> <strong><?php echo strtoupper($row->judul) ?></strong></h2></a>
                            <span><?php echo date('d-m-Y') ?></span>
                        </td>
                    </tr>
                    <hr>
                </table>
               </figure>  
             </article> 
             <?php } ?>  
             </div> 
</section>
 
    

 
    <!-- Footer -->
  
  <?php $this->load->view('website/home/footer.php');?>
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
            $("#owl-detail").owlCarousel({
                autoPlay: 3000,
                items: 3,
                itemsDesktop: [1199, 3],
                itemsDesktopSmall: [979, 3]
            });

        });
    </script>
</body>
</html>