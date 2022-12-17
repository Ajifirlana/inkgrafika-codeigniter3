<!-- Row -->
<div class="row">
 
 <?php if($this->session->userdata('akses_level') != "Admin"){  ?>

  <?php }else { ?>
<div class="col-md-4" style="margin-bottom: 10px">

     <a href="<?php echo base_url('admin/inject_data_asabri/import') ?>" class="btn btn-primary">
    <i class="fa fa-plus"> </i> Import Data </a> 
</div>
 <?php } ?>

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
                <th>No</th>
        <th>Notas</th> 
		<th>Jenis</th> 
        <th>Nama Pensiunan</th> 
        <th>Tanggal Lahir</th> 
        <th>PENPOK</th> 
        <th>Tunjangan Istri</th> 
        <th>Tunjangan Anak</th> 
         </tr>

        </thead>
        <tbody>
        <?php
            foreach ($customer_data as $customer)
            {
                ?>
                <tr>
			<td width="10px"><?php echo ++$start ?></td>
            <td><?php echo $customer->NOTAS ?></td> 
			<td><?php echo $customer->JENIS ?></td> 

            <td><?php echo $customer->NAMAPENSIUNAN ?></td> 

            <td><?php echo $customer->TGL_LAHIR_PENSIUNAN ?></td> 

            <td><?php echo $customer->PENPOK ?></td> 
            <td><?php echo $customer->TISTRI ?></td> 

            <td><?php echo $customer->TANAK ?></td> 
			
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