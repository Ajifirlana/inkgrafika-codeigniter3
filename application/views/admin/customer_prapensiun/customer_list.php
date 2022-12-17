<!-- Row -->
<div class="row">
 
 <?php if($this->session->userdata('akses_level') != "Admin"){  ?>

  <?php }else { ?>
<div class="col-md-4" style="margin-bottom: 10px">
    <a href="<?php echo base_url('admin/customer_prapensiun/create') ?>" class="btn btn-primary">
    <i class="fa fa-plus"> </i> Tambah </a> 
</div>
 <?php } ?>
 
<!-- Cetak Notifikasi -->
<div class="col-md-12">
<?php 
//Notifikasi
if($this->session->flashdata('message')) {
    echo '<div class="alert alert-success"><i class="fa fa-check"></i>';
    echo $this->session->flashdata('message');
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
                <th>No</th>
        <th>Nama Lengkap</th> 
		<th>Jenis Kelamin</th> 

        <th>No Handphone</th> 

        <th>Alamat</th> 

        <th>Tanggal Lahir</th> 
        <th>Jenis Pinjaman</th> 

        <th>Gaji Saat Ini</th> 

        <th>Jangka Pinjaman Max</th> 

        <th>Keterangan</th> 
		<th>Action</th>
            </tr>

        </thead>
        <tbody>
        <?php
            foreach ($customer_data as $customer)
            {
                ?>
                <tr>
			<td width="10px"><?php echo ++$start ?></td>
            <td><?php echo $customer->nama_lengkap ?></td> 
			<td><?php echo $customer->jk_aktif ?></td> 

            <td><?php echo $customer->no_hp ?></td> 

            <td><?php echo $customer->alamat ?></td> 

            <td><?php echo $customer->tgl_lahir ?></td> 
            <td><?php echo $customer->jenis_pinjaman ?></td> 

            <td><?php echo number_format($customer->gaji_saat_ini) ?></td> 
            <td><?php echo $customer->jangka_pinjam_max ?></td> 

            <td><?php echo $customer->keterangan ?></td> 
			<td style="text-align:center" width="80px">
				<?php 
				echo anchor(base_url('admin/customer_prapensiun/read/'.$customer->id_cus_prapen),'<i class="btn btn-primary btn-s fa fa-eye" title="read"> </i> '); 
				echo ' '; 
				echo anchor(base_url('admin/customer_prapensiun/update/'.$customer->id_cus_prapen),'<i class="btn btn-warning btn-s fa fa-edit" title="Edit"> </i>'); 
				echo '  '; 
				echo anchor(base_url('admin/customer_prapensiun/delete/'.$customer->id_cus_prapen),'<i class="btn btn-danger btn-s fa fa-trash" title="Delete"> </i>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
<!-- end row -->