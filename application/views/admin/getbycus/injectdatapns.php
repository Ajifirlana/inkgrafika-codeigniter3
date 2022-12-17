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
        <th>Nomor Rekening</th> 
		<th>Nama</th> 
        <th>Nama Dinas</th> 
        <th>Nama Cabang</th> 
        <th>CIF</th> 
        <th>No Telepon</th> 
        <th>Alamat</th> 
         </tr>

        </thead>
        <tbody>
        <?php
            foreach ($customer_data as $customer)
            {
                ?>
                <tr>
			<td width="10px"><?php echo ++$start ?></td>
            <td><?php echo $customer->no_rekening ?></td> 
			<td><?php echo $customer->nama ?></td> 

            <td><?php echo $customer->nama_dinas ?></td> 

            <td><?php echo $customer->nama_cabang ?></td> 

            <td><?php echo $customer->cif ?></td> 
            <td><?php echo $customer->no_telpon ?></td> 

            <td><?php echo $customer->alamat ?></td> 
			
		</tr>
                <?php
            }
            ?>
        </tbody>
        </table>

        <div class="col-md-7">
        <form method="POST" action="<?php echo base_url("admin/get/download_all");?>">
            <div class="form-group">
      

         <label>Download Data</label>

         <button type="submit" class="btn btn-success">Download Data</button>
  
         </div>    
         </form>

         </div>
        
        </div>
    </div>
    <!-- end panel -->
</div>
<!-- end col-12 -->
</div>
<!-- end row -->