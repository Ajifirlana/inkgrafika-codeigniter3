
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
	    

<div class="col-md-6">
            
<div class="form-group">
        <label>Ukuran</label>
        <input type="text" name="ukuran" class="form-control" value="<?php echo $ukuran?>" required>    
    </div>
            
<div class="form-group">
        <label>Jumlah</label>
        <input type="text" name="jumlah" class="form-control" value="<?php echo $jumlah?>" required>    
    </div>
  
            <label for="varchar">Image</label>
             <input type="file" class="form-control" name="image"  />
            <?php 
            if ($image !== '') {
                ?>
                <div> 
                    *) Gambar Sebelumnya <br>
                    <img src="<?php echo base_url('gambar/thumb/'.$image) ?>" style="width: 100px;height: 100px;">
                </div>
                <?php
            } else {
                echo "tidak ada";
            }
            ?>
        </div>
         <div class="form-group" style="margin-left: 40%">
        <label class="control-label"></label>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo base_url('admin/slider') ?>" class="btn btn-danger">Cancel</a>
        </div>
</form><br>
    </div>
    </div>
    <!-- end panel -->
    </div>
    <!-- end col-6 -->
    </div>
    <!-- end rowbarang_form_edit