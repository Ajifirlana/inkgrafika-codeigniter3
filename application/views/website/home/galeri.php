  <section id="Galeri">
  <!-- =============== container =============== -->
    <div class="container">
          <div class="row">
                 <div class="col-xs-12 col-sm-12 col-md-12 wow bounceIn animated headding" data-wow-delay=".1s">
                   <h2>Galeri <span>Nasabah</span></h2> 
               </div>


      </div>

      <div class="row">

      <div class="col-xs-12 col-sm-12 col-md-12">
         <div class="row">     
          <div class="col-xs-12 col-sm-12 col-md-12 wow zoomIn animated textright" data-wow-delay=".1s">           

                      <div id="owl-galeri" class="owl-carousel">
                        <?php foreach($galeri as $row){?>
                        <div class="item">
                            <div class="imghover" data-toggle="modal" data-target="#exampleModa2" data-whatever="@mdo">
                             <table border="0">
                               <tr>
                                <td>&nbsp;</td>
                                 <td> <img width="100%" src="<?php echo base_url('gambar/thumb/'.$row->galeri)?>" alt="Owl Image"> </td>
                               </tr>
                             </table>
                         </div>
                        </div>
                        <?php }?> 
                      </div>  

                       
        </div>      
     <!-- =============== popup large image end =============== -->
      </div>
      
    </div>
           
      </div>
    </div><!-- =============== container end =============== -->
  </section>
    <!-- Footer -->
    <!-- <footer id="footer"> -->
  <!-- =============== container =============== -->
  

  <!-- </footer> -->
     