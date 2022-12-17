<!-- Row -->
<div class="row">
 
 <?php if($this->session->userdata('akses_level') != "Admin"){  ?>

  <?php }else { ?>
<div class="col-md-4" style="margin-bottom: 10px">

     <a href="<?php echo base_url('admin/inject_data_pns/import') ?>" class="btn btn-primary">
    <i class="fa fa-plus"> </i> Import Data </a> 
</div>
 <?php } ?>
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
<?php echo $this->session->flashdata('notif') ?>


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

 <form id="form1" method="POST" action="<?php echo base_url() ?>admin/inject_data_pns/update_multiple">
      
        <table id="data-table" class="table table-striped table-bordered">

        <thead>
            <tr>
                <th>No</th>
        <th></th>
        <th>No Rekening</th>  
		<th>Nama</th> 

        <th>Nama Dinas</th> 

        <th>Nama Cabang</th> 

        <th>CIF</th> 
        <th>No Telpon</th> 

        <th>Alamat</th> 
        <th>Tanggal Tayang</th> 
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
            <td><input type="checkbox" name="id[]" value="<?php echo $customer->id?>"></td>
            <td><?php echo $customer->no_rekening ?></td> 
			<td><?php echo $customer->nama ?></td> 

            <td><?php echo $customer->nama_dinas ?></td> 

            <td><?php echo $customer->nama_cabang ?></td> 

            <td><?php echo $customer->cif ?></td> 
            <td><?php echo $customer->no_telpon ?></td> 

            <td><?php echo $customer->alamat ?></td> 
		  <td><?php echo date("d-m-Y", strtotime($customer->tgl_lapor)); ?></td> 
          <td style="text-align:center" width="100%">
                <?php  
                echo anchor(base_url('admin/inject_data_pns/delete/'.$customer->id),'<i class="btn btn-danger btn-s fa fa-trash" title="Delete"> </i>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
                ?>
            </td>
        	
		</tr>
                <?php
            }
            ?>

        </tbody>
        </table>
         <div class="col-md-2">

            <div class="form-group">
               
         <label>Check All!!!</label>
  
         <input type="checkbox" onchange="checkAll(this)"> <br> <input type="date" class="form-control" name="tgl_lapor">
         </div>    
         <button type="submit" class="btn btn-success">Update</button>
         </div>
                 
            </form>

        <div class="col-md-7">
        <form method="POST" action="<?php echo base_url("admin/inject_data_pns/delete_all");?>">
            <div class="form-group">
               
         <label>Bersihkan Seua Data !!! </label>
         <button type="submit" class="btn btn-danger">Delete</button>
  
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
<?php 
             $this->load->view('admin/allcheck');?>