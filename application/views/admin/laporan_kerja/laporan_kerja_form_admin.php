
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



<!--         <input type="hidden" class="form-control" name="id_user" value="<?php echo $user ?>"/>

         <input type="hidden" class="form-control" name="id_karyawan"  value="<?php echo $id_karyawan ?>" />
 -->
	    <div class="form-group col-md-6">
            <label for="date">Tanggal Lapor <?php echo form_error('tanggal_lapor') ?></label>
            <input type="date" class="form-control" name="tanggal_lapor" id="tanggal_lapor" placeholder="Tanggal Lapor" value="<?php echo $tanggal_lapor; ?>" readonly/>
        </div>
	    <div class="form-group col-md-6">
            <label for="varchar">File Laporan </label>
            <!-- <input type="file" class="form-control" name="file_laporan" readonly /> -->
                                    <?php 
            if ($file_laporan !== '') {
                ?>
                <div>
                    *) File Sebelumnya <br>
                    <?php $file1=$this->db->get_where('laporan_kerja', array('id_laporan_kerja'=>$id_laporan_kerja))->row();
                        
                     ?>
                     <a href="<?php echo base_url('admin/laporan_kerja/file_laporan/'.$id_laporan_kerja) ?>"><label><small style="color: blue"><i class="fa fa-download"></i> <?php echo $file1->file_laporan ?></small></label></a>
                </div>
                <?php
            } else {
                echo "tidak ada";
            }
            ?>
        </div>
	    
        
        <div class="form-group col-md-6">
        <label for="time">Proses Laporan</label>
        <select name="status_laporan" class="form-control">
            <option value="diterima">diterima</option>
            <option value="ditolak"  <?php if($status_laporan=="ditolak") {echo "selected"; }?>>ditolak</option>
        </select> 
        </div>
<div class="form-group col-md-6">
            <label for="varchar">Keterangan Jika Ditolak <?php echo form_error('ket_ditolak') ?></label>
            <!-- <input type="text" class="form-control" name="ket_ditolak" placeholder="Keterangan Ditolak" value="<?php echo $ket_ditolak; ?>" /> -->
            <textarea class="form-control" name="ket_ditolak" placeholder="Keterangan Jika Ditolak" value="<?php echo $ket_ditolak; ?>"></textarea>
        </div>
        <div class="form-group" style="margin-left: 40%">
        <label class="control-label"></label>
	    <input type="hidden" name="id_laporan_kerja" value="<?php echo $id_laporan_kerja; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo base_url('admin/laporan_kerja_admin') ?>" class="btn btn-danger">Cancel</a>
        </div>
</form><br>
    </div>
    </div>
    <!-- end panel -->
    </div>
    <!-- end col-6 -->
    </div>
    <!-- end rowbarang_form_edit