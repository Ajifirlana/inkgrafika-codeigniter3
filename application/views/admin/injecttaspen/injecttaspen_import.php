<?php echo $this->session->flashdata('notif') ?>
          
<div class="row">
<!-- begin col-6 -->
<div class="col-md-6">
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
<div align="center">
    <h3> UPLOAD FILE EXCEL</h3>
</div>
<div class="panel-body">

<form method="POST" action="<?php echo base_url() ?>admin/inject_data_taspen/proses_import" enctype="multipart/form-data">
            <div class="col-md-6">
           
              <input type="file" name="userfile" class="form-control">
            </div>

 <div class="col-md-6">
   
            <a type="submit" class="btn btn-warning block-element" href="<?php echo base_url('excel/contohinjecttaspen.xlsx');?>">
              <i class="ft ft-download"></i> Download Format
            </a>
            <button type="submit" class="btn btn-success"><i class="ft ft-upload"></i>UPLOAD</button>
          </div>
          </form>    
</div>
    </div>
    <!-- end panel -->
    </div>
    <!-- end col-6 -->
    </div>
    <!-- end row-->
