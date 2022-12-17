	<button class="btn btn-success" data-toggle="modal" data-target="#2">
	<i class="fa fa-print"></i> REPORT REKON
</button>

<div class="modal fade" id="2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header alert alert-success">
	<button type="button" class="close" data-dismiss="modal" aria_hidden="true">&times;</button>
	<h4 class="modal-title" id="myModalLabel">REPORT REKON</h4>
</div>

<div class="modal-body">
	<h4 align="center">Cetak berdasarkan :</h4>
	<form action="<?php echo base_url('admin/laporan_kerja_admin/export_excel') ?>" method="post" target="_blank">

	<div class="col-md-12">
		<div class="col-md-6">		
			<div class="form-group">
				<label>Dari Tanggal</label>
<input type="date" class="form-control" name="tgl_a" required>
					</div>
					<div class="form-group">
						<label>Status Laporan</label>
					<select name="status_laporan" class="form-control" required>
							<option value="">--Pilih Status--</option>
							<option value="diterima">diterima</option>
							<option value="ditolak">ditolak</option>
							<option value="belum di proses">belum di proses</option>
                    </select>
                </div>

			
</div>
<div class="col-md-6">	
<div class="form-group">
<label>Sampai Tanggal</label>
<input type="date" class="form-control" name="tgl_b" required>

			</div>

</div>

				

	</div>

</div>
<div class="modal-footer">
		<input type="submit" name="cetak" class="btn btn-danger" value="Export Excel">
	<button type="button" class="btn btn-success" data-dismiss="modal"> <i class="fa fa-times"></i> Close</button>
</div>
</form>
</div>
</div>
</div>
