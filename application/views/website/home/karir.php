<!DOCTYPE html>
<html lang="en">
<head>
  <?php $this->load->view('website/home/head.php');?>
</head>

<body onload="onLoad()">
  <?php include 'slider.php'; ?>
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
                            <a class="page-scroll" href="<?php echo base_url(''); ?>">Home</a>
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
                    </ul>
                </div>
                <!-- =============== navbar-collapse =============== -->

            </div>
        </div>
        <!-- =============== container-fluid =============== -->
    </nav>


    <!-- =============== About =============== -->
    <section id="about">


    <!-- =============== container =============== -->
        <div class="container">
            <span class="angle2"></span>
            <span class="angle"></span>
            <div class="row">
                <div class="col-xs-12 col-sm-5 col-md-3 wow fadeInLeft animated" data-wow-delay=".5s">
                    <h2>
                        <div class="d-flex align-items-start">

                           <script type="text/javascript">
                            function onLoad(){

$('#load').show();
$('#muda').hide();
$('#tua').hide();
$('#kur').hide();
$('#payrol').hide();
                            }
                            function openCity(cityName) {
                          var i;
                          var x = document.getElementsByClassName("city");

                          
                          for (i = 0; i < x.length; i++) {
                    
                              x[i].style.display = "none";
                            
                          }

                        document.getElementById('load').style.display = 'block';
                        document.getElementById(cityName).style.display = "block";


                        }
                          </script>
                         

</head>
<body>

  
</div>
                           
                    </h2>      
                  </div>
                    <?php 
if($this->session->flashdata('message')) {
    echo '<div class="alert alert-success"><i class="fa fa-check"></i>';
    echo $this->session->flashdata('message');
    echo '</div>';

}?> 

 
                     <form action="<?php echo $insert_karir; ?>" method="post" enctype="multipart/form-data">
                      <div class="col-xs-12 col-sm-12 col-md-12 wow bounceIn animated headding" data-wow-delay=".5s">
                         <h2>Form<span> Pengajuan Karir</span></h2> 
                     </div>
                    <div id="karir" class="city">
                    <hr>
                      <div class="col-md-6">
                      <div class="form-group">

                        <label>Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" required>
                      </div>

                       <div class="form-group">

                        <label>Email</label>
                        <input type="email" name="email" placeholder="google@gmail.com" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <label>Jenis Kelamin</label>
                       <select name="jenis_kelamin" class="form-control">
                        
                        
                         <option value="Laki-Laki">Laki-Laki</option>

                         <option value="Perempuan">Perempuan</option>
                                                </select>
                      </div>
                      <div class="form-group">
                        <label>Tempat Lahir </label>
                        <input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir" required>

                      </div>
                       <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="date" name="tgl_lahir" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" name="alamat"  placeholder="Alamat Lengkap" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>No. Handphone (WA)</label>
                        <input type="text" name="no_hp" class="form-control" placeholder="08xxxxxxx" required>
                      </div>
                     
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>NIK KTP </label>
                        <input type="number" name="nik" class="form-control" placeholder="12345" required="">
                      </div>
                       <div class="form-group">
                        <label>Pendidikan terakhir  </label>
                        <input type="text" name="pendidikan" class="form-control" placeholder="Sarjana" required="">
                      </div>
                       <div class="form-group">
                        <label>Pengalaman Bekerja </label>
                        <input type="text" name="pengalaman" class="form-control" placeholder="PT" required="">
                      </div>
                      <div class="form-group">
                        <label>Jabatan Yang Dilamar</label>
                        <input type="text" name="jabatan_lamar" placeholder="sales" placeholder="Jabatan" class="form-control">
                      </div> 
                      <div class="form-group">
                        <label>Area Kerja</label>
                        <textarea name="area" class="form-control" placeholder="Jakarta" cols="3" rows="3" required></textarea>

                      </div>
                         <div class="form-group">
                        <label>File PDF</label>
                        <input type="file" class="form-control" name="file">
                      </div>
                      <div align="left">
                        <button style="width:100%" class="btn btn-primary" type="submit">Ajukan Sekarang</button>
                      </div>
                      
                    </div>
                
               
                    </div>
                  </form>
                  
                      
                    </div>
                
               
                </div>

                <!-- payrol -->

                  </div>     
            </div>
        </div>   
    <!-- =============== container end =============== -->    
    </section> 
    <!-- Footer -->
  
  <?php $this->load->view('website/home/footer.php');?>
   
</body>
</html>
