<!DOCTYPE html>
<html lang="en">
<head>
  <?php $this->load->view('website/home/head.php');?>
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
                    <a class="navbar-brand" href="<?php echo base_url('/'); ?>"><img src="assets/website/img/logodana.png" alt="Logo">
                    </a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a class="page-scroll" href="<?php echo base_url('/'); ?>">Home</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="<?php echo base_url('/'); ?>#about">Ajukan Pinjaman</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="<?php echo base_url('/'); ?>#how-it-works">Alur Proses</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="#Screenshots">Team Kami</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="#Price">Visi Misi</a>
                        </li> 
                        <li>
                            <!-- <a class="page-scroll" href="login">Login</a> -->
                        </li>
                    </ul>
                </div>
                <!-- =============== navbar-collapse =============== -->

            </div>
        </div>
        <!-- =============== container-fluid =============== -->
    </nav>



   <section id="contact">
    <!-- =============== container =============== -->
        <div class="container">
                <div class="row">
                


            </div>

        </div><!-- =============== container end =============== -->
    </section>
  

    <!-- =============== header =============== -->
   
    <!-- =============== Screenshots =============== -->
    
    <!-- =============== Price =============== -->
  <section id="Price" class="">
    <!-- =============== container =============== -->
        <div class="container">
        <span class="angle2"></span>
        <span class="angle"></span>

         <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12 wow zoomIn animated headding" data-wow-delay=".1s">
               <h2><span>Hasil Simulasi Kredit Pegawai Aktif</span></h2>
               
           </div>

           <div class="col-xs-12 col-sm-12 col-md-12 wow zoomIn animated">
          <div class="price-wrapper ">
      <form method="post" action="<?php echo $action?>">
               
           <h3 class="price-title">Plafond Pinjaman = Rp. <?php echo  number_format($jumlah_p);?></h3>
               <div class="price">
                 <div class="content-box">  
               <div align="right">
                  <button type="submit" class="btn btn-primary">Ajukan Sekarang</button>         
                  
                </div>   
                   <div class="col-md-3">
 <img src="<?php echo base_url()?>assets/img/logo-bank-jambi.jpg" width="200px" height="100px">
         </div>

                  <!--  <h3>Jumlah Pinjaman = Rp. <?php 
  echo number_format($jumlah_p);?> </h3>
 -->
                   <h3>Tenor = <?php  echo number_format($tempo).' Bulan'; ?></h3>
                     
               <!--     <h3>Cicilan Bunga = Rp. <?php 
                echo  number_format($hasil).' /Bulan';?> </h3>
 -->
                   <h3>Angsuran Perbulan = Rp. <?php 
                echo  $hitung;?> Bulan</h3>

                </div>
                  
                    <div class="sign-box">
                     </div>

                </div>

            </div> 

          </div>


         

<div class="col-xs-12 col-sm-4 col-md-4 wow zoomIn animated">
          <div class="price-wrapper ">
                <h3 class="price-title">Definisi</h3>

                 <div class="price">
                   

                    <div class="content-box">           
                        <ul>
                        <li>Merupakan fasilitas Kredit Tanpa Agunan (KTA) yang diberikan kepada Pegawai Aktif yang mempunyai penghasilan tetap (fixed income) yang pembayaran gajinya (payroll) disalurkan melalui BNI, untuk keperluan konsumtif yang tidak bertentangan dengan peraturan maupun Undang-Undang yang berlaku.</li>
                        

                        </ul>
                    </div>
                     <div class="sign-box">
                     </div>
                </div>
            </div> 
          </div>
          <div class="col-xs-12 col-sm-4 col-md-4 wow fadeInLeft animated" >
          <div class="price-wrapper ">
                <h3 class="price-title">Info Biaya</h3>
               <div class="price">
                  
                    <div class="content-box">           
                        

                        <ul>
                           
                        <li>
              <label>Nama Lengkap = <?php echo $nama_lengkap?></label>
                        <input type="hidden" name="nama_lengkap" class="form-control" value="<?php echo $nama_lengkap?>" readonly>
<input type="hidden" name="id_cabang" class="form-control" value="<?php echo $id_cabang?>" readonly>

<input type="hidden" name="jangka_pinjam_max" class="form-control" value="<?php echo $jangka_pinjam_max?>" readonly>
           
<input type="hidden" name="alamat" class="form-control" value="<?php echo $alamat?>" readonly>
                        
                        <input type="hidden" name="email" class="form-control" value="<?php echo $email ?>">
                          
                        </li>
                         <li>  <label>Telepon = <?php echo $no_hp ?></label>
                        <input type="hidden" name="no_hp" class="form-control" readonly value="<?php echo $no_hp ?>">

                    </li>
                    
                     <li>
 <label>Usia = <?php echo $umur ?> Tahun</label>
                      <input type="hidden" name="" value="<?php echo $umur ?>" class="form-control" readonly>
                        </li>
                        <li>
                        <label>Gaji = <?php echo number_format($gaji_saat_ini) ?></label>
                      <input type="hidden" name="gaji_saat_ini" value="<?php echo $gaji_saat_ini ?>" class="form-control" readonly>
                        </li>
                        <li>  
                        <label>Jenis Kelamin = <?php echo $jk_aktif?></label>
                      <input type="hidden" name="jk_aktif" class="form-control" value="<?php echo $jk_aktif?>" readonly>
                          
                                                  </li>
                       
                        <li>
 <label>Tanggal Lahir = <?php echo $tgl_lahir?></label>
                        <input type="hidden" name="tgl_lahir" class="form-control" required value="<?php echo $tgl_lahir?>" readonly>
                    
                        </li>
                        <li>

 <label>Jenis Pengajuan = <?php echo $jenis_pinjaman ?></label>
                        <input type="hidden" readonly="" name="jenis_pinjaman" value="<?php echo $jenis_pinjaman ?>" class="form-control">
                        </li>
                       
                        </ul>
                    </div>
                    
                </div>
</form>
            </div>
          </div>
          <div class="col-xs-12 col-sm-4 col-md-4 wow zoomIn animated">
          <div class="price-wrapper ">
                <h3 class="price-title">Persyaratan</h3>
                <div class="price">
                 
                    <div class="content-box">           
                        <ul>
                        <li>Foto Copy KTP.</li>
                        <li>Slip Gaji.</li>
                        <li>Pas Foto Terbaru 3 x 4.</li>
                        <li>Foto Copy NPWP.</li>
                        </ul>
                    </div>
                    <div class="sign-box">
                     </div>
                </div>
            </div> 
          </div>

        </div>
        </div>    <!-- =============== container end =============== -->  
        </section>
 
    <!-- Footer -->
  
  <?php $this->load->view('website/home/footer.php');?>
   
</body>
</html>
