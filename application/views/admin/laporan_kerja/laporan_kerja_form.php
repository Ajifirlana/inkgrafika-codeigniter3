
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



        <input type="hidden" class="form-control" name="id_user" value="<?php echo $user ?>"/>

         <input type="hidden" class="form-control" name="id_karyawan"  value="<?php echo $id_karyawan ?>" />
 <div class="form-group col-md-6">
            <label for="varchar">Nama Nasabah <?php echo form_error('nama_cus') ?></label>
            <input type="text" class="form-control" name="nama_cus" id="nama_cus" placeholder="Nama Nasabah" value="<?php echo $nama_cus; ?>" />
        </div>

        <div class="form-group col-md-6">
            <label for="varchar">No Rekening</label>
            <input type="number" class="form-control" name="no_rekening"  placeholder="No Rekening" required="" value="<?php echo $no_rekening; ?>" />
        </div>
        <div class="form-group col-md-6">
            <label for="varchar">No LD</label>
            <input type="text" class="form-control" name="no_ld"  placeholder="No ld" required="" value="<?php echo $no_ld; ?>" />
        </div>
        <div class="form-group col-md-6">
            <label for="varchar">No KTP</label>
            <input type="number" class="form-control" name="no_ktp"  placeholder="NO KTP" value="<?php echo $no_ktp; ?>" />
        </div>
         <div class="form-group col-md-6">
            <label for="varchar">NIP/NOPEN/NOTAS</label>
            <input type="number" class="form-control" name="nip"  placeholder="NIP/NOPEN/NOTAS" value="<?php echo $nip; ?>" />
        </div>
        <div class="form-group col-md-6">
            <label for="varchar">Alamat</label>
            <textarea name="alamat" cols="3" rows="3" class="form-control" placeholder="Alamat Lengkap" required=""><?php echo $alamat; ?></textarea>
        </div>

 <div class="form-group col-md-6">
            <label for="varchar">No Hp Debitur</label>
            <input type="number" class="form-control" name="no_hp_debitur"  placeholder="No Hp Debitur" value="<?php echo $no_hp_debitur; ?>" required/>
        </div>

 <div class="form-group col-md-6">
            <label for="varchar">Nama Pasangan</label>
            <input type="text" class="form-control" name="nama_pasangan" placeholder="Nama Pasangan" value="<?php echo $nama_pasangan; ?>" />
        </div>

 <div class="form-group col-md-6">
            <label for="varchar">No HP Pasangan</label>
            <input type="number" class="form-control" name="no_hp_pasangan" placeholder="No HP Pasangan" value="<?php echo $no_hp_pasangan; ?>" />
        </div>


 <div class="form-group col-md-6">
            <label for="varchar">Nama Ibu</label>
            <input type="text" class="form-control" name="nama_ibu" placeholder="Nama Ibu" value="<?php echo $nama_ibu; ?>" />
        </div>

 <div class="form-group col-md-6">
            <label for="varchar">Nama Instansi Debitur</label>
            <input type="text" class="form-control" name="nama_instansi" placeholder="Nama Instansi Debitur" value="<?php echo $nama_instansi; ?>" />
        </div>


        <div class="form-group col-md-6">
            <label for="varchar">Kantor Bank</label>
            <select name="alamat_instansi_d" class="form-control" required>

                <option value="<?php echo $alamat_instansi_d ?>" selected>--</option>
                <?php foreach($kantorbank as $row){?>
                                <option value="<?php echo $row->id?>"><?php echo $row->cabang_kantor;?></option>
                            <?php }?>
            </select>
        </div>


        <div class="form-group col-md-6">
            <label for="varchar">Jenis Top UP</label>
            <select name="j_topup" class="form-control" required>
                <option value="<?php echo $j_topup ?>" >--</option>
                <option value="New">New</option>
                <option value="Top Up">Top Up</option>
            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="varchar">Jenis Pinjaman</label>
            <select name="j_pinjaman" class="form-control" required>
                <option value="<?php echo $j_pinjaman ?>" >--</option>
                <option value="PENSIUN">PENSIUN</option>
                <option value="PNS AKTIF">PNS AKTIF</option>
                <option value="PRAPENSIUN">PRAPENSIUN</option>
                <option value="KUR">KUR</option>
                <option value="KPR PAYROL">KPR PAYROL</option>
            </select>
        </div>


 <div class="form-group col-md-6">
            <label for="varchar">PLAFOND</label>
            <input type="text" class="form-control" id="plafond" required="" name="plafon" placeholder="PLAFOND" value="<?php echo $plafon; ?>" />
        </div>

 <div class="form-group col-md-6">
            <label for="varchar">Baki Debit Lama</label>
            <input type="text" class="form-control" name="baki_debet_lama" id="baki_debet_lama" placeholder="Baki Debit Lama" value="<?php echo $baki_debet_lama; ?>" required/>
        </div>
        <div class="form-group col-md-6">
            <label for="varchar">NETT DISBURSE</label>
            <input type="text" class="form-control" name="nett_disburse" id="nett_disburse" placeholder="Nett Disburse" value="<?php echo $nett_disburse; ?>" required/>
        </div>
         <div class="form-group col-md-6">
            <label for="varchar">Nama AO</label>
            <input type="text" class="form-control" name="nama_ao" placeholder="Nama AO" value="<?php echo $nama_ao; ?>"/>


        </div>
         <div class="form-group col-md-6">
            <label for="varchar">Nama SPV</label>

           <select name="nama_spv" class="form-control" required>
                <option value="<?php echo $nama_spv ?>" ><?php echo $nama_spv ?></option>
             <?php 

             foreach($datakaryawan as $row){?> 
               <option value="<?php echo $row->id_karyawan?>"><?php echo $row->nama?></option>
             <?php }?>   
            </select>
         </div>
         <div class="form-group col-md-6">
            <label for="varchar">Nama Bank Pelunasan</label>
            <input type="text" class="form-control" name="nama_bank_pelunasan" placeholder="Nama Bank Pelunasan" value="<?php echo $nama_bank_pelunasan; ?>"/>
        </div>
 <div class="form-group col-md-6">
            <label for="varchar">Bank</label>
           <select name="bank" class="form-control" required>
                <option value="<?php echo $bank ?>" >--</option>
             <?php 

             foreach($databank as $row){?> 
               <option value="<?php echo $row->id?>"><?php echo $row->nama_bank?></option>
             <?php }?>   
            </select>
        </div>

         <div class="form-group col-md-6">
            <label for="varchar">Keterangan</label>
           <select name="ket" class="form-control" required>
                <option value="<?php echo $ket ?>" >--</option>
                <option value="SK Ditangan">SK Ditangan</option>
                <option value="Take Over">Take Over</option>

                <option value="TOP UP PENSIUN">TOP UP PENSIUN</option>
            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="varchar"> JENIS KREDIT PT. DJM </label>
           <select name="j_kredit" class="form-control" required>
                <option value="<?php echo $j_kredit ?>" >--</option>
                <option value="Konsumtif">Konsumtif</option>
                <option value="Produktif">Produktif</option>
            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="date">Tanggal Realisasi</label>
            <input type="date" class="form-control" name="tanggal_realisasi" placeholder="Tanggal Realisasi" value="<?php echo $tanggal_realisasi; ?>" required/>
        </div>
        <div class="form-group col-md-6">
            <label for="date">Tanggal Take Over</label>
            <?php 
//Notifikasi
if($this->session->flashdata('sukses')) {
    echo '<div class="alert alert-success"><i class="fa fa-check"></i>';
    echo $this->session->flashdata('sukses');
    echo '</div>';

}

?>
            <input type="date" class="form-control" name="tanggal_take_over" value="<?php echo $tanggal_take_over; ?>"/>
        </div>
	    <div class="form-group col-md-6">
           <!--  <label for="date">Tanggal Lapor <?php echo form_error('tanggal_lapor') ?></label> -->
            <input type="hidden" class="form-control" name="tanggal_lapor" id="tanggal_lapor" placeholder="Tanggal Lapor" value="<?php echo $tanggal_lapor; ?>" required/>
        </div>
	    <div class="form-group col-md-6">
            <label for="varchar">Lampiran (File PDF)</label>
            <input type="file" class="form-control" name="file_laporan"  />
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
	   
        
        <input type="hidden" class="form-control" name="status_laporan"  value="belum di proses" />

        <div class="form-group" style="margin-left: 40%">
        <label class="control-label"></label>
	    <input type="hidden" name="id_laporan_kerja" value="<?php echo $id_laporan_kerja; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo base_url('admin/laporan_kerja') ?>" class="btn btn-danger">Cancel</a>
        </div>
</form><br>
    </div>
    </div>
    <!-- end panel -->
    </div>
    <!-- end col-6 -->
    </div>
    <!-- end rowbarang_form_edit-->

        <script type="text/javascript">
            var plafond = document.getElementById("plafond");
           var baki_debet_lama = document.getElementById("baki_debet_lama");

           var nett_disburse = document.getElementById("nett_disburse"); 
plafond.addEventListener("keyup", function(e) {
  plafond.value = formatRupiah(this.value);
}),baki_debet_lama.addEventListener("keyup", function(e) {
  baki_debet_lama.value = formatRupiah(this.value);
}),nett_disburse.addEventListener("keyup", function(e) {
  nett_disburse.value = formatRupiah(this.value);
});



/* Fungsi formatRupiah */
function formatRupiah(angka, prefix) {
  var number_string = angka.replace(/[^,\d]/g, "").toString(),
    split = number_string.split(","),
    sisa = split[0].length % 3,
    rupiah = split[0].substr(0, sisa),
    ribuan = split[0].substr(sisa).match(/\d{3}/gi);

  // tambahkan titik jika yang di input sudah menjadi angka ribuan
  if (ribuan) {
    separator = sisa ? "." : "";
    rupiah += separator + ribuan.join(".");
  }

  rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
  return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
}

        </script>