<div class="row">
<!-- begin col-6 -->
    <div class="col-md-12">
<!-- begin panel -->
        <div class="panel panel-inverse" data-sortable-id="table-basic-4">
        <div class="panel-heading">
            <div class="panel-heading-btn">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
            </div>


            <h4 class="panel-title"><?php echo $title ?></h4>
        </div>
<div class="panel-body">
    <div class="table-responsive">
        <table border="1" class="table table-hover"> 

        <tr><td>Nama Lengkap</td><td><?php echo $nama_lengkap; ?></td></tr> 
        <tr><td>Alamat</td><td><?php echo $alamat; ?></td></tr> 
        <tr><td>Jenis Kelamin</td><td><?php echo $jk_aktif; ?></td></tr> 
        <tr><td>No HP</td><td><?php echo $no_hp; ?></td></tr> 
        <tr><td>Tanggal Lahir</td><td><?php echo $tgl_lahir; ?></td></tr> 
        <tr><td>Gaji Saat Ini</td><td><?php echo number_format ($gaji_saat_ini) ; ?></td></tr> 
        <tr><td>Nama Jangka Pinjam Max</td><td><?php echo $jangka_pinjam_max; ?></td></tr>  
 <tr><td>Jenis Pinjaman</td><td><?php echo $jenis_pinjaman; ?></td></tr>  

        <tr><td>Keterangan</td><td><?php echo $keterangan; ?></td></tr>  
	    <tr><td></td><td><a href="<?php echo base_url('admin/get') ?>" class="btn btn-danger">Back</a></td></tr>
    </table>
            </div>
            </div>
            </div>
   </div>

</div>
