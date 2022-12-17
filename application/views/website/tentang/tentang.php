<!DOCTYPE html>
<html lang="en">
<head>
  <?php $this->load->view('website/home/head.php');?>
  <style>
  .containercard {
    display: flex;
    justify-content: space-between;
    flex-direction: row;
    flex-wrap: wrap;
  padding: 2px 16px;
  }
   .card{
border:0px solid black;
  transition: 0.3s;
}

.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}
</style>
</head>

<body onload="onLoad()">
    <!-- =============== Preloader =============== -->
    <!-- =============== nav =============== --> 

   

     <div id="preloader">
        <div id="loading">
        </div>
    </div> <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
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

                <!-- Collect the nav links, forms, and other content for toggling -->

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a class="page-scroll" href="<?php echo base_url('/'); ?>">Home</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="#profile">Profile Perusahaan</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="#media">Media</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="#karir">Karir</a>
                        </li> 
                        <li>
                            <a class="page-scroll" href="<?php echo base_url('#contact') ?>">Hubungi Kami</a>
                        </li> 
                    </ul>
                </div>
                <!-- =============== navbar-collapse =============== -->

            </div>
        </div>
        <!-- =============== container-fluid =============== -->
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


   <section id="contact">
	<!-- =============== container =============== -->
		<div class="container">
			    <div class="row">
                


			</div>

		</div><!-- =============== container end =============== -->
	</section>
    <section id="profile" class="">
  <!-- =============== container =============== -->
    <div class="container">

        <span class="angle2"></span>
    <span class="angle"></span>

       <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12 wow zoomIn animated headding" data-wow-delay=".1s">
               <h1>Visi & Misi</h1>
               <div class="col-md-6">
                        
                            <h3>VISI</h3>
 " Menjadi konsultan bisnis pensiun & karyawan aktif, terkemuka dan terbaik di Indonesia, dengan memberikan kepuasan kepada mitra dan nasabah. "
                        
           </div>

           <div class="col-md-6" align="left">
             
              <h3>MISI</h3>
            Melakukan kegiatan konsultasi perbankan yang terbaik dengan mengutamakan pelayanan kepada mitra
Memberikan pelayanan kepada nasabah melalui jaringan kerja yang tersebar luas dan didukung oleh sumber daya manusia yang profesional,pantang menyerah dan berintegritas
Memberikan keuntungan dan manfaat yang optimal kepada stakeholder

           </div>

    
        </div>
        <!-- batas -->

    </div>

      <!-- batas --><hr>
     <div class="row">
       <div class="col-xs-12 col-sm-12 col-md-12 wow bounceIn animated headding" data-wow-delay=".1s">
                   <h2>Kantor Pusat</h2>
                    <!-- <?php foreach($cabang as $row) {?>
                    <?php print_r($cabang) ;?> 
                    <?php } ?> -->

               </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
         <div class="row">     
          <div class="col-xs-12 col-sm-12 col-md-12 wow zoomIn animated textright" data-wow-delay=".1s">           

                      <div id="owl-demo" class="owl-carousel">
                        <?php foreach($kantor_utama as $row){?>
                        <div class="item">
                          <table border="0">
                            <tr>
                                <td style="width:100%">
                                     <img src="<?php echo base_url('gambar/thumb/'.$row->foto) ?>" class="bg-image" class="bg-image" style="width:100%;height:400px;">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                     <h3 align="center"><?php echo strtoupper($row->nama) ?></h3>
                                </td>
                            </tr>
                          </table>

                            
                        </div>
                      <?php }?>
                      

                      </div>        
        </div>      
      </div>
    </div>      
  </div>

   <div class="row">
       <div class="col-xs-12 col-sm-12 col-md-12 wow bounceIn animated headding" data-wow-delay=".1s">
                   <h2>Tim Kantor Cabang</h2>
                   <div align="center" >
<form method="post" action="">

                          <select name="id_cabang" class="form-control">

                        <?php foreach($cabang as $row){?>
    <option value="<?php echo $row->id_cabang?>"><?php echo $row->nama_cabang?></option>
<?php }?>
  </select>
  <br>
  <button type="submit" name="tampil_karyawan" class="btn btn-primary">Lihat Berdasarkan Wilayah </button>
</form>
</div>

               </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
         <div class="row">     
          <div class="col-xs-12 col-sm-12 col-md-12 wow zoomIn animated textright" data-wow-delay=".1s">           

                      <div id="owl-cabang" class="owl-carousel">
                      <?php
                      if (isset($_POST['tampil_karyawan'])) {

  $id_cabang = $this->input->post('id_cabang');
   $get_karyawan = $this->Karyawan_model->get_data_karyawan($id_cabang);
}else{
 $id_cabang = '2';
 $get_karyawan = $this->Karyawan_model->get_data_karyawan($id_cabang);

}

 if ($get_karyawan== null) {?>
                        <h3>Pilih Cabang</h3>
                      <?php }else{?>
                        <?php foreach($get_karyawan as $row){?>
                        <div class="item">
                          <table border="0">
                            <tr>
                                <td style="width:100%">
                                     <img src="<?php echo base_url('gambar/thumb/'.$row->foto) ?>" class="bg-image" class="bg-image" style="width:100%;height:400px;">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                     <h3 align="center"><?php echo strtoupper($row->nama) ?></h3>
                                </td>
                            </tr>
                          </table>

                            
                        </div>
                      <?php }?>
                    <?php }?>
                      

                      </div>        
        </div>      
      </div>
    </div>      
  </div>

  <!-- =============== container end =============== -->
    </section> 

    <section id="media">
        <div class="container">
        <span class="angle2"></span>
        <span class="angle"></span>

            <table>
                <tr>
                    <td bgcolor="red">
                        <img style="width:100%" class="lazyload" src="assets/website/img/media.png">
                    </td>
                    <td> &nbsp;</td>
                    <td> &nbsp;</td>
                    <td bgcolor="darkblue"> &nbsp;</td>
                    <td> &nbsp;</td>
                    <td> &nbsp;</td>
                    <td>
                    <h1> Media</h1>
                    <p> Kami sangat terbuka untuk terus dapat membantu anda termasuk memberikan pengalaman yang baik melalui media yang anda miliki. Kami sangat tertarik jika anda ingin bekerjasama dengan kami hubungi whatsapp kami sekarang.</p>
                    </td>
                </tr>
            </table>
         </div>
    </section>


    <section id="karir">
        <div class="container">
        <span class="angle2"></span>
        <span class="angle"></span>

         <div class="row">


            <table>
                <tr>
                    <td>
                    <h1> <strong>Karir</strong></h1>
                    <p> Kami sangat terbuka untuk terus dapat membantu anda termasuk memberikan pengalaman yang baik melalui media yang anda miliki. Kami sangat tertarik jika anda ingin bekerjasama dengan kami hubungi whatsapp kami sekarang. Atau Anda bisa Daftar Sekarang..</p>
                    <a target="_blank" href="<?php echo base_url('karir') ?>"><button class="btn btn-primary">Daftar Sekarang</button></a>
                    </td> 
                    <td>
                        <img style="width:100%" class="lazyload" src="assets/website/img/kaarriirr.png">
                    </td>
                    <td bgcolor="darkblue"> &nbsp;</td> 

                </tr>
            </table>

         </div>
         </div>
    </section>

    <section id="profile">
    <!-- =============== container =============== -->
        <div class="container">
        <span class="angle2"></span>
        <span class="angle"></span>

         <div class="row">

            <h3 align="center"><b>Performa Perusahaan</b></h3><hr>
               <div class="col-md-12">  

                <div class="containercard">
                <div class="card">
                <i class="fa fa-money" style="font-size:800%;color:darkblue;"></i>
                <h4 style="width:30mm"><strong>Rp. 540 M</strong></h4>
                <p style="width:30mm">Total Pencairan Sejak Didirikan</p>
                </div>  
                <div class="card">
                <i class="fa fa-users" style="font-size:800%;color:darkblue;"></i>
                <h4 style="width:30mm"><strong>5838 Nasabah</strong></h4>
                <p style="width:30mm"> Total Debitur Sejak Didirikan</p>
                </div>  
                <div class="card">
                <i class="fa fa-user" style="font-size:800%;color:darkblue;"></i>
                <h4 style="width:30mm"><strong>360 Orang</strong></h4>
                <p style="width:30mm">Jumlah Tenaga Kerja</p>
                </div>  
                <div class="card">
                <i class="fa fa-map-marker" style="font-size:800%;color:darkblue;"></i>
                <h4 style="width:30mm"><strong>164 Kota/Kabupaten</strong></h4>
                <p style="width:30mm"> Wilayah operasi Kerja </p>
                </div>    
                </div>

            
            </div>

    
        </div>
        </div>    <!-- =============== container end =============== -->  
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
            $("#owl-demo").owlCarousel({
                autoPlay: 3000,
                items: 3,
                itemsDesktop: [1199, 3],
                itemsDesktopSmall: [979, 3]
            });

        });

        $(document).ready(function () {
            $("#owl-cabang").owlCarousel({
                autoPlay: 3000,
                items: 3,
                itemsDesktop: [1199, 3],
                itemsDesktopSmall: [979, 3]
            });

        });
    </script>
</body>
</html>