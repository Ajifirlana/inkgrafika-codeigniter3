<!-- Row -->
<div class="row">


<div class="col-md-4" style="margin-bottom: 10px">
              <?php if($this->session->userdata('akses_level') != "Admin"){  ?>

          <?php }else { ?>
    <a href="<?php echo base_url('admin/tugas/create') ?>" class="btn btn-primary">
    <i class="fa fa-plus"> </i> Tambah </a> 
      <?php } ?>
</div>

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
                            <h4 class="panel-title"><?php echo $title ?></h4>
                        </div>
                        <div class="panel-body">

        <table id="data-table" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>No</th>
		<th>Tanggal Kirim Tugas</th>
		<th>Karyawan - Bidang</th>

        <th>Cabang</th>
		<th>Keterangan Tugas</th>
		<th>Deadline</th>
		<th>File Tugas</th>
		<th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
            foreach ($tugas_data as $tugas)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $tugas->tanggal_kirim_tugas ?></td>
			<td><?php echo $tugas->nama ?> - <b><?php echo $tugas->bagian_karyawan ?></b></td>
			<td><?php echo $tugas->nama_cabang ?></td>
            <td><?php echo $tugas->keterangan_tugas ?></td>
			<td><?php echo $tugas->deadline ?></td>
			<td>
       <a href="<?php echo base_url('admin/tugas/file_tugas/'.$tugas->id_tugas) ?>"><label><small style="color: blue"><i class="fa fa-download"></i> <?php echo $tugas->file ?></small></label><br><br></a>         
            </td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(base_url('admin/tugas/read/'.$tugas->id_tugas),'<i class="btn btn-primary btn-s fa fa-eye" title="read"> </i>'); 
				echo '  '; 
                if($this->session->userdata('akses_level') != "Admin"){  

                  }else { 
				echo anchor(base_url('admin/tugas/update/'.$tugas->id_tugas),'<i class="btn btn-warning btn-s fa fa-edit" title="Edit"> </i>'); 
				echo '  '; 
				echo anchor(base_url('admin/tugas/delete/'.$tugas->id_tugas),'<i class="btn btn-danger btn-s fa fa-trash" title="Delete"> </i>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
                 } ?>
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
<!-- end row -->