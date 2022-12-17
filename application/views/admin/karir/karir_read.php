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
            
        <tr>
        <td style="width:10%">NIK </td>
        <td style="width:5%">: </td>
        <td> <?php echo $nik; ?></td>
        </tr>  
            
        <tr>
        <td style="width:10%">Nama </td>
        <td style="width:5%">: </td>
        <td> <?php echo $nama; ?></td>
        </tr>  
            
        <tr>
        <td style="width:10%">Tempat&TL </td>
        <td style="width:5%">: </td>
        <td> <?php echo $tempat_lahir; ?></td>
        </tr>  
            
        <tr>
        <td style="width:10%">Kelamin </td>
        <td style="width:5%">: </td>
        <td> <?php echo $jenis_kelamin; ?></td>
        </tr>  
            
        <tr>
        <td style="width:10%">Alamat </td>
        <td style="width:5%">: </td>
        <td> <?php echo $alamat; ?></td>
        </tr>  
            
        <tr>
        <td style="width:10%">No Hp </td>
        <td style="width:5%">: </td>
        <td> <?php echo $no_hp; ?></td>
        </tr>   
            
        <tr>
        <td style="width:10%">Email </td>
        <td style="width:5%">: </td>
        <td> <?php echo $email; ?></td>
        </tr>  
            
        <tr>
        <td style="width:10%">Pendidikan </td>
        <td style="width:5%">: </td>
        <td> <?php echo $pendidikan; ?></td>
        </tr>  
            
        <tr>
        <td style="width:10%">Pengalaman </td>
        <td style="width:5%">: </td>
        <td> <?php echo $pengalaman; ?></td>
        </tr>  
            
        <tr>
        <td style="width:10%">Jabatan Lamar </td>
        <td style="width:5%">: </td>
        <td> <?php echo $jabatan_lamar; ?></td>
        </tr>  
            
        <tr>
        <td style="width:10%">Area Kerja </td>
        <td style="width:5%">: </td>
        <td> <?php echo $area; ?></td>
        </tr>   
            
        <tr>
        <td style="width:10%">File </td>
        <td style="width:5%">: </td>
        <td>
            <a target="_blank" href="<?php echo base_url('file/karir/'.$file) ?>">
            Download File Lampiran</a>
        </td>
        </tr>    

	    <tr> <td><a href="<?php echo base_url('admin/karir') ?>" class="btn btn-danger">Back</a></td></tr>
    </table>
            </div>
            </div>
            </div>
   </div>

</div>
