<?php 
  // header("Content-type: application/vnd-ms-excel");
  //       header("Content-Disposition: attachment; filename=Data PNS.xls");
?>
<div align="center">

<h3>DATA INJECT ASABRI HARI INI</h3>
    </div>
  <!-- Buka java Tabel -->
            <div class="col-md-12">
                    <!-- begin panel -->

                    <div class="panel panel-inverse">
                      
                        <div class="panel-body">
        <table border="1">
        <thead>
            <tr>
                <th>No</th>
            
            </tr>
        </thead>
        <tbody>
        <?php
            foreach ($file_download as $laporan_kerja)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<!-- <td><?php echo $laporan_kerja->id_user ?></td> -->
		
      <td><?php echo $laporan_kerja->nopen ?></td>
      
      <td><?php echo $laporan_kerja->jenis ?></td>
			<td><?php echo $laporan_kerja->nip ?></td>
			
            <td>       
               <?php echo $laporan_kerja->nama_pst ?>
            </td>
             <td>       
               <?php echo $laporan_kerja->lhr_pst ?>
            </td>
             <td>       
               <?php echo $laporan_kerja->penerima ?>
            </td>
             <td>       
               <?php echo $laporan_kerja->lhr_pnrm ?>
            </td>
             <td>       
               <?php echo $laporan_kerja->pangkat ?>
            </td>
             <td>       
               <?php echo $laporan_kerja->tmt_pensiun ?>
            </td>
             <td>       
               <?php echo $laporan_kerja->kode_jiwa ?>
            </td>
             <td>       
               <?php echo $laporan_kerja->penpok ?>
            </td>
             <td>       
               <?php echo $laporan_kerja->tunj_istri ?>
            </td>
             <td>       
               <?php echo $laporan_kerja->tunj_anak ?>
            </td>
             <td>       
               <?php echo $laporan_kerja->tpm ?>
            </td>
             <td>       
               <?php echo $laporan_kerja->tkd ?>
            </td>
             <td>       
               <?php echo $laporan_kerja->tpp ?>
            </td>
             <td>       
               <?php echo $laporan_kerja->tunj_cacat ?>
            </td>
             <td>       
               <?php echo $laporan_kerja->tunj_khusus ?>
            </td>
             <td>       
               <?php echo $laporan_kerja->tunj_beras ?>
            </td>
             <td>       
               <?php echo $laporan_kerja->tunj_tewas ?>
            </td>
             <td>       
               <?php echo $laporan_kerja->pembulatan ?>
            </td>
             <td>       
               <?php echo $laporan_kerja->pot_pajak ?>
            </td>
             <td>       
               <?php echo $laporan_kerja->pot_askes ?>
            </td>
             <td>       
               <?php echo $laporan_kerja->pot_lain2 ?>
            </td>
             <td>       
               <?php echo $laporan_kerja->pot_kasda ?>
            </td>
             <td>       
               <?php echo $laporan_kerja->pot_assos ?>
            </td>
             <td>       
               <?php echo $laporan_kerja->sewa_rumah ?>
            </td>
             <td>       
               <?php echo $laporan_kerja->jml_bersih ?>
            </td>
             <td>       
               <?php echo $laporan_kerja->kantor_bayar ?>
            </td>
             <td>       
               <?php echo $laporan_kerja->skep ?>
            </td>
             <td>       
               <?php echo $laporan_kerja->tgl_sk ?>
            </td>
             <td>       
               <?php echo $laporan_kerja->ktp_pst ?>
            </td>
             <td>       
               <?php echo $laporan_kerja->agama_pst ?>
            </td>
             <td>       
               <?php echo $laporan_kerja->sex_pst ?>
            </td>
             <td>       
               <?php echo $laporan_kerja->tgl_nikah_pst ?>
            </td>
             <td>       
               <?php echo $laporan_kerja->tgl_lahir_anak1_pst ?>
            </td>
             <td>       
               <?php echo $laporan_kerja->tgl_lahir_anak2_pst ?>
            </td>
             <td>       
               <?php echo $laporan_kerja->tgl_lahir_anak3_pst ?>
            </td>
             <td>       
               <?php echo $laporan_kerja->sex_anak1_pst ?>
            </td>
             <td>       
               <?php echo $laporan_kerja->sex_anak2_pst ?>
            </td>
             <td>       
               <?php echo $laporan_kerja->sex_anak3_pst ?>
            </td>
             <td>       
               <?php echo $laporan_kerja->status_anak1_pst ?>
            </td>
             <td>       
               <?php echo $laporan_kerja->status_anak2_pst ?>
            </td>
             <td>       
               <?php echo $laporan_kerja->alamat ?>
            </td>
             <td>       
               <?php echo $laporan_kerja->alamat ?>
            </td>
             <td>       
               <?php echo $laporan_kerja->alamat ?>
            </td>
             <td>       
               <?php echo $laporan_kerja->alamat ?>
            </td>
             <td>       
               <?php echo $laporan_kerja->alamat ?>
            </td>
             <td>       
               <?php echo $laporan_kerja->alamat ?>
            </td>
             <td>       
               <?php echo $laporan_kerja->alamat ?>
            </td>
             <td>       
               <?php echo $laporan_kerja->alamat ?>
            </td>
             <td>       
               <?php echo $laporan_kerja->alamat ?>
            </td>
             <td>       
               <?php echo $laporan_kerja->alamat ?>
            </td>
             <td>       
               <?php echo $laporan_kerja->alamat ?>
            </td>
             <td>       
               <?php echo $laporan_kerja->alamat ?>
            </td>
             <td>       
               <?php echo $laporan_kerja->alamat ?>
            </td>
             <td>       
               <?php echo $laporan_kerja->alamat ?>
            </td>
             <td>       
               <?php echo $laporan_kerja->alamat ?>
            </td>
             <td>       
               <?php echo $laporan_kerja->alamat ?>
            </td>
            <td>       
               <?php echo $laporan_kerja->tgl_lapor ?>
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