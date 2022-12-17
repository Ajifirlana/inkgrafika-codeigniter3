
<div class="row">


<!-- <div class="col-md-3" style="margin-bottom: 10px">
  <?php include ('modal_laporan.php');  ?> 
    
</div> -->

<div class="col-md-2" style="margin-bottom: 5px; ">

   <?php include ('modal_laporan_karyawan.php');  ?> 
</div>
<div class="col-md-2" style="margin-bottom: 10px; margin-left: 5px;">

   <?php include ('modal_laporan_karyawan2.php');  ?> 
</div>

<div class="col-md-2"  style="margin-bottom: 10px;">

   <?php include ('modal_laporan_karyawan3.php');  ?> 
</div>

<div class="col-md-2"  style="margin-bottom: 10px; ">

   <?php include ('modal_laporan_kur.php');  ?> 
</div>

<div class="col-md-2"  style="margin-bottom: 10px;">

   <?php include ('modal_laporan_kpr_payrol.php');  ?> 
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
		<!-- <th>Id User</th> -->
		<th>Nama Karyawan</th>
		<th>Nama Nasabah</th>
		<th>Kantor Cabang</th>
        <th>Jenis Pinjaman</th>
        <th>Jenis Kredit</th>
		<th>File Laporan</th>
		<th>Status Laporan</th>
        <th>Tanggal Lapor</th>
        <th>Keterangan</th>
		<th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
            foreach ($laporan_kerja_data as $laporan_kerja)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<!-- <td><?php echo $laporan_kerja->id_user ?></td> -->
			<td><?php echo $laporan_kerja->nama ?> - <b><?php echo $laporan_kerja->bagian_karyawan ?></b></td>
			<td> <?php echo $laporan_kerja->nama_cus ?> </td>
			<td><?php echo $laporan_kerja->cabang_kantor ?></td>
            <td><?php echo $laporan_kerja->j_pinjaman ?></td>
            <td><?php echo $laporan_kerja->j_kredit ?></td>
			<?php if($laporan_kerja->file_laporan == 'no_file.jpg'){ ?>
                <td>       
             <small style="color: blue">Tidak Ada File</small>    
            </td><?php }else {?>
            <td>       
                <a href="<?php echo base_url('admin/laporan_kerja/file_laporan/'.$laporan_kerja->id_laporan_kerja) ?>"><label><small style="color: blue"><i class="fa fa-download"></i> <?php echo $laporan_kerja->file_laporan ?></small></label><br><br></a>    
            </td>
        <?php }?>
			<td>
                       <?php
                if($laporan_kerja->status_laporan == "belum di proses"){ ?>
                    <?php echo '<span class="label label-warning">'.$laporan_kerja->status_laporan.'</span>' ?>
                <?php }else if($laporan_kerja->status_laporan == "diterima"){ ?> 
                    <?php echo '<span class="label label-success fa fa-check">'.$laporan_kerja->status_laporan.'</span>'
                    ?>
               <?php  }else{echo '<span class="label label-danger">'.$laporan_kerja->status_laporan.'</span>';}  
               ?>         
            </td>
            <!-- <td><?php echo $laporan_kerja->tanggal_lapor ?></td> -->
            <td><?php echo date('d-m-Y', strtotime( $laporan_kerja->tanggal_lapor )); ?></td>
            <td> <?php echo $laporan_kerja->ket_ditolak?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(base_url('admin/laporan_kerja_admin/read/'.$laporan_kerja->id_laporan_kerja),'<i class="btn btn-primary btn-s fa fa-eye" title="read"> </i>'); 
				echo '  '; 
				echo anchor(base_url('admin/laporan_kerja_admin/update/'.$laporan_kerja->id_laporan_kerja),'<i class="btn btn-warning btn-s fa fa-cog" title="Proses"> Proses Laporan</i>'); 
				echo '  '; 
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