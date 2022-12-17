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


  <ul class="nav flex-column">
                            <li class="nav-item">
                              <img src="https://kreditpensiun.com/assets/images/icon/icon_aktif.ico" width="30px" height="30px">
                              <button type="button" onclick="openCity('asnaktif')" class="btn btn-outline-primary">Aktif</button>
                            </li>  
                            <li class="nav-item">

                              <img src="https://kreditpensiun.com/assets/images/icon/icon_prapensiun_combo.ico" width="30px" height="30px">
                              <button type="button" onclick="openCity('muda')" class="btn btn-outline-secondary">Prapensiun</button>
                            </li> 
                            <li class="nav-item">

                              <img src="https://kreditpensiun.com/assets/images/icon/icon_pensiun.ico" width="30px" height="30px">
                              <button type="button" onclick="openCity('tua')" class="btn btn-outline-primary">Pensiun</button> 
                            </li>
                            <li class="nav-item">

                              <img src="https://kreditpensiun.com/assets/images/icon/icon_pensiun_janda_duda.ico" width="30px" height="30px">
                              <button type="button" onclick="openCity('kur')" class="btn btn-outline-primary">Kredit Usaha Rakyat</button> 
                            </li>
                            <li class="nav-item">

                              <img src="https://kreditpensiun.com/assets/images/icon/icon_pensiun_platinum.ico" width="30px" height="30px">
                              <button type="button" onclick="openCity('payrol')" class="btn btn-outline-primary">KPR Payrol</button> 
                            </li>
                          </ul>
  
</div>
                           
                    </h2>      
                  </div>
                    <?php 
if($this->session->flashdata('message')) {
    echo '<div class="alert alert-success"><i class="fa fa-check"></i>';
    echo $this->session->flashdata('message');
    echo '</div>';

}?> 

                  <div id="load"  class="col-xs-12 col-sm-7 col-md-9 wow fadeInRight animated" data-wow-delay=".5s">

                    <!-- =====form ASN Aktif===== -->
                    <form action="<?php echo $simulasi; ?>" method="post">
                      <div class="col-xs-12 col-sm-12 col-md-12 wow bounceIn animated headding" data-wow-delay=".5s">
                         <h2>Ajukan Pinjaman <span>PNS dan Pensiunan Anda Sekarang</span></h2> 
                     </div>
                    <div id="asnaktif" class="city">
                    <h3>FORM PNS AKTIF :</h3>
                    <hr>
                      <div class="col-md-6">
                      <div class="form-group">

                        <label>Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" class="form-control" required>
                      </div>

                       <div class="form-group">

                        <label>Email</label>
                        <input type="email" name="email" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <label>Jenis Kelamin</label>
                       <select name="jk_aktif" class="form-control">
                        
                        
                         <option value="Laki-Laki">Laki-Laki</option>

                         <option value="Perempuan">Perempuan</option>
                                                </select>
                      </div>
                      <div class="form-group">
                        <label>Cabang</label>
                       <select name="id_cabang" class="form-control">

                          <?php

            foreach ($cabang_data as $cabang)
            {
                ?>
                         <option value="<?php echo $cabang->id_cabang ?>"><?php echo $cabang->nama_cabang ?></option>
                       <?php }?>
                       </select>
                      </div>
                       <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="date" name="tgl_lahir" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <label>Jenis Pengajuan</label>
                        <input type="text" readonly="" name="jenis_pinjaman" value="PNS AKTIF" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>No. Handphone (WA)</label>
                        <input type="text" name="no_hp" class="form-control" required>
                      </div>
                     
                      <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="alamat" class="form-control" cols="3" rows="3" required></textarea>

                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Gaji Saat Ini</label>
                        <input type="text" id="gaji" name="gaji_saat_ini" class="form-control" required="">
                      </div>
                       <div class="form-group">
                        <label>Jangka Waktu Pinjaman </label>
                        <input type="number" name="jangka_pinjam_max" class="form-control" placeholder="12 Bulan" required="">
                      </div>
                       <div class="form-group">
                        <label>Plafond Yang Diinginkan STATUS =</label>
                        <input type="text" id="plafond" name="plafond" class="form-control" placeholder="10000000" required="">
                      </div>
                      <div class="form-group">
                        <label>Tempat Pengambilan Gaji Anda</label>
                        <input type="text" name="" class="form-control">
                      </div> 
                      <div class="form-group">
                        <label>Keterangan</label>
                        <textarea name="keterangan" class="form-control" cols="3" rows="3" required></textarea>

                      </div>
                      <div align="left">
                         <!-- <button class="btn btn-primary" type="submit">Simulasi</button> -->
                        <button class="w3-button w3-block w3-blue" type="submit">Simulasikan Sekarang</button>
                      </div>
                      
                    </div>
                
               
                    </div>
                  </form>
                  <!-- ===form muda==== -->
                     
                    <div id="muda" class="city">

                    <h3>FORM PRA-PENSIUN :</h3>
                    <hr>
                      <form action="<?php echo $simulasi; ?>" method="post">
                    
                      <div class="col-md-6">
                      <div class="form-group">

                        <label>Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" class="form-control" required>
                      </div>

                       <div class="form-group">

                        <label>Email</label>
                        <input type="email" name="email" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <label>Jenis Kelamin</label>
                       <select name="jk_aktif" class="form-control">
                        
                        
                         <option value="Laki-Laki">Laki-Laki</option>

                         <option value="Perempuan">Perempuan</option>
                                                </select>
                      </div>
                      <div class="form-group">
                        <label>Cabang</label>
                       <select name="id_cabang" class="form-control">

                          <?php

            foreach ($cabang_data as $cabang)
            {
                ?>
                         <option value="<?php echo $cabang->id_cabang ?>"><?php echo $cabang->nama_cabang ?></option>
                       <?php }?>
                       </select>
                      </div>
                       <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="date" name="tgl_lahir" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <label>Jenis Pengajuan</label>
                        <input type="text" readonly="" name="jenis_pinjaman" value="PRAPENSIUN" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>No. Handphone (WA)</label>
                        <input type="text" name="no_hp" class="form-control" required>
                      </div>
                     
                      <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="alamat" class="form-control" cols="3" rows="3" required></textarea>

                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Gaji Saat Ini</label>
                        <input type="text" id="gaji" name="gaji_saat_ini" class="form-control" required="">
                      </div>
                       <div class="form-group">
                        <label>Jangka Waktu Pinjaman </label>
                        <input type="number" name="jangka_pinjam_max" class="form-control" placeholder="12 Bulan" required="">
                      </div>
                       <div class="form-group">
                        <label>Plafond Yang Diinginkan STATUS =</label>
                        <input type="text" id="plafond" name="plafond" class="form-control" required="">
                      </div>
                      <div class="form-group">
                        <label>Tempat Pengambilan Gaji Anda</label>
                        <input type="text" name="" class="form-control">
                      </div> 
                      <div class="form-group">
                        <label>Keterangan</label>
                        <textarea name="keterangan" class="form-control" cols="3" rows="3" required></textarea>

                      </div>
                      <div align="left">
                         <!-- <button class="btn btn-primary" type="submit">Simulasi</button> -->
                        <button class="w3-button w3-block w3-blue" type="submit">Simulasikan Sekarang</button>
                      </div>
                      
                    </div>
                
               
                  </form>
                  </div>

                  <!-- ===form tua==== -->

                    <div id="tua" class="city">

                    <h3>FORM PENSIUN :</h3>
                    <hr>
                  <form action="<?php echo $simulasi; ?>" method="post">
                    
                      <div class="col-md-6">
                      <div class="form-group">

                        <label>Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" class="form-control" required>
                      </div>

                       <div class="form-group">

                        <label>Email</label>
                        <input type="email" name="email" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <label>Jenis Kelamin</label>
                       <select name="jk_aktif" class="form-control">
                        
                        
                         <option value="Laki-Laki">Laki-Laki</option>

                         <option value="Perempuan">Perempuan</option>
                                                </select>
                      </div>
                      <div class="form-group">
                        <label>Cabang</label>
                       <select name="id_cabang" class="form-control">

                          <?php

            foreach ($cabang_data as $cabang)
            {
                ?>
                         <option value="<?php echo $cabang->id_cabang ?>"><?php echo $cabang->nama_cabang ?></option>
                       <?php }?>
                       </select>
                      </div>
                       <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="date" name="tgl_lahir" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <label>Jenis Pengajuan</label>
                        <input type="text" readonly="" name="jenis_pinjaman" value="PENSIUN" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>No. Handphone (WA)</label>
                        <input type="text" name="no_hp" class="form-control" required>
                      </div>
                     
                      <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="alamat" class="form-control" cols="3" rows="3" required></textarea>

                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Gaji Saat Ini</label>
                        <input type="text" id="gaji" name="gaji_saat_ini" class="form-control" required="">
                      </div>
                       <div class="form-group">
                        <label>Jangka Waktu Pinjaman </label>
                        <input type="number" name="jangka_pinjam_max" class="form-control" placeholder="12 Bulan" required="">
                      </div>
                       <div class="form-group">
                        <label>Plafond Yang Diinginkan STATUS =</label>
                        <input type="text" id="plafond" name="plafond" class="form-control" required="">
                      </div>
                      <div class="form-group">
                        <label>Tempat Pengambilan Gaji Anda</label>
                        <input type="text" name="" class="form-control">
                      </div> 
                      <div class="form-group">
                        <label>Keterangan</label>
                        <textarea name="keterangan" class="form-control" cols="3" rows="3" required></textarea>

                      </div>
                      <div align="left">
                         <!-- <button class="btn btn-primary" type="submit">Simulasi</button> -->
                        <button class="w3-button w3-block w3-blue" type="submit">Simulasikan Sekarang</button>
                      </div>
                      
                    </div>
                
               
                  </form>
                </div>

                <!-- KUR -->


                  <!-- ===form tua==== -->

                    <div id="kur" class="city">

                    <h3>FORM Kredit Usaha Rakyat :</h3>
                    <hr>
                  <form action="<?php echo $simulasi; ?>" method="post">
                    
                      <div class="col-md-6">
                      <div class="form-group">

                        <label>Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" class="form-control" required>
                      </div>

                       <div class="form-group">

                        <label>Email</label>
                        <input type="email" name="email" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <label>Jenis Kelamin</label>
                       <select name="jk_aktif" class="form-control">
                        
                        
                         <option value="Laki-Laki">Laki-Laki</option>

                         <option value="Perempuan">Perempuan</option>
                                                </select>
                      </div>
                      <div class="form-group">
                        <label>Cabang</label>
                       <select name="id_cabang" class="form-control">

                          <?php

            foreach ($cabang_data as $cabang)
            {
                ?>
                         <option value="<?php echo $cabang->id_cabang ?>"><?php echo $cabang->nama_cabang ?></option>
                       <?php }?>
                       </select>
                      </div>
                       <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="date" name="tgl_lahir" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <label>Jenis Pengajuan</label>
                        <input type="text" readonly="" name="jenis_pinjaman" value="Kredi Usaha Rakyat" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>No. Handphone (WA)</label>
                        <input type="text" name="no_hp" class="form-control" required>
                      </div>
                     
                      <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="alamat" class="form-control" cols="3" rows="3" required></textarea>

                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Gaji Saat Ini</label>
                        <input type="text" id="gaji" name="gaji_saat_ini" class="form-control" required="">
                      </div>
                       <div class="form-group">
                        <label>Jangka Waktu Pinjaman </label>
                        <input type="number" name="jangka_pinjam_max" class="form-control" placeholder="12 Bulan" required="">
                      </div>
                       <div class="form-group">
                        <label>Plafond Yang Diinginkan STATUS =</label>
                        <input type="text" id="plafond" name="plafond" class="form-control" required="">
                      </div>
                      <div class="form-group">
                        <label>Tempat Pengambilan Gaji Anda</label>
                        <input type="text" name="" class="form-control">
                      </div> 
                      <div class="form-group">
                        <label>Keterangan</label>
                        <textarea name="keterangan" class="form-control" cols="3" rows="3" required></textarea>

                      </div>
                      <div align="left">
                         <!-- <button class="btn btn-primary" type="submit">Simulasi</button> -->
                        <button class="w3-button w3-block w3-blue" type="submit">Simulasikan Sekarang</button>
                      </div>
                      
                    </div>
                
               
                  </form>
                </div>
                <!-- kur -->
                <!-- payrol --> 

                    <div id="payrol" class="city">

                    <h3>FORM KPR Payrol :</h3>
                    <hr>
                  <form action="<?php echo $simulasi; ?>" method="post">
                    
                      <div class="col-md-6">
                      <div class="form-group">

                        <label>Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" class="form-control" required>
                      </div>

                       <div class="form-group">

                        <label>Email</label>
                        <input type="email" name="email" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <label>Jenis Kelamin</label>
                       <select name="jk_aktif" class="form-control">
                        
                        
                         <option value="Laki-Laki">Laki-Laki</option>

                         <option value="Perempuan">Perempuan</option>
                                                </select>
                      </div>
                      <div class="form-group">
                        <label>Cabang</label>
                       <select name="id_cabang" class="form-control">

                          <?php

            foreach ($cabang_data as $cabang)
            {
                ?>
                         <option value="<?php echo $cabang->id_cabang ?>"><?php echo $cabang->nama_cabang ?></option>
                       <?php }?>
                       </select>
                      </div>
                       <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="date" name="tgl_lahir" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <label>Jenis Pengajuan</label>
                        <input type="text" readonly="" name="jenis_pinjaman" value="KPR Payrol" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>No. Handphone (WA)</label>
                        <input type="text" name="no_hp" class="form-control" required>
                      </div>
                     
                      <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="alamat" class="form-control" cols="3" rows="3" required></textarea>

                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Gaji Saat Ini</label>
                        <input type="text" id="gaji" name="gaji_saat_ini" class="form-control" required="">
                      </div>
                       <div class="form-group">
                        <label>Jangka Waktu Pinjaman </label>
                        <input type="number" name="jangka_pinjam_max" class="form-control" placeholder="12 Bulan" required="">
                      </div>
                       <div class="form-group">
                        <label>Plafond Yang Diinginkan STATUS =</label>
                        <input type="text" id="plafond" name="plafond" class="form-control" required="">
                      </div>
                      <div class="form-group">
                        <label>Tempat Pengambilan Gaji Anda</label>
                        <input type="text" name="" class="form-control">
                      </div> 
                      <div class="form-group">
                        <label>Keterangan</label>
                        <textarea name="keterangan" class="form-control" cols="3" rows="3" required></textarea>

                      </div>
                      <div align="left">
                         <!-- <button class="btn btn-primary" type="submit">Simulasi</button> -->
                        <button class="w3-button w3-block w3-blue" type="submit">Simulasikan Sekarang</button>
                      </div>
                      
                    </div>
                
               
                  </form>
                </div>

                <!-- payrol -->

                  </div>     
            </div>
        </div>   
		<!-- =============== container end =============== -->		
    </section>


<script type="text/javascript">
  
            var plafond = document.getElementById("plafond");
            var gaji = document.getElementById("gaji");
plafond.addEventListener("keyup", function(e) {
  plafond.value = formatRupiah(this.value);
}),gaji.addEventListener("keyup", function(e) {
  gaji.value = formatRupiah(this.value);
});
            function formatRupiah(angka, prefix) {
  var number_string = angka.replace(/[^,\d]/g, "").toString(),
    split = number_string.split(","),
    sisa = split[0].length % 3,
    rupiah = split[0].substr(0, sisa),
    ribuan = split[0].substr(sisa).match(/\d{3}/gi);

  // tambahkan titik jika yang di input sudah menjadi angka ribuan
  if (ribuan) {
    separator = sisa ? "." : "";
    rupiah += separator + ribuan.join(".");
  }

  rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
  return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
}
</script>