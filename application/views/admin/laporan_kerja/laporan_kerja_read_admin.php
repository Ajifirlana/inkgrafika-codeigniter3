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
        <table class="table table-hover" border="1">
	    <tr><td  style="width:100mm">Tanggal Lapor</td><td><?php echo date('d-m-Y', strtotime( $tanggal_lapor )); ?></td></tr>
	   
	    <tr><td>Nama Nasabah</td><td> <?php echo $nama_cus; ?> </td></tr>
	    <tr>
            <td>No KTP</td><td><?php echo $no_ktp; ?></td>
        </tr>
         <tr>
            <td>NIP</td><td><?php echo $nip; ?></td>
        </tr>  
          <tr>
            <td>No Rekening</td><td><?php echo $no_rekening; ?></td>
        </tr>
          <tr>
            <td>No LD</td><td><?php echo $no_ld; ?></td>
        </tr>

        </tr>
       
        
        <tr>
            <td>Alamat</td><td><?php echo $alamat; ?></td>
        </tr>
         <tr>
            <td>No Hp Debitur</td><td><?php echo $no_hp_debitur; ?></td>
        </tr>
        <tr>
            <td>Nama Pasangan</td><td><?php echo $nama_pasangan; ?></td>
        </tr>
        <tr>
            <td>No Hp Pasangan</td><td><?php echo $no_hp_pasangan; ?></td>
        </tr>
        <tr>
            <td>Plafon</td><td>Rp. <?php if(strpos($plafon, '.')){ echo $plafon;}else{ echo number_format($plafon); } ?></td>
        </tr>
         <tr>
            <td>Baki Debet Lama</td><td>Rp. <?php echo number_format($baki_debet_lama); ?></td>
        </tr>
        <tr>
            <td>Nett Disburse</td><td>Rp. <?php if(strpos($nett_disburse, '.')){ echo $nett_disburse;}else{ echo number_format($nett_disburse); } ?></td>
        </tr>
         <tr>
            <td>Keterangan</td><td><?php echo $ket; ?></td>
        </tr>
         <tr>
            <td>Jenis Pinjaman</td><td><?php echo $j_pinjaman; ?></td>
        </tr>
        <tr>
            <td>Jenis Top Up</td><td><?php echo $j_topup; ?></td>
        </tr>
         <tr>
            <td>Kantor Bank</td><td><?php echo ($alamat_instansi_d); ?></td>
        </tr>
         <tr>
            <td>Jenis Kredit</td><td><?php echo $j_kredit; ?></td>
        </tr>
         <tr>
            <td>Nama AO</td><td><?php echo $nama_ao; ?></td>
        </tr>
         <tr>
            <td>Nama SPV</td><td><?php if($nama_spv == null){ echo "Nama SPV tidak ada";}else{ echo $nama_spv; }  ?></td>
        </tr>
        <tr>
            <td>Nama Bank Pelunasan</td><td><?php if($nama_bank_pelunasan == null){ echo "Nama Bank Pelunasan Belum Di Tentukan";}else{ echo $nama_bank_pelunasan;}  ?></td>
        </tr>
         <tr>
            <td>Tanggal Take Over</td><td><?php if($tanggal_take_over == null){ echo "-";}else{ echo $tanggal_take_over;} ?></td>
        </tr>
         <tr><td>Tanggal Realisasi</td><td><?php echo date('d-m-Y', strtotime( $tanggal_realisasi )); ?></td></tr>

         <tr><td>FEE</td><td><?php echo $fee; ?></td></tr>
         <tr><td>PAJAK</td><td><?php echo $pajak; ?></td></tr>

         <tr><td>FINALTY</td><td><?php echo $finalty; ?></td></tr>
         <tr><td>NETT</td><td><?php echo $nett; ?></td></tr>







         <?php if($file_laporan == 'no_file.jpg'){ ?>
        <tr>
            <td>File Laporan</td>
            <td>Tidak Ada File dilampirkan</td>
        <?php }else{?>
            <td>File Laporan Kerja</td>
            <td>
                <iframe src="<?php echo base_url('file/laporan/'.$file_laporan) ?>" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen style="width:100%; border:5px solid #eee; height:400px"></iframe>
        </td>
        </tr>
    </tr>
        <?php }?>
         <tr><td>Status Laporan</td><td><?php echo $status_laporan; ?></td>
         </tr>  
         <tr>     
            <td>
                <?php 
                echo anchor(base_url('admin/laporan_kerja_admin/update/'.$id_laporan_kerja),'<i class="btn btn-warning btn-s fa fa-cog" title="Proses"> Proses Laporan</i>'); 
                ?>
                <a href="<?php echo base_url('admin/laporan_kerja_admin') ?>" class="btn btn-danger">Cancel</a>
            </td>
        </tr>

	    <!-- <tr><td></td><td><a href="<?php echo base_url('admin/laporan_kerja_admin') ?>" class="btn btn-danger">Cancel</a></td>
        <td style="text-align:center" >
                <?php 
                echo anchor(base_url('admin/laporan_kerja_admin/update/'.$id_laporan_kerja),'<i class="btn btn-warning btn-s fa fa-cog" title="Proses"> Proses Laporan</i>'); 
                ?>
            </td></tr> -->
    </table>
            </div>
            </div>
            </div>
   </div>

</div>