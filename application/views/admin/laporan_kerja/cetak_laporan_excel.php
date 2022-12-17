<?php 
  header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=Data Laporan.xls");
?>
<div align="center">

<h3>LAPORAN PENYALURAN KREDIT PT. DJM - BPD JAMBI</h3>
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
		<th>NIP</th>
		<th>NO REKENING</th>
        <th>NO LD</th>
		<th>PLAFOND</th>
        <th>BAKI DEBIT LAMA</th>
        <th>NETT DISBURSE</th>
        <th>TANGGAL REALISASI</th>
        <th>JENIS PINJAMAN PT.DJM</th>
        <th>JENIS KREDIT PT.DJM</th>
        <th>NEW / TOP UP</th>
        <th>KANTOR BANK PT. DJM</th>
          <th>NAMA AO</th>
           <th>NAMA SPV</th>
            <th>NAMA BANK PELUNASAN</th>
            <th>KET</th>
            
            <th>FEE</th>
<th>PAJAK</th>
            <th>FINALTY</th>
            <th>NETT</th>
            
            </tr>
        </thead>
        <tbody>
        <?php

$hitungplafon = 0;
$hitung_baki_debit = 0;
$hitung_netdis = 0;
$hitfee = 0;
$hitpajak = 0;
$hitfinalty = 0;
$hitnett = 0;
            foreach ($laporan_kerja_data as $laporan_kerja)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<!-- <td><?php echo $laporan_kerja->id_user ?></td> -->
		
			<td><?php echo $laporan_kerja->nama_cus ?></td>
			
			<td><?php echo $laporan_kerja->nip ?></td>
            <td>       
               <?php echo $laporan_kerja->no_rekening ?>
            </td>
             <td>       
               <?php echo $laporan_kerja->no_ld ?>
            </td>
			<td>
                       <?php echo number_format($laporan_kerja->plafon,0,'.','.');
                       $hitungplafon += str_replace(",", "",$laporan_kerja->plafon);?>
            </td>
           <td>
                       <?php echo number_format($laporan_kerja->baki_debet_lama);
                       $hitung_baki_debit += $laporan_kerja->baki_debet_lama; ?>
            </td>
		<td>
                       <?php echo number_format($laporan_kerja->nett_disburse,0,'.','.');
                       $hitung_netdis += $laporan_kerja->nett_disburse;?>
            </td>
            <td>
                       <?php echo date('d-m-Y',strtotime($laporan_kerja->tanggal_realisasi)) ?>
            </td>
            <td>
                       <?php echo $laporan_kerja->j_pinjaman ?>
            </td>
            <td>
                       <?php echo $laporan_kerja->j_kredit ?>
            </td>
            <td>
                       <?php echo $laporan_kerja->j_topup ?>
            </td>
           <?php 
           $getid = $this->Kantor_bank_model->join($laporan_kerja->alamat_instansi_d);
           $getspv = $this->Karyawan_model->get_spv($laporan_kerja->nama_spv);
?>
            <td>
                <?php 
                echo $getid->cabang_kantor ?>
                       
            </td>
            <td>
                       <?php echo $laporan_kerja->nama_ao ?>
            </td>
             <td>
                       <?php if ($getspv == null) {
                         echo $laporan_kerja->nama_spv;
                       }else{  echo $getspv->nama;

                       }?>
            </td>
             <td>
                       <?php echo $laporan_kerja->nama_bank_pelunasan ?>
            </td>
            <td>
                       <?php echo $laporan_kerja->ket ?>
            </td>
            <td>
                       <?php
                       $hitfee += str_replace(',', '',$laporan_kerja->fee);
                        echo str_replace(',', '.',$laporan_kerja->fee); ?>
            </td>
            <td>
                       <?php
                       $hitpajak +=  str_replace(',', '',$laporan_kerja->pajak);
                       echo str_replace(',', '.',$laporan_kerja->pajak); ?>
            </td>
            <td>
                       <?php $hitfinalty += str_replace(',', '', $laporan_kerja->finalty);
                        echo str_replace(',', '.', $laporan_kerja->finalty); ?>
            </td>
            <td>
                       <?php $hitnett += str_replace(',', '',$laporan_kerja->nett);
                        echo str_replace(',', '.',$laporan_kerja->nett); ?>
            </td>
		</tr>
                <?php
            }
            ?>
        </tbody>
        <th>TOTAL</th><th></th><th></th>
        <th></th><th></th><th><?php echo number_format($hitungplafon,0,'.','.'); ?></th>
        <th><?php echo number_format($hitung_baki_debit,0,'.','.');?></th>
        <th><?php echo number_format($hitung_netdis,0,'.','.');?></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th><?php echo number_format($hitfee,0,'.','.');?></th>
        <th><?php echo number_format($hitpajak,0,'.','.');?></th>

        <th><?php echo number_format($hitfinalty,0,'.','.');?></th>
       <th><?php echo number_format($hitnett,0,'.','.');?></th> 
   </table>
        </div>
    </div>
    <!-- end panel -->
</div>
<!-- end col-12 -->
</div>
<!-- end row