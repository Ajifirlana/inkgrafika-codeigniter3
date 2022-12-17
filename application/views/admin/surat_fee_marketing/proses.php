<?php

        // mengambil data dari yang dikirim dari form index.php 
        $tanggal_surat       = $_POST['tanggal_surat'];
        $no_surat       = $_POST['no_surat'];
        $bulan       = $_POST['bulan'];
        $tahun    = $_POST['tahun'];
        $yth_up        = $_POST['yth_up'];
        $ter_tanggal        = $_POST['ter_tanggal'];
        $priode_bulan     = $_POST['priode_bulan'];
    
    
        //mengambil dokumen surat
        $document = file_get_contents("suratfeee2.rtf");
     
    
        //mereplace semua kata yang ada di file dengan variabel
        $document = str_replace("#TANGGAL_SURAT",  date('d-m-Y', strtotime($tanggal_surat)), $document);
        $document = str_replace("#NO_SURAT", $no_surat, $document);
        $document = str_replace("#BULAN", $bulan, $document);
        $document = str_replace("#TAHUN", $tahun, $document);
        $document = str_replace("#YTH_UP", $yth_up, $document);
        $document = str_replace("#TER_TANGGAL",  date('d-m-Y', strtotime($ter_tanggal)), $document);
        $document = str_replace("#PRIODE_BULAN", $priode_bulan, $document);
     
    
        // header untuk membuka file yang dihasilkan dengna aplikasi Ms. Word
        // nama file yang dihasilkan adalah surat izin.docx
        header("Content-type: application/msword");
        header("Content-disposition: inline; filename=surat.doc");
        header("Content-length: " . strlen($document));
        echo $document;
    ?>