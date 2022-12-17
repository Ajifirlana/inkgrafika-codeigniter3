<?php 
  // header("Content-type: application/vnd-ms-excel");
  //       header("Content-Disposition: attachment; filename=Data PNS.xls");
?>
<div align="center">

<h3>DATA INJECT PNS HARI INI</h3>
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
		
    <th>NO REKENING</th>
       
        <th> NAMA DINAS </th>
		<th>NAMA</th>
        <th>NAMA CABANG</th>
		<th>CIF</th>
            <th>NO TELEPON</th>
            <th>ALAMAT</th>
            
        <th>TANGGAL</th>
            
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
		
      <td><?php echo $laporan_kerja->no_rekening ?></td>
      
      <td><?php echo $laporan_kerja->nama_dinas ?></td>
			<td><?php echo $laporan_kerja->nama ?></td>
			
            <td>       
               <?php echo $laporan_kerja->nama_cabang ?>
            </td>
             <td>       
               <?php echo $laporan_kerja->cif ?>
            </td>
             <td>       
               <?php echo $laporan_kerja->no_telpon ?>
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