	<button class="btn btn-success" data-toggle="modal" data-target="#modal2">
	<i class="fa fa-print"></i> REPORT SYARIAH
</button>

<div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header alert alert-success">
	<button type="button" class="close" data-dismiss="modal" aria_hidden="true">&times;</button>
	<h4 class="modal-title" id="myModalLabel">REPORT SYARIAH</h4>
</div>

<div class="modal-body">
	<h4 align="center">Cetak berdasarkan :</h4>
	<form action="<?php echo base_url('admin/laporan_kerja_admin/cetaktanpatagihan') ?>" method="post" target="_blank">

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
		<div class="form-group">
			<label for="varchar">Kantor Bank</label>
            <select name="alamat_instansi_d" class="form-control" required>
            <?php 
           $getid = $this->Kantor_bank_model->join($laporan_kerja->alamat_instansi_d);
           ?>
                <option value="<?php echo $getid ?>" selected>--</option>
                <?php

           	$kantorbank = $this->Kantor_bank_model->getalltwotable();
            foreach($kantorbank as $row){?>
                                <option value="<?php echo $row->id?>"><?php echo $row->cabang_kantor;?></option>
                            <?php }?>
            </select>
				
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
