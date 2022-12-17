<?php

        // mengambil data dari yang dikirim dari form index.php 
        $no_surat       = $_POST['no_surat'];
        $tahun    = $_POST['tahun'];
        $bulan       = $_POST['bulan'];
        $tanggal        = $_POST['tanggal'];
        $penerima     = $_POST['penerima'];
    
    
        //mengambil dokumen surat
        $document = file_get_contents("suratcoba.rtf");
     
    
        //mereplace semua kata yang ada di file dengan variabel
        $document = str_replace("#NO_SURAT", $no_surat, $document);
        $document = str_replace("#TAHUN", $tahun, $document);
        $document = str_replace("#BULAN", $bulan, $document);
        $document = str_replace("#TANGGAL", $tanggal, $document);
        $document = str_replace("#PENERIMA", $penerima, $document);
     
    
        // header untuk membuka file yang dihasilkan dengna aplikasi Ms. Word
        // nama file yang dihasilkan adalah surat izin.docx
        header("Content-type: application/msword");
        header("Content-disposition: inline; filename=surat.doc");
        header("Content-length: " . strlen($document));
        echo $document;
    ?>