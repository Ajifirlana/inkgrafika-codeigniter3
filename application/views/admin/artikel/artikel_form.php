
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

        <div class="form-group col-md-12">
        <label for="varchar">Judul <?php echo form_error('judul') ?></label>
            <input type="text" class="form-control" name="judul" id="judul" placeholder="judul" value="<?php echo $judul; ?>" /> 
        </div>

        <div class="form-group col-md-12">
        <label for="varchar">Deskripsi <?php echo form_error('deskripsi') ?></label>
           <textarea class="form-control" rows="3" name="deskripsi" id="deskripsi" placeholder="Deskripsi"><?php echo $deskripsi; ?></textarea>
        </div>

	    <div class="form-group col-md-12">
            <label for="varchar">Gambar</label>
             <input type="file" class="form-control" name="artikel"/>
            <?php 
            if ($artikel !== '') {
                ?>
                <div>
                    *) Gambar Sebelumnya <br>
                    <img src="<?php echo base_url('gambar/thumb/'.$artikel) ?>" style="width: 100px;height: 100px;">
                </div>
                <?php
            } else {
                echo "tidak ada";
            }
            ?>
        </div> 

        <div class="form-group">
        <label class="control-label"></label>
	    <input type="hidden" name="id_artikel" value="<?php echo $id_artikel; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo base_url('admin/artikel') ?>" class="btn btn-danger">Cancel</a>
        </div>
	</form><br>
    </div>
    </div>
    <!-- end panel -->
    </div>
    <!-- end col-6 -->
    </div>
    <!-- end row