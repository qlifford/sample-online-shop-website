<?php
$active = 'Shop';
include("includes/header.php");

?>

    <div id="content"><!-- #content Begin -->
        <div class="container"><!-- container Begin -->
            <div class="col-md-12"><!-- col-lg-12 Begin -->           
                <ul class="breadcrumb"><!-- breadcrumb Begin -->
                    <li>
                        <a href="index.php"> Home </a>
                    </li>

                    <li>
                        Terms & Condintions | Refund
                    </li>
                </ul><!-- breadcrumb Finish -->
                
            </div>
            <div class="col-md-3">
                <div class="box">
                    <ul class="nav nav-pills nav-stacked">

                        <?php
                            $get_terms = "select * from terms";
                            $run_terms = mysqli_query($con, $get_terms);
                            while ($row_terms = mysqli_fetch_array($run_terms)) 
                            {      
                                $term_title = $row_terms['term_title'];                     
                                $term_link = $row_terms['term_link'];                    

                        ?> 
                       <li>
                                <a data-toggle="pill" href="#<?= $term_link; ?>">
                                <?= $term_title; ?>                        
                                </a>
                            </li>
                      
                        <?php  } ?>

                        <?php  
                            $count_terms = "select * from terms";
                            $run_count_terms = mysqli_query($con, $count_terms);
                            $count = mysqli_num_rows($run_count_terms);

                            $get_terms = "select * from terms LIMIT 1,$count";
                            $run_get_terms = mysqli_query($con, $get_terms);

                            while ($row_terms = mysqli_fetch_array($run_get_terms)) 
                            {      
                                $term_title = $row_terms['term_title'];                     
                                $term_link = $row_terms['term_link'];   
                            
                        ?>
                            <li>
                                <a data-toggle="pill" href="#<?= $term_link; ?>">
                                <?= $term_title; ?>                        
                                </a>
                            </li>
                            <?php  } ?>
                    </ul>
                
            </div>                       
        </div><!-- container Finish -->
    </div><!-- #content Finish -->

 
    






    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    
    
</body>
</html>