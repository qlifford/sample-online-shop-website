<?php 

    $active = 'Home';
    include("includes/header.php");
    
    ?>
     
   <div class="container" id="slider"><!-- container Begin -->
       
       <div class="col-md-12"><!-- col-md-12 Begin -->
           
           <div class="carousel slide" id="myCarousel" data-ride="carousel"><!-- carousel slide Begin -->
               
               <ol class="carousel-indicators"><!-- carousel-indicators Begin -->
                   
                   <li class="active" data-target="#myCarousel" data-slide-to="0"></li>
                   <li data-target="#myCarousel" data-slide-to="1"></li>
                   <li data-target="#myCarousel" data-slide-to="2"></li>
                   <li data-target="#myCarousel" data-slide-to="3"></li>
                   
               </ol><!-- carousel-indicators Finish -->
               
               <div class="carousel-inner"><!-- carousel-inner Begin -->

                    <?php 
                    $get_slider = "select * from slides LIMIT 0,1";
                    $run_slider = mysqli_query($con, $get_slider);

                    while($row_slider = mysqli_fetch_array($run_slider))
                    {
                        $slide_name = $row_slider['slide_name'];
                        $slide_image = $row_slider['slide_image'];

                        echo "

                        <div class='item active'>

                        <img src='admin_area/slides_images/$slide_image'>
                        
                        </div>
                        
                        ";
                    }
                    
                    $get_slider = "select * from slides LIMIT 1,3";
                    $run_slider = mysqli_query($con, $get_slider);

                    while($row_slider = mysqli_fetch_array($run_slider))
                    {
                        $slide_name = $row_slider['slide_name'];
                        $slide_image = $row_slider['slide_image'];

                        echo "

                        <div class='item'>

                        <img src='admin_area/slides_images/$slide_image'>
                        
                        </div>
                        
                        ";
                    }
                    
                    ?>
                   
               </div><!-- carousel-inner Finish -->
               
               <a href="#myCarousel" class="left carousel-control" data-slide="prev"><!-- left carousel-control Begin -->
                   
                   <span class="glyphicon glyphicon-chevron-left"></span>
                   <span class="sr-only">Previous</span>
                   
               </a><!-- left carousel-control Finish -->
               
               <a href="#myCarousel" class="right carousel-control" data-slide="next"><!-- left carousel-control Begin -->
                   
                   <span class="glyphicon glyphicon-chevron-right"></span>
                   <span class="sr-only">Next</span>
                   
               </a><!-- left carousel-control Finish -->
               
           </div><!-- carousel slide Finish -->
           
       </div><!-- col-md-12 Finish -->
       
   </div><!-- container Finish -->
   
   <div id="advantages"><!-- #advantages Begin -->
       
       <div class="container"><!-- container Begin -->
           
           <div class="same-height-row"><!-- same-height-row Begin -->

           <?php 
            $get_boxes = "select * from boxes_section";
            $run_boxes = mysqli_query($con, $get_boxes);
            while($row_boxes = mysqli_fetch_array($run_boxes))
            {
                $box_id = $row_boxes['box_id'];
                $box_title = $row_boxes['box_title'];
                $box_desc = $row_boxes['box_desc'];            
           ?> 
               
               <div class="col-sm-4"><!-- col-sm-4 Begin -->
                   
                   <div class="box same-height"><!-- box same-height Begin -->
                       
                       <div class="icon"><!-- icon Begin -->
                           
                           <i class="fa fa-heart"></i>
                           
                       </div><!-- icon Finish -->
                       
                       <h3><a href="#"> <?= $box_title; ?> </a></h3>
                       
                       <p> <?= $box_desc; ?> </p>
                       
                   </div><!-- box same-height Finish -->
                   
               </div><!-- col-sm-4 Finish -->

               <?php } ?>
    
           </div><!-- same-height-row Finish -->
           
       </div><!-- container Finish -->
       
   </div><!-- #advantages Finish -->
   
   <div id="hot"><!-- #hot Begin -->
       
       <div class="box"><!-- box Begin -->
           
           <div class="container"><!-- container Begin -->
               
               <div class="col-md-12"><!-- col-md-12 Begin -->
                   
                   <h2>
                        Latest Products
                   </h2>
                   
               </div><!-- col-md-12 Finish -->
               
           </div><!-- container Finish -->
           
       </div><!-- box Finish -->
       
   </div><!-- #hot Finish -->
   
   <div id="content" class="container"><!-- container Begin -->       
       <div class="row"><!-- row Begin -->
                    <?php
                    getProducts();                  
                    
                    ?>
                  
           
       </div><!-- row Finish -->       
   </div><!-- container Finish -->
   
   <?php 
    
    include("includes/footer.php");
    
    ?>
    
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    
    
</body>
</html>
