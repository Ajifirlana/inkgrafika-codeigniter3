<!-- Row -->
<div class="row">
 
 <?php if($this->session->userdata('akses_level') != "Admin"){  ?>

  <?php }else { ?>
<div class="col-md-4" style="margin-bottom: 10px">

     <a href="<?php echo base_url('admin/inject_data_prapen/import') ?>" class="btn btn-primary">
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
<form method="POST" action="<?php echo base_url() ?>admin/inject_data_prapen/update_multiple">
   
        <table id="data-table" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th></th>
        <th>Notas</th> 
		<th>Jenis</th> 

        <th>Nama Pensiunan</th> 

        <th>Tanggal Lahir</th> 

        <th>Pensiun Pokok</th> 
        <th>Tunjangan Istri</th> 

        <th>Tanggal Tayang</th> 
        <th>Tunjangan Anak</th> 

        <th>Tunjangan Pajak</th> 

        <th>Tunjangan Beras</th> 
        <th>Penyesuaian</th> 

        <th>Tunjangan Bulat</th> 
        <th>Kotor</th> 
        <th>Bersih</th>

        <th>Rapel</th>  

        <th>Kode Jiwa</th>  
        <th>Nama Penerima</th>
        <th>Tanggal Lahir Penerima</th>  
        <th>Alamat Peserta</th>  
<th>NMDATI4</th>        
<th>KOTA</th>
<th>KODE BAYAR</th>                
<th>NMK</th>                
<th>ANBYR</th>                
<th>NORUTDAPEM</th>                
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
             <td><?php echo $customer->NOTAS ?></td> 
			<td><?php echo $customer->JENIS ?></td> 

            <td><?php echo $customer->NAMAPENSIUNAN ?></td> 

            <td><?php echo $customer->TGL_LAHIR_PENSIUNAN ?></td> 

            <td><?php echo $customer->PENPOK ?></td> 
            <td><?php echo $customer->TISTRI ?></td> 			
            <td><?php echo date("d-m-Y", strtotime($customer->tgl_lapor));  ?></td> 
            <td><?php echo $customer->TANAK?></td>
             <td><?php echo $customer->TPAJAK?></td>
             <td><?php echo $customer->TBERAS?></td>

             <td><?php echo $customer->PENYESUAIAN?></td>
             <td><?php echo $customer->TBULAT?></td>
             <td><?php echo $customer->KOTOR?></td>

             <td><?php echo $customer->BERSIH?></td>
             <td><?php echo $customer->RAPEL?></td>
             <td><?php echo $customer->KDJIWA?></td>
             <td><?php echo $customer->NAMA_PENERIMA?></td>
             <td><?php echo $customer->TGL_LAHIR_PENERIMA?></td>
             <td><?php echo $customer->ALM_PESERTA?></td>
             <td><?php echo $customer->NMDATI4?></td>
             <td><?php echo $customer->KOTA?></td>
             <td><?php echo $customer->KODEBYR?></td>
             <td><?php echo $customer->NMK?></td>
             <td><?php echo $customer->ANBYR?></td>
             <td><?php echo $customer->NORUTDAPEM?></td>
             <td style="text-align:center" width="100%">
                <?php  
                echo anchor(base_url('admin/Inject_data_prapen/delete/'.$customer->id),'<i class="btn btn-danger btn-s fa fa-trash" title="Delete"> </i>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
        <form method="POST" action="<?php echo base_url("admin/inject_data_prapen/delete_all");?>">
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

<script type="text/javascript">
    $('#data-table').DataTable( {
        serverSide: true,
        ajax: function ( data, callback, settings ) {
           ........
        },
        scrollY: 500,
        scroller: {
            loadingIndicator: true
        }
    });
</script>

 <?php $this->load->view('admin/allcheck');?>