
<div class="row">
<!-- begin col-6 -->
<div class="col-md-12">
<!-- begin panel -->
<div class="panel panel-inverse" data-sortable-id="form-validation-1">
<div class="panel-heading">
    <div class="panel-heading-btn">
        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
    </div>
    <h4 class="panel-title"><?php echo $title ?></h4>
</div>
<br>
<div class="form-horizontal form-bordered" data-parsley-validate="true" name="demo-form">
    <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
	    <div class="form-group col-md-6">
            <label for="date">Tanggal Kirim Tugas <?php echo form_error('tanggal_kirim_tugas') ?></label>
            <input type="date" class="form-control" name="tanggal_kirim_tugas" id="tanggal_kirim_tugas" placeholder="Tanggal Kirim Tugas" value="<?php echo $tanggal_kirim_tugas; ?>" />
 
            <label for="int">Karyawan</label>
            <select name="id_karyawan" class="form-control">
                <option>--Pilih--</option>
                <?php foreach ($karyawan as $karyawan) { ?>

                    <option value="<?php echo $karyawan->id_karyawan ?>" <?php if($id_karyawan==$karyawan->id_karyawan){echo "selected"; } ?>>
                        <?php echo $karyawan->nama ?> <b>(<?php echo $karyawan->bagian_karyawan ?>)</b> 
                    </option>
                <?php } ?>
            </select>

            <label for="keterangan_tugas">Keterangan Tugas <?php echo form_error('keterangan_tugas') ?></label>
            <textarea class="form-control" rows="3" name="keterangan_tugas" id="keterangan_tugas" placeholder="Keterangan Tugas"><?php echo $keterangan_tugas; ?></textarea>

        </div>

	    <div class="form-group col-md-6">
            <label for="date">Deadline <?php echo form_error('deadline') ?></label>
            <input type="date" class="form-control" name="deadline" id="deadline" placeholder="Deadline" value="<?php echo $deadline; ?>" />
  
            <label for="varchar">File <?php echo form_error('file') ?></label>
            <input type="file" class="form-control" name="file"  />
                        <?php 
            if ($file !== '') {
                ?>
                <div>
                    *) File Sebelumnya <br>
                    <?php $file1=$this->db->get_where('tugas', array('id_tugas'=>$id_tugas))->row();
                        
                     ?>
                     <a href="<?php echo base_url('admin/tugas/file_tugas/'.$id_tugas) ?>"><label><small style="color: blue"><i class="fa fa-download"></i> <?php echo $file1->file ?></small></label></a>
                </div>
                <?php
            } else {
                echo "tidak ada";
            }
            ?>
        </div>
        <div class="form-group" style="margin-left: 40%">
        <label class="control-label"></label>
	    <input type="hidden" name="id_tugas" value="<?php echo $id_tugas; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo base_url('admin/tugas') ?>" class="btn btn-danger">Cancel</a>
        </div>
</form><br>
    </div>
    </div>
    <!-- end panel -->
    </div>
    <!-- end col-6 -->
    </div>
    <!-- end rowbarang_form_edit