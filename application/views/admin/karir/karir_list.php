<div class="row">
 
 <!-- <?php if($this->session->userdata('akses_level') != "Admin"){  ?>

  <?php }else { ?>
<div class="col-md-4" style="margin-bottom: 10px">
    <a href="<?php echo base_url('admin/cabang/create') ?>" class="btn btn-primary">
    <i class="fa fa-plus"> </i> Tambah </a> 
</div>
 <?php } ?> -->
<!-- <div class="col-md-2" style="margin-bottom: 10px;margin-left: -260px">
    <a href="<?php echo base_url('admin/barang_inventaris/laporan') ?>" target=_blank class="btn btn-danger">
    <i class="fa fa-print"> </i> Cetak Formulir DPB </a> 
</div> -->

<!-- Cetak Notifikasi -->
<div class="col-md-12">
<?php 
//Notifikasi
if($this->session->flashdata('sukses')) {
    echo '<div class="alert alert-success"><i class="fa fa-check"></i>';
    echo $this->session->flashdata('sukses');
    echo '</div>';

}

?>


</div>
  <!-- Buka java Tabel -->
            <div class="col-md-12">
                    <!-- begin panel -->
                    <div class="panel panel-inverse">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                            </div>
                            <h4 class="panel-title">&nbsp;</h4>
                        </div>
                        <div class="panel-body">

        <table id="data-table" class="table table-striped table-bordered">
        <thead>
            <tr>
                <!--<th>No</th>-->
        <th>NO </th> 
        <th>NIK</th> 
        <th>Nama </th> 
        <th>Tempat&TL </th> 
        <th>Kelamin</th> 
        <th>Alamat</th> 
        <th>No Hp</th> 
        <th>Email </th> 
        <th>Pendidikan</th> 
        <th>Pengalaman </th> 
        <th>Jabatan Lamar</th> 
        <th>Area Kerja</th> 
		<th>Action</th>
            </tr>

        </thead>
        <tbody>
        <?php
            foreach ($karir_data as $karir)
            {
                ?>
                <tr>
		   <td width="80px"><?php echo ++$start ?></td>  
            <td><?php echo $karir->nik ?></td> 
            <td><?php echo $karir->nama ?></td> 
            <td><strong><?php echo $karir->tempat_lahir ?> </strong>, <?php echo $karir->tgl_lahir ?></td> 
            <td><?php echo $karir->jenis_kelamin ?></td> 
            <td><?php echo $karir->alamat ?></td> 
            <td>
                <a target="_blank" href="https://api.whatsapp.com/send/?phone=62<?php echo $karir->no_hp ?>"><?php echo $karir->no_hp ?></a>
            </td> 
            <td><?php echo $karir->email ?></td> 
            <td><?php echo $karir->pendidikan ?></td> 
            <td><?php echo $karir->pengalaman ?></td> 
            <td><?php echo $karir->jabatan_lamar ?></td> 
			<td><?php echo $karir->area ?></td> 
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(base_url('admin/karir/read/'.$karir->id_karir),'<i class="btn btn-primary btn-s fa fa-eye" title="read"> </i> '); 
				echo ' ';  
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </tbody>
        </table>
        </div>
    </div>
    <!-- end panel -->
</div>
<!-- end col-12 -->
</div>
<!-- end row