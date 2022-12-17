<div class="row">
<!-- begin col-6 -->
    <div class="col-md-12">
<!-- begin panel -->
        <div class="panel panel-inverse" data-sortable-id="table-basic-4">
        <div class="panel-heading">
            <div class="panel-heading-btn">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
            </div>
            <h4 class="panel-title"><?php echo $title ?></h4>
        </div>
<div class="panel-body">
    <div class="table-responsive">
        <table class="table table-hover">
	    <tr><td>Tanggal Kirim Tugas</td><td><?php echo $tanggal_kirim_tugas; ?></td></tr>
	    <!-- <tr><td>Id Karyawan</td><td><?php echo $id_karyawan; ?></td></tr> -->
	    <tr><td>Keterangan Tugas</td><td><?php echo $keterangan_tugas; ?></td></tr>
	    <tr><td>Deadline</td><td><?php echo $deadline; ?></td></tr>
	    <tr><td>File</td><td><iframe src="<?php echo base_url('file/tugas/'.$file) ?>" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen style="width:100%; border:5px solid #eee; height:400px"></iframe></td></tr>
	    <tr><td></td><td><a href="<?php echo base_url('admin/tugas') ?>" class="btn btn-danger">Cancel</a></td></tr>
    </table>
            </div>
            </div>
            </div>
   </div>

</div>