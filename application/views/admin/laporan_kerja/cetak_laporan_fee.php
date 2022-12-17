<?php 
header("Content-type: application/vnd-ms-excel");
 header("Content-Disposition: attachment; filename=Data Laporan Fee.xls");
?>
<div align="center">

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
		<th>PLAFOND</th>
        <th>JENIS PINJAMAN</th>
 <th>FEE</th>
<th>PAJAK</th>
            <th>NETT FEE</th>
            </tr>
        </thead>
        <tbody>

        <?php
          $totfee = 0;
            $totpajak = 0;
            $plafon = 0;    
            foreach ($laporan_kerja_data as $laporan_kerja)
            {
                $total_biaya = $laporan_kerja->plafon;
                ?>

                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<!-- <td><?php echo $laporan_kerja->id_user ?></td> -->
		
			<td><?php echo $laporan_kerja->nama_cus ?></td>
		   
            <td><?php echo $laporan_kerja->no_ld ?></td>
           
			<td>
                       <?php    

                       $plafon += str_replace(",", "", $laporan_kerja->plafon); 
                        echo number_format($laporan_kerja->plafon,0,'.','.') ?>
            </td>
           <td>
                       <?php echo $laporan_kerja->j_pinjaman ?>
            </td>
             <td>
                       <?php
 $totfee += str_replace(",", "",$laporan_kerja->fee);
                    
                       $fee = $laporan_kerja->fee;
                       echo str_replace(',','.',$fee);  ?>
            </td>
            
            <td>
                       <?php $laporan_kerja->pajak; 
                    $totpajak += str_replace(",", "",$laporan_kerja->pajak);
                       $pajak = $laporan_kerja->pajak; 
                       echo str_replace(',','.',$pajak);
                       ?>
            </td>
             <td>
                       <?php 
        $hitung_nettfee = str_replace(',','',$laporan_kerja->fee) - str_replace(',','',$laporan_kerja->pajak) ;
        
        $hasil = number_format($hitung_nettfee);
        echo str_replace(',','.',$hasil); 


      ?>


         
            </td>
		</tr>

                <?php
            }

            ?>
        </tbody>
        <th>JUMLAH </th>  
        <th></th>  
        
        <th></th>  
        <th><?php  echo number_format($plafon,0,'.','.'); ?></th>  
        <th></th>  
    
        <th><?php  echo number_format($totfee,0,'.','.'); ?></th>  
        <th><?php  echo number_format($totpajak,0,'.','.'); ?></th>
        <th><?php 
        $totnett = $totfee - $totpajak; echo number_format($totnett,0,'.','.'); ?></th>
        </table>
        </div>
    </div>
    <!-- end panel -->
</div>
<!-- end col-12 -->
</div>
<!-- end row