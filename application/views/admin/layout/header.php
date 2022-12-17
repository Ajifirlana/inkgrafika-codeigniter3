<?php

date_default_timezone_set('Asia/Jakarta');
//dapatkan id_user yang di daftarkan saat login

?>
<!-- begin #page-loader -->
  <div id="page-loader" class="fade in"><span class="spinner"></span></div>
  <!-- end #page-loader -->
  
  <!-- begin #page-container -->
  <div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
    <!-- begin #header -->
    <div id="header" class="header navbar navbar-default navbar-fixed-top">
      <!-- begin container-fluid -->
      <div class="container-fluid">
        <!-- begin mobile sidebar expand / collapse button -->
      
        <!-- end mobile sidebar expand / collapse button -->
        
        <!-- begin header navigation right -->
        <ul class="nav navbar-nav navbar-right">
          <li>
            <form class="navbar-form full-width">
              
        <div style="color:white; padding: 7px 30px 0px 0px;float: right; font-size: 16px;color: black;"> 
        <i class="btn btn-warning fa fa-calendar"> TODAY</i> 

        <!-- <a href="- base_url('admin/dasbor/profile'); ?>" class="btn btn-danger square-btn-success"><i class="fa fa-user"></i> - $user_aktif ->nama ?> (- $user_aktif ->akses_level ?>)</a> -->

        <!-- <a href="- base_url('login/logout'); ?>" class="btn btn-danger square-btn-adjust"><i class="fa fa-sign-out"></i> Logout</a> -->  
         </div>

            </form>
          </li>
                  

          <li class="dropdown" >
            <a href="javascript:;" data-toggle="dropdown" class="dropdown-toggle icon">
              <i class="ion-ios-bell"></i>
              <span class="label">10</span>
            </a>
            
            <ul class="dropdown-menu media-list pull-right animated fadeInDown">
                            <li class="dropdown-header">Jumlah Laporan = 10</li>

                            <li class="media">
                                <a href="- base_url() ?>admin/laporan_kerja_admin/read/- $data->id_laporan_kerja ?>">
                                    <div class="media-left"><i class="ion-ios-plus-empty media-object bg-blue"></i></div>
                                    <div class="media-body">
                                        <h6 class="media-heading"> - NAMA</h6>
                                        <div class="text-muted f-s-11">- TANGGAL</div>
                                    </div>
                                </a>
                            </li>
                            
                            <li class="dropdown-footer text-center">
                                <a href="- base_url('admin/laporan_kerja_admin/') ?>">View more</a>
                            </li>
            </ul>
          </li>
          <li class="dropdown navbar-user">
            <a  class="dropdown-toggle" data-toggle="dropdown">
              
              <span class="hidden-xs"><?php echo $this->session->userdata('username') ?></span> <b class="caret"></b>
            </a>
            <ul class="dropdown-menu animated fadeInLeft">
              <li class="arrow"></li>
              <li><a href="- base_url('admin/user/edit/'.$user_aktif->id_user) ?>">Edit Profile</a></li>
              <li><a href="- base_url('login/logout') ?>">Log Out</a></li>
            </ul>
          </li>
        </ul>
        <!-- end header navigation right -->
      </div>
      <!-- end container-fluid -->
    </div>
    <br>
    <!-- end #header -->
