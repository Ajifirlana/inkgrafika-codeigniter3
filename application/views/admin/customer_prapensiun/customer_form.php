
<div class="row">
<!-- begin col-6 -->
<div class="col-md-12">
<!-- begin panel -->
<div class="panel panel-inverse" data-sortable-id="form-validation-1">
<div class="panel-heading">
    <div class="panel-heading-btn">
        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
    </div>
    <h4 class="panel-title"><?php echo $title ?></h4>
</div>
<br>
<div class="form-horizontal form-bordered" data-parsley-validate="true" name="demo-form">
    <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group col-md-6">
             

            <label for="varchar">Nama Lengkap <?php echo form_error('nama_lengkap') ?></label>
            <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" placeholder="Nama Lengkap" value="<?php echo $nama_lengkap; ?>" />
 <label for="varchar">Alamat</label>
             <textarea name="alamat" cols="3" rows="3" class="form-control">
<?php echo $alamat; ?>
             </textarea>
             <label for="varchar">Jenis Kelamin</label>
            <select name="jk_aktif" class="form-control">
          
            <option value="Laki-Laki">Laki-Laki</option>
            <option value="Perempuan" <?php if($jk_aktif=="Perempuan") {echo "selected"; }?>>Perempuan</option>
        </select> 

            <label for="number">No HP Aktif <?php echo form_error('no_hp') ?></label>
            <input type="number" class="form-control" name="no_hp" id="no_hp" placeholder="NO HP" value="<?php echo $no_hp; ?>" />  
        </div> 
        <!-- sebelah -->
         <div class="form-group col-md-6">

            <label for="date">Tanggal Lahir <?php echo form_error('tgl_lahir') ?></label>
            <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" placeholder="Tanggal Lahir" value="<?php echo $tgl_lahir; ?>" />

            <label for="varchar">Gaji Saat Ini <?php echo form_error('gaji_saat_ini') ?></label>
            <input type="number" class="form-control" name="gaji_saat_ini" id="gaji_saat_ini" placeholder="Gaji Saat Ini" value="<?php echo $gaji_saat_ini; ?>" />  

            <label for="varchar">Jangka Pinjam Max <?php echo form_error('jangka_pinjam_max') ?></label>
            <input type="text" class="form-control" name="jangka_pinjam_max" id="jangka_pinjam_max" placeholder="Jangka Pinjam Max" value="<?php echo $jangka_pinjam_max; ?>" />  
            <label for="varchar">Jenis Pinjaman <?php echo form_error('jenis_pinjaman') ?></label>
            <input type="text" name="jenis_pinjaman" readonly="" value="PRAPEN" class="form-control">
            
<label for="varchar">Keterangan</label>
             <textarea name="keterangan" cols="3" rows="3" class="form-control">
<?php echo $keterangan; ?>
             </textarea>
        </div>

        <div class="form-group">
        <label class="control-label"></label>
	    <input type="hidden" name="id_cus_prapen" value="<?php echo $id_cus_prapen; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo base_url('admin/customer') ?>" class="btn btn-danger">Cancel</a>
        </div>
	</form><br>
    </div>
    </div>
    <!-- end panel -->
    </div>
    <!-- end col-6 -->
    </div>
    <!-- end row