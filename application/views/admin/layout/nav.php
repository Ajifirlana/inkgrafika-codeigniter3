
  <!-- begin #sidebar -->
    <div id="sidebar" class="sidebar">
      <!-- begin sidebar scrollbar -->
      <div data-scrollbar="true" data-height="100%">
        <!-- begin sidebar user -->
        <ul class="nav">
          <li class="nav-profile" style="margin-top: 23px;">
            <div class="image">
              <a href="javascript:;"><img src="<?php echo base_url() ?>assets/color-admin-v3.0/assets/img/user-13.jpg" alt="" /></a>
            </div>
            <div class="info">
            <?php echo $this->session->userdata('username') ?>
              <small style="color: white;"><i class="fa fa-circle text-success"></i> online <i></i></small>
            </div>
          </li>
        </ul>
        <!-- end sidebar user -->
        <!-- begin sidebar nav -->
        <ul class="nav" style="padding-top: 20px">
          <li class="nav-header">Navigation</li>
          <li class="has-sub active">
            <a href="javascript:;">
                <b class="caret pull-right"></b>
                <i class="fa fa-dashboard"></i>
                <span>Dashboard</span>
              </a>
            <ul class="sub-menu">
                <li class="active"><a href="<?php echo base_url('admin/dasbor') ?>">Dashboard</a></li>
                <!-- <li><a href="index_v2.html">Dashboard v2</a></li> -->
            </ul>
          </li>


            <li><a href="<?php echo base_url('admin/profil_usaha') ?>">
                  <i class="fa fa-users bg-gradient-blue"></i>
                  <span>Profil</span>
              </a></li>
          <li class="has-sub">
              <a href="javascript:;">
                <b class="caret pull-right"></b>
                  <i class="fa fa-globe bg-gradient-red"></i>
                  <span>Data Master</span>
              </a>
            <ul class="sub-menu">
              
              <li><a href="<?php echo base_url('admin/slider') ?>">Data Banner</a></li> 
              <li><a href="<?php echo base_url('admin/testimoni') ?>">Data Testimoni</a></li> 
              <li><a href="<?php echo base_url('admin/galeri') ?>">Data Galeri</a></li> 
              <li><a href="<?php echo base_url('admin/artikel') ?>">Data Artikel</a></li> 
              <li><a href="<?php echo base_url('admin/buletin') ?>">Buletin DJM</a></li> 
              <li><a href="<?php echo base_url('admin/persen') ?>">Persen Simulasi</a></li> 
            </ul>
          </li>
          <li class="has-sub">
         
          <li><a href="<?php echo base_url('admin/logout') ?>">
                  <i class="fa fa-users bg-gradient-blue"></i>
                  <span>Logout</span>
              </a></li>

         

          <!-- AKSES PIMPINAN -->

      
  
          <li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="ion-ios-arrow-left"></i> <span>Collapse</span></a></li>
              <!-- end sidebar minify button -->
        </ul>
        <!-- end sidebar nav -->
      </div>
      <!-- end sidebar scrollbar -->
    </div>
    <div class="sidebar-bg"></div>
    <!-- end #sidebar -->

    <div id="content" class="content">
      <!-- begin breadcrumb -->
      <ol class="breadcrumb pull-right">
        <li><a href="javascript:;">Home</a></li>
        <li class="active">Judul</li>
      </ol>
      <!-- end breadcrumb -->
      <!-- begin page-header -->
      <h1 class="page-header">Judul<small></small></h1>
      <!-- end page-header -->