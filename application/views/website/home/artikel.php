<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

 <section id="karir">
    <div class="container">
          <div class="row">
                 <div class="col-xs-12 col-sm-12 col-md-12 wow bounceIn animated headding" data-wow-delay=".1s">
                   <h2>Art<span>ikel</span></h2> 
               </div>


      </div>

      <div class="row">

      <div class="col-xs-12 col-sm-12 col-md-12">
         <div class="row">     
          <div class="col-xs-12 col-sm-12 col-md-12 wow zoomIn animated textright" data-wow-delay=".1s">           

                      <div id="owl-artikel" class="owl-carousel">
                        <?php foreach($artikel as $row){?>
                        <div class="item">
                            <div class="imghover" data-toggle="modal" data-target="#exampleModa2" data-whatever="@mdo"> 
                              <div class="w3-card-4" style="width:100%">
                                <img src="<?php echo base_url('gambar/thumb/'.$row->artikel)?>" alt="Owl Image" style='width: 100%;'>
                              <div class="w3-container w3-center">
                                <hr>
                                <p><a href="<?php echo base_url('artikel/detail/'.str_replace(' ', '-', $row->judul))?>"><strong><?php echo strtoupper($row->judul) ?></strong></a></p>
                                <a href="<?php echo base_url('artikel/detail/'.str_replace(' ', '-', $row->judul))?>"><p style="color:blue;"> Lihat Selengkapnya....</p></a>
    <br>
                              </div>
                            </div>
                         </div>
                        </div>
                        <?php }?> 
                      </div>  

                      <div align="center">
                         <a href="<?php echo base_url('artikel') ?>"><button class="btn btn-primary">Lihat Artikel Lainnya</button></a>
                      </div>

                       
        </div>      
      </div>
      
    </div>
           
      </div>
    </div> 
  </section>  