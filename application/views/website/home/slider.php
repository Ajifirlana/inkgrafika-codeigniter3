
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