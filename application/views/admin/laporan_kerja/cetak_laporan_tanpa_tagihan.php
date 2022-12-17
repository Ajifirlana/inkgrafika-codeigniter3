<?php 
  header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=Data Laporan Syariah.xls");
?>
<div align="center">

<h3>LAPORAN PENYALURAN KREDIT </h3>
<h3>PT. DJM - BPD JAMBI SYARIAH </h3>
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
		<!-- <th>Id User</th> -->
       
       
        <th> NAMA NASABAH </th>
        <th>NO LD</th>
		

        <th>NO REKENING</th>
        <th>PLAFOND</th>
        <th>BAKI DEBIT LAMA</th>
        <th>TANGGAL REALISASI</th>
        <th>JENIS PINJAMAN</th>
 <th>JENIS KREDIT</th>
<th>NEW / TOP UP </th>
            <th>KET</th>
            <th>KANTOR BANK PT. DJM</th>
            
            </tr>
        </thead>
        <tbody>
        <?php
        $total_baki_debit = 0;
        $hitung_plafon = 0;
            foreach ($laporan_kerja_data as $laporan_kerja)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<!-- <td><?php echo $laporan_kerja->id_user ?></td> -->
		
			<td><?php echo $laporan_kerja->nama_cus ?></td>

            <td><?php echo $laporan_kerja->no_ld ?></td>
		    <td>       
               <?php echo $laporan_kerja->no_rekening ?>
            </td>
        	
			<td>
                       <?php echo number_format($laporan_kerja->plafon,0,'.','.');
                       $hitung_plafon += str_replace(',', '', $laporan_kerja->plafon);?>
            </td>
           <td>
                       <?php echo number_format($laporan_kerja->baki_debet_lama);
                       $total_baki_debit += str_replace(',', '',$laporan_kerja->baki_debet_lama);  ?>
            </td>
            <td>
                       <?php echo date('d-m-Y',strtotime($laporan_kerja->tanggal_realisasi)) ?>
            </td>
           <td>
                       <?php echo $laporan_kerja->j_kredit ?>
            </td>
             <td>
                       <?php echo $laporan_kerja->j_pinjaman ?>
            </td>
            
            <td>
                       <?php echo $laporan_kerja->j_topup ?>
            </td>
             <td>
                       <?php echo $laporan_kerja->ket ?>
            </td>
              <?php 
           $getid = $this->Kantor_bank_model->join($laporan_kerja->alamat_instansi_d);
?>
            <td>
                       <?php if($laporan_kerja->alamat_instansi_d == 'null'){ echo "id kantor cabang tidak ada"; }else { echo $getid->cabang_kantor;} ?>
            </td>
		</tr>
                <?php
            }
            ?>
        </tbody>
        <th>JUMLAH</th>
        <th></th>
        <th></th>
        <th></th>
        <th><?php echo number_format($hitung_plafon,0,'.','.');?></th>
        <th><?php echo number_format($total_baki_debit,0,'.','.');?></th>
        </table>
        </div>
    </div>
    <!-- end panel -->
</div>
<!-- end col-12 -->
</div>
<!-- end row