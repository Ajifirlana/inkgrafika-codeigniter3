<?php 
//Notifikasi kalau ada input error
echo validation_errors('<div class="alert alert-danger"><i class="fa fa-warning"></i> ','</div>');

//Notofikasi
if($this->session->flashdata('sukses')) {
	echo '<div class="alert alert-success"><i class="fa fa-check"></i>';
	echo $this->session->flashdata('sukses');
	echo '</div>';
}

//Opern Form
echo form_open(base_url('admin/profil_usaha/update'));
?>

<div class="col-md-6">
	<div class="form-group">
		<label>Nama Usaha</label>

		<input type="hidden" name="id" class="form-control" placeholder="Nama Usaha" value="<?php echo $id?>" required>
		<input type="text" name="nama_usaha" class="form-control" placeholder="Nama Usaha" value="<?php echo $nama_usaha?>" required> 	
	</div>

	<div class="form-group">
		<label>Alamat</label>
		<textarea class="form-control" cols="3" rows="3" name="alamat"><?php echo $alamat?></textarea>
	</div>

	<div class="form-group">
		<input type="submit" name="submit" class="btn btn-success btn-lg" value="Simpan Data">
		<input type="reset" name="reset" class="btn btn-default btn-lg" value="Reset">
	</div>

</div>

<div class="col-md-6">
	
</div>

<?php 
//Form Close
echo form_close();
?>