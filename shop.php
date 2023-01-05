<?php
$active = 'Shop';
include("includes/header.php");

?>

    <div id="content"><!-- #content Begin -->
        <div class="container"><!-- container Begin -->
            <div class="col-md-12"><!-- col-md-12 Begin -->
                
                <ul class="breadcrumb"><!-- breadcrumb Begin -->
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        Shop
                    </li>
                </ul><!-- breadcrumb Finish -->
                
            </div><!-- col-md-12 Finish -->
            
            <div class="col-md-3"><!-- col-md-3 Begin -->
    
    <?php 
        
        include("includes/sidebar.php");
        
        ?>
                
            </div><!-- col-md-3 Finish -->
            
            <div class="col-md-9"><!-- col-md-9 Begin -->
                <?php 
                    if (!isset($_GET['p_cat'])) 
                    {   
                        if (!isset($_GET['cat'])) 
                        {
                                                          
                            echo 
                            "
                                <div class='box'><!-- box Begin -->
                                <h1>Shop</h1>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo deleniti accusamust!
                                </p>
                                </div><!-- box Finish -->
                            ";
                        }
                    } 
                ?>

                <div class="row"><!-- row Begin -->
                <?php 
                    if (!isset($_GET['p_cat'])) 
                    {   
                        if (!isset($_GET['cat'])) 
                        {
                           $per_page=6;

                            if (isset($_GET['page'])) 
                            {
                            $page = $_GET['page'];
                            }
                            else
                            {
                                $page=1;
                            }
                            $start_from = ($page-1) * $per_page;

                            $get_product_query = "select * from products order by 1 DESC LIMIT $start_from, $per_page";
                            $get_product_query_run = mysqli_query($con, $get_product_query);

                            while($products_row = mysqli_fetch_array($get_product_query_run))
                            {
                                $prod_id = $products_row['product_id'];
                                $prod_title = $products_row['product_title'];
                                $prod_price = $products_row['product_price'];
                                $prod_img1 = $products_row['product_img1'];

                                echo 
                                "
                                    <div class='col-md-4 col-sm-6 center-responsive'>
                                        <div class='product'>
                                                <a href='details.php?prod_id=$prod_id'> 
                                                    <img class='img-responsive' src='admin_area/product_images/$prod_img1'>                                                    
                                                </a>

                                            <div class='text'>
                                                <h3>
                                                <a href='details.php?prod_id=$prod_id'> $prod_title </a>                                                
                                                </h3>

                                                <p class='price'>
                                                Kshs $prod_price 
                                                </p>

                                                <p class='buttons'>
                                                <a class='btn btn-default' href='details.php?prod_id=$prod_id'>
                                                    View Details                                                    
                                                </a>    

                                                
                                                <a class='btn btn-primary' href='cart.php?prod_id=$prod_id'>
                                                    <i class=''fa fa-shopping-cart></i> Add To Cart                                                    
                                                </a>    
                                                </p>
                                                
                                                
                                            </div>
                                            
                                        </div>
                                    </div>
                                ";

                           }
                    
                   
                ?>
                </div><!-- row Finish -->
                
                <center>
                    <ul class="pagination"><!-- pagination Begin -->
                        <?php 

                        $query = "select * from products";
                        $result = mysqli_query($con, $query);
                        $total_records = mysqli_num_rows($result);
                        $total_pages = ceil($total_records / $per_page);
                           echo
                           "
                           <li>
                            <a href='shop.php?page=1'> ".'First Page'." </a>                           
                           </li>
                           ";

                           for ($i=1; $i<=$total_pages; $i++) 
                           { 
                            echo
                            "
                            <li>
                             <a href='shop.php?page=".$i."'> ".$i." </a>                            
                            </li>
                            ";
                           };                           
                           echo
                           "
                           <li>
                            <a href='shop.php?page=$total_pages'> ".'Last Page'." </a>                           
                           </li>
                           ";             
                        }
                            } 
                        ?>
          
                    </ul><!-- pagination Finish -->
                </center>
                    <?php 
                        getPcatProd();               
                        getCatProd(); 
                     ?>              
                
            </div><!-- col-md-9 Finish -->
            
        </div><!-- container Finish -->
    </div><!-- #content Finish -->
    
    <?php 
    
    include("includes/footer.php");
    
    ?>
    
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    
    
</body>
</html>