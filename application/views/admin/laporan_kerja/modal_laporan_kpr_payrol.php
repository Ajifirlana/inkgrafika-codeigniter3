	<button class="btn btn-success" data-toggle="modal" data-target="#modal3">
	<i class="fa fa-print"></i>REPORT KPR PAYROL
</button>

<div class="modal fade" id="modal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header alert alert-success">
	<button type="button" class="close" data-dismiss="modal" aria_hidden="true">&times;</button>
	<h4 class="modal-title" id="myModalLabel">LAPORAN KPR PAYROL</h4>
</div>

<div class="modal-body">

	<h4 align="center">Cetak Jenis Pinjaman</h4>			
	<form action="<?php echo base_url('/') ?>" method="post" target="_blank">

	<div class="col-md-12">	
<div class="col-md-6">		

	<div class="form-group">
		<label>Dari Tanggal</label>
					<input type="date" class="form-control" name="tgl_a" required>
	</div>
	<div class="form-group">
	<label>Status Laporan</label>						
                    <select name="status_laporan" class="form-control">
							<option value="">--Pilih Status--</option>
							<option value="diterima">diterima</option>
							<option value="ditolak">ditolak</option>
							<option value="belum di proses">belum di proses</option>
                    </select>
					</div>			
<div class="form-group">
<label>Pilih Jenis TOP UP Jika Pensiun</label>
 <select name="j_topup" class="default-select2 form-control">
                    <option value="0">--Pilih Jenis Top Up--</option>
                        <option value="New"><b>New</b></option>
                        <option value="Top Up"><b>Top Up</b></option>
                    </select>
</div>

</div>

	
<div class="col-md-6">

	<div class="form-group">
		<label>Sampai Tanggal</label>
					<input type="date" class="form-control" name="tgl_b" required>
	</div>
	
<div class="form-group">
<label>Pilih Jenis Pinjaman</label>
 <select name="j_pinjaman" class="default-select2 form-control">
                    <option value="0">--Pilih Jenis Pinjaman--</option>

                    <option value="PNS AKTIF"><b>PNS AKTIF & PRAPENSIUN</b></option>
                    <option value="PNS AKTIF"><b>PNS AKTIF(PRODUKTIF)</b></option>
                        <option value="PENSIUN"><b>PENSIUN</b></option>
                        <option value="KUR"><b>KUR</b></option>
                       <option value="KPR PAYROL"><b>KPR PAYROL</b></option>
                       
                    </select>
</div>
<div class="form-group">
<label>Pilih Jenis Kredit</label>
 <select name="j_kredit" class="default-select2 form-control">
                    <option value="0">--Pilih Jenis Kredit--</option>

                    <option value="Konsumtif"><b>KONSUMTIF</b></option>
                        <option value="Produktif"><b>PRODUKTIF</b></option>
                      
                    </select>
</div>


</div>
			
				

				<td>
					<div class="form-group">						
                    
					</div>			
				</td>

			<tr>

			
				<td>
						</td>
			</tr>
	</div>

</div>
<div class="modal-footer">
	<input type="submit" name="cetak" class="btn btn-danger" value="Export Excel">
			<!-- laporan_kerja_admin/laporancetak
	<a href="#" target="_blank" class="btn btn-primary">Cetak Semua Data</a> -->
	<button type="button" class="btn btn-success" data-dismiss="modal"> <i class="fa fa-times"></i> Close</button> 
	</form></div>
</div>
</div>
</div>
