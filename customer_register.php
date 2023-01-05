<?php 
    $active = 'Account';
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
                       Register
                   </li>
               </ul><!-- breadcrumb Finish -->
               
           </div><!-- col-md-12 Finish -->
           
           <div class="col-md-3"><!-- col-md-3 Begin -->
   
        <?php 
            
            include("includes/sidebar.php");
            
            ?>
                    
           </div><!-- col-md-3 Finish -->
           
           <div class="col-md-9"><!-- col-md-9 Begin -->
               
               <div class="box"><!-- box Begin -->
                   
                   <div class="box-header"><!-- box-header Begin -->
                       
                       <center><!-- center Begin -->
                           
                           <h2> Create a new account </h2>
                           
                       </center><!-- center Finish -->
                       
                       <form action="customer_register.php" method="post" enctype="multipart/form-data"><!-- form Begin -->
                       <div class="form-group"><!-- form-group Begin -->                               
                               <label>Username</label>                               
                               <input type="text" class="form-control" name="uname" required>                                                              
                           </div><!-- form-group Finish -->

                           <div class="row"><!-- row Begin -->
                           <div class="form-group col-sm-6"><!-- form-group Begin -->                               
                               <label>First Name</label>                               
                               <input type="text" class="form-control" name="fname">                               
                               </div><!-- form-group Finish -->

                           <div class="form-group  col-sm-6"><!-- form-group Begin -->                               
                               <label>Last Name</label>                               
                               <input type="text" class="form-control" name="lname">                               
                           </div><!-- form-group Finish -->                    
                           </div><!-- row Finish -->

                           <div class="form-group"><!-- form-group Begin -->                               
                               <label>Email</label>                               
                               <input type="text" class="form-control" name="email">                               
                           </div><!-- form-group Finish -->
                           
                           <div class="form-group"><!-- form-group Begin -->                               
                               <label>Password</label>                               
                               <input type="password" class="form-control" name="pass">                               
                           </div><!-- form-group Finish -->
                           
                           <div class="row"><!-- row Begin -->
                           <div class="form-group col-sm-6"><!-- form-group Begin -->                               
                               <label>Country</label>                               
                               <input type="text" class="form-control" name="country">                               
                               </div><!-- form-group Finish -->

                           <div class="form-group  col-sm-6"><!-- form-group Begin -->                               
                               <label>City</label>                               
                               <input type="text" class="form-control" name="city">                               
                           </div><!-- form-group Finish -->                    
                           </div><!-- row Finish -->
                           
                           <div class="form-group"><!-- form-group Begin -->                               
                               <label>Phone No</label>                               
                               <input type="text" class="form-control" name="phone">                               
                           </div><!-- form-group Finish -->
                           
                           <div class="form-group"><!-- form-group Begin -->                               
                               <label>Address</label>                               
                               <input type="text" class="form-control" name="address">                               
                           </div><!-- form-group Finish -->
                           
                           <div class="form-group"><!-- form-group Begin -->                               
                               <label>Profile Picture</label>                               
                               <input type="file" class="form-control form-height-custom" name="image">
                               
                           </div><!-- form-group Finish -->                           
                           <div class="text-center"><!-- text-center Begin -->                               
                               <button type="submit" name="register_btn" class="btn btn-primary">                               
                               <i class="fa fa-user-md"></i> Create                               
                               </button>
                               
                           </div><!-- text-center Finish -->                           
                       </form><!-- form Finish --> 

                       <center><!-- center Begin -->
                            <h3> Already have an account..?
                                <a href="#"> Click here </h3>
                            </a>
                        </center><!--center Finish -->
                   </div><!-- box-header Finish --> 
                               
               </div><!-- box Finish -->               
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
    <?php 
    if (isset($_POST['register_btn']))
    {
        $uname          = $_POST['uname'];
        $fname          = $_POST['fname'];
        $lname          = $_POST['lname'];
        $email          = $_POST['email'];
        $pass           = $_POST['pass'];
        $cpass          = $_POST['cpass'];
        $country        = $_POST['country'];
        $city           = $_POST['city'];
        $phone          = $_POST['phone'];
        $address        = $_POST['address'];
        $image          = $_FILES['image']['name'];
        $tmp_image      = $_FILES['image']['tmp_name'];
        $c_ip           = getRealIpUser();

        move_uploaded_file($tmp_image,"customer/customer_images/$image");

        $user_query = "insert into customers(uname,fname,lname,email,pass,country,city,phone,address,image,customer_ip) 
        values('$uname','$fname','$lname','$email','$pass','$country','$city','$phone','$address','$image','$c_ip')";
        $user_query_run = mysqli_query($con, $user_query);

        $cart_query = "select * from carts where ip_add='$c_ip'";
        $cart_query_run = mysqli_query($con, $cart_query);

        $chck_cart = mysqli_num_rows($cart_query_run);
        if ($chck_cart > 0) 
        {
            ///register with cart item///
            $_SESSION['email'] = $email;
            echo "<script>alert('Registration successfuley')</script>";
            echo "<script>window.open('checkout.php','_self')</script>";
        }
        else
        {
            ///register without cart item///
            $_SESSION['email'] = $email;
            echo "<script>alert('Registration successful')</script>";
            echo "<script>window.open('index.php','_self')</script>";

        }

    }



    ?>