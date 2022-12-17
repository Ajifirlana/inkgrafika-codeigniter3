
    <!-- =============== Screenshots =============== -->
    <section id="Screenshots" class="">
	<!-- =============== container =============== -->
    <div class="container">
    <span class="angle2"></span>
    <span class="angle"></span>
     <div class="row">

       <div class="col-xs-12 col-sm-12 col-md-12 wow bounceIn animated headding" data-wow-delay=".1s">
           <h2>Ulasan <span>Pengguna</span></h2> 
       </div>

      <div class="col-xs-12 col-sm-12 col-md-12">
         <div class="row">     
          <div class="col-xs-12 col-sm-12 col-md-12 wow zoomIn animated textright" data-wow-delay=".1s">           

                      <div id="owl-demo" class="owl-carousel">
                        <?php foreach($testimoni as $row){?>
                        <div class="item">
                            <div class="imghover" data-toggle="modal" data-target="#exampleModa2" data-whatever="@mdo">
                            <img src="<?php echo base_url('gambar/thumb/'.$row->testi)?>" alt="Owl Image">
                            </div>
                        </div>
                        <?php }?> 
                      </div> 
                      <hr>        
                      
        </div>      
      </div>
      
    </div>
    </div>      
	</div> 
    </section>